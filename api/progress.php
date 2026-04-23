<?php
/**
 * /api/progress.php — User progress for v4 static player pages.
 *
 * Cloudflare: does NOT cache /api/* routes (no Cache-Control: public).
 * User identity: UUID from localStorage (no login needed — free course).
 *
 * POST  {uid, lang, day, tabs, words, sents, quiz_score, quiz_total}
 * GET   ?uid=xxx&lang=hi&day=1
 */
header('Content-Type: application/json');
header('Cache-Control: no-store, no-cache');
header('Access-Control-Allow-Origin: https://shrutam.ai');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }

$cfg = require __DIR__ . '/../config/db.php';
try {
    $pdo = new PDO(
        "mysql:host={$cfg['host']};dbname={$cfg['dbname']};charset={$cfg['charset']}",
        $cfg['username'], $cfg['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    http_response_code(503);
    echo json_encode(['error' => 'db_unavailable']);
    exit;
}

function clean_uid(string $v): string {
    return preg_match('/^u[a-z0-9]{8,30}$/i', $v) ? $v : '';
}
function clean_lang(string $v): string {
    return in_array($v, ['hi', 'mr', 'te']) ? $v : '';
}

// ── GET ─────────────────────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $uid  = clean_uid($_GET['uid']  ?? '');
    $lang = clean_lang($_GET['lang'] ?? '');
    $day  = intval($_GET['day'] ?? 0);
    if (!$uid || !$lang || $day < 1 || $day > 50) { echo json_encode(['progress' => null]); exit; }

    $stmt = $pdo->prepare("
        SELECT progress_json, quiz_score, quiz_total, completed_at, last_accessed
        FROM   course_progress_v4
        WHERE  user_uid = ? AND lang = ? AND day_number = ?
    ");
    $stmt->execute([$uid, $lang, $day]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(['progress' => $row ?: null]);
    exit;
}

// ── POST ────────────────────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = json_decode(file_get_contents('php://input'), true) ?? [];
    $uid  = clean_uid($body['uid']  ?? '');
    $lang = clean_lang($body['lang'] ?? '');
    $day  = intval($body['day'] ?? 0);

    if (!$uid || !$lang || $day < 1 || $day > 50) {
        http_response_code(400);
        echo json_encode(['error' => 'invalid_params']);
        exit;
    }

    $progress = json_encode([
        'tabs'  => array_values(array_filter($body['tabs']  ?? [], 'is_numeric')),
        'words' => is_array($body['words'] ?? null) ? $body['words'] : [],
        'sents' => array_values(array_filter($body['sents'] ?? [], 'is_numeric')),
    ], JSON_UNESCAPED_UNICODE);

    $quiz_score = min(intval($body['quiz_score'] ?? 0), 100);
    $quiz_total = min(intval($body['quiz_total'] ?? 0), 100);
    $tabs_done  = count($body['tabs'] ?? []);
    $completed  = $tabs_done >= 5 ? date('Y-m-d H:i:s') : null;

    $pdo->prepare("
        INSERT INTO course_progress_v4
            (user_uid, lang, day_number, progress_json, quiz_score, quiz_total, completed_at)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            progress_json = VALUES(progress_json),
            quiz_score    = GREATEST(quiz_score, VALUES(quiz_score)),
            quiz_total    = GREATEST(quiz_total, VALUES(quiz_total)),
            completed_at  = COALESCE(completed_at, VALUES(completed_at)),
            last_accessed = CURRENT_TIMESTAMP
    ")->execute([$uid, $lang, $day, $progress, $quiz_score, $quiz_total, $completed]);

    echo json_encode(['ok' => true]);
    exit;
}

http_response_code(405);
echo json_encode(['error' => 'method_not_allowed']);
