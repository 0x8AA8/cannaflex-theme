# TASK-006: Products/Brands/News + Generic Templates Cleanup

## Objective
Finish editability and modularization across remaining templates so content does not depend on hardcoded fallback blocks.

## Templates In Scope
- `page-products.php`
- `page-brands.php`
- `page-news.php`
- `archive.php`
- `index.php`
- `search.php`
- `single.php`
- `404.php`

## Required Work
1. Remove inline hardcoded CTA text where it should be configurable.
2. Convert page hero texts to editable model (page meta/theme mod/page content).
3. Ensure fallback cards are generic and optional, not brand-mismatched.
4. Keep CPT/taxonomy data pipelines for products/brands intact.
5. Standardize “Read More/View Details” labels through translation strings and optional settings.
6. 404 page:
   - Make title, message, button label/link editable (theme settings).

## Dor-Inspired Pattern
- Reusable component partials for cards, hero blocks, CTA strips, pagination fragments.
- Template wrappers pull data; partials render UI.

## Acceptance Criteria
- Remaining page templates are admin-editable and modular.
- Minimal inline style blocks remain.
- No Organick-specific residue in text/content.

