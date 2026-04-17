<?php
$title       = "Contact Shrutam — Humse Baat Karo | Shrutam";
$description = "Shrutam se contact karo. Questions, feedback, partnerships. accessibility@shrutam.ai for blind mode.";
$canonical   = "https://shrutam.ai/contact/";
$schema      = '';

include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main">

  <!-- ========================================================
       HERO
       ======================================================== -->
  <section class="section" aria-labelledby="contact-hero-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center max-w-2xl mx-auto">
        <span class="badge badge-primary mb-4">Baat Karo</span>
        <h1 id="contact-hero-heading" class="text-5xl font-heading font-bold mb-4 text-gradient">
          Humse Baat Karo
        </h1>
        <p class="text-xl" style="color: var(--text-secondary);">
          Sawaal, feedback, partnerships — sab ke liye hum yahan hain.
        </p>
      </div>
    </div>
  </section>

  <!-- ========================================================
       CONTACT FORM + EMAIL ADDRESSES
       ======================================================== -->
  <section class="section section-dark" aria-labelledby="contact-form-heading">
    <div class="container">
      <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">

        <!-- Form -->
        <div>
          <h2 id="contact-form-heading" class="text-2xl font-heading font-bold mb-6" style="color: var(--primary-light);">
            Message Bhejo
          </h2>

          <form id="contact-form" novalidate class="flex flex-col gap-5">
            <div>
              <label for="contact-name" class="block text-sm font-heading font-bold mb-2" style="color: var(--text-secondary);">Naam</label>
              <input
                id="contact-name"
                name="name"
                type="text"
                required
                autocomplete="name"
                placeholder="Tumhara naam"
                class="input w-full"
              />
            </div>

            <div>
              <label for="contact-email" class="block text-sm font-heading font-bold mb-2" style="color: var(--text-secondary);">Email</label>
              <input
                id="contact-email"
                name="email"
                type="email"
                required
                autocomplete="email"
                placeholder="tumhari@email.com"
                class="input w-full"
              />
            </div>

            <div>
              <label for="contact-message" class="block text-sm font-heading font-bold mb-2" style="color: var(--text-secondary);">Message</label>
              <textarea
                id="contact-message"
                name="message"
                rows="5"
                required
                placeholder="Kya poochna tha?"
                class="input w-full"
                style="resize: vertical;"
              ></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
              Message Bhejo →
            </button>

            <!-- Success -->
            <div id="contact-success" role="alert" aria-live="polite" class="hidden p-4 rounded-xl text-sm font-heading font-bold" style="background: var(--success-glow, rgba(16,185,129,0.1)); color: var(--success); border: 1px solid var(--success);">
              Message mil gaya! Hum jaldi reply karenge.
            </div>

            <!-- Error -->
            <div id="contact-error" role="alert" aria-live="polite" class="hidden p-4 rounded-xl text-sm font-heading font-bold" style="background: rgba(239,68,68,0.1); color: #f87171; border: 1px solid #f87171;">
              Kuch gadbad ho gayi. Dobara try karo ya email karo.
            </div>
          </form>
        </div>

        <!-- Email addresses -->
        <div>
          <h2 class="text-2xl font-heading font-bold mb-6" style="color: var(--primary-light);">
            Direct Email
          </h2>

          <div class="flex flex-col gap-4">

            <div class="card animate-on-scroll" style="border-left: 4px solid var(--primary); background: var(--bg-surface);">
              <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">General</div>
              <a href="mailto:hello@shrutam.ai" class="text-sm" style="color: var(--primary-light);">hello@shrutam.ai</a>
              <p class="text-xs mt-1" style="color: var(--text-muted);">Sawaal, feedback, aur baaki sab kuch.</p>
            </div>

            <div class="card animate-on-scroll" style="border-left: 4px solid var(--accent); background: var(--bg-surface);">
              <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Accessibility &amp; Blind Mode</div>
              <a href="mailto:accessibility@shrutam.ai" class="text-sm" style="color: var(--accent);">accessibility@shrutam.ai</a>
              <p class="text-xs mt-1" style="color: var(--text-muted);">Blind mode, screen reader issues, special needs support.</p>
            </div>

            <div class="card animate-on-scroll" style="border-left: 4px solid var(--success); background: var(--bg-surface);">
              <div class="font-heading font-bold mb-1" style="color: var(--text-primary);">Schools &amp; Institutions</div>
              <a href="mailto:schools@shrutam.ai" class="text-sm" style="color: var(--success);">schools@shrutam.ai</a>
              <p class="text-xs mt-1" style="color: var(--text-muted);">Bulk pricing, teacher dashboard, partnerships.</p>
            </div>

          </div>

          <div class="mt-8 p-4 rounded-2xl" style="background: var(--bg-surface); border: 1px solid var(--border-subtle);">
            <div class="text-xs font-heading font-bold mb-1" style="color: var(--text-muted);">Parent Company</div>
            <div class="font-heading font-bold" style="color: var(--text-primary);">Aarambha</div>
            <div class="text-sm" style="color: var(--text-secondary);">Kishyam AI Pvt Ltd</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       CTA
       ======================================================== -->
  <section class="section" aria-labelledby="contact-cta-heading" style="background: linear-gradient(160deg, var(--bg-base) 60%, var(--bg-elevated) 100%);">
    <div class="container">
      <div class="text-center max-w-xl mx-auto">
        <h2 id="contact-cta-heading" class="text-3xl font-heading font-bold mb-4">Abhi Join Karo</h2>
        <p class="text-lg mb-8" style="color: var(--text-secondary);">
          May 20, 2026 launch. 7 din free. No credit card required.
        </p>
        <a href="/waitlist/" class="btn btn-primary">Join Waitlist Free →</a>
      </div>
    </div>
  </section>

</main>

<script>
(function () {
  var form    = document.getElementById('contact-form');
  var success = document.getElementById('contact-success');
  var error   = document.getElementById('contact-error');

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    success.classList.add('hidden');
    error.classList.add('hidden');

    var data = {
      name:    form.querySelector('[name="name"]').value.trim(),
      email:   form.querySelector('[name="email"]').value.trim(),
      message: form.querySelector('[name="message"]').value.trim(),
    };

    fetch('/api/contact.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data),
    })
      .then(function (r) { return r.ok ? r.json() : Promise.reject(r); })
      .then(function () {
        success.classList.remove('hidden');
        form.reset();
      })
      .catch(function () {
        error.classList.remove('hidden');
      });
  });
})();
</script>

<?php include '../partials/footer.php'; ?>
