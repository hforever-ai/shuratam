<?php
$title       = "Revision Mode — School Ke Baad SAAVI Ke Saath | Shrutam";
$description = "School se aao, Revision Mode on karo. Aaj ke class topics already prepared hain. Community notes from toppers. SAAVI apni language mein explain karti hai.";
$canonical   = "https://shrutam.ai/features/revision-mode/";
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
      "name"     => "Revision Mode",
      "item"     => "https://shrutam.ai/features/revision-mode/",
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
    <div class="container">

      <!-- Breadcrumb -->
      <nav aria-label="Breadcrumb" class="mb-8">
        <ol class="flex flex-wrap items-center gap-2 text-sm" style="color: var(--text-muted);">
          <li><a href="/" style="color: var(--text-muted);">Home</a></li>
          <li aria-hidden="true" style="color: var(--text-muted);">›</li>
          <li><a href="/features/" style="color: var(--text-muted);">Features</a></li>
          <li aria-hidden="true" style="color: var(--text-muted);">›</li>
          <li style="color: var(--text-secondary);">Revision Mode</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-3">
            <span class="badge badge-accent">📚 After School</span>
            <span class="badge badge-primary">Community Notes</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            School Se Aao — Revision Mode On Karo
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            स्कूल की पढ़ाई घर पर और मज़बूत।
          </p>

          <p class="text-lg mb-8" style="color: var(--text-body);">
            School mein teacher ne jo padhaya — SAAVI wahi topics ghar pe ready rakhti hai.
            <strong style="color: var(--text-primary);">Aaj ka chapter, aaj ki revision</strong>.
            Toppers ke notes, SAAVI ki explanation, apni language mein — sab ek jagah.
            Koi extra tuition nahi chahiye.
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
              <span class="text-2xl" aria-hidden="true">📅</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Today's Topics Auto-Prepared</div>
                <p class="text-sm" style="color: var(--text-secondary);">Apna school aur class set karo — SAAVI aaj ka syllabus automatically match kar ke ready kar deti hai.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">⭐</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Topper Community Notes</div>
                <p class="text-sm" style="color: var(--text-secondary);">State board toppers ke handwritten + digital notes. Curated aur verified. Kisi bhi chapter ke liye.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">🗣️</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">SAAVI Notes Ko Explain Karti Hai</div>
                <p class="text-sm" style="color: var(--text-secondary);">Notes mein kuch samajh nahi aaya? SAAVI usi note ka concept apni language mein bol ke samjha deti hai.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: HOW REVISION MODE WORKS
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="how-heading">
    <div class="container">
      <div class="text-center mb-12">
        <span class="badge badge-primary mb-4">How It Works</span>
        <h2 id="how-heading" class="text-4xl font-heading font-bold mb-4">
          School Se Ghar Tak — Revision Mode Ka Flow
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--primary-glow);">
            🏫
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--primary-light);">Step 1</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">School Mein</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Teacher padhata hai — tum sun te ho. Jo samajh aaya, jo nahi aaya — dono note karo. SAAVI baad mein dono handle kar legi.
          </p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--accent-glow);">
            📱
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--accent);">Step 2</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Revision Mode On</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Ghar aao, app kholo — aaj ke topics already lined up hain. Topper notes + SAAVI explanation ekdum ready.
          </p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--success-bg);">
            ✅
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">Step 3</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Revise + Quiz</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Notes padho, SAAVI se samjho, phir 5-question quick quiz — aaj ka chapter pakka ho gaya. No stress.
          </p>
        </div>

      </div>

      <div class="max-w-2xl mx-auto mt-10 p-6 rounded-2xl text-center animate-on-scroll" style="background: var(--primary-glow); border: 1px solid var(--border-default);">
        <p class="text-lg font-heading font-bold mb-2" style="color: var(--text-primary);">
          Daily revision time: sirf <span style="color: var(--accent);">20-30 minutes</span>
        </p>
        <p class="text-sm" style="color: var(--text-secondary);">
          School ke baad ek ghante ki tuition ki zaroorat nahi. SAAVI ke saath 30 minute kaafi hain — smart revision, efficient learning.
        </p>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: RELATED FEATURES
       ======================================================== -->
  <section class="section" aria-labelledby="related-heading">
    <div class="container">
      <div class="text-center mb-10">
        <h2 id="related-heading" class="text-3xl font-heading font-bold mb-3">Revision Ke Saath Yeh Bhi Karo</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Revision Mode aur bhi powerful ho jaata hai in features ke saath.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <a href="/features/exam-notes/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📋</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Exam Notes</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Board exam format mein auto-generated notes — chapter-wise, apni language mein.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/mock-exams/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📝</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Mock Exams</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Revision ke baad practice test — board exam ready feel karo.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/photo-doubt-solver/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📸</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Photo Doubt Solver</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Revision mein doubt aaya? Photo kheecho — SAAVI solve kar deti hai.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 4: CTA
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-accent mb-6">🟢 Launching May 20, 2026</span>
        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          Aaj Se School Ke Baad Revision Mode
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-4" style="color: var(--accent);">
          स्कूल की पढ़ाई घर पर पक्की करो।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist join karo — launch pe Revision Mode ready milega tumhare school ke syllabus ke saath. Free hai.
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
