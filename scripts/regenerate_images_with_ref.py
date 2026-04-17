#!/usr/bin/env python3
"""Regenerate all site images with consistent SAAVI character reference.

Images WITH SAAVI use gemini-2.5-flash-image (image+text → image) with the
canonical saavi-standalone.png as a character reference.

Images WITHOUT SAAVI use imagen-4.0-generate-001 directly.
"""
import os
import time
from google import genai
from google.genai import types

API_KEY = os.environ.get("GEMINI_API_KEY", "")
if not API_KEY:
    raise RuntimeError("Set GEMINI_API_KEY environment variable")

client = genai.Client(api_key=API_KEY)

# ---------------------------------------------------------------------------
# Load SAAVI character reference (resolved relative to repo root)
# ---------------------------------------------------------------------------
SCRIPT_DIR = os.path.dirname(os.path.abspath(__file__))
REPO_ROOT = os.path.dirname(SCRIPT_DIR)
SAAVI_REF_PATH = os.path.join(REPO_ROOT, "assets", "images", "hero", "saavi-standalone.png")

with open(SAAVI_REF_PATH, "rb") as f:
    SAAVI_REF = f.read()

print(f"Loaded SAAVI reference: {SAAVI_REF_PATH} ({len(SAAVI_REF)//1024} KB)")

# ---------------------------------------------------------------------------
# Shared character consistency block appended to every SAAVI prompt
# ---------------------------------------------------------------------------
SAAVI_CONSISTENCY = """Keep the EXACT same character design as the reference image:
- Same art style (clean digital illustration, friendly, warm)
- Same clothing (blue kurta top, dark jeans/leggings, white dupatta on shoulders)
- Same hair (black bun on top of head)
- Same features (warm brown skin, blue eyes, bindi, earrings)
- Same body proportions and face shape
Clean background unless the scene requires one."""

# ---------------------------------------------------------------------------
# Images WITH SAAVI reference
# ---------------------------------------------------------------------------
SAAVI_IMAGES = {
    "assets/images/hero/saavi-teaching.png": (
        "SAAVI is standing at a blackboard teaching, pointing at a science diagram "
        "(atom or plant cross-section) on the board. 2-3 Indian school students are sitting "
        "below her, looking engaged. Classroom setting with warm lighting. A speech bubble "
        "from SAAVI contains 'Arre yaar!' in friendly lettering. The scene captures the warmth "
        "of an elder sister teaching younger siblings. Clean digital illustration style."
    ),

    "assets/images/blog/photosynthesis.png": (
        "SAAVI is holding a small potted plant and pointing up at a bright sun. "
        "Arrows show CO2 entering the plant's leaves and O2 leaving. She looks excited "
        "and is explaining the process enthusiastically. Clean, light background with "
        "subtle leaf/nature elements. Clean digital illustration style."
    ),

    "assets/images/blog/cg-board-preparation.png": (
        "SAAVI is sitting next to an Indian student at a wooden desk. An open NCERT textbook "
        "lies on the desk. SAAVI is leaning in and pointing at something important on the page. "
        "A calendar on the wall behind them shows an exam date circled in red. "
        "Warm, focused study scene. Clean digital illustration style."
    ),

    "assets/images/blog/blind-education.png": (
        "SAAVI is sitting cross-legged on the floor next to a blind student who is wearing "
        "headphones. SAAVI is reading aloud from an open book; soft sound waves radiate "
        "from the book toward the student. The blind student is smiling peacefully. "
        "Warm, inclusive, empowering atmosphere. Clean digital illustration style."
    ),

    "assets/images/blog/adaptive-learning.png": (
        "SAAVI is standing beside a staircase that has 4 ascending levels labeled "
        "'Easy', 'Medium', 'Hard', 'Board Ready'. She is gesturing encouragingly at a student "
        "who is climbing the stairs. Her posture is supportive and motivating. "
        "Bright, optimistic scene. Clean digital illustration style."
    ),

    "assets/images/blog/zero-to-hero.png": (
        "SAAVI is at the top of a winding mountain path, waving warmly and encouragingly "
        "downward. A student is at the bottom of the path and begins to climb. "
        "Small milestone flags dot the path (one per level of learning). "
        "Inspiring, aspirational scene. Clean digital illustration style."
    ),

    "assets/images/features/mother-tongue.png": (
        "SAAVI is at the center looking happy and animated. Multiple speech bubbles radiate "
        "around her, each containing text in a different script: हिंदी (Devanagari), "
        "తెలుగు (Telugu), English, मराठी (Marathi). She looks joyful speaking all languages. "
        "Clean, colorful background. Clean digital illustration style."
    ),

    "assets/images/features/ask-like-10.png": (
        "SAAVI is holding both hands up showing '10' with her fingers. Around her float "
        "10 small icons in a semicircle: lightbulb, open book, flask/beaker, question mark, "
        "house, balance scales, brain, equals sign, X mark, magnifying glass. "
        "Each icon is distinct and clear. Clean digital illustration style."
    ),

    "assets/images/features/blind-mode.png": (
        "SAAVI is wearing large over-ear headphones, eyes gently closed, with a serene "
        "expression as if deeply listening while she teaches through audio. "
        "Soft sound waves radiate outward around her. A universal accessibility symbol "
        "(wheelchair icon) is subtly visible nearby. Clean digital illustration style."
    ),

    "assets/images/features/photo-doubt.png": (
        "A student is holding up a smartphone that shows a math equation on its screen. "
        "SAAVI is beside the student, leaning in to look at the phone with a bright "
        "'lightbulb moment' expression — eyes wide, finger raised as if she just "
        "got the answer. Playful, energetic scene. Clean digital illustration style."
    ),

    "assets/images/features/mock-exams.png": (
        "SAAVI is holding 4 exam papers fanned out like playing cards. Each paper has a "
        "coloured badge: green for Easy, yellow for Medium, orange for Hard, red for Board Ready. "
        "She has a confident, proud expression. Clean digital illustration style."
    ),

    "assets/images/features/parent-portal.png": (
        "SAAVI is standing between two figures: a parent on one side and a child student "
        "on the other. She is showing a progress report / dashboard to the parent. "
        "The child is happily studying at a small desk nearby. "
        "Warm, trustworthy, family-friendly scene. Clean digital illustration style."
    ),
}

