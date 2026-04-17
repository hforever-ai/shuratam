<?php
$title       = "Student Tracking — Tera Progress Tera Dashboard | Shrutam SAAVI";
$description = "Study streak tracking, subject-wise weakness graphs, badge system, time spent per topic, class average comparison (anonymous). Tera dashboard, teri progress.";
$canonical   = "https://shrutam.ai/features/student-tracking/";
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
      "name"     => "Student Tracking",
      "item"     => "https://shrutam.ai/features/student-tracking/",
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
          <li style="color: var(--text-secondary);">Student Tracking</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-3">
            <span class="badge badge-accent">📊 Personal Dashboard</span>
            <span class="badge badge-primary">Streak + Badges</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Tera Progress, Tera Dashboard
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            तेरी मेहनत — तेरी नज़र में।
          </p>

          <p class="text-lg mb-8" style="color: var(--text-body);">
            Mehnat ho rahi hai — dekhna chahiye bhi toh chahiye.
            SAAVI tumhara <strong style="color: var(--text-primary);">personal progress dashboard</strong>
            banati hai — study streaks, weak subjects, badges, time tracking.
            Har din thoda aur better — numbers proof denge.
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
              <span class="text-2xl" aria-hidden="true">🔥</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Study Streak</div>
                <p class="text-sm" style="color: var(--text-secondary);">Har roz padhne ka streak track hota hai. 7 din, 30 din, 100 din — streak todna mat. Motivation ka sabse bada source.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--error);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">📉</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Weakness Graphs</div>
                <p class="text-sm" style="color: var(--text-secondary);">Maths mein Algebra weak hai? Chemistry ke kaunse topics pe zyada time laga? Graph clearly dikhata hai — no guessing.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">🏅</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Badge System</div>
                <p class="text-sm" style="color: var(--text-secondary);">First 7-day streak, Chapter Master, 100 Questions Solved — achievements jo tum earn karte ho. Real pride.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: DASHBOARD FEATURES
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="dashboard-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <span class="badge badge-primary mb-4">Dashboard Details</span>
        <h2 id="dashboard-heading" class="text-4xl font-heading font-bold mb-4">
          Tumhare Dashboard Mein Kya Milega?
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Sirf numbers nahi — actionable insights. Kahan mehnat karni hai, kahan already strong ho.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-2xl mb-3" aria-hidden="true">🔥</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Daily Streak Tracker</div>
          <p class="text-sm" style="color: var(--text-secondary);">Consecutive study days ka count. Break hone pe notification — "Aaj bhi padho, streak mat todo!"</p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-2xl mb-3" aria-hidden="true">📊</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Subject Weakness Graph</div>
          <p class="text-sm" style="color: var(--text-secondary);">Bar chart — har subject mein score. Red = weak, green = strong. Ek nazar mein kahan mehnat karni hai.</p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-2xl mb-3" aria-hidden="true">⏱️</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Time Per Topic</div>
          <p class="text-sm" style="color: var(--text-secondary);">Kaunse topic pe kitna time laga — detailed breakdown. Slow topics = revision needed.</p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--info);">
          <div class="text-2xl mb-3" aria-hidden="true">🏅</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Achievement Badges</div>
          <p class="text-sm" style="color: var(--text-secondary);">Milestones pe special badges. "Chapter Master", "7-Day Warrior", "100 Questions Solved" — collect karo.</p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--text-muted);">
          <div class="text-2xl mb-3" aria-hidden="true">👥</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Anonymous Class Compare</div>
          <p class="text-sm" style="color: var(--text-secondary);">Class average se apni comparison — anonymous. Naam nahi pata, sirf: "Tum top 30% mein ho."</p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-2xl mb-3" aria-hidden="true">📈</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Weekly Progress Report</div>
          <p class="text-sm" style="color: var(--text-secondary);">Har hafte ka summary — kitna padha, kaha improve hua, kahan aur dhyan chahiye. Clear aur actionable.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: RELATED FEATURES
       ======================================================== -->
  <section class="section" aria-labelledby="related-heading">
    <div class="container article-content">
      <div class="text-center mb-10">
        <h2 id="related-heading" class="text-3xl font-heading font-bold mb-3">Tracking + Yeh Features = Powerful Combo</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Dashboard se pata chala kahan weak hain — ab yeh features se fix karo.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <a href="/features/adaptive-learning/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🧠</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Adaptive Learning</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Dashboard mein weak spots pata chala — Adaptive Learning automatically wahan focus karti hai.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/parent-portal/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">👪</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Parent Portal</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Tumhara dashboard — maa-baap ka portal. Weekly summary auto-share hoti hai.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/mock-exams/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📝</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Mock Exams</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Mock exam results dashboard mein auto-save — progress track karte raho.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 4: CTA
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="cta-heading">
    <div class="container article-content">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-accent mb-6">🟢 Launching May 20, 2026</span>
        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          Apna Progress Dashboard Start Karo
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-4" style="color: var(--accent);">
          मेहनत दिखे — तभी motivation बने।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist join karo — launch pe personal dashboard ready milega. Streak shuru hogi day one se.
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
