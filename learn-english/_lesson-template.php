<?php
/**
 * Shared lesson page renderer for the Spoken English course.
 *
 * Each day's index.php is a 5-line stub:
 *   <?php
 *   $day  = 1;
 *   $lang = 'hi';
 *   require __DIR__ . '/../../_lesson-template.php';
 *
 * This file: loads SEO + content, sets up head.php variables,
 * and renders the full lesson page with branded styling.
 */

require_once __DIR__ . '/_helpers.php';
$courseContent = require __DIR__ . '/course-content.php';

if (!isset($day, $lang)) {
    http_response_code(500);
    exit('Lesson template requires $day and $lang.');
}

$seo     = learn_english_seo($day, $lang);
$content = $courseContent[$day] ?? null;

// Variables that partials/head.php expects
$title       = $seo['title'];
$description = $seo['description'];
$canonical   = $seo['canonical'];
$htmlLang    = ['hi' => 'hi-IN', 'mr' => 'mr-IN', 'te' => 'te-IN'][$lang];
$langDir     = ['hi' => 'hindi', 'mr' => 'marathi', 'te' => 'telugu'][$lang];
$og_image    = 'https://shrutam.ai/assets/images/og/learn-english.png';

// Course + Breadcrumb schema (per-page rich results)
$schema = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'            => 'Course',
            'name'             => $seo['title'],
            'description'      => $seo['description'],
            'url'              => $seo['canonical'],
            'inLanguage'       => $lang,
            'educationalLevel' => 'Beginner',
            'timeRequired'     => 'PT25M',
            'provider'         => [
                '@type' => 'Organization',
                'name'  => 'Shrutam',
                'url'   => 'https://shrutam.ai/',
            ],
            'isAccessibleForFree' => true,
            'offers' => [
                '@type'         => 'Offer',
                'price'         => '0',
                'priceCurrency' => 'INR',
                'category'      => 'Free',
            ],
        ],
        [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Shrutam',     'item' => 'https://shrutam.ai/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Learn English','item' => 'https://shrutam.ai/learn-english/'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => ucfirst($langDir), 'item' => "https://shrutam.ai/learn-english/{$langDir}/"],
                ['@type' => 'ListItem', 'position' => 4, 'name' => "Day {$day}",    'item' => $seo['canonical']],
            ],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

// Per-language UI strings
$ui = [
    'hi' => [
        'whats_in_lesson'  => 'इस Day में क्या सीखेंगे',
        'hook_label'       => 'कहानी से शुरुआत',
        'examples_label'   => 'ज़रूरी English Sentences',
        'mistake_label'    => 'आम गलती जो SAAVI सुधारेगी',
        'visual_label'     => 'Visual / Animation Idea',
        'prev'             => '← पिछला Day',
        'next'             => 'अगला Day →',
        'back_to_course'   => '← पूरा Course देखें',
        'wrong'            => 'गलत',
        'right'            => 'सही',
        'cta_title'        => 'SAAVI के साथ Audio में सुनें',
        'cta_text'         => 'पूरा interactive lesson, audio practice और animation Shrutam app पर मिलेगा। Free!',
        'cta_button'       => 'Free Trial शुरू करें',
        'duration'         => '~25 मिनट · मुफ्त · हर level के लिए',
    ],
    'mr' => [
        'whats_in_lesson'  => 'या Day मध्ये काय शिकाल',
        'hook_label'       => 'कथेने सुरुवात',
        'examples_label'   => 'महत्त्वाची English वाक्ये',
        'mistake_label'    => 'सामान्य चूक — SAAVI सुधारेल',
        'visual_label'     => 'Visual / Animation Idea',
        'prev'             => '← मागील Day',
        'next'             => 'पुढील Day →',
        'back_to_course'   => '← संपूर्ण Course पहा',
        'wrong'            => 'चूक',
        'right'            => 'बरोबर',
        'cta_title'        => 'SAAVI सोबत Audio मध्ये ऐका',
        'cta_text'         => 'पूर्ण interactive lesson, audio practice आणि animation Shrutam app वर मिळेल. मोफत!',
        'cta_button'       => 'Free Trial सुरू करा',
        'duration'         => '~25 मिनिटे · मोफत · प्रत्येक level साठी',
    ],
    'te' => [
        'whats_in_lesson'  => 'ఈ Day లో మీరు నేర్చుకునేవి',
        'hook_label'       => 'కథతో మొదలుపెట్టండి',
        'examples_label'   => 'ముఖ్యమైన English వాక్యాలు',
        'mistake_label'    => 'సాధారణ తప్పు — SAAVI సరిచేస్తుంది',
        'visual_label'     => 'Visual / Animation Idea',
        'prev'             => '← మునుపటి Day',
        'next'             => 'తదుపరి Day →',
        'back_to_course'   => '← పూర్తి Course చూడండి',
        'wrong'            => 'తప్పు',
        'right'            => 'సరైనది',
        'cta_title'        => 'SAAVI తో Audio లో వినండి',
        'cta_text'         => 'పూర్తి interactive lesson, audio practice మరియు animation Shrutam app లో లభిస్తుంది. ఉచితం!',
        'cta_button'       => 'Free Trial ప్రారంభించండి',
        'duration'         => '~25 నిమిషాలు · ఉచితం · ప్రతి level కోసం',
    ],
][$lang];

