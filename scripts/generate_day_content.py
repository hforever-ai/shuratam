#!/usr/bin/env python3
"""
Generate English Speaking Course day content using Gemini.
One prompt, consistent JSON output for any language.

Usage:
  python3 generate_day_content.py --lang hi --day 1 --output /tmp/day1_hi.json
  python3 generate_day_content.py --lang mr --day 1 --output /tmp/day1_mr.json
"""
import argparse, json, os, sys, urllib.request
from pathlib import Path

GEMINI_KEY = os.environ.get('GOOGLE_AI_API_KEY', '')
if not GEMINI_KEY:
    keys_file = Path(__file__).resolve().parent.parent / 'safety' / 'keys.json'
    if keys_file.exists():
        GEMINI_KEY = json.loads(keys_file.read_text()).get('GOOGLE_AI_API_KEY', '')

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
}

# Day topics (extend for Days 2-50)
DAY_TOPICS = {
    1: {
        'theme': 'Basic Greetings & Self-Introduction',
        'words': ['Hello', 'Hi', 'Good morning', 'Good afternoon', 'Good evening',
                  'Good night', 'Thank you', 'Please', 'Sorry', 'Excuse me',
                  'My name is...', 'I am from...', 'I am a...', 'How are you?', 'Nice to meet you'],
    },
    # Add more days here...
}


def build_prompt(lang: str, day: int) -> str:
    cfg = LANG_CONFIG[lang]
    topic = DAY_TOPICS[day]

    return f"""You are generating content for a FREE English Speaking Course app called Shrutam.
The course teaches English to {cfg['speaker_desc']}.
The AI teacher is SAAVI — a 26-year-old Indian woman who speaks in {cfg['saavi_style']}.

Generate Day {day} content about: {topic['theme']}
Words to teach: {', '.join(topic['words'])}

Return ONLY valid JSON with this EXACT structure (no markdown, no explanation):

{{
  "saavi_intro": {{
    "title": "Day {day}: [catchy title in {cfg['name']}]",
    "story": "[SAAVI's personal story in {cfg['saavi_style']}, 4-5 lines, relatable, encouraging]",
    "goal": "[Today's learning goal in {cfg['saavi_style']}, 2 lines]"
  }},
  "teaching": [
    {{
      "word": "Hello",
      "pronunciation": "[{cfg['script']} pronunciation]",
      "meaning": "[{cfg['name']} meaning]",
      "usage": "[When/how to use — explained in {cfg['saavi_style']}, 2-3 lines]",
      "example": {{
        "english": "[Example sentence using the word]",
        "pronunciation": "[Full sentence in {cfg['script']} script]",
        "translation": "[Full {cfg['name']} translation]"
      }}
    }}
    // ... for ALL {len(topic['words'])} words
  ],
  "listen_repeat": [
    {{
      "english": "[Practice sentence using day's words]",
      "pronunciation": "[{cfg['script']} pronunciation]",
      "translation": "[{cfg['name']} translation]"
    }}
    // ... 10 sentences
  ],
  "situation": {{
    "title": "[Situation title in {cfg['name']}]",
    "dialogue": [
      {{
        "character": "[Indian name]",
        "english": "[English dialogue line]",
        "pronunciation": "[{cfg['script']} pronunciation]",
        "translation": "[{cfg['name']} translation]"
      }}
      // ... 5-6 lines of dialogue
    ]
  }},
  "summary": [
    "[Key learning point 1 in {cfg['name']}]",
    "[Key learning point 2 in {cfg['name']}]",
    "[Key learning point 3 in {cfg['name']}]",
    "[Key learning point 4 in {cfg['name']}]",
    "[Key learning point 5 in {cfg['name']}]"
  ],
  "quiz": {{
    "mcq": [
      {{
        "question": "[Question in {cfg['name']}]",
        "options": ["Option A", "Option B", "Option C", "Option D"],
        "answer": "Option B"
      }}
      // ... 5 questions
    ],
    "true_false": [
      {{
        "statement": "[Statement in {cfg['name']}]",
        "answer": true
      }}
      // ... 5 statements
    ],
    "flashcard": [
      {{
        "front": "Hello",
        "back": "[{cfg['name']} meaning] ([{cfg['script']} pronunciation])"
      }}
      // ... 8 cards — ALWAYS include pronunciation in parentheses
    ],
    "matching": [
      {{
        "english": "Good morning",
        "translation": "[{cfg['name']} translation]"
      }}
      // ... 5 pairs
    ]
  }}
}}

IMPORTANT RULES:
1. ALL quiz keys must be: question, options, answer, statement, front, back, english, translation — NO language suffix
2. Flashcard "back" MUST have format: "meaning (pronunciation)" — e.g. "नमस्कार (हॅलो)"
3. Teaching examples use keys: english, pronunciation, translation — NO language prefix
4. Use {cfg['name']} examples from Indian context ({cfg['example_city']}, Indian names, Indian scenarios)
5. SAAVI speaks in {cfg['saavi_style']} — natural, warm, not formal
6. Pronunciation must be in {cfg['script']} script
7. Return ONLY the JSON object, nothing else
"""


