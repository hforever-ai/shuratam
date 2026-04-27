<?php
/**
 * Shared renderer for the per-language Learn English landing pages.
 *
 * Each /learn-english/{lang}/index.php is a 4-line stub:
 *   <?php
 *   $lang = 'hi';
 *   require __DIR__ . '/../_index-template.php';
 *
 * Pulls SEO + hero copy from learn_english_landing_seo($lang),
 * day metadata from learn_english_seo($day, $lang),
 * and week grouping from learn_english_weeks().
 */

require_once __DIR__ . '/_helpers.php';

if (!isset($lang)) {
    http_response_code(500);
    exit('Index template requires $lang.');
}

$landing = learn_english_landing_seo($lang);
$weeks   = learn_english_weeks();
$faqs    = learn_english_faqs($lang);
$faqHead = learn_english_faq_heading($lang);
$langDir = $landing['lang_dir'];

// Variables for partials/head.php
$title       = $landing['title'];
$description = $landing['description'];
$canonical   = $landing['canonical'];
$htmlLang    = ['hi' => 'hi-IN', 'mr' => 'mr-IN', 'te' => 'te-IN'][$lang];
$og_image    = 'https://shrutam.ai/assets/images/og/learn-english.png';

// Course schema for the whole 50-day program + ItemList of all days
$courseItems = [];
for ($d = 1; $d <= 50; $d++) {
    $s = learn_english_seo($d, $lang);
    $courseItems[] = [
        '@type'    => 'ListItem',
        'position' => $d,
        'name'     => "Day $d: " . $s['topic'],
        'url'      => $s['canonical'],
    ];
}

