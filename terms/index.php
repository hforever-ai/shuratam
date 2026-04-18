<?php
$title       = "Terms of Service | Shrutam — Aarambha";
$description = "Shrutam terms of service. Usage terms, subscription, refund policy, content rights.";
$canonical   = "https://shrutam.ai/terms/";
$schema      = '';

include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       HERO
       ======================================================== -->
  <section class="section" aria-labelledby="terms-hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center max-w-2xl mx-auto">
        <span class="badge badge-primary mb-4">Legal</span>
        <h1 id="terms-hero-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
          Terms of Service
        </h1>
        <p class="text-lg" style="color: var(--text-secondary);">
          Last updated: April 2026 &mdash; Aarambha
        </p>
      </div>
    </div>
  </section>

  <!-- ========================================================
       TERMS CONTENT
       ======================================================== -->
  <section class="section section-dark" aria-label="Terms of service content">
    <div class="container">
      <div class="max-w-3xl mx-auto flex flex-col gap-10">

        <!-- Acceptance of Terms -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">1. Acceptance of Terms</h2>
          <p class="text-sm" style="color: var(--text-body);">
            By accessing or using Shrutam (the "Service"), you agree to be bound by these Terms of Service. If you do not agree, do not use the Service. These terms constitute a legally binding agreement between you and Aarambha, operating under the brand Aarambha.
          </p>
        </div>

        <!-- Account Registration -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">2. Account Registration</h2>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-body);">
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span>Students must be 13 years or older to register an account independently.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span>Students under 13 must have explicit consent from a parent or legal guardian, who must create and manage the account.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span>You are responsible for maintaining the confidentiality of your account credentials.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span>You must provide accurate, current, and complete information during registration.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span>One account per student. Sharing accounts is a violation of these terms.</span></li>
          </ul>
        </div>

        <!-- Subscription and Payment -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">3. Subscription and Payment</h2>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-body);">
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span><strong style="color: var(--text-primary);">Free Trial:</strong> 7 days, no credit card required. 2 subjects, 5 doubts per day, basic features.</span></li>
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span><strong style="color: var(--text-primary);">Subscription:</strong> ₹199/month after the free trial. Billed monthly. Cancel anytime.</span></li>
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span><strong style="color: var(--text-primary);">Payment Methods:</strong> UPI, Paytm, debit card, and credit card accepted.</span></li>
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span><strong style="color: var(--text-primary);">Renewal:</strong> Subscriptions renew automatically each month unless cancelled before the renewal date.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span>Prices may change with 30 days' notice. Existing subscribers get the old price until the next renewal after notice.</span></li>
          </ul>
        </div>

        <!-- Refund Policy -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface); border-left: 4px solid var(--success);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--success);">4. Refund Policy</h2>
          <p class="text-sm mb-3" style="color: var(--text-body);">
            We offer a <strong style="color: var(--success);">7-day money-back guarantee</strong> after your first paid subscription charge. If you are not satisfied, contact us within 7 days of your first payment and we will issue a full refund — no questions asked.
          </p>
          <p class="text-sm" style="color: var(--text-secondary);">
            Subsequent renewals are not eligible for refund after the billing period has begun. To avoid unwanted charges, cancel before the renewal date.
          </p>
        </div>

        <!-- Content Rights -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">5. Content Rights</h2>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-body);">
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span><strong style="color: var(--text-primary);">Educational Content:</strong> All lessons, explanations, quizzes, and audio generated by SAAVI are the intellectual property of Aarambha. You may use this content for personal, non-commercial learning only.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span><strong style="color: var(--text-primary);">Personal Notes:</strong> Notes and highlights you create within the app belong to you. You can export them at any time.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span>You may not reproduce, distribute, or commercially exploit Shrutam content without written permission.</span></li>
          </ul>
        </div>

        <!-- Blind Mode -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface); border-left: 4px solid var(--accent);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--accent);">6. Blind Mode</h2>
          <p class="text-sm" style="color: var(--text-body);">
            Blind Mode — the full audio-first experience for visually impaired students — is free and unrestricted. There is no subscription required for Blind Mode. It will remain free permanently as a commitment from Aarambha. No terms or conditions apply specifically to Blind Mode usage beyond the general terms above.
          </p>
        </div>

        <!-- Prohibited Uses -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">7. Prohibited Uses</h2>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-body);">
            <li class="flex gap-2"><span style="color: #f87171;">✗</span> <span>Sharing account credentials with others (one account = one student).</span></li>
            <li class="flex gap-2"><span style="color: #f87171;">✗</span> <span>Using Shrutam for any commercial purpose — reselling, tutoring businesses using SAAVI, etc.</span></li>
            <li class="flex gap-2"><span style="color: #f87171;">✗</span> <span>Attempting to reverse-engineer, scrape, or extract SAAVI's content or model.</span></li>
            <li class="flex gap-2"><span style="color: #f87171;">✗</span> <span>Uploading or transmitting harmful, abusive, or illegal content through any communication feature.</span></li>
            <li class="flex gap-2"><span style="color: #f87171;">✗</span> <span>Circumventing any access control, paywall, or parental bedtime lock.</span></li>
          </ul>
        </div>

        <!-- Termination -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">8. Termination</h2>
          <p class="text-sm" style="color: var(--text-body);">
            You may cancel your account at any time from the app settings. We reserve the right to suspend or terminate accounts that violate these terms without prior notice. On termination, access to the Service stops immediately. We may retain data as required by law; all other data will be deleted within 90 days.
          </p>
        </div>

        <!-- Limitation of Liability -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">9. Limitation of Liability</h2>
          <p class="text-sm" style="color: var(--text-body);">
            Shrutam is an educational supplement, not a replacement for school instruction or professional advice. Aarambha is not liable for academic outcomes, exam results, or decisions made based on content provided by SAAVI. Our total liability to you for any claim arising under these terms shall not exceed the amount you paid in the 3 months preceding the claim.
          </p>
        </div>

        <!-- Governing Law -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">10. Governing Law</h2>
          <p class="text-sm" style="color: var(--text-body);">
            These terms are governed by the laws of India. Any disputes shall be subject to the exclusive jurisdiction of courts in Chhattisgarh, India.
          </p>
        </div>

        <!-- Entity + Contact -->
        <div class="p-6 rounded-2xl text-center" style="background: var(--bg-elevated); border: 1px solid var(--border-default);">
          <p class="text-sm" style="color: var(--text-secondary);">
            These Terms of Service apply to Shrutam, a product of <strong style="color: var(--text-primary);">Aarambha</strong> (Aarambha), India.<br>
            Legal questions: <a href="mailto:legal@shrutam.ai" style="color: var(--primary-light);">legal@shrutam.ai</a>
          </p>
        </div>

      </div>
    </div>
  </section>

</main>

<?php include '../partials/footer.php'; ?>
