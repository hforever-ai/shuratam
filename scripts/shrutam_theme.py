"""
shrutam_theme.py — Shared Shrutam theme CSS + JS for static page generators.

Provides the complete 4-theme CSS variable system, fonts, base styles,
theme switcher JS, and a theme picker HTML snippet.

Usage:
    from shrutam_theme import THEME_CSS, THEME_JS, THEME_PICKER_HTML
"""

THEME_CSS = """
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Noto+Sans+Devanagari:wght@400;600;700&family=Noto+Sans+Telugu:wght@400;600;700&display=swap');

/* ── Navy + Saffron (default) ── */
:root, [data-theme="navy"] {
  --bg-base:#070e1c;--bg-surface:#0d1a2e;--bg-elevated:#132338;--bg-subtle:#1a2f47;
  --primary:#2563eb;--primary-light:#60a5fa;--primary-faint:#bfdbfe;--primary-glow:rgba(37,99,235,0.15);
  --accent:#f59e0b;--accent-light:#fcd34d;--accent-faint:#fef3c7;--accent-glow:rgba(245,158,11,0.15);
  --text-primary:#e8f1ff;--text-body:#bfdbfe;--text-secondary:#7ea8d4;--text-muted:#4a6a8a;--text-inverse:#070e1c;
  --border-subtle:rgba(96,165,250,0.12);--border-default:rgba(96,165,250,0.22);--border-strong:rgba(96,165,250,0.40);
  --success:#22c55e;--error:#ef4444;--warning:#f59e0b;
  --shadow-sm:0 1px 4px rgba(0,0,0,0.3);--shadow:0 4px 20px rgba(0,0,0,0.4);--shadow-lg:0 12px 40px rgba(0,0,0,0.5);
  --shadow-glow:0 0 30px var(--primary-glow);
  --radius-sm:0.375rem;--radius:0.75rem;--radius-lg:1.25rem;--radius-xl:2rem;
}

/* ── Forest Focus ── */
[data-theme="forest"] {
  --bg-base:#060f0a;--bg-surface:#0a1a10;--bg-elevated:#0f2418;--bg-subtle:#162e1e;
  --primary:#059669;--primary-light:#34d399;--primary-faint:#a7f3d0;--primary-glow:rgba(5,150,105,0.15);
  --accent:#f59e0b;--accent-light:#fcd34d;--accent-faint:#fef3c7;--accent-glow:rgba(245,158,11,0.15);
  --text-primary:#ecfdf5;--text-body:#a7f3d0;--text-secondary:#6ee7b7;--text-muted:#3d9970;--text-inverse:#060f0a;
  --border-subtle:rgba(52,211,153,0.12);--border-default:rgba(52,211,153,0.22);--border-strong:rgba(52,211,153,0.40);
  --success:#22c55e;--error:#ef4444;--warning:#f59e0b;
}

/* ── Bright Day (light) ── */
[data-theme="bright"] {
  --bg-base:#f8faff;--bg-surface:#ffffff;--bg-elevated:#f0f4ff;--bg-subtle:#e8efff;
  --primary:#2563eb;--primary-light:#3b82f6;--primary-faint:#eff6ff;--primary-glow:rgba(37,99,235,0.10);
  --accent:#f59e0b;--accent-light:#fbbf24;--accent-faint:#fffbeb;--accent-glow:rgba(245,158,11,0.10);
  --text-primary:#0f172a;--text-body:#1e3a5f;--text-secondary:#4a6a8a;--text-muted:#94a3b8;--text-inverse:#ffffff;
  --border-subtle:rgba(37,99,235,0.10);--border-default:rgba(37,99,235,0.20);--border-strong:rgba(37,99,235,0.40);
  --success:#16a34a;--error:#dc2626;--warning:#d97706;
  --shadow-sm:0 1px 4px rgba(0,0,0,0.07);--shadow:0 4px 20px rgba(0,0,0,0.09);--shadow-lg:0 12px 40px rgba(0,0,0,0.12);
  --shadow-glow:0 0 30px var(--primary-glow);
}

/* ── Gaming ── */
[data-theme="gaming"] {
  --bg-base:#0a0514;--bg-surface:#130820;--bg-elevated:#1e0a30;--bg-subtle:#270d40;
  --primary:#c026d3;--primary-light:#e879f9;--primary-faint:#fce7ff;--primary-glow:rgba(192,38,211,0.20);
  --accent:#fbbf24;--accent-light:#fde68a;--accent-faint:#fefce8;--accent-glow:rgba(251,191,36,0.15);
  --text-primary:#fce7ff;--text-body:#e879f9;--text-secondary:#c084fc;--text-muted:#7e22ce;--text-inverse:#0a0514;
  --border-subtle:rgba(192,38,211,0.15);--border-default:rgba(192,38,211,0.30);--border-strong:rgba(192,38,211,0.50);
  --success:#22c55e;--error:#ef4444;--warning:#f59e0b;
}

/* ── Base styles ── */
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;-webkit-font-smoothing:antialiased}
body{font-family:'Nunito',system-ui,sans-serif;background:var(--bg-base);color:var(--text-body);line-height:1.65}
h1,h2,h3,h4{font-family:'Nunito',system-ui,sans-serif;color:var(--text-primary);font-weight:700}
a{color:var(--primary-light);text-decoration:none;transition:color .2s}
a:hover{color:var(--accent)}
[lang="hi"],[lang="mr"]{font-family:'Noto Sans Devanagari','Nunito',sans-serif}
[lang="te"]{font-family:'Noto Sans Telugu','Nunito',sans-serif}
"""

