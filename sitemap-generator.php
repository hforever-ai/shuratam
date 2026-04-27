<?php
/**
 * Sitemap Generator for Shrutam.ai
 * Reads boards.json + subjects.json and generates sitemap.xml with all URLs.
 * Run: php sitemap-generator.php > sitemap.xml
 */

$baseUrl = 'https://shrutam.ai';

$boards = json_decode(file_get_contents(__DIR__ . '/content/boards.json'), true);
$subjects = json_decode(file_get_contents(__DIR__ . '/content/subjects.json'), true);

$urls = [];

// Helper to add URL
// $lastmod is optional ISO date string (YYYY-MM-DD); falls back to today.
function addUrl(&$urls, $loc, $priority, $changefreq = 'monthly', $lastmod = null) {
    $urls[] = [
        'loc'        => $loc,
        'priority'   => $priority,
        'changefreq' => $changefreq,
        'lastmod'    => $lastmod ?? date('Y-m-d'),
    ];
}

// Per-path lastmod override map (set explicit dates for stable pages so Google
// doesn't think every URL was just edited). Keys match the $loc passed to addUrl.
$lastmodOverrides = [
    '/privacy/' => '2026-03-01',
    '/terms/'   => '2026-03-01',
];

// ---- Existing Hinglish pages (root) ----
$hinglishPages = [
    ['/', 1.0, 'weekly'],
    ['/blind-mode/', 0.95, 'monthly'],
    ['/saavi/', 0.9, 'monthly'],
    ['/features/', 0.9, 'monthly'],
    ['/pricing/', 0.9, 'monthly'],
    ['/waitlist/', 0.9, 'weekly'],
    ['/faq/', 0.6, 'monthly'],
    ['/about/', 0.6, 'monthly'],
    ['/blog/', 0.7, 'weekly'],
    ['/contact/', 0.6, 'monthly'],
    ['/schools/', 0.6, 'monthly'],
    ['/parent-portal/', 0.6, 'monthly'],
    ['/privacy/', 0.3, 'yearly'],
    ['/terms/', 0.3, 'yearly'],
];

// Feature pages
$featurePages = [
    'zero-to-hero', 'ask-like-10', 'mother-tongue-learning', 'adaptive-learning',
    'revision-mode', 'photo-doubt-solver', 'mock-exams', 'spoken-english',
    'exam-notes', 'student-tracking', 'parent-portal', 'reel-mode'
];
foreach ($featurePages as $f) {
    $hinglishPages[] = ["/features/{$f}/", 0.8, 'monthly'];
}

// Class pages
for ($c = 5; $c <= 10; $c++) {
    $hinglishPages[] = ["/classes/class-{$c}/", 0.8, 'monthly'];
}

// Board pages
$hinglishPages[] = ['/boards/cg-board/', 0.8, 'monthly'];
$hinglishPages[] = ['/boards/cbse/', 0.8, 'monthly'];
$hinglishPages[] = ['/boards/mp-board/', 0.8, 'monthly'];

// Subject pages
foreach (array_keys($subjects) as $s) {
    $hinglishPages[] = ["/subjects/{$s}/", 0.75, 'monthly'];
}

// Blog pages
$blogPosts = [
    'photosynthesis-hindi', 'cg-board-class10-preparation',
    'blind-students-ai-education', 'adaptive-learning-kya-hai', 'zero-to-hero-learning'
];
foreach ($blogPosts as $b) {
    $hinglishPages[] = ["/blog/{$b}/", 0.7, 'monthly'];
}

foreach ($hinglishPages as $p) {
    addUrl($urls, $p[0], $p[1], $p[2]);
}

// ---- Language-prefixed pages ----
$activeLangs = ['hi', 'en'];
$comingSoonLangs = ['mr', 'te'];

// Shared pages per active language
$sharedPages = ['features', 'pricing', 'blind-mode', 'saavi', 'faq', 'about', 'waitlist', 'blog'];
foreach ($activeLangs as $lang) {
    addUrl($urls, "/{$lang}/", 1.0, 'weekly');
    foreach ($sharedPages as $page) {
        addUrl($urls, "/{$lang}/{$page}/", 0.7, 'monthly');
    }
}

// Coming soon language landing pages
foreach ($comingSoonLangs as $lang) {
    addUrl($urls, "/{$lang}/", 0.5, 'monthly');
}

// Board/class/subject pages per active board per supported language
foreach ($boards as $slug => $board) {
    if (($board['status'] ?? '') !== 'active') {
        // Coming soon board pages
        foreach ($board['languages'] ?? [] as $lang) {
            addUrl($urls, "/{$lang}/boards/{$slug}/", 0.5, 'monthly');
        }
        continue;
    }

    foreach ($board['languages'] as $lang) {
        if (!in_array($lang, $activeLangs)) continue;

        // Board page
        addUrl($urls, "/{$lang}/boards/{$slug}/", 0.9, 'monthly');

        // Class pages
        foreach ($board['classes'] as $classNum) {
            addUrl($urls, "/{$lang}/boards/{$slug}/class-{$classNum}/", 0.85, 'monthly');

            // Subject pages
            foreach ($board['subjects'] as $subjectSlug) {
                // Check if chapter file exists
                $hasHero = file_exists(__DIR__ . "/content/samples/{$slug}-{$classNum}-{$subjectSlug}-samples.json");
                $priority = $hasHero ? 0.8 : 0.7;
                addUrl($urls, "/{$lang}/boards/{$slug}/class-{$classNum}/{$subjectSlug}/", $priority, 'monthly');
            }
        }
    }
}

// Apply lastmod overrides for stable pages
foreach ($urls as &$u) {
    if (isset($lastmodOverrides[$u['loc']])) {
        $u['lastmod'] = $lastmodOverrides[$u['loc']];
    }
}
unset($u);

// ---- Output XML ----
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($urls as $u) {
    echo "  <url>\n";
    echo "    <loc>{$baseUrl}{$u['loc']}</loc>\n";
    echo "    <lastmod>{$u['lastmod']}</lastmod>\n";
    echo "    <priority>{$u['priority']}</priority>\n";
    echo "    <changefreq>{$u['changefreq']}</changefreq>\n";
    echo "  </url>\n";
}
echo '</urlset>' . "\n";
