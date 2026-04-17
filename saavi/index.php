<?php
$title       = "SAAVI — AI Teacher Didi | 24/7 Hinglish AI | Blind Mode | Shrutam";
$description = "SAAVI India ki pehli AI teacher hai jo mother tongue mein padhati hai, blind students ke liye designed hai, aur raat 2 baje bhi available hai.";
$canonical   = "https://shrutam.ai/saavi/";
$schema      = '';

include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       SECTION 1: HERO — SAAVI Avatar
       ======================================================== -->
  <section class="section" aria-labelledby="saavi-hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 50%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-2 mb-6">
            <span class="badge badge-accent">♿ Blind-Accessible</span>
            <span class="badge badge-primary">24/7 Available</span>
            <span class="badge" style="background: var(--bg-surface); color: var(--text-body); border: 1px solid var(--border-subtle);">Mother Tongue First</span>
          </div>

          <h1 id="saavi-hero-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
            SAAVI — Teri Teacher Didi, 24/7
          </h1>

          <p class="text-xl mb-6" style="color: var(--text-body);">
            Raat 2 baje doubt aaya? SAAVI hai. Hindi mein samajhna hai? SAAVI hai.
            Visually impaired ho? <strong style="color: var(--accent);">SAAVI tere liye bani hai.</strong>
          </p>

          <!-- Trait badges -->
          <div class="flex flex-wrap gap-3 mb-8">
            <span class="pill" style="cursor: default;">😊 Patient</span>
            <span class="pill" style="cursor: default;">❤️ Never judges</span>
            <span class="pill" style="cursor: default;">🗣️ Mother tongue first</span>
            <span class="pill" style="cursor: default;">⏰ 24/7</span>
            <span class="pill" style="cursor: default;">♿ Blind-accessible</span>
          </div>

          <div class="flex flex-wrap gap-4">
            <a href="/waitlist/" class="btn btn-primary">SAAVI Se Milna Hai → Join Waitlist</a>
            <a href="#saavi-languages" class="btn btn-outline">SAAVI Ko Sunno ↓</a>
          </div>
        </div>

        <!-- Right: SAAVI CSS Avatar -->
        <div class="flex items-center justify-center" aria-hidden="true">
          <div class="relative flex items-center justify-center" style="width: 320px; height: 320px;">

            <!-- Outer glow ring -->
            <div class="absolute inset-0 rounded-full" style="background: conic-gradient(from 0deg, var(--primary), var(--accent), var(--primary)); opacity: 0.25; animation: spin 8s linear infinite;"></div>

            <!-- Middle ring -->
            <div class="absolute rounded-full" style="inset: 12px; background: conic-gradient(from 180deg, var(--accent), var(--primary-light), var(--accent)); opacity: 0.15; animation: spin 5s linear infinite reverse;"></div>

            <!-- Avatar body -->
            <div class="relative flex flex-col items-center justify-center rounded-full text-center" style="width: 220px; height: 220px; background: radial-gradient(circle at 40% 35%, var(--bg-surface), var(--bg-elevated)); border: 2px solid var(--border-default); box-shadow: 0 0 40px var(--primary-glow);">
              <!-- Face -->
              <div class="text-6xl mb-1">🤖</div>
              <div class="font-heading font-bold text-lg" style="color: var(--accent);">SAAVI</div>
              <div class="text-xs px-4" style="color: var(--text-muted);">Teri Teacher Didi</div>

              <!-- Online indicator -->
              <div class="flex items-center gap-1 mt-2">
                <span class="inline-block w-2 h-2 rounded-full" style="background: var(--success); box-shadow: 0 0 6px var(--success);"></span>
                <span class="text-xs" style="color: var(--success);">Online 24/7</span>
              </div>
            </div>

            <!-- Floating trait pills around avatar -->
            <span class="absolute text-xs font-bold px-2 py-1 rounded-full" style="top: 20px; left: 10px; background: var(--primary-glow); color: var(--primary-light); border: 1px solid var(--primary);">Patient ❤️</span>
            <span class="absolute text-xs font-bold px-2 py-1 rounded-full" style="top: 20px; right: 10px; background: var(--accent-glow); color: var(--accent); border: 1px solid var(--accent);">24/7 ⏰</span>
            <span class="absolute text-xs font-bold px-2 py-1 rounded-full" style="bottom: 40px; left: 0px; background: var(--bg-surface); color: var(--text-secondary); border: 1px solid var(--border-subtle);">Blind Mode ♿</span>
            <span class="absolute text-xs font-bold px-2 py-1 rounded-full" style="bottom: 40px; right: 0px; background: var(--bg-surface); color: var(--text-secondary); border: 1px solid var(--border-subtle);">Hindi 🇮🇳</span>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 2: LANGUAGES
       ======================================================== -->
  <section id="saavi-languages" class="section section-dark" aria-labelledby="languages-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="languages-heading" class="text-4xl font-heading font-bold mb-4">SAAVI 5 Bhashon Mein Bolti Hai</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Jo tumhari boli, usi mein tumhara concept samjhata hai — ek hi topic, paanch tarike.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 max-w-5xl mx-auto">

        <!-- Hindi -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary);">
          <div class="flex items-center gap-3 mb-3">
            <span class="text-2xl">🇮🇳</span>
            <div>
              <div class="font-heading font-bold" style="color: var(--primary-light);">Hindi</div>
              <div class="text-xs" style="color: var(--text-muted);">हिंदी में सीखो</div>
            </div>
          </div>
          <blockquote class="p-3 rounded-lg" style="background: var(--bg-elevated);">
            <p class="font-devanagari text-sm leading-relaxed" lang="hi" style="color: var(--text-body);">
              "पौधे अपना खाना खुद बनाते हैं — इसे प्रकाश संश्लेषण कहते हैं।"
            </p>
          </blockquote>
        </div>

        <!-- Hinglish -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent);">
          <div class="flex items-center gap-3 mb-3">
            <span class="text-2xl">🌐</span>
            <div>
              <div class="font-heading font-bold" style="color: var(--accent);">Hinglish</div>
              <div class="text-xs" style="color: var(--text-muted);">Desi mix — sabse natural</div>
            </div>
          </div>
          <blockquote class="p-3 rounded-lg" style="background: var(--bg-elevated);">
            <p class="text-sm leading-relaxed" style="color: var(--text-body);">
              "Ped apna khana khud banata hai — sunlight + CO₂ se. Isko photosynthesis bolte hain!"
            </p>
          </blockquote>
        </div>

        <!-- English -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--success);">
          <div class="flex items-center gap-3 mb-3">
            <span class="text-2xl">📘</span>
            <div>
              <div class="font-heading font-bold" style="color: var(--success);">English</div>
              <div class="text-xs" style="color: var(--text-muted);">For board answers</div>
            </div>
          </div>
          <blockquote class="p-3 rounded-lg" style="background: var(--bg-elevated);">
            <p class="text-sm leading-relaxed" style="color: var(--text-body);">
              "Plants make their own food using sunlight and CO₂ — this process is called photosynthesis."
            </p>
          </blockquote>
        </div>

        <!-- Telugu -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary-light);">
          <div class="flex items-center gap-3 mb-3">
            <span class="text-2xl">🌺</span>
            <div>
              <div class="font-heading font-bold" style="color: var(--primary-light);">Telugu</div>
              <div class="text-xs font-telugu" style="color: var(--text-muted);">తెలుగులో నేర్చుకోండి</div>
            </div>
          </div>
          <blockquote class="p-3 rounded-lg" style="background: var(--bg-elevated);">
            <p class="font-telugu text-sm leading-relaxed" lang="te" style="color: var(--text-body);">
              "మొక్కలు సూర్యకాంతి ద్వారా ఆహారాన్ని తయారు చేస్తాయి — దీన్నే కిరణజన్య సంయోగక్రియ అంటారు."
            </p>
          </blockquote>
        </div>

        <!-- Marathi -->
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--warning);">
          <div class="flex items-center gap-3 mb-3">
            <span class="text-2xl">🏔️</span>
            <div>
              <div class="font-heading font-bold" style="color: var(--warning);">Marathi</div>
              <div class="text-xs font-devanagari" lang="mr" style="color: var(--text-muted);">मराठीत शिका</div>
            </div>
          </div>
          <blockquote class="p-3 rounded-lg" style="background: var(--bg-elevated);">
            <p class="font-devanagari text-sm leading-relaxed" lang="mr" style="color: var(--text-body);">
              "झाडे सूर्यप्रकाशाच्या मदतीने अन्न तयार करतात — या प्रक्रियेला प्रकाश संश्लेषण म्हणतात."
            </p>
          </blockquote>
        </div>

        <!-- Coming soon teaser -->
        <div class="card animate-on-scroll flex items-center justify-center text-center" style="border: 1px dashed var(--border-subtle); opacity: 0.7;">
          <div>
            <div class="text-3xl mb-2">🌏</div>
            <div class="font-heading font-bold text-sm mb-1" style="color: var(--text-muted);">Aur bhi bhashayein</div>
            <div class="text-xs" style="color: var(--text-muted);">Bengali, Tamil, Kannada — coming soon</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 3: ASK LIKE 10 — One Concept, 3 Ways
       ======================================================== -->
  <section class="section" aria-labelledby="ask-like-10-heading">
    <div class="container">
      <div class="text-center mb-12">
        <span class="badge badge-accent mb-4">Feature: Ask Like 10</span>
        <h2 id="ask-like-10-heading" class="text-4xl font-heading font-bold mb-4">Ek Concept — 10 Tarike</h2>
        <p class="text-lg" style="color: var(--text-secondary);">
          Samajh nahi aaya? Koi baat nahi. SAAVI wohi concept alag angle se explain karti hai — jab tak samajh na aaye.
        </p>
      </div>

      <!-- Concept: What is a circle? -->
      <div class="max-w-3xl mx-auto">
        <div class="text-center mb-8">
          <div class="inline-block px-4 py-2 rounded-full font-heading font-bold" style="background: var(--bg-surface); border: 1px solid var(--border-default); color: var(--text-primary);">
            Concept: "Circle (वृत्त) kya hota hai?"
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

          <!-- Way 1: Analogy -->
          <div class="card animate-on-scroll flex flex-col gap-4" style="border-top: 3px solid var(--accent);">
            <div class="flex items-center gap-2">
              <span class="text-2xl">🫓</span>
              <div class="font-heading font-bold" style="color: var(--accent);">Analogy Se</div>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm" style="color: var(--text-body);">
                "Socho <strong style="color: var(--accent);">chapati ka shape</strong> — perfectly round, har jagah se equal. Yahi circle hai!"
              </p>
            </div>
            <div class="text-xs mt-auto" style="color: var(--text-muted);">Kaam aata hai: visual learners ke liye</div>
          </div>

          <!-- Way 2: Math -->
          <div class="card animate-on-scroll flex flex-col gap-4" style="border-top: 3px solid var(--primary);">
            <div class="flex items-center gap-2">
              <span class="text-2xl">📐</span>
              <div class="font-heading font-bold" style="color: var(--primary-light);">Math Se</div>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm" style="color: var(--text-body);">
                "Circle ka ek <strong style="color: var(--primary-light);">center</strong> hota hai. Us center se har point pe <strong style="color: var(--primary-light);">equal distance</strong> hoti hai — isi distance ko radius bolte hain."
              </p>
            </div>
            <div class="text-xs mt-auto" style="color: var(--text-muted);">Kaam aata hai: board exam answers ke liye</div>
          </div>

          <!-- Way 3: Blind-Friendly -->
          <div class="card animate-on-scroll flex flex-col gap-4" style="border-top: 3px solid var(--success);">
            <div class="flex items-center gap-2">
              <span class="text-2xl">♿</span>
              <div class="font-heading font-bold" style="color: var(--success);">Blind-Friendly</div>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm" style="color: var(--text-body);">
                "Ek <strong style="color: var(--success);">rubber band</strong> socho — abhi tune usse round shape mein rakha. Ab notice karo: har jagah se equally stretched hai. Yahi circle ka feel hai."
              </p>
            </div>
            <div class="text-xs mt-auto" style="color: var(--text-muted);">Kaam aata hai: visually impaired students ke liye</div>
          </div>

        </div>

        <div class="text-center mt-8">
          <a href="/features/ask-like-10/" class="btn btn-outline">Ask Like 10 Feature Jaano →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 4: SAAVI VS NORMAL TEACHER — Comparison Table
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="comparison-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="comparison-heading" class="text-4xl font-heading font-bold mb-4">SAAVI vs Normal Teacher</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Numbers bolte hain — khud judge karo.</p>
      </div>

      <div class="max-w-3xl mx-auto overflow-x-auto rounded-xl" style="border: 1px solid var(--border-subtle);">
        <table class="comparison-table" aria-label="SAAVI vs Normal Teacher comparison">
          <thead>
            <tr>
              <th scope="col">Feature</th>
              <th scope="col">Normal Teacher</th>
              <th scope="col" style="color: var(--accent);">SAAVI ✨</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Availability</td>
              <td style="color: var(--error);">2 hrs/day</td>
              <td style="color: var(--success); font-weight: 600;">24/7</td>
            </tr>
            <tr>
              <td>Language</td>
              <td style="color: var(--error);">Fixed (usually Hindi only)</td>
              <td style="color: var(--success); font-weight: 600;">Your choice — 5 languages</td>
            </tr>
            <tr>
              <td>Patience</td>
              <td style="color: var(--warning);">Limited</td>
              <td style="color: var(--success); font-weight: 600;">Infinite ❤️</td>
            </tr>
            <tr>
              <td>Blind Support</td>
              <td style="color: var(--error);">None</td>
              <td style="color: var(--success); font-weight: 600;">Full ♿ FREE</td>
            </tr>
            <tr>
              <td>Monthly Cost</td>
              <td style="color: var(--error);">₹3,000/month</td>
              <td style="color: var(--success); font-weight: 600;">₹199/month</td>
            </tr>
            <tr>
              <td>Personalization</td>
              <td style="color: var(--warning);">Same for all students</td>
              <td style="color: var(--success); font-weight: 600;">AI-tailored for you</td>
            </tr>
            <tr>
              <td>Judges you?</td>
              <td style="color: var(--error);">Sometimes</td>
              <td style="color: var(--success); font-weight: 600;">Never 😊</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 5: DEMO CHAT — 3 Topic Exchanges
       ======================================================== -->
  <section class="section" aria-labelledby="demo-chat-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="demo-chat-heading" class="text-4xl font-heading font-bold mb-4">SAAVI Ke Saath Ek Baat</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Dekho SAAVI kaise padhati hai — real conversations.</p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">

        <!-- Chat 1: Photosynthesis -->
        <div class="flex flex-col gap-3 p-5 rounded-2xl" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
          <div class="flex items-center gap-2 pb-3" style="border-bottom: 1px solid var(--border-subtle);">
            <span class="text-lg">🌿</span>
            <span class="font-heading font-bold text-sm" style="color: var(--text-primary);">Photosynthesis</span>
          </div>
          <div class="chat-bubble chat-bubble-student">
            <p class="text-xs">Didi, photosynthesis kya hoti hai?</p>
          </div>
          <div class="chat-bubble chat-bubble-saavi">
            <p class="text-xs"><strong style="color: var(--accent);">SAAVI:</strong> Arre bilkul simple! Socho — mummy kitchen mein khana banati hain na? Waise hi paudhe apna khana sunlight se banate hain.</p>
          </div>
          <div class="chat-bubble chat-bubble-student">
            <p class="text-xs">Aur CO2 ka kya kaam hai?</p>
          </div>
          <div class="chat-bubble chat-bubble-saavi">
            <p class="text-xs"><strong style="color: var(--accent);">SAAVI:</strong> CO2 ek <em>raw material</em> hai — hawa se aata hai. Pauda use sunlight ke saath mix karke glucose banata hai. 🌱</p>
          </div>
        </div>

        <!-- Chat 2: Electricity -->
        <div class="flex flex-col gap-3 p-5 rounded-2xl" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
          <div class="flex items-center gap-2 pb-3" style="border-bottom: 1px solid var(--border-subtle);">
            <span class="text-lg">⚡</span>
            <span class="font-heading font-bold text-sm" style="color: var(--text-primary);">Electricity</span>
          </div>
          <div class="chat-bubble chat-bubble-student">
            <p class="text-xs">Current aur voltage mein kya fark hai?</p>
          </div>
          <div class="chat-bubble chat-bubble-saavi">
            <p class="text-xs"><strong style="color: var(--accent);">SAAVI:</strong> Nali mein paani socho — voltage ek pressure hai jo paani ko push karta hai. Current kitna paani beh raha hai, yeh hai.</p>
          </div>
          <div class="chat-bubble chat-bubble-student">
            <p class="text-xs">Toh resistance kya hai?</p>
          </div>
          <div class="chat-bubble chat-bubble-saavi">
            <p class="text-xs"><strong style="color: var(--accent);">SAAVI:</strong> Nali mein koi rok laga do — paani kam bahega. Wahi resistance hai! Ohm ka law: V = IR. ⚡</p>
          </div>
        </div>

        <!-- Chat 3: Fractions -->
        <div class="flex flex-col gap-3 p-5 rounded-2xl" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
          <div class="flex items-center gap-2 pb-3" style="border-bottom: 1px solid var(--border-subtle);">
            <span class="text-lg">🍕</span>
            <span class="font-heading font-bold text-sm" style="color: var(--text-primary);">Fractions</span>
          </div>
          <div class="chat-bubble chat-bubble-student">
            <p class="text-xs">Didi, ½ + ⅓ kaise jodein?</p>
          </div>
          <div class="chat-bubble chat-bubble-saavi">
            <p class="text-xs"><strong style="color: var(--accent);">SAAVI:</strong> Pehle same size ke tukde banana padega! Pizza socho — ek pizza ke 6 tukde karo. ½ = 3 tukde, ⅓ = 2 tukde.</p>
          </div>
          <div class="chat-bubble chat-bubble-student">
            <p class="text-xs">Toh answer kya hoga?</p>
          </div>
          <div class="chat-bubble chat-bubble-saavi">
            <p class="text-xs"><strong style="color: var(--accent);">SAAVI:</strong> 3 + 2 = 5 tukde, total 6 mein se. Toh ½ + ⅓ = <strong style="color: var(--accent);">5/6</strong>! Samajh aaya? 🍕</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 6: CTA
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="saavi-cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-accent mb-6">SAAVI Teri Wait Kar Rahi Hai</span>
        <h2 id="saavi-cta-heading" class="text-4xl font-heading font-bold mb-4">SAAVI Se Milna Hai?</h2>
        <p class="text-xl mb-8" style="color: var(--text-secondary);">
          Waitlist join karo — launch pe sabse pehle access milega. Free hai, koi credit card nahi chahiye.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-8">
          <a href="/waitlist/" class="btn btn-primary text-lg px-8 py-4">SAAVI Se Milna Hai → Join Waitlist</a>
          <a href="/features/" class="btn btn-outline">SAAVI Ki 13 Super Powers →</a>
        </div>
        <div class="flex flex-wrap justify-center gap-6 text-sm" style="color: var(--text-secondary);">
          <div class="flex items-center gap-2"><span style="color: var(--success);">✓</span><span>100% Free to Join</span></div>
          <div class="flex items-center gap-2"><span style="color: var(--success);">✓</span><span>30-day free trial on launch</span></div>
          <div class="flex items-center gap-2"><span style="color: var(--success);">✓</span><span>Blind Mode FREE forever</span></div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php include '../partials/footer.php'; ?>
