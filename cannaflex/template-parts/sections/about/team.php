<?php
/**
 * About section: Our Team
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;
?>
<section class="our-team section" aria-labelledby="team-heading">
    <div class="container">
        <h2 id="team-heading"><?php esc_html_e('Our Team', 'cannaflex'); ?></h2>
        <p class="section-subtitle"><?php esc_html_e('Meet the People Behind Cannaflex', 'cannaflex'); ?></p>

        <div class="team-grid">
            <?php
            $team = get_posts(['post_type' => 'cfx_team', 'posts_per_page' => 6, 'orderby' => 'menu_order', 'order' => 'ASC']);

            if ($team) :
                foreach ($team as $member) :
                    $role  = get_post_meta($member->ID, '_cfx_team_role', true);
                    $photo = get_the_post_thumbnail_url($member, 'card');
                    ?>
                    <div class="team-card">
                        <?php if ($photo) : ?>
                            <img class="team-card__photo" src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($member->post_title); ?>" loading="lazy" width="400" height="400">
                        <?php else : ?>
                            <div class="placeholder-img team-card__photo placeholder-img--square"><?php echo esc_html($member->post_title); ?></div>
                        <?php endif; ?>
                        <h3><?php echo esc_html($member->post_title); ?></h3>
                        <?php if ($role) : ?>
                            <p><?php echo esc_html($role); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach;
            else :
                for ($i = 0; $i < 3; $i++) : ?>
                    <div class="team-card">
                        <div class="placeholder-img team-card__photo placeholder-img--square"><?php esc_html_e('Name', 'cannaflex'); ?></div>
                        <h3><?php esc_html_e('Name', 'cannaflex'); ?></h3>
                        <p><?php esc_html_e('Job Title', 'cannaflex'); ?></p>
                    </div>
                <?php endfor;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
