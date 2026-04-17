<?php
$title       = "Photo Doubt Solver — Photo Kheecho Jawab Pao | Shrutam SAAVI";
$description = "Handwritten ya printed question ki photo kheecho — SAAVI padh ke step-by-step explain karti hai. Hindi handwriting bhi. Koi typing nahi.";
$canonical   = "https://shrutam.ai/features/photo-doubt-solver/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@type"    => "BreadcrumbList",
  "itemListElement" => [
    [
      "@type"    => "ListItem",
      "position" => 1,
      "name"     => "Home",
      "item"     => "https://shrutam.ai/",
    ],
    [
      "@type"    => "ListItem",
      "position" => 2,
      "name"     => "Features",
      "item"     => "https://shrutam.ai/features/",
    ],
    [
      "@type"    => "ListItem",
      "position" => 3,
      "name"     => "Photo Doubt Solver",
      "item"     => "https://shrutam.ai/features/photo-doubt-solver/",
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include '../../partials/head.php';
include '../../partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       SECTION 1: HERO
       ======================================================== -->
  <section class="section" aria-labelledby="hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container article-content">

      <!-- Breadcrumb -->
      <nav aria-label="Breadcrumb" class="mb-8">
        <ol class="flex flex-wrap items-center gap-2 text-sm" style="color: var(--text-muted);">
          <li><a href="/" style="color: var(--text-muted);">Home</a></li>
          <li aria-hidden="true" style="color: var(--text-muted);">›</li>
          <li><a href="/features/" style="color: var(--text-muted);">Features</a></li>
          <li aria-hidden="true" style="color: var(--text-muted);">›</li>
          <li style="color: var(--text-secondary);">Photo Doubt Solver</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-3">
            <span class="badge badge-accent">📸 Instant Solver</span>
            <span class="badge badge-primary">Hindi Handwriting</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Photo Kheecho, Jawab Pao
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            सवाल की फोटो — जवाब तुरंत।
          </p>

          <div class="chalkboard mx-auto my-3">
            <img src="/assets/images/features/photo-doubt.png" alt="Photo doubt solver — snap and get step-by-step solution" loading="lazy" class="w-full max-w-[200px] md:max-w-[240px] lg:max-w-[280px] mx-auto my-3 rounded-xl">
          </div>

          <p class="text-lg mb-8" style="color: var(--text-body);">
            Homework mein koi question samajh nahi aaya? NCERT exercise ka koi problem? Typing mat karo —
            <strong style="color: var(--text-primary);">sirf photo kheecho</strong>.
            SAAVI us question ko read karti hai, solve karti hai, aur step-by-step explain karti hai — apni language mein.
            Hindi handwriting bhi parhti hai.
          </p>

          <div class="flex flex-wrap gap-4">
            <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
            <a href="/features/" class="btn btn-outline">← Sab Features Dekho</a>
          </div>
        </div>

        <!-- Right: Quick value cards -->
        <div class="flex flex-col gap-4">
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--success);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">📷</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Click — Done</div>
                <p class="text-sm" style="color: var(--text-secondary);">Phone camera se photo click karo. Printed textbook, handwritten notes, worksheet — sab work karta hai.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">🔢</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Step-by-Step Solution</div>
                <p class="text-sm" style="color: var(--text-secondary);">Sirf answer nahi — poora process. Har step explain hota hai taaki concept samajh aaye, yaad na karna pade.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">✍️</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Hindi Handwriting Supported</div>
                <p class="text-sm" style="color: var(--text-secondary);">Apne haath ki Hindi likhawat bhi SAAVI samajh leti hai. Devanagari script, mixed Hindi-English — sab OK.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: HOW IT WORKS — 3 STEPS
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="how-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <span class="badge badge-primary mb-4">3 Simple Steps</span>
        <h2 id="how-heading" class="text-4xl font-heading font-bold mb-4">
          Photo Se Jawab Tak — Teen Steps
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Koi typing nahi. Koi searching nahi. Sirf camera open karo aur photo lo.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--primary-glow);">
            📸
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--primary-light);">Step 1</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Photo Click Karo</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Question ka photo lo — textbook, worksheet, ya apni notebook se. Ek click kaafi hai.
          </p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--accent-glow);">
            🤖
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--accent);">Step 2</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">SAAVI Padh Leti Hai</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            SAAVI photo mein question identify karti hai — printed ho ya handwritten. Hindi, English, mixed — sab.
          </p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--success-bg);">
            💡
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">Step 3</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Step-by-Step Jawab</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Full solution milti hai — apni language mein, har step ke saath. Concept bhi clear hota hai, sirf answer nahi.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: WHAT IT HANDLES
       ======================================================== -->
  <section class="section" aria-labelledby="handles-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <h2 id="handles-heading" class="text-4xl font-heading font-bold mb-4">
          Kya Kya Solve Kar Sakta Hai?
        </h2>
        <p class="text-lg max-w-xl mx-auto" style="color: var(--text-secondary);">
          Maths se lekar Science diagrams tak — SAAVI sab handle karti hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 max-w-5xl mx-auto">

        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-3" aria-hidden="true">➕</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Maths Problems</div>
          <p class="text-xs" style="color: var(--text-secondary);">Algebra, geometry, trigonometry — class 6 to 10</p>
        </div>

        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-3" aria-hidden="true">🔬</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Science Questions</div>
          <p class="text-xs" style="color: var(--text-secondary);">Physics, Chemistry, Biology — numerical aur theory</p>
        </div>

        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-3" aria-hidden="true">✍️</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Hindi Handwriting</div>
          <p class="text-xs" style="color: var(--text-secondary);">Devanagari script, messy handwriting — bhi parhti hai</p>
        </div>

        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-3" aria-hidden="true">📄</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Printed Text</div>
          <p class="text-xs" style="color: var(--text-secondary);">NCERT textbooks, school worksheets, question papers</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 4: RELATED FEATURES
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="related-heading">
    <div class="container article-content">
      <div class="text-center mb-10">
        <h2 id="related-heading" class="text-3xl font-heading font-bold mb-3">Photo Solve Ke Baad Kya?</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Doubt solve hua — ab inke saath practice karo.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <a href="/features/adaptive-learning/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🧠</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Adaptive Learning</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Us concept pe aur questions karo — SAAVI tumhara level dekh ke questions adjust karti hai.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/revision-mode/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🔄</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Revision Mode</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Aaj ke saare doubts solve karo, phir full chapter revision mode mein karo.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/mock-exams/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📝</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Mock Exams</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Concept clear hua — ab exam mein test karo. Board pattern pe practice karo.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 5: CTA
       ======================================================== -->
  <section class="section" aria-labelledby="cta-heading">
    <div class="container article-content">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-accent mb-6">🟢 Launching May 20, 2026</span>
        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          Doubt? Bas Photo Kheecho
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-4" style="color: var(--accent);">
          फोटो क्लिक करो — जवाब तुरंत।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist join karo — launch pe Photo Doubt Solver ready milega. Koi extra fees nahi.
        </p>
        <div class="flex flex-wrap gap-4 justify-center">
          <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
          <a href="/saavi/" class="btn btn-outline">SAAVI Se Milo ↗</a>
        </div>
        <p class="mt-4 text-xs" style="color: var(--text-muted);">
          Koi credit card nahi. Koi spam nahi. Sirf launch pe notify karenge.
        </p>
      </div>
    </div>
  </section>

</main>

<?php include '../../partials/footer.php'; ?>
