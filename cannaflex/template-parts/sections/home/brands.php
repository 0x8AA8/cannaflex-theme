<?php
/**
 * Home section: Brands strip
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;
?>
<section class="brands-strip section" aria-labelledby="brands-heading">
    <div class="container">
        <h2 id="brands-heading"><?php echo esc_html(cannaflex_get('brands_heading', 'Discover our Brands')); ?></h2>
        <p><?php echo esc_html(cannaflex_get('brands_text', 'Explore our distinct brands, each with its own identity, unified by the values at the heart of our company.')); ?></p>
        <div class="brands-grid">
            <?php
            $brands = get_posts(['post_type' => 'cfx_brand', 'posts_per_page' => 10, 'orderby' => 'menu_order', 'order' => 'ASC']);
            if ($brands) :
                foreach ($brands as $brand) :
                    $logo = get_the_post_thumbnail_url($brand, 'medium');
                    if ($logo) : ?><img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($brand->post_title); ?>" loading="lazy" height="48"><?php endif;
                endforeach;
            else :
                foreach (['VAPOCAN', 'FITOBOTANIKA', 'RifGold'] as $b) : ?>
                    <span class="brands-grid__placeholder"><?php echo esc_html($b); ?></span>
                <?php endforeach;
            endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>
