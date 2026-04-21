<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

if (($_GET['key'] ?? '') !== 'shrutam_setup_2026') {
    http_response_code(403);
    die('{"error":"unauthorized"}');
}

// Accept config via POST body
$input = json_decode(file_get_contents('php://input'), true);
if (empty($input['db']) || empty($input['apis'])) {
    die(json_encode(['error' => 'POST JSON body with {db:{host,dbname,username,password},apis:{google,groq}}']));
}

$c = $input['db'];
$c['charset'] = 'utf8mb4';

// Write config/db.php
$dbDir = __DIR__ . '/../config';
@mkdir($dbDir, 0755, true);
file_put_contents($dbDir . '/db.php', "<?php\nreturn " . var_export($c, true) . ";\n");

// Write safety/keys.json
$safetyDir = __DIR__ . '/../safety';
@mkdir($safetyDir, 0755, true);
file_put_contents($safetyDir . '/keys.json', json_encode([
    'GOOGLE_AI_API_KEY' => $input['apis']['google'],
    'GROQ_API_KEY' => $input['apis']['groq'],
], JSON_PRETTY_PRINT));

try {
    $pdo = new PDO("mysql:host={$c['host']};dbname={$c['dbname']};charset={$c['charset']}", $c['username'], $c['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $sqlFile = __DIR__ . '/../sql/complete_setup.sql';
    if (!file_exists($sqlFile)) {
        die(json_encode(['error' => 'SQL file not found']));
    }

    $sql = file_get_contents($sqlFile);
    $statements = array_filter(array_map('trim', preg_split('/;\s*\n/', $sql)));

    $ok = 0;
    $fail = 0;
    $errs = [];

    foreach ($statements as $s) {
        $s = trim($s);
        if (empty($s) || strpos($s, '--') === 0) continue;
        try {
            $pdo->exec($s);
            $ok++;
        } catch (Exception $e) {
            $fail++;
            $errs[] = substr($e->getMessage(), 0, 120);
        }
    }

    if (function_exists('opcache_reset')) opcache_reset();
    clearstatcache(true);

    echo json_encode(['ok' => $ok, 'fail' => $fail, 'errors' => array_slice($errs, 0, 10),
        'config_written' => file_exists($dbDir . '/db.php'),
        'keys_written' => file_exists($safetyDir . '/keys.json'),
    ], JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
