#!/usr/bin/env python3
"""
Shrutam English Speaking Course — Content Generator v4
System prompt: scripts/system_prompt_v4.md (FINAL tested version)
User prompt:   built per-day from DAY_TOPICS dict (all 50 days)

Usage:
  python3 scripts/generate_day_content.py --lang hi --day 1 --output /tmp/day1_hi.json
  python3 scripts/generate_day_content.py --lang hi --day 1 --dry-run
"""

import argparse, json, os, sys, time, urllib.request, urllib.error
from pathlib import Path

# ── API Keys (multi-key rotation) ────────────────────────────────────────────
_KEYS_FILE = Path(__file__).resolve().parent.parent / 'safety' / 'keys.json'

def _load_gemini_keys() -> list[str]:
    """Load all Google AI keys from env + keys.json. Returns deduped list."""
    keys = []
    # 1. Env var (can be comma-separated for multiple)
    env_keys = os.environ.get('GOOGLE_AI_API_KEYS', os.environ.get('GOOGLE_AI_API_KEY', ''))
    for k in env_keys.split(','):
        k = k.strip()
        if k: keys.append(k)
    # 2. keys.json
    if _KEYS_FILE.exists():
        data = json.loads(_KEYS_FILE.read_text())
        for k in data.get('GOOGLE_AI_API_KEYS', []):
            if k and k not in keys: keys.append(k)
        single = data.get('GOOGLE_AI_API_KEY', '')
        if single and single not in keys: keys.append(single)
    return keys

GEMINI_KEYS: list[str] = _load_gemini_keys()
_current_key_idx = 0

def _next_key() -> str:
    global _current_key_idx
    if not GEMINI_KEYS:
        return ''
    key = GEMINI_KEYS[_current_key_idx % len(GEMINI_KEYS)]
    _current_key_idx += 1
    return key

def _rotate_key() -> str:
    """Force rotation to next key (call on rate-limit)."""
    global _current_key_idx
    _current_key_idx += 1
    return _next_key()

# Backward-compat alias
GEMINI_KEY = GEMINI_KEYS[0] if GEMINI_KEYS else ''

# ── Language configs ─────────────────────────────────────────────────────────
LANG_CONFIG = {
    'hi': {'name': 'Hindi', 'native_name': 'हिंदी', 'script': 'Devanagari', 'address': 'aap',   'saavi_alias': 'Didi'},
    'mr': {'name': 'Marathi','native_name': 'मराठी', 'script': 'Devanagari', 'address': 'tumhi', 'saavi_alias': 'Tai'},
    'te': {'name': 'Telugu', 'native_name': 'తెలుగు','script': 'Telugu',     'address': 'meeru', 'saavi_alias': 'Akka'},
}

# ── System prompt (loaded from file once) ────────────────────────────────────
_SYSTEM_PROMPT_CACHE = None
_RAPIDEX_CACHE = None


def _load_rapidex() -> str:
    """Load Rapidex English Speaking Course book as reference material.
    Set INCLUDE_RAPIDEX=0 env var to disable."""
    global _RAPIDEX_CACHE
    if _RAPIDEX_CACHE is not None:
        return _RAPIDEX_CACHE
    if os.environ.get('INCLUDE_RAPIDEX', '1') == '0':
        _RAPIDEX_CACHE = ''
        return ''
    # Try repo first, then Downloads
    candidates = [
        Path(__file__).resolve().parent / 'rapidex.docx',
        Path.home() / 'Downloads' / 'rapid.docx',
    ]
    for path in candidates:
        if not path.exists():
            continue
        try:
            from docx import Document
            doc = Document(str(path))
            text = '\n'.join([p.text for p in doc.paragraphs if p.text.strip()])
            _RAPIDEX_CACHE = text
            return text
        except ImportError:
            print("  [warn] python-docx not installed; skipping Rapidex.", file=sys.stderr)
            _RAPIDEX_CACHE = ''
            return ''
        except Exception as e:
            print(f"  [warn] Could not read Rapidex from {path}: {e}", file=sys.stderr)
    _RAPIDEX_CACHE = ''
    return ''


def get_system_prompt() -> str:
    global _SYSTEM_PROMPT_CACHE
    if _SYSTEM_PROMPT_CACHE:
        return _SYSTEM_PROMPT_CACHE

    # Primary: scripts/system_prompt_v4.md (checked into repo)
    primary = Path(__file__).resolve().parent / 'system_prompt_v4.md'
    fallback = Path.home() / 'Downloads' / 'spoken english' / 'shrutam_system_prompt_v4_FINAL.md'

    if primary.exists():
        base = primary.read_text(encoding='utf-8')
    elif fallback.exists():
        base = fallback.read_text(encoding='utf-8')
    else:
        raise FileNotFoundError(
            f"System prompt not found.\n"
            f"Expected: {primary}\n"
            f"Copy shrutam_system_prompt_v4_FINAL.md to scripts/system_prompt_v4.md"
        )

    # Append Rapidex book as reference material
    rapidex = _load_rapidex()
    if rapidex:
        book_section = f"""

═══════════════════════════════════════════════════════════
📕 REFERENCE BOOK: Rapidex English Speaking Course (Hindi)
═══════════════════════════════════════════════════════════

The full text of the Rapidex English Speaking Course book is below.
This is India's most popular English speaking course book — students
have been using it for 30+ years.

USE THIS BOOK AS SOURCE MATERIAL:
- Extract authentic Hindi-English phrase pairs
- Use the book's example sentences and conversation patterns
- Borrow real-life situations (office, market, doctor, family)
- Reference the book's grammar explanations as a starting point

DO NOT COPY THE BOOK'S DRY TEXTBOOK STYLE:
- Transform content into SAAVI's warm, story-driven teaching
- Add the 6-character cast (Raju, Farhaan, Rancho, Chatur, Dadaji)
- Use bhai-style voice instead of formal grammar lecture
- Modernize examples (WhatsApp, Zomato, Uber) where Rapidex feels dated

The book is YOUR REFERENCE ENCYCLOPEDIA — pull from it as needed,
but always rewrite in SHRUTAM's voice and structure.

═══ BEGIN RAPIDEX BOOK ═══
{rapidex}
═══ END RAPIDEX BOOK ═══
"""
        _SYSTEM_PROMPT_CACHE = base + book_section
        print(f"  [info] System prompt: {len(base):,} chars + Rapidex book {len(rapidex):,} chars", file=sys.stderr)
    else:
        _SYSTEM_PROMPT_CACHE = base
    return _SYSTEM_PROMPT_CACHE

# ── 50-Day Topics ────────────────────────────────────────────────────────────
# Each entry matches the tested batch prompts from shrutam_week*_batch_prompts.md
# Fields: theme, words, scenario, struggles, connections
# Optional: special (extra per-day instructions), repeat (spiral scenario info)


# ── Curriculum V2 loader (Rapidex-based 49-day sequence) ────────────────────
# If scripts/curriculum_v2.json exists, it overrides the embedded DAY_TOPICS.
# V2 entries have richer fields: core_concepts, hook, sample_examples,
# common_mistake, visual_idea, animation_idea — DeepSeek uses these directly.
def _load_curriculum_v2():
    path = Path(__file__).resolve().parent / 'curriculum_v2.json'
    if not path.exists():
        return None
    try:
        data = json.loads(path.read_text(encoding='utf-8'))
        # Keys are stringified day numbers in JSON; convert to int
        result = {int(k): v for k, v in data.items() if k.isdigit()}
        print(f"  [info] Loaded curriculum_v2.json: {len(result)} days", file=sys.stderr)
        return result
    except Exception as e:
        print(f"  [warn] Failed to load curriculum_v2.json: {e}", file=sys.stderr)
        return None


_CURRICULUM_V2 = _load_curriculum_v2()


