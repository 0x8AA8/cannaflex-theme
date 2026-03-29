<?php
/**
 * Archive template — post type archives, category, tag, date archives.
 *
 * @package Cannaflex
 */

get_header(); ?>

<section class="page-hero">
    <div class="container">
        <?php the_archive_title('<h1>', '</h1>'); ?>
        <?php the_archive_description('<p>', '</p>'); ?>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="news-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="news-card">
                        <div class="news-card__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('card-wide', ['loading' => 'lazy']); ?>
                            <?php else : ?>
                                <div class="placeholder-img" style="width:100%;height:100%"></div>
                            <?php endif; ?>
                        </div>
                        <div class="news-card__content">
                            <span class="news-card__date"><?php echo esc_html(get_the_date()); ?></span>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 15)); ?></p>
                            <a href="<?php the_permalink(); ?>" class="news-card__link"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
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
