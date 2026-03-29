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

/* ---------- Theme setup ---------- */
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

    register_nav_menus([
        'primary' => __('Primary Navigation', 'cannaflex'),
        'footer'  => __('Footer Navigation', 'cannaflex'),
    ]);

    add_image_size('hero', 1920, 1080, true);
    add_image_size('card', 600, 800, true);
    add_image_size('thumb-sm', 200, 160, true);
});

/* ---------- Enqueue assets ---------- */
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

/* ---------- Customizer ---------- */
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {

    /* --- Hero section --- */
    $wp_customize->add_section('cannaflex_hero', [
        'title'    => __('Home — Hero', 'cannaflex'),
        'priority' => 30,
    ]);

    $hero_fields = [
        'hero_heading'  => ['label' => 'Heading',   'default' => 'We are Leading the Change', 'type' => 'text'],
        'hero_text'     => ['label' => 'Subtext',    'default' => 'Pioneering legal cannabis from Morocco to the world — with quality, integrity, and innovation at every step.', 'type' => 'textarea'],
        'hero_btn_text' => ['label' => 'Button text', 'default' => 'Join Us', 'type' => 'text'],
        'hero_btn_url'  => ['label' => 'Button URL',  'default' => '/contact', 'type' => 'url'],
    ];

    foreach ($hero_fields as $id => $f) {
        $wp_customize->add_setting("cannaflex_{$id}", ['default' => $f['default'], 'sanitize_callback' => $f['type'] === 'url' ? 'esc_url_raw' : 'sanitize_text_field']);
        $control = $f['type'] === 'textarea' ? 'WP_Customize_Control' : 'WP_Customize_Control';
        $wp_customize->add_control("cannaflex_{$id}", [
            'label'   => $f['label'],
            'section' => 'cannaflex_hero',
            'type'    => $f['type'] === 'textarea' ? 'textarea' : 'text',
        ]);
    }

    // Hero image
    $wp_customize->add_setting('cannaflex_hero_image', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cannaflex_hero_image', [
        'label'   => __('Hero Background Image', 'cannaflex'),
        'section' => 'cannaflex_hero',
    ]));

    /* --- About section (home) --- */
    $wp_customize->add_section('cannaflex_home_about', [
        'title'    => __('Home — About Block', 'cannaflex'),
        'priority' => 31,
    ]);

    $about_fields = [
        'home_about_heading' => ['label' => 'Heading',   'default' => 'About Us'],
        'home_about_text'    => ['label' => 'Text',      'default' => 'From the ancestral cradle of Moroccan cannabis to the global market, Cannaflex embodies the fusion of tradition and innovation. Rooted in the Rif Mountains, we cultivate, extract, transform, and export premium cannabis-derived products with integrity and purpose.'],
        'home_about_btn'     => ['label' => 'Button text', 'default' => 'Learn More'],
    ];

    foreach ($about_fields as $id => $f) {
        $wp_customize->add_setting("cannaflex_{$id}", ['default' => $f['default'], 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("cannaflex_{$id}", [
            'label'   => $f['label'],
            'section' => 'cannaflex_home_about',
            'type'    => $id === 'home_about_text' ? 'textarea' : 'text',
        ]);
    }

    $wp_customize->add_setting('cannaflex_home_about_image', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cannaflex_home_about_image', [
        'label'   => __('Badge / Image', 'cannaflex'),
        'section' => 'cannaflex_home_about',
    ]));

    /* --- Seed to shelf (home) --- */
    $wp_customize->add_section('cannaflex_seed_shelf', [
        'title'    => __('Home — Seed to Shelf', 'cannaflex'),
        'priority' => 32,
    ]);

    $wp_customize->add_setting('cannaflex_seed_heading', ['default' => 'From Seed to Shelf', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('cannaflex_seed_heading', ['label' => 'Heading', 'section' => 'cannaflex_seed_shelf']);

    $wp_customize->add_setting('cannaflex_seed_text', ['default' => 'We control every step of the cannabis value chain — from cultivation in the Rif Mountains to finished products ready for global markets.', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('cannaflex_seed_text', ['label' => 'Description', 'section' => 'cannaflex_seed_shelf', 'type' => 'textarea']);

    $wp_customize->add_setting('cannaflex_seed_image', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cannaflex_seed_image', [
        'label'   => __('Left Image', 'cannaflex'),
        'section' => 'cannaflex_seed_shelf',
    ]));

    // Process tiles
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("cannaflex_process_{$i}_title", ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("cannaflex_process_{$i}_title", ['label' => "Tile {$i} Title", 'section' => 'cannaflex_seed_shelf']);
        $wp_customize->add_setting("cannaflex_process_{$i}_text", ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("cannaflex_process_{$i}_text", ['label' => "Tile {$i} Text", 'section' => 'cannaflex_seed_shelf', 'type' => 'textarea']);
    }

    /* --- Products section --- */
    $wp_customize->add_section('cannaflex_products', [
        'title'    => __('Home — Products', 'cannaflex'),
        'priority' => 33,
    ]);

    $wp_customize->add_setting('cannaflex_products_heading', ['default' => 'Our Products', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('cannaflex_products_heading', ['label' => 'Heading', 'section' => 'cannaflex_products']);

    $wp_customize->add_setting('cannaflex_products_text', ['default' => 'Explore our range of premium cannabis-derived products.', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('cannaflex_products_text', ['label' => 'Subtitle', 'section' => 'cannaflex_products', 'type' => 'textarea']);

    /* --- Brands strip --- */
    $wp_customize->add_section('cannaflex_brands', [
        'title'    => __('Home — Brands', 'cannaflex'),
        'priority' => 34,
    ]);

    $wp_customize->add_setting('cannaflex_brands_heading', ['default' => 'Discover our Brands', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('cannaflex_brands_heading', ['label' => 'Heading', 'section' => 'cannaflex_brands']);

    $wp_customize->add_setting('cannaflex_brands_text', ['default' => 'Our family of brands delivers quality and innovation across categories.', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('cannaflex_brands_text', ['label' => 'Subtitle', 'section' => 'cannaflex_brands', 'type' => 'textarea']);

    /* --- Contact section (home) --- */
    $wp_customize->add_section('cannaflex_home_contact', [
        'title'    => __('Home — Contact Block', 'cannaflex'),
        'priority' => 36,
    ]);

    $wp_customize->add_setting('cannaflex_home_contact_text', [
        'default'           => 'Have a question, an inquiry, or need more information about our products and services? Fill out the form or call us at +212 537 327 822 — Our team will be happy to assist you.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('cannaflex_home_contact_text', ['label' => 'Left panel text', 'section' => 'cannaflex_home_contact', 'type' => 'textarea']);

    $wp_customize->add_setting('cannaflex_home_contact_image', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cannaflex_home_contact_image', [
        'label'   => __('Background Image', 'cannaflex'),
        'section' => 'cannaflex_home_contact',
    ]));

    /* --- Contact page --- */
    $wp_customize->add_section('cannaflex_contact', [
        'title'    => __('Contact Page', 'cannaflex'),
        'priority' => 40,
    ]);

    $contact_fields = [
        'contact_address' => ['label' => 'Address',  'default' => 'Rue de Fes Residence Soundous N, 129 Tanger Mall. Tanger, Morocco'],
        'contact_phone'   => ['label' => 'Phone',    'default' => '+212 664 037 671, +34 624 755 751'],
        'contact_email'   => ['label' => 'Email',    'default' => 'contact@cannaflex.ma'],
        'contact_map_embed' => ['label' => 'Map embed URL', 'default' => ''],
    ];

    foreach ($contact_fields as $id => $f) {
        $wp_customize->add_setting("cannaflex_{$id}", ['default' => $f['default'], 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("cannaflex_{$id}", ['label' => $f['label'], 'section' => 'cannaflex_contact', 'type' => 'text']);
    }

    $wp_customize->add_setting('cannaflex_contact_image', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cannaflex_contact_image', [
        'label'   => __('Left Side Image', 'cannaflex'),
        'section' => 'cannaflex_contact',
    ]));

    /* --- Footer --- */
    $wp_customize->add_section('cannaflex_footer', [
        'title'    => __('Footer', 'cannaflex'),
        'priority' => 50,
    ]);

    $social = ['facebook', 'whatsapp', 'instagram', 'linkedin'];
    foreach ($social as $s) {
        $wp_customize->add_setting("cannaflex_social_{$s}", ['default' => '#', 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control("cannaflex_social_{$s}", ['label' => ucfirst($s) . ' URL', 'section' => 'cannaflex_footer', 'type' => 'url']);
    }

    $wp_customize->add_setting('cannaflex_footer_badge', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cannaflex_footer_badge', [
        'label'   => __('"Made in Morocco" Badge', 'cannaflex'),
        'section' => 'cannaflex_footer',
    ]));

    $wp_customize->add_setting('cannaflex_copyright', ['default' => '2025 by CANNAFLEX. Powered by Cannabis sativa L.', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('cannaflex_copyright', ['label' => 'Copyright text', 'section' => 'cannaflex_footer']);
});

/* ---------- Custom post type: Products ---------- */
add_action('init', function () {
    register_post_type('cfx_product', [
        'labels' => [
            'name'          => __('Products', 'cannaflex'),
            'singular_name' => __('Product', 'cannaflex'),
            'add_new_item'  => __('Add New Product', 'cannaflex'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-products',
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite'      => ['slug' => 'products'],
        'show_in_rest' => true,
    ]);

    register_taxonomy('product_category', 'cfx_product', [
        'labels' => [
            'name'          => __('Product Categories', 'cannaflex'),
            'singular_name' => __('Category', 'cannaflex'),
        ],
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => ['slug' => 'product-category'],
        'show_in_rest' => true,
    ]);

    register_post_type('cfx_brand', [
        'labels' => [
            'name'          => __('Brands', 'cannaflex'),
            'singular_name' => __('Brand', 'cannaflex'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-store',
        'supports'     => ['title', 'thumbnail'],
        'rewrite'      => ['slug' => 'brands'],
        'show_in_rest' => true,
    ]);

    register_post_type('cfx_team', [
        'labels' => [
            'name'          => __('Team Members', 'cannaflex'),
            'singular_name' => __('Team Member', 'cannaflex'),
        ],
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-groups',
        'supports'     => ['title', 'thumbnail', 'custom-fields'],
        'show_in_rest' => true,
    ]);

    register_post_type('cfx_certification', [
        'labels' => [
            'name'          => __('Certifications', 'cannaflex'),
            'singular_name' => __('Certification', 'cannaflex'),
        ],
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-awards',
        'supports'     => ['title', 'thumbnail'],
        'show_in_rest' => true,
    ]);
});

/* ---------- Meta boxes for page fields ---------- */
require_once CANNAFLEX_DIR . '/inc/meta-boxes.php';

/* ---------- Contact form handler ---------- */
add_action('admin_post_nopriv_cannaflex_contact', 'cannaflex_handle_contact');
add_action('admin_post_cannaflex_contact', 'cannaflex_handle_contact');

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
    $headers = ['Content-Type: text/html; charset=UTF-8', "Reply-To: {$first_name} {$last_name} <{$email}>"];
    $body    = sprintf(
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

/* ---------- Widgets ---------- */
add_action('widgets_init', function () {
    register_sidebar([
        'name'          => __('Footer Sidebar', 'cannaflex'),
        'id'            => 'footer-sidebar',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ]);
});

/* ---------- Helpers ---------- */
function cannaflex_get(string $key, string $default = ''): string {
    return get_theme_mod("cannaflex_{$key}", $default);
}

function cannaflex_placeholder(int $w = 800, int $h = 600, string $text = ''): string {
    $t = $text ? urlencode($text) : "{$w}x{$h}";
    return "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='{$w}' height='{$h}'%3E%3Crect fill='%23C7D9D5' width='{$w}' height='{$h}'/%3E%3Ctext x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' fill='%231F6656' font-family='Inter,sans-serif' font-size='16'%3E{$t}%3C/text%3E%3C/svg%3E";
}
