<?php
/**
 * Template Name: About
 * Template Post Type: page
 *
 * @package Cannaflex
 */

get_header();

$page_id = get_the_ID();
?>

<!-- ===== INTRO ===== -->
<section class="about-intro">
    <div class="about-intro__image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('hero', ['loading' => 'eager']); ?>
        <?php else : ?>
            <div class="placeholder-img" style="width:100%;height:100%;min-height:400px">About Image</div>
        <?php endif; ?>
    </div>
    <div class="about-intro__content">
        <h1><?php the_title(); ?></h1>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>
</section>

<!-- ===== OUR MISSION ===== -->
<section class="our-mission section">
    <div class="container">
        <div class="split">
            <div>
                <h2><?php esc_html_e('Our Mission', 'cannaflex'); ?></h2>
            </div>
            <div>
                <?php
                $mission = get_post_meta($page_id, '_cfx_about_mission', true);
                if ($mission) {
                    echo wp_kses_post(wpautop($mission));
                } else {
                    echo '<p>' . esc_html__('To lead the Moroccan cannabis industry into a new era of legality, sustainability, and global impact — delivering world-class products rooted in heritage and driven by science.', 'cannaflex') . '</p>';
                    echo '<p>' . esc_html__('We believe in empowering local communities, preserving traditional knowledge, and meeting the highest international standards of quality and compliance.', 'cannaflex') . '</p>';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- ===== OUR VALUES ===== -->
<section class="our-values">
    <div class="our-values__image">
        <?php
        $values_img = get_post_meta($page_id, '_cfx_values_image', true);
        if ($values_img) : ?>
            <img src="<?php echo esc_url($values_img); ?>" alt="" loading="lazy" width="500" height="800">
        <?php else : ?>
            <div class="placeholder-img" style="width:100%;height:100%;min-height:600px">Values Image</div>
        <?php endif; ?>
    </div>
    <div class="our-values__content">
        <h2><?php esc_html_e('Our Values', 'cannaflex'); ?></h2>
        <div class="values-list">
            <?php
            $values_json = get_post_meta($page_id, '_cfx_about_values', true);
            $values = $values_json ? json_decode($values_json, true) : null;

            if (! $values || ! is_array($values)) {
                $values = [
                    ['title' => 'Socials',        'text' => 'Empowering Moroccan farming communities through fair partnerships, education, and economic inclusion.'],
                    ['title' => 'Sustainability',  'text' => 'Environmentally conscious practices from seed to shelf — minimizing waste and maximizing positive impact.'],
                    ['title' => 'Innovation',      'text' => 'Investing in R&D and cutting-edge technology to push the boundaries of what cannabis can offer.'],
                    ['title' => 'Authenticity',    'text' => 'Honoring the deep-rooted Moroccan cannabis heritage while meeting the highest global standards.'],
                ];
            }

            foreach ($values as $v) : ?>
                <div class="value-item">
                    <h3><?php echo esc_html($v['title']); ?></h3>
                    <p><?php echo esc_html($v['text']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== OUR TEAM ===== -->
<section class="our-team section">
    <div class="container">
        <h2><?php esc_html_e('Our Team', 'cannaflex'); ?></h2>
        <p class="section-subtitle"><?php esc_html_e('Meet the People Behind Cannaflex', 'cannaflex'); ?></p>

        <div class="team-grid">
            <?php
            $team = get_posts([
                'post_type'      => 'cfx_team',
                'posts_per_page' => 6,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ]);

            if ($team) :
                foreach ($team as $member) :
                    $role  = get_post_meta($member->ID, '_cfx_team_role', true);
                    $photo = get_the_post_thumbnail_url($member, 'card');
                    ?>
                    <div class="team-card">
                        <?php if ($photo) : ?>
                            <img class="team-card__photo" src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($member->post_title); ?>" loading="lazy" width="400" height="400">
                        <?php else : ?>
                            <div class="placeholder-img team-card__photo" style="aspect-ratio:1"><?php echo esc_html($member->post_title); ?></div>
                        <?php endif; ?>
                        <h3><?php echo esc_html($member->post_title); ?></h3>
                        <?php if ($role) : ?>
                            <p><?php echo esc_html($role); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach;
            else :
                $fallback_team = [
                    ['name' => 'Ahmed Benali',  'role' => 'CEO & Founder'],
                    ['name' => 'Fatima Zahra',   'role' => 'Head of R&D'],
                    ['name' => 'Youssef Amrani', 'role' => 'Export Director'],
                ];
                foreach ($fallback_team as $m) : ?>
                    <div class="team-card">
                        <div class="placeholder-img team-card__photo" style="aspect-ratio:1"><?php echo esc_html($m['name']); ?></div>
                        <h3><?php echo esc_html($m['name']); ?></h3>
                        <p><?php echo esc_html($m['role']); ?></p>
                    </div>
                <?php endforeach;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<!-- ===== CTA STRIP ===== -->
<section class="cta-strip">
    <div class="cta-strip__left">
        <h2>
            <?php
            $cta = get_post_meta($page_id, '_cfx_about_cta', true);
            echo esc_html($cta ?: "Let's Shape the Future of Cannabis — Together.");
            ?>
        </h2>
    </div>
    <div class="cta-strip__right">
        <div>
            <p><?php esc_html_e('Partner with us and bring the power of Moroccan cannabis to your market — with integrity, efficiency, and impact.', 'cannaflex'); ?></p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--secondary"><?php esc_html_e('Contact Us', 'cannaflex'); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
