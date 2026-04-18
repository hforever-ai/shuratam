<?php
$title       = "Shrutam — AI Teacher SAAVI | Blind Mode | CG Board CBSE Hindi | ₹199/Month";
$description = "SAAVI didi India ki pehli AI teacher hai jo BLIND students ke liye bhi hai. Hindi, Hinglish, Telugu mein padhati hai. CG Board & CBSE Class 6-10. ₹199/month.";
$canonical   = "https://shrutam.ai/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"     => "Organization",
      "name"      => "Aarambha",
      "legalName" => "Kishyam AI Pvt Ltd",
      "url"       => "https://aarambhax.ai",
      "brand"     => ["@type" => "Brand", "name" => "Shrutam", "url" => "https://shrutam.ai"],
    ],
    [
      "@type"       => "Product",
      "name"        => "Shrutam",
      "description" => "Audio-first AI learning platform for Hindi-medium students, Class 6-10",
      "brand"       => ["@type" => "Brand", "name" => "Aarambha"],
      "offers"      => [
        "@type"        => "Offer",
        "price"        => "199",
        "priceCurrency"=> "INR",
        "availability" => "https://schema.org/PreOrder",
      ],
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include 'partials/head.php';
include 'partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       SECTION 1: HERO
       ======================================================== -->
  <section class="section" aria-labelledby="hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="grid grid-cols-1 lg:grid-cols-[1fr_300px] gap-6 items-start">

        <!-- Left: Copy -->
        <div>
          <!-- Brand -->
          <div class="flex items-center gap-3 mb-4">
            <span lang="hi" class="font-devanagari-heading text-3xl font-bold" style="color: var(--accent);">शृतम्</span>
            <span class="text-sm font-heading" style="color: var(--text-secondary);">— Audio-First AI Personalized Learning App</span>
          </div>

          <!-- H1 + SAAVI intro — 2 col on desktop to prevent wrapping -->
          <div class="grid grid-cols-1 md:grid-cols-[1fr_auto] gap-4 items-start mb-4">
            <div>
              <h1 id="hero-heading" class="text-3xl lg:text-4xl font-heading font-bold mb-2" style="color: var(--text-primary);">
                Har Bachche Ko Milegi<br>
                <span class="text-gradient">Apni AI Teacher Didi</span>
              </h1>
              <p class="text-lg" style="color: var(--text-body);">
                <strong style="color: var(--accent);">SAAVI</strong> — jo tumhari bhasha mein samjhati hai,
                raat 2 baje bhi, kabhi judge kiye bina।
              </p>
              <p class="text-sm mt-1" style="color: var(--text-secondary);">CG Board + CBSE · Class 6–10 · ₹199/month</p>
            </div>
            <!-- CTAs right-aligned on desktop -->
            <div class="flex flex-col gap-2">
              <a href="/waitlist/" class="btn btn-primary whitespace-nowrap">Free Mein Shuru Karo →</a>
              <a href="/saavi/" class="btn btn-outline whitespace-nowrap">SAAVI se milo →</a>
              <p class="text-xs text-center" style="color: var(--text-muted);">May 20, 2026 · No credit card</p>
            </div>
          </div>

          <!-- How it works — learning journey -->
          <div class="flex flex-wrap items-center gap-2 mb-5 text-base font-heading font-bold">
            <span style="color: var(--accent);">सुनते हो</span>
            <span style="color: var(--text-muted);">→</span>
            <span style="color: var(--primary-light);">देखते हो</span>
            <span style="color: var(--text-muted);">→</span>
            <span style="color: var(--success);">Practice करते हो</span>
            <span style="color: var(--text-muted);">→</span>
            <span style="color: var(--accent);">🎮 Game खेलते हो</span>
            <span style="color: var(--text-muted);">→</span>
            <span style="color: var(--text-primary);">सीखते हो!</span>
          </div>

          <!-- 6 Value Props — 2x3 grid, bigger text -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-5">
            <div class="p-4 rounded-lg" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
              <p class="text-base font-bold mb-1" style="color: var(--accent);">💰 ₹199/month</p>
              <p class="text-sm" style="color: var(--text-body);">Private tutor ₹3,000+ leta hai।<br>SAAVI 24/7 available hai — sirf ₹199 mein।</p>
            </div>
            <div class="p-4 rounded-lg" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
              <p class="text-base font-bold mb-1" style="color: var(--primary-light);">🗣️ Tumhari bhasha</p>
              <p class="text-sm" style="color: var(--text-body);">Hindi · Hinglish · English · Telugu · Marathi।<br>Textbook wali boring English nahi।</p>
            </div>
            <div class="p-4 rounded-lg" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
              <p class="text-base font-bold mb-1" style="color: var(--accent);">🧠 10 tarike</p>
              <p class="text-sm" style="color: var(--text-body);">Samajh nahi aaya? Koi baat nahi।<br>SAAVI ek concept 10 alag angles se samjhati hai।</p>
            </div>
            <div class="p-4 rounded-lg" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
              <p class="text-base font-bold mb-1" style="color: var(--primary-light);">🚀 Zero to Hero</p>
              <p class="text-sm" style="color: var(--text-body);">Basics weak hain? SAAVI pehle foundation pakki karegi।<br>Phir chapter। Phir board ready।</p>
            </div>
            <div class="p-4 rounded-lg" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
              <p class="text-base font-bold mb-1" style="color: var(--accent);">📖 Revision + Doubt Clear</p>
              <p class="text-sm" style="color: var(--text-body);">Chapter khatam? Quick revision mode।<br>Doubt aaya raat 11 baje? SAAVI jaag rahi hai।</p>
            </div>
            <div class="p-4 rounded-lg" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
              <p class="text-base font-bold mb-1" style="color: var(--primary-light);">👨‍👩‍👧 Parent App — FREE</p>
              <p class="text-sm" style="color: var(--text-body);">Daily progress report WhatsApp pe।<br>Bedtime lock — 10 PM ke baad auto-off।</p>
            </div>
          </div>

          <!-- Blind Mode callout -->
          <div class="p-3 rounded-lg flex items-start gap-3" style="background: var(--accent-glow); border: 1px solid rgba(245,158,11,0.2);">
            <span class="text-2xl mt-0.5">♿</span>
            <div>
              <p class="text-sm font-bold" style="color: var(--accent);">Blind Mode — India mein pehli baar · FREE forever</p>
              <p class="text-xs" style="color: var(--text-secondary);">50 lakh blind students hain India mein। SAAVI unke liye bhi bani hai।</p>
            </div>
          </div>
        </div>

        <!-- Right: SAAVI + chat demo -->
        <div class="flex flex-col gap-0 w-full">
          <!-- SAAVI avatar -->
          <div class="chalkboard w-full" style="border-radius: var(--radius-lg) var(--radius-lg) 0 0; border-bottom: none;">
            <img src="/assets/images/hero/saavi-teaching.png" alt="SAAVI didi teaching students" loading="lazy" class="w-full rounded-t-lg">
          </div>

          <!-- Chat demo — connected to image above -->
          <div id="saavi-chat-demo" class="flex flex-col gap-2 p-4 rounded-b-xl" style="background: var(--bg-elevated); border: 1px solid var(--border-subtle); border-top: none;" aria-label="SAAVI chat demonstration">
            <div class="flex items-center gap-2 pb-2 mb-1" style="border-bottom: 1px solid var(--border-subtle);">
              <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm" style="background: var(--primary-glow);">🤖</div>
              <div>
                <div class="font-heading font-bold text-xs" style="color: var(--text-primary);">SAAVI Didi</div>
                <div class="text-xs" style="color: var(--success);">● Online</div>
              </div>
            </div>
            <div class="chat-bubble chat-bubble-student" style="animation-delay: 0s;">
              <p class="text-xs">Photosynthesis samajh nahi aaya...</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi" style="animation-delay: 0.8s;">
              <p class="text-xs"><strong style="color: var(--accent);">SAAVI:</strong> Arre yaar! Ped ka kitchen samjho 🌱</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi" style="animation-delay: 1.6s;">
              <p class="text-xs">Sunlight = gas, CO₂ = ingredients, output = glucose + O₂</p>
            </div>
            <div class="chat-bubble chat-bubble-student" style="animation-delay: 2.4s;">
              <p class="text-xs">Oh! Ab crystal clear! 🎯</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: PROBLEM STATEMENT
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="problem-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="problem-heading" class="text-4xl font-heading font-bold mb-4">India Ke 25 Crore Students Ka Dard</h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Kitaaben hain, school hain — par samajhne wala koi nahi. SAAVI woh gap bharne aaya hai.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
        <!-- Stat 1 -->
        <div class="card text-center animate-on-scroll" style="border-left: 4px solid var(--error);">
          <div class="stat-number mb-2" data-count="68" data-suffix="%">68%</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Rote Learning</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            India ke 68% students sirf ratke paas hote hain — samajhte nahi. Board exams mein yahi dikhhta hai.
          </p>
        </div>

        <!-- Stat 2 -->
        <div class="card text-center animate-on-scroll" style="border-left: 4px solid var(--warning);">
          <div class="stat-number mb-2">₹3,000+</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Private Tutor Cost</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Ek subject ka tutor ₹3,000/month. 3-4 subjects = ₹10,000+. Gareeb bachche kya karein?
          </p>
        </div>

        <!-- Stat 3 -->
        <div class="card text-center animate-on-scroll" style="border-left: 4px solid var(--primary);">
          <div class="stat-number mb-2" data-count="50" data-suffix=" Lakh">50 Lakh</div>
          <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Blind Students</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            50 lakh visually impaired students India mein. Koi bhi edtech unke liye nahi — sirf SAAVI hai.
          </p>
        </div>
      </div>

      <p class="text-center text-lg font-heading font-bold" style="color: var(--accent);">
        SAAVI ek teacher nahi — ek movement hai. Har ghar mein, har bachche ke liye. 🇮🇳
      </p>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: SAAVI KA FARK (Comparison)
       ======================================================== -->
  <section class="section" aria-labelledby="comparison-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="comparison-heading" class="text-4xl font-heading font-bold mb-4">Doosre Apps Padhate Hain — SAAVI Samjhati Hai</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Ek baar dekho, khud judge karo.</p>
      </div>

      <div class="max-w-3xl mx-auto flex flex-col gap-4">

        <!-- Row 1: Language -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 animate-on-scroll">
          <div class="card" style="border-left: 4px solid var(--error);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--error);">Normal App</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">🌐 Language</div>
            <p class="text-sm" style="color: var(--text-secondary);">Mostly English. Hindi mein sirf translation — samajhne wali baat nahi.</p>
          </div>
          <div class="card" style="border-left: 4px solid var(--success);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">SAAVI</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">🗣️ Mother Tongue</div>
            <p class="text-sm" style="color: var(--text-secondary);">Hindi, Hinglish, Telugu, Marathi — jo tum bolte ho, usi mein padhati hai SAAVI.</p>
          </div>
        </div>

        <!-- Row 2: Availability -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 animate-on-scroll">
          <div class="card" style="border-left: 4px solid var(--error);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--error);">Normal App</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">📵 Offline Nahi</div>
            <p class="text-sm" style="color: var(--text-secondary);">Internet toot jaaye toh app bhi band. Village mein network kahan?</p>
          </div>
          <div class="card" style="border-left: 4px solid var(--success);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">SAAVI</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">📡 Audio-First</div>
            <p class="text-sm" style="color: var(--text-secondary);">Low data pe bhi kaam karta hai. Audio-first — screen ki zaroorat nahi.</p>
          </div>
        </div>

        <!-- Row 3: Blind students -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 animate-on-scroll">
          <div class="card" style="border-left: 4px solid var(--error);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--error);">Normal App</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">👁️ Visually Impaired Ignored</div>
            <p class="text-sm" style="color: var(--text-secondary);">BYJU's, Unacademy, Vedantu — kisi ne bhi blind students ke baare mein nahi socha.</p>
          </div>
          <div class="card" style="border-left: 4px solid var(--success);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">SAAVI</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">♿ Blind Mode — FREE</div>
            <p class="text-sm" style="color: var(--text-secondary);">India ka pehla AI tutor jo blind bachcho ke liye bhi hai — aur hamesha FREE rahega.</p>
          </div>
        </div>

        <!-- Row 4: Personalization -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 animate-on-scroll">
          <div class="card" style="border-left: 4px solid var(--error);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--error);">Normal App</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">📺 Recorded Videos</div>
            <p class="text-sm" style="color: var(--text-secondary);">Ek hi video 100 logon ke liye. Tum specific question nahi kar sakte.</p>
          </div>
          <div class="card" style="border-left: 4px solid var(--success);">
            <div class="text-xs font-bold uppercase tracking-wide mb-2" style="color: var(--success);">SAAVI</div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">🧠 Adaptive + Personal</div>
            <p class="text-sm" style="color: var(--text-secondary);">SAAVI tumhara level samajhti hai. Jo nahi aata usi pe focus karti hai — ek real teacher ki tarah.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 4: BLIND MODE HERO
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="blind-heading">
    <div class="container">
      <div class="max-w-4xl mx-auto text-center mb-10">
        <span class="badge badge-accent mb-4">♿ India First</span>
        <h2 id="blind-heading" class="text-4xl font-heading font-bold mb-5">
          India Ka Pehla Blind-Accessible AI Tutor
        </h2>
        <p class="text-lg" style="color: var(--text-body);">
          50 lakh visually impaired students India mein hain. Har edtech ne unhe ignore kiya.
          <strong style="color: var(--accent);">SAAVI ne nahi.</strong> Sirf sunke poora syllabus complete karo — koi screen nahi, koi image nahi.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-3xl mx-auto mb-10">
        <div class="flex items-start gap-3 animate-on-scroll">
          <span class="text-2xl">🎧</span>
          <div>
            <div class="font-heading font-bold" style="color: var(--text-primary);">100% Audio Learning</div>
            <p class="text-sm" style="color: var(--text-secondary);">Poora syllabus sirf sunke complete karo. Screen ki zaroorat nahi.</p>
          </div>
        </div>
        <div class="flex items-start gap-3 animate-on-scroll">
          <span class="text-2xl">⌨️</span>
          <div>
            <div class="font-heading font-bold" style="color: var(--text-primary);">Screen Reader Compatible</div>
            <p class="text-sm" style="color: var(--text-secondary);">TalkBack aur VoiceOver ke saath perfectly kaam karta hai.</p>
          </div>
        </div>
        <div class="flex items-start gap-3 animate-on-scroll">
          <span class="text-2xl">🗣️</span>
          <div>
            <div class="font-heading font-bold" style="color: var(--text-primary);">Voice Navigation</div>
            <p class="text-sm" style="color: var(--text-secondary);">Bolke navigate karo — buttons press karne ki zaroorat nahi.</p>
          </div>
        </div>
        <div class="flex items-start gap-3 animate-on-scroll">
          <span class="text-2xl">📖</span>
          <div>
            <div class="font-heading font-bold" style="color: var(--text-primary);">Braille Friendly</div>
            <p class="text-sm" style="color: var(--text-secondary);">Braille display devices ke saath tested aur optimized.</p>
          </div>
        </div>
        <div class="flex items-start gap-3 animate-on-scroll">
          <span class="text-2xl">🏆</span>
          <div>
            <div class="font-heading font-bold" style="color: var(--text-primary);">Mock Exams — No Visual</div>
            <p class="text-sm" style="color: var(--text-secondary);">Exam practice sirf audio mein — visually impaired ke liye specially designed.</p>
          </div>
        </div>
        <div class="flex items-start gap-3 animate-on-scroll">
          <span class="text-2xl">💯</span>
          <div>
            <div class="font-heading font-bold" style="color: var(--text-primary);">Free. Forever.</div>
            <p class="text-sm" style="color: var(--text-secondary);">Blind Mode ka koi charge nahi — kabhi nahi. Yeh commitment hai.</p>
          </div>
        </div>
        <div class="flex items-start gap-3 animate-on-scroll sm:col-span-2">
          <span class="text-2xl">🌐</span>
          <div>
            <div class="font-heading font-bold" style="color: var(--text-primary);">Multi-Language Support</div>
            <p class="text-sm" style="color: var(--text-secondary);">Hindi, Hinglish, Telugu, Marathi — apni language mein padhao, sunne mein aasani ho.</p>
          </div>
        </div>
      </div>

      <!-- Amber commitment blockquote -->
      <blockquote class="max-w-2xl mx-auto text-center p-6 rounded-2xl mb-8" style="background: var(--accent-glow); border: 1px solid var(--accent); border-radius: 1.5rem;">
        <p class="text-lg font-heading font-bold mb-2" style="color: var(--accent);">
          "Blind Mode hamesha FREE rahega — yeh sirf feature nahi, hamara vachan hai."
        </p>
        <cite class="text-sm not-italic" style="color: var(--text-secondary);">— Shrutam Team, Aarambha</cite>
      </blockquote>

      <div class="text-center">
        <a href="/blind-mode/" class="btn btn-primary">Blind Mode Ke Baare Mein Padhho →</a>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 5: 13 FEATURES GRID
       ======================================================== -->
  <section class="section" aria-labelledby="features-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="features-heading" class="text-4xl font-heading font-bold mb-4">SAAVI Ki 13 Super Powers</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Ek app, sab kuch. Students se parents tak sab cover.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

        <!-- 1: Mother Tongue Learning -->
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl">🗣️</div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Mother Tongue Learning</div>
            <div class="text-xs mb-2" style="color: var(--accent);">अपनी भाषा में सीखो</div>
            <p class="text-sm" style="color: var(--text-secondary);">Hindi, Hinglish, Telugu — apni language mein SAAVI se seekho.</p>
          </div>
          <a href="/features/mother-tongue-learning/" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">Jaano → </a>
        </div>

        <!-- 2: Adaptive Learning -->
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl">🎯</div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Adaptive Learning</div>
            <div class="text-xs mb-2" style="color: var(--accent);">तुम्हारे हिसाब से</div>
            <p class="text-sm" style="color: var(--text-secondary);">SAAVI tumhara level dekh ke padhati hai — na zyada easy, na zyada hard.</p>
          </div>
          <a href="/features/adaptive-learning/" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">Jaano →</a>
        </div>

        <!-- 3: Informed Learning -->
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl">🧠</div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Informed Learning</div>
            <div class="text-xs mb-2" style="color: var(--accent);">समझ के पढ़ो</div>
            <p class="text-sm" style="color: var(--text-secondary);">Syllabus ki poori context ke saath padhao — sirf chapter nahi, connection bhi.</p>
          </div>
          <a href="/features/adaptive-learning/" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">Jaano →</a>
        </div>

        <!-- 4: Revision Mode -->
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl">📚</div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Revision Mode</div>
            <div class="text-xs mb-2" style="color: var(--accent);">परीक्षा से पहले</div>
            <p class="text-sm" style="color: var(--text-secondary);">Quick audio revision — exam se ek din pehle bhi poora chapter 20 min mein.</p>
          </div>
          <a href="/features/revision-mode/" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">Jaano →</a>
        </div>

        <!-- 5: Ask Like 10 -->
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl">🤖</div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Ask Like 10</div>
            <div class="text-xs mb-2" style="color: var(--accent);">10 तरह से पूछो</div>
            <p class="text-sm" style="color: var(--text-secondary);">Ek concept 10 alag tarike se poocho — SAAVI har baar naya angle deti hai.</p>
          </div>
          <a href="/features/ask-like-10/" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">Jaano →</a>
        </div>

        <!-- 6: Zero to Hero -->
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl">🏆</div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Zero to Hero</div>
            <div class="text-xs mb-2" style="color: var(--accent);">शून्य से बोर्ड तक</div>
            <p class="text-sm" style="color: var(--text-secondary);">Prerequisites identify karke shuru karo — board exam tak ka poora path.</p>
          </div>
          <a href="/features/zero-to-hero/" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">Jaano →</a>
        </div>

        <!-- 7: Photo Doubt Solver -->
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl">📷</div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Photo Doubt Solver</div>
            <div class="text-xs mb-2" style="color: var(--accent);">फोटो खींचो, जवाब पाओ</div>
            <p class="text-sm" style="color: var(--text-secondary);">Kitaab ka photo lo — SAAVI second mein explain karti hai, Hindi mein.</p>
          </div>
          <a href="/features/photo-doubt-solver/" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">Jaano →</a>
        </div>

        <!-- 8: Mock Exams -->
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl">📝</div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Mock Exams</div>
            <div class="text-xs mb-2" style="color: var(--accent);">असली परीक्षा जैसा अभ्यास</div>
            <p class="text-sm" style="color: var(--text-secondary);">Board pattern pe full mock test — detailed feedback ke saath.</p>
          </div>
          <a href="/features/mock-exams/" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">Jaano →</a>
        </div>

        <!-- 9: Spoken English -->
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl">🗣️</div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Spoken English</div>
            <div class="text-xs mb-2" style="color: var(--accent);">अंग्रेजी बोलना सीखो</div>
            <p class="text-sm" style="color: var(--text-secondary);">Hindi medium se Spoken English — SAAVI ke saath daily practice karo.</p>
          </div>
          <a href="/features/spoken-english/" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">Jaano →</a>
        </div>

        <!-- 10: Exam Notes -->
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl">📋</div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Exam Notes</div>
            <div class="text-xs mb-2" style="color: var(--accent);">नोट्स तैयार हैं</div>
            <p class="text-sm" style="color: var(--text-secondary);">Auto-generated chapter notes Hindi mein — print karo ya audio mein suno.</p>
          </div>
          <a href="/features/exam-notes/" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">Jaano →</a>
        </div>

        <!-- 11: Student Tracking -->
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl">🤖</div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Student Tracking</div>
            <div class="text-xs mb-2" style="color: var(--accent);">प्रगति देखो</div>
            <p class="text-sm" style="color: var(--text-secondary);">Kaunsa chapter weak hai? SAAVI track karti hai aur remind karti hai.</p>
          </div>
          <a href="/features/student-tracking/" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">Jaano →</a>
        </div>

        <!-- 12: Parent Portal -->
        <div class="card animate-on-scroll flex flex-col gap-3">
          <div class="text-4xl">👨‍👩‍👧</div>
          <div>
            <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Parent Portal</div>
            <div class="text-xs mb-2" style="color: var(--accent);">माँ-बाप भी जानें</div>
            <p class="text-sm" style="color: var(--text-secondary);">Bachche ki progress WhatsApp pe — daily report, weekly summary.</p>
          </div>
          <a href="/features/parent-portal/" class="text-sm font-heading font-bold mt-auto" style="color: var(--primary-light);">Jaano →</a>
        </div>

        <!-- 13: Reel Mode -->
        <div class="card animate-on-scroll flex flex-col gap-3 sm:col-span-2 lg:col-span-4">
          <div class="flex flex-col sm:flex-row gap-4 items-start">
            <div class="text-4xl">🎬</div>
            <div class="flex-1">
              <div class="font-heading font-bold text-lg" style="color: var(--text-primary);">Reel Mode</div>
              <div class="text-xs mb-2" style="color: var(--accent);">60 सेकेंड में एक concept</div>
              <p class="text-sm" style="color: var(--text-secondary);">TikTok ki tarah — 60-second audio reels mein ek concept. Boring nahi, engaging!</p>
            </div>
            <a href="/features/reel-mode/" class="btn btn-outline text-sm self-start">Jaano →</a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 6: ZERO TO HERO VISUAL
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="zerohero-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="zerohero-heading" class="text-4xl font-heading font-bold mb-4">Zero Se Board Ready — SAAVI Ka Poora Path</h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          Kuch nahi aata? No problem. SAAVI pehle dekhti hai tum kahan ho, phir plan banati hai board tak ka.
        </p>
      </div>

      <!-- Horizontal path visualization -->
      <div class="flex flex-wrap sm:flex-nowrap items-center justify-center gap-0 mb-10 overflow-x-auto pb-4">

        <!-- Step 1 -->
        <div class="flex flex-col items-center text-center min-w-[100px] px-2 animate-on-scroll">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl mb-2" style="background: var(--bg-surface); border: 2px solid var(--border-default);">🌱</div>
          <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">Zero</div>
          <div class="text-xs" style="color: var(--text-muted);">Kuch nahi aata</div>
        </div>

        <!-- Arrow -->
        <div class="text-2xl mx-1 hidden sm:block" style="color: var(--accent);">→</div>

        <!-- Step 2 -->
        <div class="flex flex-col items-center text-center min-w-[100px] px-2 animate-on-scroll">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl mb-2" style="background: var(--primary-glow); border: 2px solid var(--primary);">📋</div>
          <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">Prerequisites</div>
          <div class="text-xs" style="color: var(--text-muted);">Pehle yeh seekho</div>
        </div>

        <!-- Arrow -->
        <div class="text-2xl mx-1 hidden sm:block" style="color: var(--accent);">→</div>

        <!-- Step 3 -->
        <div class="flex flex-col items-center text-center min-w-[100px] px-2 animate-on-scroll">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl mb-2" style="background: var(--primary-glow); border: 2px solid var(--primary);">💡</div>
          <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">Basics</div>
          <div class="text-xs" style="color: var(--text-muted);">Foundation strong karo</div>
        </div>

        <!-- Arrow -->
        <div class="text-2xl mx-1 hidden sm:block" style="color: var(--accent);">→</div>

        <!-- Step 4 -->
        <div class="flex flex-col items-center text-center min-w-[100px] px-2 animate-on-scroll">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl mb-2" style="background: var(--accent-glow); border: 2px solid var(--accent);">🔥</div>
          <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">Chapter</div>
          <div class="text-xs" style="color: var(--text-muted);">Full chapter padhho</div>
        </div>

        <!-- Arrow -->
        <div class="text-2xl mx-1 hidden sm:block" style="color: var(--accent);">→</div>

        <!-- Step 5 -->
        <div class="flex flex-col items-center text-center min-w-[100px] px-2 animate-on-scroll">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl mb-2" style="background: var(--accent-glow); border: 2px solid var(--accent);">📝</div>
          <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">Mock Test</div>
          <div class="text-xs" style="color: var(--text-muted);">Practice karo</div>
        </div>

        <!-- Arrow -->
        <div class="text-2xl mx-1 hidden sm:block" style="color: var(--accent);">→</div>

        <!-- Step 6 -->
        <div class="flex flex-col items-center text-center min-w-[100px] px-2 animate-on-scroll">
          <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl mb-2" style="background: var(--accent); border: 2px solid var(--accent-light);">🏆</div>
          <div class="font-heading font-bold text-sm" style="color: var(--accent);">Board Ready!</div>
          <div class="text-xs" style="color: var(--text-muted);">Exam crack karo</div>
        </div>

      </div>

      <!-- Example prerequisite chain -->
      <div class="max-w-2xl mx-auto card mb-8 animate-on-scroll" style="border: 1px solid var(--border-default);">
        <div class="font-heading font-bold mb-3" style="color: var(--text-primary);">Example: Quadratic Equations (Class 10)</div>
        <div class="flex flex-wrap gap-2 items-center text-sm" style="color: var(--text-secondary);">
          <span class="pill" style="font-size: 0.75rem;">Numbers (Class 6)</span>
          <span style="color: var(--accent);">→</span>
          <span class="pill" style="font-size: 0.75rem;">Basic Algebra (Class 7)</span>
          <span style="color: var(--accent);">→</span>
          <span class="pill" style="font-size: 0.75rem;">Linear Equations (Class 8)</span>
          <span style="color: var(--accent);">→</span>
          <span class="pill" style="font-size: 0.75rem;">Polynomials (Class 9)</span>
          <span style="color: var(--accent);">→</span>
          <span class="pill active" style="font-size: 0.75rem;">Quadratic Equations ✓</span>
        </div>
        <p class="text-xs mt-3" style="color: var(--text-muted);">SAAVI automatically gaps detect karti hai aur tumhe sahi jagah se start karati hai.</p>
      </div>

      <div class="text-center">
        <a href="/features/zero-to-hero/" class="btn btn-primary">Mera Zero-to-Hero Path Dekho →</a>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 7: STUDENTS + PARENTS SPLIT
       ======================================================== -->
  <section class="section" aria-labelledby="audience-heading">
    <div class="container">
      <h2 id="audience-heading" class="text-4xl font-heading font-bold text-center mb-12">
        <span style="color: var(--primary-light);">Students</span> aur <span style="color: var(--accent);">Maa-Baap</span> — Dono Ke Liye
      </h2>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Students column -->
        <div class="rounded-2xl p-8 animate-on-scroll" style="background: var(--primary-glow); border: 1px solid var(--primary);">
          <div class="flex items-center gap-3 mb-6">
            <span class="text-3xl">🎒</span>
            <h3 class="text-2xl font-heading font-bold" style="color: var(--primary-light);">Students Ke Liye</h3>
          </div>
          <ul class="space-y-4">
            <li class="flex items-start gap-3">
              <span class="text-lg mt-0.5">✅</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Apni language mein seekho</div>
                <p class="text-sm" style="color: var(--text-secondary);">Hindi, Hinglish, Telugu — jo comfortable ho usi mein SAAVI padhati hai.</p>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-lg mt-0.5">✅</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Doubt poochho, kabhi bhi</div>
                <p class="text-sm" style="color: var(--text-secondary);">Raat 2 baje bhi SAAVI available hai — koi judge nahi karti.</p>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-lg mt-0.5">✅</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Boring nahi, interesting</div>
                <p class="text-sm" style="color: var(--text-secondary);">Kitchen analogies, cricket examples, Bollywood references — desi style mein padhao.</p>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-lg mt-0.5">✅</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Mock test se confidence</div>
                <p class="text-sm" style="color: var(--text-secondary);">Exam se pehle practice karo — board paper jaisa feel aayega.</p>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-lg mt-0.5">✅</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Reel mode se fast learning</div>
                <p class="text-sm" style="color: var(--text-secondary);">60 second mein ek concept — revision aur entertainment dono.</p>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-lg mt-0.5">✅</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Photo se doubt solve</div>
                <p class="text-sm" style="color: var(--text-secondary);">Kitaab ka page photograph karo — instant explanation pao.</p>
              </div>
            </li>
          </ul>
        </div>

        <!-- Parents column -->
        <div class="rounded-2xl p-8 animate-on-scroll" style="background: var(--accent-glow); border: 1px solid var(--accent);">
          <div class="flex items-center gap-3 mb-6">
            <span class="text-3xl">👨‍👩‍👧</span>
            <h3 class="text-2xl font-heading font-bold" style="color: var(--accent);">Maa-Baap Ke Liye</h3>
          </div>
          <ul class="space-y-4">
            <li class="flex items-start gap-3">
              <span class="text-lg mt-0.5">✅</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Daily progress report</div>
                <p class="text-sm" style="color: var(--text-secondary);">Har roz WhatsApp pe — bachcha kya padhha, kitna time diya, kaunsa chapter weak hai.</p>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-lg mt-0.5">✅</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">₹199 mein private tutor</div>
                <p class="text-sm" style="color: var(--text-secondary);">₹3,000/month tutor ki jagah ₹199 — same quality, 24x7 available.</p>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-lg mt-0.5">✅</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Safe learning environment</div>
                <p class="text-sm" style="color: var(--text-secondary);">Sirf padhai — koi social media distraction nahi, koi ads nahi.</p>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-lg mt-0.5">✅</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Board exam preparation</div>
                <p class="text-sm" style="color: var(--text-secondary);">CG Board aur CBSE syllabus — exactly wahi jo school mein padhaya jata hai.</p>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-lg mt-0.5">✅</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Accessible for all children</div>
                <p class="text-sm" style="color: var(--text-secondary);">Visually impaired bachche bhi freely padhh sakte hain — Blind Mode FREE hai.</p>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-lg mt-0.5">✅</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">No credit card required</div>
                <p class="text-sm" style="color: var(--text-secondary);">Pehle try karo — 30 din free trial, uske baad decide karo.</p>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 8: SUBJECTS + BOARDS
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="subjects-heading">
    <div class="container">
      <div class="text-center mb-10">
        <h2 id="subjects-heading" class="text-4xl font-heading font-bold mb-4">Kaunsi Class? Kaunsa Board? Sab Cover Hai</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Class 6 se 10 tak — CG Board, CBSE, aur aane wale MP Board ke saath.</p>
      </div>

      <!-- Class pills -->
      <div class="flex flex-wrap justify-center gap-3 mb-8" role="tablist" aria-label="Class selector">
        <button class="pill active" data-class-tab="6" role="tab" aria-selected="true" aria-controls="panel-6">Class 6</button>
        <button class="pill" data-class-tab="7" role="tab" aria-selected="false" aria-controls="panel-7">Class 7</button>
        <button class="pill" data-class-tab="8" role="tab" aria-selected="false" aria-controls="panel-8">Class 8</button>
        <button class="pill" data-class-tab="9" role="tab" aria-selected="false" aria-controls="panel-9">Class 9</button>
        <button class="pill" data-class-tab="10" role="tab" aria-selected="false" aria-controls="panel-10">Class 10</button>
      </div>

      <!-- Board badges -->
      <div class="flex flex-wrap justify-center gap-3 mb-8">
        <span class="badge badge-primary">✅ CG Board</span>
        <span class="badge badge-primary">✅ CBSE</span>
        <span class="badge" style="background: var(--bg-surface); color: var(--text-muted); border: 1px solid var(--border-subtle);">⏳ MP Board — Coming Soon</span>
      </div>

      <!-- Language pills -->
      <div class="flex flex-wrap justify-center gap-2 mb-10">
        <span class="pill" style="cursor: default;">🗣️ Hindi</span>
        <span class="pill" style="cursor: default;">🌐 Hinglish</span>
        <span class="pill" style="cursor: default;">📘 English</span>
        <span class="pill font-telugu" style="cursor: default;">తెలుగు</span>
        <span class="pill font-devanagari" style="cursor: default;" lang="mr">मराठी</span>
      </div>

      <!-- Class panels -->
      <div class="max-w-3xl mx-auto">

        <!-- Class 6 panel -->
        <div id="panel-6" data-class-panel="6" role="tabpanel" aria-labelledby="tab-6">
          <div class="card">
            <h3 class="font-heading font-bold text-xl mb-4" style="color: var(--text-primary);">Class 6 — Subjects</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
              <a href="/classes/class-6/science/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">🔬 Science</a>
              <a href="/classes/class-6/mathematics/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">➕ Maths</a>
              <a href="/classes/class-6/hindi/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">📖 Hindi</a>
              <a href="/classes/class-6/social-science/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">🌍 Social Science</a>
            </div>
          </div>
        </div>

        <!-- Class 7 panel -->
        <div id="panel-7" data-class-panel="7" class="hidden" role="tabpanel" aria-labelledby="tab-7">
          <div class="card">
            <h3 class="font-heading font-bold text-xl mb-4" style="color: var(--text-primary);">Class 7 — Subjects</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
              <a href="/classes/class-7/science/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">🔬 Science</a>
              <a href="/classes/class-7/mathematics/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">➕ Maths</a>
              <a href="/classes/class-7/hindi/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">📖 Hindi</a>
              <a href="/classes/class-7/social-science/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">🌍 Social Science</a>
            </div>
          </div>
        </div>

        <!-- Class 8 panel -->
        <div id="panel-8" data-class-panel="8" class="hidden" role="tabpanel" aria-labelledby="tab-8">
          <div class="card">
            <h3 class="font-heading font-bold text-xl mb-4" style="color: var(--text-primary);">Class 8 — Subjects</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
              <a href="/classes/class-8/science/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">🔬 Science</a>
              <a href="/classes/class-8/mathematics/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">➕ Maths</a>
              <a href="/classes/class-8/hindi/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">📖 Hindi</a>
              <a href="/classes/class-8/social-science/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">🌍 Social Science</a>
            </div>
          </div>
        </div>

        <!-- Class 9 panel -->
        <div id="panel-9" data-class-panel="9" class="hidden" role="tabpanel" aria-labelledby="tab-9">
          <div class="card">
            <h3 class="font-heading font-bold text-xl mb-4" style="color: var(--text-primary);">Class 9 — Subjects</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
              <a href="/classes/class-9/science/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">🔬 Science</a>
              <a href="/classes/class-9/mathematics/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">➕ Maths</a>
              <a href="/classes/class-9/hindi/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">📖 Hindi</a>
              <a href="/classes/class-9/social-science/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">🌍 Social Science</a>
            </div>
          </div>
        </div>

        <!-- Class 10 panel -->
        <div id="panel-10" data-class-panel="10" class="hidden" role="tabpanel" aria-labelledby="tab-10">
          <div class="card">
            <h3 class="font-heading font-bold text-xl mb-4" style="color: var(--text-primary);">Class 10 — Subjects</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
              <a href="/classes/class-10/science/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">🔬 Science</a>
              <a href="/classes/class-10/mathematics/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">➕ Maths</a>
              <a href="/classes/class-10/hindi/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">📖 Hindi</a>
              <a href="/classes/class-10/social-science/" class="flex items-center gap-2 p-3 rounded-lg text-sm font-heading font-bold" style="background: var(--bg-elevated); color: var(--primary-light);">🌍 Social Science</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 9: TESTIMONIALS
       ======================================================== -->
  <section class="section" aria-labelledby="testimonials-heading">
    <div class="container">
      <div class="text-center mb-10">
        <h2 id="testimonials-heading" class="text-4xl font-heading font-bold mb-4">500+ Families — Aur Badh Rahi Hai</h2>
        <p class="text-lg mb-6" style="color: var(--text-secondary);">Ye log already SAAVI ke saath hain — tum kab join karoge?</p>

        <!-- Progress bar -->
        <div class="max-w-sm mx-auto">
          <div class="flex justify-between text-sm mb-2">
            <span style="color: var(--text-secondary);">500 joined</span>
            <span style="color: var(--text-muted);">Goal: 1,000</span>
          </div>
          <div class="w-full h-3 rounded-full" style="background: var(--bg-elevated);">
            <div class="h-3 rounded-full" style="width: 50%; background: linear-gradient(90deg, var(--primary), var(--accent));"></div>
          </div>
          <p class="text-xs mt-2" style="color: var(--text-muted);">50% full — join before launch!</p>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

        <!-- Testimonial 1 -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="flex items-center gap-1" aria-label="5 out of 5 stars">
            <span style="color: var(--accent);">★★★★★</span>
          </div>
          <blockquote>
            <p class="text-sm italic" style="color: var(--text-body);">
              "Meri beti Class 8 mein thi, Science mein fail ho rahi thi. SAAVI ke 2 hafte baad test mein 78 aaye! Didi ke jaisa explain karti hai — ek baar mein samajh aata hai."
            </p>
          </blockquote>
          <div class="mt-auto">
            <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">Sunita Verma</div>
            <div class="text-xs" style="color: var(--text-muted);">Raipur, Chhattisgarh · Class 8 parent</div>
          </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="flex items-center gap-1" aria-label="5 out of 5 stars">
            <span style="color: var(--accent);">★★★★★</span>
          </div>
          <blockquote>
            <p class="text-sm italic" style="color: var(--text-body);">
              "Main visually impaired hoon. Pehli baar ek app hai jo actually mera hai. SAAVI didi se sunke Maths seekh raha hoon. Board exam ki taiyari ho rahi hai bina kisi ki madad ke."
            </p>
          </blockquote>
          <div class="mt-auto">
            <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">Rohan Patel</div>
            <div class="text-xs" style="color: var(--text-muted);">Bilaspur, CG · Class 10 student</div>
          </div>
        </div>

        <!-- Testimonial 3 -->
        <div class="card animate-on-scroll flex flex-col gap-4">
          <div class="flex items-center gap-1" aria-label="5 out of 5 stars">
            <span style="color: var(--accent);">★★★★★</span>
          </div>
          <blockquote>
            <p class="text-sm italic" style="color: var(--text-body);">
              "₹199 mein itna? Humne teen tutor try kiye, sabse zyada paisa gaya aur result nahi mila. SAAVI ek hafte mein bachche ka confidence double kar diya. Kya app hai!"
            </p>
          </blockquote>
          <div class="mt-auto">
            <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">Ramesh Kumar</div>
            <div class="text-xs" style="color: var(--text-muted);">Durg, CG · Class 9 parent</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 10: PRICING PREVIEW
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="pricing-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="pricing-heading" class="text-4xl font-heading font-bold mb-4">Private Tutor ₹3,000 vs SAAVI ₹199</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Samjho — baaki apps se kya fark hai? Numbers bolte hain.</p>
      </div>

      <!-- Plan cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-2xl mx-auto mb-12">

        <!-- Free Trial -->
        <div class="card text-center animate-on-scroll">
          <div class="text-3xl mb-2">🎁</div>
          <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Free Trial</div>
          <div class="stat-number mb-4">₹0</div>
          <ul class="text-sm space-y-2 mb-6 text-left" style="color: var(--text-secondary);">
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span> 30-day full access</li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span> All 5 languages</li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span> Blind Mode — forever free</li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span> No credit card needed</li>
          </ul>
          <a href="/waitlist/" class="btn btn-outline w-full justify-center">Join Waitlist →</a>
        </div>

        <!-- Pro Plan -->
        <div class="card text-center animate-on-scroll" style="border: 2px solid var(--accent); box-shadow: 0 0 30px var(--accent-glow);">
          <span class="badge badge-accent mb-3">Most Popular</span>
          <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">Shrutam Pro</div>
          <div class="stat-number mb-1">₹199</div>
          <div class="text-sm mb-4" style="color: var(--text-muted);">/month · All subjects · All classes</div>
          <ul class="text-sm space-y-2 mb-6 text-left" style="color: var(--text-secondary);">
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span> Unlimited SAAVI sessions</li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span> Mock exams + detailed feedback</li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span> Parent progress reports</li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span> Photo doubt solver</li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span> Reel Mode + Revision Mode</li>
            <li class="flex items-center gap-2"><span style="color: var(--success);">✓</span> Zero to Hero path</li>
          </ul>
          <a href="/waitlist/" class="btn btn-primary w-full justify-center">Launch Pe Pehle Pao →</a>
        </div>

      </div>

      <!-- Comparison table -->
      <div class="max-w-3xl mx-auto overflow-x-auto rounded-xl" style="border: 1px solid var(--border-subtle);">
        <table class="comparison-table">
          <thead>
            <tr>
              <th>Feature</th>
              <th>Private Tutor</th>
              <th>BYJU's / Unacademy</th>
              <th style="color: var(--accent);">Shrutam ✨</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Monthly Cost</td>
              <td>₹3,000–₹8,000</td>
              <td>₹500–₹1,500</td>
              <td style="color: var(--success); font-weight: 600;">₹199</td>
            </tr>
            <tr>
              <td>Hindi Medium</td>
              <td>Depends on tutor</td>
              <td style="color: var(--error);">Mostly English</td>
              <td style="color: var(--success); font-weight: 600;">✅ Native</td>
            </tr>
            <tr>
              <td>Blind Mode</td>
              <td style="color: var(--error);">❌</td>
              <td style="color: var(--error);">❌</td>
              <td style="color: var(--success); font-weight: 600;">✅ FREE Forever</td>
            </tr>
            <tr>
              <td>Available 24x7</td>
              <td style="color: var(--error);">❌</td>
              <td>Recorded only</td>
              <td style="color: var(--success); font-weight: 600;">✅ Live AI</td>
            </tr>
            <tr>
              <td>Adaptive Learning</td>
              <td>Sometimes</td>
              <td style="color: var(--error);">❌</td>
              <td style="color: var(--success); font-weight: 600;">✅ Always</td>
            </tr>
            <tr>
              <td>CG Board Syllabus</td>
              <td>Depends</td>
              <td style="color: var(--error);">❌</td>
              <td style="color: var(--success); font-weight: 600;">✅ Native</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="text-center mt-8">
        <a href="/pricing/" class="btn btn-outline">Full Pricing Dekho →</a>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 11: LAUNCH COUNTDOWN + CTA
       ======================================================== -->
  <section class="section" aria-labelledby="countdown-heading" style="background: linear-gradient(160deg, var(--bg-base) 40%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-accent mb-4">🚀 Launch Coming Up</span>
        <h2 id="countdown-heading" class="text-4xl font-heading font-bold mb-4">May 20 Launch — Pehle List Mein Aao</h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          Early joiners ko milega <strong style="color: var(--accent);">30-din extended free trial</strong> — sirf pehle 1,000 logon ke liye.
        </p>
      </div>

      <!-- Countdown digits -->
      <div class="flex justify-center gap-4 flex-wrap mb-12" role="timer" aria-label="Countdown to May 20, 2026 launch">
        <div class="countdown-digit">
          <span class="number" id="cd-days">--</span>
          <span class="label">Days</span>
        </div>
        <div class="countdown-digit">
          <span class="number" id="cd-hours">--</span>
          <span class="label">Hours</span>
        </div>
        <div class="countdown-digit">
          <span class="number" id="cd-minutes">--</span>
          <span class="label">Minutes</span>
        </div>
        <div class="countdown-digit">
          <span class="number" id="cd-seconds">--</span>
          <span class="label">Seconds</span>
        </div>
      </div>

      <!-- Waitlist form -->
      <div class="max-w-lg mx-auto animate-on-scroll">
        <div class="card" style="border: 2px solid var(--border-default); box-shadow: 0 0 40px var(--primary-glow);">
          <h3 class="text-xl font-heading font-bold text-center mb-6" style="color: var(--text-primary);">
            Abhi Join Karo — Free Hai 🎉
          </h3>
          <?php include 'partials/waitlist-form.php'; ?>
        </div>
      </div>

      <!-- Benefits below form -->
      <div class="flex flex-wrap justify-center gap-6 mt-8 text-sm" style="color: var(--text-secondary);">
        <div class="flex items-center gap-2">
          <span style="color: var(--success);">✓</span>
          <span>30-day extended trial</span>
        </div>
        <div class="flex items-center gap-2">
          <span style="color: var(--success);">✓</span>
          <span>Launch-day notification</span>
        </div>
        <div class="flex items-center gap-2">
          <span style="color: var(--success);">✓</span>
          <span>No credit card needed</span>
        </div>
        <div class="flex items-center gap-2">
          <span style="color: var(--success);">✓</span>
          <span>Priority access on launch</span>
        </div>
      </div>

    </div>
  </section>

</main>

<?php include 'partials/footer.php'; ?>
