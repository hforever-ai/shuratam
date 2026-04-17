<?php
$title       = "Blind Mode — India Ka Pehla AI Tutor Visually Impaired Students Ke Liye | Shrutam";
$description = "Shrutam ka Blind Mode: koi 'see the diagram' nahi, scribe cues, voice quiz, TalkBack/VoiceOver compatible. India ke 50 lakh blind students ke liye. FREE forever.";
$canonical   = "https://shrutam.ai/blind-mode/";
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
      "name"     => "Blind Mode",
      "item"     => "https://shrutam.ai/blind-mode/",
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main">

  <!-- ============================================================
       SECTION 1: HERO — Emotional Problem Statement
       ============================================================ -->
  <section class="section" aria-labelledby="blind-hero-heading"
    style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">

      <!-- Breadcrumb -->
      <nav aria-label="Breadcrumb" class="mb-8">
        <ol class="flex items-center gap-2 text-sm" style="color: var(--text-muted);">
          <li><a href="/" style="color: var(--primary-light);">Home</a></li>
          <li aria-hidden="true" style="color: var(--border-default);">/</li>
          <li aria-current="page" style="color: var(--text-secondary);">Blind Mode</li>
        </ol>
      </nav>

      <div class="max-w-3xl mx-auto text-center">

        <!-- Badges -->
        <div class="flex flex-wrap justify-center gap-3 mb-6">
          <span class="badge badge-accent">♿ India Ka Pehla</span>
          <span class="badge badge-primary">FREE Forever</span>
        </div>

        <!-- H1 -->
        <h1 id="blind-hero-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
          Aankhon Ki Zaroorat Nahi — SAAVI Hai Na
        </h1>

        <!-- Hindi tagline -->
        <p lang="hi" class="font-devanagari-heading text-2xl mb-8" style="color: var(--accent);">
          सुनो, सीखो, आगे बढ़ो।
        </p>

        <img src="/assets/images/features/blind-mode.png" alt="Blind Mode — TalkBack, VoiceOver, headphones, braille compatible" loading="lazy" class="w-full max-w-[280px] mx-auto my-6 rounded-xl">

        <!-- Emotional problem statement -->
        <div class="rounded-2xl p-8 mb-10 text-left animate-on-scroll"
          style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
          <p class="text-lg leading-relaxed" style="color: var(--text-body);">
            India mein <strong style="color: var(--text-primary);">50 lakh+ blind school students</strong> hain.
            Unme se kaun padhta hai properly?
          </p>
          <ul class="mt-4 space-y-3" style="color: var(--text-secondary);">
            <li class="flex items-start gap-3">
              <span class="text-xl mt-0.5" style="color: var(--error);">✗</span>
              <span><strong style="color: var(--text-primary);">Braille books</strong> — limited, expensive, heavy.</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-xl mt-0.5" style="color: var(--error);">✗</span>
              <span><strong style="color: var(--text-primary);">School</strong> — 1 special teacher for 100+ students.</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-xl mt-0.5" style="color: var(--error);">✗</span>
              <span><strong style="color: var(--text-primary);">Edtech</strong> — ZERO apps designed for them.</span>
            </li>
          </ul>
          <p class="mt-6 text-lg leading-relaxed" style="color: var(--text-body);">
            Hum <strong style="color: var(--accent);">SAAVI</strong> bana rahe the. Tab socha — SAAVI ek AI teacher hai.
            Woh <strong style="color: var(--text-primary);">BOLTI</strong> hai. Toh blind students ke liye
            <strong style="color: var(--text-primary);">PERFECT</strong> hai.
            Toh humne bana diya. <strong style="color: var(--accent);">India ka pehla.</strong>
          </p>
        </div>

        <!-- CTA -->
        <div class="flex flex-wrap justify-center gap-4">
          <a href="/waitlist/" class="btn btn-primary">Blind Mode Early Access Join Karo → Free</a>
          <a href="#features" class="btn btn-outline">7 Features Dekho ↓</a>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 2: 7 BLIND MODE FEATURES
       ============================================================ -->
  <section id="features" class="section section-dark" aria-labelledby="features-heading">
    <div class="container">

      <div class="text-center mb-12">
        <span class="badge badge-primary mb-4">7 Dedicated Features</span>
        <h2 id="features-heading" class="text-4xl font-heading font-bold mb-4">
          Blind Mode Mein Kya Kya Hai?
        </h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Har ek feature specifically blind students ke needs ke liye design kiya gaya hai —
          koi compromise nahi, koi workaround nahi.
        </p>
      </div>

      <div class="flex flex-col gap-8 max-w-4xl mx-auto">

        <!-- Card 1: No "See the Diagram" — Ever -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
          <div class="flex items-start gap-4 mb-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg"
              style="background: var(--primary-glow); color: var(--primary-light); border: 2px solid var(--primary);">
              1
            </div>
            <div>
              <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">
                No "See the Diagram" — Ever
              </div>
              <p class="text-sm" style="color: var(--text-secondary);">
                Normal apps mein visuals mandatory hote hain. SAAVI Blind Mode mein every concept
                is spoken in pure words — koi image reference nahi.
              </p>
            </div>
          </div>

          <!-- Before / After -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
            <div class="rounded-xl p-4" style="background: var(--bg-elevated); border: 1px solid var(--error);">
              <div class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--error);">Normal App</div>
              <p class="text-sm font-mono" style="color: var(--text-secondary);">
                "Refer to the figure below to understand the circle."
              </p>
            </div>
            <div class="rounded-xl p-4" style="background: var(--bg-elevated); border: 1px solid var(--success);">
              <div class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--success);">SAAVI Blind Mode</div>
              <p class="text-sm font-mono leading-relaxed" style="color: var(--text-body);">
                "Ek circle socho. Beech mein ek point O hai — yeh centre hai.
                O se circle ke edge tak line — yeh radius hai.
                Radius circle ki naap hai."
              </p>
            </div>
          </div>
        </div>

        <!-- Card 2: Math Spoken Aloud -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
          <div class="flex items-start gap-4 mb-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg"
              style="background: var(--accent-glow); color: var(--accent); border: 2px solid var(--accent);">
              2
            </div>
            <div>
              <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">
                Math Spoken Aloud
              </div>
              <p class="text-sm" style="color: var(--text-secondary);">
                Equations, formulas, chemical symbols — sab kuch natural speech mein convert hota hai.
                Screen reader pe equation jaisa dikhta hai, SAAVI usise bolti nahi — properly bolti hai.
              </p>
            </div>
          </div>

          <!-- Conversion examples -->
          <div class="rounded-xl p-4 mt-2" style="background: var(--bg-elevated); border: 1px solid var(--border-subtle);">
            <div class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--accent);">Conversion Examples</div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
              <div class="rounded-lg p-3 text-sm" style="background: var(--bg-base);">
                <div class="text-xs mb-1" style="color: var(--text-muted);">Written</div>
                <div class="font-mono font-bold mb-2" style="color: var(--error);">x² + 3x + 2 = 0</div>
                <div class="text-xs mb-1" style="color: var(--text-muted);">SAAVI bolti hai</div>
                <div style="color: var(--success);">"x squared plus 3 x plus 2 equals zero"</div>
              </div>
              <div class="rounded-lg p-3 text-sm" style="background: var(--bg-base);">
                <div class="text-xs mb-1" style="color: var(--text-muted);">Written</div>
                <div class="font-mono font-bold mb-2" style="color: var(--error);">H₂O</div>
                <div class="text-xs mb-1" style="color: var(--text-muted);">SAAVI bolti hai</div>
                <div style="color: var(--success);">"H 2 O — hydrogen do, oxygen ek"</div>
              </div>
              <div class="rounded-lg p-3 text-sm" style="background: var(--bg-base);">
                <div class="text-xs mb-1" style="color: var(--text-muted);">Written</div>
                <div class="font-mono font-bold mb-2" style="color: var(--error);">3/4</div>
                <div class="text-xs mb-1" style="color: var(--text-muted);">SAAVI bolti hai</div>
                <div style="color: var(--success);">"3 divided by 4"</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 3: Tables → Spoken Lists -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
          <div class="flex items-start gap-4 mb-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg"
              style="background: var(--primary-glow); color: var(--primary-light); border: 2px solid var(--primary);">
              3
            </div>
            <div>
              <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">
                Tables → Spoken Lists
              </div>
              <p class="text-sm" style="color: var(--text-secondary);">
                Periodic table, data tables, comparison charts — sab kuch structured spoken format mein
                convert ho jaata hai. Koi grid, koi column — sirf clear, ordered speech.
              </p>
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
            <div class="rounded-xl p-4" style="background: var(--bg-elevated); border: 1px solid var(--error);">
              <div class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--error);">Normal App</div>
              <div class="overflow-x-auto">
                <table class="text-xs w-full" style="color: var(--text-muted); border-collapse: collapse;">
                  <thead>
                    <tr>
                      <th class="p-1 text-left" style="border-bottom: 1px solid var(--border-subtle);">Element</th>
                      <th class="p-1 text-left" style="border-bottom: 1px solid var(--border-subtle);">Symbol</th>
                      <th class="p-1 text-left" style="border-bottom: 1px solid var(--border-subtle);">No.</th>
                      <th class="p-1 text-left" style="border-bottom: 1px solid var(--border-subtle);">Mass</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="p-1">Hydrogen</td><td class="p-1">H</td><td class="p-1">1</td><td class="p-1">1</td>
                    </tr>
                    <tr>
                      <td class="p-1">Helium</td><td class="p-1">He</td><td class="p-1">2</td><td class="p-1">4</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <p class="text-xs mt-2" style="color: var(--error);">Blind student ke liye completely inaccessible.</p>
            </div>
            <div class="rounded-xl p-4" style="background: var(--bg-elevated); border: 1px solid var(--success);">
              <div class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--success);">SAAVI Blind Mode</div>
              <p class="text-sm font-mono leading-relaxed" style="color: var(--text-body);">
                "Periodic table ka pehla element: Hydrogen.
                Symbol: H. Atomic number: 1. Mass: 1.<br><br>
                Doosra element: Helium.
                Symbol: He. Atomic number: 2. Mass: 4."
              </p>
            </div>
          </div>
        </div>

        <!-- Card 4: Scribe Dictation Cues -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
          <div class="flex items-start gap-4 mb-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg"
              style="background: var(--accent-glow); color: var(--accent); border: 2px solid var(--accent);">
              4
            </div>
            <div>
              <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">
                Scribe Dictation Cues
              </div>
              <p class="text-sm" style="color: var(--text-secondary);">
                Exam mein scribe use karte hain? SAAVI content mein explicit dictation cues built-in hain —
                exactly waise jaise ek scribe ko sunna chahiye.
              </p>
            </div>
          </div>

          <div class="rounded-xl p-4 mt-2" style="background: var(--bg-elevated); border: 1px solid var(--success);">
            <div class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--success);">SAAVI Scribe Output</div>
            <p class="text-sm font-mono leading-relaxed" style="color: var(--text-body);">
              "<span style="color: var(--accent);">[Scribe: capital P]</span> Photosynthesis
              <span style="color: var(--accent);">[Scribe: new line]</span> is the process
              <span style="color: var(--accent);">[Scribe: new paragraph]</span><br><br>
              Formula: 6CO2 <span style="color: var(--accent);">[Scribe: subscript 2]</span>
              plus 6H2O <span style="color: var(--accent);">[Scribe: right arrow]</span>
              glucose plus 6O2"
            </p>
            <p class="text-xs mt-3" style="color: var(--text-muted);">
              Amber brackets = scribe instructions. Student ko sirf content sunna hai — scribe poora handle karta hai.
            </p>
          </div>
        </div>

        <!-- Card 5: Voice-Only Quiz Mode -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
          <div class="flex items-start gap-4 mb-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg"
              style="background: var(--primary-glow); color: var(--primary-light); border: 2px solid var(--primary);">
              5
            </div>
            <div>
              <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">
                Voice-Only Quiz Mode
              </div>
              <p class="text-sm" style="color: var(--text-secondary);">
                SAAVI question bolti hai, options bolti hai — student bolke answer deta hai.
                Koi tap nahi, koi screen nahi. Purely conversational exam practice.
              </p>
            </div>
          </div>

          <!-- Conversation mock -->
          <div class="flex flex-col gap-3 mt-2">
            <div class="rounded-xl p-4 ml-0 mr-8" style="background: var(--primary-glow); border: 1px solid var(--primary);">
              <div class="text-xs font-bold mb-1" style="color: var(--primary-light);">SAAVI</div>
              <p class="text-sm" style="color: var(--text-body);">
                "Cell ka powerhouse kise kehte hain?
                Option A: Nucleus,
                Option B: Mitochondria,
                Option C: Ribosome,
                Option D: Cell Wall"
              </p>
            </div>
            <div class="rounded-xl p-4 ml-8 mr-0" style="background: var(--bg-elevated); border: 1px solid var(--border-subtle);">
              <div class="text-xs font-bold mb-1" style="color: var(--text-muted);">Student</div>
              <p class="text-sm" style="color: var(--text-body);">"B — Mitochondria"</p>
            </div>
            <div class="rounded-xl p-4 ml-0 mr-8" style="background: var(--primary-glow); border: 1px solid var(--success);">
              <div class="text-xs font-bold mb-1" style="color: var(--success);">SAAVI</div>
              <p class="text-sm" style="color: var(--text-body);">
                "Bilkul sahi! Mitochondria cell ka powerhouse hai kyunki yahan ATP banta hai —
                jo cell ki energy currency hai."
              </p>
            </div>
          </div>
        </div>

        <!-- Card 6: Screen Reader Compatible -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
          <div class="flex items-start gap-4 mb-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg"
              style="background: var(--accent-glow); color: var(--accent); border: 2px solid var(--accent);">
              6
            </div>
            <div>
              <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">
                Screen Reader Compatible
              </div>
              <p class="text-sm" style="color: var(--text-secondary);">
                Sirf "accessible" nahi — properly tested har major assistive technology ke saath.
                Blind students jo bhi device use karte hain, SAAVI wahan chalegi.
              </p>
            </div>
          </div>

          <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-2">
            <div class="rounded-xl p-4 text-center animate-on-scroll"
              style="background: var(--bg-elevated); border: 1px solid var(--success);">
              <div class="text-2xl mb-2">📱</div>
              <div class="font-heading font-bold text-sm mb-1" style="color: var(--text-primary);">TalkBack</div>
              <div class="text-xs" style="color: var(--text-muted);">Android</div>
              <div class="mt-2 font-bold text-sm" style="color: var(--success);">✅ Tested</div>
            </div>
            <div class="rounded-xl p-4 text-center animate-on-scroll"
              style="background: var(--bg-elevated); border: 1px solid var(--success);">
              <div class="text-2xl mb-2">🍎</div>
              <div class="font-heading font-bold text-sm mb-1" style="color: var(--text-primary);">VoiceOver</div>
              <div class="text-xs" style="color: var(--text-muted);">iOS</div>
              <div class="mt-2 font-bold text-sm" style="color: var(--success);">✅ Tested</div>
            </div>
            <div class="rounded-xl p-4 text-center animate-on-scroll"
              style="background: var(--bg-elevated); border: 1px solid var(--success);">
              <div class="text-2xl mb-2">🖥️</div>
              <div class="font-heading font-bold text-sm mb-1" style="color: var(--text-primary);">NVDA</div>
              <div class="text-xs" style="color: var(--text-muted);">Windows</div>
              <div class="mt-2 font-bold text-sm" style="color: var(--success);">✅ Tested</div>
            </div>
            <div class="rounded-xl p-4 text-center animate-on-scroll"
              style="background: var(--bg-elevated); border: 1px solid var(--success);">
              <div class="text-2xl mb-2">💻</div>
              <div class="font-heading font-bold text-sm mb-1" style="color: var(--text-primary);">JAWS</div>
              <div class="text-xs" style="color: var(--text-muted);">Windows</div>
              <div class="mt-2 font-bold text-sm" style="color: var(--success);">✅ Tested</div>
            </div>
          </div>
        </div>

        <!-- Card 7: Braille Literacy Subject -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
          <div class="flex items-start gap-4 mb-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-heading font-bold text-lg"
              style="background: var(--primary-glow); color: var(--primary-light); border: 2px solid var(--primary);">
              7
            </div>
            <div>
              <div class="font-heading font-bold text-xl mb-1" style="color: var(--text-primary);">
                Braille Literacy Subject
              </div>
              <p class="text-sm mb-3" style="color: var(--text-secondary);">
                India mein pehla digital platform jahaan blind student Braille padhna seekh sakta hai —
                audio se. Braille book ki zaroorat nahi. SAAVI tumhare saath step-by-step seekhti hai.
              </p>
            </div>
          </div>

          <div class="rounded-xl p-5 mt-2" style="background: var(--bg-elevated); border: 1px solid var(--border-subtle);">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-center text-sm">
              <div>
                <div class="text-2xl mb-2">🔤</div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Grade 1 Braille</div>
                <p style="color: var(--text-secondary);">Har letter ka audio description — tactile feel ke saath explain</p>
              </div>
              <div>
                <div class="text-2xl mb-2">📖</div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Grade 2 Braille</div>
                <p style="color: var(--text-secondary);">Contractions aur shortforms — speed reading ke liye</p>
              </div>
              <div>
                <div class="text-2xl mb-2">🔢</div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Nemeth Code</div>
                <p style="color: var(--text-secondary);">Maths Braille — equations aur numbers ke liye</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 3: COMMITMENT — FREE Forever
       ============================================================ -->
  <section class="section" aria-labelledby="commitment-heading">
    <div class="container">
      <div class="max-w-3xl mx-auto">

        <div class="text-center mb-10">
          <span class="badge badge-accent mb-4">Aarambha Ka Vachan</span>
          <h2 id="commitment-heading" class="text-4xl font-heading font-bold mb-4">
            Hamesha Free — Yeh Sirf Feature Nahi, Commitment Hai
          </h2>
        </div>

        <!-- Large amber blockquote -->
        <blockquote class="text-center p-8 rounded-2xl mb-8 animate-on-scroll"
          style="background: var(--accent-glow); border: 2px solid var(--accent);">
          <p class="text-2xl font-heading font-bold leading-relaxed mb-4" style="color: var(--accent);">
            "Shrutam ka Blind Mode — HAMESHA FREE. Koi subscription nahi.
            Koi expiry nahi. Kyunki education access — right hai, privilege nahi."
          </p>
          <cite class="text-sm not-italic" style="color: var(--text-secondary);">
            — Aarambha Team (Kishyam AI Pvt Ltd)
          </cite>
        </blockquote>

        <!-- Why we mean it -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
          <div class="card text-center animate-on-scroll">
            <div class="text-3xl mb-3">⚖️</div>
            <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Legal Commitment</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Terms of Service mein likhit hai — Blind Mode subscription ke peeche kabhi nahi jayega.
            </p>
          </div>
          <div class="card text-center animate-on-scroll">
            <div class="text-3xl mb-3">🤝</div>
            <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">No Tricks</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Koi "free tier with limits" nahi. Poora Blind Mode — poori features — hamesha free.
            </p>
          </div>
          <div class="card text-center animate-on-scroll">
            <div class="text-3xl mb-3">📧</div>
            <div class="font-heading font-bold mb-2" style="color: var(--text-primary);">Direct Contact</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Koi bhi issue ho — directly reach karo:
              <a href="mailto:accessibility@shrutam.ai" class="font-bold" style="color: var(--accent);">
                accessibility@shrutam.ai
              </a>
            </p>
          </div>
        </div>

        <!-- Stats row -->
        <div class="rounded-2xl p-6 animate-on-scroll"
          style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
            <div>
              <div class="stat-number" data-count="50" data-suffix=" Lakh+">50 Lakh+</div>
              <div class="text-xs mt-1" style="color: var(--text-muted);">Blind Students India Mein</div>
            </div>
            <div>
              <div class="stat-number">₹0</div>
              <div class="text-xs mt-1" style="color: var(--text-muted);">Blind Mode Ki Cost</div>
            </div>
            <div>
              <div class="stat-number">7</div>
              <div class="text-xs mt-1" style="color: var(--text-muted);">Dedicated Features</div>
            </div>
            <div>
              <div class="stat-number">4</div>
              <div class="text-xs mt-1" style="color: var(--text-muted);">Screen Readers Supported</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 4: CTA
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="cta-heading"
    style="background: linear-gradient(160deg, var(--bg-elevated) 0%, var(--bg-base) 100%);">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">

        <span class="badge badge-accent mb-6">Free Access</span>

        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          Blind Mode Early Access Join Karo
        </h2>

        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          India ka pehla AI tutor jo blind students ke liye bana hai — tumhara hai.
          Koi cost nahi. Koi registration fee nahi. Sirf join karo.
        </p>

        <div class="flex flex-wrap justify-center gap-4 mb-8">
          <a href="/waitlist/" class="btn btn-primary text-lg px-8 py-4">
            Blind Mode Early Access Join Karo → Free
          </a>
        </div>

        <div class="flex flex-wrap justify-center gap-6 text-sm" style="color: var(--text-secondary);">
          <div class="flex items-center gap-2">
            <span style="color: var(--success);">✓</span>
            <span>Zero cost — forever</span>
          </div>
          <div class="flex items-center gap-2">
            <span style="color: var(--success);">✓</span>
            <span>TalkBack & VoiceOver ready</span>
          </div>
          <div class="flex items-center gap-2">
            <span style="color: var(--success);">✓</span>
            <span>Hindi & 4 other languages</span>
          </div>
          <div class="flex items-center gap-2">
            <span style="color: var(--success);">✓</span>
            <span>No credit card needed</span>
          </div>
        </div>

        <p class="mt-8 text-sm" style="color: var(--text-muted);">
          Questions? Write to us:
          <a href="mailto:accessibility@shrutam.ai" style="color: var(--accent);">
            accessibility@shrutam.ai
          </a>
        </p>

      </div>
    </div>
  </section>

</main>

<?php include '../partials/footer.php'; ?>
