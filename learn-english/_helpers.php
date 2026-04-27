<?php
/**
 * Helpers for the Spoken English course pages.
 * Single source of truth lives in seo-meta.php.
 *
 * Usage in a course page:
 *   require __DIR__ . '/../../_helpers.php';
 *   $seo = learn_english_seo(13, 'hi');   // Day 13, Hindi
 *   $title       = $seo['title'];
 *   $description = $seo['description'];
 *   $canonical   = $seo['canonical'];
 *   include __DIR__ . '/../../../partials/head.php';
 */

/**
 * Returns SEO meta for a given course day and language.
 *
 * @param int    $day   1-50
 * @param string $lang  hi | mr | te
 * @return array{title:string,description:string,canonical:string,topic:string,topic_en:string,slug:string,old_slug:?string,lang:string}
 */
function learn_english_seo(int $day, string $lang): array
{
    static $data = null;
    if ($data === null) {
        $data = require __DIR__ . '/seo-meta.php';
    }

    if (!isset($data[$day])) {
        throw new InvalidArgumentException("Unknown course day: $day");
    }
    if (!in_array($lang, ['hi', 'mr', 'te'], true)) {
        throw new InvalidArgumentException("Unknown language: $lang");
    }

    $entry = $data[$day];
    $langData = $entry[$lang];

    $langDir = ['hi' => 'hindi', 'mr' => 'marathi', 'te' => 'telugu'][$lang];

    return [
        'title'       => $langData['title'],
        'description' => $langData['description'],
        'topic'       => $langData['topic'],
        'topic_en'    => $entry['topic_en'],
        'slug'        => $entry['slug'],
        'old_slug'    => $entry['old_slug'],
        'lang'        => $lang,
        'canonical'   => "https://shrutam.ai/learn-english/{$langDir}/{$entry['slug']}/",
    ];
}

/**
 * SEO + UI strings for the per-language landing pages
 * (e.g. /learn-english/hindi/, /learn-english/marathi/, /learn-english/telugu/).
 *
 * @param string $lang  hi | mr | te
 * @return array
 */
