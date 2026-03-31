<?php
/**
 * Home section: Contact split CTA
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;
?>
<section class="home-contact" aria-labelledby="home-contact-heading">
    <div class="home-contact__info">
        <?php $contact_bg = cannaflex_get('home_contact_image');
        if ($contact_bg) : ?>
            <div class="home-contact__info-bg"><img src="<?php echo esc_url($contact_bg); ?>" alt="" loading="lazy"></div>
        <?php endif; ?>
        <div class="home-contact__info-text">
            <?php echo wp_kses_post(nl2br(cannaflex_get('home_contact_text', "Have a question, an inquiry, or need more information about our products and services?\n\nFill out the form or call us at +212 537 327 822 — Our team will be happy to assist you."))); ?>
        </div>
    </div>
    <div class="home-contact__form">
        <h2 id="home-contact-heading"><?php echo esc_html(cannaflex_get('home_contact_heading', "Let's Connect")); ?></h2>
        <?php get_template_part('template-parts/contact', 'form'); ?>
    </div>
</section>