DAY_TOPICS = {

    # ══ WEEK 1: JAADU — Foundation + Grammar Bridge ══════════════════════════
    1: {
        'theme': 'Greetings & Self-Introduction — Pehla Kadam',
        'words': [
            'Hello', 'Hi', 'Good morning', 'Good afternoon', 'Good evening',
            'Good night', 'Thank you', 'Please', 'Sorry', 'Excuse me',
            'My name is', 'I am from', 'Nice to meet you', 'How are you', 'Fine',
        ],
        'scenario': '🏠 Home - Meeting a neighbor at door',
        'struggles': (
            '- "Myself Raj" instead of "I am Raj" / "My name is Raj"\n'
            '- "What is your good name?" (Indian English) instead of "What is your name?"\n'
            '- "Thanks" vs "Thank you" in formal settings\n'
            '- Confusion between "Hi" (casual) and "Hello" (slightly formal)\n'
            '- "Excuse me" vs "Sorry" confusion\n'
            '- Saying "Welcome" instead of "You\'re welcome"'
        ),
        'connections': (
            '- Previous Day: None (this is Day 1!)\n'
            '- Next Day (Day 2): Present Tense / वर्तमान काल\n'
            '- Foundation for all future lessons'
        ),
        'special': (
            '- Previous day recap: Since Day 1, make it a WELCOME message from SAAVI '
            'introducing herself and the 50-day journey\n'
            '- Concept section (2-3 min): In Hindi we say "नमस्ते" for all times, '
            'in English we have different greetings for different times\n'
            '- Tab 3: Home scenario — someone visiting neighbor\'s house first time, '
            '2 characters meeting at door, SAAVI explains each line\n'
            '- CRITICAL PRONUNCIATION FIX: Use "आई" (AAI) for "I" pronunciation, NOT "माय" (MAY)\n'
            '- Write SAAVI\'s TTS text in Devanagari script, NOT Hinglish'
        ),
    },

    2: {
        'theme': 'वर्तमान काल (Present Tense) — Hindi se English tak',
        'concept_first': (
            'TEACH THE CONCEPT FIRST — not just words.\n'
            'वर्तमान काल = Present Tense. Hindi mein 4 forms hain — English mein bhi 4 hain:\n'
            '\n'
            '1. साधारण वर्तमान काल (Simple Present) — रोज़ की आदत\n'
            '   Hindi: "मैं रोज़ खाता हूँ" → English: "I eat daily"\n'
            '   Pattern: I/We/You/They + verb (मैं/हम/तुम/वे + verb)\n'
            '   Pattern: He/She/It + verb+s (वो + verb+s) — THIRD PERSON RULE\n'
            '\n'
            '2. वर्तमान निरंतर काल (Present Continuous) — अभी हो रहा है\n'
            '   Hindi: "मैं अभी खा रहा हूँ" → English: "I am eating now"\n'
            '   Pattern: am/is/are + verb+ing\n'
            '\n'
            '3. वर्तमान पूर्ण काल (Present Perfect) — अभी-अभी हुआ\n'
            '   Hindi: "मैंने खाना खा लिया है" → English: "I have eaten"\n'
            '   Pattern: have/has + 3rd form of verb (eaten, gone, done)\n'
            '\n'
            '4. वर्तमान पूर्ण निरंतर काल (Present Perfect Continuous) — कब से हो रहा है\n'
            '   Hindi: "मैं 2 घंटे से पढ़ रहा हूँ" → English: "I have been studying for 2 hours"\n'
            '   Pattern: have/has been + verb+ing\n'
            '\n'
            'Ek hi verb (खाना/eat) ke चारों रूप दिखाओ — eat, am eating, have eaten, have been eating\n'
            'Verb 3 forms zaroori: eat-ate-eaten, go-went-gone, do-did-done\n'
            'Indian student ko "kaun sa form kab use karna hai" yeh confuse karta hai — yeh CLEAR karo'
        ),
        'words': [
            # Cover all 4 present tense forms with the same verb to show the pattern
            'I eat', 'He eats', 'I am eating', 'I have eaten', 'I have been eating',
            'I go', 'She goes', 'I am going', 'I have gone', 'I have been going',
            'I work', 'I am working', 'I have worked', 'I study', 'I have studied',
        ],
        'scenario': '🏠 Daily routine ke through — कब क्या use karte hain Present Tense ke 4 forms',
        'struggles': (
            '- "Main jaa raha hoon" → WRONG: "I am go" → RIGHT: "I am going" (-ing missing)\n'
            '- "Mujhe pata hai" → WRONG: "I am knowing" → RIGHT: "I know" (KNOW continuous nahi hota)\n'
            '- "Vo jaata hai" → WRONG: "He go" → RIGHT: "He goes" (third person -s)\n'
            '- "Maine khaa liya" → WRONG: "I ate" → RIGHT: "I have eaten" (perfect tense)\n'
            '- "Main 2 ghante se padh raha hoon" → WRONG: "I am studying since 2 hours" → RIGHT: "I have been studying for 2 hours"\n'
            '- Hindi mein "हूँ/है/हैं" hamesha "am/is/are" nahi banta — yeh CRITICAL hai\n'
            '- Simple Present vs Continuous — kab kya use karein'
        ),
        'connections': (
            '- Previous (Day 1): Greetings, "My name IS Saavi" — yahan IS = Simple Present BE form\n'
            '- Next (Day 3): Family + Verbs — "My father WORKS in office" (third person -s)\n'
            '- Future days: Past tense (Day 17) aur Future tense (Day 18) usi pattern par'
        ),
        'special': (
            '- HINDI SE START KARO — pehle Vartman Kaal ka concept Hindi grammar mein samjhao\n'
            '- 4 forms ko ek hi verb (eat/खाना) se dikhao — pattern clear ho\n'
            '- Verb ke 3 forms ka chart do: V1-V2-V3 (eat-ate-eaten)\n'
            '- Third Person Rule (HE/SHE/IT + verb+s) ko BIG point banao\n'
            '- Tab 1: Concept teaching screens (Hindi pattern → English pattern → comparison)\n'
            '- Tab 3: Dialogue mein roz ki Indian routine — chai banana, office jaana, padhna'
        ),
    },

    3: {
        'theme': 'संज्ञा / Noun with Family Members',
        'words': [
            'Mother', 'Father', 'Brother', 'Sister', 'Son',
            'Daughter', 'Uncle', 'Aunt', 'Grandfather', 'Grandmother',
            'Friend', 'Cousin', 'Family', 'Parents', 'Wife',
        ],
        'scenario': '👨‍👩‍👧‍👦 Family gathering - Introducing family to visiting friend',
        'struggles': (
            '- "Cousin brother/sister" (Indian English) → just "cousin"\n'
            '- "Real brother/sister" → "brother/sister" (blood relation)\n'
            '- All Hindi uncles (chacha/mama/fufa) → "uncle" in English\n'
            '- "Mother-father" → "parents" or "mom and dad"\n'
            '- "Myself" instead of "my family"'
        ),
        'connections': (
            '- Previous Day (Day 2): Present Tense (is/am/are + verbs)\n'
            '- Next Day (Day 4): सर्वनाम / Pronoun (I, You, He, She)\n'
            '- Use Day 2\'s is/are: "She IS my sister"'
        ),
        'special': (
            '- Bridge Hindi grammar: "संज्ञा का मतलब Noun — वह शब्द जो किसी व्यक्ति, वस्तु, जगह या भाव का नाम बताए"\n'
            '- Tab 3: Scene where friend visits, host introduces family, 3 characters\n'
            '- Include "My family has..." pattern\n'
            '- Use "आई" for "I", SAAVI in Devanagari script'
        ),
    },

    4: {
        'theme': 'सर्वनाम / Pronoun',
        'words': [
            'I', 'You', 'He', 'She', 'It',
            'We', 'They', 'My', 'Your', 'His',
            'Her', 'Our', 'Their', 'This', 'That',
        ],
        'scenario': '💬 Two friends talking about another friend (uses many pronouns)',
        'struggles': (
            '- He/She confusion (Hindi "woh" is gender-neutral, English is gendered)\n'
            '- "Me and my friend" → "My friend and I"\n'
            '- Using "She" for things instead of "It"\n'
            '- "Their" vs "Them" vs "They" confusion\n'
            '- "He bike" instead of "His bike"\n'
            '- "This" vs "That" — pointing at distance'
        ),
        'connections': (
            '- Previous Day (Day 3): Family members (Nouns)\n'
            '- Next Day (Day 5): क्रिया / Verb\n'
            '- Use pronouns with family: "She is my sister"'
        ),
        'special': (
            '- Bridge: "सर्वनाम का मतलब Pronoun — वह शब्द जो संज्ञा की जगह आए"\n'
            '- Critical: He (male) vs She (female) — Hindi mein dono "woh", English mein alag-alag\n'
            '- "It" for objects/animals (not a person)\n'
            '- Tab 3: 2-3 friends talking about other people, SAAVI explains He/She logic\n'
            '- Use "आई" for "I"'
        ),
    },

    5: {
        'theme': 'क्रिया / Verb + Daily Actions',
        'words': [
            'Run', 'Walk', 'Sit', 'Stand', 'Open',
            'Close', 'Give', 'Take', 'Make', 'Do',
            'Help', 'Tell', 'Ask', 'Answer', 'Wait',
        ],
        'scenario': '🌅 Morning routine - Describing daily activities',
        'struggles': (
            '- "I am sit" instead of "I sit" or "I am sitting"\n'
            '- Confusing "Give" and "Take" (dena/lena)\n'
            '- "Make" vs "Do" — Hindi "karna" for both\n'
            '- "Ask" vs "Tell" — "You tell me" vs "Tell me"\n'
            '- "Answer me" vs "Reply me"\n'
            '- "Wait for" — forgetting "for"'
        ),
        'connections': (
            '- Previous Day (Day 4): Pronouns\n'
            '- Next Day (Day 6): विशेषण / Adjective\n'
            '- Combine: "I run", "She walks", "They help"'
        ),
        'special': (
            '- Bridge: "क्रिया का मतलब Verb — वह शब्द जो काम (action) बताए"\n'
            '- Third person singular adds \'s\': I run → He runs\n'
            '- MAKE = create (make food, make a plan)\n'
            '- DO = general (do work, do homework)\n'
            '- Common: ❌ "Give me a pen" vs ✅ "Please give me a pen"\n'
            '- Tab 3: Morning routine, 2 family members, one describes, other asks\n'
            '- Each verb shown with "I ___" and "He/She ___s"\n'
            '- Use "आई" for "I"'
        ),
    },

    6: {
        'theme': 'विशेषण / Adjective',
        'words': [
            'Big', 'Small', 'Good', 'Bad', 'New',
            'Old', 'Hot', 'Cold', 'Happy', 'Sad',
            'Beautiful', 'Ugly', 'Fast', 'Slow', 'Easy',
        ],
        'scenario': '🏠 Describing home to a friend visiting first time',
        'struggles': (
            '- "House big" (wrong) vs "Big house" (right)\n'
            '- "More better" — should just be "better"\n'
            '- "Very much good" — should be "very good"\n'
            '- Beautiful/Pretty/Handsome confusion\n'
            '- "Sad" vs "Bad" pronunciation'
        ),
        'connections': (
            '- Previous Day (Day 5): Verbs\n'
            '- Next Day (Day 7): Practice + Weather\n'
            '- Combine with Day 3 nouns: "Big family"'
        ),
        'special': (
            '- Bridge: "विशेषण का मतलब Adjective — वह शब्द जो किसी के बारे में बताए"\n'
            '- Critical rule: Adjective + Noun (Big house, NOT House big)\n'
            '- Opposites pairing: Big-Small, Good-Bad, New-Old, Hot-Cold, Happy-Sad\n'
            '- ❌ "My house very big" vs ✅ "My house is very big"\n'
            '- Tab 3: Friend visits home, host shows around, 2-3 characters\n'
            '- Use "आई" for "I"'
        ),
    },

    7: {
        'theme': 'Week 1 Practice + Weather & Small Talk (Revision Day)',
        'words': [
            'Sunny', 'Rainy', 'Cloudy', 'Windy', 'Hot',
            'Cold', 'Pleasant', 'Humid', 'Stormy', 'Cool',
            'Warm', 'Foggy', 'Snowy', 'Breezy', 'Clear',
        ],
        'scenario': '☕ Meeting friend at park/cafe - Small talk & weather',
        'struggles': (
            '- "It is raining" vs "It rains"\n'
            '- "Too hot" vs "Very hot" (Indians overuse "too")\n'
            '- "Weather is" vs "The weather is"\n'
            '- "In summer" not "On summer"\n'
            '- Small talk phrases'
        ),
        'connections': (
            '- Previous Days: Complete Week 1 review\n'
            '- Next Day (Day 8): BE Verb + Office scenario\n'
            '- This is REVISION day — combine everything!'
        ),
        'special': (
            '- SPECIAL: Week 1 REVIEW day\n'
            '- SAAVI intro celebrates Week 1 completion\n'
            '- Concept: "Small talk — casual conversations to start with strangers"\n'
            '- Use ALL Week 1 learnings: Pronouns "It is hot today", Adjectives "Beautiful weather", '
            'Verbs "I feel cold", Present tense "The sun shines"\n'
            '- ❌ "Weather is very too hot" vs ✅ "The weather is very hot"\n'
            '- Tab 3: Two friends at park/cafe casual chat, start with "Hi" (Day 1), '
            'ask family (Day 3), weather (today), describe (Day 6), 2 friends + maybe waiter\n'
            '- Summary celebrates Week 1 achievement\n'
            '- Preview Week 2 (Mega-verbs)\n'
            '- Use "आई" for "I"'
        ),
    },

    # ══ WEEK 2: MAZA — Essential Mega-Verbs ══════════════════════════════════
    8: {
        'theme': 'BE Verb (am/is/are/was/were/be/been/being) — Complete Mastery',
        'words': [
            'am', 'is', 'are', 'was', 'were',
            'be', 'been', 'being', 'am not', "isn't",
            "aren't", "wasn't", "weren't", 'to be', 'been (past perfect)',
        ],
        'scenario': '💼 Office first day - Self-introduction to team',
        'struggles': (
            '- "I am going" vs "I go" (overusing BE verb)\n'
            '- Past tense: "was" vs "were" confusion\n'
            '- "I am engineer" vs "I am AN engineer" (articles)\n'
            '- Contractions: I\'m, You\'re, He\'s\n'
            '- Questions: "Am I?", "Is he?", "Are they?"'
        ),
        'connections': (
            '- Previous Day (Day 7): Week 1 Review + Weather\n'
            '- Next Day (Day 9): HAVE - Possessions\n'
            '- First day of Week 2 (MAZA theme)'
        ),
        'special': (
            '- Mega-word approach: ALL forms of BE at once\n'
            '- Present: I am, You are, He/She/It is, We/They are\n'
            '- Past: I was, You were, He/She/It was, We/They were\n'
            '- Contractions table: I\'m, You\'re, He\'s, She\'s, It\'s, We\'re, They\'re\n'
            '- ❌ "I am engineer" vs ✅ "I am AN engineer"\n'
            '- ❌ "They is my friends" vs ✅ "They ARE my friends"\n'
            '- Tab 3: New employee + HR + Team member'
        ),
    },

    9: {
        'theme': 'HAVE (have/has/had) — All Uses',
        'words': [
            'have', 'has', 'had', 'having', "haven't",
            "hasn't", "hadn't", 'have got', 'has got', 'had got',
            'I have', 'you have', 'he has', 'she has', 'we have',
        ],
        'scenario': '💰 Talking about belongings and daily possessions',
        'struggles': (
            '- "I have car" vs "I have A car" (articles missing)\n'
            '- "He have" vs "He HAS" (third person)\n'
            '- "I am having" for permanent possession (wrong)\n'
            '- "I have headache" vs "I have A headache"\n'
            '- HAVE GOT (British English) usage'
        ),
        'connections': (
            '- Previous Day (Day 8): BE Verb\n'
            '- Next Day (Day 10): HAVE TO - Obligations\n'
            '- Use BE + HAVE: "I am tall and I have black hair"'
        ),
        'special': (
            '- HAVE = Possession (I have a car)\n'
            '- HAVE = Experience (I have a headache)\n'
            '- HAVE = Family (I have 2 brothers)\n'
            '- HAVE + past participle = Perfect tense (brief intro)\n'
            '- Critical: He/She/It = HAS (not have)\n'
            '- ❌ "I am having 2 brothers" vs ✅ "I have 2 brothers"\n'
            '- ❌ "She have a bike" vs ✅ "She HAS a bike"\n'
            '- Tab 3: 2-3 friends discussing what they own'
        ),
    },

    10: {
        'theme': 'HAVE TO (Obligation) — Indian Confusion Fix',
        'words': [
            'have to', 'has to', 'had to', "don't have to", "doesn't have to",
            "didn't have to", 'must', 'need to', 'should', 'I have to go',
            'I have to do', 'I have to work', 'have to eat', 'have to sleep', 'have to study',
        ],
        'scenario': '📝 Busy schedule - Explaining what one must do today',
        'struggles': (
            '- BIGGEST Indian mistake: "Main jaana hoon" → "I have to go" (not "I am going")\n'
            '- "I have to go" vs "I must go" (different intensity)\n'
            '- "Don\'t have to" vs "Must not" (big difference!)\n'
            '- "Should" vs "Must" vs "Have to" confusion'
        ),
        'connections': (
            '- Previous Day (Day 9): HAVE (Possession)\n'
            '- Next Day (Day 11): DO/DOES/DID\n'
            '- This day fixes THE BIGGEST Indian English mistake'
        ),
        'special': (
            '- THIS DAY IS CRITICAL — Fixes Hindi direct translation mistakes\n'
            '- "Main [kaam] karna hai" = "I have to [work]"\n'
            '- Have to vs Must: HAVE TO = External obligation, MUST = Personal strong need\n'
            '- Tab 3: Person explaining busy day to friend, SAAVI emphasizes Hindi-English bridge'
        ),
    },

    11: {
        'theme': 'DO / DOES / DID (Questions & Negations)',
        'words': [
            'do', 'does', 'did', "don't", "doesn't",
            "didn't", 'Do you', 'Does he', 'Does she', 'Did you',
            'I do', 'you do', 'he does', 'she does', 'we do',
        ],
        'scenario': '🤔 Friends asking each other questions',
        'struggles': (
            '- "I not go" instead of "I DON\'T go"\n'
            '- "He no eat" instead of "He DOESN\'T eat"\n'
            '- Asking questions: "You go office?" vs "DO you go to office?"\n'
            '- "Did you went?" (double past — WRONG) vs "Did you GO?"\n'
            '- Confusing DO (action verb) vs DO (helper verb)'
        ),
        'connections': (
            '- Previous Day (Day 10): HAVE TO\n'
            '- Next Day (Day 12): GO + Hospital BASIC\n'
            '- Critical for questions and negations'
        ),
        'special': (
            '- QUESTIONS: Do + subject + verb?\n'
            '- NEGATIVE: Subject + don\'t/doesn\'t/didn\'t + verb\n'
            '- IMPORTANT: After do/does/did → verb stays BASE form\n'
            '- ✅ "Did he GO?" (not "Did he went?")\n'
            '- ❌ "You are going office?" vs ✅ "Do you go to office?"\n'
            '- Tab 3: Friends mix of Do/Does/Did questions'
        ),
    },

    12: {
        'theme': 'GO / WENT / GONE (all forms) + Hospital BASIC',
        'words': [
            'go', 'goes', 'went', 'gone', 'going',
            'go to', 'go for', 'go with', 'go home', "Let's go",
            'I go', 'he goes', 'she goes', 'they go', 'we go',
        ],
        'scenario': '🏥 First Hospital Visit (BASIC) - Feeling sick',
        'struggles': (
            '- Past tense: "went" not "goed" (irregular verb!)\n'
            '- "Gone" (past participle) vs "Went" (simple past)\n'
            '- "He go" vs "He goes" (third person s)\n'
            '- "Go to market" vs "Go market" (preposition)\n'
            '- "Let\'s go home" (no "to" with home)'
        ),
        'connections': (
            '- Previous Day (Day 11): DO/DOES/DID (for questions)\n'
            '- Next Day (Day 13): CAN/COULD + Restaurant\n'
            '- FIRST SCENARIO REPEAT: Hospital (will come again Day 17, 24, 30)'
        ),
        'special': (
            '- Mega-verb approach: All forms of GO\n'
            '- Irregular past: GO → WENT → GONE (memorize!)\n'
            '- "Go TO [place]" (most places), "Go HOME" (no preposition)\n'
            '- SCENARIO REPEAT — difficulty_level: "basic"\n'
            '- upcoming_advanced_versions: ["Day 17 - Intermediate", "Day 24 - Advanced", "Day 30 - Master"]\n'
            '- Tab 3: BASIC hospital — Patient + Doctor + Receptionist\n'
            '- Simple phrases: "I am sick", "I have a headache", "Please help me"\n'
            '- Don\'t use complex medical terms (save for later days)'
        ),
    },

    13: {
        'theme': 'CAN vs COULD (Politeness Modal) + Restaurant BASIC',
        'words': [
            'can', 'could', "can't", "couldn't", 'Can I',
            'Could I', 'Can you', 'Could you', "Can't do", 'Could do',
            'Cannot', 'able to', 'Yes I can', "No I can't", 'Maybe',
        ],
        'scenario': '🍛 Restaurant - Ordering food for first time (BASIC)',
        'struggles': (
            '- "Can I" (casual) vs "Could I" (polite) — Tu vs Aap\n'
            '- "Can you help" vs "Could you help" — familiarity\n'
            '- Using "Can\'t" in written formal (should be "cannot")\n'
            '- "I am can" (wrong) vs "I can" (right)'
        ),
        'connections': (
            '- Previous Day (Day 12): GO + Hospital\n'
            '- Next Day (Day 14): Practice + Auto\n'
            '- FIRST RESTAURANT SCENARIO: Will repeat Day 18, 26'
        ),
        'special': (
            '- "Tu vs Aap" test: CAN = Informal/familiar, COULD = Polite/respectful\n'
            '- CAN = Ability, CAN = Permission casual, COULD = Polite request, COULD = Past ability\n'
            '- SCENARIO REPEAT — difficulty_level: "basic"\n'
            '- upcoming_advanced_versions: ["Day 18 - Intermediate", "Day 26 - Advanced"]\n'
            '- Tab 3: Customer + Waiter + Manager, simple phrases\n'
            '- "Can I have the menu please?", "Could you bring water?", "I would like tea"'
        ),
    },

    14: {
        'theme': 'Week 2 Practice Day + Auto/Taxi Scenario',
        'words': [
            'Stop', 'Go', 'Left', 'Right', 'Straight',
            'Here', 'There', 'Near', 'Far', 'Wait',
            'Hurry', 'Slow down', 'Please stop', 'How much', 'Thank you',
        ],
        'scenario': '🚕 In an Auto - Giving directions (BASIC)',
        'struggles': (
            '- "Straight go" vs "Go straight" (word order)\n'
            '- "Left side" vs just "Left"\n'
            '- "How much rupees?" vs "How much?"\n'
            '- "Hurry up" vs "Hurry"'
        ),
        'connections': (
            '- Week 2 complete: BE, HAVE, HAVE TO, DO, GO, CAN/COULD\n'
            '- Next Day (Day 15): GET Part 1\n'
            '- FIRST AUTO SCENARIO: Will repeat Day 20'
        ),
        'special': (
            '- Week 2 Review focus, SAAVI celebrates Week 2 completion\n'
            '- Combine BE: "It is far", HAVE: "I have to go to market", '
            'DO: "Do you know the way?", GO: "Go straight", CAN: "Can you stop here?"\n'
            '- SCENARIO REPEAT — difficulty_level: "basic"\n'
            '- upcoming_advanced_versions: ["Day 20 - Intermediate"]\n'
            '- Tab 3: Passenger + Auto Driver, simple: "Please go straight", "Turn left", "How much?"\n'
            '- Preview Week 3 (More Mega-verbs)'
        ),
    },

    # ══ WEEK 3: MEHNAT — More Mega-Verbs ═════════════════════════════════════
    15: {
        'theme': 'GET — Part 1 (Receive, Buy, Become, Fetch)',
        'words': [
            'get', 'gets', 'got', 'getting', 'get a',
            'get it', 'get this', 'get that', 'I get', 'he gets',
            'they get', 'we get', 'get ready', 'get up', 'get home',
        ],
        'scenario': '🏪 Market shopping for daily needs',
        'struggles': (
            '- GET has 50+ meanings — overwhelming\n'
            '- "Get" vs "Bring" vs "Take" confusion\n'
            '- "Get up" (wake up) vs "Stand up"\n'
            '- "I get the bus" (catch/board) — not obvious\n'
            '- "Get it?" (understand) — idiomatic'
        ),
        'connections': (
            '- Previous Day (Day 14): Week 2 Practice\n'
            '- Next Day (Day 16): GET Part 2 + Bus\n'
            '- First day of Week 3 (MEHNAT)'
        ),
        'special': (
            '- Part 1: RECEIVE "I got a gift", BUY/FETCH "Get bread from shop", '
            'BECOME "Getting angry", ARRIVE "Get home by 8", UNDERSTAND "Got it?" (casual)\n'
            '- Tab 3: Customer + Shopkeeper + Helper\n'
            '- "Can I GET 2 kg potatoes?", "GET me some onions please"'
        ),
    },

    16: {
        'theme': 'GET — Part 2 (Advanced uses) + Bus Travel',
        'words': [
            'get on', 'get off', 'get in', 'get out', 'get better',
            'get worse', 'get tired', 'get along', 'get together', 'get back',
            'get lost', 'get done', 'get hurt', 'get sick', 'get well',
        ],
        'scenario': '🚍 City Bus - Asking about route (BASIC)',
        'struggles': (
            '- "Get on the bus" (board) vs "Get in the car" (different prepositions)\n'
            '- "Get off" (disembark) vs "Get down" (wrong)\n'
            '- "Getting tired" vs "Being tired"\n'
            '- "Get better" (health) vs "Become better"'
        ),
        'connections': (
            '- Previous Day (Day 15): GET Part 1\n'
            '- Next Day (Day 17): GOT + HAVE GOT + Hospital INTER\n'
            '- FIRST BUS SCENARIO: Will repeat Day 34'
        ),
        'special': (
            '- Phrasal: GET ON/OFF (bus, train, plane), GET IN/OUT (car, taxi)\n'
            '- Health: "Get better" / "Get worse"\n'
            '- SCENARIO REPEAT — difficulty_level: "basic"\n'
            '- upcoming_advanced_versions: ["Day 34 - Advanced"]\n'
            '- Tab 3: Passenger + Conductor + Fellow passenger\n'
            '- "Does this bus GO to station?", "I want to GET OFF at next stop"'
        ),
    },

    17: {
        'theme': 'GOT + HAVE GOT (British/American difference)',
        'words': [
            'got', 'have got', 'has got', 'had got', "I've got",
            "she's got", "he's got", "they've got", 'got a', 'have got a',
            'got the', 'have got to', 'I got it', 'she got', 'we got',
        ],
        'scenario': '🏥 Hospital - Detailed Doctor Consultation (INTERMEDIATE)',
        'struggles': (
            '- HAVE GOT vs HAVE (same meaning, different feel)\n'
            '- "I have got" (British) vs "I have" (American)\n'
            '- Contractions: I\'ve got, She\'s got\n'
            '- "Got to" = "Have to" (informal)'
        ),
        'connections': (
            '- Previous Day (Day 16): GET Part 2 + Bus\n'
            '- Next Day (Day 18): MAKE/TAKE + Restaurant INTER\n'
            '- HOSPITAL REPEAT: Was BASIC on Day 12, now INTERMEDIATE'
        ),
        'special': (
            '- HAVE GOT = HAVE (same meaning), "I have got a headache" = "I have a headache"\n'
            '- Contractions: I\'ve, You\'ve, He\'s, She\'s, They\'ve, We\'ve\n'
            '- SCENARIO REPEAT: is_repeat: true\n'
            '- previous_encounters: ["Day 12 - Basic"]\n'
            '- upcoming_advanced_versions: ["Day 24 - Advanced", "Day 30 - Master"]\n'
            '- difficulty_level: "intermediate"\n'
            '- "Doctor, I\'ve got a headache since yesterday", "Have you got any allergies?"\n'
            '- SAAVI references Day 12: "Remember Day 12? Hum basic seekhe the — aaj thoda aur deep jaenge"'
        ),
    },

    18: {
        'theme': 'MAKE vs TAKE (Most confusing pair for Indians)',
        'words': [
            'make', 'makes', 'made', 'making', 'take',
            'takes', 'took', 'taking', 'make food', 'make plans',
            'make time', 'take bus', 'take time', 'take care', 'take away',
        ],
        'scenario': '🍛 Restaurant - Full meal experience (INTERMEDIATE)',
        'struggles': (
            '- MAJOR confusion: Hindi "karna" = both Make AND Do\n'
            '- "Make photo" vs "Take a photo" (Indians say "make")\n'
            '- "Take food" vs "Eat food" (wrong direct translation)\n'
            '- "Make bath" vs "Take a bath"\n'
            '- "Make time for me" (idiomatic)'
        ),
        'connections': (
            '- Previous Day (Day 17): GOT + Hospital INTER\n'
            '- Next Day (Day 19): COME/SEE + Cinema\n'
            '- RESTAURANT REPEAT: Was BASIC on Day 13, now INTERMEDIATE'
        ),
        'special': (
            '- MAKE = Create/Produce (make food, make plans, make noise)\n'
            '- TAKE = Receive/Remove (take a photo, take medicine, take bus)\n'
            '- ❌ "Make photo" → ✅ "Take a photo"\n'
            '- ❌ "Make bath" → ✅ "Take a bath"\n'
            '- SCENARIO REPEAT: is_repeat: true\n'
            '- previous_encounters: ["Day 13 - Basic"]\n'
            '- upcoming_advanced_versions: ["Day 26 - Advanced"]\n'
            '- difficulty_level: "intermediate"\n'
            '- Tab 3: "Can you MAKE it less spicy?", "I\'ll TAKE the chicken curry"'
        ),
    },

    19: {
        'theme': 'COME / SEE (Motion & Perception)',
        'words': [
            'come', 'comes', 'came', 'coming', 'see',
            'sees', 'saw', 'seen', 'come to', 'come with',
            'come back', 'see you', 'see movie', 'I see', 'come here',
        ],
        'scenario': '🎬 At cinema hall - Meeting friends for a movie',
        'struggles': (
            '- COME (irregular): come → came → come\n'
            '- SEE (irregular): see → saw → seen\n'
            '- "I saw him yesterday" vs "I have seen him"\n'
            '- "Come here" vs "Come to here" (wrong)\n'
            '- "I see" = "I understand" (idiomatic)'
        ),
        'connections': (
            '- Previous Day (Day 18): MAKE/TAKE\n'
            '- Next Day (Day 20): WILL/WOULD + Auto INTER\n'
            '- Cinema scenario (light topic before grammar)'
        ),
        'special': (
            '- COME back = return, COME with = join, SEE you = meet later, I see = I understand\n'
            '- Tab 3: 2 friends + ticket counter person\n'
            '- "Did you COME by bus?", "Have you SEEN this movie before?", "I SAW the trailer yesterday"'
        ),
    },

    20: {
        'theme': 'WILL vs WOULD (Future + Politeness)',
        'words': [
            'will', 'would', "won't", "wouldn't", 'I will',
            'you will', 'he will', 'she will', 'I would', 'you would',
            'Would you', 'Will you', "I'll", "you'll", "we'll",
        ],
        'scenario': '🚕 Auto - Complex negotiation (INTERMEDIATE)',
        'struggles': (
            '- WILL (future) vs WOULD (polite/hypothetical)\n'
            '- "Will you help?" vs "Would you help?" (polite level)\n'
            '- "I would like" (polite want) vs "I want" (direct)\n'
            '- Contractions: I\'ll, you\'ll, he\'ll'
        ),
        'connections': (
            '- Previous Day (Day 19): COME/SEE\n'
            '- Next Day (Day 21): Shopping Practice\n'
            '- AUTO REPEAT: Was BASIC on Day 14, now INTERMEDIATE'
        ),
        'special': (
            '- WILL = Future action, WILL = Strong intention\n'
            '- WOULD = Polite request, WOULD = Hypothetical, "Would like" = Polite want\n'
            '- SCENARIO REPEAT: is_repeat: true\n'
            '- previous_encounters: ["Day 14 - Basic"]\n'
            '- difficulty_level: "intermediate"\n'
            '- Tab 3: Passenger + Auto Driver + Another passenger\n'
            '- "Would you go to airport?", "I WOULD like to go by highway", "Will you wait 5 minutes?"'
        ),
    },

    21: {
        'theme': 'Week 3 Practice - Shopping Mall Experience',
        'words': [
            'price', 'cost', 'cheap', 'expensive', 'discount',
            'sale', 'pay', 'buy', 'sell', 'size',
            'color', 'trial room', 'bill', 'receipt', 'exchange',
        ],
        'scenario': '🛒 Shopping mall - Multiple interactions',
        'struggles': (
            '- "How much is the cost?" (redundant) vs "How much?"\n'
            '- "Discount kardo" → "Can you give a discount?"\n'
            '- "Price kya hai?" → "What\'s the price?"\n'
            '- "Trial karna" → "Try it on" / "Use trial room"'
        ),
        'connections': (
            '- Week 3 complete: GET, MAKE/TAKE, COME/SEE, WILL/WOULD\n'
            '- Next Day (Day 22): Simple Past + Phone BASIC'
        ),
        'special': (
            '- Week 3 Review celebration\n'
            '- Combine all Week 3 verbs: GET "Can I get this shirt?", MAKE/TAKE "I\'ll take this", '
            'COME/SEE "Come see this sale", WILL/WOULD "Would you give discount?"\n'
            '- Tab 3: Customer + Sales person + Cashier, full shopping flow\n'
            '- Preview Week 4 (Tenses Deep)'
        ),
    },

    # ══ WEEK 4: MASTER — Tenses Deep ══════════════════════════════════════════
    22: {
        'theme': 'Simple Past Tense (भूतकाल) - Yesterday & Before',
        'words': [
            'was', 'were', 'went', 'came', 'did',
            'ate', 'drank', 'slept', 'worked', 'played',
            'saw', 'got', 'made', 'took', 'had',
        ],
        'scenario': '📱 Phone - Customer Service Call (BASIC)',
        'struggles': (
            '- Irregular past forms: go→went, eat→ate, see→saw\n'
            '- "I eated" (wrong) vs "I ate"\n'
            '- "Yesterday I go" (wrong) vs "Yesterday I went"\n'
            '- Double past: "I did went" (wrong)'
        ),
        'connections': (
            '- Previous: Week 3 Practice\n'
            '- Next Day (Day 23): Past Continuous + Bank\n'
            '- FIRST PHONE SCENARIO: Will repeat Day 29'
        ),
        'special': (
            '- Bridge: "भूतकाल = Past Tense — kal jo hua woh"\n'
            '- Irregular verbs: go→went, eat→ate, drink→drank, see→saw, come→came, do→did\n'
            '- Regular verbs: add -ed (work→worked, play→played)\n'
            '- SCENARIO REPEAT — difficulty_level: "basic"\n'
            '- upcoming_advanced_versions: ["Day 29 - Advanced"]\n'
            '- Tab 3: Customer + Customer Service Rep\n'
            '- "I ordered a product yesterday", "It didn\'t arrive", "Did you receive my complaint?"'
        ),
    },

    23: {
        'theme': 'Past Continuous (was/were + verb-ing)',
        'words': [
            'was going', 'was eating', 'was sleeping', 'were working', 'were playing',
            'were talking', 'was coming', 'was making', 'was writing', 'was reading',
            'was speaking', 'was listening', 'was watching', 'was studying', 'was waiting',
        ],
        'scenario': '🏦 Bank - Opening account (BASIC)',
        'struggles': (
            '- was vs were selection\n'
            '- "I was go" vs "I was going"\n'
            '- When to use Past Simple vs Past Continuous\n'
            '- "While I was ___, he ___" structure'
        ),
        'connections': (
            '- Previous Day (Day 22): Simple Past\n'
            '- Next Day (Day 24): Past Perfect + Hospital ADV\n'
            '- FIRST BANK SCENARIO: Will repeat Day 27'
        ),
        'special': (
            '- Structure: was/were + verb+ing\n'
            '- "At 8 PM, I was eating dinner", "While I was sleeping, the phone rang"\n'
            '- Past Simple vs Past Continuous: "I ate" = completed, "I was eating" = in progress\n'
            '- SCENARIO REPEAT — difficulty_level: "basic"\n'
            '- upcoming_advanced_versions: ["Day 27 - Advanced"]\n'
            '- Tab 3: Customer + Bank officer + Manager\n'
            '- "I was thinking to open an account", "I was waiting for 30 minutes"'
        ),
    },

    24: {
        'theme': 'Past Perfect (had + past participle)',
        'words': [
            'had gone', 'had eaten', 'had seen', 'had come', 'had done',
            'had made', 'had taken', 'had given', 'had started', 'had finished',
            'had arrived', 'had left', 'had worked', 'had lived', 'had forgotten',
        ],
        'scenario': '🏥 Hospital - Emergency/Complex case (ADVANCED)',
        'struggles': (
            '- When to use Past Perfect vs Simple Past\n'
            '- "Had + V3" structure (V3 = past participle)\n'
            '- "I had went" (wrong) vs "I had gone"\n'
            '- Sequence of past events'
        ),
        'connections': (
            '- Previous Day (Day 23): Past Continuous\n'
            '- Next Day (Day 25): Future + Airport BASIC\n'
            '- HOSPITAL REPEAT: Basic Day 12, Inter Day 17, now ADVANCED'
        ),
        'special': (
            '- Past Perfect = Past before Past\n'
            '- "When I arrived, she had already left"\n'
            '- Irregular V3: go→gone, eat→eaten, see→seen, do→done\n'
            '- SCENARIO REPEAT: is_repeat: true\n'
            '- previous_encounters: ["Day 12 - Basic", "Day 17 - Intermediate"]\n'
            '- upcoming_advanced_versions: ["Day 30 - Master"]\n'
            '- difficulty_level: "advanced"\n'
            '- Tab 3: Patient + Specialist Doctor + Nurse\n'
            '- SAAVI references previous hospital visits'
        ),
    },

    25: {
        'theme': 'Simple Future (will + verb, going to + verb)',
        'words': [
            'will go', 'will eat', 'will come', 'going to go', 'going to eat',
            'will be', 'will have', 'will do', "I'll", "you'll",
            "he'll", "won't", 'shall', 'tomorrow', 'next week',
        ],
        'scenario': '✈️ Airport - Check-in for domestic flight (BASIC)',
        'struggles': (
            '- "Will" vs "Going to" (nuance difference)\n'
            '- "I am going" (present continuous) vs "I will go"\n'
            '- "Will" for decisions made NOW\n'
            '- "Going to" for pre-planned actions'
        ),
        'connections': (
            '- Previous Day (Day 24): Past Perfect + Hospital ADV\n'
            '- Next Day (Day 26): Future Continuous + Restaurant ADV\n'
            '- FIRST AIRPORT SCENARIO: Will repeat Day 32, 46'
        ),
        'special': (
            '- Bridge: "भविष्यत् काल = Future Tense"\n'
            '- WILL: "I will go" (decision now), GOING TO: "I am going to go" (planned)\n'
            '- Contractions: I\'ll, you\'ll, he\'ll, she\'ll, we\'ll, they\'ll\n'
            '- SCENARIO REPEAT — difficulty_level: "basic"\n'
            '- upcoming_advanced_versions: ["Day 32 - Advanced", "Day 46 - Master"]\n'
            '- Tab 3: Passenger + Airline staff + Security, simple future usage'
        ),
    },

    26: {
        'theme': 'Future Continuous (will be + verb-ing)',
        'words': [
            'will be going', 'will be eating', 'will be waiting', 'will be coming', 'will be working',
            'will be staying', 'will be meeting', 'will be doing', 'will be having', 'will be watching',
            'will be traveling', 'will be studying', 'will be calling', 'will be arriving', 'will be leaving',
        ],
        'scenario': '🍛 Restaurant - Complaint about order (ADVANCED)',
        'struggles': (
            '- "Will be + V-ing" structure\n'
            '- When to use Simple Future vs Future Continuous\n'
            '- Polite future with continuous'
        ),
        'connections': (
            '- Previous Day (Day 25): Simple Future\n'
            '- Next Day (Day 27): SHOULD/MUST + Bank ADV\n'
            '- RESTAURANT REPEAT: Basic Day 13, Inter Day 18, now ADVANCED'
        ),
        'special': (
            '- Future Continuous = Ongoing future action\n'
            '- "This time tomorrow, I will be flying to Delhi"\n'
            '- SCENARIO REPEAT: is_repeat: true\n'
            '- previous_encounters: ["Day 13 - Basic", "Day 18 - Intermediate"]\n'
            '- difficulty_level: "advanced"\n'
            '- Tab 3: Customer + Waiter + Manager + Chef\n'
            '- "We will be leaving if the food doesn\'t come", "Will you be taking this off the bill?"'
        ),
    },

    27: {
        'theme': 'SHOULD vs MUST vs HAVE TO (Modals comparison)',
        'words': [
            'should', "shouldn't", 'must', "mustn't", 'have to',
            "don't have to", 'ought to', 'had better', 'need to', 'need not',
            'You should', 'I must', 'We have to', 'It must be', 'She should',
        ],
        'scenario': '🏦 Bank - Loan discussion (ADVANCED)',
        'struggles': (
            '- SHOULD = advice/recommendation\n'
            '- MUST = strong obligation\n'
            '- HAVE TO = external obligation\n'
            '- "Must not" (prohibition) vs "Don\'t have to" (no obligation) — CRITICAL'
        ),
        'connections': (
            '- Previous Day (Day 26): Future Continuous\n'
            '- Next Day (Day 28): Storytelling\n'
            '- BANK REPEAT: Basic Day 23, now ADVANCED'
        ),
        'special': (
            '- Modal scale: Can/Could < Should < Ought to < Have to < Must\n'
            '- CRITICAL: "You must not smoke" = prohibited, "You don\'t have to smoke" = optional\n'
            '- SCENARIO REPEAT: is_repeat: true\n'
            '- previous_encounters: ["Day 23 - Basic"]\n'
            '- difficulty_level: "advanced"\n'
            '- Tab 3: Customer + Loan officer + Manager'
        ),
    },

    28: {
        'theme': 'Week 4 Practice - Telling a Story (Using All Tenses)',
        'words': [
            'once', 'suddenly', 'then', 'after', 'before',
            'while', 'during', 'meanwhile', 'finally', 'eventually',
            'yesterday', 'last week', 'next', 'first', 'at last',
        ],
        'scenario': '🎉 Family gathering - Narrating a funny incident',
        'struggles': (
            '- Sequencing words (first, then, finally)\n'
            '- Mixing past tenses correctly\n'
            '- Time markers\n'
            '- "Suddenly" placement in sentence'
        ),
        'connections': (
            '- Week 4 complete: Past Simple, Continuous, Perfect, Future, Modals\n'
            '- Next Day (Day 29): Office + Phone ADV'
        ),
        'special': (
            '- Week 4 celebration\n'
            '- Focus: Using all tenses together in narrative\n'
            '- Connect words for storytelling\n'
            '- Story: "Yesterday I WAS GOING to market", "Suddenly it STARTED raining", '
            '"I HAD forgotten my umbrella", "I WILL buy a new one tomorrow"\n'
            '- Preview Week 5 (Confidence building)'
        ),
    },

    # ══ WEEK 5: CONFIDENCE — Real Situations ══════════════════════════════════
    29: {
        'theme': 'Office Communication + Phone Mastery',
        'words': [
            'meeting', 'deadline', 'project', 'report', 'presentation',
            'schedule', 'appointment', 'colleague', 'manager', 'team',
            'follow up', 'update', 'approve', 'discuss', 'decide',
        ],
        'scenario': '📱 Business Phone Call (ADVANCED)',
        'struggles': (
            '- Formal vs informal office language\n'
            '- Phone etiquette (Hold on, I\'ll transfer, etc.)\n'
            '- Email subject matter conversations\n'
            '- Professional interruption phrases'
        ),
        'connections': (
            '- Previous Day (Day 28): Week 4 Practice\n'
            '- Next Day (Day 30): Hospital MASTER\n'
            '- PHONE REPEAT: Was BASIC on Day 22, now ADVANCED'
        ),
        'special': (
            '- First day of Week 5 (CONFIDENCE)\n'
            '- SCENARIO REPEAT: is_repeat: true\n'
            '- previous_encounters: ["Day 22 - Basic"]\n'
            '- difficulty_level: "advanced"\n'
            '- Tab 3: Employee + Client + Manager (3-way call)\n'
            '- "I\'m calling regarding the contract", "Could you hold for a moment?", '
            '"I\'ll follow up via email"'
        ),
    },

    30: {
        'theme': 'Hospital Master - Complete Healthcare Scenarios',
        'words': [
            'symptom', 'diagnosis', 'prescription', 'appointment', 'consultation',
            'insurance', 'treatment', 'medicine', 'side effects', 'allergy',
            'emergency', 'follow-up', 'specialist', 'surgery', 'recovery',
        ],
        'scenario': '🏥 Full hospital visit with insurance, prescription',
        'struggles': (
            '- Medical vocabulary in English\n'
            '- Describing symptoms accurately\n'
            '- Understanding doctor\'s instructions\n'
            '- Insurance/billing conversations'
        ),
        'connections': (
            '- Previous Day (Day 29): Office + Phone ADV\n'
            '- Next Day (Day 31): Complaints\n'
            '- HOSPITAL FINAL MASTERY: Day 12 (Basic) → Day 17 (Inter) → Day 24 (Advanced) → TODAY (Master)'
        ),
        'special': (
            '- MASTER level hospital scenarios\n'
            '- SAAVI celebrates hospital journey completion\n'
            '- SCENARIO REPEAT: is_repeat: true\n'
            '- previous_encounters: ["Day 12 - Basic", "Day 17 - Intermediate", "Day 24 - Advanced"]\n'
            '- difficulty_level: "master"\n'
            '- Tab 3: Patient + Doctor + Nurse + Insurance officer\n'
            '- Full journey: Reception → Consultation → Tests → Diagnosis → Prescription → Insurance → Follow-up\n'
            '- "Will my insurance cover this?", "Here\'s your prescription. Take it with food"'
        ),
    },

    31: {
        'theme': 'Complaints, Issues & Problem Solving',
        'words': [
            'complaint', 'issue', 'problem', 'defective', 'faulty',
            'refund', 'replacement', 'repair', 'warranty', 'receipt',
            'solution', 'resolve', 'apologize', 'understand', 'satisfied',
        ],
        'scenario': '⚠️ Service center - Product complaint',
        'struggles': (
            '- Polite complaint language\n'
            '- Being assertive without being rude\n'
            '- Describing the problem clearly\n'
            '- Requesting resolution'
        ),
        'connections': (
            '- Previous Day (Day 30): Hospital Master\n'
            '- Next Day (Day 32): Travel + Airport ADV'
        ),
        'special': (
            '- Key phrases: "I\'d like to report an issue...", '
            '"Unfortunately, the product is...", "Could you please resolve this..."\n'
            '- Tab 3: Customer + Service rep + Manager\n'
            '- "I purchased this product yesterday but...", "Can you escalate this matter?"'
        ),
    },

    32: {
        'theme': 'Travel English + Airport Immigration (ADVANCED)',
        'words': [
            'passport', 'visa', 'immigration', 'customs', 'boarding pass',
            'luggage', 'baggage', 'declare', 'duration', 'purpose',
            'transit', 'layover', 'departure', 'arrival', 'jet lag',
        ],
        'scenario': '✈️ International airport - Immigration & Customs',
        'struggles': (
            '- Immigration officer questions\n'
            '- Customs declaration\n'
            '- Travel duration/purpose phrases\n'
            '- International vocabulary'
        ),
        'connections': (
            '- Previous Day (Day 31): Complaints\n'
            '- Next Day (Day 33): Bank/Documents\n'
            '- AIRPORT REPEAT: Basic Day 25, now ADVANCED'
        ),
        'special': (
            '- SCENARIO REPEAT: is_repeat: true\n'
            '- previous_encounters: ["Day 25 - Basic"]\n'
            '- upcoming_advanced_versions: ["Day 46 - Master"]\n'
            '- difficulty_level: "advanced"\n'
            '- "What\'s the purpose of your visit?", "How long will you stay?", '
            '"Do you have anything to declare?"\n'
            '- Tab 3: Passenger + Immigration officer + Customs officer'
        ),
    },

    33: {
        'theme': 'Bank & Document-heavy Conversations',
        'words': [
            'document', 'verify', 'identity', 'proof', 'signature',
            'application', 'form', 'submit', 'reject', 'approve',
            'pending', 'processed', 'review', 'confirm', 'authorize',
        ],
        'scenario': '🏦 Bank - Document verification & account issues',
        'struggles': (
            '- Document-related vocabulary\n'
            '- Passive voice in formal contexts\n'
            '- Following document procedures\n'
            '- Bank-specific terms'
        ),
        'connections': (
            '- Previous Day (Day 32): Travel + Airport ADV\n'
            '- Next Day (Day 34): Shopping + Bus ADV'
        ),
        'special': (
            '- Formal passive constructions: "Your application is being processed", '
            '"Documents will be verified"\n'
            '- Tab 3: Customer + Clerk + Manager, formal dialogue about documents'
        ),
    },

    34: {
        'theme': 'Shopping Negotiation + Long Bus Journey',
        'words': [
            'bargain', 'negotiate', 'offer', 'reasonable', 'affordable',
            'quality', 'brand', 'original', 'duplicate', 'warranty',
            'exchange', 'return', 'preferred', 'suitable', 'recommend',
        ],
        'scenario': '🚍 Long-distance bus journey (ADVANCED)',
        'struggles': (
            '- Bargaining in English\n'
            '- Quality comparisons\n'
            '- Travel complications\n'
            '- Long conversation maintenance'
        ),
        'connections': (
            '- Previous Day (Day 33): Bank Documents\n'
            '- Next Day (Day 35): Multi-scenario practice\n'
            '- BUS REPEAT: Was BASIC on Day 16, now ADVANCED'
        ),
        'special': (
            '- SCENARIO REPEAT: is_repeat: true\n'
            '- previous_encounters: ["Day 16 - Basic"]\n'
            '- difficulty_level: "advanced"\n'
            '- Tab 3: Passenger + Conductor + Fellow passenger + Helper\n'
            '- Complex dialogue during long trip, small talk with co-passengers'
        ),
    },

    35: {
        'theme': 'Week 5 Practice - Multiple Scenarios in One Day',
        'words': [
            'meanwhile', 'afterward', 'later', 'early', 'soon',
            'eventually', 'briefly', 'quickly', 'immediately', 'gradually',
            'suddenly', 'finally', 'at once', 'in the end', 'all day',
        ],
        'scenario': '🎭 Full day: Office → Lunch → Bank → Evening',
        'struggles': (
            '- Switching between contexts\n'
            '- Transitioning smoothly\n'
            '- Maintaining tone across situations'
        ),
        'connections': (
            '- Week 5 complete: Office, Hospital, Complaints, Travel, Bank, Shopping\n'
            '- Next Day (Day 36): Connectors'
        ),
        'special': (
            '- Week 5 celebration\n'
            '- Multi-scenario confidence\n'
            '- Tab 3: Day-long narrative, Office meeting → Lunch break → Bank visit → Evening plan'
        ),
    },

    # ══ WEEK 6: FLUENCY — Advanced ════════════════════════════════════════════
    36: {
        'theme': 'Sentence Connectors - Linking Ideas',
        'words': [
            'and', 'but', 'because', 'so', 'or',
            'however', 'therefore', 'although', 'moreover', 'nevertheless',
            'besides', 'furthermore', 'also', 'too', 'either',
        ],
        'scenario': '📖 Explaining a detailed situation',
        'struggles': (
            '- Overusing "and" for everything\n'
            '- "But" vs "However" (formal level)\n'
            '- Causal connection: because, so, therefore\n'
            '- Contrast: but, however, although'
        ),
        'connections': (
            '- Previous Day (Day 35): Week 5 Practice\n'
            '- Next Day (Day 37): Questions Mastery\n'
            '- First day of Week 6 (FLUENCY)'
        ),
        'special': (
            '- Bridge to native: "और = and, लेकिन = but, क्योंकि = because"\n'
            '- AND: addition, BUT: contrast, BECAUSE: reason, SO: result\n'
            '- Tab 3: 2 friends in serious conversation using connectors throughout'
        ),
    },

    37: {
        'theme': 'All Wh-Questions - Complete Mastery',
        'words': [
            'What', 'Where', 'When', 'Who', 'Why',
            'How', 'Which', 'Whose', 'How many', 'How much',
            'What if', 'How long', 'How often', 'How far', 'How come',
        ],
        'scenario': '❓ Interview - Asking and answering questions',
        'struggles': (
            '- Question word order in English\n'
            '- "How much" (uncountable) vs "How many" (countable)\n'
            '- "Which" vs "What" for choices\n'
            '- Indirect questions in polite form'
        ),
        'connections': (
            '- Previous Day (Day 36): Connectors\n'
            '- Next Day (Day 38): Prepositions'
        ),
        'special': (
            '- Direct: "What is your name?", Indirect: "Can you tell me what your name is?"\n'
            '- Tab 3: Interviewer asking variety of questions, Candidate answering professionally'
        ),
    },

    38: {
        'theme': 'Prepositions (in, on, at, to, from, with, by)',
        'words': [
            'in', 'on', 'at', 'to', 'from',
            'with', 'by', 'for', 'of', 'about',
            'under', 'over', 'between', 'beside', 'behind',
        ],
        'scenario': '📍 Giving directions to someone',
        'struggles': (
            '- "In" Monday vs "On" Monday (on for days)\n'
            '- "At" 5 PM vs "In" 5 PM (at for time)\n'
            '- Time prepositions (at, on, in) confusion\n'
            '- "By bus" vs "With bus"'
        ),
        'connections': (
            '- Previous Day (Day 37): Questions\n'
            '- Next Day (Day 39): Comparisons'
        ),
        'special': (
            '- Time: AT specific time "at 5 PM", ON specific day "on Monday", IN period "in March"\n'
            '- Place: IN (inside) "in the room", ON (surface) "on the table", AT (point) "at the door"\n'
            '- Tab 3: Local + Tourist + Friend, lots of preposition usage'
        ),
    },

    39: {
        'theme': 'Comparative & Superlative (Better, Worse, Best, Worst)',
        'words': [
            'better', 'worse', 'best', 'worst', 'bigger',
            'smaller', 'faster', 'slower', 'more', 'less',
            'most', 'least', 'taller', 'shorter', 'richer',
        ],
        'scenario': '⚖️ Product comparison at shop',
        'struggles': (
            '- Adding -er for comparatives (not "more big")\n'
            '- "More better" (wrong — double comparative)\n'
            '- Irregular: good→better→best, bad→worse→worst\n'
            '- "Than" usage in comparisons'
        ),
        'connections': (
            '- Previous Day (Day 38): Prepositions\n'
            '- Next Day (Day 40): Phrasal Verbs'
        ),
        'special': (
            '- Short adjectives: +er (bigger), Long: more + adjective (more beautiful)\n'
            '- Irregular: good-better-best, bad-worse-worst\n'
            '- "Than" for comparison: "Bigger than"\n'
            '- Tab 3: Customer comparing two products, Sales person explaining differences'
        ),
    },

    40: {
        'theme': 'Common Phrasal Verbs (pick up, drop off, get along)',
        'words': [
            'pick up', 'drop off', 'get along', 'look after', 'look for',
            'look up', 'turn on', 'turn off', 'turn up', 'put on',
            'put off', 'put up with', 'work out', 'give up', 'take over',
        ],
        'scenario': '🏋️ Gym - Fitness conversation',
        'struggles': (
            '- Idiomatic meaning not literal\n'
            '- Separable vs inseparable phrasals\n'
            '- Multiple meanings of same phrasal'
        ),
        'connections': (
            '- Previous Day (Day 39): Comparisons\n'
            '- Next Day (Day 41): Conditionals'
        ),
        'special': (
            '- Literal vs idiomatic: "Pick up" = lift / learn / collect\n'
            '- Tab 3: Friends working out at gym, natural phrasal use\n'
            '- "I work out every day", "Turn on the music", "Don\'t give up"'
        ),
    },

    41: {
        'theme': 'Conditional Sentences (First & Second Conditional)',
        'words': [
            'if', 'then', 'unless', 'provided', 'I will',
            'I would', 'I can', 'I could', 'suppose', 'what if',
            'in case', 'otherwise', 'as long as', 'assuming', 'given that',
        ],
        'scenario': '🌧️ Planning based on weather',
        'struggles': (
            '- "If I will" (wrong) vs "If I am" (right)\n'
            '- First conditional (real future) vs Second (hypothetical)\n'
            '- "Unless" = "If not"'
        ),
        'connections': (
            '- Previous Day (Day 40): Phrasal Verbs\n'
            '- Next Day (Day 42): Full Conversation'
        ),
        'special': (
            '- First: If + present, will + verb: "If it rains, I will stay home"\n'
            '- Second: If + past, would + verb: "If I were rich, I would buy a car"\n'
            '- Tab 3: Family deciding weekend plans, if-then structures throughout'
        ),
    },

    42: {
        'theme': 'Week 6 Review - Full Conversation Fluency',
        'words': [
            'I think', 'I believe', 'in my opinion', 'I agree', 'I disagree',
            "You're right", 'However', 'On the other hand', 'Actually', 'Moreover',
            'In contrast', 'Besides', "That's true", 'Exactly', 'Absolutely',
        ],
        'scenario': '🎤 Debate/Discussion - Expressing opinions',
        'struggles': (
            '- Opinion expression politely\n'
            '- Agreement/disagreement nuance\n'
            '- Maintaining long conversation'
        ),
        'connections': (
            '- Week 6 complete: Connectors, Questions, Prepositions, Comparisons, Phrasal, Conditionals\n'
            '- Next Day (Day 43): Social Media'
        ),
        'special': (
            '- Week 6 celebration\n'
            '- Polite disagreement phrases\n'
            '- Tab 3: 2-3 people discussing a topic, using all Week 6 skills\n'
            '- Preview Week 7 (Real World)'
        ),
    },

    # ══ WEEK 7: REAL WORLD — Confidence ══════════════════════════════════════
    43: {
        'theme': 'Social Media & Digital Communication',
        'words': [
            'post', 'share', 'comment', 'like', 'follow',
            'message', 'chat', 'video call', 'online', 'offline',
            'notification', 'subscribe', 'unfollow', 'block', 'report',
        ],
        'scenario': '📱 WhatsApp/Instagram conversations',
        'struggles': (
            '- Social media English differs from spoken\n'
            '- Abbreviations (BRB, TTYL, IMO)\n'
            '- Emoji descriptions\n'
            '- Online etiquette'
        ),
        'connections': (
            '- Previous Day (Day 42): Week 6 Practice\n'
            '- Next Day (Day 44): Parent-Teacher\n'
            '- First day of Week 7 (REAL WORLD)'
        ),
        'special': (
            '- Digital vocabulary + WhatsApp conversation patterns\n'
            '- Common abbreviations: BRB, TTYL, IMO, LOL\n'
            '- Tab 3: Friends on WhatsApp + group chat, modern English usage'
        ),
    },

    44: {
        'theme': 'Parent-Teacher Meetings & School Communication',
        'words': [
            'progress', 'performance', 'attendance', 'behavior', 'discipline',
            'improvement', 'weakness', 'strength', 'report card', 'grade',
            'homework', 'extra class', 'tuition', 'encourage', 'motivate',
        ],
        'scenario': '👨‍🏫 PTM - Discussing child\'s progress',
        'struggles': (
            '- School-specific vocabulary\n'
            '- Discussing academic issues politely\n'
            '- Understanding teacher feedback\n'
            '- Asking for improvements'
        ),
        'connections': (
            '- Previous Day (Day 43): Social Media\n'
            '- Next Day (Day 45): Government Office'
        ),
        'special': (
            '- Tab 3: Parent + Teacher + Principal (3 characters)\n'
            '- Detailed discussion about child\'s performance'
        ),
    },

    45: {
        'theme': 'Government Office Interactions',
        'words': [
            'application', 'form', 'document', 'ID proof', 'address proof',
            'fee', 'stamp', 'signature', 'counter', 'queue',
            'receipt', 'acknowledgment', 'original', 'photocopy', 'verified',
        ],
        'scenario': '🛂 Passport office - Application process',
        'struggles': (
            '- Formal government English\n'
            '- Procedural language\n'
            '- Asking clarifications\n'
            '- Understanding instructions'
        ),
        'connections': (
            '- Previous Day (Day 44): Parent-Teacher\n'
            '- Next Day (Day 46): Airport MASTER'
        ),
        'special': (
            '- Formal request patterns\n'
            '- Tab 3: Applicant + Officer + Helper, full procedural conversation'
        ),
    },

    46: {
        'theme': 'Airport Complete Mastery - Full Journey',
        'words': [
            'itinerary', 'booking', 'confirmation', 'terminal', 'gate',
            'check-in', 'baggage claim', 'transit', 'connecting flight', 'delay',
            'cancellation', 'upgrade', 'seat selection', 'frequent flyer', 'boarding',
        ],
        'scenario': '✈️ International flight - Complete journey',
        'struggles': (
            '- Complex airport situations\n'
            '- Flight-related problems\n'
            '- International travel English\n'
            '- Complete journey vocabulary'
        ),
        'connections': (
            '- Previous Day (Day 45): Government Office\n'
            '- Next Day (Day 47): Small Talk\n'
            '- AIRPORT FINAL: Basic Day 25 → Advanced Day 32 → Master TODAY'
        ),
        'special': (
            '- MASTER level airport scenarios\n'
            '- SCENARIO REPEAT: is_repeat: true\n'
            '- previous_encounters: ["Day 25 - Basic", "Day 32 - Advanced"]\n'
            '- difficulty_level: "master"\n'
            '- Tab 3: Passenger + Check-in + Security + Boarding + Flight attendant\n'
            '- Full airport experience from arrival to boarding'
        ),
    },

    47: {
        'theme': 'Small Talk - Networking & Strangers',
        'words': [
            'introduce', 'acquaintance', 'network', 'connect', 'mingle',
            'business card', 'exchange', 'follow up', 'profession', 'industry',
            'conference', 'event', 'gathering', 'colleague', 'contact',
        ],
        'scenario': '🤝 Networking event - Meeting new people',
        'struggles': (
            '- Starting conversations with strangers\n'
            '- Maintaining light conversation\n'
            '- Knowing when to exit conversation\n'
            '- Professional networking'
        ),
        'connections': (
            '- Previous Day (Day 46): Airport Master\n'
            '- Next Day (Day 48): Presentation'
        ),
        'special': (
            '- Small talk starters, safe topics: weather, travel, hobbies\n'
            '- Tab 3: Multiple people (3-4 characters), natural networking flow'
        ),
    },

    48: {
        'theme': 'Public Speaking & Presentations',
        'words': [
            'introduce', 'overview', 'agenda', 'summary', 'conclude',
            'explain', 'elaborate', 'clarify', 'emphasize', 'highlight',
            'statistics', 'data', 'evidence', 'example', 'illustrate',
        ],
        'scenario': '🎤 Team meeting presentation',
        'struggles': (
            '- Public speaking nervousness\n'
            '- Structuring a presentation\n'
            '- Engaging audience\n'
            '- Handling questions'
        ),
        'connections': (
            '- Previous Day (Day 47): Small Talk\n'
            '- Next Day (Day 49): Mock Interview'
        ),
        'special': (
            '- Presentation structure + transition phrases + confidence building\n'
            '- Tab 3: Presenter + Audience + Question asker, full presentation flow'
        ),
    },

    49: {
        'theme': 'Full Job Interview - Mock Practice',
        'words': [
            'experience', 'skills', 'qualification', 'strength', 'weakness',
            'achievement', 'challenge', 'opportunity', 'salary', 'expectation',
            'position', 'role', 'responsibility', 'teamwork', 'leadership',
        ],
        'scenario': '👔 Complete job interview simulation',
        'struggles': (
            '- Common interview questions\n'
            '- Selling yourself professionally\n'
            '- Salary negotiation\n'
            '- Answering tricky questions'
        ),
        'connections': (
            '- Previous Day (Day 48): Presentation\n'
            '- Next Day (Day 50): GRADUATION!'
        ),
        'special': (
            '- Interview templates: "Tell me about yourself", "Why do you want this job?", '
            '"Where do you see yourself in 5 years?"\n'
            '- STAR method introduction\n'
            '- Tab 3: Interviewer + Candidate + HR, complete interview flow\n'
            '- SAAVI: "Kal aap graduate ho jaayenge!"'
        ),
    },

    50: {
        'theme': 'Graduation - Celebration & Certificate + Forward Looking',
        'words': [
            'achievement', 'accomplish', 'journey', 'milestone', 'transformation',
            'proud', 'confident', 'capable', 'fluent', 'mastery',
            'grateful', 'celebrate', 'graduation', 'certificate', 'future',
        ],
        'scenario': '🎓 SAAVI\'s farewell message + Self-reflection',
        'struggles': (
            '- Closing/Farewell conversations\n'
            '- Expressing gratitude\n'
            '- Future planning language\n'
            '- Self-reflection vocabulary'
        ),
        'connections': (
            '- Previous Day (Day 49): Mock Interview\n'
            '- THIS IS THE FINAL DAY — celebrate journey!'
        ),
        'special': (
            '- SPECIAL: This is the GRADUATION DAY — emotional, inspiring tone\n'
            '- SAAVI celebrates the 50-day journey\n'
            '- Recap: Week 1 Foundation, Week 2-3 Mega-verbs, Week 4 Tenses, Week 5-7 Real world\n'
            '- SAAVI\'s final message: "50 din pehle aap confuse the. Aaj aap confident hain. '
            'Yeh sirf English nahi, yeh transformation hai. Aap kar chuke hain!"\n'
            '- Tab 3: SAAVI speaking directly to learner + one friend/mentor voice\n'
            '- Challenge: "Ab agla kadam — sikhao kisi aur ko"\n'
            '- Tomorrow preview: "Ab aap khud ke shikshak hain"\n'
            '- Certificate design hint in thumbnail prompt\n'
            '- Total duration can be longer than 20 min for this finale day'
        ),
    },
}


