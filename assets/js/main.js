/* ============================================
   Shrutam.ai — Main JavaScript
   Theme switcher, countdown, animations, forms, mobile menu
   ============================================ */

// ---- Theme Switcher ----
function setTheme(theme) {
  document.documentElement.setAttribute('data-theme', theme);
  localStorage.setItem('shrutam-theme', theme);

  document.querySelectorAll('.theme-btn').forEach(btn => {
    btn.style.opacity = '0.5';
  });
  const activeBtn = document.querySelector(`.theme-btn[onclick="setTheme('${theme}')"]`);
  if (activeBtn) activeBtn.style.opacity = '1';
}

// Apply saved theme on load
(function() {
  const saved = localStorage.getItem('shrutam-theme');
  if (saved) {
    document.documentElement.setAttribute('data-theme', saved);
  }
})();

// ---- Countdown Timer (May 20, 2026) ----
function updateCountdown() {
  const launch = new Date('2026-05-20T00:00:00+05:30');
  const now = new Date();
  const diff = launch - now;

  if (diff <= 0) {
    document.querySelectorAll('.countdown-digit .number').forEach(el => el.textContent = '0');
    return;
  }

  const days = Math.floor(diff / (1000 * 60 * 60 * 24));
  const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((diff % (1000 * 60)) / 1000);

  const el = (id) => document.getElementById(id);
  if (el('cd-days')) el('cd-days').textContent = days;
  if (el('cd-hours')) el('cd-hours').textContent = String(hours).padStart(2, '0');
  if (el('cd-minutes')) el('cd-minutes').textContent = String(minutes).padStart(2, '0');
  if (el('cd-seconds')) el('cd-seconds').textContent = String(seconds).padStart(2, '0');
}

// ---- Count-Up Animation (for stat numbers) ----
function animateCountUp(el) {
  const target = parseInt(el.getAttribute('data-count'), 10);
  const suffix = el.getAttribute('data-suffix') || '';
  const duration = 1500;
  const start = performance.now();

  function tick(now) {
    const elapsed = now - start;
    const progress = Math.min(elapsed / duration, 1);
    const eased = 1 - Math.pow(1 - progress, 3);
    const current = Math.floor(eased * target);
    el.textContent = current.toLocaleString('en-IN') + suffix;
    if (progress < 1) requestAnimationFrame(tick);
  }
  requestAnimationFrame(tick);
}

// ---- Scroll Animations (IntersectionObserver) ----
function initScrollAnimations() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-fade-in');
        entry.target.style.opacity = '1';

        if (entry.target.hasAttribute('data-count')) {
          animateCountUp(entry.target);
        }

        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  document.querySelectorAll('.animate-on-scroll').forEach(el => {
    el.style.opacity = '0';
    observer.observe(el);
  });

  document.querySelectorAll('[data-count]').forEach(el => {
    observer.observe(el);
  });
}

// ---- SAAVI Chat Animation ----
function initChatAnimation() {
  const chatContainer = document.getElementById('saavi-chat-demo');
  if (!chatContainer) return;

  const bubbles = chatContainer.querySelectorAll('.chat-bubble');
  bubbles.forEach((bubble, i) => {
    bubble.style.animationDelay = `${i * 0.8}s`;
  });
}

