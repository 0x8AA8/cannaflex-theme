<?php
/**
 * Reusable contact form partial.
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

// Status notice (when redirected back from form handler)
if (isset($_GET['cfx_status'])) :
    $cfx_status = sanitize_text_field(wp_unslash($_GET['cfx_status']));
    ?>
    <div class="form-notice form-notice--<?php echo esc_attr($cfx_status); ?>" role="alert">
        <?php if ($cfx_status === 'success') : ?>
            <p><?php esc_html_e('Thank you! Your message has been sent successfully.', 'cannaflex'); ?></p>
        <?php else : ?>
            <p><?php esc_html_e('Please fill in all required fields.', 'cannaflex'); ?></p>
        <?php endif; ?>
    </div>
<?php endif; ?>

<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="cfx-contact-form" novalidate>
    <?php wp_nonce_field('cannaflex_contact_form', 'cannaflex_contact_nonce'); ?>
    <input type="hidden" name="action" value="cannaflex_contact">

    <div class="form-group">
        <label for="cfx-subject"><?php esc_html_e('Subject', 'cannaflex'); ?></label>
        <select class="form-control" id="cfx-subject" name="subject">
            <option value=""><?php esc_html_e('Select a subject', 'cannaflex'); ?></option>
            <option value="general"><?php esc_html_e('General Inquiry', 'cannaflex'); ?></option>
            <option value="products"><?php esc_html_e('Products', 'cannaflex'); ?></option>
            <option value="partnership"><?php esc_html_e('Partnership / B2B', 'cannaflex'); ?></option>
            <option value="catalog"><?php esc_html_e('Request Catalog', 'cannaflex'); ?></option>
            <option value="other"><?php esc_html_e('Other', 'cannaflex'); ?></option>
        </select>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="cfx-first-name"><?php esc_html_e('First name', 'cannaflex'); ?> <span aria-hidden="true">*</span></label>
            <input class="form-control" type="text" id="cfx-first-name" name="first_name" required placeholder="<?php esc_attr_e('First name', 'cannaflex'); ?>">
        </div>
        <div class="form-group">
            <label for="cfx-last-name"><?php esc_html_e('Last name', 'cannaflex'); ?></label>
            <input class="form-control" type="text" id="cfx-last-name" name="last_name" placeholder="<?php esc_attr_e('Last name', 'cannaflex'); ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="cfx-email"><?php esc_html_e('Email', 'cannaflex'); ?> <span aria-hidden="true">*</span></label>
        <input class="form-control" type="email" id="cfx-email" name="email" required placeholder="<?php esc_attr_e('your@email.com', 'cannaflex'); ?>">
    </div>

    <div class="form-group">
        <label for="cfx-message"><?php esc_html_e('Write a message', 'cannaflex'); ?> <span aria-hidden="true">*</span></label>
        <textarea class="form-control" id="cfx-message" name="message" required placeholder="<?php esc_attr_e('Your message…', 'cannaflex'); ?>"></textarea>
    </div>

    <button type="submit" class="btn btn--primary"><?php esc_html_e('Submit', 'cannaflex'); ?></button>
</form>
