<?php
$title       = "Ask Like 10 — Ek Concept 10 Tarike | Never Give Up Learning | SAAVI Shrutam";
$description = "Samajh nahi aaya? SAAVI ke paas 9 aur tarike hain. Analogy, story, experiment, real life — 10 alag approaches. Guaranteed samjhega.";
$canonical   = "https://shrutam.ai/features/ask-like-10/";
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
      "name"     => "Ask Like 10",
      "item"     => "https://shrutam.ai/features/ask-like-10/",
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
        <ol class="flex flex-wrap items-center gap-2 text-base" style="color: var(--text-muted);">
          <li><a href="/" style="color: var(--text-muted);">Home</a></li>
          <li aria-hidden="true" style="color: var(--text-muted);">›</li>
          <li><a href="/features/" style="color: var(--text-muted);">Features</a></li>
          <li aria-hidden="true" style="color: var(--text-muted);">›</li>
          <li style="color: var(--text-secondary);">Ask Like 10</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-3">
            <span class="badge badge-accent">💡 AI Feature</span>
            <span class="badge badge-primary">10 Tarike — Ek Concept</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Samajh Nahi Aaya? 9 Aur Tarike Hain!
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            हर बच्चे का समझने का तरीका अलग होता है।
          </p>

          <div class="chalkboard mx-auto my-3">
            <img src="/assets/images/features/ask-like-10.png" alt="Ask Like 10 — one concept explained 10 different ways" loading="lazy" class="w-full max-w-[200px] md:max-w-[240px] lg:max-w-[280px] mx-auto my-3 rounded-xl">
          </div>

          <p class="text-lg mb-8" style="color: var(--text-body);">
            Normal app mein ek hi explanation hoti hai — samjho ya mat samjho.
            SAAVI ke paas <strong style="color: var(--text-primary);">ek concept ke 10 alag tarike</strong> hain.
            Analogy, kahani, experiment, real life — koi na koi zaroor click karega.
            <em style="color: var(--accent);">Guaranteed samjhega.</em>
          </p>

          <div class="flex flex-wrap gap-4">
            <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
            <a href="/features/" class="btn btn-outline">← Sab Features Dekho</a>
          </div>
        </div>

        <!-- Right: Counter visual -->
        <div class="flex flex-col items-center gap-6">
          <div class="p-8 rounded-2xl text-center animate-on-scroll" style="background: var(--bg-surface); border: 2px solid var(--border-default);">
            <div class="stat-number mb-2" style="font-size: clamp(4rem, 10vw, 6rem);">10</div>
            <div class="font-heading font-bold text-xl mb-2" style="color: var(--text-primary);">Tarike Hain SAAVI Ke Paas</div>
            <p class="text-base" style="color: var(--text-secondary);">Analogy · Story · Real Life · Diagram · Equation · Experiment · Quiz · Comparison · Common Mistake · Mnemonic</p>
          </div>
          <div class="p-4 rounded-2xl text-center" style="background: var(--success-bg); border: 1px solid var(--success);">
            <p class="text-base font-bold" style="color: var(--success);">
              Agar pehla tarika nahi samjha → SAAVI automatic agle tarike pe chali jaati hai
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: ALL 10 WAYS — "What is Electricity?"
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="ten-ways-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <span class="badge badge-primary mb-4">Live Example</span>
        <h2 id="ten-ways-heading" class="text-4xl font-heading font-bold mb-4">
          "Bijli Kya Hai?" — 10 Tarike SAAVI Ke
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Ek hi sawaal — "What is Electricity?" — SAAVI 10 alag angles se samjhati hai.
          Tumhare liye kaunsa click karega?
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl mx-auto">

        <!-- Way 1: Water Analogy -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg" style="background: var(--accent-glow); color: var(--accent); min-width: 40px;">1</div>
            <div>
              <div class="text-xs font-bold uppercase tracking-wide mb-1" style="color: var(--accent);">Paani wali analogy</div>
              <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Water Analogy</div>
              <p class="text-base" style="color: var(--text-secondary);">
                "Electricity = paani ka bahna. Wire = pipe. Current = paani ki speed. Voltage = pressure."
                Jaise paani upar se neeche behta hai, waise electrons negative se positive jaate hain.
              </p>
            </div>
          </div>
        </div>

        <!-- Way 2: Story -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg" style="background: var(--primary-glow); color: var(--primary-light); min-width: 40px;">2</div>
            <div>
              <div class="text-xs font-bold uppercase tracking-wide mb-1" style="color: var(--primary-light);">Kahani sunao</div>
              <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Story</div>
              <p class="text-base" style="color: var(--text-secondary);">
                "Ek gaon mein bijli aayi pehli baar. Bulb jala. Kyun? Electrons movement se —
                battery ne unhe push kiya wire mein, phir wire se bulb ke filament pe, aur filament
                garam hokar chama chama karne laga."
              </p>
            </div>
          </div>
        </div>

        <!-- Way 3: Real Life -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--success);">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg" style="background: var(--success-bg); color: var(--success); min-width: 40px;">3</div>
            <div>
              <div class="text-xs font-bold uppercase tracking-wide mb-1" style="color: var(--success);">Apni zindagi mein</div>
              <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Real Life</div>
              <p class="text-base" style="color: var(--text-secondary);">
                "Phone charge kyun hota hai? Charger electrons pump karta hai battery mein.
                Phir jab phone use karo, woh electrons bahar nikalte hain screen aur processor ke liye.
                Jab electrons khatam, battery dead."
              </p>
            </div>
          </div>
        </div>

        <!-- Way 4: Diagram Description -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--info);">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg" style="background: var(--info-bg); color: var(--info); min-width: 40px;">4</div>
            <div>
              <div class="text-xs font-bold uppercase tracking-wide mb-1" style="color: var(--info);">Aankhon ke bina bhi</div>
              <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Diagram Description <span class="text-xs" style="color: var(--info);">(♿ Blind-Accessible)</span></div>
              <p class="text-base" style="color: var(--text-secondary);">
                "Ek circle socho. Battery positive → wire → bulb → wire → battery negative.
                Yeh circuit hai. Electrons is circle mein ek direction mein ghoomte hain —
                jaise ek road pe cars ek taraf hi chalti hain."
              </p>
            </div>
          </div>
        </div>

        <!-- Way 5: Equation -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--warning);">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg" style="background: var(--accent-glow); color: var(--warning); min-width: 40px;">5</div>
            <div>
              <div class="text-xs font-bold uppercase tracking-wide mb-1" style="color: var(--warning);">Formula se samjho</div>
              <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Equation</div>
              <p class="text-base" style="color: var(--text-secondary);">
                "<strong style="color: var(--accent);">V = IR</strong> — Voltage = Current × Resistance.
                Voltage matlab kitna push. Current matlab kitne electrons.
                Resistance matlab wire ki rokne ki power.
                Yeh Ohm ka Law hai — electricity ka sabse important rule."
              </p>
            </div>
          </div>
        </div>

        <!-- Way 6: Experiment -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg" style="background: var(--primary-glow); color: var(--primary-light); min-width: 40px;">6</div>
            <div>
              <div class="text-xs font-bold uppercase tracking-wide mb-1" style="color: var(--primary-light);">Ghar pe karo</div>
              <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Experiment</div>
              <p class="text-base" style="color: var(--text-secondary);">
                "Lemon battery ghar pe banao: ek lemon lo, copper coin aur zinc nail ghusao.
                Multimeter lagao — 0.9V dikhega! Lemon ke andar chemical reaction hoti hai
                jisse electrons move karte hain. Yahi electricity hai."
              </p>
            </div>
          </div>
        </div>

        <!-- Way 7: Quiz Format -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg" style="background: var(--accent-glow); color: var(--accent); min-width: 40px;">7</div>
            <div>
              <div class="text-xs font-bold uppercase tracking-wide mb-1" style="color: var(--accent);">Khud sochke samjho</div>
              <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Quiz Format</div>
              <p class="text-base" style="color: var(--text-secondary);">
                "Agar voltage double karo aur resistance same rakho — current ka kya hoga?
                Double hoga? Half hoga? Same rahega?
                <em>(Hint: V = IR — ek side double, doosri kya change hogi?)</em>
                Sahi jawab: current bhi double hoga."
              </p>
            </div>
          </div>
        </div>

        <!-- Way 8: Comparison -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--success);">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg" style="background: var(--success-bg); color: var(--success); min-width: 40px;">8</div>
            <div>
              <div class="text-xs font-bold uppercase tracking-wide mb-1" style="color: var(--success);">Doosre se milao</div>
              <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Comparison</div>
              <p class="text-base" style="color: var(--text-secondary);">
                "Electricity vs paani — kya same hai, kya alag?
                Same: dono flow karte hain, dono pressure se behte hain, dono pipe mein rok sakte hain.
                Alag: electrons itne chote hain ki dikhte nahi, aur bahut faster move karte hain."
              </p>
            </div>
          </div>
        </div>

        <!-- Way 9: Common Mistake -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--error);">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg" style="background: var(--error-bg); color: var(--error); min-width: 40px;">9</div>
            <div>
              <div class="text-xs font-bold uppercase tracking-wide mb-1" style="color: var(--error);">Galti pakdo</div>
              <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Common Mistake</div>
              <p class="text-base" style="color: var(--text-secondary);">
                "Log bolte hain 'bijli aati hai' — actually electrons jaate hain, aate nahi.
                Aur log sochte hain bijli hawa mein fly karti hai — actually wire ke andar
                electrons shift karte hain, ek domino chain ki tarah.
                Wire ke bahar kuch nahi jaata."
              </p>
            </div>
          </div>
        </div>

        <!-- Way 10: Mnemonic -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--info);">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg" style="background: var(--info-bg); color: var(--info); min-width: 40px;">10</div>
            <div>
              <div class="text-xs font-bold uppercase tracking-wide mb-1" style="color: var(--info);">Yaad rakhne ka trick</div>
              <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Mnemonic</div>
              <p class="text-base" style="color: var(--text-secondary);">
                "<strong style="color: var(--accent);">VIR — Very Important Rule</strong>
                (Voltage = Current × Resistance)
                Jab bhi Ohm's Law bhool jao, VIR yaad karo.
                V → I → R. Tin letters, ek formula, hamesha ke liye memory mein."
              </p>
            </div>
          </div>
        </div>

      </div>

      <!-- Bottom note -->
      <div class="max-w-2xl mx-auto mt-10 p-6 rounded-2xl text-center" style="background: var(--primary-glow); border: 1px solid var(--border-default);">
        <p class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">
          Yeh sirf ek example tha — "What is Electricity?"
        </p>
        <p class="text-base" style="color: var(--text-secondary);">
          SAAVI ke paas NCERT ke har concept ke liye yeh 10 approaches trained hain —
          Class 6 se Class 10 tak, har subject mein. Koi concept impossible nahi hai.
        </p>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: WHY THIS WORKS
       ======================================================== -->
  <section class="section" aria-labelledby="why-heading">
    <div class="container article-content">
      <div class="text-center mb-12">
        <h2 id="why-heading" class="text-4xl font-heading font-bold mb-4">
          10 Tarike Kyun? Science Kya Kehta Hai?
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Yeh sirf ek feature nahi — yeh cognitive science hai. Har insaan ka brain alag tarike se seekhta hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">
        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-3" aria-hidden="true">🧠</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Multiple Intelligences</div>
          <p class="text-base" style="color: var(--text-secondary);">
            Howard Gardner ki theory — koi visual hai, koi logical, koi storytelling se seekhta hai.
            SAAVI sab ke liye ready hai.
          </p>
        </div>
        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-3" aria-hidden="true">🔁</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Spaced Repetition</div>
          <p class="text-base" style="color: var(--text-secondary);">
            Ek hi cheez alag angle se baar baar dekhne se long-term memory mein permanently save ho jaati hai.
          </p>
        </div>
        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-3" aria-hidden="true">❤️</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Zero Frustration</div>
          <p class="text-base" style="color: var(--text-secondary);">
            Jab student frustrate hota hai toh seekhna band ho jaata hai.
            10 options matlab kabhi "I give up" wala moment nahi aata.
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
        <p class="text-lg" style="color: var(--text-secondary);">Ask Like 10 ke saath mila ke use karo.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <!-- Related: Zero to Hero -->
        <a href="/features/zero-to-hero/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🚀</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Zero to Hero</div>
          <p class="text-base mb-3" style="color: var(--text-secondary);">
            SAAVI pehle check karti hai kya basics pata hain. Phir Class 6 se 10 tak ka poora path banati hai.
          </p>
          <span class="text-base font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <!-- Related: Adaptive Learning -->
        <a href="/features/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">🧠</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Adaptive Learning</div>
          <p class="text-base mb-3" style="color: var(--text-secondary);">
            SAAVI tumhara pace observe karti hai aur automatically adjust karti hai — sirf weak topics pe zyaada time.
          </p>
          <span class="text-base font-bold" style="color: var(--primary-light);">Explore →</span>
        </a>

        <!-- Related: Mock Exams -->
        <a href="/features/" class="card animate-on-scroll" style="text-decoration: none; display: block;">
          <div class="text-2xl mb-3" aria-hidden="true">📝</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Mock Exams</div>
          <p class="text-base mb-3" style="color: var(--text-secondary);">
            Board pattern pe practice — real exam jaisi feel, ghar baithe. Har galat answer pe full explanation.
          </p>
          <span class="text-base font-bold" style="color: var(--primary-light);">Explore →</span>
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
          Kabhi Mat Bolna "Samajh Nahi Aata"
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-4" style="color: var(--accent);">
          ९ और तरीके हमेशा बाकी हैं।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          Waitlist join karo — SAAVI tumhare saath padhegi, tumhare tarike se.
          Koi ek explanation fail nahi hogi.
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
