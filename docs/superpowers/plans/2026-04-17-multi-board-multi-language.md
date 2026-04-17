# Multi-Board Multi-Language Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Extend the Shrutam.ai marketing site from 44 Hinglish-only pages to ~178 pages across CBSE (Hindi+English) + CG Board (Hindi), with PHP router, JSON data, language-aware templates, SAAVI voice sample cards, and coming-soon pages for Marathi/Telugu/other boards.

**Architecture:** Single `router.php` handles all `/{lang}/...` URLs, loads JSON chapter data + translation strings, renders via 6 PHP templates. Existing 44 Hinglish pages untouched. Gemini generates chapter names + SAAVI voice samples as JSON files.

**Tech Stack:** PHP 8+, Tailwind CSS v4, JSON data files, Gemini Flash 2.5 (for content generation)

**Spec:** `docs/superpowers/specs/2026-04-17-multi-board-multi-language-design.md`

---

## File Map

```
shrutam-website/
├── router.php                              # NEW — language-aware route dispatcher
├── content/
│   ├── boards.json                         # NEW — board metadata
│   ├── subjects.json                       # NEW — subject metadata (names, slugs per language)
│   ├── chapters/
│   │   ├── cbse-5-science.json             # NCERT Class 5 Science chapters
│   │   ├── cbse-5-mathematics.json
│   │   ├── cbse-5-hindi.json
│   │   ├── cbse-5-social-science.json
│   │   ├── cbse-5-english.json
│   │   ├── ... (cbse-6 through cbse-10 = 30 files)
│   │   ├── cg-5-science.json              # CG Board (copies of CBSE with board branding)
│   │   └── ... (cg-6 through cg-10 = 30 files)
│   │                                       # Total: 60 chapter JSON files
│   ├── samples/
│   │   ├── cbse-10-science-samples.json    # Hero chapter SAAVI samples
│   │   ├── cbse-10-mathematics-samples.json
│   │   ├── cbse-9-science-samples.json
│   │   ├── ... (~20 sample files for high-priority class/subjects)
│   │   ├── cg-10-science-samples.json
│   │   └── ... (~20 CG sample files)
│   └── translations/
│       ├── hi.json                         # Hindi UI strings
│       └── en.json                         # English UI strings
├── templates/
│   ├── homepage.php                        # Language-aware homepage
│   ├── board-page.php                      # Board landing template
│   ├── class-page.php                      # Class overview (5 subjects)
│   ├── subject-page.php                    # Chapter list + hero samples
│   ├── shared-page.php                     # Features, pricing, FAQ, etc.
│   └── coming-soon.php                     # Marathi/Telugu/future boards
├── partials/
│   ├── head.php                            # MODIFIED — accept $lang, include hreflang
│   ├── nav.php                             # MODIFIED — add lang switcher, Class 5
│   ├── footer.php                          # MODIFIED — use $t for translated strings
│   ├── lang-switcher.php                   # NEW — language toggle pills
│   ├── sample-cards.php                    # NEW — renders SAAVI content blocks
│   ├── hreflang.php                        # NEW — generates hreflang link tags
│   └── waitlist-form.php                   # EXISTING (unchanged)
├── .htaccess                               # MODIFIED — add router rewrite rules
└── (all existing 44 Hinglish pages unchanged)
```

---

## Task 1: Content Data — boards.json + subjects.json + translations

**Files:**
- Create: `content/boards.json`
- Create: `content/subjects.json`
- Create: `content/translations/hi.json`
- Create: `content/translations/en.json`

- [ ] **Step 1: Create content/ directory structure**

```bash
cd /Users/ajayagrawal/Documents/projects/shrutam-website
mkdir -p content/chapters content/samples content/translations
```

