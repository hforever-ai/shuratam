<?php
$title       = "SAAVI Ki 13 Super Powers — All Features | Shrutam";
$description = "Shrutam ke 13 features: Mother Tongue Learning, Adaptive AI, Blind Mode, Ask Like 10, Zero to Hero, Photo Doubt Solver, Mock Exams, aur bahut kuch.";
$canonical   = "https://shrutam.ai/features/";
$schema      = json_encode([
    "@context" => "https://schema.org",
    "@type" => "BreadcrumbList",
    "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "Features", "item" => "https://shrutam.ai/features/"],
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       SECTION 1: HERO
       ======================================================== -->
  <section class="section" aria-labelledby="features-hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container text-center">
      <div class="flex flex-wrap justify-center gap-2 mb-6">
        <span class="badge badge-accent">13 Super Powers</span>
        <span class="badge badge-primary">SAAVI Powered</span>
      </div>

      <h1 id="features-hero-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
        SAAVI Ki 13 Super Powers
      </h1>

      <p class="text-xl max-w-2xl mx-auto mb-8" style="color: var(--text-body);">
        Sirf ek app — <strong style="color: var(--accent);">13 reasons</strong> tumhara bachcha aage jayega.
      </p>

      <div class="flex flex-wrap justify-center gap-4">
        <a href="/waitlist/" class="btn btn-primary">Abhi Join Karo — Free →</a>
        <a href="#features-grid" class="btn btn-outline">Sab Features Dekho ↓</a>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: 13 FEATURES GRID
       ======================================================== -->
  <section id="features-grid" class="section section-dark" aria-labelledby="features-grid-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="features-grid-heading" class="text-4xl font-heading font-bold mb-4">Ek App, Sab Kuch</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Students se parents tak — sab cover hai. Har feature ek problem solve karta hai.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- 1: Mother Tongue Learning -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="text-4xl">🗣️</div>
          <div class="flex-1">
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Mother Tongue Learning</div>
            <div class="text-sm font-bold mb-2" style="color: var(--accent);">Pehle apni bhasha mein, phir aage</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Hindi, Hinglish, Telugu, Marathi — apni language mein samjho. Jo concept mother tongue mein samajh aata hai, woh kabhi nahi bhulta.
            </p>
          </div>
          <a href="/features/mother-tongue-learning/" class="flex items-center gap-1 text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            Jaano <span aria-hidden="true">→</span>
          </a>
        </div>

        <!-- 2: Adaptive Learning -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="text-4xl">🎯</div>
          <div class="flex-1">
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Adaptive Learning</div>
            <div class="text-sm font-bold mb-2" style="color: var(--accent);">Tumhara pace, tumhara tarika</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              SAAVI tumhara level dekh ke padhati hai — na zyada easy, na zyada hard. Sirf tumhare liye, tumhari speed se.
            </p>
          </div>
          <a href="/features/adaptive-learning/" class="flex items-center gap-1 text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            Jaano <span aria-hidden="true">→</span>
          </a>
        </div>

        <!-- 3: Informed Learning -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="text-4xl">🧠</div>
          <div class="flex-1">
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Informed Learning</div>
            <div class="text-sm font-bold mb-2" style="color: var(--accent);">SAAVI tumhe jaanti hai</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              SAAVI tumhara full learning history track karti hai — kya aata hai, kya nahi, aur kahan se shuru karna chahiye.
            </p>
          </div>
          <a href="/features/adaptive-learning/" class="flex items-center gap-1 text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            Jaano <span aria-hidden="true">→</span>
          </a>
        </div>

        <!-- 4: Revision Mode -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="text-4xl">📚</div>
          <div class="flex-1">
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Revision Mode</div>
            <div class="text-sm font-bold mb-2" style="color: var(--accent);">School ke baad, SAAVI ke saath</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Quick audio revision — exam se ek din pehle bhi poora chapter 20 minutes mein. Board ke liye taiyaar.
            </p>
          </div>
          <a href="/features/revision-mode/" class="flex items-center gap-1 text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            Jaano <span aria-hidden="true">→</span>
          </a>
        </div>

        <!-- 5: Ask Like 10 -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="text-4xl">🤖</div>
          <div class="flex-1">
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Ask Like 10</div>
            <div class="text-sm font-bold mb-2" style="color: var(--accent);">Samajh nahi aaya? 9 aur tarike hain!</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Ek concept 10 alag tarike se poocho — SAAVI har baar naya angle deti hai: analogy, math, blind-friendly, aur aur bhi.
            </p>
          </div>
          <a href="/features/ask-like-10/" class="flex items-center gap-1 text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            Jaano <span aria-hidden="true">→</span>
          </a>
        </div>

        <!-- 6: Zero to Hero -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="text-4xl">🏆</div>
          <div class="flex-1">
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Zero to Hero</div>
            <div class="text-sm font-bold mb-2" style="color: var(--accent);">Kuch nahi se board ready</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Prerequisites identify karke shuru karo — SAAVI ek clear path banati hai zero se board exam tak. Koi gap nahi chhoota.
            </p>
          </div>
          <a href="/features/zero-to-hero/" class="flex items-center gap-1 text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            Jaano <span aria-hidden="true">→</span>
          </a>
        </div>

        <!-- 7: Photo Doubt Solver -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="text-4xl">📷</div>
          <div class="flex-1">
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Photo Doubt Solver</div>
            <div class="text-sm font-bold mb-2" style="color: var(--accent);">Photo kheecho, jawab pao</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Kitaab ka page photo lo — SAAVI second mein wo question explain karti hai, apni language mein, step by step.
            </p>
          </div>
          <a href="/features/photo-doubt-solver/" class="flex items-center gap-1 text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            Jaano <span aria-hidden="true">→</span>
          </a>
        </div>

        <!-- 8: Mock Exams -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="text-4xl">📝</div>
          <div class="flex-1">
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Mock Exams</div>
            <div class="text-sm font-bold mb-2" style="color: var(--accent);">Easy se Board Ready — 4 levels</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Easy → Medium → Hard → Board paper — 4 difficulty levels mein full mock test. Detailed feedback ke saath.
            </p>
          </div>
          <a href="/features/mock-exams/" class="flex items-center gap-1 text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            Jaano <span aria-hidden="true">→</span>
          </a>
        </div>

        <!-- 9: Spoken English -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="text-4xl">🗣️</div>
          <div class="flex-1">
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Spoken English</div>
            <div class="text-sm font-bold mb-2" style="color: var(--accent);">Hinglish se confident English</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Hindi medium background? Koi baat nahi. SAAVI Hinglish bridge se confident English bolna sikhati hai — bina sharm ke.
            </p>
          </div>
          <a href="/features/spoken-english/" class="flex items-center gap-1 text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            Jaano <span aria-hidden="true">→</span>
          </a>
        </div>

        <!-- 10: Exam Notes -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="text-4xl">📋</div>
          <div class="flex-1">
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Exam Notes</div>
            <div class="text-sm font-bold mb-2" style="color: var(--accent);">SAAVI ke smart notes</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Auto-generated chapter notes Hindi mein — print karo ya audio mein suno. Board se pehle best revision tool.
            </p>
          </div>
          <a href="/features/exam-notes/" class="flex items-center gap-1 text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            Jaano <span aria-hidden="true">→</span>
          </a>
        </div>

        <!-- 11: Student Tracking -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="text-4xl">🤖</div>
          <div class="flex-1">
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Student Tracking</div>
            <div class="text-sm font-bold mb-2" style="color: var(--accent);">Tera progress, tera dashboard</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Kaunsa chapter weak hai? Kitna time diya? SAAVI sab track karti hai aur remind karti hai — intelligent progress dashboard.
            </p>
          </div>
          <a href="/features/student-tracking/" class="flex items-center gap-1 text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            Jaano <span aria-hidden="true">→</span>
          </a>
        </div>

        <!-- 12: Parent Portal -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="text-4xl">👨‍👩‍👧</div>
          <div class="flex-1">
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Parent Portal</div>
            <div class="text-sm font-bold mb-2" style="color: var(--accent);">Maa-baap ke liye — raat ko bhi</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Bachche ki daily progress WhatsApp pe — kya padhha, kitna weak hai, kaunsa chapter attention chahta hai.
            </p>
          </div>
          <a href="/features/parent-portal/" class="flex items-center gap-1 text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">
            Jaano <span aria-hidden="true">→</span>
          </a>
        </div>

        <!-- 13: Reel Mode — full-width card -->
        <div class="card animate-on-scroll flex flex-col gap-4 sm:col-span-2 lg:col-span-3" style="border: 1px solid var(--accent); box-shadow: 0 0 20px var(--accent-glow);">
          <div class="flex flex-col sm:flex-row gap-4 items-start">
            <div class="text-5xl">🎬</div>
            <div class="flex-1">
              <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Reel Mode</div>
              <div class="text-sm font-bold mb-2" style="color: var(--accent);">Padhte padhte reel dekho</div>
              <p class="text-sm" style="color: var(--text-secondary);">
                TikTok ki tarah — 60-second audio reels mein ek concept. Boring nahi, engaging! Bus, travel, lunch break — kabhi bhi seekho.
                Teen crore Indian students reels dekhte hain — SAAVI ne usi format mein padhai laa di.
              </p>
            </div>
            <a href="/features/reel-mode/" class="btn btn-outline self-start flex-shrink-0">Jaano →</a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: FEATURE HIGHLIGHTS — Quick Stats
       ======================================================== -->
  <section class="section" aria-labelledby="highlights-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="highlights-heading" class="text-4xl font-heading font-bold mb-4">Numbers Bolte Hain</h2>
        <p class="text-lg" style="color: var(--text-secondary);">In 13 features ke peeche ek commitment hai — har Indian student ka saathi banna.</p>
      </div>

      <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-3xl mx-auto">
        <div class="text-center card animate-on-scroll">
          <div class="stat-number mb-1">13</div>
          <div class="text-sm" style="color: var(--text-secondary);">Features</div>
        </div>
        <div class="text-center card animate-on-scroll">
          <div class="stat-number mb-1">5</div>
          <div class="text-sm" style="color: var(--text-secondary);">Languages</div>
        </div>
        <div class="text-center card animate-on-scroll">
          <div class="stat-number mb-1">24/7</div>
          <div class="text-sm" style="color: var(--text-secondary);">Available</div>
        </div>
        <div class="text-center card animate-on-scroll">
          <div class="stat-number mb-1">₹199</div>
          <div class="text-sm" style="color: var(--text-secondary);">/Month Only</div>
        </div>
      </div>

      <!-- Blind Mode callout -->
      <div class="max-w-2xl mx-auto mt-10 animate-on-scroll">
        <blockquote class="text-center p-6 rounded-2xl" style="background: var(--accent-glow); border: 1px solid var(--accent);">
          <p class="text-lg font-heading font-bold mb-2" style="color: var(--accent);">
            ♿ Blind Mode — In 13 features mein se yeh ek hamesha FREE rahega.
          </p>
          <p class="text-sm" style="color: var(--text-secondary);">
            India ke 50 lakh visually impaired students ke liye yeh hamara vachan hai.
          </p>
          <a href="/blind-mode/" class="btn btn-outline mt-4 inline-flex">Blind Mode Ke Baare Mein →</a>
        </blockquote>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 4: BOTTOM CTA
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="features-cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-accent mb-6">🚀 Launching May 20, 2026</span>
        <h2 id="features-cta-heading" class="text-4xl font-heading font-bold mb-4">
          Ye 13 Powers Chahiye? Join Karo — Free Hai
        </h2>
        <p class="text-xl mb-8" style="color: var(--text-secondary);">
          Waitlist mein aao — launch pe 30-din extended free trial milega. Sirf pehle 1,000 logon ke liye.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-8">
          <a href="/waitlist/" class="btn btn-primary text-lg px-8 py-4">Join Waitlist Free →</a>
          <a href="/saavi/" class="btn btn-outline">SAAVI Se Milna Hai →</a>
        </div>
        <div class="flex flex-wrap justify-center gap-6 text-sm" style="color: var(--text-secondary);">
          <div class="flex items-center gap-2"><span style="color: var(--success);">✓</span><span>No credit card needed</span></div>
          <div class="flex items-center gap-2"><span style="color: var(--success);">✓</span><span>30-day free trial</span></div>
          <div class="flex items-center gap-2"><span style="color: var(--success);">✓</span><span>Priority access on launch</span></div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php include '../partials/footer.php'; ?>
