# Cannaflex Theme — Final Implementation Pass Changelog

## TASK-003: Content Model / Admin Editability

- **header.php**: Removed brittle "cannaflex" URL check on custom logo. Now respects any custom logo set in WP admin. SVG wordmark fallback only when no logo is set.
- **header.php**: Simplified menu logic — respects assigned WP primary menu directly; canonical fallback only when no menu is assigned at all.
- **footer.php**: Dead `href="#"` links replaced with `<span class="footer-col__text">` when URL is empty or `#`. Links render normally when admin sets a real URL.
- **customizer.php**: Added Customizer settings for: 404 page (heading, message, button text, button URL), Brands CTA (heading, text, button text), Home contact heading, Recent Posts heading, Recent News heading.
- **meta-boxes.php**: Added 5 Activity block image URL meta boxes (`_cfx_activity_img_0` through `_cfx_activity_img_4`) with proper admin UI and save handler.

## TASK-004: Header/Menu/Footer Hardening

- **header.php**: Menu logic simplified — `has_nav_menu('primary')` → render WP menu. No menu → hardcoded Cannaflex fallback. No item validation/override.
- **main.css**: Fixed header uses `position: fixed` with proper `padding-top` offset on `main#main-content`. Admin bar offsets handled for desktop (32px) and mobile (46px). Mobile nav panel also offset-aware.
- **main.css**: `body { overflow-x: clip }` replaces `overflow-x: hidden` which broke fixed positioning.
- **footer.php**: All footer links are now admin-editable via Customizer URL fields.

## TASK-005: Home/About/Activity/Contact Full Editability

- **contact-cta.php**: "Let's Connect" heading now uses `cannaflex_get('home_contact_heading')`.
- **news-timeline.php**: "Recent News" heading now uses `cannaflex_get('home_news_heading')`.
- **recent-posts.php**: "Recent Posts" heading now uses `cannaflex_get('home_posts_heading')`.
- **meta-boxes.php**: Activity block images now have proper meta box UI (not DB-only).

## TASK-006: Products/Brands/News/Generic Templates Cleanup

- **404.php**: Removed all inline styles. Uses CSS class `.error-404`. All text is Customizer-editable.
- **page-brands.php**: CTA section — removed inline styles, replaced with `.brands-cta__heading` and `.brands-cta__text` classes. All CTA text is Customizer-editable.
- **page-products.php**: Fallback "View Details" button changed from `<a href="#">` to `<span class="btn--disabled">` — no dead link in production.
- **index.php**: Removed inline styles. Uses `.index-posts-list` and `.pagination-wrap` classes. Placeholder uses `.placeholder-img--thumb` class.
- **singular.php**: Removed all inline styles. Uses `.singular-container`, `.singular-date`, `.single-post__featured`, `.single-post__nav` classes.
- **main.css**: Added CSS classes for all replaced inline styles: `.error-404`, `.brands-cta__heading`, `.brands-cta__text`, `.singular-container`, `.singular-date`, `.index-posts-list`, `.footer-col__text`, `.btn--disabled`.

## TASK-007: Provisioning / Migration / Safe Defaults

- **provisioning.php**: Admin notices added for: missing required pages, unassigned primary menu, front page not set to static page. Each notice includes a direct link to the relevant admin screen.
- **provisioning.php**: Provisioning runs on both admin and frontend via transient guard (1 day TTL). Non-destructive — only creates pages if missing, only assigns templates if unset.
- **functions.php**: Content suppression filter refined — only suppresses non-empty content on meta-driven templates (About/Activity/Contact), preserving legitimate empty-content pages.

## TASK-008: QA / Evidence / Handoff

- All PHP files pass `php -l` syntax check.
- All routes (`/`, `/about/`, `/activity/`, `/contact/`) return HTTP 200.
- EDITING-GUIDE.md updated with all new Customizer fields.
- This changelog created.

## Files Changed (22 files)

| File | Reason |
|------|--------|
| `header.php` | Logo + menu logic simplified |
| `footer.php` | Dead links suppressed, B2B link dynamic |
| `functions.php` | Content filter refined |
| `inc/customizer.php` | Added 404, brands CTA, home heading settings |
| `inc/meta-boxes.php` | Added activity image fields + save handler |
| `inc/provisioning.php` | Added admin notices |
| `404.php` | Editable, no inline styles |
| `page-brands.php` | CTA editable, no inline styles |
| `page-products.php` | Fallback dead link removed |
| `index.php` | No inline styles |
| `singular.php` | No inline styles |
| `assets/css/main.css` | New classes for inline-style replacements |
| `template-parts/sections/home/contact-cta.php` | Heading editable |
| `template-parts/sections/home/news-timeline.php` | Heading editable |
| `template-parts/sections/home/recent-posts.php` | Heading editable |
| `EDITING-GUIDE.md` | Updated with new fields |
| `CHANGELOG-FINAL-PASS.md` | This file |