- [ ] **Step 2: Create content/boards.json**

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
    "exam_pattern": { "theory": 80, "internal": 20, "pass_marks": 33 },
    "status": "active"
  },
  "cg-board": {
    "name": { "hi": "CG Board", "en": "CG Board" },
    "full_name": { "hi": "छत्तीसगढ़ माध्यमिक शिक्षा मंडल", "en": "Chhattisgarh Board of Secondary Education" },
    "slug": "cg-board",
    "languages": ["hi"],
    "classes": [5, 6, 7, 8, 9, 10],
    "subjects": ["science", "mathematics", "hindi", "social-science", "english"],
    "textbook_source": "NCERT",
    "exam_pattern": { "theory": 75, "practical": 25, "pass_marks": 33 },
    "cities": ["Raipur", "Bilaspur", "Durg", "Korba", "Jagdalpur", "Bastar", "Rajnandgaon", "Ambikapur"],
    "status": "active"
  },
  "maharashtra-ssc": {
    "name": { "en": "Maharashtra SSC", "mr": "महाराष्ट्र एसएससी", "hi": "महाराष्ट्र SSC" },
    "full_name": { "mr": "महाराष्ट्र राज्य माध्यमिक व उच्च माध्यमिक शिक्षण मंडळ" },
    "slug": "maharashtra-ssc",
    "languages": ["mr"],
    "status": "coming_soon"
  },
  "mp-board": {
    "name": { "hi": "MP Board", "en": "MP Board" },
    "full_name": { "hi": "मध्य प्रदेश माध्यमिक शिक्षा मंडल" },
    "slug": "mp-board",
    "languages": ["hi"],
    "status": "coming_soon"
  },
  "ap-board": {
    "name": { "en": "AP Board", "te": "ఏపీ బోర్డు" },
    "full_name": { "te": "ఆంధ్రప్రదేశ్ రాష్ట్ర విద్యా పరిశోధన శిక్షణ సంస్థ" },
    "slug": "ap-board",
    "languages": ["te"],
    "status": "coming_soon"
  }
}
```

- [ ] **Step 3: Create content/subjects.json**

```json
{
  "science": {
    "slug": "science",
    "name": { "hi": "विज्ञान", "en": "Science" },
    "icon": "🔬"
  },
  "mathematics": {
    "slug": "mathematics",
    "name": { "hi": "गणित", "en": "Mathematics" },
    "icon": "📐"
  },
  "hindi": {
    "slug": "hindi",
    "name": { "hi": "हिंदी", "en": "Hindi" },
    "icon": "📖"
  },
  "social-science": {
    "slug": "social-science",
    "name": { "hi": "सामाजिक विज्ञान", "en": "Social Science" },
    "icon": "🌍"
  },
  "english": {
    "slug": "english",
    "name": { "hi": "अंग्रेज़ी", "en": "English" },
    "icon": "🗣️"
  }
}
```

- [ ] **Step 4: Create content/translations/hi.json**

Full Hindi UI strings file — all nav, hero, subject page, common, sample block, and footer strings as specified in the design spec Section 4.

- [ ] **Step 5: Create content/translations/en.json**

Full English UI strings file — same structure as hi.json with English values:
```json
{
  "nav": {
    "features": "Features",
    "blind_mode": "Blind Mode",
    "classes": "Classes",
    "boards": "Boards",
    "pricing": "Pricing",
    "blog": "Blog",
    "for_schools": "For Schools",
    "join_waitlist": "Join Waitlist Free →"
  },
  "hero": {
    "tagline": "Listen and Learn.",
    "headline": "Learning is Now as Easy as Listening",
    "body": "SAAVI didi is your own AI teacher.\nIn your language. At 2 AM too. Without judging.",
    "cta_waitlist": "Join Free Waitlist →",
    "cta_demo": "Try SAAVI Demo"
  },
  "subject_page": {
    "chapters_title": "Chapters",
    "hero_chapter_label": "Here's how SAAVI teaches this:",
    "all_chapters_cta": "Learn the full chapter with SAAVI →",
    "board_exam_weight": "Board Exam",
    "marks": "marks"
  },
  "common": {
    "class": "Class",
    "coming_soon": "Coming Soon",
    "join_waitlist": "Join Waitlist",
    "free_forever": "Free Forever",
    "per_month": "per month",
    "languages_available": "Languages Available",
    "board_exam_pattern": "Exam Pattern"
  },
  "sample_blocks": {
    "example": "Example",
    "misconception": "Misconception",
    "activity": "Activity",
    "key_point": "Key Point",
    "try_in_app": "Try in app →"
  },
  "footer": {
    "tagline": "\"Listen and Learn.\"",
    "blind_mode_free": "♿ Blind Mode — FREE Forever",
    "copyright": "© 2026 Aarambha · Kishyam AI Pvt Ltd · shrutam.ai",
    "product_of": "A product of Aarambha (आरम्भ)"
  }
}
```

- [ ] **Step 6: Commit**

```bash
git add content/boards.json content/subjects.json content/translations/
git commit -m "feat: add boards, subjects, and translation data (hi + en)"
```

---

## Task 2: Chapter JSON Data — CBSE + CG Board, Class 5-10

**Files:**
- Create: 60 JSON files in `content/chapters/`

This is a data generation task. We need chapter names (Hindi + English) for:
- CBSE: 6 classes × 5 subjects = 30 files
- CG Board: 6 classes × 5 subjects = 30 files (same data as CBSE, different board field)

- [ ] **Step 1: Create a Python script to generate chapter JSON files**

Create `scripts/generate_chapters.py` that:
1. Contains the NCERT chapter names for Class 5-10, all 5 subjects (English names hardcoded from the existing class pages in the site)
2. Outputs JSON files in the format: `content/chapters/{board}-{class}-{subject}.json`
3. For Class 6-10 Science and Maths: pull chapter names from the existing site pages (already accurate)
4. For Class 5 and other subjects (Hindi, Social Science, English): include the NCERT chapter names
5. Generates both CBSE and CG Board versions (same chapters, different board field)

The script should output files like:
```json
{
  "board": "cbse",
  "class": 10,
  "subject": "science",
  "total_chapters": 13,
  "chapters": [
    { "number": 1, "name_hi": "रासायनिक अभिक्रियाएँ एवं समीकरण", "name_en": "Chemical Reactions and Equations", "is_hero": true },
    { "number": 2, "name_hi": "अम्ल, क्षारक एवं लवण", "name_en": "Acids, Bases and Salts", "is_hero": false },
    ...
  ]
}
```

Mark the first 2-3 chapters per file as `"is_hero": true`.

- [ ] **Step 2: Run the script**

```bash
cd /Users/ajayagrawal/Documents/projects/shrutam-website
python3 scripts/generate_chapters.py
```

Expected: 60 JSON files created in `content/chapters/`.

- [ ] **Step 3: Verify file count and spot-check**

```bash
ls content/chapters/ | wc -l  # should be 60
cat content/chapters/cbse-10-science.json | python3 -m json.tool | head -20
```

- [ ] **Step 4: Commit**

```bash
git add content/chapters/ scripts/generate_chapters.py
git commit -m "feat: add NCERT chapter data — CBSE + CG Board, Class 5-10, all subjects"
```

---

## Task 3: Hero Chapter Samples — SAAVI Voice Content

**Files:**
- Create: ~20 JSON files in `content/samples/`
- Create: `scripts/generate_samples.py`

Generate SAAVI-style sample content for hero chapters. Focus on Class 9-10 Science and Maths first (highest SEO value).

- [ ] **Step 1: Create scripts/generate_samples.py**

Python script that:
1. Reads each chapter JSON file
2. For chapters marked `is_hero: true`, generates SAAVI voice sample content
3. Uses the Gemini prompt template from the spec (Section 11)
4. Can be run with `--mock` flag to generate placeholder content without Gemini API (for testing the template system)
5. Outputs to `content/samples/{board}-{class}-{subject}-samples.json`

The script should support both mock and Gemini modes:
- `python3 scripts/generate_samples.py --mock` — generates placeholder samples
- `python3 scripts/generate_samples.py --gemini` — calls Gemini API (requires GEMINI_API_KEY env var)

Mock output format:
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
          { "type": "example", "heading": "उदाहरण", "content": "...", "icon": "lightbulb" },
          { "type": "misconception", "heading": "गलतफहमी", "wrong": "...", "correct": "...", "icon": "triangle-alert" },
          { "type": "activity", "heading": "गतिविधि", "content": "...", "cta": "ऐप में देखो →", "icon": "flask-conical" }
        ],
        "en": [
          { "type": "example", "heading": "Example", "content": "...", "icon": "lightbulb" },
          { "type": "misconception", "heading": "Misconception", "wrong": "...", "correct": "...", "icon": "triangle-alert" },
          { "type": "activity", "heading": "Activity", "content": "...", "cta": "Try in app →", "icon": "flask-conical" }
        ]
      }
    }
  ]
}
```

