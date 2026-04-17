# Shrutam.ai Multi-Board Multi-Language Architecture — Design Spec

> Date: 2026-04-17
> Status: Approved
> Depends on: 2026-04-17-shrutam-website-design.md (Tier 1+2 complete)

---

## 1. Overview

Extend the Shrutam.ai marketing website from a single-language (Hinglish) site to a multi-board, multi-language, template-driven site that serves 100+ SEO-optimized pages from JSON data + PHP templates.

**MVP Scope:**
- Boards: CBSE + CG Board (full content). Maharashtra SSC, MP Board, AP/Telangana Board (coming soon placeholders).
- Languages: Hindi (`/hi/`) + English (`/en/`) for CBSE. Hindi (`/hi/`) only for CG Board. Marathi (`/mr/`) + Telugu (`/te/`) as coming soon landing pages.
- Classes: 5-10 (adding Class 5 to the existing 6-10)
- Subjects: Science, Mathematics, Hindi, Social Science, English

**Content strategy:** Chapter names for all classes/subjects. 2-3 "hero chapters" per subject with rich SAAVI-style sample content (example, misconception, activity blocks). Remaining chapters show names only. Gemini Flash 2.5 generates native-language content (not translated).

**Existing site:** The current 44 Hinglish pages remain untouched at their root URLs. The new multi-language system adds language-prefixed pages alongside them.

---

## 2. URL Structure

### Language prefixes
```
shrutam.ai/                    ← Hinglish (existing, unchanged)
shrutam.ai/hi/                 ← Hindi
shrutam.ai/en/                 ← English
shrutam.ai/mr/                 ← Marathi (coming soon landing)
shrutam.ai/te/                 ← Telugu (coming soon landing)
```

### Board/class/subject routes
```
shrutam.ai/hi/boards/cbse/                        ← CBSE board page in Hindi
shrutam.ai/hi/boards/cbse/class-10/                ← CBSE Class 10 overview in Hindi
shrutam.ai/hi/boards/cbse/class-10/science/        ← CBSE Class 10 Science chapters in Hindi
shrutam.ai/en/boards/cbse/class-10/science/        ← CBSE Class 10 Science chapters in English
shrutam.ai/hi/boards/cg-board/class-10/science/    ← CG Board Class 10 Science in Hindi
```

### Shared page routes (features, pricing, FAQ, etc.)
```
shrutam.ai/hi/features/
shrutam.ai/hi/pricing/
shrutam.ai/hi/blind-mode/
shrutam.ai/hi/saavi/
shrutam.ai/hi/faq/
shrutam.ai/hi/about/
shrutam.ai/hi/waitlist/
shrutam.ai/en/features/
shrutam.ai/en/pricing/
... etc.
```

### Coming soon routes
```
shrutam.ai/mr/                                     ← Marathi landing + waitlist
shrutam.ai/te/                                     ← Telugu landing + waitlist
shrutam.ai/hi/boards/maharashtra-ssc/              ← Maharashtra coming soon
shrutam.ai/hi/boards/ap-board/                     ← AP Board coming soon
shrutam.ai/hi/boards/mp-board/                     ← MP Board coming soon (existing page stays)
```

### Rules
- No language prefix = Hinglish (existing pages, backward compatible)
- Valid prefixes: `hi`, `en`, `mr`, `te`
- Every language-prefixed page has `hreflang` tags pointing to all available variants
- Language switcher in nav shows available languages for the current page
- `<html lang="hi">` / `lang="en"` / `lang="mr"` / `lang="te"` set per page

---

## 3. Routing Architecture

### .htaccess additions
Route all language-prefixed URLs to `router.php`:
```apache
# Multi-language router
RewriteCond %{REQUEST_URI} ^/(hi|en|mr|te)/
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(hi|en|mr|te)/(.*)$ router.php?lang=$1&path=$2 [L,QSA]
```

Existing root-level URLs continue to serve existing PHP files directly (no change).

