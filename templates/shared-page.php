<?php
/**
 * templates/shared-page.php
 * Dispatcher for shared pages: features, pricing, blind-mode, saavi, faq, about, waitlist, blog
 * Variables set by router: $lang, $htmlLang, $t, $availableLangs, $currentPath, $pageType
 */

$baseUrl   = "https://shrutam.ai/{$lang}";
$pagesFile = __DIR__ . "/../content/translations/pages-{$lang}.json";
$p         = file_exists($pagesFile) ? json_decode(file_get_contents($pagesFile), true) : [];

switch ($pageType) {

  // ===========================================================================
  // FEATURES
  // ===========================================================================
  case 'features':
    $pd          = $p['features'] ?? [];
    $title       = htmlspecialchars($pd['headline'] ?? 'SAAVI Features') . ' | Shrutam';
    $description = $pd['subtext'] ?? '';
    $canonical   = "{$baseUrl}/features/";
    $schema      = '';

    include __DIR__ . '/../partials/head.php';
    include __DIR__ . '/../partials/nav.php';

    $features = [
      ['emoji' => '🗣️', 'name_hi' => 'मदर टंग लर्निंग',    'name_en' => 'Mother Tongue Learning',  'tagline_hi' => 'पहले अपनी भाषा में समझो',            'tagline_en' => 'Understand in your own language first'],
      ['emoji' => '🎯', 'name_hi' => 'एडाप्टिव लर्निंग',    'name_en' => 'Adaptive Learning',       'tagline_hi' => 'तुम्हारा पेस, तुम्हारा तरीका',        'tagline_en' => 'Your pace, your way'],
      ['emoji' => '🧠', 'name_hi' => 'इनफॉर्म्ड लर्निंग',  'name_en' => 'Informed Learning',       'tagline_hi' => 'SAAVI तुम्हें जानती है',              'tagline_en' => 'SAAVI knows your learning history'],
      ['emoji' => '📚', 'name_hi' => 'रिविज़न मोड',          'name_en' => 'Revision Mode',           'tagline_hi' => 'Exam से पहले 20 मिनट में Chapter',   'tagline_en' => 'Full chapter in 20 min before exam'],
      ['emoji' => '🤖', 'name_hi' => 'Ask Like 10',           'name_en' => 'Ask Like 10',             'tagline_hi' => '9 और तरीकों से एक concept समझो',    'tagline_en' => 'Understand one concept 10 different ways'],
      ['emoji' => '🏆', 'name_hi' => 'Zero to Hero',          'name_en' => 'Zero to Hero',            'tagline_hi' => 'कुछ नहीं से Board Ready',            'tagline_en' => 'From nothing to board-ready'],
      ['emoji' => '📷', 'name_hi' => 'फोटो डाउट सॉल्वर',   'name_en' => 'Photo Doubt Solver',      'tagline_hi' => 'किताब का फोटो लो, जवाब पाओ',         'tagline_en' => 'Snap a photo, get an instant answer'],
      ['emoji' => '🎬', 'name_hi' => 'Reel Mode',             'name_en' => 'Reel Mode',               'tagline_hi' => '60 सेकंड में एक concept',            'tagline_en' => '60-second audio concepts'],
      ['emoji' => '📝', 'name_hi' => 'स्मार्ट एग्जाम नोट्स', 'name_en' => 'Smart Exam Notes',       'tagline_hi' => 'Audio + Printable notes',             'tagline_en' => 'Audio + printable exam notes'],
      ['emoji' => '🧪', 'name_hi' => 'मॉक एग्जाम',           'name_en' => 'Mock Exams',              'tagline_hi' => 'Board जैसा exam, SAAVI feedback',    'tagline_en' => 'Board-style exams with SAAVI feedback'],
      ['emoji' => '📊', 'name_hi' => 'स्टूडेंट ट्रैकिंग',   'name_en' => 'Student Tracking',        'tagline_hi' => 'Weak chapters, तुरंत alert',          'tagline_en' => 'Weak chapter alerts, instant'],
      ['emoji' => '👨‍👩‍👧', 'name_hi' => 'पेरेंट पोर्टल', 'name_en' => 'Parent Portal',            'tagline_hi' => 'WhatsApp पर progress report',         'tagline_en' => 'WhatsApp weekly progress reports'],
      ['emoji' => '♿', 'name_hi' => 'ब्लाइंड मोड',          'name_en' => 'Blind Mode',              'tagline_hi' => 'हमेशा मुफ़्त — भारत का पहला',        'tagline_en' => 'FREE forever — India\'s first'],
    ];
    ?>

    <main id="main">
      <section class="section" aria-labelledby="features-heading"
        style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
        <div class="container text-center">
          <div class="flex flex-wrap justify-center gap-2 mb-6">
            <span class="badge badge-accent">13 Super Powers</span>
            <span class="badge badge-primary">SAAVI Powered</span>
          </div>
          <h1 id="features-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
            <?= htmlspecialchars($pd['headline'] ?? 'SAAVI Features') ?>
          </h1>
          <p class="text-xl max-w-2xl mx-auto mb-8" style="color: var(--text-body);">
            <?= htmlspecialchars($pd['subtext'] ?? '') ?>
          </p>
          <div class="flex flex-wrap justify-center gap-4">
            <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary">
              <?= htmlspecialchars($t['common']['join_waitlist'] ?? 'Join Waitlist') ?> →
            </a>
          </div>
        </div>
      </section>

      <section class="section section-dark">
        <div class="container">
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($features as $f): ?>
              <div class="card animate-on-scroll flex items-start gap-4">
                <span class="text-4xl flex-shrink-0" aria-hidden="true"><?= $f['emoji'] ?></span>
                <div>
                  <div class="font-heading font-bold text-lg mb-1" style="color: var(--text-primary);">
                    <?= htmlspecialchars($lang === 'hi' ? $f['name_hi'] : $f['name_en']) ?>
                  </div>
                  <p class="text-sm" style="color: var(--text-secondary);">
                    <?= htmlspecialchars($lang === 'hi' ? $f['tagline_hi'] : $f['tagline_en']) ?>
                  </p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="text-center mt-12">
            <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary">
              <?= $lang === 'hi' ? 'अभी जुड़ो — Free →' : 'Join Now — Free →' ?>
            </a>
          </div>
        </div>
      </section>
    </main>

    <?php
    include __DIR__ . '/../partials/footer.php';
    break;

  // ===========================================================================
  // PRICING
  // ===========================================================================
  case 'pricing':
    $pd          = $p['pricing'] ?? [];
    $title       = htmlspecialchars($pd['headline'] ?? 'Pricing') . ' | Shrutam';
    $description = $pd['comparison_note'] ?? '';
    $canonical   = "{$baseUrl}/pricing/";
    $schema      = json_encode([
      '@context' => 'https://schema.org', '@type' => 'Offer',
      'name' => 'Shrutam Pro', 'price' => '199', 'priceCurrency' => 'INR',
      'availability' => 'https://schema.org/PreOrder', 'url' => $canonical,
    ], JSON_UNESCAPED_SLASHES);

    include __DIR__ . '/../partials/head.php';
    include __DIR__ . '/../partials/nav.php';
    ?>

    <main id="main">
      <section class="section" aria-labelledby="pricing-heading"
        style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
        <div class="container text-center max-w-3xl mx-auto">
          <span class="badge badge-accent mb-4">
            <?= $lang === 'hi' ? '🎁 7 दिन Free Trial — No Credit Card' : '🎁 7-Day Free Trial — No Credit Card' ?>
          </span>
          <h1 id="pricing-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
            <?= htmlspecialchars($pd['headline'] ?? 'Pricing') ?>
          </h1>
          <p class="text-xl mb-8" style="color: var(--text-secondary);">
            <?= htmlspecialchars($pd['comparison_note'] ?? '') ?>
          </p>
          <div class="flex flex-wrap gap-4 justify-center">
            <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary">
              <?= htmlspecialchars($t['pricing']['start_trial'] ?? 'Start Free Trial') ?> →
            </a>
            <a href="#comparison" class="btn btn-outline">
              <?= $lang === 'hi' ? 'Comparison देखो ↓' : 'See Comparison ↓' ?>
            </a>
          </div>
        </div>
      </section>

      <section class="section section-dark">
        <div class="container">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-3xl mx-auto">

            <!-- Free Trial -->
            <div class="card flex flex-col animate-on-scroll" style="border: 1px solid var(--border-default);">
              <div class="text-center mb-6">
                <div class="text-4xl mb-3">🎁</div>
                <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">
                  <?= htmlspecialchars($pd['free_trial_title'] ?? 'Free Trial') ?>
                </div>
                <div class="stat-number mb-1">₹0</div>
                <div class="text-sm" style="color: var(--text-muted);">
                  <?= htmlspecialchars($t['pricing']['no_credit_card'] ?? 'No credit card required') ?>
                </div>
              </div>
              <ul class="flex flex-col gap-3 mb-8 flex-1" style="color: var(--text-secondary);">
                <?php foreach ($pd['free_trial_features'] ?? [] as $item): ?>
                  <li class="flex items-start gap-3">
                    <span style="color: var(--success); flex-shrink: 0;">✓</span>
                    <span><?= htmlspecialchars($item) ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
              <a href="/<?= $lang ?>/waitlist/" class="btn btn-outline w-full justify-center">
                <?= htmlspecialchars($t['pricing']['start_trial'] ?? 'Start Free Trial') ?> →
              </a>
            </div>

            <!-- Pro Plan -->
            <div class="card flex flex-col animate-on-scroll" style="border: 2px solid var(--accent); box-shadow: 0 0 40px var(--accent-glow);">
              <div class="text-center mb-6">
                <span class="badge badge-accent mb-3">Most Popular</span>
                <div class="text-4xl mb-3">⚡</div>
                <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">
                  <?= htmlspecialchars($pd['pro_title'] ?? 'Shrutam Pro') ?>
                </div>
                <div class="stat-number mb-1"><?= htmlspecialchars($pd['pro_price'] ?? '₹199/month') ?></div>
              </div>
              <ul class="flex flex-col gap-3 mb-8 flex-1" style="color: var(--text-secondary);">
                <?php foreach ($pd['pro_features'] ?? [] as $item): ?>
                  <li class="flex items-start gap-3">
                    <span style="color: var(--success); flex-shrink: 0;">✓</span>
                    <span><?= htmlspecialchars($item) ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
              <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary w-full justify-center">
                <?= $lang === 'hi' ? 'Launch पे पहले पाओ →' : 'Get Early Access →' ?>
              </a>
            </div>

          </div>
        </div>
      </section>

      <section id="comparison" class="section" aria-labelledby="comparison-heading">
        <div class="container">
          <h2 id="comparison-heading" class="text-3xl font-heading font-bold text-center mb-10">
            <?= $lang === 'hi' ? 'Numbers बोलते हैं' : 'The Numbers Speak' ?>
          </h2>
          <div class="max-w-3xl mx-auto overflow-x-auto rounded-xl" style="border: 1px solid var(--border-subtle);">
            <table class="comparison-table">
              <thead>
                <tr>
                  <th><?= $lang === 'hi' ? 'Feature' : 'Feature' ?></th>
                  <th>Private Tutor</th>
                  <th>BYJU's</th>
                  <th style="color: var(--accent);">Shrutam ✨</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $rows = $lang === 'hi' ? [
                  ['Price',          '₹3,000–₹8,000/माह',  '₹500–₹1,500/माह',  '₹199/माह'],
                  ['Language',       'Tutor पर depend',    'ज़्यादातर English', 'Hindi, English — native'],
                  ['Availability',   'Fixed hours',        'Recorded videos',  '24x7 — रात 2 बजे भी'],
                  ['Blind Support',  '✗ नहीं',             '✗ नहीं',           '✓ FREE forever'],
                  ['Internet',       'N/A',                'Heavy video',      'Low bandwidth — 2G/3G OK'],
                ] : [
                  ['Price',          '₹3,000–₹8,000/month', '₹500–₹1,500/month', '₹199/month'],
                  ['Language',       'Depends on tutor',    'Mostly English',     'Hindi, English — native'],
                  ['Availability',   'Fixed hours',         'Recorded videos',    '24x7 — even at 2 AM'],
                  ['Blind Support',  '✗ No',                '✗ No',               '✓ FREE forever'],
                  ['Internet',       'N/A',                 'Heavy video',        'Low bandwidth — 2G/3G OK'],
                ];
                foreach ($rows as $r): ?>
                  <tr>
                    <td><strong><?= htmlspecialchars($r[0]) ?></strong></td>
                    <td><?= htmlspecialchars($r[1]) ?></td>
                    <td><?= htmlspecialchars($r[2]) ?></td>
                    <td style="color: var(--success); font-weight: 700;"><?= htmlspecialchars($r[3]) ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </main>

    <?php
    include __DIR__ . '/../partials/footer.php';
    break;

  // ===========================================================================
  // BLIND MODE
  // ===========================================================================
  case 'blind-mode':
    $pd          = $p['blind_mode'] ?? [];
    $title       = htmlspecialchars($pd['headline'] ?? 'Blind Mode') . ' | Shrutam';
    $description = $pd['intro'] ?? '';
    $canonical   = "{$baseUrl}/blind-mode/";
    $schema      = '';

    include __DIR__ . '/../partials/head.php';
    include __DIR__ . '/../partials/nav.php';
    ?>

    <main id="main">
      <section class="section" aria-labelledby="blind-heading"
        style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
        <div class="container text-center max-w-3xl mx-auto">
          <div class="flex flex-wrap justify-center gap-3 mb-6">
            <span class="badge badge-accent">♿ <?= $lang === 'hi' ? 'भारत का पहला' : "India's First" ?></span>
            <span class="badge badge-primary">FREE Forever</span>
          </div>
          <h1 id="blind-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
            <?= htmlspecialchars($pd['headline'] ?? 'Blind Mode') ?>
          </h1>
          <p class="text-xl mb-8" style="color: var(--text-body);">
            <?= htmlspecialchars($pd['intro'] ?? '') ?>
          </p>
          <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary">
            <?= $lang === 'hi' ? 'Blind Mode Early Access — Free →' : 'Blind Mode Early Access — Free →' ?>
          </a>
        </div>
      </section>

      <section class="section section-dark">
        <div class="container">
          <h2 class="text-3xl font-heading font-bold text-center mb-10">
            <?= $lang === 'hi' ? 'ख़ास सुविधाएँ' : 'Dedicated Features' ?>
          </h2>
          <div class="flex flex-col gap-5 max-w-3xl mx-auto">
            <?php foreach ($pd['features'] ?? [] as $i => $bf): ?>
              <div class="card animate-on-scroll flex items-start gap-4" style="border-left: 4px solid var(--primary);">
                <div class="w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold flex-shrink-0"
                  style="background: var(--primary-glow); color: var(--primary-light); border: 2px solid var(--primary);">
                  <?= $i + 1 ?>
                </div>
                <div>
                  <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">
                    <?= htmlspecialchars($bf['name']) ?>
                  </div>
                  <p class="text-sm" style="color: var(--text-secondary);"><?= htmlspecialchars($bf['desc']) ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <blockquote class="max-w-2xl mx-auto mt-12 p-6 rounded-2xl text-center animate-on-scroll"
            style="background: var(--primary-glow); border: 2px solid var(--primary);">
            <p class="text-lg font-heading font-bold" style="color: var(--text-primary);">
              "<?= htmlspecialchars($pd['commitment'] ?? '') ?>"
            </p>
          </blockquote>

          <div class="text-center mt-10">
            <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary">
              <?= htmlspecialchars($t['common']['join_waitlist'] ?? 'Join Waitlist') ?> →
            </a>
          </div>
        </div>
      </section>
    </main>

    <?php
    include __DIR__ . '/../partials/footer.php';
    break;

  // ===========================================================================
  // SAAVI
  // ===========================================================================
  case 'saavi':
    $pd          = $p['saavi'] ?? [];
    $title       = htmlspecialchars($pd['headline'] ?? 'Meet SAAVI') . ' | Shrutam';
    $description = $pd['intro'] ?? '';
    $canonical   = "{$baseUrl}/saavi/";
    $schema      = '';

    include __DIR__ . '/../partials/head.php';
    include __DIR__ . '/../partials/nav.php';

    $langRows = [
      ['Hindi',    'हिंदी',    'प्रकाश-संश्लेषण वह प्रक्रिया है जिसमें पौधे सूर्य के प्रकाश से अपना भोजन बनाते हैं।'],
      ['English',  'English',  'Photosynthesis is the process by which plants make food using sunlight.'],
      ['Hinglish', 'Hinglish', 'Plants sunlight se apna khana khud banate hain — ek natural solar kitchen!'],
    ];
    ?>

    <main id="main">
      <section class="section" aria-labelledby="saavi-heading"
        style="background: linear-gradient(160deg, var(--bg-base) 50%, var(--bg-elevated) 100%);">
        <div class="container">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
              <div class="flex flex-wrap gap-2 mb-6">
                <span class="badge badge-accent">♿ Blind-Accessible</span>
                <span class="badge badge-primary">24/7 Available</span>
                <span class="badge" style="background: var(--bg-surface); color: var(--text-body); border: 1px solid var(--border-subtle);">Mother Tongue First</span>
              </div>
              <h1 id="saavi-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
                <?= htmlspecialchars($pd['headline'] ?? 'Meet SAAVI') ?>
              </h1>
              <p class="text-xl mb-6" style="color: var(--text-body);">
                <?= htmlspecialchars($pd['intro'] ?? '') ?>
              </p>
              <div class="flex flex-col gap-4 mb-8">
                <?php foreach ($pd['traits'] ?? [] as $trait): ?>
                  <div class="flex items-start gap-3">
                    <span class="pill flex-shrink-0" style="cursor: default;"><?= htmlspecialchars($trait['name']) ?></span>
                    <p class="text-sm" style="color: var(--text-secondary);"><?= htmlspecialchars($trait['desc']) ?></p>
                  </div>
                <?php endforeach; ?>
              </div>
              <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary">
                <?= $lang === 'hi' ? 'SAAVI से मिलना है → Join Waitlist' : 'Meet SAAVI → Join Waitlist' ?>
              </a>
            </div>
            <div class="flex items-center justify-center" aria-hidden="true">
              <div class="relative flex items-center justify-center" style="width: 280px; height: 280px;">
                <div class="absolute inset-0 rounded-full" style="background: conic-gradient(from 0deg, var(--primary), var(--accent), var(--primary)); opacity: 0.25; animation: spin 8s linear infinite;"></div>
                <div class="relative flex flex-col items-center justify-center rounded-full text-center"
                  style="width: 200px; height: 200px; background: radial-gradient(circle at 40% 35%, var(--bg-surface), var(--bg-elevated)); border: 2px solid var(--border-default); box-shadow: 0 0 40px var(--primary-glow);">
                  <div class="text-5xl mb-1">🤖</div>
                  <div class="font-heading font-bold text-lg" style="color: var(--accent);">SAAVI</div>
                  <div class="text-xs" style="color: var(--text-muted);"><?= $lang === 'hi' ? 'तेरी Teacher दीदी' : 'Your Teacher Didi' ?></div>
                  <div class="flex items-center gap-1 mt-2">
                    <span class="inline-block w-2 h-2 rounded-full" style="background: var(--success); box-shadow: 0 0 6px var(--success);"></span>
                    <span class="text-xs" style="color: var(--success);">Online 24/7</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-dark">
        <div class="container">
          <h2 class="text-3xl font-heading font-bold text-center mb-10">
            <?= $lang === 'hi' ? 'SAAVI बोलती है — सुनो' : 'SAAVI Speaks — Listen' ?>
          </h2>
          <div class="flex flex-col gap-4 max-w-2xl mx-auto">
            <?php foreach ($langRows as $lr): ?>
              <div class="chat-bubble chat-bubble-saavi animate-on-scroll">
                <span class="text-xs font-bold uppercase mb-2 block" style="color: var(--accent);"><?= $lr[0] ?> (<?= $lr[1] ?>)</span>
                <p style="color: var(--text-body);"><?= htmlspecialchars($lr[2]) ?></p>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="text-center mt-12">
            <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary">
              <?= htmlspecialchars($t['common']['join_waitlist'] ?? 'Join Waitlist') ?> →
            </a>
          </div>
        </div>
      </section>
    </main>

    <?php
    include __DIR__ . '/../partials/footer.php';
    break;

  // ===========================================================================
  // FAQ
  // ===========================================================================
  case 'faq':
    $pd          = $p['faq'] ?? [];
    $title       = htmlspecialchars($pd['headline'] ?? 'FAQ') . ' | Shrutam SAAVI';
    $description = $lang === 'hi'
      ? 'SAAVI, Blind Mode, pricing, boards — सब कुछ हिंदी में।'
      : 'SAAVI, Blind Mode, pricing, boards — everything answered.';
    $canonical   = "{$baseUrl}/faq/";
    $schema      = '';

    include __DIR__ . '/../partials/head.php';
    include __DIR__ . '/../partials/nav.php';
    ?>

    <main id="main">
      <section class="section" aria-labelledby="faq-heading"
        style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
        <div class="container text-center max-w-2xl mx-auto">
          <span class="badge badge-primary mb-4">❓ FAQ</span>
          <h1 id="faq-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
            <?= htmlspecialchars($pd['headline'] ?? 'FAQ') ?>
          </h1>
          <p class="text-xl" style="color: var(--text-secondary);">
            <?= $description ?>
          </p>
        </div>
      </section>

      <section class="section section-dark">
        <div class="container">
          <div class="max-w-3xl mx-auto flex flex-col gap-4">
            <?php foreach ($pd['questions'] ?? [] as $faq): ?>
              <details class="card animate-on-scroll" style="border: 1px solid var(--border-subtle);">
                <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4"
                  style="color: var(--text-primary);">
                  <span><?= htmlspecialchars($faq['q']) ?></span>
                  <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
                </summary>
                <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                  <p><?= htmlspecialchars($faq['a']) ?></p>
                </div>
              </details>
            <?php endforeach; ?>
          </div>

          <div class="text-center mt-12">
            <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary">
              <?= htmlspecialchars($t['common']['join_waitlist'] ?? 'Join Waitlist') ?> →
            </a>
          </div>
        </div>
      </section>
    </main>

    <?php
    include __DIR__ . '/../partials/footer.php';
    break;

  // ===========================================================================
  // ABOUT
  // ===========================================================================
  case 'about':
    $pd          = $p['about'] ?? [];
    $title       = htmlspecialchars($pd['headline'] ?? 'About Shrutam') . ' | Aarambha';
    $description = $pd['mission'] ?? '';
    $canonical   = "{$baseUrl}/about/";
    $schema      = '';

    include __DIR__ . '/../partials/head.php';
    include __DIR__ . '/../partials/nav.php';
    ?>

    <main id="main">
      <section class="section" aria-labelledby="about-heading"
        style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
        <div class="container text-center max-w-3xl mx-auto">
          <span class="badge badge-primary mb-4">
            <?= $lang === 'hi' ? 'Aarambha का पहला Product' : "Aarambha's First Product" ?>
          </span>
          <h1 id="about-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
            <?= htmlspecialchars($pd['headline'] ?? 'About Shrutam') ?>
          </h1>
          <p class="text-xl" style="color: var(--text-secondary);">
            <?= htmlspecialchars($pd['mission'] ?? '') ?>
          </p>
        </div>
      </section>

      <section class="section section-dark">
        <div class="container">
          <div class="max-w-3xl mx-auto">
            <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
              <div class="flex items-start gap-4 mb-6">
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl flex-shrink-0"
                  style="background: var(--primary-glow); border: 2px solid var(--primary);">👤</div>
                <div>
                  <div class="font-heading font-bold" style="color: var(--text-primary);">Founder, Aarambha</div>
                </div>
              </div>
              <blockquote class="text-lg leading-relaxed" style="color: var(--text-body);">
                <p><?= htmlspecialchars($pd['founder_note'] ?? '') ?></p>
              </blockquote>
              <cite class="mt-4 block font-heading font-bold not-italic" style="color: var(--accent);">— Founder, Aarambha</cite>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="max-w-2xl mx-auto text-center">
            <div lang="sa" class="font-devanagari-heading text-6xl mb-4" style="color: var(--accent);">शृतम्</div>
            <h2 class="text-2xl font-heading font-bold mb-2" style="color: var(--text-primary);">Shrutam</h2>
            <p class="text-lg italic mb-6" style="color: var(--text-secondary);">"That which is heard" (Sanskrit)</p>
            <p style="color: var(--text-body);"><?= htmlspecialchars($pd['name_meaning'] ?? '') ?></p>
          </div>
        </div>
      </section>

      <section class="section section-dark">
        <div class="container">
          <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-heading font-bold mb-8" style="color: var(--primary-light);">
              <?= $lang === 'hi' ? 'हमारा Mission' : 'Our Mission' ?>
            </h2>
            <blockquote class="p-8 rounded-2xl mb-10 animate-on-scroll"
              style="background: var(--primary-glow); border: 2px solid var(--primary);">
              <p class="text-2xl font-heading font-bold leading-relaxed" style="color: var(--text-primary);">
                "<?= htmlspecialchars($pd['mission'] ?? '') ?>"
              </p>
            </blockquote>
            <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary">
              <?= htmlspecialchars($t['common']['join_waitlist'] ?? 'Join Waitlist') ?> →
            </a>
          </div>
        </div>
      </section>
    </main>

    <?php
    include __DIR__ . '/../partials/footer.php';
    break;

  // ===========================================================================
  // WAITLIST
  // ===========================================================================
  case 'waitlist':
    $pd          = $p['waitlist'] ?? [];
    $title       = htmlspecialchars($pd['headline'] ?? 'Join Waitlist') . ' | Shrutam';
    $description = $pd['subtext'] ?? '';
    $canonical   = "{$baseUrl}/waitlist/";
    $schema      = '';

    include __DIR__ . '/../partials/head.php';
    include __DIR__ . '/../partials/nav.php';
    ?>

    <main id="main">
      <section class="section" aria-labelledby="waitlist-heading"
        style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
        <div class="container">
          <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="badge badge-accent mb-4">🚀 <?= $lang === 'hi' ? '20 May 2026 को Launch' : 'Launching May 20, 2026' ?></span>
            <h1 id="waitlist-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
              <?= htmlspecialchars($pd['headline'] ?? 'Join Waitlist') ?>
            </h1>
            <p class="text-xl" style="color: var(--text-secondary);">
              <?= htmlspecialchars($pd['subtext'] ?? '') ?>
            </p>
          </div>

          <!-- Countdown -->
          <div class="flex justify-center gap-4 flex-wrap mb-12" role="timer" aria-label="Countdown to May 20, 2026 launch">
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

          <!-- Waitlist Form -->
          <div class="max-w-lg mx-auto animate-on-scroll">
            <div class="card" style="border: 2px solid var(--border-default); box-shadow: 0 0 50px var(--primary-glow);">
              <h2 class="text-xl font-heading font-bold text-center mb-6" style="color: var(--text-primary);">
                <?= $lang === 'hi' ? 'अभी Join करो — Free है' : 'Join Now — It\'s Free' ?>
              </h2>
              <?php include __DIR__ . '/../partials/waitlist-form.php'; ?>
            </div>
          </div>

          <!-- Benefits -->
          <div class="flex flex-col gap-4 max-w-lg mx-auto mt-10">
            <?php foreach ($pd['benefits'] ?? [] as $benefit): ?>
              <div class="flex items-start gap-3 text-sm" style="color: var(--text-secondary);">
                <span style="color: var(--accent); flex-shrink: 0;">🎁</span>
                <span><?= htmlspecialchars($benefit) ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    </main>

    <?php
    include __DIR__ . '/../partials/footer.php';
    break;

  // ===========================================================================
  // BLOG
  // ===========================================================================
  case 'blog':
    $title       = ($lang === 'hi' ? 'Shrutam Blog — Hindi में AI Education | SAAVI Tips' : 'Shrutam Blog — AI Education | SAAVI Tips') . ' | Shrutam';
    $description = $lang === 'hi'
      ? 'Science और Maths को Hindi में समझो। SAAVI style। Board exam tips, study hacks।'
      : 'Science and Maths explained simply. SAAVI style. Board exam tips, study hacks.';
    $canonical   = "{$baseUrl}/blog/";
    $schema      = '';

    include __DIR__ . '/../partials/head.php';
    include __DIR__ . '/../partials/nav.php';

    // Blog posts link to existing Hinglish /blog/ pages (no translated blogs yet)
    $posts = [
      ['slug' => 'photosynthesis-hindi', 'emoji' => '🔬', 'badge' => 'Science',
       'title'   => ($lang === 'hi' ? 'Photosynthesis क्या है — Simple Hindi में' : 'What is Photosynthesis — Simple Explanation'),
       'excerpt' => ($lang === 'hi' ? 'पेड़ का अपना kitchen — sunlight से खाना कैसे बनता है? SAAVI style में।' : "A plant's own kitchen — how does it make food from sunlight? SAAVI style.")],
      ['slug' => 'newton-laws-hindi', 'emoji' => '⚡', 'badge' => 'Physics',
       'title'   => ($lang === 'hi' ? 'Newton के 3 Laws — Hinglish में' : "Newton's 3 Laws — Simply Explained"),
       'excerpt' => ($lang === 'hi' ? 'Cricket ball, bus, aur zindagi — Newton ke laws sab jagah hain।' : "Cricket balls, buses, and life — Newton's laws are everywhere.")],
      ['slug' => 'fraction-tricks-hindi', 'emoji' => '➗', 'badge' => 'Maths',
       'title'   => ($lang === 'hi' ? 'Fractions के Tricks — Board Exam के लिए' : 'Fraction Tricks — For Board Exams'),
       'excerpt' => ($lang === 'hi' ? 'Fraction डर लगता है? SAAVI के साथ 10 मिनट में master करो।' : 'Scared of fractions? Master them in 10 minutes with SAAVI.')],
      ['slug' => 'blind-mode-guide', 'emoji' => '♿', 'badge' => 'Blind Mode',
       'title'   => ($lang === 'hi' ? 'Blind Mode Guide — Visually Impaired Students के लिए' : 'Blind Mode Guide — For Visually Impaired Students'),
       'excerpt' => ($lang === 'hi' ? 'Screen reader se kaise use karein SAAVI — step by step guide।' : 'How to use SAAVI with a screen reader — step by step.')],
      ['slug' => 'cbse-vs-cg-board', 'emoji' => '📋', 'badge' => 'Boards',
       'title'   => ($lang === 'hi' ? 'CBSE vs CG Board — Kya Farq Hai?' : "CBSE vs CG Board — What's the Difference?"),
       'excerpt' => ($lang === 'hi' ? 'Dono boards ka syllabus, exam pattern aur SAAVI support — ek comparison।' : "Both boards' syllabus, exam pattern and SAAVI support — a comparison.")],
    ];
    ?>

    <main id="main">
      <section class="section" aria-labelledby="blog-heading"
        style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
        <div class="container">
          <div class="text-center mb-4">
            <span class="badge badge-accent">✍️ <?= $lang === 'hi' ? 'SAAVI का Blog' : "SAAVI's Blog" ?></span>
          </div>
          <h1 id="blog-heading" class="text-5xl font-heading font-bold text-center mb-4 text-gradient">
            <?= $lang === 'hi' ? 'Shrutam Blog — समझो, सीखो, बढ़ो' : 'Shrutam Blog — Learn, Grow, Succeed' ?>
          </h1>
          <p class="text-lg text-center max-w-2xl mx-auto" style="color: var(--text-secondary);">
            <?= $lang === 'hi'
              ? 'Science, Maths और Board Exam की preparation — सब कुछ SAAVI style में।'
              : 'Science, Maths and Board Exam prep — all in SAAVI style.' ?>
          </p>
        </div>
      </section>

      <section class="section section-dark">
        <div class="container">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($posts as $post): ?>
              <article class="card animate-on-scroll flex flex-col gap-4" style="border-top: 3px solid var(--primary);">
                <div class="flex items-center gap-2">
                  <span class="badge badge-primary"><?= $post['emoji'] ?> <?= htmlspecialchars($post['badge']) ?></span>
                  <span class="text-xs" style="color: var(--text-muted);">Apr 2026</span>
                </div>
                <h2 class="font-heading font-bold text-xl" style="color: var(--text-primary);">
                  <a href="/<?= $lang ?>/blog/<?= htmlspecialchars($post['slug']) ?>/" style="color: inherit; text-decoration: none;">
                    <?= htmlspecialchars($post['title']) ?>
                  </a>
                </h2>
                <p class="text-sm flex-1" style="color: var(--text-secondary);"><?= htmlspecialchars($post['excerpt']) ?></p>
                <a href="/<?= $lang ?>/blog/<?= htmlspecialchars($post['slug']) ?>/" class="text-sm font-heading font-bold" style="color: var(--primary-light);">
                  <?= $lang === 'hi' ? 'पढ़ो →' : 'Read More →' ?>
                </a>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    </main>

    <?php
    include __DIR__ . '/../partials/footer.php';
    break;

  // ===========================================================================
  // FALLBACK
  // ===========================================================================
  default:
    http_response_code(404);
    include __DIR__ . '/../index.php';
    break;
}
