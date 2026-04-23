#!/usr/bin/env python3
"""
generate_thumbnails.py — Generate Day thumbnails for all 21 days (hi/mr/te × 7).

Uses gemini-2.5-flash-image (Nano Banana) with SAAVI reference image
so all thumbnails have a consistent character style.

Output: outputs/thumbnails/{lang}/day_{DD}.png
Upload: R2 → thumbnails/{lang}/day_{DD}.png
DB:     seo_pages.thumbnail_url = <r2_url>

Usage:
  python3 scripts/generate_thumbnails.py --lang hi --day 1
  python3 scripts/generate_thumbnails.py --lang hi --all
  python3 scripts/generate_thumbnails.py --all
  python3 scripts/generate_thumbnails.py --all --dry-run
"""

import argparse
import base64
import json
import os
import sys
import time
from pathlib import Path

REPO_DIR   = Path(__file__).resolve().parent.parent
_KEYS_FILE = REPO_DIR / 'safety' / 'keys.json'
_KEYS      = json.loads(_KEYS_FILE.read_text()) if _KEYS_FILE.exists() else {}

GOOGLE_AI_KEY   = os.environ.get('GOOGLE_AI_API_KEY') or _KEYS.get('GOOGLE_AI_API_KEY', '')
_GEMINI_KEYS    = _KEYS.get('GOOGLE_AI_API_KEYS') or ([GOOGLE_AI_KEY] if GOOGLE_AI_KEY else [])
_key_index      = 0

IMAGE_MODEL     = 'gemini-2.5-flash-image'
SAAVI_REF_PATH  = REPO_DIR / 'assets' / 'saavi' / 'saavi_reference.png'
LOGO_PATH       = REPO_DIR / 'assets' / 'saavi' / 'shrutam_logo.png'
OUTPUT_DIR      = REPO_DIR / 'outputs' / 'thumbnails'
R2_PREFIX       = 'thumbnails'

# ── key rotation ──────────────────────────────────────────────────────────────
def _next_key() -> str:
    global _key_index
    key = _GEMINI_KEYS[_key_index % len(_GEMINI_KEYS)]
    _key_index += 1
    return key

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
        ExtraArgs={'ContentType': 'image/png', 'CacheControl': 'public, max-age=31536000'},
    )
    public_url = r2['public_url'].rstrip('/') + '/' + r2_key if r2['public_url'] else \
                 f"https://pub.r2.dev/{r2['bucket']}/{r2_key}"
    return public_url


# ── DB ────────────────────────────────────────────────────────────────────────
try:
    import pymysql
    HAS_DB = True
except ImportError:
    HAS_DB = False

import re as _re

def _get_conn():
    php = (REPO_DIR / 'config' / 'db.php').read_text()
    def _get(k):
        m = _re.search(rf"'{k}'\s*=>\s*'([^']*)'", php)
        return m.group(1) if m else ''
    return pymysql.connect(
        host=_get('host'), user=_get('username'), password=_get('password'),
        database=_get('dbname'), charset='utf8mb4',
        cursorclass=pymysql.cursors.DictCursor, autocommit=False,
    )

def save_thumbnail_url(lang: str, day: int, url: str):
    if not HAS_DB:
        return
    try:
        conn = _get_conn()
        with conn.cursor() as c:
            c.execute(
                "UPDATE seo_pages SET thumbnail_url = %s WHERE lang = %s AND day_number = %s",
                (url, lang, day)
            )
        conn.commit()
        conn.close()
    except Exception as e:
        print(f"      DB update failed: {e}")


# ── prompt builder ────────────────────────────────────────────────────────────
LANG_WORD = {'hi': 'Hindi', 'mr': 'Marathi', 'te': 'Telugu'}

