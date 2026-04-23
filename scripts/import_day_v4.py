#!/usr/bin/env python3
"""
import_day_v4.py — Import a v4 day JSON into MySQL.

Actions:
  1. Upsert course_days row with tab_json (full v4 JSON)
  2. Insert tts_audio rows (status=pending) for every audio clip
     that the TTS generator will need to synthesize later.

Usage:
  python3 scripts/import_day_v4.py --lang hi --day 1
  python3 scripts/import_day_v4.py --lang hi --day 1 --dry-run

For bulk import:
  for lang in hi mr te; do
    for day in $(seq 1 7); do
      python3 scripts/import_day_v4.py --lang $lang --day $day
    done
  done
"""

import argparse
import hashlib
import json
import re
import sys
from pathlib import Path

# ── DB connection ──────────────────────────────────────────────────────────────
try:
    import pymysql
except ImportError:
    print("ERROR: pymysql not installed. Run: pip install pymysql")
    sys.exit(1)

REPO_DIR = Path(__file__).resolve().parent.parent


def _load_db_config() -> dict:
    """Parse Hostinger credentials from config/db.php."""
    php = (REPO_DIR / 'config' / 'db.php').read_text()
    def _get(key):
        m = re.search(rf"'{key}'\s*=>\s*'([^']*)'", php)
        return m.group(1) if m else ''
    return {
        'host':   _get('host'),
        'db':     _get('dbname'),
        'user':   _get('username'),
        'passwd': _get('password'),
    }


def get_conn():
    cfg = _load_db_config()
    return pymysql.connect(
        host=cfg['host'], user=cfg['user'], password=cfg['passwd'],
        database=cfg['db'], charset='utf8mb4',
        cursorclass=pymysql.cursors.DictCursor,
        autocommit=False,
    )


# ── Paths ─────────────────────────────────────────────────────────────────────
LANG_COURSE = {
    'hi': 'english-speaking-50-hi',
    'mr': 'english-speaking-50-mr',
    'te': 'english-speaking-50-te',
}

# Native language for SAAVI TTS per source lang
LANG_TTS = {
    'hi': 'hi-IN',
    'mr': 'mr-IN',
    'te': 'te-IN',
}

R2_BASE = 'tts'  # tts/{lang}/day_{DD}/{audio_key}.mp3


def _r2_key(lang: str, day: int, audio_key: str) -> str:
    return f"{R2_BASE}/{lang}/day_{day:02d}/{audio_key}.mp3"


def _md5(text: str) -> str:
    return hashlib.md5(text.encode('utf-8')).hexdigest()


