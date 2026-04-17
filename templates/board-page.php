<?php
/**
 * Board Page Template
 * Landing page for a board showing classes, subjects, exam pattern.
 * Variables: $lang, $htmlLang, $t, $board, $boardSlug, $allSubjects, $availableLangs, $currentPath
 */

$boardName     = $board['name'][$lang] ?? $board['name']['en'] ?? $boardSlug;
$boardFullName = $board['full_name'][$lang] ?? $board['full_name']['en'] ?? '';
$textbookSrc   = $board['textbook_source'] ?? '';
$status        = $board['status'] ?? 'active';
$subjects      = $board['subjects'] ?? array_keys($allSubjects);
$classes       = $board['classes'] ?? range(5, 10);
$classLabel    = $t['common']['class'] ?? 'Class';

$title       = "{$boardName} | Shrutam SAAVI";
$description = "{$boardFullName} — SAAVI ke saath sabhi classes ka complete syllabus. Hindi mein. Board exam ready.";
$canonical   = "https://shrutam.ai/{$lang}/boards/{$boardSlug}/";

$schema = json_encode([
    "@context" => "https://schema.org",
    "@graph"   => [
        [
            "@type"       => "EducationalOrganization",
            "name"        => $boardName,
            "description" => $description,
            "url"         => $canonical,
        ],
        [
            "@type"           => "BreadcrumbList",
            "itemListElement" => [
                ["@type" => "ListItem", "position" => 1, "name" => ($t['common']['home'] ?? 'Home'), "item" => "https://shrutam.ai/{$lang}/"],
                ["@type" => "ListItem", "position" => 2, "name" => $boardName, "item" => $canonical],
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
          <li aria-current="page" style="color: var(--text-secondary);"><?= htmlspecialchars($boardName) ?></li>
        </ol>
      </nav>

      <div class="flex flex-wrap items-center gap-3 mb-4">
        <?php if ($status === 'active'): ?>
          <span class="badge badge-primary">Active</span>
        <?php else: ?>
          <span class="badge"><?= htmlspecialchars($t['common']['coming_soon'] ?? 'Coming Soon') ?></span>
        <?php endif; ?>
        <?php if ($textbookSrc): ?>
          <span class="pill"><?= htmlspecialchars($t['board_page']['textbook_source'] ?? 'Textbook') ?>: <?= htmlspecialchars($textbookSrc) ?></span>
        <?php endif; ?>
      </div>

      <h1 class="text-4xl lg:text-5xl font-heading font-bold mb-3" style="color: var(--text-primary);">
        <?= htmlspecialchars($boardName) ?>
      </h1>
      <?php if ($boardFullName): ?>
        <p class="text-lg mb-6" style="color: var(--text-secondary);">
          <?= htmlspecialchars($boardFullName) ?>
        </p>
      <?php endif; ?>
    </div>
  </section>

  <!-- EXAM PATTERN -->
  <?php if (isset($board['exam_pattern'])): ?>
  <section class="section-dark" aria-labelledby="exam-heading">
    <div class="container">
      <h2 id="exam-heading" class="text-2xl font-heading font-bold mb-6" style="color: var(--text-primary);">
        <?= htmlspecialchars($t['board_page']['exam_pattern'] ?? 'Exam Pattern') ?>
      </h2>
      <?php
      $ep = $board['exam_pattern'];
      $patternItems = [
          'theory'     => ['label' => $t['board_page']['theory']    ?? 'Theory',    'value' => $ep['theory']    ?? null],
          'practical'  => ['label' => $t['board_page']['practical']  ?? 'Practical', 'value' => $ep['practical'] ?? null],
          'internal'   => ['label' => $t['board_page']['internal']   ?? 'Internal',  'value' => $ep['internal']  ?? null],
          'pass_marks' => ['label' => $t['board_page']['pass_marks'] ?? 'Pass Marks','value' => $ep['pass_marks']?? null],
      ];
      ?>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <?php foreach ($patternItems as $key => $item):
          if ($item['value'] === null) continue; ?>
          <div class="card p-4 text-center">
            <p class="stat-number"><?= $item['value'] ?><?= ($key !== 'pass_marks') ? '%' : '' ?></p>
            <p class="text-sm mt-1" style="color: var(--text-secondary);"><?= htmlspecialchars($item['label']) ?></p>
            <?php if ($key !== 'pass_marks'): ?>
              <div class="mt-2 rounded-full h-2" style="background: var(--bg-base);">
                <div class="h-2 rounded-full" style="width: <?= min((int)$item['value'], 100) ?>%; background: var(--primary-light);"></div>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- CITIES -->
  <?php if (!empty($board['cities'])): ?>
  <section class="section" aria-labelledby="cities-heading">
    <div class="container">
      <h2 id="cities-heading" class="text-xl font-heading font-bold mb-4" style="color: var(--text-primary);">
        <?= htmlspecialchars($t['board_page']['cities_title'] ?? 'Cities') ?>
      </h2>
      <div class="flex flex-wrap gap-2">
        <?php foreach ($board['cities'] as $city): ?>
          <span class="pill"><?= htmlspecialchars($city) ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- CLASS PILLS -->
  <section class="section" aria-labelledby="classes-heading">
    <div class="container">
      <h2 id="classes-heading" class="text-2xl font-heading font-bold mb-6" style="color: var(--text-primary);">
        <?= htmlspecialchars($t['board_page']['classes_title'] ?? 'Classes') ?>
      </h2>
      <div class="flex flex-wrap gap-3">
        <?php foreach ($classes as $n): ?>
          <a href="/<?= $lang ?>/boards/<?= $boardSlug ?>/class-<?= $n ?>/"
             class="btn btn-outline text-lg px-6 py-3">
            <?= htmlspecialchars($classLabel) ?> <?= $n ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- SUBJECT OVERVIEW -->
  <section class="section-dark" aria-labelledby="subjects-heading">
    <div class="container">
      <h2 id="subjects-heading" class="text-2xl font-heading font-bold mb-6" style="color: var(--text-primary);">
        <?= htmlspecialchars($t['class_page']['subjects_title'] ?? 'Subjects') ?>
      </h2>
      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        <?php foreach ($subjects as $slug):
          if (!isset($allSubjects[$slug])) continue;
          $subj     = $allSubjects[$slug];
          $subjName = $subj['name'][$lang] ?? $subj['name']['en'] ?? $slug;
          $subjIcon = $subj['icon'] ?? '';
          // Link to class 10 as a default overview; user navigates from class pills
          $subjUrl  = "/{$lang}/boards/{$boardSlug}/class-10/{$slug}/";
        ?>
          <a href="<?= htmlspecialchars($subjUrl) ?>" class="card p-4 text-center animate-on-scroll hover:border-[var(--primary-light)] transition-colors" style="text-decoration: none;">
            <p style="font-size: 2rem;" aria-hidden="true"><?= $subjIcon ?></p>
            <p class="font-heading font-bold mt-2" style="color: var(--text-primary);"><?= htmlspecialchars($subjName) ?></p>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section" aria-labelledby="cta-board-heading">
    <div class="container text-center">
      <h2 id="cta-board-heading" class="text-3xl font-heading font-bold mb-4" style="color: var(--text-primary);">
        <?= htmlspecialchars($t['subject_page']['learn_with_saavi'] ?? 'Learn with SAAVI') ?>
      </h2>
      <p class="mb-6" style="color: var(--text-secondary);">
        <?= htmlspecialchars($boardName) ?> · <?= count($classes) ?> <?= htmlspecialchars($classLabel) ?> · <?= count($subjects) ?> Subjects
      </p>
      <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary text-lg px-8 py-4">
        <?= htmlspecialchars($t['nav']['join_waitlist'] ?? 'Join Waitlist Free →') ?>
      </a>
    </div>
  </section>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
