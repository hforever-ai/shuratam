<?php
/**
 * Shrutam.ai Multi-Language Router
 * Handles all /{lang}/... URLs.
 * Parses route, loads JSON data + translations, renders template.
 */

// ---- Parse input ----
$lang = $_GET['lang'] ?? '';
$path = trim($_GET['path'] ?? '', '/');
$currentPath = $path ? $path . '/' : '';

// Validate language
$validLangs = ['hi', 'en', 'mr', 'te'];
if (!in_array($lang, $validLangs)) {
    http_response_code(404);
    include __DIR__ . '/index.php';
    exit;
}

// HTML lang attribute
$htmlLangMap = ['hi' => 'hi', 'en' => 'en', 'mr' => 'mr', 'te' => 'te'];
$htmlLang = $htmlLangMap[$lang] ?? 'en';

// ---- Load translation strings ----
$transFile = __DIR__ . "/content/translations/{$lang}.json";
if (file_exists($transFile)) {
    $t = json_decode(file_get_contents($transFile), true);
} else {
    $t = json_decode(file_get_contents(__DIR__ . '/content/translations/en.json'), true);
}

// ---- Load boards + subjects data ----
$allBoards = json_decode(file_get_contents(__DIR__ . '/content/boards.json'), true);
$allSubjects = json_decode(file_get_contents(__DIR__ . '/content/subjects.json'), true);

// ---- Route matching ----
$segments = $path ? explode('/', $path) : [];

// Default available languages for shared pages
$availableLangs = ['hi', 'en'];

// ===== /{lang}/ → homepage or coming soon =====
if (empty($segments) || (count($segments) === 1 && $segments[0] === '')) {
    if (in_array($lang, ['mr', 'te'])) {
        $pageType = 'coming-soon-lang';
        $comingSoonLang = $lang;
        include __DIR__ . '/templates/coming-soon.php';
        exit;
    }
    include __DIR__ . '/templates/homepage.php';
    exit;
}

// ===== /{lang}/boards/{board}/... =====
if ($segments[0] === 'boards' && isset($segments[1])) {
    $boardSlug = $segments[1];

    // Board not found
    if (!isset($allBoards[$boardSlug])) {
        http_response_code(404);
        $pageType = 'coming-soon-board';
        include __DIR__ . '/templates/coming-soon.php';
        exit;
    }

    $board = $allBoards[$boardSlug];
    $availableLangs = $board['languages'] ?? ['hi', 'en'];

    // Coming soon board
    if (($board['status'] ?? '') === 'coming_soon') {
        $pageType = 'coming-soon-board';
        include __DIR__ . '/templates/coming-soon.php';
        exit;
    }

    // Language not supported for this board
    if (!in_array($lang, $board['languages'] ?? [])) {
        http_response_code(404);
        $pageType = 'coming-soon-lang';
        $comingSoonLang = $lang;
        include __DIR__ . '/templates/coming-soon.php';
        exit;
    }

    // /{lang}/boards/{board}/ → board page
    if (!isset($segments[2]) || $segments[2] === '') {
        $currentPath = "boards/{$boardSlug}/";
        include __DIR__ . '/templates/board-page.php';
        exit;
    }

    // /{lang}/boards/{board}/class-{n}/...
    if (preg_match('/^class-(\d+)$/', $segments[2], $m)) {
        $classNum = (int)$m[1];

        if ($classNum < 5 || $classNum > 10) {
            http_response_code(404);
            $pageType = 'coming-soon-board';
            include __DIR__ . '/templates/coming-soon.php';
            exit;
        }

        // /{lang}/boards/{board}/class-{n}/ → class page
        if (!isset($segments[3]) || $segments[3] === '') {
            $currentPath = "boards/{$boardSlug}/class-{$classNum}/";
            include __DIR__ . '/templates/class-page.php';
            exit;
        }

        // /{lang}/boards/{board}/class-{n}/{subject}/ → subject page
        $subjectSlug = $segments[3];
        if (!isset($allSubjects[$subjectSlug])) {
            http_response_code(404);
            $pageType = 'coming-soon-board';
            include __DIR__ . '/templates/coming-soon.php';
            exit;
        }

        $subject = $allSubjects[$subjectSlug];
        $currentPath = "boards/{$boardSlug}/class-{$classNum}/{$subjectSlug}/";

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

// ===== /{lang}/{shared-page}/ → shared page =====
$sharedPages = [
    'features' => 'features',
    'pricing' => 'pricing',
    'blind-mode' => 'blind-mode',
    'saavi' => 'saavi',
    'faq' => 'faq',
    'about' => 'about',
    'waitlist' => 'waitlist',
    'blog' => 'blog',
];

if (isset($sharedPages[$segments[0]])) {
    $pageType = $sharedPages[$segments[0]];
    $currentPath = $segments[0] . '/';
    $availableLangs = ['hi', 'en'];
    include __DIR__ . '/templates/shared-page.php';
    exit;
}

// ===== 404 fallback =====
http_response_code(404);
include __DIR__ . '/index.php';
