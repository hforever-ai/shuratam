#!/usr/bin/env python3
"""
generate_seo_pages.py — Generate static HTML pages for all imported days.

Each page is a fully self-contained, Cloudflare-cacheable HTML file:
  outputs/seo/{lang}/day-N-{slug}/index.html

Deploy to Hostinger webroot:
  rsync -av outputs/seo/ user@server:/public_html/learn-english/

Cloudflare caches static .html files automatically — no Page Rules needed.
When content changes: re-generate + rsync + CF purge (optional, file already updated).

Usage:
  python3 scripts/generate_seo_pages.py              # all imported days
  python3 scripts/generate_seo_pages.py --lang hi    # one language
  python3 scripts/generate_seo_pages.py --lang hi --day 1  # one day
"""

import argparse
import json
import re
import sys
from pathlib import Path
from html import escape

REPO_DIR = Path(__file__).resolve().parent.parent
OUT_DIR  = REPO_DIR / 'outputs' / 'seo'

LANG_LABEL = {'hi': 'hindi', 'mr': 'marathi', 'te': 'telugu'}
LANG_FULL  = {'hi': 'Hindi',  'mr': 'Marathi',  'te': 'Telugu'}
SITE_ORIGIN = 'https://shrutam.ai'

# ── DB (same helper as import_day_v4.py) ──────────────────────────────────────
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
    )


# ── Load from local JSON files (no DB needed for generation) ──────────────────
def load_day(lang: str, day: int):
    p = REPO_DIR / 'outputs' / 'days' / lang / f"day_{day:02d}.json"
    if not p.exists():
        return None
    return json.loads(p.read_text())


def load_seo_meta(data: dict, lang: str, day: int) -> dict:
    seo = data.get('seo', {})
    slug = seo.get('url_slug') or f"day-{day}-{LANG_LABEL.get(lang, lang)}"
    return {
        'slug':         slug,
        'meta_title':   seo.get('meta_title', f'Day {day} - Shrutam'),
        'meta_desc':    seo.get('meta_description', ''),
        'h1':           seo.get('h1_heading', data.get('title', f'Day {day}')),
        'keywords':     ', '.join(seo.get('keywords', [])),
        'schema':       seo.get('schema_markup', {}),
        'search_intent': seo.get('search_intent', []),
        'canonical':    f"{SITE_ORIGIN}/learn-english/{LANG_LABEL.get(lang, lang)}/{slug}/",
    }


# ── HTML rendering helpers ─────────────────────────────────────────────────────
def e(text) -> str:
    """HTML-escape a value."""
    return escape(str(text or ''), quote=True)


def render_word_card(w: dict, lang: str) -> str:
    wn = w.get('word_number', 1)
    word = e(w.get('word', ''))
    pron = e(w.get('pronunciation', ''))
    meaning = e(w.get('meaning', ''))
    examples_html = ''
    for ex in w.get('examples', []):
        eng  = e(ex.get('english', ''))
        pr   = e(ex.get('pronunciation', ''))
        tr   = e(ex.get('translation', ''))
        saavi = e(ex.get('saavi_explanation', ''))
        examples_html += f"""
        <div class="example">
          <p class="ex-english">"{eng}" <span class="pron">{pr}</span></p>
          <p class="ex-trans">{tr}</p>
          {f'<p class="ex-saavi">{saavi}</p>' if saavi else ''}
        </div>"""
    cm = w.get('common_mistake', {})
    mistake_html = ''
    if cm:
        wrong = e(cm.get('wrong', ''))
        right = e(cm.get('right', ''))
        why   = e(cm.get('why_wrong', ''))
        mistake_html = f"""
        <div class="mistake">
          <span class="wrong">❌ {wrong}</span>
          <span class="right">✅ {right}</span>
          <p>{why}</p>
        </div>"""
    return f"""
    <article class="word-card" id="word-{wn}">
      <h3>{wn}. {word} <span class="pron">({pron})</span></h3>
      <p class="meaning">{meaning}</p>
      {examples_html}
      {mistake_html}
    </article>"""


