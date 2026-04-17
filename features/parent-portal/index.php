<?php
$title       = "Parent Portal — Bachche Ki Padhai Track Karo | Shrutam";
$description = "Daily progress report, bedtime lock (auto-off), WhatsApp weekly summary, no ads, no social, NCERT aligned. Maa-baap ke liye — raat ko bhi.";
$canonical   = "https://shrutam.ai/features/parent-portal/";
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
      "name"     => "Parent Portal",
      "item"     => "https://shrutam.ai/features/parent-portal/",
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
          <li style="color: var(--text-secondary);">Parent Portal</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-6">
            <span class="badge badge-accent">👪 Safe Learning</span>
            <span class="badge badge-primary">WhatsApp Updates</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Maa-Baap Ke Liye — Raat Ko Bhi
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            बच्चा पढ़ रहा है या नहीं — जानो।
          </p>

          <img src="/assets/images/features/parent-portal.png" alt="Parent portal — track child progress, bedtime lock, WhatsApp reports" loading="lazy" class="w-full max-w-[240px] mx-auto my-6 rounded-xl">

          <p class="text-lg mb-8" style="color: var(--text-body);">
            Baccha phone pe kya kar raha hai — yeh tension sab parents ki hai.
            SAAVI ka Parent Portal ensure karta hai ki
            <strong style="color: var(--text-primary);">phone use ho raha hai toh padhai ke liye</strong>.
            Daily report, bedtime lock, WhatsApp updates — sab maa-baap ke haath mein.
            Koi ads nahi, koi social media nahi, sirf padhai.
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
              <span class="text-2xl" aria-hidden="true">📊</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Daily Progress Report</div>
                <p class="text-sm" style="color: var(--text-secondary);">Aaj kitna padha, kaunse chapters, kya score aaya — parent dashboard pe clearly dikhta hai. Roz.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">🌙</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Bedtime Lock</div>
                <p class="text-sm" style="color: var(--text-secondary);">Raat 10 baje auto-off — set karo aur bhool jao. Baccha phone use karna chahe bhi toh app lock ho jaayegi.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">💬</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">WhatsApp Weekly Summary</div>
                <p class="text-sm" style="color: var(--text-secondary);">Har hafte summary WhatsApp pe aati hai — app download karne ki zaroorat nahi. Simple aur familiar.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: SAFETY FEATURES
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="safety-heading">
    <div class="container">
      <div class="text-center mb-12">
        <span class="badge badge-primary mb-4">Safe by Design</span>
        <h2 id="safety-heading" class="text-4xl font-heading font-bold mb-4">
          SAAVI — 100% Safe Learning App
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Instagram, YouTube, games — sab ki tension khatam. SAAVI mein sirf padhai hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-3" aria-hidden="true">🚫</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Zero Ads</div>
          <p class="text-sm" style="color: var(--text-secondary);">Koi advertisement nahi — koi bhi. Na gaming ads, na shopping, na anything inappropriate.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-3" aria-hidden="true">🔒</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">No Social Media</div>
          <p class="text-sm" style="color: var(--text-secondary);">Koi social feed nahi, koi strangers nahi. Sirf SAAVI aur content — safe environment.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-3" aria-hidden="true">📚</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">NCERT Aligned</div>
          <p class="text-sm" style="color: var(--text-secondary);">Sab content NCERT se aligned — school syllabus exact match. Koi random content nahi.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-3" aria-hidden="true">🌙</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Bedtime Lock</div>
          <p class="text-sm" style="color: var(--text-secondary);">Parent-set time pe auto-off. Raat mein padhai bhi nahi — neend zaroori hai.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: WHAT PARENTS GET
       ======================================================== -->
  <section class="section" aria-labelledby="parents-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="parents-heading" class="text-4xl font-heading font-bold mb-4">
          Maa-Baap Ko Kya Milega?
        </h2>
        <p class="text-lg max-w-xl mx-auto" style="color: var(--text-secondary);">
          App install karne ki zaroorat nahi. WhatsApp hi kaafi hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4" aria-hidden="true">📱</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">WhatsApp Report</div>
          <p class="text-sm" style="color: var(--text-secondary);">Har hafte automatically WhatsApp pe report aati hai — aaj kitna padha, kaunse subjects, kahan improvement hua.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4" aria-hidden="true">🎯</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Alert System</div>
          <p class="text-sm" style="color: var(--text-secondary);">Baccha 3 din se nahi padha — parent ko notification. Streak toot gayi — gentle reminder. Involved parents = better results.</p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4" aria-hidden="true">😌</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Peace of Mind</div>
          <p class="text-sm" style="color: var(--text-secondary);">Baccha phone pe hai — safe hai, padh raha hai. No more "phone rakh ke padh!" arguments. SAAVI handle kar rahi hai.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 4: RELATED FEATURES
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="related-heading">
    <div class="container">
      <div class="text-center mb-10">
        <h2 id="related-heading" class="text-3xl font-heading font-bold mb-3">Poora SAAVI System</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Parent Portal + yeh features = complete learning ecosystem.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <a href="/features/student-tracking/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📊</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Student Tracking</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Bacche ka personal dashboard — parent portal uska summary dikhata hai.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/mock-exams/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📝</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Mock Exams</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Mock exam scores parent dashboard mein dikhte hain — progress clearly track karo.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/revision-mode/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🔄</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Revision Mode</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">School ke baad Revision Mode — parent portal mein dikhega kitna revise kiya.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 5: CTA
       ======================================================== -->
  <section class="section" aria-labelledby="cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-accent mb-6">🟢 Launching May 20, 2026</span>
        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          Bacche Ki Padhai Track Karo — Aasaani Se
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-4" style="color: var(--accent);">
          बच्चा पढ़ेगा — आप जानोगे।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist join karo — launch pe Parent Portal ready milega. WhatsApp pe updates, bedtime lock, sab. Free.
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
