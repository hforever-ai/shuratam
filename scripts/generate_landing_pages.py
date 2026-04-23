#!/usr/bin/env python3
"""
generate_landing_pages.py — Generate language landing pages, master landing, and sitemap.

Output:
  outputs/seo/index.html                    — Master landing (all languages)
  outputs/seo/hindi/index.html              — Hindi course landing (all 50 days)
  outputs/seo/marathi/index.html            — Marathi course landing
  outputs/seo/telugu/index.html             — Telugu course landing
  outputs/seo/sitemap.xml                   — Full sitemap for all pages

Usage:
  python3 scripts/generate_landing_pages.py
"""

import json
import re
import sys
from datetime import datetime
from html import escape as e
from pathlib import Path

REPO_DIR = Path(__file__).resolve().parent.parent
OUT_DIR  = REPO_DIR / 'outputs' / 'seo'
SITE     = 'https://shrutam.ai'

LANG_LABEL = {'hi': 'hindi', 'mr': 'marathi', 'te': 'telugu'}
LANG_FULL  = {'hi': 'Hindi',  'mr': 'Marathi',  'te': 'Telugu'}
LANG_NATIVE = {'hi': 'हिंदी', 'mr': 'मराठी', 'te': 'తెలుగు'}
LANG_FLAG   = {'hi': '🇮🇳', 'mr': '🇮🇳', 'te': '🇮🇳'}

WEEK_NAMES = {
    1: 'Foundation — Greetings & Grammar Basics',
    2: 'Core Verbs — BE, HAVE, DO, GO, CAN',
    3: 'Power Verbs — GET, MAKE, COME, WILL',
    4: 'Tenses — Past, Future, Modals',
    5: 'Fluency — Conditionals, Passive, Reported Speech',
    6: 'Advanced — Phrasal Verbs, Idioms, Collocations',
    7: 'Mastery — Debate, Presentation, Interview',
    8: 'Final Week — Review & Celebration',
}

# ── DB ────────────────────────────────────────────────────────────────────────
import pymysql

def get_conn():
    php = (REPO_DIR / 'config' / 'db.php').read_text()
    def _get(key):
        m = re.search(rf"'{key}'\s*=>\s*'([^']*)'", php)
        return m.group(1) if m else ''
    return pymysql.connect(
        host=_get('host'), user=_get('username'), password=_get('password'),
        database=_get('dbname'), charset='utf8mb4',
        cursorclass=pymysql.cursors.DictCursor,
    )


def load_pages():
    conn = get_conn()
    with conn.cursor() as c:
        c.execute("""
            SELECT s.lang, s.day_number, s.url_slug, s.meta_title, s.h1_heading,
                   s.player_slug, s.thumbnail_url,
                   LEFT(s.meta_description, 160) as meta_desc
            FROM seo_pages s
            ORDER BY s.lang, s.day_number
        """)
        rows = c.fetchall()
    conn.close()

    by_lang = {}
    for r in rows:
        by_lang.setdefault(r['lang'], []).append(r)
    return by_lang


