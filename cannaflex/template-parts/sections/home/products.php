<?php
/**
 * Home section: Products slider
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;
?>
<section class="products-section section" aria-labelledby="products-heading">
    <div class="container">
        <h2 id="products-heading"><?php echo esc_html(cannaflex_get('products_heading', 'Our Products')); ?></h2>
        <p class="section-subtitle"><?php echo esc_html(cannaflex_get('products_text', 'We offer a comprehensive range of premium cannabis products, from dermatological to medical that not only meet manufacturing standards, but also comply with local and international regulations. Each product embodies the legacy of Moroccan craftsmanship — a refined blend of traditional know-how that reflects our unwavering commitment to authenticity, quality, and the healing power of Moroccan cannabis.')); ?></p>

        <div class="products-slider" aria-label="<?php esc_attr_e('Product categories', 'cannaflex'); ?>">
            <div class="products-slider__track" id="products-track">
                <?php
                $products = get_posts(['post_type' => 'cfx_product', 'posts_per_page' => 12, 'orderby' => 'menu_order', 'order' => 'ASC']);
                if ($products) :
                    foreach ($products as $prod) :
                        $thumb = get_the_post_thumbnail_url($prod, 'card'); ?>
                        <article class="product-card">
                            <div class="product-card__image">
                                <?php if ($thumb) : ?><img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($prod->post_title); ?>" loading="lazy">
                                <?php else : ?><div class="placeholder-img placeholder-img--full"><?php echo esc_html($prod->post_title); ?></div><?php endif; ?>
                            </div>
                            <div class="product-card__label">
                                <h3><?php echo esc_html($prod->post_title); ?></h3>
                                <p><?php echo esc_html(wp_trim_words($prod->post_excerpt ?: $prod->post_content, 12)); ?></p>
                                <a href="<?php echo esc_url(get_permalink($prod)); ?>"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                            </div>
                        </article>
                    <?php endforeach;
                else :
                    foreach (['Cosmetics', 'Supplements', 'Edibles', 'Extracts', 'Vapes', 'Pet Care'] as $name) : ?>
                        <article class="product-card">
                            <div class="product-card__image"><div class="placeholder-img placeholder-img--full"><?php echo esc_html($name); ?></div></div>
                            <div class="product-card__label">
                                <h3><?php echo esc_html($name); ?></h3>
                                <a href="<?php echo esc_url(home_url('/products/')); ?>"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                            </div>
                        </article>
                    <?php endforeach;
                endif;
                wp_reset_postdata(); ?>
            </div>
            <div class="slider-controls">
                <button type="button" class="slider-btn" id="slider-prev" aria-label="<?php esc_attr_e('Previous', 'cannaflex'); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M15 19l-7-7 7-7"/></svg></button>
                <div class="slider-dots" id="slider-dots"></div>
                <button type="button" class="slider-btn" id="slider-next" aria-label="<?php esc_attr_e('Next', 'cannaflex'); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg></button>
            </div>
        </div>
    </div>
</section>
