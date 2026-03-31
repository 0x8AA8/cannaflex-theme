# TASK-002: Build Modular Theme Skeleton (Dor-Inspired for WordPress)

## Objective
Refactor Cannaflex templates into a modular structure similar to `dor_organick1` (`layouts` + `_partials` + section variants) without changing the approved UI.

## Scope
- Theme structure only (no major copy/image changes yet).
- Keep front-end output visually equivalent.

## Required Refactor
1. Introduce a modular template hierarchy:
   - `cannaflex/template-parts/layouts/`
   - `cannaflex/template-parts/partials/`
   - `cannaflex/template-parts/sections/home/`
   - `cannaflex/template-parts/sections/about/`
   - `cannaflex/template-parts/sections/activity/`
   - `cannaflex/template-parts/sections/contact/`
2. Break large templates into section partials:
   - `front-page.php`, `page-about.php`, `page-activity.php`, `page-contact.php`.
3. Add a lightweight section dispatcher helper in `functions.php` or `inc/`.
4. Keep class names compatible with existing `assets/css/main.css` to avoid design regressions.

## Dor Mapping (Conceptual)
- `dor_organick1/templates/layouts/*` => WP page wrappers + template-part layout files.
- `dor_organick1/templates/_partials/*` => WP header/footer/shared partials.
- skin include behavior => controlled WP option for section/header variant if needed.

## File Targets
- `cannaflex/front-page.php`
- `cannaflex/page-about.php`
- `cannaflex/page-activity.php`
- `cannaflex/page-contact.php`
- `cannaflex/template-parts/**`
- `cannaflex/functions.php`

## Acceptance Criteria
- Page output remains visually stable.
- Each page template is now compositional (not one long file).
- No PHP syntax errors.
- No broken includes.