# Override embedded DAY_TOPICS with curriculum_v2.json if present
# (V2 = Rapidex-based 49-day sequence with rich per-day fields)
if _CURRICULUM_V2:
    DAY_TOPICS = _CURRICULUM_V2


# ── Build user prompt ─────────────────────────────────────────────────────────
def build_user_prompt(lang: str, day: int) -> str:
    cfg  = LANG_CONFIG[lang]
    topic = DAY_TOPICS[day]

    words_str = ', '.join(topic['words'])
    special_section = ''
    if topic.get('special'):
        special_section = f'\nSPECIAL INSTRUCTIONS FOR THIS DAY:\n{topic["special"]}\n'

    # ── V2 (Rapidex-based) rich fields — concentrate DeepSeek's output ──
    v2_section = ''
    if topic.get('core_concepts'):
        # Format core concepts as numbered list
        concepts_list = '\n'.join([f'{i}. {c}' for i, c in enumerate(topic['core_concepts'], 1)])
        examples_list = '\n'.join([f'- {ex}' for ex in topic.get('sample_examples', [])])
        phase = topic.get('phase', 'RIDE')
        duration = topic.get('duration_min', 25)

        v2_section = f"""
═══════════════════════════════════════════════════════════
📕 RAPIDEX-BASED LESSON BLUEPRINT (use these EXACT inputs)
═══════════════════════════════════════════════════════════
LESSON PHASE: {phase}  (RIDE = 60% experience, PATTERN = 30% formula, WHY = 10% optional)
DURATION: {duration} minutes core

🎯 CORE CONCEPTS (cover ALL of these — non-negotiable):
{concepts_list}

🎬 HOOK / OPENING STORY (use this exact scenario):
{topic.get('hook', '')}

📝 SAMPLE EXAMPLES (use these as reference, expand to 5 per word):
{examples_list}

🚫 COMMON INDIAN MISTAKE TO ADDRESS:
{topic.get('common_mistake', '')}

🎨 VISUAL IDEA (describe in tab_1.visuals):
{topic.get('visual_idea', '')}

🎬 ANIMATION IDEA (describe in tab_1.animation):
{topic.get('animation_idea', '')}

═══════════════════════════════════════════════════════════
"""

    # Day-specific concept teaching (if defined)
    concept_section = ''
    if topic.get('concept_first'):
        concept_section = f"""
═══════════════════════════════════════════════════════════
🎯 CONCEPT-FIRST TEACHING (THIS IS THE MOST IMPORTANT PART)
═══════════════════════════════════════════════════════════
{topic['concept_first']}

Tab 1 ka pehla section yeh CONCEPT teach karega — words baad mein.
Concept screens mein:
1. Hindi grammar terminology pehle ({cfg['native_name']} mein)
2. Hindi pattern dikhao (jo student already jaanta hai)
3. English pattern dikhao (mapping kaise hota hai)
4. Side-by-side comparison table
5. Golden Rule card
═══════════════════════════════════════════════════════════
"""

    # V2 fallback: derive Tab 3 scenario from hook if not provided
    tab3_scenario = topic.get('scenario') or topic.get('hook', '🏠 Daily life context')
    duration_min = topic.get('duration_min', 20)

    return f"""Generate Day {day} of 49.

LANGUAGE: {cfg['name']}

TOPIC: {topic['theme']}

SCENARIO FOR TAB 3: {tab3_scenario}

WORDS/PHRASES TO TEACH (15 items):
{words_str}

WHERE STUDENTS STRUGGLE:
{topic['struggles']}

CONNECTIONS TO OTHER DAYS:
{topic['connections']}
{special_section}{concept_section}{v2_section}
TOTAL DURATION: {duration_min} minutes core

═══════════════════════════════════════════════════════════
⚠️ NON-NEGOTIABLE RULES (Reading these carefully = pass)
═══════════════════════════════════════════════════════════

🔴 RULE 1 — LANGUAGE RATIO: 90% Hindi/Hinglish, 10% English (STRICT)
   • SAAVI's voice (saavi_explanation, situation, intro, all teaching prose): 90%+ Hindi
   • English ONLY when it's the actual word/phrase being taught (always with pronunciation)
   • BAD: "When you introduce yourself, use 'I am'"
   • GOOD: "जब आप अपना परिचय दे रहे होते हैं, तब 'I am' (आई ऐम) का उपयोग करते हैं"
   • Even technical terms — prefer Hindi: "क्रिया" not "verb", "संज्ञा" not "noun"
   • Acceptable English mid-sentence: technical terms with no Hindi equivalent (computer, mobile)
   • Quiz questions, T/F statements, MCQ options: MUST be in Hindi
   • Match column: English phrase → Hindi translation (NOT English-to-English)

🔴 RULE 2 — PRONUNCIATION FOR EVERY ENGLISH WORD (NO EXCEPTIONS)
   • EVERY English word in the JSON MUST be followed by ({cfg['script']} pronunciation)
   • Format: English_word (देवनागरी_उच्चारण)
   • Examples:
     ✓ "Hello (हेलो)"
     ✓ "breakfast (ब्रेकफ़ास्ट)"
     ✓ "I am eating (आई ऐम ईटिंग)"
   • This includes ALL English words anywhere — examples, dialogue, MCQ options, flashcards, summary
   • SCAN your output: any standalone English word without (pronunciation) is a FAIL

🔴 RULE 3 — VOCABULARY INDEX (शब्दकोश) — MANDATORY NEW SECTION
   • Add a top-level field: "vocabulary_index"
   • This MUST list EVERY English word that appears anywhere in this day's content
   • Each entry has 4 fields:
     {{
       "english": "eat",
       "pronunciation": "ईट",
       "hindi_meaning": "खाना",
       "part_of_speech": "क्रिया (Verb)",
       "category": "Daily Action",
       "example_in_sentence": "I eat breakfast"
     }}
   • Part-of-speech values (use Hindi term first, English in brackets):
     - संज्ञा (Noun) — चीज़, व्यक्ति, जगह
     - सर्वनाम (Pronoun) — I, you, he, she
     - क्रिया (Verb) — action words
     - विशेषण (Adjective) — describing words
     - क्रिया विशेषण (Adverb) — how, when, where
     - पूर्वसर्ग (Preposition) — in, on, at
     - संयोजक (Conjunction) — and, but, or
     - विस्मयादिबोधक (Interjection) — wow, oh
     - सहायक क्रिया (Helping Verb) — am/is/are/have/has
   • Group by category at the end so reader can scan
   • Minimum 25-40 entries (covering all words across teaching + examples + dialogues + quiz)

🔴 RULE 4 — DEEP CONCEPT MAPPING (MULTI-SCREEN, EXHAUSTIVE)
   For Day 2 Present Tense (and any concept day), generate MULTIPLE concept screens:

   concept_first.screens MUST have AT LEAST 6 screens (and up to 8):

   📺 SCREEN 1: OVERVIEW
     - Hindi definition: वर्तमान काल kya hai (3-4 sentences)
     - Hindi mein iske 4 roop hain — name them:
       1. साधारण वर्तमान काल (Simple Present)
       2. वर्तमान निरंतर / सततवर्तमान काल (Present Continuous)
       3. वर्तमान पूर्ण काल (Present Perfect)
       4. वर्तमान पूर्ण निरंतर काल (Present Perfect Continuous)
     - 4 Hindi examples (one per form) — same verb (खाना) showing transformation:
       • मैं रोज़ खाता हूँ → I eat (आई ईट)
       • मैं अभी खा रहा हूँ → I am eating (आई ऐम ईटिंग)
       • मैंने खाया हुआ है → I have eaten (आई हैव ईटन)
       • मैं 2 घंटे से खा रहा हूँ → I have been eating for 2 hours (आई हैव बीन ईटिंग)

   📺 SCREEN 2: साधारण वर्तमान काल (Simple Present) — DETAIL
     - Hindi name + English name + meaning
     - When to use (Hindi): रोज़ की आदत, सच्चाई, आम बात, schedule
     - Structure formula:
       Subject + Verb (base) — for I/We/You/They
       Subject + Verb+s — for He/She/It (THIRD PERSON RULE)
     - 5 Hindi → English example pairs with full pronunciation:
       मैं चाय पीता हूँ → I drink tea (आई ड्रिंक टी)
       वह स्कूल जाता है → He goes (ही गोज़) to school
       सूरज पूरब से उगता है → The sun rises (राइज़ेज़) in the east
       वे क्रिकेट खेलते हैं → They play (प्ले) cricket
       मैं उसे जानता हूँ → I know (नो) him
     - Common mistake (with Chatur): ❌ "He go" → ✅ "He goes"
     - Visual icon: 🔄 (repeat / habit)

   📺 SCREEN 3: वर्तमान निरंतर काल (Present Continuous) — DETAIL
     - Same structure: name, when to use, formula, 5 examples, mistake
     - When: अभी हो रहा है, इस वक्त, आजकल
     - Formula: am/is/are + verb+ing
       I am + ing | He/She/It is + ing | We/You/They are + ing
     - 5 examples: मैं खा रहा हूँ → I am eating, etc.
     - Common mistake (Chatur): ❌ "I am knowing" → ✅ "I know"
       (KNOW, LIKE, LOVE, WANT — these don't take continuous form)
     - Visual: ⏳ (happening now)

   📺 SCREEN 4: वर्तमान पूर्ण काल (Present Perfect) — DETAIL
     - Hindi name, English name, when to use
     - Hindi: काम पूरा हो गया है (just completed action with present relevance)
     - Formula: have/has + V3 (third form of verb)
       I/We/You/They + have + V3
       He/She/It + has + V3
     - Verb forms table (V1 - V2 - V3):
       eat - ate - eaten (खाना - खाया - खाया हुआ)
       go - went - gone (जाना - गया - गया हुआ)
       do - did - done | see - saw - seen | come - came - come | etc.
     - 5 examples in Hindi & English with pronunciation
     - Indian common mistake: ❌ "I ate" instead of ✅ "I have eaten"
       (Hindi "मैंने खाया है" = "I have eaten" not "I ate")
     - Visual: ✅ (completed)

   📺 SCREEN 5: वर्तमान पूर्ण निरंतर काल (Present Perfect Continuous) — DETAIL
     - Hindi: कब से हो रहा है (action started in past, still continuing)
     - Formula: have/has been + verb+ing
     - "since" vs "for": since 2 baje = since 2 o'clock (specific point), for 2 ghante = for 2 hours (duration)
     - 5 examples
     - Common mistake: ❌ "I am studying since 2 hours" → ✅ "I have been studying for 2 hours"
     - Visual: ⏰ (continuing)

   📺 SCREEN 6: COMPARISON TABLE — All 4 forms side by side
     - Same verb (खाना/eat) shown in all 4 forms
     - Columns: Hindi rule | Hindi example | English structure | English example
     - Highlights when to use which form
     - Decision tree: "अगर आप ___ कहना चाहते हैं → use ___ form"

   📺 SCREEN 7: GOLDEN RULES (Top 5)
     - 5 numbered rules, each with example:
       1. Third person + s (He/She/It + verb+s)
       2. KNOW/LIKE/WANT — Simple Present always (no -ing)
       3. "since" + point in time, "for" + duration
       4. V1-V2-V3 forms must be memorized for Perfect
       5. Helping verbs: am/is/are (continuous), have/has (perfect)
     - Mnemonic: "TIPS — Third person, ING blocked verbs, Past form for Perfect, Since vs For"

   📺 SCREEN 8 (OPTIONAL): TIMELINE VISUAL
     - Visual representation: <----PAST----|----PRESENT----|----FUTURE---->
     - Show where each tense form lives on the timeline
     - Indian student examples: roz की chai (Simple), abhi chai (Continuous), chai pi li (Perfect)

   STRUCTURE FOR EACH SCREEN:
   {{
     "screen_number": N,
     "screen_name": "...",
     "hindi_grammar_term": "वर्तमान काल",
     "english_grammar_term": "Present Tense",
     "hindi_definition": "Detailed definition in Hindi (3-5 sentences)",
     "when_to_use": "List in Hindi",
     "structure_formula": {{
       "I/We/You/They": "...",
       "He/She/It": "..."
     }},
     "examples": [
       {{"hindi": "...", "english": "...", "pronunciation": "..."}}
     ],
     "common_mistake_chatur": {{"wrong": "...", "right": "...", "explanation": "..."}},
     "visual_icon": "🔄",
     "saavi_explanation": "..."
   }}

🔴 RULE 5 — INDIAN CONFUSION LIBRARY (Address Mistakes Explicitly)
   • At least 3 common_mistake fields MUST address the day's specific struggles
   • Format: ❌ Wrong + ✅ Right + Hindi explanation of WHY
   • Have Chatur (overconfident) make wrong, SAAVI correct with Hindi pattern

🔴 RULE 6A — HOOK SECTION (STORY OPENING)
   • Tab 1 MUST start with a "hook" section BEFORE the saavi_intro/concept
   • Hook = 2-3 short dramatic screens setting up the day's problem
   • Format:
     "hook": {{
       "duration_seconds": 45,
       "screens": [
         {{
           "screen_number": 1,
           "scene_description": "Raju office mein hai, boss ne English mein puchha — Raju freeze",
           "dialogue": [
             {{"character_id": "cha_raju", "english": "Uh... I am go to meeting?", "pronunciation": "अह... आई ऐम गो टू मीटिंग?", "emotion": "😰 nervous"}},
             {{"character_id": "cha_chatur", "english": "Main batata hoon — I am knowing the answer!", "pronunciation": "मैं बताता हूँ — आई ऐम नोइंग द आन्सर!", "emotion": "🤓 overconfident"}},
             {{"character_id": "cha_farhaan", "english": "Koi baat nahi Raju, sab seekhte hain.", "pronunciation": "—", "emotion": "🤝 supportive"}},
             {{"character_id": "cha_rancho", "english": "Saavi Didi! Yeh tense kya hota hai? Kab use karte hain?", "pronunciation": "—", "emotion": "🤔 curious"}},
             {{"character_id": "cha_saavi", "english": "Aaj main bataungi — वर्तमान काल kya hai aur kab use karna hai!", "pronunciation": "—", "emotion": "😊 warm"}}
           ]
         }},
         {{ ... 1-2 more hook screens ... }}
       ]
     }}
   • Each hook screen: 15-20 seconds
   • Hook MUST feature multiple characters (Raju struggling, Chatur wrong, Farhaan supportive, Rancho asking why)
   • Hook ends with Saavi entering and promising to teach today's concept

🔴 RULE 6 — 6-CHARACTER CAST (USE ALL OF THEM)
   The lesson MUST feature these 6 characters with their distinct personalities:

   1. **Saavi Didi** (मेंटर, 26F) — Warm elder sister teacher. Uses "{cfg['address']}".
      Always patient, encouraging. Present in: tab_1 intro, concept screens,
      every saavi_explanation, summary.

   2. **Raju** (हीरो/लर्नर, 22M) — The student-hero. Nervous, makes beginner mistakes,
      tries earnestly. Represents the user. Use in: dialogue (tab_3), example
      situations, "Raju ne galti ki — Saavi ne sikhaya" pattern.

   3. **Farhaan** (दोस्त, 22M) — Supportive friend. Encourages Raju when he stumbles.
      "Koi baat nahi Raju, sab seekhte hain". Use in: dialogue (tab_3), encouraging
      example contexts.

   4. **Rancho** (जिज्ञासु, 23M) — Curious friend who keeps asking "Kyun? Kaise?".
      Quick learner who probes deeper. Use in: concept screens (asks the doubt
      that triggers Saavi's deeper explanation), some dialogue lines.

   5. **Chatur** (अति-आत्मविश्वासी, 24M) — Overconfident friend who confidently makes
      WRONG English mistakes. "Main batata hoon — I am knowing!". Use in:
      common_mistake sections (he says wrong, Saavi corrects), some dialogue lines.

   6. **Dadaji** (कॉमिक राहत, 70M) — Wise elder who makes iconic Hinglish mistakes
      ("Myself Dadaji", "I am eating now since 2 hours") and learns with a smile.
      Use in: a dedicated "dadaji_moment" within tab_1 OR tab_4_summary closing.

   COMPULSORY:
   • Tab 3 dialogue MUST include at least 2 of: Raju, Farhaan, Rancho, Chatur (plus Saavi)
   • At least 1 common_mistake MUST be attributed to Chatur with quote
   • At least 1 example or summary section should feature Dadaji's mistake + correction
   • Use character names in Hindi/Devanagari script in all narration:
     "रंचो ने पूछा — Kyun ji?" / "चतुर बोला — I am knowing!" / "दादाजी ने कहा — Myself Dadaji!"

═══════════════════════════════════════════════════════════

OTHER MANDATORY REQUIREMENTS:
- Follow ALL format rules from system prompt
- EXACTLY 15 words/phrases taught (or pattern variations like "I eat / He eats / I am eating")
- EACH word/phrase has 5 examples
- EACH word has its own common_mistake section
- EACH example has SAAVI\'s explanation (3-5 sentences, MOSTLY Hindi, using "{cfg['address']}")
- 5 tabs with correct structure
- Tab 3 has multi-voice dialogue with line-by-line SAAVI explanations (in Hindi)
- Tab 5 has EXACTLY: 8 flashcards + 5 T/F + 5 Match + 5 MCQ
- SAAVI uses "{cfg['address']}" respectfully (no founder details, no specific cities/companies/years)
- Include complete SEO data block
- Include Nano Banana thumbnail prompt
- Include tab-specific visuals/graphics/emojis

VERIFY BEFORE OUTPUT:
✓ Did I write 70-80% in Hindi/Hinglish? (Count: SAAVI explanations should be majority Hindi)
✓ Does every English word have ({cfg['script']} pronunciation) right after it?
✓ Did I teach the CONCEPT first (if applicable) before listing words?
✓ Did I address common Indian mistakes explicitly with ❌→✅?

Return COMPLETE valid JSON only. No preamble, no markdown."""


