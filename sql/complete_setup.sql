-- ═══════════════════════════════════════════════════════
-- Shrutam English Speaking Course — COMPLETE Setup
-- Paste this entire file into Hostinger phpMyAdmin SQL tab
-- ═══════════════════════════════════════════════════════

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ═══ 1. SCHEMA ═══

CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(50) UNIQUE NOT NULL,
    title_source VARCHAR(255) NOT NULL,
    title_target VARCHAR(255) NOT NULL,
    source_lang CHAR(5) NOT NULL DEFAULT 'hi',
    target_lang CHAR(5) NOT NULL DEFAULT 'en',
    total_days INT NOT NULL DEFAULT 50,
    level_start VARCHAR(10) DEFAULT 'A1',
    level_end VARCHAR(10) DEFAULT 'A2',
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS course_days (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    day_number INT NOT NULL,
    title_source VARCHAR(255) NOT NULL,
    title_target VARCHAR(255) NOT NULL,
    level VARCHAR(10) DEFAULT 'A1',
    phase INT DEFAULT 1,
    total_audio_sec INT DEFAULT 0,
    is_published TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY (course_id, day_number),
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS course_blocks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day_id INT NOT NULL,
    block_order INT NOT NULL,
    block_type ENUM('recap','intro','teaching','listen_repeat','situation','summary') NOT NULL,
    title VARCHAR(255),
    audio_url VARCHAR(500),
    audio_duration_sec INT DEFAULT 0,
    display_content JSON NOT NULL,
    saavi_script TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (day_id) REFERENCES course_days(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS course_quiz (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day_id INT NOT NULL,
    quiz_type ENUM('mcq','fill_blank','true_false','flashcard','matching') NOT NULL,
    question_data JSON NOT NULL,
    display_order INT DEFAULT 0,
    FOREIGN KEY (day_id) REFERENCES course_days(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS course_progress (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(100) NOT NULL,
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

CREATE TABLE IF NOT EXISTS users (
    uid VARCHAR(128) PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS chat_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uid VARCHAR(128) NOT NULL,
    day_number INT NOT NULL,
    message TEXT NOT NULL,
    reply TEXT,
    audio_url VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_uid (uid),
    INDEX idx_day (day_number)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ═══ 2. SEED COURSES ═══

INSERT INTO courses (course_code, title_source, title_target, source_lang, target_lang, total_days)
VALUES ('english-speaking-50-hi', 'अंग्रेज़ी बोलना सीखें — 50 दिन', 'Learn English Speaking — 50 Days', 'hi', 'en', 50)
ON DUPLICATE KEY UPDATE title_source = VALUES(title_source);

INSERT INTO courses (course_code, title_source, title_target, source_lang, target_lang, total_days)
VALUES ('english-speaking-50-mr', 'इंग्लिश बोलायला शिका — 50 दिवस', 'Learn English Speaking — 50 Days', 'mr', 'en', 50)
ON DUPLICATE KEY UPDATE title_source = VALUES(title_source);

-- ═══ 3. HINDI DAY 1 DATA ═══

-- ═══ DAY 1: english-speaking-50-hi ═══
SET @course_id = (SELECT id FROM courses WHERE course_code = 'english-speaking-50-hi');
INSERT INTO course_days (course_id, day_number, title_source, title_target, level, phase, is_published)
VALUES (@course_id, 1, 'Day 1: Welcome to Shrutam! (श्रुतम् में आपका स्वागत है!)', 'Day 1', 'A1', 1, 1)
ON DUPLICATE KEY UPDATE title_source = VALUES(title_source), is_published = 1;
SET @day_id = (SELECT id FROM course_days WHERE course_id = @course_id AND day_number = 1);
DELETE FROM course_blocks WHERE day_id = @day_id;
DELETE FROM course_quiz WHERE day_id = @day_id;

INSERT INTO course_blocks (day_id, block_order, block_type, title, display_content, saavi_script)
VALUES (@day_id, 1, 'intro', 'Day 1: Welcome to Shrutam! (श्रुतम् में आपका स्वागत है!)', '{"heading": "🎯 Day 1: Welcome to Shrutam! (श्रुतम् में आपका स्वागत है!)", "points": [{"text": "Namaste! Main Saavi hoon, aur agle 50 dinon tak aapki English coach. English se dosti karne ke is safar mein main aapke saath hoon. Aapko shayad yakeen na ho, par main bhi ek engineering student thi jise English se bohot darr lagta tha. Main isse hamesha bhaagti thi. Phir meri kuch aisi dost banin jinhe Hindi bilkul nahi aati thi. Ab majboori thi, English bolni hi padi. Aur pata hai kya hua? Dheere-dheere mera darr nikal gaya. Maine ek cheez seekhi - aap jis cheez se jitna bhaagte hain, woh aapke utna hi saamne aati hai. English koi rocket science nahi hai, yeh bas ek bhasha (language) hai, jaise Hindi hai. Toh chaliye, is 50 din ke safar mein hum is darr ko hamesha ke liye bhaga dete hain."}, {"text": "Aaj Day 1 hai aur humara goal hai basic greetings (अभिवादन) aur introductions (परिचय) seekhna. Yeh English mein batchit shuru karne ka sabse pehla aur zaroori kadam hai."}]}', 'Namaste! Main Saavi hoon, aur agle 50 dinon tak aapki English coach. English se dosti karne ke is safar mein main aapke saath hoon. Aapko shayad yakeen na ho, par main bhi ek engineering student thi jise English se bohot darr lagta tha. Main isse hamesha bhaagti thi. Phir meri kuch aisi dost banin jinhe Hindi bilkul nahi aati thi. Ab majboori thi, English bolni hi padi. Aur pata hai kya hua? Dheere-dheere mera darr nikal gaya. Maine ek cheez seekhi - aap jis cheez se jitna bhaagte hain, woh aapke utna hi saamne aati hai. English koi rocket science nahi hai, yeh bas ek bhasha (language) hai, jaise Hindi hai. Toh chaliye, is 50 din ke safar mein hum is darr ko hamesha ke liye bhaga dete hain.

Aaj Day 1 hai aur humara goal hai basic greetings (अभिवादन) aur introductions (परिचय) seekhna. Yeh English mein batchit shuru karne ka sabse pehla aur zaroori kadam hai.');

INSERT INTO course_blocks (day_id, block_order, block_type, title, display_content, saavi_script)
VALUES (@day_id, 2, 'teaching', 'Teaching', '{"heading": "📖 Words & Phrases", "cards": [{"word": "Hello", "pronunciation": "हेलो", "meaning": "नमस्ते / सुनिए", "usage": "Yeh ek aam (common) aur thoda formal (औपचारिक) tarika hai kisi se milne par abhinandan karne ka. Aap iska istemal din mein kabhi bhi kar sakte hain.", "example": {"english": "Hello! How are you?", "hindi_pronunciation": "हेलो! हाउ आर यू?", "hindi_translation": "नमस्ते! आप कैसे हैं?"}}, {"word": "Hi", "pronunciation": "हाय", "meaning": "नमस्ते", "usage": "Yeh \'Hello\' ka informal (अनौपचारिक) roop hai. Ise dosto aur barabari ke logon ke saath istemal kiya jaata hai.", "example": {"english": "Hi Rahul! How have you been?", "hindi_pronunciation": "हाय राहुल! हाउ हैव यू बीन?", "hindi_translation": "हाय राहुल! कैसे हो?"}}, {"word": "Good morning", "pronunciation": "गुड मॉर्निंग", "meaning": "सुप्रभात", "usage": "Iska istemal subah se lekar dopahar 12 baje tak kiya jaata hai.", "example": {"english": "Good morning, Sir.", "hindi_pronunciation": "गुड मॉर्निंग, सर।", "hindi_translation": "सुप्रभात, सर।"}}, {"word": "Good afternoon", "pronunciation": "गुड आफ्टरनून", "meaning": "दोपहर का नमस्कार", "usage": "Iska istemal dopahar 12 baje se shaam 5 baje tak kiya jaata hai.", "example": {"english": "Good afternoon, Ma\'am.", "hindi_pronunciation": "गुड आफ्टरनून, मैम।", "hindi_translation": "दोपहर का नमस्कार, मैम।"}}, {"word": "Good evening", "pronunciation": "गुड इवनिंग", "meaning": "शाम का नमस्कार", "usage": "Iska istemal shaam 5 baje ke baad kisi se milte waqt kiya jaata hai.", "example": {"english": "Good evening, Mr. Sharma.", "hindi_pronunciation": "गुड इवनिंग, मिस्टर शर्मा।", "hindi_translation": "शाम का नमस्कार, मिस्टर शर्मा।"}}, {"word": "Good night", "pronunciation": "गुड नाईट", "meaning": "शुभ रात्रि", "usage": "Yeh sirf raat ko vida lete samay (when leaving) ya sone jaate samay bola jaata hai. Milne par \'Good evening\' hi kehte hain.", "example": {"english": "Good night, see you tomorrow.", "hindi_pronunciation": "गुड नाईट, सी यू टुमॉरो।", "hindi_translation": "शुभ रात्रि, कल मिलते हैं।"}}, {"word": "Thank you", "pronunciation": "थैंक यू", "meaning": "धन्यवाद / शुक्रिया", "usage": "Jab koi aapki madad kare ya aapko kuch de, toh aabhar vyakt karne ke liye iska istemal karein.", "example": {"english": "Thank you for your help.", "hindi_pronunciation": "थैंक यू फॉर योर हेल्प।", "hindi_translation": "आपकी मदद के लिए धन्यवाद।"}}, {"word": "Please", "pronunciation": "प्लीज़", "meaning": "कृपया", "usage": "Kisi se anurodh (request) karte samay iska istemal zaroor karein. Isse aapki baat vinamra (polite) lagti hai.", "example": {"english": "Please give me a glass of water.", "hindi_pronunciation": "प्लीज़ गिव मी अ ग्लास ऑफ़ वॉटर।", "hindi_translation": "कृपया मुझे एक गिलास पानी दीजिए।"}}, {"word": "Sorry", "pronunciation": "सॉरी", "meaning": "माफ़ कीजिए / खेद है", "usage": "Jab aapse koi galti ho jaaye toh khed jatane ke liye iska istemal karein.", "example": {"english": "I am sorry, it was my mistake.", "hindi_pronunciation": "आय एम सॉरी, इट वॉज़ माय मिस्टेक।", "hindi_translation": "मुझे खेद है, यह मेरी गलती थी।"}}, {"word": "Excuse me", "pronunciation": "एक्सक्यूज़ मी", "meaning": "सुनिए / माफ़ कीजिए", "usage": "Kisi ka dhyaan apni taraf kheechne ke liye (jaise raasta poochna ho) ya kisi ko disturb karne se pehle bola jaata hai.", "example": {"english": "Excuse me, can you tell me the time?", "hindi_pronunciation": "एक्सक्यूज़ मी, कैन यू टेल मी द टाइम?", "hindi_translation": "सुनिए, क्या आप समय बता सकते हैं?"}}, {"word": "My name is...", "pronunciation": "माय नेम इज़...", "meaning": "मेरा नाम... है", "usage": "Apna naam batane ke liye iska prayog hota hai.", "example": {"english": "My name is Priya.", "hindi_pronunciation": "माय नेम इज़ प्रिया।", "hindi_translation": "मेरा नाम प्रिया है।"}}, {"word": "I am from...", "pronunciation": "आय एम फ्रॉम...", "meaning": "मैं ... से हूँ", "usage": "Aap kahan ke rehne waale hain, yeh batane ke liye iska prayog hota hai.", "example": {"english": "I am from Delhi.", "hindi_pronunciation": "आय एम फ्रॉम दिल्ली।", "hindi_translation": "मैं दिल्ली से हूँ।"}}, {"word": "I am a...", "pronunciation": "आय एम अ...", "meaning": "मैं एक ... हूँ", "usage": "Apna pesha (profession) batane ke liye iska prayog hota hai.", "example": {"english": "I am a student.", "hindi_pronunciation": "आय एम अ स्टूडेंट।", "hindi_translation": "मैं एक छात्र हूँ।"}}, {"word": "How are you?", "pronunciation": "हाउ आर यू?", "meaning": "आप कैसे हैं?", "usage": "Kisi ka haalchaal poochne ke liye iska prayog hota hai.", "example": {"english": "Hello Rahul! How are you?", "hindi_pronunciation": "हेलो राहुल! हाउ आर यू?", "hindi_translation": "नमस्ते राहुल! आप कैसे हैं?"}}, {"word": "Nice to meet you", "pronunciation": "नाइस टू मीट यू", "meaning": "आपसे मिलकर अच्छा लगा", "usage": "Jab aap kisi se pehli baar milte hain, toh batchit ke ant mein yeh kehna ek accha impression daalta hai.", "example": {"english": "My name is Rohan. Nice to meet you.", "hindi_pronunciation": "माय नेम इज़ रोहन। नाइस टू मीट यू।", "hindi_translation": "मेरा नाम रोहन है। आपसे मिलकर अच्छा लगा।"}}]}', 'Hello ka matlab hai नमस्ते / सुनिए. Yeh ek aam (common) aur thoda formal (औपचारिक) tarika hai kisi se milne par abhinandan karne ka. Aap iska istemal din mein kabhi bhi kar sakte hain.
Hi ka matlab hai नमस्ते. Yeh \'Hello\' ka informal (अनौपचारिक) roop hai. Ise dosto aur barabari ke logon ke saath istemal kiya jaata hai.
Good morning ka matlab hai सुप्रभात. Iska istemal subah se lekar dopahar 12 baje tak kiya jaata hai.
Good afternoon ka matlab hai दोपहर का नमस्कार. Iska istemal dopahar 12 baje se shaam 5 baje tak kiya jaata hai.
Good evening ka matlab hai शाम का नमस्कार. Iska istemal shaam 5 baje ke baad kisi se milte waqt kiya jaata hai.
Good night ka matlab hai शुभ रात्रि. Yeh sirf raat ko vida lete samay (when leaving) ya sone jaate samay bola jaata hai. Milne par \'Good evening\' hi kehte hain.
Thank you ka matlab hai धन्यवाद / शुक्रिया. Jab koi aapki madad kare ya aapko kuch de, toh aabhar vyakt karne ke liye iska istemal karein.
Please ka matlab hai कृपया. Kisi se anurodh (request) karte samay iska istemal zaroor karein. Isse aapki baat vinamra (polite) lagti hai.
Sorry ka matlab hai माफ़ कीजिए / खेद है. Jab aapse koi galti ho jaaye toh khed jatane ke liye iska istemal karein.
Excuse me ka matlab hai सुनिए / माफ़ कीजिए. Kisi ka dhyaan apni taraf kheechne ke liye (jaise raasta poochna ho) ya kisi ko disturb karne se pehle bola jaata hai.
My name is... ka matlab hai मेरा नाम... है. Apna naam batane ke liye iska prayog hota hai.
I am from... ka matlab hai मैं ... से हूँ. Aap kahan ke rehne waale hain, yeh batane ke liye iska prayog hota hai.
I am a... ka matlab hai मैं एक ... हूँ. Apna pesha (profession) batane ke liye iska prayog hota hai.
How are you? ka matlab hai आप कैसे हैं?. Kisi ka haalchaal poochne ke liye iska prayog hota hai.
Nice to meet you ka matlab hai आपसे मिलकर अच्छा लगा. Jab aap kisi se pehli baar milte hain, toh batchit ke ant mein yeh kehna ek accha impression daalta hai.');

INSERT INTO course_blocks (day_id, block_order, block_type, title, display_content, saavi_script)
VALUES (@day_id, 3, 'listen_repeat', 'Listen & Repeat', '{"heading": "🎧 Practice Speaking", "sentences": [{"english": "Hello, my name is Amit.", "hindi_pronunciation": "हेलो, माय नेम इज़ अमित।", "hindi_translation": "नमस्ते, मेरा नाम अमित है।"}, {"english": "Good morning, how are you?", "hindi_pronunciation": "गुड मॉर्निंग, हाउ आर यू?", "hindi_translation": "सुप्रभात, आप कैसे हैं?"}, {"english": "Thank you for coming.", "hindi_pronunciation": "थैंक यू फॉर कमिंग।", "hindi_translation": "आने के लिए धन्यवाद।"}, {"english": "Excuse me, what is your name?", "hindi_pronunciation": "एक्सक्यूज़ मी, व्हाट इज़ योर नेम?", "hindi_translation": "सुनिए, आपका नाम क्या है?"}, {"english": "I am sorry, I am late.", "hindi_pronunciation": "आय एम सॉरी, आय एम लेट।", "hindi_translation": "माफ़ कीजिए, मैं देर से आया हूँ।"}, {"english": "Good afternoon, please sit down.", "hindi_pronunciation": "गुड आफ्टरनून, प्लीज़ सिट डाउन।", "hindi_translation": "दोपहर का नमस्कार, कृपया बैठ जाइए।"}, {"english": "Hi! Nice to meet you.", "hindi_pronunciation": "हाय! नाइस टू मीट यू।", "hindi_translation": "नमस्ते! आपसे मिलकर अच्छा लगा।"}, {"english": "I am from Mumbai.", "hindi_pronunciation": "आय एम फ्रॉम मुंबई।", "hindi_translation": "मैं मुंबई से हूँ।"}, {"english": "I am a teacher.", "hindi_pronunciation": "आय एम अ टीचर।", "hindi_translation": "मैं एक शिक्षक हूँ।"}, {"english": "Good night, have a sweet dream.", "hindi_pronunciation": "गुड नाईट, हैव अ स्वीट ड्रीम।", "hindi_translation": "शुभ रात्रि, आपका सपना सुखद हो।"}]}', 'Ab mere saath boliye:
Hello, my name is Amit.
Good morning, how are you?
Thank you for coming.
Excuse me, what is your name?
I am sorry, I am late.
Good afternoon, please sit down.
Hi! Nice to meet you.
I am from Mumbai.
I am a teacher.
Good night, have a sweet dream.');

INSERT INTO course_blocks (day_id, block_order, block_type, title, display_content, saavi_script)
VALUES (@day_id, 4, 'situation', 'Meeting Someone New (किसी नए व्यक्ति से मिलना)', '{"heading": "🎭 Meeting Someone New (किसी नए व्यक्ति से मिलना)", "dialogue": [{"character": "Rohan", "english": "Hello! My name is Rohan.", "hindi_pronunciation": "हेलो! माय नेम इज़ रोहन।", "hindi_translation": "नमस्ते! मेरा नाम रोहन है।"}, {"character": "Priya", "english": "Hi Rohan! I am Priya. Nice to meet you.", "hindi_pronunciation": "हाय रोहन! आय एम प्रिया। नाइस टू मीट यू।", "hindi_translation": "हाय रोहन! मैं प्रिया हूँ। आपसे मिलकर अच्छा लगा।"}, {"character": "Rohan", "english": "Nice to meet you too. How are you?", "hindi_pronunciation": "नाइस टू मीट यू टू। हाउ आर यू?", "hindi_translation": "मुझे भी आपसे मिलकर अच्छा लगा। आप कैसी हैं?"}, {"character": "Priya", "english": "I am fine, thank you. And you?", "hindi_pronunciation": "आय एम फाइन, थैंक यू। एंड यू?", "hindi_translation": "मैं ठीक हूँ, धन्यवाद। और आप?"}, {"character": "Rohan", "english": "I am also fine. I am from Delhi.", "hindi_pronunciation": "आय एम आल्सो फाइन। आय एम फ्रॉम दिल्ली।", "hindi_translation": "मैं भी ठीक हूँ। मैं दिल्ली से हूँ।"}]}', 'Rohan: Hello! My name is Rohan.
Priya: Hi Rohan! I am Priya. Nice to meet you.
Rohan: Nice to meet you too. How are you?
Priya: I am fine, thank you. And you?
Rohan: I am also fine. I am from Delhi.');

INSERT INTO course_blocks (day_id, block_order, block_type, title, display_content, saavi_script)
VALUES (@day_id, 5, 'summary', 'Summary', '{"heading": "✅ आज का Summary", "points": ["\'Hello\' और \'Hi\' का प्रयोग किसी से मिलते समय अभिवादन (greeting) के लिए किया जाता है। \'Hi\' ज़्यादातर दोस्तों के साथ इस्तेमाल होता है।", "दिन के अलग-अलग समय के लिए \'Good morning\' (सुबह), \'Good afternoon\' (दोपहर), और \'Good evening\' (शाम) का प्रयोग करें।", "\'Good night\' का प्रयोग सिर्फ़ रात में विदा लेते समय (when leaving) किया जाता है, मिलते समय नहीं।", "\'Thank you\', \'Please\', \'Sorry\', और \'Excuse me\' विनम्र (polite) बातचीत के बहुत ज़रूरी शब्द हैं। इनका सही जगह पर इस्तेमाल करना सीखें।", "अपना परिचय (introduction) देने के लिए \'My name is...\', \'I am from...\', और \'I am a...\' का प्रयोग करें।"]}', 'Aaj aapne seekha: \'Hello\' और \'Hi\' का प्रयोग किसी से मिलते समय अभिवादन (greeting) के लिए किया जाता है। \'Hi\' ज़्यादातर दोस्तों के साथ इस्तेमाल होता है।, दिन के अलग-अलग समय के लिए \'Good morning\' (सुबह), \'Good afternoon\' (दोपहर), और \'Good evening\' (शाम) का प्रयोग करें।, \'Good night\' का प्रयोग सिर्फ़ रात में विदा लेते समय (when leaving) किया जाता है, मिलते समय नहीं।, \'Thank you\', \'Please\', \'Sorry\', और \'Excuse me\' विनम्र (polite) बातचीत के बहुत ज़रूरी शब्द हैं। इनका सही जगह पर इस्तेमाल करना सीखें।, अपना परिचय (introduction) देने के लिए \'My name is...\', \'I am from...\', और \'I am a...\' का प्रयोग करें।');

INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'mcq', '{"question": "दोपहर 1 बजे आप किसी से मिलेंगे तो क्या कहेंगे?", "options": ["Good morning", "Good afternoon", "Good evening"], "answer": "Good afternoon"}', 0);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'mcq', '{"question": "रात को सोने जाते समय आप क्या कहेंगे?", "options": ["Good evening", "Good night", "Hello"], "answer": "Good night"}', 1);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'mcq', '{"question": "किसी से मदद मांगने के लिए कौन सा शब्द इस्तेमाल करेंगे?", "options": ["Sorry", "Please", "Thank you"], "answer": "Please"}', 2);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'mcq', '{"question": "आपसे कोई गलती हो जाए तो आप क्या कहेंगे?", "options": ["Excuse me", "Sorry", "Please"], "answer": "Sorry"}', 3);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'mcq', '{"question": "किसी से पहली बार मिलकर क्या कहना अच्छा माना जाता है?", "options": ["How are you?", "Nice to meet you.", "Good night."], "answer": "Nice to meet you."}', 4);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'fill_blank', '{"question": "_____ me, can you help me?", "answer": "Excuse"}', 5);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'fill_blank', '{"question": "_____ you for the gift.", "answer": "Thank"}', 6);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'fill_blank', '{"question": "My _____ is Rohan.", "answer": "name"}', 7);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'fill_blank', '{"question": "I am _____ engineer.", "answer": "an"}', 8);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'fill_blank', '{"question": "_____ to meet you.", "answer": "Nice"}', 9);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'true_false', '{"statement": "\'Hi\' एक formal (औपचारिक) तरीका है नमस्ते करने का।", "answer": false}', 10);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'true_false', '{"statement": "आप सुबह 9 बजे किसी को \'Good evening\' कह सकते हैं।", "answer": false}', 11);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'true_false', '{"statement": "किसी का हालचाल पूछने के लिए \'How are you?\' कहते हैं।", "answer": true}', 12);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'true_false', '{"statement": "\'Sorry\' का मतलब धन्यवाद होता है।", "answer": false}', 13);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'true_false', '{"statement": "\'I am from Mumbai\' का मतलब है \'मैं मुंबई जा रहा हूँ\'।", "answer": false}', 14);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Hello", "back": "नमस्ते / सुनिए (हेलो)"}', 15);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Good night", "back": "शुभ रात्रि (गुड नाईट)"}', 16);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Thank you", "back": "धन्यवाद (थैंक यू)"}', 17);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Please", "back": "कृपया (प्लीज़)"}', 18);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Sorry", "back": "माफ़ कीजिए (सॉरी)"}', 19);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Excuse me", "back": "सुनिए / माफ़ कीजिए (एक्सक्यूज़ मी)"}', 20);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "How are you?", "back": "आप कैसे हैं? (हाउ आर यू?)"}', 21);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Nice to meet you", "back": "आपसे मिलकर अच्छा लगा (नाइस टू मीट यू)"}', 22);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'matching', '{"english": "Good morning", "hindi": "सुप्रभात"}', 23);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'matching', '{"english": "Good afternoon", "hindi": "दोपहर का नमस्कार"}', 24);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'matching', '{"english": "Good evening", "hindi": "शाम का नमस्कार"}', 25);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'matching', '{"english": "My name is...", "hindi": "मेरा नाम... है"}', 26);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'matching', '{"english": "I am from...", "hindi": "मैं ... से हूँ"}', 27);