THEME_JS = """
function setTheme(t){
  document.documentElement.setAttribute('data-theme',t);
  localStorage.setItem('shrutam-theme',t);
  document.querySelectorAll('.theme-btn').forEach(b=>b.classList.remove('active'));
  var a=document.querySelector('.theme-btn[data-theme="'+t+'"]');
  if(a)a.classList.add('active');
}
(function(){
  var s=localStorage.getItem('shrutam-theme');
  if(s)document.documentElement.setAttribute('data-theme',s);
})();
document.addEventListener('DOMContentLoaded',function(){
  var s=localStorage.getItem('shrutam-theme')||'navy';
  document.querySelectorAll('.theme-btn').forEach(function(b){b.classList.remove('active')});
  var a=document.querySelector('.theme-btn[data-theme="'+s+'"]');
  if(a)a.classList.add('active');
});
"""

THEME_PICKER_HTML = """
<div class="theme-picker" style="display:flex;gap:.5rem;align-items:center;justify-content:center;padding:.5rem 0">
  <span style="color:var(--text-muted);font-size:.8rem">Theme:</span>
  <button class="theme-btn" data-theme="navy" onclick="setTheme('navy')" title="Navy + Saffron"
    style="width:24px;height:24px;border-radius:50%;border:2px solid var(--border-default);background:#070e1c;cursor:pointer;transition:transform .2s"></button>
  <button class="theme-btn" data-theme="forest" onclick="setTheme('forest')" title="Forest Focus"
    style="width:24px;height:24px;border-radius:50%;border:2px solid var(--border-default);background:#060f0a;cursor:pointer;transition:transform .2s"></button>
  <button class="theme-btn" data-theme="bright" onclick="setTheme('bright')" title="Bright Day"
    style="width:24px;height:24px;border-radius:50%;border:2px solid var(--border-default);background:#f8faff;cursor:pointer;transition:transform .2s"></button>
  <button class="theme-btn" data-theme="gaming" onclick="setTheme('gaming')" title="Gaming"
    style="width:24px;height:24px;border-radius:50%;border:2px solid var(--border-default);background:#0a0514;cursor:pointer;transition:transform .2s"></button>
</div>
<style>
  .theme-btn:hover{transform:scale(1.2)}
  .theme-btn.active{border-color:var(--accent)!important;box-shadow:0 0 8px var(--accent-glow)}
</style>
"""