### router.php logic
```
Input: lang=hi, path=boards/cbse/class-10/science
  ↓
Parse: type=subject, board=cbse, class=10, subject=science
  ↓
Validate: board exists in boards.json? class in range 5-10? subject valid?
  ↓
Load: content/chapters/cbse-10-science.json
Load: content/samples/cbse-10-science-samples.json (if exists)
Load: content/translations/hi.json
  ↓
Set PHP variables: $lang, $board, $class, $subject, $chapters, $samples, $t (translations)
  ↓
Include: templates/subject-page.php
  ↓
Output: Full HTML with unique SEO meta, chapter list, sample cards
```

### Route patterns
```
/{lang}/                                    → templates/homepage.php
/{lang}/boards/{board}/                     → templates/board-page.php
/{lang}/boards/{board}/class-{n}/           → templates/class-page.php
/{lang}/boards/{board}/class-{n}/{subject}/ → templates/subject-page.php
/{lang}/features/                           → templates/shared-page.php (type=features)
/{lang}/pricing/                            → templates/shared-page.php (type=pricing)
/{lang}/blind-mode/                         → templates/shared-page.php (type=blind-mode)
/{lang}/saavi/                              → templates/shared-page.php (type=saavi)
/{lang}/faq/                                → templates/shared-page.php (type=faq)
/{lang}/about/                              → templates/shared-page.php (type=about)
/{lang}/waitlist/                           → templates/shared-page.php (type=waitlist)
/{lang}/blog/                               → templates/shared-page.php (type=blog)
```

---

## 4. Content Data Structure

### content/boards.json
```json
{
  "cbse": {
    "name": { "en": "CBSE", "hi": "सीबीएसई" },
    "full_name": { "en": "Central Board of Secondary Education", "hi": "केंद्रीय माध्यमिक शिक्षा बोर्ड" },
    "slug": "cbse",
    "languages": ["hi", "en"],
    "classes": [5, 6, 7, 8, 9, 10],
    "subjects": ["science", "mathematics", "hindi", "social-science", "english"],
    "textbook_source": "NCERT",
    "status": "active"
  },
  "cg-board": {
    "name": { "hi": "CG Board" },
    "full_name": { "hi": "छत्तीसगढ़ माध्यमिक शिक्षा मंडल" },
    "slug": "cg-board",
    "languages": ["hi"],
    "classes": [5, 6, 7, 8, 9, 10],
    "subjects": ["science", "mathematics", "hindi", "social-science", "english"],
    "textbook_source": "NCERT (CG follows NCERT)",
    "status": "active"
  },
  "maharashtra-ssc": {
    "name": { "en": "Maharashtra SSC", "mr": "महाराष्ट्र एसएससी" },
    "slug": "maharashtra-ssc",
    "languages": ["mr"],
    "status": "coming_soon"
  },
  "mp-board": {
    "name": { "hi": "MP Board" },
    "slug": "mp-board",
    "languages": ["hi"],
    "status": "coming_soon"
  },
  "ap-board": {
    "name": { "en": "AP Board", "te": "ఏపీ బోర్డు" },
    "slug": "ap-board",
    "languages": ["te"],
    "status": "coming_soon"
  }
}
```

### content/chapters/{board}-{class}-{subject}.json
```json
{
  "board": "cbse",
  "class": 10,
  "subject": "science",
  "total_chapters": 13,
  "chapters": [
    {
      "number": 1,
      "name_hi": "रासायनिक अभिक्रियाएँ एवं समीकरण",
      "name_en": "Chemical Reactions and Equations",
      "is_hero": true
    },
    {
      "number": 2,
      "name_hi": "अम्ल, क्षारक एवं लवण",
      "name_en": "Acids, Bases and Salts",
      "is_hero": false
    }
  ]
}
```

