#!/usr/bin/env python3
"""
generate_training_data.py — Generate fine-tuning Q&A pairs for Gemma 4 E2B.

Uses gemini-3-flash-preview (free) to generate realistic student questions
+ SAAVI answers from course content. 3 languages × 50 topics = 150 API calls.

Usage:
  python3 scripts/generate_training_data.py --lang hi --day 1      # test one
  python3 scripts/generate_training_data.py --all                   # all 150
  python3 scripts/generate_training_data.py --all --questions 100   # 100 per topic
"""

import argparse
import json
import os
import re
import sys
import time
import urllib.request
import urllib.error
from pathlib import Path

REPO_DIR = Path(__file__).resolve().parent.parent
_KEYS_FILE = REPO_DIR / 'safety' / 'keys.json'
_KEYS = json.loads(_KEYS_FILE.read_text()) if _KEYS_FILE.exists() else {}
GEMINI_KEYS = _KEYS.get('GOOGLE_AI_API_KEYS') or []
_key_idx = 0

MODEL = 'gemini-3-flash-preview'
CHUNKS_FILE = REPO_DIR / 'audio_output' / 'embedding_chunks.json'
OUTPUT_DIR = REPO_DIR / 'training'

LANG_CONFIG = {
    'hi': {'name': 'Hindi', 'script': 'Devanagari', 'respect': 'aap', 'alias': 'Didi'},
    'mr': {'name': 'Marathi', 'script': 'Devanagari', 'respect': 'tumhi', 'alias': 'Tai'},
    'te': {'name': 'Telugu', 'script': 'Telugu', 'respect': 'meeru', 'alias': 'Akka'},
}


def _next_key():
    global _key_idx
    key = GEMINI_KEYS[_key_idx % len(GEMINI_KEYS)]
    _key_idx += 1
    return key


def call_gemini(prompt: str, max_retries: int = 3) -> str:
    for attempt in range(max_retries * len(GEMINI_KEYS)):
        key = _next_key()
        url = f'https://generativelanguage.googleapis.com/v1beta/models/{MODEL}:generateContent?key={key}'
        payload = json.dumps({
            'contents': [{'parts': [{'text': prompt}]}],
            'generationConfig': {'temperature': 0.8, 'maxOutputTokens': 32000}
        }).encode()
        req = urllib.request.Request(url, data=payload, headers={'Content-Type': 'application/json'})
        try:
            with urllib.request.urlopen(req, timeout=180) as resp:
                data = json.loads(resp.read())
            text = data['candidates'][0]['content']['parts'][0]['text'].strip()
            if text.startswith('```'):
                text = text.split('\n', 1)[1] if '\n' in text else text[3:]
            if text.endswith('```'):
                text = text[:-3]
            # Find outermost JSON array
            text = text.strip()
            if text.startswith('['):
                depth = 0
                for i, c in enumerate(text):
                    if c == '[': depth += 1
                    elif c == ']': depth -= 1
                    if depth == 0:
                        text = text[:i+1]
                        break
            return text
        except urllib.error.HTTPError as e:
            if e.code == 429:
                time.sleep(2)
                continue
            raise
        except Exception as e:
            if attempt < max_retries * len(GEMINI_KEYS) - 1:
                time.sleep(1)
                continue
            raise
    raise RuntimeError("All retries exhausted")


def get_chunks_for_day(all_chunks: list, lang: str, day: int) -> str:
    day_chunks = [c for c in all_chunks if c['lang'] == lang and c['day'] == day]
    return '\n\n'.join(c['text'][:800] for c in day_chunks[:8])


def get_day_topic(day: int) -> str:
    """Get topic name from content file or fallback."""
    topics = {
        1: 'Greetings & Self-Introduction', 2: 'Present Tense — Daily Routine',
        3: 'Nouns & Family Members', 4: 'Pronouns', 5: 'Verbs — Daily Actions',
        6: 'Adjectives', 7: 'Weather & Small Talk', 8: 'BE Verbs (am/is/are/was/were)',
        9: 'Have/Has/Had', 10: 'Have to — Obligation', 11: 'Do/Does/Did',
        12: 'Go/Went/Gone — Hospital', 13: 'Can vs Could — Restaurant',
        14: 'Auto & Taxi Directions', 15: 'GET Part 1', 16: 'GET Part 2 — Bus Travel',
        17: 'Got & Have Got', 18: 'Make vs Take', 19: 'Come & See',
        20: 'Will vs Would', 21: 'Shopping Mall English', 22: 'Simple Past Tense',
        23: 'Past Continuous', 24: 'Past Perfect', 25: 'Simple Future — Airport',
        26: 'Future Continuous', 27: 'Should/Must/Have to', 28: 'Storytelling',
        29: 'Office English', 30: 'Hospital English', 31: 'Complaints & Solutions',
        32: 'International Airport', 33: 'Bank & Documents',
        34: 'Shopping Negotiation', 35: 'Multi-situation Day',
        36: 'Sentence Connectors', 37: 'Wh-Questions', 38: 'Prepositions',
        39: 'Comparatives & Superlatives', 40: 'Phrasal Verbs',
        41: 'Conditional Sentences', 42: 'Giving Opinions',
        43: 'Digital World English', 44: 'School Parent-Teacher',
        45: 'Government Office', 46: 'Airport Mastery',
        47: 'Small Talk & Networking', 48: 'Public Speaking',
        49: 'Job Interview', 50: 'Graduation Celebration',
    }
    return topics.get(day, f'Day {day}')


