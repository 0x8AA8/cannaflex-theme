# TASK-003: Content Model — Make Everything Admin Editable

## Objective
Convert hardcoded page/section content into editor-managed fields so non-developers can update logo, images, text, and links from WordPress admin.

## Scope
- Customizer settings
- Page meta fields
- Menu management
- Featured images/media fields

## Required Work
1. Audit hardcoded strings/URLs in:
   - `header.php`, `footer.php`
   - `front-page.php`
   - `page-about.php`, `page-activity.php`, `page-products.php`, `page-brands.php`, `page-news.php`, `page-contact.php`
   - `template-parts/contact-form.php`
2. For each hardcoded editable value, create one of:
   - Theme Mod (Customizer)
   - Page-specific meta field
   - Native page content (`the_content`)
   - Menu location link
3. Ensure all image slots can be managed by:
   - featured image, or
   - media URL field in Customizer/meta.
4. Keep sensible defaults only as fallback, never as locked content.
5. Ensure all new settings are sanitized and escaped properly.

## Important Constraint
- Do not depend on ACF or third-party plugins for core functionality.

## Suggested Data Domains
- Global branding settings (logo already via custom logo, add fallback text controls if needed).
- Header behavior settings.
- Footer column menus/links/settings.
- Page hero controls per template.
- CTA controls per section.

## Acceptance Criteria
- Client can update page copy/media from admin without touching code.
- No visible `#` placeholder links in production output.
- No broken rendering when optional fields are empty.

