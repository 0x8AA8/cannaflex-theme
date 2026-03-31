<?php
/**
 * Home section: About split (photo panel + badge + content)
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;
?>
<section class="home-about-split" aria-labelledby="home-about-heading">
    <div class="home-about-split__media">
        <?php $about_photo = cannaflex_get('home_about_photo'); ?>
        <?php if ($about_photo) : ?>
            <img src="<?php echo esc_url($about_photo); ?>" alt="" loading="lazy" class="home-about-split__photo">
        <?php else : ?>
            <div class="placeholder-img home-about-split__photo"><?php esc_html_e('Background Photo', 'cannaflex'); ?></div>
        <?php endif; ?>

        <div class="home-about-split__badge">
            <?php
            $about_badge = cannaflex_get('home_about_image');
            if ($about_badge) : ?>
                <img src="<?php echo esc_url($about_badge); ?>" alt="<?php esc_attr_e('Made in Morocco', 'cannaflex'); ?>" loading="lazy" class="home-about-split__badge-img">
            <?php else : ?>
                <svg class="home-about-split__badge-svg" viewBox="0 0 150 150" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <circle cx="75" cy="75" r="70" fill="none" stroke="currentColor" stroke-width="2"/>
                    <circle cx="75" cy="75" r="60" fill="none" stroke="currentColor" stroke-width="1"/>
                    <text fill="currentColor" font-family="Inter,sans-serif" font-size="10" font-weight="700" text-anchor="middle">
                        <textPath href="#home-badge-c" startOffset="50%">MADE IN MOROCCO</textPath>
                    </text>
                    <defs><path id="home-badge-c" d="M 75,15 a 60,60 0 1,1 0,120 a 60,60 0 1,1 0,-120"/></defs>
                    <text x="75" y="82" fill="currentColor" font-family="Inter,sans-serif" font-size="22" font-weight="700" text-anchor="middle">&#x1F33F;</text>
                </svg>
            <?php endif; ?>
        </div>
    </div>
    <div class="home-about-split__content">
        <h2 id="home-about-heading"><?php echo esc_html(cannaflex_get('home_about_heading', 'About Us')); ?></h2>
        <p class="home-about-split__intro"><?php echo esc_html(cannaflex_get('home_about_intro', "From the ancestral cradle of Moroccan cannabis to the global market \u{2014} we're the partner you can trust.")); ?></p>
        <?php echo wp_kses_post(wpautop(esc_html(cannaflex_get('home_about_text', "At the heart of the Rif Mountains \u{2014} the ancestral cradle of Moroccan cannabis. This region's rich soil, unique microclimate, and deep cultural legacy have made it one of the world's most iconic cannabis-growing regions.\n\nWe honor that heritage by cultivating each plant with care and harvesting it with respect, using time-honored traditions passed down through generations of Moroccan farmers.\n\nMore than a producer, we're your global growth partner. Cannaflex's robust international network offers scalable, compliant cannabis solutions delivered to your market.")))); ?>
        <a href="<?php echo esc_url(home_url('/about/')); ?>" class="btn btn--primary">
            <?php echo esc_html(cannaflex_get('home_about_btn', 'Learn More')); ?>
        </a>
    </div>
</section>
