<?php
/**
 * Template Name: Contact
 * Template Post Type: page
 *
 * Matches: CANNAFLEX WEBSITE Contact page.pdf
 * - Left vertical image column
 * - Right: heading, intro, form, divider, address/phone/email as plain text, map
 * - No icon decorations, no "Contact Information" sub-heading (not in PDF)
 *
 * @package Cannaflex
 */

get_header();
?>

<section class="contact-page">
    <!-- Left image -->
    <div class="contact-page__image">
        <?php
        $img = cannaflex_get('contact_image');
        if ($img) : ?>
            <img src="<?php echo esc_url($img); ?>" alt="" loading="eager">
        <?php elseif (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('hero', ['loading' => 'eager']); ?>
        <?php else : ?>
            <div class="placeholder-img placeholder-img--full"><?php esc_html_e('Contact Image', 'cannaflex'); ?></div>
        <?php endif; ?>
    </div>

    <!-- Right content -->
    <div class="contact-page__content">
        <h1><?php echo esc_html(cannaflex_get('contact_heading', 'Contact Us')); ?></h1>
        <p class="contact-page__intro"><?php echo esc_html(cannaflex_get('contact_intro', "For any inquiries, please send a message using the form below and we'll respond as soon as possible")); ?></p>

        <?php get_template_part('template-parts/contact', 'form'); ?>

        <!-- Contact details (plain text per PDF — no icons) -->
        <div class="contact-details">
            <p><?php echo nl2br(esc_html(cannaflex_get('contact_address', "Rue de Fes Residence Soundous N\n129 Tanger Mall. Tanger, Morocco"))); ?></p>

            <p>
                <?php
                $phones = cannaflex_get('contact_phone', "+212 664 037 671\n+34 624 755 751");
                $phone_lines = explode("\n", $phones);
                foreach ($phone_lines as $phone) :
                    $phone = trim($phone);
                    if ($phone) : ?>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^+0-9]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a><br>
                    <?php endif;
                endforeach;
                ?>
            </p>

            <p><a href="mailto:<?php echo esc_attr(cannaflex_get('contact_email', 'contact@cannaflex.ma')); ?>"><?php echo esc_html(cannaflex_get('contact_email', 'contact@cannaflex.ma')); ?></a></p>
        </div>

        <!-- Map -->
        <?php
        $map_url = cannaflex_get('contact_map_embed');
        if ($map_url) : ?>
            <div class="contact-map">
                <iframe src="<?php echo esc_url($map_url); ?>" loading="lazy" allowfullscreen title="<?php esc_attr_e('Map to Cannaflex', 'cannaflex'); ?>"></iframe>
            </div>
        <?php else : ?>
            <div class="contact-map">
                <div class="placeholder-img placeholder-img--map"><?php esc_html_e('Map — Add embed URL in Customizer', 'cannaflex'); ?></div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
