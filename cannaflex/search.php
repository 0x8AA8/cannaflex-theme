<?php
/**
 * Search results template.
 *
 * @package Cannaflex
 */

get_header(); ?>

<section class="page-hero">
    <div class="container">
        <h1><?php printf(esc_html__('Search results for: %s', 'cannaflex'), '<span>' . esc_html(get_search_query()) . '</span>'); ?></h1>
        <p><?php printf(esc_html__('%d results found', 'cannaflex'), (int) $wp_query->found_posts); ?></p>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="recent-posts__list">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post-card">
                        <div class="post-card__thumb">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumb-sm', ['loading' => 'lazy']); ?>
                            <?php else : ?>
                                <div class="placeholder-img" style="width:100px;height:80px"></div>
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
            <div class="text-center" style="padding:3rem 0">
                <h2><?php esc_html_e('Nothing found', 'cannaflex'); ?></h2>
                <p><?php esc_html_e('Try a different search term or browse our pages.', 'cannaflex'); ?></p>
                <div style="max-width:400px;margin:2rem auto">
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
