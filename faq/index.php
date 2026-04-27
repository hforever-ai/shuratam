<?php
$title       = "FAQ — Aksar Pooche Jane Wale Sawaal | Shrutam SAAVI";
$description = "Shrutam ke baare mein sab sawaal — SAAVI, Blind Mode, pricing, boards, parent portal. Hindi mein.";
$canonical   = "https://shrutam.ai/faq/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"           => "BreadcrumbList",
      "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Shrutam", "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "FAQ",     "item" => "https://shrutam.ai/faq/"],
      ],
    ],
    [
      "@type"      => "FAQPage",
      "url"        => "https://shrutam.ai/faq/",
      "publisher"  => ["@id" => "https://shrutam.ai/#org"],
      "mainEntity" => [
    // About SAAVI
    [
      "@type"          => "Question",
      "name"           => "SAAVI kaun hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "SAAVI (Study AI Assistant & Voice Intelligence) tumhari AI teacher didi hai. 24/7 available. Hindi, Hinglish, English, Telugu, Marathi mein padhati hai."],
    ],
    [
      "@type"          => "Question",
      "name"           => "SAAVI kaunsi languages mein bolti hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "5 languages — Hindi, Hinglish, English, Telugu, Marathi. Hinglish natively generate hota hai, translate nahi."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Kya SAAVI raat 2 baje bhi available hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Haan! SAAVI 24/7 available hai. Raat ko doubt aaye toh pooch lo."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Kya SAAVI real teacher ki jagah le sakti hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "SAAVI ek supplement hai — school ki padhai ke saath. Real teacher + SAAVI = best combination."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Blind students ke liye kya special hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Full blind mode — verbal diagrams, math spoken aloud, scribe cues, voice quiz, TalkBack/VoiceOver compatible. FREE forever."],
    ],
    // Blind Mode
    [
      "@type"          => "Question",
      "name"           => "Blind Mode kya hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "SAAVI ka special mode blind aur visually impaired students ke liye. Koi 'see the diagram' nahi — sab kuch audio mein."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Kya blind mode free hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Haan, hamesha free. Aarambha ka commitment — blind mode ka koi charge nahi."],
    ],
    [
      "@type"          => "Question",
      "name"           => "TalkBack aur VoiceOver compatible hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Haan! Android TalkBack, iOS VoiceOver, Windows NVDA, JAWS — sab supported hain."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Scribe mode kya hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Board exam ke liye — SAAVI dictation cues deti hai jaise \"[Scribe: capital P] Photosynthesis [Scribe: new line]\""],
    ],
    // App
    [
      "@type"          => "Question",
      "name"           => "App kab launch ho raha hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "May 20, 2026. Waitlist join karo — launch pe pehle access milega."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Android aur iOS dono pe hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Haan, dono pe hoga. Pehle Android, phir iOS."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Offline mode hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Planned hai. Phase 1 mein online required hai, phase 2 mein offline notes aur flashcards."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Kitna internet use hoga?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Bahut kam. Text-based learning hai, heavy video nahi. 2G/3G pe bhi chalega."],
    ],
    // Pricing
    [
      "@type"          => "Question",
      "name"           => "Free trial mein kya milta hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "7 din, 2 subjects, basic SAAVI chat, 5 doubts per day, basic mock tests."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Credit card chahiye?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Nahi! Free trial ke liye koi card nahi chahiye."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Cancel kaise karein?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "App settings se ek tap mein cancel. Koi penalty nahi."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Refund policy kya hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "7-day money back guarantee after paid subscription starts."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Multiple bachche ek account pe?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Abhi ek account = ek student. Family plan aayega soon."],
    ],
    // Boards
    [
      "@type"          => "Question",
      "name"           => "Kaunse boards supported hain?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "CG Board (CGBSE) aur CBSE. MP Board coming soon."],
    ],
    [
      "@type"          => "Question",
      "name"           => "NCERT exact chapters follow karta hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Haan! Har chapter NCERT ke exact naam aur sequence follow karta hai."],
    ],
    [
      "@type"          => "Question",
      "name"           => "CG Board aur CBSE dono cover hote hain?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Haan! Ek app mein dono boards ka full syllabus."],
    ],
    // Parent Portal
    [
      "@type"          => "Question",
      "name"           => "Parent portal free hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Haan, Shrutam Pro subscription ke saath included hai."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Bedtime lock kaise kaam karta hai?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Parents set karein time (e.g., 10 PM). SAAVI automatically band ho jaati hai. Override nahi hota."],
    ],
    [
      "@type"          => "Question",
      "name"           => "WhatsApp report kaise milega?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Phone number register karo — weekly summary WhatsApp pe aa jaayega."],
    ],
    [
      "@type"          => "Question",
      "name"           => "Kya main dekhne ke liye khud SAAVI use kar sakta hoon?",
      "acceptedAnswer" => ["@type" => "Answer", "text" => "Haan! Parent account se demo mode mein SAAVI try kar sakte ho."],
    ],
      ],
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       HERO
       ======================================================== -->
  <section class="section" aria-labelledby="faq-hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center max-w-2xl mx-auto">
        <span class="badge badge-primary mb-4">❓ FAQ</span>
        <h1 id="faq-hero-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
          Aksar Pooche Jane Wale Sawaal
        </h1>
        <p class="text-xl" style="color: var(--text-secondary);">
          SAAVI, Blind Mode, pricing, boards, parent portal — sab kuch Hindi mein. Koi bhi sawaal hai toh yahan hai jawab.
        </p>
        <div class="flex flex-wrap justify-center gap-3 mt-6 text-sm">
          <a href="#about-saavi" class="pill">SAAVI</a>
          <a href="#blind-mode" class="pill">Blind Mode</a>
          <a href="#about-app" class="pill">App</a>
          <a href="#pricing" class="pill">Pricing</a>
          <a href="#boards" class="pill">Boards</a>
          <a href="#parent-portal" class="pill">Parent Portal</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       FAQ CONTENT
       ======================================================== -->
  <section class="section section-dark" aria-label="FAQ sections">
    <div class="container">
      <div class="max-w-3xl mx-auto flex flex-col gap-16">

        <!-- ---- ABOUT SAAVI ---- -->
        <div id="about-saavi">
          <h2 class="text-3xl font-heading font-bold mb-8" style="color: var(--primary-light);">
            SAAVI Ke Baare Mein
          </h2>
          <div class="flex flex-col gap-4">

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>SAAVI kaun hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>SAAVI (Study AI Assistant &amp; Voice Intelligence) tumhari AI teacher didi hai. 24/7 available — raat ko, subah ko, kabhi bhi. Hindi, Hinglish, English, Telugu, Marathi mein padhati hai — jis language mein tum sochte ho, usi mein bolti hai.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>SAAVI kaunsi languages mein bolti hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>5 languages — <strong style="color: var(--text-primary);">Hindi, Hinglish, English, Telugu, Marathi</strong>. Khaas baat yeh hai ki Hinglish natively generate hota hai — kisi Hindi content ka translate nahi, balki alag se design kiya gaya hai. Jaise tum apne dost se bolte ho, usi tarah.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Kya SAAVI raat 2 baje bhi available hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Haan! SAAVI 24/7 available hai — including raat 2 baje. Exam se pehle raat ko doubt aaye, ya Sunday subah galti se kuch yaad na rahe — SAAVI hamesha ready hai. Koi "office hours" nahi hain.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Kya SAAVI real teacher ki jagah le sakti hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>SAAVI ek supplement hai — school ki padhai ke saath. Real teacher + SAAVI = best combination. School mein jo teacher padhata hai, SAAVI ghar pe usi ko reinforce karti hai. Teacher ke bina poori picture nahi hoti — SAAVI woh gap bharne ke liye hai, replace karne ke liye nahi.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Blind students ke liye kya special hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Full Blind Mode — verbal diagrams (SAAVI describe karti hai "diagram mein ek triangle hai jisme..."), math spoken aloud ("x squared plus 2x minus 3 equals zero"), scribe cues, voice quiz. TalkBack aur VoiceOver compatible. Aur yeh hamesha <strong style="color: var(--accent);">FREE</strong> rahega.</p>
              </div>
            </details>

          </div>
        </div>

        <!-- ---- BLIND MODE ---- -->
        <div id="blind-mode">
          <h2 class="text-3xl font-heading font-bold mb-8" style="color: var(--accent);">
            ♿ Blind Mode
          </h2>
          <div class="flex flex-col gap-4">

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Blind Mode kya hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>SAAVI ka special mode blind aur visually impaired students ke liye. Koi "see the diagram" nahi, koi "look at the image" nahi — sab kuch audio mein. Diagrams verbal hain, equations spoken hain, navigation voice-based hai. Poora syllabus sirf sunke complete ho sakta hai.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Kya blind mode free hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Haan, <strong style="color: var(--accent);">hamesha free</strong>. Yeh Aarambha ka commitment hai — blind mode ka koi charge nahi, kabhi nahi. Yeh sirf feature nahi, hamara vachan hai. India mein 50 lakh visually impaired students hain — unhe afford karna nahi padega.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>TalkBack aur VoiceOver compatible hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Haan! Tested aur compatible hai: <strong style="color: var(--text-primary);">Android TalkBack</strong>, <strong style="color: var(--text-primary);">iOS VoiceOver</strong>, <strong style="color: var(--text-primary);">Windows NVDA</strong>, <strong style="color: var(--text-primary);">JAWS</strong> — sab supported hain. Accessibility baad mein nahi sochi — pehle se design mein hai.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Scribe mode kya hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Board exam ke liye special mode — SAAVI dictation cues deti hai jaise <em>"[Scribe: capital P] Photosynthesis [Scribe: new line] is the process..."</em>. Isse visually impaired student apne scribe ko clearly instruct kar sakta hai exam mein. Board exam preparation ka poora support hai.</p>
              </div>
            </details>

          </div>
        </div>

        <!-- ---- ABOUT APP ---- -->
        <div id="about-app">
          <h2 class="text-3xl font-heading font-bold mb-8" style="color: var(--primary-light);">
            App Ke Baare Mein
          </h2>
          <div class="flex flex-col gap-4">

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>App kab launch ho raha hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p><strong style="color: var(--accent);">May 20, 2026</strong>. Waitlist join karo — launch pe pehle access milega, aur early joiners ko 30-day extended trial bhi milega (normal 7-day ki jagah).</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Android aur iOS dono pe hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Haan, dono pe hoga. Launch pe <strong style="color: var(--text-primary);">Android pehle</strong> aayega (kyunki India mein zyada Android users hain), phir iOS kuch hafte baad. Web version bhi hogi basic features ke saath.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Offline mode hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Planned hai — Phase 2 mein. Phase 1 (launch) mein internet required hai, lekin bahut kam use hota hai. Phase 2 mein offline notes aur flashcards available honge jab bhi net nahi ho.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Kitna internet use hoga?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Bahut kam. Shrutam text-based aur audio-based learning pe focus karta hai — heavy video streaming nahi hai. <strong style="color: var(--text-primary);">2G/3G pe bhi chalega</strong>. Village mein jahan net slow ho wahan bhi SAAVI kaam karegi.</p>
              </div>
            </details>

          </div>
        </div>

        <!-- ---- PRICING ---- -->
        <div id="pricing">
          <h2 class="text-3xl font-heading font-bold mb-8" style="color: var(--primary-light);">
            Pricing
          </h2>
          <div class="flex flex-col gap-4">

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Free trial mein kya milta hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>7 din ka trial: <strong style="color: var(--text-primary);">2 subjects</strong>, basic SAAVI chat, <strong style="color: var(--text-primary);">5 doubts per day</strong>, basic mock tests. Koi credit card nahi chahiye. Early waitlist joiners ko 30-din ka extended trial milega.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Credit card chahiye?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p><strong style="color: var(--success);">Nahi!</strong> Free trial ke liye koi card nahi chahiye. Paid subscription ke liye UPI, Paytm, ya debit card se pay kar sakte ho. Credit card optional hai — force nahi kiya jaata.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Cancel kaise karein?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>App settings mein jaao → "Subscription" → "Cancel". Ek tap. Koi form nahi, koi call nahi, koi penalty nahi. Cancel karne ke baad current billing cycle ke end tak access milta rahega.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Refund policy kya hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Paid subscription start hone ke baad <strong style="color: var(--text-primary);">7-day money back guarantee</strong>. Bina sawaal ke refund milega. Hum ek hi cheez poochh sakte hain: "Kya acha nahi laga?" — taaki SAAVI aur better bane.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Multiple bachche ek account pe?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Abhi ek account = ek student. Adaptive learning tabhi kaam karta hai jab ek bachche ka individual data ho — mix hone se personalization break ho jaata. Family plan — 2-3 bachche ek subscription pe — bahut jaldi aa raha hai.</p>
              </div>
            </details>

          </div>
        </div>

        <!-- ---- BOARDS & CLASSES ---- -->
        <div id="boards">
          <h2 class="text-3xl font-heading font-bold mb-8" style="color: var(--primary-light);">
            Boards &amp; Classes
          </h2>
          <div class="flex flex-col gap-4">

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Kaunse boards supported hain?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p><strong style="color: var(--success);">CG Board (CGBSE)</strong> aur <strong style="color: var(--success);">CBSE</strong> — dono fully supported hain. <strong style="color: var(--text-muted);">MP Board coming soon</strong>. Agar tumhara board list mein nahi hai toh waitlist mein join karte waqt mention karo — hum priority decide karte waqt dekhte hain.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>NCERT exact chapters follow karta hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Haan! Har chapter NCERT ke exact naam aur sequence follow karta hai. SAAVI se Class 6 Science Chapter 4 poochho toh exactly wahi chapter aayega jo school ki kitaab mein hai. Koi confusion nahi.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>CG Board aur CBSE dono cover hote hain?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Haan! Ek app mein dono boards ka full syllabus. Jab subscribe karo toh apna board select karo — SAAVI automatically usi ke hisaab se padhayegi. Ek account se board change karna bhi possible hai.</p>
              </div>
            </details>

          </div>
        </div>

        <!-- ---- PARENT PORTAL ---- -->
        <div id="parent-portal">
          <h2 class="text-3xl font-heading font-bold mb-8" style="color: var(--primary-light);">
            Parent Portal
          </h2>
          <div class="flex flex-col gap-4">

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Parent portal free hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Haan, Shrutam Pro subscription ke saath <strong style="color: var(--success);">included hai</strong> — koi extra charge nahi. Maa-baap ke liye alag login hota hai jahan bachche ki poori progress dikhti hai.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Bedtime lock kaise kaam karta hai?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Parent portal mein time set karo (e.g., raat 10 PM). Us time ke baad SAAVI automatically band ho jaati hai — student override nahi kar sakta. Agle din subah automatically start hoti hai. Padhai ka waqt aur sone ka waqt — dono balance hote hain.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>WhatsApp report kaise milega?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Sign up ke waqt apna WhatsApp number register karo. Weekly summary automatically aayegi — kaunsa chapter padhha, kitne doubts pooche, mock test score, kaunsa topic weak hai. Koi extra app download karne ki zaroorat nahi — WhatsApp pe hi.</p>
              </div>
            </details>

            <details class="card" style="border: 1px solid var(--border-subtle);">
              <summary class="font-heading font-bold cursor-pointer list-none flex items-center justify-between gap-4" style="color: var(--text-primary);">
                <span>Kya main dekhne ke liye khud SAAVI use kar sakta hoon?</span>
                <span class="text-lg flex-shrink-0" style="color: var(--accent);">+</span>
              </summary>
              <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle); color: var(--text-secondary);">
                <p>Haan! Parent account se demo mode mein SAAVI try kar sakte ho — dekhne ke liye ki bachcha kaisa padhh raha hoga, SAAVI kaise explain karti hai. Full demo milega — ek confident maa-baap = bacche ki padhai mein zyada support.</p>
              </div>
            </details>

          </div>
        </div>

      </div><!-- /max-w-3xl -->
    </div>
  </section>

  <!-- ========================================================
       CTA
       ======================================================== -->
  <section class="section" aria-labelledby="faq-cta-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center max-w-xl mx-auto">
        <h2 id="faq-cta-heading" class="text-4xl font-heading font-bold mb-4">Sawaal Clear? Ab Join Karo!</h2>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          7 din free trial. No credit card. Early joiners ko <strong style="color: var(--accent);">30-din extended trial</strong> milega.
        </p>
        <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
        <p class="text-sm mt-4" style="color: var(--text-muted);">Aur sawaal hain? <a href="/contact/" style="color: var(--primary-light);">Contact karo →</a></p>
      </div>
    </div>
  </section>

</main>

<?php include '../partials/footer.php'; ?>
