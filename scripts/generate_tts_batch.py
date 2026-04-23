#!/usr/bin/env python3
"""
generate_tts_batch.py — Batch TTS via Gemini Batch API.

Submits all pending clips as batch jobs (100 clips per batch).
No RPM limit, 50% cheaper, results within ~10-30 minutes.

Workflow:
  1. --submit   : Read pending clips from DB, submit batch jobs (100 per batch)
  2. --poll     : Check batch job status, download results, convert+upload
  3. --commit   : Flush completed results to DB

Usage:
  python3 scripts/generate_tts_batch.py --submit --lang hi --day 1
  python3 scripts/generate_tts_batch.py --submit --all
  python3 scripts/generate_tts_batch.py --poll
  python3 scripts/generate_tts_batch.py --commit
"""

import argparse
import json
import os
import re
import subprocess
import sys
import time
import wave
from pathlib import Path

REPO_DIR = Path(__file__).resolve().parent.parent
_KEYS_FILE = REPO_DIR / 'safety' / 'keys.json'
_KEYS = json.loads(_KEYS_FILE.read_text()) if _KEYS_FILE.exists() else {}

API_KEY = os.environ.get('TTS_API_KEY') or 'AIzaSyCiVhzQ6y3LjHhuiNFlyzyu6pUwEXQQMSM'
TTS_MODEL = os.environ.get('TTS_MODEL') or 'gemini-3.1-flash-tts-preview'
BATCH_SIZE = 100  # max inline requests per batch job

AUDIO_DIR = REPO_DIR / 'audio_output' / 'tts'
BATCH_DIR = REPO_DIR / 'audio_output' / 'batches'
RESULTS_DIR = REPO_DIR / 'audio_output' / 'results'

# Voice config
_SAAVI_PROMPT = (
    '[Speak as a 26 year old Indian woman. Warm, natural, friendly coach voice. '
    'NOT fast — speak at a relaxed comfortable pace like explaining to a friend over chai. '
    'Take a breath between sentences. Respectful aap. Encouraging but calm.]'
)
VOICES = {
    'saavi': {'gemini_voice': 'Leda', 'prompt': _SAAVI_PROMPT},
    'voice_1': {
        'gemini_voice': 'Charon',
        'prompt': '[Indian male speaker. Clear, natural en-IN accent. '
                  'Comfortable conversational pace. NOT robotic.]',
    },
    'voice_2': {
        'gemini_voice': 'Kore',
        'prompt': '[Indian female speaker. Clear, natural en-IN accent. '
                  'Warm, friendly tone. Comfortable conversational pace.]',
    },
    'voice_3': {
        'gemini_voice': 'Orus',
        'prompt': '[Indian male speaker. Deeper voice. Clear, natural en-IN accent. '
                  'Calm, steady pace. NOT robotic.]',
    },
}

# ── DB ────────────────────────────────────────────────────────────────────────
import pymysql

def _load_db_config() -> dict:
    php = (REPO_DIR / 'config' / 'db.php').read_text()
    def _get(key):
        m = re.search(rf"'{key}'\s*=>\s*'([^']*)'", php)
        return m.group(1) if m else ''
    return {'host': _get('host'), 'db': _get('dbname'),
            'user': _get('username'), 'passwd': _get('password')}

def get_conn():
    cfg = _load_db_config()
    return pymysql.connect(
        host=cfg['host'], user=cfg['user'], password=cfg['passwd'],
        database=cfg['db'], charset='utf8mb4',
        cursorclass=pymysql.cursors.DictCursor, autocommit=False,
    )

# ── R2 upload ─────────────────────────────────────────────────────────────────
def upload_to_r2(local_path: Path, r2_key: str) -> str:
    try:
        import boto3
        from botocore.config import Config
    except ImportError:
        return f"LOCAL:{local_path}"

    r2 = {
        'account_id': os.environ.get('R2_ACCOUNT_ID') or _KEYS.get('R2_ACCOUNT_ID', ''),
        'access_key': os.environ.get('R2_ACCESS_KEY') or _KEYS.get('R2_ACCESS_KEY', ''),
        'secret_key': os.environ.get('R2_SECRET_KEY') or _KEYS.get('R2_SECRET_KEY', ''),
        'bucket':     os.environ.get('R2_BUCKET')     or _KEYS.get('R2_BUCKET', 'shrutam-audio'),
        'public_url': os.environ.get('R2_PUBLIC_URL') or _KEYS.get('R2_PUBLIC_URL', ''),
    }
    if not r2['account_id']:
        return f"LOCAL:{local_path}"

    endpoint = f"https://{r2['account_id']}.r2.cloudflarestorage.com"
    s3 = boto3.client(
        's3', endpoint_url=endpoint,
        aws_access_key_id=r2['access_key'],
        aws_secret_access_key=r2['secret_key'],
        config=Config(signature_version='s3v4'), region_name='auto',
    )
    s3.upload_file(
        str(local_path), r2['bucket'], r2_key,
        ExtraArgs={'ContentType': 'audio/mpeg', 'CacheControl': 'public, max-age=31536000'},
    )
    public_url = r2['public_url'].rstrip('/') + '/' + r2_key if r2['public_url'] else \
                 f"https://pub.r2.dev/{r2['bucket']}/{r2_key}"
    return public_url


