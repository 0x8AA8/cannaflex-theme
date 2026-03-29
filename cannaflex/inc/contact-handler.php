<?php
/**
 * Contact form handler (admin-post).
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

add_action('admin_post_nopriv_cannaflex_contact', 'cannaflex_handle_contact');
add_action('admin_post_cannaflex_contact', 'cannaflex_handle_contact');

/**
 * Process the contact form submission.
 */
function cannaflex_handle_contact(): void {
    if (
        ! isset($_POST['cannaflex_contact_nonce']) ||
        ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['cannaflex_contact_nonce'])), 'cannaflex_contact_form')
    ) {
        wp_die(__('Security check failed.', 'cannaflex'), 403);
    }

    $subject    = sanitize_text_field(wp_unslash($_POST['subject'] ?? ''));
    $first_name = sanitize_text_field(wp_unslash($_POST['first_name'] ?? ''));
    $last_name  = sanitize_text_field(wp_unslash($_POST['last_name'] ?? ''));
    $email      = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $message    = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));

    if (! $first_name || ! $email || ! $message) {
        wp_safe_redirect(add_query_arg('cfx_status', 'error', wp_get_referer()));
        exit;
    }

    $to      = get_option('admin_email');
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        "Reply-To: {$first_name} {$last_name} <{$email}>",
    ];
    $body = sprintf(
        '<p><strong>Subject:</strong> %s</p><p><strong>From:</strong> %s %s &lt;%s&gt;</p><p><strong>Message:</strong></p><p>%s</p>',
        esc_html($subject),
        esc_html($first_name),
        esc_html($last_name),
        esc_html($email),
        nl2br(esc_html($message))
    );

    wp_mail($to, "[Cannaflex] {$subject}", $body, $headers);

    wp_safe_redirect(add_query_arg('cfx_status', 'success', wp_get_referer()));
    exit;
}
