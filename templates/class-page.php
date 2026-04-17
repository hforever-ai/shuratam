<?php
/**
 * Class Page Template
 * Shows 5 subjects for a board/class combination.
 * Variables: $lang, $htmlLang, $t, $board, $boardSlug, $classNum, $allSubjects, $availableLangs, $currentPath
 */

$classLabel = $t['common']['class'] ?? 'Class';
$boardName  = $board['name'][$lang] ?? $board['name']['en'] ?? $boardSlug;
$subjects   = $board['subjects'] ?? array_keys($allSubjects);

$title       = "{$boardName} {$classLabel} {$classNum} | Shrutam SAAVI";
$description = "{$boardName} {$classLabel} {$classNum} ke sabhi subjects SAAVI ke saath. Science, Maths, Hindi, Social Science. Hindi mein.";
$canonical   = "https://shrutam.ai/{$lang}/boards/{$boardSlug}/class-{$classNum}/";

$schema = json_encode([
    "@context" => "https://schema.org",
    "@graph"   => [
        [
            "@type"            => "Course",
            "name"             => "{$boardName} {$classLabel} {$classNum}",
            "description"      => $description,
            "provider"         => ["@type" => "Organization", "name" => "Shrutam (Aarambha)", "url" => "https://shrutam.ai"],
            "educationalLevel" => "Grade {$classNum}",
            "inLanguage"       => $availableLangs,
        ],
        [
            "@type"           => "BreadcrumbList",
            "itemListElement" => [
                ["@type" => "ListItem", "position" => 1, "name" => ($t['common']['home'] ?? 'Home'), "item" => "https://shrutam.ai/{$lang}/"],
                ["@type" => "ListItem", "position" => 2, "name" => $boardName, "item" => "https://shrutam.ai/{$lang}/boards/{$boardSlug}/"],
                ["@type" => "ListItem", "position" => 3, "name" => "{$classLabel} {$classNum}", "item" => $canonical],
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
          <li aria-current="page" style="color: var(--text-secondary);"><?= htmlspecialchars($classLabel) ?> <?= $classNum ?></li>
        </ol>
      </nav>

      <div class="flex flex-wrap items-center gap-3 mb-4">
        <span class="badge badge-primary"><?= htmlspecialchars($boardName) ?></span>
      </div>

      <h1 class="text-5xl lg:text-6xl font-heading font-bold mb-4" style="color: var(--text-primary);">
        <?= htmlspecialchars($classLabel) ?> <?= $classNum ?>
      </h1>
      <p class="text-xl" style="color: var(--text-secondary);">
        <?= htmlspecialchars($t['class_page']['subjects_title'] ?? 'Choose a Subject') ?>
      </p>
    </div>
  </section>

  <!-- SUBJECT GRID -->
  <section class="section" aria-labelledby="subjects-heading">
    <div class="container">
      <h2 id="subjects-heading" class="sr-only"><?= htmlspecialchars($t['class_page']['subjects_title'] ?? 'Subjects') ?></h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($subjects as $slug):
          if (!isset($allSubjects[$slug])) continue;
          $subj = $allSubjects[$slug];
          $subjName = $subj['name'][$lang] ?? $subj['name']['en'] ?? $slug;
          $subjIcon = $subj['icon'] ?? '';

          // Load chapter count from JSON file
          $chapterFile = __DIR__ . "/../content/chapters/{$boardSlug}-{$classNum}-{$slug}.json";
          $totalChaps  = null;
          if (file_exists($chapterFile)) {
              $chData     = json_decode(file_get_contents($chapterFile), true);
              $totalChaps = $chData['total_chapters'] ?? count($chData['chapters'] ?? []);
          }
          $subjectUrl = "/{$lang}/boards/{$boardSlug}/class-{$classNum}/{$slug}/";
        ?>
          <a href="<?= htmlspecialchars($subjectUrl) ?>" class="card p-6 flex flex-col gap-4 animate-on-scroll hover:border-[var(--primary-light)] transition-colors"
             style="text-decoration: none;">
            <div class="flex items-center gap-4">
              <span style="font-size: 2.5rem;" aria-hidden="true"><?= $subjIcon ?></span>
              <div>
                <h3 class="font-heading font-bold text-xl" style="color: var(--text-primary);">
                  <?= htmlspecialchars($subjName) ?>
                </h3>
                <?php if ($totalChaps !== null): ?>
                  <p class="text-sm" style="color: var(--text-secondary);">
                    <?= $totalChaps ?> <?= htmlspecialchars($t['class_page']['chapters_count'] ?? 'Chapters') ?>
                  </p>
                <?php endif; ?>
              </div>
            </div>
            <span class="btn btn-outline self-start"><?= htmlspecialchars($t['common']['boards'] ?? 'Explore') ?> →</span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- BOARD INFO — Exam Pattern -->
  <?php if (isset($board['exam_pattern'])): ?>
  <section class="section-dark" aria-labelledby="exam-heading">
    <div class="container">
      <h2 id="exam-heading" class="text-2xl font-heading font-bold mb-6" style="color: var(--text-primary);">
        <?= htmlspecialchars($t['board_page']['exam_pattern'] ?? 'Exam Pattern') ?>
      </h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <?php
        $ep = $board['exam_pattern'];
        $patternItems = [
            'theory'    => ['label' => $t['board_page']['theory']    ?? 'Theory',    'value' => $ep['theory']    ?? null],
            'practical' => ['label' => $t['board_page']['practical']  ?? 'Practical', 'value' => $ep['practical'] ?? null],
            'internal'  => ['label' => $t['board_page']['internal']   ?? 'Internal',  'value' => $ep['internal']  ?? null],
            'pass_marks'=> ['label' => $t['board_page']['pass_marks'] ?? 'Pass Marks','value' => $ep['pass_marks']?? null],
        ];
        foreach ($patternItems as $key => $item):
          if ($item['value'] === null) continue;
        ?>
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

  <!-- CTA -->
  <section class="section" aria-labelledby="cta-class-heading">
    <div class="container text-center">
      <h2 id="cta-class-heading" class="text-3xl font-heading font-bold mb-4" style="color: var(--text-primary);">
        <?= htmlspecialchars($t['subject_page']['learn_with_saavi'] ?? 'Learn with SAAVI') ?>
      </h2>
      <p class="mb-6" style="color: var(--text-secondary);">
        <?= htmlspecialchars($boardName) ?> <?= htmlspecialchars($classLabel) ?> <?= $classNum ?>
      </p>
      <a href="/<?= $lang ?>/waitlist/" class="btn btn-primary text-lg px-8 py-4">
        <?= htmlspecialchars($t['nav']['join_waitlist'] ?? 'Join Waitlist Free →') ?>
      </a>
    </div>
  </section>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
