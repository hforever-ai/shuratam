<?php
/**
 * English Speaking Course — Landing + Day Player
 * URL: /spoken-english/ (course home) or /spoken-english/day/1/ (specific day)
 */
session_start();
$isLoggedIn = !empty($_SESSION['user']['logged_in']);
$userName = $_SESSION['user']['name'] ?? $_SESSION['user']['phone'] ?? '';

$title = 'English Speaking Course — 50 Days | Shrutam';
$description = 'Learn English speaking in 50 days. Free course for Hindi speakers. Audio + Video + Quiz.';
$canonical = 'https://shrutam.ai/spoken-english/';
$htmlLang = 'hi-IN';

// Get day number + language from URL
$dayNum = isset($_GET['day']) ? intval($_GET['day']) : 0;
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'hi';
$courseCode = 'english-speaking-50-' . ($lang === 'mr' ? 'mr' : 'hi');

$langLabels = [
    'hi' => ['name' => 'Hindi-English', 'flag' => '🇮🇳', 'htmlLang' => 'hi-IN'],
    'mr' => ['name' => 'Marathi-English', 'flag' => '🏛️', 'htmlLang' => 'mr'],
];
$currentLang = $langLabels[$lang] ?? $langLabels['hi'];
$htmlLang = $currentLang['htmlLang'];

// DB connection
$dbFile = __DIR__ . '/../config/db.php';
$pdo = null;
$course = null;
$dbError = '';
if (file_exists($dbFile)) {
    try {
        $dbConfig = require $dbFile;
        $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}";
        $pdo = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
        $stmt = $pdo->prepare("SELECT * FROM courses WHERE course_code = ? LIMIT 1");
        $stmt->execute([$courseCode]);
        $course = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $dbError = $e->getMessage();
    }
} else {
    $dbError = 'config/db.php not found';
}

if ($dayNum > 0 && $course) {
    // Get specific day
    $stmt = $pdo->prepare("SELECT * FROM course_days WHERE course_id = ? AND day_number = ?");
    $stmt->execute([$course['id'], $dayNum]);
    $day = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($day) {
        // Get blocks
        $stmt = $pdo->prepare("SELECT * FROM course_blocks WHERE day_id = ? ORDER BY block_order");
        $stmt->execute([$day['id']]);
        $blocks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Get quiz
        $stmt = $pdo->prepare("SELECT * FROM course_quiz WHERE day_id = ? ORDER BY quiz_type, display_order");
        $stmt->execute([$day['id']]);
        $quizItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $titleSrc = preg_replace('/^Day\s*\d+:\s*/i', '', $day['title_source']);
        $title = "Day {$dayNum}: {$titleSrc} | Shrutam English";
    }
}

include __DIR__ . '/../partials/head.php';
include __DIR__ . '/../partials/nav.php';
?>

<main id="main" class="section" style="min-height: 80vh;">
<div class="container">

<?php if ($dayNum > 0 && isset($day)): ?>
<!-- ═══════════ DAY PLAYER ═══════════ -->
<div class="mb-8">
    <!-- Language switcher + Progress bar -->
    <div class="flex items-center gap-3 mb-4">
        <div class="flex gap-1">
            <a href="/spoken-english/?day=<?= $dayNum ?>&lang=hi" class="pill text-xs <?= $lang === 'hi' ? 'active' : '' ?>">🇮🇳 Hindi</a>
            <a href="/spoken-english/?day=<?= $dayNum ?>&lang=mr" class="pill text-xs <?= $lang === 'mr' ? 'active' : '' ?>">🏛️ Marathi</a>
        </div>
        <span class="text-sm" style="color: var(--text-muted);">Day <?= $dayNum ?>/<?= $course['total_days'] ?></span>
        <div style="flex:1; height:4px; background:var(--bg-elevated); border-radius:2px;">
            <div style="width:<?= ($dayNum / $course['total_days']) * 100 ?>%; height:100%; background:var(--accent); border-radius:2px;"></div>
        </div>
        <span class="badge badge-accent"><?= $day['level'] ?></span>
    </div>

    <!-- Day title -->
    <h1 class="text-3xl font-heading mb-2" style="color: var(--text-primary);">
        Day <?= $dayNum ?>: <?= htmlspecialchars(preg_replace('/^Day\s*\d+:\s*/i', '', $day['title_source'])) ?>
    </h1>
    <p style="color: var(--text-secondary);"><?= htmlspecialchars($day['title_target']) ?></p>
</div>

<!-- ═══════════ INTRO BLOCK (always visible on top) ═══════════ -->
<?php
$introBlock = null;
$contentBlocks = [];
foreach ($blocks as $block) {
    if ($block['block_type'] === 'intro') {
        $introBlock = $block;
    } else {
        $contentBlocks[] = $block;
    }
}
?>