def render_page(lang: str, day: int, data: dict) -> str:
    seo = load_seo_meta(data, lang, day)
    lang_full = LANG_FULL.get(lang, lang.upper())

    # Word teaching
    words = (data.get('tab_1_video', {})
                 .get('content', {})
                 .get('word_teaching', []))
    words_html = ''.join(render_word_card(w, lang) for w in words)

    # Listen & Repeat
    sentences = (data.get('tab_2_listen_repeat', {})
                     .get('content', {})
                     .get('sentences', []))
    sent_html = ''.join(
        f'<li>{e(s.get("english",""))} — <span class="pron">{e(s.get("pronunciation",""))}</span>'
        f'<br><small>{e(s.get("translation",""))}</small></li>'
        for s in sentences
    )

    # Dialogue
    dialogue = (data.get('tab_3_dialogue', {})
                    .get('content', {})
                    .get('dialogue', []))
    dlg_html = ''
    for line in dialogue:
        char = e(line.get('character_id') or line.get('speaker') or 'SAAVI')
        eng  = e(line.get('english', ''))
        pr   = e(line.get('pronunciation', ''))
        tr   = e(line.get('translation', ''))
        dlg_html += f"""
        <div class="dlg-line">
          <strong>{char}:</strong>
          <span class="eng">{eng}</span>
          <span class="pron">{pr}</span>
          <em>{tr}</em>
        </div>"""

    # Summary key points
    key_points = (data.get('tab_4_summary', {})
                      .get('content', {})
                      .get('key_points', []))
    kp_html = ''.join(
        f'<li>{e(kp.get("text", kp) if isinstance(kp, dict) else kp)}</li>'
        for kp in key_points
    )

    # Quiz — flashcards + T/F + MCQ for content richness
    quiz = data.get('tab_5_quiz', {}).get('content', {})
    flash_html = ''.join(
        f'<dt>{e(fc.get("front",""))}</dt><dd>{e(fc.get("back",""))}</dd>'
        for fc in quiz.get('flashcards', [])
    )
    tf_html = ''.join(
        f'<li>{e(item.get("statement",""))} — <strong>{"True ✓" if item.get("answer") else "False ✗"}</strong></li>'
        for item in quiz.get('true_false', [])
    )

    # Prev / next day links
    prev_link = (f'<a href="{SITE_ORIGIN}/learn-english/{LANG_LABEL.get(lang,"")}/day-{day-1}-{"" + LANG_LABEL.get(lang,"")}-previous/" rel="prev">← Day {day-1}</a>'
                 if day > 1 else '')
    next_link = (f'<a href="{SITE_ORIGIN}/learn-english/{LANG_LABEL.get(lang,"")}/day-{day+1}-{"" + LANG_LABEL.get(lang,"")}-next/" rel="next">Day {day+1} →</a>'
                 if day < 50 else '')

    # JSON-LD
    schema = seo['schema']
    schema.update({
        '@context': 'https://schema.org',
        'name': seo['meta_title'],
        'description': seo['meta_desc'],
        'url': seo['canonical'],
        'provider': {'@type': 'Organization', 'name': 'Shrutam'},
    })
    schema_json = json.dumps(schema, ensure_ascii=False, indent=2)

    # Search intent as FAQ schema
    faq_items = ''.join(
        f'{{"@type":"Question","name":{json.dumps(q)},"acceptedAnswer":{{"@type":"Answer","text":"Shrutam Day {day} covers this topic in detail."}}}},'
        for q in seo['search_intent']
    ).rstrip(',')
    faq_schema = f'{{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{faq_items}]}}'

    from shrutam_theme import THEME_CSS, THEME_JS, THEME_PICKER_HTML

    return f"""<!DOCTYPE html>
<html lang="{lang}-IN" data-theme="navy">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{e(seo['meta_title'])}</title>
  <meta name="description" content="{e(seo['meta_desc'])}">
  <meta name="keywords" content="{e(seo['keywords'])}">
  <link rel="canonical" href="{e(seo['canonical'])}">
  <meta property="og:title" content="{e(seo['meta_title'])}">
  <meta property="og:description" content="{e(seo['meta_desc'])}">
  <meta property="og:url" content="{e(seo['canonical'])}">
  <meta property="og:type" content="article">
  <meta name="robots" content="index, follow">
  <meta http-equiv="Cache-Control" content="public, max-age=86400, s-maxage=604800">

  <script type="application/ld+json">{schema_json}</script>
  <script type="application/ld+json">{faq_schema}</script>

  <style>
{THEME_CSS}
    .container{{max-width:900px;margin:0 auto;padding:0 1.2rem}}
    .page-header{{background:var(--bg-surface);border:1px solid var(--border-subtle);padding:1.5rem;border-radius:var(--radius-lg);margin-bottom:1.5rem}}
    .page-header h1{{font-size:1.5rem;margin-bottom:.3rem}}
    .page-header p{{color:var(--text-secondary);font-size:.95rem}}
    nav.breadcrumb{{font-size:.85rem;color:var(--text-muted);margin-bottom:1rem;padding:.8rem 0}}
    nav.breadcrumb a{{color:var(--primary-light)}}
    h2{{font-size:1.2rem;border-left:4px solid var(--accent);padding-left:.8rem;margin:1.8rem 0 .8rem;color:var(--text-primary)}}
    .word-card{{background:var(--bg-surface);border:1px solid var(--border-subtle);border-radius:var(--radius);padding:1rem;margin:.8rem 0}}
    .word-card h3{{font-size:1.1rem;color:var(--accent-light)}}
    .meaning{{font-size:1rem;color:var(--text-body);margin:.3rem 0 .6rem}}
    .pron{{color:var(--text-muted);font-style:italic;font-size:.9em}}
    .example{{background:var(--bg-elevated);border-left:3px solid var(--primary);padding:.5rem .8rem;margin:.4rem 0;border-radius:0 var(--radius-sm) var(--radius-sm) 0}}
    .ex-english{{font-weight:600;color:var(--text-primary)}}
    .ex-trans{{color:var(--text-secondary);font-size:.9em}}
    .ex-saavi{{color:var(--text-muted);font-size:.88em;font-style:italic;margin-top:.2rem}}
    .mistake{{background:var(--bg-elevated);border:1px solid rgba(239,68,68,0.3);border-radius:var(--radius-sm);padding:.6rem .8rem;margin:.5rem 0;font-size:.9em}}
    .wrong{{color:var(--error);display:block;margin-bottom:.2rem}}
    .right{{color:var(--success);display:block;margin-bottom:.3rem}}
    ol.sentences{{padding-left:1.3rem;color:var(--text-body)}}
    ol.sentences li{{margin:.4rem 0;font-size:.95rem}}
    ol.sentences small{{color:var(--text-secondary)}}
    .dlg-line{{padding:.6rem .8rem;margin:.3rem 0;background:var(--bg-surface);border:1px solid var(--border-subtle);border-radius:var(--radius-sm)}}
    .dlg-line strong{{color:var(--accent)}}
    .dlg-line .eng{{font-weight:600;color:var(--text-primary);margin-left:.4rem}}
    .dlg-line .pron{{color:var(--text-muted)}}
    .dlg-line em{{color:var(--text-secondary);display:block;font-size:.88em;margin-top:.1rem}}
    ul.kp{{padding-left:1.3rem;color:var(--text-body)}}
    ul.kp li{{margin:.4rem 0}}
    dl.flash{{display:grid;grid-template-columns:1fr 1fr;gap:.4rem}}
    dt{{font-weight:700;background:var(--bg-elevated);color:var(--text-primary);padding:.4rem .6rem;border-radius:var(--radius-sm)}}
    dd{{padding:.4rem .6rem;border-radius:var(--radius-sm);background:var(--bg-surface);color:var(--text-body);border:1px solid var(--border-subtle)}}
    ul.tf{{padding-left:1.3rem;list-style:disc;color:var(--text-body)}}
    ul.tf li{{margin:.3rem 0;font-size:.9rem}}
    nav.day-nav{{display:flex;justify-content:space-between;margin:2rem 0;padding-top:1rem;border-top:1px solid var(--border-subtle)}}
    nav.day-nav a{{color:var(--primary-light);font-weight:600}}
    .cta{{background:var(--bg-surface);border:1px solid var(--accent-glow);text-align:center;padding:1.5rem;border-radius:var(--radius-lg);margin:2rem 0}}
    .cta p{{color:var(--text-primary)}}
    .cta a{{color:var(--accent);font-weight:700;font-size:1.1rem}}
    footer{{font-size:.8rem;color:var(--text-muted);text-align:center;padding:1rem 0;border-top:1px solid var(--border-subtle);margin-top:2rem}}
    footer a{{color:var(--primary-light)}}
  </style>
  <script>{THEME_JS}</script>
</head>
<body>
<div class="container">

<nav class="breadcrumb">
  <a href="{SITE_ORIGIN}/">Shrutam</a> &rsaquo;
  <a href="{SITE_ORIGIN}/learn-english/">Learn English</a> &rsaquo;
  <a href="{SITE_ORIGIN}/learn-english/{LANG_LABEL.get(lang,'')}/">{lang_full}</a> &rsaquo;
  Day {day}
</nav>

{THEME_PICKER_HTML}

<div class="page-header">
  <p style="font-size:.8rem;color:var(--text-muted);text-transform:uppercase;letter-spacing:.05em">Shrutam · Free English Course · {lang_full}</p>
  <h1>{e(seo['h1'])}</h1>
  <p>Day {day} of 50 &nbsp;·&nbsp; {e(data.get('total_duration_minutes', 20))} minutes &nbsp;·&nbsp; {len(words)} words</p>
</div>

<h2>What You'll Learn Today</h2>
<p style="color:var(--text-body)">{e(data.get('tab_1_video', {}).get('content', {}).get('concept', {}).get('saavi_intro', ''))}</p>

<h2>15 Important Words — {lang_full}</h2>
{words_html}

<h2>Listen &amp; Repeat — Practice Sentences</h2>
<ol class="sentences">{sent_html}</ol>

<h2>Real Conversation — Dialogue</h2>
{dlg_html}

<h2>Summary — Key Points</h2>
<ul class="kp">{kp_html}</ul>

<h2>Flashcards</h2>
<dl class="flash">{flash_html}</dl>

<h2>True / False Practice</h2>
<ul class="tf">{tf_html}</ul>

<div class="cta">
  <p style="font-size:1.1rem;margin-bottom:.5rem">Audio + Quiz — Listen &amp; Practice Free</p>
  <a href="{SITE_ORIGIN}/learn-english/{LANG_LABEL.get(lang,'')}/{seo['slug'].rsplit('-' + LANG_LABEL.get(lang,''), 1)[0]}/play/">→ Start Listening</a>
</div>

<nav class="day-nav">
  {prev_link}
  <a href="{SITE_ORIGIN}/learn-english/{LANG_LABEL.get(lang,'')}/">All {lang_full} Days</a>
  {next_link}
</nav>

</div>

<footer>
  <div class="container">
  © Shrutam · Free English Speaking Course for {lang_full} speakers ·
  <a href="{SITE_ORIGIN}/privacy/">Privacy</a>
  </div>
</footer>

</body>
</html>"""


