<?php
$title       = "Shrutam Ke Baare Mein — India Ka AI Education Mission | Aarambha";
$description = "Shrutam kyun bana? Gaon ke students ke liye. Blind students ke liye. ₹3000 tutor afford nahi kar paate ke liye. Aarambha ka pehla product.";
$canonical   = "https://shrutam.ai/about/";
$schema      = json_encode([
    "@context" => "https://schema.org",
    "@type" => "BreadcrumbList",
    "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home",  "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "About", "item" => "https://shrutam.ai/about/"],
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       HERO
       ======================================================== -->
  <section class="section" aria-labelledby="about-hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center max-w-3xl mx-auto">
        <span class="badge badge-primary mb-4">Aarambha Ka Pehla Product</span>
        <h1 id="about-hero-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
          Shrutam Ka Safar — Kyun Bana Yeh
        </h1>
        <p class="text-xl" style="color: var(--text-secondary);">
          22 saal enterprise tech. Ek sawaal. Ek jawab.
        </p>
      </div>
    </div>
  </section>

  <!-- ========================================================
       FOUNDER'S NOTE
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="founder-heading">
    <div class="container">
      <div class="max-w-3xl mx-auto">
        <h2 id="founder-heading" class="text-3xl font-heading font-bold mb-8 text-center" style="color: var(--primary-light);">
          Founder Ki Baat
        </h2>

        <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary); background: var(--bg-surface);">
          <div class="flex items-start gap-4 mb-6">
            <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl flex-shrink-0" style="background: var(--primary-glow); border: 2px solid var(--primary);">👤</div>
            <div>
              <div class="font-heading font-bold" style="color: var(--text-primary);">Founder, Aarambha</div>
              <div class="text-sm" style="color: var(--text-muted);">22 years enterprise technology</div>
            </div>
          </div>

          <blockquote class="text-lg leading-relaxed mb-6" style="color: var(--text-body);">
            <p class="mb-4">
              "Maine 22 saal enterprise technology mein kaam kiya. Ek din socha — yeh sab gaon tak kyun nahi pahuncha?
            </p>
            <p class="mb-4">
              Millions of brilliant Indian minds are being left behind. Not because they lack intelligence. But because the tools speak the wrong language.
            </p>
            <p>
              Shrutam is my answer."
            </p>
          </blockquote>

          <cite class="font-heading font-bold not-italic" style="color: var(--accent);">— Founder, Aarambha</cite>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       THE NAME
       ======================================================== -->
  <section class="section" aria-labelledby="name-heading">
    <div class="container">
      <div class="max-w-3xl mx-auto">
        <h2 id="name-heading" class="text-3xl font-heading font-bold mb-8 text-center" style="color: var(--primary-light);">
          "Shrutam" Ka Matlab
        </h2>

        <div class="card animate-on-scroll text-center" style="background: var(--bg-surface); border: 1px solid var(--border-default);">
          <!-- Sanskrit word -->
          <div lang="sa" class="font-devanagari-heading text-6xl mb-4" style="color: var(--accent);">शृतम्</div>
          <div class="text-2xl font-heading font-bold mb-2" style="color: var(--text-primary);">Shrutam</div>
          <div class="text-lg italic mb-8" style="color: var(--text-secondary);">"That which is heard" (Sanskrit)</div>

          <!-- Explanation -->
          <div class="max-w-2xl mx-auto text-left flex flex-col gap-6">

            <div class="flex items-start gap-4 animate-on-scroll">
              <div class="text-3xl flex-shrink-0">📖</div>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Vedic Tradition — Shruti</div>
                <p class="text-sm" style="color: var(--text-secondary);">Vedic tradition mein knowledge "Shruti" ke through pass hota tha — sunne se. Guru bolte the, shishya sunta tha. Koi book nahi thi. Sab kuch oral tha — aur phir bhi generations tak accurate raha.</p>
              </div>
            </div>

            <div class="flex items-start gap-4 animate-on-scroll">
              <div class="text-3xl flex-shrink-0">🎧</div>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Sab se Mushkil Baccha Bhi Seekh Sakta Tha</div>
                <p class="text-sm" style="color: var(--text-secondary);">Guru bolte the — shishya sunta tha — koi book nahi tha. Sab se mushkil baccha bhi sunke seekh jaata tha. Yahi magic hai sunne ka. SAAVI usi tradition ko modern AI ke saath laati hai.</p>
              </div>
            </div>

            <div class="flex items-start gap-4 animate-on-scroll">
              <div class="text-3xl flex-shrink-0">🏛️</div>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Modern Gurukul</div>
                <p class="text-sm" style="color: var(--text-secondary);">India's oral tradition — Shrutam is the modern gurukul. Har ghar mein, har bachche ke liye, 24/7 ek guru ki awaaz. Guru ab sirf khaas schools mein nahi — har jagah hai.</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       MISSION
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="mission-heading">
    <div class="container">
      <div class="max-w-3xl mx-auto text-center">
        <h2 id="mission-heading" class="text-3xl font-heading font-bold mb-8" style="color: var(--primary-light);">
          Hamara Mission
        </h2>

        <blockquote class="p-8 rounded-2xl mb-10 animate-on-scroll" style="background: var(--primary-glow); border: 2px solid var(--primary);">
          <p class="text-2xl font-heading font-bold leading-relaxed" style="color: var(--text-primary);">
            "Har student ko AI teacher milni chahiye —<br>
            <span style="color: var(--accent);">unki bhasha mein,</span><br>
            <span style="color: var(--primary-light);">unke pace pe,</span><br>
            <span style="color: var(--success);">unke budget mein.</span>"
          </p>
        </blockquote>

        <p class="text-lg" style="color: var(--text-secondary);">
          Private tutor ₹3,000/month afford nahi hota. BYJU's Hindi mein nahi padhata. Village mein net slow hai. Blind students ke liye koi app nahi hai. Shrutam in sab problems ka ek jawab hai.
        </p>
      </div>
    </div>
  </section>

  <!-- ========================================================
       VALUES
       ======================================================== -->
  <section class="section" aria-labelledby="values-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="values-heading" class="text-3xl font-heading font-bold mb-4" style="color: var(--primary-light);">
          Hamare Values
        </h2>
        <p class="text-lg" style="color: var(--text-secondary);">Har decision inhee values se hota hai.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-3xl mx-auto">

        <div class="card animate-on-scroll flex gap-4 items-start" style="border-left: 4px solid var(--accent);">
          <div class="text-4xl flex-shrink-0">♿</div>
          <div>
            <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Accessibility First</div>
            <p class="text-sm" style="color: var(--text-secondary);">Blind mode baad mein nahi jodha — pehle se design mein hai. Accessibility sirf feature nahi, foundation hai. 50 lakh visually impaired students India mein hain — unhe ignore karna option nahi.</p>
          </div>
        </div>

        <div class="card animate-on-scroll flex gap-4 items-start" style="border-left: 4px solid var(--primary);">
          <div class="text-4xl flex-shrink-0">🗣️</div>
          <div>
            <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Mother Tongue First</div>
            <p class="text-sm" style="color: var(--text-secondary);">Bachche apni language mein sochte hain. Padhai bhi unhi ki language mein honi chahiye. Hindi, Hinglish, Telugu, Marathi — jo tum bolte ho, usi mein SAAVI padhati hai. Translation nahi — natively.</p>
          </div>
        </div>

        <div class="card animate-on-scroll flex gap-4 items-start" style="border-left: 4px solid var(--success);">
          <div class="text-4xl flex-shrink-0">🎧</div>
          <div>
            <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Audio First</div>
            <p class="text-sm" style="color: var(--text-secondary);">Video heavy nahi, text wall nahi. Audio first — isliye 2G/3G pe bhi chalta hai, blind students ke liye bhi kaam karta hai, aur fatigue kam hoti hai. Sunna zyada natural hai padhne se.</p>
          </div>
        </div>

        <div class="card animate-on-scroll flex gap-4 items-start" style="border-left: 4px solid var(--warning);">
          <div class="text-4xl flex-shrink-0">💰</div>
          <div>
            <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Affordable</div>
            <p class="text-sm" style="color: var(--text-secondary);">₹199/month — yeh figure casually nahi rakha. India mein median family income dekhi, calculate kiya ki kitna sustainable hai. Quality education sabko milni chahiye — sirf ameer logo ko nahi.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       PARENT COMPANY
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="company-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <h2 id="company-heading" class="text-3xl font-heading font-bold mb-8" style="color: var(--primary-light);">
          Aarambha — Shrutam Ka Ghar
        </h2>

        <div class="card animate-on-scroll" style="border: 1px solid var(--border-default); background: var(--bg-surface);">
          <div class="text-5xl mb-4">🌱</div>
          <div class="font-heading font-bold text-2xl mb-2" style="color: var(--text-primary);">Aarambha</div>
          <div class="text-sm mb-2" style="color: var(--text-muted);">Kishyam AI Pvt Ltd</div>

          <div class="my-6 py-6" style="border-top: 1px solid var(--border-subtle); border-bottom: 1px solid var(--border-subtle);">
            <p class="text-base leading-relaxed" style="color: var(--text-body);">
              Aarambha ka matlab hai "beginning" — shurooaat. Hum India ke un students ke liye kaam karte hain jinhe world-class education tak pahunchne mein sabse zyada mushkil hoti hai.
            </p>
          </div>

          <div class="flex flex-wrap justify-center gap-4 text-sm">
            <div class="flex items-center gap-2">
              <span style="color: var(--success);">✓</span>
              <span style="color: var(--text-secondary);">Shrutam — AI tutor (current)</span>
            </div>
            <div class="flex items-center gap-2">
              <span style="color: var(--text-muted);">◦</span>
              <span style="color: var(--text-muted);">More products coming</span>
            </div>
          </div>

          <div class="mt-6">
            <a href="https://aarambhax.ai" target="_blank" rel="noopener" class="btn btn-outline">
              aarambhax.ai →
            </a>
          </div>
        </div>

        <p class="text-sm mt-6" style="color: var(--text-muted);">
          Registered as <strong style="color: var(--text-secondary);">Kishyam AI Pvt Ltd</strong>, India
        </p>
      </div>
    </div>
  </section>

  <!-- ========================================================
       CTA
       ======================================================== -->
  <section class="section" aria-labelledby="about-cta-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center max-w-xl mx-auto">
        <h2 id="about-cta-heading" class="text-4xl font-heading font-bold mb-4">Hamare Mission Mein Saath Aao</h2>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          May 20, 2026 launch. 7 din free. No credit card. Early joiners ko milega <strong style="color: var(--accent);">30-day extended trial</strong>.
        </p>
        <div class="flex flex-wrap gap-4 justify-center">
          <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
          <a href="/faq/" class="btn btn-outline">FAQ Dekho →</a>
        </div>
        <p class="text-sm mt-6" style="color: var(--text-muted);">
          A product by <a href="https://aarambhax.ai" target="_blank" rel="noopener" style="color: var(--primary-light);">Aarambha (Kishyam AI Pvt Ltd)</a>
        </p>
      </div>
    </div>
  </section>

</main>

<?php include '../partials/footer.php'; ?>
