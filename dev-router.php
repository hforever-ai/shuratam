<?php
/**
 * Dev server router — simulates .htaccess rewrite rules for PHP built-in server.
 * Usage: php -S localhost:8888 dev-router.php
 */

$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

// Serve static files directly (CSS, JS, images, fonts, txt, xml)
$file = __DIR__ . $path;
if ($path !== '/' && is_file($file)) {
    // Set content type for known extensions
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $mimeTypes = [
        'css' => 'text/css',
        'js' => 'application/javascript',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'svg' => 'image/svg+xml',
        'json' => 'application/json',
        'xml' => 'application/xml',
        'txt' => 'text/plain',
        'ico' => 'image/x-icon',
    ];
    if (isset($mimeTypes[$ext])) {
        header('Content-Type: ' . $mimeTypes[$ext]);
    }
    return false; // Let PHP serve the file
}

// Multi-language routes: /{lang}/... → router.php
if (preg_match('#^/(hi|en|mr|te)(/(.*))?$#', $path, $m)) {
    $_GET['lang'] = $m[1];
    $_GET['path'] = $m[3] ?? '';
    include __DIR__ . '/router.php';
    return;
}

// Directory index: /some-path/ → /some-path/index.php
$indexFile = __DIR__ . rtrim($path, '/') . '/index.php';
if (is_file($indexFile)) {
    chdir(dirname($indexFile));
    include $indexFile;
    return;
}

// Root
if ($path === '/') {
    chdir(__DIR__);
    include __DIR__ . '/index.php';
    return;
}

// Clean URLs: /some-path → /some-path.php
$phpFile = __DIR__ . $path . '.php';
if (is_file($phpFile)) {
    chdir(dirname($phpFile));
    include $phpFile;
    return;
}

// 404
http_response_code(404);
chdir(__DIR__);
include __DIR__ . '/index.php';