### content/samples/{board}-{class}-{subject}-samples.json
Rich SAAVI-style content for 2-3 hero chapters per subject:
```json
{
  "board": "cbse",
  "class": 10,
  "subject": "science",
  "samples": [
    {
      "chapter_number": 1,
      "blocks": {
        "hi": [
          {
            "type": "example",
            "heading": "रोज़मर्रा की Chemical Reaction",
            "content": "रोटी पकाते समय आटा भूरा होता है — यह भी एक chemical reaction है! इसे hum 'decomposition' kehte hain।",
            "icon": "lightbulb"
          },
          {
            "type": "misconception",
            "heading": "गलतफहमी",
            "wrong": "Rust सिर्फ iron पे होता है",
            "correct": "नहीं! Copper पे भी होता है — green layer (patina) देखोगे",
            "icon": "triangle-alert"
          },
          {
            "type": "activity",
            "heading": "घर पे करो",
            "content": "नींबू पे iron nail लगाओ। 2 दिन बाद देखो — क्या होता है?",
            "cta": "Interactive in app →",
            "icon": "flask-conical"
          }
        ],
        "en": [
          {
            "type": "example",
            "heading": "Everyday Chemical Reaction",
            "content": "When you toast bread, it turns brown — that's a chemical reaction! It's called a decomposition reaction.",
            "icon": "lightbulb"
          },
          {
            "type": "misconception",
            "heading": "Common Misconception",
            "wrong": "Rust only happens on iron",
            "correct": "No! Copper also corrodes — you see a green layer called patina",
            "icon": "triangle-alert"
          },
          {
            "type": "activity",
            "heading": "Try at Home",
            "content": "Place an iron nail on a lemon. Check after 2 days — what happens?",
            "cta": "Interactive in app →",
            "icon": "flask-conical"
          }
        ]
      }
    }
  ]
}
```

### content/translations/{lang}.json
UI strings for templates:
```json
{
  "nav": {
    "features": "विशेषताएँ",
    "blind_mode": "ब्लाइंड मोड",
    "classes": "कक्षाएँ",
    "boards": "बोर्ड",
    "pricing": "मूल्य",
    "blog": "ब्लॉग",
    "for_schools": "स्कूलों के लिए",
    "join_waitlist": "वेटलिस्ट जॉइन करो →"
  },
  "hero": {
    "tagline": "सुनते हो, सीखते हो।",
    "headline": "पढ़ना अब सुनने जैसा आसान है",
    "body": "SAAVI दीदी तुम्हारी अपनी AI teacher है।\nहिंदी में। रात 2 बजे भी। बिना judge किये।",
    "cta_waitlist": "फ्री वेटलिस्ट जॉइन करो →",
    "cta_demo": "SAAVI डेमो देखो"
  },
  "subject_page": {
    "chapters_title": "अध्याय",
    "hero_chapter_label": "SAAVI इसे ऐसे पढ़ाती है:",
    "all_chapters_cta": "पूरा चैप्टर SAAVI के साथ सीखो →",
    "board_exam_weight": "बोर्ड परीक्षा",
    "marks": "अंक"
  },
  "common": {
    "class": "कक्षा",
    "coming_soon": "जल्द आ रहा है",
    "join_waitlist": "वेटलिस्ट जॉइन करो",
    "free_forever": "हमेशा मुफ़्त",
    "per_month": "प्रति माह",
    "languages_available": "भाषाएँ उपलब्ध",
    "board_exam_pattern": "परीक्षा पैटर्न"
  },
  "sample_blocks": {
    "example": "उदाहरण",
    "misconception": "गलतफहमी",
    "activity": "गतिविधि",
    "key_point": "मुख्य बात",
    "try_in_app": "ऐप में देखो →"
  },
  "footer": {
    "tagline": "\"सुनते हो, सीखते हो।\"",
    "blind_mode_free": "♿ ब्लाइंड मोड — हमेशा मुफ़्त",
    "copyright": "© 2026 आरम्भ · किश्यम AI प्रा. लि. · shrutam.ai",
    "product_of": "आरम्भ (Aarambha) का उत्पाद"
  }
}
```

English translation file (`en.json`) follows same structure with English strings.

---

## 5. PHP Templates

### templates/subject-page.php
The main template for chapter listing + hero samples. Receives from router:
- `$lang` — language code
- `$board` — board data from boards.json
- `$classNum` — 5-10
- `$subject` — subject slug
- `$chapters` — chapter data from chapters JSON
- `$samples` — hero chapter samples (may be empty)
- `$t` — translation strings