# ── DeepSeek V4 Flash API call (default) ─────────────────────────────────────
# Set CONTENT_PROVIDER=gemini to fall back to Gemini.
def _load_deepseek_key() -> str:
    if os.environ.get('DEEPSEEK_API_KEY'):
        return os.environ['DEEPSEEK_API_KEY']
    keys_file = Path(__file__).resolve().parent.parent / 'safety' / 'keys.json'
    if keys_file.exists():
        return json.loads(keys_file.read_text()).get('DEEPSEEK_API_KEY', '')
    return ''

DEEPSEEK_KEY = _load_deepseek_key()
PROVIDER = os.environ.get('CONTENT_PROVIDER', 'deepseek').lower()


def _generate_deepseek(system: str, user: str) -> str:
    """Call DeepSeek V4 Flash via OpenAI-compatible API. Returns raw JSON text."""
    payload = json.dumps({
        'model': os.environ.get('CONTENT_MODEL', 'deepseek-v4-flash'),
        'messages': [
            {'role': 'system', 'content': system},
            {'role': 'user', 'content': user},
        ],
        'temperature': 0.7,
        'max_tokens': 65536,
        'response_format': {'type': 'json_object'},
        'stream': False,
    }).encode()

    url = 'https://api.deepseek.com/v1/chat/completions'
    req = urllib.request.Request(
        url, data=payload,
        headers={
            'Content-Type': 'application/json',
            'Authorization': f'Bearer {DEEPSEEK_KEY}',
        },
    )
    print(f"  Calling DeepSeek V4 Flash (key ...{DEEPSEEK_KEY[-6:]})")
    with urllib.request.urlopen(req, timeout=600) as resp:
        data = json.loads(resp.read())
    choice = data['choices'][0]
    finish = choice.get('finish_reason', 'stop')
    if finish == 'length':
        print("  WARNING: Response truncated (max_tokens hit)")
    return choice['message']['content']