-- ═══ 4. MARATHI DAY 1 DATA ═══

-- ═══ DAY 1: english-speaking-50-mr ═══
SET @course_id = (SELECT id FROM courses WHERE course_code = 'english-speaking-50-mr');
INSERT INTO course_days (course_id, day_number, title_source, title_target, level, phase, is_published)
VALUES (@course_id, 1, 'Day 1: Greetings ने करूया सुरुवात!', 'Day 1', 'A1', 1, 1)
ON DUPLICATE KEY UPDATE title_source = VALUES(title_source), is_published = 1;
SET @day_id = (SELECT id FROM course_days WHERE course_id = @course_id AND day_number = 1);
DELETE FROM course_blocks WHERE day_id = @day_id;
DELETE FROM course_quiz WHERE day_id = @day_id;

INSERT INTO course_blocks (day_id, block_order, block_type, title, display_content, saavi_script)
VALUES (@day_id, 1, 'intro', 'Day 1: Greetings ने करूया सुरुवात!', '{"heading": "🎯 Day 1: Greetings ने करूया सुरुवात!", "points": [{"text": "Hey! मी सावी. Shrutam English Speaking Course मध्ये तुमचं स्वागत आहे! मला आठवतंय, college मध्ये असताना English paper मध्ये चांगले marks मिळायचे, पण कोणासमोर बोलायची वेळ आली की full panic व्हायचं. \'Grammar चुकेल\', \'लोक हसतील\' हीच भीती वाटायची. But then I realized, confidence येतो practice ने, चुकांमधून शिकण्याने. म्हणूनच हा course खास तुमच्यासारख्या Marathi speakers साठी design केला आहे. इथे आपण एकदम सोप्या, practical पद्धतीने and हो, भरपूर Marathish वापरून English शिकणार आहोत. So, are you ready for this journey?"}, {"text": "आजच्या lesson चा goal आहे English मधले basic greetings आणि self-introduction शिकणं. Day-to-day life मध्ये conversation start करण्यासाठी हे खूप important आहे. आपण 15 essential words शिकूया आणि ते कसे वापरायचे ते बघूया."}]}', 'Hey! मी सावी. Shrutam English Speaking Course मध्ये तुमचं स्वागत आहे! मला आठवतंय, college मध्ये असताना English paper मध्ये चांगले marks मिळायचे, पण कोणासमोर बोलायची वेळ आली की full panic व्हायचं. \'Grammar चुकेल\', \'लोक हसतील\' हीच भीती वाटायची. But then I realized, confidence येतो practice ने, चुकांमधून शिकण्याने. म्हणूनच हा course खास तुमच्यासारख्या Marathi speakers साठी design केला आहे. इथे आपण एकदम सोप्या, practical पद्धतीने and हो, भरपूर Marathish वापरून English शिकणार आहोत. So, are you ready for this journey?

आजच्या lesson चा goal आहे English मधले basic greetings आणि self-introduction शिकणं. Day-to-day life मध्ये conversation start करण्यासाठी हे खूप important आहे. आपण 15 essential words शिकूया आणि ते कसे वापरायचे ते बघूया.');

INSERT INTO course_blocks (day_id, block_order, block_type, title, display_content, saavi_script)
VALUES (@day_id, 2, 'teaching', 'Teaching', '{"heading": "📖 Words & Phrases", "cards": [{"word": "Hello", "pronunciation": "हॅलो", "meaning": "नमस्कार", "usage": "हे एक universal greeting आहे. तुम्ही दिवसाच्या कोणत्याही वेळी, formal किंवा informal situation मध्ये \'Hello\' वापरू शकता. फोनवर बोलताना किंवा कोणालाही भेटल्यावर बोलायला सुरुवात करण्यासाठी हा best शब्द आहे.", "example": {"english": "Hello, how are you?", "marathi_pronunciation": "हॅलो, हाऊ आर यू?", "marathi_translation": "नमस्कार, तुम्ही कसे आहात?"}}, {"word": "Hi", "pronunciation": "हाय", "meaning": "नमस्कार", "usage": "हे \'Hello\' चं casual or informal version आहे. तुम्ही मित्र-मैत्रिणी, family, किंवा तुमच्या वयाच्या लोकांसाठी \'Hi\' वापरू शकता. Office मध्ये senior सोबत बोलताना \'Hello\' वापरणे जास्त safe आहे.", "example": {"english": "Hi Priya, what\'s up?", "marathi_pronunciation": "हाय प्रिया, व्हॉट्स अप?", "marathi_translation": "हाय प्रिया, काय चाललंय?"}}, {"word": "Good morning", "pronunciation": "गुड मॉर्निंग", "meaning": "शुभ सकाळ", "usage": "सकाळी उठल्यापासून ते दुपारी 12 वाजेपर्यंत तुम्ही \'Good morning\' वापरू शकता. शाळेत, कॉलेजमध्ये, ऑफिसमध्ये किंवा घरातल्यांना wish करण्यासाठी याचा वापर होतो.", "example": {"english": "Good morning, everyone!", "marathi_pronunciation": "गुड मॉर्निंग, एव्हरीवन!", "marathi_translation": "सर्वांना शुभ सकाळ!"}}, {"word": "Good afternoon", "pronunciation": "गुड आफ्टरनून", "meaning": "शुभ दुपार", "usage": "दुपारी 12 वाजल्यापासून ते संध्याकाळी 5 वाजेपर्यंत \'Good afternoon\' वापरायचं. Lunch break नंतर ऑफिसमध्ये परत आल्यावर colleagues ना wish करण्यासाठी perfect आहे.", "example": {"english": "Good afternoon, sir. Is the report ready?", "marathi_pronunciation": "गुड आफ्टरनून, सर. इज द रिपोर्ट रेडी?", "marathi_translation": "शुभ दुपार, सर. रिपोर्ट तयार आहे का?"}}, {"word": "Good evening", "pronunciation": "गुड इव्हनिंग", "meaning": "शुभ संध्याकाळ", "usage": "संध्याकाळी 5 नंतर तुम्ही \'Good evening\' वापरू शकता. मित्रांसोबत चहा पिताना किंवा family सोबत गप्पा मारताना हे greeting वापरा.", "example": {"english": "Good evening! Let\'s go for a walk.", "marathi_pronunciation": "गुड इव्हनिंग! लेट्स गो फॉर अ वॉक.", "marathi_translation": "शुभ संध्याकाळ! चला फिरायला जाऊया."}}, {"word": "Good night", "pronunciation": "गुड नाईट", "meaning": "शुभ रात्री", "usage": "हे greeting भेटल्यावर नाही, तर निरोप घेताना वापरतात, specifically रात्री झोपायला जाताना. \'Bye\' म्हणण्याऐवजी रात्री तुम्ही \'Good night\' म्हणू शकता.", "example": {"english": "Okay, I am going to sleep now. Good night!", "marathi_pronunciation": "ओके, आय अॅम गोइंग टु स्लीप नाऊ. गुड नाईट!", "marathi_translation": "ठीक आहे, मी आता झोपायला जातोय. शुभ रात्री!"}}, {"word": "Thank you", "pronunciation": "थँक यू", "meaning": "धन्यवाद / आभारी आहे", "usage": "जेव्हा कोणी तुमची मदत करतं किंवा तुम्हाला काही देतं, तेव्हा gratitude व्यक्त करण्यासाठी \'Thank you\' म्हणा. छोट्या छोट्या गोष्टींसाठी पण \'Thanks\' म्हणायची सवय लावा.", "example": {"english": "Thank you for the vada pav, it was delicious.", "marathi_pronunciation": "थँक यू फॉर द वडा पाव, इट वॉज डिलिशिअस.", "marathi_translation": "वडा पावसाठी धन्यवाद, तो खूप चविष्ट होता."}}, {"word": "Please", "pronunciation": "प्लीज", "meaning": "कृपया", "usage": "जेव्हा तुम्हाला कोणाकडून काही काम करून घ्यायचं असेल किंवा काही मागायचं असेल, तेव्हा \'Please\' वापरल्याने तुमची request polite वाटते. \'Give me water\' ऐवजी \'Please give me water\' म्हणा.", "example": {"english": "Please pass the salt.", "marathi_pronunciation": "प्लीज पास द सॉल्ट.", "marathi_translation": "कृपया मीठ पास करा."}}, {"word": "Sorry", "pronunciation": "सॉरी", "meaning": "माफ करा", "usage": "जेव्हा तुमच्याकडून काही चूक होते, तेव्हा \'Sorry\' म्हणायला लाजू नका. यामुळे तुमची चूक मान्य करण्याची वृत्ती दिसते. कोणाला धक्का लागला किंवा कोणाला वाईट वाटलं तर लगेच \'Sorry\' म्हणा.", "example": {"english": "I am sorry, I am late for the meeting.", "marathi_pronunciation": "आय अॅम सॉरी, आय अॅम लेट फॉर द मीटिंग.", "marathi_translation": "माफ करा, मला मीटिंगसाठी उशीर झाला."}}, {"word": "Excuse me", "pronunciation": "एक्सक्यूज मी", "meaning": "ऐका ना / माफ करा", "usage": "दोन लोक बोलत असताना तुम्हाला त्यांच्यामधून जायचं असेल किंवा कोणाचं लक्ष वेधून घ्यायचं असेल तेव्हा \'Excuse me\' वापरायचं. जसं की Mumbai local मध्ये गर्दीतून पुढे जाताना.", "example": {"english": "Excuse me, can you tell me the time?", "marathi_pronunciation": "एक्सक्यूज मी, कॅन यू टेल मी द टाइम?", "marathi_translation": "ऐका ना, तुम्ही वेळ सांगू शकाल का?"}}, {"word": "My name is...", "pronunciation": "माय नेम इज...", "meaning": "माझं नाव आहे...", "usage": "स्वतःची ओळख करून देताना, formal situations मध्ये \'My name is...\' असं पूर्ण वाक्य वापरा. For example, in an interview.", "example": {"english": "Hello, my name is Saavi.", "marathi_pronunciation": "हॅलो, माय नेम इज सावी.", "marathi_translation": "नमस्कार, माझं नाव सावी आहे."}}, {"word": "I am from...", "pronunciation": "आय अॅम फ्रॉम...", "meaning": "मी ...येथून आहे", "usage": "तुम्ही कुठून आला आहात किंवा कुठे राहता हे सांगण्यासाठी \'I am from...\' वापरा. तुम्ही तुमच्या शहराचं किंवा गावाचं नाव सांगू शकता.", "example": {"english": "I am from Pune, the cultural capital of Maharashtra.", "marathi_pronunciation": "आय अॅम फ्रॉम पुणे, द कल्चरल कॅपिटल ऑफ महाराष्ट्र.", "marathi_translation": "मी महाराष्ट्राची सांस्कृतिक राजधानी असलेल्या पुण्याहून आहे."}}, {"word": "I am a...", "pronunciation": "आय अॅम अ...", "meaning": "मी एक ...आहे", "usage": "तुमचा profession किंवा तुम्ही काय करता हे सांगण्यासाठी \'I am a...\' वापरा. For example, I am a teacher, I am a student.", "example": {"english": "I am a software engineer.", "marathi_pronunciation": "आय अॅम अ सॉफ्टवेअर इंजिनिअर.", "marathi_translation": "मी एक सॉफ्टवेअर इंजिनिअर आहे."}}, {"word": "How are you?", "pronunciation": "हाऊ आर यू?", "meaning": "तुम्ही कसे आहात?", "usage": "कोणाची तरी विचारपूस करण्यासाठी हा प्रश्न विचारा. \'Hello\' किंवा \'Hi\' नंतर \'How are you?\' विचारणं हे एक चांगलं conversation starter आहे.", "example": {"english": "Hi Sameer, how are you?", "marathi_pronunciation": "हाय समीर, हाऊ आर यू?", "marathi_translation": "हाय समीर, कसा आहेस?"}}, {"word": "Nice to meet you", "pronunciation": "नाइस टु मीट यू", "meaning": "तुम्हाला भेटून आनंद झाला", "usage": "जेव्हा तुम्ही कोणाला पहिल्यांदाच भेटता, तेव्हा conversation च्या शेवटी \'Nice to meet you\' म्हणा. यामुळे एक positive impression पडतं.", "example": {"english": "It was a good discussion. Nice to meet you.", "marathi_pronunciation": "इट वॉज अ गुड डिस्कशन. नाइस टु मीट यू.", "marathi_translation": "चांगली चर्चा झाली. तुम्हाला भेटून आनंद झाला."}}]}', 'Hello ka matlab hai नमस्कार. हे एक universal greeting आहे. तुम्ही दिवसाच्या कोणत्याही वेळी, formal किंवा informal situation मध्ये \'Hello\' वापरू शकता. फोनवर बोलताना किंवा कोणालाही भेटल्यावर बोलायला सुरुवात करण्यासाठी हा best शब्द आहे.
Hi ka matlab hai नमस्कार. हे \'Hello\' चं casual or informal version आहे. तुम्ही मित्र-मैत्रिणी, family, किंवा तुमच्या वयाच्या लोकांसाठी \'Hi\' वापरू शकता. Office मध्ये senior सोबत बोलताना \'Hello\' वापरणे जास्त safe आहे.
Good morning ka matlab hai शुभ सकाळ. सकाळी उठल्यापासून ते दुपारी 12 वाजेपर्यंत तुम्ही \'Good morning\' वापरू शकता. शाळेत, कॉलेजमध्ये, ऑफिसमध्ये किंवा घरातल्यांना wish करण्यासाठी याचा वापर होतो.
Good afternoon ka matlab hai शुभ दुपार. दुपारी 12 वाजल्यापासून ते संध्याकाळी 5 वाजेपर्यंत \'Good afternoon\' वापरायचं. Lunch break नंतर ऑफिसमध्ये परत आल्यावर colleagues ना wish करण्यासाठी perfect आहे.
Good evening ka matlab hai शुभ संध्याकाळ. संध्याकाळी 5 नंतर तुम्ही \'Good evening\' वापरू शकता. मित्रांसोबत चहा पिताना किंवा family सोबत गप्पा मारताना हे greeting वापरा.
Good night ka matlab hai शुभ रात्री. हे greeting भेटल्यावर नाही, तर निरोप घेताना वापरतात, specifically रात्री झोपायला जाताना. \'Bye\' म्हणण्याऐवजी रात्री तुम्ही \'Good night\' म्हणू शकता.
Thank you ka matlab hai धन्यवाद / आभारी आहे. जेव्हा कोणी तुमची मदत करतं किंवा तुम्हाला काही देतं, तेव्हा gratitude व्यक्त करण्यासाठी \'Thank you\' म्हणा. छोट्या छोट्या गोष्टींसाठी पण \'Thanks\' म्हणायची सवय लावा.
Please ka matlab hai कृपया. जेव्हा तुम्हाला कोणाकडून काही काम करून घ्यायचं असेल किंवा काही मागायचं असेल, तेव्हा \'Please\' वापरल्याने तुमची request polite वाटते. \'Give me water\' ऐवजी \'Please give me water\' म्हणा.
Sorry ka matlab hai माफ करा. जेव्हा तुमच्याकडून काही चूक होते, तेव्हा \'Sorry\' म्हणायला लाजू नका. यामुळे तुमची चूक मान्य करण्याची वृत्ती दिसते. कोणाला धक्का लागला किंवा कोणाला वाईट वाटलं तर लगेच \'Sorry\' म्हणा.
Excuse me ka matlab hai ऐका ना / माफ करा. दोन लोक बोलत असताना तुम्हाला त्यांच्यामधून जायचं असेल किंवा कोणाचं लक्ष वेधून घ्यायचं असेल तेव्हा \'Excuse me\' वापरायचं. जसं की Mumbai local मध्ये गर्दीतून पुढे जाताना.
My name is... ka matlab hai माझं नाव आहे.... स्वतःची ओळख करून देताना, formal situations मध्ये \'My name is...\' असं पूर्ण वाक्य वापरा. For example, in an interview.
I am from... ka matlab hai मी ...येथून आहे. तुम्ही कुठून आला आहात किंवा कुठे राहता हे सांगण्यासाठी \'I am from...\' वापरा. तुम्ही तुमच्या शहराचं किंवा गावाचं नाव सांगू शकता.
I am a... ka matlab hai मी एक ...आहे. तुमचा profession किंवा तुम्ही काय करता हे सांगण्यासाठी \'I am a...\' वापरा. For example, I am a teacher, I am a student.
How are you? ka matlab hai तुम्ही कसे आहात?. कोणाची तरी विचारपूस करण्यासाठी हा प्रश्न विचारा. \'Hello\' किंवा \'Hi\' नंतर \'How are you?\' विचारणं हे एक चांगलं conversation starter आहे.
Nice to meet you ka matlab hai तुम्हाला भेटून आनंद झाला. जेव्हा तुम्ही कोणाला पहिल्यांदाच भेटता, तेव्हा conversation च्या शेवटी \'Nice to meet you\' म्हणा. यामुळे एक positive impression पडतं.');

INSERT INTO course_blocks (day_id, block_order, block_type, title, display_content, saavi_script)
VALUES (@day_id, 3, 'listen_repeat', 'Listen & Repeat', '{"heading": "🎧 Practice Speaking", "sentences": [{"english": "Hello! My name is Rohan.", "marathi_pronunciation": "हॅलो! माय नेम इज रोहन.", "marathi_translation": "नमस्कार! माझं नाव रोहन आहे."}, {"english": "Good morning, sir. How are you?", "marathi_pronunciation": "गुड मॉर्निंग, सर. हाऊ आर यू?", "marathi_translation": "शुभ सकाळ, सर. तुम्ही कसे आहात?"}, {"english": "Excuse me, please. Can I sit here?", "marathi_pronunciation": "एक्सक्यूज मी, प्लीज. कॅन आय सिट हिअर?", "marathi_translation": "ऐका ना, कृपया. मी इथे बसू शकतो का?"}, {"english": "Thank you for your help.", "marathi_pronunciation": "थँक यू फॉर युअर हेल्प.", "marathi_translation": "तुमच्या मदतीसाठी धन्यवाद."}, {"english": "I am sorry, I forgot your name.", "marathi_pronunciation": "आय अॅम सॉरी, आय फॉरगॉट युअर नेम.", "marathi_translation": "माफ करा, मी तुमचं नाव विसरलो."}, {"english": "Hi, I am from Mumbai.", "marathi_pronunciation": "हाय, आय अॅम फ्रॉम मुंबई.", "marathi_translation": "हाय, मी मुंबईहून आहे."}, {"english": "Good afternoon! I am a student.", "marathi_pronunciation": "गुड आफ्टरनून! आय अॅम अ स्टुडंट.", "marathi_translation": "शुभ दुपार! मी एक विद्यार्थी आहे."}, {"english": "It was nice to meet you. Good night!", "marathi_pronunciation": "इट वॉज नाइस टु मीट यू. गुड नाईट!", "marathi_translation": "तुम्हाला भेटून आनंद झाला. शुभ रात्री!"}, {"english": "Good evening! I am a doctor.", "marathi_pronunciation": "गुड इव्हनिंग! आय अॅम अ डॉक्टर.", "marathi_translation": "शुभ संध्याकाळ! मी एक डॉक्टर आहे."}, {"english": "Hello, nice to meet you. I am from Nagpur.", "marathi_pronunciation": "हॅलो, नाइस टु मीट यू. आय अॅम फ्रॉम नागपूर.", "marathi_translation": "नमस्कार, तुम्हाला भेटून आनंद झाला. मी नागपूरहून आहे."}]}', 'Ab mere saath boliye:
Hello! My name is Rohan.
Good morning, sir. How are you?
Excuse me, please. Can I sit here?
Thank you for your help.
I am sorry, I forgot your name.
Hi, I am from Mumbai.
Good afternoon! I am a student.
It was nice to meet you. Good night!
Good evening! I am a doctor.
Hello, nice to meet you. I am from Nagpur.');

INSERT INTO course_blocks (day_id, block_order, block_type, title, display_content, saavi_script)
VALUES (@day_id, 4, 'situation', 'Situation: Office मध्ये पहिला दिवस', '{"heading": "🎭 Situation: Office मध्ये पहिला दिवस", "dialogue": [{"character": "Akash", "english": "Hello! Good morning.", "marathi_pronunciation": "हॅलो! गुड मॉर्निंग.", "marathi_translation": "नमस्कार! शुभ सकाळ."}, {"character": "Neha", "english": "Good morning! My name is Neha. I am new here.", "marathi_pronunciation": "गुड मॉर्निंग! माय नेम इज नेहा. आय अॅम न्यू हिअर.", "marathi_translation": "शुभ सकाळ! माझं नाव नेहा आहे. मी इथे नवीन आहे."}, {"character": "Akash", "english": "Hi Neha, I am Akash. Welcome to the team. I am from the design department.", "marathi_pronunciation": "हाय नेहा, आय अॅम आकाश. वेलकम टु द टीम. आय अॅम फ्रॉम द डिझाइन डिपार्टमेंट.", "marathi_translation": "हाय नेहा, मी आकाश. टीममध्ये तुझं स्वागत आहे. मी डिझाइन डिपार्टमेंटमधून आहे."}, {"character": "Neha", "english": "Thank you, Akash. Nice to meet you.", "marathi_pronunciation": "थँक यू, आकाश. नाइस टु मीट यू.", "marathi_translation": "धन्यवाद, आकाश. तुम्हाला भेटून आनंद झाला."}, {"character": "Akash", "english": "Nice to meet you too. Please let me know if you need any help.", "marathi_pronunciation": "नाइस टु मीट यू टू. प्लीज लेट मी नो इफ यू नीड एनी हेल्प.", "marathi_translation": "मलाही तुम्हाला भेटून आनंद झाला. काही मदत लागल्यास कृपया सांगा."}, {"character": "Neha", "english": "Sure, thank you!", "marathi_pronunciation": "शुअर, थँक यू!", "marathi_translation": "नक्कीच, धन्यवाद!"}]}', 'Akash: Hello! Good morning.
Neha: Good morning! My name is Neha. I am new here.
Akash: Hi Neha, I am Akash. Welcome to the team. I am from the design department.
Neha: Thank you, Akash. Nice to meet you.
Akash: Nice to meet you too. Please let me know if you need any help.
Neha: Sure, thank you!');

INSERT INTO course_blocks (day_id, block_order, block_type, title, display_content, saavi_script)
VALUES (@day_id, 5, 'summary', 'Summary', '{"heading": "✅ आज का Summary", "points": ["English मध्ये वेळेनुसार greetings बदलतात: Morning, Afternoon, Evening.", "\'Hello\' formal आहे, तर \'Hi\' informal/casual आहे.", "\'Good night\' भेटताना नाही, तर रात्री निरोप घेताना वापरायचं.", "Request करताना \'Please\' आणि चूक झाल्यास \'Sorry\' वापरायला विसरू नका.", "स्वतःची ओळख करून देताना \'My name is...\', \'I am from...\' आणि \'I am a...\' वापरा."]}', 'Aaj aapne seekha: English मध्ये वेळेनुसार greetings बदलतात: Morning, Afternoon, Evening., \'Hello\' formal आहे, तर \'Hi\' informal/casual आहे., \'Good night\' भेटताना नाही, तर रात्री निरोप घेताना वापरायचं., Request करताना \'Please\' आणि चूक झाल्यास \'Sorry\' वापरायला विसरू नका., स्वतःची ओळख करून देताना \'My name is...\', \'I am from...\' आणि \'I am a...\' वापरा.');

INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'mcq', '{"question_marathi": "रात्री 10 वाजता तुम्ही मित्राला भेटलात, तर निरोप घेताना काय म्हणाल?", "options_marathi": ["Good evening", "Good morning", "Good night", "Hello"], "answer_marathi": "Good night"}', 0);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'mcq', '{"question_marathi": "तुम्हाला तुमच्या बॉसला भेटून तुमचं नाव सांगायचं आहे. तुम्ही काय म्हणाल?", "options_marathi": ["Hi, I am Rahul.", "Yo, my name is Rahul.", "Hello sir, my name is Rahul.", "What\'s up, I am Rahul."], "answer_marathi": "Hello sir, my name is Rahul."}', 1);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'mcq', '{"question_marathi": "दुपारी 2 वाजता तुम्ही कोणाला भेटल्यावर काय म्हणाल?", "options_marathi": ["Good morning", "Good afternoon", "Good evening", "Good night"], "answer_marathi": "Good afternoon"}', 2);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'mcq', '{"question_marathi": "कोणाचं लक्ष वेधून घ्यायचं असेल तर कोणता शब्द वापराल?", "options_marathi": ["Sorry", "Please", "Thank you", "Excuse me"], "answer_marathi": "Excuse me"}', 3);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'mcq', '{"question_marathi": "कोणाला पहिल्यांदा भेटल्यावर conversation च्या शेवटी काय म्हणतात?", "options_marathi": ["How are you?", "Nice to meet you", "Good bye", "Thank you"], "answer_marathi": "Nice to meet you"}', 4);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'true_false', '{"statement_marathi": "\'Hi\' हा शब्द formal situations मध्ये वापरतात.", "answer": false}', 5);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'true_false', '{"statement_marathi": "सकाळी 11 वाजता \'Good morning\' म्हणतात.", "answer": true}', 6);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'true_false', '{"statement_marathi": "चूक झाल्यावर \'Thank you\' म्हणतात.", "answer": false}', 7);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'true_false', '{"statement_marathi": "\'Good night\' हे एक greeting आहे जे भेटल्यावर वापरतात.", "answer": false}', 8);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'true_false', '{"statement_marathi": "कोणाकडून पेन मागताना \'Please\' वापरल्याने request polite वाटते.", "answer": true}', 9);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Hello", "back": "नमस्कार"}', 10);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Thank you", "back": "धन्यवाद"}', 11);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Sorry", "back": "माफ करा"}', 12);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Good evening", "back": "शुभ संध्याकाळ"}', 13);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Please", "back": "कृपया"}', 14);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "How are you?", "back": "तुम्ही कसे आहात?"}', 15);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "Excuse me", "back": "ऐका ना / माफ करा"}', 16);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'flashcard', '{"front": "My name is...", "back": "माझं नाव आहे..."}', 17);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'matching', '{"english_phrase": "Good morning", "marathi_translation": "शुभ सकाळ"}', 18);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'matching', '{"english_phrase": "I am from Pune.", "marathi_translation": "मी पुण्याहून आहे."}', 19);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'matching', '{"english_phrase": "Nice to meet you.", "marathi_translation": "तुम्हाला भेटून आनंद झाला."}', 20);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'matching', '{"english_phrase": "I am a teacher.", "marathi_translation": "मी एक शिक्षक आहे."}', 21);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES (@day_id, 'matching', '{"english_phrase": "Good night", "marathi_translation": "शुभ रात्री"}', 22);

SET FOREIGN_KEY_CHECKS = 1;

-- ═══ DONE! Both courses + Day 1 data loaded. ═══