// Prev/Next navigation
$prevDay = $day > 1 ? $day - 1 : null;
$nextDay = $day < 50 ? $day + 1 : null;
$prevSeo = $prevDay ? learn_english_seo($prevDay, $lang) : null;
$nextSeo = $nextDay ? learn_english_seo($nextDay, $lang) : null;

include __DIR__ . '/../partials/head.php';
?>

<style>
  .lesson-shell{max-width:880px;margin:0 auto;padding:1.5rem 1.2rem 4rem}
  nav.crumb{font-size:.85rem;color:var(--text-muted);margin-bottom:1rem}
  nav.crumb a{color:var(--primary-light)}
  .lesson-hero{background:var(--bg-surface);border:1px solid var(--border-subtle);border-radius:var(--radius-lg);padding:1.6rem;margin-bottom:1.4rem}
  .lesson-hero .day-tag{display:inline-block;background:var(--accent-glow);color:var(--accent-light);padding:.25rem .7rem;border-radius:999px;font-size:.78rem;font-weight:700;letter-spacing:.04em;margin-bottom:.6rem}
  .lesson-hero h1{font-size:1.65rem;line-height:1.25;margin-bottom:.4rem}
  .lesson-hero .topic-en{color:var(--text-muted);font-size:.95rem;margin-bottom:.7rem}
  .lesson-hero p.lesson-intro{color:var(--text-body);font-size:1rem}
  .lesson-hero .meta-row{margin-top:.9rem;font-size:.85rem;color:var(--text-secondary)}
  .lesson-hero .meta-row span{margin-right:1rem}
  section.lesson-section{margin:2rem 0}
  section.lesson-section h2{font-size:1.2rem;border-left:4px solid var(--accent);padding-left:.8rem;margin-bottom:.9rem;color:var(--text-primary)}
  ul.concepts{list-style:none;padding:0;display:grid;gap:.5rem}
  ul.concepts li{background:var(--bg-surface);border:1px solid var(--border-subtle);border-radius:var(--radius-sm);padding:.7rem .9rem;font-size:.95rem;color:var(--text-body);position:relative;padding-left:2.2rem}
  ul.concepts li::before{content:"✓";position:absolute;left:.85rem;color:var(--success);font-weight:700}
  .hook-card{background:var(--bg-surface);border:1px solid var(--border-subtle);border-left:4px solid var(--primary);border-radius:var(--radius);padding:1rem 1.2rem;font-style:italic;color:var(--text-body)}
  .examples-grid{display:grid;gap:.7rem}
  .example-card{background:var(--bg-surface);border:1px solid var(--border-subtle);border-radius:var(--radius-sm);padding:.85rem 1rem}
  .example-card .ex-en{font-weight:700;color:var(--text-primary);font-size:1rem}
  .example-card .ex-pron{color:var(--text-muted);font-size:.88rem;font-style:italic;display:block;margin-top:.15rem}
  .example-card .ex-trans{color:var(--text-secondary);font-size:.92rem;margin-top:.35rem}
  .mistake-card{background:var(--bg-surface);border:1px solid rgba(239,68,68,.25);border-radius:var(--radius);padding:1rem 1.2rem}
  .mistake-card .wrong{color:var(--error);font-weight:600;display:block;margin-bottom:.3rem}
  .mistake-card .wrong::before{content:"✗ ";font-weight:700}
  .mistake-card .right{color:var(--success);font-weight:600;display:block;margin-bottom:.5rem}
  .mistake-card .right::before{content:"✓ ";font-weight:700}
  .mistake-card .saavi-says{color:var(--text-secondary);font-size:.92rem;font-style:italic;border-top:1px solid var(--border-subtle);padding-top:.5rem;margin-top:.5rem}
  .visual-card{background:var(--bg-surface);border:1px solid var(--border-subtle);border-radius:var(--radius-sm);padding:.9rem 1.1rem;color:var(--text-secondary);font-size:.93rem}
  .lesson-cta{background:linear-gradient(135deg,var(--primary) 0%,var(--accent) 100%);border-radius:var(--radius-lg);padding:1.6rem;text-align:center;margin:2rem 0;color:var(--text-inverse)}
  .lesson-cta h3{color:var(--text-inverse);font-size:1.2rem;margin-bottom:.5rem}
  .lesson-cta p{color:var(--text-inverse);opacity:.9;margin-bottom:1rem;font-size:.95rem}
  .lesson-cta a.btn{display:inline-block;background:var(--text-inverse);color:var(--primary);padding:.7rem 1.4rem;border-radius:var(--radius);font-weight:700;text-decoration:none}
  nav.lesson-nav{display:flex;justify-content:space-between;gap:.7rem;margin-top:2rem;flex-wrap:wrap}
  nav.lesson-nav a{flex:1;min-width:140px;background:var(--bg-surface);border:1px solid var(--border-subtle);border-radius:var(--radius-sm);padding:.85rem 1rem;color:var(--text-body);text-decoration:none;font-size:.9rem}
  nav.lesson-nav a:hover{border-color:var(--accent);color:var(--accent-light)}
  nav.lesson-nav a.next{text-align:right}
  nav.lesson-nav a strong{color:var(--text-primary);display:block;font-size:.95rem;margin-top:.15rem}
  .back-link{display:inline-block;margin:.6rem 0 1.4rem;color:var(--primary-light);font-size:.9rem}