# ---------------------------------------------------------------------------
# Images WITHOUT SAAVI (pure brand / no character)
# ---------------------------------------------------------------------------
BRAND_STYLE = (
    "Clean digital illustration style. Friendly, warm, modern Indian edtech aesthetic. "
    "Matching the art style of Shrutam.ai: smooth lines, vibrant but not garish colors, "
    "white or very light background suitable for social sharing."
)

NO_SAAVI_IMAGES = {
    "assets/images/og/default.png": (
        f"{BRAND_STYLE} "
        "Brand image for Shrutam.ai. The word 'Shrutam' in elegant, bold lettering "
        "prominently at the center. Directly below it in Devanagari script: 'शृतम्'. "
        "Below that the tagline: 'सुनते हो, सीखते हो।' A stylized headphone icon and a "
        "book icon flank the text. Subtle sound waves in the background. "
        "Premium, warm, distinctly Indian educational feel. Landscape orientation."
    ),
}

# ---------------------------------------------------------------------------
# Generation helpers
# ---------------------------------------------------------------------------

def generate_with_saavi_ref(filepath: str, scene_prompt: str) -> int:
    """Generate image with SAAVI reference for character consistency.

    Returns the byte-size of the saved image, or 0 on failure.
    """
    full_prompt = f"{scene_prompt}\n\n{SAAVI_CONSISTENCY}"

    response = client.models.generate_content(
        model="gemini-2.5-flash-image",
        contents=[
            types.Part.from_bytes(data=SAAVI_REF, mime_type="image/png"),
            full_prompt,
        ],
        config=types.GenerateContentConfig(
            response_modalities=["IMAGE", "TEXT"],
        ),
    )

    for part in response.candidates[0].content.parts:
        if hasattr(part, "inline_data") and part.inline_data:
            abs_path = os.path.join(REPO_ROOT, filepath)
            os.makedirs(os.path.dirname(abs_path), exist_ok=True)
            with open(abs_path, "wb") as f:
                f.write(part.inline_data.data)
            return len(part.inline_data.data)

    return 0


def generate_without_ref(filepath: str, prompt: str) -> int:
    """Generate image without a character reference (for non-SAAVI images).

    Returns the byte-size of the saved image, or 0 on failure.
    """
    response = client.models.generate_images(
        model="imagen-4.0-generate-001",
        prompt=prompt,
        config=genai.types.GenerateImagesConfig(number_of_images=1),
    )
    abs_path = os.path.join(REPO_ROOT, filepath)
    os.makedirs(os.path.dirname(abs_path), exist_ok=True)
    img_bytes = response.generated_images[0].image.image_bytes
    with open(abs_path, "wb") as f:
        f.write(img_bytes)
    return len(img_bytes)


# ---------------------------------------------------------------------------
# Main
# ---------------------------------------------------------------------------

def main():
    total = len(SAAVI_IMAGES) + len(NO_SAAVI_IMAGES)
    generated = 0
    errors = []
    idx = 0

    print(f"\nRegenerating {total} images (12 with SAAVI ref + 1 brand image)\n")
    print("=" * 60)

    # --- SAAVI images ---
    for filepath, scene_prompt in SAAVI_IMAGES.items():
        idx += 1
        print(f"[{idx}/{total}] {filepath} ... ", end="", flush=True)
        try:
            size = generate_with_saavi_ref(filepath, scene_prompt)
            if size:
                print(f"OK ({size // 1024} KB)")
                generated += 1
            else:
                msg = "No image data returned"
                print(f"FAIL — {msg}")
                errors.append(f"{filepath}: {msg}")
        except Exception as e:
            print(f"ERROR — {e}")
            errors.append(f"{filepath}: {e}")
        time.sleep(4)  # stay within rate limits

    # --- Brand / no-SAAVI images ---
    for filepath, prompt in NO_SAAVI_IMAGES.items():
        idx += 1
        print(f"[{idx}/{total}] {filepath} ... ", end="", flush=True)
        try:
            size = generate_without_ref(filepath, prompt)
            if size:
                print(f"OK ({size // 1024} KB)")
                generated += 1
            else:
                msg = "No image data returned"
                print(f"FAIL — {msg}")
                errors.append(f"{filepath}: {msg}")
        except Exception as e:
            print(f"ERROR — {e}")
            errors.append(f"{filepath}: {e}")
        time.sleep(4)

    # --- Summary ---
    print("\n" + "=" * 60)
    print(f"Done: {generated}/{total} generated successfully.")
    if errors:
        print(f"\nFailed ({len(errors)}):")
        for err in errors:
            print(f"  - {err}")
    else:
        print("All images generated without errors.")


if __name__ == "__main__":
    main()