# Per-day: english title, emotion/pose, scenario, setting, bg color
DAY_SPECS = {
    1: {
        'en_title':  'Greetings & Self-Introduction',
        'emotion':   'warm welcoming smile, one hand in Namaste gesture, other hand waving, slight head tilt',
        'scenario':  'SAAVI greeting someone new at a bright Indian house entrance',
        'setting':   'Colorful Indian doorway, marigold flowers, sunny daytime, neighbor visible',
        'bg':        'warm orange-yellow gradient',
    },
    2: {
        'en_title':  'Present Tense Magic',
        'emotion':   'index finger pointing upward, excited explaining expression, eyebrows raised, lean forward',
        'scenario':  'SAAVI pointing at a large clock showing daily routine — tea, work, sleep icons floating around her',
        'setting':   'Cozy Indian home interior, soft morning light through window',
        'bg':        'light blue and white',
    },
    3: {
        'en_title':  'Nouns & Family Members',
        'emotion':   'big warm smile, arms slightly open in welcoming gesture, leaning toward family',
        'scenario':  'SAAVI standing next to a cartoon Indian family — mother, father, child, all smiling',
        'setting':   'Cozy Indian living room, diyas on shelf, colorful cushions on sofa',
        'bg':        'warm peach and gold',
    },
    4: {
        'en_title':  'Pronouns — I, You, He, She',
        'emotion':   'finger on chin in thinking pose, eyes looking up thoughtfully, playful slight smile',
        'scenario':  'Cartoon speech bubbles with "I", "You", "He", "She", "They" floating around SAAVI',
        'setting':   'Bright park bench, daytime, green trees in background',
        'bg':        'mint green and sky blue',
    },
    5: {
        'en_title':  'Verbs — Daily Actions',
        'emotion':   'dynamic energetic pose, both hands mid-action gesture, big enthusiastic smile',
        'scenario':  'Action icons surrounding SAAVI — running shoes, fork, open book, phone, alarm clock',
        'setting':   'Bright cheerful home-to-outdoor background, motion lines for energy',
        'bg':        'bright yellow and orange',
    },
    6: {
        'en_title':  'Adjectives — Describe the World',
        'emotion':   'wide excited eyes, one hand pointing at labeled objects, eyebrows raised in surprise',
        'scenario':  'Objects with floating descriptive labels — SMALL car, BIG globe, HEAVY flower pot, BEAUTIFUL book',
        'setting':   'Colorful classroom or living room, objects on shelves around SAAVI',
        'bg':        'purple and lavender gradient',
    },
    7: {
        'en_title':  'Week 1 Practice — Weather & Small Talk',
        'emotion':   'arms raised in celebration, huge smile, confetti falling around her',
        'scenario':  'Week 1 complete celebration — weather icons (sun, cloud, rain) + two friends chatting at a cafe',
        'setting':   'Bright park/cafe, sunny sky, colorful confetti, festive energy',
        'bg':        'golden yellow and orange — celebratory',
    },
}

# Native titles per lang per day
NATIVE_TITLES = {
    'hi': {
        1: 'अभिवादन और अपना परिचय',
        2: 'वर्तमान काल की जादू',
        3: 'संज्ञा - परिवार के सदस्य',
        4: 'सर्वनाम (Pronoun)',
        5: 'क्रिया (Verb) - रोज़ाना के काम',
        6: 'विशेषण / Adjective',
        7: 'मौसम और आम बातचीत',
    },
    'mr': {
        1: 'अभिवादन आणि स्वतःची ओळख',
        2: 'वर्तमान काळ - आजचे काम',
        3: 'कुटुंब आणि नावं',
        4: 'सर्वनाम - मला, तुला, त्याला!',
        5: 'क्रियापद (Verbs) शिका',
        6: 'विशेषण (Adjectives)',
        7: 'सराव - हवामान आणि गप्पा',
    },
    'te': {
        1: 'శుభాకాంక్షలు & పరిచయాలు',
        2: 'వర్తమాన కాలం (Present Tense)',
        3: 'కుటుంబ సభ్యుల పేర్లు',
        4: 'సర్వనామ్ (Pronoun)',
        5: 'క్రియ / Verb - రోజువారీ పనులు',
        6: 'విశేషణం / Adjective',
        7: 'వాతావరణం గురించి మాట్లాడండి',
    },
}


def build_prompt(lang: str, day: int) -> str:
    spec        = DAY_SPECS[day]
    native      = NATIVE_TITLES[lang][day]
    lang_word   = LANG_WORD[lang]

    return f"""You are generating a YouTube-style course thumbnail.

CRITICAL — CHARACTER CONSISTENCY:
Use the provided SAAVI reference image as the exact character.
Match: same face shape, same blue kurta + jeans outfit, same dark half-bun hair with pencil tucked in,
same warm brown skin tone, same large expressive eyes, same small earrings and dupatta.
Do NOT change her outfit, hair, or face. Keep the same friendly Indian cartoon art style.

THUMBNAIL SPECS:
- Size: 1024x1024, composed for 16:9 crop
- Language: {lang_word}
- Day: {day} of 50

SAAVI POSE/EMOTION:
{spec['emotion']}

SCENE:
{spec['scenario']}

BACKGROUND/SETTING:
{spec['setting']}
Color theme: {spec['bg']}

TEXT ON IMAGE — CRITICAL:
This is a {lang_word}-language thumbnail. Show ONLY these two text lines. NO other language text.

  Line 1 (top, large bold): "{native}"
  Line 2 (below line 1, medium): "{spec['en_title']}"

DO NOT add any other language text. DO NOT mix Hindi + Marathi + Telugu.
Only show the two lines above, exactly as written.

BRAND ELEMENTS:
- Bottom-left corner: place the second provided image (Shrutam logo) — small, clean, no background
- Bottom-right corner: pill badge "Day {day}/50" in amber (#f59e0b)

STYLE RULES:
- Friendly Indian cartoon — NOT anime, NOT realistic, NOT robotic
- Warm colors, clean composition, educational feel
- SAAVI must be the focal point, centered or slightly left
- Text must be legible, correctly spelled, correctly rendered in script"""


