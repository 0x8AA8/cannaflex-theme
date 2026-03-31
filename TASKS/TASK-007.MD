# TASK-007: Provisioning, Migration, and Safe Defaults

## Objective
Make the theme robust on fresh installs and existing sites by providing safe auto-provisioning + non-destructive migration from old hardcoded behavior.

## Scope
- `inc/provisioning.php`
- any migration helper in `inc/`
- menu/page/template assignment hardening

## Required Work
1. Provisioning:
   - Ensure required pages exist and use correct templates.
   - Ensure front page assignment is valid.
   - Ensure primary menu assignment logic is safe and non-destructive.
2. Migration:
   - Preserve existing customizer values/page meta on upgrade.
   - Add migration mapping only when new setting keys are introduced.
3. Rewrite/cache hygiene:
   - Avoid excessive rewrite flushes.
   - Use idempotent checks and guard conditions.
4. Admin UX:
   - If critical settings are missing, show clear admin notice with fix steps.

## Acceptance Criteria
- Fresh activation creates usable baseline without breaking site.
- Existing content is preserved after update.
- No recurring expensive provisioning operations on every request.