- [ ] **Step 2: Run mock generation**

```bash
python3 scripts/generate_samples.py --mock
ls content/samples/ | wc -l
```

Expected: ~20 sample JSON files.

- [ ] **Step 3: Commit**

```bash
git add content/samples/ scripts/generate_samples.py
git commit -m "feat: add hero chapter sample data (mock) — SAAVI voice blocks"
```

*Note: Real Gemini-generated samples will replace mock data later via `--gemini` flag.*

---

## Task 4: Router — router.php + .htaccess

**Files:**
- Create: `router.php`
- Modify: `.htaccess`

- [ ] **Step 1: Create router.php**

```php
<?php
/**
 * Shrutam.ai Multi-Language Router
 *
 * Handles all /{lang}/... URLs.
 * Parses route, loads JSON data + translations, renders template.
 */

// ---- Parse input ----
$lang = $_GET['lang'] ?? '';
$path = trim($_GET['path'] ?? '', '/');

// Validate language
$validLangs = ['hi', 'en', 'mr', 'te'];
if (!in_array($lang, $validLangs)) {
    http_response_code(404);
    include 'index.php';
    exit;
}

// ---- Load translation strings ----
$transFile = __DIR__ . "/content/translations/{$lang}.json";
if (!file_exists($transFile)) {
    // Language exists but no translation file yet → coming soon
    $t = json_decode(file_get_contents(__DIR__ . '/content/translations/en.json'), true);
} else {
    $t = json_decode(file_get_contents($transFile), true);
}

// ---- Load boards + subjects data ----
$allBoards = json_decode(file_get_contents(__DIR__ . '/content/boards.json'), true);
$allSubjects = json_decode(file_get_contents(__DIR__ . '/content/subjects.json'), true);

// ---- Route matching ----
$segments = $path ? explode('/', $path) : [];

// Helper: get board-specific lang code for HTML
$htmlLang = ['hi' => 'hi', 'en' => 'en', 'mr' => 'mr', 'te' => 'te'][$lang] ?? 'en';

// /{lang}/ → homepage
if (empty($segments) || $segments[0] === '') {
    // Coming soon check for mr/te
    if (in_array($lang, ['mr', 'te'])) {
        $pageType = 'coming-soon-lang';
        include __DIR__ . '/templates/coming-soon.php';
        exit;
    }
    include __DIR__ . '/templates/homepage.php';
    exit;
}

// /{lang}/boards/{board}/...
if ($segments[0] === 'boards' && isset($segments[1])) {
    $boardSlug = $segments[1];

    if (!isset($allBoards[$boardSlug])) {
        http_response_code(404);
        include __DIR__ . '/templates/coming-soon.php';
        exit;
    }

    $board = $allBoards[$boardSlug];

    // Coming soon board
    if ($board['status'] === 'coming_soon') {
        $pageType = 'coming-soon-board';
        include __DIR__ . '/templates/coming-soon.php';
        exit;
    }

    // Check language is valid for this board
    if (!in_array($lang, $board['languages'])) {
        http_response_code(404);
        $pageType = 'coming-soon-lang';
        include __DIR__ . '/templates/coming-soon.php';
        exit;
    }

    // /{lang}/boards/{board}/ → board page
    if (!isset($segments[2])) {
        include __DIR__ . '/templates/board-page.php';
        exit;
    }

    // /{lang}/boards/{board}/class-{n}/...
    if (preg_match('/^class-(\d+)$/', $segments[2], $m)) {
        $classNum = (int)$m[1];

        if ($classNum < 5 || $classNum > 10) {
            http_response_code(404);
            include __DIR__ . '/templates/coming-soon.php';
            exit;
        }

        // /{lang}/boards/{board}/class-{n}/ → class page
        if (!isset($segments[3])) {
            include __DIR__ . '/templates/class-page.php';
            exit;
        }

        // /{lang}/boards/{board}/class-{n}/{subject}/ → subject page
        $subjectSlug = $segments[3];
        if (!isset($allSubjects[$subjectSlug])) {
            http_response_code(404);
            include __DIR__ . '/templates/coming-soon.php';
            exit;
        }

        $subject = $allSubjects[$subjectSlug];

        // Load chapter data
        $chapterFile = __DIR__ . "/content/chapters/{$boardSlug}-{$classNum}-{$subjectSlug}.json";
        $chapters = file_exists($chapterFile)
            ? json_decode(file_get_contents($chapterFile), true)
            : null;

        // Load sample data (may not exist)
        $sampleFile = __DIR__ . "/content/samples/{$boardSlug}-{$classNum}-{$subjectSlug}-samples.json";
        $samples = file_exists($sampleFile)
            ? json_decode(file_get_contents($sampleFile), true)
            : null;

        include __DIR__ . '/templates/subject-page.php';
        exit;
    }
}

// /{lang}/{shared-page}/ → shared page
$sharedPages = ['features', 'pricing', 'blind-mode', 'saavi', 'faq', 'about', 'waitlist', 'blog'];
if (in_array($segments[0], $sharedPages)) {
    $pageType = $segments[0];
    include __DIR__ . '/templates/shared-page.php';
    exit;
}

// 404 fallback
http_response_code(404);
include 'index.php';
```