</style>

<main id="main" class="lesson-shell">

  <nav class="crumb" aria-label="Breadcrumb">
    <a href="/">Shrutam</a> ›
    <a href="/learn-english/">Learn English</a> ›
    <a href="/learn-english/<?= $langDir ?>/"><?= ucfirst($langDir) ?></a> ›
    <span>Day <?= $day ?></span>
  </nav>

  <article class="lesson-hero">
    <span class="day-tag">DAY <?= $day ?> · 50-DAY ENGLISH CHALLENGE</span>
    <h1><?= htmlspecialchars($seo['topic'], ENT_QUOTES, 'UTF-8') ?></h1>
    <div class="topic-en"><?= htmlspecialchars($seo['topic_en'], ENT_QUOTES, 'UTF-8') ?></div>
    <p class="lesson-intro"><?= htmlspecialchars($seo['description'], ENT_QUOTES, 'UTF-8') ?></p>
    <div class="meta-row">
      <span>📚 <?= htmlspecialchars($ui['duration'], ENT_QUOTES, 'UTF-8') ?></span>
    </div>
  </article>

<?php if ($content): ?>

  <?php if (!empty($content['core_concepts'])): ?>
  <section class="lesson-section">
    <h2><?= htmlspecialchars($ui['whats_in_lesson'], ENT_QUOTES, 'UTF-8') ?></h2>
    <ul class="concepts">
      <?php foreach ($content['core_concepts'] as $concept): ?>
        <li><?= htmlspecialchars($concept, ENT_QUOTES, 'UTF-8') ?></li>
      <?php endforeach; ?>
    </ul>
  </section>
  <?php endif; ?>

  <?php if (!empty($content['hook'])): ?>
  <section class="lesson-section">
    <h2><?= htmlspecialchars($ui['hook_label'], ENT_QUOTES, 'UTF-8') ?></h2>
    <div class="hook-card">"<?= htmlspecialchars($content['hook'], ENT_QUOTES, 'UTF-8') ?>"</div>
  </section>
  <?php endif; ?>

  <?php if (!empty($content['examples'])): ?>
  <section class="lesson-section">
    <h2><?= htmlspecialchars($ui['examples_label'], ENT_QUOTES, 'UTF-8') ?></h2>
    <div class="examples-grid">
      <?php foreach ($content['examples'] as $ex): ?>
      <div class="example-card">
        <span class="ex-en"><?= htmlspecialchars($ex['en'], ENT_QUOTES, 'UTF-8') ?></span>
        <?php if (!empty($ex['pron'])): ?>
          <span class="ex-pron">(<?= htmlspecialchars($ex['pron'], ENT_QUOTES, 'UTF-8') ?>)</span>
        <?php endif; ?>
        <?php
          $transKey = $lang;
          $trans    = $ex[$transKey] ?? $ex['hi'] ?? null;
        ?>
        <?php if ($trans): ?>
          <div class="ex-trans">→ <?= htmlspecialchars($trans, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endif; ?>

  <?php if (!empty($content['mistake'])): ?>
  <section class="lesson-section">
    <h2><?= htmlspecialchars($ui['mistake_label'], ENT_QUOTES, 'UTF-8') ?></h2>
    <div class="mistake-card">
      <span class="wrong"><?= htmlspecialchars($content['mistake']['wrong'], ENT_QUOTES, 'UTF-8') ?></span>
      <span class="right"><?= htmlspecialchars($content['mistake']['right'], ENT_QUOTES, 'UTF-8') ?></span>
      <?php
        $saavi = $content['mistake']['saavi'] ?? null;
        // Support both string (legacy) and per-lang array
        if (is_array($saavi)) {
            $saaviText = $saavi[$lang] ?? $saavi['hi'] ?? null;
        } else {
            $saaviText = $saavi;
        }
      ?>
      <?php if ($saaviText): ?>
        <div class="saavi-says">SAAVI: <?= htmlspecialchars($saaviText, ENT_QUOTES, 'UTF-8') ?></div>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>

  <?php if (!empty($content['visual'])): ?>
  <section class="lesson-section">
    <h2><?= htmlspecialchars($ui['visual_label'], ENT_QUOTES, 'UTF-8') ?></h2>
    <div class="visual-card"><?= htmlspecialchars($content['visual'], ENT_QUOTES, 'UTF-8') ?></div>
  </section>
  <?php endif; ?>

<?php endif; ?>

  <div class="lesson-cta">
    <h3><?= htmlspecialchars($ui['cta_title'], ENT_QUOTES, 'UTF-8') ?></h3>
    <p><?= htmlspecialchars($ui['cta_text'], ENT_QUOTES, 'UTF-8') ?></p>
    <a class="btn" href="/waitlist/"><?= htmlspecialchars($ui['cta_button'], ENT_QUOTES, 'UTF-8') ?></a>
  </div>

  <nav class="lesson-nav" aria-label="Lesson navigation">
    <?php if ($prevSeo): ?>
      <a class="prev" href="<?= $prevSeo['canonical'] ?>">
        <?= htmlspecialchars($ui['prev'], ENT_QUOTES, 'UTF-8') ?>
        <strong>Day <?= $prevDay ?>: <?= htmlspecialchars($prevSeo['topic'], ENT_QUOTES, 'UTF-8') ?></strong>
      </a>
    <?php else: ?>
      <span></span>
    <?php endif; ?>
    <?php if ($nextSeo): ?>
      <a class="next" href="<?= $nextSeo['canonical'] ?>">
        <?= htmlspecialchars($ui['next'], ENT_QUOTES, 'UTF-8') ?>
        <strong>Day <?= $nextDay ?>: <?= htmlspecialchars($nextSeo['topic'], ENT_QUOTES, 'UTF-8') ?></strong>
      </a>
    <?php endif; ?>
  </nav>

  <a class="back-link" href="/learn-english/<?= $langDir ?>/">
    <?= htmlspecialchars($ui['back_to_course'], ENT_QUOTES, 'UTF-8') ?>
  </a>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
