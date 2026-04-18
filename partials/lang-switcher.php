<?php
/**
 * Language Switcher — dropdown style (matches nav dropdowns)
 * Works on ALL pages — routed and non-routed
 */
$langLabels = [
    'hinglish' => 'Hinglish',
    'hi' => 'हिंदी',
    'en' => 'English',
    'mr' => 'मराठी',
    'te' => 'తెలుగు',
];

$currentLang = $lang ?? '';
$currentLabel = $currentLang ? ($langLabels[$currentLang] ?? 'Language') : 'Hinglish';
$currentPath = $currentPath ?? '';
$availableLangs = $availableLangs ?? ['hi', 'en'];
?>
<div class="relative group">
  <button class="flex items-center gap-1 text-sm hover:text-[var(--accent)]" style="color: var(--text-body);" aria-expanded="false" aria-haspopup="true">
    🌐 <?= $currentLabel ?> <span aria-hidden="true">▾</span>
  </button>
  <div class="absolute top-full right-0 mt-2 py-2 min-w-[120px] rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200"
       style="background: var(--bg-surface); border: 1px solid var(--border-subtle); box-shadow: var(--shadow); z-index: 50;">
    <!-- Hinglish (root) -->
    <a href="/<?= htmlspecialchars($currentPath) ?>"
       class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]"
       style="color: <?= empty($currentLang) ? 'var(--accent)' : 'var(--text-body)' ?>;">
      <?= empty($currentLang) ? '✓ ' : '' ?>Hinglish
    </a>
    <?php foreach ($availableLangs as $l): ?>
      <a href="/<?= $l ?>/<?= htmlspecialchars($currentPath) ?>"
         class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]"
         style="color: <?= $currentLang === $l ? 'var(--accent)' : 'var(--text-body)' ?>;"
         hreflang="<?= $l ?>">
        <?= $currentLang === $l ? '✓ ' : '' ?><?= $langLabels[$l] ?? $l ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>
