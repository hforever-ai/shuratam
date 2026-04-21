-- ═══════════════════════════════════════════════════════
-- Shrutam English Speaking Course — MySQL Schema
-- Run on Hostinger MySQL (shrutam_db)
-- ═══════════════════════════════════════════════════════

-- 1. Courses (extensible: Hindi→English, Marathi→English, Telugu→English)
CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(50) UNIQUE NOT NULL,         -- 'english-speaking-50-hi'
    title_source VARCHAR(255) NOT NULL,              -- 'अंग्रेज़ी बोलना सीखें'
    title_target VARCHAR(255) NOT NULL,              -- 'Learn English Speaking'
    source_lang CHAR(5) NOT NULL DEFAULT 'hi',       -- 'hi', 'mr', 'te'
    target_lang CHAR(5) NOT NULL DEFAULT 'en',       -- 'en'
    total_days INT NOT NULL DEFAULT 50,
    level_start VARCHAR(10) DEFAULT 'A1',
    level_end VARCHAR(10) DEFAULT 'A2',
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Days (each day's metadata)
CREATE TABLE IF NOT EXISTS course_days (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    day_number INT NOT NULL,
    title_source VARCHAR(255) NOT NULL,              -- 'पहला कदम'
    title_target VARCHAR(255) NOT NULL,              -- 'First Step'
    level VARCHAR(10) DEFAULT 'A1',
    phase INT DEFAULT 1,
    total_audio_sec INT DEFAULT 0,
    is_published TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY (course_id, day_number),
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Blocks (each block within a day — audio + text)
CREATE TABLE IF NOT EXISTS course_blocks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day_id INT NOT NULL,
    block_order INT NOT NULL,                        -- 0=recap, 1=intro, 2=teaching...
    block_type ENUM('recap','intro','teaching','listen_repeat','situation','summary') NOT NULL,
    title VARCHAR(255),
    audio_url VARCHAR(500),                          -- R2 URL
    audio_duration_sec INT DEFAULT 0,
    display_content JSON NOT NULL,                   -- full text/cards for UI display
    saavi_script TEXT,                               -- what SAAVI says (for TTS generation)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (day_id) REFERENCES course_days(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Quiz items (separate from blocks for tab-based UI)
CREATE TABLE IF NOT EXISTS course_quiz (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day_id INT NOT NULL,
    quiz_type ENUM('mcq','fill_blank','true_false','flashcard','matching') NOT NULL,
    question_data JSON NOT NULL,                     -- {q, options, answer, hint}
    display_order INT DEFAULT 0,
    FOREIGN KEY (day_id) REFERENCES course_days(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. User progress
CREATE TABLE IF NOT EXISTS course_progress (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(100) NOT NULL,                   -- cookie/session based (free course)
    course_id INT NOT NULL,
    day_number INT NOT NULL,
    blocks_completed INT DEFAULT 0,
    quiz_score INT DEFAULT 0,
    quiz_total INT DEFAULT 0,
    completed_at TIMESTAMP NULL,
    last_accessed TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY (user_id, course_id, day_number),
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ═══════════════════════════════════════════════════════
-- Seed: Create Hindi→English course
-- ═══════════════════════════════════════════════════════
INSERT INTO courses (course_code, title_source, title_target, source_lang, target_lang, total_days)
VALUES ('english-speaking-50-hi', 'अंग्रेज़ी बोलना सीखें — 50 दिन', 'Learn English Speaking — 50 Days', 'hi', 'en', 50)
ON DUPLICATE KEY UPDATE title_source = VALUES(title_source);
