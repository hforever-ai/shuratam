<?php
$title       = "MP Board AI Tutor | Coming Soon | MPBSE Hindi Mein | Shrutam SAAVI";
$description = "MP Board (MPBSE) support coming soon to Shrutam. Madhya Pradesh ke students ke liye SAAVI. Join waitlist for early access.";
$canonical   = "https://shrutam.ai/boards/mp-board/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"           => "BreadcrumbList",
      "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home",     "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "Boards",   "item" => "https://shrutam.ai/boards/"],
        ["@type" => "ListItem", "position" => 3, "name" => "MP Board", "item" => "https://shrutam.ai/boards/mp-board/"],
      ],
    ],
    [
      "@type"            => "Course",
      "name"             => "MP Board (MPBSE) — SAAVI AI Tutor — Coming Soon",
      "description"      => "Madhya Pradesh Board ke students ke liye SAAVI jaldi aa rahi hai. Bhopal, Indore, Jabalpur, Gwalior, Ujjain — waitlist join karo.",
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
       SECTION 1: HERO — COMING SOON
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
          <li aria-current="page" style="color: var(--text-secondary);">MP Board</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-6">
            <span class="badge badge-primary">🏫 MP Board (MPBSE)</span>
            <span class="badge" style="background: rgba(251,191,36,0.15); color: #fbbf24; border: 1px solid rgba(251,191,36,0.3);">⏳ Coming Soon</span>
            <span class="pill">Bhopal</span>
            <span class="pill">Indore</span>
            <span class="pill">Jabalpur</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            MP Board — Jaldi Aa Raha Hai!
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            मध्य प्रदेश के हर विद्यार्थी के लिए — SAAVI जल्द ही आ रहा है।
          </p>

          <p class="text-lg mb-6" style="color: var(--text-body);">
            SAAVI abhi <strong style="color: var(--text-primary);">CG Board</strong> ke liye live hai — aur
            <strong style="color: var(--text-primary);">MP Board (MPBSE)</strong> support build ho raha hai.
            Madhya Pradesh ke students ke liye — Bhopal se Balaghat tak — SAAVI jaldi aayegi.
          </p>

          <p class="text-base mb-8" style="color: var(--text-secondary);">
            Waitlist mein abhi join karo — launch hone par
            <strong style="color: var(--accent);">sabse pehle notification milegi</strong> aur
            early bird offer bhi milega. Free hai — koi commitment nahi.
          </p>

          <div class="flex flex-wrap gap-4">
            <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
            <a href="/boards/cg-board/" class="btn btn-outline">CG Board Dekho (Live) →</a>
          </div>
        </div>

        <!-- Right: Coming Soon visual -->
        <div class="card text-center" aria-label="MP Board coming soon">
          <div class="text-6xl mb-4">⏳</div>
          <div class="text-2xl font-heading font-bold mb-3" style="color: var(--text-primary);">MP Board Support</div>
          <div class="inline-block px-4 py-2 rounded-full text-sm font-bold mb-4" style="background: rgba(251,191,36,0.15); color: #fbbf24; border: 1px solid rgba(251,191,36,0.3);">
            COMING SOON
          </div>
          <p class="text-sm mb-6" style="color: var(--text-secondary);">
            MPBSE syllabus mapping, Hindi medium content, aur MP-specific examples — sab build ho raha hai.
          </p>
          <div class="p-4 rounded-xl text-left" style="background: var(--bg-elevated);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--accent);">Build Progress</div>
            <div class="flex flex-col gap-2 text-sm">
              <div class="flex items-center gap-2">
                <span style="color: var(--success);">✓</span>
                <span style="color: var(--text-secondary);">MPBSE syllabus analysis complete</span>
              </div>
              <div class="flex items-center gap-2">
                <span style="color: var(--success);">✓</span>
                <span style="color: var(--text-secondary);">Hindi medium content pipeline ready</span>
              </div>
              <div class="flex items-center gap-2">
                <span style="color: rgba(251,191,36,0.9);">⏳</span>
                <span style="color: var(--text-secondary);">MP-specific examples &amp; content</span>
              </div>
              <div class="flex items-center gap-2">
                <span style="color: rgba(251,191,36,0.9);">⏳</span>
                <span style="color: var(--text-secondary);">Beta testing with MP students</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 2: MP CITIES
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="cities-heading">
    <div class="container">
      <div class="text-center mb-8">
        <span class="badge badge-accent mb-4">📍 Madhya Pradesh</span>
        <h2 id="cities-heading" class="text-3xl font-heading font-bold mb-3">MP Ke Har Shahar Ke Liye</h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          Madhya Pradesh ke in shahron aur unke aas-paas ke gaon ke students ke liye SAAVI ban rahi hai.
        </p>
      </div>

      <div class="flex flex-wrap justify-center gap-3 mb-8">
        <?php
        $cities = [
          ["Bhopal",      "State capital — sabse bada city"],
          ["Indore",      "Commercial hub of MP"],
          ["Jabalpur",    "Cultural capital of MP"],
          ["Gwalior",     "Historic city — north MP"],
          ["Ujjain",      "Religious city — west MP"],
          ["Sagar",       "Central MP hub"],
          ["Rewa",        "Vindhya region"],
          ["Satna",       "Eastern MP"],
          ["Dewas",       "Industrial MP"],
          ["Chhindwara",  "Tribal belt students"],
        ];
        foreach ($cities as [$city, $note]) {
          echo '<span class="pill" title="' . htmlspecialchars($note) . '">' . htmlspecialchars($city) . '</span>';
        }
        ?>
      </div>

      <p class="text-center text-sm" style="color: var(--text-muted);">
        ...aur Madhya Pradesh ke 52 zilon ke saare gaon. MP ka koi bhi student miss nahi hoga.
      </p>
    </div>
  </section>

  <!-- ============================================================
       SECTION 3: WHAT TO EXPECT
       ============================================================ -->
  <section class="section" aria-labelledby="expect-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-primary mb-4">🔮 Kya Milega</span>
        <h2 id="expect-heading" class="text-3xl font-heading font-bold mb-3">MP Board SAAVI Mein Kya Hoga?</h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          CG Board jaisi hi quality — MP Board ke liye customize kiya gaya.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">📚</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">MPBSE Exact Syllabus</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            MP Board ka prescribed syllabus — chapter by chapter. MPBSE variations aur NCERT dono cover honge.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">🗣️</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">MP-Style Hindi</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Bhopal, Indore, Jabalpur ki bolchal mein SAAVI padhayegi — local examples, local context, local feel.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">📝</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Board Pattern Practice</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            MPBSE Class 10 exam pattern ke hisaab se mock tests aur practice questions — board mein top karo.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">📡</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Low Data Friendly</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            MP ke remote areas ke liye bhi — audio-first platform, slow internet pe bhi seamlessly kaam karega.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">💰</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">₹199/Month — Sab Subjects</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Private tutor ki jagah SAAVI — ek hi subscription mein Science, Maths, Hindi, Social Science, English.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">♿</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--accent);">Blind Mode — FREE Forever</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Visually impaired MP Board students ke liye SAAVI hamesha free rahegi. Audio-first = truly accessible.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 4: WAITLIST FORM
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="waitlist-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center mb-10">
        <span class="badge badge-accent mb-4">📩 Waitlist</span>
        <h2 id="waitlist-heading" class="text-3xl font-heading font-bold mb-3">
          Sabse Pehle MP Board Access Pao
        </h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          Waitlist mein join karo — MP Board launch hone par turant notification milegi. Free. No spam.
        </p>
      </div>

      <?php include '../../partials/waitlist-form.php'; ?>
    </div>
  </section>

  <!-- ============================================================
       SECTION 5: ALREADY LIVE — CG BOARD CTA
       ============================================================ -->
  <section class="section" aria-labelledby="live-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-primary mb-4">🟢 Abhi Live</span>
        <h2 id="live-heading" class="text-3xl font-heading font-bold mb-4">
          Abhi Ke Liye — CG Board Try Karo
        </h2>
        <p class="text-lg mb-6" style="color: var(--text-secondary);">
          MP Board ka wait karte karte CG Board pe SAAVI try kar sakte ho — NCERT content largely same hai.
          CG Board students ke liye SAAVI abhi available hai.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="/boards/cg-board/" class="btn btn-outline text-lg px-8 py-4">CG Board Dekho →</a>
          <a href="/waitlist/" class="btn btn-primary text-lg px-8 py-4">MP Waitlist Join Karo →</a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php include '../../partials/footer.php'; ?>
