<?php
/**
 * Activity section: Certifications grid
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

$page_id = get_the_ID();
?>
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
            $certs = get_posts(['post_type' => 'cfx_certification', 'posts_per_page' => 6, 'orderby' => 'menu_order', 'order' => 'ASC']);

            if ($certs) :
                foreach ($certs as $cert) :
                    $logo = get_the_post_thumbnail_url($cert, 'medium');
                    $desc = get_post_meta($cert->ID, '_cfx_cert_desc', true);
                    ?>
                    <div class="cert-card">
                        <?php if ($logo) : ?>
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($cert->post_title); ?>" loading="lazy" width="180" height="180">
                        <?php else : ?>
                            <div class="placeholder-img placeholder-img--square placeholder-img--rounded"><?php echo esc_html($cert->post_title); ?></div>
                        <?php endif; ?>
                        <h3><?php echo esc_html($cert->post_title); ?></h3>
                        <?php if ($desc) : ?>
                            <p><?php echo esc_html($desc); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach;
            else :
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
                        <div class="placeholder-img placeholder-img--square placeholder-img--rounded"><?php echo esc_html($c['name']); ?></div>
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
