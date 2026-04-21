<?php
/**
 * Verify Firebase login and create PHP session + DB record.
 * POST /api/auth/verify.php
 */
error_reporting(0);
header('Content-Type: application/json');
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false]);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$uid = trim($input['uid'] ?? '');
$name = trim($input['name'] ?? '');
$email = trim($input['email'] ?? '');
$phone = trim($input['phone'] ?? '');

if (!$uid) {
    echo json_encode(['success' => false]);
    exit;
}

// Save to session
$_SESSION['user'] = [
    'uid' => $uid,
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'logged_in' => true,
    'login_time' => time(),
];

// Save to DB
try {
    $c = require __DIR__ . '/../../config/db.php';
    $pdo = new PDO("mysql:host={$c['host']};dbname={$c['dbname']};charset={$c['charset']}", $c['username'], $c['password']);

    // Create users table
    $pdo->query("CREATE TABLE IF NOT EXISTS users (
        uid VARCHAR(128) PRIMARY KEY,
        name VARCHAR(255),
        email VARCHAR(255),
        phone VARCHAR(20),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    // Upsert
    $stmt = $pdo->prepare("INSERT INTO users (uid, name, email, phone) VALUES (?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE name = VALUES(name), email = VALUES(email), phone = VALUES(phone), last_login = NOW()");
    $stmt->execute([$uid, $name, $email, $phone]);
} catch (Exception $e) {
    // Non-fatal
}

echo json_encode(['success' => true, 'name' => $name ?: $phone ?: 'Student']);
