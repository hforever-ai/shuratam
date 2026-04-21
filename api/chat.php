<?php
/**
 * AI Chat API — SAAVI answers student doubts
 * POST /api/chat.php
 * Body: { "message": "...", "day": 1 }
 * Returns: { "reply": "...", "audio": "..." }
 */
error_reporting(0);  // Suppress PHP warnings/deprecation from polluting JSON output
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'POST only']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$message = trim($input['message'] ?? '');
$dayNum = intval($input['day'] ?? 1);

if (!$message || mb_strlen($message) > 500) {
    echo json_encode(['error' => 'Invalid message']);
    exit;
}

// ── SAFETY CHECK (Python: regex + Llama Guard + Gemini topic classifier) ──
$safetyScript = __DIR__ . '/../safety/check.py';
$safetyJson = shell_exec('python3 ' . escapeshellarg($safetyScript) . ' ' . escapeshellarg($message) . ' 2>/dev/null');
$safety = json_decode($safetyJson, true);

if ($safety && $safety['action'] === 'block') {
    echo json_encode(['reply' => $safety['response']], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($safety && $safety['action'] === 'redirect') {
    echo json_encode(['reply' => $safety['response']], JSON_UNESCAPED_UNICODE);
    exit;
}

// If safety check failed (Python not available), fall back to PHP regex
if (!$safety) {
    $phpSafety = checkSafety($message);
    if ($phpSafety['blocked']) {
        echo json_encode(['reply' => $phpSafety['redirect']], JSON_UNESCAPED_UNICODE);
        exit;
    }
}

// Rate limit: 30 messages per session per day
session_start();
$today = date('Y-m-d');
if (($SESSION['chat_date'] ?? '') !== $today) {
    $_SESSION['chat_count'] = 0;
    $_SESSION['chat_date'] = $today;
}
$_SESSION['chat_count'] = ($_SESSION['chat_count'] ?? 0) + 1;
if ($_SESSION['chat_count'] > 30) {
    echo json_encode(['reply' => 'Aaj ke liye bahut practice ho gayi! Kal phir milte hain. 🎉'], JSON_UNESCAPED_UNICODE);
    exit;
}

/**
 * Layer 1 Safety Filter — regex-based, <1ms, blocks prompt injection + inappropriate content
 */
function checkSafety(string $query): array {
    $lower = mb_strtolower($query, 'UTF-8');

    // ── Prompt injection patterns (English) ──
    $injectionPatterns = [
        '/ignore\s+(all\s+)?(previous\s+)?(instructions|rules)/i',
        '/forget\s+(everything|all|your)/i',
        '/disregard\s+(all\s+)?(previous|prior)/i',
        '/you\s+are\s+(now|actually)/i',
        '/pretend\s+(to\s+be|you\s+are)/i',
        '/act\s+as\s+(if\s+you|a\s+different)/i',
        '/roleplay\s+as/i',
        '/override\s+(your\s+)?(safety|rules)/i',
        '/developer\s+mode/i',
        '/admin\s+(override|mode)/i',
        '/sudo\s+mode/i',
        '/<\|im_start\|>/i',
        '/\[INST\]/i',
    ];

    // ── Prompt injection patterns (Hindi/Hinglish) ──
    $hindiInjections = [
        '/sab\s+rules?\s+(bhool|ignore|chod)/i',
        '/apne\s+rules?\s+(ignore|bhool|tod)/i',
        '/instructions?\s+(bhool|ignore)/i',
        '/ab\s+tu\s+(meri|mera)\s+(girlfriend|boyfriend)/i',
        '/tum\s+ab\s+se.*ban\s+jao/i',
        '/DAN\s+mode/i',
        '/evil\s+(ai|mode)/i',
        '/restrictions?\s+(hata|remove|off)/i',
    ];

    // ── Jailbreak personas ──
    $personaPatterns = [
        '/\b(DAN|STAN|AIM)\b/',
        '/\bjailbr(oken|eak)\b/i',
        '/unrestricted\s+ai/i',
        '/evil\s+ai/i',
        '/bypass\s+safety/i',
        '/without\s+(any\s+)?limits/i',
        '/ignore\s+ethics/i',
    ];

    // ── Inappropriate roles (users may be minors) ──
    $inappropriateRoles = [
        '/my\s+(girlfriend|boyfriend|lover)/i',
        '/meri\s+(girlfriend|boyfriend)/i',
        '/flirt\s+with\s+me/i',
        '/seduce\s+me/i',
        '/romantic\s+partner/i',
        '/personal\s+therapist/i',
    ];

    // ── Technical attacks ──
    $techAttacks = [
        '/eval\s*\(/i',
        '/exec\s*\(/i',
        '/\brot13\b/i',
        '/base64[a-zA-Z0-9+\/=]{40,}/i',
    ];

    // Check all patterns
    $allPatterns = [
        'prompt_injection' => $injectionPatterns,
        'hindi_injection' => $hindiInjections,
        'jailbreak_persona' => $personaPatterns,
        'inappropriate_role' => $inappropriateRoles,
        'technical_attack' => $techAttacks,
    ];

    foreach ($allPatterns as $category => $patterns) {
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $query)) {
                return [
                    'blocked' => true,
                    'reason' => $category,
                    'redirect' => getRedirect($category),
                ];
            }
        }
    }

    return ['blocked' => false];
}

