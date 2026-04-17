<?php
$title       = "Join Shrutam Waitlist — Free Early Access | AI Tutor Hindi";
$description = "Shrutam waitlist join karo — May 20, 2026 launch. Free 7 day trial. Early joiners get 30-day extended trial. No credit card.";
$canonical   = "https://shrutam.ai/waitlist/";
$schema      = '';

include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       HERO
       ======================================================== -->
  <section class="section" aria-labelledby="waitlist-hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center max-w-2xl mx-auto mb-10">
        <span class="badge badge-accent mb-4">🚀 Launching May 20, 2026</span>
        <h1 id="waitlist-hero-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
          May 20 Launch — Pehle List Mein Aao
        </h1>
        <p class="text-xl" style="color: var(--text-secondary);">
          Early joiners ko milega <strong style="color: var(--accent);">30-din extended free trial</strong>. Pehle 1,000 logon ke liye sirf.
        </p>
      </div>

      <!-- Countdown Timer -->
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

      <!-- Waitlist Form -->
      <div class="max-w-lg mx-auto animate-on-scroll">
        <div class="card" style="border: 2px solid var(--border-default); box-shadow: 0 0 50px var(--primary-glow);">
          <h2 class="text-xl font-heading font-bold text-center mb-6" style="color: var(--text-primary);">
            Abhi Join Karo — Free Hai
          </h2>
          <?php include '../partials/waitlist-form.php'; ?>
        </div>
      </div>

      <!-- Benefits -->
      <div class="flex flex-wrap justify-center gap-6 mt-10 text-sm" style="color: var(--text-secondary);">
        <div class="flex items-center gap-2">
          <span style="color: var(--accent);">🎁</span>
          <span><strong style="color: var(--text-primary);">30-day extended trial</strong> — early joiners only</span>
        </div>
        <div class="flex items-center gap-2">
          <span style="color: var(--success);">✓</span>
          <span>No credit card required</span>
        </div>
        <div class="flex items-center gap-2">
          <span style="color: var(--success);">✓</span>
          <span>No spam — sirf launch pe ek message</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SOCIAL PROOF
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="social-proof-heading">
    <div class="container">
      <div class="text-center mb-10">
        <h2 id="social-proof-heading" class="text-4xl font-heading font-bold mb-4">500+ Families Pehle Se Hain</h2>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">In logon ne pehle suna — ab tumhari baari hai.</p>

        <!-- Progress bar -->
        <div class="max-w-sm mx-auto mb-10">
          <div class="flex justify-between text-sm mb-2">
            <span style="color: var(--text-secondary);">500 joined</span>
            <span style="color: var(--text-muted);">Goal: 1,000</span>
          </div>
          <div class="w-full h-4 rounded-full" style="background: var(--bg-elevated);">
            <div class="h-4 rounded-full" style="width: 50%; background: linear-gradient(90deg, var(--primary), var(--accent));"></div>
          </div>
          <p class="text-xs mt-2" style="color: var(--text-muted);">50% full — join before launch!</p>
        </div>

        <!-- Quick testimonials -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

          <div class="card text-left animate-on-scroll">
            <div class="flex items-center gap-1 mb-3" aria-label="5 stars">
              <span style="color: var(--accent);">★★★★★</span>
            </div>
            <blockquote>
              <p class="text-sm italic mb-3" style="color: var(--text-body);">"Meri beti Class 8 mein Science mein fail ho rahi thi. 2 hafte mein 78 marks aaye! SAAVI didi ke jaisa padhati hai."</p>
            </blockquote>
            <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">Sunita Verma</div>
            <div class="text-xs" style="color: var(--text-muted);">Raipur · Class 8 parent</div>
          </div>

          <div class="card text-left animate-on-scroll">
            <div class="flex items-center gap-1 mb-3" aria-label="5 stars">
              <span style="color: var(--accent);">★★★★★</span>
            </div>
            <blockquote>
              <p class="text-sm italic mb-3" style="color: var(--text-body);">"Main visually impaired hoon. Pehli baar ek app hai jo actually mera hai. SAAVI se sunke Maths seekh raha hoon."</p>
            </blockquote>
            <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">Rohan Patel</div>
            <div class="text-xs" style="color: var(--text-muted);">Bilaspur · Class 10 student</div>
          </div>

          <div class="card text-left animate-on-scroll">
            <div class="flex items-center gap-1 mb-3" aria-label="5 stars">
              <span style="color: var(--accent);">★★★★★</span>
            </div>
            <blockquote>
              <p class="text-sm italic mb-3" style="color: var(--text-body);">"₹199 mein itna? Teen tutor try kiye — sabse zyada paisa gaya, result nahi mila. SAAVI ne ek hafte mein confidence double kar diya."</p>
            </blockquote>
            <div class="font-heading font-bold text-sm" style="color: var(--text-primary);">Ramesh Kumar</div>
            <div class="text-xs" style="color: var(--text-muted);">Durg · Class 9 parent</div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       WHAT YOU'LL GET
       ======================================================== -->
  <section class="section" aria-labelledby="get-heading">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="get-heading" class="text-4xl font-heading font-bold mb-4">Launch Pe Kya Milega?</h2>
        <p class="text-lg" style="color: var(--text-secondary);">Waitlist join karo — launch pe yeh sab tumhara hoga.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-4xl mx-auto">

        <div class="card animate-on-scroll flex gap-4 items-start">
          <div class="text-3xl flex-shrink-0">🤖</div>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">SAAVI Access</div>
            <p class="text-sm" style="color: var(--text-secondary);">Tumhari personal AI teacher didi — 24/7, Hindi mein, tumhare pace pe.</p>
          </div>
        </div>

        <div class="card animate-on-scroll flex gap-4 items-start">
          <div class="text-3xl flex-shrink-0">📚</div>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">5 Subjects</div>
            <p class="text-sm" style="color: var(--text-secondary);">Science, Maths, Hindi, Social Science, English — sab ek jagah.</p>
          </div>
        </div>

        <div class="card animate-on-scroll flex gap-4 items-start">
          <div class="text-3xl flex-shrink-0">🎯</div>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Board-Specific Content</div>
            <p class="text-sm" style="color: var(--text-secondary);">CG Board aur CBSE — exactly wahi jo school mein padhaya jaata hai.</p>
          </div>
        </div>

        <div class="card animate-on-scroll flex gap-4 items-start">
          <div class="text-3xl flex-shrink-0">📝</div>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Mock Exams</div>
            <p class="text-sm" style="color: var(--text-secondary);">Board pattern pe practice — detailed feedback ke saath.</p>
          </div>
        </div>

        <div class="card animate-on-scroll flex gap-4 items-start">
          <div class="text-3xl flex-shrink-0">👨‍👩‍👧</div>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Parent Portal</div>
            <p class="text-sm" style="color: var(--text-secondary);">Maa-baap ke liye weekly WhatsApp progress report — free included.</p>
          </div>
        </div>

        <div class="card animate-on-scroll flex gap-4 items-start">
          <div class="text-3xl flex-shrink-0">♿</div>
          <div>
            <div class="font-heading font-bold mb-1" style="color: var(--accent);">Blind Mode — Free Forever</div>
            <p class="text-sm" style="color: var(--text-secondary);">India ka pehla AI tutor jo blind aur visually impaired students ke liye bhi 100% kaam karta hai.</p>
          </div>
        </div>

      </div>

      <div class="text-center mt-10">
        <a href="#main" class="btn btn-primary">Waitlist Join Karo — Abhi →</a>
      </div>
    </div>
  </section>

</main>

<?php include '../partials/footer.php'; ?>
