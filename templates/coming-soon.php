<?php
/**
 * templates/coming-soon.php
 * Handles two scenarios:
 *   - $pageType === 'coming-soon-lang': Marathi/Telugu language landing
 *   - $pageType === 'coming-soon-board': A board that's not yet active
 * Variables set by router: $lang, $htmlLang, $t, $availableLangs, $currentPath, $pageType
 *   - $comingSoonLang  — for lang pages: 'mr' or 'te'
 *   - $board           — for board pages: board data array (may be null/404)
 *   - $boardSlug       — for board pages: slug string
 */

// ---- Determine display language / board ----

if ($pageType === 'coming-soon-lang') {
    $targetLang = $comingSoonLang ?? $lang;

    $langMeta = [
        'mr' => [
            'name'       => 'Marathi',
            'native'     => 'मराठी',
            'script'     => 'Devanagari',
            'working_on' => 'आम्ही यावर काम करत आहोत। लवकरच उपलब्ध होईल!',
            'flag'       => '🔶',
            'htmlLang'   => 'mr',
        ],
        'te' => [
            'name'       => 'Telugu',
            'native'     => 'తెలుగు',
            'script'     => 'Telugu',
            'working_on' => 'మేము దీనిపై పని చేస్తున్నాము. త్వరలో అందుబాటులో ఉంటుంది!',
            'flag'       => '🌟',
            'htmlLang'   => 'te',
        ],
    ];

    $meta      = $langMeta[$targetLang] ?? $langMeta['mr'];
    $pageTitle = $meta['name'] . ' — Coming Soon | Shrutam';
    $headline  = $meta['native'];
    $subline   = $meta['working_on'];
    $badgeText = $meta['name'] . ' ' . $meta['flag'];
    $htmlLang  = $meta['htmlLang'];
    $isLang    = true;

} else {
    // coming-soon-board
    $boardData = $board ?? null;
    $slug      = $boardSlug ?? 'board';

    if ($boardData) {
        $boardName = $boardData['name'][$lang]
            ?? $boardData['name']['en']
            ?? $boardData['name']['hi']
            ?? ucfirst($slug);
        $boardFull = $boardData['full_name'][$lang]
            ?? $boardData['full_name']['en']
            ?? $boardData['full_name']['hi']
            ?? '';
    } else {
        $boardName = ucwords(str_replace('-', ' ', $slug));
        $boardFull = '';
    }

    $pageTitle = $boardName . ' — Coming Soon | Shrutam';
    $headline  = $boardName;
    $subline   = $t['coming_soon']['body'] ?? "We're working on it. Join the waitlist — you'll be the first to get access at launch.";
    $badgeText = $t['common']['coming_soon'] ?? 'Coming Soon';
    $isLang    = false;
}

// ---- SEO / head vars ----
$title       = $pageTitle;
$description = $lang === 'hi'
    ? "Shrutam पर $headline जल्द आ रहा है। Waitlist join करो — launch पर पहले access मिलेगा।"
    : "Shrutam for $headline is coming soon. Join the waitlist — be first at launch.";
$canonical   = "https://shrutam.ai/{$lang}/";
$schema      = '';

include __DIR__ . '/../partials/head.php';
include __DIR__ . '/../partials/nav.php';

// Feature pills to show
$featurePills = $isLang
    ? ($targetLang === 'te'
        ? ['SAAVI AI Teacher', 'Board Exam Prep', 'తెలుగు Medium Support', 'Blind Mode ♿', 'AP Board']
        : ['SAAVI AI Teacher', 'Board Exam Prep', 'मराठी Medium Support', 'Blind Mode ♿', 'Maharashtra SSC'])
    : [
        ($lang === 'hi' ? 'SAAVI AI Teacher' : 'SAAVI AI Teacher'),
        ($lang === 'hi' ? 'Board Exam Prep' : 'Board Exam Prep'),
        ($lang === 'hi' ? 'Hindi Medium Support' : 'Hindi Medium Support'),
        'Blind Mode ♿',
        ($lang === 'hi' ? 'Photo Doubt Solver' : 'Photo Doubt Solver'),
      ];
?>

