#!/usr/bin/env python3
"""Generate SAAVI voice samples via Gemini Flash 2.5.

Reads chapter JSON files, calls Gemini for hero chapters,
outputs sample JSON files.

Usage: python3 scripts/generate_samples_gemini.py [--dry-run]
"""
import json
import os
import sys
import time
import glob
from google import genai

API_KEY = os.environ.get("GEMINI_API_KEY", "")
MODEL = "gemini-2.5-flash"

CHAPTERS_DIR = "content/chapters"
SAMPLES_DIR = "content/samples"

BOARD_NAMES = {
    "cbse": "CBSE (NCERT)",
    "cg": "CG Board (Chhattisgarh)"
}


def build_prompt(chapter_name_en, board, class_num, subject):
    board_name = BOARD_NAMES.get(board, board.upper())
    cg_note = ""
    if board == "cg":
        cg_note = "\n- For CG Board: use Chhattisgarh references (Indravati nadi, Bastar ke jungle, bore-basi, bhains, dhaan ki kheti) — NEVER desert or camel references"

    return f"""You are NOMI, a warm curious AI teacher (elder sister / didi)
for Indian Class {class_num} {board_name} students.

NOMI VOICE RULES:
- Warm, curious, like an elder sister
- "tum" not "aap" — always
- Start with a real-life Indian example the student can relate to
- Uses "—" for natural speech pauses
- "Dekho —" / "Socho zara —" / "Ek kaam karo —"
- End with a genuine thinking question — NOT a summary
- Never "Is tarah humne seekha..."
- For Hindi: use Devanagari with English technical terms where natural
- For English: clear, warm English with Indian examples{cg_note}

Chapter: {chapter_name_en}
Board: {board_name}
Class: {class_num}
Subject: {subject}

Generate these 3 items in BOTH Hindi AND English (total 6 items).

For HINDI (native Hindi, not translated):
1. "example" — A 2-3 sentence real-life Indian example explaining a key concept from this chapter. Warm, conversational.
2. "misconception" — A common wrong belief students have about this topic. Format: wrong belief + correction.
3. "activity" — A 2-sentence simple experiment students can do at home.

For ENGLISH:
Same 3 items but in clear, warm English with Indian context.

Output ONLY valid JSON (no markdown, no code fences, no extra text):
{{"hi": [{{"type": "example", "heading": "उदाहरण", "content": "...", "icon": "lightbulb"}}, {{"type": "misconception", "heading": "गलतफहमी", "wrong": "...", "correct": "...", "icon": "triangle-alert"}}, {{"type": "activity", "heading": "गतिविधि", "content": "...", "cta": "ऐप में interactive experiment देखो →", "icon": "flask-conical"}}], "en": [{{"type": "example", "heading": "Example", "content": "...", "icon": "lightbulb"}}, {{"type": "misconception", "heading": "Misconception", "wrong": "...", "correct": "...", "icon": "triangle-alert"}}, {{"type": "activity", "heading": "Activity", "content": "...", "cta": "See interactive experiment in app →", "icon": "flask-conical"}}]}}"""


def generate_sample(client, chapter_name_en, board, class_num, subject):
    """Call Gemini and return parsed JSON blocks."""
    prompt = build_prompt(chapter_name_en, board, class_num, subject)

    response = client.models.generate_content(
        model=MODEL,
        contents=prompt,
    )

    text = response.text.strip()
    # Strip markdown code fences if present
    if text.startswith("```"):
        text = text.split("\n", 1)[1]
        if text.endswith("```"):
            text = text[:-3]
        text = text.strip()

    return json.loads(text)


def main():
    dry_run = "--dry-run" in sys.argv

    if not API_KEY and not dry_run:
        print("Error: GEMINI_API_KEY environment variable not set.")
        print("Usage: GEMINI_API_KEY=your_key python3 scripts/generate_samples_gemini.py")
        sys.exit(1)

    os.makedirs(SAMPLES_DIR, exist_ok=True)
    client = genai.Client(api_key=API_KEY)

    chapter_files = sorted(glob.glob(os.path.join(CHAPTERS_DIR, "*.json")))

    total_calls = 0
    total_files = 0
    errors = []

    for chapter_file in chapter_files:
        filename = os.path.basename(chapter_file)
        # Parse: cbse-10-science.json → board=cbse, class=10, subject=science
        parts = filename.replace(".json", "").split("-", 2)
        if len(parts) < 3:
            continue
        board = parts[0]
        class_num = int(parts[1])
        subject = parts[2]

        with open(chapter_file, 'r', encoding='utf-8') as f:
            data = json.load(f)

        hero_chapters = [ch for ch in data.get("chapters", []) if ch.get("is_hero")]

        if not hero_chapters:
            continue

        sample_filename = f"{board}-{class_num}-{subject}-samples.json"
        sample_path = os.path.join(SAMPLES_DIR, sample_filename)

        sample_data = {
            "board": board,
            "class": class_num,
            "subject": subject,
            "samples": []
        }

        print(f"\n{'[DRY RUN] ' if dry_run else ''}Processing: {filename} ({len(hero_chapters)} hero chapters)")

        for ch in hero_chapters:
            ch_name = ch.get("name_en", ch.get("name_hi", f"Chapter {ch['number']}"))
            ch_num = ch["number"]

            if dry_run:
                print(f"  Would generate: Chapter {ch_num} — {ch_name}")
                continue

            print(f"  Generating: Chapter {ch_num} — {ch_name}...", end=" ", flush=True)

            try:
                blocks = generate_sample(client, ch_name, board, class_num, subject)
                sample_data["samples"].append({
                    "chapter_number": ch_num,
                    "blocks": blocks
                })
                print("✓")
                total_calls += 1
                # Rate limit: ~15 requests per minute for free tier
                time.sleep(4)
            except Exception as e:
                print(f"✗ Error: {e}")
                errors.append(f"{filename} Ch{ch_num}: {e}")

        if not dry_run and sample_data["samples"]:
            with open(sample_path, 'w', encoding='utf-8') as f:
                json.dump(sample_data, f, ensure_ascii=False, indent=2)
            print(f"  → Saved: {sample_path}")
            total_files += 1

    print(f"\n{'=' * 50}")
    print(f"Total Gemini calls: {total_calls}")
    print(f"Total files written: {total_files}")
    if errors:
        print(f"Errors ({len(errors)}):")
        for e in errors:
            print(f"  - {e}")


if __name__ == "__main__":
    main()