// ---- Mobile Menu ----
function initMobileMenu() {
  const hamburger = document.getElementById('hamburger');
  const menu = document.getElementById('mobile-menu');
  const close = document.getElementById('mobile-menu-close');
  const backdrop = document.getElementById('mobile-menu-backdrop');

  if (!hamburger || !menu) return;

  function openMenu(e) {
    if (e) e.preventDefault();
    menu.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    hamburger.setAttribute('aria-expanded', 'true');
  }

  function closeMenu(e) {
    if (e) e.preventDefault();
    menu.classList.add('hidden');
    document.body.style.overflow = '';
    hamburger.setAttribute('aria-expanded', 'false');
  }

  // Both click and touchstart for maximum iOS/Android compatibility
  hamburger.addEventListener('click', openMenu);
  hamburger.addEventListener('touchstart', openMenu, { passive: false });

  if (close) {
    close.addEventListener('click', closeMenu);
    close.addEventListener('touchstart', closeMenu, { passive: false });
  }
  if (backdrop) {
    backdrop.addEventListener('click', closeMenu);
    backdrop.addEventListener('touchstart', closeMenu, { passive: false });
  }

  // Close on Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && !menu.classList.contains('hidden')) {
      closeMenu();
    }
  });

  // Close menu when a nav link inside is tapped
  menu.querySelectorAll('a[href]').forEach(link => {
    link.addEventListener('click', () => closeMenu());
  });

  // Accordion toggles for Classes / Boards
  menu.querySelectorAll('.mobile-accordion-toggle').forEach(btn => {
    btn.addEventListener('click', function() {
      const panel = this.nextElementSibling;
      const arrow = this.querySelector('.mobile-accordion-arrow');
      const isOpen = !panel.classList.contains('hidden');

      // Close all other panels first
      menu.querySelectorAll('.mobile-accordion-panel').forEach(p => p.classList.add('hidden'));
      menu.querySelectorAll('.mobile-accordion-arrow').forEach(a => a.style.transform = '');

      if (!isOpen) {
        panel.classList.remove('hidden');
        arrow.style.transform = 'rotate(180deg)';
      }
    });
  });
}

// ---- Waitlist Form Submission ----
function initForms() {
  const waitlistForm = document.getElementById('waitlist-form');
  if (waitlistForm) {
    waitlistForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const formData = new FormData(waitlistForm);
      const success = document.getElementById('waitlist-success');
      const error = document.getElementById('waitlist-error');

      try {
        const res = await fetch('/api/waitlist', {
          method: 'POST',
          body: formData,
        });
        const data = await res.json();

        if (data.success) {
          waitlistForm.classList.add('hidden');
          if (success) success.classList.remove('hidden');
        } else {
          if (error) {
            error.textContent = data.message || 'Kuch gadbad ho gayi. Please try again.';
            error.classList.remove('hidden');
          }
        }
      } catch (err) {
        if (error) error.classList.remove('hidden');
      }
    });
  }

  const contactForm = document.getElementById('contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const formData = new FormData(contactForm);
      const success = document.getElementById('contact-success');
      const error = document.getElementById('contact-error');

      try {
        const res = await fetch('/api/contact', {
          method: 'POST',
          body: formData,
        });
        const data = await res.json();

        if (data.success) {
          contactForm.classList.add('hidden');
          if (success) success.classList.remove('hidden');
        } else {
          if (error) {
            error.textContent = data.message || 'Kuch gadbad ho gayi.';
            error.classList.remove('hidden');
          }
        }
      } catch (err) {
        if (error) error.classList.remove('hidden');
      }
    });
  }
}

// ---- Class Tab Switcher ----
function initClassTabs() {
  const tabs = document.querySelectorAll('[data-class-tab]');
  const panels = document.querySelectorAll('[data-class-panel]');

  if (!tabs.length) return;

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const target = tab.getAttribute('data-class-tab');

      tabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      panels.forEach(p => {
        p.classList.toggle('hidden', p.getAttribute('data-class-panel') !== target);
      });
    });
  });
}

// ---- Smooth Scroll for Anchor Links ----
function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
      const target = document.querySelector(link.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
}

// ---- Initialize Everything on DOM Ready ----
document.addEventListener('DOMContentLoaded', () => {
  const saved = localStorage.getItem('shrutam-theme') || 'navy';
  document.querySelectorAll('.theme-btn').forEach(btn => {
    btn.style.opacity = '0.5';
  });
  const activeBtn = document.querySelector(`.theme-btn[onclick="setTheme('${saved}')"]`);
  if (activeBtn) activeBtn.style.opacity = '1';

  initMobileMenu();
  initScrollAnimations();
  initChatAnimation();
  initForms();
  initClassTabs();
  initSmoothScroll();

  updateCountdown();
  setInterval(updateCountdown, 1000);
});
