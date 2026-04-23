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

    // Tables already created from first run. Now insert data using PHP lookups instead of MySQL @variables.
    $ok = 0;
    $fail = 0;
    $errs = [];

    // Seed courses
    $pdo->exec("INSERT INTO courses (course_code, title_source, title_target, source_lang, target_lang, total_days)
        VALUES ('english-speaking-50-hi', 'अंग्रेज़ी बोलना सीखें — 50 दिन', 'Learn English Speaking — 50 Days', 'hi', 'en', 50)
        ON DUPLICATE KEY UPDATE title_source = VALUES(title_source)");
    $pdo->exec("INSERT INTO courses (course_code, title_source, title_target, source_lang, target_lang, total_days)
        VALUES ('english-speaking-50-mr', 'इंग्लिश बोलायला शिका — 50 दिवस', 'Learn English Speaking — 50 Days', 'mr', 'en', 50)
        ON DUPLICATE KEY UPDATE title_source = VALUES(title_source)");
    $ok += 2;

    // Load JSON content files
    $hiJson = __DIR__ . '/../sql/../spoken-english/../public_html/../../';
    // Actually, read from the JSON files that were used to generate SQL.
    // Simpler: just use PHP to resolve @variables
    $languages = [
        'hi' => 'english-speaking-50-hi',
        'mr' => 'english-speaking-50-mr',
    ];

    $sqlFile = __DIR__ . '/../sql/complete_setup.sql';
    $sql = file_get_contents($sqlFile);

    // Extract and run statements, resolving @variables in PHP
    $courseId = null;
    $dayId = null;
    $statements = array_filter(array_map('trim', preg_split('/;\s*\n/', $sql)));

    foreach ($statements as $s) {
        $s = trim($s);
        if (empty($s) || strpos($s, '--') === 0) continue;
        // Skip CREATE TABLE (already done) and SET NAMES/FOREIGN_KEY
        if (preg_match('/^(CREATE TABLE|SET NAMES|SET FOREIGN)/i', $s)) { $ok++; continue; }

        // Resolve SET @course_id
        if (preg_match("/SET @course_id.*course_code = '([^']+)'/", $s, $m)) {
            $courseId = $pdo->query("SELECT id FROM courses WHERE course_code = '{$m[1]}'")->fetchColumn();
            $ok++;
            continue;
        }
        // Resolve SET @day_id
        if (preg_match("/SET @day_id.*course_id = @course_id AND day_number = (\d+)/", $s, $m)) {
            $dayId = $pdo->query("SELECT id FROM course_days WHERE course_id = {$courseId} AND day_number = {$m[1]}")->fetchColumn();
            $ok++;
            continue;
        }

        // Replace @course_id and @day_id with actual values
        $s = str_replace('@course_id', $courseId ?: 'NULL', $s);
        $s = str_replace('@day_id', $dayId ?: 'NULL', $s);

        try {
            $pdo->exec($s);
            $ok++;
        } catch (Exception $e) {
            $fail++;
            $errs[] = substr($s, 0, 60) . ' → ' . substr($e->getMessage(), 0, 80);
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
