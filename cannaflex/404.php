<?php
/**
 * 404 template.
 *
 * @package Cannaflex
 */

get_header(); ?>

<section class="section" style="text-align:center;min-height:60vh;display:flex;align-items:center;justify-content:center">
    <div class="container">
        <h1 style="font-size:6rem;color:var(--color-accent)">404</h1>
        <h2><?php esc_html_e('Page Not Found', 'cannaflex'); ?></h2>
        <p style="margin:1.5rem 0"><?php esc_html_e('The page you are looking for might have been removed or is temporarily unavailable.', 'cannaflex'); ?></p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary"><?php esc_html_e('Back to Home', 'cannaflex'); ?></a>
    </div>
</section>

<?php get_footer(); ?>