<main id="main">

  <!-- ============================================================
       SECTION 1: COMING SOON HERO
       ============================================================ -->
  <section class="section" aria-labelledby="cs-heading"
    style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">

        <!-- Coming Soon Badge -->
        <div class="flex flex-wrap justify-center gap-3 mb-8">
          <span class="badge badge-accent" style="font-size: 1rem; padding: 8px 18px;">
            🚧 <?= htmlspecialchars($t['common']['coming_soon'] ?? 'Coming Soon') ?>
          </span>
          <?php if ($badgeText): ?>
            <span class="badge badge-primary" style="font-size: 1rem; padding: 8px 18px;">
              <?= htmlspecialchars($badgeText) ?>
            </span>
          <?php endif; ?>
        </div>

        <!-- Language name in native script / Board name -->
        <?php if ($isLang): ?>
          <div <?= $htmlLang !== 'hi' ? "lang=\"{$htmlLang}\"" : '' ?>
            class="text-7xl font-heading font-bold mb-4" style="color: var(--accent);">
            <?= htmlspecialchars($headline) ?>
          </div>
        <?php else: ?>
          <h1 id="cs-heading" class="text-6xl font-heading font-bold mb-4 text-gradient">
            <?= htmlspecialchars($headline) ?>
          </h1>
          <?php if ($boardFull): ?>
            <p class="text-lg mb-4" style="color: var(--text-secondary);"><?= htmlspecialchars($boardFull) ?></p>
          <?php endif; ?>
        <?php endif; ?>

        <!-- Working on it message -->
        <p class="text-xl mb-6 leading-relaxed" style="color: var(--text-body);">
          <?= htmlspecialchars($subline) ?>
        </p>

        <?php if ($isLang): ?>
          <p class="text-lg mb-8" style="color: var(--text-secondary);">
            <?= $lang === 'hi'
              ? "हम $headline के लिए SAAVI पर काम कर रहे हैं। आपको जल्द ही access मिलेगा।"
              : "We're building SAAVI for $headline speakers. You'll get access soon." ?>
          </p>
        <?php endif; ?>

        <!-- Feature Pills -->
        <div class="flex flex-wrap justify-center gap-3 mb-10">
          <?php foreach ($featurePills as $pill): ?>
            <span class="pill"><?= htmlspecialchars($pill) ?></span>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 2: WAITLIST FORM
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="cs-waitlist-heading">
    <div class="container">
      <div class="max-w-lg mx-auto">
        <h2 id="cs-waitlist-heading" class="text-3xl font-heading font-bold text-center mb-3" style="color: var(--primary-light);">
          <?= $lang === 'hi' ? 'सबसे पहले जानो' : 'Be First to Know' ?>
        </h2>
        <p class="text-center mb-8" style="color: var(--text-secondary);">
          <?= $lang === 'hi'
            ? 'Waitlist join करो — launch होते ही आपको notification मिलेगी।'
            : 'Join the waitlist — get notified the moment we launch.' ?>
        </p>

        <div class="card animate-on-scroll" style="border: 2px solid var(--border-default); box-shadow: 0 0 40px var(--primary-glow);">
          <?php include __DIR__ . '/../partials/waitlist-form.php'; ?>
        </div>

        <!-- Benefits -->
        <div class="flex flex-col gap-3 mt-6 text-sm" style="color: var(--text-secondary);">
          <div class="flex items-center gap-2">
            <span style="color: var(--accent);">🎁</span>
            <span>
              <?= $lang === 'hi'
                ? 'Early joiners को <strong style="color: var(--text-primary);">30 दिन extended free trial</strong>'
                : 'Early joiners get a <strong style="color: var(--text-primary);">30-day extended free trial</strong>' ?>
            </span>
          </div>
          <div class="flex items-center gap-2">
            <span style="color: var(--success);">✓</span>
            <span><?= $lang === 'hi' ? 'कोई credit card नहीं' : 'No credit card required' ?></span>
          </div>
          <div class="flex items-center gap-2">
            <span style="color: var(--success);">✓</span>
            <span><?= $lang === 'hi' ? 'कोई spam नहीं' : 'No spam — just one launch notification' ?></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 3: MEANWHILE LINK TO ACTIVE VERSION
       ============================================================ -->
  <section class="section" aria-labelledby="cs-alt-heading">
    <div class="container">
      <div class="max-w-xl mx-auto text-center">
        <h2 id="cs-alt-heading" class="text-2xl font-heading font-bold mb-4" style="color: var(--text-primary);">
          <?= $lang === 'hi' ? 'इस बीच — Hindi में try करो' : 'Meanwhile — Try in Hindi' ?>
        </h2>
        <p class="mb-6" style="color: var(--text-secondary);">
          <?= $lang === 'hi'
            ? 'SAAVI अभी Hindi में पूरी तरह available है — CBSE और CG Board के साथ।'
            : 'SAAVI is fully available in Hindi right now — with CBSE and CG Board.' ?>
        </p>

        <div class="flex flex-wrap justify-center gap-4">
          <a href="/hi/" class="btn btn-primary">
            <?= $lang === 'hi' ? 'Hindi में try करो →' : 'Try in Hindi →' ?>
          </a>
          <?php if ($lang !== 'en'): ?>
            <a href="/en/" class="btn btn-outline">
              Try in English →
            </a>
          <?php endif; ?>
        </div>

        <!-- Active boards quick links -->
        <div class="flex flex-wrap justify-center gap-3 mt-8">
          <?php foreach ($allBoards as $bSlug => $bData): ?>
            <?php if (($bData['status'] ?? '') === 'active'): ?>
              <a href="/hi/boards/<?= htmlspecialchars($bSlug) ?>/"
                 class="pill" style="text-decoration: none;">
                <?= htmlspecialchars($bData['name']['hi'] ?? $bData['name']['en'] ?? $bSlug) ?>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
