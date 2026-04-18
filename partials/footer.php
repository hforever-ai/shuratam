<?php $langPrefix = isset($lang) && $lang ? "/{$lang}" : ''; ?>
<!-- Footer -->
<footer class="section border-t" style="background: var(--bg-surface); border-color: var(--border-subtle);">
  <div class="container">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 mb-12">
      <div class="col-span-2 md:col-span-3 lg:col-span-2">
        <a href="<?= $langPrefix ?>/" class="text-2xl font-heading font-bold" style="color: var(--text-primary);">
          <span lang="hi" class="font-devanagari-heading">शृतम्</span> Shrutam
        </a>
        <p lang="hi" class="mt-2 font-devanagari" style="color: var(--text-secondary);"><?= isset($t) ? ($t['footer']['tagline'] ?? '"सुनते हो, सीखते हो।"') : '"सुनते हो, सीखते हो।"' ?></p>
        <p class="mt-2 text-sm" style="color: var(--accent);"><?= isset($t) ? ($t['footer']['blind_mode_badge'] ?? '♿ Blind Mode — FREE Forever') : '♿ Blind Mode — FREE Forever' ?></p>
      </div>
      <div>
        <h3 class="text-sm font-bold uppercase tracking-wide mb-3" style="color: var(--text-secondary);">Product</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="<?= $langPrefix ?>/features/" style="color: var(--text-muted);">Features</a></li>
          <li><a href="<?= $langPrefix ?>/saavi/" style="color: var(--text-muted);">SAAVI</a></li>
          <li><a href="<?= $langPrefix ?>/blind-mode/" style="color: var(--text-muted);">Blind Mode</a></li>
          <li><a href="<?= $langPrefix ?>/pricing/" style="color: var(--text-muted);">Pricing</a></li>
          <li><a href="<?= $langPrefix ?>/waitlist/" style="color: var(--text-muted);">Waitlist</a></li>
          <li><a href="<?= $langPrefix ?>/schools/" style="color: var(--text-muted);">For Schools</a></li>
        </ul>
      </div>
      <div>
        <h3 class="text-sm font-bold uppercase tracking-wide mb-3" style="color: var(--text-secondary);">Classes</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="<?= $langPrefix ?>/classes/class-6/" style="color: var(--text-muted);">Class 6</a></li>
          <li><a href="<?= $langPrefix ?>/classes/class-7/" style="color: var(--text-muted);">Class 7</a></li>
          <li><a href="<?= $langPrefix ?>/classes/class-8/" style="color: var(--text-muted);">Class 8</a></li>
          <li><a href="<?= $langPrefix ?>/classes/class-9/" style="color: var(--text-muted);">Class 9</a></li>
          <li><a href="<?= $langPrefix ?>/classes/class-10/" style="color: var(--text-muted);">Class 10</a></li>
        </ul>
      </div>
      <div>
        <h3 class="text-sm font-bold uppercase tracking-wide mb-3" style="color: var(--text-secondary);">Boards</h3>
        <ul class="space-y-2 text-sm mb-6">
          <li><a href="<?= $langPrefix ?>/boards/cg-board/" style="color: var(--text-muted);">CG Board</a></li>
          <li><a href="<?= $langPrefix ?>/boards/cbse/" style="color: var(--text-muted);">CBSE</a></li>
          <li><a href="<?= $langPrefix ?>/boards/mp-board/" style="color: var(--text-muted);">MP Board</a></li>
        </ul>
        <h3 class="text-sm font-bold uppercase tracking-wide mb-3" style="color: var(--text-secondary);">Subjects</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="<?= $langPrefix ?>/subjects/science/" style="color: var(--text-muted);">Science</a></li>
          <li><a href="<?= $langPrefix ?>/subjects/mathematics/" style="color: var(--text-muted);">Mathematics</a></li>
          <li><a href="<?= $langPrefix ?>/subjects/hindi/" style="color: var(--text-muted);">Hindi</a></li>
          <li><a href="<?= $langPrefix ?>/subjects/social-science/" style="color: var(--text-muted);">Social Science</a></li>
        </ul>
      </div>
      <div>
        <h3 class="text-sm font-bold uppercase tracking-wide mb-3" style="color: var(--text-secondary);">Company</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="<?= $langPrefix ?>/about/" style="color: var(--text-muted);">About</a></li>
          <li><a href="<?= $langPrefix ?>/blog/" style="color: var(--text-muted);">Blog</a></li>
          <li><a href="<?= $langPrefix ?>/faq/" style="color: var(--text-muted);">FAQ</a></li>
          <li><a href="<?= $langPrefix ?>/contact/" style="color: var(--text-muted);">Contact</a></li>
          <li><a href="https://aarambhax.ai" target="_blank" rel="noopener" style="color: var(--text-muted);">Aarambha ↗</a></li>
          <li><a href="<?= $langPrefix ?>/privacy/" style="color: var(--text-muted);">Privacy</a></li>
          <li><a href="<?= $langPrefix ?>/terms/" style="color: var(--text-muted);">Terms</a></li>
        </ul>
      </div>
    </div>
    <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs" style="border-top: 1px solid var(--border-subtle); color: var(--text-muted);">
      <p>Accessibility: <a href="mailto:accessibility@shrutam.ai" style="color: var(--primary-light);">accessibility@shrutam.ai</a></p>
      <p><?= isset($t) ? ($t['footer']['product_of'] ?? 'A proud product of') : 'A proud product of' ?> <strong>Aarambha (आरम्भ)</strong> · <a href="https://aarambhax.ai" target="_blank" rel="noopener" style="color: var(--primary-light);">aarambhax.ai</a></p>
      <p><?= isset($t) ? ($t['footer']['copyright'] ?? '© 2026 Aarambha · shrutam.ai') : '© 2026 Aarambha · shrutam.ai' ?></p>
    </div>
  </div>
</footer>

  <script src="/assets/js/main.js" defer></script>
</body>
</html>
