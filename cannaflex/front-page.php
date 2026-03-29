<?php
/**
 * Template: Front Page (Home)
 *
 * Matches: CANNAFLEX WEBSITE Home page.pdf
 *
 * @package Cannaflex
 */

get_header();
?>

<!-- ===== 1. SPLIT HERO ===== -->
<section class="hero-split" aria-labelledby="hero-heading">
    <div class="hero-split__content">
        <div class="hero-split__inner">
            <h1 id="hero-heading"><?php echo esc_html(cannaflex_get('hero_heading', 'We are Leading the Change')); ?></h1>
            <?php echo wp_kses_post(wpautop(esc_html(cannaflex_get('hero_text', "We're redefining what cannabis can do. From Morocco's ancestral fields to international markets — we advance the legacy of Moroccan cannabis tradition, innovation, and craftsmanship to deliver premium, sustainable and high-quality cannabis products.\n\nJoin us in shaping the future of responsible, sustainable, and high-quality cannabis.")))); ?>
            <a href="<?php echo esc_url(cannaflex_get('hero_btn_url', '/contact')); ?>" class="btn btn--primary">
                <?php echo esc_html(cannaflex_get('hero_btn_text', 'Join Us')); ?>
            </a>
        </div>
    </div>
    <div class="hero-split__image">
        <?php
        $hero_img = cannaflex_get('hero_image');
        if ($hero_img) : ?>
            <img src="<?php echo esc_url($hero_img); ?>" alt="" loading="eager" fetchpriority="high">
        <?php else : ?>
            <div class="placeholder-img placeholder-img--full"><?php esc_html_e('Hero Image', 'cannaflex'); ?></div>
        <?php endif; ?>
    </div>
</section>

<!-- ===== 2. ABOUT SPLIT (PDF: large left media panel + right content) ===== -->
<section class="home-about-split" aria-labelledby="home-about-heading">
    <div class="home-about-split__media">
        <?php
        $about_img = cannaflex_get('home_about_image');
        if ($about_img) : ?>
            <img src="<?php echo esc_url($about_img); ?>" alt="<?php esc_attr_e('Cannaflex', 'cannaflex'); ?>" loading="lazy">
        <?php else : ?>
            <div class="placeholder-img placeholder-img--full"><?php esc_html_e('About Image', 'cannaflex'); ?></div>
        <?php endif; ?>
    </div>
    <div class="home-about-split__content">
        <h2 id="home-about-heading"><?php echo esc_html(cannaflex_get('home_about_heading', 'About Us')); ?></h2>
        <p class="home-about-split__intro"><?php echo esc_html(cannaflex_get('home_about_intro', "From the ancestral cradle of Moroccan cannabis to the global market \u{2014} we're the partner you can trust.")); ?></p>
        <?php echo wp_kses_post(wpautop(esc_html(cannaflex_get('home_about_text', "At the heart of the Rif Mountains \u{2014} the ancestral cradle of Moroccan cannabis. This region's rich soil, unique microclimate, and deep cultural legacy have made it one of the world's most iconic cannabis-growing regions.\n\nWe honor that heritage by cultivating each plant with care and harvesting it with respect, using time-honored traditions passed down through generations of Moroccan farmers.\n\nMore than a producer, we're your global growth partner. Cannaflex's robust international network offers scalable, compliant cannabis solutions delivered to your market.")))); ?>
        <a href="<?php echo esc_url(home_url('/about/')); ?>" class="btn btn--primary">
            <?php echo esc_html(cannaflex_get('home_about_btn', 'Learn More')); ?>
        </a>
    </div>
</section>

