<?php
$title       = "Spoken English — Hinglish Se Confident English | Shrutam SAAVI";
$description = "Daily practice bina judgment ke. Pronunciation feedback. Hinglish se gradually English. Class 10 students ke liye interview prep. SAAVI ke saath bolna seekho.";
$canonical   = "https://shrutam.ai/features/spoken-english/";
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
      "name"     => "Spoken English",
      "item"     => "https://shrutam.ai/features/spoken-english/",
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
          <li style="color: var(--text-secondary);">Spoken English</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-3">
            <span class="badge badge-accent">🗣️ No Judgment</span>
            <span class="badge badge-primary">Daily Practice</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Hinglish Se Confident English
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            Bolना सीखो — डरो मत।
          </p>

          <p class="text-lg mb-8" style="color: var(--text-body);">
            School mein English bolne se log hasenge — yeh darr common hai.
            SAAVI ke saath <strong style="color: var(--text-primary);">koi judgment nahi</strong>.
            Hinglish mein shuru karo, SAAVI pronunciation feedback deti hai, slowly real English mein confident ho jaao.
            Class 10 ke baad interviews ke liye bhi ready.
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
              <span class="text-2xl" aria-hidden="true">🎙️</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Daily 10-Min Practice</div>
                <p class="text-sm" style="color: var(--text-secondary);">Roz 10 minute ka conversation session — SAAVI partner hai. Har roz naya topic, har roz thoda aur confident.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">🔊</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Pronunciation Feedback</div>
                <p class="text-sm" style="color: var(--text-secondary);">Galat pronounce kiya? SAAVI kindly correct karti hai — mockery nahi, improvement. "Isko aise bolo…"</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">🎓</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Interview Prep</div>
                <p class="text-sm" style="color: var(--text-secondary);">Class 10 ke baad college/college interviews. "Tell me about yourself", "Why this course" — SAAVI practice karati hai.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: THE JOURNEY
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="journey-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <span class="badge badge-primary mb-4">The Journey</span>
        <h2 id="journey-heading" class="text-4xl font-heading font-bold mb-4">
          Hinglish Se English — Tera Safar
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          SAAVI tumhe force nahi karti — gradually tumhare comfort level ke hisaab se English mein shift hoti hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--primary-glow);">
            🌱
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--primary-light);">Week 1–2</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Hinglish Start</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Apni language mein baat karo — SAAVI sun ti hai, galat grammar correct karti hai gently. Confidence pehle.
          </p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--accent-glow);">
            🚶
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--accent);">Week 3–6</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Mixed Practice</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            SAAVI thoda thoda English mein le jaati hai. Key sentences, common phrases — dheere dheere shift hota hai.
          </p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--success-bg);">
            🏃
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">Week 7+</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Confident English</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Fluent conversations, interview practice. Bina ruke, bina soche — English mein bol sako. Tumhari achievement.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: WHY NO JUDGMENT MATTERS
       ======================================================== -->
  <section class="section" aria-labelledby="why-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <h2 id="why-heading" class="text-4xl font-heading font-bold mb-4">
          Judgment-Free Zone Kyun Zaroori Hai?
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--error);">
          <div class="text-3xl mb-4" aria-hidden="true">😰</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">School Ka Darr</div>
          <p class="text-sm" style="color: var(--text-secondary);">Class mein English bolne pe classmates haste hain. Teacher correct karte hain publicly. Yeh confidence tod deta hai.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4" aria-hidden="true">🤖</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">SAAVI — No Mockery</div>
          <p class="text-sm" style="color: var(--text-secondary);">SAAVI kabhi nahi hasegi. Galat hua toh sirf "Aise bol sakte ho..." — encouraging, supportive. Hamesha.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4" aria-hidden="true">💪</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Confidence First</div>
          <p class="text-sm" style="color: var(--text-secondary);">Pehle confidence build hota hai, phir grammar. SAAVI ka approach: bolo pehle, perfect karo baad mein.</p>
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
        <h2 id="related-heading" class="text-3xl font-heading font-bold mb-3">Aur Bhi Features</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Spoken English ke saath yeh features bhi use karo.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <a href="/features/mother-tongue-learning/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🌏</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Mother Tongue Learning</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Pehle apni bhasha mein concepts clear karo — phir English mein express karna asaan ho jaata hai.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/revision-mode/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🔄</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Revision Mode</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">School ke baad Revision Mode + Spoken English practice — dono saath karo.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/reel-mode/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🎬</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Reel Mode</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">English bolne ke examples short reels mein dekho — real life conversations, fun aur educational.</p>
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
          Aaj Se Bolna Shuru Karo
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-4" style="color: var(--accent);">
          Hinglish से शुरू करो — English तक पहुँचो।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist join karo — launch pe Spoken English daily sessions start karo. Free. No judgment. Ever.
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
