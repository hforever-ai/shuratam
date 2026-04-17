<?php
$title       = "Spoken English Practice | Hinglish Se English | Shrutam SAAVI";
$description = "Spoken English practice SAAVI ke saath. Bina judge kiye. Daily conversation practice. Interview prep. Class 6-10.";
$canonical   = "https://shrutam.ai/subjects/spoken-english/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"            => "Course",
      "name"             => "Spoken English — SAAVI AI Tutor Class 6–10",
      "description"      => "Spoken English practice SAAVI ke saath. Hinglish se start karo, fluent English tak paho. Bina judge kiye. Daily conversation. Interview prep. Class 6-10.",
      "provider"         => ["@type" => "Organization", "name" => "Shrutam", "url" => "https://shrutam.ai"],
      "educationalLevel" => "Grade 6-10",
      "inLanguage"       => ["hi", "en"],
      "hasCourseInstance" => [
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Spoken English — Beginner"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Spoken English — Intermediate"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Spoken English — Interview Prep"],
      ],
      "offers"           => [
        "@type"         => "Offer",
        "price"         => "199",
        "priceCurrency" => "INR",
        "availability"  => "https://schema.org/PreOrder",
      ],
    ],
    [
      "@type"           => "BreadcrumbList",
      "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home",           "item" => "https://shrutam.ai/"],
        ["@type" => "ListItem", "position" => 2, "name" => "Subjects",       "item" => "https://shrutam.ai/subjects/"],
        ["@type" => "ListItem", "position" => 3, "name" => "Spoken English", "item" => "https://shrutam.ai/subjects/spoken-english/"],
      ],
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include '../../partials/head.php';
include '../../partials/nav.php';
?>