# ── Audio clip extraction ──────────────────────────────────────────────────────
def extract_tts_rows(lang: str, day: int, data: dict) -> list[dict]:
    """
    Walk the v4 JSON and return a list of tts_audio row dicts.

    audio_key naming:
      t1_w{WW}_ex{EE}_en    — tab1, word WW, example EE, English (voice_1 male)
      t1_w{WW}_ex{EE}_saavi — tab1, word WW, example EE, SAAVI explanation
      t1_w{WW}_mistake_wrong — common mistake wrong sentence (voice_1)
      t1_w{WW}_mistake_right — common mistake right sentence (voice_1)
      t1_w{WW}_mistake_saavi — common mistake SAAVI fix (saavi)
      t2_s{SS}_v             — tab2, sentence SS (saavi voice, en-IN)
      t3_d{LL}_v             — tab3, dialogue line LL (assigned voice, en-IN)
      t3_d{LL}_saavi         — tab3, dialogue line LL SAAVI explanation (saavi, native)
      t4_summary_saavi       — tab4, SAAVI closing summary (saavi, native)
    """
    rows = []
    native_lang = LANG_TTS[lang]

    def _row(audio_key, voice, text, tts_lang, tab):
        r2 = _r2_key(lang, day, audio_key)
        return {
            'lang': lang,
            'day_number': day,
            'audio_key': audio_key,
            'tab': tab,
            'r2_key': r2,
            'r2_url': '',          # filled in when uploaded to R2
            'voice': voice,
            'source_text': text,
            'text_hash': _md5(text),
            'status': 'pending',
        }

    # ── Tab 1: word teaching ─────────────────────────────────────────────────
    words = (data.get('tab_1_video', {})
                 .get('content', {})
                 .get('word_teaching', []))
    for w in words:
        wn = w.get('word_number', words.index(w) + 1)
        ww = f"{wn:02d}"

        # Examples
        for ex in w.get('examples', []):
            en = ex.get('example_number', 1)
            ee = f"{en:02d}"

            # English sentence → voice_1 (male en-IN)
            eng_text = ex.get('english', '')
            if eng_text:
                rows.append(_row(f"t1_w{ww}_ex{ee}_en", 'voice_1', eng_text, 'en-IN', 1))

            # SAAVI explanation → saavi (native lang)
            saavi_text = ex.get('saavi_explanation', '')
            if saavi_text:
                rows.append(_row(f"t1_w{ww}_ex{ee}_saavi", 'saavi', saavi_text, native_lang, 1))

        # Common mistake
        cm = w.get('common_mistake', {})
        if cm:
            wrong = cm.get('wrong', '')
            right = cm.get('right', '')
            saavi_fix = cm.get('saavi_fix', '')
            if wrong:
                rows.append(_row(f"t1_w{ww}_mistake_wrong", 'voice_1', wrong, 'en-IN', 1))
            if right:
                rows.append(_row(f"t1_w{ww}_mistake_right", 'voice_1', right, 'en-IN', 1))
            if saavi_fix:
                rows.append(_row(f"t1_w{ww}_mistake_saavi", 'saavi', saavi_fix, native_lang, 1))

    # ── Tab 2: listen & repeat ────────────────────────────────────────────────
    sentences = (data.get('tab_2_listen_repeat', {})
                     .get('content', {})
                     .get('sentences', []))
    for s in sentences:
        sn = s.get('number', sentences.index(s) + 1)
        ss = f"{sn:02d}"
        tts = s.get('tts', {})
        text = tts.get('text') or s.get('english', '')
        voice = tts.get('voice_id', 'saavi')
        tts_lang = tts.get('tts_lang', 'en-IN')
        if text:
            rows.append(_row(f"t2_s{ss}_v", voice, text, tts_lang, 2))

    # ── Tab 3: dialogue ───────────────────────────────────────────────────────
    dialogue = (data.get('tab_3_dialogue', {})
                    .get('content', {})
                    .get('dialogue', []))
    for line in dialogue:
        ln = line.get('line_number', dialogue.index(line) + 1)
        ll = f"{ln:02d}"

        # Dialogue line itself
        tts = line.get('tts', {})
        text = tts.get('text') or line.get('english', '')
        voice = tts.get('voice_id', 'voice_1')
        tts_lang = tts.get('tts_lang', 'en-IN')
        if text:
            rows.append(_row(f"t3_d{ll}_v", voice, text, tts_lang, 3))

        # SAAVI explanation for this line
        saavi_block = line.get('saavi_explanation', {})
        saavi_tts = saavi_block.get('tts', {}) if isinstance(saavi_block, dict) else {}
        saavi_text = saavi_tts.get('text') or (
            saavi_block.get('text', '') if isinstance(saavi_block, dict) else str(saavi_block)
        )
        if saavi_text:
            rows.append(_row(f"t3_d{ll}_saavi", 'saavi', saavi_text, native_lang, 3))

    # ── Tab 4: summary ────────────────────────────────────────────────────────
    summary_content = data.get('tab_4_summary', {}).get('content', {})
    saavi_closing = summary_content.get('saavi_closing', '')
    if saavi_closing:
        rows.append(_row('t4_summary_saavi', 'saavi', saavi_closing, native_lang, 4))

    return rows


LANG_LABEL = {'hi': 'hindi', 'mr': 'marathi', 'te': 'telugu'}
SITE_ORIGIN = 'https://shrutam.ai'    # change if domain differs