<!-- ═══════════ CONTENT TABS ═══════════ -->
<?php
$tabLabels = [
    'teaching' => '📖 Words & Phrases',
    'listen_repeat' => '🎧 Listen & Repeat',
    'situation' => '🎭 Situation',
    'summary' => '✅ Summary',
];

// Audio CDN base URL (Cloudflare R2)
$audioCdn = 'https://pub-30714c8b5f2045c2a156051d3ade4a77.r2.dev';

// Check if full video exists
$videoFile = "{$audioCdn}/english-50/{$lang}/day-{$dayNum}/day{$dayNum}_video.mp4";
$fullAudioFile = "{$audioCdn}/english-50/{$lang}/day-{$dayNum}/day{$dayNum}_full.mp3";
?>

<div class="mb-12">
    <!-- Tab buttons (sticky) -->
    <div class="flex flex-wrap gap-2 mb-6" style="position: sticky; top: 76px; z-index: 50; background: var(--bg-base); padding: 12px 0;">
        <button class="pill active" data-content-tab="video-section">🎬 SAAVI Video</button>
        <?php foreach ($contentBlocks as $block): ?>
            <?php $label = $tabLabels[$block['block_type']] ?? $block['title'] ?? $block['block_type']; ?>
            <button class="pill" data-content-tab="block-<?= $block['block_order'] ?>">
                <?= $label ?>
            </button>
        <?php endforeach; ?>
        <?php if (!empty($quizItems)): ?>
            <button class="pill" data-content-tab="quiz-section">📝 Practice & Quiz</button>
        <?php endif; ?>
    </div>

    <!-- Tab panels -->

    <!-- 🎬 VIDEO / AUDIO Panel (default active) -->
    <?php $videoUrl = "{$audioCdn}/english-50/{$lang}/day-{$dayNum}/day{$dayNum}_video.mp4"; ?>
    <div class="content-panel" id="video-section">
        <div class="card" style="border-left: 3px solid var(--accent); padding: 0; overflow: hidden;">

            <!-- Video player -->
            <div style="background: #000; border-radius: var(--radius-lg) var(--radius-lg) 0 0; overflow: hidden;">
                <video id="main-video" controls preload="metadata"
                       style="width: 100%; max-height: 450px; display: block; margin: 0 auto; background: #000;">
                    <source src="<?= htmlspecialchars($videoUrl) ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

            <!-- Section list -->
            <div style="padding: 1rem 1.5rem;">
                <p class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--text-muted);">Play Section</p>
                <?php
                $sectionAudios = [
                    ['label' => 'Full Lesson', 'file' => "day{$dayNum}_full.mp3"],
                    ['label' => 'Introduction', 'file' => 'block_1_intro.mp3'],
                    ['label' => 'Teaching — Words', 'file' => 'block_2_teaching.mp3'],
                    ['label' => 'Listen & Repeat', 'file' => 'block_3_listen_repeat.mp3'],
                    ['label' => 'Situation Practice', 'file' => 'block_4_situation.mp3'],
                    ['label' => 'Summary', 'file' => 'block_5_summary.mp3'],
                ];
                foreach ($sectionAudios as $sa): ?>
                <button onclick="pauseAllMedia();var v=document.getElementById('main-video');v.src='<?= $audioCdn ?>/english-50/<?= $lang ?>/day-<?= $dayNum ?>/<?= $sa['file'] ?>';v.play();"
                    class="flex items-center gap-2 w-full text-left px-3 py-2 rounded-lg mb-1 hover:bg-[var(--bg-elevated)]"
                    style="color: var(--text-body); border: none; background: none; cursor: pointer; font-size: 0.9rem;">
                    <span style="color: var(--accent);">&#9654;</span> <?= $sa['label'] ?>
                </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php
    // Tab intro descriptions
    $tabIntros = [
        'teaching' => '📖 Aaj ke naye words aur phrases — ek ek karke dekhiye. Click karke example dekhein.',
        'listen_repeat' => '🎧 SAAVI bolegi, aap suniye aur uske baad repeat kariye. Practice se confidence aayega!',
        'situation' => '🎭 Ek real life situation — dekhiye English mein baat kaise hoti hai.',
        'summary' => '✅ Aaj ka quick revision — ye points yaad rakh lijiye.',
    ];
    ?>

    <?php foreach ($contentBlocks as $block): ?>
    <?php $content = json_decode($block['display_content'], true); ?>
    <div class="content-panel" id="block-<?= $block['block_order'] ?>" style="display:none;">

        <!-- Tab intro -->
        <div class="p-3 rounded-lg mb-4" style="background: var(--bg-elevated); border-left: 3px solid var(--accent);">
            <p style="color: var(--text-secondary); font-size: 0.95rem;">
                <?= $tabIntros[$block['block_type']] ?? '' ?>
            </p>
        </div>

        <div>
            <!-- Audio (skip for teaching — words have individual audio) -->
            <?php
            // R2 CDN audio for each block type
            $blockAudioMap = [
                'listen_repeat' => 'block_3_listen_repeat.mp3',
                'situation' => 'block_4_situation.mp3',
                'summary' => 'block_5_summary.mp3',
            ];
            $blockAudioUrl = isset($blockAudioMap[$block['block_type']])
                ? "{$audioCdn}/english-50/{$lang}/day-{$dayNum}/" . $blockAudioMap[$block['block_type']]
                : '';
            ?>
            <?php if ($blockAudioUrl && $block['block_type'] !== 'teaching'): ?>
            <div class="mb-4 flex items-center gap-3">
                <audio controls preload="metadata" style="flex:1; height:40px;" class="rounded">
                    <source src="<?= htmlspecialchars($blockAudioUrl) ?>" type="audio/mpeg">
                </audio>
            </div>
            <?php endif; ?>

            <!-- Content -->
            <div class="space-y-2">
                <?php if (isset($content['cards'])): ?>
                    <!-- Play All button -->
                    <div class="mb-3">
                        <button class="btn btn-primary" id="play-all-words" style="font-size: 0.9rem;">
                            ▶ SAAVI se suniye — sab words ek ek karke
                        </button>
                        <span id="word-progress" class="text-sm ml-3" style="color: var(--text-muted);"></span>
                    </div>
                    <!-- Hidden audio player for per-word playback -->
                    <audio id="word-audio-player" preload="none"></audio>

                    <div class="word-cards-container space-y-2" id="words-list">
                    <?php foreach ($content['cards'] as $ci => $card): ?>
                    <?php
                        $word = $card['word'] ?? $card['pattern'] ?? '';
                        $safe = strtolower(preg_replace('/[^a-z0-9]+/i', '_', $word));
                        $wordAudioFile = "{$audioCdn}/english-50/{$lang}/day-{$dayNum}/word_" . sprintf('%02d', $ci+1) . "_{$safe}.mp3";
                    ?>
                    <div class="word-card rounded-lg" data-index="<?= $ci ?>" data-audio="<?= $wordAudioFile ?>"
                         style="background: var(--bg-elevated); transition: all 0.3s; border-left: 3px solid transparent; overflow:hidden; max-height: 52px;">
                        <!-- Collapsed: just word + meaning -->
                        <div class="p-3 cursor-pointer flex items-center justify-between word-card-header" onclick="playWord(<?= $ci ?>)">
                            <div>
                                <span class="font-bold" style="color: var(--primary-light); font-size: 1.25rem;">
                                    <?= htmlspecialchars($word) ?>
                                </span>
                                <span style="color: var(--text-muted); font-size: 0.95rem;">
                                    (<?= htmlspecialchars($card['pronunciation'] ?? '') ?>)
                                </span>
                                <?php $meaning = $card['meaning'] ?? $card['hindi_meaning'] ?? ''; ?>
                                <?php if ($meaning): ?>
                                <span style="color: var(--text-body); font-size: 0.95rem;"> = <?= htmlspecialchars($meaning) ?></span>
                                <?php endif; ?>
                            </div>
                            <span style="color: var(--text-muted); font-size: 1rem;">🔊</span>
                        </div>
                        <!-- Expanded: example -->
                        <?php if (isset($card['example'])): ?>
                        <div class="word-card-detail p-3 pt-0" style="display:none;">
                            <div class="p-3 rounded-lg" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
                                <div style="color: var(--accent); font-size: 1.15rem; font-weight: 600;">"<?= htmlspecialchars($card['example']['english'] ?? $card['example']['en'] ?? '') ?>"</div>
                                <?php $pron = $card['example']['hindi_pronunciation'] ?? $card['example']['marathi_pronunciation'] ?? ''; ?>
                                <?php if ($pron): ?>
                                <div class="mt-1" style="color: var(--text-muted); font-size: 0.95rem;">(<?= htmlspecialchars($pron) ?>)</div>
                                <?php endif; ?>
                                <div class="mt-1" style="color: var(--text-secondary); font-size: 0.95rem;">"<?= htmlspecialchars($card['example']['hindi_translation'] ?? $card['example']['marathi_translation'] ?? $card['example']['hi'] ?? '') ?>"</div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                    </div>

                <?php elseif (isset($content['points'])): ?>
                    <?php foreach ($content['points'] as $point): ?>
                    <?php
                        $text = is_array($point) ? ($point['text'] ?? $point['en'] ?? '') : $point;
                        // Truncate long points for summary readability
                        if (mb_strlen($text) > 120) $text = mb_substr($text, 0, 117) . '...';
                    ?>
                    <div class="flex gap-2 items-start p-3 rounded-lg" style="background: var(--bg-elevated);">
                        <span style="color: var(--accent); font-size: 1rem;">✓</span>
                        <span style="color: var(--text-primary); line-height: 1.6; font-size: 0.95rem;">
                            <?= htmlspecialchars($text) ?>
                        </span>
                    </div>
                    <?php endforeach; ?>

                <?php elseif (isset($content['sentences'])): ?>
                    <?php foreach ($content['sentences'] as $si => $sent): ?>
                    <div class="p-3 rounded-lg" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
                        <?php if (is_array($sent)): ?>
                            <div style="color: var(--text-primary); font-size: 1.15rem; font-weight: 600;"><?= ($si+1) ?>. <?= htmlspecialchars($sent['english'] ?? $sent['en'] ?? '') ?></div>
                            <div class="mt-1" style="color: var(--accent); font-size: 1rem;">(<?= htmlspecialchars($sent['hindi_pronunciation'] ?? $sent['marathi_pronunciation'] ?? '') ?>)</div>
                            <div class="mt-1" style="color: var(--text-primary); font-size: 1rem; opacity: 0.8;"><?= htmlspecialchars($sent['hindi_translation'] ?? $sent['marathi_translation'] ?? $sent['hi'] ?? '') ?></div>
                        <?php else: ?>
                            <div style="color: var(--text-primary); font-size: 1.05rem;"><?= ($si+1) ?>. <?= htmlspecialchars($sent) ?></div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>

                <?php elseif (isset($content['dialogue'])): ?>
                    <?php foreach ($content['dialogue'] as $line): ?>
                    <div class="flex gap-3 items-start p-3 rounded-lg" style="background: var(--bg-elevated);">
                        <span class="badge badge-primary text-xs mt-1"><?= htmlspecialchars($line['character'] ?? $line['speaker'] ?? 'A') ?></span>
                        <div>
                            <div style="color: var(--text-primary); font-size: 1.15rem; font-weight: 600;"><?= htmlspecialchars($line['english'] ?? $line['en'] ?? '') ?></div>
                            <div class="mt-1" style="color: var(--text-muted); font-size: 1rem;">(<?= htmlspecialchars($line['hindi_pronunciation'] ?? $line['marathi_pronunciation'] ?? '') ?>)</div>
                            <div class="mt-1" style="color: var(--text-secondary); font-size: 1rem;"><?= htmlspecialchars($line['hindi_translation'] ?? $line['marathi_translation'] ?? $line['hi'] ?? '') ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div><!-- /content-panel -->
    <?php endforeach; ?>

    <!-- Quiz panel (inside tabs) -->
    <div class="content-panel" id="quiz-section" style="display:none;">

