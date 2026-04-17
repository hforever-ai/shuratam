<?php
/**
 * Subject Page Template
 * Shows chapter list for a board/class/subject with hero sample blocks.
 * Variables: $lang, $htmlLang, $t, $board, $boardSlug, $classNum, $subject, $chapters, $samples, $availableLangs, $currentPath
 */

$classLabel   = $t['common']['class'] ?? 'Class';
$boardName    = $board['name'][$lang] ?? $board['name']['en'] ?? $boardSlug;
$subjectName  = $subject['name'][$lang] ?? $subject['name']['en'] ?? $subject['slug'];
$subjectIcon  = $subject['icon'] ?? '';
$totalChaps   = $chapters['total_chapters'] ?? count($chapters['chapters'] ?? []);

$title       = "{$subjectName} | {$boardName} {$classLabel} {$classNum} | Shrutam SAAVI";
$description = "{$boardName} {$classLabel} {$classNum} {$subjectName} — SAAVI ke saath {$totalChaps} chapters. Hindi mein. Board exam ready.";
$canonical   = "https://shrutam.ai/{$lang}/boards/{$boardSlug}/class-{$classNum}/{$subject['slug']}/";

$schema = json_encode([
    "@context" => "https://schema.org",
    "@graph"   => [
        [
            "@type"            => "Course",
            "name"             => "{$boardName} {$classLabel} {$classNum} {$subjectName}",
            "description"      => $description,
            "provider"         => ["@type" => "Organization", "name" => "Shrutam (Aarambha)", "url" => "https://shrutam.ai"],
            "educationalLevel" => "Grade {$classNum}",
            "inLanguage"       => $availableLangs,
            "offers"           => ["@type" => "Offer", "price" => "199", "priceCurrency" => "INR", "availability" => "https://schema.org/PreOrder"],
        ],
        [
            "@type"           => "BreadcrumbList",
            "itemListElement" => [
                ["@type" => "ListItem", "position" => 1, "name" => ($t['common']['home'] ?? 'Home'),  "item" => "https://shrutam.ai/{$lang}/"],
                ["@type" => "ListItem", "position" => 2, "name" => $boardName, "item" => "https://shrutam.ai/{$lang}/boards/{$boardSlug}/"],
                ["@type" => "ListItem", "position" => 3, "name" => "{$classLabel} {$classNum}", "item" => "https://shrutam.ai/{$lang}/boards/{$boardSlug}/class-{$classNum}/"],
                ["@type" => "ListItem", "position" => 4, "name" => $subjectName, "item" => $canonical],
            ],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/../partials/head.php';
include __DIR__ . '/../partials/nav.php';
?>

<main id="main">

  <!-- HERO -->
  <section class="section" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">

      <!-- Breadcrumb -->
      <nav aria-label="Breadcrumb" class="mb-8">
        <ol class="flex flex-wrap items-center gap-2 text-sm" style="color: var(--text-muted);">
          <li><a href="/<?= $lang ?>/" style="color: var(--primary-light);"><?= htmlspecialchars($t['common']['home'] ?? 'Home') ?></a></li>
          <li aria-hidden="true">›</li>
          <li><a href="/<?= $lang ?>/boards/<?= $boardSlug ?>/" style="color: var(--primary-light);"><?= htmlspecialchars($boardName) ?></a></li>
          <li aria-hidden="true">›</li>
          <li><a href="/<?= $lang ?>/boards/<?= $boardSlug ?>/class-<?= $classNum ?>/" style="color: var(--primary-light);"><?= htmlspecialchars($classLabel) ?> <?= $classNum ?></a></li>
          <li aria-hidden="true">›</li>
          <li aria-current="page" style="color: var(--text-secondary);"><?= htmlspecialchars($subjectName) ?></li>
        </ol>
      </nav>

      <div class="flex flex-wrap items-center gap-3 mb-4">
        <span class="badge badge-primary"><?= htmlspecialchars($boardName) ?></span>
        <span class="badge"><?= htmlspecialchars($classLabel) ?> <?= $classNum ?></span>
      </div>

      <div class="flex items-center gap-4 mb-6">
        <span style="font-size: 3rem;" aria-hidden="true"><?= $subjectIcon ?></span>
        <h1 class="text-4xl lg:text-5xl font-heading font-bold" style="color: var(--text-primary);">
          <?= htmlspecialchars($subjectName) ?>
        </h1>
      </div>

      <div class="flex flex-wrap gap-6">
        <div>
          <p class="stat-number"><?= $totalChaps ?></p>
          <p class="text-sm" style="color: var(--text-secondary);"><?= htmlspecialchars($t['subject_page']['total_chapters'] ?? 'Chapters') ?></p>
        </div>
        <div>
          <p class="stat-number"><?= count($availableLangs) ?></p>
          <p class="text-sm" style="color: var(--text-secondary);"><?= htmlspecialchars($t['common']['languages_available'] ?? 'Languages') ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- CHAPTER LIST -->
  <section class="section" aria-labelledby="chapters-heading">
    <div class="container">
      <h2 id="chapters-heading" class="text-2xl font-heading font-bold mb-8" style="color: var(--text-primary);">
        <?= htmlspecialchars($t['subject_page']['chapters_title'] ?? 'Chapters') ?>
      </h2>

      <?php if ($chapters && !empty($chapters['chapters'])): ?>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($chapters['chapters'] as $ch): ?>
          <?php
          $chName = $ch['name_' . $lang] ?? $ch['name_en'] ?? "Chapter {$ch['number']}";
          $isHero = $ch['is_hero'] === true;

          // Find samples for this chapter
          $chapterSamples = null;
          if ($isHero && $samples && isset($samples['samples'])) {
              foreach ($samples['samples'] as $s) {
                  if ($s['chapter_number'] === $ch['number']) {
                      $chapterSamples = $s['blocks'][$lang] ?? $s['blocks']['en'] ?? null;
                      break;
                  }
              }
          }
          $spanFull = $isHero && $chapterSamples ? 'md:col-span-2' : '';
          ?>
          <div class="card p-6 animate-on-scroll <?= $spanFull ?>"
               style="<?= $isHero ? 'border: 1px solid var(--primary-light);' : '' ?>">

            <div class="flex items-start gap-4 mb-4">
              <span class="badge badge-accent flex-shrink-0" style="min-width: 2.5rem; text-align: center;">
                <?= $ch['number'] ?>
              </span>
              <div class="flex-1">
                <h3 class="font-heading font-bold text-lg" style="color: var(--text-primary);">
                  <?= htmlspecialchars($chName) ?>
                </h3>
                <?php if ($isHero): ?>
                  <span class="pill mt-1" style="color: var(--accent); font-size: 0.75rem;">
                    ★ <?= htmlspecialchars($t['subject_page']['hero_chapter_label'] ?? 'SAAVI teaches this:') ?>
                  </span>
                <?php endif; ?>
              </div>
            </div>

            <?php if ($chapterSamples): ?>
              <div class="mt-4">
                <?php $sampleBlocks = $chapterSamples; include __DIR__ . '/../partials/sample-cards.php'; ?>
              </div>
              <div class="mt-4 text-center">
                <a href="/<?= $lang ?>/boards/<?= $boardSlug ?>/#waitlist" class="btn btn-primary">
                  <?= htmlspecialchars($t['subject_page']['all_chapters_cta'] ?? 'Learn full chapter with SAAVI →') ?>
                </a>
              </div>
            <?php endif; ?>

          </div>
        <?php endforeach; ?>
      </div>
      <?php else: ?>
        <p style="color: var(--text-secondary);"><?= htmlspecialchars($t['common']['coming_soon'] ?? 'Coming soon') ?></p>
      <?php endif; ?>
    </div>
  </section>

  <!-- CTA -->
  <section class="section-dark" aria-labelledby="cta-heading">
    <div class="container text-center">
      <h2 id="cta-heading" class="text-3xl font-heading font-bold mb-4" style="color: var(--text-primary);">
        <?= htmlspecialchars($t['subject_page']['learn_with_saavi'] ?? 'Learn with SAAVI') ?>
      </h2>
      <p class="mb-6 text-lg" style="color: var(--text-secondary);">
        <?= htmlspecialchars($boardName) ?> <?= htmlspecialchars($classLabel) ?> <?= $classNum ?> · <?= htmlspecialchars($subjectName) ?>
      </p>
      <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary text-lg px-8 py-4">
        <?= htmlspecialchars($t['nav']['join_waitlist'] ?? 'Join Waitlist Free →') ?>
      </a>
    </div>
  </section>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