# ── generation ────────────────────────────────────────────────────────────────
def generate_thumbnail(lang: str, day: int, out_path: Path) -> None:
    from google import genai
    from google.genai import types

    if not SAAVI_REF_PATH.exists():
        raise FileNotFoundError(
            f"SAAVI reference image not found at {SAAVI_REF_PATH}\n"
            "Save assets/saavi/saavi_reference.png first."
        )
    if not LOGO_PATH.exists():
        raise FileNotFoundError(
            f"Shrutam logo not found at {LOGO_PATH}\n"
            "Save assets/saavi/shrutam_logo.png first."
        )

    ref_bytes  = SAAVI_REF_PATH.read_bytes()
    logo_bytes = LOGO_PATH.read_bytes()
    prompt     = build_prompt(lang, day)
    n_keys     = len(_GEMINI_KEYS)
    last_exc   = None

    for attempt in range(n_keys * 2):
        api_key = _next_key()
        try:
            client = genai.Client(api_key=api_key)
            response = client.models.generate_content(
                model=IMAGE_MODEL,
                contents=[
                    types.Part.from_bytes(data=ref_bytes,  mime_type='image/png'),
                    types.Part.from_bytes(data=logo_bytes, mime_type='image/png'),
                    types.Part.from_text(text=prompt),
                ],
                config=types.GenerateContentConfig(
                    response_modalities=['IMAGE'],
                ),
            )

            for part in response.candidates[0].content.parts:
                if part.inline_data:
                    out_path.parent.mkdir(parents=True, exist_ok=True)
                    out_path.write_bytes(part.inline_data.data)
                    return

            raise RuntimeError("No image in Gemini response")

        except Exception as exc:
            msg = str(exc)
            is_rate = '429' in msg or 'RESOURCE_EXHAUSTED' in msg or 'quota' in msg.lower()
            last_exc = exc
            if is_rate:
                backoff = 15 + (attempt // n_keys) * 20
                print(f"      429 key[{((_key_index-1) % n_keys)+1}/{n_keys}] — wait {backoff}s")
                time.sleep(backoff)
                continue
            raise

    raise RuntimeError(f"All keys exhausted: {last_exc}")


def process(lang: str, day: int, dry_run: bool = False):
    spec   = DAY_SPECS.get(day)
    if not spec:
        print(f"  SKIP {lang} Day {day} — no spec defined yet (days 8-50 need content first)")
        return

    native = NATIVE_TITLES[lang][day]
    out_path = OUTPUT_DIR / lang / f"day_{day:02d}.png"
    r2_key   = f"{R2_PREFIX}/{lang}/day_{day:02d}.png"

    print(f"  {lang} Day {day:2d} | {spec['en_title']}")
    print(f"             Native: {native}")

    if dry_run:
        print(f"             → {out_path}  [DRY RUN]")
        return

    if out_path.exists():
        print(f"             ✓ Already exists, re-uploading")
    else:
        print(f"             Generating...", end='', flush=True)
        generate_thumbnail(lang, day, out_path)
        print(f" done ({out_path.stat().st_size // 1024} KB)")

    r2_url = upload_to_r2(out_path, r2_key)
    save_thumbnail_url(lang, day, r2_url)
    print(f"             ✓ {r2_url}")
    time.sleep(6)   # rate limit buffer between image generations


def main():
    parser = argparse.ArgumentParser(description='Generate SAAVI thumbnails')
    parser.add_argument('--lang',    choices=['hi', 'mr', 'te'])
    parser.add_argument('--day',     type=int)
    parser.add_argument('--all',     action='store_true', help='All 21 combos')
    parser.add_argument('--dry-run', action='store_true')
    args = parser.parse_args()

    if not GOOGLE_AI_KEY:
        print("ERROR: No GOOGLE_AI_API_KEY")
        sys.exit(1)

    if args.all:
        for lc in ['hi', 'mr', 'te']:
            for d in range(1, 8):
                process(lc, d, args.dry_run)
    elif args.lang and args.day:
        process(args.lang, args.day, args.dry_run)
    else:
        parser.error('Use --lang + --day, or --all')


if __name__ == '__main__':
    main()
