<?php
$og_image = $og_image ?? 'https://shrutam.ai/assets/images/og/default.png';
$schema = $schema ?? '';
?>
<!DOCTYPE html>
<html lang="<?= $htmlLang ?? 'hi-IN' ?>" dir="ltr" data-theme="navy">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($description) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
  <meta property="og:title" content="<?= htmlspecialchars($title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($description) ?>">
  <meta property="og:image" content="<?= htmlspecialchars($og_image) ?>">
  <meta property="og:locale" content="hi_IN">
  <meta property="og:site_name" content="Shrutam">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($title) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($description) ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($og_image) ?>">
  <meta name="twitter:site" content="@shrutam_ai">

  <!-- Hreflang -->
  <?php if (isset($availableLangs)): ?>
  <?php include __DIR__ . '/hreflang.php'; ?>
  <?php endif; ?>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700;800&family=Inter:ital,opsz,wght@0,14..32,400;0,14..32,500;0,14..32,600&family=Noto+Sans+Devanagari:wght@400;500;600;700&family=Mukta:wght@600;700&family=Hind+Guntur:wght@400;500&family=Baloo+Tammudu+2:wght@600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="/assets/css/main.css">

  <!-- Schema -->
  <?php if ($schema): ?>
  <script type="application/ld+json"><?= $schema ?></script>
  <?php endif; ?>
</head>
<body>
  <a href="#main" class="skip-link">Skip to main content</a>