def _player_slug(url_slug: str, lang: str) -> str:
    """Strip the -hindi / -marathi / -telugu lang suffix from url_slug."""
    lang_word = LANG_LABEL.get(lang, lang)
    if url_slug.endswith(f'-{lang_word}'):
        return url_slug[: -(len(lang_word) + 1)]
    return url_slug


def extract_seo_row(lang: str, day: int, data: dict) -> dict:
    """Build a seo_pages row from the v4 JSON seo block."""
    seo      = data.get('seo', {})
    slug     = seo.get('url_slug') or f"day-{day}-{LANG_LABEL.get(lang, lang)}"
    pslug    = _player_slug(slug, lang)
    lang_word = LANG_LABEL.get(lang, lang)
    canonical = f"{SITE_ORIGIN}/learn-english/{lang_word}/{slug}/"
    player_url = f"{SITE_ORIGIN}/learn-english/{lang_word}/{pslug}/play/"
    return {
        'lang':             lang,
        'day_number':       day,
        'url_slug':         slug,
        'player_slug':      pslug,
        'meta_title':       seo.get('meta_title', f'Day {day} - Shrutam'),
        'meta_description': seo.get('meta_description', ''),
        'h1_heading':       seo.get('h1_heading', ''),
        'keywords':         json.dumps(seo.get('keywords', []), ensure_ascii=False),
        'search_intent':    json.dumps(seo.get('search_intent', []), ensure_ascii=False),
        'schema_markup':    json.dumps(seo.get('schema_markup', {}), ensure_ascii=False),
        'target_audience':  json.dumps(seo.get('target_audience', {}), ensure_ascii=False),
        'canonical_url':    canonical,
        'player_url':       player_url,
        'is_published':     0,
    }


# ── DB operations ──────────────────────────────────────────────────────────────
def get_course_id(cur, lang: str) -> int:
    code = LANG_COURSE[lang]
    cur.execute("SELECT id FROM courses WHERE course_code = %s", (code,))
    row = cur.fetchone()
    if not row:
        raise RuntimeError(
            f"Course '{code}' not found. Run sql/v4_migration.sql first."
        )
    return row['id']


def upsert_course_day(cur, course_id: int, day: int, data: dict):
    """Insert or update course_days with the v4 tab_json."""
    title_source = data.get('title', f'Day {day}')
    title_target = f'Day {day}'
    level = 'A1' if day <= 10 else ('A2' if day <= 30 else 'B1')
    phase = 1 if day <= 15 else (2 if day <= 30 else (3 if day <= 45 else 4))
    tab_json = json.dumps(data, ensure_ascii=False)

    cur.execute("""
        INSERT INTO course_days
            (course_id, day_number, title_source, title_target, level, phase,
             tab_json, tab_json_version, is_published)
        VALUES (%s, %s, %s, %s, %s, %s, %s, 4, 0)
        ON DUPLICATE KEY UPDATE
            title_source      = VALUES(title_source),
            tab_json          = VALUES(tab_json),
            tab_json_version  = 4
    """, (course_id, day, title_source, title_target, level, phase, tab_json))

    # get the day_id
    cur.execute(
        "SELECT id FROM course_days WHERE course_id = %s AND day_number = %s",
        (course_id, day)
    )
    return cur.fetchone()['id']


def upsert_seo_page(cur, row: dict):
    cur.execute("""
        INSERT INTO seo_pages
            (lang, day_number, url_slug, player_slug, meta_title, meta_description,
             h1_heading, keywords, search_intent, schema_markup,
             target_audience, canonical_url, is_published)
        VALUES
            (%(lang)s, %(day_number)s, %(url_slug)s, %(player_slug)s, %(meta_title)s,
             %(meta_description)s, %(h1_heading)s, %(keywords)s,
             %(search_intent)s, %(schema_markup)s, %(target_audience)s,
             %(canonical_url)s, %(is_published)s)
        ON DUPLICATE KEY UPDATE
            url_slug         = VALUES(url_slug),
            player_slug      = VALUES(player_slug),
            meta_title       = VALUES(meta_title),
            meta_description = VALUES(meta_description),
            h1_heading       = VALUES(h1_heading),
            keywords         = VALUES(keywords),
            search_intent    = VALUES(search_intent),
            schema_markup    = VALUES(schema_markup),
            target_audience  = VALUES(target_audience),
            canonical_url    = VALUES(canonical_url)
    """, row)