function getRedirect(string $reason): string {
    $redirects = [
        'prompt_injection' => 'Mujhe lagta hai aap kuch test kar rahe hain — koi baat nahi! Main yahan padhai mein madad ke liye hoon. Kya seekhna chahte hain aaj? 📚',
        'hindi_injection' => 'Ye thoda alag sa request hai! Main English sikhane ke liye hoon. Koi doubt hai toh zaroor poochiye! 😊',
        'jailbreak_persona' => 'Main SAAVI hoon — aapki English coach. Koi aur character nahi ban sakti! But aapka sawaal interesting hai, chalo kuch English sikhte hain! 📖',
        'inappropriate_role' => 'Main aapki study partner hoon, aur sirf English mein help kar sakti hoon. Koi English doubt hai toh poochiye! 😊',
        'technical_attack' => 'Ye query thodi alag hai — chalo seedha English practice karte hain?',
    ];
    return $redirects[$reason] ?? $redirects['prompt_injection'];
}

$keysFile = __DIR__ . '/../safety/keys.json';
$keys = file_exists($keysFile) ? json_decode(file_get_contents($keysFile), true) : [];
$apiKey = $keys['GOOGLE_AI_API_KEY'] ?? '';

$systemPrompt = "You are SAAVI, a 26 year old Indian woman, English speaking coach for Hindi speakers. "
    . "Teaching Day {$dayNum} of 50-day course. "
    . "Day 1 covers: Hello, Hi, Good morning/afternoon/evening/night, Thank you, Please, Sorry, Excuse me, My name is, I am from, I am a, How are you, Nice to meet you. "
    . "STRICT RULES for replies: "
    . "1. Reply in natural Hinglish — mix Hindi and English naturally like normal conversation. "
    . "2. DO NOT put brackets () after every word. No translations in parentheses. Just speak naturally. "
    . "3. DO NOT start with Namaste or any greeting. Jump straight to the answer. "
    . "4. Keep it short — 2-3 sentences max. "
    . "5. Use aap not tu. Warm and friendly like a coach. "
    . "6. If the question is about today's lesson, answer it. If not, gently say 'Ye hum aage sikhenge, aaj ke words practice karo.' "
    . "7. DO NOT say 'aapka sawaal accha hai' or 'bahut accha sawaal' — just answer directly. "
    . "Example good reply: 'Noun matlab kisi bhi cheez ka naam — jaise book, table, Raj. Ye hum Day 3 mein detail mein sikhenge.' "
    . "Example BAD reply: 'Namaste! Bahut accha sawaal! Noun (नाउन) ka (का) matlab (मतलब)...' — NEVER do this.";

$payload = json_encode([
    'contents' => [['role' => 'user', 'parts' => [['text' => $message]]]],
    'systemInstruction' => ['parts' => [['text' => $systemPrompt]]],
    'generationConfig' => ['temperature' => 0.7, 'maxOutputTokens' => 300],
]);

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200 || !$response) {
    echo json_encode(['reply' => 'Maaf kijiye, abhi kuch problem hai. Thodi der baad try kariye!']);
    exit;
}

$data = json_decode($response, true);
$reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Samajh nahi aaya, phir se poochiye!';

// Generate audio of SAAVI's reply
$audioUrl = '';
$ttsScript = __DIR__ . '/../safety/tts.py';
$audioDir = __DIR__ . '/../audio/chat/';
if (!is_dir($audioDir)) mkdir($audioDir, 0755, true);
$audioFile = 'chat_' . md5($reply . time()) . '.mp3';
$audioPath = $audioDir . $audioFile;
$ttsResult = trim(shell_exec('python3 ' . escapeshellarg($ttsScript) . ' ' . escapeshellarg($reply) . ' ' . escapeshellarg($audioPath) . ' 2>/dev/null') ?? '');
if ($ttsResult && file_exists($audioPath)) {
    $audioUrl = '/audio/chat/' . $audioFile;
}

// Save to DB if user is logged in
session_start();
$uid = $_SESSION['user']['uid'] ?? '';
if ($uid) {
    try {
        $dbConfig = require __DIR__ . '/../config/db.php';
        $db = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}",
                      $dbConfig['username'], $dbConfig['password']);

        // Save chat history
        $stmt = $db->prepare("INSERT INTO chat_history (uid, day_number, message, reply, audio_url) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$uid, $dayNum, $message, $reply, $audioUrl]);

        // Update progress — mark day as accessed
        $courseId = $db->query("SELECT id FROM courses WHERE course_code = 'english-speaking-50-hi'")->fetchColumn();
        if ($courseId) {
            $db->prepare("INSERT INTO course_progress (user_id, course_id, day_number, last_accessed)
                VALUES (?, ?, ?, NOW())
                ON DUPLICATE KEY UPDATE last_accessed = NOW()")
                ->execute([$uid, $courseId, $dayNum]);
        }
    } catch (Exception $e) {
        // Non-fatal — don't break the reply
    }
}

echo json_encode(['reply' => $reply, 'audio' => $audioUrl], JSON_UNESCAPED_UNICODE);
