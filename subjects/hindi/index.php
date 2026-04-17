<?php
$title       = "Hindi AI Tutor | NCERT Hindi Class 6-10 | Grammar Sahitya | Shrutam SAAVI";
$description = "Hindi vyakaran aur sahitya SAAVI ke saath. Grammar rules, letter writing, essay practice. NCERT aligned. Class 6-10.";
$canonical   = "https://shrutam.ai/subjects/hindi/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"            => "Course",
      "name"             => "Hindi — SAAVI AI Tutor Class 6–10",
      "description"      => "NCERT Hindi Class 6 se 10 tak. Vyakaran, sahitya, patra lekhan, nibandh. Hindi mein. CG Board aur CBSE.",
      "provider"         => ["@type" => "Organization", "name" => "Shrutam", "url" => "https://shrutam.ai"],
      "educationalLevel" => "Grade 6-10",
      "inLanguage"       => "hi",
      "hasCourseInstance" => [
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 6 Hindi"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 7 Hindi"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 8 Hindi"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 9 Hindi"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 10 Hindi"],
      ],
      "offers"           => [
        "@type"         => "Offer",
        "price"         => "199",
        "priceCurrency" => "INR",
        "availability"  => "https://schema.org/PreOrder",
      ],
    ],
    [
      "@type"           => "BreadcrumbList",
      "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home",     "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "Subjects", "item" => "https://shrutam.ai/subjects/"],
        ["@type" => "ListItem", "position" => 3, "name" => "Hindi",    "item" => "https://shrutam.ai/subjects/hindi/"],
      ],
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include '../../partials/head.php';
include '../../partials/nav.php';
?>

