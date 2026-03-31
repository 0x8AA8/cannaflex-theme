<?php
/**
 * Home section: Seed-to-Shelf flow grid
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

$tiles = [
    ['title' => 'Agriculture',                 'text' => 'We partner with agricultural cooperatives authorized by Morocco\'s National Cannabis Agency (ANRAC) to cultivate cannabis in full compliance with Moroccan regulations.', 'icon' => 'leaf'],
    ['title' => 'Transformation',              'text' => 'We transform and process cannabis into high-quality products, ensuring all certifications and standards are met throughout the production chain.', 'icon' => 'cycle'],
    ['title' => 'Commercialisation and Export', 'text' => 'We sell and distribute our products locally and internationally in strict compliance to current Moroccan regulations, ensuring quality and compliance across all markets.', 'icon' => 'globe'],
];

$icons = [
    'leaf'  => '<svg viewBox="0 0 24 24" stroke-width="2"><path d="M17 8c.7-1 1-2 1-3 0-3.4-3.6-5-8-5C5.6 0 2 1.6 2 5c0 1 .3 2 1 3-1.6 1.5-3 4-3 7 0 5 4 9 9 9h2c5 0 9-4 9-9 0-3-1.4-5.5-3-7z" stroke="currentColor" fill="none"/></svg>',
    'cycle' => '<svg viewBox="0 0 24 24" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.2-8.6" stroke="currentColor" fill="none"/><path d="M21 3v6h-6" stroke="currentColor" fill="none"/></svg>',
    'globe' => '<svg viewBox="0 0 24 24" stroke-width="2"><circle cx="12" cy="12" r="10" stroke="currentColor" fill="none"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10A15.3 15.3 0 0 1 12 2z" stroke="currentColor" fill="none"/></svg>',
];
?>
<section class="seed-flow section" aria-labelledby="seed-heading">
    <div class="container">
        <div class="seed-flow__grid">
            <article class="seed-flow__card seed-flow__card--intro">
                <?php $seed_img = cannaflex_get('seed_image');
                if ($seed_img) : ?>
                    <img src="<?php echo esc_url($seed_img); ?>" alt="" loading="lazy" class="seed-flow__card-bg">
                <?php endif; ?>
                <div class="seed-flow__card-inner">
                    <h2 id="seed-heading"><?php echo esc_html(cannaflex_get('seed_heading', 'From Seed to Shelf')); ?></h2>
                    <p><?php echo esc_html(cannaflex_get('seed_text', 'We control every step of the cannabis value chain — from cultivation in the Rif Mountains to finished products ready for global markets. This guarantees consistency, traceability, and outstanding quality across our full range of cannabis products.')); ?></p>
                    <a href="<?php echo esc_url(home_url('/activity/')); ?>" class="btn btn--primary"><?php esc_html_e('Learn More', 'cannaflex'); ?></a>
                </div>
            </article>

            <?php $t = cannaflex_get('process_1_title', $tiles[0]['title']); $d = cannaflex_get('process_1_text', $tiles[0]['text']); ?>
            <article class="seed-flow__card seed-flow__card--icon">
                <div class="seed-flow__icon"><?php echo $icons['leaf']; // phpcs:ignore ?></div>
                <h3><?php echo esc_html($t); ?></h3>
                <p><?php echo esc_html($d); ?></p>
            </article>

            <article class="seed-flow__media">
                <?php if ($seed_img) : ?>
                    <img src="<?php echo esc_url($seed_img); ?>" alt="" loading="lazy">
                <?php else : ?>
                    <div class="placeholder-img placeholder-img--full"><?php esc_html_e('Image', 'cannaflex'); ?></div>
                <?php endif; ?>
            </article>

            <?php $t = cannaflex_get('process_2_title', $tiles[1]['title']); $d = cannaflex_get('process_2_text', $tiles[1]['text']); ?>
            <article class="seed-flow__card seed-flow__card--icon">
                <div class="seed-flow__icon"><?php echo $icons['cycle']; // phpcs:ignore ?></div>
                <h3><?php echo esc_html($t); ?></h3>
                <p><?php echo esc_html($d); ?></p>
            </article>

            <?php $t = cannaflex_get('process_3_title', $tiles[2]['title']); $d = cannaflex_get('process_3_text', $tiles[2]['text']); ?>
            <article class="seed-flow__card seed-flow__card--icon">
                <div class="seed-flow__icon"><?php echo $icons['globe']; // phpcs:ignore ?></div>
                <h3><?php echo esc_html($t); ?></h3>
                <p><?php echo esc_html($d); ?></p>
            </article>
        </div>
    </div>
</section>
