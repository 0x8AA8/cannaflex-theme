<?php
/**
 * Template Name: Contact
 * Template Post Type: page
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
            <img src="<?php echo esc_url($img); ?>" alt="" loading="eager" width="500" height="1000">
        <?php elseif (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('hero', ['loading' => 'eager']); ?>
        <?php else : ?>
            <div class="placeholder-img" style="width:100%;height:100%;min-height:100vh">Contact Image</div>
        <?php endif; ?>
    </div>

    <!-- Right content -->
    <div class="contact-page__content">
        <h1><?php esc_html_e('Contact Us', 'cannaflex'); ?></h1>
        <p><?php esc_html_e('For any inquiries, please send a message using the form below and we\'ll respond as soon as possible.', 'cannaflex'); ?></p>

        <?php
        // Status message
        if (isset($_GET['cfx_status'])) :
            $status = sanitize_text_field(wp_unslash($_GET['cfx_status']));
            if ($status === 'success') : ?>
                <div role="alert" style="padding:1rem;background:#e8f5e9;border-radius:6px;margin-bottom:1.5rem;color:var(--color-primary)">
                    <?php esc_html_e('Thank you! Your message has been sent successfully.', 'cannaflex'); ?>
                </div>
            <?php elseif ($status === 'error') : ?>
                <div role="alert" style="padding:1rem;background:#ffebee;border-radius:6px;margin-bottom:1.5rem;color:var(--color-error)">
                    <?php esc_html_e('Please fill in all required fields.', 'cannaflex'); ?>
                </div>
            <?php endif;
        endif;
        ?>

        <?php get_template_part('template-parts/contact', 'form'); ?>

        <!-- Contact details -->
        <div class="contact-details">
            <h3><?php esc_html_e('Contact Information', 'cannaflex'); ?></h3>
            <div class="contact-info-list">
                <div class="contact-info-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span><?php echo esc_html(cannaflex_get('contact_address', 'Rue de Fes Residence Soundous N, 129 Tanger Mall. Tanger, Morocco')); ?></span>
                </div>
                <div class="contact-info-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span><?php echo esc_html(cannaflex_get('contact_phone', '+212 664 037 671, +34 624 755 751')); ?></span>
                </div>
                <div class="contact-info-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <span><?php echo esc_html(cannaflex_get('contact_email', 'contact@cannaflex.ma')); ?></span>
                </div>
            </div>
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
                <div class="placeholder-img" style="width:100%;height:100%"><?php esc_html_e('Map Embed — Add URL in Customizer', 'cannaflex'); ?></div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