<!-- ===== 3. SEED-TO-SHELF MOSAIC (PDF: text card + 3 icon cards as composed grid) ===== -->
<section class="seed-chain section" aria-labelledby="seed-heading">
    <div class="container">
        <div class="seed-chain__grid">
            <!-- Left: text card with image background -->
            <article class="seed-chain__text-card">
                <?php
                $seed_img = cannaflex_get('seed_image');
                if ($seed_img) : ?>
                    <img src="<?php echo esc_url($seed_img); ?>" alt="" loading="lazy" class="seed-chain__bg-img">
                <?php endif; ?>
                <div class="seed-chain__text-inner">
                    <h2 id="seed-heading"><?php echo esc_html(cannaflex_get('seed_heading', 'From Seed to Shelf')); ?></h2>
                    <p><?php echo esc_html(cannaflex_get('seed_text', 'We control every step of the cannabis value chain — from cultivation in the Rif Mountains to finished products ready for global markets. This guarantees consistency, traceability, and outstanding quality across our full range of cannabis products.')); ?></p>
                    <a href="<?php echo esc_url(home_url('/activity/')); ?>" class="btn btn--primary"><?php esc_html_e('Learn More', 'cannaflex'); ?></a>
                </div>
            </article>

            <!-- Right: process icon cards -->
            <?php
            $tiles = [
                ['title' => 'Agriculture',                 'text' => 'We partner with agricultural cooperatives authorized by Morocco\'s National Cannabis Agency (ANRAC) to cultivate cannabis in full compliance with Moroccan regulations.', 'icon' => 'leaf'],
                ['title' => 'Transformation',              'text' => 'We transform and process cannabis into high-quality products, ensuring all certifications and standards are met throughout the production chain.', 'icon' => 'cycle'],
                ['title' => 'Commercialisation and Export', 'text' => 'We sell and distribute our products locally and internationally in strict compliance to current Moroccan regulations, ensuring quality and compliance across all markets.', 'icon' => 'globe'],
            ];

            $icons = [
                'leaf'  => '<svg viewBox="0 0 24 24" stroke-width="2"><path d="M17 8c.7-1 1-2 1-3 0-3.4-3.6-5-8-5C5.6 0 2 1.6 2 5c0 1 .3 2 1 3-1.6 1.5-3 4-3 7 0 5 4 9 9 9h2c5 0 9-4 9-9 0-3-1.4-5.5-3-7z" stroke="currentColor" fill="none"/></svg>',
                'cycle' => '<svg viewBox="0 0 24 24" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.2-8.6" stroke="currentColor" fill="none"/><path d="M21 3v6h-6" stroke="currentColor" fill="none"/></svg>',
                'globe' => '<svg viewBox="0 0 24 24" stroke-width="2"><circle cx="12" cy="12" r="10" stroke="currentColor" fill="none"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10A15.3 15.3 0 0 1 12 2z" stroke="currentColor" fill="none"/></svg>',
            ];

            for ($i = 0; $i < 3; $i++) :
                $title = cannaflex_get("process_" . ($i + 1) . "_title", $tiles[$i]['title']);
                $text  = cannaflex_get("process_" . ($i + 1) . "_text", $tiles[$i]['text']);
                $icon  = $tiles[$i]['icon'];
                ?>
                <article class="seed-chain__icon-card">
                    <div class="seed-chain__icon"><?php echo $icons[$icon]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG ?></div>
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo esc_html($text); ?></p>
                </article>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- ===== 4. OUR PRODUCTS (slider with visible card labels) ===== -->
<section class="products-section section" aria-labelledby="products-heading">
    <div class="container">
        <h2 id="products-heading"><?php echo esc_html(cannaflex_get('products_heading', 'Our Products')); ?></h2>
        <p class="section-subtitle"><?php echo esc_html(cannaflex_get('products_text', 'We offer a comprehensive range of premium cannabis products, from dermatological to medical that not only meet manufacturing standards, but also comply with local and international regulations. Each product embodies the legacy of Moroccan craftsmanship — a refined blend of traditional know-how that reflects our unwavering commitment to authenticity, quality, and the healing power of Moroccan cannabis.')); ?></p>

        <div class="products-slider" aria-label="<?php esc_attr_e('Product categories', 'cannaflex'); ?>">
            <div class="products-slider__track" id="products-track">
                <?php
                $products = get_posts([
                    'post_type'      => 'cfx_product',
                    'posts_per_page' => 12,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ]);

                if ($products) :
                    foreach ($products as $prod) :
                        $thumb = get_the_post_thumbnail_url($prod, 'card');
                        ?>
                        <article class="product-card">
                            <div class="product-card__image">
                                <?php if ($thumb) : ?>
                                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($prod->post_title); ?>" loading="lazy">
                                <?php else : ?>
                                    <div class="placeholder-img placeholder-img--full"><?php echo esc_html($prod->post_title); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="product-card__label">
                                <h3><?php echo esc_html($prod->post_title); ?></h3>
                                <p><?php echo esc_html(wp_trim_words($prod->post_excerpt ?: $prod->post_content, 12)); ?></p>
                                <a href="<?php echo esc_url(get_permalink($prod)); ?>"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                            </div>
                        </article>
                    <?php endforeach;
                else :
                    $fallback = ['Cosmetics', 'Supplements', 'Edibles', 'Extracts', 'Vapes', 'Pet Care'];
                    foreach ($fallback as $name) : ?>
                        <article class="product-card">
                            <div class="product-card__image">
                                <div class="placeholder-img placeholder-img--full"><?php echo esc_html($name); ?></div>
                            </div>
                            <div class="product-card__label">
                                <h3><?php echo esc_html($name); ?></h3>
                                <a href="<?php echo esc_url(home_url('/products/')); ?>"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                            </div>
                        </article>
                    <?php endforeach;
                endif;
                wp_reset_postdata();
                ?>
            </div>

            <div class="slider-controls">
                <button type="button" class="slider-btn" id="slider-prev" aria-label="<?php esc_attr_e('Previous', 'cannaflex'); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M15 19l-7-7 7-7"/></svg>
                </button>
                <div class="slider-dots" id="slider-dots"></div>
                <button type="button" class="slider-btn" id="slider-next" aria-label="<?php esc_attr_e('Next', 'cannaflex'); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- ===== 5. BRANDS STRIP ===== -->
