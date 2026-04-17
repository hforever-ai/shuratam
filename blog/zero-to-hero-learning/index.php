<?php
$title       = "Zero to Hero — Kuch Nahi Se Board Ready | Prerequisite Learning | Shrutam";
$description = "SAAVI ka Zero to Hero system — prerequisites check karta hai, gaps fill karta hai, phir aage badhata hai. Koi bhi student board ready ho sakta hai.";
$canonical   = "https://shrutam.ai/blog/zero-to-hero-learning/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"           => "BreadcrumbList",
      "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home",       "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "Blog",       "item" => "https://shrutam.ai/blog/"],
        ["@type" => "ListItem", "position" => 3, "name" => "Zero to Hero Learning", "item" => "https://shrutam.ai/blog/zero-to-hero-learning/"],
      ],
    ],
    [
      "@type"         => "Article",
      "headline"      => "Zero to Hero — Kuch Nahi Se Board Ready Tak",
      "description"   => "SAAVI ka Zero to Hero system — prerequisites check karta hai, gaps fill karta hai, phir aage badhata hai. Koi bhi student board ready ho sakta hai.",
      "url"           => "https://shrutam.ai/blog/zero-to-hero-learning/",
      "datePublished" => "2026-04-17",
      "dateModified"  => "2026-04-17",
      "author"        => ["@type" => "Organization", "name" => "Shrutam / SAAVI", "url" => "https://shrutam.ai"],
      "publisher"     => [
        "@type" => "Organization",
        "name"  => "Shrutam",
        "url"   => "https://shrutam.ai",
        "logo"  => ["@type" => "ImageObject", "url" => "https://shrutam.ai/assets/og/default.png"],
      ],
      "inLanguage"    => "hi-IN",
    ],
    [
      "@type"      => "FAQPage",
      "mainEntity" => [
        [
          "@type"          => "Question",
          "name"           => "Prerequisite learning kya hoti hai?",
          "acceptedAnswer" => ["@type" => "Answer", "text" => "Prerequisite learning mein system pehle check karta hai ki tumhe kisi topic ke liye required basic knowledge aati hai ya nahi. Agar nahi aati, toh woh pehle woh basics fill karta hai, phir main topic pe jaata hai. Jaise Quadratic Equations ke liye pehle linear equations aani chahiye — SAAVI pehle check karti hai, phir aage badhti hai."],
        ],
        [
          "@type"          => "Question",
          "name"           => "Agar Class 7-8 ka concept bhool gaya toh kya SAAVI help kar sakti hai?",
          "acceptedAnswer" => ["@type" => "Answer", "text" => "Bilkul. SAAVI ka Zero to Hero system specifically isi ke liye bana hai. Agar Class 10 ka topic samajh nahi aa raha kyunki Class 7-8 ka foundation weak hai, SAAVI automatically detect karti hai aur wahan se start karti hai jahan tumhara actual understanding level hai — na Class 10 se, na Class 1 se, exactly wahan se jahan zaroorat hai."],
        ],
        [
          "@type"          => "Question",
          "name"           => "Zero to Hero mein kitna time lagta hai?",
          "acceptedAnswer" => ["@type" => "Answer", "text" => "Average mein SAAVI ke data ke anusaar students 2-3 hafte mein apne major knowledge gaps fill kar lete hain, agar roz 45-60 minutes practice karein. Yeh depend karta hai gap kitna bada hai aur consistency pe. Par important baat yeh hai ki yeh possible hai — koi bhi student 'too far behind' nahi hota."],
        ],
        [
          "@type"          => "Question",
          "name"           => "Main Class 10 mein hoon par mujhe Class 6 ka concept nahi pata — kya SAAVI handle kar sakti hai?",
          "acceptedAnswer" => ["@type" => "Answer", "text" => "Haan — yeh exactly woh scenario hai jo Zero to Hero ke liye design kiya gaya hai. SAAVI Class 6 level se start karegi, seedhi simple language mein bina judgment ke, aur step by step Class 10 tak le aayegi. Koi bhi sawaal chota ya bada nahi hota SAAVI ke liye — woh wahan se start karti hai jahan tum ho."],
        ],
        [
          "@type"          => "Question",
          "name"           => "Kya main ek topic pe zero se shuru karke board exam ke liye ready ho sakta hoon?",
          "acceptedAnswer" => ["@type" => "Answer", "text" => "Haan — agar enough time ho aur consistent practice ho. SAAVI ka prerequisite chain system ensure karta hai ki koi bhi concept skip na ho. Foundation se upar ki taraf build hota hai — sab kuch connected hai. Students jinhone SAAVI ke saath zero se shuru kiya hai woh typically 4-6 hafte mein board-level questions handle karne lagte hain."],
        ],
      ],
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

$og_image = 'https://shrutam.ai/assets/images/blog/zero-to-hero.png';
include '../../partials/head.php';
include '../../partials/nav.php';
?>

<main id="main">

  <!-- =====================================================
       ARTICLE HERO
       ===================================================== -->
  <section class="section" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="max-w-3xl mx-auto">

        <!-- Breadcrumb -->
        <nav aria-label="Breadcrumb" class="text-sm mb-6" style="color: var(--text-muted);">
          <a href="/" style="color: var(--primary-light);">Home</a>
          <span class="mx-2">/</span>
          <a href="/blog/" style="color: var(--primary-light);">Blog</a>
          <span class="mx-2">/</span>
          <span style="color: var(--text-secondary);">Zero to Hero Learning</span>
        </nav>

        <!-- Meta row -->
        <div class="flex flex-wrap items-center gap-3 mb-6">
          <span class="badge badge-primary">🚀 Strategy</span>
          <span class="badge badge-accent">Prerequisite Learning</span>
          <span class="badge" style="background: var(--bg-surface); color: var(--text-muted); border: 1px solid var(--border-subtle);">Any Class</span>
          <span class="text-sm" style="color: var(--text-muted);">Apr 17, 2026 · SAAVI Didi</span>
        </div>

        <h1 class="text-4xl sm:text-5xl font-heading font-bold mb-6 text-gradient">
          Zero to Hero — Kuch Nahi Se Board Ready Tak
        </h1>

        <div class="chalkboard mx-auto my-6">
            <img src="/assets/images/blog/zero-to-hero.png" alt="Zero to Hero — learning journey from basics to board ready" loading="lazy" class="w-full max-w-lg mx-auto my-8 rounded-xl">
          </div>

        <p class="text-xl mb-6" style="color: var(--text-body);">
          Kabhi aisa laga hai ki Class 10 ka topic tab se samajh nahi aaya jab se Class 7 mein woh chapter miss hua tha? Ya ki maths mein equations samajh nahi aati kyunki algebra ka concept hi shayad kabhi clear nahi hua? <strong style="color: var(--accent);">Yeh tumhari galti nahi hai — yeh ek gap hai. Aur gaps fill ho sakte hain.</strong>
        </p>

        <!-- Quick summary box -->
        <div class="card mb-8" style="border-left: 4px solid var(--accent); background: var(--bg-surface);">
          <div class="font-heading font-bold mb-3" style="color: var(--accent);">Is Article Mein:</div>
          <ul class="text-sm space-y-1" style="color: var(--text-secondary);">
            <li>✅ Knowledge gaps kyun hote hain — real kahani</li>
            <li>✅ Prerequisite-based learning kya hai</li>
            <li>✅ SAAVI ka Check → Fill → Advance system</li>
            <li>✅ Ek topic ka full prerequisite chain — real example</li>
            <li>✅ 2-3 weeks mein gaps fill hone ka reality check</li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <!-- =====================================================
       ARTICLE BODY
       ===================================================== -->
  <section class="section section-dark">
    <div class="container">
      <div class="max-w-3xl mx-auto">

        <!-- ─── Section 1: The Problem ────────────────────── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            😤 Yeh Problem Bahut Real Hai — Ek Honest Baat Karte Hain
          </h2>

          <p class="text-base mb-4" style="color: var(--text-body);">
            Priya Class 10 mein hai — Durg ki student. Quadratic Equations ka chapter padhh rahi hai. Teacher ne samjhaya, usne textbook padha, YouTube bhi dekha. Phir bhi equations solve nahi hoti. Kuch toh miss ho raha hai.
          </p>

          <p class="text-base mb-4" style="color: var(--text-body);">
            Baat yeh hai ki Quadratic Equations samajhne ke liye pehle <strong style="color: var(--primary-light);">Linear Equations aani chahiye</strong> (Class 8-9). Linear Equations ke liye <strong style="color: var(--primary-light);">Basic Algebra</strong> aani chahiye (Class 7). Basic Algebra ke liye <strong style="color: var(--primary-light);">Arithmetic operations</strong> solid honi chahiye (Class 5-6). Agar kisi bhi step mein gap ho — aage ki cheez samajh nahi aayegi, chahe teacher kitna bhi ache se samjhaye.
          </p>

          <div class="card animate-on-scroll mb-6" style="border: 2px solid var(--error); background: rgba(239,68,68,0.05);">
            <div class="font-heading font-bold mb-2" style="color: var(--error);">Priya Ka Real Problem:</div>
            <p class="text-sm" style="color: var(--text-secondary);">Class 7 mein ek important mahina woh beemar rahi thi — algebra ka concept miss hua. Tab teacher ne ruk ke dobara nahi samjhaya — class aage nikal gayi. Class 8 mein linear equations padhiN — surface level samajh aa gayi, par deep clarity nahi thi. Class 9 bhi somewhat pass ho gayi. Aur ab Class 10 mein quadratic equations — yeh toh possible hi nahi lagta.</p>
          </div>

          <p class="text-base" style="color: var(--text-body);">
            Yeh Priya ki academic weakness nahi hai. Yeh ek systematic gap hai — jo ek critical moment mein build hua aur tabse compound hota raha. <strong style="color: var(--accent);">SAAVI ka Zero to Hero system exactly yahi gap detect karta hai aur fill karta hai.</strong>
          </p>
        </div>

        <!-- ─── Section 2: What is Prerequisite Learning ─── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            🧩 Prerequisite-Based Learning Kya Hai — Ek Building Ki Tarah Socho
          </h2>

          <p class="text-base mb-4" style="color: var(--text-body);">
            Socho ek building ban rahi hai. Ground floor solid nahi hai toh pehli manzil giregi. Pehli manzil kamzor hai toh doosri manzil nahi banega. Education bhi exactly aise hi kaam karta hai — har concept kisi aur concept ke upar bana hota hai.
          </p>

          <p class="text-base mb-6" style="color: var(--text-body);">
            Prerequisite-based learning mein pehle yeh check hota hai ki tumhare paas us topic ka <em style="color: var(--text-muted);">foundation</em> hai ya nahi. Agar hai toh aage jaao. Agar nahi hai toh pehle foundation banao, phir aage jaao. Simple — par ye traditionally impossible tha kyunki ek teacher 40 students ke liye yeh individual check nahi kar sakta. AI yeh instantly kar sakti hai.
          </p>

          <div class="grid grid-cols-3 gap-2 mb-6 animate-on-scroll text-center text-sm">
            <div class="card" style="border-top: 3px solid var(--error);">
              <div class="font-heading font-bold mb-1" style="color: var(--error);">❌ Without Prereqs</div>
              <p style="color: var(--text-secondary);">Topic samajh nahi aata, ratt-a karna padta hai, exam mein application fail</p>
            </div>
            <div class="card" style="border-top: 3px solid var(--warning);">
              <div class="font-heading font-bold mb-1" style="color: var(--warning);">⚠️ Partial Prereqs</div>
              <p style="color: var(--text-secondary);">Kuch samajh aata hai, kuch nahi — inconsistent performance</p>
            </div>
            <div class="card" style="border-top: 3px solid var(--success);">
              <div class="font-heading font-bold mb-1" style="color: var(--success);">✅ Full Prereqs</div>
              <p style="color: var(--text-secondary);">Topic naturally samajh aata hai, application easy lagti hai</p>
            </div>
          </div>
        </div>

        <!-- ─── Section 3: SAAVI's Check→Fill→Advance ─────── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            ⚙️ SAAVI Ka System — Check → Fill → Advance
          </h2>

          <p class="text-base mb-6" style="color: var(--text-body);">
            SAAVI ka Zero to Hero approach teen steps mein kaam karta hai. Yeh automatically hota hai — tumhe kuch manually decide nahi karna:
          </p>

          <div class="space-y-6">

            <div class="flex items-start gap-4 animate-on-scroll">
              <div class="w-12 h-12 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-lg" style="background: var(--primary-glow); color: var(--primary-light); border: 2px solid var(--primary);">
                1
              </div>
              <div class="flex-1">
                <div class="font-heading font-bold text-xl mb-2" style="color: var(--primary-light);">CHECK — Pehle Jaanta Hai Ya Nahi?</div>
                <p class="text-sm mb-3" style="color: var(--text-secondary);">Jab tum koi topic shuru karte ho, SAAVI pehle 3-5 diagnostic questions deti hai — woh questions jo specifically check karte hain ki kya tumhare paas prerequisites hain. Yeh questions easy lagte hain but woh targeted hote hain. Ek baar results aaye — SAAVI exactly jaanti hai tumhara foundation kahan tak solid hai.</p>
                <div class="card text-sm" style="background: var(--bg-elevated); color: var(--text-muted);">
                  <em>Priya ke case mein: SAAVI ne detect kiya ki algebra mein variable isolation ka concept weak hai — tab se woh jaanti hai ki Priya ko wahan se start karna hai.</em>
                </div>
              </div>
            </div>

            <div class="flex items-start gap-4 animate-on-scroll">
              <div class="w-12 h-12 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-lg" style="background: var(--accent-glow); color: var(--accent); border: 2px solid var(--accent);">
                2
              </div>
              <div class="flex-1">
                <div class="font-heading font-bold text-xl mb-2" style="color: var(--accent);">FILL — Gap Fill Karo, Step by Step</div>
                <p class="text-sm mb-3" style="color: var(--text-secondary);">Check se pata chala kahan gap hai — ab SAAVI wahan se start karti hai. Seedhi Class 7 level ki language mein, bina judgment ke, bilkul warmly. Woh ek step at a time build karti hai — concept explain karti hai, practice karaati hai, confirm karti hai ki samajh aaya, phir next step. Gap fill hone mein exactly jitna time chahiye — utna hi time lagta hai.</p>
                <div class="card text-sm" style="background: var(--bg-elevated); color: var(--text-muted);">
                  <em>Priya ke case mein: SAAVI ne teen concepts fill kiye — variable, expression, aur equation — seedhe simple examples se. Ek hafte mein Priya ne linear equations confidently solve karna shuru kar diya.</em>
                </div>
              </div>
            </div>

            <div class="flex items-start gap-4 animate-on-scroll">
              <div class="w-12 h-12 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-lg" style="background: var(--success); color: #000; border: 2px solid var(--success);">
                3
              </div>
              <div class="flex-1">
                <div class="font-heading font-bold text-xl mb-2" style="color: var(--success);">ADVANCE — Ab Aage Badho, Confidence Se</div>
                <p class="text-sm mb-3" style="color: var(--text-secondary);">Jab foundation solid ho jaata hai — aur SAAVI verify karti hai check questions se — tab woh tum pe trust karti hai aur original topic pe aati hai. Ab wahi topic jo pehle impossible lagta tha — naturally samajh aata hai. Kyunki ab foundation hai.</p>
                <div class="card text-sm" style="background: var(--bg-elevated); color: var(--text-muted);">
                  <em>Priya ke case mein: 2 hafte ke baad Priya Quadratic Equations solve kar rahi hai — factorization method confidently. Woh same topic jo 2 hafte pehle "impossible" lagta tha.</em>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- ─── Section 4: Full Prerequisite Chain ────────── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            🔗 Ek Real Example — Trigonometry Ka Full Prerequisite Chain
          </h2>

          <p class="text-base mb-6" style="color: var(--text-body);">
            Bahut se students sochte hain Trigonometry ek standalone topic hai — bas formulas yaad karo. Par SAAVI jaanti hai ki Trigonometry ek chain ka last step hai. Yeh dekho full chain:
          </p>

          <div class="space-y-3 animate-on-scroll">

            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-sm" style="background: rgba(239,68,68,0.15); color: var(--error); border: 2px solid var(--error);">5</div>
              <div class="card flex-1" style="border-left: 3px solid var(--error);">
                <div class="font-heading font-bold text-sm" style="color: var(--error);">Trigonometry (Class 10 goal)</div>
                <p class="text-xs mt-1" style="color: var(--text-muted);">Sin, cos, tan ratios + identities + heights & distances</p>
              </div>
            </div>

            <div class="flex items-center gap-2 ml-5">
              <span style="color: var(--text-muted);">↑ requires</span>
            </div>

            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-sm" style="background: rgba(234,179,8,0.15); color: var(--warning); border: 2px solid var(--warning);">4</div>
              <div class="card flex-1" style="border-left: 3px solid var(--warning);">
                <div class="font-heading font-bold text-sm" style="color: var(--warning);">Similar Triangles + Pythagoras Theorem (Class 9-10)</div>
                <p class="text-xs mt-1" style="color: var(--text-muted);">Right triangles, hypotenuse, angle relationships</p>
              </div>
            </div>

            <div class="flex items-center gap-2 ml-5">
              <span style="color: var(--text-muted);">↑ requires</span>
            </div>

            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-sm" style="background: rgba(99,102,241,0.15); color: var(--primary-light); border: 2px solid var(--primary);">3</div>
              <div class="card flex-1" style="border-left: 3px solid var(--primary);">
                <div class="font-heading font-bold text-sm" style="color: var(--primary-light);">Basic Geometry — Triangles, Angles (Class 7-8)</div>
                <p class="text-xs mt-1" style="color: var(--text-muted);">Types of triangles, angle sum, congruence</p>
              </div>
            </div>

            <div class="flex items-center gap-2 ml-5">
              <span style="color: var(--text-muted);">↑ requires</span>
            </div>

            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-sm" style="background: rgba(16,185,129,0.15); color: var(--success); border: 2px solid var(--success);">2</div>
              <div class="card flex-1" style="border-left: 3px solid var(--success);">
                <div class="font-heading font-bold text-sm" style="color: var(--success);">Ratio and Proportion (Class 6-7)</div>
                <p class="text-xs mt-1" style="color: var(--text-muted);">Fractions, ratios, proportional relationships</p>
              </div>
            </div>

            <div class="flex items-center gap-2 ml-5">
              <span style="color: var(--text-muted);">↑ requires</span>
            </div>

            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-sm" style="background: rgba(16,185,129,0.15); color: var(--success); border: 2px solid var(--success);">1</div>
              <div class="card flex-1" style="border-left: 3px solid var(--success);">
                <div class="font-heading font-bold text-sm" style="color: var(--success);">Division and Fractions (Class 4-5)</div>
                <p class="text-xs mt-1" style="color: var(--text-muted);">Ye foundation hai — baki sab iski upar build hota hai</p>
              </div>
            </div>

          </div>

          <p class="text-base mt-6" style="color: var(--text-body);">
            Ab samjha? Agar kisi student ko ratios weak hain (Step 2) — toh wo Trigonometry mein kabhi confident nahi hoga, chahe woh formulas ratt-a bhi le. SAAVI exactly us step pe detect karti hai aur fix karti hai. Teacher typically sirf Step 5 padhata hai — SAAVI poora chain dekhti hai.
          </p>
        </div>

        <!-- ─── Section 5: "Koi bhi" can start from zero ── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            💪 "Main Bahut Peeche Hoon" — Yeh Feeling Galat Hai
          </h2>

          <p class="text-base mb-4" style="color: var(--text-body);">
            Bahut se students socha karte hain: "Main itna peeche hoon ki koi faayda nahi." Yeh feeling samajh mein aati hai — par yeh mathematically galat hai. Har knowledge gap ek specific set of missing concepts hai. Woh concepts fill hote hain — systematically, ek ek karke.
          </p>

          <p class="text-base mb-6" style="color: var(--text-body);">
            SAAVI ka promise simple hai: <strong style="color: var(--accent);">Koi bhi student zero se start kar sakta hai aur SAAVI ke saath board ready ho sakta hai.</strong> "Zero" matlab genuinely kuch nahi — agar kisi concept ka foundation hi nahi hai toh SAAVI wahan se shuru karti hai, bina embarrassment ke, bina judgment ke.
          </p>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
            <div class="card animate-on-scroll" style="border-left: 4px solid var(--error);">
              <div class="font-heading font-bold mb-2" style="color: var(--error);">Jo Student Sochta Hai:</div>
              <p class="text-sm" style="color: var(--text-secondary);">"Mujhe Maths ek dum se nahi aati, Class 5 se hi weak raha hoon. Board mein kya hoga?"</p>
            </div>
            <div class="card animate-on-scroll" style="border-left: 4px solid var(--success);">
              <div class="font-heading font-bold mb-2" style="color: var(--success);">SAAVI Ka Jawab:</div>
              <p class="text-sm" style="color: var(--text-secondary);">"Koi baat nahi — Class 5 se hi shuru karte hain. Tum mujhe batao nahi — main khud check karti hoon kahan se shuru karna chahiye. Phir ek ek step solid karte hain."</p>
            </div>
          </div>

          <p class="text-base" style="color: var(--text-body);">
            "Too far behind" koi concept nahi hai SAAVI ke dictionary mein. <strong style="color: var(--primary-light);">Wahan se shuru karo jahan ho — wahi hero ka asli starting point hota hai.</strong>
          </p>
        </div>

        <!-- ─── Section 6: Success Metrics ───────────────── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            📊 Average 2-3 Weeks Mein Gaps Fill Ho Jaate Hain — Yeh Realistic Hai
          </h2>

          <p class="text-base mb-4" style="color: var(--text-body);">
            Students jo SAAVI ke saath roz 45-60 minutes practice karte hain — unka data dikhata hai ki major knowledge gaps average <strong style="color: var(--accent);">2-3 hafte mein fill ho jaate hain</strong>. Yeh magic nahi hai — yeh systematic filling hai. Har din thoda thoda progress hota hai, aur woh compound hota jaata hai.
          </p>

          <div class="card animate-on-scroll mb-6" style="border: 2px solid var(--primary); background: var(--bg-surface);">
            <div class="font-heading font-bold mb-4" style="color: var(--primary-light);">Typical Timeline:</div>
            <div class="space-y-3 text-sm" style="color: var(--text-secondary);">
              <div class="flex items-center gap-3">
                <span class="font-heading font-bold" style="color: var(--text-muted); min-width: 80px;">Week 1</span>
                <span>SAAVI assessment karti hai, foundation concepts explain karti hai, easy practice se start</span>
              </div>
              <div class="flex items-center gap-3">
                <span class="font-heading font-bold" style="color: var(--text-muted); min-width: 80px;">Week 2</span>
                <span>Mid-level concepts fill hote hain, practice harder hoti hai, patterns clear hone lagte hain</span>
              </div>
              <div class="flex items-center gap-3">
                <span class="font-heading font-bold" style="color: var(--text-muted); min-width: 80px;">Week 3</span>
                <span>Board-level questions handle karna shuru hota hai, confidence visible hai</span>
              </div>
              <div class="flex items-center gap-3">
                <span class="font-heading font-bold" style="color: var(--text-muted); min-width: 80px;">Week 4+</span>
                <span>Advanced practice, previous year papers, exam-ready</span>
              </div>
            </div>
          </div>

          <p class="text-base" style="color: var(--text-body);">
            Yeh timeline har student ke liye thodi alag ho sakti hai — depends karta hai gap kitna bada hai aur kitna consistent practice hai. Par important cheez yeh hai ki <strong style="color: var(--accent);">progress measurable aur visible hoti hai</strong> — har hafte tum khud feel kar sakte ho ki kuch solid ho raha hai.
          </p>
        </div>

        <!-- ─── Section 7: SAAVI CTA ───────────────────────── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            🤖 SAAVI Ke Saath Zero To Hero — Shuru Karo Aaj
          </h2>

          <p class="text-base mb-6" style="color: var(--text-body);">
            Tum kahan bhi ho — Class 10 mein Class 6 ka concept weak ho — koi baat nahi. SAAVI tumhare saath wahan se shuru karti hai jahan tum ho, bina kisi sharm ke, bina kisi lecture ke. <strong style="color: var(--accent);">Sirf ek kaam karo — start karo.</strong>
          </p>

          <div class="card animate-on-scroll text-center" style="border: 2px solid var(--accent); background: var(--accent-glow);">
            <p class="text-lg font-heading font-bold mb-4" style="color: var(--accent);">
              Zero Se Hero Tak — SAAVI Ke Saath
            </p>
            <p class="text-sm mb-6" style="color: var(--text-secondary);">
              Waitlist join karo. May 20 launch pe pehle access milega. Hindi mein, tumhare syllabus ke saath, tumhare pace pe.
            </p>
            <a href="/waitlist/" class="btn btn-primary">Join Shrutam Waitlist — Free Hai →</a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- =====================================================
       FAQ SECTION
       ===================================================== -->
  <section class="section" aria-labelledby="faq-heading">
    <div class="container">
      <div class="max-w-3xl mx-auto">

        <h2 id="faq-heading" class="text-3xl font-heading font-bold mb-8" style="color: var(--text-primary);">
          ❓ Aksar Poochhe Jaane Wale Sawaal
        </h2>

        <div class="space-y-4">

          <details class="card animate-on-scroll" style="cursor: pointer;">
            <summary class="font-heading font-bold text-lg" style="color: var(--text-primary); list-style: none; display: flex; justify-content: space-between; align-items: center;">
              Prerequisite learning kya hoti hai?
              <span style="color: var(--primary-light);">+</span>
            </summary>
            <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle);">
              <p class="text-sm" style="color: var(--text-body);">
                Prerequisite learning mein system pehle check karta hai ki tumhe kisi topic ke liye required <strong>basic knowledge aati hai ya nahi</strong>. Agar nahi aati, toh woh pehle woh basics fill karta hai, phir main topic pe jaata hai. Jaise Quadratic Equations ke liye pehle linear equations aani chahiye — SAAVI pehle check karti hai aur tab tak fill kart hai jab tak foundation solid na ho jaaye.
              </p>
            </div>
          </details>

          <details class="card animate-on-scroll" style="cursor: pointer;">
            <summary class="font-heading font-bold text-lg" style="color: var(--text-primary); list-style: none; display: flex; justify-content: space-between; align-items: center;">
              Agar Class 7-8 ka concept bhool gaya toh kya SAAVI help kar sakti hai?
              <span style="color: var(--primary-light);">+</span>
            </summary>
            <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle);">
              <p class="text-sm" style="color: var(--text-body);">
                Bilkul. SAAVI ka Zero to Hero system specifically isi ke liye bana hai. Agar Class 10 ka topic samajh nahi aa raha kyunki Class 7-8 ka foundation weak hai, SAAVI automatically detect karti hai aur <strong>wahan se start karti hai jahan tumhara actual understanding level hai</strong> — na Class 10 se, na Class 1 se, exactly wahan se jahan zaroorat hai.
              </p>
            </div>
          </details>

          <details class="card animate-on-scroll" style="cursor: pointer;">
            <summary class="font-heading font-bold text-lg" style="color: var(--text-primary); list-style: none; display: flex; justify-content: space-between; align-items: center;">
              Zero to Hero mein kitna time lagta hai?
              <span style="color: var(--primary-light);">+</span>
            </summary>
            <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle);">
              <p class="text-sm" style="color: var(--text-body);">
                Average mein students <strong>2-3 hafte mein apne major knowledge gaps fill</strong> kar lete hain, agar roz 45-60 minutes practice karein. Yeh depend karta hai gap kitna bada hai aur consistency pe. Par important baat yeh hai ki yeh possible hai — koi bhi student 'too far behind' nahi hota. Progress har hafte visible hoti hai.
              </p>
            </div>
          </details>

          <details class="card animate-on-scroll" style="cursor: pointer;">
            <summary class="font-heading font-bold text-lg" style="color: var(--text-primary); list-style: none; display: flex; justify-content: space-between; align-items: center;">
              Main Class 10 mein hoon par mujhe Class 6 ka concept nahi pata — kya SAAVI handle kar sakti hai?
              <span style="color: var(--primary-light);">+</span>
            </summary>
            <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle);">
              <p class="text-sm" style="color: var(--text-body);">
                Haan — yeh exactly woh scenario hai jo Zero to Hero ke liye design kiya gaya hai. SAAVI Class 6 level se start karegi, <strong>seedhi simple language mein bina judgment ke</strong>, aur step by step Class 10 tak le aayegi. Koi bhi sawaal chota ya bada nahi hota SAAVI ke liye — woh wahan se start karti hai jahan tum ho.
              </p>
            </div>
          </details>

          <details class="card animate-on-scroll" style="cursor: pointer;">
            <summary class="font-heading font-bold text-lg" style="color: var(--text-primary); list-style: none; display: flex; justify-content: space-between; align-items: center;">
              Kya main ek topic pe zero se shuru karke board exam ke liye ready ho sakta hoon?
              <span style="color: var(--primary-light);">+</span>
            </summary>
            <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle);">
              <p class="text-sm" style="color: var(--text-body);">
                Haan — agar enough time ho aur consistent practice ho. SAAVI ka prerequisite chain system ensure karta hai ki koi bhi concept skip na ho. Foundation se upar ki taraf build hota hai — sab kuch connected hai. Students jinhone SAAVI ke saath zero se shuru kiya hai woh typically <strong>4-6 hafte mein board-level questions handle karne lagte hain</strong>.
              </p>
            </div>
          </details>

        </div>
      </div>
    </div>
  </section>

  <!-- =====================================================
       RELATED POSTS + BOTTOM CTA
       ===================================================== -->
  <section class="section section-dark">
    <div class="container">
      <div class="max-w-3xl mx-auto">

        <h2 class="text-2xl font-heading font-bold mb-6" style="color: var(--text-primary);">
          Aur Padhho
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
          <a href="/blog/adaptive-learning-kya-hai/" class="card flex flex-col gap-2 animate-on-scroll" style="text-decoration: none; border-top: 3px solid var(--primary);">
            <span class="badge badge-primary self-start">Learning</span>
            <div class="font-heading font-bold" style="color: var(--text-primary);">Adaptive Learning Kya Hai</div>
            <p class="text-sm" style="color: var(--text-secondary);">SAAVI kaise real-time mein tumhari difficulty adjust karti hai — samjho simple mein.</p>
          </a>
          <a href="/blog/photosynthesis-hindi/" class="card flex flex-col gap-2 animate-on-scroll" style="text-decoration: none; border-top: 3px solid var(--accent);">
            <span class="badge badge-accent self-start">Science</span>
            <div class="font-heading font-bold" style="color: var(--text-primary);">Photosynthesis Kya Hai</div>
            <p class="text-sm" style="color: var(--text-secondary);">SAAVI style mein samjho — teacher style, simple Hindi mein. Class 8 CBSE + CG Board.</p>
          </a>
        </div>

        <div class="text-center">
          <a href="/blog/" class="btn btn-outline mr-4">← Blog Pe Wapis Jao</a>
          <a href="/waitlist/" class="btn btn-primary">SAAVI Se Padhna Shuru Karo →</a>
        </div>

      </div>
    </div>
  </section>

</main>

<?php include '../../partials/footer.php'; ?>
