<?php
/**
 * Language Switcher — dropdown style
 * Works on ALL pages — auto-detects current path from URL
 */
$langLabels = [
    'hi' => 'हिंदी',
    'en' => 'English',
    'mr' => 'मराठी',
    'te' => 'తెలుగు',
];

$currentLang = $lang ?? '';
$currentLabel = $currentLang ? ($langLabels[$currentLang] ?? 'Language') : 'हिंदी';
$availableLangs = $availableLangs ?? ['hi', 'en'];

// Auto-detect current path from URL (strip language prefix if present)
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$uri = trim($uri, '/');

// Remove lang prefix if present
if (preg_match('#^(hi|en|mr|te)(/(.*))?$#', $uri, $m)) {
    $pagePath = isset($m[3]) ? trim($m[3], '/') : '';
} else {
    // Hinglish page — URI is the path itself
    $pagePath = $uri;
}

// Ensure trailing slash for non-empty paths
$pagePath = $pagePath ? $pagePath . '/' : '';

// Map Hinglish-only pages to their routed equivalents
// Some pages exist only at root (e.g., /features/ask-like-10/)
// but have shared versions at /hi/features/ or /en/features/
$sharedPages = ['features', 'pricing', 'blind-mode', 'saavi', 'faq', 'about', 'waitlist', 'blog'];

// For nested Hinglish pages like /features/ask-like-10/,
// map to the parent shared page for lang switching
$rootSegment = explode('/', trim($pagePath, '/'))[0] ?? '';
$canSwitch = in_array($rootSegment, $sharedPages) || $rootSegment === 'boards' || $rootSegment === '' || $rootSegment === 'classes';

// For pages that don't have lang equivalents, link to lang homepage
$switchPath = $canSwitch ? $pagePath : '';
?>
<div class="relative group">
  <button class="flex items-center gap-1 text-sm hover:text-[var(--accent)]" style="color: var(--text-body);" aria-expanded="false" aria-haspopup="true">
    🌐 <?= $currentLabel ?> <span aria-hidden="true">▾</span>
  </button>
  <div class="absolute top-full right-0 mt-2 py-2 min-w-[120px] rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200"
       style="background: var(--bg-surface); border: 1px solid var(--border-subtle); box-shadow: var(--shadow); z-index: 50;">
    <!-- Hindi-English (root) -->
    <a href="/<?= htmlspecialchars($switchPath) ?>"
       class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]"
       style="color: <?= empty($currentLang) ? 'var(--accent)' : 'var(--text-body)' ?>;">
      <?= empty($currentLang) ? '✓ ' : '' ?>हिंदी-English
    </a>
    <?php foreach ($availableLangs as $l): ?>
      <a href="/<?= $l ?>/<?= htmlspecialchars($switchPath) ?>"
         class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]"
         style="color: <?= $currentLang === $l ? 'var(--accent)' : 'var(--text-body)' ?>;"
         hreflang="<?= $l ?>">
        <?= $currentLang === $l ? '✓ ' : '' ?><?= $langLabels[$l] ?? $l ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>