<!-- ═══════════ QUIZ TABS ═══════════ -->
<?php if (!empty($quizItems)): ?>
<div class="mb-12">
    <h2 class="text-2xl font-heading mb-4" style="color: var(--text-primary);">📝 Practice & Quiz</h2>

    <!-- Tabs -->
    <div class="flex flex-wrap gap-2 mb-6">
        <button class="pill active" data-quiz-tab="mcq">MCQ</button>
        <button class="pill" data-quiz-tab="true_false">True/False</button>
        <button class="pill" data-quiz-tab="flashcard">Flashcards</button>
        <button class="pill" data-quiz-tab="matching">Matching</button>
    </div>

    <!-- Tab content -->
    <?php
    $grouped = [];
    foreach ($quizItems as $item) {
        $grouped[$item['quiz_type']][] = json_decode($item['question_data'], true);
    }
    ?>

    <!-- MCQ -->
    <div class="quiz-panel" id="quiz-mcq" style="display:block;">
        <div class="space-y-4">
        <?php foreach (($grouped['mcq'] ?? []) as $qi => $q):
            $qText = $q['question'] ?? $q['question_marathi'] ?? $q['question_hi'] ?? '';
            $qOpts = $q['options'] ?? $q['options_marathi'] ?? $q['options_hi'] ?? [];
            $qAns = $q['answer'] ?? $q['answer_marathi'] ?? $q['answer_hi'] ?? '';
        ?>
            <div class="card p-4">
                <p class="font-bold mb-3" style="color: var(--text-primary);">Q<?= $qi+1 ?>. <?= htmlspecialchars($qText) ?></p>
                <div class="space-y-2">
                <?php foreach ($qOpts as $oi => $opt): ?>
                    <label class="flex items-center gap-3 p-2 rounded cursor-pointer" style="border: 1px solid var(--border-subtle);">
                        <input type="radio" name="mcq_<?= $qi ?>" value="<?= htmlspecialchars($opt) ?>" data-correct="<?= htmlspecialchars($qAns) ?>">
                        <span style="color: var(--text-body);"><?= htmlspecialchars($opt) ?></span>
                    </label>
                <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>

    <!-- Fill Blanks -->
    <div class="quiz-panel" id="quiz-fill_blank" style="display:none;">
        <div class="space-y-4">
        <?php foreach (($grouped['fill_blank'] ?? []) as $qi => $q): ?>
            <div class="card p-4">
                <p class="mb-3" style="color: var(--text-primary);"><?= htmlspecialchars($q['question'] ?? $q['sentence'] ?? '') ?></p>
                <input type="text" class="input" placeholder="Type answer..." data-answer="<?= htmlspecialchars($q['answer']) ?>">
            </div>
        <?php endforeach; ?>
        </div>
    </div>

    <!-- True/False -->
    <div class="quiz-panel" id="quiz-true_false" style="display:none;">
        <div class="space-y-4">
        <?php foreach (($grouped['true_false'] ?? []) as $qi => $q): ?>
            <div class="card p-4 flex items-center justify-between">
                <p style="color: var(--text-body);"><?= htmlspecialchars($q['statement'] ?? $q['statement_marathi'] ?? $q['question'] ?? $q['question_marathi'] ?? '') ?></p>
                <div class="flex gap-2">
                    <button class="pill text-xs" data-tf="true" data-correct="<?= $q['answer'] ?>">True</button>
                    <button class="pill text-xs" data-tf="false" data-correct="<?= $q['answer'] ?>">False</button>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>

    <!-- Flashcards -->
    <div class="quiz-panel" id="quiz-flashcard" style="display:none;">
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
        <?php foreach (($grouped['flashcard'] ?? []) as $card): ?>
            <div class="card p-4 text-center cursor-pointer" onclick="this.classList.toggle('flipped')" style="min-height:100px;">
                <div class="flashcard-front font-bold" style="color: var(--primary-light);">
                    <?= htmlspecialchars($card['front']) ?>
                </div>
                <div class="flashcard-back hidden" style="color: var(--accent);">
                    <?= htmlspecialchars($card['back']) ?>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>

    <!-- Matching -->
    <div class="quiz-panel" id="quiz-matching" style="display:none;">
        <p class="mb-4" style="color: var(--text-secondary);">Match English with Hindi:</p>
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2">
            <?php foreach (($grouped['matching'] ?? []) as $pair): ?>
                <div class="pill text-sm w-full justify-center"><?= htmlspecialchars($pair['english'] ?? $pair['left'] ?? '') ?></div>
            <?php endforeach; ?>
            </div>
            <div class="space-y-2">
            <?php $shuffled = $grouped['matching'] ?? []; shuffle($shuffled); ?>
            <?php foreach ($shuffled as $pair): ?>
                <div class="pill text-sm w-full justify-center"><?= htmlspecialchars($pair['hindi'] ?? $pair['right'] ?? '') ?></div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div><!-- /quiz-panel matching -->
