<?php
/**
 * Meta boxes for page-specific editable fields.
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

/* ==========================================================================
   Register Meta Boxes
   ========================================================================== */
add_action('add_meta_boxes', function () {

    // About page
    add_meta_box('cfx_about_intro_heading', __('About — Intro Heading', 'cannaflex'), 'cannaflex_mb_text', 'page', 'normal', 'high', ['field' => '_cfx_about_intro_heading']);
    add_meta_box('cfx_about_mission', __('About — Mission', 'cannaflex'), 'cannaflex_mb_textarea', 'page', 'normal', 'high', ['field' => '_cfx_about_mission']);
    add_meta_box('cfx_about_values', __('About — Values (JSON)', 'cannaflex'), 'cannaflex_mb_textarea', 'page', 'normal', 'high', ['field' => '_cfx_about_values']);
    add_meta_box('cfx_about_cta', __('About — CTA Heading', 'cannaflex'), 'cannaflex_mb_text', 'page', 'normal', 'default', ['field' => '_cfx_about_cta']);
    add_meta_box('cfx_about_cta_text', __('About — CTA Body Text', 'cannaflex'), 'cannaflex_mb_textarea', 'page', 'normal', 'default', ['field' => '_cfx_about_cta_text']);
    add_meta_box('cfx_about_cta_bg', __('About — CTA Background Image URL', 'cannaflex'), 'cannaflex_mb_text', 'page', 'normal', 'default', ['field' => '_cfx_about_cta_bg']);

    // Activity page
    add_meta_box('cfx_activity_intro_heading', __('Activity — Intro Heading', 'cannaflex'), 'cannaflex_mb_text', 'page', 'normal', 'high', ['field' => '_cfx_activity_intro_heading']);
    add_meta_box('cfx_activity_intro', __('Activity — Intro Text', 'cannaflex'), 'cannaflex_mb_textarea', 'page', 'normal', 'high', ['field' => '_cfx_activity_intro']);
    add_meta_box('cfx_activity_blocks', __('Activity — Blocks (JSON)', 'cannaflex'), 'cannaflex_mb_textarea', 'page', 'normal', 'high', ['field' => '_cfx_activity_blocks']);
    add_meta_box('cfx_activity_certs_heading', __('Activity — Certifications Heading', 'cannaflex'), 'cannaflex_mb_text', 'page', 'normal', 'default', ['field' => '_cfx_activity_certs_heading']);
    add_meta_box('cfx_activity_certs_text', __('Activity — Certifications Text', 'cannaflex'), 'cannaflex_mb_textarea', 'page', 'normal', 'default', ['field' => '_cfx_activity_certs_text']);

    // Products page
    add_meta_box('cfx_products_intro', __('Products — Intro Text', 'cannaflex'), 'cannaflex_mb_textarea', 'page', 'normal', 'high', ['field' => '_cfx_products_intro']);

    // Brands page
    add_meta_box('cfx_brands_intro', __('Brands — Intro Text', 'cannaflex'), 'cannaflex_mb_textarea', 'page', 'normal', 'high', ['field' => '_cfx_brands_intro']);

    // News page
    add_meta_box('cfx_news_intro', __('News — Intro Text', 'cannaflex'), 'cannaflex_mb_textarea', 'page', 'normal', 'high', ['field' => '_cfx_news_intro']);

    // Team member role
    add_meta_box('cfx_team_role', __('Job Title', 'cannaflex'), 'cannaflex_mb_text', 'cfx_team', 'side', 'high', ['field' => '_cfx_team_role']);

    // Brand tagline
    add_meta_box('cfx_brand_tagline', __('Brand Tagline', 'cannaflex'), 'cannaflex_mb_text', 'cfx_brand', 'side', 'high', ['field' => '_cfx_brand_tagline']);

    // Certification description
    add_meta_box('cfx_cert_desc', __('Short Description', 'cannaflex'), 'cannaflex_mb_textarea', 'cfx_certification', 'normal', 'high', ['field' => '_cfx_cert_desc']);
});

/* ==========================================================================
   Render Callbacks
   ========================================================================== */
function cannaflex_mb_textarea(WP_Post $post, array $box): void {
    $field = $box['args']['field'];
    wp_nonce_field("cfx_save_{$field}", "cfx_nonce_{$field}");
    $value = get_post_meta($post->ID, $field, true);
    printf(
        '<textarea name="%1$s" id="%1$s" rows="6" style="width:100%%">%2$s</textarea>',
        esc_attr($field),
        esc_textarea($value)
    );
    if (str_contains($field, 'json') || str_contains($field, 'values') || str_contains($field, 'blocks')) {
        echo '<p class="description">' . esc_html__('Enter valid JSON. Example: [{"title":"Value","text":"Description"}]', 'cannaflex') . '</p>';
    }
}

function cannaflex_mb_text(WP_Post $post, array $box): void {
    $field = $box['args']['field'];
    wp_nonce_field("cfx_save_{$field}", "cfx_nonce_{$field}");
    $value = get_post_meta($post->ID, $field, true);
    printf(
        '<input type="text" name="%1$s" id="%1$s" value="%2$s" style="width:100%%">',
        esc_attr($field),
        esc_attr($value)
    );
}

/* ==========================================================================
   Save
   ========================================================================== */
add_action('save_post', function (int $post_id): void {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    $fields = [
        '_cfx_about_intro_heading',
        '_cfx_about_mission',
        '_cfx_about_values',
        '_cfx_about_cta',
        '_cfx_about_cta_text',
        '_cfx_about_cta_bg',
        '_cfx_activity_intro_heading',
        '_cfx_activity_intro',
        '_cfx_activity_blocks',
        '_cfx_activity_certs_heading',
        '_cfx_activity_certs_text',
        '_cfx_products_intro',
        '_cfx_brands_intro',
        '_cfx_news_intro',
        '_cfx_team_role',
        '_cfx_brand_tagline',
        '_cfx_cert_desc',
    ];

    foreach ($fields as $field) {
        $nonce_key = "cfx_nonce_{$field}";
        if (
            isset($_POST[$nonce_key]) &&
            wp_verify_nonce(sanitize_text_field(wp_unslash($_POST[$nonce_key])), "cfx_save_{$field}") &&
            isset($_POST[$field])
        ) {
            update_post_meta($post_id, $field, sanitize_textarea_field(wp_unslash($_POST[$field])));
        }
    }
});
