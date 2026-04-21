#!/usr/bin/env python3
"""
Generate English Speaking Course day content using Gemini.
System prompt: SAAVI character + teaching methodology + Rapidex book data + JSON structure
User prompt: Day number + language + topic

Usage:
  python3 generate_day_content.py --lang hi --day 1 --output /tmp/day1_hi.json
  python3 generate_day_content.py --lang hi --day 2 --dry-run          # show prompts only
"""
import argparse, json, os, sys, urllib.request
from pathlib import Path

GEMINI_KEY = os.environ.get('GOOGLE_AI_API_KEY', '')
if not GEMINI_KEY:
    keys_file = Path(__file__).resolve().parent.parent / 'safety' / 'keys.json'
    if keys_file.exists():
        GEMINI_KEY = json.loads(keys_file.read_text()).get('GOOGLE_AI_API_KEY', '')

# ── Language configs ──
LANG_CONFIG = {
    'hi': {
        'name': 'Hindi',
        'native_name': 'हिंदी',
        'script': 'Devanagari',
        'speaker_desc': 'Hindi speakers from India',
        'saavi_style': 'Hinglish (Hindi + English mix), using respectful aap',
        'example_city': 'Delhi',
    },
    'mr': {
        'name': 'Marathi',
        'native_name': 'मराठी',
        'script': 'Devanagari',
        'speaker_desc': 'Marathi speakers from Maharashtra',
        'saavi_style': 'Marathish (Marathi + English mix), using respectful tumhi',
        'example_city': 'Pune',
    },
    'te': {
        'name': 'Telugu',
        'native_name': 'తెలుగు',
        'script': 'Telugu',
        'speaker_desc': 'Telugu speakers from Andhra Pradesh and Telangana',
        'saavi_style': 'Tenglish (Telugu + English mix), using respectful meeru',
        'example_city': 'Hyderabad',
    },
}

