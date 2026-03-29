<?php
/**
 * Single post/product template.
 *
 * @package Cannaflex
 */

get_header(); ?>

<article class="section single-post">
    <div class="container" style="max-width:800px">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>

                <header class="single-post__header">
                    <h1><?php the_title(); ?></h1>

                    <?php if (is_singular('post')) : ?>
                        <div class="single-post__meta">
                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                            <?php
                            $cats = get_the_category();
                            if ($cats) : ?>
                                <span class="single-post__cats">
                                    <?php foreach ($cats as $cat) : ?>
                                        <a href="<?php echo esc_url(get_category_link($cat)); ?>"><?php echo esc_html($cat->name); ?></a>
                                    <?php endforeach; ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (is_singular('cfx_product')) :
                        $terms = get_the_terms(get_the_ID(), 'product_category');
                        if ($terms && ! is_wp_error($terms)) : ?>
                            <div class="single-post__meta">
                                <?php foreach ($terms as $term) : ?>
                                    <a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif;
                    endif; ?>
                </header>

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