def generate(lang: str, day: int) -> dict:
    system = get_system_prompt()
    user   = build_user_prompt(lang, day)

    lang_name = LANG_CONFIG[lang]['name']
    print(f"Generating {lang_name} Day {day} via {PROVIDER}...")
    print(f"  System prompt: {len(system)} chars")
    print(f"  User prompt:   {len(user)} chars")

    # Route to DeepSeek (default) — Gemini fallback for explicit override
    if PROVIDER == 'deepseek':
        if not DEEPSEEK_KEY:
            raise RuntimeError("DEEPSEEK_API_KEY missing in safety/keys.json")
        text = _generate_deepseek(system, user)
        text = text.strip()
        if text.startswith('```'):
            text = text.split('\n', 1)[1] if '\n' in text else text[3:]
        if text.endswith('```'):
            text = text[:-3]
        text = text.strip()
        return json.loads(text)

    # ── Gemini fallback (CONTENT_PROVIDER=gemini) ──
    payload = json.dumps({
        'contents': [{'role': 'user', 'parts': [{'text': user}]}],
        'systemInstruction': {'parts': [{'text': system}]},
        'generationConfig': {
            'temperature': 0.7,
            'maxOutputTokens': 65536,
            'responseMimeType': 'application/json',
        },
    }).encode()
    print(f"  Keys available: {len(GEMINI_KEYS)}")

    n = len(GEMINI_KEYS)
    for attempt in range(n):
        key = GEMINI_KEYS[(_current_key_idx + attempt) % n]
        print(f"  Using key ...{key[-6:]} (attempt {attempt + 1}/{n})")
        url = (
            'https://generativelanguage.googleapis.com/v1beta/models/'
            f'{os.environ.get("CONTENT_MODEL", "gemini-3-flash-preview")}:generateContent?key={key}'
        )
        req = urllib.request.Request(
            url, data=payload, headers={'Content-Type': 'application/json'}
        )
        try:
            with urllib.request.urlopen(req, timeout=300) as resp:
                data = json.loads(resp.read())
            _next_key()  # advance round-robin for next generate() call
            candidate = data['candidates'][0]
            finish = candidate.get('finishReason', 'STOP')
            if finish == 'MAX_TOKENS':
                print(f"  WARNING: Response truncated (MAX_TOKENS hit). Retrying with next key...")
                continue  # try next key — might produce a slightly different (shorter) response
            text    = candidate['content']['parts'][0]['text']
            # Strip markdown code fences and extra data after closing brace
            text = text.strip()
            if text.startswith('```'):
                text = text.split('\n', 1)[1] if '\n' in text else text[3:]
            if text.endswith('```'):
                text = text[:-3]
            text = text.strip()
            # Find the outermost JSON object/array
            depth = 0
            end_idx = 0
            start_char = text[0] if text else ''
            end_char = '}' if start_char == '{' else (']' if start_char == '[' else '')
            if end_char:
                for i, c in enumerate(text):
                    if c == start_char: depth += 1
                    elif c == end_char: depth -= 1
                    if depth == 0:
                        end_idx = i + 1
                        break
                text = text[:end_idx]
            content = json.loads(text)
            # Model sometimes wraps response in a list — unwrap it
            if isinstance(content, list) and len(content) == 1 and isinstance(content[0], dict):
                content = content[0]
            return content
        except urllib.error.HTTPError as e:
            if e.code == 429:
                print(f"  Rate-limited on key ...{key[-6:]}. Rotating to next key...")
                continue
            raise

    raise RuntimeError(
        f"Response keeps hitting MAX_TOKENS or all keys are rate-limited. "
        f"Try reducing content or wait before retrying."
    )