# ── Language landing page ────────────────────────────────────────────────────
def render_lang_landing(lang: str, days: list) -> str:
    from shrutam_theme import THEME_CSS, THEME_JS, THEME_PICKER_HTML
    lw = LANG_LABEL[lang]
    lf = LANG_FULL[lang]
    ln = LANG_NATIVE[lang]
    total = len(days)

    # Group days by week
    weeks_html = ''
    for week_num in range(1, 9):
        start = (week_num - 1) * 7 + 1
        end = min(week_num * 7, 50)
        week_days = [d for d in days if start <= d['day_number'] <= end]
        if not week_days:
            continue

        week_name = WEEK_NAMES.get(week_num, f'Week {week_num}')
        cards = ''
        for d in week_days:
            dn = d['day_number']
            slug = d['url_slug']
            title = e(d['h1_heading'] or d['meta_title'] or f'Day {dn}')
            desc = e(d['meta_desc'] or '')
            thumb = d.get('thumbnail_url') or ''
            thumb_html = f'<img src="{thumb}" alt="Day {dn}" loading="lazy" width="120" height="68">' if thumb else ''

            cards += f"""
        <a href="{SITE}/learn-english/{lw}/{slug}/" class="day-card">
          {thumb_html}
          <div>
            <span class="day-num">Day {dn}</span>
            <strong>{title}</strong>
            <p>{desc}</p>
          </div>
        </a>"""

        weeks_html += f"""
      <section class="week">
        <h2>Week {week_num}: {week_name}</h2>
        <div class="day-grid">{cards}
        </div>
      </section>"""

    # Other language links
    other_langs = ''
    for ol in ['hi', 'mr', 'te']:
        if ol == lang:
            continue
        other_langs += f'<a href="{SITE}/learn-english/{LANG_LABEL[ol]}/">{LANG_FULL[ol]} ({LANG_NATIVE[ol]})</a> · '

    return f"""<!DOCTYPE html>
<html lang="{lang}-IN" data-theme="navy">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Learn English in {lf} — Free 50-Day Course | Shrutam</title>
  <meta name="description" content="Free 50-day English speaking course in {lf} ({ln}). Learn with SAAVI — daily lessons with audio, practice, and quizzes. Start speaking English confidently.">
  <meta name="keywords" content="learn English in {lf}, English speaking course {lf}, free English course, {ln} se English sikhein, spoken English {lf}, Shrutam">
  <link rel="canonical" href="{SITE}/learn-english/{lw}/">
  <meta property="og:title" content="Learn English in {lf} — Free 50-Day Course | Shrutam">
  <meta property="og:description" content="Free 50-day English speaking course in {lf}. Daily lessons with audio, dialogues, and quizzes.">
  <meta property="og:url" content="{SITE}/learn-english/{lw}/">
  <meta property="og:type" content="website">
  <meta name="robots" content="index, follow">
  <meta http-equiv="Cache-Control" content="public, max-age=86400, s-maxage=604800">

  <script type="application/ld+json">
  {{
    "@context": "https://schema.org",
    "@type": "Course",
    "name": "Learn English Speaking in {lf}",
    "description": "Free 50-day English speaking course designed for {lf} speakers. Audio lessons, dialogues, quizzes.",
    "provider": {{"@type": "Organization", "name": "Shrutam", "url": "{SITE}"}},
    "inLanguage": ["{lang}", "en"],
    "numberOfCredits": 50,
    "hasCourseInstance": {{
      "@type": "CourseInstance",
      "courseMode": "online",
      "courseWorkload": "PT20M"
    }}
  }}
  </script>

  <style>
{THEME_CSS}
    .container{{max-width:1000px;margin:0 auto;padding:0 1.2rem}}
    header{{background:var(--bg-surface);border-bottom:1px solid var(--border-subtle);padding:2.5rem 0;text-align:center}}
    header h1{{font-size:2rem;margin-bottom:.5rem}}
    header p{{color:var(--text-secondary);font-size:1.05rem;max-width:600px;margin:0 auto}}
    .stats{{display:flex;justify-content:center;gap:2rem;margin-top:1.2rem;font-size:.9rem;color:var(--text-muted)}}
    nav.breadcrumb{{font-size:.85rem;color:var(--text-muted);padding:1rem 0}}
    nav.breadcrumb a{{color:var(--primary-light)}}
    .week{{margin:1.5rem 0}}
    .week h2{{font-size:1.15rem;color:var(--text-primary);border-left:4px solid var(--accent);padding-left:.8rem;margin-bottom:.8rem}}
    .day-grid{{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:.8rem}}
    .day-card{{display:flex;gap:.8rem;background:var(--bg-surface);border:1px solid var(--border-subtle);border-radius:var(--radius);padding:.8rem;text-decoration:none;color:inherit;transition:box-shadow .2s,border-color .2s}}
    .day-card:hover{{border-color:var(--primary);box-shadow:var(--shadow-glow)}}
    .day-card img{{border-radius:var(--radius-sm);object-fit:cover;flex-shrink:0}}
    .day-num{{font-size:.75rem;color:var(--accent);font-weight:700;text-transform:uppercase;letter-spacing:.04em}}
    .day-card strong{{display:block;font-size:.95rem;margin:.1rem 0 .2rem;line-height:1.3;color:var(--text-primary)}}
    .day-card p{{font-size:.8rem;color:var(--text-secondary);margin:0;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}}
    .lang-switch{{text-align:center;padding:1.5rem 0;font-size:.9rem;color:var(--text-muted)}}
    .lang-switch a{{color:var(--primary-light);font-weight:600}}
    .cta{{background:var(--bg-surface);border:1px solid var(--accent-glow);text-align:center;padding:2rem;border-radius:var(--radius-lg);margin:2rem 0}}
    .cta h2{{font-size:1.3rem;margin-bottom:.5rem}}
    .cta a{{color:var(--accent);font-weight:700}}
    footer{{font-size:.8rem;color:var(--text-muted);text-align:center;padding:1.5rem 0;border-top:1px solid var(--border-subtle);margin-top:2rem}}
    footer a{{color:var(--primary-light)}}
  </style>
  <script>{THEME_JS}</script>
</head>
<body>

<header>
  <div class="container">
    <p style="font-size:.8rem;opacity:.6;text-transform:uppercase;letter-spacing:.06em;margin-bottom:.5rem">Shrutam · Free English Course</p>
    <h1>Learn English Speaking in {lf}</h1>
    <p>{ln} में English बोलना सीखें — SAAVI के साथ 50 दिनों में confident English speaker बनें</p>
    <div class="stats">
      <span>50 Days</span>
      <span>{total} Lessons Ready</span>
      <span>750+ Words</span>
      <span>100% Free</span>
    </div>
  </div>
</header>

<div class="container">

<nav class="breadcrumb">
  <a href="{SITE}/">Shrutam</a> &rsaquo;
  <a href="{SITE}/learn-english/">Learn English</a> &rsaquo;
  {lf}
</nav>

{THEME_PICKER_HTML}

{weeks_html}

<div class="cta">
  <h2>Start Learning Today — It's Free!</h2>
  <p style="margin:.5rem 0;opacity:.85">Audio lessons + practice + quizzes. 20 minutes per day.</p>
  <a href="{SITE}/learn-english/{lw}/{days[0]['url_slug']}/">→ Start Day 1</a>
</div>

<div class="lang-switch">
  Also available in: {other_langs.rstrip(' · ')}
</div>

</div>

<footer>
  <div class="container">
    &copy; Shrutam · Free English Speaking Course ·
    <a href="{SITE}/privacy/">Privacy</a> ·
    <a href="{SITE}/">Home</a>
  </div>
</footer>

</body>
</html>"""


