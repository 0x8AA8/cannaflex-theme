<?php
/**
 * The main template file — fallback for all views.
 *
 * @package Cannaflex
 */

get_header(); ?>

<section class="section">
    <div class="container">
        <?php if (is_home() && ! is_front_page()) : ?>
            <h1><?php single_post_title(); ?></h1>
        <?php elseif (is_archive()) : ?>
            <h1><?php the_archive_title(); ?></h1>
        <?php elseif (is_search()) : ?>
            <h1><?php printf(esc_html__('Search results for: %s', 'cannaflex'), get_search_query()); ?></h1>
        <?php endif; ?>

        <?php if (have_posts()) : ?>
            <div class="recent-posts__list index-posts-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post-card">
                        <div class="post-card__thumb">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumb-sm', ['loading' => 'lazy']); ?>
                            <?php else : ?>
                                <div class="placeholder-img placeholder-img--thumb"></div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                            <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination-wrap">
                <?php the_posts_pagination([
                    'mid_size'  => 2,
                    'prev_text' => '&larr;',
                    'next_text' => '&rarr;',
                ]); ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('No posts found.', 'cannaflex'); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
