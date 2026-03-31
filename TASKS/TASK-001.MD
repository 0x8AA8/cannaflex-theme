# TASK-001: Master Build Brief (Cannaflex x Dor Architecture)

## Objective
Create a WordPress theme implementation plan and codebase evolution that follows the **modular architecture mindset** of `dor_organick1` while preserving the **current Cannaflex visual design** from the approved PDFs and screenshot references.

## Reference Inputs (Source of Truth)
- `/home/usui/Desktop/projects/cannaflex/Website/dor_organick1`
- `/home/usui/Desktop/projects/cannaflex/Website/CANNAFLEX WEBSITE Home page.pdf`
- `/home/usui/Desktop/projects/cannaflex/Website/CANNAFLEX WEBSITE About page.pdf`
- `/home/usui/Desktop/projects/cannaflex/Website/CANNAFLEX WEBSITE Activity page.pdf`
- `/home/usui/Desktop/projects/cannaflex/Website/CANNAFLEX WEBSITE Contact page.pdf`
- `/home/usui/Desktop/projects/cannaflex/Website/pdf-home.png`
- `/home/usui/Desktop/projects/cannaflex/Website/pdf-about.png`
- `/home/usui/Desktop/projects/cannaflex/Website/pdf-activity.png`
- `/home/usui/Desktop/projects/cannaflex/Website/pdf-contact.png`
- `/home/usui/Desktop/projects/cannaflex/Website/live-final-home.png`
- `/home/usui/Desktop/projects/cannaflex/Website/live-final-about.png`
- `/home/usui/Desktop/projects/cannaflex/Website/live-final-activity.png`
- `/home/usui/Desktop/projects/cannaflex/Website/live-final-contact.png`
- `/home/usui/Desktop/projects/cannaflex/Website/live-final-menu-scroll-fix.png`

## What To Reuse From dor_organick1 (Architecture, Not Styling)
- Config-first mindset (`config/theme.yml` equivalent in WP).
- Layout + partial composition (`layouts`, `_partials`, skin switching).
- Reusable section blocks instead of monolithic templates.
- Hook-driven composition pattern translated into WordPress actions/template parts.

## Non-Negotiables
- Keep Cannaflex design language and layout parity with PDFs.
- Do not copy Organick branding or visual style.
- Make content/admin editing first-class (logo, menu, text, links, images, CTA, footer).
- Eliminate brittle hardcoded content where editor-controlled data should exist.
- Preserve existing SEO-friendly routes and template assignments.

## Deliverables
- Updated WordPress theme code under `cannaflex/`.
- Modular section/partial architecture inspired by `dor_organick1`.
- Admin-editable content model (Customizer + page meta + menus + featured images).
- Final QA evidence (status checks, lint checks, screenshot outputs).

## Completion Gate
- All task files `TASK-002` to `TASK-008` completed with passing acceptance criteria.