function learn_english_landing_seo(string $lang): array
{
    $langDir = ['hi' => 'hindi', 'mr' => 'marathi', 'te' => 'telugu'][$lang]
        ?? throw new InvalidArgumentException("Unknown language: $lang");

    $data = [
        'hi' => [
            'title'         => 'Learn English in Hindi — Free 50-Day Course with SAAVI | Shrutam',
            'description'   => 'मुफ्त 50-Day spoken English course Hindi में। SAAVI के साथ रोज़ 25 मिनट — greetings, tenses, office-market-hospital English सब कुछ। आज से शुरू करें।',
            'hero_eyebrow'  => 'SHRUTAM · MUFT ENGLISH COURSE',
            'hero_title'    => 'Hindi में English बोलना सीखें',
            'hero_subtitle' => 'SAAVI के साथ 50 दिनों में confident English speaker बनें — रोज़ 25 मिनट, मुफ्त में।',
            'stat_days'     => '50 दिन',
            'stat_lessons'  => '50 Lessons',
            'stat_words'    => '750+ ज़रूरी Words',
            'stat_free'     => '100% मुफ्त',
            'weeks_heading' => 'पूरा Course — 50 Days, 8 Weeks',
            'cta_title'     => 'आज से शुरू करें',
            'cta_text'      => 'Day 1 से शुरू करो — सिर्फ़ 25 मिनट रोज़। SAAVI didi के साथ confident English बोलो।',
            'cta_btn'       => 'Day 1 शुरू करें →',
            'about_heading' => 'इस Course के बारे में',
            'about_text'    => 'Shrutam का 50-Day Spoken English Challenge — Hindi-medium students के लिए, "पहले चलाओ, फिर समझो" approach से। SAAVI didi 5 characters (Raju, Farhaan, Rancho, Chatur, Dadaji) के साथ रोज़ की situations में English सिखाती हैं — कोई heavy grammar नहीं, सिर्फ़ practical English।',
        ],
        'mr' => [
            'title'         => 'Learn English in Marathi — Free 50-Day Course with SAAVI | Shrutam',
            'description'   => 'मोफत 50-Day spoken English course मराठीत. SAAVI सोबत रोज 25 मिनिटे — greetings, tenses, office-market-hospital English सर्व. आजपासून सुरू करा.',
            'hero_eyebrow'  => 'SHRUTAM · MOFAT ENGLISH COURSE',
            'hero_title'    => 'मराठीतून English बोलणे शिका',
            'hero_subtitle' => 'SAAVI सोबत 50 दिवसांत confident English speaker बना — रोज 25 मिनिटे, मोफत.',
            'stat_days'     => '50 दिवस',
            'stat_lessons'  => '50 Lessons',
            'stat_words'    => '750+ महत्त्वाचे Words',
            'stat_free'     => '100% मोफत',
            'weeks_heading' => 'संपूर्ण Course — 50 Days, 8 Weeks',
            'cta_title'     => 'आजपासून सुरू करा',
            'cta_text'      => 'Day 1 पासून सुरू करा — फक्त 25 मिनिटे रोज. SAAVI ताई सोबत confident English बोला.',
            'cta_btn'       => 'Day 1 सुरू करा →',
            'about_heading' => 'या Course बद्दल',
            'about_text'    => 'Shrutam चा 50-Day Spoken English Challenge — मराठी-medium विद्यार्थ्यांसाठी, "पहिले चालवा, मग समजून घ्या" या पद्धतीने. SAAVI ताई 5 characters (Raju, Farhaan, Rancho, Chatur, Dadaji) सोबत रोजच्या situations मध्ये English शिकवते — heavy grammar नाही, फक्त practical English.',
        ],
        'te' => [
            'title'         => 'Learn English in Telugu — Free 50-Day Course with SAAVI | Shrutam',
            'description'   => 'ఉచిత 50-Day spoken English course తెలుగులో. SAAVI తో రోజూ 25 నిమిషాలు — greetings, tenses, office-market-hospital English అన్నీ. ఈరోజు నుండే మొదలుపెట్టండి.',
            'hero_eyebrow'  => 'SHRUTAM · UCHITA ENGLISH COURSE',
            'hero_title'    => 'తెలుగు నుండి English మాట్లాడడం నేర్చుకోండి',
            'hero_subtitle' => 'SAAVI తో 50 రోజుల్లో confident English speaker అవ్వండి — రోజూ 25 నిమిషాలు, ఉచితం.',
            'stat_days'     => '50 రోజులు',
            'stat_lessons'  => '50 Lessons',
            'stat_words'    => '750+ ముఖ్యమైన Words',
            'stat_free'     => '100% ఉచితం',
            'weeks_heading' => 'పూర్తి Course — 50 Days, 8 Weeks',
            'cta_title'     => 'ఈరోజు నుండే మొదలుపెట్టండి',
            'cta_text'      => 'Day 1 నుండి మొదలుపెట్టండి — రోజూ కేవలం 25 నిమిషాలు. SAAVI అక్క తో confident English మాట్లాడండి.',
            'cta_btn'       => 'Day 1 మొదలుపెట్టండి →',
            'about_heading' => 'ఈ Course గురించి',
            'about_text'    => 'Shrutam యొక్క 50-Day Spoken English Challenge — తెలుగు-medium విద్యార్థుల కోసం, "ముందు ఉపయోగించండి, తర్వాత అర్థం చేసుకోండి" అనే విధానంతో. SAAVI అక్క 5 characters (Raju, Farhaan, Rancho, Chatur, Dadaji) తో రోజువారీ situations లో English నేర్పుతుంది — heavy grammar లేదు, కేవలం practical English.',
        ],
    ];

    $entry = $data[$lang];
    $entry['canonical'] = "https://shrutam.ai/learn-english/{$langDir}/";
    $entry['lang']      = $lang;
    $entry['lang_dir']  = $langDir;
    return $entry;
}

