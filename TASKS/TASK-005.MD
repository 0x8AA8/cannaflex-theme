# TASK-005: Home/About/Activity/Contact Refactor for Full Editability

## Objective
Refactor the four key PDF pages so every business-facing section can be edited in WordPress admin while preserving current Cannaflex design and layout structure.

## Pages In Scope
- Home (`front-page.php`)
- About (`page-about.php`)
- Activity (`page-activity.php`)
- Contact (`page-contact.php`)

## Required Work
1. Home page:
   - Hero, about split, seed-to-shelf cards, products strip copy, brands strip copy, news intro, recent posts intro, contact split copy/image.
   - Ensure all text/buttons/images editable via Customizer or page meta.
2. About page:
   - Intro body text editable.
   - Mission, values, CTA heading/body/bg editable.
   - Team sourced from CPT remains editable.
3. Activity page:
   - Intro and block content editable.
   - Block images editable.
   - Certifications section heading/text editable.
4. Contact page:
   - Heading, intro, contact details, map embed editable.
   - Contact form labels/options configurable where practical.
5. Placeholder behavior:
   - Keep developer-safe fallbacks, but no intrusive placeholder labels in production view.

## File Targets
- `cannaflex/front-page.php`
- `cannaflex/page-about.php`
- `cannaflex/page-activity.php`
- `cannaflex/page-contact.php`
- `cannaflex/template-parts/contact-form.php`
- `cannaflex/inc/customizer.php`
- `cannaflex/inc/meta-boxes.php`

## Acceptance Criteria
- Client can update copy/images without code edits.
- Visual output remains aligned to PDF composition.
- No fallback placeholder text leaks in normal production pages.

