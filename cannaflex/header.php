<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="sr-only" href="#main-content"><?php esc_html_e('Skip to content', 'cannaflex'); ?></a>

<header class="site-header" role="banner">
    <div class="container">
        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" aria-label="<?php bloginfo('name'); ?>">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <span style="font-weight:700;font-size:1.5rem;color:var(--color-primary)"><?php bloginfo('name'); ?></span>
            <?php endif; ?>
        </a>

        <!-- Main navigation -->
        <nav class="main-nav" id="main-nav" aria-label="<?php esc_attr_e('Main navigation', 'cannaflex'); ?>">
            <?php
            $nav_items = [
                'Home'     => home_url('/'),
                'About'    => home_url('/about/'),
                'Activity' => home_url('/activity/'),
                'Products' => home_url('/products/'),
                'Brands'   => home_url('/brands/'),
                'News'     => home_url('/news/'),
                'Contact'  => home_url('/contact/'),
            ];

            if (has_nav_menu('primary')) {
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'depth'          => 1,
                ]);
            } else {
                foreach ($nav_items as $label => $url) {
                    $current = (untrailingslashit(wp_parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '') === untrailingslashit(wp_parse_url($url, PHP_URL_PATH) ?: ''))
                        ? ' aria-current="page"'
                        : '';
                    printf('<a href="%s"%s>%s</a>', esc_url($url), $current, esc_html($label));
                }
            }
            ?>
        </nav>

        <!-- Right-side actions -->
        <div class="header-actions">
            <button type="button" id="search-toggle" aria-label="<?php esc_attr_e('Open search', 'cannaflex'); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            </button>
            <span class="lang-indicator" aria-label="<?php esc_attr_e('Language', 'cannaflex'); ?>">EN</span>
            <button type="button" class="nav-toggle" id="nav-toggle" aria-label="<?php esc_attr_e('Toggle menu', 'cannaflex'); ?>" aria-expanded="false" aria-controls="main-nav">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<!-- Search overlay -->
<div class="search-overlay" id="search-overlay" role="dialog" aria-label="<?php esc_attr_e('Site search', 'cannaflex'); ?>">
    <div class="search-overlay__inner">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <label class="sr-only" for="s-overlay"><?php esc_html_e('Search', 'cannaflex'); ?></label>
            <input class="form-control" type="search" id="s-overlay" name="s" placeholder="<?php esc_attr_e('Search…', 'cannaflex'); ?>">
            <button type="submit" class="btn btn--primary"><?php esc_html_e('Search', 'cannaflex'); ?></button>
        </form>
    </div>
</div>

<main id="main-content">
