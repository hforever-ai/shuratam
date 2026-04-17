<?php
$title       = "CG Board AI Tutor | CGBSE Hindi Mein | Raipur Bilaspur Durg | Shrutam SAAVI";
$description = "CG Board Class 6-10 ke liye SAAVI. Chhattisgarh State Board exact syllabus. Raipur, Bilaspur, Durg, Korba, Jagdalpur — har shahar, har gaon.";
$canonical   = "https://shrutam.ai/boards/cg-board/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"       => "BreadcrumbList",
      "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home",   "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "Boards", "item" => "https://shrutam.ai/boards/"],
        ["@type" => "ListItem", "position" => 3, "name" => "CG Board","item" => "https://shrutam.ai/boards/cg-board/"],
      ],
    ],
    [
      "@type"            => "Course",
      "name"             => "CG Board (CGBSE) — SAAVI AI Tutor Class 6–10",
      "description"      => "Chhattisgarh Board ke students ke liye SAAVI. Hindi medium. Class 6 se 10 tak. Raipur, Bilaspur, Durg, Korba, Jagdalpur, Bastar.",
      "provider"         => ["@type" => "Organization", "name" => "Shrutam", "url" => "https://shrutam.ai"],
      "educationalLevel" => "Grade 6-10",
      "inLanguage"       => "hi",
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
          <li aria-current="page" style="color: var(--text-secondary);">CG Board</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-6">
            <span class="badge badge-primary">🏫 CG Board (CGBSE)</span>
            <span class="badge badge-accent">🟢 Free 7-Day Trial</span>
            <span class="pill">Class 6–10</span>
            <span class="pill">Hindi Medium</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            CG Board — Chhattisgarh Ke Students Ke Liye SAAVI
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            छत्तीसगढ़ के हर बच्चे के लिए — गाँव हो या शहर।
          </p>

          <p class="text-lg mb-6" style="color: var(--text-body);">
            SAAVI didi ab Chhattisgarh ke students ke liye aayi hai. CG Board ka exact syllabus, Hindi mein,
            <strong style="color: var(--text-primary);">Class 6 se 10 tak</strong>. Raipur ho ya Bastar, Bilaspur ho ya Dantewada —
            SAAVI sab jagah hai.
          </p>

          <p class="text-base mb-8" style="color: var(--text-secondary);">
            Gaon mein bijli kam hogi toh bhi — audio-first hone ki wajah se SAAVI low data pe bhi kaam karti hai.
            <strong style="color: var(--accent);">Gaon mein bhi internet hai — SAAVI bhi hai.</strong>
          </p>

          <div class="flex flex-wrap gap-4">
            <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
            <a href="/classes/class-10/" class="btn btn-outline">Class 10 Chapters ↓</a>
          </div>
        </div>

        <!-- Right: CG Board stats card -->
        <div class="card" aria-label="CG Board highlights">
          <div class="text-lg font-heading font-bold mb-5" style="color: var(--text-primary);">CG Board ke baare mein</div>
          <div class="flex flex-col gap-4">
            <div class="flex items-center gap-3">
              <span class="text-xl">📝</span>
              <div>
                <div class="font-bold text-sm" style="color: var(--text-primary);">Full Hindi Medium Support</div>
                <p class="text-xs" style="color: var(--text-muted);">CGBSE syllabus mein Hindi medium primary hai — SAAVI bhi isi mein padhati hai.</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xl">🎯</span>
              <div>
                <div class="font-bold text-sm" style="color: var(--text-primary);">Theory + Practical</div>
                <p class="text-xs" style="color: var(--text-muted);">CGBSE Class 10 mein Theory aur Practical dono — SAAVI dono cover karti hai.</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xl">📡</span>
              <div>
                <div class="font-bold text-sm" style="color: var(--text-primary);">Low Data Friendly</div>
                <p class="text-xs" style="color: var(--text-muted);">Chhattisgarh ke remote areas ke liye bhi suitable — audio-first design.</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xl">♿</span>
              <div>
                <div class="font-bold text-sm" style="color: var(--accent);">Blind Mode — FREE Forever</div>
                <p class="text-xs" style="color: var(--text-muted);">Visually impaired CG Board students ke liye hamesha free.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 2: CG CITIES
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="cities-heading">
    <div class="container">
      <div class="text-center mb-8">
        <span class="badge badge-accent mb-4">📍 Chhattisgarh</span>
        <h2 id="cities-heading" class="text-3xl font-heading font-bold mb-3">Har Shahar, Har Gaon — SAAVI Sab Ke Liye</h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          Chhattisgarh ke in shahron aur unke aas-paas ke gaon ke students ke liye SAAVI taiyaar hai.
        </p>
      </div>

      <div class="flex flex-wrap justify-center gap-3 mb-8">
        <?php
        $cities = [
          ["Raipur", "State capital — sabse bada city"],
          ["Bilaspur", "Education hub of CG"],
          ["Durg", "Industrial belt students"],
          ["Korba", "Coal belt ke bachche"],
          ["Jagdalpur", "Bastar region"],
          ["Bastar", "Tribal area — inclusive reach"],
          ["Rajnandgaon", "Western CG"],
          ["Raigarh", "Eastern CG students"],
          ["Ambikapur", "Surguja district"],
          ["Dantewada", "Deep Bastar"],
        ];
        foreach ($cities as [$city, $note]) {
          echo '<span class="pill" title="' . htmlspecialchars($note) . '">' . htmlspecialchars($city) . '</span>';
        }
        ?>
      </div>

      <p class="text-center text-sm" style="color: var(--text-muted);">
        ...aur Chhattisgarh ke 27 zilon ke saare gaon. SAAVI internet wahan hai jahan student hai.
      </p>
    </div>
  </section>

  <!-- ============================================================
       SECTION 3: EXAM PATTERN
       ============================================================ -->
  <section class="section" aria-labelledby="exam-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-primary mb-4">📋 Exam Pattern</span>
        <h2 id="exam-heading" class="text-3xl font-heading font-bold mb-3">CGBSE Class 10 Exam Pattern</h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          CG Board Class 10 mein Theory aur Practical dono hote hain. SAAVI ka content is pattern ke hisaab se taiyaar hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">
        <div class="card text-center animate-on-scroll" style="border-left: 4px solid var(--primary);">
          <div class="stat-number mb-2">75</div>
          <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Theory Marks</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Hindi medium mein likhit pariksha. SAAVI theory concepts clearly samjhati hai.
          </p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-left: 4px solid var(--accent);">
          <div class="stat-number mb-2">25</div>
          <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Practical Marks</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Science practical, project. SAAVI verbal descriptions se blind students bhi prepare kar sakte hain.
          </p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-left: 4px solid var(--success);">
          <div class="stat-number mb-2">33%</div>
          <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Passing Marks</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Minimum passing criteria. SAAVI se poora syllabus cover hota hai — pass se aage distinction tak.
          </p>
        </div>
      </div>

      <div class="max-w-3xl mx-auto mt-8 p-6 rounded-2xl" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
        <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">CGBSE Class 10 — Subject-wise</div>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
          <?php
          $subjects = ["Science" => "80 marks", "Mathematics" => "80 marks", "Hindi" => "80 marks", "Social Science" => "80 marks", "English" => "80 marks", "Sanskrit/Other" => "80 marks"];
          foreach ($subjects as $sub => $marks) {
            echo '<div class="text-sm p-3 rounded-lg" style="background: var(--bg-elevated);"><span style="color: var(--text-primary); font-weight: 600;">' . $sub . '</span><br><span style="color: var(--text-muted);">' . $marks . '</span></div>';
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 4: CLASSES
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
        Class 6-9 chapters coming soon. Class 10 fully ready — join waitlist for early access.
      </p>
    </div>
  </section>

  <!-- ============================================================
       SECTION 5: SUBJECTS
       ============================================================ -->
  <section class="section" aria-labelledby="subjects-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-accent mb-4">📖 Subjects</span>
        <h2 id="subjects-heading" class="text-3xl font-heading font-bold mb-3">CG Board Ke Sab Subjects</h2>
        <p class="text-lg" style="color: var(--text-secondary);">SAAVI Class 10 ke liye yeh subjects cover karti hai.</p>
      </div>

      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 max-w-4xl mx-auto">
        <?php
        $subjects_list = [
          ["🔬", "Science",        "/subjects/science/",         "67 chapters across all classes"],
          ["📐", "Mathematics",    "/subjects/mathematics/",     "Logic samjho, rote nahi karo"],
          ["📝", "Hindi",          "/subjects/hindi/",           "Bhasha, vyakaran, sahitya"],
          ["🌏", "Social Science", "/subjects/social-science/",  "History, geography, civics"],
          ["🇬🇧", "English",       "/subjects/english/",         "Grammar aur comprehension"],
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
       SECTION 6: WHY SAAVI FOR CG BOARD
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="why-heading">
    <div class="container">
      <div class="text-center mb-10">
        <h2 id="why-heading" class="text-3xl font-heading font-bold mb-3">
          CG Board Students Ke Liye SAAVI Kyun?
        </h2>
        <p class="text-xl font-heading" style="color: var(--accent);">
          "Gaon mein bhi internet hai — SAAVI bhi hai."
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl mx-auto">
        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">🗣️</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Pure Hindi Mein</div>
            <p class="text-sm" style="color: var(--text-secondary);">SAAVI Hindi medium mein padhati hai — aam bolchal ki bhaasha mein. Chhattisgarhi students ke liye bilkul natural feel hota hai.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">📡</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Low Data Pe Bhi Kaam Kare</div>
            <p class="text-sm" style="color: var(--text-secondary);">Audio-first platform hai — heavy video nahi chahiye. 2G ya slow 4G pe bhi SAAVI seamlessly kaam karti hai.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">📋</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">CGBSE Exact Syllabus</div>
            <p class="text-sm" style="color: var(--text-secondary);">CG Board ka prescribed syllabus follow karta hai. NCERT + CGBSE variations dono cover hote hain — koi chapter miss nahi hoga.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">💰</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">₹199 Mein Poori Padhai</div>
            <p class="text-sm" style="color: var(--text-secondary);">Private tutor ₹3,000–5,000/month leti hain — SAAVI ₹199 mein poora syllabus deti hai. Kisan aur mazdoor ke bachche bhi padh sakein.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">♿</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--accent);">Visually Impaired — FREE Forever</div>
            <p class="text-sm" style="color: var(--text-secondary);">Chhattisgarh ke blind students ke liye SAAVI hamesha free rahegi. Sirf sunke poora board exam ready ho sakte hain.</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll">
          <span class="text-2xl">🧠</span>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Rote Nahi — Samajh</div>
            <p class="text-sm" style="color: var(--text-secondary);">SAAVI local examples se padhati hai — Mahanadi ka paani, dhaan ki fasal, Bastar ka jungle — concepts jeevan se judte hain.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 7: COMPARISON — CG Board Tutor vs SAAVI
       ============================================================ -->
  <section class="section" aria-labelledby="comparison-heading">
    <div class="container">
      <div class="text-center mb-10">
        <h2 id="comparison-heading" class="text-3xl font-heading font-bold mb-3">Local Tutor vs SAAVI</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Ek baar compare karo — decision aasaan ho jaayega.</p>
      </div>

      <div class="max-w-3xl mx-auto flex flex-col gap-4">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 animate-on-scroll">
          <div class="card" style="border-left: 4px solid var(--error);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--error);">Local CG Board Tutor</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">💸 Cost</div>
            <p class="text-sm" style="color: var(--text-secondary);">₹3,000–5,000/month per subject. 3 subjects = ₹15,000/month. Most families ke liye impossible.</p>
          </div>
          <div class="card" style="border-left: 4px solid var(--success);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">SAAVI</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">💰 Cost</div>
            <p class="text-sm" style="color: var(--text-secondary);">₹199/month. Sab subjects. 7 din free trial. Blind students ke liye zero.</p>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 animate-on-scroll">
          <div class="card" style="border-left: 4px solid var(--error);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--error);">Local CG Board Tutor</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">📍 Availability</div>
            <p class="text-sm" style="color: var(--text-secondary);">Sirf aapke shahar mein. Gaon mein qualified tutor milna mushkil — especially for Science/Maths.</p>
          </div>
          <div class="card" style="border-left: 4px solid var(--success);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">SAAVI</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">📡 Availability</div>
            <p class="text-sm" style="color: var(--text-secondary);">24/7 available. Raipur ho ya Dantewada — SAAVI hamesha ready hai.</p>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 animate-on-scroll">
          <div class="card" style="border-left: 4px solid var(--error);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--error);">Local CG Board Tutor</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">🕐 Timing</div>
            <p class="text-sm" style="color: var(--text-secondary);">Fixed time slot. Miss hua toh miss hua. No replay, no revision on demand.</p>
          </div>
          <div class="card" style="border-left: 4px solid var(--success);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">SAAVI</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">⏰ Timing</div>
            <p class="text-sm" style="color: var(--text-secondary);">Raat 2 baje bhi padho. Ek hi concept 10 baar sunno. Apni speed, apna time.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 8: CTA
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-accent mb-4">🎯 Chhattisgarh</span>
        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          CG Board Ka Har Student SAAVI Ka Haqdaar Hai
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-6" style="color: var(--accent);">
          अपने गाँव में बैठकर, अपनी भाषा में पढ़ो।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist mein join karo — launch hone par turant access milega. 7 din free. Koi commitment nahi.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="/waitlist/" class="btn btn-primary text-lg px-8 py-4">Join Waitlist Free →</a>
          <a href="/classes/class-10/" class="btn btn-outline text-lg px-8 py-4">Class 10 Chapters ↓</a>
        </div>
        <p class="mt-4 text-sm" style="color: var(--text-muted);">
          ♿ CG Board ke visually impaired students ke liye hamesha FREE.
        </p>
      </div>
    </div>
  </section>

</main>

<?php include '../../partials/footer.php'; ?>
