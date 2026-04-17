#!/usr/bin/env python3
"""Generate chalk-style illustrations for Shrutam.ai via Google Imagen 4.0."""
import os
import time
from google import genai

API_KEY = os.environ.get("GEMINI_API_KEY")
if not API_KEY:
    raise RuntimeError("Set GEMINI_API_KEY environment variable before running")
MODEL = "imagen-4.0-generate-001"

BASE_STYLE = """Hand-drawn chalk illustration on transparent background. White chalk outlines with soft amber/saffron (#f59e0b) color highlights and gentle green (#22c55e) accents for nature elements. Educational illustration for Indian school students aged 11-16. Style: warm teacher-on-blackboard sketch, like a kind elder sister (didi) drew it for her student. No text watermarks. Clean, minimal, friendly. No photorealistic elements — purely illustrated chalk art."""

IMAGES = {
    # ---- Blog post images ----
    "assets/images/blog/photosynthesis.png": f"""{BASE_STYLE}
Subject: Photosynthesis process. A green plant with visible roots in brown soil. Bright sun in corner with rays hitting leaves. Arrows showing CO2 entering leaves and O2 leaving. Inside a leaf cross-section showing chloroplast. Small glucose molecule symbol near roots. Warm, educational, shows the complete cycle clearly.""",

    "assets/images/blog/cg-board-preparation.png": f"""{BASE_STYLE}
Subject: Board exam preparation. An Indian student (gender-neutral, simple chalk figure) sitting at a desk with open textbook, notebook, and pencil. A clock showing study time. Stack of NCERT books beside them. A small chalk calendar with exam date circled. Motivational energy — determined student preparing for success. Include a small map outline of Chhattisgarh state in the corner.""",

    "assets/images/blog/blind-education.png": f"""{BASE_STYLE}
Subject: Blind student learning with AI. A student figure wearing headphones, smiling, with sound waves coming from the headphones. A braille book beside them. A friendly AI assistant icon (simple robot face with heart) speaking through the headphones. Mathematical equations shown as spoken text in a speech bubble: 'x squared plus 3x'. Warm, inclusive, empowering. The student looks happy and engaged.""",

    "assets/images/blog/adaptive-learning.png": f"""{BASE_STYLE}
Subject: Adaptive difficulty in learning. A staircase/ladder going upward with 4 levels labeled 'Easy', 'Medium', 'Hard', 'Board Ready'. A simple student figure climbing the stairs. At each level, the step size adjusts — smaller steps for struggling, bigger leaps for confident. Arrows showing the AI adjusting difficulty up and down. A friendly AI guide figure at the top encouraging the climber.""",

    "assets/images/blog/zero-to-hero.png": f"""{BASE_STYLE}
Subject: Learning journey from zero to hero. A winding mountain path going from bottom-left to top-right. At the bottom: a confused student with question marks. Along the path: milestone markers (Prerequisites, Basics, Chapter, Practice, Mock Test). At the summit: the same student now confident with a trophy/star. The path has small flags at each milestone. Inspiring, shows complete journey.""",

    # ---- Feature images ----
    "assets/images/features/mother-tongue.png": f"""{BASE_STYLE}
Subject: Learning in mother tongue. Multiple speech bubbles in different Indian scripts: Devanagari 'हिंदी', Telugu 'తెలుగు', English 'English', Marathi 'मराठी'. The bubbles emerge from a single friendly AI teacher figure. Each bubble has a warm glow. Shows the concept of one teacher speaking many languages. Connected by flowing chalk lines.""",

    "assets/images/features/ask-like-10.png": f"""{BASE_STYLE}
Subject: One concept explained 10 different ways. A central glowing lightbulb (the concept) with 10 rays extending outward. At the end of each ray: a small icon representing a different explanation method — analogy (water drop), story (book), experiment (flask), diagram (circle), quiz (question mark), real-life (house), comparison (scales), mistake (X mark), mnemonic (brain), equation (equals sign). Circular, radial layout.""",

    "assets/images/features/blind-mode.png": f"""{BASE_STYLE}
Subject: Accessibility and blind mode. A pair of headphones in the center with sound waves emanating. Around it: icons for TalkBack (Android icon), VoiceOver (Apple icon), a braille cell pattern, a microphone (voice input). The universal accessibility symbol (wheelchair icon) with a warm glow. The message: technology making education accessible for visually impaired students.""",

    "assets/images/features/photo-doubt.png": f"""{BASE_STYLE}
Subject: Photo doubt solver. A smartphone outline with a camera lens. Inside the phone screen: a handwritten math equation (quadratic formula). An arrow pointing from the phone to a solution card showing step-by-step working. A happy student figure holding the phone. Simple, shows the flow: snap photo → get solution.""",

    "assets/images/features/mock-exams.png": f"""{BASE_STYLE}
Subject: Mock exam levels. Four exam papers stacked/fanned out, each labeled with increasing difficulty: Easy (green check), Medium (yellow star), Hard (orange flame), Board Ready (red trophy). A progress bar running across the bottom showing advancement through levels. Clean, organized, shows progression.""",

    "assets/images/features/parent-portal.png": f"""{BASE_STYLE}
Subject: Parent monitoring child's education. Two figures — a parent (larger, caring) and a child (smaller, studying). Between them: a dashboard/screen showing progress bars, a clock (bedtime lock), a WhatsApp icon (weekly report), and a shield (safe content). The parent looks reassured, the child looks focused. Warm family educational scene.""",

    # ---- Hero image ----
    "assets/images/hero/saavi-teaching.png": f"""{BASE_STYLE}
Subject: SAAVI the AI teacher. A friendly female figure (simple chalk style, representing an elder sister/didi) standing next to a large blackboard. On the blackboard: a science diagram (atom or plant). The teacher figure has a warm smile, one hand pointing at the board. A speech bubble saying concepts in a friendly way. Small student figures (2-3) sitting and listening with engaged expressions. The scene captures the warmth of a didi teaching younger siblings. Saffron/amber glow around the teacher figure.""",

    # ---- OG image ----
    "assets/images/og/default.png": f"""{BASE_STYLE}
Subject: Shrutam brand image. The word 'Shrutam' in elegant chalk lettering in the center. Below it in Devanagari: 'शृतम्'. Below that, the tagline: 'सुनते हो, सीखते हो।' (Listen and Learn). A small headphone icon and a book icon flanking the text. Subtle sound waves in the background. The overall feel: premium, educational, warm, Indian. Size and layout suitable for social media sharing (landscape orientation).""",
}

def main():
    client = genai.Client(api_key=API_KEY)

    total = len(IMAGES)
    generated = 0
    errors = []

    for filepath, prompt in IMAGES.items():
        # Create directory if needed
        os.makedirs(os.path.dirname(filepath), exist_ok=True)

        print(f"[{generated+1}/{total}] Generating: {filepath}...", end=" ", flush=True)

        try:
            response = client.models.generate_images(
                model=MODEL,
                prompt=prompt,
                config=genai.types.GenerateImagesConfig(
                    number_of_images=1,
                ),
            )

            with open(filepath, 'wb') as f:
                f.write(response.generated_images[0].image.image_bytes)

            size_kb = len(response.generated_images[0].image.image_bytes) // 1024
            print(f"✓ ({size_kb}KB)")
            generated += 1

            # Rate limit
            time.sleep(5)

        except Exception as e:
            print(f"✗ Error: {e}")
            errors.append(f"{filepath}: {e}")

    print(f"\n{'=' * 50}")
    print(f"Generated: {generated}/{total}")
    if errors:
        print(f"Errors ({len(errors)}):")
        for e in errors:
            print(f"  - {e}")

if __name__ == "__main__":
    main()
