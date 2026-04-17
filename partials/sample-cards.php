<?php
/**
 * SAAVI Sample Content Cards
 * Renders example, misconception, activity blocks from samples JSON.
 * Expects: $sampleBlocks (array of block objects), $t (translations)
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
  <?php foreach ($sampleBlocks as $block): ?>
    <?php
      $type = $block['type'] ?? 'example';
      $icon = $iconMap[$type] ?? '📌';
      $color = $colorMap[$type] ?? 'var(--primary-light)';
      $bg = $bgMap[$type] ?? 'var(--bg-elevated)';
      $label = isset($t['sample_blocks'][$type]) ? $t['sample_blocks'][$type] : ucfirst($type);
    ?>
    <div class="card p-5 animate-on-scroll" style="border-left: 3px solid <?= $color ?>; background: <?= $bg ?>;">
      <div class="flex items-center gap-2 mb-3">
        <span class="text-xl"><?= $icon ?></span>
        <span class="text-sm font-heading font-bold" style="color: <?= $color ?>;"><?= htmlspecialchars($label) ?></span>
      </div>

      <?php if ($type === 'misconception' && isset($block['wrong'])): ?>
        <p class="text-sm mb-2" style="color: var(--error);">❌ <?= htmlspecialchars($block['wrong']) ?></p>
        <p class="text-sm" style="color: var(--success);">✅ <?= htmlspecialchars($block['correct'] ?? '') ?></p>
      <?php else: ?>
        <p class="text-sm" style="color: var(--text-body);"><?= htmlspecialchars($block['content'] ?? $block['heading'] ?? '') ?></p>
      <?php endif; ?>

      <?php if (isset($block['cta'])): ?>
        <p class="text-xs mt-3 font-bold" style="color: var(--accent);"><?= htmlspecialchars($block['cta']) ?></p>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
</div>
