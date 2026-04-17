<?php
$title       = "Reel Mode — Padhte Padhte Reel Dekho | Shrutam SAAVI";
$description = "3-5 min learning videos. Instagram reels jaisi swipe. Bite-sized concepts, fun animations. Learn while scrolling — padhna aur entertaining ho jaata hai.";
$canonical   = "https://shrutam.ai/features/reel-mode/";
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
      "name"     => "Reel Mode",
      "item"     => "https://shrutam.ai/features/reel-mode/",
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
          <li style="color: var(--text-secondary);">Reel Mode</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-3">
            <span class="badge badge-accent">🎬 Learning Reels</span>
            <span class="badge badge-primary">3-5 Min Videos</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Padhte Padhte Reel Dekho
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            Swipe करो — सीखो।
          </p>

          <p class="text-lg mb-8" style="color: var(--text-body);">
            Reels dekhna toh pata hai — ab <strong style="color: var(--text-primary);">learning reels</strong> dekhte hain.
            SAAVI ke Reel Mode mein har swipe ek naya concept hai — 3-5 minute, fun animations,
            Hinglish mein baat karna. Instagram wali feeling, NCERT ka content.
            Phoonk le phone, par kuch toh seekh lo.
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
              <span class="text-2xl" aria-hidden="true">👆</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Swipe to Learn</div>
                <p class="text-sm" style="color: var(--text-secondary);">Instagram jaisi UX — upar swipe karo, naya concept. Poora chapter aise hi swipe karte karte khatam ho jaata hai.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">🎨</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Fun Animations</div>
                <p class="text-sm" style="color: var(--text-secondary);">Boring textbook diagrams nahi — colorful animations. DNA replication, chemical reactions, geometry — sab animated.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">⏱️</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Bite-Sized — 3-5 Min</div>
                <p class="text-sm" style="color: var(--text-secondary);">Koi 40-minute lecture nahi. Har reel ek concept — 3 se 5 minute. Attention span ke hisaab se designed.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: HOW REEL MODE WORKS
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="how-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <span class="badge badge-primary mb-4">How It Works</span>
        <h2 id="how-heading" class="text-4xl font-heading font-bold mb-4">
          Reel Mode — Instagram Jaisa Feel, Learning Ka Result
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Tumhara favourite scroll experience — ab kuch kaam ka bhi.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--primary-glow);">
            📱
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--primary-light);">Step 1</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Reel Mode Open Karo</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Subject choose karo — Maths, Science, History — phir reels feed shuru hoti hai. Seedha relevant content.
          </p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--accent-glow);">
            👆
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--accent);">Step 2</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Swipe Karo</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Ek reel khatam hua — swipe up. Naya concept. Ek chapter 15-20 reels mein — 1 hour mein ek chapter done.
          </p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--success-bg);">
            ✅
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">Step 3</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Quick Quiz</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Har 5 reels ke baad 2-question quick quiz — samjha ya nahi, turant pata chalta hai. Wrong pe explanation milti hai.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: WHY REELS WORK FOR LEARNING
       ======================================================== -->
  <section class="section" aria-labelledby="why-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <h2 id="why-heading" class="text-4xl font-heading font-bold mb-4">
          Reels Se Kyun Sikha Jaata Hai?
        </h2>
        <p class="text-lg max-w-xl mx-auto" style="color: var(--text-secondary);">
          Brain short content mein zyada engage rehta hai — science hai yeh.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4" aria-hidden="true">🧠</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Short = Better Retention</div>
          <p class="text-sm" style="color: var(--text-secondary);">Research: 5 minute concepts yaad rehte hain zyada. 40 minute lecture mein last half bhool jaate hain. Reels ka science yahi hai.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4" aria-hidden="true">🎨</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Visual = Faster Understand</div>
          <p class="text-sm" style="color: var(--text-secondary);">Animated visual + audio — dono saath milke concept seedha brain mein enter hota hai. Boring text se 6x faster.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4" aria-hidden="true">😊</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Fun = More Time Spent</div>
          <p class="text-sm" style="color: var(--text-secondary);">Boring padhai se 30 minute mein dil bhar jaata hai. Reels mein? "Bas ek aur…" — 2 ghante ho jaate hain bina pata chale.</p>
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
        <h2 id="related-heading" class="text-3xl font-heading font-bold mb-3">Reel Mode Ke Baad Yeh Bhi Karo</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Concept reels mein dekha — ab deep dive karo.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <a href="/features/adaptive-learning/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🧠</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Adaptive Learning</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Reel se concept pata chala — Adaptive Learning se practice karo apne level pe.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/exam-notes/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📋</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Exam Notes</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Reel dekha — notes mein read karo detail mein. Board exam ke liye complete package.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/photo-doubt-solver/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📸</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Photo Doubt Solver</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Reel ke baad homework mein doubt? Photo kheecho — SAAVI solve kar deti hai.</p>
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
          Scroll Karo — Seekhte Raho
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-4" style="color: var(--accent);">
          Reel देखो — knowledge पाओ।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist join karo — launch pe Reel Mode ready milega. Learning ka sabse fun tarika. Free.
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