Renders:
1. SEO `<head>` with language-specific title/description, hreflang tags, BreadcrumbList + Course schema
2. Language-aware nav (via updated `partials/nav.php` + `partials/lang-switcher.php`)
3. Hero: board badge, class, subject name in native language
4. Full chapter list as cards (name in native language, chapter number badge)
5. For hero chapters (`is_hero: true`): expanded card with sample content blocks (example, misconception, activity) — rendered via `partials/sample-cards.php`
6. CTA: "Join Shrutam" in native language
7. Language-aware footer

### templates/class-page.php
Overview of subjects for a board+class. Lists 5 subject cards with chapter count, links to subject pages.

### templates/board-page.php
Board landing: exam pattern, classes covered, cities (for regional boards), languages available, subject overview.

### templates/homepage.php
Language-aware version of the homepage. Same 11 sections, but all text from `$t` translation object instead of hardcoded Hinglish.

### templates/shared-page.php
Handles: features, pricing, FAQ, blind-mode, saavi, about, waitlist, blog. Loads the appropriate content section based on `$pageType` and language.

### templates/coming-soon.php
For Marathi, Telugu landing pages and boards not yet launched. Shows: language name, "Coming Soon" message, waitlist form, what to expect.

---

## 6. New/Modified Partials

### partials/lang-switcher.php (NEW)
Dropdown or pill group in nav showing available languages for the current page. Determines available languages from:
- Board pages: `boards.json` → board.languages
- Shared pages: all active languages (hi, en)
- Coming soon: just the target language

### partials/sample-cards.php (NEW)
Renders SAAVI-style content preview blocks. Takes a `$blocks` array and renders each as a styled card matching StudyAI's 11 block types:
- `example` → Lightbulb icon, success/green tint
- `misconception` → Alert icon, red tint, wrong/correct format
- `activity` → Flask icon, interactive CTA
- `key_point` → Checklist icon, primary tint
- `definition` → Target icon, accent tint

Uses the same CSS variable theming as the rest of the site.

### partials/hreflang.php (NEW)
Generates `<link rel="alternate" hreflang="hi" href="...">` tags for all available language variants of the current page.

### partials/nav.php (MODIFIED)
Add language switcher. Add Class 5 to the classes dropdown.

### partials/head.php (MODIFIED)
Accept `$lang` variable to set `<html lang="...">`. Include hreflang partial.

---

## 7. Content Generation via Gemini

### What Gemini generates:
1. **Chapter name translations** — For CBSE/CG Board classes 5-10, all subjects: Hindi name for each chapter (English names already known from NCERT)
2. **Hero chapter samples** — For 2-3 chapters per subject per board: example block, misconception block, activity block — in Hindi and English, natively written (not translated)
3. **UI translation strings** — `hi.json` and `en.json` translation files

### Gemini prompt pattern for chapter names:
```
Board: CBSE (NCERT)
Class: 5
Subject: Science
Language: Hindi

For each chapter, provide the official Hindi name as it appears in the NCERT Hindi-medium textbook.
Output as JSON array: [{"number": 1, "name_hi": "...", "name_en": "..."}, ...]
```

### Gemini prompt pattern for hero samples:
```
You are SAAVI, an AI teacher for Indian students.
Board: CBSE, Class: 10, Subject: Science
Chapter: Chemical Reactions and Equations
Language: Hindi

Generate 3 teaching blocks in NATIVE Hindi (not translated):
1. "example" — A real-life Indian example explaining a key concept from this chapter. Warm, conversational, like talking to a student.
2. "misconception" — A common wrong belief students have about this chapter + the correction.
3. "activity" — A simple experiment or activity students can do at home.

Output as JSON.
```

### Volume:
- Chapter names: ~60 JSON files (2 boards × 6 classes × 5 subjects) — could be one large Gemini batch
- Hero samples: ~60 sample files (2-3 hero chapters × 60 subject-class combos) — ~180 Gemini calls
- Translation files: 2 files (hi.json, en.json) — 1-2 Gemini calls each
- **Total: ~250 Gemini calls, ~$0.50 cost**

### Review process:
1. Generate all JSON via Gemini batch
2. Spot-check 10-20 files for accuracy (Hindi chapter names must match official NCERT textbook)
3. Fix any hallucinated names
4. Commit to repo

---

## 8. SEO Strategy