<main id="main">

  <!-- ============================================================
       SECTION 1: HERO
       ============================================================ -->
  <section class="section" aria-labelledby="hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">

      <!-- Breadcrumb -->
      <nav aria-label="Breadcrumb" class="mb-8">
        <ol class="flex flex-wrap items-center gap-2 text-sm" style="color: var(--text-muted);">
          <li><a href="/" style="color: var(--primary-light);">Home</a></li>
          <li aria-hidden="true">›</li>
          <li><a href="/subjects/" style="color: var(--primary-light);">Subjects</a></li>
          <li aria-hidden="true">›</li>
          <li aria-current="page" style="color: var(--text-secondary);">Spoken English</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-6">
            <span class="badge badge-primary">🗣️ Spoken English</span>
            <span class="badge badge-accent">Bina Judge Kiye</span>
            <span class="pill">Daily Practice</span>
            <span class="pill">Hinglish → English</span>
            <span class="pill">Interview Prep</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Spoken English — Bina Darr Ke Bolo
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            अंग्रेजी में डर नहीं — SAAVI के साथ बोलो।
          </p>

          <p class="text-lg mb-6" style="color: var(--text-body);">
            English bol nahi pate — isliye nahi ki vocabulary nahi, balki isliye ki
            <strong style="color: var(--text-primary);">judge hone ka darr hai</strong>.
            SAAVI ke saath koi judge nahi karta — galtiyan karo, seekho, aage badho.
            Hinglish se shuru karo, fluent English tak paho.
          </p>

          <p class="text-base mb-8" style="color: var(--text-secondary);">
            Daily conversation practice. Pronunciation tips. Class 10 ke baad interview preparation.
            <strong style="color: var(--accent);">Confidence build hota hai — roz, thoda thoda.</strong>
          </p>

          <div class="flex flex-wrap gap-4">
            <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
            <a href="#how-it-works" class="btn btn-outline">Kaise Kaam Karta Hai ↓</a>
          </div>
        </div>

        <!-- Right: Spoken English chat demo -->
        <div class="card" aria-label="SAAVI Spoken English teaching demonstration">
          <div class="flex items-center gap-3 pb-4 mb-4" style="border-bottom: 1px solid var(--border-subtle);">
            <div class="w-10 h-10 rounded-full flex items-center justify-center text-xl" style="background: var(--primary-glow);">🗣️</div>
            <div>
              <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">SAAVI Didi — Spoken English Mode</div>
              <div class="text-xs" style="color: var(--success);">● Online — Daily Conversation Practice</div>
            </div>
          </div>

          <div class="flex flex-col gap-3">
            <div class="chat-bubble chat-bubble-student">
              <p class="text-sm">Didi, I am... nervouslyy... when I am speak English. Galat hua na?</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm mb-1"><strong style="color: var(--accent);">SAAVI:</strong> Koi baat nahi! Yahan galat bolne se seekhte hain. Ek correction: "I get nervous when I speak English." Try again?</p>
            </div>
            <div class="chat-bubble chat-bubble-student">
              <p class="text-sm">I get nervous when I speak English. Better?</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm"><strong style="color: var(--accent);">Perfect!</strong> Aur confident bhi laga. Dekha — sirf ek sentence mein improve ho gaye. Roz yahi karte hain — ek sentence, ek step. 🎯</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 2: HOW IT WORKS
       ============================================================ -->
  <section id="how-it-works" class="section section-dark" aria-labelledby="how-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-accent mb-4">🚀 Hinglish → English</span>
        <h2 id="how-heading" class="text-3xl font-heading font-bold mb-3">Kaise Hoga Transition?</h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
          Koi pressure nahi. Apni speed pe. SAAVI har step pe saath hai.
        </p>
      </div>

      <div class="max-w-3xl mx-auto flex flex-col gap-6">

        <div class="flex items-start gap-5 animate-on-scroll">
          <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold flex-shrink-0" style="background: var(--primary-glow); color: var(--primary-light);">1</div>
          <div>
            <div class="font-heading font-bold text-lg mb-1" style="color: var(--text-primary);">Hinglish Se Shuru — Zero Pressure</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              "I am going to market vegetable kharidne" — yeh okay hai. SAAVI se pehle aise hi baat karo.
              Confidence build hone de — bhaasha baad mein thodi thodi improve hoti hai.
            </p>
          </div>
        </div>

        <div class="flex items-start gap-5 animate-on-scroll">
          <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold flex-shrink-0" style="background: rgba(52,211,153,0.15); color: var(--accent);">2</div>
          <div>
            <div class="font-heading font-bold text-lg mb-1" style="color: var(--text-primary);">Daily Topics — Real Conversations</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              School life, family, current events, hobbies — har roz ek naya topic. SAAVI real situations mein baat karti hai.
              Sirf grammar exercises nahi — actual baat karna seekhte hain.
            </p>
          </div>
        </div>

        <div class="flex items-start gap-5 animate-on-scroll">
          <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold flex-shrink-0" style="background: var(--primary-glow); color: var(--primary-light);">3</div>
          <div>
            <div class="font-heading font-bold text-lg mb-1" style="color: var(--text-primary);">Pronunciation Tips — Sahi Bolna Seekho</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              Common mistakes jo Indian students karte hain — "w" ko "v" bolna, "th" pronunciation.
              SAAVI gentle corrections deti hai — embarrassing nahi, encouraging hai.
            </p>
          </div>
        </div>

        <div class="flex items-start gap-5 animate-on-scroll">
          <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold flex-shrink-0" style="background: rgba(52,211,153,0.15); color: var(--accent);">4</div>
          <div>
            <div class="font-heading font-bold text-lg mb-1" style="color: var(--text-primary);">Fluency — Apni Speed Pe</div>
            <p class="text-sm" style="color: var(--text-secondary);">
              3 mahine ki daily practice mein zyaadatar students comfortable ho jaate hain. Koi timeline pressure nahi —
              SAAVI tab tak saath hai jab tak confidence nahi aa jaata.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 3: WHAT YOU LEARN
       ============================================================ -->
  <section class="section" aria-labelledby="learn-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-primary mb-4">📖 Kya Sikhoge</span>
        <h2 id="learn-heading" class="text-3xl font-heading font-bold mb-3">SAAVI Spoken English Mein Kya Milega?</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Grammar se leke interview prep tak — sab kuch.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">💬</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Daily Conversations</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Introducing yourself, asking for directions, at a shop, in school — real situations mein baat karna. Har roz ek naya scenario.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">🎯</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Common Mistakes Correction</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            "Yesterday I have gone" → "Yesterday I went." Indian students ke common errors — SAAVI gently correct karti hai aur explain karti hai kyun.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">🎤</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Pronunciation Practice</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            "Vegetable" nahi "vejtable" — SAAVI sahi pronunciation sunati hai aur tumhari pronunciation pe feedback deti hai. Sunte sunte improve hota hai.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">💼</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Interview Preparation</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Class 10 ke baad college admission interviews, scholarship interviews. "Tell me about yourself" se leke "What are your strengths?" tak — SAAVI practice karwati hai.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">📚</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Vocabulary Building</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Context mein words seekhne ka tarika. Flashcards nahi — conversations mein naturally words aa jate hain. Zyada effective aur zyada yaad rehta hai.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">💪</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Confidence Building</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            SAAVI kabhi nahi hasati — kabhi nahi judge karti. Galti karo — SAAVI samjhati hai. Roz thoda thoda badhte raho — confidence apne aap aata hai.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 4: NO JUDGMENT — SAFE SPACE
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="safe-heading">
    <div class="container">
      <div class="max-w-3xl mx-auto">
        <div class="text-center mb-8">
          <span class="badge badge-accent mb-4">🛡️ Safe Space</span>
          <h2 id="safe-heading" class="text-3xl font-heading font-bold mb-3">Yahan Galti Karna Okay Hai</h2>
          <p class="text-lg" style="color: var(--text-secondary);">
            English sirf wahi bol sakte hain jinhe galat bolne ka darr nahi. SAAVI woh jagah hai.
          </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

          <div class="flex items-start gap-4 animate-on-scroll">
            <span class="text-2xl">🚫</span>
            <div>
              <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Koi Hasi Nahi</div>
              <p class="text-sm" style="color: var(--text-secondary);">SAAVI ek AI hai — woh kabhi nahi hasegi tum par. Class mein jo darr lagta hai, woh yahan bilkul nahi.</p>
            </div>
          </div>

          <div class="flex items-start gap-4 animate-on-scroll">
            <span class="text-2xl">🔁</span>
            <div>
              <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Ek Sentence 10 Baar Bol Sakte Ho</div>
              <p class="text-sm" style="color: var(--text-secondary);">Koi judge nahi. Ek hi cheez tab tak practice karo jab tak bilkul confident na ho jao. SAAVI hamesha ready hai.</p>
            </div>
          </div>

          <div class="flex items-start gap-4 animate-on-scroll">
            <span class="text-2xl">⏰</span>
            <div>
              <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Apni Speed Pe</div>
              <p class="text-sm" style="color: var(--text-secondary);">Koi timeline nahi. Koi pressure nahi. Raat ko, subah ko, jab bhi man kare — SAAVI ready hai.</p>
            </div>
          </div>

          <div class="flex items-start gap-4 animate-on-scroll">
            <span class="text-2xl">✅</span>
            <div>
              <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Encouraging Feedback</div>
              <p class="text-sm" style="color: var(--text-secondary);">SAAVI pehle achchha batati hai — "Yeh sentence bahut acha tha!" — phir ek cheez improve karne ko kehti hai. Dono.</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 5: CTA
       ============================================================ -->
  <section class="section" aria-labelledby="cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-primary mb-4">🗣️ English Ready</span>
        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          Aaj Se Shuru Karo — Bina Darr Ke
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-6" style="color: var(--accent);">
          SAAVI के साथ अंग्रेजी बोलो — कोई जज नहीं।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          ₹199/month. 7 din free trial. Spoken English daily practice — Hinglish se confident English tak.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="/waitlist/" class="btn btn-primary text-lg px-8 py-4">Join Waitlist Free →</a>
          <a href="/subjects/" class="btn btn-outline text-lg px-8 py-4">Baaki Subjects Dekho →</a>
        </div>
        <p class="mt-4 text-sm" style="color: var(--text-muted);">
          ♿ Visually impaired students ke liye Spoken English bhi hamesha FREE — audio-first platform hai.
        </p>
      </div>
    </div>
  </section>

</main>

<?php include '../../partials/footer.php'; ?>
