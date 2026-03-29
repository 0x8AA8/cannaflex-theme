<?php
/**
 * Template Name: Activity
 * Template Post Type: page
 *
 * @package Cannaflex
 */

get_header();

$page_id = get_the_ID();
?>

<!-- ===== HERO BANNER ===== -->
<section class="activity-hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php
        $intro = get_post_meta($page_id, '_cfx_activity_intro', true);
        if ($intro) : ?>
            <p><?php echo esc_html($intro); ?></p>
        <?php else : ?>
            <p><?php esc_html_e('Managing the entire lifecycle from seed to shelf — cultivation, research, extraction, transformation, and global distribution.', 'cannaflex'); ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- ===== VALUE CHAIN BLOCKS ===== -->
<?php
$blocks_json = get_post_meta($page_id, '_cfx_activity_blocks', true);
$blocks = $blocks_json ? json_decode($blocks_json, true) : null;

if (! $blocks || ! is_array($blocks)) {
    $blocks = [
        [
            'title' => 'Culture',
            'text'  => 'Our cultivation practices blend centuries-old Moroccan traditions with modern agricultural science. In the heart of the Rif Mountains, our partner farmers grow premium cannabis varietals under optimal conditions — producing some of the world\'s finest raw plant material.',
        ],
        [
            'title' => 'Research & Development',
            'text'  => 'Our R&D laboratory develops innovative extraction methods and formulations. From genetic analysis to product testing, we invest heavily in science to ensure our products meet the highest international quality and safety standards.',
        ],
        [
            'title' => 'Extraction',
            'text'  => 'Using state-of-the-art CO2 and ethanol extraction technology, we produce CBD isolate, broad-spectrum distillate, and full-spectrum extracts. Every batch is tested for purity, potency, and compliance.',
        ],
        [
            'title' => 'Transformation',
            'text'  => 'Our GMP-certified production facility transforms raw extracts into finished consumer products — from cosmetics and supplements to edibles and vape formulations — all under strict quality control.',
        ],
        [
            'title' => 'Sales and Export',
            'text'  => 'With distribution partnerships across Europe, the Middle East, and Africa, Cannaflex brings legal Moroccan cannabis products to international markets. Our logistics team ensures compliant, on-time delivery worldwide.',
        ],
    ];
}

foreach ($blocks as $index => $block) :
    $reverse = ($index % 2 !== 0) ? ' activity-block--reverse' : '';
    $img_key = '_cfx_activity_img_' . $index;
    $img_url = get_post_meta($page_id, $img_key, true);
    ?>
    <section class="activity-block<?php echo esc_attr($reverse); ?>">
        <div class="activity-block__image">
            <?php if ($img_url) : ?>
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($block['title']); ?>" loading="lazy" width="960" height="500">
            <?php else : ?>
                <div class="placeholder-img" style="width:100%;height:100%;min-height:420px"><?php echo esc_html($block['title']); ?></div>
            <?php endif; ?>
        </div>
        <div class="activity-block__content">
            <h2><?php echo esc_html($block['title']); ?></h2>
            <p><?php echo esc_html($block['text']); ?></p>
        </div>
    </section>
<?php endforeach; ?>

<!-- ===== CERTIFICATIONS ===== -->
<section class="certifications section">
    <div class="container">
        <h2><?php esc_html_e('A Production Chain Controlled from A to Z', 'cannaflex'); ?></h2>
        <p><?php esc_html_e('Our facilities and processes are certified to the highest international standards, ensuring quality, safety, and compliance at every step.', 'cannaflex'); ?></p>

        <div class="cert-grid">
            <?php
            $certs = get_posts([
                'post_type'      => 'cfx_certification',
                'posts_per_page' => 6,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ]);

            if ($certs) :
                foreach ($certs as $cert) :
                    $logo = get_the_post_thumbnail_url($cert, 'medium');
                    if ($logo) : ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($cert->post_title); ?>" loading="lazy" width="180" height="180">
                    <?php endif;
                endforeach;
            else :
                $fallback_certs = ['GACP', 'ISO 22000', 'ISO 22716', 'ONSSA', 'DMP', 'Cannabis'];
                foreach ($fallback_certs as $c) : ?>
                    <div class="placeholder-img" style="aspect-ratio:1;border-radius:12px"><?php echo esc_html($c); ?></div>
                <?php endforeach;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
