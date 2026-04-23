-- ═══════════════════════════════════════════════════════════════
-- Shrutam v4 Migration — run on Hostinger MySQL (shrutam_db)
-- Safe to run multiple times (all IF NOT EXISTS / ON DUPLICATE)
-- ═══════════════════════════════════════════════════════════════

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ───────────────────────────────────────────────────────────────
-- 1. Add tab_json column to course_days
--    Holds the full v4 JSON from generate_day_content.py.
--    Audio URLs inside this JSON get updated as TTS generates.
-- ───────────────────────────────────────────────────────────────
ALTER TABLE course_days
    ADD COLUMN IF NOT EXISTS tab_json LONGTEXT AFTER is_published,
    ADD COLUMN IF NOT EXISTS tab_json_version TINYINT DEFAULT 4 AFTER tab_json;

-- ───────────────────────────────────────────────────────────────
-- 2. TTS audio tracking table
--
--    R2 key convention:
--      tts/{lang}/day_{DD}/t1_w{WW}_saavi.mp3          — word SAAVI explanation
--      tts/{lang}/day_{DD}/t1_w{WW}_ex{EE}_v1.mp3      — example, male voice
--      tts/{lang}/day_{DD}/t1_w{WW}_ex{EE}_v2.mp3      — example, female voice
--      tts/{lang}/day_{DD}/t1_w{WW}_mistake_wrong.mp3  — common mistake (wrong)
--      tts/{lang}/day_{DD}/t1_w{WW}_mistake_right.mp3  — common mistake (right)
--      tts/{lang}/day_{DD}/t2_s{SS}_v1.mp3             — listen_repeat, voice_1
--      tts/{lang}/day_{DD}/t3_d{LL}_{voice}.mp3        — dialogue line, speaker voice
--      tts/{lang}/day_{DD}/t3_d{LL}_saavi.mp3          — dialogue SAAVI explanation
--      tts/{lang}/day_{DD}/t4_summary_saavi.mp3        — summary SAAVI closing
--
--    Approx per day: ~218 clips  ×  50 days  ×  3 langs = 32,700 total
-- ───────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS tts_audio (
    id          INT AUTO_INCREMENT PRIMARY KEY,

    -- what this clip belongs to
    lang        CHAR(5) NOT NULL,                   -- 'hi', 'mr', 'te'
    day_number  TINYINT UNSIGNED NOT NULL,          -- 1-50
    audio_key   VARCHAR(80) NOT NULL,               -- 't1_w03_ex02_v1'
    tab         TINYINT UNSIGNED NOT NULL,          -- 1-5

    -- storage
    r2_key      VARCHAR(200) NOT NULL,              -- 'tts/hi/day_01/t1_w03_ex02_v1.mp3'
    r2_url      VARCHAR(500) NOT NULL,              -- public CDN URL

    -- generation metadata
    voice       VARCHAR(30) NOT NULL,               -- 'saavi', 'voice_1', 'voice_2'
    source_text TEXT,                               -- raw text that was synthesized
    text_hash   CHAR(32),                           -- MD5(source_text) for change detection
    duration_ms INT UNSIGNED DEFAULT 0,

    -- status
    status      ENUM('pending','done','error') DEFAULT 'pending',
    error_msg   VARCHAR(500),

    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    UNIQUE KEY uq_audio (lang, day_number, audio_key),
    INDEX idx_lang_day (lang, day_number),
    INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ───────────────────────────────────────────────────────────────
-- 3. SEO pages table
--
--    One row per day × language = 150 SEO pages (50 days × 3 langs).
--    Each page gets its own URL, meta tags, H1, JSON-LD schema.
--
--    URL pattern: /learn-english/{lang}/day-{N}-{slug}/
--      e.g. /learn-english/hindi/day-1-greetings-self-introduction-hindi/
--
--    PHP reads these rows to render server-side SEO pages with
--    correct canonical URLs, meta descriptions, and JSON-LD.
-- ───────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS seo_pages (
    id              INT AUTO_INCREMENT PRIMARY KEY,

    -- identity
    lang            CHAR(5) NOT NULL,               -- 'hi', 'mr', 'te'
    day_number      TINYINT UNSIGNED NOT NULL,       -- 1-50
    url_slug        VARCHAR(200) NOT NULL,           -- 'day-1-greetings-self-introduction-hindi'

    -- core meta
    meta_title      VARCHAR(255) NOT NULL,
    meta_description VARCHAR(500) NOT NULL,
    h1_heading      VARCHAR(255) NOT NULL,

    -- structured content (from v4 seo block)
    keywords        JSON,                           -- ["English greetings", ...]
    search_intent   JSON,                           -- ["How to greet in English?", ...]
    schema_markup   JSON,                           -- JSON-LD object for <script type="application/ld+json">
    target_audience JSON,                           -- {primary, age, location}

    -- publishing
    is_published    TINYINT(1) DEFAULT 0,
    canonical_url   VARCHAR(500),                   -- full absolute URL

    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    UNIQUE KEY uq_seo_page (lang, day_number),
    UNIQUE KEY uq_slug (url_slug),
    INDEX idx_published (is_published)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ───────────────────────────────────────────────────────────────
-- 4. User progress table (v4 — UUID-based, no login required)
--    course_progress_v4 stores per-user, per-day, per-lang state.
--    Written by /api/progress.php (dynamic, NOT CF-cached).
-- ───────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS course_progress_v4 (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    user_uid      VARCHAR(40) NOT NULL,        -- UUID from localStorage ('u' + alphanum)
    lang          CHAR(5) NOT NULL,             -- 'hi', 'mr', 'te'
    day_number    TINYINT UNSIGNED NOT NULL,    -- 1-50
    progress_json JSON,                         -- {tabs:[0,1,2], words:{1:1,2:1}, sents:[1,2]}
    quiz_score    TINYINT UNSIGNED DEFAULT 0,
    quiz_total    TINYINT UNSIGNED DEFAULT 0,
    completed_at  TIMESTAMP NULL,               -- set when all 5 tabs visited
    last_accessed TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uq_progress (user_uid, lang, day_number),
    INDEX idx_uid (user_uid),
    INDEX idx_lang_day (lang, day_number)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ───────────────────────────────────────────────────────────────
-- 5. Seed missing courses (Marathi + Telugu)
-- ───────────────────────────────────────────────────────────────
INSERT INTO courses (course_code, title_source, title_target, source_lang, target_lang, total_days)
VALUES ('english-speaking-50-mr', 'इंग्लिश बोलायला शिका — 50 दिवस', 'Learn English Speaking — 50 Days', 'mr', 'en', 50)
ON DUPLICATE KEY UPDATE title_source = VALUES(title_source);

INSERT INTO courses (course_code, title_source, title_target, source_lang, target_lang, total_days)
VALUES ('english-speaking-50-te', 'ఇంగ్లీష్ మాట్లాడటం నేర్చుకోండి — 50 రోజులు', 'Learn English Speaking — 50 Days', 'te', 'en', 50)
ON DUPLICATE KEY UPDATE title_source = VALUES(title_source);

SET FOREIGN_KEY_CHECKS = 1;

-- ═══════════════════════════════════════════════════════════════
-- DONE. Verify with:
--   DESCRIBE course_days;
--   SHOW CREATE TABLE tts_audio\G
--   SELECT course_code, source_lang FROM courses;
-- ═══════════════════════════════════════════════════════════════
