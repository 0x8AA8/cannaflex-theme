<?php
/**
 * Template Name: Brands
 * Template Post Type: page
 *
 * Per sitemap: Brands → Intro → brand 1 → brand 2 → …
 *
 * @package Cannaflex
 */

get_header();

$page_id = get_the_ID();
?>

<!-- ===== HERO ===== -->
<section class="page-hero">
    <div class="container">
        <h1><?php echo esc_html(cannaflex_get('brands_page_heading', 'Our Brands')); ?></h1>
        <?php
        $intro = get_post_meta($page_id, '_cfx_brands_intro', true);
        ?>
        <p><?php echo esc_html($intro ?: cannaflex_get('brands_page_text', 'Each brand in the Cannaflex family carries its own identity — unified by our commitment to quality, innovation, and Moroccan heritage.')); ?></p>
    </div>
</section>

<!-- ===== BRANDS SHOWCASE ===== -->
<section class="brands-showcase section">
    <div class="container">
        <?php
        $brands = new WP_Query([
            'post_type'      => 'cfx_brand',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ]);

        if ($brands->have_posts()) :
            while ($brands->have_posts()) : $brands->the_post();
                $tagline = get_post_meta(get_the_ID(), '_cfx_brand_tagline', true);
                $index   = $brands->current_post;
                $reverse = ($index % 2 !== 0) ? ' brand-block--reverse' : '';
                ?>
                <article class="brand-block<?php echo esc_attr($reverse); ?>">
                    <div class="brand-block__image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('card-wide', ['loading' => 'lazy']); ?>
                        <?php else : ?>
                            <div class="placeholder-img" style="width:100%;height:100%;min-height:300px"><?php the_title(); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="brand-block__content">
                        <h2><?php the_title(); ?></h2>
                        <?php if ($tagline) : ?>
                            <p class="quote"><?php echo esc_html($tagline); ?></p>
                        <?php endif; ?>
                        <?php if (get_the_content()) : ?>
                            <div class="brand-block__text"><?php the_content(); ?></div>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endwhile;
            wp_reset_postdata();
        else :
            // Fallback brands from the mockup
            $fallback_brands = [
                ['name' => 'VAPOCAN',      'tagline' => 'Premium CBD vaping solutions'],
                ['name' => 'FITOBOTANIKA',  'tagline' => 'Natural botanical cannabis wellness'],
                ['name' => 'RifGold',       'tagline' => 'Heritage Moroccan cannabis products'],
            ];
            foreach ($fallback_brands as $i => $b) :
                $reverse = ($i % 2 !== 0) ? ' brand-block--reverse' : '';
                ?>
                <article class="brand-block<?php echo esc_attr($reverse); ?>">
                    <div class="brand-block__image">
                        <div class="placeholder-img" style="width:100%;height:100%;min-height:300px"><?php echo esc_html($b['name']); ?></div>
                    </div>
                    <div class="brand-block__content">
                        <h2><?php echo esc_html($b['name']); ?></h2>
                        <p class="quote"><?php echo esc_html($b['tagline']); ?></p>
                    </div>
                </article>
            <?php endforeach;
        endif; ?>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="brands-cta section bg-primary text-white text-center">
    <div class="container">
        <h2 class="brands-cta__heading"><?php echo esc_html(cannaflex_get('brands_cta_heading', 'Interested in carrying our brands?')); ?></h2>
        <p class="brands-cta__text"><?php echo esc_html(cannaflex_get('brands_cta_text', 'Partner with Cannaflex and bring the power of Moroccan cannabis to your market.')); ?></p>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--white"><?php echo esc_html(cannaflex_get('brands_cta_btn', 'Contact Us')); ?></a>
    </div>
</section>

<?php get_footer(); ?>
