<?php
/**
 * templates/homepage.php
 * Language-aware homepage for /hi/ and /en/
 * Variables set by router: $lang, $htmlLang, $t, $allBoards, $availableLangs, $currentPath
 */

$title       = ($t['hero']['headline'] ?? 'Learning is Now as Easy as Listening') . ' | Shrutam SAAVI';
$description = $t['hero']['body'] ?? 'SAAVI is your AI teacher. In your language. 24/7.';
$canonical   = "https://shrutam.ai/{$lang}/";
$schema      = '';
$baseUrl     = "https://shrutam.ai/{$lang}";

include __DIR__ . '/../partials/head.php';
include __DIR__ . '/../partials/nav.php';
?>

<main id="main">

  <!-- ============================================================
       SECTION 1: HERO
       ============================================================ -->
  <section class="section" aria-labelledby="hero-heading"
    style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="max-w-3xl mx-auto text-center">

        <!-- Badges -->
        <div class="flex flex-wrap justify-center gap-3 mb-6">
          <span class="badge badge-accent"><?= htmlspecialchars($t['hero']['launching'] ?? '🟢 Launching May 20, 2026') ?></span>
          <span class="badge badge-primary"><?= htmlspecialchars($t['hero']['blind_badge'] ?? '♿ Blind-Accessible AI Tutor') ?></span>
        </div>

        <!-- H1 -->
        <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
          <?= htmlspecialchars($t['hero']['headline'] ?? 'Learning is Now as Easy as Listening') ?>
        </h1>

        <!-- Tagline -->
        <p class="text-2xl font-heading mb-4" style="color: var(--accent);">
          <?= htmlspecialchars($t['hero']['tagline'] ?? 'Listen and Learn.') ?>
        </p>

        <!-- Body -->
        <p class="text-xl max-w-2xl mx-auto mb-8 whitespace-pre-line" style="color: var(--text-body);">
          <?= htmlspecialchars($t['hero']['body'] ?? 'SAAVI didi is your own AI teacher. In your language. 24/7.') ?>
        </p>

        <!-- Stats row -->
        <div class="flex flex-wrap justify-center gap-8 mb-10">
          <div class="text-center">
            <div class="stat-number">500+</div>
            <div class="text-sm" style="color: var(--text-muted);"><?= htmlspecialchars($t['stats']['waitlist'] ?? 'Waitlist') ?></div>
          </div>
          <div class="text-center">
            <div class="stat-number">5</div>
            <div class="text-sm" style="color: var(--text-muted);"><?= htmlspecialchars($t['stats']['languages'] ?? 'Languages') ?></div>
          </div>
          <div class="text-center">
            <div class="stat-number">5–10</div>
            <div class="text-sm" style="color: var(--text-muted);"><?= htmlspecialchars($t['stats']['classes'] ?? 'Class 5-10') ?></div>
          </div>
          <div class="text-center">
            <div class="stat-number">₹199</div>
            <div class="text-sm" style="color: var(--text-muted);"><?= htmlspecialchars($t['stats']['price'] ?? 'Per Month') ?></div>
          </div>
        </div>

        <!-- CTAs -->
        <div class="flex flex-wrap justify-center gap-4">
          <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary">
            <?= htmlspecialchars($t['hero']['cta_waitlist'] ?? 'Join Free Waitlist →') ?>
          </a>
          <a href="/<?= $lang ?>/saavi/" class="btn btn-outline">
            <?= htmlspecialchars($t['hero']['cta_demo'] ?? 'Try SAAVI Demo') ?>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 2: PROBLEM STATS
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="problem-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="problem-heading" class="text-4xl font-heading font-bold mb-4">
          <?= htmlspecialchars($t['problem']['headline'] ?? 'The Pain of 250 Million Indian Students') ?>
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto mb-10">

        <!-- Rote learning -->
        <div class="card animate-on-scroll text-center">
          <div class="stat-number mb-2" style="color: var(--error);">68%</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">
            <?= htmlspecialchars($t['problem']['rote_stat'] ?? 'Students learn by rote') ?>
          </div>
          <p class="text-sm" style="color: var(--text-secondary);">
            <?= htmlspecialchars($t['problem']['rote_desc'] ?? 'No understanding — just memorization.') ?>
          </p>
        </div>

        <!-- Tutor cost -->
        <div class="card animate-on-scroll text-center">
          <div class="stat-number mb-2" style="color: var(--error);">₹3,000+</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">
            <?= htmlspecialchars($t['problem']['tutor_stat'] ?? 'Private tutor cost per month') ?>
          </div>
          <p class="text-sm" style="color: var(--text-secondary);">
            <?= htmlspecialchars($t['problem']['tutor_desc'] ?? 'Unaffordable for 90% of families.') ?>
          </p>
        </div>

        <!-- Blind students -->
        <div class="card animate-on-scroll text-center">
          <div class="stat-number mb-2" style="color: var(--accent);">50 Lakh</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">
            <?= htmlspecialchars($t['problem']['blind_stat'] ?? 'Blind students — ZERO edtech serves them') ?>
          </div>
          <p class="text-sm" style="color: var(--text-secondary);">
            <?= htmlspecialchars($t['problem']['blind_desc'] ?? "BYJU's, Vedantu, Unacademy — none thought about it.") ?>
          </p>
        </div>

      </div>

      <div class="text-center">
        <p class="text-lg font-heading font-bold mb-2" style="color: var(--primary-light);">
          <?= htmlspecialchars($t['problem']['bottom_line'] ?? "We're here to change all of this.") ?>
        </p>
        <p class="text-xl font-heading font-bold" style="color: var(--accent);">
          <?= htmlspecialchars($t['problem']['saavi_line'] ?? 'SAAVI — for everyone, absolutely everyone.') ?>
        </p>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 3: ACTIVE BOARDS
       ============================================================ -->
  <section class="section" aria-labelledby="boards-heading">
    <div class="container">
      <div class="text-center mb-10">
        <h2 id="boards-heading" class="text-3xl font-heading font-bold mb-3">
          <?= htmlspecialchars($t['nav']['boards'] ?? 'Boards') ?>
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 max-w-3xl mx-auto">
        <?php foreach ($allBoards as $slug => $board): ?>
          <?php if (($board['status'] ?? '') === 'active'): ?>
            <a href="/<?= $lang ?>/boards/<?= htmlspecialchars($slug) ?>/"
               class="card animate-on-scroll flex flex-col gap-2 hover:border-[var(--primary)] transition-colors"
               style="border: 1px solid var(--border-default); text-decoration: none;">
              <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">
                <?= htmlspecialchars($board['name'][$lang] ?? $board['name']['en'] ?? $board['name']['hi'] ?? $slug) ?>
              </div>
              <div class="text-sm" style="color: var(--text-secondary);">
                <?= htmlspecialchars($board['full_name'][$lang] ?? $board['full_name']['en'] ?? $board['full_name']['hi'] ?? '') ?>
              </div>
              <div class="flex flex-wrap gap-1 mt-1">
                <?php foreach (($board['languages'] ?? []) as $bl): ?>
                  <span class="badge" style="font-size: 0.65rem; padding: 2px 6px;"><?= strtoupper($bl) ?></span>
                <?php endforeach; ?>
              </div>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 4: FEATURES PREVIEW
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="features-preview-heading">
    <div class="container">
      <div class="text-center mb-10">
        <h2 id="features-preview-heading" class="text-3xl font-heading font-bold mb-3">
          <?= $lang === 'hi' ? 'SAAVI Ki 13 Super Powers' : 'SAAVI\'s 13 Super Powers' ?>
        </h2>
        <p style="color: var(--text-secondary);">
          <?= $lang === 'hi' ? 'Sirf ek app — 13 reasons tumhara bachcha aage jayega.' : 'One app — 13 reasons your child will excel.' ?>
        </p>
      </div>

      <?php
      $featurePreviews = [
        ['emoji' => '🗣️', 'name' => ($lang === 'hi' ? 'मदर टंग लर्निंग' : 'Mother Tongue Learning'), 'tagline' => ($lang === 'hi' ? 'अपनी भाषा में पहले समझो' : 'Understand in your own language first')],
        ['emoji' => '🎯', 'name' => ($lang === 'hi' ? 'एडाप्टिव लर्निंग' : 'Adaptive Learning'), 'tagline' => ($lang === 'hi' ? 'तुम्हारा पेस, तुम्हारा तरीका' : 'Your pace, your style')],
        ['emoji' => '♿', 'name' => ($lang === 'hi' ? 'ब्लाइंड मोड' : 'Blind Mode'), 'tagline' => ($lang === 'hi' ? 'हमेशा मुफ़्त — भारत का पहला' : 'FREE forever — India\'s first')],
        ['emoji' => '📷', 'name' => ($lang === 'hi' ? 'फोटो डाउट सॉल्वर' : 'Photo Doubt Solver'), 'tagline' => ($lang === 'hi' ? 'फोटो खींचो, जवाब पाओ' : 'Snap a photo, get the answer')],
        ['emoji' => '🤖', 'name' => ($lang === 'hi' ? 'Ask Like 10' : 'Ask Like 10'), 'tagline' => ($lang === 'hi' ? '10 अलग-अलग तरीकों से समझो' : 'Understand 10 different ways')],
        ['emoji' => '👨‍👩‍👧', 'name' => ($lang === 'hi' ? 'पेरेंट पोर्टल' : 'Parent Portal'), 'tagline' => ($lang === 'hi' ? 'WhatsApp पर प्रोग्रेस रिपोर्ट' : 'WhatsApp progress reports')],
      ];
      ?>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
        <?php foreach ($featurePreviews as $f): ?>
          <div class="card animate-on-scroll flex items-start gap-4">
            <span class="text-3xl flex-shrink-0" aria-hidden="true"><?= $f['emoji'] ?></span>
            <div>
              <div class="font-heading font-bold mb-1" style="color: var(--text-primary);"><?= htmlspecialchars($f['name']) ?></div>
              <p class="text-sm" style="color: var(--text-secondary);"><?= htmlspecialchars($f['tagline']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="text-center">
        <a href="/<?= $lang ?>/features/" class="btn btn-outline">
          <?= $lang === 'hi' ? 'सभी 13 Features देखो →' : 'See All 13 Features →' ?>
        </a>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 5: CTA + COUNTDOWN
       ============================================================ -->
  <section class="section" aria-labelledby="cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">

        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4 text-gradient">
          <?= $lang === 'hi' ? 'May 20, 2026 को लॉन्च — अभी जुड़ो' : 'Launching May 20, 2026 — Join Now' ?>
        </h2>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          <?= $lang === 'hi' ? 'पहले 1,000 लोगों को 30 दिन का एक्सटेंडेड फ्री ट्रायल मिलेगा।' : 'First 1,000 people get a 30-day extended free trial.' ?>
        </p>

        <!-- Countdown -->
        <div class="flex justify-center gap-4 flex-wrap mb-10" role="timer" aria-label="Countdown to May 20, 2026">
          <div class="countdown-digit">
            <span class="number" id="cd-days">--</span>
            <span class="label"><?= $lang === 'hi' ? 'दिन' : 'Days' ?></span>
          </div>
          <div class="countdown-digit">
            <span class="number" id="cd-hours">--</span>
            <span class="label"><?= $lang === 'hi' ? 'घंटे' : 'Hours' ?></span>
          </div>
          <div class="countdown-digit">
            <span class="number" id="cd-minutes">--</span>
            <span class="label"><?= $lang === 'hi' ? 'मिनट' : 'Minutes' ?></span>
          </div>
          <div class="countdown-digit">
            <span class="number" id="cd-seconds">--</span>
            <span class="label"><?= $lang === 'hi' ? 'सेकंड' : 'Seconds' ?></span>
          </div>
        </div>

        <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary text-lg px-8 py-4">
          <?= htmlspecialchars($t['common']['join_waitlist'] ?? 'Join Waitlist') ?> →
        </a>

        <div class="flex flex-wrap justify-center gap-6 mt-6 text-sm" style="color: var(--text-muted);">
          <span>✓ <?= $lang === 'hi' ? 'कोई क्रेडिट कार्ड नहीं' : 'No credit card' ?></span>
          <span>✓ <?= $lang === 'hi' ? 'कोई स्पैम नहीं' : 'No spam' ?></span>
          <span>♿ <?= $lang === 'hi' ? 'ब्लाइंड मोड — हमेशा मुफ़्त' : 'Blind Mode — FREE forever' ?></span>
        </div>

      </div>
    </div>
  </section>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
