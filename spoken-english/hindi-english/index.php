<?php
$title = 'English Speaking Course for Hindi Speakers — Free 50 Days | Shrutam';
$description = 'Hindi speakers ke liye free English speaking course. 50 din mein English bolo — audio, video, quiz, AI teacher SAAVI. Phone OTP se login, progress track karo.';
$canonical = 'https://shrutam.ai/spoken-english/hindi-english/';
$htmlLang = 'hi-IN';
$og_image = 'https://shrutam.ai/assets/images/hero/saavi-teaching.png';

$schema = json_encode([
    "@context" => "https://schema.org",
    "@type" => "Course",
    "name" => "English Speaking Course for Hindi Speakers",
    "description" => "Free 50-day English speaking course with AI teacher SAAVI. Audio lessons, video, quiz, and live chat practice.",
    "provider" => ["@type" => "Organization", "name" => "Shrutam", "url" => "https://shrutam.ai"],
    "educationalLevel" => "Beginner (A1-A2)",
    "inLanguage" => ["en", "hi"],
    "isAccessibleForFree" => true,
    "numberOfCredits" => 50,
    "teaches" => "English Speaking, Vocabulary, Grammar, Pronunciation",
], JSON_UNESCAPED_UNICODE);

include __DIR__ . '/../../partials/head.php';
include __DIR__ . '/../../partials/nav.php';
?>

<main id="main">
<!-- Hero -->
<section class="section" style="padding-top: 3rem;">
<div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
        <div>
            <span class="badge badge-accent mb-4">🆓 बिल्कुल FREE — कोई hidden charge नहीं</span>
            <h1 class="text-4xl sm:text-5xl font-heading leading-tight mb-4" style="color: var(--text-primary);">
                Hindi Speakers के लिए<br>
                <span class="text-gradient">English Speaking Course</span>
            </h1>
            <p class="text-lg mb-6" style="color: var(--text-body); line-height: 1.7;">
                50 दिन में English बोलना सीखें — SAAVI AI teacher के साथ। हर रोज़ 15 मिनट, audio-video lessons,
                quiz, और live AI chat practice। Hindi में समझें, English में बोलें।
            </p>
            <div class="flex flex-wrap gap-3 mb-6">
                <a href="/spoken-english/?day=1" class="btn btn-primary">Start Day 1 Free →</a>
                <a href="/spoken-english/login.php" class="btn btn-outline">📱 Login करें</a>
            </div>
            <div class="flex flex-wrap gap-4 text-sm" style="color: var(--text-muted);">
                <span>📚 50 Days</span>
                <span>🎧 Audio Lessons</span>
                <span>🎬 Video</span>
                <span>📝 Quiz</span>
                <span>💬 AI Chat</span>
            </div>
        </div>
        <div>
            <img src="/assets/images/hero/saavi-teaching.png" alt="SAAVI teaching English to Hindi speakers"
                 class="rounded-2xl" style="width: 100%; box-shadow: var(--shadow-lg);" loading="lazy">
        </div>
    </div>
</div>
</section>

<!-- Who is this for -->
<section class="section section-dark">
<div class="container">
    <h2 class="text-3xl font-heading text-center mb-8" style="color: var(--text-primary);">ये Course किसके लिए है?</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php foreach ([
            ['👨‍💼', 'Office Workers', 'जिन्हें office में English बोलनी पड़ती है'],
            ['🎓', 'Students', 'Interview और presentation के लिए English चाहिए'],
            ['🏪', 'Shopkeepers', 'Customers से English में बात करनी है'],
            ['👩‍👧', 'Parents', 'बच्चों की English homework में help करनी है'],
        ] as $item): ?>
        <div class="card text-center p-4">
            <div class="text-4xl mb-2"><?= $item[0] ?></div>
            <h3 class="font-heading mb-1" style="color: var(--text-primary);"><?= $item[1] ?></h3>
            <p class="text-sm" style="color: var(--text-secondary);"><?= $item[2] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</section>

