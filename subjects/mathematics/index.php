<?php
$title       = "Mathematics AI Tutor Hindi | NCERT Maths Class 6-10 | Shrutam SAAVI";
$description = "Maths SAAVI ke saath — step by step solutions, Hindi mein. Algebra, Geometry, Trigonometry. Class 6-10. Photo doubt solver for handwritten problems.";
$canonical   = "https://shrutam.ai/subjects/mathematics/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"            => "Course",
      "name"             => "Mathematics — SAAVI AI Tutor Class 6–10",
      "description"      => "NCERT Maths Class 6 se 10 tak. Hindi mein step-by-step solutions. Algebra, Geometry, Trigonometry. Photo doubt solver. CG Board aur CBSE.",
      "provider"         => ["@type" => "Organization", "name" => "Shrutam", "url" => "https://shrutam.ai"],
      "educationalLevel" => "Grade 6-10",
      "inLanguage"       => ["hi", "en"],
      "hasCourseInstance" => [
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 6 Mathematics"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 7 Mathematics"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 8 Mathematics"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 9 Mathematics"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 10 Mathematics"],
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
        ["@type" => "ListItem", "position" => 1, "name" => "Home",        "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "Subjects",    "item" => "https://shrutam.ai/subjects/"],
        ["@type" => "ListItem", "position" => 3, "name" => "Mathematics", "item" => "https://shrutam.ai/subjects/mathematics/"],
      ],
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

// Topics per class
$topics = [
  6  => ["Number System", "Whole Numbers", "Integers", "Fractions & Decimals", "Basic Algebra", "Basic Geometry", "Mensuration", "Data Handling"],
  7  => ["Integers", "Fractions & Decimals", "Rational Numbers", "Simple Equations", "Lines & Angles", "Triangles", "Congruence", "Comparing Quantities", "Mensuration"],
  8  => ["Rational Numbers", "Linear Equations", "Quadrilaterals", "Practical Geometry", "Data Handling", "Squares & Square Roots", "Cubes & Cube Roots", "Comparing Quantities", "Algebraic Expressions", "Mensuration", "Exponents", "Factorisation"],
  9  => ["Number Systems", "Polynomials", "Coordinate Geometry", "Linear Equations in 2 Variables", "Euclid's Geometry", "Lines & Angles", "Triangles", "Quadrilaterals", "Circles", "Heron's Formula", "Surface Areas & Volumes", "Statistics"],
  10 => ["Real Numbers", "Polynomials", "Linear Equations (Pair)", "Quadratic Equations", "Arithmetic Progressions", "Triangles", "Coordinate Geometry", "Trigonometry", "Circles", "Areas", "Surface Areas & Volumes", "Statistics", "Probability"],
];

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
          <li aria-current="page" style="color: var(--text-secondary);">Mathematics</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-6">
            <span class="badge badge-primary">📐 Mathematics</span>
            <span class="badge badge-accent">Class 6–10</span>
            <span class="pill">NCERT</span>
            <span class="pill">Step-by-Step</span>
            <span class="pill">Photo Doubt Solver</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Mathematics — Step by Step, SAAVI Ke Saath
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            गणित मुश्किल नहीं — बस समझना है।
          </p>

          <p class="text-lg mb-6" style="color: var(--text-body);">
            Maths mushkil lagti hai kyunki sirf <strong style="color: var(--text-primary);">formula yaad karwaya jaata hai</strong> —
            samjhaya nahi jaata. SAAVI step-by-step explain karti hai — har step ka reason bhi batati hai.
            Class 6 se 10 tak. Hindi mein.
          </p>

          <p class="text-base mb-8" style="color: var(--text-secondary);">
            Haath se likha hua question bhi photo khicho — SAAVI samjha degi.
            <strong style="color: var(--accent);">Photo doubt solver — 24/7, free for all subscribers.</strong>
          </p>

          <div class="flex flex-wrap gap-4">
            <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
            <a href="#topics" class="btn btn-outline">Topics Dekho ↓</a>
          </div>
        </div>

        <!-- Right: Maths chat demo -->
        <div class="card" aria-label="SAAVI Mathematics teaching demonstration">
          <div class="flex items-center gap-3 pb-4 mb-4" style="border-bottom: 1px solid var(--border-subtle);">
            <div class="w-10 h-10 rounded-full flex items-center justify-center text-xl" style="background: var(--primary-glow);">📐</div>
            <div>
              <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">SAAVI Didi — Maths Mode</div>
              <div class="text-xs" style="color: var(--success);">● Online — Class 10 Algebra</div>
            </div>
          </div>

          <div class="flex flex-col gap-3">
            <div class="chat-bubble chat-bubble-student">
              <p class="text-sm">Didi, quadratic equation solve karna samajh nahi aata. Formula toh yaad hai par kab use karna hai pata nahi.</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm mb-1"><strong style="color: var(--accent);">SAAVI:</strong> Chhodo formula — pehle ek simple sawal: tumhare school mein 5 rows hain, kuch benches hain. Total seats 120 hain. Rows se 3 zyada benches hain. Kitni benches?</p>
            </div>
            <div class="chat-bubble chat-bubble-student">
              <p class="text-sm">Ummm... agar benches = x toh rows = x - 3... toh x(x-3) = 120?</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm"><strong style="color: var(--accent);">Bilkul sahi!</strong> Yahi quadratic hai — x² - 3x - 120 = 0. Ab formula lagao — sirf ek step. Samajh aa gaya kahan se aaya?</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 2: TOPICS BY CLASS
       ============================================================ -->
  <section id="topics" class="section section-dark" aria-labelledby="topics-heading">
    <div class="container">
      <div class="text-center mb-8">
        <span class="badge badge-accent mb-4">📚 NCERT Topics</span>
        <h2 id="topics-heading" class="text-4xl font-heading font-bold mb-3">Class-wise Mathematics Topics</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Apni class chunlo — SAAVI har topic cover karti hai.</p>
      </div>

      <!-- Tab Bar -->
      <div class="flex flex-wrap justify-center gap-3 mb-8" role="tablist" aria-label="Maths topics by class">
        <?php foreach ([6, 7, 8, 9, 10] as $cls): ?>
          <button
            role="tab"
            aria-selected="<?= $cls === 10 ? 'true' : 'false' ?>"
            aria-controls="class-panel-<?= $cls ?>"
            data-class-tab="<?= $cls ?>"
            class="btn <?= $cls === 10 ? 'btn-primary' : 'btn-outline' ?>"
            style="min-width: 100px;"
          >
            Class <?= $cls ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Topic panels -->
      <?php foreach ($topics as $cls => $topicList): ?>
        <div
          id="class-panel-<?= $cls ?>"
          role="tabpanel"
          data-class-panel="<?= $cls ?>"
          aria-labelledby="class-tab-<?= $cls ?>"
          <?= $cls !== 10 ? 'hidden' : '' ?>
        >
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
            <?php foreach ($topicList as $i => $topic): ?>
              <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
                <div class="flex items-start gap-3">
                  <span class="text-xs font-bold px-2 py-1 rounded-lg flex-shrink-0" style="background: rgba(52,211,153,0.12); color: var(--accent);">
                    <?= $i + 1 ?>
                  </span>
                  <div class="font-heading font-bold text-sm" style="color: var(--text-primary);"><?= htmlspecialchars($topic) ?></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <p class="text-center mt-6 text-sm" style="color: var(--text-muted);">
            Class <?= $cls ?> Maths — <?= count($topicList) ?> major topics • Step-by-step • Hindi mein
          </p>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Tab switch script -->
  <script>
    (function () {
      var tabs   = document.querySelectorAll('[data-class-tab]');
      var panels = document.querySelectorAll('[data-class-panel]');

      tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
          var target = tab.getAttribute('data-class-tab');

          tabs.forEach(function (t) {
            t.setAttribute('aria-selected', 'false');
            t.classList.remove('btn-primary');
            t.classList.add('btn-outline');
          });

          panels.forEach(function (p) { p.hidden = true; });

          tab.setAttribute('aria-selected', 'true');
          tab.classList.remove('btn-outline');
          tab.classList.add('btn-primary');

          var panel = document.querySelector('[data-class-panel="' + target + '"]');
          if (panel) { panel.hidden = false; }
        });
      });
    })();
  </script>

  <!-- ============================================================
       SECTION 3: KEY FEATURES
       ============================================================ -->
  <section class="section" aria-labelledby="features-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-primary mb-4">✨ Maths Ke Liye</span>
        <h2 id="features-heading" class="text-3xl font-heading font-bold mb-3">SAAVI Maths Ko Special Kya Banati Hai?</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Sirf formulas nahi — asli samajh.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">📸</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Photo Doubt Solver</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Haath se likhe question ki photo khicho — SAAVI step-by-step solve karke explain kar degi. Koi bhi NCERT exercise instant clear.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">🔢</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Step-by-Step Solutions</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Har step explain hoti hai — sirf answer nahi. "Yeh step kyun?" ka jawab bhi deta hai SAAVI. Samajhte samajhte problem solve hoti hai.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">📋</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Formula Cards</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Har chapter ke key formulas — audio mein bhi, text mein bhi. Revision ke time quick reference. Blind students ke liye bhi accessible.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">🎯</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">4-Level Mock Exams</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Easy → Medium → Hard → Board Level. Apni taiyari check karo. SAAVI batati hai kahan galti hui aur isko dobara explain karti hai.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">🌐</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Hindi Mein Explain</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            "Integrate karo" nahi — "ek chhoti slab ka area nikaalo, phir sab jodo" — SAAVI isi tarah sikhati hai. Concept pakka hota hai.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">🔁</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Unlimited Practice</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Ek type ke 10 alag problems. SAAVI generate karti rehti hai — jab tak concept crystal clear na ho jaye. Koi judgment nahi.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 4: KEY TOPICS — CLASS 10
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="class10-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-accent mb-4">🎓 Class 10 Focus</span>
        <h2 id="class10-heading" class="text-3xl font-heading font-bold mb-3">Class 10 — Board Mein Highest Weight Wale Topics</h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          CBSE aur CG Board Class 10 Maths mein yeh topics board mein sabse zyada marks laate hain.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-3xl mx-auto">
        <?php
        $highWeight = [
          ["Trigonometry",              "Sin, Cos, Tan — aur unke applications. Height and Distance problems."],
          ["Arithmetic Progressions",   "AP ke terms, sum, nth term — board mein guaranteed questions."],
          ["Quadratic Equations",       "Factorisation, completing square, formula — teen methods."],
          ["Coordinate Geometry",       "Distance formula, section formula, area of triangle."],
          ["Surface Areas & Volumes",   "Cylinder, cone, sphere, hemisphere — combination problems bhi."],
          ["Statistics & Probability",  "Mean, median, mode, ogive — aur basic probability."],
        ];
        foreach ($highWeight as [$topic, $desc]) {
          echo <<<HTML
        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">📌</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">{$topic}</div>
            <p class="text-sm" style="color: var(--text-secondary);">{$desc}</p>
          </div>
        </div>
        HTML;
        }
        ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 5: CTA
       ============================================================ -->
  <section class="section" aria-labelledby="cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-primary mb-4">📐 Maths Ready</span>
        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          Maths Ab Mushkil Nahi — SAAVI Ke Saath
        </h2>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          ₹199/month. 7 din free trial. Class 6 se 10 tak — step-by-step, Hindi mein. Abhi join karo.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="/waitlist/" class="btn btn-primary text-lg px-8 py-4">Join Waitlist Free →</a>
          <a href="/classes/class-10/" class="btn btn-outline text-lg px-8 py-4">Class 10 Chapters ↓</a>
        </div>
        <p class="mt-4 text-sm" style="color: var(--text-muted);">
          ♿ Visually impaired students ke liye Maths Blind Mode hamesha FREE.
        </p>
      </div>
    </div>
  </section>

</main>

<?php include '../../partials/footer.php'; ?>