# ── SUBMIT ───────────────────────────────────────────────────────────────────
def submit_batches(lang: str = None, day: int = None, max_batches: int = 0):
    from google import genai
    from google.genai import types

    conn = get_conn()
    try:
        with conn.cursor() as cur:
            sql = """
                SELECT id, lang, day_number, audio_key, r2_key, voice, source_text
                FROM tts_audio
                WHERE status='pending'
            """
            params = []
            if lang:
                sql += " AND lang=%s"
                params.append(lang)
            if day:
                sql += " AND day_number=%s"
                params.append(day)
            sql += " ORDER BY lang, day_number, tab, audio_key"
            cur.execute(sql, params)
            rows = cur.fetchall()
    finally:
        conn.close()

    if not rows:
        print("No pending clips found.")
        return

    # Skip clip IDs already in existing batch manifests
    already_submitted = set()
    for mf in BATCH_DIR.glob('batch_*.json'):
        manifest = json.loads(mf.read_text())
        for clip in manifest.get('clips', []):
            already_submitted.add(clip['id'])
    if already_submitted:
        rows = [r for r in rows if r['id'] not in already_submitted]
        print(f"Skipping {len(already_submitted)} already-submitted clips.")

    if not rows:
        print("All clips already submitted.")
        return

    print(f"Found {len(rows)} pending clips. Submitting in batches of {BATCH_SIZE}...")

    client = genai.Client(api_key=API_KEY)
    BATCH_DIR.mkdir(parents=True, exist_ok=True)

    # Split into chunks of BATCH_SIZE
    chunks = [rows[i:i+BATCH_SIZE] for i in range(0, len(rows), BATCH_SIZE)]
    if max_batches > 0:
        chunks = chunks[:max_batches]
    batch_manifest = []

    # Continue numbering from existing manifests
    existing = list(BATCH_DIR.glob('batch_*.json'))
    start_idx = len(existing)

    for chunk_idx, chunk in enumerate(chunks, start=start_idx):
        inlined = []
        clip_meta = []

        for row in chunk:
            voice_cfg = VOICES[row['voice']]
            full_text = f"{voice_cfg['prompt']}\n\n{row['source_text']}"

            inlined.append(types.InlinedRequest(
                contents=full_text,
                config=types.GenerateContentConfig(
                    response_modalities=['AUDIO'],
                    speech_config=types.SpeechConfig(
                        voice_config=types.VoiceConfig(
                            prebuilt_voice_config=types.PrebuiltVoiceConfig(
                                voice_name=voice_cfg['gemini_voice']
                            )
                        )
                    ),
                ),
                metadata={
                    'clip_id': str(row['id']),
                    'audio_key': row['audio_key'],
                    'lang': row['lang'],
                    'day': str(row['day_number']),
                    'r2_key': row['r2_key'],
                    'voice': row['voice'],
                },
            ))
            clip_meta.append({
                'id': row['id'],
                'audio_key': row['audio_key'],
                'lang': row['lang'],
                'day': row['day_number'],
                'r2_key': row['r2_key'],
                'voice': row['voice'],
            })

        # Submit batch with retry on 429
        for attempt in range(5):
            try:
                batch_job = client.batches.create(model=TTS_MODEL, src=inlined)
                break
            except Exception as e:
                if '429' in str(e) and attempt < 4:
                    wait = 30 * (attempt + 1)
                    print(f"    429 on batch create — waiting {wait}s (attempt {attempt+1})")
                    time.sleep(wait)
                else:
                    raise
        batch_name = batch_job.name

        # Save manifest: maps batch_name → clip metadata (for result processing)
        manifest_file = BATCH_DIR / f"batch_{chunk_idx:03d}.json"
        manifest = {
            'batch_name': batch_name,
            'state': str(batch_job.state),
            'clip_count': len(clip_meta),
            'clips': clip_meta,
            'submitted_at': time.strftime('%Y-%m-%d %H:%M:%S'),
        }
        manifest_file.write_text(json.dumps(manifest, indent=2))
        batch_manifest.append(manifest)

        print(f"  Batch {chunk_idx+1}/{len(chunks)}: {batch_name} ({len(clip_meta)} clips)")
        time.sleep(5)  # pause between batch submissions to avoid 429

    print(f"\nSubmitted {len(chunks)} batch jobs for {len(rows)} clips.")
    print(f"Manifests saved to: {BATCH_DIR}/")
    print(f"Run --poll to check status and download results.")