</div><!-- /quiz mb-12 -->
<?php endif; ?>
    </div><!-- /quiz-section content-panel -->
</div><!-- /tabs container -->

<!-- ═══════════ AI CHAT — Ask SAAVI ═══════════ -->
<div class="card mb-8" style="border-left: 3px solid var(--accent);">
    <h3 class="text-lg font-heading mb-3" style="color: var(--accent);">
        💬 SAAVI से पूछो — Ask your doubt
    </h3>

    <?php if ($isLoggedIn): ?>
    <!-- Logged in — show chat -->
    <p class="text-sm mb-3" style="color: var(--text-secondary);">
        👋 <?= htmlspecialchars($userName ?: 'Student') ?> — koi bhi sawaal poochiye!
    </p>

    <div id="chat-messages" class="space-y-3 mb-4" style="max-height: 300px; overflow-y: auto;"></div>

    <div class="flex gap-2">
        <input type="text" id="chat-input" class="input" placeholder="Type your question... (Hindi or English)"
               onkeypress="if(event.key==='Enter') sendChat()">
        <button onclick="sendChat()" class="btn btn-primary" style="white-space: nowrap;">भेजो →</button>
    </div>

    <button id="voice-btn" onclick="startVoice()" class="mt-2 text-sm" style="color: var(--text-muted); background: none; border: none; cursor: pointer;">
        🎤 बोलकर पूछो
    </button>

    <?php else: ?>
    <!-- Not logged in — show login prompt -->
    <p class="text-sm mb-4" style="color: var(--text-secondary);">
        SAAVI se baat karne ke liye login kariye — free hai!
    </p>
    <a href="/spoken-english/login.php" class="btn btn-primary">
        📱 Login kariye — Phone OTP / Google
    </a>
    <p class="text-xs mt-2" style="color: var(--text-muted);">
        Video, words, quiz bina login ke dekh sakte hain
    </p>
    <?php endif; ?>
