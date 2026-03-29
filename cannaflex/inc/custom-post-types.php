<?php
/**
 * Custom Post Types and Taxonomies.
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

add_action('init', function () {

    /* ---------- Products ---------- */
    register_post_type('cfx_product', [
        'labels' => [
            'name'               => __('Products', 'cannaflex'),
            'singular_name'      => __('Product', 'cannaflex'),
            'add_new_item'       => __('Add New Product', 'cannaflex'),
            'edit_item'          => __('Edit Product', 'cannaflex'),
            'all_items'          => __('All Products', 'cannaflex'),
            'search_items'       => __('Search Products', 'cannaflex'),
            'not_found'          => __('No products found.', 'cannaflex'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-products',
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'rewrite'      => ['slug' => 'products'],
        'show_in_rest' => true,
    ]);

    /* ---------- Product Categories ---------- */
    register_taxonomy('product_category', 'cfx_product', [
        'labels' => [
            'name'          => __('Product Categories', 'cannaflex'),
            'singular_name' => __('Category', 'cannaflex'),
            'add_new_item'  => __('Add New Category', 'cannaflex'),
        ],
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => ['slug' => 'product-category'],
        'show_in_rest' => true,
    ]);

    /* ---------- Brands ---------- */
    register_post_type('cfx_brand', [
        'labels' => [
            'name'               => __('Brands', 'cannaflex'),
            'singular_name'      => __('Brand', 'cannaflex'),
            'add_new_item'       => __('Add New Brand', 'cannaflex'),
            'edit_item'          => __('Edit Brand', 'cannaflex'),
            'all_items'          => __('All Brands', 'cannaflex'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-store',
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'rewrite'      => ['slug' => 'brands'],
        'show_in_rest' => true,
    ]);

    /* ---------- Team Members ---------- */
    register_post_type('cfx_team', [
        'labels' => [
            'name'               => __('Team Members', 'cannaflex'),
            'singular_name'      => __('Team Member', 'cannaflex'),
            'add_new_item'       => __('Add New Member', 'cannaflex'),
        ],
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-groups',
        'supports'     => ['title', 'thumbnail', 'custom-fields', 'page-attributes'],
        'show_in_rest' => true,
    ]);

    /* ---------- Certifications ---------- */
    register_post_type('cfx_certification', [
        'labels' => [
            'name'               => __('Certifications', 'cannaflex'),
            'singular_name'      => __('Certification', 'cannaflex'),
            'add_new_item'       => __('Add New Certification', 'cannaflex'),
        ],
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-awards',
        'supports'     => ['title', 'editor', 'thumbnail', 'page-attributes'],
        'show_in_rest' => true,
    ]);
});