# ── Basic v4 validation ───────────────────────────────────────────────────────
def validate_response(content: dict) -> list[str]:
    """Returns list of validation issues (empty = all good)."""
    issues = []

    # 5-tab structure
    for tab in ('tab_1_video', 'tab_2_listen_repeat', 'tab_3_dialogue',
                'tab_4_summary', 'tab_5_quiz'):
        if tab not in content:
            issues.append(f'Missing top-level key: {tab}')

    # Tab 1: word_teaching
    word_teaching = (content.get('tab_1_video', {})
                             .get('content', {})
                             .get('word_teaching', []))
    if len(word_teaching) != 15:
        issues.append(f'tab_1_video.content.word_teaching has {len(word_teaching)} words (expected 15)')
    for entry in word_teaching:
        word = entry.get('word', '?')
        examples = entry.get('examples', [])
        if len(examples) != 5:
            issues.append(f'Word "{word}" has {len(examples)} examples (expected 5)')
        if 'common_mistake' not in entry:
            issues.append(f'Word "{word}" missing common_mistake')

    # Tab 2: listen_repeat sentences
    sentences = (content.get('tab_2_listen_repeat', {})
                        .get('content', {})
                        .get('sentences', []))
    if len(sentences) != 10:
        issues.append(f'tab_2_listen_repeat has {len(sentences)} sentences (expected 10)')

    # Tab 3: dialogue
    dialogue = (content.get('tab_3_dialogue', {})
                       .get('content', {})
                       .get('dialogue', []))
    if len(dialogue) < 5:
        issues.append(f'tab_3_dialogue has {len(dialogue)} lines (expected >= 5)')

    # Tab 5: quiz counts
    quiz = content.get('tab_5_quiz', {}).get('content', {})
    for key, expected in [('flashcards', 8), ('true_false', 5), ('mcq', 5)]:
        items = quiz.get(key, [])
        if len(items) != expected:
            issues.append(f'tab_5_quiz.{key} has {len(items)} items (expected {expected})')
    match_pairs = quiz.get('match_the_column', {}).get('pairs', [])
    if len(match_pairs) != 5:
        issues.append(f'tab_5_quiz.match_the_column.pairs has {len(match_pairs)} items (expected 5)')

    # SEO
    if 'seo' not in content:
        issues.append('Missing seo block')

    # Thumbnail
    if 'video_thumbnail' not in content:
        issues.append('Missing video_thumbnail block')

    return issues