<section class="brands-strip section" aria-labelledby="brands-heading">
    <div class="container">
        <h2 id="brands-heading"><?php echo esc_html(cannaflex_get('brands_heading', 'Discover our Brands')); ?></h2>
        <p><?php echo esc_html(cannaflex_get('brands_text', 'Explore our distinct brands, each with its own identity, unified by the values at the heart of our company.')); ?></p>

        <div class="brands-grid">
            <?php
            $brands = get_posts([
                'post_type'      => 'cfx_brand',
                'posts_per_page' => 10,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ]);

            if ($brands) :
                foreach ($brands as $brand) :
                    $logo = get_the_post_thumbnail_url($brand, 'medium');
                    if ($logo) : ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($brand->post_title); ?>" loading="lazy" height="48">
                    <?php endif;
                endforeach;
            else :
                $fallback_brands = ['VAPOCAN', 'FITOBOTANIKA', 'RifGold'];
                foreach ($fallback_brands as $b) : ?>
                    <span class="brands-grid__placeholder"><?php echo esc_html($b); ?></span>
                <?php endforeach;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<!-- ===== 6. RECENT NEWS (fixed 2-col composed timeline) ===== -->
<section class="news-timeline section" aria-labelledby="news-heading">
    <div class="container">
        <h2 id="news-heading"><?php esc_html_e('Recent News', 'cannaflex'); ?></h2>
        <p class="section-subtitle news-timeline__sub"><?php esc_html_e('Stay connected to discover how we\'re driving change in the global cannabis space and beyond through all of time.', 'cannaflex'); ?></p>

        <div class="timeline-composed">
            <?php
            $news = get_posts([
                'post_type'      => 'post',
                'posts_per_page' => 6,
                'category_name'  => 'news',
            ]);

            if ($news) :
                foreach ($news as $idx => $item) :
                    $year      = get_the_date('Y', $item);
                    $day_month = get_the_date('d F', $item);
                    $side      = ($idx % 2 === 0) ? 'left' : 'right';
                    ?>
                    <article class="timeline-composed__item timeline-composed__item--<?php echo esc_attr($side); ?>">
                        <div class="timeline-composed__card">
                            <span class="timeline-composed__year"><?php echo esc_html($year); ?></span>
                            <span class="timeline-composed__date"><?php echo esc_html($day_month); ?></span>
                            <h3><?php echo esc_html($item->post_title); ?></h3>
                            <p><?php echo esc_html(wp_trim_words($item->post_content, 15)); ?></p>
                            <a href="<?php echo esc_url(get_permalink($item)); ?>"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                        </div>
                    </article>
                <?php endforeach;
            else : ?>
                <article class="timeline-composed__item timeline-composed__item--left">
                    <div class="timeline-composed__card">
                        <span class="timeline-composed__year">2025</span>
                        <span class="timeline-composed__date">04 April</span>
                        <h3><?php esc_html_e('New CBD Skincare Line Launching Soon', 'cannaflex'); ?></h3>
                        <p><?php esc_html_e('Join us at the forefront as we bring the future of cannabis in Africa — together.', 'cannaflex'); ?></p>
                        <a href="#"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                    </div>
                </article>
                <article class="timeline-composed__item timeline-composed__item--right">
                    <div class="timeline-composed__card">
                        <span class="timeline-composed__year">2025</span>
                        <span class="timeline-composed__date">07 June</span>
                        <h3><?php esc_html_e('Cannaflex at Africa CannaTech Expo 2025', 'cannaflex'); ?></h3>
                        <p><?php esc_html_e("Africa's premier cannabis technology event. Let's shape the future of cannabis in Africa — together.", 'cannaflex'); ?></p>
                        <a href="#"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                    </div>
                </article>
            <?php endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<!-- ===== 7. RECENT POSTS ===== -->
