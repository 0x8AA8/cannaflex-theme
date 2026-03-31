<?php
/**
 * About section: Intro split (image left, content right)
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

$page_id = get_the_ID();
?>
<section class="about-intro" aria-labelledby="about-intro-heading">
    <div class="about-intro__image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('hero', ['loading' => 'eager']); ?>
        <?php else : ?>
            <div class="placeholder-img placeholder-img--full placeholder-img--tall"><?php esc_html_e('About Image', 'cannaflex'); ?></div>
        <?php endif; ?>
    </div>
    <div class="about-intro__content">
        <?php $intro_heading = get_post_meta($page_id, '_cfx_about_intro_heading', true); ?>
        <h1 id="about-intro-heading"><?php echo esc_html($intro_heading ?: 'Globally Established, Proudly Rooted in Morocco'); ?></h1>

        <?php
        $about_body = get_post_meta($page_id, '_cfx_about_body', true);
        if ($about_body) {
            echo wp_kses_post(wpautop($about_body));
        } else {
        ?>
            <p><?php esc_html_e('At Cannaflex, everything begins in the heart of the Rif Mountains — the ancestral cradle of Moroccan cannabis. This region\'s rich soil, unique microclimate, and deep cultural legacy have made it one of the world\'s most iconic cannabis-growing regions.', 'cannaflex'); ?></p>
            <p><?php esc_html_e('We honor that heritage by cultivating each plant with care and harvesting it with respect, using time-honored traditions passed down through generations of Moroccan farmers.', 'cannaflex'); ?></p>
            <p><?php esc_html_e('But our vision goes beyond tradition.', 'cannaflex'); ?></p>
            <p><?php esc_html_e('By combining artisanal expertise with modern innovation, we craft premium cannabinoid-based products designed to meet the highest international standards. From CBD oils and supplements to cosmetics, teas, and extracts, every product is developed for purity, effectiveness, and consistency.', 'cannaflex'); ?></p>
        <?php } ?>
    </div>
</section>