</div>

<!-- Navigation -->
<div class="flex justify-between items-center pt-6" style="border-top: 1px solid var(--border-subtle);">
    <?php if ($dayNum > 1): ?>
    <a href="/spoken-english/?day=<?= $dayNum - 1 ?>" class="btn btn-outline">← Day <?= $dayNum - 1 ?></a>
    <?php else: ?>
    <span></span>
    <?php endif; ?>

    <?php if ($dayNum < $course['total_days']): ?>
    <a href="/spoken-english/?day=<?= $dayNum + 1 ?>" class="btn btn-primary">Day <?= $dayNum + 1 ?> →</a>
    <?php else: ?>
    <span class="badge badge-accent">🎓 Course Complete!</span>
    <?php endif; ?>
</div>

<?php else: ?>
<!-- ═══════════ COURSE HOME ═══════════ -->
<div class="text-center mb-12">
    <span class="badge badge-accent mb-4">🆓 100% FREE</span>
    <h1 class="text-4xl font-heading mb-4" style="color: var(--text-primary);">
        English Speaking Course — 50 Days
    </h1>
    <p class="text-lg mb-2" style="color: var(--text-body);">SAAVI AI Teacher के साथ English बोलना सीखें</p>
    <p class="mb-6" style="color: var(--text-secondary);">Audio + Video + Quiz + AI Chat • Free Forever</p>

    <img src="/assets/images/hero/saavi-teaching.png" alt="SAAVI AI Teacher"
         style="max-width: 300px; margin: 0 auto 2rem;" class="rounded-2xl" loading="lazy">
