<?php
/**
 * Lesson body content for the 50-Day Spoken English course.
 * Sourced from the Shrutam Master Prompts doc.
 *
 * Schema per day:
 *   core_concepts (array of strings)
 *   hook          (string)
 *   examples      (array of arrays) — each: en, pron, hi (mr/te optional, falls back to hi)
 *   mistake       (array)           — wrong, right, saavi (per-lang array: hi, mr, te)
 *   visual        (string)
 *
 * Days 1-5 have full per-language example translations.
 * Days 6-50 have shared Hinglish examples (Devanagari pronunciation works
 * naturally for Hindi+Marathi readers; Telugu sees Hindi fallback).
 * SAAVI mistake quote is localized per-language for ALL days.
 */

return [

    1 => [
        'core_concepts' => [
            'Time-based greetings: Good morning (6 AM-12 PM), Good afternoon (12-5 PM), Good evening (5-9 PM)',
            'Good night is a farewell or bedtime phrase, NOT a greeting',
            'Informal greetings: Hello, Hi',
            'Polite words: Thank you, Please, Sorry',
            'Farewells: Goodbye, Bye, See you later, See you tomorrow',
        ],
        'hook' => 'Raju meets his new boss at 10 am and says "Good night". Chatur says "Good noon". SAAVI didi corrects them and explains the right time-based greeting.',
        'examples' => [
            ['en' => 'Good morning, sir.',  'pron' => 'गुड मॉर्निंग, सर',     'hi' => 'शुभ प्रभात, सर',       'mr' => 'शुभ प्रभात, सर',       'te' => 'శుభోదయం, సర్'],
            ['en' => 'Sorry, I am late.',   'pron' => 'सॉरी, आय एम लेट',      'hi' => 'माफ़ कीजिए, देर हो गई',  'mr' => 'माफ करा, उशीर झाला',    'te' => 'క్షమించండి, ఆలస్యం అయ్యింది'],
            ['en' => 'Thank you, didi.',    'pron' => 'थैंक्यू, दीदी',        'hi' => 'धन्यवाद, दीदी',         'mr' => 'धन्यवाद, ताई',         'te' => 'ధన్యవాదాలు, అక్క'],
            ['en' => 'See you later.',      'pron' => 'सी यू लेटर',           'hi' => 'बाद में मिलेंगे',        'mr' => 'नंतर भेटू',            'te' => 'తర్వాత కలుద్దాం'],
            ['en' => 'Goodbye, take care.', 'pron' => 'गुडबाय, टेक केयर',     'hi' => 'अलविदा, ख़याल रखना',    'mr' => 'निरोप, काळजी घ्या',     'te' => 'వీడ్కోలు, జాగ్రత్త'],
        ],
        'mistake' => [
            'wrong' => 'Good night (used as greeting in the morning or afternoon)',
            'right' => 'Good morning / Good afternoon / Good evening',
            'saavi' => [
                'hi' => '"Good night" का use तब होता है जब आप रात को विदा लेते हैं या सोने जाते हैं — किसी से मिलते वक्त नहीं।',
                'mr' => '"Good night" चा वापर तेव्हा होतो जेव्हा तुम्ही रात्री निघता किंवा झोपायला जाता — कोणाला भेटताना नाही.',
                'te' => '"Good night" అనేది మీరు రాత్రి సెలవు తీసుకునేటప్పుడు లేదా నిద్రపోయే ముందు ఉపయోగించాలి — ఎవరినైనా కలిసేటప్పుడు కాదు.',
            ],
        ],
        'visual' => 'A clock with 4 colored zones: morning (yellow ☀️), afternoon (orange 🌤), evening (blue 🌆), night (dark blue 🌙). Each zone shows the correct greeting to use during that time.',
    ],

    2 => [
        'core_concepts' => [
            'Self-introduction pattern: "My name is X", "I am from Y", "I am a [profession/student]", "I am X years old"',
            'Correct the common Indian error: "Myself Raju" → "My name is Raju"',
            '"Myself" is used after "I" (e.g., "I did it myself"), never as introduction',
            'Numbers 1-20: one, two, three ... twenty',
            'Numbers used in age, phone number, year of study',
        ],
        'hook' => 'Raju says "Myself Raju. Myself 22 years." Chatur laughs but does not know the right way either. SAAVI didi teaches both the correct introduction pattern in 30 seconds.',
        'examples' => [
            ['en' => 'My name is Raju.',        'pron' => 'माय नेम इज़ राजू',           'hi' => 'मेरा नाम राजू है',     'mr' => 'माझे नाव राजू आहे',     'te' => 'నా పేరు రాజు'],
            ['en' => 'I am from Delhi.',         'pron' => 'आय एम फ्रॉम दिल्ली',        'hi' => 'मैं दिल्ली से हूँ',     'mr' => 'मी दिल्लीहून आलो आहे',  'te' => 'నేను ఢిల్లీ నుండి వచ్చాను'],
            ['en' => 'I am a student.',          'pron' => 'आय एम अ स्टूडेंट',          'hi' => 'मैं एक विद्यार्थी हूँ',  'mr' => 'मी विद्यार्थी आहे',     'te' => 'నేను విద్యార్థిని'],
            ['en' => 'I am 22 years old.',       'pron' => 'आय एम ट्वेंटी टू ईयर्स ओल्ड','hi' => 'मेरी उम्र 22 साल है',    'mr' => 'माझे वय 22 वर्षे आहे',   'te' => 'నా వయస్సు 22 సంవత్సరాలు'],
            ['en' => 'one, two, three ... ten', 'pron' => 'वन, टू, थ्री ... टेन',       'hi' => '1, 2, 3 ... 10',          'mr' => '1, 2, 3 ... 10',          'te' => '1, 2, 3 ... 10'],
        ],
        'mistake' => [
            'wrong' => 'Myself Raju. Myself a student.',
            'right' => 'My name is Raju. I am a student.',
            'saavi' => [
                'hi' => '"Myself" का मतलब है "खुद से" — जैसे "I did it myself"। अपना introduction देते वक्त हमेशा "My name is..." कहो।',
                'mr' => '"Myself" चा अर्थ "स्वतःहून" — जसे "I did it myself". स्वतःची ओळख करून देताना नेहमी "My name is..." म्हणा.',
                'te' => '"Myself" అంటే "నేను స్వయంగా" — "I did it myself" లాగా. మిమ్మల్ని పరిచయం చేసుకునేటప్పుడు ఎల్లప్పుడూ "My name is..." అనండి.',
            ],
        ],
        'visual' => 'A profile card with 4 fields: Name, City, Job, Age. Each field gets filled in as the example sentence is spoken. Numbers 1-20 pop up like balloons on a number line.',
    ],

    3 => [
        'core_concepts' => [
            'Family member nouns (संज्ञा): mother, father, brother, sister, son, daughter, husband, wife, friend, grandfather, grandmother',
            'Possessive with family: "my mother", "his father" (correction: not "I mother")',
            'Telling time: "It is X o\'clock", "half past X"',
            'Difference between "It is 3 o\'clock" and "It is half past 3"',
        ],
        'hook' => 'Raju shows a family photo but says "I father is doctor. She mother is teacher." SAAVI gently corrects him — possession needs "my", "his", "her", not the subject pronoun.',
        'examples' => [
            ['en' => 'My mother is a teacher.', 'pron' => 'माय मदर इज़ अ टीचर',     'hi' => 'मेरी माँ टीचर हैं',         'mr' => 'माझी आई शिक्षिका आहे',     'te' => 'మా అమ్మ టీచర్'],
            ['en' => 'My father is a doctor.',  'pron' => 'माय फादर इज़ अ डॉक्टर',  'hi' => 'मेरे पिता डॉक्टर हैं',       'mr' => 'माझे वडील डॉक्टर आहेत',    'te' => 'మా నాన్న డాక్టర్'],
            ['en' => 'It is 3 o\'clock.',       'pron' => 'इट इज़ थ्री ओक्लॉक',     'hi' => 'तीन बज रहे हैं',           'mr' => 'तीन वाजले आहेत',          'te' => 'మూడు గంటలయ్యింది'],
            ['en' => 'Half past four.',          'pron' => 'हाफ पास्ट फोर',          'hi' => 'साढ़े चार बजे',            'mr' => 'साडेचार वाजले',           'te' => 'నాలుగున్నర గంటలు'],
            ['en' => 'My friend lives nearby.',  'pron' => 'माय फ्रेंड लिव्ज़ नियरबाय','hi' => 'मेरा दोस्त पास में रहता है', 'mr' => 'माझा मित्र जवळ राहतो',     'te' => 'నా స్నేహితుడు దగ్గరలో ఉంటాడు'],
        ],
        'mistake' => [
            'wrong' => 'I father is doctor. She mother is teacher.',
            'right' => 'My father is a doctor. Her mother is a teacher.',
            'saavi' => [
                'hi' => '"My", "his", "her" possession दिखाते हैं। "I" subject है, possessive नहीं — "I father" गलत है, "my father" सही है।',
                'mr' => '"My", "his", "her" मालकी दाखवतात. "I" हा कर्ता आहे, possessive नाही — "I father" चुकीचे, "my father" बरोबर.',
                'te' => '"My", "his", "her" అనేవి possession చూపుతాయి. "I" అనేది subject, possessive కాదు — "I father" తప్పు, "my father" సరైనది.',
            ],
        ],
        'visual' => 'A family tree with each member labeled in English. Click a member → English word + Hindi/Marathi/Telugu meaning appears. A clock face with hour/minute hands moves to show time being spoken.',
    ],

    4 => [
        'core_concepts' => [
            'Subject pronouns (सर्वनाम): I, you, he, she, it, we, they — replace nouns as the subject',
            'Possessive adjectives (अधिकार-बोधक): my, your, his, her, its, our, their — show ownership, always before a noun',
            'Difference: "I" vs "my", "he" vs "his", "she" vs "her"',
            'Possessive adjectives are NEVER used alone — always followed by a noun',
        ],
        'hook' => 'Chatur says "I father is coming. She mother is cooking." Rancho asks "Why not \'my father\'?" SAAVI explains the subject vs possessive split with a simple table.',
        'examples' => [
            ['en' => 'I am Raju.',              'pron' => 'आय एम राजू',                'hi' => 'मैं राजू हूँ',              'mr' => 'मी राजू आहे',           'te' => 'నేను రాజు'],
            ['en' => 'You are my friend.',      'pron' => 'यू आर माय फ्रेंड',           'hi' => 'तुम मेरे दोस्त हो',          'mr' => 'तू माझा मित्र आहेस',    'te' => 'నువ్వు నా స్నేహితుడు'],
            ['en' => 'He is my brother.',       'pron' => 'ही इज़ माय ब्रदर',           'hi' => 'वह मेरा भाई है',           'mr' => 'तो माझा भाऊ आहे',      'te' => 'అతను నా అన్న'],
            ['en' => 'This is her pen.',        'pron' => 'दिस इज़ हर पेन',             'hi' => 'यह उसकी कलम है',           'mr' => 'ही तिची पेन आहे',       'te' => 'ఇది ఆమె పెన్'],
            ['en' => 'Our school is big.',      'pron' => 'अवर स्कूल इज़ बिग',          'hi' => 'हमारा स्कूल बड़ा है',        'mr' => 'आमचे शाळा मोठी आहे',     'te' => 'మా బడి పెద్దది'],
        ],
        'mistake' => [
            'wrong' => 'He father is coming. She mother is cooking.',
            'right' => 'His father is coming. Her mother is cooking.',
            'saavi' => [
                'hi' => '"He" subject है — "He is coming"। "His" possessive है — "His father"। Subject vs possession का फ़र्क़ हमेशा याद रखो।',
                'mr' => '"He" हा कर्ता आहे — "He is coming". "His" possessive आहे — "His father". कर्ता आणि possessive मधील फरक नेहमी लक्षात ठेवा.',
                'te' => '"He" అనేది subject — "He is coming". "His" అనేది possessive — "His father". Subject మరియు possession మధ్య తేడా ఎల్లప్పుడూ గుర్తుంచుకోండి.',
            ],
        ],
        'visual' => 'A two-column table: left column shows subject pronouns (I, you, he, she, we, they), right column shows matching possessive adjectives (my, your, his, her, our, their). An arrow points from a person icon to an object — the correct possessive adjective appears.',
    ],

    5 => [
        'core_concepts' => [
            'Simple Present for habitual actions: subject + base verb (I eat, you drink, we play, they work)',
            'Negative form: subject + do not / don\'t + base verb (I don\'t eat)',
            'Used for daily routines, habits, universal truths (The sun rises in the east)',
            'Time signals: every day, always, often, never, sometimes',
        ],
        'hook' => 'Raju says "I eat rice everyday." Chatur tries to say negative: "I don\'t eating rice." SAAVI corrects — for habits, use the simple form, not -ing.',
        'examples' => [
            ['en' => 'I eat breakfast at 7 am.',         'pron' => 'आय ईट ब्रेकफास्ट एट सेवन एएम',  'hi' => 'मैं सुबह 7 बजे नाश्ता करता हूँ',     'mr' => 'मी सकाळी 7 वाजता नाश्ता करतो',   'te' => 'నేను ఉదయం 7 గంటలకు అల్పాహారం తింటాను'],
            ['en' => 'We play cricket on Sunday.',       'pron' => 'वी प्ले क्रिकेट ऑन संडे',       'hi' => 'हम रविवार को क्रिकेट खेलते हैं',     'mr' => 'आम्ही रविवारी क्रिकेट खेळतो',    'te' => 'మేము ఆదివారం క్రికెట్ ఆడతాము'],
            ['en' => "I don't like tea.",                'pron' => 'आय डोंट लाइक टी',               'hi' => 'मुझे चाय पसंद नहीं है',              'mr' => 'मला चहा आवडत नाही',             'te' => 'నాకు టీ ఇష్టం లేదు'],
            ['en' => 'They work in Mumbai.',             'pron' => 'दे वर्क इन मुंबई',               'hi' => 'वे मुंबई में काम करते हैं',           'mr' => 'ते मुंबईत काम करतात',           'te' => 'వారు ముంబైలో పని చేస్తారు'],
            ['en' => "You don't drink coffee.",          'pron' => 'यू डोंट ड्रिंक कॉफी',            'hi' => 'तुम कॉफी नहीं पीते',                 'mr' => 'तू कॉफी पीत नाहीस',             'te' => 'నువ్వు కాఫీ తాగవు'],
        ],
        'mistake' => [
            'wrong' => "I don't liking tea.",
            'right' => "I don't like tea.",
            'saavi' => [
                'hi' => 'Habits के लिए simple form use करो — "don\'t + base verb"। -ing form अभी हो रहे काम के लिए है, हर रोज़ की बात के लिए नहीं।',
                'mr' => 'सवयींसाठी simple form वापरा — "don\'t + base verb". -ing form आत्ता चालू असलेल्या कामासाठी आहे, रोजच्या गोष्टींसाठी नाही.',
                'te' => 'అలవాట్ల కోసం simple form వాడండి — "don\'t + base verb". -ing form ప్రస్తుతం జరుగుతున్న పని కోసం, రోజువారీ విషయాలకు కాదు.',
            ],
        ],
        'visual' => 'A daily routine timeline (wake up → breakfast → school → lunch → study → dinner → sleep). Each action shows: green tick + simple present sentence, OR red cross + negative form.',
    ],

    6 => [
        'core_concepts' => [
            'Simple Present for 3rd person singular: he/she/it + verb+s/es (he eats, she drinks, it rains)',
            'Yes/No questions: Does + he/she/it + base verb? Answer: Yes, he does. / No, he doesn\'t.',
            'Spelling rules for +s/+es: eat→eats, go→goes, study→studies, watch→watches',
            'Only with HE/SHE/IT — never add -s for I/you/we/they',
        ],
        'hook' => 'Raju says "He go to school. She play cricket." Chatur is confused: "He goes? Why s?" SAAVI explains the 3rd-person -s rule with examples.',
        'examples' => [
            ['en' => 'He eats rice.',          'pron' => 'ही ईट्स राइस',         'hi' => 'वह चावल खाता है'],
            ['en' => 'She drinks tea.',        'pron' => 'शी ड्रिंक्स टी',        'hi' => 'वह चाय पीती है'],
            ['en' => 'Does he work here?',     'pron' => 'डज़ ही वर्क हियर',      'hi' => 'क्या वह यहाँ काम करता है?'],
            ['en' => 'Yes, he does.',          'pron' => 'यस, ही डज़',           'hi' => 'हाँ, करता है'],
            ['en' => "No, she doesn't.",       'pron' => 'नो, शी डज़ंट',         'hi' => 'नहीं, नहीं करती'],
        ],
        'mistake' => [
            'wrong' => 'He go to school every day.',
            'right' => 'He goes to school every day.',
            'saavi' => [
                'hi' => 'He/She/It के साथ verb में हमेशा "s" लगता है। "He go" गलत, "He goes" सही।',
                'mr' => 'He/She/It सोबत verb मध्ये नेहमी "s" लागते. "He go" चूक, "He goes" बरोबर.',
                'te' => 'He/She/It తో verb కు ఎల్లప్పుడూ "s" జతచేయాలి. "He go" తప్పు, "He goes" సరైనది.',
            ],
        ],
        'visual' => '3rd person singular icons (he/she/it) glowing → verb gets a red "+s" stamp. Question mark icon with "Does" highlighted in green.',
    ],

    7 => [
        'core_concepts' => [
            'Review of Days 1-6: greetings, self-intro, family, pronouns, simple present',
            '"There is" for singular existence: There is + a/an + singular noun',
            '"There are" for plural existence: There are + plural noun',
            'Question form: Is there...? Are there...?',
        ],
        'hook' => 'Dadaji asks "Ek kitab hai. English mein kaise kahein?" Raju says "Book is there." SAAVI corrects: "There is a book."',
        'examples' => [
            ['en' => 'There is a pen on the desk.',         'pron' => 'देयर इज़ अ पेन ऑन द डेस्क',     'hi' => 'मेज़ पर एक कलम है'],
            ['en' => 'There are 10 students in the class.', 'pron' => 'देयर आर टेन स्टूडेंट्स इन द क्लास','hi' => 'कक्षा में 10 छात्र हैं'],
            ['en' => 'Is there a hospital nearby?',         'pron' => 'इज़ देयर अ हॉस्पिटल नियरबाय',  'hi' => 'क्या पास में अस्पताल है?'],
            ['en' => 'Are there any questions?',            'pron' => 'आर देयर एनी क्वेश्चन्स',        'hi' => 'क्या कोई सवाल हैं?'],
            ['en' => "There isn't any milk.",               'pron' => 'देयर इज़ंट एनी मिल्क',           'hi' => 'दूध नहीं है'],
        ],
        'mistake' => [
            'wrong' => 'Book is there. Two pens are there.',
            'right' => 'There is a book. There are two pens.',
            'saavi' => [
                'hi' => 'जब कोई चीज़ exist करती है तो "There is/There are" से शुरुआत करो। Indian English में "Book is there" common है, पर proper English में सही नहीं।',
                'mr' => 'जेव्हा एखादी वस्तू असते, तेव्हा "There is/There are" ने सुरुवात करा. भारतीय English मध्ये "Book is there" common आहे, पण proper English मध्ये बरोबर नाही.',
                'te' => 'ఏదైనా వస్తువు ఉన్నదని చెప్పేటప్పుడు "There is/There are" తో మొదలుపెట్టండి. Indian English లో "Book is there" common, కానీ proper English లో సరైనది కాదు.',
            ],
        ],
        'visual' => 'An empty room. Objects fly in one by one — single object → "There is", multiple objects → "There are". Question form pops up with "Is/Are there...?"',
    ],

    8 => [
        'core_concepts' => [
            'BE verb forms: I am, You are, He/She/It is, We are, They are',
            'Used for state, identity, location: I am happy, She is a doctor, It is here',
            'Pattern: Subject + am/is/are + complement',
            'Cannot drop "am/is/are" in English — Hindi often does, English never',
        ],
        'hook' => 'Raju says "I happy. She doctor." SAAVI didi gently corrects: "You missed \'am\' and \'is\'."',
        'examples' => [
            ['en' => 'I am Raju.',           'pron' => 'आय एम राजू',           'hi' => 'मैं राजू हूँ'],
            ['en' => 'She is a teacher.',    'pron' => 'शी इज़ अ टीचर',        'hi' => 'वह टीचर है'],
            ['en' => 'We are friends.',      'pron' => 'वी आर फ्रेंड्स',        'hi' => 'हम दोस्त हैं'],
            ['en' => 'It is hot today.',     'pron' => 'इट इज़ हॉट टुडे',      'hi' => 'आज गरमी है'],
            ['en' => 'They are at home.',    'pron' => 'दे आर एट होम',          'hi' => 'वे घर पर हैं'],
        ],
        'mistake' => [
            'wrong' => 'I happy. She doctor.',
            'right' => 'I am happy. She is a doctor.',
            'saavi' => [
                'hi' => 'English में "am/is/are" ज़रूरी है — Hindi में "मैं ख़ुश" चलता है, English में "I am happy" बोलना पड़ता है।',
                'mr' => 'English मध्ये "am/is/are" आवश्यक — मराठीत "मी आनंदी" चालते, English मध्ये "I am happy" बोलावे लागते.',
                'te' => 'English లో "am/is/are" తప్పనిసరి — తెలుగులో "నేను సంతోషంగా" అన్నది సరిపోతుంది, English లో "I am happy" అనాలి.',
            ],
        ],
        'visual' => 'Three boxes: I → am, He/She/It → is, You/We/They → are. Character with emotion icon (happy, sad, tired) → "am/is/are" appears before adjective in green.',
    ],

    9 => [
        'core_concepts' => [
            'BE negative: I am not, You are not / aren\'t, He/She/It is not / isn\'t, We/They are not / aren\'t',
            'BE questions: Am I? Are you? Is he? (invert subject and verb)',
            'Possessive pronouns (no noun after): mine, yours, his, hers, ours, theirs',
            'Difference: "my book" (adjective + noun) vs "this book is mine" (pronoun, alone)',
        ],
        'hook' => 'Chatur says "I am not student? No, I am not student." Then Dadaji says "This book is my." SAAVI corrects both — "I am not a student" and "This book is mine."',
        'examples' => [
            ['en' => 'I am not tired.',          'pron' => 'आय एम नॉट टायर्ड',     'hi' => 'मैं थका नहीं हूँ'],
            ['en' => 'Are you ready?',           'pron' => 'आर यू रेडी',           'hi' => 'क्या आप तैयार हैं?'],
            ['en' => 'This book is mine.',       'pron' => 'दिस बुक इज़ माइन',     'hi' => 'यह किताब मेरी है'],
            ['en' => 'That pen is yours.',       'pron' => 'दैट पेन इज़ योर्स',     'hi' => 'वह कलम तुम्हारी है'],
            ['en' => "Is she at home? No, she isn't.", 'pron' => 'इज़ शी एट होम? नो, शी इज़ंट', 'hi' => 'क्या वह घर पर है? नहीं'],
        ],
        'mistake' => [
            'wrong' => 'This book is my.',
            'right' => 'This book is mine.',
            'saavi' => [
                'hi' => '"My" के बाद noun ज़रूरी — "my book"। अकेले use करना हो तो "mine" बोलो — "This is mine"।',
                'mr' => '"My" नंतर noun आवश्यक — "my book". एकट्याने वापरायचे असेल तर "mine" — "This is mine".',
                'te' => '"My" తరువాత noun తప్పనిసరి — "my book". ఒంటరిగా వాడాలంటే "mine" అనండి — "This is mine".',
            ],
        ],
        'visual' => 'Two columns: Possessive Adjective (my, your, his, her, our, their) ↔ Possessive Pronoun (mine, yours, his, hers, ours, theirs). An object moves between people, the right pronoun appears.',
    ],

    10 => [
        'core_concepts' => [
            'HAVE for possession: I/You/We/They have, He/She/It has',
            'Negative: don\'t have / doesn\'t have',
            'Question: Do you have? / Does he have?',
            'Spelling: he/she/it changes "have" to "has"',
        ],
        'hook' => 'Raju says "I have a pen. She have a book." Chatur catches it: "She have? No, she has!" SAAVI explains why.',
        'examples' => [
            ['en' => 'I have a car.',           'pron' => 'आय हैव अ कार',          'hi' => 'मेरे पास कार है'],
            ['en' => 'She has a sister.',       'pron' => 'शी हैज़ अ सिस्टर',       'hi' => 'उसकी एक बहन है'],
            ['en' => "I don't have money.",     'pron' => 'आय डोंट हैव मनी',       'hi' => 'मेरे पास पैसे नहीं हैं'],
            ['en' => 'Does he have a bike?',    'pron' => 'डज़ ही हैव अ बाइक',     'hi' => 'क्या उसके पास बाइक है?'],
            ['en' => "We don't have time.",     'pron' => 'वी डोंट हैव टाइम',       'hi' => 'हमारे पास समय नहीं है'],
        ],
        'mistake' => [
            'wrong' => 'She have a sister. He have a car.',
            'right' => 'She has a sister. He has a car.',
            'saavi' => [
                'hi' => 'He/She/It के साथ "has" use करो, "have" नहीं। बाकी सब (I/you/we/they) के साथ "have"।',
                'mr' => 'He/She/It सोबत "has" वापरा, "have" नाही. बाकी सर्व (I/you/we/they) सोबत "have".',
                'te' => 'He/She/It తో "has" వాడండి, "have" కాదు. మిగిలిన వాటితో (I/you/we/they) "have".',
            ],
        ],
        'visual' => 'A backpack opens — items fly out → "I have...". For he/she/it, the same backpack with "has" stamp. Cross mark for negative.',
    ],

    11 => [
        'core_concepts' => [
            'HAVE TO for obligation/necessity: I have to go, She has to work',
            'Difference from "am going" — "have to" = duty, "am going" = action in progress',
            'Question tags: positive statement → negative tag, negative statement → positive tag',
            'Examples: You are coming, aren\'t you? He likes tea, doesn\'t he?',
        ],
        'hook' => 'Raju says "Main jaana hoon — I am going." SAAVI: "No, that means \'I am in motion\'. You mean \'I have to go\'."',
        'examples' => [
            ['en' => 'I have to go now.',                 'pron' => 'आय हैव टू गो नाउ',           'hi' => 'मुझे अब जाना है'],
            ['en' => 'She has to study.',                 'pron' => 'शी हैज़ टू स्टडी',            'hi' => 'उसे पढ़ना है'],
            ['en' => "You are coming, aren't you?",       'pron' => 'यू आर कमिंग, आर्न्ट यू',     'hi' => 'तुम आ रहे हो, है ना?'],
            ['en' => "He doesn't smoke, does he?",        'pron' => 'ही डज़ंट स्मोक, डज़ ही',      'hi' => 'वह धूम्रपान नहीं करता, करता है?'],
            ['en' => 'I have to finish work today.',      'pron' => 'आय हैव टू फिनिश वर्क टुडे',  'hi' => 'मुझे आज काम पूरा करना है'],
        ],
        'mistake' => [
            'wrong' => 'I am going (when you mean "I must go").',
            'right' => 'I have to go.',
            'saavi' => [
                'hi' => '"Have to" duty/necessity दिखाता है। "I am going" का मतलब है अभी जा रहा हूँ। "Mujhe jaana hai" = "I have to go", not "I am going"।',
                'mr' => '"Have to" गरज दाखवते. "I am going" म्हणजे आत्ता जात आहे. "मला जायचे आहे" = "I have to go", "I am going" नाही.',
                'te' => '"Have to" అనేది బాధ్యత చూపుతుంది. "I am going" అంటే ఇప్పుడు వెళ్తున్నాను. "నేను వెళ్లాలి" = "I have to go", "I am going" కాదు.',
            ],
        ],
        'visual' => 'Two roads: "Have to" (must do — alarm clock) vs "Want to" (optional — heart icon). Speech bubble with statement + question tag.',
    ],

    12 => [
        'core_concepts' => [
            'Present Continuous for actions happening NOW: am/is/are + verb+ing',
            'Examples: I am eating, She is sleeping, They are playing',
            'Countable nouns (can count): book, pen, apple — use many, a few',
            'Uncountable nouns (cannot count): water, rice, sugar — use much, a little',
        ],
        'hook' => 'Raju looks out the window: "It rain now." SAAVI corrects "It is raining now." Chatur says "Many water on road." SAAVI explains countable vs uncountable.',
        'examples' => [
            ['en' => 'I am eating lunch.',     'pron' => 'आय एम ईटिंग लंच',      'hi' => 'मैं दोपहर का खाना खा रहा हूँ'],
            ['en' => 'She is sleeping.',       'pron' => 'शी इज़ स्लीपिंग',       'hi' => 'वह सो रही है'],
            ['en' => 'It is raining now.',     'pron' => 'इट इज़ रेनिंग नाउ',     'hi' => 'अभी बारिश हो रही है'],
            ['en' => 'Many books on the shelf.','pron' => 'मेनी बुक्स ऑन द शेल्फ', 'hi' => 'shelf पर कई किताबें (countable)'],
            ['en' => 'Much water in the bottle.','pron' => 'मच वॉटर इन द बॉटल',    'hi' => 'बोतल में बहुत पानी (uncountable)'],
        ],
        'mistake' => [
            'wrong' => 'Many water is on road. Much books here.',
            'right' => 'Much water is on the road. Many books here.',
            'saavi' => [
                'hi' => '"Many" countable के लिए (books, pens), "much" uncountable के लिए (water, rice, sugar)। पानी को गिन नहीं सकते, इसलिए "much water"।',
                'mr' => '"Many" मोजता येणाऱ्यांसाठी (books, pens), "much" न मोजता येणाऱ्यांसाठी (water, rice). पाणी मोजता येत नाही, म्हणून "much water".',
                'te' => '"Many" లెక్కించగలిగే వాటికి (books, pens), "much" లెక్కించలేని వాటికి (water, rice). నీటిని లెక్కించలేము కాబట్టి "much water".',
            ],
        ],
        'visual' => 'Split screen: left countable (stack of books multiplying), right uncountable (water level rising in bottle). Action happening now → "is/am/are + ing" floats up.',
    ],

    13 => [
        'core_concepts' => [
            'Simple Past for completed actions: add -ed (walk → walked, play → played)',
            'Spelling rules: add -ed, add -d (like→liked), y→ied (study→studied), double consonant (stop→stopped)',
            'Used with: yesterday, last week, ago, in 2020',
            'Pronunciation of -ed: /t/ (walked), /d/ (played), /ɪd/ (waited)',
        ],
        'hook' => 'Raju says "Yesterday I walk to market." SAAVI corrects: "Yesterday I walked to market — past tense needs -ed."',
        'examples' => [
            ['en' => 'I walked to school yesterday.', 'pron' => 'आय वॉक्ट टू स्कूल यस्टरडे', 'hi' => 'मैं कल स्कूल पैदल गया'],
            ['en' => 'She cooked dinner.',            'pron' => 'शी कुक्ट डिनर',             'hi' => 'उसने रात का खाना पकाया'],
            ['en' => 'We played cricket.',            'pron' => 'वी प्लेड क्रिकेट',          'hi' => 'हमने क्रिकेट खेला'],
            ['en' => 'He studied for the exam.',       'pron' => 'ही स्टडीड फॉर द एग्ज़ाम',    'hi' => 'उसने परीक्षा के लिए पढ़ाई की'],
            ['en' => 'They stopped the car.',         'pron' => 'दे स्टॉप्ट द कार',           'hi' => 'उन्होंने गाड़ी रोकी'],
        ],
        'mistake' => [
            'wrong' => 'I walk yesterday. She cook dinner.',
            'right' => 'I walked yesterday. She cooked dinner.',
            'saavi' => [
                'hi' => 'Yesterday, last week, ago — past के signal हैं। Verb में -ed लगाना पड़ता है। "I walk yesterday" गलत, "I walked yesterday" सही।',
                'mr' => 'Yesterday, last week, ago — past चे signals आहेत. Verb ला -ed लागते. "I walk yesterday" चूक, "I walked yesterday" बरोबर.',
                'te' => 'Yesterday, last week, ago — past signals. Verb కు -ed జతచేయాలి. "I walk yesterday" తప్పు, "I walked yesterday" సరైనది.',
            ],
        ],
        'visual' => 'Timeline arrow pointing left to "yesterday". Verb in present floats over → -ed sticker attaches → past form lands on timeline.',
    ],

    14 => [
        'core_concepts' => [
            'Numbers 21-100: twenty-one, twenty-two ... ninety-nine, one hundred',
            'Pattern: tens + ones (e.g., 45 = forty-five, with hyphen)',
            'Asking prices: "How much is it?" / "How much are they?"',
            'Saying prices: "It costs X rupees", "That\'s expensive/cheap"',
        ],
        'hook' => 'Raju goes to the market. The shirt is 250 rupees but he doesn\'t know how to say "two hundred fifty" in English. SAAVI teaches numbers and price phrases.',
        'examples' => [
            ['en' => 'Twenty-one, twenty-two, twenty-three.', 'pron' => 'ट्वेंटी वन, ट्वेंटी टू, ट्वेंटी थ्री', 'hi' => '21, 22, 23'],
            ['en' => 'Fifty-five rupees.',             'pron' => 'फिफ्टी फाइव रुपीज़',         'hi' => 'पचपन रुपये'],
            ['en' => 'How much is this shirt?',        'pron' => 'हाउ मच इज़ दिस शर्ट',       'hi' => 'यह शर्ट कितने की है?'],
            ['en' => 'It costs two hundred fifty rupees.','pron' => 'इट कोस्ट्स टू हंड्रेड फिफ्टी रुपीज़','hi' => 'यह 250 रुपये की है'],
            ['en' => "That's too expensive.",          'pron' => 'दैट्स टू एक्सपेंसिव',         'hi' => 'यह बहुत महँगा है'],
        ],
        'mistake' => [
            'wrong' => 'How much price? / This how much?',
            'right' => 'How much is it? / How much does it cost?',
            'saavi' => [
                'hi' => 'दाम पूछते वक्त "How much is it?" बोलो — "How much price?" Indian style है, proper नहीं।',
                'mr' => 'किंमत विचारताना "How much is it?" म्हणा — "How much price?" Indian style आहे, proper नाही.',
                'te' => 'ధర అడిగేటప్పుడు "How much is it?" అనండి — "How much price?" Indian style, proper కాదు.',
            ],
        ],
        'visual' => 'Number grid 21-100 with each number lighting up as spoken. Price tags swing on items in a shop. Coin sound effect.',
    ],

    15 => [
        'core_concepts' => [
            'Irregular past verbs change form completely (no -ed): go→went, eat→ate, see→saw',
            'Common irregulars: come→came, give→gave, take→took, do→did, have→had, get→got',
            'Memorize 20-30 most common — rest follow patterns',
            '"goed" / "eated" are common Indian errors — irregular verbs never use -ed',
        ],
        'hook' => 'Raju says "Yesterday I goed to market. I eated biryani." Chatur laughs but SAAVI is kind: "go→went, eat→ate. Memorize these — they\'re irregular."',
        'examples' => [
            ['en' => 'I went to Delhi.',     'pron' => 'आय वेंट टू दिल्ली',     'hi' => 'मैं दिल्ली गया'],
            ['en' => 'She ate an apple.',    'pron' => 'शी एट एन एप्पल',         'hi' => 'उसने सेब खाया'],
            ['en' => 'He saw a movie.',      'pron' => 'ही सॉ अ मूवी',           'hi' => 'उसने फिल्म देखी'],
            ['en' => 'They came home late.', 'pron' => 'दे केम होम लेट',         'hi' => 'वे देर से घर आए'],
            ['en' => 'We took the bus.',     'pron' => 'वी टुक द बस',            'hi' => 'हमने बस ली'],
        ],
        'mistake' => [
            'wrong' => 'I goed to market. She eated rice.',
            'right' => 'I went to market. She ate rice.',
            'saavi' => [
                'hi' => 'Irregular verbs में -ed नहीं लगता — पूरी shape बदल जाती है। go→went, eat→ate, see→saw। ये याद करनी पड़ती हैं।',
                'mr' => 'Irregular verbs ला -ed लागत नाही — पूर्ण रूप बदलते. go→went, eat→ate, see→saw. ही पाठ करावी लागतात.',
                'te' => 'Irregular verbs కు -ed రాదు — పూర్తి రూపం మారుతుంది. go→went, eat→ate, see→saw. వీటిని గుర్తుంచుకోవాలి.',
            ],
        ],
        'visual' => 'Flip cards: front shows V1 (present form, e.g., "go"), back shows V2 (past form, e.g., "went") with picture. Memory game style.',
    ],

    16 => [
        'core_concepts' => [
            'DO/DOES for present simple questions and negatives (Do you like? Does he eat?)',
            'DID for past simple questions and negatives (Did you go?)',
            'Wh-questions: What, Where, When, Why, How, Which — combine with do/does/did',
            'Word order: Wh-word + helping verb + subject + main verb',
        ],
        'hook' => 'Chatur asks "What you like?" SAAVI corrects "What do you like?" Raju asks "Where he went?" SAAVI: "Where did he go?"',
        'examples' => [
            ['en' => 'What do you do?',            'pron' => 'व्हाट डू यू डू',             'hi' => 'आप क्या करते हैं?'],
            ['en' => 'Where does she live?',       'pron' => 'व्हेयर डज़ शी लिव',           'hi' => 'वह कहाँ रहती है?'],
            ['en' => 'Why did you come late?',     'pron' => 'व्हाय डिड यू कम लेट',        'hi' => 'तुम देर से क्यों आए?'],
            ['en' => 'How do you spell "water"?',  'pron' => 'हाउ डू यू स्पेल वॉटर',       'hi' => '"water" कैसे लिखते हैं?'],
            ['en' => 'When did the train leave?',   'pron' => 'व्हेन डिड द ट्रेन लीव',      'hi' => 'ट्रेन कब गई?'],
        ],
        'mistake' => [
            'wrong' => 'What you like? Where he went?',
            'right' => 'What do you like? Where did he go?',
            'saavi' => [
                'hi' => 'Question बनाते वक्त normal verb से पहले do/does/did लगाना पड़ता है। "What you like?" गलत, "What do you like?" सही।',
                'mr' => 'प्रश्न करताना normal verb च्या आधी do/does/did लागते. "What you like?" चूक, "What do you like?" बरोबर.',
                'te' => 'Question చేసేటప్పుడు normal verb ముందు do/does/did రావాలి. "What you like?" తప్పు, "What do you like?" సరైనది.',
            ],
        ],
        'visual' => 'Question word wheel (What/Where/When/Why/How/Which/Who) — spin to land on a word, sentence forms with do/does/did highlighted.',
    ],

    17 => [
        'core_concepts' => [
            'Simple Future with "will" for predictions and spontaneous decisions: I will call you',
            '"Going to" for plans and intentions: I am going to study, She is going to travel',
            'Difference: will (sudden, less certain) vs going to (planned, decided earlier)',
            'Negative: will not / won\'t, am/is/are not going to',
        ],
        'hook' => 'Raju looks at dark clouds: "It will rain." Then opens bag: "Oh! No umbrella. I will buy one." SAAVI explains "will" vs "going to".',
        'examples' => [
            ['en' => 'I will call you later.',           'pron' => 'आय विल कॉल यू लेटर',         'hi' => 'मैं बाद में फोन करूँगा'],
            ['en' => 'She is going to study medicine.',  'pron' => 'शी इज़ गोइंग टू स्टडी मेडिसिन','hi' => 'वह डॉक्टरी पढ़ने वाली है'],
            ['en' => 'It is going to rain soon.',         'pron' => 'इट इज़ गोइंग टू रेन सून',    'hi' => 'जल्दी बारिश होने वाली है'],
            ['en' => "I won't be late.",                 'pron' => 'आय वोंट बी लेट',             'hi' => 'मैं देर नहीं करूँगा'],
            ['en' => 'They will come tomorrow.',          'pron' => 'दे विल कम टुमॉरो',           'hi' => 'वे कल आएँगे'],
        ],
        'mistake' => [
            'wrong' => 'Tomorrow I will going to school.',
            'right' => 'Tomorrow I will go to school. (or: Tomorrow I am going to go to school.)',
            'saavi' => [
                'hi' => 'Will + base verb (will go), या am going to + base verb (am going to go) — दोनों mix नहीं करते।',
                'mr' => 'Will + base verb (will go), किंवा am going to + base verb (am going to go) — दोन्ही mix करू नका.',
                'te' => 'Will + base verb (will go), లేదా am going to + base verb (am going to go) — రెండూ mix చేయకండి.',
            ],
        ],
        'visual' => 'Calendar (going to — planned event marked) vs thought bubble (will — sudden idea). Character thinks → "I will...". Writes plan → "I am going to...".',
    ],

    18 => [
        'core_concepts' => [
            'CAN for ability (I can swim) and informal permission (Can I go?)',
            'COULD for past ability (I could run fast) and polite request (Could you help me?)',
            'Polite forms: Would you like...? Could you please...? May I...?',
            'After can/could/may, use base verb (no "to") — Can I go (not "Can I to go")',
        ],
        'hook' => 'Raju says "I can to swim." Chatur says "Can I come in, sir?" SAAVI shows the polite version: "Could you please open the door?"',
        'examples' => [
            ['en' => 'I can speak English.',              'pron' => 'आय कैन स्पीक इंग्लिश',     'hi' => 'मैं अंग्रेज़ी बोल सकता हूँ'],
            ['en' => 'Could you please open the door?',   'pron' => 'कुड यू प्लीज़ ओपन द डोर',  'hi' => 'क्या आप दरवाज़ा खोल सकते हैं?'],
            ['en' => 'Would you like some tea?',          'pron' => 'वुड यू लाइक सम टी',         'hi' => 'क्या आप चाय लेंगे?'],
            ['en' => 'May I come in?',                    'pron' => 'मे आय कम इन',                'hi' => 'क्या मैं अंदर आ सकता हूँ?'],
            ['en' => 'I could run fast as a child.',      'pron' => 'आय कुड रन फास्ट एज़ अ चाइल्ड','hi' => 'मैं बचपन में तेज़ दौड़ सकता था'],
        ],
        'mistake' => [
            'wrong' => 'I can to swim. Could you to help?',
            'right' => 'I can swim. Could you help?',
            'saavi' => [
                'hi' => 'Can/could/may/will के बाद "to" नहीं लगता — सीधे base verb आता है। "Can I go" सही, "Can I to go" गलत।',
                'mr' => 'Can/could/may/will नंतर "to" लागत नाही — थेट base verb. "Can I go" बरोबर, "Can I to go" चूक.',
                'te' => 'Can/could/may/will తరువాత "to" రాదు — నేరుగా base verb. "Can I go" సరైనది, "Can I to go" తప్పు.',
            ],
        ],
        'visual' => 'Two doors: "Can" (ability — muscle icon), "Could" (polite request — bow icon). Polite phrase bubbles float above.',
    ],

    19 => [
        'core_concepts' => [
            'MAY for permission (May I go?) and possibility (It may rain)',
            'MIGHT for less certain possibility (I might come)',
            'Exclamations to express surprise/joy: What a...! How...!',
            '"What a + adjective + noun!" / "How + adjective!"',
        ],
        'hook' => 'Raju asks "May I go to toilet?" Then looks at cloudy sky: "It may rain or might not." Dadaji sees a flower: "What a flower!"',
        'examples' => [
            ['en' => 'May I sit here?',           'pron' => 'मे आय सिट हियर',           'hi' => 'क्या मैं यहाँ बैठ सकता हूँ?'],
            ['en' => 'It may rain today.',        'pron' => 'इट मे रेन टुडे',            'hi' => 'आज बारिश हो सकती है'],
            ['en' => 'I might come to the party.', 'pron' => 'आय माइट कम टू द पार्टी',   'hi' => 'मैं पार्टी में आ सकता हूँ (पक्का नहीं)'],
            ['en' => 'What a beautiful day!',      'pron' => 'व्हाट अ ब्यूटिफुल डे',     'hi' => 'कितना सुंदर दिन है!'],
            ['en' => 'How fast he runs!',          'pron' => 'हाउ फास्ट ही रन्स',         'hi' => 'वह कितनी तेज़ दौड़ता है!'],
        ],
        'mistake' => [
            'wrong' => 'It may to rain. He might to come.',
            'right' => 'It may rain. He might come.',
            'saavi' => [
                'hi' => 'May/might के बाद "to" नहीं — direct base verb। "What a..." के बाद "a/an + adjective + noun" आता है।',
                'mr' => 'May/might नंतर "to" नाही — direct base verb. "What a..." नंतर "a/an + adjective + noun".',
                'te' => 'May/might తరువాత "to" రాదు — direct base verb. "What a..." తరువాత "a/an + adjective + noun".',
            ],
        ],
        'visual' => 'Permission sign (may), possibility meter (might — needle wavering), exclamation balloon ("What a..." pops with sparkles).',
    ],

    20 => [
        'core_concepts' => [
            'SHOULD for advice/recommendation: You should rest',
            'MUST for strong obligation/necessity: I must go, You must obey rules',
            'Difference: should = optional advice, must = no choice',
            'Negative: shouldn\'t (better not), mustn\'t (forbidden — strong)',
        ],
        'hook' => 'Raju has a headache. Doctor says "You should take rest." Chatur says "I must go to office, no rest." SAAVI explains the difference.',
        'examples' => [
            ['en' => 'You should drink more water.',     'pron' => 'यू शुड ड्रिंक मोर वॉटर',     'hi' => 'तुम्हें अधिक पानी पीना चाहिए'],
            ['en' => 'I must finish this work today.',   'pron' => 'आय मस्ट फिनिश दिस वर्क टुडे','hi' => 'मुझे यह काम आज ख़त्म करना है'],
            ['en' => "You shouldn't smoke.",             'pron' => 'यू शुडंट स्मोक',              'hi' => 'तुम्हें धूम्रपान नहीं करना चाहिए'],
            ['en' => "You mustn't touch the fire.",      'pron' => 'यू मसंट टच द फायर',           'hi' => 'आग को मत छुओ (सख्त मनाही)'],
            ['en' => 'We should help others.',           'pron' => 'वी शुड हेल्प अदर्स',          'hi' => 'हमें दूसरों की मदद करनी चाहिए'],
        ],
        'mistake' => [
            'wrong' => 'You should not smoking. (using -ing after should)',
            'right' => "You shouldn't smoke.",
            'saavi' => [
                'hi' => 'Should/must के बाद base verb — "You should rest", "You must go"। -ing form गलत।',
                'mr' => 'Should/must नंतर base verb — "You should rest", "You must go". -ing form चूक.',
                'te' => 'Should/must తరువాత base verb — "You should rest", "You must go". -ing form తప్పు.',
            ],
        ],
        'visual' => 'Traffic light: green (should — advice), red (must — compulsory). Sentence appears next to each light.',
    ],

    21 => [
        'core_concepts' => [
            'Review of Days 15-20: irregular past, wh-questions, future, can/could, may/might, should/must',
            'Pronunciation of -ed endings has 3 sounds:',
            '/t/ (voiceless verbs): walked, stopped, watched',
            '/d/ (voiced verbs): played, called, lived',
            '/ɪd/ (verbs ending in t/d): waited, needed, started',
        ],
        'hook' => 'Raju says "I walk-ed yesterday" (with extra syllable). SAAVI: "It\'s \'walked\' — sounds like \'walkt\'. Not walk-ed."',
        'examples' => [
            ['en' => 'walked → /walkt/',  'pron' => 'वॉक्ट',  'hi' => 'walk + /t/ sound'],
            ['en' => 'played → /playd/',  'pron' => 'प्लेड',   'hi' => 'play + /d/ sound'],
            ['en' => 'waited → /wait-id/', 'pron' => 'वेटिड',   'hi' => 'wait + /ɪd/ extra syllable'],
            ['en' => 'stopped → /stopt/', 'pron' => 'स्टॉप्ट', 'hi' => 'stop + /t/ sound'],
            ['en' => 'needed → /need-id/','pron' => 'नीडिड',   'hi' => 'need + /ɪd/ extra syllable'],
        ],
        'mistake' => [
            'wrong' => 'walk-ed (pronouncing -ed as separate syllable for every verb)',
            'right' => 'walked /walkt/, played /playd/, waited /wait-id/',
            'saavi' => [
                'hi' => '-ed का extra syllable सिर्फ़ tab आता है जब verb "t" या "d" से ख़त्म होती है (waited, needed)। बाकी सब में -ed silent या /t/, /d/ है।',
                'mr' => '-ed चा वेगळा syllable फक्त तेव्हाच जेव्हा verb "t" किंवा "d" ने संपते (waited, needed). बाकी मध्ये -ed silent किंवा /t/, /d/.',
                'te' => '-ed వేరే syllable అయ్యేది verb "t" లేదా "d" తో ముగిసినప్పుడే (waited, needed). మిగిలిన చోట్ల -ed silent లేదా /t/, /d/.',
            ],
        ],
        'visual' => 'Three sound boxes: /t/, /d/, /ɪd/. Verbs fall into the correct box, sound plays.',
    ],

    22 => [
        'core_concepts' => [
            'Past Continuous: was/were + verb+ing',
            'Used for: action in progress at a specific past time',
            'Or: action interrupted by another action (Past Continuous + Simple Past)',
            'Examples: I was eating when phone rang, They were playing all evening',
        ],
        'hook' => 'Raju says "Yesterday at 8 pm, I eat dinner when phone ring." SAAVI: "I was eating dinner when the phone rang."',
        'examples' => [
            ['en' => 'I was watching TV at 9 pm.',          'pron' => 'आय वॉज़ वॉचिंग टीवी एट नाइन पीएम',   'hi' => 'मैं रात 9 बजे टीवी देख रहा था'],
            ['en' => 'They were playing when it rained.',    'pron' => 'दे वर प्लेइंग वेन इट रेंड',          'hi' => 'जब बारिश हुई, वे खेल रहे थे'],
            ['en' => 'She was cooking dinner.',              'pron' => 'शी वॉज़ कुकिंग डिनर',               'hi' => 'वह रात का खाना पका रही थी'],
            ['en' => 'We were waiting for the bus.',         'pron' => 'वी वर वेटिंग फॉर द बस',             'hi' => 'हम बस का इंतज़ार कर रहे थे'],
            ['en' => 'It was raining all morning.',           'pron' => 'इट वॉज़ रेनिंग ऑल मॉर्निंग',         'hi' => 'सारी सुबह बारिश हो रही थी'],
        ],
        'mistake' => [
            'wrong' => 'I was eat dinner. They were play cricket.',
            'right' => 'I was eating dinner. They were playing cricket.',
            'saavi' => [
                'hi' => 'Past Continuous में was/were के बाद verb + ing आता है। "I was eat" गलत, "I was eating" सही।',
                'mr' => 'Past Continuous मध्ये was/were नंतर verb + ing येते. "I was eat" चूक, "I was eating" बरोबर.',
                'te' => 'Past Continuous లో was/were తరువాత verb + ing వస్తుంది. "I was eat" తప్పు, "I was eating" సరైనది.',
            ],
        ],
        'visual' => 'Two timelines: long line for continuous action, point on it for short action. Clock ticks, character does activity, then phone interrupts.',
    ],

    23 => [
        'core_concepts' => [
            'Present Perfect for life experiences: have/has + past participle',
            'Examples: I have been to Delhi, She has eaten sushi',
            'Use with EVER (kabhi) and NEVER (kabhi nahi)',
            'Never use specific time (no yesterday, last week) with Present Perfect',
        ],
        'hook' => 'Raju says "I visited Mumbai last month." SAAVI: "That\'s past tense. For life experience anytime, say \'I have visited Mumbai\'."',
        'examples' => [
            ['en' => 'I have been to Goa.',         'pron' => 'आय हैव बीन टू गोवा',         'hi' => 'मैं गोवा जा चुका हूँ'],
            ['en' => 'Have you ever eaten sushi?',  'pron' => 'हैव यू एवर ईटन सुशी',         'hi' => 'क्या तुमने कभी सुशी खाई है?'],
            ['en' => 'She has never seen snow.',    'pron' => 'शी हैज़ नेवर सीन स्नो',       'hi' => 'उसने कभी बर्फ नहीं देखी'],
            ['en' => 'We have lived here for 5 years.','pron' => 'वी हैव लिव्ड हियर फॉर फाइव ईयर्स','hi' => 'हम 5 साल से यहाँ रह रहे हैं'],
            ['en' => 'They have visited Japan twice.','pron' => 'दे हैव विज़िटिड जापान ट्वाइस','hi' => 'वे जापान दो बार जा चुके हैं'],
        ],
        'mistake' => [
            'wrong' => 'I have gone to Delhi yesterday.',
            'right' => 'I went to Delhi yesterday. (Simple Past — has specific time) OR I have been to Delhi. (Present Perfect — no specific time)',
            'saavi' => [
                'hi' => 'Present Perfect में specific time (yesterday, last week) नहीं use करते। Anytime in life experience के लिए "have/has + V3"।',
                'mr' => 'Present Perfect मध्ये specific time (yesterday, last week) वापरत नाही. आयुष्यात कधीही असेल तर "have/has + V3".',
                'te' => 'Present Perfect లో specific time (yesterday, last week) వాడరు. జీవితంలో ఎప్పుడైనా అయితే "have/has + V3".',
            ],
        ],
        'visual' => 'A passport with stamps for experiences (Goa, Japan, Delhi). New stamp lands → "I have visited...". Question mark floats: "Have you ever...?"',
    ],

    24 => [
        'core_concepts' => [
            'Present Perfect with: just (अभी-अभी), already (पहले से), yet (अभी तक — questions/negatives only)',
            'Examples: I have just eaten / She has already left / Have you finished yet?',
            'Quantifiers: some (positive), any (questions/negatives)',
            'Much/many: much for uncountable (much water), many for countable (many books)',
            'A few (countable, small amount), a little (uncountable, small amount)',
        ],
        'hook' => 'Raju says "I finished homework." SAAVI: "Just now? Say \'I have just finished\'." Chatur says "I have any money?" SAAVI: "Do you have any money?"',
        'examples' => [
            ['en' => 'I have just eaten.',           'pron' => 'आय हैव जस्ट ईटन',          'hi' => 'मैंने अभी-अभी खाया है'],
            ['en' => 'She has already left.',         'pron' => 'शी हैज़ ऑलरेडी लेफ्ट',     'hi' => 'वह पहले ही जा चुकी है'],
            ['en' => 'Have you finished yet?',        'pron' => 'हैव यू फिनिश्ड येट',         'hi' => 'क्या तुमने अभी तक ख़त्म किया?'],
            ['en' => 'I need some water.',            'pron' => 'आय नीड सम वॉटर',             'hi' => 'मुझे थोड़ा पानी चाहिए'],
            ['en' => 'Do you have any questions?',    'pron' => 'डू यू हैव एनी क्वेश्चन्स',  'hi' => 'क्या आपके कोई सवाल हैं?'],
        ],
        'mistake' => [
            'wrong' => 'I have any water. She has any books.',
            'right' => 'I have some water. Do you have any books?',
            'saavi' => [
                'hi' => '"Some" positive sentences में, "any" questions/negatives में। "I have some water" सही, "I have any water" गलत।',
                'mr' => '"Some" positive sentences मध्ये, "any" questions/negatives मध्ये. "I have some water" बरोबर.',
                'te' => '"Some" positive sentences లో, "any" questions/negatives లో. "I have some water" సరైనది.',
            ],
        ],
        'visual' => 'Timeline with markers: just (very recent), already (before now), yet (not done yet). Quantifier table: some/any/much/many.',
    ],

    25 => [
        'core_concepts' => [
            'Past Perfect: had + past participle (V3)',
            'Used for: action completed BEFORE another past action (past before past)',
            'Often with: before, after, by the time, when',
            'Examples: I had eaten before he arrived. By 8 pm she had left.',
        ],
        'hook' => 'Raju says "When I reached station, the train left." SAAVI: "When I reached, the train had already left (it left before you arrived)."',
        'examples' => [
            ['en' => 'I had eaten before he arrived.',     'pron' => 'आय हैड ईटन बिफोर ही अराइव्ड', 'hi' => 'उसके आने से पहले मैं खा चुका था'],
            ['en' => 'She had finished work when I called.','pron' => 'शी हैड फिनिश्ड वर्क वेन आय कॉल्ड','hi' => 'जब मैंने फोन किया, वह काम ख़त्म कर चुकी थी'],
            ['en' => 'By 8 pm, they had left.',             'pron' => 'बाय एट पीएम, दे हैड लेफ्ट',     'hi' => '8 बजे तक वे जा चुके थे'],
            ['en' => 'After he had eaten, he slept.',      'pron' => 'आफ्टर ही हैड ईटन, ही स्लेप्ट',  'hi' => 'खाना खाने के बाद वह सो गया'],
            ['en' => 'The film had started before we got there.','pron' => 'द फिल्म हैड स्टार्टिड बिफोर वी गॉट देयर','hi' => 'हमारे पहुँचने से पहले फिल्म शुरू हो चुकी थी'],
        ],
        'mistake' => [
            'wrong' => 'I had eat before he came.',
            'right' => 'I had eaten before he came.',
            'saavi' => [
                'hi' => 'Past Perfect = had + V3 (past participle)। "had eat" गलत, "had eaten" सही। V3 form याद रखो।',
                'mr' => 'Past Perfect = had + V3 (past participle). "had eat" चूक, "had eaten" बरोबर.',
                'te' => 'Past Perfect = had + V3 (past participle). "had eat" తప్పు, "had eaten" సరైనది.',
            ],
        ],
        'visual' => 'Two timeline arrows: first action finishes (had + V3, faded), then second action starts (simple past, bright). "Before/After" connects them.',
    ],

    26 => [
        'core_concepts' => [
            'Future Continuous: will be + verb+ing (action in progress at a future time)',
            'Future Perfect: will have + past participle (action completed before a future time)',
            'Time signals: by (then), at (time), this time tomorrow, by next week',
            'Difference: will be doing (in middle of) vs will have done (already finished)',
        ],
        'hook' => 'Raju says "At 6 pm tomorrow, I eat dinner." SAAVI corrects "I will be eating dinner." Chatur: "By 9 pm, I finish work." SAAVI: "I will have finished work."',
        'examples' => [
            ['en' => 'I will be sleeping at 11 pm.',         'pron' => 'आय विल बी स्लीपिंग एट इलेवन पीएम',  'hi' => 'मैं रात 11 बजे सो रहा हूँगा'],
            ['en' => 'She will have arrived by noon.',        'pron' => 'शी विल हैव अराइव्ड बाय नून',         'hi' => 'वह दोपहर तक आ चुकी होगी'],
            ['en' => 'They will be travelling next week.',     'pron' => 'दे विल बी ट्रैवलिंग नेक्स्ट वीक',     'hi' => 'वे अगले हफ्ते सफर कर रहे होंगे'],
            ['en' => 'By 5, we will have finished.',          'pron' => 'बाय फाइव, वी विल हैव फिनिश्ड',       'hi' => '5 तक हम ख़त्म कर चुके होंगे'],
            ['en' => 'This time tomorrow I will be flying.',   'pron' => 'दिस टाइम टुमॉरो आय विल बी फ्लाइंग','hi' => 'कल इस वक्त मैं उड़ान भर रहा हूँगा'],
        ],
        'mistake' => [
            'wrong' => 'Tomorrow at 6 pm I eat dinner.',
            'right' => 'Tomorrow at 6 pm I will be eating dinner.',
            'saavi' => [
                'hi' => 'Future में चल रहे काम के लिए "will be + ing"। Future में पूरा हो जाने वाला काम के लिए "will have + V3"।',
                'mr' => 'Future मध्ये चालू असलेल्या कामासाठी "will be + ing". Future मध्ये पूर्ण होणाऱ्या कामासाठी "will have + V3".',
                'te' => 'Future లో జరుగుతున్న పని కోసం "will be + ing". Future లో పూర్తయ్యే పని కోసం "will have + V3".',
            ],
        ],
        'visual' => 'Clock hands moving toward future time. Dotted line for continuous action ongoing, finish-line flag for perfect (completed).',
    ],

    27 => [
        'core_concepts' => [
            'Mixed tenses in conversation: switch between past, present, future naturally',
            'Question tags review with all tenses: You have seen this, haven\'t you? He didn\'t come, did he?',
            'Special tag: "I am right, aren\'t I?" (NOT amn\'t I)',
            'Rule: Positive statement → negative tag, Negative statement → positive tag',
        ],
        'hook' => 'Raju tells story: "Yesterday I went to market. I buy vegetables. Now I am cooking." SAAVI helps mix tenses correctly. Dadaji: "I am late, isn\'t it?" SAAVI: "I am late, aren\'t I?"',
        'examples' => [
            ['en' => "You have been to Jaipur, haven't you?", 'pron' => 'यू हैव बीन टू जयपुर, हैवंट यू',  'hi' => 'तुम जयपुर गए हो, है ना?'],
            ['en' => "She didn't call, did she?",              'pron' => 'शी डिडंट कॉल, डिड शी',           'hi' => 'उसने फोन नहीं किया, किया?'],
            ['en' => "They will come, won't they?",             'pron' => 'दे विल कम, वोंट दे',              'hi' => 'वे आएँगे, है ना?'],
            ['en' => "I am right, aren't I?",                   'pron' => 'आय एम राइट, आर्न्ट आय',          'hi' => 'मैं सही हूँ, है ना?'],
            ['en' => "He likes tea, doesn't he?",               'pron' => 'ही लाइक्स टी, डज़ंट ही',          'hi' => 'उसे चाय पसंद है, है ना?'],
        ],
        'mistake' => [
            'wrong' => 'I am right, amn\'t I? / I am right, isn\'t it?',
            'right' => 'I am right, aren\'t I?',
            'saavi' => [
                'hi' => '"I am" का question tag "aren\'t I" है — "amn\'t I" English में नहीं होता। "Isn\'t it?" Indian English है, "aren\'t I" proper है।',
                'mr' => '"I am" चा question tag "aren\'t I" — "amn\'t I" English मध्ये नाही.',
                'te' => '"I am" యొక్క question tag "aren\'t I" — "amn\'t I" English లో లేదు.',
            ],
        ],
        'visual' => 'Three time arrows (past/present/future). Story sequence shows tense switching. Question tag formation table for each tense.',
    ],

    28 => [
        'core_concepts' => [
            'Review of Days 22-27: Past Continuous, Present/Past Perfect, Future, Mixed Tenses',
            'Pronunciation of -s endings (plurals + 3rd person verbs):',
            '/s/ after voiceless: eats, books, cats',
            '/z/ after voiced: plays, dogs, lives',
            '/ɪz/ after sibilants (s, sh, ch, x): watches, churches, boxes',
        ],
        'hook' => 'Raju says "He eats-s" (with extra s). SAAVI: "It\'s \'eats\' — sounds like /eats/ in one go."',
        'examples' => [
            ['en' => 'eats → /s/',          'pron' => 'ईट्स',     'hi' => 'eat + /s/ sound'],
            ['en' => 'plays → /z/',         'pron' => 'प्लेज़',    'hi' => 'play + /z/ sound'],
            ['en' => 'watches → /ɪz/',      'pron' => 'वॉचिज़',    'hi' => 'watch + /ɪz/ extra syllable'],
            ['en' => 'books → /s/',         'pron' => 'बुक्स',    'hi' => 'book + /s/ sound'],
            ['en' => 'churches → /ɪz/',     'pron' => 'चर्चिज़',   'hi' => 'church + /ɪz/ extra syllable'],
        ],
        'mistake' => [
            'wrong' => 'Pronouncing all -s as /s/ regardless.',
            'right' => 'Eats /s/, plays /z/, watches /ɪz/.',
            'saavi' => [
                'hi' => 's के बाद आवाज़ का होश रखो — voiceless (p, t, k) के बाद /s/, voiced (b, d, g, vowels) के बाद /z/, और sibilant (s, sh, ch) के बाद /ɪz/।',
                'mr' => 's च्या आधी कोणता आवाज आहे ते बघा — voiceless नंतर /s/, voiced नंतर /z/, sibilant नंतर /ɪz/.',
                'te' => 's ముందు ఏ sound ఉందో చూడండి — voiceless తరువాత /s/, voiced తరువాత /z/, sibilant తరువాత /ɪz/.',
            ],
        ],
        'visual' => 'Three sound boxes (/s/, /z/, /ɪz/) with mouth/lip diagrams. Verb falls into correct box, sound plays.',
    ],

    29 => [
        'core_concepts' => [
            'Office vocabulary: boss, meeting, report, deadline, computer, printer, email, file, project',
            'Polite work requests: Could you send this email? I need a pen, please. Let me check.',
            'There is/are review for office: There is a meeting at 3 pm. There are files on the desk.',
            'Avoid commands — always use polite forms in office',
        ],
        'hook' => 'Raju\'s first day at office. He needs to ask for help but doesn\'t know how. Chatur says "Give me pen!" SAAVI teaches the polite English way.',
        'examples' => [
            ['en' => 'Could you please send this email?', 'pron' => 'कुड यू प्लीज़ सेंड दिस ईमेल',     'hi' => 'क्या आप यह ईमेल भेज सकते हैं?'],
            ['en' => 'I need the report by 5 pm.',         'pron' => 'आय नीड द रिपोर्ट बाय फाइव पीएम','hi' => 'मुझे रिपोर्ट 5 बजे तक चाहिए'],
            ['en' => 'There is a meeting at 3 pm.',         'pron' => 'देयर इज़ अ मीटिंग एट थ्री पीएम','hi' => 'दोपहर 3 बजे मीटिंग है'],
            ['en' => 'Let me check and get back to you.',  'pron' => 'लेट मी चेक एंड गेट बैक टू यू',  'hi' => 'देख कर बताता हूँ'],
            ['en' => 'My deadline is tomorrow.',            'pron' => 'माय डेडलाइन इज़ टुमॉरो',         'hi' => 'मेरी deadline कल है'],
        ],
        'mistake' => [
            'wrong' => 'Give me pen. / I want pen.',
            'right' => 'Could you give me a pen, please?',
            'saavi' => [
                'hi' => 'Office में हमेशा "Could you please...", "I need...", "Let me check" use करो। "Give me" command sound करता है।',
                'mr' => 'Office मध्ये नेहमी "Could you please...", "I need..." वापरा. "Give me" command वाटते.',
                'te' => 'Office లో ఎల్లప్పుడూ "Could you please...", "I need..." వాడండి. "Give me" command లాగా వినిపిస్తుంది.',
            ],
        ],
        'visual' => 'Office desk scene: computer, calendar, meeting room icon, email envelope. Click on item → polite phrase appears.',
    ],

    30 => [
        'core_concepts' => [
            'Telephone phrases: Hello, may I speak to X? This is Y speaking. Please hold on.',
            'Polite requests on phone: Could you please repeat that? Could you spell that?',
            'Taking messages: Can I take a message? I will call back. Sorry, wrong number.',
            'On phone, say "This is X speaking" — NOT "I am X"',
        ],
        'hook' => 'Raju calls his boss but speaks rudely: "I want to speak to boss!" SAAVI teaches phone etiquette.',
        'examples' => [
            ['en' => 'Hello, may I speak to Mr. Sharma?',  'pron' => 'हेलो, मे आय स्पीक टू मिस्टर शर्मा','hi' => 'हेलो, क्या मैं मिस्टर शर्मा से बात कर सकता हूँ?'],
            ['en' => 'This is Raju speaking.',              'pron' => 'दिस इज़ राजू स्पीकिंग',           'hi' => 'मैं राजू बोल रहा हूँ'],
            ['en' => 'Please hold on.',                     'pron' => 'प्लीज़ होल्ड ऑन',                 'hi' => 'कृपया रुकिए'],
            ['en' => 'Could you please repeat that?',        'pron' => 'कुड यू प्लीज़ रिपीट दैट',          'hi' => 'क्या आप दोहरा सकते हैं?'],
            ['en' => "Sorry, you've got the wrong number.", 'pron' => 'सॉरी, यू हैव गॉट द रॉन्ग नंबर', 'hi' => 'माफ़ कीजिए, ग़लत नंबर है'],
        ],
        'mistake' => [
            'wrong' => 'I am Raju (when answering phone).',
            'right' => 'This is Raju speaking.',
            'saavi' => [
                'hi' => 'Phone पर "I am Raju" नहीं — "This is Raju speaking" बोलो। यह proper phone etiquette है।',
                'mr' => 'Phone वर "I am Raju" नाही — "This is Raju speaking" म्हणा.',
                'te' => 'Phone లో "I am Raju" కాదు — "This is Raju speaking" అనండి.',
            ],
        ],
        'visual' => 'Two phones with speech bubbles. Phone rings, receiver picks up, dialogue appears step by step.',
    ],

    31 => [
        'core_concepts' => [
            'Shopping phrases: How much is this? Can I get a discount? That\'s too expensive. I\'ll take it.',
            'Numbers 100-1000: one hundred, two hundred ... one thousand',
            'Bargaining: Would you take X rupees? Sorry, that\'s the final price.',
            'Use polite tone even when bargaining hard',
        ],
        'hook' => 'Raju goes to buy a shirt. Price 500 rupees. He wants to bargain but doesn\'t know the words. SAAVI teaches the shopping flow.',
        'examples' => [
            ['en' => 'How much is this shirt?',           'pron' => 'हाउ मच इज़ दिस शर्ट',          'hi' => 'यह शर्ट कितने की है?'],
            ['en' => 'Can you give me a discount?',        'pron' => 'कैन यू गिव मी अ डिस्काउंट',     'hi' => 'क्या डिस्काउंट दे सकते हैं?'],
            ['en' => "That's too expensive.",              'pron' => 'दैट्स टू एक्सपेंसिव',           'hi' => 'यह बहुत महँगा है'],
            ['en' => "I'll take it for two hundred.",      'pron' => 'आइल टेक इट फॉर टू हंड्रेड',    'hi' => 'मैं 200 रुपये में लूँगा'],
            ['en' => 'One thousand rupees, please.',        'pron' => 'वन थाउज़न्ड रुपीज़, प्लीज़',     'hi' => '1000 रुपये, कृपया'],
        ],
        'mistake' => [
            'wrong' => 'How much price? Discount karoge?',
            'right' => 'How much is it? Could you give me a discount?',
            'saavi' => [
                'hi' => 'दाम पूछो "How much is it?" से, discount के लिए "Could you give me a discount?" — Hindi mix मत करो।',
                'mr' => 'किंमत विचारा "How much is it?" ने, discount साठी "Could you give me a discount?" — मराठी mix नको.',
                'te' => 'ధర అడగండి "How much is it?" తో, discount కోసం "Could you give me a discount?" — తెలుగు mix చేయకండి.',
            ],
        ],
        'visual' => 'Shop counter with price tags. Number grid 100-1000 lighting up. Price tag changes as bargaining progresses.',
    ],

    32 => [
        'core_concepts' => [
            'Restaurant phrases: Table for two, menu, I would like to order, What do you recommend?',
            'Polite offers: Would you like...? Can I get you...? How about...?',
            'Food vocabulary: vegetarian, non-veg, spicy, sweet, dessert, starter',
            'Asking for the bill: Could I have the bill, please? / Check, please.',
        ],
        'hook' => 'Raju takes family to restaurant. He doesn\'t know how to order. Chatur shouts "Give me biryani!" SAAVI teaches polite ordering.',
        'examples' => [
            ['en' => 'I would like a table for two.',     'pron' => 'आय वुड लाइक अ टेबल फॉर टू',    'hi' => 'मुझे दो लोगों की टेबल चाहिए'],
            ['en' => 'Could I see the menu, please?',     'pron' => 'कुड आय सी द मेन्यू, प्लीज़',    'hi' => 'क्या मेन्यू देख सकता हूँ?'],
            ['en' => 'What do you recommend?',             'pron' => 'व्हाट डू यू रेकमेंड',           'hi' => 'आप क्या सुझाएँगे?'],
            ['en' => 'Would you like some dessert?',       'pron' => 'वुड यू लाइक सम डेज़र्ट',        'hi' => 'क्या आप मिठाई लेंगे?'],
            ['en' => 'Could I have the bill, please?',    'pron' => 'कुड आय हैव द बिल, प्लीज़',     'hi' => 'क्या बिल दे सकते हैं?'],
        ],
        'mistake' => [
            'wrong' => 'Give me water. / Bill do.',
            'right' => 'Could I have some water, please? Could I have the bill?',
            'saavi' => [
                'hi' => 'Restaurant में हमेशा "I would like..." या "Could I have..." use करो। "Give me" command जैसा है।',
                'mr' => 'Restaurant मध्ये नेहमी "I would like..." किंवा "Could I have..." वापरा.',
                'te' => 'Restaurant లో ఎల్లప్పుడూ "I would like..." లేదా "Could I have..." వాడండి.',
            ],
        ],
        'visual' => 'Restaurant table, menu, waiter approaches. Guest orders politely, food appears on plate.',
    ],

    33 => [
        'core_concepts' => [
            'Hospital/Doctor phrases: I have a fever / headache / cough. My stomach hurts. I feel dizzy.',
            'Describing symptoms: She is vomiting. He has a rash. I am allergic to peanuts.',
            'Common Indian error: "I am fever" → correct: "I have a fever"',
            'Exclamations: What a pain! How terrible! Oh no!',
        ],
        'hook' => 'Raju has fever and goes to doctor. He says "I am fever." Doctor corrects "I have a fever." Dadaji sees an injection: "What a big needle!"',
        'examples' => [
            ['en' => 'I have a headache.',           'pron' => 'आय हैव अ हेडेक',         'hi' => 'मुझे सिरदर्द है'],
            ['en' => 'My stomach hurts.',             'pron' => 'माय स्टमक हर्ट्स',       'hi' => 'मेरा पेट दर्द कर रहा है'],
            ['en' => 'I feel dizzy.',                 'pron' => 'आय फील डिज़ी',           'hi' => 'मुझे चक्कर आ रहे हैं'],
            ['en' => 'I am allergic to peanuts.',     'pron' => 'आय एम एलर्जिक टू पीनट्स','hi' => 'मुझे मूँगफली से एलर्जी है'],
            ['en' => 'What a relief!',                'pron' => 'व्हाट अ रिलीफ',          'hi' => 'कितनी राहत है!'],
        ],
        'mistake' => [
            'wrong' => 'I am fever. I am headache.',
            'right' => 'I have a fever. I have a headache.',
            'saavi' => [
                'hi' => 'Symptoms के लिए "have" use करो — "I have a fever", "I have a cough"। "I am fever" गलत है।',
                'mr' => 'Symptoms साठी "have" वापरा — "I have a fever". "I am fever" चूक.',
                'te' => 'Symptoms కోసం "have" వాడండి — "I have a fever". "I am fever" తప్పు.',
            ],
        ],
        'visual' => 'Body diagram with pain points (head, stomach, throat). Click body part → symptom sentence appears. Thermometer rises with fever.',
    ],

    34 => [
        'core_concepts' => [
            'Travel phrases: Where is the bus stop? How far is the station? Please stop here.',
            'Asking fare: How much to go to X?',
            'Telling time advanced: quarter past (सवा), quarter to (पौने), half past (साढ़े)',
            'Numbers for fare: 20 rupees, 50 rupees, 100 rupees',
        ],
        'hook' => 'Raju needs to go to station. He stops an auto: "How much to station?" Driver says "100 rupees." Raju learns to bargain politely.',
        'examples' => [
            ['en' => 'Where is the bus stop?',         'pron' => 'व्हेयर इज़ द बस स्टॉप',        'hi' => 'बस स्टॉप कहाँ है?'],
            ['en' => 'How far is the station?',         'pron' => 'हाउ फार इज़ द स्टेशन',         'hi' => 'स्टेशन कितनी दूर है?'],
            ['en' => 'Please stop here.',               'pron' => 'प्लीज़ स्टॉप हियर',             'hi' => 'कृपया यहाँ रोकें'],
            ['en' => 'The bus leaves at quarter to eight.','pron' => 'द बस लीव्स एट क्वार्टर टू एट','hi' => 'बस सवा आठ बजे जाती है (?: पौने आठ बजे)'],
            ['en' => 'It\'s half past three.',          'pron' => 'इट्स हाफ पास्ट थ्री',           'hi' => 'साढ़े तीन बज रहे हैं'],
        ],
        'mistake' => [
            'wrong' => 'Station how far? / Stop here, driver!',
            'right' => 'How far is the station? Please stop here.',
            'saavi' => [
                'hi' => 'Question में helping verb आता है पहले — "How far IS the station?"। "Please" से respect दिखता है।',
                'mr' => 'प्रश्नात helping verb आधी येते — "How far IS the station?"',
                'te' => 'Question లో helping verb ముందుగా వస్తుంది — "How far IS the station?"',
            ],
        ],
        'visual' => 'City map with bus stop, station, auto-rickshaw. Clock with hands at quarter-past/quarter-to positions.',
    ],

    35 => [
        'core_concepts' => [
            'Real-life flow: market → auto → doctor → restaurant — multiple scenes in one conversation',
            'Linking words to switch scenes: then, after that, later, finally',
            'Review polite forms, question tags, exclamations',
            'Practice handling pressure — keep using learned patterns even when nervous',
        ],
        'hook' => 'Raju has a busy day — vegetables, doctor, auto, restaurant. SAAVI helps him connect all scenes smoothly using linking words.',
        'examples' => [
            ['en' => 'How much are these tomatoes?',   'pron' => 'हाउ मच आर दीज़ टोमेटोज़',     'hi' => 'ये टमाटर कितने के हैं?'],
            ['en' => 'Please take me to City Hospital.','pron' => 'प्लीज़ टेक मी टू सिटी हॉस्पिटल','hi' => 'कृपया मुझे City Hospital ले चलिए'],
            ['en' => 'I have a headache and fever.',     'pron' => 'आय हैव अ हेडेक एंड फीवर',     'hi' => 'मुझे सिरदर्द और बुख़ार है'],
            ['en' => 'I would like a glass of water.',   'pron' => 'आय वुड लाइक अ ग्लास ऑफ वॉटर','hi' => 'मुझे एक गिलास पानी चाहिए'],
            ['en' => 'After that, I went home.',         'pron' => 'आफ्टर दैट, आय वेंट होम',       'hi' => 'उसके बाद मैं घर गया'],
        ],
        'mistake' => [
            'wrong' => 'Mixing tenses and dropping politeness when in pressure.',
            'right' => 'Take a breath, use the patterns: "Could I...", "I would like...", "How much...?"',
            'saavi' => [
                'hi' => 'Pressure में patterns याद रखो — एक scene से दूसरे में "Then", "After that", "Later" से जोड़ो।',
                'mr' => 'Pressure मध्ये patterns लक्षात ठेवा — एका scene मधून दुसऱ्यात "Then", "After that" ने जोडा.',
                'te' => 'Pressure లో patterns గుర్తుంచుకోండి — ఒక scene నుండి మరొక దానికి "Then", "After that" తో కలపండి.',
            ],
        ],
        'visual' => 'City map with 4 locations connected by arrows. Each location popup shows key phrases. User clicks → speaks line → moves to next.',
    ],

    36 => [
        'core_concepts' => [
            'Prepositions of place: in (inside), on (surface), at (specific point), to (direction), from (origin)',
            'Prepositions of time: in (month/year), on (day/date), at (clock time), from...to (duration)',
            'Common phrases: in Delhi, on Monday, at 5 pm, from here to there',
            '"in" for big places (cities, countries), "at" for specific points (addresses, stops)',
        ],
        'hook' => 'Chatur says "I live at Delhi." Rancho asks "At Delhi or in Delhi?" SAAVI explains the difference.',
        'examples' => [
            ['en' => 'I live in Delhi.',                'pron' => 'आय लिव इन दिल्ली',           'hi' => 'मैं दिल्ली में रहता हूँ (बड़ा स्थान)'],
            ['en' => 'The book is on the table.',        'pron' => 'द बुक इज़ ऑन द टेबल',         'hi' => 'किताब मेज़ पर है (सतह)'],
            ['en' => "Let's meet at the station.",      'pron' => 'लेट्स मीट एट द स्टेशन',         'hi' => 'स्टेशन पर मिलते हैं (विशिष्ट बिंदु)'],
            ['en' => 'I go to office from home every day.','pron' => 'आय गो टू ऑफिस फ्रॉम होम',  'hi' => 'मैं घर से ऑफिस जाता हूँ'],
            ['en' => 'School starts at 8 am on Monday.', 'pron' => 'स्कूल स्टार्ट्स एट 8 ऑन मंडे','hi' => 'स्कूल सोमवार को 8 बजे शुरू होता है'],
        ],
        'mistake' => [
            'wrong' => 'I live at Delhi.',
            'right' => 'I live in Delhi.',
            'saavi' => [
                'hi' => '"In" बड़े स्थानों के लिए (cities, countries — in Delhi, in India)। "At" specific addresses के लिए (at the station, at 123 Main Street)।',
                'mr' => '"In" मोठ्या ठिकाणांसाठी, "at" विशिष्ट addresses साठी.',
                'te' => '"In" పెద్ద ప్రదేశాలకు, "at" నిర్దిష్ట addresses కు.',
            ],
        ],
        'visual' => 'Box with object inside (in), flat line with object on top (on), pin on map (at), arrow pointing direction (to), starting point (from).',
    ],

    37 => [
        'core_concepts' => [
            'And (add): I like tea and coffee.',
            'But (contrast): He is rich but unhappy.',
            'Because (reason): I stayed home because it was raining.',
            'So (result): It was raining, so I stayed home.',
            'Or (choice): Would you like tea or coffee?',
        ],
        'hook' => 'Raju says "I like tea I like coffee." SAAVI: "Use \'and\'." Chatur says "I am tired I will sleep." SAAVI: "I am tired, so I will sleep."',
        'examples' => [
            ['en' => 'I like apples and oranges.',         'pron' => 'आय लाइक एप्पल्स एंड ऑरेंजेज़', 'hi' => 'मुझे सेब और संतरे पसंद हैं'],
            ['en' => 'She is small but strong.',           'pron' => 'शी इज़ स्मॉल बट स्ट्रॉन्ग',     'hi' => 'वह छोटी है लेकिन मज़बूत है'],
            ['en' => 'He passed because he worked hard.',  'pron' => 'ही पास्ड बिकॉज़ ही वर्क्ड हार्ड','hi' => 'वह पास हुआ क्योंकि उसने मेहनत की'],
            ['en' => 'I was hungry, so I ate.',            'pron' => 'आय वॉज़ हंगरी, सो आय एट',      'hi' => 'मुझे भूख लगी थी, इसलिए मैंने खाया'],
            ['en' => 'Tea or coffee?',                     'pron' => 'टी ऑर कॉफी',                  'hi' => 'चाय या कॉफी?'],
        ],
        'mistake' => [
            'wrong' => 'Because I was tired, so I slept.',
            'right' => 'Because I was tired, I slept. (OR) I was tired, so I slept.',
            'saavi' => [
                'hi' => '"Because" और "so" साथ में नहीं use करते — एक sentence में सिर्फ़ एक conjunction।',
                'mr' => '"Because" आणि "so" एकत्र वापरत नाही — एका sentence मध्ये एकच conjunction.',
                'te' => '"Because" మరియు "so" కలిపి వాడరు — ఒక sentence లో ఒకే conjunction.',
            ],
        ],
        'visual' => 'Puzzle pieces joining sentences. Color-coded connectors: and (green), but (red), because (blue), so (orange), or (purple).',
    ],

    38 => [
        'core_concepts' => [
            'Comparative adjectives: -er than (taller than), more/less than (more beautiful than)',
            'Irregular comparisons: good→better, bad→worse, far→farther/further',
            'Equality: as...as (as tall as)',
            'Never use double comparative: "more better" is wrong — just "better"',
        ],
        'hook' => 'Raju says "I am good than Chatur." SAAVI: "I am better than Chatur." Chatur: "My English is more better." SAAVI: "No double comparative — just \'better\'."',
        'examples' => [
            ['en' => 'Raju is taller than Chatur.',       'pron' => 'राजू इज़ टॉलर दैन चतुर',         'hi' => 'राजू चतुर से लम्बा है'],
            ['en' => 'This phone is cheaper than that one.','pron' => 'दिस फोन इज़ चीपर दैन दैट वन', 'hi' => 'यह फोन उससे सस्ता है'],
            ['en' => 'Her English is better than mine.',   'pron' => 'हर इंग्लिश इज़ बेटर दैन माइन',   'hi' => 'उसकी अंग्रेज़ी मुझसे बेहतर है'],
            ['en' => 'This is less expensive.',            'pron' => 'दिस इज़ लेस एक्सपेंसिव',          'hi' => 'यह कम महँगा है'],
            ['en' => 'He is as tall as his brother.',       'pron' => 'ही इज़ एज़ टॉल एज़ हिज़ ब्रदर',    'hi' => 'वह अपने भाई जितना लम्बा है'],
        ],
        'mistake' => [
            'wrong' => 'My English is more better.',
            'right' => 'My English is better.',
            'saavi' => [
                'hi' => '"Better" का मतलब ही "अधिक अच्छा" है — "more better" double comparative है, गलत।',
                'mr' => '"Better" चा अर्थ "अधिक चांगला" — "more better" double comparative, चूक.',
                'te' => '"Better" అంటే "ఎక్కువ మంచి" — "more better" double comparative, తప్పు.',
            ],
        ],
        'visual' => 'Two objects side by side, scale tipping. Highlight "-er" or "more" in red.',
    ],

    39 => [
        'core_concepts' => [
            'All Wh-question words: What (thing), Where (place), When (time), Why (reason), How (manner/degree)',
            'Which (choice), Who (person), Whose (possession)',
            'Word order: Wh-word + helping verb + subject + main verb?',
            'Common questions for daily life',
        ],
        'hook' => 'Rancho asks "What you are doing?" SAAVI corrects "What are you doing?" — helping verb comes before subject in questions.',
        'examples' => [
            ['en' => 'What is your name?',            'pron' => 'व्हाट इज़ योर नेम',          'hi' => 'आपका नाम क्या है?'],
            ['en' => 'Where do you live?',             'pron' => 'व्हेयर डू यू लिव',           'hi' => 'आप कहाँ रहते हैं?'],
            ['en' => 'Why are you sad?',               'pron' => 'व्हाय आर यू सैड',           'hi' => 'आप दुःखी क्यों हैं?'],
            ['en' => 'How much is this?',              'pron' => 'हाउ मच इज़ दिस',            'hi' => 'यह कितने का है?'],
            ['en' => 'Whose book is this?',            'pron' => 'हूज़ बुक इज़ दिस',           'hi' => 'यह किसकी किताब है?'],
        ],
        'mistake' => [
            'wrong' => 'What you are doing? Where he lives?',
            'right' => 'What are you doing? Where does he live?',
            'saavi' => [
                'hi' => 'Wh-word के बाद helping verb subject से पहले आता है। "What ARE you doing?" — "are" subject "you" से पहले।',
                'mr' => 'Wh-word नंतर helping verb subject च्या आधी येते.',
                'te' => 'Wh-word తరువాత helping verb subject ముందు వస్తుంది.',
            ],
        ],
        'visual' => 'Question word wheel — spin to land on a Wh-word, full sentence forms with correct word order.',
    ],

    40 => [
        'core_concepts' => [
            'Yes/No questions: start with helping verb (Do you...? Are you...? Have you...? Will you...?)',
            'Short answers: Yes, subject + helping verb / No, subject + helping verb + not',
            'Always repeat the helping verb in short answers',
            'Practice with all tenses and modals',
        ],
        'hook' => 'Chatur asks "You like tea?" SAAVI corrects "Do you like tea?" Raju answers "Yes, I like." SAAVI: "Say \'Yes, I do.\' — repeat the helping verb."',
        'examples' => [
            ['en' => "Do you speak English? Yes, I do.",     'pron' => 'डू यू स्पीक इंग्लिश? यस, आय डू',  'hi' => 'क्या तुम अंग्रेज़ी बोलते हो? हाँ'],
            ['en' => "Are you coming? Yes, I am.",            'pron' => 'आर यू कमिंग? यस, आय एम',          'hi' => 'क्या तुम आ रहे हो? हाँ'],
            ['en' => "Have you eaten? No, I haven't.",         'pron' => 'हैव यू ईटन? नो, आय हैवंट',         'hi' => 'क्या तुमने खाया? नहीं'],
            ['en' => "Can you help me? Yes, I can.",           'pron' => 'कैन यू हेल्प मी? यस, आय कैन',     'hi' => 'क्या मेरी मदद कर सकते हो? हाँ'],
            ['en' => "Will you come? No, I won't.",            'pron' => 'विल यू कम? नो, आय वोंट',           'hi' => 'क्या तुम आओगे? नहीं'],
        ],
        'mistake' => [
            'wrong' => 'Yes, I like. / No, I not coming.',
            'right' => 'Yes, I do. / No, I am not coming. (or No, I\'m not.)',
            'saavi' => [
                'hi' => 'Short answers में helping verb दोहराओ — "Do you like tea?" → "Yes, I do." (not "Yes, I like")।',
                'mr' => 'Short answers मध्ये helping verb पुन्हा द्या.',
                'te' => 'Short answers లో helping verb మళ్ళీ చెప్పండి.',
            ],
        ],
        'visual' => 'Toggle switch: Yes / No. Two columns: Question (with helping verb highlighted), Short Answer (with same verb).',
    ],

    41 => [
        'core_concepts' => [
            'Zero conditional (general truths): If + present, present (If you heat ice, it melts)',
            'First conditional (real possibility): If + present, will + verb (If it rains, I will stay home)',
            'Second conditional (unreal/imaginary): If + past, would + verb (If I had money, I would buy a car)',
            'Never use "will" after "if" in conditional',
        ],
        'hook' => 'Raju says "If it will rain, I will stay." SAAVI corrects: "If it RAINS, I will stay" — no \'will\' after if.',
        'examples' => [
            ['en' => 'If you heat water, it boils.',        'pron' => 'इफ यू हीट वॉटर, इट बॉयल्स',     'hi' => 'पानी गरम करने पर वह उबलता है'],
            ['en' => 'If it rains tomorrow, we will cancel.','pron' => 'इफ इट रेन्स टुमॉरो, वी विल कैंसल','hi' => 'अगर कल बारिश होगी, हम cancel कर देंगे'],
            ['en' => 'If I were rich, I would buy a house.','pron' => 'इफ आय वर रिच, आय वुड बाय अ हाउस','hi' => 'अगर मैं अमीर होता, घर ख़रीदता'],
            ['en' => 'If you study, you will pass.',         'pron' => 'इफ यू स्टडी, यू विल पास',         'hi' => 'अगर तुम पढ़ोगे, तुम पास हो जाओगे'],
            ['en' => "If she comes, I'll be happy.",         'pron' => 'इफ शी कम्स, आइल बी हैप्पी',        'hi' => 'अगर वह आए, मैं ख़ुश हो जाऊँगा'],
        ],
        'mistake' => [
            'wrong' => 'If it will rain, I will stay home.',
            'right' => 'If it rains, I will stay home.',
            'saavi' => [
                'hi' => 'If-clause में हमेशा present tense — "If it rains" (नहीं "If it will rain")। Result में will आता है।',
                'mr' => 'If-clause मध्ये नेहमी present tense — "If it rains".',
                'te' => 'If-clause లో ఎల్లప్పుడూ present tense — "If it rains".',
            ],
        ],
        'visual' => 'Two doors: condition door (if) opens first → result door (then) opens. Animation shows cause and effect.',
    ],

    42 => [
        'core_concepts' => [
            'Making plans: suggesting, accepting, declining, rescheduling',
            'Suggestions: How about...? Why don\'t we...? Let\'s...',
            'Accepting: Sounds great. I\'d love to. Sure.',
            'Declining politely: Sorry, I\'m busy. I\'d love to but...',
        ],
        'hook' => 'Raju and Farhaan plan a picnic. SAAVI helps them use polite plan-making phrases.',
        'examples' => [
            ['en' => 'What are you doing this weekend?',  'pron' => 'व्हाट आर यू डूइंग दिस वीकेंड',  'hi' => 'इस वीकेंड क्या कर रहे हो?'],
            ['en' => 'How about going to the cinema?',     'pron' => 'हाउ अबाउट गोइंग टू द सिनेमा',  'hi' => 'सिनेमा चलें?'],
            ['en' => "I'd love to, but I have to work.",   'pron' => 'आइड लव टू, बट आय हैव टू वर्क','hi' => 'जाना चाहता हूँ, पर काम है'],
            ['en' => "If you're free on Monday, let's meet.",'pron' => 'इफ यूर फ्री ऑन मंडे, लेट्स मीट','hi' => 'अगर सोमवार को फ्री हो, मिलते हैं'],
            ['en' => "Let's plan for next Sunday.",         'pron' => 'लेट्स प्लान फॉर नेक्स्ट संडे',  'hi' => 'अगले रविवार के लिए plan करते हैं'],
        ],
        'mistake' => [
            'wrong' => 'No. (just one word refusal)',
            'right' => "Sorry, I'm busy on Sunday. How about next weekend?",
            'saavi' => [
                'hi' => 'Plan को decline करते वक्त सिर्फ़ "No" मत बोलो — reason दो और alternative suggest करो। यह polite है।',
                'mr' => 'Plan नाकारताना फक्त "No" नको — reason द्या आणि alternative suggest करा.',
                'te' => 'Plan తిరస్కరించేటప్పుడు కేవలం "No" కాదు — reason చెప్పి alternative సూచించండి.',
            ],
        ],
        'visual' => 'Chat bubbles. Flowchart: suggest → accept/decline → if decline, suggest alternative.',
    ],

    43 => [
        'core_concepts' => [
            'Complaints: This is not working. I have a problem. There is an issue.',
            'Asking for help: Can you help me? Could you please fix this?',
            'Offering solutions: Let me check. I will send someone. Try restarting.',
            'Polite even when frustrated — keeps things professional',
        ],
        'hook' => 'Raju\'s phone stops working. He goes to repair shop. Chatur says "Phone no working!" SAAVI teaches polite complaint.',
        'examples' => [
            ['en' => 'This phone is not working.',          'pron' => 'दिस फोन इज़ नॉट वर्किंग',     'hi' => 'यह फोन काम नहीं कर रहा'],
            ['en' => 'I have a complaint.',                  'pron' => 'आय हैव अ कम्प्लेंट',           'hi' => 'मेरी एक शिकायत है'],
            ['en' => 'Can you help me solve this problem?',  'pron' => 'कैन यू हेल्प मी सॉल्व दिस',   'hi' => 'क्या मेरी इस समस्या को हल करने में मदद कर सकते हैं?'],
            ['en' => 'Please send someone to fix the AC.',   'pron' => 'प्लीज़ सेंड समवन टू फिक्स द एसी','hi' => 'AC ठीक करने के लिए किसी को भेजिए'],
            ['en' => 'Let me check and get back to you.',    'pron' => 'लेट मी चेक एंड गेट बैक टू यू',  'hi' => 'देख कर बताता हूँ'],
        ],
        'mistake' => [
            'wrong' => 'Why it not working? / Phone is dead, do something!',
            'right' => "Why isn't it working? Could you please fix this phone?",
            'saavi' => [
                'hi' => 'Complaint में भी polite रहो — "Could you please...", "Can you help me..."। Frustration दिखाओ नहीं, request करो।',
                'mr' => 'Complaint मध्येही polite राहा — frustration दाखवू नका, request करा.',
                'te' => 'Complaint లోనూ polite గా ఉండండి — frustration చూపించకుండా request చేయండి.',
            ],
        ],
        'visual' => 'Broken object with exclamation mark. Repair person icon walks in. Complaint bubble with polite phrasing.',
    ],

    44 => [
        'core_concepts' => [
            'Inviting: Would you like to come? Let\'s go to... How about joining us?',
            'Accepting: I\'d love to. Sure, sounds great.',
            'Declining: Sorry, I can\'t. I\'d love to but...',
            'Always add reason or suggest alternative when declining',
        ],
        'hook' => 'SAAVI invites Raju to a party. He doesn\'t know how to politely accept or decline.',
        'examples' => [
            ['en' => 'Would you like to come to my party?', 'pron' => 'वुड यू लाइक टू कम टू माय पार्टी','hi' => 'क्या आप मेरी पार्टी में आएँगे?'],
            ['en' => "I'd love to.",                        'pron' => 'आइड लव टू',                       'hi' => 'बहुत ख़ुशी होगी'],
            ['en' => "Sorry, I'm busy on Saturday.",         'pron' => 'सॉरी, आइम बिज़ी ऑन सैटरडे',       'hi' => 'माफ़ करना, शनिवार को व्यस्त हूँ'],
            ['en' => 'How about next Sunday?',                'pron' => 'हाउ अबाउट नेक्स्ट संडे',           'hi' => 'अगले रविवार कैसा रहेगा?'],
            ['en' => "Sounds great, let's do it.",            'pron' => 'साउंड्स ग्रेट, लेट्स डू इट',       'hi' => 'अच्छा लगता है, करते हैं'],
        ],
        'mistake' => [
            'wrong' => 'No, can\'t come. (cold refusal)',
            'right' => "Sorry, I can't make it on Saturday. Could we meet next weekend?",
            'saavi' => [
                'hi' => 'Invitation को decline करते वक्त हमेशा reason दो और alternative suggest करो — relationship बना रहता है।',
                'mr' => 'Invitation नाकारताना नेहमी reason द्या आणि alternative द्या.',
                'te' => 'Invitation తిరస్కరించేటప్పుడు ఎల్లప్పుడూ reason చెప్పి alternative సూచించండి.',
            ],
        ],
        'visual' => 'Invitation card with RSVP options. Click accept → polite acceptance. Click decline → polite decline + alternative suggestion.',
    ],

    45 => [
        'core_concepts' => [
            'Small talk topics: weather, weekend plans, family, hobbies, sports',
            'Combining exclamations (What a...! How...!) and question tags (isn\'t it? aren\'t they?)',
            'Follow-up questions to keep conversation flowing',
            'Avoid one-word answers (Yes/No) — add a sentence',
        ],
        'hook' => 'Dadaji says "Nice weather, isn\'t it?" Raju says "Yes." SAAVI teaches how to keep talking.',
        'examples' => [
            ['en' => "Beautiful day, isn't it?",         'pron' => 'ब्यूटिफुल डे, इज़ंट इट',         'hi' => 'सुंदर दिन है, है ना?'],
            ['en' => 'What a lovely evening!',            'pron' => 'व्हाट अ लवली ईवनिंग',          'hi' => 'कितनी सुंदर शाम है!'],
            ['en' => 'How was your weekend?',             'pron' => 'हाउ वॉज़ योर वीकेंड',           'hi' => 'आपका वीकेंड कैसा रहा?'],
            ['en' => "I love cricket, don't you?",        'pron' => 'आय लव क्रिकेट, डोंट यू',        'hi' => 'मुझे क्रिकेट पसंद है, तुम्हें नहीं?'],
            ['en' => 'It was great. We went to the beach.','pron' => 'इट वॉज़ ग्रेट. वी वेंट टू द बीच','hi' => 'अच्छा रहा। हम beach गए थे'],
        ],
        'mistake' => [
            'wrong' => 'Yes. / No. (one-word answers)',
            'right' => 'Yes, I love it because... / No, but I prefer...',
            'saavi' => [
                'hi' => 'Small talk में Yes/No के बाद एक sentence और जोड़ो — "Yes, because...", "No, but..."। तभी conversation चलता है।',
                'mr' => 'Small talk मध्ये Yes/No नंतर एक sentence जोडा.',
                'te' => 'Small talk లో Yes/No తరువాత ఒక sentence జతచేయండి.',
            ],
        ],
        'visual' => 'Weather icons, weekend calendar, speech bubbles with question tags. Bus stop scene with two characters chatting.',
    ],

    46 => [
        'core_concepts' => [
            'Common interview questions: Tell me about yourself / Why do you want this job? / Strengths/weaknesses',
            'Answer structure: present (current role) → past (experience) → future (goals)',
            'Politeness: Thank you for this opportunity. I believe I am a good fit.',
            'Avoid memorized robotic answers — be natural',
        ],
        'hook' => 'Raju goes for an interview. He says "Myself Raju. I want job." SAAVI teaches a proper structured answer.',
        'examples' => [
            ['en' => 'Tell me about yourself.',                 'pron' => 'टेल मी अबाउट यॉरसेल्फ',         'hi' => 'अपने बारे में बताइए'],
            ['en' => 'I have two years of experience in sales.','pron' => 'आय हैव टू ईयर्स ऑफ एक्सपीरियंस','hi' => 'मुझे sales में 2 साल का अनुभव है'],
            ['en' => 'My strength is hard work.',                'pron' => 'माय स्ट्रेंथ इज़ हार्ड वर्क',     'hi' => 'मेरी ताक़त मेहनत है'],
            ['en' => 'I want to grow in this field.',            'pron' => 'आय वांट टू ग्रो इन दिस फील्ड',   'hi' => 'मैं इस क्षेत्र में आगे बढ़ना चाहता हूँ'],
            ['en' => 'Thank you for this opportunity.',          'pron' => 'थैंक यू फॉर दिस अपॉर्चुनिटी',     'hi' => 'इस अवसर के लिए धन्यवाद'],
        ],
        'mistake' => [
            'wrong' => 'Myself Raju. I want job because need money.',
            'right' => 'My name is Raju. I am interested in this role because I have relevant experience.',
            'saavi' => [
                'hi' => 'Interview में natural और structured रहो — "My name is...", "I have ... experience"। Memorize करके मत बोलो।',
                'mr' => 'Interview मध्ये natural आणि structured रहा — पाठ करून बोलू नका.',
                'te' => 'Interview లో natural గా, structured గా ఉండండి — memorize చేసి చెప్పకండి.',
            ],
        ],
        'visual' => 'Interview table — candidate and interviewer. Question-answer bubbles with structured answer flowing.',
    ],

    47 => [
        'core_concepts' => [
            'Giving opinion: I think..., I believe..., In my opinion..., From my point of view...',
            'Agreeing: I agree. That\'s right. Exactly. You\'re right.',
            'Partially agreeing: I see your point, but..., That\'s true, however...',
            'Disagreeing politely: I disagree. I\'m not sure about that. I see it differently.',
        ],
        'hook' => 'Chatur says "Cricket is the only good sport." Rancho disagrees but doesn\'t know how to say politely. SAAVI teaches.',
        'examples' => [
            ['en' => 'I think learning English is important.','pron' => 'आय थिंक लर्निंग इंग्लिश इज़ इम्पॉर्टेंट','hi' => 'मुझे लगता है अंग्रेज़ी सीखना ज़रूरी है'],
            ['en' => 'I agree with you.',                       'pron' => 'आय एग्री विद यू',                 'hi' => 'मैं आपसे सहमत हूँ'],
            ['en' => "I'm sorry, I disagree.",                  'pron' => 'आइम सॉरी, आय डिसएग्री',           'hi' => 'माफ़ करना, मैं असहमत हूँ'],
            ['en' => 'I see your point, but...',                'pron' => 'आय सी योर पॉइंट, बट',             'hi' => 'मैं आपकी बात समझता हूँ, लेकिन...'],
            ['en' => "What's your opinion on this?",             'pron' => 'व्हाट्स योर ओपिनियन ऑन दिस',     'hi' => 'इस पर आपकी क्या राय है?'],
        ],
        'mistake' => [
            'wrong' => 'I am agree. I am not agree.',
            'right' => 'I agree. I disagree. (or I don\'t agree.)',
            'saavi' => [
                'hi' => '"Agree" verb है, उसके आगे "am" नहीं लगता। "I agree" सही, "I am agree" गलत।',
                'mr' => '"Agree" हा verb आहे — "I agree", "I am agree" चूक.',
                'te' => '"Agree" అనేది verb — "I agree", "I am agree" తప్పు.',
            ],
        ],
        'visual' => 'Opinion meter (agree ←→ disagree). Speech bubbles for each level of agreement/disagreement.',
    ],

    48 => [
        'core_concepts' => [
            'Rising intonation for yes/no questions: "Are you coming?" (voice goes up at end)',
            'Falling intonation for statements and wh-questions: "I am coming." "What is your name?" (voice falls)',
            'Polite requests usually rise to sound nicer',
            'Flat tone (no rise/fall) sounds angry or robotic in English',
        ],
        'hook' => 'Chatur says "You are coming?" with flat tone. SAAVI shows how rising tone shows a question. Dadaji repeats "Thank you" with falling tone.',
        'examples' => [
            ['en' => 'You are coming? ↗',           'pron' => 'यू आर कमिंग (rise)',          'hi' => 'voice rises at end (question)'],
            ['en' => 'Where do you live? ↘',         'pron' => 'व्हेयर डू यू लिव (fall)',     'hi' => 'voice falls at end (Wh-question)'],
            ['en' => 'Could you help me? ↗',         'pron' => 'कुड यू हेल्प मी (rise)',      'hi' => 'rising = polite request'],
            ['en' => "That's fantastic! ↘",          'pron' => 'दैट्स फैंटास्टिक (fall)',      'hi' => 'falling = excitement/emphasis'],
            ['en' => 'Good morning. ↘',              'pron' => 'गुड मॉर्निंग (fall)',          'hi' => 'falling = statement'],
        ],
        'mistake' => [
            'wrong' => 'Flat tone for all sentences (sounds angry).',
            'right' => 'Questions go up ↗, statements go down ↘.',
            'saavi' => [
                'hi' => 'English बोलते वक्त pitch up-down करो — questions ↗, statements ↘। Flat tone में बोलोगे तो angry sound करेगा।',
                'mr' => 'English बोलताना pitch up-down करा — questions ↗, statements ↘.',
                'te' => 'English మాట్లాడేటప్పుడు pitch up-down చేయండి — questions ↗, statements ↘.',
            ],
        ],
        'visual' => 'Waveform diagram — rising line for questions, falling line for statements. Up arrow / down arrow markers.',
    ],

    49 => [
        'core_concepts' => [
            'Integrate all 48 days: self-intro, greetings, family, office, market, auto, hospital, restaurant',
            'Fluid scene-switching using connectors: first, then, after that, later, finally',
            'Use all politeness levels, tenses, conditionals, question tags appropriately',
            'Confidence + correctness over fluency — SAAVI says it\'s OK to pause and think',
        ],
        'hook' => 'Raju\'s full day simulation: home (family) → office → auto → market → hospital → restaurant → phone → interview → small talk. One conversation flow.',
        'examples' => [
            ['en' => 'My mother is making tea. I have to go to office.',  'pron' => 'माय मदर इज़ मेकिंग टी. आय हैव टू गो',     'hi' => 'मेरी माँ चाय बना रही हैं। मुझे ऑफिस जाना है'],
            ['en' => 'Could you please send this email?',                  'pron' => 'कुड यू प्लीज़ सेंड दिस ईमेल',              'hi' => 'क्या आप यह ईमेल भेज सकते हैं?'],
            ['en' => 'Please take me to City Hospital.',                    'pron' => 'प्लीज़ टेक मी टू सिटी हॉस्पिटल',           'hi' => 'कृपया मुझे City Hospital ले चलिए'],
            ['en' => 'I would like a glass of water. The food is delicious.','pron' => 'आय वुड लाइक अ ग्लास ऑफ वॉटर',           'hi' => 'मुझे एक गिलास पानी चाहिए। खाना स्वादिष्ट है'],
            ['en' => "What a beautiful evening! You like cricket, don't you?", 'pron' => 'व्हाट अ ब्यूटिफुल ईवनिंग',            'hi' => 'कितनी सुंदर शाम है! तुम्हें क्रिकेट पसंद है ना?'],
        ],
        'mistake' => [
            'wrong' => 'Forgetting transitions between scenes; mixing tenses under pressure.',
            'right' => 'Use "After that...", "Then...", "Later..." to connect. Pause and pick the right tense.',
            'saavi' => [
                'hi' => 'Final practice में slow रहो — "First...", "Then...", "After that..." use करो। Pressure में patterns याद आ जाएँगे।',
                'mr' => 'Final practice मध्ये slow राहा — "First...", "Then...", "After that..." वापरा.',
                'te' => 'Final practice లో slow గా ఉండండి — "First...", "Then...", "After that..." వాడండి.',
            ],
        ],
        'visual' => 'Complete journey map with 5+ locations connected. User clicks → speaks line → moves to next location. Certificate appears at end.',
    ],

    50 => [
        'core_concepts' => [
            'You\'ve completed 50 days of Spoken English with SAAVI!',
            'Skills mastered: greetings, tenses (12 forms), polite requests, scenario English',
            'Real-life confidence: office, market, hospital, restaurant, phone, interview, small talk',
            'Next step: practice daily on Shrutam app with audio + animations',
        ],
        'hook' => 'Day 50 — Graduation Day! SAAVI, Raju, Farhaan, Rancho, Chatur, and Dadaji come together to celebrate. You\'ve made it.',
        'examples' => [
            ['en' => "I've completed the 50-Day English Challenge!", 'pron' => 'आइव कम्प्लीटिड द फिफ्टी डे चैलेंज',  'hi' => 'मैंने 50-Day English Challenge पूरा कर लिया!'],
            ['en' => 'Thank you, SAAVI, for this journey.',           'pron' => 'थैंक यू, साँवी, फॉर दिस जर्नी',      'hi' => 'धन्यवाद, साँवी, इस सफर के लिए'],
            ['en' => 'I can speak English with confidence now.',       'pron' => 'आय कैन स्पीक इंग्लिश विद कॉन्फिडेंस','hi' => 'अब मैं आत्मविश्वास से अंग्रेज़ी बोल सकता हूँ'],
            ['en' => 'I will keep practicing every day.',              'pron' => 'आय विल कीप प्रैक्टिसिंग एवरी डे',     'hi' => 'मैं रोज़ practice करता रहूँगा'],
            ['en' => "Let's celebrate — we did it!",                    'pron' => 'लेट्स सेलिब्रेट — वी डिड इट',         'hi' => 'चलो जश्न मनाएँ — हमने कर दिखाया!'],
        ],
        'mistake' => [
            'wrong' => 'Stopping practice after Day 50.',
            'right' => 'Keep practicing daily — confidence comes from consistency.',
            'saavi' => [
                'hi' => 'Day 50 ख़त्म नहीं, शुरुआत है। रोज़ 10 मिनट practice करो — Shrutam app पर audio लेसन के साथ।',
                'mr' => 'Day 50 शेवट नाही, सुरुवात आहे. रोज 10 मिनिटे practice करा.',
                'te' => 'Day 50 ముగింపు కాదు, ప్రారంభం. రోజూ 10 నిమిషాలు practice చేయండి.',
            ],
        ],
        'visual' => 'Graduation ceremony — characters celebrating with confetti. Certificate animation. Trophy with "50-Day English Challenge — Complete!" text.',
    ],
];
