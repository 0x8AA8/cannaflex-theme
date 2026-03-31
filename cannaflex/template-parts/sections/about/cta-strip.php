<?php
/**
 * About section: CTA strip
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

$page_id = get_the_ID();
?>
<section class="cta-strip" aria-labelledby="about-cta-heading">
    <div class="cta-strip__heading">
        <h2 id="about-cta-heading">
            <?php
            $cta = get_post_meta($page_id, '_cfx_about_cta', true);
            echo esc_html($cta ?: "Let\u{2019}s Shape the Future of Cannabis \u{2014} Together.");
            ?>
        </h2>
    </div>
    <div class="cta-strip__action">
        <div class="cta-strip__action-inner">
            <?php $cta_text = get_post_meta($page_id, '_cfx_about_cta_text', true); ?>
            <p><?php echo esc_html($cta_text ?: 'Partner with us and bring the power of Moroccan cannabis to your market — with integrity, efficiency, and impact.'); ?></p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--secondary"><?php esc_html_e('Contact Us', 'cannaflex'); ?></a>
        </div>
    </div>
</section>
