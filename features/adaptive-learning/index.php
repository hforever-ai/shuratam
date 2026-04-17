<?php
$title       = "Adaptive Learning — Tumhara Pace, Tumhara Tarika | Shrutam SAAVI";
$description = "3 sahi jawab → harder questions. 2 galat → basics pe wapas. SAAVI real-time mein difficulty adjust karti hai. Tumhara pace, tumhara tarika.";
$canonical   = "https://shrutam.ai/features/adaptive-learning/";
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
      "name"     => "Adaptive Learning",
      "item"     => "https://shrutam.ai/features/adaptive-learning/",
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
          <li style="color: var(--text-secondary);">Adaptive Learning</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-3">
            <span class="badge badge-accent">🧠 AI Adaptive</span>
            <span class="badge badge-primary">Real-Time Adjustment</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Tumhara Pace, Tumhara Tarika
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            तेज़ हो तो आगे, धीमे हो तो रुको।
          </p>

          <p class="text-lg mb-8" style="color: var(--text-body);">
            Har student ka pace alag hota hai. Koi chemistry mein fast hai, maths mein slow.
            SAAVI <strong style="color: var(--text-primary);">real time mein har question ka response dekh ke</strong>
            automatically difficulty adjust karti hai. Nahi bori hogi, nahi overwhelm hogi.
            Sirf tumhara perfect level.
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
              <span class="text-2xl" aria-hidden="true">⬆️</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">3 Sahi → Harder</div>
                <p class="text-sm" style="color: var(--text-secondary);">Teen consecutive sahi jawab? SAAVI tum par automatic next difficulty level pe le jaati hai. Boredom ka chance nahi.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--error);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">⬇️</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">2 Galat → Basics</div>
                <p class="text-sm" style="color: var(--text-secondary);">Do baar galat? No judgment. SAAVI quietly wapas basics pe le jaati hai — foundation dobara strong karti hai.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">⏱️</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Time Tracking Per Question</div>
                <p class="text-sm" style="color: var(--text-secondary);">Kitna time liya har question pe — SAAVI yeh bhi track karti hai. Slow spots = revision targets.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: ADAPTIVE FLOW VISUAL
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="flow-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <span class="badge badge-primary mb-4">Adaptive Flow</span>
        <h2 id="flow-heading" class="text-4xl font-heading font-bold mb-4">
          SAAVI Ka Real-Time Decision Tree
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Har answer ke baad SAAVI decide karti hai — agle question ka level kya hoga.
          Yeh sab real-time mein hota hai, bina tumhari session rok ke.
        </p>
      </div>

      <!-- Flow diagram -->
      <div class="max-w-2xl mx-auto">

        <!-- Start -->
        <div class="card text-center animate-on-scroll mb-2" style="border: 2px solid var(--primary);">
          <div class="font-heading font-bold text-lg" style="color: var(--primary-light);">Question Diya Gaya — Medium Difficulty</div>
        </div>

        <div class="flex justify-center mb-2" aria-hidden="true">
          <div style="width: 2px; height: 24px; background: var(--border-default);"></div>
        </div>

        <!-- Answer branches -->
        <div class="grid grid-cols-3 gap-4 mb-2">
          <div class="card text-center animate-on-scroll" style="border: 2px solid var(--success);">
            <div class="text-lg font-bold mb-1" style="color: var(--success);">✅ Sahi</div>
            <p class="text-xs" style="color: var(--text-secondary);">+1 streak</p>
          </div>
          <div class="card text-center animate-on-scroll" style="border: 2px solid var(--text-muted); opacity: 0.6;">
            <div class="text-lg font-bold mb-1" style="color: var(--text-muted);">Jawab</div>
            <p class="text-xs" style="color: var(--text-muted);">detect ho raha hai…</p>
          </div>
          <div class="card text-center animate-on-scroll" style="border: 2px solid var(--error);">
            <div class="text-lg font-bold mb-1" style="color: var(--error);">❌ Galat</div>
            <p class="text-xs" style="color: var(--text-secondary);">+1 miss</p>
          </div>
        </div>

        <div class="flex justify-around mb-2" aria-hidden="true">
          <div style="width: 2px; height: 24px; background: var(--success);"></div>
          <div style="width: 2px; height: 24px; background: var(--error);"></div>
        </div>

        <!-- Outcomes -->
        <div class="grid grid-cols-2 gap-4">
          <div class="card animate-on-scroll" style="border: 2px solid var(--success);">
            <div class="font-heading font-bold mb-2" style="color: var(--success);">3 Sahi Streak</div>
            <p class="text-sm" style="color: var(--text-secondary);">SAAVI next level pe le jaati hai. Harder questions, naya concept. Boredom khatam.</p>
          </div>
          <div class="card animate-on-scroll" style="border: 2px solid var(--error);">
            <div class="font-heading font-bold mb-2" style="color: var(--error);">2 Galat Row</div>
            <p class="text-sm" style="color: var(--text-secondary);">SAAVI basics pe wapas — easier questions + explanation. Foundation solid hogi tab advance hogi.</p>
          </div>
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
          Adaptive Learning Se Kya Milta Hai?
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4" aria-hidden="true">🎯</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Zero Time Waste</div>
          <p class="text-sm" style="color: var(--text-secondary);">Jo tumhe pata hai woh dobara mat padho. SAAVI sirf weak spots pe focus karti hai — session ekdum efficient.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4" aria-hidden="true">📈</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Steady Progress</div>
          <p class="text-sm" style="color: var(--text-secondary);">Na zyada easy, na zyada hard. SAAVI hamesha tumhare ek step aage rehti hai — growth zone mein.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4" aria-hidden="true">💪</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Confidence Build</div>
          <p class="text-sm" style="color: var(--text-secondary);">Har right answer ek step aage. Galat hua toh bhi explanation milti hai. Dono cases mein sikhte rehte ho.</p>
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
        <h2 id="related-heading" class="text-3xl font-heading font-bold mb-3">Aur Bhi Features Hain</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Adaptive Learning ke saath yeh features aur bhi powerful ho jaate hain.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <a href="/features/zero-to-hero/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🚀</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Zero to Hero</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Prerequisite gaps dhundho — Class 6 se 10 tak ka poora path banao.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/mock-exams/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📝</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Mock Exams</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Adaptive learning ke baad — board-ready exams se test karo apni strength.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/student-tracking/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📊</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Student Tracking</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Tumhara progress dashboard — subject-wise weakness graphs + streak tracking.</p>
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
          Apne Pace Pe Padhna Shuru Karo
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-4" style="color: var(--accent);">
          तुम्हारी रफ़्तार — SAAVI तुम्हारे साथ।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist join karo — launch pe personalized adaptive path ready milega. Free hai.
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