# ── CLI ───────────────────────────────────────────────────────────────────────
if __name__ == '__main__':
    parser = argparse.ArgumentParser(
        description='Generate Shrutam English Course day content (v4)'
    )
    parser.add_argument('--lang',    required=True, choices=list(LANG_CONFIG.keys()))
    parser.add_argument('--day',     required=True, type=int)
    parser.add_argument('--output',  required=True)
    parser.add_argument('--dry-run', action='store_true', help='Show prompts only, no API call')
    args = parser.parse_args()

    if args.day not in DAY_TOPICS:
        print(f"Day {args.day} not defined. Available: {sorted(DAY_TOPICS.keys())}")
        sys.exit(1)

    if args.dry_run:
        print('=' * 60)
        print('SYSTEM PROMPT (first 300 chars)')
        print('=' * 60)
        print(get_system_prompt()[:300])
        print('...')
        print()
        print('=' * 60)
        print('USER PROMPT')
        print('=' * 60)
        print(build_user_prompt(args.lang, args.day))
        sys.exit(0)

    if not GEMINI_KEYS:
        print('ERROR: No Gemini API keys found. '
              'Export GOOGLE_AI_API_KEY or add keys to safety/keys.json')
        sys.exit(1)
    print(f'Using {len(GEMINI_KEYS)} API key(s) with rotation on rate-limit')

    content = generate(args.lang, args.day)

    issues = validate_response(content)
    if issues:
        print(f'\n⚠  Validation issues ({len(issues)}):')
        for issue in issues:
            print(f'  - {issue}')
    else:
        print('\n✓  Validation passed')

    with open(args.output, 'w', encoding='utf-8') as f:
        json.dump(content, f, ensure_ascii=False, indent=2)

    print(f'✓  Saved to {args.output}')

    # Summary stats
    tab1 = content.get('tab_1_video', {}).get('content', {})
    tab5 = content.get('tab_5_quiz', {}).get('content', {})
    print(f'   Words:       {len(tab1.get("word_teaching", []))}')
    print(f'   Listen:      {len(content.get("tab_2_listen_repeat", {}).get("content", {}).get("sentences", []))}')
    print(f'   Dialogue:    {len(content.get("tab_3_dialogue", {}).get("content", {}).get("dialogue", []))}')
    print(f'   Flashcards:  {len(tab5.get("flashcards", []))}')
    print(f'   MCQ:         {len(tab5.get("mcq", []))}')
    print(f'   True/False:  {len(tab5.get("true_false", []))}')
    print(f'   Match pairs: {len(tab5.get("match_the_column", {}).get("pairs", []))}')