</div>

<!-- Choose your language -->
<h2 class="text-2xl font-heading text-center mb-6" style="color: var(--text-primary);">
    अपनी भाषा चुनें — Choose your language
</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-12" style="max-width: 700px; margin: 0 auto;">
    <a href="/spoken-english/hindi-english/" class="card p-6 text-center" style="border: 2px solid var(--accent);">
        <div class="text-4xl mb-3">🇮🇳</div>
        <h3 class="text-xl font-heading mb-2" style="color: var(--text-primary);">Hindi → English</h3>
        <p class="text-sm mb-3" style="color: var(--text-secondary);">हिंदी बोलने वालों के लिए English Speaking Course</p>
        <span class="badge badge-accent">50 Days • Free</span>
    </a>
    <a href="/spoken-english/marathi-english/" class="card p-6 text-center" style="border: 2px solid var(--primary);">
        <div class="text-4xl mb-3">🏛️</div>
        <h3 class="text-xl font-heading mb-2" style="color: var(--text-primary);">Marathi → English</h3>
        <p class="text-sm mb-3" style="color: var(--text-secondary);">मराठी भाषिकांसाठी English Speaking Course</p>
        <span class="badge badge-primary">50 Days • Free</span>
    </a>
</div>

<!-- Quick start -->
<div class="text-center mb-8">
    <p class="mb-3" style="color: var(--text-muted);">या सीधा शुरू करें:</p>
    <a href="/spoken-english/?day=1" class="btn btn-primary">Start Day 1 →</a>
</div>

<!-- Day list -->
<?php if ($course):
    $stmt = $pdo->prepare("SELECT day_number, title_source, title_target, level, is_published FROM course_days WHERE course_id = ? ORDER BY day_number");
    $stmt->execute([$course['id']]);
    $days = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    <?php foreach ($days as $d): ?>
    <a href="/spoken-english/?day=<?= $d['day_number'] ?>" class="card flex items-center gap-3 p-4">
        <span class="stat-number text-xl" style="min-width:40px;"><?= $d['day_number'] ?></span>
        <div>
            <div class="font-bold text-sm" style="color: var(--text-primary);"><?= htmlspecialchars($d['title_source']) ?></div>
            <div class="text-xs" style="color: var(--text-muted);"><?= htmlspecialchars($d['title_target']) ?> • <?= $d['level'] ?></div>
        </div>
    </a>
    <?php endforeach; ?>
</div>
<?php endif; ?>
<?php endif; ?>

</div>
</main>

