<?php
$title       = "Science AI Tutor Hindi | NCERT Science Class 6-10 | Shrutam SAAVI";
$description = "SAAVI se Science padho Hindi mein. Class 6 se 10 tak. NCERT chapters, experiments, diagrams — sab samjhati hai.";
$canonical   = "https://shrutam.ai/subjects/science/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"            => "Course",
      "name"             => "Science — SAAVI AI Tutor Class 6–10",
      "description"      => "NCERT Science Class 6 se 10 tak. Hindi mein. Experiments, diagrams, verbal descriptions. CG Board aur CBSE.",
      "provider"         => ["@type" => "Organization", "name" => "Shrutam", "url" => "https://shrutam.ai"],
      "educationalLevel" => "Grade 6-10",
      "inLanguage"       => ["hi", "en", "te", "mr"],
      "hasCourseInstance" => [
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 6 Science"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 7 Science"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 8 Science"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 9 Science"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 10 Science"],
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
        ["@type" => "ListItem", "position" => 3, "name" => "Science",  "item" => "https://shrutam.ai/subjects/science/"],
      ],
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

// Chapter data per class
$chapters = [
  6 => [
    "Food: Where Does It Come From?",
    "Components of Food",
    "Fibre to Fabric",
    "Sorting Materials into Groups",
    "Separation of Substances",
    "Changes Around Us",
    "Getting to Know Plants",
    "Body Movements",
    "The Living Organisms and Their Surroundings",
    "Motion and Measurement of Distances",
    "Light, Shadows and Reflections",
    "Electricity and Circuits",
    "Fun with Magnets",
    "Water",
    "Air Around Us",
    "Garbage In, Garbage Out",
  ],
  7 => [
    "Nutrition in Plants",
    "Nutrition in Animals",
    "Heat",
    "Acids, Bases and Salts",
    "Physical and Chemical Changes",
    "Respiration in Organisms",
    "Transportation in Animals and Plants",
    "Reproduction in Plants",
    "Motion and Time",
    "Electric Current and Its Effects",
    "Light",
    "Forests: Our Lifeline",
    "Wastewater Story",
  ],
  8 => [
    "Crop Production and Management",
    "Microorganisms: Friend and Foe",
    "Coal and Petroleum",
    "Combustion and Flame",
    "Conservation of Plants and Animals",
    "Reproduction in Animals",
    "Reaching the Age of Adolescence",
    "Force and Pressure",
    "Friction",
    "Sound",
    "Chemical Effects of Electric Current",
    "Some Natural Phenomena",
    "Light",
    "Stars and the Solar System",
    "Pollution of Air and Water",
  ],
  9 => [
    "Matter in Our Surroundings",
    "Is Matter Around Us Pure?",
    "Atoms and Molecules",
    "Structure of the Atom",
    "The Fundamental Unit of Life",
    "Tissues",
    "Motion",
    "Force and Laws of Motion",
    "Gravitation",
    "Work and Energy",
    "Sound",
    "Improvement in Food Resources",
  ],
  10 => [
    "Chemical Reactions and Equations",
    "Acids, Bases and Salts",
    "Metals and Non-metals",
    "Carbon and its Compounds",
    "Life Processes",
    "Control and Coordination",
    "How do Organisms Reproduce?",
    "Heredity",
    "Light — Reflection and Refraction",
    "The Human Eye and the Colourful World",
    "Electricity",
    "Magnetic Effects of Electric Current",
    "Our Environment",
  ],
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
          <li aria-current="page" style="color: var(--text-secondary);">Science</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-6">
            <span class="badge badge-primary">🔬 Science</span>
            <span class="badge badge-accent">Class 6–10</span>
            <span class="pill">NCERT</span>
            <span class="pill">CG Board</span>
            <span class="pill">CBSE</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Science — SAAVI Ke Saath Experiments Se Samjho
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            विज्ञान रटो मत — समझो।
          </p>

          <p class="text-lg mb-6" style="color: var(--text-body);">
            SAAVI Science ko <strong style="color: var(--text-primary);">experiment pehle, theory baad mein</strong> style mein padhati hai.
            Class 6 se 10 tak. Hindi, Hinglish, ya jis bhi language mein tumhe aasaan lage.
            NCERT exact chapters — CG Board aur CBSE dono ke liye.
          </p>

          <p class="text-base mb-8" style="color: var(--text-secondary);">
            Diagrams aur figures jo aankh se nahi dekhe ja sakte? SAAVI unhe <strong style="color: var(--accent);">words mein describe karti hai</strong> —
            blind students ke liye bhi poora Science accessible hai.
          </p>

          <div class="flex flex-wrap gap-4">
            <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
            <a href="#chapters" class="btn btn-outline">Chapters Dekho ↓</a>
          </div>
        </div>

        <!-- Right: Science chat demo -->
        <div class="card" aria-label="SAAVI Science teaching demonstration">
          <div class="flex items-center gap-3 pb-4 mb-4" style="border-bottom: 1px solid var(--border-subtle);">
            <div class="w-10 h-10 rounded-full flex items-center justify-center text-xl" style="background: var(--primary-glow);">🔬</div>
            <div>
              <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">SAAVI Didi — Science Mode</div>
              <div class="text-xs" style="color: var(--success);">● Online — Class 10 Physics</div>
            </div>
          </div>

          <div class="flex flex-col gap-3">
            <div class="chat-bubble chat-bubble-student">
              <p class="text-sm">Didi, Ohm's Law samajh nahi aata. Formula toh yaad hai par lagata kyun nahi?</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm mb-1"><strong style="color: var(--accent);">SAAVI:</strong> Arre, formula chhodo abhi! Ek kaam karo — socho tumhare ghar ka paani ka pipe.</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm">Mota pipe = zyada paani bahta hai. Patla pipe = kam paani. <strong style="color: var(--accent);">Resistance wahi patla pipe hai</strong> — bijli ke liye bhi aisa hi kaam karta hai.</p>
            </div>
            <div class="chat-bubble chat-bubble-student">
              <p class="text-sm">Oh! Toh V = IR mein R jitna kam hoga, current utna zyada?</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm"><strong style="color: var(--accent);">Bilkul sahi!</strong> Ab formula yaad ho gaya — kyunki samajh gaye. Yehi toh SAAVI ka kaam hai. ⚡</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 2: CLASS TABS — CHAPTERS
       ============================================================ -->
  <section id="chapters" class="section section-dark" aria-labelledby="chapters-heading">
    <div class="container">
      <div class="text-center mb-8">
        <span class="badge badge-accent mb-4">📚 NCERT Chapters</span>
        <h2 id="chapters-heading" class="text-4xl font-heading font-bold mb-3">Class-wise Science Chapters</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Apni class chunlo — SAAVI har chapter cover karti hai.</p>
      </div>

      <!-- Tab Bar -->
      <div class="flex flex-wrap justify-center gap-3 mb-8" role="tablist" aria-label="Science chapters by class">
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

      <!-- Chapter panels -->
      <?php foreach ($chapters as $cls => $chapterList): ?>
        <div
          id="class-panel-<?= $cls ?>"
          role="tabpanel"
          data-class-panel="<?= $cls ?>"
          aria-labelledby="class-tab-<?= $cls ?>"
          <?= $cls !== 10 ? 'hidden' : '' ?>
        >
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
            <?php foreach ($chapterList as $i => $chapter): ?>
              <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
                <div class="flex items-start gap-3">
                  <span class="text-xs font-bold px-2 py-1 rounded-lg flex-shrink-0" style="background: var(--primary-glow); color: var(--primary-light);">
                    Ch <?= $i + 1 ?>
                  </span>
                  <div class="font-heading font-bold text-sm" style="color: var(--text-primary);"><?= htmlspecialchars($chapter) ?></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <p class="text-center mt-6 text-sm" style="color: var(--text-muted);">
            Class <?= $cls ?> Science — <?= count($chapterList) ?> chapters • NCERT syllabus • Hindi, Hinglish, English
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

          panels.forEach(function (p) {
            p.hidden = true;
          });

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
       SECTION 3: KEY FEATURES FOR SCIENCE
       ============================================================ -->
  <section class="section" aria-labelledby="features-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-primary mb-4">✨ Science Ke Liye</span>
        <h2 id="features-heading" class="text-3xl font-heading font-bold mb-3">SAAVI Science Ko Special Kya Banati Hai?</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Sirf chapters nahi — poora Science experience.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">📸</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Photo Doubt Solver</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Question ki photo khicho — SAAVI Hindi mein explain kar degi. Textbook ka koi bhi diagram ya question instant solve.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">🎧</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--accent);">Verbal Diagram Descriptions</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Blind Mode mein SAAVI har diagram ko words mein describe karti hai. Human eye ka diagram, circuit ka layout — sab words mein.
          </p>
          <span class="badge badge-accent mt-3">♿ Blind Mode</span>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">📝</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Mock Exams</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Chapter ke baad mock test. Board exam pattern ke questions. Galti karo — SAAVI samjhati hai kahan galti hui.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">🧪</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Experiment-First Teaching</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Pehle ek simple experiment ya example batao, phir theory aao. Concept pakka ho jata hai aur bhoolte nahi.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">🔁</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Unlimited Revision</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Ek chapter 10 baar suno. Koi judgement nahi. SAAVI hamesha patient hai — aap ka pace, aap ka choice.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">🌐</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">5 Languages</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Hindi, Hinglish, English, Telugu, Marathi. Science ko apni bhaasha mein samjho — concepts zyada clear hote hain.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 4: HOW SAAVI TEACHES SCIENCE
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="method-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-accent mb-4">🎓 SAAVI Ka Tarika</span>
        <h2 id="method-heading" class="text-3xl font-heading font-bold mb-3">
          "Experiment Pehle, Theory Baad Mein"
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Rote learning se door — SAAVI Science ki har concept ko real life se jodte hue sikhati hai.
        </p>
      </div>

      <div class="max-w-3xl mx-auto flex flex-col gap-6">

        <div class="flex items-start gap-5 animate-on-scroll">
          <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold flex-shrink-0" style="background: var(--primary-glow); color: var(--primary-light);">1</div>
          <div>
            <div class="font-heading font-bold text-lg mb-1" style="color: var(--text-primary);">Pehle: Real-Life Hook</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Har chapter ek real example se shuru hota hai — Mahanadi ka paani, dhaan ki fasal, Raipur ki bijli, mandir ki ghanti.
              Students pehle relate karte hain, phir concept aata hai.
            </p>
          </div>
        </div>

        <div class="flex items-start gap-5 animate-on-scroll">
          <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold flex-shrink-0" style="background: var(--accent-glow, rgba(52,211,153,0.15)); color: var(--accent);">2</div>
          <div>
            <div class="font-heading font-bold text-lg mb-1" style="color: var(--text-primary);">Phir: Concept Build Karo</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Step-by-step concept build hota hai. SAAVI confusing scientific terms ko simple Hinglish mein tod ke samjhati hai —
              jaise ek badi behen apne chhote bhai ko samjhaye.
            </p>
          </div>
        </div>

        <div class="flex items-start gap-5 animate-on-scroll">
          <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold flex-shrink-0" style="background: var(--primary-glow); color: var(--primary-light);">3</div>
          <div>
            <div class="font-heading font-bold text-lg mb-1" style="color: var(--text-primary);">Aur Phir: Practice + Verify</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              SAAVI questions poochti hai — "Kya samjhe? Explain karo." Student ki explanation sun ke SAAVI decide karti hai
              ki aur explain karna hai ya aage badhna hai.
            </p>
          </div>
        </div>

        <div class="flex items-start gap-5 animate-on-scroll">
          <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold flex-shrink-0" style="background: var(--accent-glow, rgba(52,211,153,0.15)); color: var(--accent);">4</div>
          <div>
            <div class="font-heading font-bold text-lg mb-1" style="color: var(--text-primary);">Aakhir Mein: Board-Ready</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Chapter khatam hone ke baad mock test — board exam pattern mein. SAAVI batati hai kaun se points miss hue
              aur kahan galti ki wajah se marks ja sakte hain.
            </p>
          </div>
        </div>

      </div>

      <div class="mt-10 p-6 rounded-2xl text-center max-w-xl mx-auto" style="background: var(--bg-surface); border: 1px solid var(--accent);">
        <p class="font-heading font-bold text-lg mb-2" style="color: var(--accent);">Blind Mode — Science ke liye bhi</p>
        <p class="text-sm" style="color: var(--text-secondary);">
          Har diagram, har graph, har circuit — SAAVI words mein describe karti hai. Visually impaired students ke liye
          Science koi dusra subject nahi — same NCERT, same board exam.
        </p>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 5: CTA
       ============================================================ -->
  <section class="section" aria-labelledby="cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-primary mb-4">🔬 Science Ready</span>
        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          Science Ab Mushkil Nahi — SAAVI Ke Saath
        </h2>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          ₹199/month. 7 din free trial. Class 6 se 10 tak — Science, Maths, sab. Abhi join karo.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="/waitlist/" class="btn btn-primary text-lg px-8 py-4">Join Waitlist Free →</a>
          <a href="/classes/class-10/" class="btn btn-outline text-lg px-8 py-4">Class 10 Chapters ↓</a>
        </div>
        <p class="mt-4 text-sm" style="color: var(--text-muted);">
          ♿ Visually impaired students ke liye Science Blind Mode hamesha FREE.
        </p>
      </div>
    </div>
  </section>

</main>

<?php include '../../partials/footer.php'; ?>
