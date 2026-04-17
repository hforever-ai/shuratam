<?php
$title       = "Photosynthesis Kya Hai — Simple Hindi Mein Samjho | Class 8 Science | Shrutam";
$description = "Photosynthesis ko SAAVI ke style mein samjho — textbook nahi, teacher style. Ped ka kitchen, sunlight se khana. Class 8 CBSE + CG Board.";
$canonical   = "https://shrutam.ai/blog/photosynthesis-hindi/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"           => "BreadcrumbList",
      "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home",       "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "Blog",       "item" => "https://shrutam.ai/blog/"],
        ["@type" => "ListItem", "position" => 3, "name" => "Photosynthesis Kya Hai", "item" => "https://shrutam.ai/blog/photosynthesis-hindi/"],
      ],
    ],
    [
      "@type"         => "Article",
      "headline"      => "Photosynthesis Kya Hai — Simple Hindi Mein Samjho",
      "description"   => "Photosynthesis ko SAAVI ke style mein samjho — textbook nahi, teacher style. Ped ka kitchen, sunlight se khana.",
      "url"           => "https://shrutam.ai/blog/photosynthesis-hindi/",
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
      "@type"            => "FAQPage",
      "mainEntity"       => [
        [
          "@type"          => "Question",
          "name"           => "Photosynthesis kya hai simple Hindi mein?",
          "acceptedAnswer" => ["@type" => "Answer", "text" => "Photosynthesis woh process hai jisme paudhe (ped, patte) sunlight, paani (H₂O) aur carbon dioxide (CO₂) ka use karke apna khana (glucose) banate hain aur oxygen (O₂) release karte hain. Simple bhaasha mein: ped ka apna kitchen jahan wo khud apna khana banaata hai."],
        ],
        [
          "@type"          => "Question",
          "name"           => "Photosynthesis ka formula kya hai?",
          "acceptedAnswer" => ["@type" => "Answer", "text" => "6CO₂ + 6H₂O + Sunlight → C₆H₁₂O₆ + 6O₂. Yaani 6 carbon dioxide + 6 paani + sunlight = 1 glucose molecule + 6 oxygen molecules."],
        ],
        [
          "@type"          => "Question",
          "name"           => "Chlorophyll kya karta hai?",
          "acceptedAnswer" => ["@type" => "Answer", "text" => "Chlorophyll patte ka woh green pigment hai jo sunlight absorb karta hai. Yeh photosynthesis ka 'chef' hai — bina chlorophyll ke photosynthesis nahi hogi. Isi ki wajah se patte green dikhte hain."],
        ],
        [
          "@type"          => "Question",
          "name"           => "Kya photosynthesis raat ko hota hai?",
          "acceptedAnswer" => ["@type" => "Answer", "text" => "Nahi. Photosynthesis ke liye sunlight zaroori hai, isliye yeh sirf din mein hota hai. Raat ko paudhe sirf respiration karte hain jisme wo CO₂ release karte hain. Isliye raat ko pedo ke paas nahi sona chahiye — common misconception hai."],
        ],
        [
          "@type"          => "Question",
          "name"           => "Board exam mein photosynthesis se kitne marks aate hain?",
          "acceptedAnswer" => ["@type" => "Answer", "text" => "CBSE aur CG Board dono mein photosynthesis usually 2 se 5 marks ka aata hai. Definition (2 marks), equation (1 mark), chlorophyll ka role (3 marks), aur photosynthesis vs respiration comparison (5 marks table format) common questions hain."],
        ],
      ],
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

$og_image = 'https://shrutam.ai/assets/images/blog/photosynthesis.png';
include '../../partials/head.php';
include '../../partials/nav.php';
?>

<main id="main">

  <!-- =====================================================
       ARTICLE HERO
       ===================================================== -->
  <section class="section" style="padding-top: 1.5rem; background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      

        <!-- Breadcrumb -->
        <nav aria-label="Breadcrumb" class="text-sm mb-2" style="color: var(--text-muted);">
          <a href="/" style="color: var(--primary-light);">Home</a>
          <span class="mx-2">/</span>
          <a href="/blog/" style="color: var(--primary-light);">Blog</a>
          <span class="mx-2">/</span>
          <span style="color: var(--text-secondary);">Photosynthesis Hindi</span>
        </nav>

        <!-- Meta row -->
        <div class="flex flex-wrap items-center gap-3 mb-3">
          <span class="badge badge-primary">🔬 Science</span>
          <span class="badge badge-accent">Class 8</span>
          <span class="badge" style="background: var(--bg-surface); color: var(--text-muted); border: 1px solid var(--border-subtle);">CBSE + CG Board</span>
          <span class="text-sm" style="color: var(--text-muted);">Apr 17, 2026 · SAAVI Didi</span>
        </div>

        <h1 class="text-4xl sm:text-5xl font-heading font-bold mb-3 text-gradient">
          Photosynthesis — Ped Ka Apna Kitchen
        </h1>

        <div class="chalkboard mx-auto my-3">
            <img src="/assets/images/blog/photosynthesis.png" alt="Photosynthesis — ped ka kitchen, sunlight se khana banata hai" loading="lazy" class="w-full max-w-xs md:max-w-sm lg:max-w-md mx-auto my-4 rounded-xl">
          </div>

        <p class="text-xl mb-6" style="color: var(--text-body);">
          Socho ek sawaal: <strong style="color: var(--accent);">Ped ko khaana kaun deta hai?</strong> Hum log market se khaana lete hain. Ped? Woh khud banata hai! Yeh magic process hai — photosynthesis.
        </p>

        <!-- Quick summary box -->
        <div class="card mb-8" style="border-left: 4px solid var(--accent); background: var(--bg-surface);">
          <div class="font-heading font-bold mb-3" style="color: var(--accent);">Is Article Mein Seekhoge:</div>
          <ul class="text-sm space-y-1" style="color: var(--text-secondary);">
            <li>✅ Photosynthesis kya hai — simple analogy ke saath</li>
            <li>✅ Step-by-step process kaise hoti hai</li>
            <li>✅ Formula yaad karne ka trick (mnemonic)</li>
            <li>✅ Kyun zaroori hai photosynthesis</li>
            <li>✅ Board exam mein kya kya poochha jaata hai</li>
            <li>✅ Common mistakes jo students karte hain</li>
          </ul>
        </div>

      </div>
  </section>

  <!-- =====================================================
       ARTICLE BODY
       ===================================================== -->
  <section class="section section-dark">
    <div class="container">
      

        <!-- ─── Section 1: Kitchen Analogy ───────────────── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            🍳 Ped Ka Kitchen Kaise Kaam Karta Hai?
          </h2>

          <p class="text-base mb-4" style="color: var(--text-body);">
            Imagine karo: Ped ke patte ek kitchen hain. Green colour jo dikhta hai — woh <strong style="color: var(--primary-light);">chlorophyll</strong> hai, jo ek chef ki tarah kaam karta hai. Yeh chef sunlight ki energy use karta hai, CO₂ (carbon dioxide) aur paani ko mix karta hai, aur glucose (sugar) bana deta hai. Glucose ped ka khaana hai. Aur bonus? O₂ (oxygen) release hota hai — jo hum breathe karte hain!
          </p>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
            <div class="card animate-on-scroll" style="border-left: 4px solid var(--warning);">
              <div class="font-heading font-bold mb-2" style="color: var(--warning);">Input (jo andar jaata hai)</div>
              <ul class="text-sm space-y-2" style="color: var(--text-secondary);">
                <li>☀️ <strong>Sunlight</strong> = gas stove (energy source)</li>
                <li>💧 <strong>H₂O (Paani)</strong> = roots se aata hai</li>
                <li>🌬️ <strong>CO₂ (Carbon dioxide)</strong> = stomata se andar</li>
                <li>🟢 <strong>Chloroplast</strong> = chef (jahan cooking hoti hai)</li>
              </ul>
            </div>
            <div class="card animate-on-scroll" style="border-left: 4px solid var(--success);">
              <div class="font-heading font-bold mb-2" style="color: var(--success);">Output (jo bahar aata hai)</div>
              <ul class="text-sm space-y-2" style="color: var(--text-secondary);">
                <li>🍬 <strong>Glucose (C₆H₁₂O₆)</strong> = ped ka khaana</li>
                <li>💨 <strong>O₂ (Oxygen)</strong> = bonus byproduct</li>
                <li>🫁 Yahi oxygen hum breathe karte hain!</li>
              </ul>
            </div>
          </div>

          <p class="text-base" style="color: var(--text-body);">
            Simple language mein: <em style="color: var(--accent);">"Ped sunlight plus paani plus CO₂ ko mix karke apna lunch banata hai, aur O₂ humein gift kar deta hai."</em> Kaafi fair deal hai, hai na?
          </p>
        </div>

        <!-- ─── Section 2: Step by Step ───────────────────── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            📋 Step by Step Process — Ek Ek Karke Samjho
          </h2>

          <p class="text-base mb-6" style="color: var(--text-body);">
            Ab thoda aur detail mein jaate hain. Photosynthesis ek ordered process hai — ek step ke baad doosra step hota hai:
          </p>

          <div class="space-y-4">

            <div class="flex items-start gap-4 animate-on-scroll">
              <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-lg" style="background: var(--primary-glow); color: var(--primary-light); border: 2px solid var(--primary);">1</div>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Sunlight Absorption</div>
                <p class="text-sm" style="color: var(--text-secondary);">Patte mein maujood <strong>chlorophyll</strong> pigment sunlight absorb karta hai. Chlorophyll sirf green light reflect karta hai — isliye patte hame green dikhte hain. Chloroplast ke andar thylakoid membranes pe yeh kaam hota hai.</p>
              </div>
            </div>

            <div class="flex items-start gap-4 animate-on-scroll">
              <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-lg" style="background: var(--primary-glow); color: var(--primary-light); border: 2px solid var(--primary);">2</div>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Paani Ka Safar — Roots Se Patte Tak</div>
                <p class="text-sm" style="color: var(--text-secondary);">Roots zameen se paani absorb karte hain. Yeh paani <strong>xylem vessels</strong> ke through stem aur phir patte tak pahunchta hai. Bina paani ke photosynthesis nahi ho sakti — just like bina paani ke cooking nahi hoti!</p>
              </div>
            </div>

            <div class="flex items-start gap-4 animate-on-scroll">
              <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-lg" style="background: var(--primary-glow); color: var(--primary-light); border: 2px solid var(--primary);">3</div>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">CO₂ Ka Entrance — Stomata Se</div>
                <p class="text-sm" style="color: var(--text-secondary);">Patte ke neeche chote chote pore hote hain — inhe <strong>stomata</strong> kehte hain. Inhi se CO₂ (carbon dioxide) andar jaati hai. Raat ko ya dry weather mein stomata band ho jaate hain — isliye photosynthesis ruk jaati hai.</p>
              </div>
            </div>

            <div class="flex items-start gap-4 animate-on-scroll">
              <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-lg" style="background: var(--accent-glow); color: var(--accent); border: 2px solid var(--accent);">4</div>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Chloroplast Mein Reaction — Yahan Magic Hoti Hai!</div>
                <p class="text-sm" style="color: var(--text-secondary);">Chloroplast ke andar sunlight ki energy se paani ke molecules toot jaate hain (photolysis). Phir CO₂ molecules ke saath glucose banana shuru hota hai. Yeh reaction do stages mein hoti hai — Light Reaction aur Dark Reaction (Calvin Cycle). Board ke liye stages ke naam zaroori hain!</p>
              </div>
            </div>

            <div class="flex items-start gap-4 animate-on-scroll">
              <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-lg" style="background: var(--accent-glow); color: var(--accent); border: 2px solid var(--accent);">5</div>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Glucose Banta Hai — Ped Ka Khaana Ready!</div>
                <p class="text-sm" style="color: var(--text-secondary);"><strong>Glucose (C₆H₁₂O₆)</strong> banta hai — yeh ped ka primary food source hai. Glucose use hota hai ped ke growth ke liye, energy ke liye, aur baad mein starch (storage) mein convert hota hai. Fruit, vegetable mein jo sweetness hai — wo bhi glucose hi hai!</p>
              </div>
            </div>

            <div class="flex items-start gap-4 animate-on-scroll">
              <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center font-heading font-bold text-lg" style="background: var(--success); color: #000; border: 2px solid var(--success);">6</div>
              <div>
                <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">O₂ Release — Humara Gift!</div>
                <p class="text-sm" style="color: var(--text-secondary);">Photosynthesis ka byproduct hai <strong>oxygen (O₂)</strong>. Yeh stomata se bahar nikal jaati hai — aur atmosphere mein aa jaati hai. Hum jo saas lete hain, woh isi oxygen se bani hai. Ek ped din mein itni oxygen produce karta hai jitni ek insaan ko ek din ke liye chahiye!</p>
              </div>
            </div>

          </div>
        </div>

        <!-- ─── Section 3: Formula Trick ─────────────────── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            🧠 Formula Yaad Karne Ka Trick — Kabhi Nahi Bhoologe!
          </h2>

          <!-- Formula display -->
          <div class="card mb-6 text-center animate-on-scroll" style="border: 2px solid var(--primary); background: var(--bg-surface);">
            <div class="font-heading font-bold text-sm mb-3" style="color: var(--text-muted);">Photosynthesis Ka Equation</div>
            <div class="text-2xl sm:text-3xl font-heading font-bold mb-2" style="color: var(--primary-light);">
              6CO₂ + 6H₂O + Sunlight
            </div>
            <div class="text-3xl mb-2" style="color: var(--accent);">↓</div>
            <div class="text-2xl sm:text-3xl font-heading font-bold" style="color: var(--success);">
              C₆H₁₂O₆ + 6O₂
            </div>
            <div class="text-sm mt-4" style="color: var(--text-muted);">
              6 Carbon dioxide + 6 Paani + Light Energy → Glucose + 6 Oxygen
            </div>
          </div>

          <!-- Mnemonic -->
          <div class="card mb-6 animate-on-scroll" style="border-left: 4px solid var(--accent); background: var(--accent-glow);">
            <div class="font-heading font-bold mb-3" style="color: var(--accent);">🎯 Mnemonic — SAAVI Ka Secret Trick</div>
            <p class="text-base font-heading font-bold mb-3" style="color: var(--text-primary);">
              "6 Cows (CO₂) + 6 Horses (H₂O) + Sun = Carrot Grass (C₆H₁₂O₆) + 6 Oranges (O₂)"
            </p>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-center text-sm">
              <div>
                <div class="text-2xl">🐄🐄🐄🐄🐄🐄</div>
                <div style="color: var(--text-muted);">6 CO₂</div>
              </div>
              <div>
                <div class="text-2xl">🐴🐴🐴🐴🐴🐴</div>
                <div style="color: var(--text-muted);">6 H₂O</div>
              </div>
              <div>
                <div class="text-2xl">🥕🌿</div>
                <div style="color: var(--text-muted);">C₆H₁₂O₆</div>
              </div>
              <div>
                <div class="text-2xl">🍊🍊🍊🍊🍊🍊</div>
                <div style="color: var(--text-muted);">6 O₂</div>
              </div>
            </div>
          </div>

          <p class="text-base" style="color: var(--text-body);">
            Yaad karo: <strong style="color: var(--primary-light);">6-6-Sun → 1-6</strong>. Matlab: 6 CO₂ molecules + 6 H₂O molecules + sunlight = 1 glucose molecule + 6 O₂ molecules. Exam hall mein bhi yeh picture yaad aayegi — promise!
          </p>
        </div>

        <!-- ─── Section 4: Why Important ──────────────────── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            🌍 Kyun Zaroori Hai Photosynthesis?
          </h2>

          <p class="text-base mb-6" style="color: var(--text-body);">
            Photosynthesis sirf ek chapter nahi hai — yeh poori duniya ka foundation hai. Socho agar photosynthesis band ho jaaye toh kya hoga:
          </p>

          <div class="space-y-4">
            <div class="flex items-start gap-3 animate-on-scroll">
              <span class="text-xl mt-1">🫁</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Oxygen Ka Source</div>
                <p class="text-sm" style="color: var(--text-secondary);">Bina photosynthesis ke, atmosphere mein oxygen nahi milegi. Hum sans nahi le payenge. Poori duniya ki oxygen supply photosynthesis pe depend karti hai — trees, algae, plants sab milke karte hain yeh kaam.</p>
              </div>
            </div>

            <div class="flex items-start gap-3 animate-on-scroll">
              <span class="text-xl mt-1">🍔</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Sab Food Chains Ka Starting Point</div>
                <p class="text-sm" style="color: var(--text-secondary);">Gaay ghaas khati hai → hum gaay ka doodh peete hain. Ghaas kahan se aai? Photosynthesis se! Yeh duniya ki sabse badi food factory hai. Herbivores, carnivores, omnivores — sab ultimately photosynthesis pe dependent hain.</p>
              </div>
            </div>

            <div class="flex items-start gap-3 animate-on-scroll">
              <span class="text-xl mt-1">⛽</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Fossil Fuels Bhi Plants Se Bane Hain</div>
                <p class="text-sm" style="color: var(--text-secondary);">Petrol, coal, natural gas — yeh sab millions of years pehle ke plants se bane hain. Un plants ne photosynthesis ki thi, glucose banaaya tha. Woh compress hokar fuel ban gaye. Toh technically teri gaadi photosynthesis se chal rahi hai!</p>
              </div>
            </div>

            <div class="flex items-start gap-3 animate-on-scroll">
              <span class="text-xl mt-1">🌡️</span>
              <div>
                <div class="font-heading font-bold" style="color: var(--text-primary);">Climate Change Ko Rokne Mein Help</div>
                <p class="text-sm" style="color: var(--text-secondary);">Global warming se CO₂ badh raha hai. Plants photosynthesis ke through CO₂ absorb karte hain — isliye jungal katna climate ke liye itna harmful hai. Jitne zyada ped, utni zyada CO₂ absorb, utna kum global warming. Tree planting = photosynthesis power!</p>
              </div>
            </div>
          </div>
        </div>

        <!-- ─── Section 5: Board Exam ──────────────────────── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            📝 Board Exam Mein Kya Poochha Jaata Hai
          </h2>

          <p class="text-base mb-6" style="color: var(--text-body);">
            CBSE aur CG Board dono mein photosynthesis regularly aata hai. SAAVI didi ke saath yeh sab questions practice karo:
          </p>

          <div class="space-y-4">

            <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
              <div class="flex items-start justify-between gap-4 mb-2">
                <div class="font-heading font-bold" style="color: var(--text-primary);">"Photosynthesis ki definition likho"</div>
                <span class="badge badge-primary flex-shrink-0">2 marks</span>
              </div>
              <p class="text-sm" style="color: var(--text-secondary);">
                <strong style="color: var(--primary-light);">Model Answer:</strong> Photosynthesis woh process hai jisme hare paudhe chlorophyll pigment ki madad se sunlight, CO₂ aur H₂O ko use karke glucose (food) banaate hain aur O₂ release karte hain.
              </p>
            </div>

            <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
              <div class="flex items-start justify-between gap-4 mb-2">
                <div class="font-heading font-bold" style="color: var(--text-primary);">"Photosynthesis ka equation likho"</div>
                <span class="badge badge-primary flex-shrink-0">1 mark</span>
              </div>
              <p class="text-sm font-heading font-bold" style="color: var(--success);">
                6CO₂ + 6H₂O → (Sunlight + Chlorophyll) → C₆H₁₂O₆ + 6O₂
              </p>
            </div>

            <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
              <div class="flex items-start justify-between gap-4 mb-2">
                <div class="font-heading font-bold" style="color: var(--text-primary);">"Chlorophyll ka role explain karo"</div>
                <span class="badge badge-accent flex-shrink-0">3 marks</span>
              </div>
              <p class="text-sm" style="color: var(--text-secondary);">
                Chlorophyll patte ka green pigment hai. Yeh (1) sunlight ko absorb karta hai, (2) light energy ko chemical energy mein convert karta hai, aur (3) photosynthesis ki reaction start karta hai. Bina chlorophyll ke photosynthesis impossible hai.
              </p>
            </div>

            <div class="card animate-on-scroll" style="border-left: 4px solid var(--warning);">
              <div class="flex items-start justify-between gap-4 mb-2">
                <div class="font-heading font-bold" style="color: var(--text-primary);">"Photosynthesis aur respiration mein antar"</div>
                <span class="badge" style="background: var(--warning); color: #000; flex-shrink: 0;">5 marks — Table!</span>
              </div>
              <div class="overflow-x-auto">
                <table class="w-full text-sm" style="border-collapse: collapse;">
                  <thead>
                    <tr style="background: var(--bg-elevated);">
                      <th class="text-left p-2" style="color: var(--text-muted); border-bottom: 1px solid var(--border-subtle);">Point</th>
                      <th class="text-left p-2" style="color: var(--primary-light); border-bottom: 1px solid var(--border-subtle);">Photosynthesis</th>
                      <th class="text-left p-2" style="color: var(--accent); border-bottom: 1px solid var(--border-subtle);">Respiration</th>
                    </tr>
                  </thead>
                  <tbody style="color: var(--text-secondary);">
                    <tr>
                      <td class="p-2" style="border-bottom: 1px solid var(--border-subtle);">Kab hota hai</td>
                      <td class="p-2" style="border-bottom: 1px solid var(--border-subtle);">Sirf din mein (sunlight chahiye)</td>
                      <td class="p-2" style="border-bottom: 1px solid var(--border-subtle);">Din aur raat dono</td>
                    </tr>
                    <tr>
                      <td class="p-2" style="border-bottom: 1px solid var(--border-subtle);">CO₂ ka kaam</td>
                      <td class="p-2" style="border-bottom: 1px solid var(--border-subtle);">Absorb karta hai</td>
                      <td class="p-2" style="border-bottom: 1px solid var(--border-subtle);">Release karta hai</td>
                    </tr>
                    <tr>
                      <td class="p-2" style="border-bottom: 1px solid var(--border-subtle);">O₂ ka kaam</td>
                      <td class="p-2" style="border-bottom: 1px solid var(--border-subtle);">Release hoti hai</td>
                      <td class="p-2" style="border-bottom: 1px solid var(--border-subtle);">Absorb hoti hai</td>
                    </tr>
                    <tr>
                      <td class="p-2" style="border-bottom: 1px solid var(--border-subtle);">Energy</td>
                      <td class="p-2" style="border-bottom: 1px solid var(--border-subtle);">Stored (glucose mein)</td>
                      <td class="p-2" style="border-bottom: 1px solid var(--border-subtle);">Released (ATP ke roop mein)</td>
                    </tr>
                    <tr>
                      <td class="p-2">Kahan hota hai</td>
                      <td class="p-2">Chloroplast mein</td>
                      <td class="p-2">Mitochondria mein</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card animate-on-scroll" style="border-left: 4px solid var(--error);">
              <div class="flex items-start justify-between gap-4 mb-2">
                <div class="font-heading font-bold" style="color: var(--text-primary);">"Agar kisi ped ke patte green na ho toh kya photosynthesis hoga?"</div>
                <span class="badge" style="background: var(--error); color: #fff; flex-shrink: 0;">Tricky!</span>
              </div>
              <p class="text-sm" style="color: var(--text-secondary);">
                <strong style="color: var(--primary-light);">Smart Answer:</strong> Patte ka green colour chlorophyll ki wajah se hota hai. Agar patte green nahi hain, toh chlorophyll nahi hai. Bina chlorophyll ke sunlight absorb nahi hogi. Isliye photosynthesis nahi hogi ya bahut kam hogi. Example: purple/red patte wale plants mein chlorophyll hota hai but covered hota hai other pigments se — unme bhi photosynthesis hoti hai!
              </p>
            </div>

          </div>
        </div>

        <!-- ─── Section 6: Common Mistakes ────────────────── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            ⚠️ Common Mistakes — SAAVI Didi Warning Deti Hai!
          </h2>

          <p class="text-base mb-6" style="color: var(--text-body);">
            Yeh mistakes students bahut karte hain. Exam mein karna mat — marks cut honge!
          </p>

          <div class="space-y-4">

            <div class="card animate-on-scroll" style="border-left: 4px solid var(--error);">
              <div class="flex items-start gap-3">
                <span class="text-2xl">❌</span>
                <div>
                  <div class="font-heading font-bold mb-1" style="color: var(--error);">"Ped sirf O₂ dete hain"</div>
                  <p class="text-sm" style="color: var(--text-secondary);">
                    <strong style="color: var(--text-primary);">Wrong!</strong> Ped din mein O₂ dete hain (photosynthesis ke through), par <strong>raat ko CO₂ release karte hain</strong> (respiration ke through). Isliye log kehte hain raat ko pedo ke paas nahi sona chahiye — scientifically correct hai!
                  </p>
                </div>
              </div>
            </div>

            <div class="card animate-on-scroll" style="border-left: 4px solid var(--error);">
              <div class="flex items-start gap-3">
                <span class="text-2xl">❌</span>
                <div>
                  <div class="font-heading font-bold mb-1" style="color: var(--error);">"Sirf sunlight chahiye photosynthesis ke liye"</div>
                  <p class="text-sm" style="color: var(--text-secondary);">
                    <strong style="color: var(--text-primary);">Wrong!</strong> Sunlight zaroori hai, par CO₂ aur H₂O <em>equally zaroori</em> hain. Tino factors mein se koi bhi missing ho toh photosynthesis ruk jaayegi. Formula mein teen cheezein hain — teeno chahiye!
                  </p>
                </div>
              </div>
            </div>

            <div class="card animate-on-scroll" style="border-left: 4px solid var(--error);">
              <div class="flex items-start gap-3">
                <span class="text-2xl">❌</span>
                <div>
                  <div class="font-heading font-bold mb-1" style="color: var(--error);">"Photosynthesis sirf patte mein hota hai"</div>
                  <p class="text-sm" style="color: var(--text-secondary);">
                    <strong style="color: var(--text-primary);">Mostly correct, but not fully!</strong> Mostly patte mein hota hai kyunki wahan chlorophyll zyada hota hai. Par green stems (cactus!), green fruits mein bhi thodi photosynthesis ho sakti hai. Board exam mein "mostly patte mein" likho — safe answer.
                  </p>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- ─── Section 7: SAAVI CTA ───────────────────────── -->
        <div class="mb-12">
          <h2 class="text-3xl font-heading font-bold mb-6" style="color: var(--text-primary);">
            🤖 SAAVI Se Aur Samjho — 10 Naye Angles Hain!
          </h2>

          <p class="text-base mb-6" style="color: var(--text-body);">
            Yeh sirf beginning hai! SAAVI ke paas photosynthesis ke <strong style="color: var(--accent);">10 alag tarike se samjhane ka power</strong> hai. Analogy, experiment, quiz, story — jo bhi tumhe suit kare. SAAVI puchh leti hai "kaisa samjhoge?" aur phir exactly waise explain karti hai.
          </p>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
            <div class="card animate-on-scroll text-center">
              <div class="text-3xl mb-2">🧪</div>
              <div class="font-heading font-bold" style="color: var(--text-primary);">Experiment Style</div>
              <p class="text-sm" style="color: var(--text-secondary);">Ghar pe iodine test se photosynthesis prove karo — SAAVI guide karegi</p>
            </div>
            <div class="card animate-on-scroll text-center">
              <div class="text-3xl mb-2">🎯</div>
              <div class="font-heading font-bold" style="color: var(--text-primary);">Quiz Mode</div>
              <p class="text-sm" style="color: var(--text-secondary);">10 MCQ questions — instant feedback ke saath, board pattern mein</p>
            </div>
            <div class="card animate-on-scroll text-center">
              <div class="text-3xl mb-2">📖</div>
              <div class="font-heading font-bold" style="color: var(--text-primary);">Story Mode</div>
              <p class="text-sm" style="color: var(--text-secondary);">Ek ped ki kahani — photosynthesis ek hero ki journey ki tarah</p>
            </div>
            <div class="card animate-on-scroll text-center">
              <div class="text-3xl mb-2">🔁</div>
              <div class="font-heading font-bold" style="color: var(--text-primary);">Revision Mode</div>
              <p class="text-sm" style="color: var(--text-secondary);">Exam se 1 din pehle — 10 min mein poora photosynthesis chapter revise</p>
            </div>
          </div>

          <div class="card animate-on-scroll text-center" style="border: 2px solid var(--accent); background: var(--accent-glow);">
            <p class="text-lg font-heading font-bold mb-4" style="color: var(--accent);">
              SAAVI Didi Se Photosynthesis Seekhna Chahte Ho?
            </p>
            <p class="text-sm mb-2" style="color: var(--text-secondary);">
              Hindi, Hinglish ya Telugu — apni language mein. CG Board ya CBSE — apna syllabus. May 20 launch pe pehle access pao.
            </p>
            <a href="/waitlist/" class="btn btn-primary">Join Shrutam Waitlist — Free Hai →</a>
          </div>
        </div>

      </div>
  </section>

  <!-- =====================================================
       FAQ SECTION
       ===================================================== -->
  <section class="section" aria-labelledby="faq-heading">
    <div class="container">
      

        <h2 id="faq-heading" class="text-3xl font-heading font-bold mb-8" style="color: var(--text-primary);">
          ❓ Aksar Poochhe Jaane Wale Sawaal
        </h2>

        <div class="space-y-4">

          <details class="card animate-on-scroll" style="cursor: pointer;">
            <summary class="font-heading font-bold text-lg" style="color: var(--text-primary); list-style: none; display: flex; justify-content: space-between; align-items: center;">
              Photosynthesis kya hai simple Hindi mein?
              <span style="color: var(--primary-light);">+</span>
            </summary>
            <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle);">
              <p class="text-sm" style="color: var(--text-body);">
                Photosynthesis woh process hai jisme <strong>ped apna khana khud banata hai</strong>. Sunlight, paani (H₂O) aur carbon dioxide (CO₂) ko use karke glucose (sugar) banata hai aur oxygen (O₂) release karta hai. SAAVI style mein: ped ka apna kitchen — sunlight stove hai, chlorophyll chef hai, CO₂ aur paani ingredients hain, glucose khaana hai, aur O₂ humara gift.
              </p>
            </div>
          </details>

          <details class="card animate-on-scroll" style="cursor: pointer;">
            <summary class="font-heading font-bold text-lg" style="color: var(--text-primary); list-style: none; display: flex; justify-content: space-between; align-items: center;">
              Photosynthesis ka formula kya hai?
              <span style="color: var(--primary-light);">+</span>
            </summary>
            <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle);">
              <p class="text-sm mb-3" style="color: var(--text-body);">
                <strong style="color: var(--success);">6CO₂ + 6H₂O + Sunlight → C₆H₁₂O₆ + 6O₂</strong>
              </p>
              <p class="text-sm" style="color: var(--text-secondary);">
                Mnemonic: "6 Cows + 6 Horses + Sun = Carrot Grass + 6 Oranges." Yaad rakhne ka trick: 6-6-Sun → 1-6. 6 CO₂ plus 6 H₂O plus sunlight deta hai 1 glucose molecule aur 6 oxygen molecules.
              </p>
            </div>
          </details>

          <details class="card animate-on-scroll" style="cursor: pointer;">
            <summary class="font-heading font-bold text-lg" style="color: var(--text-primary); list-style: none; display: flex; justify-content: space-between; align-items: center;">
              Chlorophyll kya karta hai?
              <span style="color: var(--primary-light);">+</span>
            </summary>
            <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle);">
              <p class="text-sm" style="color: var(--text-body);">
                Chlorophyll patte mein maujood green pigment hai jo <strong>sunlight absorb karta hai</strong>. Yeh photosynthesis ka "chef" hai — energy source pakadta hai. Bina chlorophyll ke na sunlight absorb hogi, na photosynthesis shuru hogi. Green colour isliye dikhta hai kyunki chlorophyll green wavelength reflect karta hai aur baaki absorb karta hai.
              </p>
            </div>
          </details>

          <details class="card animate-on-scroll" style="cursor: pointer;">
            <summary class="font-heading font-bold text-lg" style="color: var(--text-primary); list-style: none; display: flex; justify-content: space-between; align-items: center;">
              Kya photosynthesis raat ko hota hai?
              <span style="color: var(--primary-light);">+</span>
            </summary>
            <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle);">
              <p class="text-sm" style="color: var(--text-body);">
                <strong style="color: var(--error);">Nahi!</strong> Photosynthesis ke liye sunlight zaroori hai — isliye yeh sirf din mein hota hai. Raat ko paudhe sirf <strong>respiration</strong> karte hain, jisme wo CO₂ release karte hain aur O₂ absorb karte hain. Isliye kehte hain raat ko pedo ke paas nahi sona chahiye — bilkul sach hai! Subah se shaam tak photosynthesis, raat bhar respiration.
              </p>
            </div>
          </details>

          <details class="card animate-on-scroll" style="cursor: pointer;">
            <summary class="font-heading font-bold text-lg" style="color: var(--text-primary); list-style: none; display: flex; justify-content: space-between; align-items: center;">
              Board exam mein kitne marks ka aata hai?
              <span style="color: var(--primary-light);">+</span>
            </summary>
            <div class="mt-4 pt-4" style="border-top: 1px solid var(--border-subtle);">
              <p class="text-sm" style="color: var(--text-body);">
                CBSE aur CG Board dono mein photosynthesis <strong>usually 2 se 5 marks</strong> ka aata hai. Common questions hain: Definition (2 marks), equation (1 mark), chlorophyll ka role (3 marks), aur photosynthesis vs respiration comparison table (5 marks). Definition aur equation toh pakka yaad karo — woh guaranteed marks hain!
              </p>
            </div>
          </details>

        </div>
      </div>
  </section>

  <!-- =====================================================
       RELATED POSTS + BOTTOM CTA
       ===================================================== -->
  <section class="section section-dark">
    <div class="container">
      

        <h2 class="text-2xl font-heading font-bold mb-6" style="color: var(--text-primary);">
          Aur Padhho
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
          <a href="/blog/cg-board-class10-preparation/" class="card flex flex-col gap-2 animate-on-scroll" style="text-decoration: none; border-top: 3px solid var(--accent);">
            <span class="badge badge-accent self-start">Board Exam</span>
            <div class="font-heading font-bold" style="color: var(--text-primary);">CG Board Class 10 Taiyaari 2026 — Complete Guide</div>
            <p class="text-sm" style="color: var(--text-secondary);">Subject-wise strategy, timetable, aur SAAVI ke saath revision plan.</p>
          </a>
          <a href="/blog/adaptive-learning-kya-hai/" class="card flex flex-col gap-2 animate-on-scroll" style="text-decoration: none; border-top: 3px solid var(--primary);">
            <span class="badge badge-primary self-start">Learning</span>
            <div class="font-heading font-bold" style="color: var(--text-primary);">Adaptive Learning Kya Hai</div>
            <p class="text-sm" style="color: var(--text-secondary);">Har bachcha alag hai — toh padhana bhi alag kyun nahi? SAAVI ka adaptive approach.</p>
          </a>
        </div>

        <div class="text-center">
          <a href="/blog/" class="btn btn-outline mr-4">← Blog Pe Wapis Jao</a>
          <a href="/waitlist/" class="btn btn-primary">SAAVI Se Padhna Shuru Karo →</a>
        </div>

      </div>
  </section>

</main>

<?php include '../../partials/footer.php'; ?>