<!-- Tab switching JS -->
<script>
// ── GA Event Tracking ──
const courseLang = '<?= $lang ?>';
const courseDay = <?= $dayNum ?>;
function trackEvent(action, category, label, value) {
    if (typeof gtag === 'function') {
        gtag('event', action, {
            event_category: category,
            event_label: label,
            value: value || 0,
            course_lang: courseLang,
            course_day: courseDay,
        });
    }
}

// Track time spent on each tab
let tabStartTime = Date.now();
let currentTab = 'video-section';

// Stop all audio/video on the page
function pauseAllMedia() {
    document.querySelectorAll('audio, video').forEach(el => {
        el.pause();
    });
}

// When any audio/video starts playing, pause all others
document.addEventListener('play', function(e) {
    document.querySelectorAll('audio, video').forEach(el => {
        if (el !== e.target) el.pause();
    });
    trackEvent('media_play', 'audio', e.target.closest('.content-panel')?.id || 'video');
}, true);

// Track audio completion
document.addEventListener('ended', function(e) {
    trackEvent('media_complete', 'audio', e.target.closest('.content-panel')?.id || 'video');
}, true);

// Content tabs (Words, Situation, Summary, Quiz)
document.querySelectorAll('[data-content-tab]').forEach(btn => {
    btn.addEventListener('click', () => {
        // Track time on previous tab
        const timeSpent = Math.round((Date.now() - tabStartTime) / 1000);
        trackEvent('tab_time', 'engagement', currentTab, timeSpent);

        pauseAllMedia();
        const newTab = btn.dataset.contentTab;
        trackEvent('tab_switch', 'navigation', newTab);
        currentTab = newTab;
        tabStartTime = Date.now();

        document.querySelectorAll('[data-content-tab]').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.content-panel').forEach(p => p.style.display = 'none');
        btn.classList.add('active');
        document.getElementById(newTab).style.display = 'block';
    });
});

// Quiz sub-tabs (MCQ, Fill, T/F, Flashcards, Matching)
document.querySelectorAll('[data-quiz-tab]').forEach(btn => {
    btn.addEventListener('click', () => {
        trackEvent('quiz_tab', 'quiz', btn.dataset.quizTab);
        document.querySelectorAll('[data-quiz-tab]').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.quiz-panel').forEach(p => p.style.display = 'none');
        btn.classList.add('active');
        document.getElementById('quiz-' + btn.dataset.quizTab).style.display = 'block';
    });
});

// Flashcard flip
document.querySelectorAll('.flashcard-front, .flashcard-back').forEach(el => {
    el.closest('.card')?.addEventListener('click', function() {
        this.querySelector('.flashcard-front').classList.toggle('hidden');
        this.querySelector('.flashcard-back').classList.toggle('hidden');
        trackEvent('flashcard_flip', 'quiz', 'flashcard');
    });
});

// Track quiz answer clicks
document.querySelectorAll('[data-answer]').forEach(btn => {
    btn.addEventListener('click', () => {
        const correct = btn.dataset.correct === 'true';
        trackEvent('quiz_answer', 'quiz', correct ? 'correct' : 'incorrect');
    });
});

// Track page leave — send final tab time
window.addEventListener('beforeunload', () => {
    const timeSpent = Math.round((Date.now() - tabStartTime) / 1000);
    trackEvent('tab_time', 'engagement', currentTab, timeSpent);
    trackEvent('session_end', 'engagement', 'day_' + courseDay, Math.round((Date.now() - performance.timing.navigationStart) / 1000));
});

// Per-word audio playback
const wordPlayer = document.getElementById('word-audio-player');
const wordCards = document.querySelectorAll('.word-card');
let currentWordIndex = -1;
let isPlayingAll = false;

function playWord(index) {
    if (index < 0 || index >= wordCards.length) {
        isPlayingAll = false;
        document.getElementById('word-progress').textContent = 'Complete!';
        trackEvent('words_complete', 'engagement', 'all_words_played');
        return;
    }
    trackEvent('word_play', 'words', 'word_' + (index + 1), index + 1);

    // Pause all other media before playing this word
    document.querySelectorAll('audio, video').forEach(el => {
        if (el !== wordPlayer) { el.pause(); }
    });

    currentWordIndex = index;
    const card = wordCards[index];
    const audioSrc = card.dataset.audio;

    // Collapse all, expand this one
    wordCards.forEach(c => {
        c.style.borderLeftColor = 'transparent';
        c.style.maxHeight = '52px';
        const detail = c.querySelector('.word-card-detail');
        if (detail) detail.style.display = 'none';
    });

    card.style.borderLeftColor = 'var(--accent)';
    card.style.maxHeight = '300px';
    const detail = card.querySelector('.word-card-detail');
    if (detail) detail.style.display = 'block';
    card.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

    // Update progress
    document.getElementById('word-progress').textContent =
        (index + 1) + '/' + wordCards.length;

    // Play audio
    if (wordPlayer) {
        wordPlayer.src = audioSrc;
        wordPlayer.play();
    }
}

