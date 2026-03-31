# TASK-004: Header/Menu/Footer Hardening + Sticky Scroll Bug Fix

## Objective
Fix header/menu behavior and make navigation/footer fully manageable from WordPress, including the scroll breakage issue visible in the supplied screenshot.

## Known Bug To Fix
- On scroll, sticky menu/header becomes visually broken/clipped.
- Reproduce on desktop; verify logged-in admin-bar state too.

## Required Work
1. Header/menu logic:
   - Respect assigned `primary` menu if present.
   - Use canonical fallback only when no valid menu exists.
   - Keep active-state highlighting.
2. Sticky header fix:
   - Ensure stable height and background when sticky.
   - Prevent top clipping/overlap on scroll.
   - Handle admin bar offset (`body.admin-bar`) safely.
   - Remove/avoid double stacking contexts causing dark overlap bars.
3. Footer editability:
   - Add footer menu locations (3 columns minimum) OR robust settings-driven link groups.
   - Keep social links configurable via settings.
4. Remove Organick remnants in header/footer visuals and labels.

## File Targets
- `cannaflex/header.php`
- `cannaflex/footer.php`
- `cannaflex/assets/css/main.css`
- `cannaflex/assets/js/main.js`
- `cannaflex/functions.php`

## Acceptance Criteria
- Sticky header works cleanly while scrolling on desktop/mobile.
- Main nav is user-manageable in WP menus.
- Footer links are user-manageable, no dead placeholders.
- Screenshot proof includes post-scroll header state.

