<?php
$title       = "Class 7 AI Tutor Hindi | NCERT Science Maths | CG Board CBSE | Shrutam SAAVI";
$description = "Class 7 Science, Maths SAAVI ke saath. Complete NCERT syllabus. CG Board aur CBSE. Hindi, Hinglish, English, Telugu, Marathi mein. ₹199/month. Free 7 day trial.";
$canonical   = "https://shrutam.ai/classes/class-7/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"           => "Course",
      "name"            => "Class 7 — SAAVI AI Tutor",
      "description"     => "Class 7 Science aur Maths SAAVI ke saath. NCERT syllabus. CG Board aur CBSE. Hindi, Hinglish, English, Telugu, Marathi mein.",
      "provider"        => [
        "@type" => "Organization",
        "name"  => "Shrutam (Aarambha)",
        "url"   => "https://shrutam.ai",
      ],
      "educationalLevel" => "Grade 7",
      "inLanguage"       => ["hi", "en", "te", "mr"],
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
        ["@type" => "ListItem", "position" => 1, "name" => "Home",    "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "Classes", "item" => "https://shrutam.ai/classes/"],
        ["@type" => "ListItem", "position" => 3, "name" => "Class 7", "item" => "https://shrutam.ai/classes/class-7/"],
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
          <li><a href="/classes/" style="color: var(--primary-light);">Classes</a></li>
          <li aria-hidden="true">›</li>
          <li aria-current="page" style="color: var(--text-secondary);">Class 7</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-6">
            <span class="badge badge-primary">📚 Class 7</span>
            <span class="badge badge-accent">🟢 Free 7-Day Trial</span>
            <span class="pill">CG Board ✅</span>
            <span class="pill">CBSE ✅</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Class 7 — Ek Kadam Aur Aage
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            एक कदम और आगे — SAAVI दीदी के साथ।
          </p>

          <p class="text-lg mb-8" style="color: var(--text-body);">
            SAAVI didi tumhare saath poora Class 7 ka syllabus cover karti hai — Science aur Maths.
            <strong style="color: var(--text-primary);">NCERT exact chapters</strong>, CG Board aur CBSE dono ke liye.
            Hindi, Hinglish, ya jis bhi language mein tumhe aasan lage.
          </p>

          <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
            <div class="text-center animate-on-scroll">
              <div class="stat-number">33</div>
              <div class="text-xs mt-1" style="color: var(--text-muted);">Chapters</div>
            </div>
            <div class="text-center animate-on-scroll">
              <div class="stat-number">5</div>
              <div class="text-xs mt-1" style="color: var(--text-muted);">Languages</div>
            </div>
            <div class="text-center animate-on-scroll">
              <div class="stat-number">₹199</div>
              <div class="text-xs mt-1" style="color: var(--text-muted);">/Month</div>
            </div>
            <div class="text-center animate-on-scroll">
              <div class="stat-number">7</div>
              <div class="text-xs mt-1" style="color: var(--text-muted);">Day Free Trial</div>
            </div>
          </div>

          <div class="flex flex-wrap gap-4">
            <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
            <a href="/saavi/" class="btn btn-outline">Meet SAAVI ↓</a>
          </div>
        </div>

        <!-- Right: Board support card -->
        <div class="card" aria-label="Board support information">
          <div class="text-lg font-heading font-bold mb-4" style="color: var(--text-primary);">Board Support</div>

          <div class="flex flex-col gap-4">
            <div class="flex items-start gap-4 p-4 rounded-xl" style="background: var(--bg-elevated);">
              <span class="text-2xl">🏫</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--success);">CG Board (CGBSE) ✅</div>
                <p class="text-sm mt-1" style="color: var(--text-secondary);">
                  Chhattisgarh Board ka exact syllabus. Hindi medium primary. Raipur, Bilaspur, Durg — sab ke liye.
                </p>
              </div>
            </div>

            <div class="flex items-start gap-4 p-4 rounded-xl" style="background: var(--bg-elevated);">
              <span class="text-2xl">📋</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--success);">CBSE ✅</div>
                <p class="text-sm mt-1" style="color: var(--text-secondary);">
                  NCERT-based syllabus. English, Hindi dono medium. Pan-India coverage.
                </p>
              </div>
            </div>

            <div class="flex items-start gap-4 p-4 rounded-xl" style="background: var(--bg-elevated); border: 1px solid var(--accent);">
              <span class="text-2xl">♿</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--accent);">Blind Mode — FREE Forever</div>
                <p class="text-sm mt-1" style="color: var(--text-secondary);">
                  Visually impaired students ke liye 100% free. Sirf sunke poora syllabus ready.
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 2: SCIENCE CHAPTERS
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="science-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-primary mb-4">🔬 Science</span>
        <h2 id="science-heading" class="text-4xl font-heading font-bold mb-3">Class 7 Science — Poore Chapters</h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          NCERT exact chapter names. SAAVI har chapter ko experiments aur real examples se samjhati hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        <?php
        $science_chapters = [
          [1,  "Nutrition in Plants",                                  "Paudhon mein Poshan — photosynthesis aur nutrition"],
          [2,  "Nutrition in Animals",                                 "Jantuo mein Poshan — digestion aur absorption"],
          [3,  "Fibre to Fabric",                                      "Reksha se Kapda — wool, silk aur synthetic fibres"],
          [4,  "Heat",                                                  "Ushma — conduction, convection, radiation"],
          [5,  "Acids Bases and Salts",                                "Aml, Kshaar aur Lavan — indicators aur pH"],
          [6,  "Physical and Chemical Changes",                        "Bhautik aur Rasayanik Parivartan — reversible vs irreversible"],
          [7,  "Weather Climate and Adaptations of Animals to Climate","Mausam, Jalvayu aur Pranio ki Anukoolata"],
          [8,  "Winds Storms and Cyclones",                           "Havaen, Toofan aur Chakravayt — air pressure"],
          [9,  "Soil",                                                  "Mitti — types, layers aur importance"],
          [10, "Respiration in Organisms",                             "Jeevon mein Shwasan — aerobic aur anaerobic"],
          [11, "Transportation in Animals and Plants",                 "Pranio aur Paudhon mein Parivahan — blood, xylem"],
          [12, "Reproduction in Plants",                               "Paudhon mein Jananotsarg — sexual aur asexual"],
          [13, "Motion and Time",                                      "Gati aur Samay — speed, distance, time graphs"],
          [14, "Electric Current and Its Effects",                     "Vidyut Dhara aur Uske Prabhav — heating, magnetic"],
          [15, "Light",                                                 "Prakash — reflection, refraction, lenses"],
          [16, "Water: A Precious Resource",                           "Paani: Ek Anmol Sansadhan — conservation"],
          [17, "Forests: Our Lifeline",                                "Jangal: Hamaari Jeevan Rekha — biodiversity"],
          [18, "Wastewater Story",                                     "Vyarth Jal Ki Kahani — sewage treatment"],
        ];

        foreach ($science_chapters as [$num, $name, $hinglish]) {
          echo <<<HTML
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
          <div class="flex items-start gap-3">
            <span class="text-xs font-bold px-2 py-1 rounded-lg flex-shrink-0" style="background: var(--primary-glow); color: var(--primary-light);">Ch {$num}</span>
            <div>
              <div class="font-heading font-bold text-sm mb-1" style="color: var(--text-primary);">{$name}</div>
              <div class="text-xs" style="color: var(--text-muted);">{$hinglish}</div>
            </div>
          </div>
        </div>
        HTML;
        }
        ?>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 3: MATHS CHAPTERS
       ============================================================ -->
  <section class="section" aria-labelledby="maths-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-accent mb-4">📐 Mathematics</span>
        <h2 id="maths-heading" class="text-4xl font-heading font-bold mb-3">Class 7 Maths — Poore Chapters</h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          SAAVI Maths ko step-by-step, Hindi mein, real examples ke saath samjhati hai. Formulas rote nahi — logic samjho.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        <?php
        $maths_chapters = [
          [1,  "Integers",                        "Poornanko — negative numbers aur operations"],
          [2,  "Fractions and Decimals",           "Bhinnaen aur Dashamlav — multiply aur divide"],
          [3,  "Data Handling",                    "Aankaron ka Prabandhan — mean, mode, median, bar graphs"],
          [4,  "Simple Equations",                 "Saral Samikaran — variables aur solving"],
          [5,  "Lines and Angles",                 "Rekhaen aur Kon — types aur properties"],
          [6,  "The Triangle and its Properties",  "Tribhuj aur Uske Gun — angles aur sides"],
          [7,  "Congruence of Triangles",          "Tribhujon ki Sarvangsamta — SAS, ASA, SSS"],
          [8,  "Comparing Quantities",             "Matraon ki Tulna — ratio, percentage, profit-loss"],
          [9,  "Rational Numbers",                 "Parimey Sankhyaen — fractions on number line"],
          [10, "Practical Geometry",              "Vyavaharik Rekhaganit — constructions"],
          [11, "Perimeter and Area",               "Paridhi aur Kshetrafal — rectangle, triangle, circle"],
          [12, "Algebraic Expressions",            "Beejganitiyan Vyanjak — terms aur operations"],
          [13, "Exponents and Powers",             "Ghatak aur Shaktiyan — large numbers in short form"],
          [14, "Symmetry",                         "Samamiti — line symmetry aur rotational"],
          [15, "Visualising Solid Shapes",         "Thiis Aakaron ki Kalpana — 3D shapes aur nets"],
        ];

        foreach ($maths_chapters as [$num, $name, $hinglish]) {
          echo <<<HTML
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
          <div class="flex items-start gap-3">
            <span class="text-xs font-bold px-2 py-1 rounded-lg flex-shrink-0" style="background: var(--accent-glow, rgba(52,211,153,0.15)); color: var(--accent);">Ch {$num}</span>
            <div>
              <div class="font-heading font-bold text-sm mb-1" style="color: var(--text-primary);">{$name}</div>
              <div class="text-xs" style="color: var(--text-muted);">{$hinglish}</div>
            </div>
          </div>
        </div>
        HTML;
        }
        ?>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 4: LANGUAGES
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="languages-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-accent mb-4">🗣️ 5 Languages</span>
        <h2 id="languages-heading" class="text-4xl font-heading font-bold mb-3">Jo Tumhari Boli — Usi Mein Padho</h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          SAAVI 5 languages mein sikhati hai. Jis bhaasha mein tumhe aasani ho — usi mein.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 max-w-5xl mx-auto">

        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-3">🇮🇳</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Hindi</div>
          <p lang="hi" class="text-sm font-devanagari" style="color: var(--text-secondary);">शुद्ध हिंदी में समझाती है SAAVI।</p>
        </div>

        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-3">🤝</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Hinglish</div>
          <p class="text-sm" style="color: var(--text-secondary);">Hindi + English mix — jaise dost bolte hain.</p>
        </div>

        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-3">🌐</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">English</div>
          <p class="text-sm" style="color: var(--text-secondary);">Full English medium — CBSE students ke liye.</p>
        </div>

        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-3">🏛️</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Telugu</div>
          <p class="text-sm" style="color: var(--text-secondary);">Telugu medium students ke liye bhi available.</p>
        </div>

        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-3">🌺</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Marathi</div>
          <p class="text-sm" style="color: var(--text-secondary);">Maharashtra ke students ke liye Marathi mein.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 5: CTA
       ============================================================ -->
  <section class="section" aria-labelledby="cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-accent mb-4">🎯 Aage Badho</span>
        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          Class 7 SAAVI Ke Saath Ek Kadam Aur Aage Badho
        </h2>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          ₹199/month. 7 din free trial. Koi credit card nahi chahiye. Abhi join karo — launch hone par turant access milega.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="/waitlist/" class="btn btn-primary text-lg px-8 py-4">Join Waitlist Free →</a>
          <a href="/pricing/" class="btn btn-outline text-lg px-8 py-4">Pricing Dekho</a>
        </div>
        <p class="mt-4 text-sm" style="color: var(--text-muted);">
          ♿ Visually impaired students ke liye hamesha FREE.
        </p>
      </div>
    </div>
  </section>

</main>

<?php include '../../partials/footer.php'; ?>