- [ ] **Step 2: Update .htaccess — add router rewrite rules**

Add BEFORE the existing clean URL rules:

```apache
# Multi-language router — route /{lang}/... to router.php
RewriteCond %{REQUEST_URI} ^/(hi|en|mr|te)(/.*)?$
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(hi|en|mr|te)(/(.*))?$ router.php?lang=$1&path=$3 [L,QSA]
```

- [ ] **Step 3: Test routing locally**

```bash
cd /Users/ajayagrawal/Documents/projects/shrutam-website
php -S localhost:8000
```

Test: `curl -s -o /dev/null -w "%{http_code}" http://localhost:8000/hi/` → should return 200 (or 500 if template not yet created — that's expected at this stage).

- [ ] **Step 4: Commit**

```bash
git add router.php .htaccess
git commit -m "feat: add multi-language router + htaccess rewrite rules"
```

---

## Task 5: New Partials — lang-switcher, sample-cards, hreflang

**Files:**
- Create: `partials/lang-switcher.php`
- Create: `partials/sample-cards.php`
- Create: `partials/hreflang.php`

- [ ] **Step 1: Create partials/lang-switcher.php**

Takes `$lang`, `$availableLangs` (array), and `$currentPath` (current URL path without lang prefix). Renders pill-style language toggle.

```php
<?php
/**
 * Language Switcher
 * Renders language pills in nav.
 * Expects: $lang (current), $availableLangs (array), $currentPath (path without lang prefix)
 */
$langLabels = [
    'hi' => 'हिंदी',
    'en' => 'English',
    'mr' => 'मराठी',
    'te' => 'తెలుగు',
    'hinglish' => 'Hinglish',
];
?>
<div class="flex items-center gap-1" role="navigation" aria-label="Language switcher">
  <!-- Hinglish (root) always available -->
  <a href="/<?= htmlspecialchars($currentPath) ?>"
     class="pill text-xs <?= empty($lang) ? 'active' : '' ?>"
     style="min-height: 36px; padding: 0.25rem 0.75rem;">
    Hinglish
  </a>
  <?php foreach ($availableLangs as $l): ?>
    <a href="/<?= $l ?>/<?= htmlspecialchars($currentPath) ?>"
       class="pill text-xs <?= $lang === $l ? 'active' : '' ?>"
       style="min-height: 36px; padding: 0.25rem 0.75rem;"
       hreflang="<?= $l ?>">
      <?= $langLabels[$l] ?? $l ?>
    </a>
  <?php endforeach; ?>
</div>
```

- [ ] **Step 2: Create partials/sample-cards.php**

Takes `$blocks` array and renders SAAVI-style content cards.

```php
<?php
/**
 * SAAVI Sample Content Cards
 * Renders example, misconception, activity blocks from samples JSON.
 * Expects: $blocks (array of block objects), $t (translations)
 */
$iconMap = [
    'example' => '💡',
    'misconception' => '⚠️',
    'activity' => '🔬',
    'key_point' => '✅',
    'definition' => '🎯',
];

$colorMap = [
    'example' => 'var(--success)',
    'misconception' => 'var(--error)',
    'activity' => 'var(--primary-light)',
    'key_point' => 'var(--primary)',
    'definition' => 'var(--accent)',
];

$bgMap = [
    'example' => 'var(--success-bg)',
    'misconception' => 'var(--error-bg)',
    'activity' => 'var(--info-bg)',
    'key_point' => 'var(--primary-glow)',
    'definition' => 'var(--accent-glow)',
];
?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
  <?php foreach ($blocks as $block): ?>
    <?php
      $type = $block['type'];
      $icon = $iconMap[$type] ?? '📌';
      $color = $colorMap[$type] ?? 'var(--primary-light)';
      $bg = $bgMap[$type] ?? 'var(--bg-elevated)';
      $label = $t['sample_blocks'][$type] ?? ucfirst($type);
    ?>
    <div class="card p-5 animate-on-scroll" style="border-left: 3px solid <?= $color ?>; background: <?= $bg ?>;">
      <div class="flex items-center gap-2 mb-3">
        <span class="text-xl"><?= $icon ?></span>
        <span class="text-sm font-heading font-bold" style="color: <?= $color ?>;"><?= htmlspecialchars($label) ?></span>
      </div>

      <?php if ($type === 'misconception' && isset($block['wrong'])): ?>
        <p class="text-sm mb-2" style="color: var(--error);">❌ <?= htmlspecialchars($block['wrong']) ?></p>
        <p class="text-sm" style="color: var(--success);">✅ <?= htmlspecialchars($block['correct']) ?></p>
      <?php else: ?>
        <p class="text-sm" style="color: var(--text-body);"><?= htmlspecialchars($block['content'] ?? $block['heading'] ?? '') ?></p>
      <?php endif; ?>

      <?php if (isset($block['cta'])): ?>
        <p class="text-xs mt-3 font-bold" style="color: var(--accent);"><?= htmlspecialchars($block['cta']) ?></p>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
</div>
```

- [ ] **Step 3: Create partials/hreflang.php**

Takes `$lang`, `$availableLangs`, `$currentPath`. Outputs `<link>` tags.

```php
<?php
/**
 * Hreflang Tags
 * Expects: $availableLangs (array), $currentPath (path without lang prefix)
 */
$baseUrl = 'https://shrutam.ai';
?>
<!-- Hinglish (default / root) -->
<link rel="alternate" hreflang="x-default" href="<?= $baseUrl ?>/<?= htmlspecialchars($currentPath) ?>">
<?php foreach ($availableLangs as $l): ?>
<link rel="alternate" hreflang="<?= $l ?>" href="<?= $baseUrl ?>/<?= $l ?>/<?= htmlspecialchars($currentPath) ?>">
<?php endforeach; ?>
```

- [ ] **Step 4: Commit**

```bash
git add partials/lang-switcher.php partials/sample-cards.php partials/hreflang.php
git commit -m "feat: add lang switcher, SAAVI sample cards, hreflang partials"
```

---

## Task 6: Modify Existing Partials — head.php, nav.php, footer.php

**Files:**
- Modify: `partials/head.php`
- Modify: `partials/nav.php`
- Modify: `partials/footer.php`

- [ ] **Step 1: Update partials/head.php**

Add support for `$lang` and `$availableLangs` variables. When `$lang` is set (routed pages), set `<html lang="...">` accordingly and include hreflang tags. When not set (existing Hinglish pages), keep `lang="hi-IN"` as before.

Key changes:
- `<html lang="<?= $htmlLang ?? 'hi-IN' ?>" data-theme="navy">`
- Add `<?php if (isset($availableLangs)): include 'partials/hreflang.php'; endif; ?>` inside `<head>`

- [ ] **Step 2: Update partials/nav.php**

Add language switcher and Class 5 to dropdown:
- Insert `<?php if (isset($lang) && isset($availableLangs)): include __DIR__ . '/lang-switcher.php'; endif; ?>` next to theme switcher
- Add `<a href="/classes/class-5/">Class 5</a>` to classes dropdown
- Use `$t` for nav labels when available, fall back to English

- [ ] **Step 3: Update partials/footer.php**

When `$t` is set, use translated footer strings. When not set (existing pages), keep current hardcoded text. This is a graceful fallback — existing pages work unchanged.

- [ ] **Step 4: Test existing pages still work**

```bash
php -S localhost:8000
curl -s -o /dev/null -w "%{http_code}" http://localhost:8000/  # should be 200
curl -s -o /dev/null -w "%{http_code}" http://localhost:8000/pricing/  # should be 200
```

- [ ] **Step 5: Commit**

```bash
git add partials/head.php partials/nav.php partials/footer.php
git commit -m "feat: update partials — lang support, hreflang, Class 5, translated strings"
```

---

## Task 7: Templates — subject-page.php + class-page.php + board-page.php

**Files:**
- Create: `templates/subject-page.php`
- Create: `templates/class-page.php`
- Create: `templates/board-page.php`

- [ ] **Step 1: Create templates/subject-page.php**

The main template. Receives from router: `$lang`, `$board`, `$boardSlug`, `$classNum`, `$subject`, `$chapters`, `$samples`, `$t`, `$allBoards`, `$htmlLang`.

Renders:
1. SEO head with dynamic title: `{Subject name} | {Board} {$t['common']['class']} {$classNum} | Shrutam SAAVI`
2. BreadcrumbList + Course schema
3. Nav with lang switcher
4. Hero section: board badge, class, subject
5. Chapter list: all chapters as cards with number badge + name in `$lang`
6. Hero chapters: expanded with sample blocks via `partials/sample-cards.php`
7. Non-hero chapters: name only with "Learn in app" CTA
8. Bottom CTA with waitlist link
9. Footer

The template uses `$chapters['chapters']` array. For each chapter, check `is_hero` flag. If true AND `$samples` exists with matching `chapter_number`, render the sample blocks.

Chapter name is read as `$ch['name_' . $lang]` — falls back to `name_en` if language key doesn't exist.

- [ ] **Step 2: Create templates/class-page.php**

Receives: `$lang`, `$board`, `$boardSlug`, `$classNum`, `$t`, `$allSubjects`, `$htmlLang`.

Renders:
1. SEO: `{Board} {$t['common']['class']} {$classNum} | Shrutam SAAVI`
2. 5 subject cards in grid, each with: icon, subject name in `$lang`, chapter count (loaded from chapter JSON), link to subject page
3. Board badge + exam pattern info
4. CTA

- [ ] **Step 3: Create templates/board-page.php**

Receives: `$lang`, `$board`, `$boardSlug`, `$t`, `$htmlLang`.

Renders:
1. SEO: `{Board full name} | Shrutam SAAVI`
2. Board overview: name, exam pattern, textbook source
3. Cities (for CG Board — from `$board['cities']`)
4. Class pills (5-10) linking to class pages
5. Subject overview cards
6. CTA

- [ ] **Step 4: Test the board → class → subject flow**

```bash
php -S localhost:8000
# Test full flow:
curl -s -o /dev/null -w "%{http_code}" http://localhost:8000/hi/boards/cbse/
curl -s -o /dev/null -w "%{http_code}" http://localhost:8000/hi/boards/cbse/class-10/
curl -s -o /dev/null -w "%{http_code}" http://localhost:8000/hi/boards/cbse/class-10/science/
```

All should return 200.

- [ ] **Step 5: Commit**

```bash
git add templates/subject-page.php templates/class-page.php templates/board-page.php
git commit -m "feat: add board, class, subject templates — data-driven from JSON"
```

---

## Task 8: Templates — homepage.php + shared-page.php + coming-soon.php

**Files:**
- Create: `templates/homepage.php`
- Create: `templates/shared-page.php`
- Create: `templates/coming-soon.php`

- [ ] **Step 1: Create templates/homepage.php**

Language-aware homepage. Same structure as existing `index.php` (11 sections) but text pulled from `$t` translation object. Uses `$t['hero']['headline']`, `$t['hero']['body']`, etc.

For MVP: create a simplified version with hero, problem stats, features preview, pricing preview, and CTA — not all 11 sections. The existing Hinglish homepage at `/` has the full version; the `/hi/` and `/en/` versions are streamlined.

- [ ] **Step 2: Create templates/shared-page.php**

Dispatcher that loads the right content based on `$pageType`. For MVP: render simplified versions of features, pricing, FAQ, blind-mode, saavi, about, waitlist, and blog pages with translated UI strings.

Structure:
```php
<?php
switch ($pageType) {
    case 'features': /* simplified features grid with $t */ break;
    case 'pricing': /* pricing cards with $t */ break;
    case 'faq': /* FAQ accordion with $t */ break;
    case 'blind-mode': /* blind mode highlights with $t */ break;
    case 'saavi': /* SAAVI intro with $t */ break;
    case 'about': /* about with $t */ break;
    case 'waitlist': /* waitlist form with $t */ break;
    case 'blog': /* blog listing with $t */ break;
}
?>
```

Each case renders a complete page with SEO head, nav, content, footer.

- [ ] **Step 3: Create templates/coming-soon.php**

Handles: Marathi/Telugu landing pages, coming-soon boards. Shows:
- Language/board name in native script
- "Coming Soon" badge
- What to expect (features preview)
- Waitlist form
- Link to active Hindi/English version

- [ ] **Step 4: Test coming soon + shared pages**

```bash
curl -s -o /dev/null -w "%{http_code}" http://localhost:8000/mr/     # Marathi coming soon
curl -s -o /dev/null -w "%{http_code}" http://localhost:8000/te/     # Telugu coming soon
curl -s -o /dev/null -w "%{http_code}" http://localhost:8000/hi/features/
curl -s -o /dev/null -w "%{http_code}" http://localhost:8000/en/pricing/
```

- [ ] **Step 5: Commit**

```bash
git add templates/
git commit -m "feat: add homepage, shared page, coming soon templates"
```

---

## Task 9: Dynamic Sitemap + Final Build

**Files:**
- Create: `sitemap-generator.php` (or update `sitemap.xml` manually)
- Modify: `assets/css/main.css` (rebuild)

- [ ] **Step 1: Create sitemap-generator.php**

PHP script that reads `boards.json` + chapter files and generates a complete `sitemap.xml` with all URLs. Run once, output to `sitemap.xml`.

```bash
php sitemap-generator.php > sitemap.xml
```

Generates URLs for:
- Root Hinglish pages (existing, priority 1.0-0.3)
- `/{lang}/` homepage variants (priority 1.0)
- `/{lang}/boards/{board}/` (priority 0.9)
- `/{lang}/boards/{board}/class-{n}/` (priority 0.85)
- `/{lang}/boards/{board}/class-{n}/{subject}/` (priority 0.8)
- `/{lang}/{shared-page}/` (priority 0.7)
- Coming soon pages (priority 0.5)

- [ ] **Step 2: Run sitemap generator**

```bash
php sitemap-generator.php > sitemap.xml
wc -l sitemap.xml  # should be 200+ lines
```

- [ ] **Step 3: Rebuild Tailwind CSS**

```bash
npm run build
```

- [ ] **Step 4: Full route test**

```bash
php -S localhost:8000 &
# Test a representative set of routes
for url in "/" "/hi/" "/en/" "/mr/" "/te/" \
  "/hi/boards/cbse/" "/hi/boards/cg-board/" "/hi/boards/maharashtra-ssc/" \
  "/hi/boards/cbse/class-10/" "/hi/boards/cbse/class-5/" \
  "/hi/boards/cbse/class-10/science/" "/en/boards/cbse/class-10/science/" \
  "/hi/boards/cg-board/class-10/science/" \
  "/hi/features/" "/en/pricing/" "/hi/faq/" "/hi/waitlist/" \
  "/blind-mode/" "/pricing/" "/faq/"; do
  code=$(curl -s -o /dev/null -w "%{http_code}" "http://localhost:8000${url}")
  echo "${code} ${url}"
done
kill %1
```

All should return 200.

- [ ] **Step 5: Commit and push**

```bash
git add sitemap.xml sitemap-generator.php assets/css/main.css
git commit -m "feat: dynamic sitemap + final Tailwind build — all routes tested"
git push origin main
```

---

## Summary

| Task | What | Key files | Commits |
|------|------|-----------|---------|
| 1 | Content data (boards, subjects, translations) | content/*.json | 1 |
| 2 | Chapter JSON data (60 files) | content/chapters/*.json | 1 |
| 3 | Hero chapter samples (mock) | content/samples/*.json | 1 |
| 4 | Router + .htaccess | router.php, .htaccess | 1 |
| 5 | New partials (lang-switcher, sample-cards, hreflang) | partials/*.php | 1 |
| 6 | Update existing partials | partials/head/nav/footer.php | 1 |
| 7 | Board + Class + Subject templates | templates/*.php | 1 |
| 8 | Homepage + Shared + Coming Soon templates | templates/*.php | 1 |
| 9 | Dynamic sitemap + final build | sitemap.xml, main.css | 1 |

**Total: 9 tasks, ~9 commits, ~90 files created/modified**
**Result: ~178 pages served from 6 templates + JSON data**

After this plan executes, the next step is replacing mock sample data with real Gemini-generated SAAVI voice content via `scripts/generate_samples.py --gemini`.
