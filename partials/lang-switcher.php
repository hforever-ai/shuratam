<?php
/**
 * Language Switcher — compact inline toggle
 * Expects: $lang (current), $availableLangs (array), $currentPath
 */
$langLabels = [
    'hi' => 'हि',
    'en' => 'EN',
    'mr' => 'मर',
    'te' => 'తె',
];
$currentPath = $currentPath ?? '';
?>
<div class="flex items-center rounded-full" style="background: var(--bg-surface); border: 1px solid var(--border-subtle); padding: 2px;" role="navigation" aria-label="Language switcher">
  <a href="/<?= htmlspecialchars($currentPath) ?>"
     class="text-xs font-bold px-2 py-1 rounded-full whitespace-nowrap"
     style="<?= empty($lang) ? 'background: var(--accent); color: var(--text-inverse);' : 'color: var(--text-secondary);' ?>">
    HI
  </a>
  <?php foreach ($availableLangs as $l): ?>
    <a href="/<?= $l ?>/<?= htmlspecialchars($currentPath) ?>"
       class="text-xs font-bold px-2 py-1 rounded-full whitespace-nowrap"
       style="<?= ($lang ?? '') === $l ? 'background: var(--accent); color: var(--text-inverse);' : 'color: var(--text-secondary);' ?>"
       hreflang="<?= $l ?>">
      <?= $langLabels[$l] ?? strtoupper($l) ?>
    </a>
  <?php endforeach; ?>
</div>
