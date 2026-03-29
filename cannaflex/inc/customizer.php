<?php
/**
 * Theme Customizer settings.
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

add_action('customize_register', function (WP_Customize_Manager $wp_customize) {

    /* ================================================================
       HOME — Hero
       ================================================================ */
    $wp_customize->add_section('cannaflex_hero', [
        'title'    => __('Home — Hero', 'cannaflex'),
        'priority' => 30,
    ]);

    $hero_fields = [
        'hero_heading'  => ['label' => 'Heading',    'default' => 'We are Leading the Change', 'type' => 'text'],
        'hero_text'     => ['label' => 'Subtext',    'default' => "We're redefining what cannabis can do. From Morocco's ancestral fields to international markets — we advance the legacy of Moroccan cannabis tradition, innovation, and craftsmanship to deliver premium, sustainable and high-quality cannabis products.\n\nJoin us in shaping the future of responsible, sustainable, and high-quality cannabis.", 'type' => 'textarea'],
        'hero_btn_text' => ['label' => 'Button text', 'default' => 'Join Us', 'type' => 'text'],
        'hero_btn_url'  => ['label' => 'Button URL',  'default' => '/contact', 'type' => 'url'],
    ];

    foreach ($hero_fields as $id => $f) {
        $sanitize = $f['type'] === 'url' ? 'esc_url_raw' : ($f['type'] === 'textarea' ? 'sanitize_textarea_field' : 'sanitize_text_field');
        $wp_customize->add_setting("cannaflex_{$id}", ['default' => $f['default'], 'sanitize_callback' => $sanitize]);
        $wp_customize->add_control("cannaflex_{$id}", [
            'label'   => $f['label'],
            'section' => 'cannaflex_hero',
            'type'    => $f['type'] === 'textarea' ? 'textarea' : 'text',
        ]);
    }

    $wp_customize->add_setting('cannaflex_hero_image', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cannaflex_hero_image', [
        'label'   => __('Hero Background Image', 'cannaflex'),
        'section' => 'cannaflex_hero',
    ]));

    /* ================================================================
       HOME — About Block
       ================================================================ */
    $wp_customize->add_section('cannaflex_home_about', [
        'title'    => __('Home — About Block', 'cannaflex'),
        'priority' => 31,
    ]);

    $about_fields = [
        'home_about_heading' => ['label' => 'Heading',     'default' => 'About Us'],
        'home_about_intro'   => ['label' => 'Intro line',  'default' => 'From the ancestral cradle of Moroccan cannabis to the global market — we\'re the partner you can trust.'],
        'home_about_text'    => ['label' => 'Body text',   'default' => "At the heart of the Rif Mountains — the ancestral cradle of Moroccan cannabis. This region's rich soil, unique microclimate, and deep cultural legacy have made it one of the world's most iconic cannabis-growing regions.\n\nWe honor that heritage by cultivating each plant with care and harvesting it with respect, using time-honored traditions passed down through generations of Moroccan farmers.\n\nMore than a producer, we're your global growth partner. Cannaflex's robust international network offers scalable, compliant cannabis solutions delivered to your market."],
        'home_about_btn'     => ['label' => 'Button text', 'default' => 'Learn More'],
    ];

    foreach ($about_fields as $id => $f) {
        $sanitize = in_array($id, ['home_about_text', 'home_about_intro']) ? 'sanitize_textarea_field' : 'sanitize_text_field';
        $wp_customize->add_setting("cannaflex_{$id}", ['default' => $f['default'], 'sanitize_callback' => $sanitize]);
        $wp_customize->add_control("cannaflex_{$id}", [
            'label'   => $f['label'],
            'section' => 'cannaflex_home_about',
            'type'    => in_array($id, ['home_about_text', 'home_about_intro']) ? 'textarea' : 'text',
        ]);
    }

    $wp_customize->add_setting('cannaflex_home_about_photo', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cannaflex_home_about_photo', [
        'label'   => __('Background Photo', 'cannaflex'),
        'section' => 'cannaflex_home_about',
    ]));

    $wp_customize->add_setting('cannaflex_home_about_image', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cannaflex_home_about_image', [
        'label'   => __('Badge / Emblem Overlay', 'cannaflex'),
        'section' => 'cannaflex_home_about',
    ]));

    /* ================================================================
       HOME — Seed to Shelf
       ================================================================ */
    $wp_customize->add_section('cannaflex_seed_shelf', [
        'title'    => __('Home — Seed to Shelf', 'cannaflex'),
        'priority' => 32,
    ]);

    $wp_customize->add_setting('cannaflex_seed_heading', ['default' => 'From Seed to Shelf', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('cannaflex_seed_heading', ['label' => 'Heading', 'section' => 'cannaflex_seed_shelf']);

    $wp_customize->add_setting('cannaflex_seed_text', ['default' => 'We control every step of the cannabis value chain — from cultivation in the Rif Mountains to finished products ready for global markets. This guarantees consistency, traceability, and outstanding quality across our full range of cannabis products.', 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('cannaflex_seed_text', ['label' => 'Description', 'section' => 'cannaflex_seed_shelf', 'type' => 'textarea']);

    $wp_customize->add_setting('cannaflex_seed_image', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cannaflex_seed_image', [
        'label'   => __('Left Image', 'cannaflex'),
        'section' => 'cannaflex_seed_shelf',
    ]));

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("cannaflex_process_{$i}_title", ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("cannaflex_process_{$i}_title", ['label' => "Tile {$i} Title", 'section' => 'cannaflex_seed_shelf']);
        $wp_customize->add_setting("cannaflex_process_{$i}_text", ['default' => '', 'sanitize_callback' => 'sanitize_textarea_field']);
        $wp_customize->add_control("cannaflex_process_{$i}_text", ['label' => "Tile {$i} Text", 'section' => 'cannaflex_seed_shelf', 'type' => 'textarea']);
    }

    /* ================================================================
       HOME — Products
       ================================================================ */
    $wp_customize->add_section('cannaflex_products', [
        'title'    => __('Home — Products', 'cannaflex'),
        'priority' => 33,
    ]);

    $wp_customize->add_setting('cannaflex_products_heading', ['default' => 'Our Products', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('cannaflex_products_heading', ['label' => 'Heading', 'section' => 'cannaflex_products']);

    $wp_customize->add_setting('cannaflex_products_text', ['default' => 'We offer a comprehensive range of premium cannabis products, from dermatological to medical that not only meet manufacturing standards, but also comply with local and international regulations. Each product embodies the legacy of Moroccan craftsmanship — a refined blend of traditional know-how that reflects our unwavering commitment to authenticity, quality, and the healing power of Moroccan cannabis.', 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('cannaflex_products_text', ['label' => 'Subtitle', 'section' => 'cannaflex_products', 'type' => 'textarea']);

    /* ================================================================
       HOME — Brands
       ================================================================ */
    $wp_customize->add_section('cannaflex_brands', [
        'title'    => __('Home — Brands', 'cannaflex'),
        'priority' => 34,
    ]);

    $wp_customize->add_setting('cannaflex_brands_heading', ['default' => 'Discover our Brands', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('cannaflex_brands_heading', ['label' => 'Heading', 'section' => 'cannaflex_brands']);

    $wp_customize->add_setting('cannaflex_brands_text', ['default' => 'Explore our distinct brands, each with its own identity, unified by the values at the heart of our company.', 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('cannaflex_brands_text', ['label' => 'Subtitle', 'section' => 'cannaflex_brands', 'type' => 'textarea']);

    /* ================================================================
       HOME — Contact Block
       ================================================================ */
    $wp_customize->add_section('cannaflex_home_contact', [
        'title'    => __('Home — Contact Block', 'cannaflex'),
        'priority' => 36,
    ]);

    $wp_customize->add_setting('cannaflex_home_contact_text', [
        'default'           => "Have a question, an inquiry, or need more information about our products and services? Fill out the form or call us at +212 537 327 822 — Our team will be happy to assist you.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('cannaflex_home_contact_text', ['label' => 'Left panel text', 'section' => 'cannaflex_home_contact', 'type' => 'textarea']);

    $wp_customize->add_setting('cannaflex_home_contact_image', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cannaflex_home_contact_image', [
        'label'   => __('Background Image', 'cannaflex'),
        'section' => 'cannaflex_home_contact',
    ]));

    /* ================================================================
       CONTACT PAGE
       ================================================================ */
    $wp_customize->add_section('cannaflex_contact', [
        'title'    => __('Contact Page', 'cannaflex'),
        'priority' => 40,
    ]);

    $contact_fields = [
        'contact_heading'   => ['label' => 'Heading',         'default' => 'Contact Us'],
        'contact_intro'     => ['label' => 'Intro text',      'default' => "For any inquiries, please send a message using the form below and we'll respond as soon as possible"],
        'contact_address'   => ['label' => 'Address',         'default' => "Rue de Fes Residence Soundous N\n129 Tanger Mall. Tanger, Morocco"],
        'contact_phone'     => ['label' => 'Phone',           'default' => "+212 664 037 671\n+34 624 755 751"],
        'contact_email'     => ['label' => 'Email',           'default' => 'contact@cannaflex.ma'],
        'contact_map_embed' => ['label' => 'Map embed URL',   'default' => ''],
    ];

    foreach ($contact_fields as $id => $f) {
        $sanitize = in_array($id, ['contact_address', 'contact_phone', 'contact_intro']) ? 'sanitize_textarea_field' : 'sanitize_text_field';
        $wp_customize->add_setting("cannaflex_{$id}", ['default' => $f['default'], 'sanitize_callback' => $sanitize]);
        $wp_customize->add_control("cannaflex_{$id}", [
            'label'   => $f['label'],
            'section' => 'cannaflex_contact',
            'type'    => in_array($id, ['contact_address', 'contact_phone', 'contact_intro']) ? 'textarea' : 'text',
        ]);
    }

    $wp_customize->add_setting('cannaflex_contact_image', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cannaflex_contact_image', [
        'label'   => __('Left Side Image', 'cannaflex'),
        'section' => 'cannaflex_contact',
    ]));

    /* ================================================================
       PRODUCTS PAGE
       ================================================================ */
    $wp_customize->add_section('cannaflex_products_page', [
        'title'    => __('Products Page', 'cannaflex'),
        'priority' => 41,
    ]);

    $wp_customize->add_setting('cannaflex_products_page_heading', ['default' => 'Our Products', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('cannaflex_products_page_heading', ['label' => 'Page Heading', 'section' => 'cannaflex_products_page']);

    $wp_customize->add_setting('cannaflex_products_page_text', ['default' => 'Explore our complete range of premium cannabis-derived products — from cosmetics and supplements to extracts and edibles.', 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('cannaflex_products_page_text', ['label' => 'Page Subtitle', 'section' => 'cannaflex_products_page', 'type' => 'textarea']);

    /* ================================================================
       BRANDS PAGE
       ================================================================ */
    $wp_customize->add_section('cannaflex_brands_page', [
        'title'    => __('Brands Page', 'cannaflex'),
        'priority' => 42,
    ]);

    $wp_customize->add_setting('cannaflex_brands_page_heading', ['default' => 'Our Brands', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('cannaflex_brands_page_heading', ['label' => 'Page Heading', 'section' => 'cannaflex_brands_page']);

    $wp_customize->add_setting('cannaflex_brands_page_text', ['default' => 'Each brand in the Cannaflex family carries its own identity — unified by our commitment to quality, innovation, and Moroccan heritage.', 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('cannaflex_brands_page_text', ['label' => 'Page Subtitle', 'section' => 'cannaflex_brands_page', 'type' => 'textarea']);

    /* ================================================================
       FOOTER
       ================================================================ */
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
