<?php
/**
 * templates/shared-page.php
 * Dispatcher for shared pages: features, pricing, blind-mode, saavi, faq, about, waitlist, blog
 * Variables set by router: $lang, $htmlLang, $t, $availableLangs, $currentPath, $pageType
 */

$baseUrl = "https://shrutam.ai/{$lang}";

switch ($pageType) {

  // ===========================================================================
  // FEATURES
  // ===========================================================================
  case 'features':
    $title       = ($lang === 'hi' ? 'SAAVI की 13 Super Powers — सभी Features' : "SAAVI's 13 Super Powers — All Features") . ' | Shrutam';
    $description = $lang === 'hi'
      ? 'Mother Tongue Learning, Adaptive AI, Blind Mode, Photo Doubt Solver, Mock Exams — सब हिंदी में।'
      : 'Mother Tongue Learning, Adaptive AI, Blind Mode, Photo Doubt Solver, Mock Exams — in your language.';
    $canonical = "{$baseUrl}/features/";
    $schema    = '';

    include __DIR__ . '/../partials/head.php';
    include __DIR__ . '/../partials/nav.php';

    $features = [
      ['emoji' => '🗣️', 'name' => ($lang === 'hi' ? 'मदर टंग लर्निंग'    : 'Mother Tongue Learning'),  'tagline' => ($lang === 'hi' ? 'पहले अपनी भाषा में समझो'            : 'Understand in your own language first')],
      ['emoji' => '🎯', 'name' => ($lang === 'hi' ? 'एडाप्टिव लर्निंग'    : 'Adaptive Learning'),       'tagline' => ($lang === 'hi' ? 'तुम्हारा पेस, तुम्हारा तरीका'        : 'Your pace, your way')],
      ['emoji' => '🧠', 'name' => ($lang === 'hi' ? 'इनफॉर्म्ड लर्निंग'  : 'Informed Learning'),      'tagline' => ($lang === 'hi' ? 'SAAVI तुम्हें जानती है'              : 'SAAVI knows your learning history')],
      ['emoji' => '📚', 'name' => ($lang === 'hi' ? 'रिविज़न मोड'          : 'Revision Mode'),           'tagline' => ($lang === 'hi' ? 'Exam से पहले 20 मिनट में Chapter'   : 'Full chapter in 20 min before exam')],
      ['emoji' => '🤖', 'name' => 'Ask Like 10',                            'tagline' => ($lang === 'hi' ? '9 और तरीकों से एक concept समझो'  : 'Understand one concept 10 different ways')],
      ['emoji' => '🏆', 'name' => 'Zero to Hero',                           'tagline' => ($lang === 'hi' ? 'कुछ नहीं से Board Ready'          : 'From nothing to board-ready')],
      ['emoji' => '📷', 'name' => ($lang === 'hi' ? 'फोटो डाउट सॉल्वर'   : 'Photo Doubt Solver'),      'tagline' => ($lang === 'hi' ? 'किताब का फोटो लो, जवाब पाओ'       : 'Snap a photo, get an instant answer')],
      ['emoji' => '🎬', 'name' => 'Reel Mode',                              'tagline' => ($lang === 'hi' ? '60 सेकंड में एक concept'           : '60-second audio concepts')],
      ['emoji' => '📝', 'name' => ($lang === 'hi' ? 'स्मार्ट एग्जाम नोट्स' : 'Smart Exam Notes'),       'tagline' => ($lang === 'hi' ? 'Audio + Printable notes'            : 'Audio + printable exam notes')],
      ['emoji' => '🧪', 'name' => ($lang === 'hi' ? 'मॉक एग्जाम'           : 'Mock Exams'),              'tagline' => ($lang === 'hi' ? 'Board जैसा exam, SAAVI feedback'    : 'Board-style exams with SAAVI feedback')],
      ['emoji' => '📊', 'name' => ($lang === 'hi' ? 'स्टूडेंट ट्रैकिंग'   : 'Student Tracking'),        'tagline' => ($lang === 'hi' ? 'Weak chapters, तुरंत alert'          : 'Weak chapter alerts, instant')],
      ['emoji' => '👨‍👩‍👧', 'name' => ($lang === 'hi' ? 'पेरेंट पोर्टल'    : 'Parent Portal'),           'tagline' => ($lang === 'hi' ? 'WhatsApp पर progress report'         : 'WhatsApp weekly progress reports')],
      ['emoji' => '♿', 'name' => ($lang === 'hi' ? 'ब्लाइंड मोड'          : 'Blind Mode'),              'tagline' => ($lang === 'hi' ? 'हमेशा मुफ़्त — भारत का पहला'       : 'FREE forever — India\'s first')],
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
            <?= $lang === 'hi' ? 'SAAVI की 13 Super Powers' : "SAAVI's 13 Super Powers" ?>
          </h1>
          <p class="text-xl max-w-2xl mx-auto mb-8" style="color: var(--text-body);">
            <?= $lang === 'hi'
              ? 'एक app — <strong style="color: var(--accent);">13 reasons</strong> तुम्हारा बच्चा आगे जाएगा।'
              : 'One app — <strong style="color: var(--accent);">13 reasons</strong> your child will succeed.' ?>
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
                  <div class="font-heading font-bold text-lg mb-1" style="color: var(--text-primary);"><?= htmlspecialchars($f['name']) ?></div>
                  <p class="text-sm" style="color: var(--text-secondary);"><?= htmlspecialchars($f['tagline']) ?></p>
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
    $title       = ($t['pricing']['headline'] ?? 'Private Tutor ₹3,000 vs SAAVI ₹199') . ' | Shrutam';
    $description = $lang === 'hi'
      ? '7 दिन free trial. No credit card. Cancel anytime. Blind mode हमेशा free.'
      : '7 day free trial. No credit card. Cancel anytime. Blind mode always free.';
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
            <?= htmlspecialchars($t['pricing']['headline'] ?? 'Private Tutor ₹3,000 vs SAAVI ₹199') ?>
          </h1>
          <p class="text-xl mb-8" style="color: var(--text-secondary);">
            <?= $lang === 'hi' ? '15 गुना सस्ता। 24x7 available। Hindi में। Blind mode हमेशा free।' : '15x cheaper. 24x7 available. In your language. Blind mode always free.' ?>
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
                  <?= strtoupper(htmlspecialchars($t['pricing']['free_trial'] ?? 'Free Trial')) ?>
                </div>
                <div class="text-xs font-bold uppercase tracking-widest mb-4" style="color: var(--text-muted);">
                  <?= htmlspecialchars($t['pricing']['free_trial_days'] ?? '7 days') ?>
                </div>
                <div class="stat-number mb-1">₹0</div>
                <div class="text-sm" style="color: var(--text-muted);">
                  <?= htmlspecialchars($t['pricing']['no_credit_card'] ?? 'No credit card required') ?>
                </div>
              </div>
              <ul class="flex flex-col gap-3 mb-8 flex-1" style="color: var(--text-secondary);">
                <?php
                $freeItems = $lang === 'hi'
                  ? ['2 Subjects', 'Basic SAAVI chat', 'रोज़ 5 doubts', 'Basic mock tests']
                  : ['2 subjects of your choice', 'Basic SAAVI chat', '5 doubts per day', 'Basic mock tests'];
                foreach ($freeItems as $item): ?>
                  <li class="flex items-center gap-3">
                    <span style="color: var(--success);">✓</span>
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
                <span class="badge badge-accent mb-3">
                  <?= $lang === 'hi' ? 'Most Popular' : 'Most Popular' ?>
                </span>
                <div class="text-4xl mb-3">⚡</div>
                <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">
                  <?= strtoupper(htmlspecialchars($t['pricing']['pro'] ?? 'Shrutam Pro')) ?>
                </div>
                <div class="stat-number mb-1">₹199</div>
                <div class="text-sm" style="color: var(--text-muted);">
                  /<?= $lang === 'hi' ? 'माह' : 'month' ?> · <?= $lang === 'hi' ? 'सभी subjects' : 'All subjects' ?>
                </div>
              </div>
              <ul class="flex flex-col gap-3 mb-8 flex-1" style="color: var(--text-secondary);">
                <?php
                $proItems = $lang === 'hi'
                  ? ['सभी 5 Subjects', 'Unlimited doubts', 'Photo Doubt Solver', 'Full mock exams + feedback', 'Smart exam notes', 'Parent Portal + WhatsApp reports', '♿ Blind Mode — हमेशा FREE']
                  : ['All 5 subjects', 'Unlimited doubts', 'Photo Doubt Solver', 'Full mock exams + feedback', 'Smart exam notes', 'Parent Portal + WhatsApp reports', '♿ Blind Mode — FREE forever'];
                foreach ($proItems as $item): ?>
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
                  <th><?= $lang === 'hi' ? 'Private Tutor' : 'Private Tutor' ?></th>
                  <th>BYJU's</th>
                  <th style="color: var(--accent);">Shrutam ✨</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $rows = $lang === 'hi' ? [
                  ['Price',           '₹3,000–₹8,000/माह',  '₹500–₹1,500/माह',  '₹199/माह'],
                  ['Language',        'Tutor पर depend',    'ज़्यादातर English', 'Hindi, English — native'],
                  ['Availability',    'Fixed hours',        'Recorded videos',  '24x7 — रात 2 बजे भी'],
                  ['Blind Support',   '✗ नहीं',             '✗ नहीं',           '✓ FREE forever'],
                  ['Internet',        'N/A',                'Heavy video',      'Low bandwidth — 2G/3G OK'],
                ] : [
                  ['Price',           '₹3,000–₹8,000/month', '₹500–₹1,500/month', '₹199/month'],
                  ['Language',        'Depends on tutor',    'Mostly English',     'Hindi, English — native'],
                  ['Availability',    'Fixed hours',         'Recorded videos',    '24x7 — even at 2 AM'],
                  ['Blind Support',   '✗ No',                '✗ No',               '✓ FREE forever'],
                  ['Internet',        'N/A',                 'Heavy video',        'Low bandwidth — 2G/3G OK'],
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
    $title       = ($lang === 'hi' ? 'Blind Mode — भारत का पहला AI Tutor Visually Impaired Students के लिए' : "Blind Mode — India's First AI Tutor for Visually Impaired Students") . ' | Shrutam';
    $description = $lang === 'hi'
      ? '50 लाख+ blind students के लिए — कोई "see the diagram" नहीं। Scribe cues, voice quiz, TalkBack/VoiceOver compatible। FREE forever।'
      : '50 lakh+ blind students — no "see the diagram". Scribe cues, voice quiz, TalkBack/VoiceOver compatible. FREE forever.';
    $canonical   = "{$baseUrl}/blind-mode/";
    $schema      = '';

    include __DIR__ . '/../partials/head.php';
    include __DIR__ . '/../partials/nav.php';

    $blindFeatures = $lang === 'hi' ? [
      ['No "See the Diagram"',        '"See the figure" कभी नहीं — सब कुछ शब्दों में'],
      ['Verbal Math',                 'Equations बोलकर — "x squared plus 3x minus 4 equals 0"'],
      ['Scribe Cues',                 'Board exam के लिए dictation cues — "[Scribe: capital P]"'],
      ['Voice Quiz',                  'Sab questions और answers spoken — keyboard या touch नहीं'],
      ['TalkBack/VoiceOver Support',  'Android TalkBack, iOS VoiceOver, NVDA, JAWS — सब supported'],
      ['Low Vision Mode',             'High contrast, large text, reduced animation'],
      ['FREE Forever',                'Accessibility के लिए कभी charge नहीं होगा — Aarambha का commitment'],
    ] : [
      ['No "See the Diagram"',        'Never "see the figure" — everything spoken in pure words'],
      ['Verbal Math',                 'Equations spoken aloud — "x squared plus 3x minus 4 equals 0"'],
      ['Scribe Cues',                 'Board exam dictation cues — "[Scribe: capital P]"'],
      ['Voice Quiz',                  'All questions and answers spoken — no keyboard or touch required'],
      ['TalkBack/VoiceOver Support',  'Android TalkBack, iOS VoiceOver, NVDA, JAWS — all supported'],
      ['Low Vision Mode',             'High contrast, large text, reduced animation'],
      ['FREE Forever',                'Accessibility is never charged — Aarambha\'s commitment'],
    ];
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
            <?= $lang === 'hi' ? 'आँखों की ज़रूरत नहीं — SAAVI है ना' : 'No Eyes Needed — SAAVI is Here' ?>
          </h1>
          <p class="text-xl mb-8" style="color: var(--text-body);">
            <?= $lang === 'hi'
              ? 'भारत में <strong style="color: var(--text-primary);">50 लाख+ blind school students</strong> हैं। उनके लिए BYJU\'s नहीं। Vedantu नहीं। कोई edtech नहीं। <strong style="color: var(--accent);">SAAVI है।</strong>'
              : 'India has <strong style="color: var(--text-primary);">50 lakh+ blind school students</strong>. No BYJU\'s for them. No Vedantu. No edtech. <strong style="color: var(--accent);">SAAVI is here.</strong>' ?>
          </p>
          <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary">
            <?= $lang === 'hi' ? 'Blind Mode Early Access — Free →' : 'Blind Mode Early Access — Free →' ?>
          </a>
        </div>
      </section>

      <section class="section section-dark">
        <div class="container">
          <h2 class="text-3xl font-heading font-bold text-center mb-10">
            <?= $lang === 'hi' ? '7 Dedicated Features' : '7 Dedicated Features' ?>
          </h2>
          <div class="flex flex-col gap-5 max-w-3xl mx-auto">
            <?php foreach ($blindFeatures as $i => $bf): ?>
              <div class="card animate-on-scroll flex items-start gap-4" style="border-left: 4px solid var(--primary);">
                <div class="w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold flex-shrink-0"
                  style="background: var(--primary-glow); color: var(--primary-light); border: 2px solid var(--primary);">
                  <?= $i + 1 ?>
                </div>
                <div>
                  <div class="font-heading font-bold mb-1" style="color: var(--text-primary);"><?= htmlspecialchars($bf[0]) ?></div>
                  <p class="text-sm" style="color: var(--text-secondary);"><?= htmlspecialchars($bf[1]) ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <blockquote class="max-w-2xl mx-auto mt-12 p-6 rounded-2xl text-center animate-on-scroll"
            style="background: var(--primary-glow); border: 2px solid var(--primary);">
            <p class="text-lg font-heading font-bold" style="color: var(--text-primary);">
              "<?= $lang === 'hi'
                ? 'Blind Mode का कोई charge नहीं होगा — कभी नहीं। यह हमारा commitment है।'
                : 'Blind Mode will never be charged — ever. That is our commitment.' ?>"
            </p>
            <cite class="mt-3 block text-sm" style="color: var(--accent);">— Founder, Aarambha</cite>
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
    $title       = ($lang === 'hi' ? 'SAAVI — AI Teacher दीदी | 24/7 | Blind Mode' : 'SAAVI — AI Teacher Didi | 24/7 | Blind Mode') . ' | Shrutam';
    $description = $lang === 'hi'
      ? 'SAAVI — तुम्हारी अपनी AI teacher। हिंदी में, रात 2 बजे भी, बिना judge किये।'
      : 'SAAVI — your own AI teacher. In your language, at 2 AM, without judgment.';
    $canonical   = "{$baseUrl}/saavi/";
    $schema      = '';

    include __DIR__ . '/../partials/head.php';
    include __DIR__ . '/../partials/nav.php';

    $traits = $lang === 'hi'
      ? ['😊 Patient', '❤️ Judge नहीं करती', '🗣️ Mother Tongue पहले', '⏰ 24/7', '♿ Blind-accessible', '📚 Board syllabus']
      : ['😊 Patient', '❤️ Never judges', '🗣️ Mother tongue first', '⏰ 24/7', '♿ Blind-accessible', '📚 Board syllabus'];

    $langRows = [
      ['hi', 'Hindi', 'हिंदी', 'प्रकाश-संश्लेषण वह प्रक्रिया है जिसमें पौधे सूर्य के प्रकाश से अपना भोजन बनाते हैं।'],
      ['en', 'English', 'English', 'Photosynthesis is the process by which plants make food using sunlight.'],
      ['hi', 'Hinglish', 'Hinglish', 'Plants sunlight se apna khana khud banate hain — ek natural solar kitchen!'],
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
                <?= $lang === 'hi' ? 'SAAVI — तेरी Teacher दीदी, 24/7' : 'SAAVI — Your Teacher Didi, 24/7' ?>
              </h1>
              <p class="text-xl mb-6" style="color: var(--text-body);">
                <?= $lang === 'hi'
                  ? 'रात 2 बजे doubt आया? SAAVI है। Hindi में समझना है? SAAVI है। Visually impaired हो? <strong style="color: var(--accent);">SAAVI तेरे लिए बनी है।</strong>'
                  : 'Got a doubt at 2 AM? SAAVI is there. Need it in Hindi? SAAVI speaks it. Visually impaired? <strong style="color: var(--accent);">SAAVI was built for you.</strong>' ?>
              </p>
              <div class="flex flex-wrap gap-2 mb-8">
                <?php foreach ($traits as $trait): ?>
                  <span class="pill" style="cursor: default;"><?= htmlspecialchars($trait) ?></span>
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
                <span class="text-xs font-bold uppercase mb-2 block" style="color: var(--accent);"><?= $lr[1] ?> (<?= $lr[2] ?>)</span>
                <p style="color: var(--text-body);"><?= htmlspecialchars($lr[3]) ?></p>
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
    $title       = ($lang === 'hi' ? 'FAQ — अक्सर पूछे जाने वाले सवाल' : 'FAQ — Frequently Asked Questions') . ' | Shrutam SAAVI';
    $description = $lang === 'hi'
      ? 'SAAVI, Blind Mode, pricing, boards — सब कुछ हिंदी में।'
      : 'SAAVI, Blind Mode, pricing, boards — everything answered.';
    $canonical   = "{$baseUrl}/faq/";
    $schema      = '';

    $faqs = $lang === 'hi' ? [
      ['q' => 'SAAVI कौन है?', 'a' => 'SAAVI (Study AI Assistant & Voice Intelligence) तुम्हारी AI teacher दीदी है। 24/7 available — रात को, सुबह को, कभी भी। Hindi, Hinglish, English, Telugu, Marathi में पढ़ाती है।'],
      ['q' => 'SAAVI कौन-सी languages में बोलती है?', 'a' => '5 languages — Hindi, Hinglish, English, Telugu, Marathi। Hinglish natively generate होती है, translate नहीं।'],
      ['q' => 'क्या SAAVI रात 2 बजे भी available है?', 'a' => 'हाँ! SAAVI 24/7 available है। रात को doubt आए तो पूछ लो।'],
      ['q' => 'Blind Mode क्या है?', 'a' => 'SAAVI का special mode blind और visually impaired students के लिए। कोई "see the diagram" नहीं — सब कुछ audio में।'],
      ['q' => 'क्या Blind Mode free है?', 'a' => 'हाँ, हमेशा free। Aarambha का commitment — Blind Mode का कोई charge नहीं।'],
      ['q' => 'App कब launch हो रहा है?', 'a' => 'May 20, 2026। Waitlist join करो — launch पर पहले access मिलेगा।'],
      ['q' => 'Free trial में क्या मिलता है?', 'a' => '7 दिन, 2 subjects, basic SAAVI chat, रोज़ 5 doubts, basic mock tests।'],
      ['q' => 'Credit card चाहिए?', 'a' => 'नहीं! Free trial के लिए कोई card नहीं चाहिए।'],
      ['q' => 'कौन-से boards supported हैं?', 'a' => 'CG Board (CGBSE) और CBSE। MP Board, Maharashtra SSC, AP Board जल्द आ रहे हैं।'],
      ['q' => 'NCERT exact chapters follow करता है?', 'a' => 'हाँ! हर chapter NCERT के exact नाम और sequence follow करता है।'],
    ] : [
      ['q' => 'Who is SAAVI?', 'a' => 'SAAVI (Study AI Assistant & Voice Intelligence) is your AI teacher didi. Available 24/7 — at night, in the morning, anytime. Teaches in Hindi, Hinglish, English, Telugu, and Marathi.'],
      ['q' => 'Which languages does SAAVI speak?', 'a' => '5 languages — Hindi, Hinglish, English, Telugu, Marathi. Hinglish is natively generated, not translated.'],
      ['q' => 'Is SAAVI available at 2 AM?', 'a' => 'Yes! SAAVI is available 24/7. Got a midnight doubt? Just ask.'],
      ['q' => 'What is Blind Mode?', 'a' => "SAAVI's special mode for blind and visually impaired students. No \"see the diagram\" — everything in audio."],
      ['q' => 'Is Blind Mode free?', 'a' => "Yes, always free. Aarambha's commitment — Blind Mode will never be charged."],
      ['q' => 'When does the app launch?', 'a' => 'May 20, 2026. Join the waitlist — get first access at launch.'],
      ['q' => 'What does the free trial include?', 'a' => '7 days, 2 subjects, basic SAAVI chat, 5 doubts per day, basic mock tests.'],
      ['q' => 'Do I need a credit card?', 'a' => 'No! No credit card required for the free trial.'],
      ['q' => 'Which boards are supported?', 'a' => 'CG Board (CGBSE) and CBSE. MP Board, Maharashtra SSC, AP Board coming soon.'],
      ['q' => 'Does it follow exact NCERT chapters?', 'a' => 'Yes! Every chapter follows exact NCERT names and sequence.'],
    ];

    include __DIR__ . '/../partials/head.php';
    include __DIR__ . '/../partials/nav.php';
    ?>

    <main id="main">
      <section class="section" aria-labelledby="faq-heading"
        style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
        <div class="container text-center max-w-2xl mx-auto">
          <span class="badge badge-primary mb-4">❓ FAQ</span>
          <h1 id="faq-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
            <?= $lang === 'hi' ? 'अक्सर पूछे जाने वाले सवाल' : 'Frequently Asked Questions' ?>
          </h1>
          <p class="text-xl" style="color: var(--text-secondary);">
            <?= $lang === 'hi'
              ? 'SAAVI, Blind Mode, pricing, boards — सब कुछ हिंदी में।'
              : 'SAAVI, Blind Mode, pricing, boards — everything answered.' ?>
          </p>
        </div>
      </section>

      <section class="section section-dark">
        <div class="container">
          <div class="max-w-3xl mx-auto flex flex-col gap-4">
            <?php foreach ($faqs as $faq): ?>
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
    $title       = ($lang === 'hi' ? 'Shrutam के बारे में — India का AI Education Mission' : 'About Shrutam — India\'s AI Education Mission') . ' | Aarambha';
    $description = $lang === 'hi'
      ? 'Shrutam क्यों बना? गाँव के students के लिए। Blind students के लिए। ₹3000 tutor afford नहीं कर पाते उनके लिए।'
      : 'Why was Shrutam built? For village students. For blind students. For those who cannot afford a ₹3000 tutor.';
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
            <?= $lang === 'hi' ? 'Shrutam का सफर — क्यों बना यह' : 'The Story of Shrutam — Why We Built This' ?>
          </h1>
          <p class="text-xl" style="color: var(--text-secondary);">
            <?= $lang === 'hi' ? '22 साल enterprise tech। एक सवाल। एक जवाब।' : '22 years enterprise tech. One question. One answer.' ?>
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
                  <div class="text-sm" style="color: var(--text-muted);"><?= $lang === 'hi' ? '22 साल enterprise technology' : '22 years enterprise technology' ?></div>
                </div>
              </div>
              <blockquote class="text-lg leading-relaxed" style="color: var(--text-body);">
                <?php if ($lang === 'hi'): ?>
                  <p class="mb-4">"मैंने 22 साल enterprise technology में काम किया। एक दिन सोचा — यह सब गाँव तक क्यों नहीं पहुँचा?</p>
                  <p class="mb-4">Millions of brilliant Indian minds are being left behind. Not because they lack intelligence. But because the tools speak the wrong language.</p>
                  <p>Shrutam is my answer."</p>
                <?php else: ?>
                  <p class="mb-4">"I spent 22 years in enterprise technology. One day I asked — why hasn't any of this reached the villages?</p>
                  <p class="mb-4">Millions of brilliant Indian minds are being left behind. Not because they lack intelligence. But because the tools speak the wrong language.</p>
                  <p>Shrutam is my answer."</p>
                <?php endif; ?>
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
            <p style="color: var(--text-body);">
              <?= $lang === 'hi'
                ? 'Vedic tradition में knowledge "Shruti" के through pass होता था — सुनने से। Guru बोलते थे, शिष्य सुनता था। SAAVI उसी tradition को modern AI के साथ लाती है।'
                : 'In the Vedic tradition, knowledge was passed through "Shruti" — by listening. The guru spoke, the student listened. SAAVI brings that tradition to modern AI.' ?>
            </p>
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
                <?= $lang === 'hi'
                  ? '"हर student को AI teacher मिलनी चाहिए —<br><span style="color: var(--accent);">उनकी भाषा में,</span><br><span style="color: var(--primary-light);">उनके pace पर,</span><br><span style="color: var(--success);">उनके budget में।"'
                  : '"Every student deserves an AI teacher —<br><span style="color: var(--accent);">in their language,</span><br><span style="color: var(--primary-light);">at their pace,</span><br><span style="color: var(--success);">within their budget.</span>"' ?>
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
    $title       = ($lang === 'hi' ? 'Waitlist Join करो — Free Early Access | AI Tutor Hindi' : 'Join Waitlist — Free Early Access | AI Tutor') . ' | Shrutam';
    $description = $lang === 'hi'
      ? 'Shrutam waitlist join करो — May 20, 2026 launch। Free 7 day trial। Early joiners को 30 दिन extended trial।'
      : 'Join the Shrutam waitlist — May 20, 2026 launch. Free 7 day trial. Early joiners get 30-day extended trial.';
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
              <?= $lang === 'hi' ? 'May 20 Launch — पहले List में आओ' : 'May 20 Launch — Be First in Line' ?>
            </h1>
            <p class="text-xl" style="color: var(--text-secondary);">
              <?= $lang === 'hi'
                ? 'Early joiners को मिलेगा <strong style="color: var(--accent);">30 दिन extended free trial</strong>। पहले 1,000 लोगों के लिए सिर्फ।'
                : 'Early joiners get a <strong style="color: var(--accent);">30-day extended free trial</strong>. First 1,000 people only.' ?>
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
          <div class="flex flex-wrap justify-center gap-6 mt-10 text-sm" style="color: var(--text-secondary);">
            <div class="flex items-center gap-2">
              <span style="color: var(--accent);">🎁</span>
              <span><strong style="color: var(--text-primary);"><?= $lang === 'hi' ? '30 दिन extended trial' : '30-day extended trial' ?></strong> — <?= $lang === 'hi' ? 'early joiners only' : 'early joiners only' ?></span>
            </div>
            <div class="flex items-center gap-2">
              <span style="color: var(--success);">✓</span>
              <span><?= $lang === 'hi' ? 'कोई credit card नहीं' : 'No credit card required' ?></span>
            </div>
            <div class="flex items-center gap-2">
              <span style="color: var(--success);">✓</span>
              <span><?= $lang === 'hi' ? 'कोई spam नहीं' : 'No spam' ?></span>
            </div>
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

    // Blog posts link to existing Hinglish /blog/ pages
    $posts = [
      ['slug' => 'photosynthesis-hindi', 'emoji' => '🔬', 'badge' => 'Science',
       'title' => ($lang === 'hi' ? 'Photosynthesis क्या है — Simple Hindi में' : 'What is Photosynthesis — Simple Explanation'),
       'excerpt' => ($lang === 'hi' ? 'पेड़ का अपना kitchen — sunlight से खाना कैसे बनता है? SAAVI style में।' : 'A plant\'s own kitchen — how does it make food from sunlight? SAAVI style.')],
      ['slug' => 'newton-laws-hindi', 'emoji' => '⚡', 'badge' => 'Physics',
       'title' => ($lang === 'hi' ? 'Newton के 3 Laws — Hinglish में' : "Newton's 3 Laws — Simply Explained"),
       'excerpt' => ($lang === 'hi' ? 'Cricket ball, bus, aur zindagi — Newton ke laws sab jagah hain।' : 'Cricket balls, buses, and life — Newton\'s laws are everywhere.')],
      ['slug' => 'fraction-tricks-hindi', 'emoji' => '➗', 'badge' => 'Maths',
       'title' => ($lang === 'hi' ? 'Fractions के Tricks — Board Exam के लिए' : 'Fraction Tricks — For Board Exams'),
       'excerpt' => ($lang === 'hi' ? 'Fraction डर लगता है? SAAVI के साथ 10 मिनट में master करो।' : 'Scared of fractions? Master them in 10 minutes with SAAVI.')],
      ['slug' => 'blind-mode-guide', 'emoji' => '♿', 'badge' => 'Blind Mode',
       'title' => ($lang === 'hi' ? 'Blind Mode Guide — Visually Impaired Students के लिए' : 'Blind Mode Guide — For Visually Impaired Students'),
       'excerpt' => ($lang === 'hi' ? 'Screen reader se kaise use karein SAAVI — step by step guide।' : 'How to use SAAVI with a screen reader — step by step.')],
      ['slug' => 'cbse-vs-cg-board', 'emoji' => '📋', 'badge' => 'Boards',
       'title' => ($lang === 'hi' ? 'CBSE vs CG Board — Kya Farq Hai?' : 'CBSE vs CG Board — What\'s the Difference?'),
       'excerpt' => ($lang === 'hi' ? 'Dono boards ka syllabus, exam pattern aur SAAVI support — ek comparison।' : 'Both boards\' syllabus, exam pattern and SAAVI support — a comparison.')],
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
                  <a href="/blog/<?= htmlspecialchars($post['slug']) ?>/" style="color: inherit; text-decoration: none;">
                    <?= htmlspecialchars($post['title']) ?>
                  </a>
                </h2>
                <p class="text-sm flex-1" style="color: var(--text-secondary);"><?= htmlspecialchars($post['excerpt']) ?></p>
                <a href="/blog/<?= htmlspecialchars($post['slug']) ?>/" class="text-sm font-heading font-bold" style="color: var(--primary-light);">
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
