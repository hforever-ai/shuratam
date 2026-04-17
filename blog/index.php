<?php
$title       = "Shrutam Blog — Hindi Mein AI Education | SAAVI Tips";
$description = "Shrutam blog — Science aur Maths ko Hindi mein samjho. SAAVI style. Board exam tips, study hacks, blind mode guide.";
$canonical   = "https://shrutam.ai/blog/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"           => "BreadcrumbList",
      "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home",  "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "Blog",  "item" => "https://shrutam.ai/blog/"],
      ],
    ],
    [
      "@type"     => "Blog",
      "name"      => "Shrutam Blog",
      "url"       => "https://shrutam.ai/blog/",
      "publisher" => ["@type" => "Organization", "name" => "Shrutam", "url" => "https://shrutam.ai"],
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main">

  <!-- =====================================================
       HERO
       ===================================================== -->
  <section class="section" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">

      <!-- Breadcrumb -->
      <nav aria-label="Breadcrumb" class="text-sm mb-6" style="color: var(--text-muted);">
        <a href="/" style="color: var(--primary-light);">Home</a>
        <span class="mx-2">/</span>
        <span style="color: var(--text-secondary);">Blog</span>
      </nav>

      <div class="text-center mb-4">
        <span class="badge badge-accent">✍️ SAAVI Ka Blog</span>
      </div>
      <h1 class="text-5xl font-heading font-bold text-center mb-4 text-gradient">
        Shrutam Blog — Samjho, Seekho, Badho
      </h1>
      <p class="text-lg text-center max-w-2xl mx-auto" style="color: var(--text-secondary);">
        Science, Maths aur Board Exam ki preparation — sab kuch SAAVI style mein. Hindi mein, simple mein, dil se.
      </p>
    </div>
  </section>

  <!-- =====================================================
       BLOG POST GRID
       ===================================================== -->
  <section class="section section-dark">
    <div class="container">

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Post 1: Photosynthesis -->
        <article class="card animate-on-scroll flex flex-col gap-4" style="border-top: 3px solid var(--primary);">
          <div class="flex items-center gap-2">
            <span class="badge badge-primary">🔬 Science</span>
            <span class="text-xs" style="color: var(--text-muted);">Apr 2026</span>
          </div>
          <h2 class="font-heading font-bold text-xl" style="color: var(--text-primary);">
            <a href="/blog/photosynthesis-hindi/" style="color: inherit; text-decoration: none;">
              Photosynthesis Kya Hai — Simple Hindi Mein
            </a>
          </h2>
          <p class="text-sm flex-1" style="color: var(--text-secondary);">
            Ped ka apna kitchen — sunlight se khana kaise banta hai? SAAVI style mein samjho, board exam ke liye ready ho jao.
          </p>
          <a href="/blog/photosynthesis-hindi/" class="text-sm font-heading font-bold" style="color: var(--primary-light);">
            Read More →
          </a>
        </article>

        <!-- Post 2: CG Board Class 10 -->
        <article class="card animate-on-scroll flex flex-col gap-4" style="border-top: 3px solid var(--accent);">
          <div class="flex items-center gap-2">
            <span class="badge badge-accent">📋 Board Exam</span>
            <span class="text-xs" style="color: var(--text-muted);">Apr 2026</span>
          </div>
          <h2 class="font-heading font-bold text-xl" style="color: var(--text-primary);">
            <a href="/blog/cg-board-class10-preparation/" style="color: inherit; text-decoration: none;">
              CG Board Class 10 Taiyaari 2026 — Complete Guide
            </a>
          </h2>
          <p class="text-sm flex-1" style="color: var(--text-secondary);">
            CG Board Class 10 exam kaise crack karein? Subject-wise strategy, timetable tips, aur SAAVI se revision ka plan.
          </p>
          <a href="/blog/cg-board-class10-preparation/" class="text-sm font-heading font-bold" style="color: var(--primary-light);">
            Read More →
          </a>
        </article>

        <!-- Post 3: Blind Students AI Education -->
        <article class="card animate-on-scroll flex flex-col gap-4" style="border-top: 3px solid var(--success);">
          <div class="flex items-center gap-2">
            <span class="badge" style="background: var(--success); color: #000;">♿ Blind Mode</span>
            <span class="text-xs" style="color: var(--text-muted);">Apr 2026</span>
          </div>
          <h2 class="font-heading font-bold text-xl" style="color: var(--text-primary);">
            <a href="/blog/blind-students-ai-education/" style="color: inherit; text-decoration: none;">
              Blind Students Ke Liye AI Education
            </a>
          </h2>
          <p class="text-sm flex-1" style="color: var(--text-secondary);">
            India ke 50 lakh visually impaired students kaise padhh sakte hain bina screen ke? SAAVI Blind Mode ki poori kahani.
          </p>
          <a href="/blog/blind-students-ai-education/" class="text-sm font-heading font-bold" style="color: var(--primary-light);">
            Read More →
          </a>
        </article>

        <!-- Post 4: Adaptive Learning -->
        <article class="card animate-on-scroll flex flex-col gap-4" style="border-top: 3px solid var(--primary);">
          <div class="flex items-center gap-2">
            <span class="badge badge-primary">🎯 Learning</span>
            <span class="text-xs" style="color: var(--text-muted);">Apr 2026</span>
          </div>
          <h2 class="font-heading font-bold text-xl" style="color: var(--text-primary);">
            <a href="/blog/adaptive-learning-kya-hai/" style="color: inherit; text-decoration: none;">
              Adaptive Learning Kya Hai
            </a>
          </h2>
          <p class="text-sm flex-1" style="color: var(--text-secondary);">
            Har bachcha alag hota hai — toh padhane ka tarika bhi alag kyun nahi? Adaptive learning kya hai aur SAAVI isko kaise use karti hai.
          </p>
          <a href="/blog/adaptive-learning-kya-hai/" class="text-sm font-heading font-bold" style="color: var(--primary-light);">
            Read More →
          </a>
        </article>

        <!-- Post 5: Zero to Hero -->
        <article class="card animate-on-scroll flex flex-col gap-4" style="border-top: 3px solid var(--accent);">
          <div class="flex items-center gap-2">
            <span class="badge badge-accent">🏆 Motivation</span>
            <span class="text-xs" style="color: var(--text-muted);">Apr 2026</span>
          </div>
          <h2 class="font-heading font-bold text-xl" style="color: var(--text-primary);">
            <a href="/blog/zero-to-hero-learning/" style="color: inherit; text-decoration: none;">
              Zero to Hero — Kuch Nahi Se Board Ready
            </a>
          </h2>
          <p class="text-sm flex-1" style="color: var(--text-secondary);">
            Kuch nahi aata toh kya? SAAVI tumhara foundation banati hai aur board exam tak poora path plan karti hai — zero se hero tak.
          </p>
          <a href="/blog/zero-to-hero-learning/" class="text-sm font-heading font-bold" style="color: var(--primary-light);">
            Read More →
          </a>
        </article>

        <!-- CTA card -->
        <div class="card animate-on-scroll flex flex-col gap-4 items-center justify-center text-center" style="border: 2px dashed var(--border-default); background: var(--bg-elevated);">
          <div class="text-4xl">✍️</div>
          <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Aur Articles Aa Rahe Hain</div>
          <p class="text-sm" style="color: var(--text-secondary);">SAAVI ke saath padho, latest tips pao. Waitlist join karo aur updates pehle pao.</p>
          <a href="/waitlist/" class="btn btn-primary">Join Waitlist →</a>
        </div>

      </div>
    </div>
  </section>

  <!-- =====================================================
       CTA STRIP
       ===================================================== -->
  <section class="section" aria-labelledby="blog-cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <h2 id="blog-cta-heading" class="text-3xl font-heading font-bold mb-4">
          Padhna Kaafi Nahi — Samjhna Zaroori Hai
        </h2>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          SAAVI tumhare saath hai — Hindi mein, dil se, ek teacher ki tarah. Waitlist mein join karo aur May 20 launch pe sabse pehle access pao.
        </p>
        <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
      </div>
    </div>
  </section>

</main>

<?php include '../partials/footer.php'; ?>