<!-- What you'll learn -->
<section class="section">
<div class="container">
    <h2 class="text-3xl font-heading text-center mb-8" style="color: var(--text-primary);">50 दिन में क्या सीखेंगे?</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ([
            ['Week 1-2', 'Foundation', 'Greetings, Self-Introduction, Numbers, Family, AM/IS/ARE, HAVE, DO'],
            ['Week 3-4', 'Tenses & Grammar', 'Present, Past, Future Tense, Articles A/AN/THE, Prepositions'],
            ['Week 5', 'Mega Verbs', 'GET, MAKE, TAKE, COME, GO — 6+ meanings of each'],
            ['Week 6', 'Polite English', 'CAN/COULD, WILL/WOULD, SHOULD/MUST — TU vs AAP rule'],
            ['Week 7', 'Real Conversations', 'Phone calls, Restaurant, Shopping, Office, Doctor visits'],
            ['Day 50', '🎓 Graduation', 'Mock interview + Situational test + Certificate'],
        ] as $item): ?>
        <div class="card p-4">
            <span class="badge badge-primary text-xs mb-2"><?= $item[0] ?></span>
            <h3 class="font-heading mb-1" style="color: var(--text-primary);"><?= $item[1] ?></h3>
            <p class="text-sm" style="color: var(--text-secondary);"><?= $item[2] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</section>

<!-- SAAVI Feature -->
<section class="section section-dark">
<div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
        <div>
            <img src="/assets/images/hero/saavi-standalone.png" alt="SAAVI AI Teacher"
                 class="rounded-2xl" style="max-width: 300px;" loading="lazy">
        </div>
        <div>
            <h2 class="text-3xl font-heading mb-4" style="color: var(--text-primary);">
                SAAVI — आपकी AI English Coach
            </h2>
            <ul class="space-y-3" style="color: var(--text-body);">
                <li>🎧 हर word को SAAVI की आवाज़ में सुनें</li>
                <li>💬 कोई भी doubt पूछें — Hindi में पूछो, English में जवाब</li>
                <li>🔊 हर जवाब audio में — सुनकर सीखें</li>
                <li>📱 Phone OTP से login — progress save हो</li>
                <li>🎯 Quiz, Flashcards, Matching games — boring नहीं</li>
                <li>⏱️ रोज़ सिर्फ 15 मिनट — chai peete peete sikh lo</li>
            </ul>
        </div>
    </div>
</div>
</section>

<!-- CTA -->
<section class="section text-center">
<div class="container">
    <h2 class="text-3xl font-heading mb-4" style="color: var(--text-primary);">आज से शुरू करें — बिल्कुल FREE</h2>
    <p class="text-lg mb-6" style="color: var(--text-secondary);">कोई credit card नहीं, कोई hidden charge नहीं। बस शुरू करें।</p>
    <a href="/spoken-english/?day=1" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 2rem;">
        Day 1 शुरू करें — Free →
    </a>
</div>
</section>

<!-- FAQ -->
<section class="section section-dark">
<div class="container" style="max-width: 768px;">
    <h2 class="text-3xl font-heading text-center mb-8" style="color: var(--text-primary);">अक्सर पूछे जाने वाले सवाल</h2>
    <?php foreach ([
        ['क्या ये सच में free है?', 'हाँ, 100% free। कोई hidden charge नहीं। SAAVI AI chat भी free है।'],
        ['कितना time लगेगा रोज़?', 'सिर्फ 15-20 मिनट। Chai peete peete ho jayega!'],
        ['मुझे English बिल्कुल नहीं आती, चलेगा?', 'बिल्कुल! Day 1 से "Hello" से शुरू करते हैं। Zero se hero!'],
        ['Phone pe chal sakta hai?', 'Haan! Mobile-first design hai. Phone, tablet, laptop — sab pe chalega.'],
        ['Login zaroori hai?', 'Nahi! Bina login ke video, words, quiz sab dekh sakte hain. Login sirf chat aur progress tracking ke liye.'],
    ] as $faq): ?>
    <details class="card p-4 mb-3">
        <summary class="font-heading cursor-pointer" style="color: var(--text-primary);"><?= $faq[0] ?></summary>
        <p class="mt-2 text-sm" style="color: var(--text-secondary);"><?= $faq[1] ?></p>
    </details>
    <?php endforeach; ?>
</div>
</section>
</main>

<?php include __DIR__ . '/../../partials/footer.php'; ?>