# ── POLL ─────────────────────────────────────────────────────────────────────
def poll_batches():
    from google import genai

    client = genai.Client(api_key=API_KEY)
    manifest_files = sorted(BATCH_DIR.glob('batch_*.json'))

    if not manifest_files:
        print("No batch manifests found. Run --submit first.")
        return

    pending = 0
    succeeded = 0
    failed = 0

    for mf in manifest_files:
        manifest = json.loads(mf.read_text())

        # Skip already-processed batches
        if manifest.get('processed'):
            succeeded += 1
            continue

        batch_name = manifest['batch_name']
        job = client.batches.get(name=batch_name)
        state = str(job.state)
        manifest['state'] = state

        if 'SUCCEEDED' in state:
            print(f"  ✓ {mf.name}: SUCCEEDED — processing {manifest['clip_count']} clips...")
            _process_batch_results(job, manifest, mf)
            succeeded += 1
        elif 'FAILED' in state:
            print(f"  ✗ {mf.name}: FAILED — {job.error}")
            failed += 1
        else:
            print(f"  … {mf.name}: {state} ({manifest['clip_count']} clips)")
            pending += 1

        mf.write_text(json.dumps(manifest, indent=2))

    print(f"\nBatch status: {succeeded} succeeded, {pending} pending, {failed} failed")
    if pending:
        print(f"Run --poll again in a few minutes to check remaining batches.")


def _process_batch_results(job, manifest: dict, manifest_file: Path):
    """Extract audio from batch results, convert to MP3, upload to R2."""
    RESULTS_DIR.mkdir(parents=True, exist_ok=True)

    responses = job.dest.inlined_responses
    clips = manifest['clips']

    if len(responses) != len(clips):
        print(f"    WARNING: {len(responses)} responses but {len(clips)} clips expected")

    for i, (resp, clip) in enumerate(zip(responses, clips)):
        audio_key = clip['audio_key']
        lang = clip['lang']
        day = clip['day']
        r2_key = clip['r2_key']

        try:
            # Extract audio data
            raw = None
            if resp.response and resp.response.candidates:
                for part in resp.response.candidates[0].content.parts:
                    if part.inline_data:
                        raw = part.inline_data.data
                        break

            if not raw:
                _append_result(lang, day, {
                    'id': clip['id'], 'status': 'error',
                    'error': 'No audio in batch response',
                })
                print(f"    [{i+1}] {audio_key}: no audio")
                continue

            # Save WAV → MP3
            local_dir = AUDIO_DIR / lang / f"day_{day:02d}"
            local_dir.mkdir(parents=True, exist_ok=True)
            wav_path = local_dir / f"{audio_key}.wav"
            mp3_path = local_dir / f"{audio_key}.mp3"

            with wave.open(str(wav_path), 'wb') as wf:
                wf.setnchannels(1)
                wf.setsampwidth(2)
                wf.setframerate(24000)
                wf.writeframes(raw)

            subprocess.run([
                'ffmpeg', '-y', '-hide_banner', '-loglevel', 'error',
                '-i', str(wav_path),
                '-c:a', 'libmp3lame', '-b:a', '96k',
                str(mp3_path),
            ], check=True)

            r = subprocess.run(
                ['ffprobe', '-v', 'quiet', '-show_entries', 'format=duration',
                 '-of', 'csv=p=0', str(mp3_path)],
                capture_output=True, text=True,
            )
            wav_path.unlink(missing_ok=True)
            duration = float(r.stdout.strip() or '0')

            # Upload to R2
            r2_url = upload_to_r2(mp3_path, r2_key)

            _append_result(lang, day, {
                'id': clip['id'], 'status': 'done',
                'r2_url': r2_url, 'duration_ms': int(duration * 1000),
            })

            if (i + 1) % 20 == 0 or i == 0:
                print(f"    [{i+1}/{len(clips)}] {audio_key}: ✓ {duration:.1f}s")

        except Exception as e:
            _append_result(lang, day, {
                'id': clip['id'], 'status': 'error', 'error': str(e),
            })
            print(f"    [{i+1}] {audio_key}: FAILED — {e}")

    manifest['processed'] = True
    manifest_file.write_text(json.dumps(manifest, indent=2))
    print(f"    Done: {len(clips)} clips processed")


def _append_result(lang, day, record):
    RESULTS_DIR.mkdir(parents=True, exist_ok=True)
    fpath = RESULTS_DIR / f"{lang}_day{int(day):02d}.jsonl"
    with fpath.open('a') as f:
        f.write(json.dumps(record) + '\n')