<section class="recent-posts section" aria-labelledby="posts-heading">
    <div class="container">
        <h2 id="posts-heading"><?php esc_html_e('Recent Posts', 'cannaflex'); ?></h2>

        <div class="recent-posts__grid">
            <div class="recent-posts__list">
                <?php
                $posts = get_posts([
                    'post_type'      => 'post',
                    'posts_per_page' => 4,
                ]);

                if ($posts) :
                    foreach ($posts as $p) :
                        $thumb = get_the_post_thumbnail_url($p, 'thumb-sm');
                        ?>
                        <article class="post-card">
                            <div class="post-card__thumb">
                                <?php if ($thumb) : ?>
                                    <img src="<?php echo esc_url($thumb); ?>" alt="" loading="lazy" width="100" height="80">
                                <?php else : ?>
                                    <div class="placeholder-img placeholder-img--thumb"></div>
                                <?php endif; ?>
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
                        <div>
                            <h3><?php esc_html_e('Cannaflex Expands Distribution Across Europe', 'cannaflex'); ?></h3>
                            <p><?php esc_html_e('New partnerships bring premium Moroccan cannabis products to more markets.', 'cannaflex'); ?></p>
                            <a href="#"><?php esc_html_e('Read All', 'cannaflex'); ?></a>
                        </div>
                    </article>
                    <article class="post-card">
                        <div class="post-card__thumb"><div class="placeholder-img placeholder-img--thumb"></div></div>
                        <div>
                            <h3><?php esc_html_e('Sustainability Update: Zero-Waste Farming Pilot in the Rif', 'cannaflex'); ?></h3>
                            <p><?php esc_html_e('Our pilot program recycles 100% of plant waste into organic compost.', 'cannaflex'); ?></p>
                            <a href="#"><?php esc_html_e('Read All', 'cannaflex'); ?></a>
                        </div>
                    </article>
                <?php endif;
                wp_reset_postdata();
                ?>
            </div>

            <div class="recent-posts__featured">
                <?php
                if ($posts && get_the_post_thumbnail_url($posts[0], 'hero')) : ?>
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url($posts[0], 'hero')); ?>" alt="" loading="lazy">
                <?php else : ?>
                    <div class="placeholder-img placeholder-img--featured"><?php esc_html_e('Featured Image', 'cannaflex'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- ===== 8. CONTACT SPLIT ===== -->
<section class="home-contact" aria-labelledby="home-contact-heading">
    <div class="home-contact__info">
        <?php
        $contact_bg = cannaflex_get('home_contact_image');
        if ($contact_bg) : ?>
            <div class="home-contact__info-bg">
                <img src="<?php echo esc_url($contact_bg); ?>" alt="" loading="lazy">
            </div>
        <?php endif; ?>
        <div class="home-contact__info-text">
            <?php echo wp_kses_post(nl2br(cannaflex_get('home_contact_text', "Have a question, an inquiry, or need more information about our products and services?\n\nFill out the form or call us at +212 537 327 822 — Our team will be happy to assist you."))); ?>
        </div>
    </div>

    <div class="home-contact__form">
        <h2 id="home-contact-heading"><?php esc_html_e("Let's Connect", 'cannaflex'); ?></h2>
        <?php get_template_part('template-parts/contact', 'form'); ?>
    </div>
</section>

<?php get_footer(); ?>
