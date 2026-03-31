# TASK-008: QA, Visual Parity, and Handoff Pack

## Objective
Validate code quality and PDF visual parity; generate final evidence and editor handoff docs.

## Required Verification
1. PHP lint all changed PHP files:
   - `php -l <file>`
2. Route checks (must be HTTP 200):
   - `/`
   - `/about/`
   - `/activity/`
   - `/contact/`
3. Screenshot capture after fixes:
   - `live-final-home.png`
   - `live-final-about.png`
   - `live-final-activity.png`
   - `live-final-contact.png`
   - `live-final-menu-scroll-fix.png` (scrolled state)
4. Compare against:
   - `pdf-home.png`, `pdf-about.png`, `pdf-activity.png`, `pdf-contact.png`

## Required Documentation Output
1. `CHANGELOG`-style summary of what changed and why.
2. `EDITING-GUIDE.md` inside theme:
   - where to edit logo
   - where to edit menus
   - where to edit each section text/image/button
   - how to update contact details and map
3. “Known gaps” list (only if truly blocked by missing content assets).

## Acceptance Criteria
- No syntax errors.
- Core routes all 200.
- Sticky menu bug fixed and visually stable.
- Editor can confidently update content from WP admin without code edits.

