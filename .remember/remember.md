# Handoff

## State
I built the complete Shrutam.ai marketing website at `/Users/ajayagrawal/Documents/projects/shrutam-website/` (repo: `hforever-ai/shuratam`). 44 static Hinglish pages + 134 template-driven multi-language pages (router.php + JSON data). 4 themes (Navy/Forest/Gaming, light hidden). 13 Imagen 4.0 illustrations with consistent SAAVI character (reference: `assets/images/hero/saavi-standalone.png`). SAAVI voice samples generated via Gemini Flash 2.5 for all hero chapters. Homepage hero iterated heavily — current version has brand + H1 + SAAVI intro + learning journey + 6 value prop cards. Global container: 1140px, blog: 1024px.

## Next
1. Implement full accessibility (WCAG AA) — skip-to-content exists, need: aria landmarks, focus management, screen reader testing, alt text audit, contrast verification across all 3 active themes
2. Implement full SEO — structured data audit (every page needs schema), meta description uniqueness check, hreflang verification, OG image per page, canonical URLs, internal linking audit
3. Replace mock SAAVI samples for Class 5-8 with Gemini-generated content (Class 9-10 done)

## Context
- SAAVI is NOT "Didi" anymore — just "SAAVI" or "SAAVI Ma'am". Character bible at `docs/SAAVI_CHARACTER_BIBLE.md`
- Blind mode is NOT free — subsidized/nominal for BPL category students
- Light theme (Bright Day) is hidden from nav but CSS still exists
- PHP server: `cd shrutam-website && php -S localhost:8000`
- Tailwind build: `npx @tailwindcss/cli -i assets/css/input.css -o assets/css/main.css --minify`
- Gemini API key in `studyai-ai/.env` as `GOOGLE_AI_API_KEY`
