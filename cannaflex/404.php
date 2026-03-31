<?php
/**
 * 404 template.
 *
 * @package Cannaflex
 */

get_header(); ?>

<section class="section error-404">
    <div class="container">
        <h1 class="error-404__code">404</h1>
        <h2><?php echo esc_html(cannaflex_get('404_heading', 'Page Not Found')); ?></h2>
        <p class="error-404__message"><?php echo esc_html(cannaflex_get('404_message', 'The page you are looking for might have been removed or is temporarily unavailable.')); ?></p>
        <a href="<?php echo esc_url(cannaflex_get('404_btn_url', home_url('/'))); ?>" class="btn btn--primary"><?php echo esc_html(cannaflex_get('404_btn_text', 'Back to Home')); ?></a>
    </div>
</section>

<?php get_footer(); ?>
