<?php
$currentUri = $_SERVER['REQUEST_URI'] ?? '/';
// Strip lang prefix for active detection
if (preg_match('#^/(hi|en|mr|te)(/.*)$#', $currentUri, $m)) {
    $currentUri = $m[2];
}
function isActive($path) {
    global $currentUri;
    return $path !== '/' && strpos($currentUri, $path) === 0 ? ' aria-current="page" style="color: var(--accent);"' : '';
}
$langPrefix = isset($lang) && $lang ? "/{$lang}" : '';
?>
<!-- Navigation -->
<header class="nav">
  <nav class="container flex items-center justify-between h-full" aria-label="Main navigation">
    <!-- Logo -->
    <a href="<?= $langPrefix ?>/" class="flex items-center gap-2 text-xl font-heading font-bold" style="color: var(--text-primary);">
      <span lang="hi" class="font-devanagari-heading">शृतम्</span>
      <span class="hidden sm:inline">Shrutam</span>
    </a>

    <!-- Desktop nav links -->
    <div class="hidden lg:flex items-center gap-6 text-base">
      <a href="<?= $langPrefix ?>/features/" class="hover:text-[var(--accent)]"<?= isActive('/features/') ?> style="color: var(--text-body);"><?= isset($t) ? ($t['nav']['features'] ?? 'Features') : 'Features' ?></a>
      <a href="<?= $langPrefix ?>/blind-mode/" class="hover:text-[var(--accent)]"<?= isActive('/blind-mode/') ?> style="color: var(--text-body);"><?= isset($t) ? ($t['nav']['blind_mode'] ?? 'Blind Mode ♿') : 'Blind Mode ♿' ?></a>

      <!-- Classes dropdown -->
      <div class="relative group">
        <button class="flex items-center gap-1 hover:text-[var(--accent)]" style="color: var(--text-body);" aria-expanded="false" aria-haspopup="true">
          <?= isset($t) ? ($t['nav']['classes'] ?? 'Classes') : 'Classes' ?> <span aria-hidden="true">▾</span>
        </button>
        <div class="absolute top-full left-0 mt-2 py-2 min-w-[160px] rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200"
             style="background: var(--bg-surface); border: 1px solid var(--border-subtle); box-shadow: var(--shadow);">
          <a href="<?= $langPrefix ?>/classes/class-5/" class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]" style="color: var(--text-body);">Class 5</a>
          <a href="<?= $langPrefix ?>/classes/class-6/" class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]" style="color: var(--text-body);">Class 6</a>
          <a href="<?= $langPrefix ?>/classes/class-7/" class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]" style="color: var(--text-body);">Class 7</a>
          <a href="<?= $langPrefix ?>/classes/class-8/" class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]" style="color: var(--text-body);">Class 8</a>
          <a href="<?= $langPrefix ?>/classes/class-9/" class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]" style="color: var(--text-body);">Class 9</a>
          <a href="<?= $langPrefix ?>/classes/class-10/" class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]" style="color: var(--text-body);">Class 10</a>
        </div>
      </div>

      <!-- Boards dropdown -->
      <div class="relative group">
        <button class="flex items-center gap-1 hover:text-[var(--accent)]" style="color: var(--text-body);" aria-expanded="false" aria-haspopup="true">
          <?= isset($t) ? ($t['nav']['boards'] ?? 'Boards') : 'Boards' ?> <span aria-hidden="true">▾</span>
        </button>
        <div class="absolute top-full left-0 mt-2 py-2 min-w-[160px] rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200"
             style="background: var(--bg-surface); border: 1px solid var(--border-subtle); box-shadow: var(--shadow);">
          <a href="<?= $langPrefix ?>/boards/cg-board/" class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]" style="color: var(--text-body);">CG Board</a>
          <a href="<?= $langPrefix ?>/boards/cbse/" class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]" style="color: var(--text-body);">CBSE</a>
          <a href="<?= $langPrefix ?>/boards/mp-board/" class="block px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]" style="color: var(--text-body);">MP Board (Soon)</a>
        </div>
      </div>

      <a href="<?= $langPrefix ?>/pricing/" class="hover:text-[var(--accent)]"<?= isActive('/pricing/') ?> style="color: var(--text-body);"><?= isset($t) ? ($t['nav']['pricing'] ?? 'Pricing') : 'Pricing' ?></a>
      <a href="<?= $langPrefix ?>/blog/" class="hover:text-[var(--accent)]"<?= isActive('/blog/') ?> style="color: var(--text-body);"><?= isset($t) ? ($t['nav']['blog'] ?? 'Blog') : 'Blog' ?></a>
      <a href="<?= $langPrefix ?>/schools/" class="hover:text-[var(--accent)]"<?= isActive('/schools/') ?> style="color: var(--text-body);"><?= isset($t) ? ($t['nav']['for_schools'] ?? 'For Schools') : 'For Schools' ?></a>
    </div>

    <!-- Right side: theme switcher + CTA + hamburger -->
    <div class="flex items-center gap-3">
      <!-- Language switcher (all pages) -->
      <?php include __DIR__ . '/lang-switcher.php'; ?>

      <!-- Theme switcher — dropdown -->
      <div class="relative group">
        <button class="flex items-center gap-1 text-sm hover:text-[var(--accent)]" style="color: var(--text-body);" aria-label="Theme switcher" aria-haspopup="true">
          🎨 <span aria-hidden="true">▾</span>
        </button>
        <div class="absolute top-full right-0 mt-2 py-2 min-w-[140px] rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200"
             style="background: var(--bg-surface); border: 1px solid var(--border-subtle); box-shadow: var(--shadow); z-index: 50;">
          <button onclick="setTheme('navy')" class="theme-btn block w-full text-left px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]" style="color: var(--text-body);">🌙 Navy + Saffron</button>
          <button onclick="setTheme('forest')" class="theme-btn block w-full text-left px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]" style="color: var(--text-body);">🌿 Forest Focus</button>
          <button onclick="setTheme('gaming')" class="theme-btn block w-full text-left px-4 py-2 text-sm hover:bg-[var(--bg-elevated)]" style="color: var(--text-body);">🎮 Gaming</button>
        </div>
      </div>

      <!-- CTA -->
      <a href="<?= $langPrefix ?>/waitlist/" class="btn btn-primary hidden sm:inline-flex">Join Waitlist Free →</a>

      <!-- Hamburger (mobile) -->
      <button id="hamburger" class="lg:hidden p-2 min-w-[44px] min-h-[44px] flex items-center justify-center" aria-label="Open menu" aria-expanded="false">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--text-primary);">
          <line x1="3" y1="6" x2="21" y2="6"/>
          <line x1="3" y1="12" x2="21" y2="12"/>
          <line x1="3" y1="18" x2="21" y2="18"/>
        </svg>
      </button>
    </div>
  </nav>

  <!-- Mobile menu overlay -->
  <div id="mobile-menu" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true" aria-label="Mobile navigation">
    <div class="absolute inset-0 bg-black/50" id="mobile-menu-backdrop"></div>
    <div class="absolute right-0 top-0 h-full w-[280px] p-6 flex flex-col gap-4 overflow-y-auto" style="background: var(--bg-surface);">
      <button id="mobile-menu-close" class="self-end p-2 min-w-[44px] min-h-[44px]" aria-label="Close menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--text-primary);">
          <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
      </button>
      <a href="<?= $langPrefix ?>/features/" class="py-3 text-lg font-heading" style="color: var(--text-body); border-bottom: 1px solid var(--border-subtle);">Features</a>
      <a href="<?= $langPrefix ?>/blind-mode/" class="py-3 text-lg font-heading" style="color: var(--text-body); border-bottom: 1px solid var(--border-subtle);">Blind Mode ♿</a>
      <a href="<?= $langPrefix ?>/classes/class-5/" class="py-2 pl-4" style="color: var(--text-secondary);">Class 5</a>
      <a href="<?= $langPrefix ?>/classes/class-6/" class="py-2 pl-4" style="color: var(--text-secondary);">Class 6</a>
      <a href="<?= $langPrefix ?>/classes/class-7/" class="py-2 pl-4" style="color: var(--text-secondary);">Class 7</a>
      <a href="<?= $langPrefix ?>/classes/class-8/" class="py-2 pl-4" style="color: var(--text-secondary);">Class 8</a>
      <a href="<?= $langPrefix ?>/classes/class-9/" class="py-2 pl-4" style="color: var(--text-secondary);">Class 9</a>
      <a href="<?= $langPrefix ?>/classes/class-10/" class="py-2 pl-4" style="color: var(--text-secondary); border-bottom: 1px solid var(--border-subtle);">Class 10</a>
      <a href="<?= $langPrefix ?>/boards/cg-board/" class="py-2 pl-4" style="color: var(--text-secondary);">CG Board</a>
      <a href="<?= $langPrefix ?>/boards/cbse/" class="py-2 pl-4" style="color: var(--text-secondary);">CBSE</a>
      <a href="<?= $langPrefix ?>/boards/mp-board/" class="py-2 pl-4" style="color: var(--text-secondary); border-bottom: 1px solid var(--border-subtle);">MP Board (Soon)</a>
      <a href="<?= $langPrefix ?>/pricing/" class="py-3 text-lg font-heading" style="color: var(--text-body); border-bottom: 1px solid var(--border-subtle);">Pricing</a>
      <a href="<?= $langPrefix ?>/blog/" class="py-3 text-lg font-heading" style="color: var(--text-body); border-bottom: 1px solid var(--border-subtle);">Blog</a>
      <a href="<?= $langPrefix ?>/schools/" class="py-3 text-lg font-heading" style="color: var(--text-body); border-bottom: 1px solid var(--border-subtle);">For Schools</a>
      <a href="<?= $langPrefix ?>/waitlist/" class="btn btn-primary mt-4 justify-center">Join Waitlist Free →</a>
    </div>
  </div>
</header>
