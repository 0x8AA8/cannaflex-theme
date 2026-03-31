<?php
/**
 * About section: Our Mission
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

$page_id = get_the_ID();
?>
<section class="our-mission section" aria-labelledby="mission-heading">
    <div class="container">
        <div class="split">
            <div>
                <h2 id="mission-heading"><?php esc_html_e('Our Mission', 'cannaflex'); ?></h2>
            </div>
            <div>
                <?php
                $mission = get_post_meta($page_id, '_cfx_about_mission', true);
                if ($mission) {
                    echo wp_kses_post(wpautop($mission));
                } else { ?>
                    <p><?php esc_html_e('To elevate global well-being through premium, Moroccan-grown cannabis products — crafted with care, driven by innovation, and rooted in tradition.', 'cannaflex'); ?></p>
                    <p><?php esc_html_e('We empower brands and partners around the world by providing high-quality, compliant, and customizable cannabinoid solutions, while promoting sustainability, social impact, and responsible cannabis use.', 'cannaflex'); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
