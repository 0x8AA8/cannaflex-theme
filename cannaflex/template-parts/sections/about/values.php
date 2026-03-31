<?php
/**
 * About section: Our Values
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

$page_id = get_the_ID();
?>
<section class="our-values" aria-labelledby="values-heading">
    <div class="our-values__image">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php echo esc_url(get_the_post_thumbnail_url($page_id, 'hero')); ?>" alt="" loading="lazy">
        <?php else : ?>
            <div class="placeholder-img placeholder-img--full placeholder-img--xtall"><?php esc_html_e('Values Image', 'cannaflex'); ?></div>
        <?php endif; ?>
    </div>
    <div class="our-values__content">
        <h2 id="values-heading"><?php esc_html_e('Our Values', 'cannaflex'); ?></h2>
        <div class="values-list">
            <?php
            $values_json = get_post_meta($page_id, '_cfx_about_values', true);
            $values = $values_json ? json_decode($values_json, true) : null;

            if (! $values || ! is_array($values)) {
                $values = [
                    ['title' => 'Socials',        'text' => "We believe cannabis can be a force for good — socially, culturally, and economically. That's why we invest in local communities, support small farmers, and promote ethical employment across our supply chain.\n\nBeyond production, we're committed to raising awareness and educating communities about the responsible use of cannabis. Through transparency, outreach, and informed dialogue, we help shift perceptions and support safe, stigma-free access to cannabis based products."],
                    ['title' => 'Sustainability',  'text' => 'Respect for the earth is at the heart of our work. From eco-conscious cultivation practices to low-waste processing, we are dedicated to preserving natural resources and protecting Morocco\'s agricultural heritage for future generations.'],
                    ['title' => 'Innovation',      'text' => 'Driven by research and curiosity, we continually explore new technologies, formulations, and delivery systems to create cutting-edge cannabinoid products. Our innovation is rooted in tradition, yet focused on the future.'],
                    ['title' => 'Authenticity',    'text' => 'Every product we create reflects the spirit of Morocco — its land, its people, and its centuries-old relationship with cannabis. We stay true to our roots, honoring artisanal methods while delivering quality you can trust.'],
                ];
            }

            foreach ($values as $v) : ?>
                <div class="value-item">
                    <h3><?php echo esc_html($v['title']); ?></h3>
                    <?php echo wp_kses_post(wpautop(esc_html($v['text']))); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
