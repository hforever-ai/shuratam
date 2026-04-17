<?php
$title       = "Mother Tongue Learning — Pehle Apni Bhasha Mein | Shrutam SAAVI";
$description = "SAAVI tumhare native language mein padhati hai — translation nahi, native generation. Hindi student ko Hindi, Hinglish student ko Hinglish. 5 languages supported.";
$canonical   = "https://shrutam.ai/features/mother-tongue-learning/";
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
      "name"     => "Mother Tongue Learning",
      "item"     => "https://shrutam.ai/features/mother-tongue-learning/",
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
          <li style="color: var(--text-secondary);">Mother Tongue Learning</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-3">
            <span class="badge badge-accent">🌏 Native Language</span>
            <span class="badge badge-primary">5 Languages</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Pehle Apni Bhasha Mein, Phir Aage
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            अपनी भाषा में समझो — फिर दुनिया समझेगी।
          </p>

          <div class="chalkboard mx-auto my-3">
            <img src="/assets/images/features/mother-tongue.png" alt="Mother tongue learning — Hindi, Telugu, Marathi, English" loading="lazy" class="w-full max-w-[200px] md:max-w-[240px] lg:max-w-[280px] mx-auto my-3 rounded-xl">
          </div>

          <p class="text-lg mb-8" style="color: var(--text-body);">
            English medium school mein bhi kuch concepts tab tak nahi samajh aate jab tak
            <strong style="color: var(--text-primary);">apni zubaan mein nahi sunate</strong>.
            SAAVI tumhare mother tongue mein content generate karti hai — translate karke nahi,
            seedha us language mein sochke. Hindi, Hinglish, Marathi, Telugu, Gujarati — sab.
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
              <span class="text-2xl" aria-hidden="true">🧠</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Native Generation, Not Translation</div>
                <p class="text-sm" style="color: var(--text-secondary);">SAAVI pehle Hindi mein sochti hai, phir bolti hai. Machine translation ki awkward phrasing nahi — real Hindi jaisi explanation.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">🌐</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">5 Languages Ready</div>
                <p class="text-sm" style="color: var(--text-secondary);">Hindi, Hinglish, Marathi, Telugu, Gujarati — ek hi app mein. Apni language choose karo, baaki SAAVI sambhal leti hai.</p>
              </div>
            </div>
          </div>
          <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
            <div class="flex items-start gap-3">
              <span class="text-2xl" aria-hidden="true">📖</span>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Concept-Level Adaptation</div>
                <p class="text-sm" style="color: var(--text-secondary);">Ek hi concept ko SAAVI har language mein alag tarah se explain karti hai — local analogies, familiar examples, apni culture se.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: PHOTOSYNTHESIS EXAMPLE ACROSS LANGUAGES
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="example-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <span class="badge badge-primary mb-4">Real Example</span>
        <h2 id="example-heading" class="text-4xl font-heading font-bold mb-4">
          Ek Concept — Paanch Zabaanein
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Photosynthesis — SAAVI isko har language mein alag tarah se explain karti hai.
          Sirf words nahi badle — poori soch badal jaati hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--primary-light);">Hindi</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            "पत्तियाँ सूरज की रोशनी को खाना बनाने में इस्तेमाल करती हैं — जैसे हम गैस चूल्हे पर खाना पकाते हैं, पत्तियाँ सूरज की रोशनी पर।"
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--accent);">Hinglish</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            "Leaves basically sunlight ko use karke apna khana banati hain — like a solar-powered kitchen. CO₂ in, oxygen out, glucose bana liya!"
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--success);">Marathi</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            "पाने सूर्यप्रकाशाचा वापर करून स्वतःचं अन्न तयार करतात — जसं आपण चुलीवर स्वयंपाक करतो, पानं सूर्यावर करतात."
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--info);">
          <div class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--info);">Telugu</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            "ఆకులు సూర్యకాంతిని ఉపయోగించి తమ ఆహారాన్ని తయారు చేసుకుంటాయి — మనం వంట చేసినట్టే, కానీ సూర్యుడే వాటి గ్యాస్ స్టవ్."
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--text-muted);">
          <div class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--text-secondary);">Gujarati</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            "પાંદડા સૂર્યપ્રકાશ વાપરીને પોતાનો ખોરાક બનાવે છે — જેમ આપણે ગેસ પર રાંધીએ, તેમ પાંદડા સૂર્ય પર."
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary); background: var(--primary-glow);">
          <div class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--primary-light);">Result</div>
          <p class="text-sm font-bold" style="color: var(--text-primary);">
            Sirf words translate nahi kiye — poori analogy local culture se match karti hai. Isliye samajh aata hai.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: WHY IT MATTERS
       ======================================================== -->
  <section class="section" aria-labelledby="why-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <h2 id="why-heading" class="text-4xl font-heading font-bold mb-4">
          English Mein Padhna Kyun Mushkil Hai?
        </h2>
        <p class="text-lg max-w-xl mx-auto" style="color: var(--text-secondary);">
          Problem language nahi hai — problem translation hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--error);">
          <div class="text-3xl mb-4" aria-hidden="true">😵</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Double Processing</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            English mein padho, Hindi mein samjho, phir English mein answer likho. Teen baar kaam. SAAVI isko ek step mein karta hai.
          </p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4" aria-hidden="true">🔄</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Lost in Translation</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Google Translate waali Hindi aur real Hindi mein fark hai. SAAVI real conversational language use karti hai — jaise tumhara best friend samjhaye.
          </p>
        </div>

        <div class="card text-center animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4" aria-hidden="true">✅</div>
          <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Native = Faster</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Research bolti hai: native language mein padhne se concept 40% faster samajh aata hai. SAAVI isi research pe built hai.
          </p>
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
        <p class="text-lg" style="color: var(--text-secondary);">Mother Tongue Learning ke saath mila ke use karo.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <a href="/features/exam-notes/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📋</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Exam Notes</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Auto-generated notes apni language mein — board exam format mein, chapter-wise.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/photo-doubt-solver/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📸</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Photo Doubt Solver</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Hindi handwriting bhi parhti hai SAAVI. Photo kheechi, apni zubaan mein jawab pao.</p>
          <span class="text-sm font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <a href="/features/spoken-english/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🗣️</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Spoken English</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Hinglish se confident English tak — apni pace pe, bina judgment ke.</p>
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
          Apni Bhasha Mein Padhna Shuru Karo
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-4" style="color: var(--accent);">
          अपनी भाषा में समझो — पहला कदम आज उठाओ।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist join karo — launch pe apni preferred language set karo aur SAAVI se apni zubaan mein padhna shuru karo. Free hai.
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
