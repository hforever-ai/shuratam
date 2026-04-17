<?php
$title       = "Zero to Hero — Prerequisite AI Learning Path | Board Exam Preparation | Shrutam";
$description = "SAAVI pehle check karti hai kya basics pata hain. Phir complete path dikhati hai. Quadratic Equations → Factorization → Linear → Basics. Zero se Board Ready tak.";
$canonical   = "https://shrutam.ai/features/zero-to-hero/";
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
      "name"     => "Zero to Hero",
      "item"     => "https://shrutam.ai/features/zero-to-hero/",
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
          <li style="color: var(--text-secondary);">Zero to Hero</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-3">
            <span class="badge badge-accent">🚀 AI Feature</span>
            <span class="badge badge-primary">📚 NCERT Chain Learning</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Zero Se Board Ready — SAAVI Ka Poora Path
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            कुछ नहीं से बोर्ड रेडी।
          </p>

          <p class="text-lg mb-8" style="color: var(--text-body);">
            Zyaadatar students ek topic fail isliye karte hain kyunki uska
            <strong style="color: var(--text-primary);">neeche ka base hi nahi hai</strong>.
            SAAVI pehle gap dhundti hai — phir sab kuch fill karti hai, neeche se upar tak.
            Board exam mein koi topic chhutak nahi payega.
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
              <span class="text-2xl" aria-hidden="true">🔍</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Gap Detection</div>
                <p class="text-sm" style="color: var(--text-secondary);">SAAVI automatically pehchanti hai kaunse prerequisites nahi pata. Ek quick diagnostic test se sab clear ho jaata hai.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">🗺️</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Auto Path Builder</div>
                <p class="text-sm" style="color: var(--text-secondary);">Tumhara personal learning roadmap — Class 6 se 10 tak, ek connected chain. NCERT sequence ke anusaar.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">🏆</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Board Ready Certification</div>
                <p class="text-sm" style="color: var(--text-secondary);">Jab poora path complete ho, SAAVI confirm karti hai: "Tum Board Exam ke liye ready ho!" Har topic pe confidence.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: PREREQUISITE TREE VISUALIZATION
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="tree-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <span class="badge badge-primary mb-4">Real NCERT Chain</span>
        <h2 id="tree-heading" class="text-4xl font-heading font-bold mb-4">
          Ek Example Dekho — Quadratic Equations Ka Poora Path
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Class 10 mein Quadratic Equations fail ho rahi hain? Asli problem Class 6 ke basics mein ho sakti hai.
          SAAVI yeh poori chain detect karti hai.
        </p>
      </div>

      <!-- Prerequisite Tree — vertical chain -->
      <div class="flex flex-col items-center gap-0 max-w-lg mx-auto" role="list" aria-label="Prerequisite learning chain from Class 10 to Class 6">

        <!-- Node 1: Class 10 — current goal -->
        <div class="w-full" role="listitem">
          <div class="card text-center animate-on-scroll" style="border: 2px solid var(--accent); position: relative;">
            <div class="inline-flex items-center gap-2 mb-2">
              <span class="badge badge-accent">Class 10 — Goal</span>
            </div>
            <div class="text-xl font-heading font-bold" style="color: var(--accent);">Quadratic Equations</div>
            <p class="text-sm mt-1" style="color: var(--text-secondary);">ax² + bx + c = 0 — Board exam ka important chapter</p>
          </div>
        </div>

        <!-- Arrow down -->
        <div class="flex flex-col items-center py-1" aria-hidden="true">
          <div style="width: 2px; height: 20px; background: var(--border-default);"></div>
          <svg width="20" height="12" viewBox="0 0 20 12" fill="none" style="color: var(--border-strong);">
            <path d="M10 12L0.744 0H19.256L10 12Z" fill="currentColor"/>
          </svg>
          <p class="text-xs font-bold mt-1" style="color: var(--text-muted);">zaruri base</p>
        </div>

        <!-- Node 2: Class 9 -->
        <div class="w-full" role="listitem">
          <div class="card text-center animate-on-scroll" style="border: 2px solid var(--primary-light);">
            <div class="inline-flex items-center gap-2 mb-2">
              <span class="badge badge-primary">Class 9</span>
            </div>
            <div class="text-xl font-heading font-bold" style="color: var(--primary-light);">Factorization</div>
            <p class="text-sm mt-1" style="color: var(--text-secondary);">Polynomials ko factors mein todna — quadratic solve karne ke liye mandatory</p>
          </div>
        </div>

        <!-- Arrow down -->
        <div class="flex flex-col items-center py-1" aria-hidden="true">
          <div style="width: 2px; height: 20px; background: var(--border-default);"></div>
          <svg width="20" height="12" viewBox="0 0 20 12" fill="none" style="color: var(--border-strong);">
            <path d="M10 12L0.744 0H19.256L10 12Z" fill="currentColor"/>
          </svg>
          <p class="text-xs font-bold mt-1" style="color: var(--text-muted);">zaruri base</p>
        </div>

        <!-- Node 3: Class 8 -->
        <div class="w-full" role="listitem">
          <div class="card text-center animate-on-scroll" style="border: 2px solid var(--info);">
            <div class="inline-flex items-center gap-2 mb-2">
              <span style="background: var(--info-bg); color: var(--info); border: 1px solid var(--info); border-radius: 9999px; padding: .375rem .75rem; font-size: .75rem; font-weight: 600; display: inline-flex;">Class 8</span>
            </div>
            <div class="text-xl font-heading font-bold" style="color: var(--info);">Linear Equations</div>
            <p class="text-sm mt-1" style="color: var(--text-secondary);">Ek variable wali equations — algebra ka pehla serious step</p>
          </div>
        </div>

        <!-- Arrow down -->
        <div class="flex flex-col items-center py-1" aria-hidden="true">
          <div style="width: 2px; height: 20px; background: var(--border-default);"></div>
          <svg width="20" height="12" viewBox="0 0 20 12" fill="none" style="color: var(--border-strong);">
            <path d="M10 12L0.744 0H19.256L10 12Z" fill="currentColor"/>
          </svg>
          <p class="text-xs font-bold mt-1" style="color: var(--text-muted);">zaruri base</p>
        </div>

        <!-- Node 4: Class 7 -->
        <div class="w-full" role="listitem">
          <div class="card text-center animate-on-scroll" style="border: 2px solid var(--success);">
            <div class="inline-flex items-center gap-2 mb-2">
              <span style="background: var(--success-bg); color: var(--success); border: 1px solid var(--success); border-radius: 9999px; padding: .375rem .75rem; font-size: .75rem; font-weight: 600; display: inline-flex;">Class 7</span>
            </div>
            <div class="text-xl font-heading font-bold" style="color: var(--success);">Basic Algebra</div>
            <p class="text-sm mt-1" style="color: var(--text-secondary);">Variables, expressions, simple equations — algebra ki pehli zubaan</p>
          </div>
        </div>

        <!-- Arrow down -->
        <div class="flex flex-col items-center py-1" aria-hidden="true">
          <div style="width: 2px; height: 20px; background: var(--border-default);"></div>
          <svg width="20" height="12" viewBox="0 0 20 12" fill="none" style="color: var(--border-strong);">
            <path d="M10 12L0.744 0H19.256L10 12Z" fill="currentColor"/>
          </svg>
          <p class="text-xs font-bold mt-1" style="color: var(--text-muted);">zaruri base</p>
        </div>

        <!-- Node 5: Class 6 — Foundation -->
        <div class="w-full" role="listitem">
          <div class="card text-center animate-on-scroll" style="border: 2px solid var(--text-muted);">
            <div class="inline-flex items-center gap-2 mb-2">
              <span style="background: var(--bg-subtle); color: var(--text-secondary); border: 1px solid var(--border-default); border-radius: 9999px; padding: .375rem .75rem; font-size: .75rem; font-weight: 600; display: inline-flex;">Class 6 — Foundation</span>
            </div>
            <div class="text-xl font-heading font-bold" style="color: var(--text-primary);">Numbers &amp; Operations</div>
            <p class="text-sm mt-1" style="color: var(--text-secondary);">BODMAS, integers, fractions — sab kuch ka base yahan se shuru hota hai</p>
          </div>
        </div>

      </div>

      <p class="text-center mt-10 text-sm" style="color: var(--text-muted);">
        SAAVI detect karti hai tum kahan rok gaye — aur wahan se shuru karti hai. Time waste nahi.
      </p>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: HOW SAAVI DOES IT — 3 STEPS
       ======================================================== -->
  <section class="section" aria-labelledby="how-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <h2 id="how-heading" class="text-4xl font-heading font-bold mb-4">
          SAAVI Kaise Karta Hai Yeh Sab?
        </h2>
        <p class="text-lg max-w-xl mx-auto" style="color: var(--text-secondary);">
          Teen steps mein — automatic, personal, aur bilkul Hindi mein.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <!-- Step 1: Check -->
        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--primary-glow);">
            🔍
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--primary-light);">Step 1</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Check</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            SAAVI ek short diagnostic quiz leta hai. 5 minutes mein identify ho jaata hai — kaunse topics pata hain, kaunse bilkul nahi.
            Koi judgment nahi. Sirf diagnosis.
          </p>
        </div>

        <!-- Step 2: Fill Gaps -->
        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--accent-glow);">
            🧩
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--accent);">Step 2</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Fill Gaps</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Jahan gap hai, SAAVI wahan se padhaana shuru karti hai — Hindi mein, examples ke saath.
            Koi topic repeat nahi hoga jo tum already jaante ho.
            Sirf jo missing hai.
          </p>
        </div>

        <!-- Step 3: Advance -->
        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4" style="background: var(--success-bg);">
            🚀
          </div>
          <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">Step 3</div>
          <div class="text-xl font-heading font-bold mb-3" style="color: var(--text-primary);">Advance</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Jab base strong ho jaaye, SAAVI tum par automatically current class ke topic pe le jaati hai.
            Class 10 Board Exam — ab darne ki zaroorat nahi.
          </p>
        </div>

      </div>

      <!-- Callout box -->
      <div class="max-w-2xl mx-auto mt-10 p-6 rounded-2xl text-center animate-on-scroll" style="background: var(--primary-glow); border: 1px solid var(--border-default);">
        <p class="text-lg font-heading font-bold mb-2" style="color: var(--text-primary);">
          Average gap fill time: <span style="color: var(--accent);">2–3 weeks</span>
        </p>
        <p class="text-sm" style="color: var(--text-secondary);">
          Class 6 se Class 10 tak ka poora prerequisite chain — sirf 2-3 hafte mein, din ke 30 minute mein.
          SAAVI ka adaptive engine time waste nahi karta.
        </p>
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
        <p class="text-lg" style="color: var(--text-secondary);">Zero to Hero ke saath mila ke use karo — results double ho jaate hain.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <!-- Related: Adaptive Learning -->
        <a href="/features/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🧠</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Adaptive Learning</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">
            SAAVI tumhara pace aur level observe karti hai. Har session ke baad automatically adjust hoti hai.
          </p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <!-- Related: Ask Like 10 -->
        <a href="/features/ask-like-10/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">💡</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Ask Like 10</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">
            Samajh nahi aaya? SAAVI ke paas ek hi concept ke 10 alag tarike hain — analogy, story, experiment aur zyaada.
          </p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <!-- Related: Mock Exams -->
        <a href="/features/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📝</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Mock Exams</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">
            Board pattern pe practice tests. Real exam jaisa feel — ghar baithe. Har answer pe detailed feedback.
          </p>
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
          Apna Zero-to-Hero Path Shuru Karo
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-4" style="color: var(--accent);">
          देर मत करो — पहला कदम आज उठाओ।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist join karo — launch pe tumhara personal prerequisite path ready milega.
          Free hai. Hamesha rahega blind students ke liye.
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
