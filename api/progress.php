<?php
/**
 * Save/get student progress.
 * POST: save quiz score, block completion
 * GET: get progress for current user
 */
error_reporting(0);
header('Content-Type: application/json');
session_start();

$uid = $_SESSION['user']['uid'] ?? '';
if (!$uid) {
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

$dbConfig = require __DIR__ . '/../config/db.php';
$pdo = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}",
               $dbConfig['username'], $dbConfig['password']);

$courseId = $pdo->query("SELECT id FROM courses WHERE course_code = 'english-speaking-50-hi'")->fetchColumn();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $dayNum = intval($input['day'] ?? 0);
    $quizScore = intval($input['quiz_score'] ?? 0);
    $quizTotal = intval($input['quiz_total'] ?? 0);
    $blocksCompleted = intval($input['blocks_completed'] ?? 0);
    $completed = !empty($input['completed']);

    $stmt = $pdo->prepare("INSERT INTO course_progress (user_id, course_id, day_number, quiz_score, quiz_total, blocks_completed, completed_at, last_accessed)
        VALUES (?, ?, ?, ?, ?, ?, ?, NOW())
        ON DUPLICATE KEY UPDATE
            quiz_score = GREATEST(quiz_score, VALUES(quiz_score)),
            quiz_total = VALUES(quiz_total),
            blocks_completed = GREATEST(blocks_completed, VALUES(blocks_completed)),
            completed_at = IF(VALUES(completed_at) IS NOT NULL, VALUES(completed_at), completed_at),
            last_accessed = NOW()");
    $stmt->execute([$uid, $courseId, $dayNum, $quizScore, $quizTotal, $blocksCompleted,
                    $completed ? date('Y-m-d H:i:s') : null]);

    echo json_encode(['success' => true]);

} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get all progress for this user
    $stmt = $pdo->prepare("SELECT day_number, quiz_score, quiz_total, blocks_completed, completed_at, last_accessed
        FROM course_progress WHERE user_id = ? AND course_id = ? ORDER BY day_number");
    $stmt->execute([$uid, $courseId]);
    $progress = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get chat count per day
    $stmt = $pdo->prepare("SELECT day_number, COUNT(*) as chats FROM chat_history WHERE uid = ? GROUP BY day_number");
    $stmt->execute([$uid]);
    $chats = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $chats[$row['day_number']] = $row['chats'];
    }

    echo json_encode([
        'uid' => $uid,
        'name' => $_SESSION['user']['name'] ?? '',
        'progress' => $progress,
        'chat_counts' => $chats,
        'total_days_accessed' => count($progress),
    ], JSON_UNESCAPED_UNICODE);
}