# ── Main ───────────────────────────────────────────────────────────────────────
def main():
    parser = argparse.ArgumentParser(description='Generate static SEO HTML pages')
    parser.add_argument('--lang', choices=['hi', 'mr', 'te'], help='Filter to one lang')
    parser.add_argument('--day', type=int, help='Filter to one day')
    args = parser.parse_args()

    langs = [args.lang] if args.lang else ['hi', 'mr', 'te']
    days  = [args.day]  if args.day  else list(range(1, 51))

    generated = 0
    skipped   = 0

    for lang in langs:
        for day in days:
            data = load_day(lang, day)
            if data is None:
                skipped += 1
                continue

            seo_meta = load_seo_meta(data, lang, day)
            out_dir  = OUT_DIR / LANG_LABEL.get(lang, lang) / seo_meta['slug']
            out_file = out_dir / 'index.html'
            out_dir.mkdir(parents=True, exist_ok=True)

            html = render_page(lang, day, data)
            out_file.write_text(html, encoding='utf-8')

            size_kb = out_file.stat().st_size // 1024
            print(f"✓ {lang} Day {day:2d}  {seo_meta['slug'][:55]:<55}  {size_kb} KB")
            generated += 1

    print()
    print(f"Generated: {generated}  |  Skipped (no JSON): {skipped}")
    if generated:
        print(f"Output: {OUT_DIR}/")
        print()
        print("Deploy to Hostinger:")
        print(f"  rsync -av outputs/seo/ user@srv939.hstgr.io:/public_html/learn-english/")
        print()
        print("Add to .htaccess (if not already):")
        print("  RewriteRule ^learn-english/(.+)/$ learn-english/$1/index.html [L]")


if __name__ == '__main__':
    main()
