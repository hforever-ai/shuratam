DELETE FROM course_quiz WHERE day_id = (
    SELECT id FROM course_days WHERE course_id = (
        SELECT id FROM courses WHERE course_code = 'english-speaking-50-mr'
    ) AND day_number = 1
) AND quiz_type = 'flashcard';
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES ((SELECT id FROM course_days WHERE course_id=(SELECT id FROM courses WHERE course_code='english-speaking-50-mr') AND day_number=1), 'flashcard', '{"front": "Hello", "back": "नमस्कार (हॅलो)"}', 0);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES ((SELECT id FROM course_days WHERE course_id=(SELECT id FROM courses WHERE course_code='english-speaking-50-mr') AND day_number=1), 'flashcard', '{"front": "Thank you", "back": "धन्यवाद (थँक यू)"}', 1);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES ((SELECT id FROM course_days WHERE course_id=(SELECT id FROM courses WHERE course_code='english-speaking-50-mr') AND day_number=1), 'flashcard', '{"front": "Sorry", "back": "माफ करा (सॉरी)"}', 2);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES ((SELECT id FROM course_days WHERE course_id=(SELECT id FROM courses WHERE course_code='english-speaking-50-mr') AND day_number=1), 'flashcard', '{"front": "Good evening", "back": "शुभ संध्याकाळ (गुड इव्हनिंग)"}', 3);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES ((SELECT id FROM course_days WHERE course_id=(SELECT id FROM courses WHERE course_code='english-speaking-50-mr') AND day_number=1), 'flashcard', '{"front": "Please", "back": "कृपया (प्लीज)"}', 4);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES ((SELECT id FROM course_days WHERE course_id=(SELECT id FROM courses WHERE course_code='english-speaking-50-mr') AND day_number=1), 'flashcard', '{"front": "How are you?", "back": "तुम्ही कसे आहात? (हाऊ आर यू?)"}', 5);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES ((SELECT id FROM course_days WHERE course_id=(SELECT id FROM courses WHERE course_code='english-speaking-50-mr') AND day_number=1), 'flashcard', '{"front": "Excuse me", "back": "ऐका ना / माफ करा (एक्सक्यूज मी)"}', 6);
INSERT INTO course_quiz (day_id, quiz_type, question_data, display_order)
VALUES ((SELECT id FROM course_days WHERE course_id=(SELECT id FROM courses WHERE course_code='english-speaking-50-mr') AND day_number=1), 'flashcard', '{"front": "My name is...", "back": "माझं नाव आहे... (माय नेम इज...)"}', 7)