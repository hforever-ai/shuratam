#!/usr/bin/env python3
"""
generate_player_pages.py — Scene-based SAAVI video player (static HTML).

Design (see Downloads/spoken english/shrutam_svg_player_demo.html):
  - 16:9 player area with animated scene transitions
  - SAAVI SVG character on intro/section scenes
  - Per-scene Gemini TTS audio (R2) — auto-advance on audio end
  - Section nav tabs: Words | Listen | Dialogue | Summary | Quiz
  - Quiz rendered below player (pre-rendered, no innerHTML)
  - Progress saved to localStorage + /api/progress.php

All scene HTML is pre-rendered by Python.  JS handles only:
  show/hide scenes, play audio queue, advance, track progress.

Usage:
  python3 scripts/generate_player_pages.py --lang hi --day 1
  python3 scripts/generate_player_pages.py --lang hi --all
  python3 scripts/generate_player_pages.py --all
"""

import argparse
import html as _html
import json
import random
from pathlib import Path

REPO_DIR    = Path(__file__).resolve().parent.parent
SITE_ORIGIN = 'https://shrutam.ai'
R2_BASE     = 'https://audio.shrutam.ai'

LANG_META = {
    'hi': {'label': 'हिंदी',    'name': 'Hindi',   'flag': '🇮🇳', 'html_lang': 'hi-IN'},
    'mr': {'label': 'मराठी',   'name': 'Marathi',  'flag': '🏛️',  'html_lang': 'mr'},
    'te': {'label': 'తెలుగు', 'name': 'Telugu',   'flag': '🌾',  'html_lang': 'te'},
}

# ── helpers ──────────────────────────────────────────────────────────────────

def esc(s): return _html.escape(str(s or ''))

def au(lang: str, day: int, key: str) -> str:
    return f"{R2_BASE}/tts/{lang}/day_{day:02d}/{key}.mp3"

def ex_field(d: dict, *keys):
    for k in keys:
        v = d.get(k, '')
        if v: return v
    return ''

# ── SAAVI SVG ─────────────────────────────────────────────────────────────────
SAAVI_SVG = '''<svg viewBox="0 0 200 200" width="120" height="120" class="saavi-svg" aria-hidden="true">
  <circle cx="100" cy="100" r="95" fill="#1A0A04" stroke="#F5A623" stroke-width="2"/>
  <ellipse cx="100" cy="90" rx="52" ry="48" fill="#2C1810"/>
  <ellipse cx="100" cy="106" rx="40" ry="46" fill="#C8845A"/>
  <path d="M62,78 Q100,55 138,78 Q132,90 118,85 Q100,80 82,85 Q68,90 62,78" fill="#1A0E0A"/>
  <ellipse cx="84"  cy="98" rx="5" ry="4" fill="white"/>
  <circle  cx="84"  cy="99" r="2.5" fill="#1a6bb5"/>
  <ellipse cx="116" cy="98" rx="5" ry="4" fill="white"/>
  <circle  cx="116" cy="99" r="2.5" fill="#1a6bb5"/>
  <circle cx="100" cy="81" r="3" fill="#C0392B"/>
  <path d="M86,122 Q100,133 114,122" stroke="#8B3A3A" stroke-width="2.5" fill="none" stroke-linecap="round"/>
  <circle cx="74"  cy="116" r="7" fill="#E8917A" opacity="0.35"/>
  <circle cx="126" cy="116" r="7" fill="#E8917A" opacity="0.35"/>
  <path d="M68,158 L132,158 L138,200 L62,200 Z" fill="#3B82F6"/>
  <path d="M88,158 Q100,168 112,158" stroke="#93C5FD" stroke-width="2" fill="none"/>
  <animate attributeName="opacity" values="1;0.92;1" dur="3s" repeatCount="indefinite"/>
</svg>'''

# ── scene div wrapper ─────────────────────────────────────────────────────────

def scene_div(idx: int, stype: str, audios: list, inner: str, active: bool = False) -> str:
    cls  = 'scene active' if active else 'scene'
    attrs = f'id="sc{idx}" class="{cls}" data-type="{stype}"'
    for i, url in enumerate(audios, 1):
        attrs += f' data-a{i}="{esc(url)}"'
    return f'<div {attrs}>{inner}</div>\n'

# ── individual scene renderers ────────────────────────────────────────────────

def render_intro(idx, day, title, title_en):
    inner = f'''<div class="si-wrap">
      {SAAVI_SVG}
      <div class="si-day">Day {day}</div>
      <h1 class="si-title">{esc(title)}</h1>
      <p  class="si-sub">{esc(title_en)}</p>
      <div class="si-hint">▶ Play करें</div>
    </div>'''
    return scene_div(idx, 'intro', [], inner, active=True)


def render_section_header(idx, title, subtitle):
    inner = f'''<div class="si-wrap">
      {SAAVI_SVG}
      <h2 class="si-title">{esc(title)}</h2>
      <p  class="si-sub">{esc(subtitle)}</p>
    </div>'''
    return scene_div(idx, 'section', [], inner)


