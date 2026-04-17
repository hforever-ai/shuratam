<?php
/**
 * Waitlist API Endpoint
 * POST /api/waitlist
 * Saves name, email, class, board to MySQL
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: https://shrutam.ai');
header('Access-Control-Allow-Methods: POST');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$configPath = __DIR__ . '/../config/db.php';
if (!file_exists($configPath)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database not configured']);
    exit;
}

$config = require $configPath;

$name  = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$class = intval($_POST['class'] ?? 0);
$board = trim($_POST['board'] ?? '');

if (empty($name) || empty($email)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Name aur email dono zaroori hain']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Valid email daalo']);
    exit;
}

session_start();
$now = time();
$lastSubmit = $_SESSION['last_waitlist_submit'] ?? 0;
if ($now - $lastSubmit < 60) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Thoda ruko — 1 minute mein ek baar']);
    exit;
}

try {
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
    $pdo = new PDO($dsn, $config['username'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    $stmt = $pdo->prepare('INSERT INTO waitlist (name, email, class, board) VALUES (:name, :email, :class, :board)');
    $stmt->execute([
        ':name'  => $name,
        ':email' => $email,
        ':class' => $class ?: null,
        ':board' => $board ?: null,
    ]);

    $_SESSION['last_waitlist_submit'] = $now;

    echo json_encode(['success' => true, 'message' => 'Welcome! Tum waitlist mein ho 🎉']);

} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        echo json_encode(['success' => false, 'message' => 'Yeh email pehle se waitlist mein hai!']);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Server error. Try again later.']);
    }
}
