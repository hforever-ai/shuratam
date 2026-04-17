<?php
$title       = "Parent Portal — Bachche Ki Padhai Track Karo Daily | Shrutam";
$description = "Parents ke liye — daily progress report, bedtime lock, WhatsApp weekly update. Bachche safely padhte hain. No ads. No social.";
$canonical   = "https://shrutam.ai/parent-portal/";
$schema      = '';

include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       HERO
       ======================================================== -->
  <section class="section" aria-labelledby="parent-hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center max-w-3xl mx-auto">
        <span class="badge badge-primary mb-4">Parents Ke Liye</span>
        <h1 id="parent-hero-heading" class="text-4xl font-heading font-bold mb-4 text-gradient">
          Parent Portal — Aapke Bachche Ki Padhai, Aapki Nigrani Mein
        </h1>
        <p class="text-xl mb-6" style="color: var(--text-secondary);">
          Bachcha safely padh raha hai ki nahi — yeh aap daily dekhenge. WhatsApp pe. Bina kisi extra app ke.
        </p>
        <div class="flex flex-wrap gap-4 justify-center">
          <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
          <a href="#demo" class="btn btn-outline">SAAVI Demo Dekho</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       WHAT IS PARENT PORTAL
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="concept-heading">
    <div class="container">
      <div class="max-w-3xl mx-auto">
        <h2 id="concept-heading" class="text-3xl font-heading font-bold mb-6 text-center" style="color: var(--primary-light);">
          Parent Portal Kya Hai?
        </h2>
        <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary); background: var(--bg-surface);">
          <p class="text-lg leading-relaxed mb-4" style="color: var(--text-body);">
            Jab aapka bachcha Shrutam pe padhta hai — SAAVI se doubts poochta hai, mock tests deta hai, chapters revise karta hai — tab har cheez track hoti hai. Parent Portal mein aap yeh sab dekh sakte ho.
          </p>
          <p class="text-base" style="color: var(--text-secondary);">
            Alag se koi app nahi. WhatsApp pe weekly summary. Bedtime lock jo bachcha hack nahi kar sakta. Safe environment — no ads, no social media, no strangers.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       6 FEATURES GRID
       ======================================================== -->
  <section class="section" aria-labelledby="features-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center mb-12">
        <h2 id="features-heading" class="text-3xl font-heading font-bold mb-4" style="color: var(--primary-light);">
          Aapko Kya Milega
        </h2>
        <p class="text-lg" style="color: var(--text-secondary);">6 features jo har parent chahta hai.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">

        <!-- 1. Daily Progress Report -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <div class="text-4xl mb-3">📋</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Daily Progress Report</div>
          <p class="text-sm" style="color: var(--text-secondary);">Aaj bachche ne kya padhha, kitni der padhha, kaunse doubts pooche — sab kuch daily dashboard pe. Login karke ek nazar mein sab dikhta hai.</p>
        </div>

        <!-- 2. Subject-wise Weakness Alerts -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <div class="text-4xl mb-3">⚠️</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Subject-wise Weakness Alerts</div>
          <p class="text-sm" style="color: var(--text-secondary);">Agar bachcha Science ke ek topic mein bar bar galti kar raha hai, aapko alert milega. Guess nahi — data se pata chalega kahan extra attention chahiye.</p>
        </div>

        <!-- 3. Bedtime Lock -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface); border-top: 3px solid var(--accent);">
          <div class="text-4xl mb-3">🔒</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Bedtime Lock</div>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">Aap time set karo — raat 10 PM. Us time ke baad SAAVI automatically band. Bachcha override nahi kar sakta. Agle subah automatically open. Neend bhi, padhai bhi.</p>
          <span class="text-xs font-heading font-bold px-2 py-1 rounded-full" style="background: var(--bg-elevated); color: var(--accent);">No Override — Parent Controls</span>
        </div>

        <!-- 4. WhatsApp Weekly Summary -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <div class="text-4xl mb-3">💬</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">WhatsApp Weekly Summary</div>
          <p class="text-sm" style="color: var(--text-secondary);">Har hafte ek simple summary — WhatsApp pe. Kaunsa chapter padhha, score kaisa raha, kahan problem hai. Koi extra app download nahi — WhatsApp already sab ke paas hai.</p>
        </div>

        <!-- 5. Safe Environment -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface); border-top: 3px solid var(--success);">
          <div class="text-4xl mb-3">🛡️</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">Safe Environment</div>
          <p class="text-sm" style="color: var(--text-secondary);">Shrutam mein koi ads nahi. Koi social media nahi. Koi strangers se chat nahi. Sirf padhai. Ek safe digital space jahan aap apne bachche ko confidently bhej sako.</p>
          <div class="mt-3 flex flex-wrap gap-2 text-xs">
            <span class="flex items-center gap-1" style="color: var(--success);"><span>✓</span> No ads</span>
            <span class="flex items-center gap-1" style="color: var(--success);"><span>✓</span> No social</span>
            <span class="flex items-center gap-1" style="color: var(--success);"><span>✓</span> No strangers</span>
          </div>
        </div>

        <!-- 6. NCERT Aligned Content -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <div class="text-4xl mb-3">📚</div>
          <div class="font-heading font-bold text-lg mb-2" style="color: var(--text-primary);">NCERT Aligned Content</div>
          <p class="text-sm" style="color: var(--text-secondary);">Sab content NCERT ke exact syllabus se aligned hai — CG Board aur CBSE ke liye. Koi random internet content nahi. Jo school mein padh raha hai, wohi SAAVI padhati hai. Aap trust kar sakte ho.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       DEMO MODE FOR PARENTS
       ======================================================== -->
  <section id="demo" class="section section-dark" aria-labelledby="demo-heading">
    <div class="container">
      <div class="max-w-3xl mx-auto text-center">
        <h2 id="demo-heading" class="text-3xl font-heading font-bold mb-6" style="color: var(--primary-light);">
          Kya Aap Dekhna Chahte Ho?
        </h2>
        <div class="card animate-on-scroll" style="border: 2px solid var(--primary); background: var(--bg-surface);">
          <div class="text-5xl mb-4">👨‍👩‍👧</div>
          <p class="text-lg mb-4" style="color: var(--text-body);">
            Parent account se aap <strong style="color: var(--accent);">Demo Mode</strong> mein SAAVI try kar sakte ho. Dekhoge ki bachcha kaisa padhhega, SAAVI kaise explain karti hai, kaise doubts solve hote hain.
          </p>
          <p class="text-base mb-6" style="color: var(--text-secondary);">
            Ek confident maa-baap bacche ki padhai mein zyada support karte hain. Pehle khud dekhho, phir decide karo.
          </p>
          <a href="/waitlist/" class="btn btn-primary">Join Waitlist — Demo Access Milega →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       CTA
       ======================================================== -->
  <section class="section" aria-labelledby="parent-cta-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center max-w-xl mx-auto">
        <h2 id="parent-cta-heading" class="text-4xl font-heading font-bold mb-4">Apne Bachche Ki Padhai Mein Join Karo</h2>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          May 20, 2026 launch. Waitlist mein join karo — pehle access milega. No credit card.
        </p>
        <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
        <p class="text-sm mt-6" style="color: var(--text-muted);">
          Questions? <a href="/contact/" style="color: var(--primary-light);">humse baat karo →</a>
        </p>
      </div>
    </div>
  </section>

</main>

<?php include '../partials/footer.php'; ?>
