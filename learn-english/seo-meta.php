<?php
/**
 * SEO source of truth for the 50-day Spoken English course.
 *
 * Title format (brand-first):
 *   HI: Shrutam — Day {N}: {topic_hi} | मुफ्त English कोर्स
 *   MR: Shrutam — Day {N}: {topic_mr} | मोफत English कोर्स
 *   TE: Shrutam — Day {N}: {topic_te} in Telugu | Free English
 *
 * Telugu titles stay English by design — Telugu speakers searching for
 * English-learning content overwhelmingly query in English ("learn english
 * in telugu free"). Telugu *descriptions* are in Telugu script for SERP
 * locale match.
 *
 * Used by: partials/head.php (via _helpers.php), sitemap-generator.php,
 * and 301 redirect map for old slugs.
 */

return [
    1 => [
        'slug'      => 'day-1-greetings-farewells',
        'topic_en'  => 'Greetings & Farewells',
        'old_slug'  => 'day-1-greetings-self-introduction',
        'hi' => [
            'topic'       => 'अभिवादन और विदाई',
            'title'       => 'Shrutam — Day 1: अभिवादन और विदाई | मुफ्त English कोर्स',
            'description' => 'Shrutam के Day 1 में SAAVI के साथ सीखें Good Morning, Hello, Thank you, Sorry, Goodbye जैसे ज़रूरी English अभिवादन। मुफ्त spoken English कोर्स।',
        ],
        'mr' => [
            'topic'       => 'अभिवादन आणि निरोप',
            'title'       => 'Shrutam — Day 1: अभिवादन आणि निरोप | मोफत English कोर्स',
            'description' => 'Shrutam च्या Day 1 मध्ये SAAVI सोबत शिका Good Morning, Hello, Thank you, Sorry, Goodbye सारखे महत्त्वाचे English अभिवादन. मोफत spoken English कोर्स.',
        ],
        'te' => [
            'topic'       => 'Greetings & Farewells',
            'title'       => 'Shrutam — Day 1: Greetings & Farewells in Telugu | Free English',
            'description' => 'Shrutam Day 1లో SAAVI తో నేర్చుకోండి Good Morning, Hello, Thank you, Sorry, Goodbye వంటి ముఖ్యమైన English గ్రీటింగ్స్. ఉచిత spoken English కోర్సు.',
        ],
    ],

    2 => [
        'slug'      => 'day-2-self-introduction-numbers',
        'topic_en'  => 'Self-Introduction + Numbers 1-20',
        'old_slug'  => null, // new split — was part of old Day 1
        'hi' => [
            'topic'       => 'अपना परिचय और 1-20 गिनती',
            'title'       => 'Shrutam — Day 2: Self-Introduction और Numbers 1-20 | मुफ्त English',
            'description' => 'Shrutam Day 2 में SAAVI के साथ सीखें "My name is...", "I am from..." और 1 से 20 तक English गिनती। "Myself Raju" जैसी आम गलतियाँ सुधारें।',
        ],
        'mr' => [
            'topic'       => 'स्वतःची ओळख आणि 1-20 अंक',
            'title'       => 'Shrutam — Day 2: Self-Introduction आणि Numbers 1-20 | मोफत English',
            'description' => 'Shrutam Day 2 मध्ये SAAVI सोबत शिका "My name is...", "I am from..." आणि 1 ते 20 English अंक. "Myself Raju" सारख्या चुका सुधारा.',
        ],
        'te' => [
            'topic'       => 'Self-Introduction & Numbers 1-20',
            'title'       => 'Shrutam — Day 2: Self-Introduction & Numbers 1-20 in Telugu | Free English',
            'description' => 'Shrutam Day 2లో SAAVI తో నేర్చుకోండి "My name is...", "I am from..." మరియు 1 నుండి 20 వరకు English అంకెలు. ఉచిత spoken English కోర్సు.',
        ],
    ],

    3 => [
        'slug'      => 'day-3-family-time',
        'topic_en'  => 'Family Members + Telling Time',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'परिवार और समय बताना',
            'title'       => 'Shrutam — Day 3: परिवार और Time बताना | मुफ्त English कोर्स',
            'description' => 'Shrutam Day 3 में सीखें mother, father, brother, sister जैसे family words और "It is 3 o\'clock", "half past four" से समय बताना। SAAVI के साथ मुफ्त।',
        ],
        'mr' => [
            'topic'       => 'कुटुंब आणि वेळ सांगणे',
            'title'       => 'Shrutam — Day 3: कुटुंब आणि Time सांगणे | मोफत English कोर्स',
            'description' => 'Shrutam Day 3 मध्ये शिका mother, father, brother, sister सारखे family शब्द आणि "It is 3 o\'clock" ने वेळ सांगणे. SAAVI सोबत मोफत.',
        ],
        'te' => [
            'topic'       => 'Family Members & Telling Time',
            'title'       => 'Shrutam — Day 3: Family & Telling Time in Telugu | Free English',
            'description' => 'Shrutam Day 3లో నేర్చుకోండి mother, father, brother, sister వంటి family పదాలు మరియు "It is 3 o\'clock" తో సమయం చెప్పడం. SAAVI తో ఉచితం.',
        ],
    ],

    4 => [
        'slug'      => 'day-4-pronouns-possessives',
        'topic_en'  => 'Pronouns + Possessive Adjectives',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'सर्वनाम और अधिकार-बोधक',
            'title'       => 'Shrutam — Day 4: Pronouns और Possessives | मुफ्त English कोर्स',
            'description' => 'Shrutam Day 4 में सीखें I, you, he, she, we, they और my, your, his, her जैसे possessive words। "He father" जैसी common Indian गलतियाँ सुधारें।',
        ],
        'mr' => [
            'topic'       => 'सर्वनाम आणि मालकी-दर्शक',
            'title'       => 'Shrutam — Day 4: Pronouns आणि Possessives | मोफत English कोर्स',
            'description' => 'Shrutam Day 4 मध्ये शिका I, you, he, she, we, they आणि my, your, his, her सारखे possessive शब्द. "He father" सारख्या भारतीय चुका सुधारा.',
        ],
        'te' => [
            'topic'       => 'Pronouns & Possessive Adjectives',
            'title'       => 'Shrutam — Day 4: Pronouns & Possessives in Telugu | Free English',
            'description' => 'Shrutam Day 4లో నేర్చుకోండి I, you, he, she, we, they మరియు my, your, his, her వంటి possessive పదాలు. "He father" వంటి సాధారణ తప్పులు సరిచేసుకోండి.',
        ],
    ],

    5 => [
        'slug'      => 'day-5-simple-present',
        'topic_en'  => 'Simple Present + Negative (don\'t)',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Simple Present और Negative',
            'title'       => 'Shrutam — Day 5: Simple Present Tense | मुफ्त English कोर्स',
            'description' => 'Shrutam Day 5 में सीखें "I eat", "We play" जैसे Simple Present sentences और "I don\'t like" से negative बनाना। Daily routines में English बोलें।',
        ],
        'mr' => [
            'topic'       => 'Simple Present आणि Negative',
            'title'       => 'Shrutam — Day 5: Simple Present Tense | मोफत English कोर्स',
            'description' => 'Shrutam Day 5 मध्ये शिका "I eat", "We play" सारखी Simple Present वाक्ये आणि "I don\'t like" ने negative बनवणे. रोजच्या कामांमध्ये English बोला.',
        ],
        'te' => [
            'topic'       => 'Simple Present & Negatives',
            'title'       => 'Shrutam — Day 5: Simple Present Tense in Telugu | Free English',
            'description' => 'Shrutam Day 5లో నేర్చుకోండి "I eat", "We play" వంటి Simple Present వాక్యాలు మరియు "I don\'t like" తో negative రూపం. రోజువారీ పనులలో English మాట్లాడండి.',
        ],
    ],

    6 => [
        'slug'      => 'day-6-simple-present-questions',
        'topic_en'  => 'Simple Present (3rd person) + Yes/No Questions',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'He/She/It के साथ Simple Present',
            'title'       => 'Shrutam — Day 6: He/She/It + Yes/No Questions | मुफ्त English',
            'description' => 'Shrutam Day 6 में सीखें "He eats", "She drinks" जैसे verb+s rules और "Does he work here?" type yes/no questions। SAAVI के साथ practice।',
        ],
        'mr' => [
            'topic'       => 'He/She/It सोबत Simple Present',
            'title'       => 'Shrutam — Day 6: He/She/It + Yes/No Questions | मोफत English',
            'description' => 'Shrutam Day 6 मध्ये शिका "He eats", "She drinks" सारखे verb+s नियम आणि "Does he work here?" प्रकारचे yes/no प्रश्न. SAAVI सोबत सराव करा.',
        ],
        'te' => [
            'topic'       => 'Simple Present (He/She/It) + Yes/No Questions',
            'title'       => 'Shrutam — Day 6: He/She/It + Yes/No Questions in Telugu | Free English',
            'description' => 'Shrutam Day 6లో నేర్చుకోండి "He eats", "She drinks" వంటి verb+s నియమాలు మరియు "Does he work here?" వంటి yes/no ప్రశ్నలు. SAAVI తో practice.',
        ],
    ],

    7 => [
        'slug'      => 'day-7-there-is-there-are',
        'topic_en'  => 'Review + There is / There are',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Review और There is / There are',
            'title'       => 'Shrutam — Day 7: There is / There are | मुफ्त English कोर्स',
            'description' => 'Shrutam Day 7 में Days 1-6 का review और सीखें "There is a pen", "There are 10 students" से चीज़ों के होने का English तरीका। आम Indian गलतियाँ सुधारें।',
        ],
        'mr' => [
            'topic'       => 'Review आणि There is / There are',
            'title'       => 'Shrutam — Day 7: There is / There are | मोफत English कोर्स',
            'description' => 'Shrutam Day 7 मध्ये Days 1-6 चा review आणि शिका "There is a pen", "There are 10 students" ने वस्तू असण्याचे English. भारतीय चुका सुधारा.',
        ],
        'te' => [
            'topic'       => 'Review & There is / There are',
            'title'       => 'Shrutam — Day 7: There is / There are in Telugu | Free English',
            'description' => 'Shrutam Day 7లో Days 1-6 review మరియు నేర్చుకోండి "There is a pen", "There are 10 students" — వస్తువులు ఉన్నాయని English లో చెప్పడం.',
        ],
    ],

    8 => [
        'slug'      => 'day-8-be-verb',
        'topic_en'  => 'BE Verb (am/is/are) Affirmative',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'BE Verb (am/is/are)',
            'title'       => 'Shrutam — Day 8: BE Verb am / is / are | मुफ्त English कोर्स',
            'description' => 'Shrutam Day 8 में सीखें "I am", "He is", "We are" का सही use। "I happy" जैसी common Indian गलती को "I am happy" में बदलें। SAAVI के साथ।',
        ],
        'mr' => [
            'topic'       => 'BE Verb (am/is/are)',
            'title'       => 'Shrutam — Day 8: BE Verb am / is / are | मोफत English कोर्स',
            'description' => 'Shrutam Day 8 मध्ये शिका "I am", "He is", "We are" चा योग्य वापर. "I happy" सारख्या भारतीय चुका "I am happy" मध्ये बदला. SAAVI सोबत.',
        ],
        'te' => [
            'topic'       => 'BE Verb (am/is/are) Affirmative',
            'title'       => 'Shrutam — Day 8: BE Verb am / is / are in Telugu | Free English',
            'description' => 'Shrutam Day 8లో నేర్చుకోండి "I am", "He is", "We are" సరైన ఉపయోగం. "I happy" వంటి తప్పులను "I am happy" గా మార్చండి. SAAVI తో.',
        ],
    ],

    9 => [
        'slug'      => 'day-9-be-negative-possessives',
        'topic_en'  => 'BE Negative & Questions + Possessive Pronouns',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'BE Negative, Questions और Possessive Pronouns',
            'title'       => 'Shrutam — Day 9: BE Negative + mine/yours/his | मुफ्त English',
            'description' => 'Shrutam Day 9 में सीखें "I am not", "Are you?" और mine, yours, his, hers, ours, theirs जैसे possessive pronouns। "This is my" को "This is mine" बनाएँ।',
        ],
        'mr' => [
            'topic'       => 'BE Negative, Questions आणि Possessive Pronouns',
            'title'       => 'Shrutam — Day 9: BE Negative + mine/yours/his | मोफत English',
            'description' => 'Shrutam Day 9 मध्ये शिका "I am not", "Are you?" आणि mine, yours, his, hers, ours, theirs सारखे possessive pronouns. "This is my" ला "This is mine" करा.',
        ],
        'te' => [
            'topic'       => 'BE Negatives, Questions & Possessive Pronouns',
            'title'       => 'Shrutam — Day 9: BE Negative + mine/yours in Telugu | Free English',
            'description' => 'Shrutam Day 9లో నేర్చుకోండి "I am not", "Are you?" మరియు mine, yours, his, hers, ours, theirs వంటి possessive pronouns. "This is mine" సరైన రూపం.',
        ],
    ],

    10 => [
        'slug'      => 'day-10-have-possession',
        'topic_en'  => 'HAVE (possession) + don\'t have / doesn\'t have',
        'old_slug'  => 'day-10-have-to-obligation', // master prompt now puts HAVE TO on Day 11
        'hi' => [
            'topic'       => 'HAVE और Negative',
            'title'       => 'Shrutam — Day 10: HAVE / HAS Possession | मुफ्त English कोर्स',
            'description' => 'Shrutam Day 10 में सीखें "I have a car", "She has a sister" से अधिकार दिखाना और "I don\'t have", "Does he have?" से negative व questions बनाना।',
        ],
        'mr' => [
            'topic'       => 'HAVE आणि Negative',
            'title'       => 'Shrutam — Day 10: HAVE / HAS Possession | मोफत English कोर्स',
            'description' => 'Shrutam Day 10 मध्ये शिका "I have a car", "She has a sister" ने मालकी दाखवणे आणि "I don\'t have", "Does he have?" ने negative व प्रश्न बनवणे.',
        ],
        'te' => [
            'topic'       => 'HAVE / HAS Possession',
            'title'       => 'Shrutam — Day 10: HAVE / HAS Possession in Telugu | Free English',
            'description' => 'Shrutam Day 10లో నేర్చుకోండి "I have a car", "She has a sister" — వస్తువులు మీవి అని చెప్పడం మరియు "I don\'t have", "Does he have?" negative & questions.',
        ],
    ],

    11 => [
        'slug'      => 'day-11-have-to-question-tags',
        'topic_en'  => 'HAVE TO (obligation) + Question Tags',
        'old_slug'  => 'day-11-do-does-did',
        'hi' => [
            'topic'       => 'HAVE TO और Question Tags',
            'title'       => 'Shrutam — Day 11: HAVE TO + Question Tags | मुफ्त English',
            'description' => 'Shrutam Day 11 में सीखें "I have to go" से obligation दिखाना और "You are coming, aren\'t you?" जैसे question tags। "Main jaana hoon" का सही English।',
        ],
        'mr' => [
            'topic'       => 'HAVE TO आणि Question Tags',
            'title'       => 'Shrutam — Day 11: HAVE TO + Question Tags | मोफत English',
            'description' => 'Shrutam Day 11 मध्ये शिका "I have to go" ने गरज दाखवणे आणि "You are coming, aren\'t you?" सारखे question tags. "मला जायचंय" चे योग्य English.',
        ],
        'te' => [
            'topic'       => 'HAVE TO & Question Tags',
            'title'       => 'Shrutam — Day 11: HAVE TO + Question Tags in Telugu | Free English',
            'description' => 'Shrutam Day 11లో నేర్చుకోండి "I have to go" తో obligation చెప్పడం మరియు "You are coming, aren\'t you?" వంటి question tags. SAAVI తో సరైన English.',
        ],
    ],

    12 => [
        'slug'      => 'day-12-present-continuous',
        'topic_en'  => 'Present Continuous + Countable/Uncountable',
        'old_slug'  => 'day-12-go-verb-hospital-basic',
        'hi' => [
            'topic'       => 'Present Continuous और Countable/Uncountable',
            'title'       => 'Shrutam — Day 12: Present Continuous Tense | मुफ्त English',
            'description' => 'Shrutam Day 12 में सीखें "I am eating", "She is sleeping" से अभी हो रहे काम बताना और many books vs much water जैसे countable/uncountable nouns।',
        ],
        'mr' => [
            'topic'       => 'Present Continuous आणि Countable/Uncountable',
            'title'       => 'Shrutam — Day 12: Present Continuous Tense | मोफत English',
            'description' => 'Shrutam Day 12 मध्ये शिका "I am eating", "She is sleeping" ने सध्या होणारे काम सांगणे आणि many books vs much water — countable/uncountable nouns.',
        ],
        'te' => [
            'topic'       => 'Present Continuous & Countable/Uncountable',
            'title'       => 'Shrutam — Day 12: Present Continuous in Telugu | Free English',
            'description' => 'Shrutam Day 12లో నేర్చుకోండి "I am eating", "She is sleeping" — ఇప్పుడు జరుగుతున్న పనులు చెప్పడం మరియు many books vs much water countable/uncountable.',
        ],
    ],

    13 => [
        'slug'      => 'day-13-simple-past-regular',
        'topic_en'  => 'Simple Past (Regular Verbs)',
        'old_slug'  => 'day-13-can-vs-could-restaurant',
        'hi' => [
            'topic'       => 'Simple Past — Regular Verbs',
            'title'       => 'Shrutam — Day 13: Simple Past Tense (Regular) | मुफ्त English',
            'description' => 'Shrutam Day 13 में सीखें walked, played, cooked जैसे -ed past tense verbs। "Yesterday I walk" को "Yesterday I walked" बनाएँ। Spelling rules भी।',
        ],
        'mr' => [
            'topic'       => 'Simple Past — Regular Verbs',
            'title'       => 'Shrutam — Day 13: Simple Past Tense (Regular) | मोफत English',
            'description' => 'Shrutam Day 13 मध्ये शिका walked, played, cooked सारखे -ed past tense verbs. "Yesterday I walk" ला "Yesterday I walked" करा. Spelling नियमही.',
        ],
        'te' => [
            'topic'       => 'Simple Past Tense (Regular Verbs)',
            'title'       => 'Shrutam — Day 13: Simple Past (Regular) in Telugu | Free English',
            'description' => 'Shrutam Day 13లో నేర్చుకోండి walked, played, cooked వంటి -ed past tense verbs. "Yesterday I walked" సరైన రూపం. Spelling నియమాలు కూడా.',
        ],
    ],

    14 => [
        'slug'      => 'day-14-numbers-prices',
        'topic_en'  => 'Review + Numbers 21-100 & Prices',
        'old_slug'  => 'day-14-auto-taxi-directions',
        'hi' => [
            'topic'       => 'Numbers 21-100 और Prices',
            'title'       => 'Shrutam — Day 14: Numbers 21-100 + दाम पूछना | मुफ्त English',
            'description' => 'Shrutam Day 14 में सीखें twenty-one से hundred तक English numbers और "How much is this?", "It costs 250 rupees" से shopping में दाम पूछना।',
        ],
        'mr' => [
            'topic'       => 'Numbers 21-100 आणि किंमत',
            'title'       => 'Shrutam — Day 14: Numbers 21-100 + किंमत विचारणे | मोफत English',
            'description' => 'Shrutam Day 14 मध्ये शिका twenty-one ते hundred पर्यंत English numbers आणि "How much is this?", "It costs 250 rupees" ने shopping मध्ये किंमत विचारणे.',
        ],
        'te' => [
            'topic'       => 'Numbers 21-100 & Prices',
            'title'       => 'Shrutam — Day 14: Numbers 21-100 & Prices in Telugu | Free English',
            'description' => 'Shrutam Day 14లో నేర్చుకోండి twenty-one నుండి hundred వరకు English numbers మరియు "How much is this?" — shopping లో ధర అడగడం.',
        ],
    ],

    15 => [
        'slug'      => 'day-15-simple-past-irregular',
        'topic_en'  => 'Simple Past (Irregular Verbs)',
        'old_slug'  => 'day-15-get-part-1',
        'hi' => [
            'topic'       => 'Simple Past — Irregular Verbs',
            'title'       => 'Shrutam — Day 15: Irregular Past — went, ate, saw | मुफ्त English',
            'description' => 'Shrutam Day 15 में सीखें go→went, eat→ate, see→saw जैसे 20+ irregular verbs। "I goed" / "I eated" जैसी common गलतियाँ हमेशा के लिए सुधारें।',
        ],
        'mr' => [
            'topic'       => 'Simple Past — Irregular Verbs',
            'title'       => 'Shrutam — Day 15: Irregular Past — went, ate, saw | मोफत English',
            'description' => 'Shrutam Day 15 मध्ये शिका go→went, eat→ate, see→saw सारखे 20+ irregular verbs. "I goed" / "I eated" सारख्या चुका कायमच्या सुधारा.',
        ],
        'te' => [
            'topic'       => 'Simple Past (Irregular Verbs)',
            'title'       => 'Shrutam — Day 15: Irregular Past Verbs in Telugu | Free English',
            'description' => 'Shrutam Day 15లో నేర్చుకోండి go→went, eat→ate, see→saw వంటి 20+ irregular verbs. "I goed" వంటి తప్పులను శాశ్వతంగా సరిచేసుకోండి.',
        ],
    ],

    16 => [
        'slug'      => 'day-16-do-does-did-wh',
        'topic_en'  => 'DO/DOES/DID + Wh-Questions',
        'old_slug'  => 'day-16-get-part-2-bus-travel',
        'hi' => [
            'topic'       => 'DO/DOES/DID और Wh-Questions',
            'title'       => 'Shrutam — Day 16: DO/DOES/DID + Wh-Questions | मुफ्त English',
            'description' => 'Shrutam Day 16 में सीखें "What do you do?", "Where does she live?", "Why did you come late?" — सही word order से English questions बनाना।',
        ],
        'mr' => [
            'topic'       => 'DO/DOES/DID आणि Wh-Questions',
            'title'       => 'Shrutam — Day 16: DO/DOES/DID + Wh-Questions | मोफत English',
            'description' => 'Shrutam Day 16 मध्ये शिका "What do you do?", "Where does she live?", "Why did you come late?" — योग्य word order ने English प्रश्न बनवणे.',
        ],
        'te' => [
            'topic'       => 'DO/DOES/DID & Wh-Questions',
            'title'       => 'Shrutam — Day 16: DO/DOES/DID + Wh-Questions in Telugu | Free English',
            'description' => 'Shrutam Day 16లో నేర్చుకోండి "What do you do?", "Where does she live?", "Why did you come late?" — సరైన word order తో English questions.',
        ],
    ],

    17 => [
        'slug'      => 'day-17-simple-future',
        'topic_en'  => 'Simple Future (will + going to)',
        'old_slug'  => 'day-17-got-have-got',
        'hi' => [
            'topic'       => 'Simple Future — will और going to',
            'title'       => 'Shrutam — Day 17: Simple Future — will / going to | मुफ्त English',
            'description' => 'Shrutam Day 17 में सीखें "I will call you", "She is going to study" — will (sudden decision) vs going to (planned) का फ़र्क़। Future English बोलें।',
        ],
        'mr' => [
            'topic'       => 'Simple Future — will आणि going to',
            'title'       => 'Shrutam — Day 17: Simple Future — will / going to | मोफत English',
            'description' => 'Shrutam Day 17 मध्ये शिका "I will call you", "She is going to study" — will (अचानक निर्णय) vs going to (नियोजित) मधला फरक. Future English बोला.',
        ],
        'te' => [
            'topic'       => 'Simple Future (will & going to)',
            'title'       => 'Shrutam — Day 17: Simple Future — will / going to in Telugu | Free English',
            'description' => 'Shrutam Day 17లో నేర్చుకోండి "I will call you", "She is going to study" — will (అకస్మాత్తు నిర్ణయం) vs going to (planned) తేడా. Future English.',
        ],
    ],

    18 => [
        'slug'      => 'day-18-can-could',
        'topic_en'  => 'CAN/COULD + Polite Forms',
        'old_slug'  => 'day-18-make-vs-take',
        'hi' => [
            'topic'       => 'CAN, COULD और Polite Forms',
            'title'       => 'Shrutam — Day 18: CAN / COULD + Polite English | मुफ्त कोर्स',
            'description' => 'Shrutam Day 18 में सीखें "I can speak English", "Could you please help?", "Would you like tea?" — ability दिखाना और polite request करना।',
        ],
        'mr' => [
            'topic'       => 'CAN, COULD आणि Polite Forms',
            'title'       => 'Shrutam — Day 18: CAN / COULD + Polite English | मोफत कोर्स',
            'description' => 'Shrutam Day 18 मध्ये शिका "I can speak English", "Could you please help?", "Would you like tea?" — क्षमता दाखवणे आणि नम्र विनंती.',
        ],
        'te' => [
            'topic'       => 'CAN/COULD & Polite Forms',
            'title'       => 'Shrutam — Day 18: CAN / COULD + Polite English in Telugu | Free Course',
            'description' => 'Shrutam Day 18లో నేర్చుకోండి "I can speak English", "Could you please help?", "Would you like tea?" — ability చెప్పడం మరియు polite requests.',
        ],
    ],

    19 => [
        'slug'      => 'day-19-may-might',
        'topic_en'  => 'MAY/MIGHT + Exclamations',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'MAY, MIGHT और Exclamations',
            'title'       => 'Shrutam — Day 19: MAY / MIGHT + Exclamations | मुफ्त English',
            'description' => 'Shrutam Day 19 में सीखें "May I sit here?", "It might rain" से permission व possibility और "What a beautiful day!" जैसे exclamations से excitement दिखाना।',
        ],
        'mr' => [
            'topic'       => 'MAY, MIGHT आणि Exclamations',
            'title'       => 'Shrutam — Day 19: MAY / MIGHT + Exclamations | मोफत English',
            'description' => 'Shrutam Day 19 मध्ये शिका "May I sit here?", "It might rain" — परवानगी व शक्यता आणि "What a beautiful day!" सारख्या exclamations.',
        ],
        'te' => [
            'topic'       => 'MAY/MIGHT & Exclamations',
            'title'       => 'Shrutam — Day 19: MAY / MIGHT + Exclamations in Telugu | Free English',
            'description' => 'Shrutam Day 19లో నేర్చుకోండి "May I sit here?", "It might rain" — permission, possibility మరియు "What a beautiful day!" exclamations.',
        ],
    ],

    20 => [
        'slug'      => 'day-20-should-must',
        'topic_en'  => 'SHOULD / MUST',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'SHOULD और MUST',
            'title'       => 'Shrutam — Day 20: SHOULD vs MUST | मुफ्त English कोर्स',
            'description' => 'Shrutam Day 20 में सीखें "You should rest" (advice) और "I must go" (necessity) का फ़र्क़। SAAVI के साथ हर modal का सही use।',
        ],
        'mr' => [
            'topic'       => 'SHOULD आणि MUST',
            'title'       => 'Shrutam — Day 20: SHOULD vs MUST | मोफत English कोर्स',
            'description' => 'Shrutam Day 20 मध्ये शिका "You should rest" (सल्ला) आणि "I must go" (गरज) मधील फरक. SAAVI सोबत प्रत्येक modal चा योग्य वापर.',
        ],
        'te' => [
            'topic'       => 'SHOULD & MUST',
            'title'       => 'Shrutam — Day 20: SHOULD vs MUST in Telugu | Free English',
            'description' => 'Shrutam Day 20లో నేర్చుకోండి "You should rest" (advice) మరియు "I must go" (necessity) మధ్య తేడా. SAAVI తో ప్రతి modal యొక్క సరైన use.',
        ],
    ],

    21 => [
        'slug'      => 'day-21-ed-pronunciation',
        'topic_en'  => 'Review + -ed Pronunciation',
        'old_slug'  => null,
        'hi' => [
            'topic'       => '-ed का सही उच्चारण',
            'title'       => 'Shrutam — Day 21: -ed का सही Pronunciation | मुफ्त English',
            'description' => 'Shrutam Day 21 में सीखें walked /t/, played /d/, waited /ɪd/ — past tense -ed के तीनों sounds। Days 15-20 का review भी।',
        ],
        'mr' => [
            'topic'       => '-ed चे योग्य उच्चारण',
            'title'       => 'Shrutam — Day 21: -ed चे Pronunciation | मोफत English कोर्स',
            'description' => 'Shrutam Day 21 मध्ये शिका walked /t/, played /d/, waited /ɪd/ — past tense -ed चे तिन्ही sounds. Days 15-20 चा reviewही.',
        ],
        'te' => [
            'topic'       => '-ed Pronunciation Review',
            'title'       => 'Shrutam — Day 21: -ed Pronunciation in Telugu | Free English',
            'description' => 'Shrutam Day 21లో నేర్చుకోండి walked /t/, played /d/, waited /ɪd/ — past tense -ed మూడు sounds. Days 15-20 review కూడా.',
        ],
    ],

    22 => [
        'slug'      => 'day-22-past-continuous',
        'topic_en'  => 'Past Continuous',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Past Continuous Tense',
            'title'       => 'Shrutam — Day 22: Past Continuous — was / were + ing | मुफ्त English',
            'description' => 'Shrutam Day 22 में सीखें "I was eating", "They were playing" — पुराना action जो हो रहा था। "When you called, I was sleeping" जैसे sentences।',
        ],
        'mr' => [
            'topic'       => 'Past Continuous Tense',
            'title'       => 'Shrutam — Day 22: Past Continuous — was / were + ing | मोफत English',
            'description' => 'Shrutam Day 22 मध्ये शिका "I was eating", "They were playing" — मागे चालू असलेली कृती. "When you called, I was sleeping" प्रकारची वाक्ये.',
        ],
        'te' => [
            'topic'       => 'Past Continuous Tense',
            'title'       => 'Shrutam — Day 22: Past Continuous Tense in Telugu | Free English',
            'description' => 'Shrutam Day 22లో నేర్చుకోండి "I was eating", "They were playing" — గతంలో జరుగుతున్న పని. "When you called, I was sleeping" వంటి వాక్యాలు.',
        ],
    ],

    23 => [
        'slug'      => 'day-23-present-perfect-experience',
        'topic_en'  => 'Present Perfect (Ever / Never)',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Present Perfect — Ever, Never',
            'title'       => 'Shrutam — Day 23: Present Perfect — ever / never | मुफ्त English',
            'description' => 'Shrutam Day 23 में सीखें "I have been to Goa", "Have you ever eaten sushi?" — life experiences बताना। Past tense से अलग कब use करें।',
        ],
        'mr' => [
            'topic'       => 'Present Perfect — Ever, Never',
            'title'       => 'Shrutam — Day 23: Present Perfect — ever / never | मोफत English',
            'description' => 'Shrutam Day 23 मध्ये शिका "I have been to Goa", "Have you ever eaten sushi?" — आयुष्यभरचे अनुभव सांगणे. Past tense पासून वेगळेपण.',
        ],
        'te' => [
            'topic'       => 'Present Perfect (Ever / Never)',
            'title'       => 'Shrutam — Day 23: Present Perfect — ever / never in Telugu | Free English',
            'description' => 'Shrutam Day 23లో నేర్చుకోండి "I have been to Goa", "Have you ever eaten sushi?" — life experiences చెప్పడం. Past tense నుండి తేడా.',
        ],
    ],

    24 => [
        'slug'      => 'day-24-present-perfect-just-already',
        'topic_en'  => 'Present Perfect (just/already/yet) + Quantifiers',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Present Perfect — just/already/yet और Quantifiers',
            'title'       => 'Shrutam — Day 24: just / already / yet + Quantifiers | मुफ्त English',
            'description' => 'Shrutam Day 24 में सीखें "I have just eaten", "She has already left", "Have you finished yet?" और some/any, much/many quantifiers।',
        ],
        'mr' => [
            'topic'       => 'Present Perfect — just/already/yet आणि Quantifiers',
            'title'       => 'Shrutam — Day 24: just / already / yet + Quantifiers | मोफत English',
            'description' => 'Shrutam Day 24 मध्ये शिका "I have just eaten", "She has already left", "Have you finished yet?" आणि some/any, much/many quantifiers.',
        ],
        'te' => [
            'topic'       => 'Present Perfect (just/already/yet) & Quantifiers',
            'title'       => 'Shrutam — Day 24: just / already / yet + Quantifiers in Telugu | Free English',
            'description' => 'Shrutam Day 24లో నేర్చుకోండి "I have just eaten", "She has already left", "Have you finished yet?" మరియు some/any, much/many quantifiers.',
        ],
    ],

    25 => [
        'slug'      => 'day-25-past-perfect',
        'topic_en'  => 'Past Perfect',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Past Perfect Tense',
            'title'       => 'Shrutam — Day 25: Past Perfect — had + V3 | मुफ्त English कोर्स',
            'description' => 'Shrutam Day 25 में सीखें "I had eaten before he arrived" — past से पहले का past। Before, after, by the time के साथ Past Perfect।',
        ],
        'mr' => [
            'topic'       => 'Past Perfect Tense',
            'title'       => 'Shrutam — Day 25: Past Perfect — had + V3 | मोफत English कोर्स',
            'description' => 'Shrutam Day 25 मध्ये शिका "I had eaten before he arrived" — past च्या आधीचा past. Before, after, by the time सोबत Past Perfect.',
        ],
        'te' => [
            'topic'       => 'Past Perfect Tense',
            'title'       => 'Shrutam — Day 25: Past Perfect Tense in Telugu | Free English',
            'description' => 'Shrutam Day 25లో నేర్చుకోండి "I had eaten before he arrived" — past కంటే ముందు past. Before, after, by the time తో Past Perfect.',
        ],
    ],

    26 => [
        'slug'      => 'day-26-future-continuous-perfect',
        'topic_en'  => 'Future Continuous & Future Perfect',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Future Continuous और Future Perfect',
            'title'       => 'Shrutam — Day 26: Future Continuous + Perfect | मुफ्त English',
            'description' => 'Shrutam Day 26 में सीखें "I will be sleeping at 11 pm" (Future Continuous) और "She will have arrived by noon" (Future Perfect) — future की detail।',
        ],
        'mr' => [
            'topic'       => 'Future Continuous आणि Future Perfect',
            'title'       => 'Shrutam — Day 26: Future Continuous + Perfect | मोफत English',
            'description' => 'Shrutam Day 26 मध्ये शिका "I will be sleeping at 11 pm" (Future Continuous) आणि "She will have arrived by noon" (Future Perfect).',
        ],
        'te' => [
            'topic'       => 'Future Continuous & Future Perfect',
            'title'       => 'Shrutam — Day 26: Future Continuous + Perfect in Telugu | Free English',
            'description' => 'Shrutam Day 26లో నేర్చుకోండి "I will be sleeping at 11 pm" (Future Continuous) మరియు "She will have arrived by noon" (Future Perfect).',
        ],
    ],

    27 => [
        'slug'      => 'day-27-mixed-tenses',
        'topic_en'  => 'Mixed Tenses + Question Tags (Advanced)',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Mixed Tenses और Advanced Question Tags',
            'title'       => 'Shrutam — Day 27: Mixed Tenses + Question Tags | मुफ्त English',
            'description' => 'Shrutam Day 27 में सीखें कहानी सुनाते हुए past, present, future tenses को naturally mix करना और "I am right, aren\'t I?" जैसे advanced tags।',
        ],
        'mr' => [
            'topic'       => 'Mixed Tenses आणि Advanced Question Tags',
            'title'       => 'Shrutam — Day 27: Mixed Tenses + Question Tags | मोफत English',
            'description' => 'Shrutam Day 27 मध्ये शिका गोष्ट सांगताना past, present, future tenses naturally mix करणे आणि "I am right, aren\'t I?" सारखे advanced tags.',
        ],
        'te' => [
            'topic'       => 'Mixed Tenses & Question Tags (Advanced)',
            'title'       => 'Shrutam — Day 27: Mixed Tenses + Question Tags in Telugu | Free English',
            'description' => 'Shrutam Day 27లో నేర్చుకోండి కథ చెప్పేటప్పుడు past, present, future tenses naturally mix చేయడం మరియు "I am right, aren\'t I?" advanced tags.',
        ],
    ],

    28 => [
        'slug'      => 'day-28-s-pronunciation',
        'topic_en'  => 'Review + -s Pronunciation',
        'old_slug'  => null,
        'hi' => [
            'topic'       => '-s का सही उच्चारण',
            'title'       => 'Shrutam — Day 28: -s का Pronunciation Review | मुफ्त English',
            'description' => 'Shrutam Day 28 में सीखें eats /s/, plays /z/, watches /ɪz/ — plurals और 3rd person verb endings के तीनों sounds। Days 22-27 का review।',
        ],
        'mr' => [
            'topic'       => '-s चे योग्य उच्चारण',
            'title'       => 'Shrutam — Day 28: -s चे Pronunciation Review | मोफत English',
            'description' => 'Shrutam Day 28 मध्ये शिका eats /s/, plays /z/, watches /ɪz/ — plurals आणि 3rd person verb endings चे तिन्ही sounds. Days 22-27 review.',
        ],
        'te' => [
            'topic'       => '-s Pronunciation Review',
            'title'       => 'Shrutam — Day 28: -s Pronunciation Review in Telugu | Free English',
            'description' => 'Shrutam Day 28లో నేర్చుకోండి eats /s/, plays /z/, watches /ɪz/ — plurals మరియు 3rd person verbs మూడు sounds. Days 22-27 review.',
        ],
    ],

    29 => [
        'slug'      => 'day-29-office-basic',
        'topic_en'  => 'Office Basic + There is/are',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Office English Basics',
            'title'       => 'Shrutam — Day 29: Office English — Email, Meeting | मुफ्त कोर्स',
            'description' => 'Shrutam Day 29 में सीखें office English — boss, meeting, report, deadline और "Could you please send this email?" जैसी polite work requests।',
        ],
        'mr' => [
            'topic'       => 'Office English मूलभूत',
            'title'       => 'Shrutam — Day 29: Office English — Email, Meeting | मोफत कोर्स',
            'description' => 'Shrutam Day 29 मध्ये शिका office English — boss, meeting, report, deadline आणि "Could you please send this email?" सारख्या नम्र विनंत्या.',
        ],
        'te' => [
            'topic'       => 'Office Vocabulary & "There is/are"',
            'title'       => 'Shrutam — Day 29: Office English — Email, Meeting in Telugu | Free Course',
            'description' => 'Shrutam Day 29లో నేర్చుకోండి office English — boss, meeting, report, deadline మరియు "Could you please send this email?" polite requests.',
        ],
    ],

    30 => [
        'slug'      => 'day-30-telephone',
        'topic_en'  => 'Telephone + Polite Requests',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Telephone English',
            'title'       => 'Shrutam — Day 30: Telephone English Phrases | मुफ्त कोर्स',
            'description' => 'Shrutam Day 30 में सीखें "Hello, may I speak to...?", "This is Raju speaking", "Please hold on" — phone पर professional और polite English।',
        ],
        'mr' => [
            'topic'       => 'Telephone English',
            'title'       => 'Shrutam — Day 30: Telephone English Phrases | मोफत कोर्स',
            'description' => 'Shrutam Day 30 मध्ये शिका "Hello, may I speak to...?", "This is Raju speaking", "Please hold on" — फोनवर professional व नम्र English.',
        ],
        'te' => [
            'topic'       => 'Telephone English & Polite Requests',
            'title'       => 'Shrutam — Day 30: Telephone English Phrases in Telugu | Free Course',
            'description' => 'Shrutam Day 30లో నేర్చుకోండి "Hello, may I speak to...?", "This is Raju speaking" — phone లో professional & polite English.',
        ],
    ],

    31 => [
        'slug'      => 'day-31-shopping-bargaining',
        'topic_en'  => 'Shopping / Bargaining + Numbers 100-1000',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Shopping, Bargaining और बड़े Numbers',
            'title'       => 'Shrutam — Day 31: Shopping + Bargaining English | मुफ्त कोर्स',
            'description' => 'Shrutam Day 31 में सीखें "How much is this?", "Can I get a discount?", "That\'s too expensive" और 100-1000 तक English numbers।',
        ],
        'mr' => [
            'topic'       => 'Shopping, Bargaining आणि मोठे Numbers',
            'title'       => 'Shrutam — Day 31: Shopping + Bargaining English | मोफत कोर्स',
            'description' => 'Shrutam Day 31 मध्ये शिका "How much is this?", "Can I get a discount?", "That\'s too expensive" आणि 100-1000 पर्यंत English numbers.',
        ],
        'te' => [
            'topic'       => 'Shopping, Bargaining & Numbers 100-1000',
            'title'       => 'Shrutam — Day 31: Shopping + Bargaining English in Telugu | Free Course',
            'description' => 'Shrutam Day 31లో నేర్చుకోండి "How much is this?", "Can I get a discount?", "That\'s too expensive" మరియు 100-1000 వరకు English numbers.',
        ],
    ],

    32 => [
        'slug'      => 'day-32-restaurant',
        'topic_en'  => 'Restaurant + Polite Offers',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Restaurant English',
            'title'       => 'Shrutam — Day 32: Restaurant English — Order करना | मुफ्त कोर्स',
            'description' => 'Shrutam Day 32 में सीखें "Table for two please", "I would like to order", "Could I see the menu?" — restaurant में polite English।',
        ],
        'mr' => [
            'topic'       => 'Restaurant English',
            'title'       => 'Shrutam — Day 32: Restaurant English — Order देणे | मोफत कोर्स',
            'description' => 'Shrutam Day 32 मध्ये शिका "Table for two please", "I would like to order", "Could I see the menu?" — restaurant मध्ये नम्र English.',
        ],
        'te' => [
            'topic'       => 'Restaurant English & Polite Offers',
            'title'       => 'Shrutam — Day 32: Restaurant English in Telugu | Free Course',
            'description' => 'Shrutam Day 32లో నేర్చుకోండి "Table for two please", "I would like to order", "Could I see the menu?" — restaurant లో polite English.',
        ],
    ],

    33 => [
        'slug'      => 'day-33-hospital-symptoms',
        'topic_en'  => 'Hospital / Symptoms + Exclamations',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Hospital English और Symptoms',
            'title'       => 'Shrutam — Day 33: Hospital English — Doctor से बात | मुफ्त कोर्स',
            'description' => 'Shrutam Day 33 में सीखें "I have a fever", "My stomach hurts", "I feel dizzy" — doctor को symptoms समझाना। "I am fever" जैसी गलती सुधारें।',
        ],
        'mr' => [
            'topic'       => 'Hospital English आणि Symptoms',
            'title'       => 'Shrutam — Day 33: Hospital English — Doctor शी बोलणे | मोफत कोर्स',
            'description' => 'Shrutam Day 33 मध्ये शिका "I have a fever", "My stomach hurts", "I feel dizzy" — doctor ला symptoms सांगणे. "I am fever" चूक सुधारा.',
        ],
        'te' => [
            'topic'       => 'Hospital, Symptoms & Exclamations',
            'title'       => 'Shrutam — Day 33: Hospital English in Telugu | Free Course',
            'description' => 'Shrutam Day 33లో నేర్చుకోండి "I have a fever", "My stomach hurts", "I feel dizzy" — doctor కు symptoms చెప్పడం. "I am fever" తప్పు సరిచేసుకోండి.',
        ],
    ],

    34 => [
        'slug'      => 'day-34-travel-time',
        'topic_en'  => 'Travel (auto, bus) + Time (quarter to/past)',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Travel English और Quarter Time',
            'title'       => 'Shrutam — Day 34: Auto, Bus + Quarter Time | मुफ्त English',
            'description' => 'Shrutam Day 34 में सीखें "Where is the bus stop?", "Please stop here" और "quarter past three", "half past four" से advanced time बताना।',
        ],
        'mr' => [
            'topic'       => 'Travel English आणि Quarter Time',
            'title'       => 'Shrutam — Day 34: Auto, Bus + Quarter Time | मोफत English',
            'description' => 'Shrutam Day 34 मध्ये शिका "Where is the bus stop?", "Please stop here" आणि "quarter past three", "half past four" ने वेळ सांगणे.',
        ],
        'te' => [
            'topic'       => 'Travel & Quarter Time',
            'title'       => 'Shrutam — Day 34: Auto, Bus + Quarter Time in Telugu | Free English',
            'description' => 'Shrutam Day 34లో నేర్చుకోండి "Where is the bus stop?", "Please stop here" మరియు "quarter past three", "half past four" advanced time.',
        ],
    ],

    35 => [
        'slug'      => 'day-35-role-play',
        'topic_en'  => 'Multi-Scenario Role-Play',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Multi-Scenario Role-Play',
            'title'       => 'Shrutam — Day 35: Real-Life English Role-Play | मुफ्त कोर्स',
            'description' => 'Shrutam Day 35 में Market → Auto → Doctor → Restaurant — पूरे दिन की English एक flow में। Days 29-34 की सारी practice एक साथ।',
        ],
        'mr' => [
            'topic'       => 'Multi-Scenario Role-Play',
            'title'       => 'Shrutam — Day 35: Real-Life English Role-Play | मोफत कोर्स',
            'description' => 'Shrutam Day 35 मध्ये Market → Auto → Doctor → Restaurant — पूर्ण दिवसाची English एका flow मध्ये. Days 29-34 चा सराव एकत्र.',
        ],
        'te' => [
            'topic'       => 'Multi-Scenario Role-Play',
            'title'       => 'Shrutam — Day 35: Real-Life English Role-Play in Telugu | Free Course',
            'description' => 'Shrutam Day 35లో Market → Auto → Doctor → Restaurant — పూర్తి రోజు English ఒక flow లో. Days 29-34 practice మొత్తం కలిపి.',
        ],
    ],

    36 => [
        'slug'      => 'day-36-prepositions',
        'topic_en'  => 'Prepositions (in, on, at, to, from)',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Prepositions — in, on, at, to, from',
            'title'       => 'Shrutam — Day 36: Prepositions in / on / at | मुफ्त English',
            'description' => 'Shrutam Day 36 में सीखें "in Delhi", "on the table", "at 5 pm" — prepositions का सही use। "I live at Delhi" जैसी common Indian गलती सुधारें।',
        ],
        'mr' => [
            'topic'       => 'Prepositions — in, on, at, to, from',
            'title'       => 'Shrutam — Day 36: Prepositions in / on / at | मोफत English',
            'description' => 'Shrutam Day 36 मध्ये शिका "in Delhi", "on the table", "at 5 pm" — prepositions चा योग्य वापर. "I live at Delhi" चूक सुधारा.',
        ],
        'te' => [
            'topic'       => 'Prepositions (in, on, at, to, from)',
            'title'       => 'Shrutam — Day 36: Prepositions in / on / at in Telugu | Free English',
            'description' => 'Shrutam Day 36లో నేర్చుకోండి "in Delhi", "on the table", "at 5 pm" — prepositions సరైన use. "I live at Delhi" తప్పు సరిచేసుకోండి.',
        ],
    ],

    37 => [
        'slug'      => 'day-37-connectors',
        'topic_en'  => 'Connectors (and, but, because, so, or)',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Connectors — and, but, because, so, or',
            'title'       => 'Shrutam — Day 37: Connectors and / but / because | मुफ्त English',
            'description' => 'Shrutam Day 37 में सीखें "I like tea and coffee", "He passed because he worked hard" — sentences को जोड़ने वाले words से fluent English बोलें।',
        ],
        'mr' => [
            'topic'       => 'Connectors — and, but, because, so, or',
            'title'       => 'Shrutam — Day 37: Connectors and / but / because | मोफत English',
            'description' => 'Shrutam Day 37 मध्ये शिका "I like tea and coffee", "He passed because he worked hard" — वाक्ये जोडणारे शब्द. Fluent English बोला.',
        ],
        'te' => [
            'topic'       => 'Connectors (and, but, because, so, or)',
            'title'       => 'Shrutam — Day 37: Connectors and / but / because in Telugu | Free English',
            'description' => 'Shrutam Day 37లో నేర్చుకోండి "I like tea and coffee", "He passed because he worked hard" — sentences కలిపే words. Fluent English మాట్లాడండి.',
        ],
    ],

    38 => [
        'slug'      => 'day-38-comparisons',
        'topic_en'  => 'Comparisons (better, worse, more, less)',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Comparisons — better, worse, more, less',
            'title'       => 'Shrutam — Day 38: Comparisons — than, more, better | मुफ्त English',
            'description' => 'Shrutam Day 38 में सीखें "taller than", "more beautiful", "better than" से comparison करना। "More better" जैसी double comparative गलती सुधारें।',
        ],
        'mr' => [
            'topic'       => 'Comparisons — better, worse, more, less',
            'title'       => 'Shrutam — Day 38: Comparisons — than, more, better | मोफत English',
            'description' => 'Shrutam Day 38 मध्ये शिका "taller than", "more beautiful", "better than" ने तुलना करणे. "More better" double comparative चूक सुधारा.',
        ],
        'te' => [
            'topic'       => 'Comparisons (better, worse, more, less)',
            'title'       => 'Shrutam — Day 38: Comparisons in Telugu | Free English Course',
            'description' => 'Shrutam Day 38లో నేర్చుకోండి "taller than", "more beautiful", "better than" — comparisons. "More better" తప్పు సరిచేసుకోండి.',
        ],
    ],

    39 => [
        'slug'      => 'day-39-wh-questions',
        'topic_en'  => 'Wh-Questions Full Review',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Wh-Questions — Full Review',
            'title'       => 'Shrutam — Day 39: Wh-Questions What/Where/When/Why | मुफ्त English',
            'description' => 'Shrutam Day 39 में What, Where, When, Why, How, Which, Who — सारे Wh-questions का full review। सही word order से confidence से पूछें।',
        ],
        'mr' => [
            'topic'       => 'Wh-Questions — Full Review',
            'title'       => 'Shrutam — Day 39: Wh-Questions What/Where/When/Why | मोफत English',
            'description' => 'Shrutam Day 39 मध्ये What, Where, When, Why, How, Which, Who — सर्व Wh-questions चा full review. योग्य word order ने आत्मविश्वासाने विचारा.',
        ],
        'te' => [
            'topic'       => 'Wh-Questions Full Review',
            'title'       => 'Shrutam — Day 39: Wh-Questions Review in Telugu | Free English',
            'description' => 'Shrutam Day 39లో What, Where, When, Why, How, Which, Who — అన్ని Wh-questions full review. సరైన word order తో confidence తో అడగండి.',
        ],
    ],

    40 => [
        'slug'      => 'day-40-yes-no-questions',
        'topic_en'  => 'Yes/No Questions + Short Answers',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Yes/No Questions और Short Answers',
            'title'       => 'Shrutam — Day 40: Yes/No Questions + Short Answers | मुफ्त English',
            'description' => 'Shrutam Day 40 में सीखें "Do you like tea?" → "Yes, I do" / "No, I don\'t" — सही short answers। "Yes, I like" जैसी अधूरी जवाब देना बंद करें।',
        ],
        'mr' => [
            'topic'       => 'Yes/No Questions आणि Short Answers',
            'title'       => 'Shrutam — Day 40: Yes/No Questions + Short Answers | मोफत English',
            'description' => 'Shrutam Day 40 मध्ये शिका "Do you like tea?" → "Yes, I do" / "No, I don\'t" — योग्य short answers. "Yes, I like" अपूर्ण उत्तर थांबवा.',
        ],
        'te' => [
            'topic'       => 'Yes/No Questions & Short Answers',
            'title'       => 'Shrutam — Day 40: Yes/No Questions + Short Answers in Telugu | Free English',
            'description' => 'Shrutam Day 40లో నేర్చుకోండి "Do you like tea?" → "Yes, I do" / "No, I don\'t" — సరైన short answers. అసంపూర్ణ సమాధానాలు ఆపండి.',
        ],
    ],

    41 => [
        'slug'      => 'day-41-conditionals',
        'topic_en'  => 'Conditionals (If/Then)',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Conditionals — If / Then',
            'title'       => 'Shrutam — Day 41: Conditionals — If / Then sentences | मुफ्त English',
            'description' => 'Shrutam Day 41 में सीखें Zero, First और Second conditionals — "If it rains, I will stay", "If I were rich, I would buy a car"। "If it will rain" गलती सुधारें।',
        ],
        'mr' => [
            'topic'       => 'Conditionals — If / Then',
            'title'       => 'Shrutam — Day 41: Conditionals — If / Then sentences | मोफत English',
            'description' => 'Shrutam Day 41 मध्ये शिका Zero, First, Second conditionals — "If it rains, I will stay", "If I were rich, I would buy a car". "If it will rain" चूक सुधारा.',
        ],
        'te' => [
            'topic'       => 'Conditionals (If / Then)',
            'title'       => 'Shrutam — Day 41: Conditionals — If / Then in Telugu | Free English',
            'description' => 'Shrutam Day 41లో నేర్చుకోండి Zero, First, Second conditionals — "If it rains, I will stay", "If I were rich, I would buy a car". తప్పులు సరిచేసుకోండి.',
        ],
    ],

    42 => [
        'slug'      => 'day-42-making-plans',
        'topic_en'  => 'Conversation Practice — Making Plans',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Conversation Practice — Plans बनाना',
            'title'       => 'Shrutam — Day 42: Plans बनाने की English | मुफ्त कोर्स',
            'description' => 'Shrutam Day 42 में सीखें "What are you doing this weekend?", "How about going to a movie?", "Sorry, I\'m busy" — friends के साथ plans बनाना।',
        ],
        'mr' => [
            'topic'       => 'Conversation Practice — Plans बनवणे',
            'title'       => 'Shrutam — Day 42: Plans बनवण्याची English | मोफत कोर्स',
            'description' => 'Shrutam Day 42 मध्ये शिका "What are you doing this weekend?", "How about going to a movie?", "Sorry, I\'m busy" — मित्रांसोबत plans बनवणे.',
        ],
        'te' => [
            'topic'       => 'Conversation Practice — Making Plans',
            'title'       => 'Shrutam — Day 42: Making Plans Conversation in Telugu | Free Course',
            'description' => 'Shrutam Day 42లో నేర్చుకోండి "What are you doing this weekend?", "How about going to a movie?" — friends తో plans చేయడం English లో.',
        ],
    ],

    43 => [
        'slug'      => 'day-43-complaints',
        'topic_en'  => 'Complaints & Problem Solving',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Complaints और Problem Solving',
            'title'       => 'Shrutam — Day 43: Complaints + Problem Solving | मुफ्त English',
            'description' => 'Shrutam Day 43 में सीखें "This phone is not working", "Can you help me solve this?" — politely complaint करना और help माँगना।',
        ],
        'mr' => [
            'topic'       => 'Complaints आणि Problem Solving',
            'title'       => 'Shrutam — Day 43: Complaints + Problem Solving | मोफत English',
            'description' => 'Shrutam Day 43 मध्ये शिका "This phone is not working", "Can you help me solve this?" — नम्रपणे तक्रार करणे आणि मदत मागणे.',
        ],
        'te' => [
            'topic'       => 'Complaints & Problem Solving',
            'title'       => 'Shrutam — Day 43: Complaints + Problem Solving in Telugu | Free English',
            'description' => 'Shrutam Day 43లో నేర్చుకోండి "This phone is not working", "Can you help me solve this?" — politely complaint చేయడం మరియు help అడగడం.',
        ],
    ],

    44 => [
        'slug'      => 'day-44-invitations',
        'topic_en'  => 'Invitations & Making Plans',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Invitations और Plans',
            'title'       => 'Shrutam — Day 44: Invitations — Accept या Decline | मुफ्त English',
            'description' => 'Shrutam Day 44 में सीखें "Would you like to come to my party?", "I\'d love to", "Sorry, I can\'t" — invitations को politely accept या decline करना।',
        ],
        'mr' => [
            'topic'       => 'Invitations आणि Plans',
            'title'       => 'Shrutam — Day 44: Invitations — Accept किंवा Decline | मोफत English',
            'description' => 'Shrutam Day 44 मध्ये शिका "Would you like to come to my party?", "I\'d love to", "Sorry, I can\'t" — invitations नम्रपणे accept किंवा decline करणे.',
        ],
        'te' => [
            'topic'       => 'Invitations & Making Plans',
            'title'       => 'Shrutam — Day 44: Invitations Accept or Decline in Telugu | Free English',
            'description' => 'Shrutam Day 44లో నేర్చుకోండి "Would you like to come to my party?", "I\'d love to", "Sorry, I can\'t" — invitations politely accept లేదా decline.',
        ],
    ],

    45 => [
        'slug'      => 'day-45-small-talk',
        'topic_en'  => 'Small Talk + Exclamations + Question Tags',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Small Talk और Casual English',
            'title'       => 'Shrutam — Day 45: Small Talk English | मुफ्त English कोर्स',
            'description' => 'Shrutam Day 45 में सीखें "Beautiful day, isn\'t it?", "How was your weekend?", "What a lovely evening!" — मौसम और casual topics पर baat-cheet।',
        ],
        'mr' => [
            'topic'       => 'Small Talk आणि Casual English',
            'title'       => 'Shrutam — Day 45: Small Talk English | मोफत English कोर्स',
            'description' => 'Shrutam Day 45 मध्ये शिका "Beautiful day, isn\'t it?", "How was your weekend?", "What a lovely evening!" — हवामान आणि casual topics वर गप्पा.',
        ],
        'te' => [
            'topic'       => 'Small Talk & Casual English',
            'title'       => 'Shrutam — Day 45: Small Talk English in Telugu | Free Course',
            'description' => 'Shrutam Day 45లో నేర్చుకోండి "Beautiful day, isn\'t it?", "How was your weekend?" — weather, casual topics మీద baat-cheet.',
        ],
    ],

    46 => [
        'slug'      => 'day-46-job-interview',
        'topic_en'  => 'Job Interview Basics',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Job Interview English',
            'title'       => 'Shrutam — Day 46: Job Interview English Tips | मुफ्त कोर्स',
            'description' => 'Shrutam Day 46 में सीखें "Tell me about yourself", "What are your strengths?", "Why this job?" — interview के सबसे common questions के confidence से जवाब।',
        ],
        'mr' => [
            'topic'       => 'Job Interview English',
            'title'       => 'Shrutam — Day 46: Job Interview English Tips | मोफत कोर्स',
            'description' => 'Shrutam Day 46 मध्ये शिका "Tell me about yourself", "What are your strengths?", "Why this job?" — interview च्या common प्रश्नांची आत्मविश्वासाने उत्तरे.',
        ],
        'te' => [
            'topic'       => 'Job Interview Basics',
            'title'       => 'Shrutam — Day 46: Job Interview English Tips in Telugu | Free Course',
            'description' => 'Shrutam Day 46లో నేర్చుకోండి "Tell me about yourself", "What are your strengths?" — interview common questions కు confidence తో సమాధానాలు.',
        ],
    ],

    47 => [
        'slug'      => 'day-47-opinions',
        'topic_en'  => 'Opinions, Agree & Disagree',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Opinions, Agree और Disagree',
            'title'       => 'Shrutam — Day 47: Opinions + Agree/Disagree | मुफ्त English',
            'description' => 'Shrutam Day 47 में सीखें "I think...", "In my opinion...", "I agree", "I\'m sorry, I disagree" — politely अपनी राय रखना और disagree करना।',
        ],
        'mr' => [
            'topic'       => 'Opinions, Agree आणि Disagree',
            'title'       => 'Shrutam — Day 47: Opinions + Agree/Disagree | मोफत English',
            'description' => 'Shrutam Day 47 मध्ये शिका "I think...", "In my opinion...", "I agree", "I\'m sorry, I disagree" — नम्रपणे मत मांडणे आणि disagree करणे.',
        ],
        'te' => [
            'topic'       => 'Opinions, Agree & Disagree',
            'title'       => 'Shrutam — Day 47: Opinions + Agree/Disagree in Telugu | Free English',
            'description' => 'Shrutam Day 47లో నేర్చుకోండి "I think...", "In my opinion...", "I agree", "I\'m sorry, I disagree" — politely opinion చెప్పడం, disagree చేయడం.',
        ],
    ],

    48 => [
        'slug'      => 'day-48-intonation',
        'topic_en'  => 'Pronunciation & Intonation (Rise/Fall)',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Pronunciation और Intonation',
            'title'       => 'Shrutam — Day 48: Intonation — Rise / Fall | मुफ्त English कोर्स',
            'description' => 'Shrutam Day 48 में सीखें English की rhythm — questions में voice ऊपर, statements में voice नीचे। Flat tone की common Indian गलती सुधारें।',
        ],
        'mr' => [
            'topic'       => 'Pronunciation आणि Intonation',
            'title'       => 'Shrutam — Day 48: Intonation — Rise / Fall | मोफत English कोर्स',
            'description' => 'Shrutam Day 48 मध्ये शिका English चा rhythm — questions मध्ये आवाज वर, statements मध्ये आवाज खाली. Flat tone ची भारतीय चूक सुधारा.',
        ],
        'te' => [
            'topic'       => 'Pronunciation & Intonation (Rise/Fall)',
            'title'       => 'Shrutam — Day 48: Intonation — Rise / Fall in Telugu | Free English',
            'description' => 'Shrutam Day 48లో నేర్చుకోండి English rhythm — questions లో voice పైకి, statements లో voice కిందకి. Flat tone తప్పు సరిచేసుకోండి.',
        ],
    ],

    49 => [
        'slug'      => 'day-49-mock-conversation',
        'topic_en'  => 'Final Mock Conversation (5 Scenarios)',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Final Mock Conversation',
            'title'       => 'Shrutam — Day 49: Final Mock Conversation Practice | मुफ्त English',
            'description' => 'Shrutam Day 49 में पूरे दिन की English — घर, office, auto, hospital, restaurant, phone, interview, small talk। 48 दिनों की हर सीख एक flow में।',
        ],
        'mr' => [
            'topic'       => 'Final Mock Conversation',
            'title'       => 'Shrutam — Day 49: Final Mock Conversation Practice | मोफत English',
            'description' => 'Shrutam Day 49 मध्ये पूर्ण दिवसाची English — घर, office, auto, hospital, restaurant, phone, interview, small talk. 48 दिवसांचा सराव एका flow मध्ये.',
        ],
        'te' => [
            'topic'       => 'Final Mock Conversation',
            'title'       => 'Shrutam — Day 49: Final Mock Conversation in Telugu | Free English',
            'description' => 'Shrutam Day 49లో పూర్తి రోజు English — home, office, auto, hospital, restaurant, phone, interview, small talk. 48 రోజుల practice ఒక flow లో.',
        ],
    ],

    50 => [
        'slug'      => 'day-50-graduation',
        'topic_en'  => 'Graduation — Course Complete',
        'old_slug'  => null,
        'hi' => [
            'topic'       => 'Graduation — कोर्स पूरा',
            'title'       => 'Shrutam — Day 50: Graduation — 50-Day English Challenge पूरा | मुफ्त',
            'description' => 'Shrutam का 50-Day Spoken English Challenge पूरा! Certificate पाएँ, अपनी English journey share करें और SAAVI के साथ अगला step लें। मुफ्त में हमेशा।',
        ],
        'mr' => [
            'topic'       => 'Graduation — कोर्स पूर्ण',
            'title'       => 'Shrutam — Day 50: Graduation — 50-Day English Challenge पूर्ण | मोफत',
            'description' => 'Shrutam चा 50-Day Spoken English Challenge पूर्ण! Certificate घ्या, तुमची English journey share करा आणि SAAVI सोबत पुढचे पाऊल टाका. मोफत कायम.',
        ],
        'te' => [
            'topic'       => 'Graduation — Course Complete',
            'title'       => 'Shrutam — Day 50: Graduation — Course Complete in Telugu | Free',
            'description' => 'Shrutam యొక్క 50-Day Spoken English Challenge పూర్తి! Certificate పొందండి, మీ English journey share చేయండి, SAAVI తో తదుపరి step. ఎప్పుడూ ఉచితం.',
        ],
    ],
];
