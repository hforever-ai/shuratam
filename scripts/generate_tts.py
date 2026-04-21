"""
generate_tts.py — Generate TTS audio for course blocks.

Reads saavi_script from DB, generates MP3 via Gemini TTS,
uploads to R2, updates audio_url in DB.

Usage:
    python scripts/generate_tts.py --day 1
    python scripts/generate_tts.py --day 1-7  (range)
    python scripts/generate_tts.py --all
"""
import os
import sys
import json
import wave
import time
import argparse
import subprocess
import mysql.connector
from pathlib import Path
from google import genai
from google.genai import types

# ── Config ──
_KEYS_FILE = Path(__file__).resolve().parent.parent / 'safety' / 'keys.json'
_KEYS = json.loads(_KEYS_FILE.read_text()) if _KEYS_FILE.exists() else {}
GOOGLE_AI_KEY = os.environ.get('GOOGLE_AI_API_KEY') or _KEYS.get('GOOGLE_AI_API_KEY', '')
TTS_MODEL = 'gemini-2.5-flash-preview-tts'
TTS_VOICE = 'Leda'
VOICE_PROMPT = '[Speak as a 26 year old Indian woman. Warm, natural, friendly coach voice. NOT fast — speak at a relaxed comfortable pace like explaining to a friend over chai. Take a breath between sentences. Respectful aap. Encouraging but calm.]'

# R2 config (for upload later — generate locally first)
OUTPUT_DIR = Path('audio_output')


def get_db():
    """Connect to MySQL."""
    return mysql.connector.connect(
        host=os.environ.get('DB_HOST', 'localhost'),
        database=os.environ.get('DB_NAME', 'shrutam_db'),
        user=os.environ.get('DB_USER', 'root'),
        password=os.environ.get('DB_PASS', ''),
        charset='utf8mb4',
    )


def generate_audio(text: str, output_path: Path) -> float:
    """Generate TTS audio from text. Returns duration in seconds."""
    client = genai.Client(api_key=GOOGLE_AI_KEY)

    full_text = f"{VOICE_PROMPT}\n\n{text}"

    response = client.models.generate_content(
        model=TTS_MODEL,
        contents=full_text,
        config=types.GenerateContentConfig(
            response_modalities=['AUDIO'],
            speech_config=types.SpeechConfig(
                voice_config=types.VoiceConfig(
                    prebuilt_voice_config=types.PrebuiltVoiceConfig(voice_name=TTS_VOICE)
                )
            ),
        ),
    )

    for part in response.candidates[0].content.parts:
        if part.inline_data:
            raw = part.inline_data.data
            wav_path = output_path.with_suffix('.wav')

            # Write WAV
            with wave.open(str(wav_path), 'wb') as wf:
                wf.setnchannels(1)
                wf.setsampwidth(2)
                wf.setframerate(24000)
                wf.writeframes(raw)

            # Convert to MP3
            subprocess.run([
                'ffmpeg', '-y', '-hide_banner', '-loglevel', 'warning',
                '-i', str(wav_path),
                '-c:a', 'libmp3lame', '-b:a', '128k',
                str(output_path),
            ], check=True)

            # Get duration
            r = subprocess.run(
                ['ffprobe', '-v', 'quiet', '-show_entries', 'format=duration', '-of', 'csv=p=0', str(output_path)],
                capture_output=True, text=True,
            )
            duration = float(r.stdout.strip())

            # Cleanup WAV
            wav_path.unlink(missing_ok=True)

            return duration

    raise RuntimeError("No audio in TTS response")


def process_day(day_num: int, db):
    """Generate TTS for all blocks of a day."""
    cursor = db.cursor(dictionary=True)

    # Get day
    cursor.execute("""
        SELECT cd.id, cd.day_number, c.course_code
        FROM course_days cd
        JOIN courses c ON cd.course_id = c.id
        WHERE c.course_code = 'english-speaking-50-hi' AND cd.day_number = %s
    """, (day_num,))
    day = cursor.fetchone()

    if not day:
        print(f"Day {day_num} not found in DB")
        return

    # Get blocks without audio
    cursor.execute("""
        SELECT id, block_order, block_type, saavi_script
        FROM course_blocks
        WHERE day_id = %s AND saavi_script IS NOT NULL AND saavi_script != ''
        ORDER BY block_order
    """, (day['id'],))
    blocks = cursor.fetchall()

    print(f"Day {day_num}: {len(blocks)} blocks to process")

    day_dir = OUTPUT_DIR / f"day-{day_num}"
    day_dir.mkdir(parents=True, exist_ok=True)

    for block in blocks:
        block_file = day_dir / f"block_{block['block_order']}_{block['block_type']}.mp3"

        if block_file.exists():
            print(f"  Block {block['block_order']} ({block['block_type']}): exists, skip")
            continue

        print(f"  Block {block['block_order']} ({block['block_type']}): generating...", end=' ')

        try:
            duration = generate_audio(block['saavi_script'], block_file)
            print(f"{duration:.1f}s ✓")

            # Update DB with local path (R2 URL set after upload)
            audio_url = f"/audio/english-50/hi/day-{day_num}/block_{block['block_order']}_{block['block_type']}.mp3"
            cursor.execute("""
                UPDATE course_blocks SET audio_url = %s, audio_duration_sec = %s WHERE id = %s
            """, (audio_url, int(duration), block['id']))
            db.commit()

            # Rate limit: wait between calls
            time.sleep(3)

        except Exception as e:
            print(f"FAILED: {e}")

    # Update total audio duration for the day
    cursor.execute("""
        UPDATE course_days SET total_audio_sec = (
            SELECT COALESCE(SUM(audio_duration_sec), 0) FROM course_blocks WHERE day_id = %s
        ) WHERE id = %s
    """, (day['id'], day['id']))
    db.commit()

    total = cursor.execute("SELECT total_audio_sec FROM course_days WHERE id = %s", (day['id'],))
    row = cursor.fetchone()
    print(f"Day {day_num} complete: {row['total_audio_sec']}s total audio")


if __name__ == '__main__':
    parser = argparse.ArgumentParser()
    parser.add_argument('--day', type=str, help='Day number or range (e.g., 1 or 1-7)')
    parser.add_argument('--all', action='store_true', help='Process all days')
    args = parser.parse_args()

    OUTPUT_DIR.mkdir(exist_ok=True)
    db = get_db()

    if args.all:
        for d in range(1, 51):
            process_day(d, db)
    elif args.day:
        if '-' in args.day:
            start, end = map(int, args.day.split('-'))
            for d in range(start, end + 1):
                process_day(d, db)
        else:
            process_day(int(args.day), db)
    else:
        print("Usage: python generate_tts.py --day 1")

    db.close()
