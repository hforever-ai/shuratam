<?php
$title       = "Shrutam Pricing — ₹199/Month | Free 7 Day Trial | No Credit Card | Affordable AI Tutor";
$description = "Private tutor ₹3000+/month vs Shrutam ₹199/month. 7 din free trial. No credit card. Cancel anytime. Blind mode always free.";
$canonical   = "https://shrutam.ai/pricing/";
$schema      = json_encode([
  "@context"    => "https://schema.org",
  "@type"       => "Offer",
  "name"        => "Shrutam Pro",
  "description" => "AI tutor SAAVI — all 5 subjects, CG Board & CBSE, Hindi/Hinglish/Telugu/Marathi, photo doubt solver, parent portal, blind mode free forever.",
  "price"       => "199",
  "priceCurrency" => "INR",
  "availability"  => "https://schema.org/PreOrder",
  "url"           => "https://shrutam.ai/pricing/",
  "seller"        => [
    "@type" => "Organization",
    "name"  => "Aarambha (Kishyam AI Pvt Ltd)",
    "url"   => "https://aarambhax.ai",
  ],
  "priceValidUntil" => "2027-12-31",
  "hasMerchantReturnPolicy" => [
    "@type"                 => "MerchantReturnPolicy",
    "returnPolicyCategory"  => "https://schema.org/MerchantReturnFiniteReturnWindow",
    "merchantReturnDays"    => 7,
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       HERO
       ======================================================== -->
  <section class="section" aria-labelledby="pricing-hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center max-w-3xl mx-auto">
        <span class="badge badge-accent mb-4">🎁 7 Din Free Trial — No Credit Card</span>
        <h1 id="pricing-hero-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
          Private Tutor ₹3,000 vs SAAVI ₹199
        </h1>
        <p class="text-xl mb-8" style="color: var(--text-secondary);">
          15 guna sasta. 24x7 available. Hindi, Hinglish, Telugu mein. Blind mode hamesha free.
        </p>
        <div class="flex flex-wrap gap-4 justify-center">
          <a href="/waitlist/" class="btn btn-primary">7 Din Free Start Karo →</a>
          <a href="#comparison" class="btn btn-outline">Comparison Dekho ↓</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       PLAN CARDS
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="plans-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="plans-heading" class="text-4xl font-heading font-bold mb-4">Do Plan — Ek Sahi Choice</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Free trial se shuru karo. Credit card nahi chahiye.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-3xl mx-auto">

        <!-- Free Trial Card -->
        <div class="card flex flex-col animate-on-scroll" style="border: 1px solid var(--border-default);">
          <div class="text-center mb-6">
            <div class="text-4xl mb-3">🎁</div>
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">FREE TRIAL</div>
            <div class="text-xs font-bold uppercase tracking-widest mb-4" style="color: var(--text-muted);">7 Days</div>
            <div class="stat-number mb-1">₹0</div>
            <div class="text-sm" style="color: var(--text-muted);">No credit card · No catch</div>
          </div>
          <ul class="flex flex-col gap-3 mb-8 flex-1" style="color: var(--text-secondary);">
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span><strong style="color: var(--text-primary);">2 subjects</strong> of your choice</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span>Basic SAAVI chat</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span>5 doubts per day</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span>Basic mock tests</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--text-muted); flex-shrink: 0;">✗</span>
              <span style="color: var(--text-muted);">Photo doubt solver</span>
            </li>
          </ul>
          <a href="/waitlist/" class="btn btn-outline w-full justify-center">Free Trial Start Karo →</a>
        </div>

        <!-- Pro Plan Card -->
        <div class="card flex flex-col animate-on-scroll" style="border: 2px solid var(--accent); box-shadow: 0 0 40px var(--accent-glow);">
          <div class="text-center mb-6">
            <span class="badge badge-accent mb-3">Most Popular</span>
            <div class="text-4xl mb-3">⚡</div>
            <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">SHRUTAM PRO</div>
            <div class="text-xs font-bold uppercase tracking-widest mb-4" style="color: var(--accent);">Full Access</div>
            <div class="stat-number mb-1">₹199</div>
            <div class="text-sm" style="color: var(--text-muted);">/month · All subjects · All classes</div>
          </div>
          <ul class="flex flex-col gap-3 mb-8 flex-1" style="color: var(--text-secondary);">
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span><strong style="color: var(--text-primary);">All 5 subjects</strong> — Science, Maths, Hindi, Social, English</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span>Full SAAVI — unlimited doubts, adaptive learning</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span><strong style="color: var(--text-primary);">Unlimited doubts</strong> per day</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span>Full mock exams + detailed feedback</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span><strong style="color: var(--text-primary);">Photo doubt solver</strong> — kitaab ka photo lo</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span>Smart exam notes (audio + printable)</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span>Parent portal + WhatsApp progress reports</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span>Student tracking — weak chapter alerts</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--success); flex-shrink: 0;">✓</span>
              <span>Reel Mode — 60-sec audio concepts</span>
            </li>
            <li class="flex items-start gap-3">
              <span style="color: var(--accent); flex-shrink: 0;">♿</span>
              <span><strong style="color: var(--accent);">Blind Mode — FREE forever</strong></span>
            </li>
          </ul>
          <a href="/waitlist/" class="btn btn-primary w-full justify-center">Launch Pe Pehle Pao →</a>
          <p class="text-center text-xs mt-3" style="color: var(--text-muted);">7-day money back guarantee after subscription starts</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       COMPARISON TABLE
       ======================================================== -->
  <section class="section" id="comparison" aria-labelledby="comparison-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="comparison-heading" class="text-4xl font-heading font-bold mb-4">Numbers Bolte Hain</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Private tutor, BYJU's, Shrutam — ek baar saath mein dekho.</p>
      </div>

      <div class="max-w-3xl mx-auto overflow-x-auto rounded-xl" style="border: 1px solid var(--border-subtle);">
        <table class="comparison-table">
          <thead>
            <tr>
              <th>Feature</th>
              <th>Private Tutor</th>
              <th>BYJU's</th>
              <th style="color: var(--accent);">Shrutam ✨</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Price</strong></td>
              <td>₹3,000–₹8,000/month</td>
              <td>₹500–₹1,500/month</td>
              <td style="color: var(--success); font-weight: 700;">₹199/month</td>
            </tr>
            <tr>
              <td><strong>Language</strong></td>
              <td>Depends on tutor</td>
              <td style="color: var(--error);">Mostly English</td>
              <td style="color: var(--success); font-weight: 700;">Hindi, Hinglish, Telugu, Marathi — native</td>
            </tr>
            <tr>
              <td><strong>Availability</strong></td>
              <td style="color: var(--error);">Fixed hours only</td>
              <td>Recorded videos</td>
              <td style="color: var(--success); font-weight: 700;">24x7 — raat 2 baje bhi</td>
            </tr>
            <tr>
              <td><strong>Blind Support</strong></td>
              <td style="color: var(--error);">❌</td>
              <td style="color: var(--error);">❌</td>
              <td style="color: var(--success); font-weight: 700;">✅ FREE Forever</td>
            </tr>
            <tr>
              <td><strong>Personalized</strong></td>
              <td>Sometimes</td>
              <td style="color: var(--error);">❌ Fixed videos</td>
              <td style="color: var(--success); font-weight: 700;">✅ Adaptive AI</td>
            </tr>
            <tr>
              <td><strong>CG Board</strong></td>
              <td>Depends</td>
              <td style="color: var(--error);">❌</td>
              <td style="color: var(--success); font-weight: 700;">✅ Native support</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- ========================================================
       FAQ ACCORDION
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="pricing-faq-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="pricing-faq-heading" class="text-4xl font-heading font-bold mb-4">Pricing Ke Sawaal</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Jo mann mein aaye, pooch lo. Transparent hain hum.</p>
      </div>

      <div class="max-w-2xl mx-auto flex flex-col gap-4">

        <details class="card" style="border: 1px solid var(--border-subtle);">
          <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
            <span>Free trial mein kya milta hai?</span>
            <span class="text-lg" style="color: var(--accent);">+</span>
          </summary>
          <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
            <p>7 din ka free trial milta hai jisme 2 subjects, basic SAAVI chat, 5 doubts per day, aur basic mock tests included hain. Koi credit card nahi chahiye. Trial ke baad ₹199/month pe upgrade kar sakte ho.</p>
          </div>
        </details>

        <details class="card" style="border: 1px solid var(--border-subtle);">
          <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
            <span>Credit card chahiye?</span>
            <span class="text-lg" style="color: var(--accent);">+</span>
          </summary>
          <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
            <p>Bilkul nahi! Free trial ke liye koi card nahi chahiye. Sirf naam aur email kaafi hai. Paid subscription ke liye UPI, paytm, ya debit card accept karte hain — credit card optional hai.</p>
          </div>
        </details>

        <details class="card" style="border: 1px solid var(--border-subtle);">
          <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
            <span>Cancel kaise karein?</span>
            <span class="text-lg" style="color: var(--accent);">+</span>
          </summary>
          <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
            <p>App settings se ek tap mein cancel hota hai. Koi form nahi, koi call nahi, koi penalty nahi. Cancel karne ke baad billing cycle ke end tak access milta rahega.</p>
          </div>
        </details>

        <details class="card" style="border: 1px solid var(--border-subtle);">
          <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
            <span>Refund policy kya hai?</span>
            <span class="text-lg" style="color: var(--accent);">+</span>
          </summary>
          <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
            <p>Paid subscription start hone ke baad 7 din ke andar full refund milega — bina sawaal ke. Hamara ek hi sawaal hoga: "Kya acha nahi laga?" — taaki hum improve kar sakein.</p>
          </div>
        </details>

        <details class="card" style="border: 1px solid var(--border-subtle);">
          <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
            <span>Multiple bachche ek account pe?</span>
            <span class="text-lg" style="color: var(--accent);">+</span>
          </summary>
          <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
            <p>Abhi ek account = ek student. Adaptive learning tabhi kaam karta hai jab ek bachche ka individual data ho. Family plan — jisme 2-3 bachche ek subscription pe — bahut jaldi aa raha hai.</p>
          </div>
        </details>

      </div>

      <div class="text-center mt-8">
        <p class="text-sm mb-4" style="color: var(--text-secondary);">Aur sawaal hain? <a href="/faq/" style="color: var(--primary-light);">Poori FAQ dekho →</a></p>
      </div>
    </div>
  </section>

  <!-- ========================================================
       CTA
       ======================================================== -->
  <section class="section" aria-labelledby="pricing-cta-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="max-w-xl mx-auto text-center">
        <h2 id="pricing-cta-heading" class="text-4xl font-heading font-bold mb-4">Aaj Hi Shuru Karo — Free Hai</h2>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          7 din free. No credit card. Cancel anytime. Early joiners ko milega <strong style="color: var(--accent);">30-din extended trial</strong>.
        </p>
        <div class="flex flex-wrap gap-4 justify-center">
          <a href="/waitlist/" class="btn btn-primary">Start Free Trial →</a>
          <a href="/waitlist/" class="btn btn-outline">Join Waitlist →</a>
        </div>
        <div class="flex flex-wrap justify-center gap-6 mt-8 text-sm" style="color: var(--text-secondary);">
          <span><span style="color: var(--success);">✓</span> No credit card</span>
          <span><span style="color: var(--success);">✓</span> Cancel anytime</span>
          <span><span style="color: var(--accent);">♿</span> Blind Mode free forever</span>
        </div>
      </div>
    </div>
  </section>

</main>

<?php include '../partials/footer.php'; ?>
