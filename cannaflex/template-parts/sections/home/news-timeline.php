<?php
/**
 * Home section: Recent News horizontal timeline
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;
?>
<section class="news-timeline section" aria-labelledby="news-heading">
    <div class="container">
        <h2 id="news-heading"><?php echo esc_html(cannaflex_get('home_news_heading', 'Recent News')); ?></h2>
        <p class="section-subtitle news-timeline__sub"><?php esc_html_e('Stay connected to discover how we\'re driving change in the global cannabis space and beyond through all of time.', 'cannaflex'); ?></p>

        <div class="timeline-h">
            <div class="timeline-h__axis"></div>
            <?php
            $news = get_posts(['post_type' => 'post', 'posts_per_page' => 6, 'category_name' => 'news']);
            if ($news) :
                foreach ($news as $idx => $item) :
                    $year      = get_the_date('Y', $item);
                    $day_month = get_the_date('d F', $item);
                    $pos       = ($idx % 2 === 0) ? 'top' : 'bottom'; ?>
                    <article class="timeline-h__item timeline-h__item--<?php echo esc_attr($pos); ?>">
                        <div class="timeline-h__dot"></div>
                        <div class="timeline-h__card">
                            <span class="timeline-h__year"><?php echo esc_html($year); ?></span>
                            <span class="timeline-h__date"><?php echo esc_html($day_month); ?></span>
                            <h3><?php echo esc_html($item->post_title); ?></h3>
                            <p><?php echo esc_html(wp_trim_words($item->post_content, 15)); ?></p>
                            <a href="<?php echo esc_url(get_permalink($item)); ?>"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                        </div>
                    </article>
                <?php endforeach;
            else : ?>
                <article class="timeline-h__item timeline-h__item--top">
                    <div class="timeline-h__dot"></div>
                    <div class="timeline-h__card">
                        <span class="timeline-h__year">2025</span>
                        <span class="timeline-h__date">04 April</span>
                        <h3><?php esc_html_e('New CBD Skincare Line Launching Soon', 'cannaflex'); ?></h3>
                        <p><?php esc_html_e('Join us at the forefront as we bring the future of cannabis in Africa — together.', 'cannaflex'); ?></p>
                        <a href="#"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                    </div>
                </article>
                <article class="timeline-h__item timeline-h__item--bottom">
                    <div class="timeline-h__dot"></div>
                    <div class="timeline-h__card">
                        <span class="timeline-h__year">2025</span>
                        <span class="timeline-h__date">07 June</span>
                        <h3><?php esc_html_e('Cannaflex at Africa CannaTech Expo 2025', 'cannaflex'); ?></h3>
                        <p><?php esc_html_e("Africa's premier cannabis technology event. Let's shape the future of cannabis in Africa — together.", 'cannaflex'); ?></p>
                        <a href="#"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                    </div>
                </article>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>