def upsert_tts_rows(cur, rows: list[dict]):
    """Insert tts_audio rows; skip if already done (status=done)."""
    inserted = 0
    skipped = 0
    for r in rows:
        cur.execute("""
            INSERT INTO tts_audio
                (lang, day_number, audio_key, tab, r2_key, r2_url,
                 voice, source_text, text_hash, status)
            VALUES
                (%(lang)s, %(day_number)s, %(audio_key)s, %(tab)s,
                 %(r2_key)s, %(r2_url)s, %(voice)s, %(source_text)s,
                 %(text_hash)s, %(status)s)
            ON DUPLICATE KEY UPDATE
                r2_key      = IF(status = 'done', r2_key, VALUES(r2_key)),
                source_text = IF(status = 'done', source_text, VALUES(source_text)),
                text_hash   = IF(status = 'done', text_hash, VALUES(text_hash)),
                status      = IF(status = 'done' AND text_hash = VALUES(text_hash),
                                 'done', status)
        """, r)
        if cur.rowcount == 1:
            inserted += 1
        else:
            skipped += 1
    return inserted, skipped


# ── Main ───────────────────────────────────────────────────────────────────────
def main():
    parser = argparse.ArgumentParser(description='Import v4 day JSON into MySQL')
    parser.add_argument('--lang', required=True, choices=['hi', 'mr', 'te'])
    parser.add_argument('--day',  required=True, type=int)
    parser.add_argument('--dry-run', action='store_true',
                        help='Show what would be inserted, no DB writes')
    args = parser.parse_args()

    json_path = (
        REPO_DIR / 'outputs' / 'days' / args.lang /
        f"day_{args.day:02d}.json"
    )
    if not json_path.exists():
        print(f"ERROR: {json_path} not found. Generate it first.")
        sys.exit(1)

    data = json.loads(json_path.read_text())
    tts_rows = extract_tts_rows(args.lang, args.day, data)
    seo_row  = extract_seo_row(args.lang, args.day, data)

    print(f"Importing {args.lang} Day {args.day}")
    print(f"  JSON: {json_path} ({json_path.stat().st_size // 1024} KB)")
    print(f"  SEO slug: {seo_row['url_slug']}")
    print(f"  TTS rows to create: {len(tts_rows)}")

    # Voice breakdown
    by_voice: dict[str, int] = {}
    for r in tts_rows:
        by_voice[r['voice']] = by_voice.get(r['voice'], 0) + 1
    for v, n in sorted(by_voice.items()):
        print(f"    {v}: {n} clips")

    if args.dry_run:
        print()
        print("DRY RUN — SEO row:")
        print(f"  slug:        {seo_row['url_slug']}")
        print(f"  player_slug: {seo_row['player_slug']}")
        print(f"  title:       {seo_row['meta_title']}")
        print(f"  seo url:     {seo_row['canonical_url']}")
        print(f"  player url:  {seo_row['player_url']}")
        print()
        print("DRY RUN — first 5 tts_audio rows:")
        for r in tts_rows[:5]:
            print(f"  {r['audio_key']:35s} | {r['voice']:8s} | {r['source_text'][:60]}")
        print(f"  ... {len(tts_rows) - 5} more")
        return

    conn = get_conn()
    try:
        with conn.cursor() as cur:
            course_id = get_course_id(cur, args.lang)
            day_id    = upsert_course_day(cur, course_id, args.day, data)
            upsert_seo_page(cur, seo_row)
            inserted, skipped = upsert_tts_rows(cur, tts_rows)
        conn.commit()
        print(f"✓  course_days row: id={day_id}")
        print(f"✓  seo_pages: upserted /{seo_row['url_slug']}/")
        print(f"✓  tts_audio: {inserted} inserted, {skipped} already existed")
    except Exception as e:
        conn.rollback()
        print(f"ERROR: {e}")
        raise
    finally:
        conn.close()


if __name__ == '__main__':
    main()