<main id="main">

  <!-- ============================================================
       SECTION 1: HERO
       ============================================================ -->
  <section class="section" aria-labelledby="hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">

      <!-- Breadcrumb -->
      <nav aria-label="Breadcrumb" class="mb-8">
        <ol class="flex flex-wrap items-center gap-2 text-sm" style="color: var(--text-muted);">
          <li><a href="/" style="color: var(--primary-light);">Home</a></li>
          <li aria-hidden="true">›</li>
          <li><a href="/subjects/" style="color: var(--primary-light);">Subjects</a></li>
          <li aria-hidden="true">›</li>
          <li aria-current="page" style="color: var(--text-secondary);">Hindi</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-6">
            <span class="badge badge-primary">📝 Hindi</span>
            <span class="badge badge-accent">Class 6–10</span>
            <span class="pill">Vyakaran</span>
            <span class="pill">Sahitya</span>
            <span class="pill">NCERT</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Hindi — Vyakaran Se Sahitya Tak
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            हिंदी अपनी भाषा है — SAAVI इसे और गहरा करती है।
          </p>

          <p class="text-lg mb-6" style="color: var(--text-body);">
            Hindi sirf ek subject nahi — yeh hamari <strong style="color: var(--text-primary);">apni bhaasha</strong> hai.
            SAAVI Hindi ko natural Hindi mein padhati hai — aam bolchal ke examples se.
            Vyakaran ke rules, sahitya ki kavitaayein, patra lekhan — sab ek hi jagah.
          </p>

          <p class="text-base mb-8" style="color: var(--text-secondary);">
            Board exam mein Hindi mein achhe marks aana possible hai —
            <strong style="color: var(--accent);">sirf samajhna hoga, rota nahi.</strong>
            SAAVI isi tarah sikhati hai.
          </p>

          <div class="flex flex-wrap gap-4">
            <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
            <a href="#topics" class="btn btn-outline">Topics Dekho ↓</a>
          </div>
        </div>

        <!-- Right: Hindi chat demo -->
        <div class="card" aria-label="SAAVI Hindi teaching demonstration">
          <div class="flex items-center gap-3 pb-4 mb-4" style="border-bottom: 1px solid var(--border-subtle);">
            <div class="w-10 h-10 rounded-full flex items-center justify-center text-xl" style="background: var(--primary-glow);">📝</div>
            <div>
              <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">SAAVI Didi — Hindi Mode</div>
              <div class="text-xs" style="color: var(--success);">● Online — Class 10 Vyakaran</div>
            </div>
          </div>

          <div class="flex flex-col gap-3">
            <div class="chat-bubble chat-bubble-student">
              <p class="text-sm">Didi, samas aur sandhi mein kya fark hai? Dono ek jaisa lagta hai.</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm mb-1"><strong style="color: var(--accent);">SAAVI:</strong> Ek easy trick — sandhi mein do <em>akshar</em> milte hain, samas mein do <em>shabd</em> milte hain.</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm">Jaise "Ram + Aayan = Ramayan" — yeh sandhi hai (akshar mele). "Raat + Ghar = Raat-ghar" — yeh samas hai (shabd mele). Clear?</p>
            </div>
            <div class="chat-bubble chat-bubble-student">
              <p class="text-sm">Ohhh! Akshar vs shabd — yeh toh aasaan hai! Ab yaad rahega.</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm"><strong style="color: var(--accent);">Bilkul!</strong> Aur ab ek example banao tum — mai check karungi. 😊</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 2: TOPICS
       ============================================================ -->
  <section id="topics" class="section section-dark" aria-labelledby="topics-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-accent mb-4">📖 Hindi Ke Topics</span>
        <h2 id="topics-heading" class="text-3xl font-heading font-bold mb-3">Hindi — Kya Kya Sikhoge SAAVI Se?</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Vyakaran se leke poetry analysis tak — sab kuch.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">📚</div>
          <div class="font-heading font-bold text-lg mb-3" style="color: var(--text-primary);">Vyakaran (Grammar)</div>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-secondary);">
            <li>• Sandhi — rules aur examples</li>
            <li>• Samas — 6 types, tricks ke saath</li>
            <li>• Karak — vibhaktiyan aur usage</li>
            <li>• Muhavare aur Lokoktiyan</li>
            <li>• Ras, Chhanda, Alankar</li>
          </ul>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">✉️</div>
          <div class="font-heading font-bold text-lg mb-3" style="color: var(--text-primary);">Patra Lekhan (Letter Writing)</div>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-secondary);">
            <li>• Aupcharik patra — sahi format</li>
            <li>• Anaupcharik patra — tone aur bhaasha</li>
            <li>• Prarthna patra — school letters</li>
            <li>• Board exam mein sahi marks kaise</li>
          </ul>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">📄</div>
          <div class="font-heading font-bold text-lg mb-3" style="color: var(--text-primary);">Nibandh (Essay Writing)</div>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-secondary);">
            <li>• Structure — prasthaavna, madhya, upsanhar</li>
            <li>• Common topics — environment, technology</li>
            <li>• Vocabulary building — powerful words</li>
            <li>• Time management in exam</li>
          </ul>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">📰</div>
          <div class="font-heading font-bold text-lg mb-3" style="color: var(--text-primary);">Apathit Gadyansh (Comprehension)</div>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-secondary);">
            <li>• Unseen passage kaise padhein</li>
            <li>• Questions kaise dhundhein passage mein</li>
            <li>• Sahi shabdon mein answer likhein</li>
            <li>• Board mein full marks strategy</li>
          </ul>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">🎭</div>
          <div class="font-heading font-bold text-lg mb-3" style="color: var(--text-primary);">Sahitya — Kavita Vishleshan</div>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-secondary);">
            <li>• NCERT kavitayen — meaning aur bhaav</li>
            <li>• Kavi ka parichay — board ke liye</li>
            <li>• Alankar pehchanana — easy tricks</li>
            <li>• Gadya — kahani aur natak analysis</li>
          </ul>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">🎯</div>
          <div class="font-heading font-bold text-lg mb-3" style="color: var(--text-primary);">Board Exam Format Practice</div>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-secondary);">
            <li>• CBSE aur CG Board pattern dono</li>
            <li>• Marks distribution samjhna</li>
            <li>• Mock tests — timed practice</li>
            <li>• Model answers Hindi mein</li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 3: HOW SAAVI TEACHES HINDI
       ============================================================ -->
  <section class="section" aria-labelledby="method-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-primary mb-4">🎓 SAAVI Ka Tarika</span>
        <h2 id="method-heading" class="text-3xl font-heading font-bold mb-3">
          "Apni Bhaasha Mein — Apna Paath"
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          SAAVI Hindi ko boring grammar drill nahi banati — conversation aur stories se sikhati hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl mx-auto">

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">🗣️</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Natural Hindi Mein Padhati Hai</div>
            <p class="text-sm" style="color: var(--text-secondary);">SAAVI bookish Hindi nahi bolti — aam bolchal ki Hindi mein samjhati hai. Rules yad rahte hain kyunki examples natural feel karte hain.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">🎵</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Poetry Audio — Kavita Sunke Samjho</div>
            <p class="text-sm" style="color: var(--text-secondary);">Kabir ke dohe, Sumitranandan Pant ki kavitayen — SAAVI unhe sahi tarah se padhke unka arth samjhati hai. Sunne se poetry connect hoti hai.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">✍️</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Practice Feedback</div>
            <p class="text-sm" style="color: var(--text-secondary);">Nibandh ya patra likhke bhejo — SAAVI feedback deti hai kahan improve karna hai. Sirf "achha hai" nahi — specific suggestions.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">📌</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Tricks aur Mnemonics</div>
            <p class="text-sm" style="color: var(--text-secondary);">Sandhi ke rules, samas ke types — SAAVI memory tricks se sikhati hai. Exam mein yad rakhna aasaan hota hai.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 4: CTA
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-accent mb-4">📝 Hindi Ready</span>
        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          Hindi Mein Achhe Marks — SAAVI Ke Saath
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-6" style="color: var(--accent);">
          अपनी भाषा को और बेहतर बनाओ।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          ₹199/month. 7 din free trial. Vyakaran, sahitya, nibandh — sab ek jagah. Abhi join karo.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="/waitlist/" class="btn btn-primary text-lg px-8 py-4">Join Waitlist Free →</a>
          <a href="/classes/class-10/" class="btn btn-outline text-lg px-8 py-4">Class 10 Chapters ↓</a>
        </div>
        <p class="mt-4 text-sm" style="color: var(--text-muted);">
          ♿ Visually impaired students ke liye Hindi Blind Mode hamesha FREE.
        </p>
      </div>
    </div>
  </section>

</main>

<?php include '../../partials/footer.php'; ?>