# ── Master landing page ──────────────────────────────────────────────────────
def render_master_landing(by_lang: dict) -> str:
    from shrutam_theme import THEME_CSS, THEME_JS, THEME_PICKER_HTML
    lang_cards = ''
    for lang in ['hi', 'mr', 'te']:
        days = by_lang.get(lang, [])
        lw = LANG_LABEL[lang]
        lf = LANG_FULL[lang]
        ln = LANG_NATIVE[lang]
        lang_cards += f"""
      <a href="{SITE}/learn-english/{lw}/" class="lang-card">
        <h2>{lf} <span class="native">({ln})</span></h2>
        <p>{len(days)} lessons ready · 50-day course · Free</p>
        <span class="arrow">→ Start Learning</span>
      </a>"""

    return f"""<!DOCTYPE html>
<html lang="en-IN" data-theme="navy">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Learn English Free — Hindi, Marathi, Telugu | Shrutam</title>
  <meta name="description" content="Free 50-day English speaking course in Hindi, Marathi, and Telugu. Learn with SAAVI — daily audio lessons, real dialogues, practice, and quizzes. Start today!">
  <meta name="keywords" content="learn English free, English speaking course, Hindi English course, Marathi English course, Telugu English course, spoken English India, Shrutam, free English app">
  <link rel="canonical" href="{SITE}/learn-english/">
  <meta property="og:title" content="Learn English Free — Hindi, Marathi, Telugu | Shrutam">
  <meta property="og:description" content="Free 50-day English speaking course. Choose your language and start learning today.">
  <meta property="og:url" content="{SITE}/learn-english/">
  <meta property="og:type" content="website">
  <meta name="robots" content="index, follow">

  <script type="application/ld+json">
  {{
    "@context": "https://schema.org",
    "@type": "ItemList",
    "name": "Shrutam English Speaking Courses",
    "description": "Free 50-day English speaking courses in Indian languages",
    "itemListElement": [
      {{"@type": "ListItem", "position": 1, "url": "{SITE}/learn-english/hindi/", "name": "English Course in Hindi"}},
      {{"@type": "ListItem", "position": 2, "url": "{SITE}/learn-english/marathi/", "name": "English Course in Marathi"}},
      {{"@type": "ListItem", "position": 3, "url": "{SITE}/learn-english/telugu/", "name": "English Course in Telugu"}}
    ]
  }}
  </script>

  <style>
{THEME_CSS}
    .container{{max-width:800px;margin:0 auto;padding:0 1.2rem}}
    header{{background:var(--bg-surface);border-bottom:1px solid var(--border-subtle);padding:3rem 0;text-align:center}}
    header h1{{font-size:2.2rem;margin-bottom:.5rem}}
    header p{{color:var(--text-secondary);font-size:1.1rem;max-width:550px;margin:0 auto}}
    .subtitle{{margin-top:1rem;font-size:.9rem;color:var(--text-muted)}}
    .lang-card{{display:block;background:var(--bg-surface);border:2px solid var(--border-subtle);border-radius:var(--radius-lg);padding:1.5rem;margin:1rem 0;text-decoration:none;color:inherit;transition:all .2s}}
    .lang-card:hover{{border-color:var(--primary);box-shadow:var(--shadow-glow);transform:translateY(-2px)}}
    .lang-card h2{{font-size:1.4rem;margin-bottom:.3rem;color:var(--text-primary)}}
    .native{{color:var(--accent);font-weight:400;font-size:1.1rem}}
    .lang-card p{{color:var(--text-secondary);font-size:.95rem}}
    .arrow{{display:inline-block;margin-top:.5rem;color:var(--accent);font-weight:700;font-size:.95rem}}
    .features{{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin:2rem 0}}
    .feature{{text-align:center;padding:1rem;background:var(--bg-surface);border:1px solid var(--border-subtle);border-radius:var(--radius)}}
    .feature .icon{{font-size:2rem;margin-bottom:.5rem}}
    .feature h3{{font-size:1rem;margin-bottom:.3rem;color:var(--text-primary)}}
    .feature p{{font-size:.85rem;color:var(--text-secondary)}}
    footer{{font-size:.8rem;color:var(--text-muted);text-align:center;padding:1.5rem 0;border-top:1px solid var(--border-subtle);margin-top:2rem}}
    footer a{{color:var(--primary-light)}}
  </style>
  <script>{THEME_JS}</script>
</head>
<body>

<header>
  <div class="container">
    <p style="font-size:.85rem;opacity:.5;text-transform:uppercase;letter-spacing:.06em;margin-bottom:.8rem">Shrutam</p>
    <h1>Learn English Speaking — Free</h1>
    <p>50-day course designed for Indian learners. Choose your language and start speaking English confidently.</p>
    <p class="subtitle">750+ words · Real dialogues · Audio lessons · Quizzes · 100% Free</p>
  </div>
</header>

<div class="container">

{THEME_PICKER_HTML}

<h2 style="text-align:center;margin:2rem 0 1rem;font-size:1.2rem;color:var(--text-secondary)">Choose Your Language</h2>

{lang_cards}

<div class="features">
  <div class="feature">
    <div class="icon">🎧</div>
    <h3>Audio Lessons</h3>
    <p>Listen to SAAVI explain every word and sentence in your language</p>
  </div>
  <div class="feature">
    <div class="icon">💬</div>
    <h3>Real Dialogues</h3>
    <p>Practice with real-life conversations — shops, offices, hospitals</p>
  </div>
  <div class="feature">
    <div class="icon">📝</div>
    <h3>Daily Quizzes</h3>
    <p>Flashcards, true/false, MCQ — test what you learned</p>
  </div>
  <div class="feature">
    <div class="icon">🎯</div>
    <h3>Common Mistakes</h3>
    <p>Fix the English mistakes that Indian speakers make most</p>
  </div>
</div>

</div>

<footer>
  <div class="container">
    &copy; Shrutam · Free English Speaking Course for India ·
    <a href="{SITE}/privacy/">Privacy</a>
  </div>
</footer>

</body>
</html>"""


