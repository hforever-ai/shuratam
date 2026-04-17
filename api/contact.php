<?php
/**
 * Contact API Endpoint
 * POST /api/contact
 * Saves name, email, message to MySQL
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

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Sab fields zaroori hain']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Valid email daalo']);
    exit;
}

session_start();
$now = time();
$lastSubmit = $_SESSION['last_contact_submit'] ?? 0;
if ($now - $lastSubmit < 60) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Thoda ruko — 1 minute mein ek baar']);
    exit;
}

try {
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
    $pdo = new PDO($dsn, $config['username'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $stmt = $pdo->prepare('INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)');
    $stmt->execute([
        ':name'    => $name,
        ':email'   => $email,
        ':message' => $message,
    ]);

    $_SESSION['last_contact_submit'] = $now;

    echo json_encode(['success' => true, 'message' => 'Message mil gaya! Hum jaldi reply karenge.']);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server error. Try again later.']);
}
