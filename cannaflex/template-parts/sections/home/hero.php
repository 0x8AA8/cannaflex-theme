<?php
/**
 * Home section: Split Hero
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;
?>
<section class="hero-split" aria-labelledby="hero-heading">
    <div class="hero-split__content">
        <div class="hero-split__inner">
            <h1 id="hero-heading"><?php echo esc_html(cannaflex_get('hero_heading', 'We are Leading the Change')); ?></h1>
            <?php echo wp_kses_post(wpautop(esc_html(cannaflex_get('hero_text', "We're redefining what cannabis can do. From Morocco's ancestral fields to international markets — we advance the legacy of Moroccan cannabis tradition, innovation, and craftsmanship to deliver premium, sustainable and high-quality cannabis products.\n\nJoin us in shaping the future of responsible, sustainable, and high-quality cannabis.")))); ?>
            <a href="<?php echo esc_url(cannaflex_get('hero_btn_url', '/contact')); ?>" class="btn btn--primary">
                <?php echo esc_html(cannaflex_get('hero_btn_text', 'Join Us')); ?>
            </a>
        </div>
    </div>
    <div class="hero-split__image">
        <?php
        $hero_img = cannaflex_get('hero_image');
        if ($hero_img) : ?>
            <img src="<?php echo esc_url($hero_img); ?>" alt="" loading="eager" fetchpriority="high">
        <?php else : ?>
            <div class="placeholder-img placeholder-img--full"><?php esc_html_e('Hero Image', 'cannaflex'); ?></div>
        <?php endif; ?>
    </div>
</section>
