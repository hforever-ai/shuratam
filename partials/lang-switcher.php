<?php
/**
 * Language Switcher — pill-style toggle in nav
 * Expects: $lang (current), $availableLangs (array), $currentPath
 */
$langLabels = [
    'hi' => 'हिंदी',
    'en' => 'English',
    'mr' => 'मराठी',
    'te' => 'తెలుగు',
];
?>
<div class="flex items-center gap-1" role="navigation" aria-label="Language switcher">
  <a href="/<?= htmlspecialchars($currentPath) ?>"
     class="pill text-xs <?= empty($lang) ? 'active' : '' ?>"
     style="min-height: 36px; padding: 0.25rem 0.75rem;">
    Hinglish
  </a>
  <?php foreach ($availableLangs as $l): ?>
    <a href="/<?= $l ?>/<?= htmlspecialchars($currentPath) ?>"
       class="pill text-xs <?= ($lang ?? '') === $l ? 'active' : '' ?>"
       style="min-height: 36px; padding: 0.25rem 0.75rem;"
       hreflang="<?= $l ?>">
      <?= $langLabels[$l] ?? $l ?>
    </a>
  <?php endforeach; ?>
</div>
