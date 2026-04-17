<?php
$title       = "Social Science AI Tutor Hindi | History Geography Civics | Shrutam SAAVI";
$description = "Social Science — History, Geography, Civics, Economics. SAAVI Hindi mein padhati hai. Maps, timelines, important dates. Class 6-10.";
$canonical   = "https://shrutam.ai/subjects/social-science/";
$schema      = json_encode([
  "@context" => "https://schema.org",
  "@graph"   => [
    [
      "@type"            => "Course",
      "name"             => "Social Science — SAAVI AI Tutor Class 6–10",
      "description"      => "NCERT Social Science Class 6 se 10 tak. History, Geography, Civics, Economics. Hindi mein. Maps, timelines, dates. CG Board aur CBSE.",
      "provider"         => ["@type" => "Organization", "name" => "Shrutam", "url" => "https://shrutam.ai"],
      "educationalLevel" => "Grade 6-10",
      "inLanguage"       => "hi",
      "hasCourseInstance" => [
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 6 Social Science"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 7 Social Science"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 8 Social Science"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 9 Social Science"],
        ["@type" => "CourseInstance", "courseMode" => "online", "name" => "Class 10 Social Science"],
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
        ["@type" => "ListItem", "position" => 3, "name" => "Social Science", "item" => "https://shrutam.ai/subjects/social-science/"],
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
          <li aria-current="page" style="color: var(--text-secondary);">Social Science</li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left: Copy -->
        <div>
          <div class="flex flex-wrap gap-3 mb-6">
            <span class="badge badge-primary">🌏 Social Science</span>
            <span class="badge badge-accent">Class 6–10</span>
            <span class="pill">History</span>
            <span class="pill">Geography</span>
            <span class="pill">Civics</span>
            <span class="pill">Economics</span>
          </div>

          <h1 id="hero-heading" class="text-5xl font-heading font-bold mb-3 text-gradient">
            Social Science — History Se Geography Tak
          </h1>

          <p lang="hi" class="font-devanagari-heading text-2xl mb-5" style="color: var(--accent);">
            इतिहास रटो नहीं — कहानी समझो।
          </p>

          <p class="text-lg mb-6" style="color: var(--text-body);">
            Social Science mein 4 sub-subjects hain — History, Geography, Civics (Political Science), Economics.
            SAAVI inhe <strong style="color: var(--text-primary);">stories, maps, aur real examples</strong> se padhati hai.
            Dates yaad rehti hain jab unke peeche ki kahani samajh mein aa jaye.
          </p>

          <p class="text-base mb-8" style="color: var(--text-secondary);">
            Map practice. Important dates ke mnemonics. Constitution ki basics simple Hindi mein.
            <strong style="color: var(--accent);">Board exam mein SS highest scorable subject hai</strong> — SAAVI se sab possible hai.
          </p>

          <div class="flex flex-wrap gap-4">
            <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
            <a href="#sub-subjects" class="btn btn-outline">Sub-Subjects Dekho ↓</a>
          </div>
        </div>

        <!-- Right: Social Science chat demo -->
        <div class="card" aria-label="SAAVI Social Science teaching demonstration">
          <div class="flex items-center gap-3 pb-4 mb-4" style="border-bottom: 1px solid var(--border-subtle);">
            <div class="w-10 h-10 rounded-full flex items-center justify-center text-xl" style="background: var(--primary-glow);">🌏</div>
            <div>
              <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">SAAVI Didi — Social Science Mode</div>
              <div class="text-xs" style="color: var(--success);">● Online — Class 10 History</div>
            </div>
          </div>

          <div class="flex flex-col gap-3">
            <div class="chat-bubble chat-bubble-student">
              <p class="text-sm">Didi, 1857 ki dates yaad hi nahi rehti. Kitni dates hain ek chapter mein!</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm mb-1"><strong style="color: var(--accent);">SAAVI:</strong> Dates rote nahi — story banao! 1857 mein Mangal Pandey ne pehli goli chalayi — "57 mein saat baje." Easy?</p>
            </div>
            <div class="chat-bubble chat-bubble-saavi">
              <p class="text-sm">Phir sab ne saath diya — "Sab saath aaye = Sabhi saath." Meerut, Delhi, Lucknow — ek ke baad ek. Story follow karo, dates apne aap yaad ho jaate hain.</p>
            </div>
            <div class="chat-bubble chat-bubble-student">
              <p class="text-sm">Wow yaar, yeh toh kaam kar gaya! 1857 — "saat baje." Haha!</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 2: 4 SUB-SUBJECTS
       ============================================================ -->
  <section id="sub-subjects" class="section section-dark" aria-labelledby="sub-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-accent mb-4">📚 4 Sub-Subjects</span>
        <h2 id="sub-heading" class="text-3xl font-heading font-bold mb-3">Ek Subject — Char Duniya</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Social Science ke char hisse — SAAVI sab mein expert hai.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl mx-auto">

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">🏛️</div>
          <div class="font-heading font-bold text-xl mb-3" style="color: var(--text-primary);">Itihaas (History)</div>
          <p class="text-sm mb-4" style="color: var(--text-secondary);">
            Ancient India se Modern India tak. Mughal Empire, British rule, Freedom struggle, aur Constitution. SAAVI events ko stories mein badal deti hai — dates apne aap yaad ho jaati hain.
          </p>
          <ul class="flex flex-col gap-1 text-sm" style="color: var(--text-muted);">
            <li>• Timeline-based learning</li>
            <li>• Key dates mnemonics</li>
            <li>• Cause-and-effect connections</li>
            <li>• Prominent personalities — story format</li>
          </ul>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">🗺️</div>
          <div class="font-heading font-bold text-xl mb-3" style="color: var(--text-primary);">Bhugol (Geography)</div>
          <p class="text-sm mb-4" style="color: var(--text-secondary);">
            India ka bhugol, climate, rivers, mountains, resources. Map work. SAAVI geography ko apne state ke examples se connect karti hai — Chhattisgarh ke student ke liye Mahanadi, Indore ke liye Narmada.
          </p>
          <ul class="flex flex-col gap-1 text-sm" style="color: var(--text-muted);">
            <li>• Map audio descriptions (Blind Mode)</li>
            <li>• State-wise examples</li>
            <li>• Rivers, mountains, plains ka network</li>
            <li>• India ka climate — seasons explained</li>
          </ul>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">⚖️</div>
          <div class="font-heading font-bold text-xl mb-3" style="color: var(--text-primary);">Nagrik Shastra (Civics)</div>
          <p class="text-sm mb-4" style="color: var(--text-secondary);">
            India ka Constitution, Democracy, Rights aur Duties. SAAVI Constitution ki basics ko simple Hindi mein samjhati hai — jaise kisi bade bhai ne pehli baar explain kiya ho.
          </p>
          <ul class="flex flex-col gap-1 text-sm" style="color: var(--text-muted);">
            <li>• Fundamental Rights — simple language</li>
            <li>• Parliament ka kaam — easy analogy</li>
            <li>• Election system kaise kaam karta hai</li>
            <li>• Panchayati Raj — local government</li>
          </ul>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">💹</div>
          <div class="font-heading font-bold text-xl mb-3" style="color: var(--text-primary);">Arthshastra (Economics)</div>
          <p class="text-sm mb-4" style="color: var(--text-secondary);">
            India ki economy, poverty, development, GDP. Real-life examples — ration ki dukaan se leke reserve bank tak. SAAVI economics ko relatable banati hai.
          </p>
          <ul class="flex flex-col gap-1 text-sm" style="color: var(--text-muted);">
            <li>• GDP, per capita — plain Hindi mein</li>
            <li>• Agriculture aur industry ka balance</li>
            <li>• Poverty ke causes aur solutions</li>
            <li>• Globalisation ka asar — examples se</li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 3: KEY FEATURES
       ============================================================ -->
  <section class="section" aria-labelledby="features-heading">
    <div class="container">
      <div class="text-center mb-10">
        <span class="badge badge-primary mb-4">✨ SS Ke Liye</span>
        <h2 id="features-heading" class="text-3xl font-heading font-bold mb-3">SAAVI Social Science Ko Special Kya Banati Hai?</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Rote learning khatam — story-based samajhna shuru.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">📅</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Date Mnemonics</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Important dates ko funny tricks se yaad karwati hai SAAVI. "1857 mein saat baje" jaise tricks — exam mein kabhi nahi bhoologe.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">🗺️</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Map Practice</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Maps ko audio mein describe karti hai SAAVI — blind students ke liye bhi geography accessible hai. "North mein Himalayas, South mein Indian Ocean" — verbal navigation.
          </p>
          <span class="badge badge-accent mt-3">♿ Blind Mode</span>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">📖</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Stories Se History</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            Akbar ne kya kiya, Gandhi ne kaise lada — SAAVI inhe dry facts nahi, engaging stories mein padhati hai. Motivational aur memorable.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--primary);">
          <div class="text-3xl mb-4">⚖️</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Constitution — Simple Hindi Mein</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            "Article 21" nahi — "tumhara jeeyo ka haq" — SAAVI Constitution ko student ki bhaasha mein todke sikhati hai. Boring nahi lagta.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--accent);">
          <div class="text-3xl mb-4">🧩</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Cause-Effect Connections</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            "Aisa kyun hua?" — SAAVI events ko cause-effect chain mein connect karti hai. Ek event samjha toh poora period samajh mein aa jaata hai.
          </p>
        </div>

        <div class="card animate-on-scroll" style="border-top: 4px solid var(--success);">
          <div class="text-3xl mb-4">📝</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Board Exam Format</div>
          <p class="text-sm" style="color: var(--text-secondary);">
            1-mark, 3-mark, 5-mark questions — SAAVI sab formats mein practice karwati hai. SS mein poore marks possible hain — SAAVI bataati hai kaise.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SECTION 4: CTA
       ============================================================ -->
  <section class="section section-dark" aria-labelledby="cta-heading">
    <div class="container">
      <div class="max-w-2xl mx-auto text-center">
        <span class="badge badge-accent mb-4">🌏 SS Ready</span>
        <h2 id="cta-heading" class="text-4xl font-heading font-bold mb-4">
          Social Science Mein Top Karo — SAAVI Ke Saath
        </h2>
        <p lang="hi" class="font-devanagari text-xl mb-6" style="color: var(--accent);">
          इतिहास की कहानी सुनो — भूगोल समझो — नागरिक बनो।
        </p>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          ₹199/month. 7 din free trial. History, Geography, Civics, Economics — sab ek jagah, Hindi mein.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="/waitlist/" class="btn btn-primary text-lg px-8 py-4">Join Waitlist Free →</a>
          <a href="/classes/class-10/" class="btn btn-outline text-lg px-8 py-4">Class 10 Chapters ↓</a>
        </div>
        <p class="mt-4 text-sm" style="color: var(--text-muted);">
          ♿ Visually impaired students ke liye SS Blind Mode hamesha FREE — maps aur timelines bhi audio mein.
        </p>
      </div>
    </div>
  </section>

</main>

<?php include '../../partials/footer.php'; ?>