# ── Sitemap ──────────────────────────────────────────────────────────────────
def render_sitemap(by_lang: dict) -> str:
    today = datetime.now().strftime('%Y-%m-%d')
    urls = []

    # Master + language landings
    urls.append(f'  <url><loc>{SITE}/learn-english/</loc><changefreq>weekly</changefreq><priority>1.0</priority><lastmod>{today}</lastmod></url>')
    for lang in ['hi', 'mr', 'te']:
        urls.append(f'  <url><loc>{SITE}/learn-english/{LANG_LABEL[lang]}/</loc><changefreq>weekly</changefreq><priority>0.9</priority><lastmod>{today}</lastmod></url>')

    # Day pages
    for lang in ['hi', 'mr', 'te']:
        for d in by_lang.get(lang, []):
            slug = d['url_slug']
            lw = LANG_LABEL[lang]
            urls.append(f'  <url><loc>{SITE}/learn-english/{lw}/{slug}/</loc><changefreq>monthly</changefreq><priority>0.8</priority><lastmod>{today}</lastmod></url>')

    return f"""<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
{chr(10).join(urls)}
</urlset>"""


# ── Main ─────────────────────────────────────────────────────────────────────
def main():
    by_lang = load_pages()
    total = sum(len(v) for v in by_lang.values())
    print(f"Loaded {total} pages across {len(by_lang)} languages")

    OUT_DIR.mkdir(parents=True, exist_ok=True)

    # Language landing pages
    for lang in ['hi', 'mr', 'te']:
        days = by_lang.get(lang, [])
        if not days:
            continue
        lw = LANG_LABEL[lang]
        out_dir = OUT_DIR / lw
        out_dir.mkdir(parents=True, exist_ok=True)
        out_file = out_dir / 'index.html'
        out_file.write_text(render_lang_landing(lang, days), encoding='utf-8')
        print(f"  ✓ /learn-english/{lw}/  ({len(days)} days, {out_file.stat().st_size // 1024} KB)")

    # Master landing
    master = OUT_DIR / 'index.html'
    master.write_text(render_master_landing(by_lang), encoding='utf-8')
    print(f"  ✓ /learn-english/  (master landing, {master.stat().st_size // 1024} KB)")

    # Sitemap
    sitemap = OUT_DIR / 'sitemap.xml'
    sitemap.write_text(render_sitemap(by_lang), encoding='utf-8')
    url_count = sum(len(v) for v in by_lang.values()) + 4  # +4 for landing pages
    print(f"  ✓ sitemap.xml  ({url_count} URLs)")

    print(f"\nDeploy:")
    print(f"  rsync -av outputs/seo/ user@srv939.hstgr.io:/public_html/learn-english/")


if __name__ == '__main__':
    main()
