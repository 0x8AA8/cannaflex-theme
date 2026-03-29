<?php
/**
 * Single post / page fallback template.
 *
 * @package Cannaflex
 */

get_header(); ?>

<article class="section">
    <div class="container" style="max-width:800px">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>

                <?php if (is_singular('post')) : ?>
                    <p style="color:#777;margin-bottom:2rem"><?php echo esc_html(get_the_date()); ?></p>
                <?php endif; ?>

                <?php if (has_post_thumbnail()) : ?>
                    <div style="margin-bottom:2rem;border-radius:12px;overflow:hidden">
                        <?php the_post_thumbnail('hero', ['loading' => 'eager']); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <?php if (is_singular('post')) : ?>
                    <div style="margin-top:3rem;border-top:2px solid #eee;padding-top:2rem">
                        <?php
                        the_post_navigation([
                            'prev_text' => '&larr; %title',
                            'next_text' => '%title &rarr;',
                        ]);
                        ?>
                    </div>
                <?php endif; ?>
            <?php endwhile;
        endif;
        ?>
    </div>
</article>

<?php get_footer(); ?>
