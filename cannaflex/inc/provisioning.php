<?php
/**
 * Auto-provisioning: ensure required pages, menus, and settings exist.
 *
 * Runs on theme activation and on every init (idempotent).
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

/**
 * Canonical Cannaflex pages required by the PDF site map.
 * Keys = slug, values = [title, template file].
 */
function cannaflex_required_pages(): array {
    return [
        'about'    => ['About',    'page-about.php'],
        'activity' => ['Activity', 'page-activity.php'],
        'products' => ['Products', 'page-products.php'],
        'brands'   => ['Brands',   'page-brands.php'],
        'news'     => ['News',     'page-news.php'],
        'contact'  => ['Contact',  'page-contact.php'],
    ];
}

/**
 * Create missing pages and assign templates. Idempotent.
 */
function cannaflex_provision_pages(): void {
    foreach (cannaflex_required_pages() as $slug => [$title, $template]) {
        $page = get_page_by_path($slug);

        if ($page) {
            // Ensure template is assigned even if the page already exists
            $current_template = get_post_meta($page->ID, '_wp_page_template', true);
            if ($current_template !== $template) {
                update_post_meta($page->ID, '_wp_page_template', $template);
            }
            continue;
        }

        // Create the page
        $page_id = wp_insert_post([
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ]);

        if ($page_id && ! is_wp_error($page_id)) {
            update_post_meta($page_id, '_wp_page_template', $template);
        }
    }
}

/**
 * Set the front page to the static page if not already configured.
 */
function cannaflex_provision_front_page(): void {
    if (get_option('show_on_front') !== 'page') {
        update_option('show_on_front', 'page');
    }

    $front = get_option('page_on_front');
    if (! $front || ! get_post($front)) {
        // Try to find an existing page that could serve as front page
        $home = get_page_by_path('home');
        if (! $home) {
            $home = get_page_by_title('Home');
        }
        if ($home) {
            update_option('page_on_front', $home->ID);
        }
    }
}

/**
 * Create the canonical primary menu if no primary menu is assigned.
 */
function cannaflex_provision_menu(): void {
    $locations = get_nav_menu_locations();
    if (! empty($locations['primary'])) {
        $menu = wp_get_nav_menu_object($locations['primary']);
        if ($menu) {
            return; // A menu is already assigned
        }
    }

    // Check if our menu already exists
    $menu_name = 'Cannaflex Primary';
    $menu = wp_get_nav_menu_object($menu_name);

    if (! $menu) {
        $menu_id = wp_create_nav_menu($menu_name);
        if (is_wp_error($menu_id)) {
            return;
        }

        $nav_items = [
            'Home'     => home_url('/'),
            'About'    => home_url('/about/'),
            'Activity' => home_url('/activity/'),
            'Products' => home_url('/products/'),
            'Brands'   => home_url('/brands/'),
            'News'     => home_url('/news/'),
            'Contact'  => home_url('/contact/'),
        ];

        $position = 0;
        foreach ($nav_items as $label => $url) {
            $position++;
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'    => $label,
                'menu-item-url'      => $url,
                'menu-item-status'   => 'publish',
                'menu-item-type'     => 'custom',
                'menu-item-position' => $position,
            ]);
        }
    } else {
        $menu_id = $menu->term_id;
    }

    // Assign to primary location
    $locations = get_theme_mod('nav_menu_locations', []);
    $locations['primary'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
}

/**
 * Run on theme activation.
 */
add_action('after_switch_theme', function () {
    cannaflex_provision_pages();
    cannaflex_provision_front_page();
    cannaflex_provision_menu();
    flush_rewrite_rules();
});

/**
 * Run on every init — lightweight idempotent check.
 * Creates pages if they don't exist yet (first run after DB import, deploy, etc.).
 * Runs on both admin and frontend so /activity/ stops 404'ing immediately.
 */
add_action('init', function () {
    // Use a transient to avoid running on every page load
    if (get_transient('cannaflex_provisioned')) {
        return;
    }
    cannaflex_provision_pages();
    cannaflex_provision_front_page();
    set_transient('cannaflex_provisioned', 1, DAY_IN_SECONDS);
}, 99);

/**
 * Flush rewrite rules once after CPTs are registered, if needed.
 */
add_action('init', function () {
    if (get_option('cannaflex_flush_rewrites')) {
        flush_rewrite_rules();
        delete_option('cannaflex_flush_rewrites');
    }
}, 100);

/**
 * Flag rewrite flush when CPT registration runs.
 */
add_action('after_switch_theme', function () {
    update_option('cannaflex_flush_rewrites', 1);
});