// Auto-advance to next word when current finishes
if (wordPlayer) {
    wordPlayer.addEventListener('ended', () => {
        if (isPlayingAll) {
            setTimeout(() => playWord(currentWordIndex + 1), 500);
        }
    });
}

// Play All button
const playAllBtn = document.getElementById('play-all-words');
if (playAllBtn) {
    playAllBtn.addEventListener('click', () => {
        isPlayingAll = true;
        playWord(0);
        playAllBtn.textContent = '⏸ Playing...';
        playAllBtn.onclick = () => {
            isPlayingAll = false;
            if (wordPlayer) wordPlayer.pause();
            playAllBtn.textContent = '▶ SAAVI se suniye — sab words ek ek karke';
            playAllBtn.onclick = () => { isPlayingAll = true; playWord(0); };
        };
    });
}

// AI Chat
const chatMessages = document.getElementById('chat-messages');
const chatInput = document.getElementById('chat-input');
const dayNumber = <?= $dayNum ?>;

function addMessage(text, isUser, audioUrl) {
    if (!chatMessages) return;
    const div = document.createElement('div');
    div.className = 'p-3 rounded-lg';
    div.style.cssText = 'background:' + (isUser ? 'var(--bg-elevated)' : 'var(--bg-surface)') + ';border-left:3px solid ' + (isUser ? 'var(--primary)' : 'var(--accent)');
    const label = document.createElement('span');
    label.style.cssText = 'color:' + (isUser ? 'var(--text-muted)' : 'var(--accent)') + ';font-size:0.8rem';
    label.textContent = isUser ? '🧑 You' : '🤖 SAAVI';
    const body = document.createElement('div');
    body.style.cssText = 'color:var(--text-primary);margin-top:4px;line-height:1.6;font-size:0.95rem';
    body.textContent = text;
    div.appendChild(label);
    div.appendChild(body);
    if (!isUser && audioUrl) {
        const btn = document.createElement('button');
        btn.style.cssText = 'margin-top:8px;background:none;border:1px solid var(--accent);color:var(--accent);padding:5px 14px;border-radius:20px;cursor:pointer;font-size:0.85rem';
        btn.textContent = '🔊 Suniye';
        btn.onclick = function() {
            const a = new Audio(audioUrl);
            a.play();
            btn.textContent = '🔊 Playing...';
            a.onended = function() { btn.textContent = '🔊 Suniye'; };
        };
        div.appendChild(btn);
    }
    chatMessages.appendChild(div);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

async function sendChat() {
    const msg = chatInput ? chatInput.value.trim() : '';
    if (!msg) return;
    addMessage(msg, true);
    chatInput.value = '';
    addMessage('Soch rahi hoon... ⏳', false);
    try {
        const res = await fetch('/api/chat.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({message: msg, day: dayNumber}),
        });
        const data = await res.json();
        chatMessages.removeChild(chatMessages.lastChild);
        addMessage(data.reply || 'Phir se poochiye!', false, data.audio || '');
    } catch(e) {
        chatMessages.removeChild(chatMessages.lastChild);
        addMessage('Network error — phir se try kariye!', false);
    }
}

function startVoice() {
    if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
        alert('Voice input aapke browser mein support nahi hai.');
        return;
    }
    const SR = window.SpeechRecognition || window.webkitSpeechRecognition;
    const r = new SR();
    r.lang = 'hi-IN';
    r.interimResults = false;
    const btn = document.getElementById('voice-btn');
    btn.textContent = '🔴 Sun rahi hoon... boliye!';
    btn.style.color = 'var(--accent)';
    r.start();
    r.onresult = (e) => { chatInput.value = e.results[0][0].transcript; sendChat(); };
    r.onend = () => { btn.textContent = '🎤 बोलकर पूछो'; btn.style.color = 'var(--text-muted)'; };
    r.onerror = r.onend;
}

// MCQ answer check
document.querySelectorAll('input[type=radio][data-correct]').forEach(radio => {
    radio.addEventListener('change', function() {
        const card = this.closest('.card');
        const correct = this.dataset.correct;
        card.querySelectorAll('label').forEach(l => l.style.background = '');
        if (this.value === correct) {
            this.closest('label').style.background = 'rgba(34,197,94,0.15)';
        } else {
            this.closest('label').style.background = 'rgba(239,68,68,0.15)';
        }
    });
});
</script>

<?php include __DIR__ . '/../partials/footer.php'; ?>
