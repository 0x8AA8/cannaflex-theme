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
            <?php if (has_custom_logo()) :
                the_custom_logo();
            else : ?>
                <span class="site-logo__text">
                    <svg class="site-logo__wordmark" viewBox="0 0 180 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <text x="0" y="26" fill="#1F6656" font-family="Inter,sans-serif" font-weight="700" font-size="24" letter-spacing="0.04em">CANNAFLEX</text>
                    </svg>
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </span>
            <?php endif; ?>
        </a>

        <!-- Main navigation -->
        <nav class="main-nav" id="main-nav" aria-label="<?php esc_attr_e('Main navigation', 'cannaflex'); ?>">
            <?php
            if (has_nav_menu('primary')) {
                // Respect the assigned WP primary menu
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '<ul role="menubar">%3$s</ul>',
                    'depth'          => 1,
                    'fallback_cb'    => false,
                ]);
            } else {
                // Canonical fallback when no menu is assigned
                $cfx_nav = [
                    'Home'     => home_url('/'),
                    'About'    => home_url('/about/'),
                    'Activity' => home_url('/activity/'),
                    'Products' => home_url('/products/'),
                    'Brands'   => home_url('/brands/'),
                    'News'     => home_url('/news/'),
                    'Contact'  => home_url('/contact/'),
                ];
                echo '<ul role="menubar">';
                foreach ($cfx_nav as $label => $url) {
                    $request = wp_parse_url(sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'] ?? '')), PHP_URL_PATH) ?: '';
                    $target  = wp_parse_url($url, PHP_URL_PATH) ?: '';
                    $current = (untrailingslashit($request) === untrailingslashit($target))
                        ? ' aria-current="page"'
                        : '';
                    printf(
                        '<li role="none"><a href="%s" role="menuitem"%s>%s</a></li>',
                        esc_url($url),
                        $current,
                        esc_html($label)
                    );
                }
                echo '</ul>';
            }
            ?>
        </nav>

        <!-- Right-side actions -->
        <div class="header-actions">
            <button type="button" id="search-toggle" aria-label="<?php esc_attr_e('Open search', 'cannaflex'); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            </button>
            <span class="lang-indicator" aria-label="<?php esc_attr_e('Language: English', 'cannaflex'); ?>">
                <svg class="lang-flag" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <clipPath id="flag-circle"><circle cx="12" cy="12" r="11"/></clipPath>
                    <g clip-path="url(#flag-circle)">
                        <rect width="24" height="24" fill="#012169"/>
                        <path d="M0 0L24 24M24 0L0 24" stroke="#fff" stroke-width="4"/>
                        <path d="M0 0L24 24M24 0L0 24" stroke="#C8102E" stroke-width="2"/>
                        <path d="M12 0v24M0 12h24" stroke="#fff" stroke-width="6"/>
                        <path d="M12 0v24M0 12h24" stroke="#C8102E" stroke-width="3.6"/>
                    </g>
                    <circle cx="12" cy="12" r="11" fill="none" stroke="#ddd" stroke-width="0.5"/>
                </svg>
            </span>
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