# ── COMMIT ───────────────────────────────────────────────────────────────────
def commit_results():
    conn = get_conn()
    total = 0
    try:
        for fpath in sorted(RESULTS_DIR.glob('*.jsonl')):
            lines = [json.loads(l) for l in fpath.read_text().splitlines() if l.strip()]
            if not lines:
                continue
            with conn.cursor() as cur:
                for rec in lines:
                    if rec['status'] == 'done':
                        cur.execute(
                            "UPDATE tts_audio SET status='done', r2_url=%s, duration_ms=%s WHERE id=%s",
                            (rec['r2_url'], rec['duration_ms'], rec['id']))
                    else:
                        cur.execute(
                            "UPDATE tts_audio SET status='error', error_msg=%s WHERE id=%s",
                            (rec.get('error', '')[:490], rec['id']))
                    total += 1
            conn.commit()
            fpath.rename(fpath.with_suffix('.jsonl.committed'))
            print(f"  Committed {len(lines)} rows from {fpath.name}")
    finally:
        conn.close()
    print(f"Total committed: {total}")


# ── STATUS ───────────────────────────────────────────────────────────────────
def show_status():
    from google import genai
    client = genai.Client(api_key=API_KEY)

    manifest_files = sorted(BATCH_DIR.glob('batch_*.json'))
    if not manifest_files:
        print("No batch jobs found.")
        return

    for mf in manifest_files:
        manifest = json.loads(mf.read_text())
        if manifest.get('processed'):
            print(f"  ✓ {mf.name}: DONE ({manifest['clip_count']} clips)")
        else:
            job = client.batches.get(name=manifest['batch_name'])
            print(f"  {mf.name}: {job.state} ({manifest['clip_count']} clips)")


# ── AUTO ─────────────────────────────────────────────────────────────────────
def auto_run():
    """Submit → poll → submit more → repeat until all clips done."""
    from google import genai

    client = genai.Client(api_key=API_KEY)

    while True:
        # 1. Poll existing batches and process any completed ones
        manifest_files = sorted(BATCH_DIR.glob('batch_*.json'))
        active = 0
        for mf in manifest_files:
            manifest = json.loads(mf.read_text())
            if manifest.get('processed'):
                continue
            job = client.batches.get(name=manifest['batch_name'])
            state = str(job.state)
            manifest['state'] = state

            if 'SUCCEEDED' in state:
                print(f"  ✓ {mf.name}: DONE — processing...")
                _process_batch_results(job, manifest, mf)
            elif 'FAILED' in state:
                print(f"  ✗ {mf.name}: FAILED — {job.error}")
                manifest['processed'] = True
                mf.write_text(json.dumps(manifest, indent=2))
            else:
                active += 1

        # 2. Try to submit more if active < 10
        if active < 10:
            try:
                submit_batches(max_batches=10 - active)
            except Exception as e:
                if '429' in str(e):
                    print(f"  Batch submit quota hit, waiting for more to complete...")
                else:
                    print(f"  Submit error: {e}")

        # 3. Check if all done
        conn = get_conn()
        with conn.cursor() as cur:
            cur.execute("SELECT COUNT(*) as c FROM tts_audio WHERE status='pending'")
            pending = cur.fetchone()['c']
        conn.close()

        if pending == 0:
            print("\n✓ ALL CLIPS DONE!")
            break

        print(f"\n  {active} batches running, {pending} clips still pending. Polling in 60s...")
        time.sleep(60)


def main():
    parser = argparse.ArgumentParser(description='Batch TTS via Gemini Batch API')
    parser.add_argument('--submit', action='store_true', help='Submit pending clips as batch jobs')
    parser.add_argument('--poll', action='store_true', help='Check batch status, download results')
    parser.add_argument('--commit', action='store_true', help='Flush results to DB')
    parser.add_argument('--status', action='store_true', help='Quick status check')
    parser.add_argument('--auto', action='store_true',
                        help='Full auto: submit→poll→process→repeat until all done')
    parser.add_argument('--lang', choices=['hi', 'mr', 'te'])
    parser.add_argument('--day', type=int)
    parser.add_argument('--all', action='store_true')
    args = parser.parse_args()

    if args.auto:
        auto_run()
    elif args.submit:
        if args.all:
            submit_batches()
        elif args.lang:
            submit_batches(args.lang, args.day)
        else:
            parser.error('Use --lang [--day] or --all with --submit')
    elif args.poll:
        poll_batches()
    elif args.commit:
        commit_results()
    elif args.status:
        show_status()
    else:
        parser.error('Use --submit, --poll, --commit, --status, or --auto')


if __name__ == '__main__':
    main()
