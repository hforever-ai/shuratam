<?php
$title       = "Privacy Policy | Shrutam — Aarambha";
$description = "Shrutam privacy policy. How we handle student data, parent data, and accessibility data.";
$canonical   = "https://shrutam.ai/privacy/";
$schema      = '';

include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       HERO
       ======================================================== -->
  <section class="section" aria-labelledby="privacy-hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center max-w-2xl mx-auto">
        <span class="badge badge-primary mb-4">Legal</span>
        <h1 id="privacy-hero-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
          Privacy Policy
        </h1>
        <p class="text-lg" style="color: var(--text-secondary);">
          Last updated: April 2026 &mdash; Aarambha
        </p>
      </div>
    </div>
  </section>

  <!-- ========================================================
       POLICY CONTENT
       ======================================================== -->
  <section class="section section-dark" aria-label="Privacy policy content">
    <div class="container">
      <div class="max-w-3xl mx-auto flex flex-col gap-10">

        <!-- Information We Collect -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">1. Information We Collect</h2>
          <p class="text-sm mb-3" style="color: var(--text-secondary);">When you use Shrutam, we collect the following information:</p>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-body);">
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span><strong style="color: var(--text-primary);">Account Information:</strong> Name, email address, class/grade, and board (CG Board / CBSE).</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span><strong style="color: var(--text-primary);">Usage Data:</strong> Chapters accessed, doubts asked, time spent, quiz scores, and learning progress.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span><strong style="color: var(--text-primary);">Device Information:</strong> Device type, operating system, browser type, and IP address for security purposes.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span><strong style="color: var(--text-primary);">Parent Contact (optional):</strong> WhatsApp number if parent opts into weekly progress reports.</span></li>
          </ul>
        </div>

        <!-- How We Use Your Information -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">2. How We Use Your Information</h2>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-body);">
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span>Provide and personalize the Shrutam learning experience through SAAVI.</span></li>
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span>Improve content quality, fix errors, and add new subjects based on usage patterns.</span></li>
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span>Send progress reports and important updates about your account or the service.</span></li>
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span>Detect and prevent fraud, abuse, or unauthorized access.</span></li>
            <li class="flex gap-2" style="color: var(--text-muted);"><span>✗</span> <span>We do NOT sell your data. We do NOT use your data for advertising.</span></li>
          </ul>
        </div>

        <!-- Student Data Protection -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface); border-left: 4px solid var(--accent);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--accent);">3. Student Data Protection (Minors)</h2>
          <p class="text-sm mb-3" style="color: var(--text-body);">Shrutam is used by students, many of whom are minors. We take extra care:</p>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-body);">
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span>Students under 13 must have a parent or guardian create and manage their account.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span>We do not collect more data than necessary for delivering the educational service.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span>No behavioural advertising is shown to students, ever.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span>Student learning data is not shared with third parties for any commercial purpose.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span>Parents can request full deletion of their child's data at any time.</span></li>
          </ul>
        </div>

        <!-- Blind Mode Data -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">4. Blind Mode Data</h2>
          <p class="text-sm" style="color: var(--text-body);">
            No additional data is collected when a student uses Blind Mode. Enabling Blind Mode does not create a separate data profile, does not require additional registration, and does not affect the student's privacy in any way. Blind Mode is a free, unrestricted accessibility feature.
          </p>
        </div>

        <!-- Data Storage and Security -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">5. Data Storage and Security</h2>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-body);">
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span>All data is encrypted in transit (HTTPS/TLS) and at rest (AES-256).</span></li>
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span>Servers are hosted on secure cloud infrastructure with regular security audits.</span></li>
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span>Access to student data within our team is strictly need-to-know.</span></li>
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span>We retain your data as long as your account is active, or as required by Indian law.</span></li>
          </ul>
        </div>

        <!-- Third-Party Services -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">6. Third-Party Services</h2>
          <p class="text-sm mb-3" style="color: var(--text-body);">We use a limited set of third-party services:</p>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-body);">
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span><strong style="color: var(--text-primary);">Google Fonts:</strong> For loading Nunito and Noto Devanagari fonts. Google may log your IP when fonts are fetched.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span><strong style="color: var(--text-primary);">Analytics:</strong> Anonymous, aggregated usage analytics to understand which features help students most. No personal data is shared.</span></li>
            <li class="flex gap-2"><span style="color: var(--accent);">•</span> <span><strong style="color: var(--text-primary);">Payment Processor:</strong> For paid subscriptions. We do not store your payment card details — these are handled by the payment provider directly.</span></li>
          </ul>
        </div>

        <!-- Your Rights -->
        <div class="card animate-on-scroll" style="border: 1px solid var(--border-subtle); background: var(--bg-surface);">
          <h2 class="text-xl font-heading font-bold mb-4" style="color: var(--primary-light);">7. Your Rights</h2>
          <ul class="flex flex-col gap-2 text-sm" style="color: var(--text-body);">
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span><strong style="color: var(--text-primary);">Access:</strong> Request a copy of all data we hold about you.</span></li>
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span><strong style="color: var(--text-primary);">Correction:</strong> Ask us to correct inaccurate information.</span></li>
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span><strong style="color: var(--text-primary);">Deletion:</strong> Request deletion of your account and all associated data.</span></li>
            <li class="flex gap-2"><span style="color: var(--success);">✓</span> <span><strong style="color: var(--text-primary);">Portability:</strong> Request your learning data in a machine-readable format.</span></li>
          </ul>
          <p class="text-sm mt-4" style="color: var(--text-secondary);">
            To exercise any of these rights, email <a href="mailto:privacy@shrutam.ai" style="color: var(--primary-light);">privacy@shrutam.ai</a>. We will respond within 30 days.
          </p>
        </div>

        <!-- Entity + Contact -->
        <div class="p-6 rounded-2xl text-center" style="background: var(--bg-elevated); border: 1px solid var(--border-default);">
          <p class="text-sm" style="color: var(--text-secondary);">
            This policy applies to Shrutam, a product of <strong style="color: var(--text-primary);">Aarambha</strong> (Aarambha), India.<br>
            Privacy questions: <a href="mailto:privacy@shrutam.ai" style="color: var(--primary-light);">privacy@shrutam.ai</a>
          </p>
        </div>

      </div>
    </div>
  </section>

</main>

<?php include '../partials/footer.php'; ?>
