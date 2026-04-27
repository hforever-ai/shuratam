<?php
$og_image  = $og_image ?? 'https://shrutam.ai/assets/images/og/default.png';
$schema    = $schema ?? '';
$htmlLang  = $htmlLang ?? 'en-IN';
$theme     = $theme ?? 'navy';

// Map BCP-47 html lang → og:locale (underscore form)
$ogLocaleMap = [
    'hi-IN' => 'hi_IN', 'mr-IN' => 'mr_IN', 'te-IN' => 'te_IN',
    'en-IN' => 'en_IN', 'en'    => 'en_US',
];
$ogLocale = $ogLocaleMap[$htmlLang] ?? 'en_IN';

// Map html lang → image preview directive (helps Google rank pages with images)
$robotsMeta = $robotsMeta ?? 'index, follow, max-image-preview:large, max-snippet:-1';
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($htmlLang) ?>" dir="ltr" data-theme="<?= htmlspecialchars($theme) ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($description) ?>">
  <meta name="robots" content="<?= htmlspecialchars($robotsMeta) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

  <!-- Open Graph -->
  <meta property="og:type" content="<?= htmlspecialchars($ogType ?? 'website') ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
  <meta property="og:title" content="<?= htmlspecialchars($title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($description) ?>">
  <meta property="og:image" content="<?= htmlspecialchars($og_image) ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:locale" content="<?= htmlspecialchars($ogLocale) ?>">
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

  <!-- Favicon -->
  <link rel="icon" href="/favicon.ico" sizes="any">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/logo/favicon-32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/logo/favicon-16.png">
  <link rel="apple-touch-icon" href="/assets/images/logo/apple-touch-icon.png">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700;800&family=Inter:ital,opsz,wght@0,14..32,400;0,14..32,500;0,14..32,600&family=Noto+Sans+Devanagari:wght@400;500;600;700&family=Mukta:wght@600;700&family=Hind+Guntur:wght@400;500&family=Baloo+Tammudu+2:wght@600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="/assets/css/main.css">
  <link rel="stylesheet" href="/assets/css/mobile-consistency.css?v=1">

  <!-- Schema -->
  <?php if ($schema): ?>
  <script type="application/ld+json"><?= $schema ?></script>
  <?php endif; ?>

  <?php include __DIR__ . '/analytics.php'; ?>
</head>
<body>
  <a href="#main" class="skip-link">Skip to main content</a>
