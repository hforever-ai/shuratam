#!/usr/bin/env python3
"""
Shrutam Safety Check — zero dependencies (no pip needed).
PHP calls: shell_exec("python3 safety/check.py " . escapeshellarg($msg));
Returns JSON: {"action":"allow"} or {"action":"block","response":"..."}
"""
import sys, re, json, os, time, urllib.request, urllib.error
from pathlib import Path

# ── Load API keys from keys.json (gitignored) ──
_KEYS_FILE = Path(__file__).parent / 'keys.json'
_KEYS = json.loads(_KEYS_FILE.read_text()) if _KEYS_FILE.exists() else {}

# ── RATE LIMIT TRACKER (file-based, works on shared hosting) ──
RATE_FILE = Path(__file__).parent / '.rate_limits.json'

def load_rates():
    try:
        data = json.loads(RATE_FILE.read_text())
        # Reset if new day
        if data.get('date') != time.strftime('%Y-%m-%d'):
            return {'date': time.strftime('%Y-%m-%d'), 'groq_day': 0, 'gemini_day': 0, 'gemini_min': 0, 'gemini_min_ts': 0}
        # Reset per-minute if >60s passed
        if time.time() - data.get('gemini_min_ts', 0) > 60:
            data['gemini_min'] = 0
            data['gemini_min_ts'] = time.time()
        return data
    except Exception:
        return {'date': time.strftime('%Y-%m-%d'), 'groq_day': 0, 'gemini_day': 0, 'gemini_min': 0, 'gemini_min_ts': time.time()}

def save_rates(data):
    try:
        RATE_FILE.write_text(json.dumps(data))
    except Exception:
        pass

def check_rate(api):
    """Returns True if under limit, False if exceeded."""
    r = load_rates()
    limits = {
        'groq': {'day': 14000, 'key': 'groq_day'},
        'gemini': {'day': 1400, 'min': 450, 'key_day': 'gemini_day', 'key_min': 'gemini_min'},
    }
    if api == 'groq':
        return r.get('groq_day', 0) < limits['groq']['day']
    elif api == 'gemini':
        return r.get('gemini_day', 0) < limits['gemini']['day'] and r.get('gemini_min', 0) < limits['gemini']['min']
    return True

def increment_rate(api):
    r = load_rates()
    if api == 'groq':
        r['groq_day'] = r.get('groq_day', 0) + 1
    elif api == 'gemini':
        r['gemini_day'] = r.get('gemini_day', 0) + 1
        r['gemini_min'] = r.get('gemini_min', 0) + 1
        if not r.get('gemini_min_ts'):
            r['gemini_min_ts'] = time.time()
    save_rates(r)


# ── LAYER 1: Regex filter ──
BLOCKS = {
    'injection': [re.compile(p, re.I) for p in [
        r'ignore\s+(all\s+)?(previous\s+)?(instructions|rules)',
        r'forget\s+(everything|all|your)',
        r'disregard\s+(all\s+)?(previous|prior)',
        r'you\s+are\s+(now|actually)',
        r'pretend\s+(to\s+be|you\s+are)',
        r'act\s+as\s+(if\s+you|a\s+different)',
        r'roleplay\s+as', r'override\s+(your\s+)?(safety|rules)',
        r'developer\s+mode', r'admin\s+(override|mode)', r'sudo\s+mode',
        r'<\|im_start\|>', r'\[INST\]',
        r'sab\s+rules?\s+(bhool|ignore|chod|tod)',
        r'apne\s+rules?\s+(ignore|bhool|tod)',
        r'restrictions?\s+(hata|remove|off|band)',
    ]],
    'jailbreak': [re.compile(p, re.I) for p in [
        r'\bDAN\b', r'\bSTAN\b', r'\bjailbr(?:oken|eak)\b',
        r'unrestricted\s+ai', r'evil\s+ai', r'bypass\s+safety',
        r'without\s+(any\s+)?limits', r'no\s+restrictions',
    ]],
    'inappropriate': [re.compile(p, re.I) for p in [
        r'my\s+(girlfriend|boyfriend|lover)',
        r'meri\s+(girlfriend|boyfriend|gf|bf)',
        r'flirt\s+with\s+me', r'seduce\s+me',
        r'ab\s+tu\s+(meri|mera)\s+(girlfriend|boyfriend)',
    ]],
}

SAFE_RE = re.compile(
    r'\b(math|physics|chemistry|biology|science|history|geography|'
    r'samjhao|explain|batao|teach|solve|padhao|sikhao|seekho|'
    r'kaise\s+(bolte|likhte|bole|kare)|kyun|kya\s+matlab|'
    r'example|formula|quiz|chapter|ncert|cbse|lesson|day\s+\d|'
    r'hello|good\s+morning|good\s+night|good\s+evening|good\s+afternoon|'
    r'thank\s+you|please|sorry|excuse\s+me|nice\s+to\s+meet|'
    r'my\s+name\s+is|i\s+am\s+from|how\s+are\s+you|'
    r'english\s+(sikh|bol|padh|practice|speak|learn)|'
    r'hindi\s+mein|hinglish|pronunciation|grammar|'
    r'word|phrase|meaning|matlab|sentence|translate|'
    r'practice|repeat|boliye|suniye|CAN|COULD|WILL|WOULD|SHOULD|MUST|'
    r'have\s+to|tense|verb|noun|pronoun|article|preposition)\b', re.I)

