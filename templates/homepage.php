<?php
/**
 * templates/homepage.php
 * Language-aware homepage for /hi/ and /en/
 * Variables set by router: $lang, $htmlLang, $t, $allBoards, $availableLangs, $currentPath
 */

require_once __DIR__ . '/../partials/_seo.php';

// Load page-specific content
$pagesFile = __DIR__ . "/../content/translations/pages-{$lang}.json";
$p = file_exists($pagesFile) ? json_decode(file_get_contents($pagesFile), true) : [];

$title       = htmlspecialchars(($p['hero']['h1_line1'] ?? '') . ' ' . ($p['hero']['h1_line2'] ?? '')) . ' | Shrutam SAAVI';
$description = $p['hero']['saavi_intro'] ?? ($t['hero']['body'] ?? 'SAAVI is your AI teacher. In your language. 24/7.');
$canonical   = "https://shrutam.ai/{$lang}/";

$schema = shrutam_schema_graph([
    [
        '@type'         => 'EducationalOrganization',
        '@id'           => 'https://shrutam.ai/#org',
        'name'          => 'Shrutam',
        'alternateName' => 'शृतम्',
        'legalName'     => 'Aarambha',
        'url'           => 'https://shrutam.ai/',
        'logo'          => 'https://shrutam.ai/assets/images/logo/shrutam-logo.png',
        'description'   => "India's audio-first AI learning platform for Class 5-10. Free Spoken English in Hindi/Marathi/Telugu. AI teacher SAAVI with blind-accessible mode.",
        'areaServed'    => ['@type' => 'Country', 'name' => 'India'],
        'sameAs'        => ['https://twitter.com/shrutam_ai', 'https://aarambhax.ai/'],
        'parentOrganization' => [
            '@type' => 'Organization',
            'name'  => 'Aarambha',
            'url'   => 'https://aarambhax.ai/',
        ],
    ],
    [
        '@type'       => 'Product',
        'name'        => 'Shrutam',
        'description' => 'Audio-first AI learning platform for Hindi-medium students, Class 5-10',
        'brand'       => shrutam_org_ref(),
        'offers'      => shrutam_pro_offer(),
    ],
    [
        '@type'      => 'WebSite',
        '@id'        => "https://shrutam.ai/{$lang}/#website",
        'url'        => $canonical,
        'name'       => 'Shrutam',
        'inLanguage' => $lang,
        'publisher'  => shrutam_org_ref(),
    ],
]);

