<?php
$title = 'English Speaking Course for Marathi Speakers — Free 50 Days | Shrutam';
$description = 'Marathi भाषिकांसाठी free English speaking course. 50 दिवसांत English बोला — audio, video, quiz, AI teacher SAAVI.';
$canonical = 'https://shrutam.ai/spoken-english/marathi-english/';
$htmlLang = 'mr';
$og_image = 'https://shrutam.ai/assets/images/hero/saavi-teaching.png';

$schema = json_encode([
    "@context" => "https://schema.org",
    "@type" => "Course",
    "name" => "English Speaking Course for Marathi Speakers",
    "description" => "Free 50-day English speaking course for Marathi speakers with AI teacher SAAVI.",
    "provider" => ["@type" => "Organization", "name" => "Shrutam", "url" => "https://shrutam.ai"],
    "educationalLevel" => "Beginner (A1-A2)",
    "inLanguage" => ["en", "mr"],
    "isAccessibleForFree" => true,
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
            <span class="badge badge-accent mb-4">🆓 पूर्णपणे FREE — कोणताही hidden charge नाही</span>
            <h1 class="text-4xl sm:text-5xl font-heading leading-tight mb-4" style="color: var(--text-primary);">
                मराठी भाषिकांसाठी<br>
                <span class="text-gradient">English Speaking Course</span>
            </h1>
            <p class="text-lg mb-6" style="color: var(--text-body); line-height: 1.7;">
                50 दिवसांत English बोलायला शिका — SAAVI AI teacher सोबत. रोज 15 मिनिटे, audio-video lessons,
                quiz, आणि live AI chat practice. मराठीत समजा, English मध्ये बोला.
            </p>
            <div class="flex flex-wrap gap-3 mb-6">
                <a href="/spoken-english/?day=1&lang=mr" class="btn btn-primary">Day 1 सुरू करा Free →</a>
                <a href="/spoken-english/login.php" class="btn btn-outline">📱 Login करा</a>
            </div>
            <div class="flex flex-wrap gap-4 text-sm" style="color: var(--text-muted);">
                <span>📚 50 दिवस</span>
                <span>🎧 Audio Lessons</span>
                <span>🎬 Video</span>
                <span>📝 Quiz</span>
                <span>💬 AI Chat</span>
            </div>
        </div>
        <div>
            <img src="/assets/images/hero/saavi-teaching.png" alt="SAAVI teaching English to Marathi speakers"
                 class="rounded-2xl" style="width: 100%; box-shadow: var(--shadow-lg);" loading="lazy">
        </div>
    </div>
</div>
</section>

<!-- Who is this for -->
<section class="section section-dark">
<div class="container">
    <h2 class="text-3xl font-heading text-center mb-8" style="color: var(--text-primary);">हा Course कोणासाठी आहे?</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php foreach ([
            ['👨‍💼', 'Office Workers', 'ऑफिस मध्ये English बोलायला लागते'],
            ['🎓', 'विद्यार्थी', 'Interview आणि presentation साठी English हवे'],
            ['🏪', 'व्यापारी', 'Customers शी English मध्ये बोलायचे आहे'],
            ['👩‍👧', 'पालक', 'मुलांच्या English homework मध्ये मदत करायची'],
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
    <h2 class="text-3xl font-heading text-center mb-8" style="color: var(--text-primary);">50 दिवसांत काय शिकाल?</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ([
            ['आठवडा 1-2', 'Foundation', 'Greetings, Self-Introduction, Numbers, Family, AM/IS/ARE, HAVE, DO'],
            ['आठवडा 3-4', 'Tenses & Grammar', 'Present, Past, Future Tense, Articles A/AN/THE, Prepositions'],
            ['आठवडा 5', 'Mega Verbs', 'GET, MAKE, TAKE, COME, GO — प्रत्येकाचे 6+ अर्थ'],
            ['आठवडा 6', 'Polite English', 'CAN/COULD, WILL/WOULD, SHOULD/MUST — तू vs तुम्ही rule'],
            ['आठवडा 7', 'Real Conversations', 'Phone calls, Restaurant, Shopping, Office, Doctor visits'],
            ['दिवस 50', '🎓 Graduation', 'Mock interview + Situational test + Certificate'],
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
                SAAVI — तुमची AI English Coach
            </h2>
            <ul class="space-y-3" style="color: var(--text-body);">
                <li>🎧 प्रत्येक word SAAVI च्या आवाजात ऐका</li>
                <li>💬 कोणताही doubt विचारा — मराठीत विचारा, English मध्ये उत्तर</li>
                <li>🔊 प्रत्येक उत्तर audio मध्ये — ऐकून शिका</li>
                <li>📱 Phone OTP ने login — progress save होतो</li>
                <li>🎯 Quiz, Flashcards, Matching games — कंटाळा नाही</li>
                <li>⏱️ रोज फक्त 15 मिनिटे — चहा पिताना शिका</li>
            </ul>
        </div>
    </div>
</div>
</section>

<!-- Why Marathi speakers need this -->
<section class="section">
<div class="container" style="max-width: 768px;">
    <h2 class="text-3xl font-heading text-center mb-6" style="color: var(--text-primary);">
        मराठी भाषिकांना English का कठीण वाटतो?
    </h2>
    <div class="space-y-4">
        <?php foreach ([
            ['Articles (a/an/the)', 'मराठीत "the" नाही — म्हणून "I am student" बोलतो, "I am A student" हवे'],
            ['V/W confusion', '"very" ला "wery" बोलतो — कारण मराठी मध्ये V आणि W एकच आवाज'],
            ['Tense mistakes', '"I am having car" बोलतो — "I have a car" हवे. Stative verbs ला -ing नाही लागत'],
            ['Word order', 'मराठी SOV आहे (मी शाळेत जातो), English SVO (I go to school)'],
        ] as $item): ?>
        <div class="card p-4">
            <h3 class="font-heading mb-1" style="color: var(--accent);"><?= $item[0] ?></h3>
            <p class="text-sm" style="color: var(--text-body);"><?= $item[1] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
    <p class="text-center mt-6" style="color: var(--text-secondary);">
        SAAVI हे सगळे mistakes fix करते — मराठीतून समजावून!
    </p>
</div>
</section>

<!-- CTA -->
<section class="section section-dark text-center">
<div class="container">
    <h2 class="text-3xl font-heading mb-4" style="color: var(--text-primary);">आजच सुरू करा — पूर्णपणे FREE</h2>
    <p class="text-lg mb-6" style="color: var(--text-secondary);">Credit card नाही, hidden charge नाही. फक्त सुरू करा.</p>
    <a href="/spoken-english/?day=1&lang=mr" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 2rem;">
        Day 1 सुरू करा — Free →
    </a>
</div>
</section>

<!-- FAQ -->
<section class="section">
<div class="container" style="max-width: 768px;">
    <h2 class="text-3xl font-heading text-center mb-8" style="color: var(--text-primary);">वारंवार विचारले जाणारे प्रश्न</h2>
    <?php foreach ([
        ['हे खरंच free आहे का?', 'हो, 100% free. कोणताही hidden charge नाही. SAAVI AI chat पण free आहे.'],
        ['रोज किती वेळ लागतो?', 'फक्त 15-20 मिनिटे. चहा पिताना होऊन जाईल!'],
        ['मला English अजिबात येत नाही, चालेल का?', 'अगदी! Day 1 पासून "Hello" पासून सुरुवात. शून्यापासून हिरो!'],
        ['Phone वर चालेल का?', 'हो! Mobile-first design आहे. Phone, tablet, laptop — सगळ्यावर चालतो.'],
        ['मराठी मध्ये शिकवतात का?', 'हो! SAAVI मराठी मध्ये explain करते, English बोलायला शिकवते.'],
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