### Per-page SEO:
- **Title pattern:** `{Chapter/Subject} | {Board} Class {N} {Language} | Shrutam SAAVI`
  - Example: `रासायनिक अभिक्रियाएँ | CBSE कक्षा 10 विज्ञान | Shrutam SAAVI`
- **Description:** Native language, mentions board + class + subject + SAAVI
- **Canonical:** Self-referencing canonical on each language variant
- **hreflang:** All available language variants linked
- **Schema:** Course + BreadcrumbList on every board/class/subject page

### Sitemap expansion:
Dynamic sitemap generation or expanded `sitemap.xml` with all new URLs. Priorities:
- Homepage variants: 1.0
- Board pages: 0.9
- Class pages: 0.85
- Subject pages (with hero samples): 0.8
- Subject pages (names only): 0.7
- Coming soon pages: 0.5

### Content depth targets:
- Subject pages with hero samples: 400-600 words (chapter list + 3 sample blocks)
- Subject pages without hero samples: 200-300 words (chapter list + CTA)
- Board pages: 300-400 words
- Class overview pages: 200-300 words

---

## 9. Page Count Summary

### Active content (CBSE + CG Board, Hindi + English):

| Page type | CBSE Hindi | CBSE English | CG Hindi | Total |
|-----------|-----------|-------------|----------|-------|
| Board page | 1 | 1 | 1 | 3 |
| Class pages (5-10) | 6 | 6 | 6 | 18 |
| Subject pages (5 per class) | 30 | 30 | 30 | 90 |
| **Subtotal** | **37** | **37** | **37** | **111** |

### Shared pages (Hindi + English versions):

| Page | Hindi | English | Total |
|------|-------|---------|-------|
| Homepage | 1 | 1 | 2 |
| Features | 1 | 1 | 2 |
| Pricing | 1 | 1 | 2 |
| Blind Mode | 1 | 1 | 2 |
| SAAVI | 1 | 1 | 2 |
| FAQ | 1 | 1 | 2 |
| About | 1 | 1 | 2 |
| Waitlist | 1 | 1 | 2 |
| Blog | 1 | 1 | 2 |
| **Subtotal** | **9** | **9** | **18** |

### Placeholder pages:
- Marathi landing: 1
- Telugu landing: 1
- Maharashtra SSC coming soon: 1
- AP Board coming soon: 1
- MP Board coming soon: 1 (existing)
- **Subtotal: 5**

### Grand total:
- Existing Hinglish pages: 44
- New template-driven pages: 111 + 18 + 5 = **134**
- **Total site: ~178 pages** from 6 templates + JSON data

---

## 10. Implementation Phases

### Phase 1 (This sprint — pre-launch):
1. Build router.php + .htaccess routing
2. Build 6 PHP templates
3. Build new/modified partials (lang-switcher, sample-cards, hreflang)
4. Create boards.json + translation files (hi.json, en.json)
5. Create chapter JSON files for CBSE + CG Board (Class 5-10, all subjects)
6. Generate hero chapter samples via Gemini (2-3 per subject)
7. Create coming-soon pages (Marathi, Telugu, Maharashtra, AP)
8. Update sitemap.xml with all new URLs
9. Rebuild Tailwind CSS
10. Test all routes

### Phase 2 (Post-launch, when data available):
- Add Maharashtra SSC board (Balbharati chapter names from your extracted PDFs)
- Add MP Board (when textbook data available)
- Add AP/Telangana Board (when SCERT data available)
- Add Marathi content for Maharashtra
- Add Telugu content for AP
- More blog articles in Hindi/English

### Phase 3 (Future):
- Additional state boards
- Bengali, Tamil, Kannada languages
- Chapter-level individual pages (shrutam.ai/hi/boards/cbse/class-10/science/chapter-1/)

---

## 11. Performance

- Router adds 1 JSON file read per request (~1-5ms on Hostinger SSD)
- PHP `json_decode()` on chapter files is fast (<1ms for 15-chapter files)
- Translation file loaded once per request
- Total overhead vs static PHP: ~5-10ms — negligible
- Can add PHP opcache on Hostinger for faster template compilation
- All pages still under 50KB HTML budget
