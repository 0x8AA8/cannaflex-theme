<?php
/**
 * Activity section: Intro block
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

$page_id = get_the_ID();
?>
<section class="activity-intro" aria-labelledby="activity-intro-heading">
    <div class="container">
        <?php $intro_heading = get_post_meta($page_id, '_cfx_activity_intro_heading', true); ?>
        <h1 id="activity-intro-heading"><?php echo esc_html($intro_heading ?: "From Cultivation to Global Distribution \u{2014} We Cover the Full Cannabis Value Chain"); ?></h1>
        <?php
        $intro = get_post_meta($page_id, '_cfx_activity_intro', true);
        if ($intro) : ?>
            <p><?php echo esc_html($intro); ?></p>
        <?php else : ?>
            <p><?php esc_html_e('At Cannaflex, we manage the entire lifecycle of cannabis — from seed to shelf. Our activities span agriculture, research, manufacturing, and international supply — offering our partners comprehensive, scalable, and compliant cannabis solutions.', 'cannaflex'); ?></p>
        <?php endif; ?>
    </div>
</section>