/**
 * FAQ Q&A pairs per language for the Spoken English course landing pages.
 * Used to render an on-page FAQ section + emit FAQPage JSON-LD schema.
 *
 * @param string $lang  hi | mr | te
 * @return array<int, array{q: string, a: string}>
 */
function learn_english_faqs(string $lang): array
{
    $faqs = [
        'hi' => [
            ['q' => 'क्या यह English course वाकई मुफ्त है?',
             'a' => 'हाँ, Shrutam का 50-Day Spoken English course पूरी तरह मुफ्त है। Sign-in करने के बाद SAAVI के साथ AI chat और live call भी free मिलते हैं — कोई hidden charge नहीं।'],
            ['q' => 'यह course किन भाषाओं में available है?',
             'a' => 'Course Hindi, Marathi और Telugu — तीनों भाषाओं में मुफ्त उपलब्ध है। हर English वाक्य के साथ आपकी मातृभाषा में explanation और pronunciation मिलती है।'],
            ['q' => 'क्या मुझे sign-in करना ज़रूरी है?',
             'a' => 'पहले कुछ lessons बिना sign-in देख सकते हैं। AI chat, live call और progress tracking के लिए free sign-in चाहिए — सिर्फ़ phone number से, कोई payment नहीं।'],
            ['q' => 'AI chat और live call कैसे मिलेगा?',
             'a' => 'Sign-in करते ही SAAVI के साथ unlimited AI chat free मिलता है। Live call भी एक बार sign-in के बाद included है — आप अपनी English doubts directly SAAVI से पूछ सकते हैं।'],
            ['q' => 'क्या translation available है?',
             'a' => 'हाँ। हर English वाक्य के साथ Hindi/Marathi/Telugu में translation और Devanagari/Telugu pronunciation दी जाती है। किसी भी English text पर tap करके instant translation भी देख सकते हैं।'],
            ['q' => 'Shrutam app में और क्या features हैं?',
             'a' => 'Parent dashboard में आप अपनी progress, daily streak, weak topics और SAAVI के साथ की बातचीत — सब देख सकते हैं। Student app में audio practice, mock test, photo doubt-solver और blind mode (free forever) भी मिलते हैं।'],
            ['q' => 'हर lesson कितनी लम्बी होती है?',
             'a' => 'हर day का lesson लगभग 25 मिनट का है — एक कप चाय के समय में आराम से पूरा हो जाता है। आप अपनी पसंद के समय पर कर सकते हैं।'],
            ['q' => 'क्या यह बिल्कुल beginners के लिए है?',
             'a' => 'हाँ। Course Day 1 से शुरू होता है — greetings और self-introduction से। पहले से English आती है तो आप किसी भी day से शुरू कर सकते हैं — हर day independent है।'],
            ['q' => 'क्या मुझे certificate मिलेगा?',
             'a' => '50-Day Challenge पूरा होने पर Shrutam Spoken English Certificate मिलता है। आप sign-in करके download कर सकते हैं और LinkedIn या resume पर लगा सकते हैं।'],
        ],
        'mr' => [
            ['q' => 'हा English course खरोखरच मोफत आहे का?',
             'a' => 'हो, Shrutam चा 50-Day Spoken English course पूर्णपणे मोफत आहे. Sign-in केल्यानंतर SAAVI सोबत AI chat आणि live call देखील मोफत मिळते — कोणताही hidden charge नाही.'],
            ['q' => 'हा course कोणत्या भाषांमध्ये उपलब्ध आहे?',
             'a' => 'Course Hindi, Marathi आणि Telugu — तिन्ही भाषांमध्ये मोफत उपलब्ध आहे. प्रत्येक English वाक्यासोबत तुमच्या मातृभाषेत explanation आणि pronunciation मिळते.'],
            ['q' => 'मला sign-in करावे लागेल का?',
             'a' => 'पहिले काही lessons sign-in शिवाय पाहू शकता. AI chat, live call आणि progress tracking साठी free sign-in लागते — फक्त phone number ने, कोणतीही payment नाही.'],
            ['q' => 'AI chat आणि live call कसे मिळेल?',
             'a' => 'Sign-in केल्याबरोबर SAAVI सोबत unlimited AI chat मोफत मिळतो. एकदा sign-in केल्यानंतर live call देखील included — तुमच्या English shankka SAAVI ला थेट विचारू शकता.'],
            ['q' => 'Translation उपलब्ध आहे का?',
             'a' => 'हो. प्रत्येक English वाक्यासोबत Marathi/Hindi/Telugu मध्ये translation आणि Devanagari/Telugu pronunciation दिली जाते. कोणत्याही English text वर tap करून instant translation पाहू शकता.'],
            ['q' => 'Shrutam app मध्ये आणखी कोणती features आहेत?',
             'a' => 'Parent dashboard मध्ये तुमची progress, daily streak, weak topics आणि SAAVI सोबतच्या गप्पा — सर्व पाहू शकता. Student app मध्ये audio practice, mock test, photo doubt-solver आणि blind mode (forever free) देखील मिळते.'],
            ['q' => 'प्रत्येक lesson किती वेळाचा आहे?',
             'a' => 'प्रत्येक day चा lesson सुमारे 25 मिनिटांचा आहे — एक चहाच्या वेळेत आरामात पूर्ण होतो. तुमच्या आवडीच्या वेळी करता येतो.'],
            ['q' => 'हा अगदी beginners साठी आहे का?',
             'a' => 'हो. Course Day 1 पासून सुरू होतो — greetings आणि self-introduction पासून. आधीच English येत असेल तर कोणत्याही day पासून सुरू करू शकता — प्रत्येक day independent आहे.'],
            ['q' => 'मला certificate मिळेल का?',
             'a' => '50-Day Challenge पूर्ण झाल्यावर Shrutam Spoken English Certificate मिळते. Sign-in करून download करू शकता आणि LinkedIn किंवा resume वर लावू शकता.'],
        ],
        'te' => [
            ['q' => 'ఈ English course నిజంగా ఉచితమా?',
             'a' => 'అవును, Shrutam యొక్క 50-Day Spoken English course పూర్తిగా ఉచితం. Sign-in చేసిన తర్వాత SAAVI తో AI chat మరియు live call కూడా ఉచితంగా లభిస్తాయి — ఎటువంటి hidden charge లేదు.'],
            ['q' => 'ఈ course ఏ భాషల్లో అందుబాటులో ఉంది?',
             'a' => 'Course Hindi, Marathi మరియు Telugu — మూడు భాషల్లో ఉచితంగా అందుబాటులో ఉంది. ప్రతి English వాక్యంతో పాటు మీ మాతృభాషలో explanation మరియు pronunciation లభిస్తాయి.'],
            ['q' => 'నేను sign-in చేయాలా?',
             'a' => 'మొదటి కొన్ని lessons sign-in లేకుండానే చూడవచ్చు. AI chat, live call మరియు progress tracking కోసం free sign-in అవసరం — కేవలం phone number తో, ఎటువంటి payment లేదు.'],
            ['q' => 'AI chat మరియు live call ఎలా పొందాలి?',
             'a' => 'Sign-in చేయగానే SAAVI తో unlimited AI chat ఉచితం. ఒకసారి sign-in చేసిన తర్వాత live call కూడా included — మీ English doubts SAAVI ను నేరుగా అడగవచ్చు.'],
            ['q' => 'Translation అందుబాటులో ఉందా?',
             'a' => 'అవును. ప్రతి English వాక్యంతో పాటు Telugu/Hindi/Marathi లో translation మరియు Telugu/Devanagari pronunciation ఇవ్వబడుతుంది. ఏదైనా English text పై tap చేయడం ద్వారా instant translation చూడవచ్చు.'],
            ['q' => 'Shrutam app లో మరిన్ని ఏ features ఉన్నాయి?',
             'a' => 'Parent dashboard లో మీ progress, daily streak, weak topics మరియు SAAVI తో మీ సంభాషణలు — అన్నీ చూడవచ్చు. Student app లో audio practice, mock test, photo doubt-solver మరియు blind mode (forever free) కూడా లభిస్తాయి.'],
            ['q' => 'ప్రతి lesson ఎంత నిడివి కలిగి ఉంటుంది?',
             'a' => 'ప్రతి day యొక్క lesson సుమారు 25 నిమిషాల నిడివి — ఒక కప్పు టీ సమయంలో సులభంగా పూర్తి అవుతుంది. మీకు అనుకూలమైన సమయంలో చేయవచ్చు.'],
            ['q' => 'ఇది పూర్తిగా beginners కోసమా?',
             'a' => 'అవును. Course Day 1 నుండి మొదలవుతుంది — greetings మరియు self-introduction నుండి. మీకు ఇప్పటికే English వస్తే ఏ day నుండైనా మొదలుపెట్టవచ్చు — ప్రతి day independent.'],
            ['q' => 'నాకు certificate లభిస్తుందా?',
             'a' => '50-Day Challenge పూర్తయిన తర్వాత Shrutam Spoken English Certificate లభిస్తుంది. Sign-in చేసి download చేసుకొని LinkedIn లేదా resume పై ఉపయోగించవచ్చు.'],
        ],
    ];
    if (!isset($faqs[$lang])) {
        throw new InvalidArgumentException("Unknown language: $lang");
    }
    return $faqs[$lang];
}