def render_word(idx, wi, word_obj, lang, day):
    ww   = f"{wi:02d}"
    word = esc(ex_field(word_obj, 'word', 'english'))
    pron = esc(ex_field(word_obj, 'pronunciation', 'hindi_pronunciation'))
    mean = esc(ex_field(word_obj, 'meaning', 'hindi_meaning', 'source_meaning'))
    exs  = word_obj.get('examples', [])

    ex_items = ''
    for ei, ex in enumerate(exs[:5], 1):
        en = esc(ex_field(ex, 'sentence', 'english', 'en'))
        tr = esc(ex_field(ex, 'translation', 'hindi_translation', 'source_translation'))
        ex_items += (
            f'<div class="ex-row">'
            f'<span class="ex-num">{ei}</span>'
            f'<span class="ex-en">"{en}"</span>'
            f'<span class="ex-tr">{tr}</span>'
            f'</div>'
        )

    audios = [
        au(lang, day, f"t1_w{ww}_ex01_en"),
        au(lang, day, f"t1_w{ww}_ex01_saavi"),
    ]
    inner = f'''<div class="word-wrap">
      <div class="word-main">
        <div class="w-word">{word}</div>
        <div class="w-pron">({pron})</div>
        <div class="w-mean">{mean}</div>
      </div>
      <div class="word-exs">{ex_items}</div>
    </div>'''
    return scene_div(idx, 'word', audios, inner)


def render_mistake(idx, wi, word_obj, lang, day):
    ww      = f"{wi:02d}"
    word    = esc(ex_field(word_obj, 'word', 'english'))
    mistake = word_obj.get('common_mistake', {})
    wrong   = esc(ex_field(mistake, 'wrong', 'wrong_sentence'))
    right   = esc(ex_field(mistake, 'right', 'correct_sentence', 'right_sentence'))
    tip     = esc(ex_field(mistake, 'why_wrong', 'saavi_tip', 'tip', 'explanation'))
    if not wrong and not right:
        return ''
    audios = [
        au(lang, day, f"t1_w{ww}_mistake_wrong"),
        au(lang, day, f"t1_w{ww}_mistake_right"),
        au(lang, day, f"t1_w{ww}_mistake_saavi"),
    ]
    inner = f'''<div class="mis-wrap">
      <div class="mis-head">⚠️ Common Mistake — <em>{word}</em></div>
      <div class="mis-pair">
        <div class="mis-wrong"><div class="mis-icon">❌</div><div class="mis-text">{wrong}</div></div>
        <div class="mis-right"><div class="mis-icon">✅</div><div class="mis-text">{right}</div></div>
      </div>
      <div class="mis-tip">{tip}</div>
    </div>'''
    return scene_div(idx, 'mistake', audios, inner)


def render_listen(idx, si, sent, lang, day):
    ss   = f"{si:02d}"
    en   = esc(ex_field(sent, 'english', 'en', 'sentence'))
    pron = esc(ex_field(sent, 'pronunciation', 'hindi_pronunciation'))
    tr   = esc(ex_field(sent, 'translation', 'hindi_translation', 'source_translation'))
    audios = [au(lang, day, f"t2_s{ss}_v")]
    inner = f'''<div class="listen-wrap">
      <div class="listen-num">Sentence {si}</div>
      <div class="listen-en">"{en}"</div>
      <div class="listen-pron">({pron})</div>
      <div class="listen-tr">{tr}</div>
      <div class="listen-hint">🎧 सुनिए और दोहराइए</div>
    </div>'''
    return scene_div(idx, 'listen', audios, inner)


def render_dialogue(idx, li, line, lang, day):
    ll      = f"{li:02d}"
    speaker = esc(ex_field(line, 'character_id', 'speaker', 'character')).replace('char_', 'Person ')
    en      = esc(ex_field(line, 'english', 'en'))
    pron    = esc(ex_field(line, 'pronunciation', 'hindi_pronunciation'))
    tr      = esc(ex_field(line, 'translation', 'hindi_translation', 'source_translation'))
    audios  = [
        au(lang, day, f"t3_d{ll}_v"),
        au(lang, day, f"t3_d{ll}_saavi"),
    ]
    inner = f'''<div class="dlg-wrap">
      <div class="dlg-speaker">{speaker}</div>
      <div class="dlg-en">"{en}"</div>
      <div class="dlg-pron">({pron})</div>
      <div class="dlg-tr">{tr}</div>
    </div>'''
    return scene_div(idx, 'dialogue', audios, inner)


def render_summary(idx, tab4, lang, day):
    points  = tab4.get('points', tab4.get('key_points', []))
    closing = esc(tab4.get('saavi_closing', ''))
    pts_html = ''
    for i, pt in enumerate(points[:6], 1):
        text = pt if isinstance(pt, str) else ex_field(pt, 'text', 'en', 'english')
        pts_html += f'<div class="sum-pt"><span class="sum-num">{i}</span><span class="sum-text">{esc(text)}</span></div>'
    audios = [au(lang, day, 't4_summary_saavi')]
    inner = f'''<div class="sum-wrap">
      <div class="sum-title">🎯 आज की सीख</div>
      <div class="sum-pts">{pts_html}</div>
      {f'<div class="sum-closing">{closing}</div>' if closing else ''}
    </div>'''
    return scene_div(idx, 'summary', audios, inner)