# ── Day topics (50 days) ──
DAY_TOPICS = {
    1:  {'theme': 'Basic Greetings & Self-Introduction',
         'words': ['Hello', 'Hi', 'Good morning', 'Good afternoon', 'Good evening',
                   'Good night', 'Thank you', 'Please', 'Sorry', 'Excuse me',
                   'My name is...', 'I am from...', 'I am a...', 'How are you?', 'Nice to meet you'],
         'student_struggles': 'Students confuse Good night (farewell only) with Good evening (greeting). They say "myself Rahul" instead of "My name is Rahul". They forget Please/Thank you in daily use.',
         'connections': 'Day 1 builds the foundation — every future day will use these greetings. Emphasize muscle memory through repetition.'},
    2:  {'theme': 'Numbers, Days & Asking Simple Questions',
         'words': ['One', 'Two', 'Three', 'Four', 'Five',
                   'Today', 'Tomorrow', 'Yesterday', 'What', 'Where',
                   'When', 'Why', 'How much', 'How many', 'Which one'],
         'student_struggles': 'In Hindi/Marathi "kal" means both yesterday AND tomorrow — students confuse these. "How much" vs "How many" — much=uncountable (water/money), many=countable (books/people). Students say "what is your good name" (Indian English) — teach the natural form.',
         'connections': 'Connect to Day 1: "How are you?" was a question — today we learn more question words. Numbers connect to Day 4 (ordering food, prices).'},
    3:  {'theme': 'Family Members & Relationships',
         'words': ['Mother', 'Father', 'Brother', 'Sister', 'Son',
                   'Daughter', 'Husband', 'Wife', 'Friend', 'Uncle',
                   'Aunt', 'Grandfather', 'Grandmother', 'Family', 'Children'],
         'student_struggles': 'Indian languages have specific words for paternal uncle (chacha/kaka) vs maternal uncle (mama) — English just has "uncle". Same for aunt, grandfather. Students struggle because English has FEWER relationship words. Also elder brother vs younger brother — English does not differentiate.',
         'connections': 'Connect to Day 1: "I am from..." + now "My father is from...". Use Day 2 numbers: "I have two brothers."'},
    4:  {'theme': 'Food, Water & Ordering at a Restaurant',
         'words': ['Water', 'Food', 'Rice', 'Bread', 'Tea',
                   'Coffee', 'Milk', 'Sugar', 'I want...', 'I need...',
                   'Can I have...', 'How much is this?', 'The bill please', 'Delicious', 'Spicy'],
         'student_struggles': '"I want" sounds rude in English — teach "Can I have..." and "I would like..." as polite alternatives. Students directly translate "khana khana" as "eat food eat" — teach proper structure. "Bread" in India means "pav/toast" but in English it includes roti/chapati context.',
         'connections': 'Use Day 2: "How much is this?" uses numbers. Use Day 1: "Please", "Thank you" when ordering. Practical scenario every student faces daily.'},
    5:  {'theme': 'Directions & Getting Around',
         'words': ['Left', 'Right', 'Straight', 'Stop', 'Go',
                   'Near', 'Far', 'Here', 'There', 'Where is...?',
                   'How do I get to...?', 'Bus', 'Train', 'Auto/Taxi', 'Market'],
         'student_struggles': 'Students confuse "here" and "there" because in Hindi "yahan/wahan" usage is different. "How do I get to..." is a complex structure — break it down. Left/Right confusion is universal — use body anchors (writing hand = right).',
         'connections': 'Use Day 2: "Where is...?" question word. Use Day 1: "Excuse me, where is the market?" combines greetings + directions.'},
    6:  {'theme': 'Time, Clock & Daily Routine',
         'words': ['Time', 'Clock', 'Morning', 'Afternoon', 'Evening',
                   'Night', 'Early', 'Late', 'What time is it?', 'I wake up at...',
                   'I go to...', 'I eat...', 'I sleep at...', 'Always', 'Never'],
         'student_struggles': 'AM/PM concept confuses students. "I go to office" vs "I go to the office" — article usage. Present simple for routines vs present continuous for right now.',
         'connections': 'Day 1 greetings are time-based. Day 4 food connects to "I eat breakfast at 8." Daily routine is the most practical English they will use.'},
    7:  {'theme': 'Weather, Seasons & Small Talk',
         'words': ['Hot', 'Cold', 'Rain', 'Sun', 'Wind',
                   'Summer', 'Winter', 'Monsoon', 'How is the weather?', 'It is very...',
                   'I like...', 'I don\'t like...', 'Beautiful', 'Terrible', 'Comfortable'],
         'student_struggles': 'Weather small talk is crucial in English but alien to Indian students — we don\'t discuss weather casually. "It is raining" — why "it"? There is no subject! This is a key English pattern. Like/don\'t like — teach opinion expressing.',
         'connections': 'Small talk combines Day 1 greetings + weather: "Good morning! Nice weather today." Builds social English beyond transactional.'},
}

# ── Load Rapidex book ──
RAPIDEX_PATH = Path(__file__).resolve().parent.parent.parent / 'Downloads' / 'rapid.docx'
_rapidex_cache = None

def load_rapidex():
    global _rapidex_cache
    if _rapidex_cache is not None:
        return _rapidex_cache
    rpath = RAPIDEX_PATH
    if not rpath.exists():
        rpath = Path.home() / 'Downloads' / 'rapid.docx'
        if not rpath.exists():
            print("WARNING: Rapidex book not found. Generating without reference.", file=sys.stderr)
            _rapidex_cache = ""
            return ""
    try:
        from docx import Document
        doc = Document(str(rpath))
        text = '\n'.join([p.text for p in doc.paragraphs if p.text.strip()])
        _rapidex_cache = text
        return text
    except Exception as e:
        print(f"WARNING: Could not read Rapidex: {e}", file=sys.stderr)
        _rapidex_cache = ""
        return ""


