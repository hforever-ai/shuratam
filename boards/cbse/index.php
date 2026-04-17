<?php
$title       = "CBSE AI Tutor | Hindi Mein NCERT | All India | Shrutam SAAVI";
$description = "CBSE Class 6-10 ke liye SAAVI. NCERT exact syllabus. Hindi, Hinglish, English mein. ₹199/month.";
$canonical   = "https://shrutam.ai/boards/cbse/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"           => "BreadcrumbList",
      "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home",   "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "Boards", "item" => "https://shrutam.ai/boards/"],
        ["@type" => "ListItem", "position" => 3, "name" => "CBSE",   "item" => "https://shrutam.ai/boards/cbse/"],
      ],
    ],
    [
      "@type"            => "Course",
      "name"             => "CBSE (NCERT) — SAAVI AI Tutor Class 6–10",
      "description"      => "CBSE ke students ke liye SAAVI. NCERT exact syllabus. Hindi, Hinglish, English. Class 6 se 10 tak. All India.",
      "provider"         => ["@type" => "Organization", "name" => "Shrutam", "url" => "https://shrutam.ai"],
      "educationalLevel" => "Grade 6-10",
      "inLanguage"       => ["hi", "en"],
      "offers"           => [
        "@type"         => "Offer",
        "price"         => "199",
        "priceCurrency" => "INR",
        "availability"  => "https://schema.org/PreOrder",
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
          <li><a href="/boards/" style="color: var(--primary-light);">Boards</a></li>
          <li aria-hidden="true">›</li>
          <li aria-current="page" style="color: var(--text-secondary);">CBSE</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-6">
            <span class="badge badge-primary">🏫 CBSE Board</span>
            <span class="badge badge-accent">🟢 Free 7-Day Trial</span>
            <span class="pill">Class 6–10</span>
            <span class="pill">NCERT Syllabus</span>
            <span class="pill">All India</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            CBSE — All India Board, SAAVI Ke Saath
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            NCERT का हर अध्याय — हिंदी में, आसान भाषा में।
          </p>

          <p class="text-lg mb-6" style="color: var(--text-body);">
            CBSE India ka sabse bada board hai — 25,000+ schools, 2 crore+ students. SAAVI CBSE ke liye
            <strong style="color: var(--text-primary);">NCERT exact syllabus</strong> follow karti hai.
            Hindi medium, English medium, ya Hinglish — aap ki choice.
          </p>

          <p class="text-base mb-8" style="color: var(--text-secondary);">
            Class 6 se 10 tak. Science, Maths, Hindi, Social Science, English — sab subjects.
            <strong style="color: var(--accent);">₹199/month — poore India ke liye ek hi price.</strong>
          </p>

          <div class="flex flex-wrap gap-4">
            <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
            <a href="#subjects" class="btn btn-outline">Subjects Dekho ↓</a>
          </div>
        </div>

        <!-- Right: CBSE highlights card -->
        <div class="card" aria-label="CBSE board highlights">
          <div class="text-lg font-heading font-bold mb-5" style="color: var(--text-primary);">CBSE ke baare mein</div>
          <div class="flex flex-col gap-4">
            <div class="flex items-center gap-3">
              <span class="text-xl">📚</span>
              <div>
                <div class="font-bold text-sm" style="color: var(--text-primary);">NCERT Exact Syllabus</div>
                <p class="text-xs" style="color: var(--text-muted);">CBSE ke prescribed NCERT textbooks ka har chapter cover hota hai — koi bhi nahi chhoota.</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xl">🌐</span>
              <div>
                <div class="font-bold text-sm" style="color: var(--text-primary);">Hindi + English Medium</div>
                <p class="text-xs" style="color: var(--text-muted);">CBSE Hindi medium aur English medium dono students ke liye — SAAVI dono mein explain karti hai.</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xl">🎯</span>
              <div>
                <div class="font-bold text-sm" style="color: var(--text-primary);">Theory + Internal Assessment</div>
                <p class="text-xs" style="color: var(--text-muted);">CBSE Class 10 Board exam aur Internal Assessment dono ke liye ready karta hai SAAVI.</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xl">♿</span>
              <div>
                <div class="font-bold text-sm" style="color: var(--accent);">Blind Mode — FREE Forever</div>
                <p class="text-xs" style="color: var(--text-muted);">Visually impaired CBSE students ke liye hamesha free — poora NCERT audio mein.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 2: CBSE STATS
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="stats-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-accent mb-4">📊 CBSE in Numbers</span>
        <h2 id="stats-heading" class="text-3xl font-heading font-bold mb-3">India Ka Sabse Bada Board</h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          CBSE ka reach poore India mein — SAAVI bhi har jagah ready hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">
        <div class="card text-center animate-on-scroll" style="border-left: 4px solid var(--primary);">
          <div class="stat-number mb-2">25,000+</div>
          <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Schools</div>
          <p class="text-sm" style="color: var(--text-secondary);">India aur 28 countries mein CBSE affiliated schools.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-left: 4px solid var(--accent);">
          <div class="stat-number mb-2">2 Cr+</div>
          <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Students</div>
          <p class="text-sm" style="color: var(--text-secondary);">Har saal Class 10 aur 12 exam dene wale students.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-left: 4px solid var(--success);">
          <div class="stat-number mb-2">5</div>
          <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Core Subjects</div>
          <p class="text-sm" style="color: var(--text-secondary);">Science, Maths, Hindi, Social Science, English — sab SAAVI mein.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 3: CHAPTER COUNT & EXAM PATTERN
       ============================================================ -->
  <section class="section" aria-labelledby="chapters-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-primary mb-4">📋 NCERT Coverage</span>
        <h2 id="chapters-heading" class="text-3xl font-heading font-bold mb-3">CBSE NCERT — Chapter Count</h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Class 6 se 10 tak. Science aur Maths ke chapters — SAAVI sab cover karti hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-4xl mx-auto">

        <!-- Science chapters -->
        <div class="card" style="border-top: 4px solid var(--primary);">
          <div class="text-2xl mb-3">🔬</div>
          <div class="font-heading font-bold text-lg mb-4" style="color: var(--text-primary);">Science — NCERT Chapters</div>
          <div class="flex flex-col gap-2">
            <?php
            $sciChapters = [6 => 16, 7 => 13, 8 => 15, 9 => 12, 10 => 13];
            foreach ($sciChapters as $cls => $count) {
              echo '<div class="flex items-center justify-between text-sm py-1" style="border-bottom: 1px solid var(--border-subtle);">';
              echo '<span style="color: var(--text-body);">Class ' . $cls . '</span>';
              echo '<span class="font-bold" style="color: var(--primary-light);">' . $count . ' chapters</span>';
              echo '</div>';
            }
            ?>
            <div class="flex items-center justify-between text-sm py-1 mt-1">
              <span class="font-bold" style="color: var(--text-primary);">Total</span>
              <span class="font-bold" style="color: var(--accent);">69 chapters</span>
            </div>
          </div>
        </div>

        <!-- Maths chapters -->
        <div class="card" style="border-top: 4px solid var(--accent);">
          <div class="text-2xl mb-3">📐</div>
          <div class="font-heading font-bold text-lg mb-4" style="color: var(--text-primary);">Mathematics — NCERT Chapters</div>
          <div class="flex flex-col gap-2">
            <?php
            $mathsChapters = [6 => 14, 7 => 15, 8 => 16, 9 => 15, 10 => 15];
            foreach ($mathsChapters as $cls => $count) {
              echo '<div class="flex items-center justify-between text-sm py-1" style="border-bottom: 1px solid var(--border-subtle);">';
              echo '<span style="color: var(--text-body);">Class ' . $cls . '</span>';
              echo '<span class="font-bold" style="color: var(--accent);">' . $count . ' chapters</span>';
              echo '</div>';
            }
            ?>
            <div class="flex items-center justify-between text-sm py-1 mt-1">
              <span class="font-bold" style="color: var(--text-primary);">Total</span>
              <span class="font-bold" style="color: var(--primary-light);">75 chapters</span>
            </div>
          </div>
        </div>

      </div>

      <!-- CBSE Exam Pattern -->
      <div class="max-w-3xl mx-auto mt-10 p-6 rounded-2xl" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
        <div class="font-heading font-bold text-lg mb-4" style="color: var(--text-primary);">CBSE Class 10 — Exam Pattern</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div class="p-4 rounded-xl" style="background: var(--bg-elevated);">
            <div class="font-bold text-sm mb-1" style="color: var(--text-primary);">Theory (Board Exam)</div>
            <div class="stat-number text-3xl mb-1">80</div>
            <p class="text-xs" style="color: var(--text-muted);">Marks — Written exam. SAAVI theory clarity aur exam-ready answers sikhati hai.</p>
          </div>
          <div class="p-4 rounded-xl" style="background: var(--bg-elevated);">
            <div class="font-bold text-sm mb-1" style="color: var(--text-primary);">Internal Assessment</div>
            <div class="stat-number text-3xl mb-1">20</div>
            <p class="text-xs" style="color: var(--text-muted);">Marks — Periodic tests, practicals, portfolio. SAAVI revision aur mock tests se ready karta hai.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 4: SUBJECTS
       ============================================================ -->
  <section id="subjects" class="section section-dark" aria-labelledby="subjects-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-accent mb-4">📖 All Subjects</span>
        <h2 id="subjects-heading" class="text-3xl font-heading font-bold mb-3">CBSE Ke Sab Subjects — SAAVI Mein</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Class 6–10 ke liye. Sab NCERT aligned.</p>
      </div>

      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 max-w-4xl mx-auto">
        <?php
        $subjects_list = [
          ["🔬", "Science",         "/subjects/science/",         "69 chapters, Class 6–10"],
          ["📐", "Mathematics",     "/subjects/mathematics/",     "Step-by-step solutions"],
          ["📝", "Hindi",           "/subjects/hindi/",           "Vyakaran aur sahitya"],
          ["🌏", "Social Science",  "/subjects/social-science/",  "History, geo, civics"],
          ["🗣️", "Spoken English",  "/subjects/spoken-english/",  "Bina darr ke bolo"],
        ];
        foreach ($subjects_list as [$icon, $name, $href, $desc]) {
          echo <<<HTML
        <a href="{$href}" class="card text-center animate-on-scroll hover:no-underline" style="border-top: 4px solid var(--primary); text-decoration: none;">
          <div class="text-3xl mb-3">{$icon}</div>
          <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">{$name}</div>
          <p class="text-xs" style="color: var(--text-muted);">{$desc}</p>
        </a>
        HTML;
        }
        ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 5: WHY SAAVI FOR CBSE
       ============================================================ -->
  <section class="section" aria-labelledby="why-heading">
    <div class="container">
      <div class="text-center mb-10">
        <h2 id="why-heading" class="text-3xl font-heading font-bold mb-3">CBSE Students Ke Liye SAAVI Kyun?</h2>
        <p class="text-xl font-heading" style="color: var(--accent);">
          "NCERT samjho — board mein top karo."
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl mx-auto">
        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">🤖</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">AI Personalization</div>
            <p class="text-sm" style="color: var(--text-secondary);">Har student ka pace alag hota hai. SAAVI tumhare speed ko samjhti hai aur accordingly padhati hai — koi ek size sab ke liye nahi.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">🗣️</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Hindi Medium Full Support</div>
            <p class="text-sm" style="color: var(--text-secondary);">CBSE Hindi medium students ke liye SAAVI pure Hindi mein padhati hai. English medium ke liye English. Hinglish bhi option hai.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">📸</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Photo Doubt Solver</div>
            <p class="text-sm" style="color: var(--text-secondary);">NCERT exercise ka koi bhi question — photo khicho, SAAVI step-by-step explain kar degi. Raat 2 baje bhi.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">📋</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">NCERT Exact Alignment</div>
            <p class="text-sm" style="color: var(--text-secondary);">CBSE prescribed NCERT chapters ka ek-ek topic cover hota hai. Koi chapter miss nahi hoga, koi topic skip nahi hoga.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">📝</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Board Exam Pattern Practice</div>
            <p class="text-sm" style="color: var(--text-secondary);">CBSE Class 10 board exam ke MCQ, Short Answer, Long Answer — SAAVI sab formats mein practice karwati hai.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">💰</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">₹199 Mein Sab Subjects</div>
            <p class="text-sm" style="color: var(--text-secondary);">CBSE coaching centers ₹5,000–15,000/month charge karte hain. SAAVI mein ek hi subscription mein sab subjects — ₹199/month.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 6: CLASSES
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="classes-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-primary mb-4">📚 Classes 6–10</span>
        <h2 id="classes-heading" class="text-3xl font-heading font-bold mb-3">Kaunsi Class Mein Ho?</h2>
        <p class="text-lg" style="color: var(--text-secondary);">SAAVI Class 6 se 10 tak sab ke liye available hai.</p>
      </div>

      <div class="flex flex-wrap justify-center gap-4">
        <?php
        foreach ([6, 7, 8, 9, 10] as $cls) {
          $href   = "/classes/class-{$cls}/";
          $active = $cls === 10 ? 'btn-primary' : 'btn-outline';
          echo '<a href="' . $href . '" class="btn ' . $active . ' text-lg px-8 py-3">Class ' . $cls . '</a>';
        }
        ?>
      </div>

      <p class="text-center mt-6 text-sm" style="color: var(--text-muted);">
        Class 10 fully ready. Class 6–9 chapters coming soon — join waitlist for early access.
      </p>
    </div>
  </section>

  <!-- ============================================================
       SECTION 7: CTA
       ============================================================ -->
  <section class="section" aria-labelledby="cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-accent mb-4">🎯 CBSE Ready</span>
        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          CBSE Ka Har Student SAAVI Ka Haqdaar Hai
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-6" style="color: var(--accent);">
          NCERT समझो — बोर्ड में टॉप करो।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist mein join karo — launch hone par turant access milega. 7 din free. Koi commitment nahi.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="/waitlist/" class="btn btn-primary text-lg px-8 py-4">Join Waitlist Free →</a>
          <a href="/classes/class-10/" class="btn btn-outline text-lg px-8 py-4">Class 10 Chapters ↓</a>
        </div>
        <p class="mt-4 text-sm" style="color: var(--text-muted);">
          ♿ Visually impaired CBSE students ke liye hamesha FREE.
        </p>
      </div>
    </div>
  </section>

</main>

<?php include '../../partials/footer.php'; ?>