$schema = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'              => 'Course',
            'name'               => $landing['title'],
            'description'        => $landing['description'],
            'url'                => $landing['canonical'],
            'inLanguage'         => $lang,
            'educationalLevel'   => 'Beginner',
            'numberOfCredits'    => 50,
            'timeRequired'       => 'PT1250M',
            'provider'           => [
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
            'hasCourseInstance' => [
                '@type'           => 'CourseInstance',
                'courseMode'      => 'online',
                'courseWorkload'  => 'PT25M',
            ],
        ],
        [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Shrutam',     'item' => 'https://shrutam.ai/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Learn English','item' => 'https://shrutam.ai/learn-english/'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => ucfirst($langDir), 'item' => $landing['canonical']],
            ],
        ],
        [
            '@type'           => 'ItemList',
            'name'            => '50-Day English Challenge — Lessons',
            'numberOfItems'   => 50,
            'itemListElement' => $courseItems,
        ],
        [
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(static function (array $faq): array {
                return [
                    '@type'          => 'Question',
                    'name'           => $faq['q'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => $faq['a'],
                    ],
                ];
            }, $faqs),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/../partials/head.php';
?>

<style>
  .le-shell{max-width:1100px;margin:0 auto;padding:1.5rem 1.2rem 4rem}
  .le-hero{text-align:center;padding:2.5rem 1rem 2rem}
  .le-hero .eyebrow{display:inline-block;font-size:.75rem;color:var(--accent-light);background:var(--accent-glow);padding:.3rem .9rem;border-radius:999px;letter-spacing:.06em;font-weight:700;margin-bottom:1rem}
  .le-hero h1{font-size:2.1rem;line-height:1.2;color:var(--text-primary);margin-bottom:.7rem}
  @media (min-width:720px){.le-hero h1{font-size:2.6rem}}
  .le-hero p.subtitle{color:var(--text-body);font-size:1.05rem;max-width:680px;margin:0 auto 1.5rem}
  .le-stats{display:flex;flex-wrap:wrap;gap:.7rem;justify-content:center;margin-top:1rem}
  .le-stats span{background:var(--bg-surface);border:1px solid var(--border-default);padding:.5rem 1rem;border-radius:999px;font-size:.85rem;color:var(--text-body);font-weight:600}
  nav.le-crumb{font-size:.85rem;color:var(--text-muted);margin-bottom:1.5rem}
  nav.le-crumb a{color:var(--primary-light)}
  .about-block{background:var(--bg-surface);border:1px solid var(--border-subtle);border-radius:var(--radius-lg);padding:1.4rem 1.6rem;margin:1.5rem 0;color:var(--text-body)}
  .about-block h2{font-size:1.1rem;color:var(--text-primary);margin-bottom:.6rem;border-left:4px solid var(--accent);padding-left:.8rem}
  .weeks-heading{text-align:center;font-size:1.4rem;color:var(--text-primary);margin:2.5rem 0 1.3rem}
  section.week{margin:1.8rem 0}
  section.week > h2{font-size:1.05rem;color:var(--accent-light);background:var(--bg-surface);border:1px solid var(--border-subtle);border-left:4px solid var(--accent);padding:.7rem 1rem;border-radius:var(--radius-sm);margin-bottom:.9rem}
  .day-grid{display:grid;gap:.7rem;grid-template-columns:repeat(auto-fill,minmax(280px,1fr))}
  a.day-card{display:block;background:var(--bg-surface);border:1px solid var(--border-subtle);border-radius:var(--radius);padding:1rem 1.1rem;text-decoration:none;color:var(--text-body);transition:border-color .15s,transform .15s}
  a.day-card:hover{border-color:var(--accent);transform:translateY(-2px)}
  a.day-card .day-num{display:inline-block;font-size:.72rem;font-weight:800;color:var(--accent-light);background:var(--accent-glow);padding:.18rem .55rem;border-radius:999px;letter-spacing:.05em;margin-bottom:.55rem}
  a.day-card strong{display:block;font-size:1rem;color:var(--text-primary);margin-bottom:.35rem;line-height:1.3}
  a.day-card p{font-size:.85rem;color:var(--text-secondary);line-height:1.5;margin:0}
  a.day-card .topic-en{font-size:.78rem;color:var(--text-muted);margin-top:.4rem;font-style:italic}
  .le-faq{margin:2.5rem 0}
  .le-faq h2{text-align:center;font-size:1.4rem;color:var(--text-primary);margin-bottom:1.4rem}
  .le-faq details{background:var(--bg-surface);border:1px solid var(--border-subtle);border-radius:var(--radius);margin-bottom:.6rem;overflow:hidden}
  .le-faq details[open]{border-color:var(--accent)}
  .le-faq summary{padding:.95rem 1.1rem;cursor:pointer;font-weight:700;color:var(--text-primary);font-size:.98rem;list-style:none;display:flex;align-items:center;justify-content:space-between;gap:.7rem}
  .le-faq summary::-webkit-details-marker{display:none}
  .le-faq summary::after{content:"+";color:var(--accent);font-weight:800;font-size:1.2rem;flex-shrink:0;transition:transform .2s}
  .le-faq details[open] summary::after{content:"−"}
  .le-faq summary:hover{color:var(--accent-light)}
  .le-faq .faq-answer{padding:0 1.1rem 1rem;color:var(--text-body);font-size:.94rem;line-height:1.65}
  .le-cta{background:linear-gradient(135deg,var(--primary) 0%,var(--accent) 100%);border-radius:var(--radius-lg);padding:2rem 1.5rem;text-align:center;margin:2.5rem 0;color:var(--text-inverse)}
  .le-cta h3{color:var(--text-inverse);font-size:1.4rem;margin-bottom:.5rem}
  .le-cta p{color:var(--text-inverse);opacity:.95;margin-bottom:1.2rem;font-size:1rem;max-width:560px;margin-left:auto;margin-right:auto}
  .le-cta a.btn{display:inline-block;background:var(--text-inverse);color:var(--primary);padding:.85rem 1.7rem;border-radius:var(--radius);font-weight:800;text-decoration:none;font-size:1rem}
</style>

<main id="main" class="le-shell">

  <nav class="le-crumb" aria-label="Breadcrumb">
    <a href="/">Shrutam</a> ›
    <a href="/learn-english/">Learn English</a> ›
    <span><?= ucfirst($langDir) ?></span>
  </nav>

  <section class="le-hero">
    <span class="eyebrow"><?= htmlspecialchars($landing['hero_eyebrow'], ENT_QUOTES, 'UTF-8') ?></span>
    <h1><?= htmlspecialchars($landing['hero_title'], ENT_QUOTES, 'UTF-8') ?></h1>
    <p class="subtitle"><?= htmlspecialchars($landing['hero_subtitle'], ENT_QUOTES, 'UTF-8') ?></p>
    <div class="le-stats">
      <span>📅 <?= htmlspecialchars($landing['stat_days'], ENT_QUOTES, 'UTF-8') ?></span>
      <span>📚 <?= htmlspecialchars($landing['stat_lessons'], ENT_QUOTES, 'UTF-8') ?></span>
      <span>📖 <?= htmlspecialchars($landing['stat_words'], ENT_QUOTES, 'UTF-8') ?></span>
      <span>🎁 <?= htmlspecialchars($landing['stat_free'], ENT_QUOTES, 'UTF-8') ?></span>
    </div>
  </section>

  <article class="about-block">
    <h2><?= htmlspecialchars($landing['about_heading'], ENT_QUOTES, 'UTF-8') ?></h2>
    <p><?= htmlspecialchars($landing['about_text'], ENT_QUOTES, 'UTF-8') ?></p>
  </article>

  <h2 class="weeks-heading"><?= htmlspecialchars($landing['weeks_heading'], ENT_QUOTES, 'UTF-8') ?></h2>

  <?php foreach ($weeks as $week): ?>
    <section class="week">
      <h2><?= htmlspecialchars($week['title'], ENT_QUOTES, 'UTF-8') ?></h2>
      <div class="day-grid">
        <?php foreach ($week['days'] as $dayNum):
          $day = learn_english_seo($dayNum, $lang);
        ?>
          <a class="day-card" href="<?= $day['canonical'] ?>">
            <span class="day-num">DAY <?= $dayNum ?></span>
            <strong><?= htmlspecialchars($day['topic'], ENT_QUOTES, 'UTF-8') ?></strong>
            <p><?= htmlspecialchars($day['description'], ENT_QUOTES, 'UTF-8') ?></p>
            <div class="topic-en"><?= htmlspecialchars($day['topic_en'], ENT_QUOTES, 'UTF-8') ?></div>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
  <?php endforeach; ?>

  <section class="le-faq" aria-labelledby="faq-heading">
    <h2 id="faq-heading"><?= htmlspecialchars($faqHead, ENT_QUOTES, 'UTF-8') ?></h2>
    <?php foreach ($faqs as $i => $faq): ?>
      <details<?= $i === 0 ? ' open' : '' ?>>
        <summary><?= htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8') ?></summary>
        <div class="faq-answer"><?= htmlspecialchars($faq['a'], ENT_QUOTES, 'UTF-8') ?></div>
      </details>
    <?php endforeach; ?>
  </section>

  <section class="le-cta">
    <h3><?= htmlspecialchars($landing['cta_title'], ENT_QUOTES, 'UTF-8') ?></h3>
    <p><?= htmlspecialchars($landing['cta_text'], ENT_QUOTES, 'UTF-8') ?></p>
    <a class="btn" href="<?= learn_english_seo(1, $lang)['canonical'] ?>">
      <?= htmlspecialchars($landing['cta_btn'], ENT_QUOTES, 'UTF-8') ?>
    </a>
  </section>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