/**
 * Per-language UI label for the FAQ section heading.
 */
function learn_english_faq_heading(string $lang): string
{
    return [
        'hi' => 'अक्सर पूछे जाने वाले सवाल (FAQs)',
        'mr' => 'वारंवार विचारले जाणारे प्रश्न (FAQs)',
        'te' => 'తరచుగా అడిగే ప్రశ్నలు (FAQs)',
    ][$lang] ?? 'Frequently Asked Questions';
}

/**
 * 8-week grouping of the 50-day course. Week titles are kept in English
 * (grammar terms are universally English-style). Used by language landing pages.
 *
 * @return array
 */
function learn_english_weeks(): array
{
    return [
        ['title' => 'Week 1 · Foundation — Greetings, Family, Pronouns',     'days' => [1,2,3,4,5,6,7]],
        ['title' => 'Week 2 · BE Verb, HAVE, Present Continuous, Past',     'days' => [8,9,10,11,12,13,14]],
        ['title' => 'Week 3 · Past Irregulars, Wh-Questions, Future, Modals','days' => [15,16,17,18,19,20,21]],
        ['title' => 'Week 4 · Past Continuous, Present & Past Perfect',     'days' => [22,23,24,25,26,27,28]],
        ['title' => 'Week 5 · Real-Life — Office, Phone, Shopping, Hospital','days' => [29,30,31,32,33,34,35]],
        ['title' => 'Week 6 · Prepositions, Connectors, Comparisons',        'days' => [36,37,38,39,40,41,42]],
        ['title' => 'Week 7 · Complaints, Invitations, Small Talk, Interview','days' => [43,44,45,46,47,48,49]],
        ['title' => 'Week 8 · Graduation Day',                                'days' => [50]],
    ];
}

/**
 * 301 redirect map from old slugs (without lang suffix) to new ones.
 * Used by .htaccess generator or PHP redirect handler.
 */
function learn_english_redirects(): array
{
    $data = require __DIR__ . '/seo-meta.php';
    $map = [];
    foreach ($data as $day => $entry) {
        if (!empty($entry['old_slug'])) {
            // Old folder pattern: day-N-...-{lang}
            // New canonical: /learn-english/{langDir}/{new-slug}/
            foreach (['hi' => 'hindi', 'mr' => 'marathi', 'te' => 'telugu'] as $code => $dir) {
                $oldFolder = $entry['old_slug'] . '-' . $dir; // historical naming
                $newPath   = "/learn-english/{$dir}/{$entry['slug']}/";
                $map["/learn-english/{$dir}/{$oldFolder}/"] = $newPath;
            }
        }
    }
    return $map;
}
