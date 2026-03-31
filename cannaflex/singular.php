<?php
/**
 * Single post / page fallback template.
 *
 * @package Cannaflex
 */

get_header(); ?>

<article class="section single-post">
    <div class="container singular-container">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>

                <?php if (is_singular('post')) : ?>
                    <p class="singular-date"><?php echo esc_html(get_the_date()); ?></p>
                <?php endif; ?>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-post__featured">
                        <?php the_post_thumbnail('hero', ['loading' => 'eager']); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <?php if (is_singular('post')) : ?>
                    <nav class="single-post__nav">
                        <?php
                        the_post_navigation([
                            'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous', 'cannaflex') . '</span><span class="nav-title">%title</span>',
                            'next_text' => '<span class="nav-subtitle">' . esc_html__('Next', 'cannaflex') . '</span><span class="nav-title">%title</span>',
                        ]);
                        ?>
                    </nav>
                <?php endif; ?>
            <?php endwhile;
        endif;
        ?>
    </div>
</article>

<?php get_footer(); ?>
