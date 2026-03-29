<?php
/**
 * Template Name: About
 * Template Post Type: page
 *
 * Matches: CANNAFLEX WEBSITE About page.pdf
 *
 * @package Cannaflex
 */

get_header();

$page_id = get_the_ID();
?>

<!-- ===== INTRO SPLIT ===== -->
<section class="about-intro" aria-labelledby="about-intro-heading">
    <div class="about-intro__image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('hero', ['loading' => 'eager']); ?>
        <?php else : ?>
            <div class="placeholder-img placeholder-img--full placeholder-img--tall"><?php esc_html_e('About Image', 'cannaflex'); ?></div>
        <?php endif; ?>
    </div>
    <div class="about-intro__content">
        <?php
        $intro_heading = get_post_meta($page_id, '_cfx_about_intro_heading', true);
        ?>
        <h1 id="about-intro-heading"><?php echo esc_html($intro_heading ?: 'Globally Established, Proudly Rooted in Morocco'); ?></h1>

        <?php
        // Use WP editor content if available, otherwise default text from PDF
        if (have_posts()) :
            while (have_posts()) : the_post();
                if (get_the_content()) :
                    the_content();
                else : ?>
                    <p><?php esc_html_e('At Cannaflex, everything begins in the heart of the Rif Mountains — the ancestral cradle of Moroccan cannabis. This region\'s rich soil, unique microclimate, and deep cultural legacy have made it one of the world\'s most iconic cannabis-growing regions.', 'cannaflex'); ?></p>
                    <p><?php esc_html_e('We honor that heritage by cultivating each plant with care and harvesting it with respect, using time-honored traditions passed down through generations of Moroccan farmers.', 'cannaflex'); ?></p>
                    <p><?php esc_html_e('But our vision goes beyond tradition.', 'cannaflex'); ?></p>
                    <p><?php esc_html_e('By combining artisanal expertise with modern innovation, we craft premium cannabinoid-based products designed to meet the highest international standards. From CBD oils and supplements to cosmetics, teas, and extracts, every product is developed for purity, effectiveness, and consistency.', 'cannaflex'); ?></p>
                <?php endif;
            endwhile;
        endif;
        ?>
    </div>
</section>

<!-- ===== OUR MISSION ===== -->
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

<!-- ===== OUR VALUES ===== -->
<section class="our-values" aria-labelledby="values-heading">
    <div class="our-values__image">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php echo esc_url(get_the_post_thumbnail_url($page_id, 'hero')); ?>" alt="" loading="lazy">
        <?php else : ?>
            <div class="placeholder-img placeholder-img--full placeholder-img--xtall"><?php esc_html_e('Values Image', 'cannaflex'); ?></div>
        <?php endif; ?>
    </div>
    <div class="our-values__content">
        <h2 id="values-heading"><?php esc_html_e('Our Values', 'cannaflex'); ?></h2>
        <div class="values-list">
            <?php
            $values_json = get_post_meta($page_id, '_cfx_about_values', true);
            $values = $values_json ? json_decode($values_json, true) : null;

            if (! $values || ! is_array($values)) {
                // Exact text from About page PDF
                $values = [
                    [
                        'title' => 'Socials',
                        'text'  => "We believe cannabis can be a force for good — socially, culturally, and economically. That's why we invest in local communities, support small farmers, and promote ethical employment across our supply chain.\n\nBeyond production, we're committed to raising awareness and educating communities about the responsible use of cannabis. Through transparency, outreach, and informed dialogue, we help shift perceptions and support safe, stigma-free access to cannabis based products.",
                    ],
                    [
                        'title' => 'Sustainability',
                        'text'  => 'Respect for the earth is at the heart of our work. From eco-conscious cultivation practices to low-waste processing, we are dedicated to preserving natural resources and protecting Morocco\'s agricultural heritage for future generations.',
                    ],
                    [
                        'title' => 'Innovation',
                        'text'  => 'Driven by research and curiosity, we continually explore new technologies, formulations, and delivery systems to create cutting-edge cannabinoid products. Our innovation is rooted in tradition, yet focused on the future.',
                    ],
                    [
                        'title' => 'Authenticity',
                        'text'  => 'Every product we create reflects the spirit of Morocco — its land, its people, and its centuries-old relationship with cannabis. We stay true to our roots, honoring artisanal methods while delivering quality you can trust.',
                    ],
                ];
            }

            foreach ($values as $v) : ?>
                <div class="value-item">
                    <h3><?php echo esc_html($v['title']); ?></h3>
                    <?php echo wp_kses_post(wpautop(esc_html($v['text']))); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== OUR TEAM ===== -->
<section class="our-team section" aria-labelledby="team-heading">
    <div class="container">
        <h2 id="team-heading"><?php esc_html_e('Our Team', 'cannaflex'); ?></h2>
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
                            <div class="placeholder-img team-card__photo placeholder-img--square"><?php echo esc_html($member->post_title); ?></div>
                        <?php endif; ?>
                        <h3><?php echo esc_html($member->post_title); ?></h3>
                        <?php if ($role) : ?>
                            <p><?php echo esc_html($role); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach;
            else :
                // Fallback — 3 placeholder cards matching PDF layout
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

<!-- ===== CTA STRIP (PDF: left light bg + green heading, right image overlay + white text + button) ===== -->
<?php
$cta_bg = get_post_meta($page_id, '_cfx_about_cta_bg', true);
if ($cta_bg) {
    wp_add_inline_style('cannaflex-main', '.cta-strip__action{background-image:linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.4)),url(' . esc_url($cta_bg) . ')}');
}
?>
<section class="cta-strip" aria-labelledby="about-cta-heading">
    <div class="cta-strip__heading">
        <h2 id="about-cta-heading">
            <?php
            $cta = get_post_meta($page_id, '_cfx_about_cta', true);
            echo esc_html($cta ?: "Let\u{2019}s Shape the Future of Cannabis \u{2014} Together.");
            ?>
        </h2>
    </div>
    <div class="cta-strip__action">
        <div class="cta-strip__action-inner">
            <?php
            $cta_text = get_post_meta($page_id, '_cfx_about_cta_text', true);
            ?>
            <p><?php echo esc_html($cta_text ?: 'Partner with us and bring the power of Moroccan cannabis to your market — with integrity, efficiency, and impact.'); ?></p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--secondary"><?php esc_html_e('Contact Us', 'cannaflex'); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