def render_quiz_html(tab5, lang_name):
    flashcards  = list(tab5.get('flashcards', []))[:8]
    tf_items    = list(tab5.get('true_false', []))[:5]
    mcq_items   = list(tab5.get('mcq', []))[:5]
    # match_the_column is a dict with 'pairs' key
    mtc         = tab5.get('match_the_column', {})
    match_items = list(mtc.get('pairs', []))[:5] if isinstance(mtc, dict) else []

    # Flashcards
    fc_html = ''
    for fc in flashcards:
        front = esc(ex_field(fc, 'front', 'word', 'english'))
        back  = esc(ex_field(fc, 'back', 'meaning', 'translation'))
        fc_html += (
            f'<div class="fc-card" onclick="this.classList.toggle(\'flipped\')">'
            f'<div class="fc-front">{front}</div>'
            f'<div class="fc-back">{back}</div>'
            f'</div>'
        )

    # True/False — answer is a Python bool
    tf_html = ''
    for q in tf_items:
        stmt   = esc(ex_field(q, 'statement', 'question'))
        answer = 'true' if q.get('answer', True) else 'false'
        tf_html += (
            f'<div class="tf-item">'
            f'<p class="tf-stmt">{stmt}</p>'
            f'<div class="tf-btns">'
            f'<button class="tf-btn" data-val="true"  data-correct="{answer}" onclick="checkTF(this)">True ✓</button>'
            f'<button class="tf-btn" data-val="false" data-correct="{answer}" onclick="checkTF(this)">False ✗</button>'
            f'</div></div>'
        )

    # MCQ — options are dicts with 'text' and 'is_correct'
    mcq_html = ''
    for i, q in enumerate(mcq_items, 1):
        qtext = esc(ex_field(q, 'question'))
        opts  = q.get('options', [])
        opts_html = ''
        for o in opts:
            otext   = esc(o.get('text', str(o)) if isinstance(o, dict) else str(o))
            correct = 'true' if (isinstance(o, dict) and o.get('is_correct')) else 'false'
            opts_html += f'<button class="mcq-opt" data-correct="{correct}" onclick="checkMCQBool(this)">{otext}</button>'
        mcq_html += f'<div class="mcq-item"><p class="mcq-q">Q{i}. {qtext}</p><div class="mcq-opts">{opts_html}</div></div>'

    # Matching — pairs have 'left' and 'right' keys
    if match_items:
        lefts    = [ex_field(m, 'left', 'english', 'english_phrase') for m in match_items]
        rights   = [ex_field(m, 'right', 'translation', 'hindi') for m in match_items]
        shuffled = rights[:]
        random.shuffle(shuffled)
        left_html  = ''.join(f'<div class="match-item">{esc(t)}</div>' for t in lefts)
        right_html = ''.join(
            f'<div class="match-item match-right" data-answer="{esc(rights[i])}" onclick="checkMatch(this)">{esc(shuffled[i])}</div>'
            for i in range(len(shuffled))
        )
        match_html = f'<div class="match-cols"><div class="match-col">{left_html}</div><div class="match-col">{right_html}</div></div>'
    else:
        match_html = '<p style="color:#888">No matching items.</p>'

    return f'''<div class="quiz-wrap">
  <div class="quiz-hdr">📝 Practice Quiz</div>
  <div class="quiz-tabs">
    <button class="qtab active" data-panel="flashcards">🃏 Flashcards</button>
    <button class="qtab" data-panel="tf">✔ True/False</button>
    <button class="qtab" data-panel="mcq">📝 MCQ</button>
    <button class="qtab" data-panel="match">🔗 Match</button>
  </div>
  <div class="qpanel" id="qp-flashcards">
    <p class="quiz-hint">Card पर click करें — flip होगा</p>
    <div class="fc-grid">{fc_html}</div>
  </div>
  <div class="qpanel" id="qp-tf" style="display:none">{tf_html}</div>
  <div class="qpanel" id="qp-mcq" style="display:none">{mcq_html}</div>
  <div class="qpanel" id="qp-match" style="display:none">
    <p class="quiz-hint">English ↔ {lang_name} match करें</p>
    {match_html}
  </div>
</div>'''