# ── System Prompt (stays same across all days/languages) ──
def build_system_prompt(lang: str) -> str:
    cfg = LANG_CONFIG[lang]
    book_text = load_rapidex()
    book_section = f"""

── REFERENCE BOOK: Rapidex English Speaking Course ──
Below is the full text of the Rapidex English Speaking Course book (Hindi).
Use this as SOURCE MATERIAL — extract relevant vocabulary, phrases, conversation patterns,
and teaching approaches. But DO NOT copy the book's dry textbook style.
Transform the content into SAAVI's warm, practical, story-driven teaching style.

{book_text}

── END OF REFERENCE BOOK ──
""" if book_text else ""

    return f"""You are the content engine for Shrutam — a FREE 30-day English Speaking Course app.
"Tu kar sakta hai."

── SAAVI'S BACKSTORY (USE FOR AUTHENTIC TEACHING) ──
SAAVI was an engineering student who couldn't speak English. Failed her first interview.
Felt humiliated. Went home thinking "main duffer hoon." Then she made friends who only spoke English.
One grammar book + those friends changed everything. She memorized ALL uses of HAVE, GET at once.
Dheere-dheere darr nikal gaya. She cleared her next interview. Got her first job.
Now she teaches others because — "Difference was only timing, luck, and a few good friends.
Nobody tells you this. Main bataungi."
SAAVI is the friend everyone deserves but never had. She knows the pain of being called "duffer"
because she lived it.

── WHO IS SAAVI ──
SAAVI is the AI teacher — a 26-year-old Indian woman (didi/akka):
- She speaks in {cfg['saavi_style']} — warm, natural, like a friend explaining over chai
- She was an engineering student terrified of speaking English — overcame it through practice
- She is NOT a textbook teacher — she makes learning fun with real stories and humor
- She uses Bollywood references, cricket analogies, and daily Indian life examples
- She NEVER says "Good question", "Namaste", or uses brackets in speech
- She addresses students respectfully (aap/tumhi/meeru)
- The "Bhai Test": Before writing ANY message — "Kya main yeh apne bhai ko bolunga?"
  Correct answer: "Shabash!" (not "Amazing!"). Wrong: "Koi baat nahi — chal dobara" (not "Oops!")
- NEVER: guilt trips, streak pressure, shame, comparison. ALWAYS: warm, zero shame, "Tu kar sakta hai"

── TEACHING METHODOLOGY: "PEHLE CHALAO, PHIR SAMJHO" ──
(Ride first, understand later — like riding a bicycle, don't teach physics first)

3 Phases per concept:
1. ICEBREAKER: Experience first, no explanation. "Say: Hello, My name is..."
2. BUILDING BLOCKS: Show patterns, not rules. "I + verb = I go, I eat, I want"
3. CONNECTING IDEAS: Grammar only when user asks why. "Why does 'he goes' have 's'?"

60-30-10 Rule:
- RIDE (60%): User speaks, repeats, practices. No explanation needed.
- PATTERN (30%): Formula shown in {cfg['saavi_style']}. No technical grammar terms.
- WHY (10%): Optional grammar explanation for curious learners (skippable).

── THE MEGA-WORD APPROACH (SIGNATURE FEATURE) ──
Traditional courses waste 30 days on tense-by-tense teaching.
Shrutam teaches TOP 10-12 high-frequency verbs with ALL their uses AT ONCE:
HAVE: possession "I have a car" + obligation "I have to go" + perfect "I have eaten" + activity "Let's have tea"
GET: receive "I got a gift" + become "I got angry" + arrive "Get home" + understand "I get it" + buy "Get milk"
This is how SAAVI learned — memorized all uses of HAVE/GET in one sitting with her friends.

── INDIAN CONFUSION LIBRARY (USE IN EVERY DAY) ──
20+ specific mistakes Indians make. Address at least 2-3 per day:
- "Main jaana hoon" → WRONG: "I am going" → RIGHT: "I have to go"
- "Khaa liya" → WRONG: "I ate" → RIGHT: "I have eaten"
- "Kya time hai?" → WRONG: "You have time?" → RIGHT: "Do you have time?"
- "Kal aaunga" → WRONG: "I come tomorrow" → RIGHT: "I will come tomorrow"
- "Chai pasand hai" → WRONG: "I like to tea" → RIGHT: "I like tea"
- "Myself Rahul" → WRONG → RIGHT: "My name is Rahul"
- "What is your good name?" → Indian English → RIGHT: "What is your name?"
CAN vs COULD = "Tu vs Aap" Rule:
CAN (Tu wala): casual, friends. COULD (Aap wala): polite, formal, boss.

── TRIPLE LANGUAGE BRIDGE ──
Every teaching element must show 3 layers:
1. Native script ({cfg['script']}): Familiar, school-learned
2. Transliteration: Pronunciation bridge in Roman/mixed script
3. English: The real goal
4. Audio: Correct pronunciation (will be TTS generated)

── HINDI GRAMMAR TERMS BRIDGE ──
Indians already learned grammar in Hindi/school. Connect it to English:
Sangya = Noun (cheez, vyakti, jagah), Sarvanam = Pronoun (mein, tu, vo),
Kriya = Verb (kaam/action), Visheshan = Adjective (kaisa — bada, chhota)
Vartman Kaal = Present, Bhootkaal = Past, Bhavishya Kaal = Future

── TEACHING EACH WORD: 10 REAL-LIFE SITUATIONS ──
Each word MUST be taught through situations, not definitions:
1. Ghar mein (at home), 2. School/Office mein, 3. Dost se (with friend),
4. Family ke saath, 5. Past tense situation, 6. Future tense situation,
7. Favorite/opinion, 8. Question form, 9. Bollywood/pop culture reference,
10. Modern context (Amazon/WhatsApp/Zomato)

── CURRICULUM ARC (30 DAYS) ──
Week 1 (Day 1-7): Foundation + Jaadu — Pronouns, Nouns, Verbs, BE, HAVE
  Difficulty 10%, Win Rate 95% — "Yeh toh easy hai!"
Week 2 (Day 8-14): Core Mega-Verbs — GET (10+ uses), GOT, GO, modals
  Difficulty 30%, Win Rate 80% — "Maza aa raha"
Week 3 (Day 15-21): Tenses via Situations — Present, Past, Future through real use
  Difficulty 60%, Win Rate 65% — "Thoda tough — kar sakta"
Week 4 (Day 22-30): Real Life Application — Office, shopping, doctor, interview
  Difficulty 80%, Win Rate 50% — "Main bol sakta hoon!"

── KEY RESEARCH DATA ──
1,000 words = 75% everyday English. 3,000 words = 95%.
5 tenses = 96% of spoken English (Present 57%, Past 20%, Future 8.5%, Perfect 6%, Continuous 5%)
Top 10 verbs: be, have, do, say, go, can, get, would, make, know = 80% verb usage
Target: 350 words + 50 mega-verbs + 5 tenses = 96% daily English coverage

── CHAPTER STRUCTURE (15 min core) ──
1. Lesson (10 min): SAAVI message + concept + situations + pattern + practice
2. Summary (1 min): Visual recap, 3 key points
3. Flashcards (2 min): 6-8 cards, triple language
4. Speaking (2 min): 5-6 prompts, repeat after SAAVI
5. Celebration (30 sec): Badge, progress, tomorrow preview

── TARGET AUDIENCE ──
- {cfg['speaker_desc']}
- Age 15-45, students and working professionals
- Can read {cfg['native_name']} fluently
- Know some English words but can't form sentences confidently
- Fear of speaking English in public is their BIGGEST barrier
- Called "duffer" by school system — Shrutam is their redemption

── OUTPUT FORMAT ──
Return ONLY valid JSON. No markdown, no explanation, no preamble.
The JSON structure is specified in the user prompt for each day.

── QUALITY RULES ──
1. ALL keys must be language-neutral: question, options, answer, statement, front, back, english, pronunciation, translation — NO language suffix (no question_marathi, no hindi_pronunciation)
2. Flashcard "back" MUST have format: "meaning (pronunciation)" — e.g. "नमस्कार (हॅलो)"
3. Teaching examples use keys: english, pronunciation, translation
4. Use {cfg['name']} examples from Indian context ({cfg['example_city']}, Indian names, Indian food, Indian scenarios)
5. SAAVI speaks in {cfg['saavi_style']}
6. Pronunciation in {cfg['script']} script
7. Minimum 15 words taught, 10 listen-repeat sentences, 5-6 dialogue lines, 5 MCQ, 5 T/F, 8 flashcards, 5 matching pairs
8. Every example must be something an Indian student would actually say in real life
{book_section}"""


