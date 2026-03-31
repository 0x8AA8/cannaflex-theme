<?php
/**
 * Home section: Recent Posts grid
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;
?>
<section class="recent-posts section" aria-labelledby="posts-heading">
    <div class="container">
        <h2 id="posts-heading"><?php esc_html_e('Recent Posts', 'cannaflex'); ?></h2>
        <div class="recent-posts__grid">
            <div class="recent-posts__list">
                <?php
                $posts = get_posts(['post_type' => 'post', 'posts_per_page' => 4]);
                if ($posts) :
                    foreach ($posts as $p) :
                        $thumb = get_the_post_thumbnail_url($p, 'thumb-sm'); ?>
                        <article class="post-card">
                            <div class="post-card__thumb">
                                <?php if ($thumb) : ?><img src="<?php echo esc_url($thumb); ?>" alt="" loading="lazy" width="100" height="80">
                                <?php else : ?><div class="placeholder-img placeholder-img--thumb"></div><?php endif; ?>
                            </div>
                            <div>
                                <h3><?php echo esc_html($p->post_title); ?></h3>
                                <p><?php echo esc_html(wp_trim_words($p->post_content, 12)); ?></p>
                                <a href="<?php echo esc_url(get_permalink($p)); ?>"><?php esc_html_e('Read All', 'cannaflex'); ?></a>
                            </div>
                        </article>
                    <?php endforeach;
                else : ?>
                    <article class="post-card">
                        <div class="post-card__thumb"><div class="placeholder-img placeholder-img--thumb"></div></div>
                        <div><h3><?php esc_html_e('Cannaflex Expands Distribution Across Europe', 'cannaflex'); ?></h3><p><?php esc_html_e('New partnerships bring premium Moroccan cannabis products to more markets.', 'cannaflex'); ?></p><a href="#"><?php esc_html_e('Read All', 'cannaflex'); ?></a></div>
                    </article>
                    <article class="post-card">
                        <div class="post-card__thumb"><div class="placeholder-img placeholder-img--thumb"></div></div>
                        <div><h3><?php esc_html_e('Sustainability Update: Zero-Waste Farming Pilot in the Rif', 'cannaflex'); ?></h3><p><?php esc_html_e('Our pilot program recycles 100% of plant waste into organic compost.', 'cannaflex'); ?></p><a href="#"><?php esc_html_e('Read All', 'cannaflex'); ?></a></div>
                    </article>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
            <div class="recent-posts__featured">
                <?php if ($posts && get_the_post_thumbnail_url($posts[0], 'hero')) : ?>
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url($posts[0], 'hero')); ?>" alt="" loading="lazy">
                <?php else : ?>
                    <div class="placeholder-img placeholder-img--featured"><?php esc_html_e('Featured Image', 'cannaflex'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