def build_prompt(lang: str, day: int, context: str, num_questions: int) -> str:
    lc = LANG_CONFIG[lang]
    topic = get_day_topic(day)

    return f"""You are generating training data for SAAVI, a friendly Indian English teacher.
Language: {lc['name']}
Topic: Day {day}: {topic}

COURSE CONTENT (SAAVI must use ONLY this to answer):
{context}

SAAVI PERSONA:
- Name: SAAVI (सावी), 26 years old, warm {lc['alias']}
- Answer in {lc['name']} ({lc['script']} script), use "{lc['respect']}" (respectful)
- Tone: like explaining to younger sibling over chai
- Each answer must include: concept + rule + 3-5 examples with translations + common mistake fix + SAAVI tip
- Reference "Day {day} mein humne ye seekha"

Generate {num_questions} realistic student questions + SAAVI's detailed answer for each.

Question types to include:
- Google search patterns: "{{word}} ka matlab kya hota hai", "{{word}} kaise use kare"
- Comparison: "{{word}} aur {{word}} mein kya fark hai"
- Error checking: "kya '{{wrong sentence}}' sahi hai?"
- Scenario: "{{situation}} mein English kaise bole?"
- Follow-up: "ok toh {{related concept}} kab use hota hai?"
- Hinglish/informal: "bhai ye samajh nahi aa raha"
- Pronunciation: "{{word}} ka pronunciation kya hai?"
- Grammar rule: "{{tense/concept}} ke rules kya hain?"
- Real Google searches: "{{word}} ka matlab kya hota hai", "{{word}} meaning in {lc['name']}"

Make questions feel REAL — Hinglish, typos, WhatsApp-style, broken sentences.
Vary difficulty: beginner doubts AND intermediate confusions.

Output ONLY a JSON array (no markdown, no explanation):
[{{"q":"student question","a":"SAAVI's detailed answer","type":"meaning|usage|comparison|error|scenario|grammar|pronunciation","day":{day}}}]"""


def generate_for_day(lang: str, day: int, all_chunks: list, num_questions: int) -> list:
    context = get_chunks_for_day(all_chunks, lang, day)
    if not context:
        return []

    prompt = build_prompt(lang, day, context, num_questions)
    raw = call_gemini(prompt)

    try:
        pairs = json.loads(raw)
        if isinstance(pairs, list):
            return pairs
    except json.JSONDecodeError:
        pass
    return []


def main():
    parser = argparse.ArgumentParser(description='Generate fine-tuning training data')
    parser.add_argument('--lang', choices=['hi', 'mr', 'te'])
    parser.add_argument('--day', type=int)
    parser.add_argument('--all', action='store_true')
    parser.add_argument('--questions', type=int, default=100, help='Questions per topic (default 100)')
    args = parser.parse_args()

    if not GEMINI_KEYS:
        print("ERROR: No API keys found"); sys.exit(1)

    all_chunks = json.loads(CHUNKS_FILE.read_text())
    OUTPUT_DIR.mkdir(parents=True, exist_ok=True)

    if args.all:
        langs = ['hi', 'mr', 'te']
        days = range(1, 51)
    elif args.lang and args.day:
        langs = [args.lang]
        days = [args.day]
    else:
        parser.error('Use --lang + --day, or --all')

    total = 0
    for lang in langs:
        lang_pairs = []
        for day in days:
            out_file = OUTPUT_DIR / f'raw_{lang}_day{day:02d}.json'
            if out_file.exists():
                existing = json.loads(out_file.read_text())
                lang_pairs.extend(existing)
                total += len(existing)
                print(f'  SKIP {lang} Day {day:2d} ({len(existing)} pairs exist)')
                continue

            pairs = generate_for_day(lang, day, all_chunks, args.questions)
            if pairs:
                out_file.write_text(json.dumps(pairs, ensure_ascii=False, indent=2))
                lang_pairs.extend(pairs)
                total += len(pairs)
                print(f'  ✓ {lang} Day {day:2d}: {len(pairs)} Q&A pairs')
            else:
                print(f'  ✗ {lang} Day {day:2d}: failed')

            time.sleep(0.5)  # gentle rate limiting

        # Save combined per-language file
        combined = OUTPUT_DIR / f'training_{lang}.json'
        combined.write_text(json.dumps(lang_pairs, ensure_ascii=False, indent=2))
        print(f'\n  {lang}: {len(lang_pairs)} total pairs → {combined}')

    print(f'\nGrand total: {total} Q&A pairs')
    print(f'Output: {OUTPUT_DIR}/')


if __name__ == '__main__':
    main()