# ── User Prompt (changes per day) ──
def build_user_prompt(lang: str, day: int) -> str:
    cfg = LANG_CONFIG[lang]
    topic = DAY_TOPICS[day]

    return f"""Generate Day {day} of 50.

TOPIC: {topic['theme']}
LANGUAGE: {cfg['name']} ({cfg['native_name']})
WORDS TO TEACH: {', '.join(topic['words'])}

WHERE STUDENTS STRUGGLE:
{topic['student_struggles']}

CONNECTIONS TO OTHER DAYS:
{topic['connections']}

Return this EXACT JSON structure:

{{
  "saavi_intro": {{
    "title": "Day {day}: [catchy title in {cfg['name']}]",
    "story": "[SAAVI's personal story related to today's topic, in {cfg['saavi_style']}, 4-5 lines, relatable, encouraging, mention a specific incident from her life]",
    "goal": "[Today's learning goal in {cfg['saavi_style']}, 2 lines, mention how many words they'll learn and what they'll be able to do after this lesson]"
  }},
  "teaching": [
    {{
      "word": "[English word/phrase]",
      "pronunciation": "[{cfg['script']} pronunciation]",
      "meaning": "[{cfg['name']} meaning]",
      "usage": "[When/how to use — in {cfg['saavi_style']}, 2-3 lines, include a common mistake students make with this word]",
      "example": {{
        "english": "[Natural example sentence an Indian would actually say]",
        "pronunciation": "[Full sentence in {cfg['script']}]",
        "translation": "[{cfg['name']} translation]"
      }}
    }}
    // ... for ALL {len(topic['words'])} words
  ],
  "listen_repeat": [
    {{
      "english": "[Practice sentence combining today's words with previous days' words]",
      "pronunciation": "[{cfg['script']} pronunciation]",
      "translation": "[{cfg['name']} translation]"
    }}
    // ... 10 sentences, progressively harder
  ],
  "situation": {{
    "title": "[Real-life situation title in {cfg['name']}]",
    "dialogue": [
      {{
        "character": "[Indian name]",
        "english": "[Dialogue line]",
        "pronunciation": "[{cfg['script']} pronunciation]",
        "translation": "[{cfg['name']} translation]"
      }}
      // ... 5-6 lines, a realistic conversation an Indian student might have
    ]
  }},
  "summary": [
    "[Key point 1 — what they learned, in {cfg['name']}]",
    "[Key point 2 — a common mistake to avoid]",
    "[Key point 3 — connection to previous/next day]",
    "[Key point 4 — practical tip for daily use]",
    "[Key point 5 — encouragement from SAAVI]"
  ],
  "quiz": {{
    "mcq": [
      {{"question": "[in {cfg['name']}]", "options": ["A","B","C","D"], "answer": "B"}}
      // ... 5 questions testing understanding, not just memorization
    ],
    "true_false": [
      {{"statement": "[in {cfg['name']}]", "answer": true}}
      // ... 5 statements, include tricky ones that test common mistakes
    ],
    "flashcard": [
      {{"front": "[English]", "back": "[{cfg['name']} meaning] ([{cfg['script']} pronunciation])"}}
      // ... 8 cards
    ],
    "matching": [
      {{"english": "[phrase]", "translation": "[{cfg['name']}]"}}
      // ... 5 pairs
    ]
  }}
}}"""


