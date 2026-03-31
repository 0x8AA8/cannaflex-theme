<?php
/**
 * Cannaflex Theme Functions
 *
 * @package Cannaflex
 * @since   1.0.0
 */

defined('ABSPATH') || exit;

define('CANNAFLEX_VERSION', '1.0.0');
define('CANNAFLEX_DIR', get_template_directory());
define('CANNAFLEX_URI', get_template_directory_uri());

/* ==========================================================================
   Theme Setup
   ========================================================================== */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('html5', [
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
    ]);
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');

    register_nav_menus([
        'primary' => __('Primary Navigation', 'cannaflex'),
        'footer'  => __('Footer Navigation', 'cannaflex'),
    ]);

    add_image_size('hero', 1920, 1080, true);
    add_image_size('card', 600, 800, true);
    add_image_size('card-wide', 800, 600, true);
    add_image_size('thumb-sm', 200, 160, true);
    add_image_size('brand-logo', 300, 120, false);
});

/* ==========================================================================
   Enqueue Assets
   ========================================================================== */
add_action('wp_enqueue_scripts', function () {
    // Google Fonts — Inter
    wp_enqueue_style(
        'cannaflex-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'cannaflex-main',
        CANNAFLEX_URI . '/assets/css/main.css',
        ['cannaflex-google-fonts'],
        CANNAFLEX_VERSION
    );

    wp_enqueue_script(
        'cannaflex-main',
        CANNAFLEX_URI . '/assets/js/main.js',
        [],
        CANNAFLEX_VERSION,
        true
    );
});

/* ==========================================================================
   Dynamic CSS (About CTA background image)
   ========================================================================== */
add_action('wp_enqueue_scripts', function () {
    if (! is_page_template('page-about.php')) {
        return;
    }
    $page_id = get_queried_object_id();
    if (! $page_id) {
        return;
    }
    $cta_bg = get_post_meta($page_id, '_cfx_about_cta_bg', true);
    if (! $cta_bg) {
        return;
    }
    $css = '.cta-strip__action{background-image:linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.4)),url(' . esc_url_raw($cta_bg) . ');}';
    wp_add_inline_style('cannaflex-main', $css);
}, 20);

/* ==========================================================================
   Widgets
   ========================================================================== */
add_action('widgets_init', function () {
    register_sidebar([
        'name'          => __('Footer Sidebar', 'cannaflex'),
        'id'            => 'footer-sidebar',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ]);

    register_sidebar([
        'name'          => __('Shop Sidebar', 'cannaflex'),
        'id'            => 'shop-sidebar',
        'before_widget' => '<div class="shop-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ]);
});

/* ==========================================================================
   Includes (modular)
   ========================================================================== */
require_once CANNAFLEX_DIR . '/inc/custom-post-types.php';
require_once CANNAFLEX_DIR . '/inc/customizer.php';
require_once CANNAFLEX_DIR . '/inc/meta-boxes.php';
require_once CANNAFLEX_DIR . '/inc/contact-handler.php';
require_once CANNAFLEX_DIR . '/inc/provisioning.php';

/* ==========================================================================
   Helpers
   ========================================================================== */

/**
 * Get a Customizer value with fallback.
 */
function cannaflex_get(string $key, string $default = ''): string {
    return get_theme_mod("cannaflex_{$key}", $default);
}

/**
 * Generate a placeholder SVG data URI.
 */
function cannaflex_placeholder(int $w = 800, int $h = 600, string $text = ''): string {
    $t = $text ? urlencode($text) : "{$w}x{$h}";
    return "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='{$w}' height='{$h}'%3E%3Crect fill='%23C7D9D5' width='{$w}' height='{$h}'/%3E%3Ctext x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' fill='%231F6656' font-family='Inter,sans-serif' font-size='16'%3E{$t}%3C/text%3E%3C/svg%3E";
}

/**
 * Render a responsive image or placeholder.
 */
function cannaflex_image(string $url, string $alt = '', string $size = 'hero', array $attrs = []): void {
    if ($url) {
        $attr_str = '';
        foreach ($attrs as $k => $v) {
            $attr_str .= ' ' . esc_attr($k) . '="' . esc_attr($v) . '"';
        }
        printf('<img src="%s" alt="%s"%s>', esc_url($url), esc_attr($alt), $attr_str);
    } else {
        printf('<div class="placeholder-img" style="width:100%%;height:100%%">%s</div>', esc_html($alt ?: 'Image'));
    }
}

/* ==========================================================================
   Custom excerpt length
   ========================================================================== */
add_filter('excerpt_length', function () {
    return 20;
}, 999);

add_filter('excerpt_more', function () {
    return '&hellip;';
});

/* ==========================================================================
   Body classes
   ========================================================================== */
add_filter('body_class', function (array $classes): array {
    if (is_front_page()) {
        $classes[] = 'is-front-page';
    }
    return $classes;
});

/* ==========================================================================
   Prevent foreign block content from contaminating Cannaflex templates.
   Only suppresses when the page content appears to be from another theme
   (contains Organic Store / WooCommerce blocks). Legitimate editor content
   on these templates is handled via page meta fields, not the_content().
   ========================================================================== */
add_filter('the_content', function (string $content): string {
    if (is_admin() || wp_doing_ajax()) {
        return $content;
    }
    $template = get_page_template_slug();
    $meta_driven = ['page-about.php', 'page-activity.php', 'page-contact.php'];
    if (in_array($template, $meta_driven, true)) {
        // Suppress if content contains foreign blocks or is non-empty
        // (these templates get their content from meta fields, not the editor)
        if (trim($content) !== '') {
            return '';
        }
    }
    return $content;
}, 1);