# ── CSS ───────────────────────────────────────────────────────────────────────
CSS = '''
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Noto+Sans+Devanagari:wght@400;600;700&display=swap');
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --bg:#08080F;--bg2:#12121C;--bg3:#1C1C28;--bg4:#24243A;
  --acc:#F5A623;--acc2:#4ADE80;--danger:#F87171;
  --txt:#F0EDE6;--txt2:#A8A8C0;--txt3:#60607A;
  --border:rgba(255,255,255,0.07);
  --radius:14px;--font:'Nunito','Noto Sans Devanagari',sans-serif;
}
body{font-family:var(--font);background:var(--bg);color:var(--txt);min-height:100vh;line-height:1.6}
a{color:var(--acc);text-decoration:none}

/* ── HEADER ── */
.hdr{display:flex;align-items:center;gap:12px;padding:12px 16px;background:var(--bg2);
     border-bottom:1px solid var(--border);position:sticky;top:0;z-index:100}
.hdr-back{font-size:1.3rem;color:var(--txt2);padding:4px 8px;border-radius:8px;background:var(--bg3)}
.hdr-title{flex:1;font-weight:800;font-size:1rem;color:var(--txt)}
.hdr-langs{display:flex;gap:6px}
.lang-pill{padding:4px 10px;border-radius:20px;font-size:0.75rem;font-weight:700;
           background:var(--bg3);color:var(--txt2);cursor:pointer;border:1px solid var(--border)}
.lang-pill.active,.lang-pill:hover{background:var(--acc);color:#000;border-color:var(--acc)}

/* ── PLAYER AREA ── */
.player-area{padding:12px 12px 0}
.player-wrap{position:relative;aspect-ratio:16/9;background:#000;
             border-radius:var(--radius);overflow:hidden;border:1px solid var(--border)}
.scene{position:absolute;inset:0;display:none;align-items:center;justify-content:center;
       padding:20px;overflow-y:auto;animation:fadeIn 0.35s ease}
.scene.active{display:flex}
@keyframes fadeIn{from{opacity:0;transform:scale(0.97)}to{opacity:1;transform:scale(1)}}

/* intro / section header scenes */
.si-wrap{display:flex;flex-direction:column;align-items:center;text-align:center;gap:10px}
.si-day{font-size:0.8rem;font-weight:700;color:var(--acc);text-transform:uppercase;letter-spacing:.1em}
.si-title{font-size:clamp(1.1rem,3vw,1.8rem);font-weight:900;color:var(--txt)}
.si-sub{font-size:clamp(0.8rem,2vw,1rem);color:var(--txt2)}
.si-hint{font-size:0.75rem;color:var(--txt3);margin-top:4px}
.saavi-svg{animation:float 3s ease-in-out infinite}
.saavi-story-card{background:var(--bg3);border:1px solid var(--border);border-radius:var(--radius);
  padding:14px 18px;max-width:520px;margin-top:6px}
.saavi-story-text{font-size:clamp(0.8rem,2vw,0.95rem);color:var(--txt);line-height:1.7;
  font-family:'Noto Sans Devanagari',var(--font)}
.saavi-goal-text{font-size:clamp(0.75rem,1.8vw,0.88rem);color:var(--acc);margin-top:10px;
  font-weight:700;line-height:1.6}
@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}

/* word scene */
.word-wrap{display:flex;flex-direction:column;align-items:center;gap:14px;width:100%;max-width:680px}
.word-main{text-align:center;background:var(--bg3);padding:18px 28px;border-radius:var(--radius);
           border:1px solid var(--border);width:100%}
.w-word{font-size:clamp(2rem,6vw,3.5rem);font-weight:900;color:var(--acc);line-height:1.1}
.w-pron{font-size:clamp(1rem,2.5vw,1.4rem);color:#93C5FD;margin:4px 0}
.w-mean{font-size:clamp(1rem,2.5vw,1.3rem);color:var(--txt)}
.word-exs{width:100%;display:flex;flex-direction:column;gap:6px}
.ex-row{display:flex;align-items:flex-start;gap:8px;background:var(--bg3);
        padding:8px 12px;border-radius:10px;font-size:0.85rem}
.ex-num{color:var(--acc);font-weight:800;min-width:18px}
.ex-en{color:var(--txt);font-style:italic;flex:1}
.ex-tr{color:var(--txt2);font-size:0.8rem;white-space:nowrap}

/* mistake scene */
.mis-wrap{display:flex;flex-direction:column;align-items:center;gap:14px;width:100%;max-width:620px}
.mis-head{font-size:clamp(0.9rem,2.5vw,1.1rem);font-weight:800;color:var(--acc);text-align:center}
.mis-pair{display:flex;gap:14px;width:100%}
.mis-wrong,.mis-right{flex:1;padding:18px;border-radius:var(--radius);text-align:center}
.mis-wrong{background:rgba(248,113,113,0.12);border:1px solid rgba(248,113,113,0.3)}
.mis-right{background:rgba(74,222,128,0.1);border:1px solid rgba(74,222,128,0.3)}
.mis-icon{font-size:2rem;margin-bottom:6px}
.mis-text{font-size:clamp(0.9rem,2.5vw,1.2rem);font-weight:700;color:var(--txt)}
.mis-tip{font-size:0.85rem;color:var(--txt2);text-align:center;max-width:480px}

/* listen & repeat scene */
.listen-wrap{display:flex;flex-direction:column;align-items:center;text-align:center;gap:12px;max-width:560px}
.listen-num{font-size:0.75rem;font-weight:700;color:var(--acc);text-transform:uppercase}
.listen-en{font-size:clamp(1.2rem,4vw,2rem);font-weight:800;color:var(--txt)}
.listen-pron{font-size:clamp(0.85rem,2vw,1.1rem);color:#93C5FD}
.listen-tr{font-size:clamp(0.85rem,2vw,1rem);color:var(--txt2)}
.listen-hint{font-size:0.8rem;color:var(--txt3);margin-top:4px}

/* dialogue scene */
.dlg-wrap{display:flex;flex-direction:column;align-items:center;text-align:center;gap:10px;max-width:560px}
.dlg-speaker{display:inline-block;padding:3px 14px;border-radius:20px;font-size:0.75rem;font-weight:800;
             background:var(--acc);color:#000;text-transform:uppercase;letter-spacing:.05em}
.dlg-en{font-size:clamp(1.1rem,3.5vw,1.7rem);font-weight:800;color:var(--txt)}
.dlg-pron{font-size:0.9rem;color:#93C5FD}
.dlg-tr{font-size:0.9rem;color:var(--txt2)}

/* summary scene */
.sum-wrap{display:flex;flex-direction:column;align-items:center;gap:14px;width:100%;max-width:580px}
.sum-title{font-size:clamp(1.1rem,3vw,1.5rem);font-weight:900;color:var(--acc)}
.sum-pts{width:100%;display:flex;flex-direction:column;gap:8px}
.sum-pt{display:flex;align-items:flex-start;gap:10px;background:var(--bg3);
        padding:10px 14px;border-radius:10px;font-size:0.9rem}
.sum-num{font-weight:900;color:var(--acc);min-width:22px}
.sum-text{color:var(--txt)}
.sum-closing{font-size:0.85rem;color:var(--txt2);text-align:center;font-style:italic}

/* ── CONTROLS ── */
.controls{display:flex;align-items:center;gap:8px;padding:10px 12px;background:var(--bg2);
          border-top:1px solid var(--border)}
.ctrl-btn{background:var(--bg3);border:1px solid var(--border);color:var(--txt);
          padding:8px 14px;border-radius:10px;cursor:pointer;font-size:0.9rem;font-weight:700;
          transition:all .2s}
.ctrl-btn:hover{background:var(--bg4)}
.ctrl-btn.primary{background:var(--acc);color:#000;border-color:var(--acc)}
.ctrl-btn.primary:hover{background:#f0c060}
.ctrl-btn:disabled{opacity:0.35;cursor:not-allowed}
.ctrl-prog{flex:1;display:flex;flex-direction:column;gap:4px}
.prog-bar{height:5px;background:var(--bg4);border-radius:3px;overflow:hidden;cursor:pointer}
.prog-fill{height:100%;background:var(--acc);border-radius:3px;transition:width .3s;width:0%}
.prog-label{font-size:0.7rem;color:var(--txt3)}
.audio-ind{width:10px;height:10px;border-radius:50%;background:var(--txt3);transition:background .2s}
.audio-ind.playing{background:var(--acc2);animation:pulse 1s ease infinite}
@keyframes pulse{0%,100%{transform:scale(1)}50%{transform:scale(1.4)}}

/* ── SECTION TABS ── */
.sec-tabs{display:flex;gap:6px;padding:10px 12px;background:var(--bg);
          border-top:1px solid var(--border);overflow-x:auto;-webkit-overflow-scrolling:touch}
.sec-tab{flex-shrink:0;padding:7px 14px;border-radius:20px;font-size:0.8rem;font-weight:700;
         background:var(--bg3);color:var(--txt2);border:1px solid var(--border);cursor:pointer;
         transition:all .2s}
.sec-tab.active,.sec-tab:hover{background:var(--acc);color:#000;border-color:var(--acc)}

/* ── QUIZ AREA ── */
#quiz-area{padding:16px 12px 40px;display:none}
.quiz-wrap{background:var(--bg2);border-radius:var(--radius);border:1px solid var(--border);overflow:hidden}
.quiz-hdr{padding:14px 20px;font-size:1.1rem;font-weight:800;color:var(--acc);
          border-bottom:1px solid var(--border)}
.quiz-tabs{display:flex;gap:6px;padding:12px 16px;border-bottom:1px solid var(--border);
           overflow-x:auto}
.qtab{padding:6px 14px;border-radius:20px;font-size:0.78rem;font-weight:700;
      background:var(--bg3);color:var(--txt2);border:1px solid var(--border);cursor:pointer;
      white-space:nowrap}
.qtab.active{background:var(--acc);color:#000;border-color:var(--acc)}
.qpanel{padding:16px}
.quiz-hint{font-size:0.8rem;color:var(--txt3);margin-bottom:12px}
/* flashcards */
.fc-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(130px,1fr));gap:10px}
.fc-card{background:var(--bg3);border:1px solid var(--border);border-radius:var(--radius);
         min-height:90px;display:flex;align-items:center;justify-content:center;
         text-align:center;cursor:pointer;padding:12px;position:relative;
         transition:transform .2s;font-weight:700}
.fc-card:hover{transform:scale(1.03)}
.fc-card .fc-back{display:none;color:var(--acc)}
.fc-card.flipped .fc-front{display:none}
.fc-card.flipped .fc-back{display:block}
/* true/false */
.tf-item{background:var(--bg3);border:1px solid var(--border);border-radius:var(--radius);
         padding:14px;margin-bottom:10px}
.tf-stmt{font-size:0.9rem;color:var(--txt);margin-bottom:10px}
.tf-btns{display:flex;gap:8px}
.tf-btn{flex:1;padding:8px;border-radius:8px;font-size:0.85rem;font-weight:700;cursor:pointer;
        background:var(--bg4);color:var(--txt2);border:1px solid var(--border)}
.tf-btn.correct{background:rgba(74,222,128,0.2);color:var(--acc2);border-color:var(--acc2)}
.tf-btn.wrong{background:rgba(248,113,113,0.2);color:var(--danger);border-color:var(--danger)}
/* mcq */
.mcq-item{background:var(--bg3);border:1px solid var(--border);border-radius:var(--radius);
          padding:14px;margin-bottom:12px}
.mcq-q{font-size:0.9rem;color:var(--txt);margin-bottom:10px;font-weight:600}
.mcq-opts{display:flex;flex-direction:column;gap:6px}
.mcq-opt{padding:8px 12px;border-radius:8px;font-size:0.85rem;text-align:left;cursor:pointer;
         background:var(--bg4);color:var(--txt2);border:1px solid var(--border)}
.mcq-opt.correct{background:rgba(74,222,128,0.2);color:var(--acc2);border-color:var(--acc2)}
.mcq-opt.wrong{background:rgba(248,113,113,0.2);color:var(--danger);border-color:var(--danger)}
/* matching */
.match-cols{display:grid;grid-template-columns:1fr 1fr;gap:8px}
.match-col{display:flex;flex-direction:column;gap:6px}
.match-item{padding:8px 12px;border-radius:8px;font-size:0.85rem;font-weight:600;
            background:var(--bg3);color:var(--txt);border:1px solid var(--border);text-align:center}
.match-right{cursor:pointer}
.match-right:hover{border-color:var(--acc)}
.match-right.correct{background:rgba(74,222,128,0.2);color:var(--acc2);border-color:var(--acc2)}
.match-right.wrong{background:rgba(248,113,113,0.2);color:var(--danger);border-color:var(--danger)}

/* ── COMPLETION BANNER ── */
.complete-banner{display:none;margin:12px;padding:16px;background:rgba(74,222,128,0.1);
                 border:1px solid var(--acc2);border-radius:var(--radius);text-align:center;color:var(--acc2)}
/* responsive */
@media(max-width:480px){
  .mis-pair{flex-direction:column}
  .hdr-title{font-size:0.85rem}
}
'''

