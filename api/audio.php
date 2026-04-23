<?php
/**
 * /api/audio.php — HMAC-signed audio proxy.
 *
 * Never exposes the real R2 URL in page source.
 * Tokens are time-limited (hourly window) and key-scoped.
 *
 * GET  ?r2=<r2_key_path>&exp=<unix_ts>&sig=<hmac_hex>
 *        → 302 to real R2 URL  (valid token)
 *        → 403 Forbidden        (bad / expired token)
 *
 * GET  ?r2=<r2_key_path>&sign=1
 *        → {"url": "<signed_proxy_url>"}   (for JS clients on the same server)
 *        → 403 if not same-origin request
 */

header('Cache-Control: no-store, no-cache');
header('X-Content-Type-Options: nosniff');

$cfg    = require __DIR__ . '/../config/audio_secret.php';
$secret = $cfg['secret'];
$r2base = rtrim($cfg['r2_base'], '/');

$r2  = trim($_GET['r2']  ?? '');
$exp = (int)($_GET['exp'] ?? 0);
$sig = trim($_GET['sig']  ?? '');

// ── validate r2 key path (no path traversal) ─────────────────────────────────
if (!$r2 || !preg_match('#^tts/[a-z]{2}/day_\d{2}/[\w\-]+\.mp3$#', $r2)) {
    http_response_code(400);
    echo json_encode(['error' => 'invalid_key']);
    exit;
}

// ── sign=1 mode: generate a signed URL (same-origin only) ────────────────────
if (isset($_GET['sign'])) {
    // Only allow calls from pages served by this same server
    $origin = $_SERVER['HTTP_ORIGIN'] ?? '';
    $referer = $_SERVER['HTTP_REFERER'] ?? '';
    if (!$origin && !$referer) {
        http_response_code(403); exit;
    }
    // Token expires at the end of the next full hour
    $exp_ts  = (int)(ceil((time() + 1) / 3600) * 3600);
    $new_sig = hash_hmac('sha256', $r2 . ':' . $exp_ts, $secret);
    $url = '/api/audio.php?r2=' . rawurlencode($r2)
         . '&exp=' . $exp_ts
         . '&sig=' . $new_sig;
    header('Content-Type: application/json');
    echo json_encode(['url' => $url]);
    exit;
}

// ── validate HMAC token ───────────────────────────────────────────────────────
if (!$exp || !$sig) {
    http_response_code(403);
    echo json_encode(['error' => 'missing_token']);
    exit;
}
if ($exp < time()) {
    http_response_code(403);
    echo json_encode(['error' => 'token_expired']);
    exit;
}
$expected = hash_hmac('sha256', $r2 . ':' . $exp, $secret);
if (!hash_equals($expected, $sig)) {
    http_response_code(403);
    echo json_encode(['error' => 'invalid_sig']);
    exit;
}

// ── valid — redirect to R2 ────────────────────────────────────────────────────
header('Location: ' . $r2base . '/' . $r2);
http_response_code(302);
exit;
