<?php
/**
 * Language Switcher — dropdown
 * Auto-detects current page and generates correct switch URLs.
 * Handles: routed pages (/hi/...), Hinglish root pages (/...), nested pages
 */
$langLabels = [
    'hi' => 'हिंदी',
    'en' => 'English',
    'mr' => 'मराठी',
    'te' => 'తెలుగు',
];

$currentLang = $lang ?? '';
$availableLangs = $availableLangs ?? ['hi', 'en'];

// Current label for the dropdown button
if ($currentLang === 'hi') {
    $currentLabel = 'हिंदी';
} elseif ($currentLang === 'en') {
    $currentLabel = 'English';
} elseif ($currentLang) {
    $currentLabel = $langLabels[$currentLang] ?? $currentLang;
} else {
    $currentLabel = 'हिंदी-EN';
}

// --- Detect the switchable path ---
$uri = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');

// Strip lang prefix to get the raw page path
if (preg_match('#^(hi|en|mr|te)(/(.*))?$#', $uri, $m)) {
    $rawPath = isset($m[3]) ? trim($m[3], '/') : '';
} else {
    $rawPath = $uri;
}

// Pages that exist in the multi-language router (shared pages)
$routedPages = ['features', 'pricing', 'blind-mode', 'saavi', 'faq', 'about', 'waitlist', 'blog'];

// Determine switch path based on what kind of page we're on
$segments = $rawPath ? explode('/', $rawPath) : [];
$firstSegment = $segments[0] ?? '';

if ($rawPath === '') {
    // Homepage
    $switchPath = '';
} elseif (in_array($firstSegment, $routedPages) && count($segments) === 1) {
    // Top-level shared page: /features/, /pricing/, /blog/ etc.
    $switchPath = $firstSegment . '/';
} elseif ($firstSegment === 'boards') {
    // Board pages: /boards/cbse/, /boards/cbse/class-10/, /boards/cbse/class-10/science/
    $switchPath = $rawPath . '/';
} elseif (in_array($firstSegment, $routedPages) && count($segments) > 1) {
    // Nested page under a shared route: /features/ask-like-10/, /blog/photosynthesis-hindi/
    // These don't have individual lang versions — switch to parent
    $switchPath = $firstSegment . '/';
} else {
    // Unknown page (classes/, subjects/, contact/, privacy/, etc.)
    // These only exist in Hinglish — switch to lang homepage
    $switchPath = '';
}
?>
<div class="relative group">
  <button class="flex items-center gap-1 text-sm hover:text-[var(--accent)]" style="color: var(--text-body);" aria-expanded="false" aria-haspopup="true">
    🌐 <?= $currentLabel ?> <span aria-hidden="true">▾</span>
  </button>
  <div class="absolute top-full right-0 mt-2 py-2 min-w-[130px] rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200"
       style="background: var(--bg-surface); border: 1px solid var(--border-subtle); box-shadow: var(--shadow); z-index: 50;">
    <!-- Hinglish (root) -->
    <a href="/<?= htmlspecialchars($switchPath) ?>"
       class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]"
       style="color: <?= empty($currentLang) ? 'var(--accent); font-weight:700' : 'var(--text-body)' ?>;">
      <?= empty($currentLang) ? '✓ ' : '  ' ?>हिंदी-English
    </a>
    <?php foreach ($availableLangs as $l): ?>
      <a href="/<?= $l ?>/<?= htmlspecialchars($switchPath) ?>"
         class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]"
         style="color: <?= $currentLang === $l ? 'var(--accent); font-weight:700' : 'var(--text-body)' ?>;"
         hreflang="<?= $l ?>">
        <?= $currentLang === $l ? '✓ ' : '  ' ?><?= $langLabels[$l] ?? $l ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>