# ── JS ────────────────────────────────────────────────────────────────────────
JS_TMPL = '''
const LANG = '{lang}';
const DAY  = {day};
const TOTAL = {total};
const SECTIONS = {sections_json};

let cur = 0;         // current scene index
let playing = false;
let curAudio = null;

// ── audio queue ──────────────────────────────────────────────────────────────
function getAudios(idx) {{
  const el = document.getElementById('sc' + idx);
  if (!el) return [];
  const urls = [];
  for (let i = 1; i <= 6; i++) {{
    const u = el.dataset['a' + i];
    if (u) urls.push(u);
  }}
  return urls;
}}

function playQueue(urls, onDone) {{
  if (!urls.length) {{ setTimeout(onDone, 2500); return null; }}
  let qi = 0;
  const a = new Audio();
  a.preload = 'auto';
  const next = () => {{
    if (qi >= urls.length) {{ onDone(); return; }}
    a.src = urls[qi++];
    a.play().catch(() => setTimeout(next, 600));
  }};
  a.addEventListener('ended', () => setTimeout(next, 350));
  a.addEventListener('error', () => setTimeout(next, 600));
  next();
  return a;
}}

// ── scene navigation ─────────────────────────────────────────────────────────
function goTo(idx, autoplay) {{
  if (idx < 0 || idx >= TOTAL) return;
  if (curAudio) {{ curAudio.pause(); curAudio = null; }}

  document.querySelectorAll('.scene').forEach(s => s.classList.remove('active'));
  const el = document.getElementById('sc' + idx);
  if (el) el.classList.add('active');
  cur = idx;

  // hide quiz area, show player if not quiz scene
  const isQuiz = el && el.dataset.type === 'quiz';
  document.getElementById('player-area').style.display = isQuiz ? 'none' : '';
  document.getElementById('quiz-area').style.display   = isQuiz ? 'block' : 'none';

  updateUI();
  if ((autoplay || playing) && !isQuiz) playNow();
}}

function playNow() {{
  const isQuiz = (document.getElementById('sc' + cur) || {{}}).dataset?.type === 'quiz';
  if (isQuiz) return;
  playing = true;
  document.getElementById('audio-ind').classList.add('playing');
  document.getElementById('btn-play').textContent = '⏸';
  curAudio = playQueue(getAudios(cur), () => {{
    if (playing) {{
      if (cur + 1 < TOTAL) goTo(cur + 1, true);
      else {{ playing = false; updateUI(); }}
    }}
  }});
}}

function pause() {{
  playing = false;
  if (curAudio) {{ curAudio.pause(); curAudio = null; }}
  document.getElementById('audio-ind').classList.remove('playing');
  document.getElementById('btn-play').textContent = '▶';
}}

function updateUI() {{
  const pct = TOTAL > 1 ? (cur / (TOTAL - 1) * 100).toFixed(1) : 0;
  document.getElementById('prog-fill').style.width  = pct + '%';
  document.getElementById('prog-label').textContent = 'Scene ' + (cur+1) + ' / ' + TOTAL;
  document.getElementById('btn-prev').disabled = cur === 0;
  document.getElementById('btn-next').disabled = cur === TOTAL - 1;

  // update section tab highlights
  let activeSection = -1;
  SECTIONS.forEach((s, i) => {{
    if (cur >= s.start && cur <= s.end) activeSection = i;
  }});
  document.querySelectorAll('.sec-tab').forEach((t, i) => {{
    t.classList.toggle('active', i === activeSection);
  }});
}}

// ── controls ─────────────────────────────────────────────────────────────────
document.getElementById('btn-prev').addEventListener('click', () => {{
  pause(); goTo(cur - 1, false);
}});
document.getElementById('btn-next').addEventListener('click', () => {{
  if (playing) goTo(cur + 1, true); else goTo(cur + 1, false);
}});
document.getElementById('btn-play').addEventListener('click', () => {{
  if (playing) pause(); else playNow();
}});

// section tabs
document.querySelectorAll('.sec-tab').forEach((btn, i) => {{
  btn.addEventListener('click', () => {{
    pause();
    goTo(SECTIONS[i].start, false);
  }});
}});

// progress bar click to seek
document.getElementById('prog-bar').addEventListener('click', e => {{
  const rect = e.currentTarget.getBoundingClientRect();
  const pct  = (e.clientX - rect.left) / rect.width;
  pause();
  goTo(Math.round(pct * (TOTAL - 1)), false);
}});

// ── quiz tab switching ────────────────────────────────────────────────────────
document.querySelectorAll('.qtab').forEach(btn => {{
  btn.addEventListener('click', () => {{
    document.querySelectorAll('.qtab').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.qpanel').forEach(p => p.style.display = 'none');
    btn.classList.add('active');
    document.getElementById('qp-' + btn.dataset.panel).style.display = 'block';
  }});
}});

// ── quiz answer checkers ──────────────────────────────────────────────────────
function checkTF(btn) {{
  const correct = btn.dataset.correct;   // 'true' or 'false' string
  const val     = btn.dataset.val;
  const item    = btn.closest('.tf-item');
  item.querySelectorAll('.tf-btn').forEach(b => {{
    b.disabled = true;
    if (b.dataset.val === correct) b.classList.add('correct');
    else if (b === btn && b.dataset.val !== correct) b.classList.add('wrong');
  }});
}}
function checkMCQBool(btn) {{
  // data-correct="true" if this option is the right answer
  const item = btn.closest('.mcq-item');
  item.querySelectorAll('.mcq-opt').forEach(b => {{
    b.disabled = true;
    if (b.dataset.correct === 'true') b.classList.add('correct');
    else if (b === btn) b.classList.add('wrong');
  }});
}}
function checkMatch(btn) {{
  btn.classList.add('correct');
}}

// ── progress tracking ─────────────────────────────────────────────────────────
const PKEY = 'shrutam_' + LANG + '_d' + DAY;
const UKEY = 'shrutam_uid';
function uid() {{
  let v = localStorage.getItem(UKEY);
  if (!v) {{
    v = 'u' + Date.now().toString(36) + Math.random().toString(36).slice(2,7);
    localStorage.setItem(UKEY, v);
  }}
  return v;
}}
let lastSaved = -1;
function saveProgress() {{
  if (cur === lastSaved) return;
  lastSaved = cur;
  const p = {{ scene: cur, ts: Date.now() }};
  localStorage.setItem(PKEY, JSON.stringify(p));
  fetch('/api/progress.php', {{
    method: 'POST',
    headers: {{'Content-Type':'application/json'}},
    body: JSON.stringify({{ uid: uid(), lang: LANG, day: DAY, tabs: [cur] }}),
    keepalive: true,
  }}).catch(() => {{}});
}}
setInterval(saveProgress, 10000);
window.addEventListener('pagehide', saveProgress);

// ── keyboard shortcuts ────────────────────────────────────────────────────────
document.addEventListener('keydown', e => {{
  if (e.target.tagName === 'INPUT') return;
  if (e.key === 'ArrowRight') document.getElementById('btn-next').click();
  if (e.key === 'ArrowLeft')  document.getElementById('btn-prev').click();
  if (e.key === ' ') {{ e.preventDefault(); document.getElementById('btn-play').click(); }}
}});

// resume from localStorage
(function() {{
  try {{
    const p = JSON.parse(localStorage.getItem(PKEY) || '{{}}');
    if (p.scene && p.scene > 0 && p.scene < TOTAL) goTo(p.scene, false);
  }} catch(e) {{}}
}})();
'''