def generate(lang: str, day: int) -> dict:
    system = build_system_prompt(lang)
    user = build_user_prompt(lang, day)

    payload = json.dumps({
        'contents': [{'role': 'user', 'parts': [{'text': user}]}],
        'systemInstruction': {'parts': [{'text': system}]},
        'generationConfig': {
            'temperature': 0.7,
            'maxOutputTokens': 8192,
            'responseMimeType': 'application/json',
        },
    }).encode()

    url = f'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={GEMINI_KEY}'
    req = urllib.request.Request(url, data=payload, headers={'Content-Type': 'application/json'})

    print(f"Generating {LANG_CONFIG[lang]['name']} Day {day}...")
    print(f"  System prompt: {len(system)} chars (incl. book: {'yes' if 'Rapidex' in system else 'no'})")
    print(f"  User prompt: {len(user)} chars")

    with urllib.request.urlopen(req, timeout=180) as resp:
        data = json.loads(resp.read())

    text = data['candidates'][0]['content']['parts'][0]['text']
    content = json.loads(text)

    # Validate
    assert 'teaching' in content, "Missing teaching"
    assert 'quiz' in content, "Missing quiz"
    assert len(content['teaching']) >= 10, f"Only {len(content['teaching'])} words"
    assert 'flashcard' in content['quiz'], "Missing flashcard in quiz"

    for fc in content['quiz']['flashcard']:
        if '(' not in fc['back']:
            print(f"  WARNING: Flashcard '{fc['front']}' missing pronunciation: {fc['back']}")

    return content


