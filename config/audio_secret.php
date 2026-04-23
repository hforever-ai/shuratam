<?php
/**
 * Shared secret for HMAC-signed audio proxy URLs.
 * NEVER commit the real value — copy from server config or env.
 */
return [
    // openssl rand -hex 32
    'secret' => getenv('AUDIO_SECRET') ?: 'b3f9a12e7c4d8e6f1a2b5c9d0e3f7a8b4c6d2e9f0a1b5c8d3e7f2a6b9c4d1e8f',
    'r2_base' => 'https://audio.shrutam.ai',
];
