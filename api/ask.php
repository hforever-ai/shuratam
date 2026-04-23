<?php
/**
 * /api/ask.php — Semantic search over course content.
 *
 * GET ?q=<query>&lang=<hi|mr|te>&k=5
 *   → { "results": [ { "day", "type", "word", "text", "score" }, ... ] }
 *
 * Flow:
 *   1. Embed query via Gemini embedding API
 *   2. Cosine similarity against pre-computed vectors
 *   3. Return top-K matches
 */

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('Access-Control-Allow-Origin: *');

$q    = trim($_GET['q'] ?? '');
$lang = trim($_GET['lang'] ?? '');
$k    = min(max((int)($_GET['k'] ?? 5), 1), 20);

if (!$q) {
    echo json_encode(['error' => 'missing ?q= parameter']);
    exit;
}

// ── Load API key ────────────────────────────────────────────────────────────
$keysFile = __DIR__ . '/../safety/keys.json';
$keys = json_decode(file_get_contents($keysFile), true);
$apiKey = $keys['GOOGLE_AI_API_KEYS'][0] ?? $keys['GOOGLE_AI_API_KEY'] ?? '';

// ── Embed the query ─────────────────────────────────────────────────────────
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-embedding-001:embedContent?key=" . urlencode($apiKey);
$payload = json_encode([
    'content' => ['parts' => [['text' => $q]]],
]);

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 15,
]);
$resp = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200) {
    echo json_encode(['error' => 'embedding failed', 'status' => $httpCode]);
    exit;
}

$embData = json_decode($resp, true);
$queryVec = $embData['embedding']['values'] ?? [];
if (!$queryVec) {
    echo json_encode(['error' => 'no embedding returned']);
    exit;
}
$dims = count($queryVec);

// ── Load pre-computed vectors ───────────────────────────────────────────────
$metaFile = __DIR__ . '/../audio_output/embeddings_meta.json';
$vecFile  = __DIR__ . '/../audio_output/embeddings_vectors.bin';

$meta = json_decode(file_get_contents($metaFile), true);
$vecData = file_get_contents($vecFile);
$numVectors = count($meta);

// ── Cosine similarity search ────────────────────────────────────────────────
$qNorm = 0;
for ($i = 0; $i < $dims; $i++) {
    $qNorm += $queryVec[$i] * $queryVec[$i];
}
$qNorm = sqrt($qNorm);

$scores = [];
$bytesPerVector = $dims * 4;

for ($idx = 0; $idx < $numVectors; $idx++) {
    if ($lang && $meta[$idx]['lang'] !== $lang) {
        continue;
    }

    $offset = $idx * $bytesPerVector;
    $floats = unpack("f{$dims}", substr($vecData, $offset, $bytesPerVector));

    $dot = 0;
    $vNorm = 0;
    for ($i = 1; $i <= $dims; $i++) {
        $dot += $queryVec[$i - 1] * $floats[$i];
        $vNorm += $floats[$i] * $floats[$i];
    }
    $vNorm = sqrt($vNorm);

    $sim = ($qNorm > 0 && $vNorm > 0) ? ($dot / ($qNorm * $vNorm)) : 0;
    $scores[] = ['idx' => $idx, 'score' => $sim];
}

usort($scores, fn($a, $b) => $b['score'] <=> $a['score']);

$results = [];
for ($i = 0; $i < min($k, count($scores)); $i++) {
    $idx = $scores[$i]['idx'];
    $results[] = [
        'day'   => $meta[$idx]['day'],
        'lang'  => $meta[$idx]['lang'],
        'type'  => $meta[$idx]['type'],
        'word'  => $meta[$idx]['word'] ?? '',
        'text'  => $meta[$idx]['text'],
        'score' => round($scores[$i]['score'], 4),
    ];
}

echo json_encode([
    'query' => $q,
    'lang' => $lang ?: 'all',
    'results' => $results,
], JSON_UNESCAPED_UNICODE);