include __DIR__ . '/../partials/head.php';
include __DIR__ . '/../partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       SECTION 1: HERO
       ======================================================== -->
  <section class="section" aria-labelledby="hero-heading"
    style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="grid grid-cols-1 lg:grid-cols-[1fr_300px] gap-6 items-start">

        <!-- Left: Copy -->
        <div>
          <!-- Brand -->
          <div class="flex items-baseline gap-3 mb-4">
            <span lang="hi" class="font-devanagari-heading text-3xl font-bold" style="color: var(--accent);">शृतम्</span>
            <span class="text-lg font-heading font-bold" style="color: var(--accent);">— Audio-First AI Personalized Learning App</span>
          </div>

          <!-- H1 + CTAs — 2 col on desktop -->
          <div class="grid grid-cols-1 md:grid-cols-[1fr_auto] gap-4 items-start mb-4">
            <div>
              <h1 id="hero-heading" class="text-3xl lg:text-4xl font-heading font-bold mb-2" style="color: var(--text-primary);">
                <?= htmlspecialchars($p['hero']['h1_line1'] ?? 'Every Child Will Get') ?><br>
                <span class="text-gradient"><?= htmlspecialchars($p['hero']['h1_line2'] ?? 'Their Own AI Teacher Didi') ?></span>
              </h1>
              <p class="text-lg" style="color: var(--text-body);">
                <?= htmlspecialchars($p['hero']['saavi_intro'] ?? 'SAAVI — who explains in your language, even at 2 AM, without ever judging you.') ?>
              </p>
            </div>
            <!-- CTAs -->
            <div class="flex flex-col gap-2">
              <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary whitespace-nowrap">
                <?= htmlspecialchars($t['hero']['cta_waitlist'] ?? 'Join Free Waitlist →') ?>
              </a>
              <a href="/<?= $lang ?>/saavi/" class="btn btn-outline whitespace-nowrap">
                <?= htmlspecialchars($t['hero']['cta_demo'] ?? 'Try SAAVI Demo') ?>
              </a>
              <p class="text-xs text-center" style="color: var(--text-muted);">May 20, 2026 · <?= htmlspecialchars($t['pricing']['no_credit_card'] ?? 'No credit card') ?></p>
            </div>
          </div>

          <!-- Learning journey -->
          <?php $journey = $p['hero']['journey'] ?? ['Listen', 'Watch', 'Practice', '🎮 Play', 'Learn!']; ?>
          <div class="flex flex-wrap items-center gap-2 mb-5 text-base font-heading font-bold">
            <?php foreach ($journey as $i => $step): ?>
              <?php
              $colors = ['var(--accent)', 'var(--primary-light)', 'var(--success)', 'var(--accent)', 'var(--text-primary)'];
              $color  = $colors[$i % count($colors)];
              ?>
              <?php if ($i > 0): ?>
                <span style="color: var(--text-muted);">→</span>
              <?php endif; ?>
              <span style="color: <?= $color ?>;"><?= htmlspecialchars($step) ?></span>
            <?php endforeach; ?>
          </div>

          <!-- 6 Value Props — 2×3 grid -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-5">
            <?php
            $vpColors = ['var(--accent)', 'var(--primary-light)', 'var(--accent)', 'var(--primary-light)', 'var(--accent)', 'var(--primary-light)'];
            foreach (($p['value_props'] ?? []) as $i => $vp):
              $c = $vpColors[$i % count($vpColors)];
            ?>
            <div class="p-4 rounded-lg" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
              <p class="text-base font-bold mb-1" style="color: <?= $c ?>;">
                <?= htmlspecialchars($vp['icon'] ?? '') ?> <?= htmlspecialchars($vp['title'] ?? '') ?>
              </p>
              <p class="text-sm" style="color: var(--text-body);"><?= htmlspecialchars($vp['body'] ?? '') ?></p>
            </div>
            <?php endforeach; ?>
          </div>

        </div>

        <!-- Right: SAAVI + chat demo -->
        <div class="flex flex-col gap-0 w-full">
          <!-- SAAVI avatar -->
          <div class="chalkboard w-full" style="border-radius: var(--radius-lg) var(--radius-lg) 0 0; border-bottom: none;">
            <img  width="1024"  height="1024" src="/assets/images/hero/saavi-teaching.png" alt="SAAVI didi teaching students" loading="lazy" class="w-full rounded-t-lg">
          </div>

          <!-- Chat demo -->
          <div id="saavi-chat-demo" class="flex flex-col gap-2 p-4 rounded-b-xl"
            style="background: var(--bg-elevated); border: 1px solid var(--border-subtle); border-top: none;"
            aria-label="SAAVI chat demonstration">
            <div class="flex items-center gap-2 pb-2 mb-1" style="border-bottom: 1px solid var(--border-subtle);">
              <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm" style="background: var(--primary-glow);">🤖</div>
              <div>
                <div class="font-heading font-bold text-xs" style="color: var(--text-primary);">SAAVI Didi</div>
                <div class="text-xs" style="color: var(--success);">● Online</div>
              </div>
            </div>
            <div class="chat-bubble chat-bubble-student" style="animation-delay: 0s;">
              <p class="text-xs"><?= htmlspecialchars($p['chat_demo']['student1'] ?? 'I didn\'t understand photosynthesis...') ?></p>
            </div>
            <div class="chat-bubble chat-bubble-saavi" style="animation-delay: 0.8s;">
              <p class="text-xs"><strong style="color: var(--accent);">SAAVI:</strong> <?= htmlspecialchars($p['chat_demo']['saavi1'] ?? 'Oh dear! Think of it as the tree\'s kitchen 🌱') ?></p>
            </div>
            <div class="chat-bubble chat-bubble-saavi" style="animation-delay: 1.6s;">
              <p class="text-xs"><?= htmlspecialchars($p['chat_demo']['saavi2'] ?? 'Sunlight = gas, CO₂ = ingredients, output = glucose + O₂') ?></p>
            </div>
            <div class="chat-bubble chat-bubble-student" style="animation-delay: 2.4s;">
              <p class="text-xs"><?= htmlspecialchars($p['chat_demo']['student2'] ?? 'Oh! Now it\'s crystal clear! 🎯') ?></p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: PROBLEM STATEMENT
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="problem-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="problem-heading" class="text-4xl font-heading font-bold mb-4">
          <?= htmlspecialchars($p['problem_section']['headline'] ?? 'The Struggles of India\'s 25 Crore Students') ?>
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          <?= htmlspecialchars($p['problem_section']['bottom_line'] ?? 'We are here to change all this.') ?>
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
        <?php
        $statColors = ['var(--error)', 'var(--warning)', 'var(--primary)'];
        foreach (($p['problem_section']['stats'] ?? []) as $i => $stat):
          $bc = $statColors[$i % count($statColors)];
        ?>
        <div class="card text-center animate-on-scroll" style="border-left: 4px solid <?= $bc ?>;">
          <div class="stat-number mb-2"><?= htmlspecialchars($stat['number'] ?? '') ?></div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);"><?= htmlspecialchars($stat['label'] ?? '') ?></div>
          <p class="text-sm" style="color: var(--text-secondary);"><?= htmlspecialchars($stat['desc'] ?? '') ?></p>
        </div>
        <?php endforeach; ?>
      </div>

      <p class="text-center text-lg font-heading font-bold" style="color: var(--accent);">
        <?= htmlspecialchars($p['problem_section']['saavi_line'] ?? 'SAAVI — for everyone, truly for everyone.') ?> 🇮🇳
      </p>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: COMPARISON — SAAVI Ka Fark
       ======================================================== -->
  <section class="section" aria-labelledby="comparison-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="comparison-heading" class="text-4xl font-heading font-bold mb-4">
          <?= htmlspecialchars($p['comparison']['headline'] ?? 'Other Apps Teach — SAAVI Explains') ?>
        </h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          <?= $lang === 'hi' ? 'एक बार देखो, खुद judge करो।' : 'See for yourself — judge it yourself.' ?>
        </p>
      </div>

      <div class="max-w-3xl mx-auto flex flex-col gap-4">
        <?php foreach (($p['comparison']['rows'] ?? []) as $row): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 animate-on-scroll">
          <div class="card" style="border-left: 4px solid var(--error);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--error);">
              <?= $lang === 'hi' ? 'Normal App' : 'Normal App' ?>
            </div>
            <p class="text-sm" style="color: var(--text-secondary);"><?= htmlspecialchars($row['normal'] ?? '') ?></p>
          </div>
          <div class="card" style="border-left: 4px solid var(--success);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">SAAVI</div>
            <p class="text-sm font-heading font-bold" style="color: var(--text-primary);"><?= htmlspecialchars($row['saavi'] ?? '') ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 4: 13 FEATURES GRID
       ======================================================== -->
  <?php
  $features = [
    ['emoji' => '🗣️', 'name_hi' => 'मातृभाषा में शिक्षा',    'name_en' => 'Mother Tongue Learning', 'sub_hi' => 'हिंदी, हिंग्लिश, तेलुगू — अपनी भाषा में SAAVI से सीखो।',      'sub_en' => 'Hindi, Hinglish, Telugu — learn with SAAVI in your own language.', 'link' => '/features/mother-tongue-learning/'],
    ['emoji' => '🎯', 'name_hi' => 'अनुकूली शिक्षा',         'name_en' => 'Adaptive Learning',      'sub_hi' => 'SAAVI तुम्हारा स्तर देखकर पढ़ाती है — न बहुत आसान, न बहुत कठिन।', 'sub_en' => 'SAAVI adapts to your level — not too easy, not too hard.',          'link' => '/features/adaptive-learning/'],
    ['emoji' => '🤖', 'name_hi' => '10 तरीक़े',              'name_en' => 'Ask Like 10',            'sub_hi' => 'एक concept 10 अलग-अलग तरीक़ों से पूछो — हर बार नया नज़रिया।',  'sub_en' => 'Ask one concept 10 different ways — SAAVI gives a new angle each time.', 'link' => '/features/ask-like-10/'],
    ['emoji' => '🏆', 'name_hi' => 'ज़ीरो से हीरो',          'name_en' => 'Zero to Hero',           'sub_hi' => 'prerequisites पहचानकर शुरू करो — board exam तक का पूरा रास्ता।', 'sub_en' => 'Identify prerequisites and start right — full path to board exam.',  'link' => '/features/zero-to-hero/'],
    ['emoji' => '📷', 'name_hi' => 'फ़ोटो से हल',            'name_en' => 'Photo Doubt Solver',     'sub_hi' => 'किताब का फ़ोटो लो — SAAVI सेकेंड में हिंदी में समझाती है।',      'sub_en' => 'Click a photo of your textbook — SAAVI explains it in seconds.',      'link' => '/features/photo-doubt-solver/'],
    ['emoji' => '📝', 'name_hi' => 'मॉक परीक्षा',            'name_en' => 'Mock Exams',             'sub_hi' => 'Board pattern पर full mock test — detailed feedback के साथ।',    'sub_en' => 'Full mock test on board pattern — with detailed feedback.',           'link' => '/features/mock-exams/'],
    ['emoji' => '📚', 'name_hi' => 'रिवीज़न मोड',            'name_en' => 'Revision Mode',          'sub_hi' => 'Quick audio revision — परीक्षा से एक दिन पहले भी पूरा chapter।', 'sub_en' => 'Quick audio revision — complete the chapter even a day before exam.',  'link' => '/features/revision-mode/'],
    ['emoji' => '🗣️', 'name_hi' => 'बोलचाल की अंग्रेज़ी',   'name_en' => 'Spoken English',         'sub_hi' => 'Hindi medium से Spoken English — SAAVI के साथ daily practice।',  'sub_en' => 'Hindi medium to Spoken English — daily practice with SAAVI.',         'link' => '/features/spoken-english/'],
    ['emoji' => '📋', 'name_hi' => 'परीक्षा नोट्स',          'name_en' => 'Exam Notes',             'sub_hi' => 'Auto-generated chapter notes हिंदी में — print करो या audio में सुनो।', 'sub_en' => 'Auto-generated chapter notes — print or listen in audio.',      'link' => '/features/exam-notes/'],
    ['emoji' => '📊', 'name_hi' => 'प्रगति ट्रैकर',          'name_en' => 'Student Tracking',       'sub_hi' => 'कौनसा chapter कमज़ोर है? SAAVI track करती है और remind करती है।', 'sub_en' => 'Which chapter is weak? SAAVI tracks and reminds.',                    'link' => '/features/student-tracking/'],
    ['emoji' => '👨‍👩‍👧', 'name_hi' => 'पैरेंट ऐप',         'name_en' => 'Parent Portal',          'sub_hi' => 'बच्चे की progress WhatsApp पर — daily report, weekly summary।',  'sub_en' => 'Child\'s progress on WhatsApp — daily report, weekly summary.',       'link' => '/features/parent-portal/'],
    ['emoji' => '🎬', 'name_hi' => 'रील मोड',                'name_en' => 'Reel Mode',              'sub_hi' => 'TikTok की तरह — 60 सेकेंड audio reels में एक concept।',         'sub_en' => 'Like TikTok — one concept in 60-second audio reels.',                 'link' => '/features/reel-mode/'],
    ['emoji' => '♿', 'name_hi' => 'ब्लाइंड मोड',            'name_en' => 'Blind Mode',             'sub_hi' => 'भारत का पहला AI tutor जो blind बच्चों के लिए भी है — हमेशा मुफ़्त।', 'sub_en' => 'India\'s first AI tutor for blind students — FREE forever.',    'link' => '/blind-mode/'],
  ];
  ?>
  <section class="section" aria-labelledby="features-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="features-heading" class="text-4xl font-heading font-bold mb-4">
          <?= $lang === 'hi' ? 'SAAVI की 13 Super Powers' : 'SAAVI\'s 13 Super Powers' ?>
        </h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          <?= $lang === 'hi' ? 'एक app, सब कुछ। Students से parents तक सब cover।' : 'One app, everything covered. From students to parents.' ?>
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <?php foreach ($features as $i => $f):
          $isLast = ($i === count($features) - 1);
        ?>
        <?php if ($isLast): ?>
        <!-- Last card: Reel Mode spans full width -->
        <div class="card animate-on-scroll flex flex-col gap-3 sm:col-span-2 lg:col-span-4">
          <div class="flex flex-col sm:flex-row gap-4 items-start">
            <div class="text-4xl"><?= $f['emoji'] ?></div>
            <div class="flex-1">
              <div class="font-heading font-bold text-lg" style="color: var(--text-primary);"><?= htmlspecialchars($f['name_' . $lang]) ?></div>
              <p class="text-sm mt-1" style="color: var(--text-secondary);"><?= htmlspecialchars($f['sub_' . $lang]) ?></p>
            </div>
            <a href="/<?= $lang ?><?= htmlspecialchars($f['link']) ?>" class="btn btn-outline text-sm self-start">
              <?= $lang === 'hi' ? 'जानो →' : 'Learn more →' ?>
            </a>
          </div>
        </div>
        <?php else: ?>
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl"><?= $f['emoji'] ?></div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);"><?= htmlspecialchars($f['name_' . $lang]) ?></div>
            <p class="text-sm mt-1" style="color: var(--text-secondary);"><?= htmlspecialchars($f['sub_' . $lang]) ?></p>
          </div>
          <a href="/<?= $lang ?><?= htmlspecialchars($f['link']) ?>" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            <?= $lang === 'hi' ? 'जानो →' : 'Learn more →' ?>
          </a>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 5: PRICING PREVIEW
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="pricing-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="pricing-heading" class="text-4xl font-heading font-bold mb-4">
          <?= htmlspecialchars($t['pricing']['headline'] ?? 'Private Tutor ₹3,000 vs SAAVI ₹199') ?>
        </h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          <?= $lang === 'hi' ? 'समझो — बाक़ी apps से क्या फ़र्क़ है? Numbers बोलते हैं।' : 'Understand the difference from other apps — numbers say it all.' ?>
        </p>
      </div>

      <!-- Plan cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-2xl mx-auto mb-12">

        <!-- Free Trial -->
        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-2">🎁</div>
          <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">
            <?= htmlspecialchars($t['pricing']['free_trial'] ?? 'Free Trial') ?>
          </div>
          <div class="stat-number mb-4">₹0</div>
          <ul class="text-sm space-y-2 mb-6 text-left" style="color: var(--text-secondary);">
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span>
              <?= $lang === 'hi' ? '30 दिन पूरा access' : '30-day full access' ?>
            </li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span>
              <?= $lang === 'hi' ? 'सभी 5 भाषाएँ' : 'All 5 languages' ?>
            </li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span>
              <?= $lang === 'hi' ? 'Blind Mode — हमेशा मुफ़्त' : 'Blind Mode — forever free' ?>
            </li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span>
              <?= htmlspecialchars($t['pricing']['no_credit_card'] ?? 'No credit card required') ?>
            </li>
          </ul>
          <a href="/<?= $lang ?>/waitlist/" class="btn btn-outline w-full justify-center">
            <?= $lang === 'hi' ? 'Waitlist जॉइन करो →' : 'Join Waitlist →' ?>
          </a>
        </div>

        <!-- Pro Plan -->
        <div class="card text-center animate-on-scroll" style="border: 2px solid var(--accent); box-shadow: 0 0 30px var(--accent-glow);">
          <span class="badge badge-accent mb-3">
            <?= $lang === 'hi' ? 'सबसे लोकप्रिय' : 'Most Popular' ?>
          </span>
          <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">
            <?= htmlspecialchars($t['pricing']['pro'] ?? 'Shrutam Pro') ?>
          </div>
          <div class="stat-number mb-1">₹199</div>
          <div class="text-sm mb-4" style="color: var(--text-muted);">
            /<?= $lang === 'hi' ? 'माह' : 'month' ?> · <?= $lang === 'hi' ? 'सभी विषय · सभी कक्षाएँ' : 'All subjects · All classes' ?>
          </div>
          <ul class="text-sm space-y-2 mb-6 text-left" style="color: var(--text-secondary);">
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span>
              <?= $lang === 'hi' ? 'SAAVI के साथ असीमित sessions' : 'Unlimited SAAVI sessions' ?>
            </li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span>
              <?= $lang === 'hi' ? 'Mock exams + detailed feedback' : 'Mock exams + detailed feedback' ?>
            </li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span>
              <?= $lang === 'hi' ? 'Parent progress reports' : 'Parent progress reports' ?>
            </li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span>
              <?= $lang === 'hi' ? 'Photo doubt solver' : 'Photo doubt solver' ?>
            </li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span>
              <?= $lang === 'hi' ? 'Reel Mode + Revision Mode' : 'Reel Mode + Revision Mode' ?>
            </li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span>
              <?= $lang === 'hi' ? 'Zero to Hero path' : 'Zero to Hero path' ?>
            </li>
          </ul>
          <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary w-full justify-center">
            <?= $lang === 'hi' ? 'Launch पर पहले पाओ →' : 'Get Early Access →' ?>
          </a>
        </div>

      </div>

      <!-- Comparison table -->
      <div class="max-w-3xl mx-auto overflow-x-auto rounded-xl" style="border: 1px solid var(--border-subtle);">
        <table class="comparison-table">
          <thead>
            <tr>
              <th><?= $lang === 'hi' ? 'विशेषता' : 'Feature' ?></th>
              <th><?= $lang === 'hi' ? 'Private Tutor' : 'Private Tutor' ?></th>
              <th>BYJU's / Unacademy</th>
              <th style="color: var(--accent);">Shrutam ✨</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= $lang === 'hi' ? 'मासिक लागत' : 'Monthly Cost' ?></td>
              <td>₹3,000–₹8,000</td>
              <td>₹500–₹1,500</td>
              <td style="color: var(--success); font-weight: 600;">₹199</td>
            </tr>
            <tr>
              <td><?= $lang === 'hi' ? 'हिंदी माध्यम' : 'Hindi Medium' ?></td>
              <td><?= $lang === 'hi' ? 'tutor पर निर्भर' : 'Depends on tutor' ?></td>
              <td style="color: var(--error);"><?= $lang === 'hi' ? 'ज़्यादातर अंग्रेज़ी' : 'Mostly English' ?></td>
              <td style="color: var(--success); font-weight: 600;">✅ <?= $lang === 'hi' ? 'Native' : 'Native' ?></td>
            </tr>
            <tr>
              <td><?= $lang === 'hi' ? 'Blind Mode' : 'Blind Mode' ?></td>
              <td style="color: var(--error);">❌</td>
              <td style="color: var(--error);">❌</td>
              <td style="color: var(--success); font-weight: 600;">✅ <?= $lang === 'hi' ? 'हमेशा मुफ़्त' : 'FREE Forever' ?></td>
            </tr>
            <tr>
              <td><?= $lang === 'hi' ? '24×7 उपलब्ध' : 'Available 24×7' ?></td>
              <td style="color: var(--error);">❌</td>
              <td><?= $lang === 'hi' ? 'केवल recorded' : 'Recorded only' ?></td>
              <td style="color: var(--success); font-weight: 600;">✅ <?= $lang === 'hi' ? 'Live AI' : 'Live AI' ?></td>
            </tr>
            <tr>
              <td><?= $lang === 'hi' ? 'Adaptive Learning' : 'Adaptive Learning' ?></td>
              <td><?= $lang === 'hi' ? 'कभी-कभी' : 'Sometimes' ?></td>
              <td style="color: var(--error);">❌</td>
              <td style="color: var(--success); font-weight: 600;">✅ <?= $lang === 'hi' ? 'हमेशा' : 'Always' ?></td>
            </tr>
            <tr>
              <td><?= $lang === 'hi' ? 'CG Board Syllabus' : 'CG Board Syllabus' ?></td>
              <td><?= $lang === 'hi' ? 'निर्भर करता है' : 'Depends' ?></td>
              <td style="color: var(--error);">❌</td>
              <td style="color: var(--success); font-weight: 600;">✅ Native</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="text-center mt-8">
        <a href="/<?= $lang ?>/pricing/" class="btn btn-outline">
          <?= $lang === 'hi' ? 'पूरी Pricing देखो →' : 'See Full Pricing →' ?>
        </a>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 6: LAUNCH COUNTDOWN + CTA
       ======================================================== -->
  <section class="section" aria-labelledby="countdown-heading"
    style="background: linear-gradient(160deg, var(--bg-base) 40%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-accent mb-4">🚀 <?= $lang === 'hi' ? 'Launch जल्द आ रहा है' : 'Launch Coming Up' ?></span>
        <h2 id="countdown-heading" class="text-4xl font-heading font-bold mb-4">
          <?= $lang === 'hi' ? 'May 20 Launch — पहले List में आओ' : 'May 20 Launch — Be First in Line' ?>
        </h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          <?= $lang === 'hi'
            ? 'Early joiners को मिलेगा <strong style="color: var(--accent);">30 दिन extended free trial</strong> — सिर्फ पहले 1,000 लोगों के लिए।'
            : 'Early joiners get a <strong style="color: var(--accent);">30-day extended free trial</strong> — only for the first 1,000 people.' ?>
        </p>
      </div>

      <!-- Countdown digits -->
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

      <!-- Waitlist form -->
      <div class="max-w-lg mx-auto animate-on-scroll">
        <div class="card" style="border: 2px solid var(--border-default); box-shadow: 0 0 40px var(--primary-glow);">
          <h3 class="text-xl font-heading font-bold text-center mb-6" style="color: var(--text-primary);">
            <?= $lang === 'hi' ? 'अभी Join करो — मुफ़्त है 🎉' : 'Join Now — It\'s Free 🎉' ?>
          </h3>
          <?php include __DIR__ . '/../partials/waitlist-form.php'; ?>
        </div>
      </div>

      <!-- Benefits below form -->
      <div class="flex flex-wrap justify-center gap-6 mt-8 text-sm" style="color: var(--text-secondary);">
        <div class="flex items-center gap-2">
          <span style="color: var(--success);">✓</span>
          <span><?= $lang === 'hi' ? '30 दिन extended trial' : '30-day extended trial' ?></span>
        </div>
        <div class="flex items-center gap-2">
          <span style="color: var(--success);">✓</span>
          <span><?= $lang === 'hi' ? 'Launch-day notification' : 'Launch-day notification' ?></span>
        </div>
        <div class="flex items-center gap-2">
          <span style="color: var(--success);">✓</span>
          <span><?= htmlspecialchars($t['pricing']['no_credit_card'] ?? 'No credit card needed') ?></span>
        </div>
        <div class="flex items-center gap-2">
          <span style="color: var(--success);">✓</span>
          <span><?= $lang === 'hi' ? 'Launch पर priority access' : 'Priority access on launch' ?></span>
        </div>
      </div>

    </div>
  </section>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
