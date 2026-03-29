<?php
/**
 * Template Name: News
 * Template Post Type: page
 *
 * Per sitemap: News → Latest news → Upcoming events
 *
 * @package Cannaflex
 */

get_header();

$page_id = get_the_ID();
$paged   = get_query_var('paged') ? get_query_var('paged') : 1;
?>

<!-- ===== HERO ===== -->
<section class="page-hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php
        $intro = get_post_meta($page_id, '_cfx_news_intro', true);
        if ($intro) : ?>
            <p><?php echo esc_html($intro); ?></p>
        <?php else : ?>
            <p><?php esc_html_e('Stay connected to discover how we\'re driving change in the global cannabis space and beyond through all of time.', 'cannaflex'); ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- ===== LATEST NEWS ===== -->
<section class="news-listing section">
    <div class="container">
        <h2><?php esc_html_e('Latest News', 'cannaflex'); ?></h2>

        <?php
        $news = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => 9,
            'paged'          => $paged,
        ]);

        if ($news->have_posts()) : ?>
            <div class="news-grid">
                <?php while ($news->have_posts()) : $news->the_post(); ?>
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
                <?php
                echo paginate_links([
                    'total'     => $news->max_num_pages,
                    'current'   => $paged,
                    'prev_text' => '&larr;',
                    'next_text' => '&rarr;',
                ]);
                ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('No news articles yet. Check back soon.', 'cannaflex'); ?></p>
        <?php endif;
        wp_reset_postdata();
        ?>
    </div>
</section>

<?php get_footer(); ?>
