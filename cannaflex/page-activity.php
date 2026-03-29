<?php
/**
 * Template Name: Activity
 * Template Post Type: page
 *
 * Matches: CANNAFLEX WEBSITE Activity page.pdf
 *
 * @package Cannaflex
 */

get_header();

$page_id = get_the_ID();
?>

<!-- ===== INTRO BLOCK (light background, green heading) ===== -->
<section class="activity-intro" aria-labelledby="activity-intro-heading">
    <div class="container">
        <?php
        $intro_heading = get_post_meta($page_id, '_cfx_activity_intro_heading', true);
        ?>
        <h1 id="activity-intro-heading"><?php echo esc_html($intro_heading ?: "From Cultivation to Global Distribution \u{2014} We Cover the Full Cannabis Value Chain"); ?></h1>
        <?php
        $intro = get_post_meta($page_id, '_cfx_activity_intro', true);
        if ($intro) : ?>
            <p><?php echo esc_html($intro); ?></p>
        <?php else : ?>
            <p><?php esc_html_e('At Cannaflex, we manage the entire lifecycle of cannabis — from seed to shelf. Our activities span agriculture, research, manufacturing, and international supply — offering our partners comprehensive, scalable, and compliant cannabis solutions.', 'cannaflex'); ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- ===== VALUE CHAIN BLOCKS ===== -->
<?php
$blocks_json = get_post_meta($page_id, '_cfx_activity_blocks', true);
$blocks = $blocks_json ? json_decode($blocks_json, true) : null;

if (! $blocks || ! is_array($blocks)) {
    // Exact text from Activity page PDF
    $blocks = [
        [
            'title' => 'Culture',
            'text'  => 'We partner with agricultural cooperatives authorized by Morocco\'s National Cannabis Agency (ANRAC) to cultivate cannabis in full compliance with Moroccan regulations.',
        ],
        [
            'title' => 'Research & Development',
            'text'  => "We are committed to continuous innovation and excellence. Our dedicated R&D team works relentlessly to develop new formulations, improve existing products, and explore advanced technologies in the cannabis sector.",
        ],
        [
            'title' => 'Extraction',
            'text'  => 'We operate state-of-the-art facilities for CBD isolate, distillate, and full-spectrum extract production using advanced extraction technologies to ensure purity, safety, and consistency across all our product lines.',
        ],
        [
            'title' => 'Transformation',
            'text'  => 'We transform and process cannabis into high-quality products, ensuring all certifications and standards are met throughout the production chain.',
        ],
        [
            'title' => 'Sales and Export',
            'text'  => "We sell and distribute premium cannabis-based products in full compliance with Moroccan regulations, ensuring both safety and legal integrity.\n\nOur international export operations are backed by rigorous quality controls, complete product traceability, and adherence to global regulatory standards. We proudly support distributors, retailers, wellness brands, and healthcare professionals with market-ready solutions tailored for success in local and international markets.",
        ],
    ];
}

foreach ($blocks as $index => $block) :
    $reverse = ($index % 2 !== 0) ? ' activity-block--reverse' : '';
    $img_key = '_cfx_activity_img_' . $index;
    $img_url = get_post_meta($page_id, $img_key, true);
    ?>
    <section class="activity-block<?php echo esc_attr($reverse); ?>" aria-labelledby="activity-block-<?php echo esc_attr($index); ?>">
        <div class="activity-block__image">
            <?php if ($img_url) : ?>
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($block['title']); ?>" loading="lazy" width="960" height="500">
            <?php else : ?>
                <div class="placeholder-img" style="width:100%;height:100%;min-height:420px"><?php echo esc_html($block['title']); ?></div>
            <?php endif; ?>
        </div>
        <div class="activity-block__content">
            <h2 id="activity-block-<?php echo esc_attr($index); ?>"><?php echo esc_html($block['title']); ?></h2>
            <?php echo wp_kses_post(wpautop(esc_html($block['text']))); ?>
        </div>
    </section>
<?php endforeach; ?>

<!-- ===== CERTIFICATIONS ===== -->
<section class="certifications section" aria-labelledby="certs-heading">
    <div class="container">
        <?php
        $certs_heading = get_post_meta($page_id, '_cfx_activity_certs_heading', true);
        $certs_text    = get_post_meta($page_id, '_cfx_activity_certs_text', true);
        ?>
        <h2 id="certs-heading"><?php echo esc_html($certs_heading ?: 'A Production Chain Controlled from A to Z'); ?></h2>
        <p><?php echo esc_html($certs_text ?: 'At Cannaflex, we oversee every stage of the production chain, from seed selection to final packaging, with complete control and precision. Our processes are certified to meet the highest international standards, ensuring quality, safety, and full traceability at every step. This integrated approach allows us to deliver consistent, compliant, and high-performing products, batch after batch.'); ?></p>
        <p><?php esc_html_e('Each certification we hold is a testament to our unwavering commitment to innovation, transparency, and accountability — and to providing our partners with trusted, market-ready cannabis solutions.', 'cannaflex'); ?></p>

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
                    $desc = get_post_meta($cert->ID, '_cfx_cert_desc', true);
                    ?>
                    <div class="cert-card">
                        <?php if ($logo) : ?>
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($cert->post_title); ?>" loading="lazy" width="180" height="180">
                        <?php else : ?>
                            <div class="placeholder-img" style="aspect-ratio:1;border-radius:12px"><?php echo esc_html($cert->post_title); ?></div>
                        <?php endif; ?>
                        <h3><?php echo esc_html($cert->post_title); ?></h3>
                        <?php if ($desc) : ?>
                            <p><?php echo esc_html($desc); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach;
            else :
                // Fallback certifications from PDF
                $fallback_certs = [
                    ['name' => 'GACP',      'desc' => 'We adhere to GACP (Good Agricultural and Collection Practices) to ensure the highest standards in cultivation and harvesting.'],
                    ['name' => 'ISO 22000', 'desc' => 'Our production processes are certified under ISO 22000, guaranteeing robust food safety management.'],
                    ['name' => 'ISO 22716', 'desc' => 'It ensures product quality, safety, and traceability, from raw ingredients to finished skincare solutions.'],
                    ['name' => 'ONSSA',     'desc' => ''],
                    ['name' => 'DMP',       'desc' => 'Direction des Médicaments et de la Pharmacie'],
                    ['name' => 'Cannabis',  'desc' => ''],
                ];
                foreach ($fallback_certs as $c) : ?>
                    <div class="cert-card">
                        <div class="placeholder-img" style="aspect-ratio:1;border-radius:12px"><?php echo esc_html($c['name']); ?></div>
                        <h3><?php echo esc_html($c['name']); ?></h3>
                        <?php if ($c['desc']) : ?>
                            <p><?php echo esc_html($c['desc']); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
