<?php
/**
 * Import a day's JSON content into the database.
 *
 * Usage: php scripts/import_day.php day1_content.json 1
 *        (json_file, day_number)
 */

if ($argc < 3) {
    echo "Usage: php scripts/import_day.php <json_file> <day_number>\n";
    exit(1);
}

$jsonFile = $argv[1];
$dayNum = intval($argv[2]);

if (!file_exists($jsonFile)) {
    echo "File not found: $jsonFile\n";
    exit(1);
}

$data = json_decode(file_get_contents($jsonFile), true);
if (!$data) {
    echo "Invalid JSON\n";
    exit(1);
}

// DB
$config = require __DIR__ . '/../config/db.php';
$pdo = new PDO(
    "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}",
    $config['username'], $config['password'],
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

// Get course
$course = $pdo->query("SELECT id FROM courses WHERE course_code = 'english-speaking-50-hi'")->fetch();
if (!$course) {
    echo "Course not found. Run sql/english_course.sql first.\n";
    exit(1);
}
$courseId = $course['id'];

// Insert/update day
$titleSource = $data['saavi_intro']['title'] ?? "Day $dayNum";
$titleTarget = "Day $dayNum";
$level = $dayNum <= 20 ? 'A1' : ($dayNum <= 40 ? 'A1+' : 'A2');
$phase = ceil($dayNum / 12);

$stmt = $pdo->prepare("
    INSERT INTO course_days (course_id, day_number, title_source, title_target, level, phase, is_published)
    VALUES (?, ?, ?, ?, ?, ?, 1)
    ON DUPLICATE KEY UPDATE title_source = VALUES(title_source), is_published = 1
");
$stmt->execute([$courseId, $dayNum, $titleSource, $titleTarget, $level, $phase]);

$dayId = $pdo->lastInsertId() ?: $pdo->query("SELECT id FROM course_days WHERE course_id = $courseId AND day_number = $dayNum")->fetchColumn();

// Clear existing blocks and quiz for this day
$pdo->prepare("DELETE FROM course_blocks WHERE day_id = ?")->execute([$dayId]);
$pdo->prepare("DELETE FROM course_quiz WHERE day_id = ?")->execute([$dayId]);

// ── Import blocks ──
$blockMap = [
    'saavi_intro' => ['order' => 1, 'type' => 'intro'],
    'teaching'    => ['order' => 2, 'type' => 'teaching'],
    'listen_repeat' => ['order' => 3, 'type' => 'listen_repeat'],
    'situation'   => ['order' => 4, 'type' => 'situation'],
    'summary'     => ['order' => 5, 'type' => 'summary'],
];

$insertBlock = $pdo->prepare("
    INSERT INTO course_blocks (day_id, block_order, block_type, title, display_content, saavi_script)
    VALUES (?, ?, ?, ?, ?, ?)
");

foreach ($blockMap as $key => $meta) {
    if (!isset($data[$key])) continue;

    $content = $data[$key];
    $title = '';
    $script = '';

    if ($key === 'saavi_intro') {
        $title = $content['title'] ?? 'Introduction';
        $displayContent = [
            'heading' => '🎯 ' . $title,
            'points' => [
                ['text' => $content['story'] ?? ''],
                ['text' => $content['goal'] ?? ''],
            ]
        ];
        $script = ($content['story'] ?? '') . "\n\n" . ($content['goal'] ?? '');
    } elseif ($key === 'teaching') {
        $title = 'Teaching';
        $displayContent = ['heading' => '📖 Words & Phrases', 'cards' => $content];
        // Build script from all words
        $scriptParts = [];
        foreach ($content as $w) {
            $scriptParts[] = ($w['word'] ?? '') . " ka matlab hai " . ($w['meaning'] ?? '') . ". " . ($w['usage'] ?? '');
        }
        $script = implode("\n", $scriptParts);
    } elseif ($key === 'listen_repeat') {
        $title = 'Listen & Repeat';
        $displayContent = ['heading' => '🎧 Practice Speaking', 'sentences' => $content];
        $script = "Ab mere saath boliye:\n" . implode("\n", array_map(fn($s) => is_array($s) ? ($s['english'] ?? $s['en'] ?? '') : $s, $content));
    } elseif ($key === 'situation') {
        $title = $content['title'] ?? 'Situation Practice';
        $displayContent = ['heading' => '🎭 ' . $title, 'dialogue' => $content['dialogue'] ?? []];
        $dialogueScript = [];
        foreach (($content['dialogue'] ?? []) as $line) {
            $dialogueScript[] = ($line['speaker'] ?? 'A') . ": " . ($line['english'] ?? $line['en'] ?? '');
        }
        $script = implode("\n", $dialogueScript);
    } elseif ($key === 'summary') {
        $title = 'Summary';
        $displayContent = ['heading' => '✅ आज का Summary', 'points' => $content];
        $script = "Aaj aapne seekha: " . implode(", ", array_map(fn($s) => is_array($s) ? ($s['text'] ?? $s['en'] ?? json_encode($s)) : $s, $content));
    }

    $insertBlock->execute([
        $dayId, $meta['order'], $meta['type'], $title,
        json_encode($displayContent, JSON_UNESCAPED_UNICODE),
        $script
    ]);
}

echo "Imported " . count($blockMap) . " blocks\n";

// ── Import quiz items ──
$insertQuiz = $pdo->prepare("
    INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
    VALUES (?, ?, ?, ?)
");

$quizCount = 0;
if (isset($data['quiz'])) {
    foreach ($data['quiz'] as $type => $items) {
        // Normalize type names
        $dbType = match($type) {
            'mcq' => 'mcq',
            'fill_blanks', 'fill_blank' => 'fill_blank',
            'true_false' => 'true_false',
            'flashcards', 'flashcard' => 'flashcard',
            'matching' => 'matching',
            default => null,
        };
        if (!$dbType || !is_array($items)) continue;

        foreach ($items as $order => $item) {
            $insertQuiz->execute([
                $dayId, $dbType,
                json_encode($item, JSON_UNESCAPED_UNICODE),
                $order
            ]);
            $quizCount++;
        }
    }
}

echo "Imported $quizCount quiz items\n";
echo "Day $dayNum imported successfully!\n";
