<?php
/**
 * Hreflang Tags — generates <link rel="alternate"> tags
 * Expects: $availableLangs (array), $currentPath (path without lang prefix)
 */
$baseUrl = 'https://shrutam.ai';
?>
<link rel="alternate" hreflang="x-default" href="<?= $baseUrl ?>/<?= htmlspecialchars($currentPath ?? '') ?>">
<?php if (isset($availableLangs)): ?>
<?php foreach ($availableLangs as $l): ?>
<link rel="alternate" hreflang="<?= $l ?>" href="<?= $baseUrl ?>/<?= $l ?>/<?= htmlspecialchars($currentPath ?? '') ?>">
<?php endforeach; ?>
<?php endif; ?>