# ── full page builder ─────────────────────────────────────────────────────────

def build_page(lang: str, day: int) -> str:
    json_path = REPO_DIR / 'outputs' / 'days' / lang / f'day_{day:02d}.json'
    if not json_path.exists():
        raise FileNotFoundError(f"No JSON: {json_path}")

    data   = json.loads(json_path.read_text())
    lm     = LANG_META[lang]
    tab1   = data.get('tab_1_video', {})
    tab2   = data.get('tab_2_listen_repeat', {})
    tab3   = data.get('tab_3_dialogue', {})
    tab4   = data.get('tab_4_summary', {})
    tab5   = data.get('tab_5_quiz', {})

    # Navigate the actual content nesting
    t1c = tab1.get('content', tab1)
    t2c = tab2.get('content', tab2)
    t3c = tab3.get('content', tab3)
    t4c = tab4.get('content', tab4)
    t5c = tab5.get('content', tab5)

    title    = data.get('title', f'Day {day}')
    title_en = ''  # English title not in this schema

    # ── build scenes ──────────────────────────────────────────────────────────
    scenes_html = []
    sections    = []  # {name, icon, start, end}
    idx         = 0

    # 0: day title card (no audio — auto-advances to SAAVI intro)
    scenes_html.append(render_intro(idx, day, title, title_en))
    sec_start_intro = idx
    idx += 1

    # 1: SAAVI intro — her story + goal, plays t1_saavi_intro.mp3
    saavi_intro = t1c.get('saavi_intro', {})
    si_story = saavi_intro.get('story', '')
    si_goal  = saavi_intro.get('goal', '')
    si_title = saavi_intro.get('title', 'मेरी कहानी')
    if si_story:
        inner = f'''<div class="si-wrap">
          {SAAVI_SVG}
          <div class="si-day">{esc(si_title)}</div>
          <div class="saavi-story-card">
            <p class="saavi-story-text">{esc(si_story)}</p>
            {f'<p class="saavi-goal-text">🎯 {esc(si_goal)}</p>' if si_goal else ''}
          </div>
        </div>'''
        scenes_html.append(scene_div(idx, 'saavi_intro', [au(lang, day, 't1_saavi_intro')], inner))
        idx += 1

    sections.append({'name': 'Start', 'icon': '🏁', 'start': sec_start_intro, 'end': idx - 1})

    # Section: Words
    words = t1c.get('word_teaching', [])
    if words:
        sec_start = idx
        for wi, word_obj in enumerate(words, 1):
            scenes_html.append(render_word(idx, wi, word_obj, lang, day))
            idx += 1
            mis = render_mistake(idx, wi, word_obj, lang, day)
            if mis:
                scenes_html.append(mis)
                idx += 1
        sections.append({'name': 'Words', 'icon': '📖', 'start': sec_start, 'end': idx - 1})

    # Section: Listen & Repeat
    sents = t2c.get('sentences', [])
    if sents:
        sec_start = idx
        scenes_html.append(render_section_header(idx, '🎧 Listen & Repeat', 'सुनिए और दोहराइए'))
        idx += 1
        for si, sent in enumerate(sents, 1):
            scenes_html.append(render_listen(idx, si, sent, lang, day))
            idx += 1
        sections.append({'name': 'Listen', 'icon': '🎧', 'start': sec_start, 'end': idx - 1})

    # Section: Dialogue
    lines = t3c.get('dialogue', t3c.get('lines', []))
    if lines:
        sec_start = idx
        situation = esc(t3c.get('scenario', t3c.get('situation', '')))
        scenes_html.append(render_section_header(idx, '🎭 Dialogue', situation))
        idx += 1
        for li, line in enumerate(lines, 1):
            scenes_html.append(render_dialogue(idx, li, line, lang, day))
            idx += 1
        sections.append({'name': 'Dialogue', 'icon': '🎭', 'start': sec_start, 'end': idx - 1})

    # Section: Summary
    if t4c:
        sec_start = idx
        scenes_html.append(render_summary(idx, t4c, lang, day))
        idx += 1
        sections.append({'name': 'Summary', 'icon': '✅', 'start': sec_start, 'end': idx - 1})

    # Section: Quiz (special — shown outside player)
    quiz_html = ''
    if t5c:
        sec_start = idx
        quiz_inner = render_quiz_html(t5c, lm['name'])
        quiz_scene_inner = '<div class="si-wrap"><div class="si-title">📝 Quiz</div><div class="si-sub">नीचे देखें</div></div>'
        scenes_html.append(scene_div(idx, 'quiz', [], quiz_scene_inner))
        quiz_html = quiz_inner
        idx += 1
        sections.append({'name': 'Quiz', 'icon': '📝', 'start': sec_start, 'end': idx - 1})

    total       = idx
    all_scenes  = ''.join(scenes_html)
    sections_js = json.dumps(sections)

    # lang pill links
    lang_pills = ''
    for lc, lm2 in LANG_META.items():
        active = 'active' if lc == lang else ''
        lang_pills += (
            f'<a href="/spoken-english/?day={day}&lang={lc}" '
            f'class="lang-pill {active}">{lm2["flag"]} {lm2["label"]}</a>'
        )

    # Section tab buttons
    sec_tab_html = ''
    for i, sec in enumerate(sections):
        active = 'active' if i == 0 else ''
        sec_tab_html += f'<button class="sec-tab {active}" data-sec="{i}">{sec["icon"]} {sec["name"]}</button>'

    js = JS_TMPL.format(
        lang=lang, day=day, total=total, sections_json=sections_js
    )

    return f'''<!DOCTYPE html>
<html lang="{lm["html_lang"]}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Day {day}: {esc(title)} | Shrutam</title>
<meta name="description" content="Day {day} English lesson for {lm["name"]} speakers — SAAVI teaches with audio.">
<link rel="canonical" href="{SITE_ORIGIN}/spoken-english/?day={day}&lang={lang}">
<style>{CSS}</style>
</head>
<body>

<header class="hdr">
  <a href="/spoken-english/" class="hdr-back">←</a>
  <div class="hdr-title">Day {day}: {esc(title)}</div>
  <div class="hdr-langs">{lang_pills}</div>
</header>

<div id="player-area" class="player-area">
  <div class="player-wrap" id="player-stage">
    {all_scenes}
  </div>

  <div class="controls">
    <button id="btn-prev" class="ctrl-btn" disabled>⏮</button>
    <button id="btn-play" class="ctrl-btn primary">▶</button>
    <button id="btn-next" class="ctrl-btn">⏭</button>
    <div class="ctrl-prog">
      <div class="prog-bar" id="prog-bar"><div class="prog-fill" id="prog-fill"></div></div>
      <div class="prog-label" id="prog-label">Scene 1 / {total}</div>
    </div>
    <div class="audio-ind" id="audio-ind" title="Audio status"></div>
  </div>
</div>

<div class="sec-tabs">
  {sec_tab_html}
</div>

<div id="quiz-area">{quiz_html}</div>

<script>
{js}
</script>
</body>
</html>'''


def generate(lang: str, day: int):
    out_dir = REPO_DIR / 'outputs' / 'player' / lang / f'day-{day}'
    out_dir.mkdir(parents=True, exist_ok=True)
    out_file = out_dir / 'index.html'
    html_out = build_page(lang, day)
    out_file.write_text(html_out, encoding='utf-8')
    kb = len(html_out) // 1024
    print(f'  ✓ {lang} Day {day:2d}  {kb} KB  →  {out_file}')


def main():
    parser = argparse.ArgumentParser(description='Generate scene-based player pages')
    parser.add_argument('--lang', choices=['hi', 'mr', 'te'])
    parser.add_argument('--day', type=int)
    parser.add_argument('--all', action='store_true', help='All langs × days 1-7')
    args = parser.parse_args()

    if args.all:
        for lc in ['hi', 'mr', 'te']:
            for d in range(1, 8):
                try:
                    generate(lc, d)
                except FileNotFoundError as e:
                    print(f'  SKIP {e}')
    elif args.lang and args.day:
        generate(args.lang, args.day)
    else:
        parser.error('Provide --lang + --day, or --all')

    print(f'\nPlayer pages → {REPO_DIR / "outputs" / "player"}/')


if __name__ == '__main__':
    main()
