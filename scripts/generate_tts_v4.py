#!/usr/bin/env python3
"""
generate_tts_v4.py — Generate TTS audio for v4 course content.

Voices:
  saavi   → Leda (warm Indian woman, native lang)
  voice_1 → Charon (male, en-IN English)
  voice_2 → Kore (female, en-IN English)

Workflow per clip:
  1. Read tts_audio rows WHERE status='pending'
  2. Call Gemini TTS
  3. Convert WAV → MP3 via ffmpeg
  4. Upload to R2 (S3-compatible)
  5. Mark status='done', store r2_url

R2 config (safety/keys.json or env):
  R2_ACCOUNT_ID, R2_ACCESS_KEY, R2_SECRET_KEY, R2_BUCKET, R2_PUBLIC_URL

Usage:
  python3 scripts/generate_tts_v4.py --lang hi --day 1
  python3 scripts/generate_tts_v4.py --lang hi --day 1 --limit 5   # first 5 clips
  python3 scripts/generate_tts_v4.py --lang hi --day 1 --dry-run   # show what would generate
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

GOOGLE_AI_KEY = os.environ.get('GOOGLE_AI_API_KEY') or _KEYS.get('GOOGLE_AI_API_KEY', '')
# Single paid key or round-robin list. TTS_API_KEY env var overrides everything.
_OVERRIDE_KEY = os.environ.get('TTS_API_KEY', '')
if _OVERRIDE_KEY:
    _GEMINI_KEYS = [_OVERRIDE_KEY]
else:
    _GEMINI_KEYS: list[str] = _KEYS.get('GOOGLE_AI_API_KEYS') or (
        [GOOGLE_AI_KEY] if GOOGLE_AI_KEY else []
    )
_key_index = int(os.environ.get('START_KEY_INDEX', '0')) % max(len(_GEMINI_KEYS), 1)

# Default model — override per-language via --model flag to use separate quota buckets
TTS_MODEL = os.environ.get('TTS_MODEL', 'gemini-2.5-flash-preview-tts')

# SAAVI prompt — same as the tested working version in generate_tts.py.
# Used for ALL 3 languages (hi/mr/te). The native-language text itself signals
# the language to Gemini; the prompt shapes tone/pace only.
_SAAVI_PROMPT = (
    '[Speak as a 26 year old Indian woman. Warm, natural, friendly coach voice. '
    'NOT fast — speak at a relaxed comfortable pace like explaining to a friend over chai. '
    'Take a breath between sentences. Respectful aap. Encouraging but calm.]'
)

# Voice map: our label → Gemini prebuilt voice + prompt
VOICES = {
    'saavi': {
        'gemini_voice': 'Leda',
        'prompt': _SAAVI_PROMPT,       # same prompt for hi / mr / te
    },
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
}

AUDIO_DIR = REPO_DIR / 'audio_output' / 'tts'

# ── DB ────────────────────────────────────────────────────────────────────────
try:
    import pymysql
    HAS_DB = True
except ImportError:
    HAS_DB = False


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
        cursorclass=pymysql.cursors.DictCursor,
        autocommit=False,
    )


# ── R2 upload ─────────────────────────────────────────────────────────────────
def _load_r2_config() -> dict:
    r2 = {
        'account_id': os.environ.get('R2_ACCOUNT_ID') or _KEYS.get('R2_ACCOUNT_ID', ''),
        'access_key': os.environ.get('R2_ACCESS_KEY') or _KEYS.get('R2_ACCESS_KEY', ''),
        'secret_key': os.environ.get('R2_SECRET_KEY') or _KEYS.get('R2_SECRET_KEY', ''),
        'bucket':     os.environ.get('R2_BUCKET')     or _KEYS.get('R2_BUCKET', 'shrutam-audio'),
        'public_url': os.environ.get('R2_PUBLIC_URL') or _KEYS.get('R2_PUBLIC_URL', ''),
    }
    return r2


def upload_to_r2(local_path: Path, r2_key: str) -> str:
    """Upload MP3 to R2, return public URL."""
    try:
        import boto3
        from botocore.config import Config
    except ImportError:
        print("  boto3 not installed — skip upload, return placeholder URL")
        return f"LOCAL:{local_path}"

    r2 = _load_r2_config()
    if not r2['account_id']:
        return f"LOCAL:{local_path}"

    endpoint = f"https://{r2['account_id']}.r2.cloudflarestorage.com"
    s3 = boto3.client(
        's3',
        endpoint_url=endpoint,
        aws_access_key_id=r2['access_key'],
        aws_secret_access_key=r2['secret_key'],
        config=Config(signature_version='s3v4'),
        region_name='auto',
    )
    s3.upload_file(
        str(local_path), r2['bucket'], r2_key,
        ExtraArgs={'ContentType': 'audio/mpeg', 'CacheControl': 'public, max-age=31536000'},
    )
    public_url = r2['public_url'].rstrip('/') + '/' + r2_key if r2['public_url'] else \
                 f"https://pub.r2.dev/{r2['bucket']}/{r2_key}"
    return public_url


# ── Gemini TTS ────────────────────────────────────────────────────────────────
def _next_key() -> str:
    """Round-robin through all available API keys."""
    global _key_index
    key = _GEMINI_KEYS[_key_index % len(_GEMINI_KEYS)]
    _key_index += 1
    return key


def generate_audio(text: str, voice_label: str, out_path: Path) -> float:
    """Call Gemini TTS with key rotation on 429. Returns duration in seconds."""
    from google import genai
    from google.genai import types

    voice_cfg = VOICES[voice_label]
    full_text = f"{voice_cfg['prompt']}\n\n{text}"

    n_keys = len(_GEMINI_KEYS)
    last_exc = None

    for attempt in range(n_keys * 2):          # try each key up to 2 full rounds
        api_key = _next_key()
        try:
            client = genai.Client(api_key=api_key)
            response = client.models.generate_content(
                model=TTS_MODEL,
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
            )

            for part in response.candidates[0].content.parts:
                if part.inline_data:
                    raw = part.inline_data.data
                    wav_path = out_path.with_suffix('.wav')

                    with wave.open(str(wav_path), 'wb') as wf:
                        wf.setnchannels(1)
                        wf.setsampwidth(2)
                        wf.setframerate(24000)
                        wf.writeframes(raw)

                    subprocess.run([
                        'ffmpeg', '-y', '-hide_banner', '-loglevel', 'error',
                        '-i', str(wav_path),
                        '-c:a', 'libmp3lame', '-b:a', '96k',
                        str(out_path),
                    ], check=True)

                    r = subprocess.run(
                        ['ffprobe', '-v', 'quiet', '-show_entries', 'format=duration',
                         '-of', 'csv=p=0', str(out_path)],
                        capture_output=True, text=True,
                    )
                    wav_path.unlink(missing_ok=True)
                    return float(r.stdout.strip() or '0')

            raise RuntimeError("No audio in Gemini TTS response")

        except Exception as exc:
            msg = str(exc)
            is_rate_limit = '429' in msg or 'RESOURCE_EXHAUSTED' in msg or 'quota' in msg.lower()
            last_exc = exc

            if is_rate_limit:
                backoff = 12 + (attempt // n_keys) * 15  # 12s first round, 27s second round
                print(f"      429 key[{((_key_index - 1) % n_keys) + 1}/{n_keys}] — "
                      f"wait {backoff}s then try next key (attempt {attempt + 1})")
                time.sleep(backoff)
                continue
            raise  # non-rate-limit error: propagate immediately

    raise RuntimeError(f"All {n_keys} keys exhausted after retries: {last_exc}")


# ── Result file helpers ───────────────────────────────────────────────────────
# Each process writes results to a local JSONL file instead of updating the DB
# on every clip. This uses ZERO extra DB connections during generation.
# A separate --commit step reads all result files and commits in one DB session.

RESULTS_DIR = REPO_DIR / 'audio_output' / 'results'


def _result_path(lang: str, day: int) -> Path:
    return RESULTS_DIR / f"{lang}_day{day:02d}.jsonl"


def _append_result(lang: str, day: int, record: dict):
    RESULTS_DIR.mkdir(parents=True, exist_ok=True)
    with _result_path(lang, day).open('a') as f:
        f.write(json.dumps(record) + '\n')


def commit_results(lang: str = None, day: int = None):
    """Read all result files and commit to DB in one connection."""
    if not HAS_DB:
        print("ERROR: pip install pymysql first"); return

    files = sorted(RESULTS_DIR.glob('*.jsonl')) if lang is None else \
            [_result_path(lang, day)]

    conn = get_conn()
    total = 0
    try:
        for fpath in files:
            if not fpath.exists():
                continue
            with fpath.open() as f:
                lines = [json.loads(l) for l in f if l.strip()]
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


# ── Main pipeline ─────────────────────────────────────────────────────────────
def process_pending(lang: str, day: int, limit: int = 0, dry_run: bool = False):
    if not HAS_DB:
        print("ERROR: pip install pymysql first")
        sys.exit(1)

    # Use ONE connection just for the initial SELECT, then close immediately.
    # All clip results are written to a local JSONL file (zero extra connections).
    # Run --commit afterward to flush results to DB in a single session.
    conn = get_conn()
    try:
        with conn.cursor() as cur:
            sql = """
                SELECT id, audio_key, tab, r2_key, voice, source_text
                FROM tts_audio
                WHERE lang=%s AND day_number=%s AND status='pending'
                ORDER BY tab, audio_key
            """
            if limit:
                sql += f" LIMIT {int(limit)}"
            cur.execute(sql, (lang, day))
            rows = cur.fetchall()
    finally:
        conn.close()   # release immediately — no more DB needed during generation

    print(f"{lang} Day {day}: {len(rows)} pending clips")
    if not rows:
        print("Nothing to do.")
        return

    result_file = _result_path(lang, day)
    # Remove stale result file so we don't double-commit on re-run
    if result_file.exists():
        result_file.unlink()

    for i, row in enumerate(rows, 1):
        key   = row['audio_key']
        voice = row['voice']
        text  = row['source_text'] or ''
        r2key = row['r2_key']

        print(f"  [{i}/{len(rows)}] {key} ({voice}) {text[:60]}")

        if dry_run:
            continue

        local_dir = AUDIO_DIR / lang / f"day_{day:02d}"
        local_dir.mkdir(parents=True, exist_ok=True)
        local_mp3 = local_dir / f"{key}.mp3"

        try:
            duration = generate_audio(text, voice, local_mp3)
            r2_url   = upload_to_r2(local_mp3, r2key)

            _append_result(lang, day, {
                'id': row['id'], 'status': 'done',
                'r2_url': r2_url, 'duration_ms': int(duration * 1000),
            })
            print(f"      ✓ {duration:.1f}s → {r2_url[:60]}")
            time.sleep(int(os.environ.get('TTS_SLEEP', '3')))  # 3s + ~3s gen = 6s/clip → 10 RPM

        except Exception as e:
            print(f"      ✗ FAILED: {e}")
            _append_result(lang, day, {
                'id': row['id'], 'status': 'error', 'error': str(e),
            })

    print(f"  Generation done. Run --commit to flush results to DB.")


def main():
    parser = argparse.ArgumentParser(description='Generate TTS for v4 course content')
    parser.add_argument('--lang', choices=['hi', 'mr', 'te'])
    parser.add_argument('--day',  type=int)
    parser.add_argument('--limit', type=int, default=0, help='Max clips (0=all)')
    parser.add_argument('--dry-run', action='store_true')
    parser.add_argument('--commit', action='store_true',
                        help='Flush all result JSONL files to DB (uses 1 connection)')
    args = parser.parse_args()

    if args.commit:
        commit_results(args.lang, args.day)
        return

    if not args.lang or not args.day:
        parser.error('--lang and --day are required unless using --commit')

    if not GOOGLE_AI_KEY:
        print("ERROR: No GOOGLE_AI_API_KEY found in env or safety/keys.json")
        sys.exit(1)

    process_pending(args.lang, args.day, args.limit, args.dry_run)


if __name__ == '__main__':
    main()