MSGS = {
    'injection': 'Mujhe lagta hai aap kuch test kar rahe hain — Main English sikhane ke liye hoon. Kya seekhna chahte hain? 📚',
    'jailbreak': 'Main SAAVI hoon — aapki English coach. Chalo English practice karte hain! 📖',
    'inappropriate': 'Main aapki study partner hoon. Koi English doubt hai toh poochiye! 😊',
    'default': 'Ye padhai se related nahi lagta. Koi word ya phrase practice karein? 🎯',
}

def layer1(q):
    for cat, pats in BLOCKS.items():
        for p in pats:
            if p.search(q):
                return {'action':'block','layer':1,'response':MSGS.get(cat,MSGS['default'])}
    if SAFE_RE.search(q):
        return {'action':'allow','layer':1}
    return None

# ── LAYER 2A: Groq Llama Guard 86M (safety check) ──
GROQ_KEY = os.environ.get('GROQ_API_KEY') or _KEYS.get('GROQ_API_KEY', '')

def groq_call(model, messages, max_tokens=10):
    """Generic Groq API call using urllib (no pip needed)."""
    if not GROQ_KEY:
        return None
    try:
        data = json.dumps({'model':model,'messages':messages,'temperature':0,'max_tokens':max_tokens}).encode()
        req = urllib.request.Request('https://api.groq.com/openai/v1/chat/completions',
            data=data, headers={'Authorization':f'Bearer {GROQ_KEY}','Content-Type':'application/json'})
        with urllib.request.urlopen(req, timeout=5) as r:
            return json.loads(r.read())['choices'][0]['message']['content'].strip()
    except Exception:
        return None

def layer2_safety(q):
    """Check if query is safe (not jailbreak/injection)."""
    if not check_rate('groq'):
        return True  # over limit, fail-open
    txt = groq_call('meta-llama/llama-prompt-guard-2-86m', [{'role':'user','content':q}])
    if txt is not None:
        increment_rate('groq')
    if txt is None:
        return True  # fail-open
    return 'unsafe' not in txt.lower()

GEMINI_KEY = os.environ.get('GOOGLE_AI_API_KEY') or _KEYS.get('GOOGLE_AI_API_KEY', '')

def layer2_topic(q):
    """Check if query is related to English learning using Gemini. Returns True if on-topic."""
    if not GEMINI_KEY or not check_rate('gemini'):
        return True  # over limit or no key, fail-open
    try:
        prompt = (
            "You are a strict topic classifier for an English speaking course app. "
            "The app ONLY teaches English speaking to Hindi speakers. "
            "Is this student query related to: English words, phrases, grammar, pronunciation, "
            "speaking practice, the course content, or asking SAAVI (the teacher) about English? "
            "If the query is about ANYTHING ELSE (jokes, weather, politics, general knowledge, "
            "personal questions, games, stories) answer NO. "
            "Answer ONLY with YES or NO.\n\nStudent query: " + q
        )
        payload = json.dumps({
            'contents': [{'role':'user','parts':[{'text':prompt}]}],
            'generationConfig': {'temperature':0,'maxOutputTokens':5},
        }).encode()
        url = f'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={GEMINI_KEY}'
        req = urllib.request.Request(url, data=payload, headers={'Content-Type':'application/json'})
        with urllib.request.urlopen(req, timeout=5) as r:
            data = json.loads(r.read())
            txt = data['candidates'][0]['content']['parts'][0]['text'].strip()
            increment_rate('gemini')
            return txt.upper().startswith('YES')
    except Exception:
        return True  # fail-open


def layer2_legacy(q):
    """Legacy — kept for reference, not used."""
    if not GROQ_KEY:
        return True  # fail-open

if __name__ == '__main__':
    # Stats mode: python3 check.py --stats
    if len(sys.argv) > 1 and sys.argv[1] == '--stats':
        r = load_rates()
        print(json.dumps({
            'date': r.get('date'),
            'groq_calls_today': r.get('groq_day', 0),
            'groq_limit': 14000,
            'gemini_calls_today': r.get('gemini_day', 0),
            'gemini_limit_day': 1400,
            'gemini_calls_this_min': r.get('gemini_min', 0),
            'gemini_limit_min': 450,
        }, indent=2))
        sys.exit()

    q = sys.argv[1] if len(sys.argv) > 1 else ''

    # LAYER 1: Regex (instant)
    r = layer1(q)
    if r:
        print(json.dumps(r, ensure_ascii=False))
        sys.exit()

    # LAYER 2A: Llama Guard safety check
    if not layer2_safety(q):
        print(json.dumps({'action':'block','layer':2,'response':MSGS['default']}, ensure_ascii=False))
        sys.exit()

    # LAYER 2B: LLM topic check — is this about English learning?
    if layer2_topic(q):
        print(json.dumps({'action':'allow','layer':2}))
    else:
        print(json.dumps({'action':'redirect','layer':2,
            'response':'Ye interesting hai, but chalo English practice pe focus karte hain! Koi word ya phrase ke baare mein poochiye 😊'
        }, ensure_ascii=False))
