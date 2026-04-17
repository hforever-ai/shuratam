<?php
$title       = "Mock Exams — Easy Se Board Ready 4 Levels | Shrutam SAAVI";
$description = "4 levels: Easy → Medium → Hard → Complex (Board Ready). Chapter-wise + full syllabus. Assertion & Reasoning type. Instant feedback. SAAVI ke saath exam ki tayyari.";
$canonical   = "https://shrutam.ai/features/mock-exams/";
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
      "name"     => "Mock Exams",
      "item"     => "https://shrutam.ai/features/mock-exams/",
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
          <li style="color: var(--text-secondary);">Mock Exams</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-3">
            <span class="badge badge-accent">📝 Board Pattern</span>
            <span class="badge badge-primary">4 Difficulty Levels</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Easy Se Board Ready — 4 Levels
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            Easy से शुरू — Board तक पहुँचो।
          </p>

          <div class="chalkboard mx-auto my-3">
            <img src="/assets/images/features/mock-exams.png" alt="Mock exams — 4 difficulty levels from easy to board ready" loading="lazy" class="w-full max-w-[200px] md:max-w-[240px] lg:max-w-[280px] mx-auto my-3 rounded-xl">
          </div>

          <p class="text-lg mb-8" style="color: var(--text-body);">
            Board exam ka darr asli nahi hona chahiye.
            <strong style="color: var(--text-primary);">SAAVI ke Mock Exams</strong> tumhara confidence
            Easy se shuru karke gradually Board Exam level tak le jaate hain.
            Har wrong answer pe explanation. Har level clear hua to agle pe.
            Exam hall se pehle exam feel kar lo — ghar mein.
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
              <span class="text-2xl" aria-hidden="true">🎯</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Chapter-wise + Full Syllabus</div>
                <p class="text-sm" style="color: var(--text-secondary);">Ek chapter pe focus karo ya poore syllabus ka mock do — dono options hain. Apni zaroorat ke hisaab se.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">🔀</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Assertion & Reasoning Type</div>
                <p class="text-sm" style="color: var(--text-secondary);">CBSE standard question types — MCQ, Short Answer, A&R. Real board exam ka feel ghar pe.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">⚡</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Instant Feedback</div>
                <p class="text-sm" style="color: var(--text-secondary);">Submit karo — turant pata chalta hai kya sahi kya galat. Har wrong answer pe detailed explanation milti hai.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: 4 LEVELS
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="levels-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <span class="badge badge-primary mb-4">4 Levels</span>
        <h2 id="levels-heading" class="text-4xl font-heading font-bold mb-4">
          Easy Se Board Ready — Ek Level Ek Baar
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Seedha hard pe mat jaao — SAAVI tumhara confidence build karti hai step by step.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-3" aria-hidden="true">🟢</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--success);">Level 1: Easy</div>
          <p class="text-sm" style="color: var(--text-secondary);">Basic recall aur definition questions. Concept yaad hai ya nahi — yahan se pata chalta hai.</p>
          <div class="mt-3 text-xs font-bold" style="color: var(--text-muted);">Starting point</div>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--info);">
          <div class="text-3xl mb-3" aria-hidden="true">🔵</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--info);">Level 2: Medium</div>
          <p class="text-sm" style="color: var(--text-secondary);">Application-based questions. Concept samjha ya sirf yaad kiya — yahan pata chalta hai.</p>
          <div class="mt-3 text-xs font-bold" style="color: var(--text-muted);">Building up</div>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-3" aria-hidden="true">🟠</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--accent);">Level 3: Hard</div>
          <p class="text-sm" style="color: var(--text-secondary);">Multi-step numericals, case-based. Real exam jaisi thinking ki zaroorat hai. Asserts Reasoning included.</p>
          <div class="mt-3 text-xs font-bold" style="color: var(--text-muted);">Exam ready</div>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--error);">
          <div class="text-3xl mb-3" aria-hidden="true">🔴</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--error);">Level 4: Complex</div>
          <p class="text-sm" style="color: var(--text-secondary);">Board Exam standard. Previous years pattern. Yahan pass ho gaye — board mein koi dar nahi.</p>
          <div class="mt-3 text-xs font-bold" style="color: var(--error);">Board Ready</div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: KEY BENEFITS
       ======================================================== -->
  <section class="section" aria-labelledby="benefits-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <h2 id="benefits-heading" class="text-4xl font-heading font-bold mb-4">
          Mock Exams Se Kya Milta Hai?
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4" aria-hidden="true">😌</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Exam Anxiety Khatam</div>
          <p class="text-sm" style="color: var(--text-secondary);">Jitna zyada practice — utna kam darr. SAAVI ke saath real exam se pehle hazaaron questions solve kar loge.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4" aria-hidden="true">📊</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Weak Topic Identify</div>
          <p class="text-sm" style="color: var(--text-secondary);">Mock ke baad SAAVI batati hai — kahan zyada galat ho, kaunsa concept weak hai. Targeted revision milti hai.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4" aria-hidden="true">🏆</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Real Board Feel</div>
          <p class="text-sm" style="color: var(--text-secondary);">CBSE pattern, time limit, Assertion & Reasoning — ghar baithe real board exam jaisa experience milta hai.</p>
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
        <h2 id="related-heading" class="text-3xl font-heading font-bold mb-3">Mock Exam Ke Saath Yeh Bhi Karo</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Poori board preparation strategy — SAAVI ke saath.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <a href="/features/zero-to-hero/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🚀</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Zero to Hero</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Pehle gaps fill karo — phir mock exams mein zyada marks aayenge.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/exam-notes/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📋</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Exam Notes</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Mock se pehle notes revise karo — chapter-wise summary + formulas.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/adaptive-learning/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🧠</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Adaptive Learning</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Mock mein weak spots find hue — Adaptive Learning se strengthen karo.</p>
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
          Board Exam Ki Tayyari Shuru Karo
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-4" style="color: var(--accent);">
          आसान से शुरू करो — बोर्ड तक पहुँचो।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist join karo — launch pe Mock Exams ready milenge. Free hai. Board exam ka darr khatam hoga.
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
