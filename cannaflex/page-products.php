<?php
/**
 * Template Name: Products
 * Template Post Type: page
 *
 * Displays the product catalog with category filtering.
 * Per sitemap: Edibles, Cosmetics, Supplements, For Pets, Vapes/Shisha, Extracts.
 *
 * @package Cannaflex
 */

get_header();

$page_id = get_the_ID();
?>

<!-- ===== HERO ===== -->
<section class="page-hero">
    <div class="container">
        <h1><?php echo esc_html(cannaflex_get('products_page_heading', 'Our Products')); ?></h1>
        <?php
        $intro = get_post_meta($page_id, '_cfx_products_intro', true);
        ?>
        <p><?php echo esc_html($intro ?: cannaflex_get('products_page_text', 'Explore our complete range of premium cannabis-derived products — from cosmetics and supplements to extracts and edibles.')); ?></p>
    </div>
</section>

<!-- ===== CATEGORY FILTER ===== -->
<?php
$categories = get_terms([
    'taxonomy'   => 'product_category',
    'hide_empty' => false,
]);
if ($categories && ! is_wp_error($categories)) : ?>
    <nav class="product-filter section" aria-label="<?php esc_attr_e('Filter products by category', 'cannaflex'); ?>">
        <div class="container">
            <div class="filter-tabs">
                <button class="filter-tab active" data-filter="all"><?php esc_html_e('All', 'cannaflex'); ?></button>
                <?php foreach ($categories as $cat) : ?>
                    <button class="filter-tab" data-filter="<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </nav>
<?php endif; ?>

<!-- ===== PRODUCT GRID ===== -->
<section class="products-grid-section section">
    <div class="container">
        <div class="products-grid" id="products-grid">
            <?php
            $products = new WP_Query([
                'post_type'      => 'cfx_product',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ]);

            if ($products->have_posts()) :
                while ($products->have_posts()) : $products->the_post();
                    $terms = get_the_terms(get_the_ID(), 'product_category');
                    $slugs = $terms ? implode(' ', wp_list_pluck($terms, 'slug')) : '';
                    ?>
                    <article class="product-grid-card" data-category="<?php echo esc_attr($slugs); ?>">
                        <div class="product-grid-card__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('card', ['loading' => 'lazy']); ?>
                            <?php else : ?>
                                <div class="placeholder-img" style="width:100%;height:100%"><?php the_title(); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="product-grid-card__content">
                            <h3><?php the_title(); ?></h3>
                            <?php if (has_excerpt()) : ?>
                                <p><?php echo esc_html(get_the_excerpt()); ?></p>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn--secondary btn--sm"><?php esc_html_e('View Details', 'cannaflex'); ?></a>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback product categories per sitemap
                $fallback = [
                    'Edibles'      => 'Infusions, Snacks',
                    'Cosmetics'    => 'Anti-hair loss, Anti-age, Moisturize, Pain Relief',
                    'Supplements'  => 'CBD Oils, CBD Supplements',
                    'For Pets'     => 'CBD Oils, CBD Clay Paste',
                    'Vapes / Shisha' => 'CBD E-Liquides, CBD Shisha, CBD Flowers',
                    'Extracts'     => 'CBD Isolate, CBD Distillate, Resin',
                ];
                foreach ($fallback as $name => $sub) : ?>
                    <article class="product-grid-card">
                        <div class="product-grid-card__image">
                            <div class="placeholder-img" style="width:100%;height:100%"><?php echo esc_html($name); ?></div>
                        </div>
                        <div class="product-grid-card__content">
                            <h3><?php echo esc_html($name); ?></h3>
                            <p><?php echo esc_html($sub); ?></p>
                            <span class="btn btn--secondary btn--sm btn--disabled"><?php esc_html_e('View Details', 'cannaflex'); ?></span>
                        </div>
                    </article>
                <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