def validate_keys(content: dict, lang: str):
    issues = []
    for q in content['quiz'].get('mcq', []):
        for bad_key in ['question_marathi', 'question_hindi', 'question_telugu', 'options_marathi', 'answer_marathi']:
            if bad_key in q:
                issues.append(f"MCQ has '{bad_key}'")
    for q in content['quiz'].get('true_false', []):
        for bad_key in ['statement_marathi', 'statement_hindi', 'statement_telugu']:
            if bad_key in q:
                issues.append(f"True/False has '{bad_key}'")
    for q in content['quiz'].get('matching', []):
        if 'english_phrase' in q:
            issues.append("Matching has 'english_phrase'")
        for bad_key in ['marathi_translation', 'hindi_translation', 'telugu_translation']:
            if bad_key in q:
                issues.append(f"Matching has '{bad_key}'")
    for w in content.get('teaching', []):
        ex = w.get('example', {})
        for bad_key in ['hindi_pronunciation', 'marathi_pronunciation', 'telugu_pronunciation',
                        'hindi_translation', 'marathi_translation', 'telugu_translation']:
            if bad_key in ex:
                issues.append(f"Teaching example has '{bad_key}'")
    return issues


if __name__ == '__main__':
    parser = argparse.ArgumentParser()
    parser.add_argument('--lang', required=True, choices=list(LANG_CONFIG.keys()))
    parser.add_argument('--day', required=True, type=int)
    parser.add_argument('--output', required=True)
    parser.add_argument('--dry-run', action='store_true', help='Show prompts only')
    args = parser.parse_args()

    if args.day not in DAY_TOPICS:
        print(f"Day {args.day} not defined. Available: {sorted(DAY_TOPICS.keys())}")
        sys.exit(1)

    if args.dry_run:
        print("=" * 60)
        print("SYSTEM PROMPT")
        print("=" * 60)
        sys_prompt = build_system_prompt(args.lang)
        # Don't print the full book — just show the structure
        if 'REFERENCE BOOK' in sys_prompt:
            before_book = sys_prompt.split('── REFERENCE BOOK')[0]
            after_book = sys_prompt.split('── END OF REFERENCE BOOK ──')[1] if '── END OF REFERENCE BOOK ──' in sys_prompt else ''
            print(before_book)
            print(f"── REFERENCE BOOK: [{len(load_rapidex())} chars of Rapidex content] ──")
            print(after_book)
        else:
            print(sys_prompt)
        print()
        print("=" * 60)
        print("USER PROMPT")
        print("=" * 60)
        print(build_user_prompt(args.lang, args.day))
        sys.exit(0)

    content = generate(args.lang, args.day)

    issues = validate_keys(content, args.lang)
    if issues:
        print(f"\n⚠ Key issues found ({len(issues)}):")
        for issue in issues:
            print(f"  - {issue}")

    with open(args.output, 'w') as f:
        json.dump(content, f, ensure_ascii=False, indent=2)

    print(f"\n✓ Saved to {args.output}")
    print(f"  Words: {len(content['teaching'])}")
    print(f"  Listen: {len(content['listen_repeat'])}")
    print(f"  Dialogue: {len(content['situation']['dialogue'])}")
    print(f"  Quiz MCQ: {len(content['quiz']['mcq'])}")
    print(f"  Quiz T/F: {len(content['quiz']['true_false'])}")
    print(f"  Flashcards: {len(content['quiz']['flashcard'])}")
    print(f"  Matching: {len(content['quiz']['matching'])}")
