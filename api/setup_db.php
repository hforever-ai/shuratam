<?php
/**
 * One-time DB setup — run SQL schema + seed data.
 * DELETE THIS FILE after running.
 * Usage: POST /api/setup_db.php with secret key
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Simple auth — prevent random access
$key = $_GET['key'] ?? '';
if ($key !== 'shrutam_setup_2026') {
    http_response_code(403);
    echo json_encode(['error' => 'unauthorized']);
    exit;
}

try {
    $c = require __DIR__ . '/../config/db.php';
    $pdo = new PDO("mysql:host={$c['host']};dbname={$c['dbname']};charset={$c['charset']}", $c['username'], $c['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    
    $sqlFile = __DIR__ . '/../sql/complete_setup.sql';
    if (!file_exists($sqlFile)) {
        echo json_encode(['error' => 'SQL file not found']);
        exit;
    }
    
    $sql = file_get_contents($sqlFile);
    
    // Split by semicolons (handling multi-line statements)
    $statements = array_filter(array_map('trim', preg_split('/;\s*\n/', $sql)));
    
    $results = [];
    $success = 0;
    $errors = 0;
    
    foreach ($statements as $stmt) {
        $stmt = trim($stmt);
        if (empty($stmt) || strpos($stmt, '--') === 0) continue;
        // Skip SET statements handled inline
        try {
            $pdo->exec($stmt);
            $success++;
        } catch (Exception $e) {
            $errors++;
            $results[] = ['error' => $e->getMessage(), 'sql' => substr($stmt, 0, 100)];
        }
    }
    
    echo json_encode([
        'success' => $success,
        'errors' => $errors,
        'details' => array_slice($results, 0, 10),
    ], JSON_PRETTY_PRINT);
    
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