def generate(lang: str, day: int) -> dict:
    prompt = build_prompt(lang, day)

    payload = json.dumps({
        'contents': [{'role': 'user', 'parts': [{'text': prompt}]}],
        'generationConfig': {
            'temperature': 0.7,
            'maxOutputTokens': 8192,
            'responseMimeType': 'application/json',
        },
    }).encode()

    url = f'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={GEMINI_KEY}'
    req = urllib.request.Request(url, data=payload, headers={'Content-Type': 'application/json'})

    print(f"Generating {LANG_CONFIG[lang]['name']} Day {day}...")
    with urllib.request.urlopen(req, timeout=120) as resp:
        data = json.loads(resp.read())

    text = data['candidates'][0]['content']['parts'][0]['text']
    content = json.loads(text)

    # Validate structure
    assert 'teaching' in content, "Missing teaching"
    assert 'quiz' in content, "Missing quiz"
    assert len(content['teaching']) >= 10, f"Only {len(content['teaching'])} words"
    assert 'flashcard' in content['quiz'], "Missing flashcard in quiz"

    # Validate flashcard has pronunciation in parentheses
    for fc in content['quiz']['flashcard']:
        if '(' not in fc['back']:
            print(f"  WARNING: Flashcard '{fc['front']}' missing pronunciation: {fc['back']}")

    return content


def validate_keys(content: dict, lang: str):
    """Check all keys are language-neutral (no _marathi, _hindi suffixes)"""
    issues = []

    for q in content['quiz'].get('mcq', []):
        for bad_key in ['question_marathi', 'question_hindi', 'options_marathi', 'answer_marathi']:
            if bad_key in q:
                issues.append(f"MCQ has '{bad_key}' — should be '{bad_key.split('_')[0]}'")

    for q in content['quiz'].get('true_false', []):
        if 'statement_marathi' in q or 'statement_hindi' in q:
            issues.append("True/False has language-suffixed key")

    for q in content['quiz'].get('matching', []):
        if 'english_phrase' in q:
            issues.append("Matching has 'english_phrase' — should be 'english'")
        if 'marathi_translation' in q or 'hindi_translation' in q:
            issues.append("Matching has language-suffixed translation key — should be 'translation'")

    for w in content.get('teaching', []):
        ex = w.get('example', {})
        for bad_key in ['hindi_pronunciation', 'marathi_pronunciation', 'hindi_translation', 'marathi_translation']:
            if bad_key in ex:
                issues.append(f"Teaching example has '{bad_key}' — should be 'pronunciation'/'translation'")

    return issues


if __name__ == '__main__':
    parser = argparse.ArgumentParser()
    parser.add_argument('--lang', required=True, choices=list(LANG_CONFIG.keys()))
    parser.add_argument('--day', required=True, type=int)
    parser.add_argument('--output', required=True)
    parser.add_argument('--dry-run', action='store_true', help='Show prompt only')
    args = parser.parse_args()

    if args.dry_run:
        print(build_prompt(args.lang, args.day))
        sys.exit(0)

    content = generate(args.lang, args.day)

    # Validate
    issues = validate_keys(content, args.lang)
    if issues:
        print(f"\n⚠ Key issues found ({len(issues)}):")
        for issue in issues:
            print(f"  - {issue}")
        print("Fix these before importing to DB!")

    # Save
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
