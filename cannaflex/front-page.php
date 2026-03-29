<?php
/**
 * Template: Front Page (Home)
 *
 * @package Cannaflex
 */

get_header();

$hero_img = cannaflex_get('hero_image');
?>

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="hero__bg">
        <?php if ($hero_img) : ?>
            <img src="<?php echo esc_url($hero_img); ?>" alt="" loading="eager" width="1920" height="1080">
        <?php else : ?>
            <div class="placeholder-img" style="width:100%;height:100%">Hero Image</div>
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="hero__content">
            <h1><?php echo esc_html(cannaflex_get('hero_heading', 'We are Leading the Change')); ?></h1>
            <p><?php echo esc_html(cannaflex_get('hero_text', 'Pioneering legal cannabis from Morocco to the world — with quality, integrity, and innovation at every step.')); ?></p>
            <a href="<?php echo esc_url(cannaflex_get('hero_btn_url', '/contact')); ?>" class="btn btn--primary">
                <?php echo esc_html(cannaflex_get('hero_btn_text', 'Join Us')); ?>
            </a>
        </div>
    </div>
</section>

<!-- ===== ABOUT ===== -->
<section class="home-about section">
    <div class="container split">
        <div class="home-about__badge">
            <?php
            $about_img = cannaflex_get('home_about_image');
            if ($about_img) : ?>
                <img src="<?php echo esc_url($about_img); ?>" alt="<?php esc_attr_e('Made in Morocco', 'cannaflex'); ?>" width="320" height="320" loading="lazy">
            <?php else : ?>
                <div class="placeholder-img" style="width:320px;height:320px;border-radius:50%">Badge Image</div>
            <?php endif; ?>
        </div>
        <div class="home-about__text">
            <h2><?php echo esc_html(cannaflex_get('home_about_heading', 'About Us')); ?></h2>
            <p><?php echo esc_html(cannaflex_get('home_about_text', 'From the ancestral cradle of Moroccan cannabis to the global market, Cannaflex embodies the fusion of tradition and innovation. Rooted in the Rif Mountains, we cultivate, extract, transform, and export premium cannabis-derived products with integrity and purpose.')); ?></p>
            <a href="<?php echo esc_url(home_url('/about/')); ?>" class="btn btn--primary">
                <?php echo esc_html(cannaflex_get('home_about_btn', 'Learn More')); ?>
            </a>
        </div>
    </div>
</section>

<!-- ===== SEED TO SHELF ===== -->
<section class="seed-to-shelf section">
    <div class="container split">
        <div class="seed-to-shelf__image">
            <?php
            $seed_img = cannaflex_get('seed_image');
            if ($seed_img) : ?>
                <img src="<?php echo esc_url($seed_img); ?>" alt="" loading="lazy" width="700" height="500">
            <?php else : ?>
                <div class="placeholder-img" style="width:100%;height:100%;min-height:400px">Cultivation Image</div>
            <?php endif; ?>
            <div class="seed-to-shelf__overlay">
                <h2><?php echo esc_html(cannaflex_get('seed_heading', 'From Seed to Shelf')); ?></h2>
                <p><?php echo esc_html(cannaflex_get('seed_text', 'We control every step of the cannabis value chain — from cultivation in the Rif Mountains to finished products ready for global markets.')); ?></p>
                <a href="<?php echo esc_url(home_url('/activity/')); ?>" class="btn btn--white"><?php esc_html_e('Learn More', 'cannaflex'); ?></a>
            </div>
        </div>
        <div class="process-tiles">
            <?php
            $tiles = [
                ['title' => 'Agriculture',                  'text' => 'Traditional and modern cultivation techniques in the Rif region, ensuring premium-quality raw materials.', 'icon' => 'leaf'],
                ['title' => 'Transformation',               'text' => 'State-of-the-art extraction and processing facilities transform raw cannabis into high-value products.', 'icon' => 'cycle'],
                ['title' => 'Commercialisation and Export',  'text' => 'Global distribution network bringing Moroccan cannabis products to international markets.', 'icon' => 'globe'],
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
                <div class="process-tile">
                    <div class="process-tile__icon"><?php echo $icons[$icon]; // phpcs:ignore ?></div>
                    <div>
                        <h3><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($text); ?></p>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- ===== OUR PRODUCTS ===== -->
<section class="products-section section">
    <div class="container">
        <h2><?php echo esc_html(cannaflex_get('products_heading', 'Our Products')); ?></h2>
        <p class="section-subtitle"><?php echo esc_html(cannaflex_get('products_text', 'Explore our range of premium cannabis-derived products.')); ?></p>

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
                            <?php if ($thumb) : ?>
                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($prod->post_title); ?>" loading="lazy" width="300" height="400">
                            <?php else : ?>
                                <div class="placeholder-img" style="width:100%;height:100%"><?php echo esc_html($prod->post_title); ?></div>
                            <?php endif; ?>
                            <div class="product-card__overlay">
                                <h3><?php echo esc_html($prod->post_title); ?></h3>
                                <a href="<?php echo esc_url(get_permalink($prod)); ?>"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                            </div>
                        </article>
                    <?php endforeach;
                else :
                    // Fallback placeholder cards
                    $fallback = ['Cosmetics', 'Supplements', 'Edibles', 'Extracts', 'Vapes', 'Pet Care'];
                    foreach ($fallback as $name) : ?>
                        <article class="product-card">
                            <div class="placeholder-img" style="width:100%;height:100%"><?php echo esc_html($name); ?></div>
                            <div class="product-card__overlay">
                                <h3><?php echo esc_html($name); ?></h3>
                                <a href="#"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
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

<!-- ===== BRANDS STRIP ===== -->
<section class="brands-strip section">
    <div class="container">
        <h2><?php echo esc_html(cannaflex_get('brands_heading', 'Discover our Brands')); ?></h2>
        <p><?php echo esc_html(cannaflex_get('brands_text', 'Our family of brands delivers quality and innovation across categories.')); ?></p>

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
                $fallback_brands = ['VAPOCAN', 'FITOBOTANIKA', 'RIFGOLD', 'CRAWN'];
                foreach ($fallback_brands as $b) : ?>
                    <span style="font-size:1.25rem;font-weight:700;letter-spacing:0.1em;opacity:0.85"><?php echo esc_html($b); ?></span>
                <?php endforeach;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<!-- ===== RECENT NEWS TIMELINE ===== -->
<section class="news-timeline section">
    <div class="container">
        <h2><?php esc_html_e('Recent News', 'cannaflex'); ?></h2>

        <div class="timeline">
            <div class="timeline__items">
                <?php
                $news = get_posts([
                    'post_type'      => 'post',
                    'posts_per_page' => 6,
                    'category_name'  => 'news',
                ]);

                if ($news) :
                    foreach ($news as $item) :
                        $date = get_the_date('', $item);
                        $year = get_the_date('Y', $item);
                        $day_month = get_the_date('d F', $item);
                        ?>
                        <article class="timeline__item">
                            <span class="timeline__year"><?php echo esc_html($year); ?></span>
                            <span class="timeline__date"><?php echo esc_html($day_month); ?></span>
                            <h3><?php echo esc_html($item->post_title); ?></h3>
                            <p><?php echo esc_html(wp_trim_words($item->post_content, 15)); ?></p>
                            <a href="<?php echo esc_url(get_permalink($item)); ?>"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                        </article>
                    <?php endforeach;
                else : ?>
                    <article class="timeline__item">
                        <span class="timeline__year">2025</span>
                        <span class="timeline__date">04 April</span>
                        <h3>New CBD Skincare Line Launching Soon</h3>
                        <p>Our new cosmetics line brings the finest Moroccan cannabis extracts to skincare.</p>
                        <a href="#"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                    </article>
                    <article class="timeline__item">
                        <span class="timeline__year">2025</span>
                        <span class="timeline__date">07 June</span>
                        <h3>Cannaflex at Africa ConnaTech Expo 2025</h3>
                        <p>Join us at the premier cannabis technology exhibition in Casablanca.</p>
                        <a href="#"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                    </article>
                    <article class="timeline__item">
                        <span class="timeline__year">2025</span>
                        <span class="timeline__date">15 September</span>
                        <h3>Expansion Into European Markets</h3>
                        <p>New distribution partnerships across Germany, France, and the Netherlands.</p>
                        <a href="#"><?php esc_html_e('Read More', 'cannaflex'); ?></a>
                    </article>
                <?php endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>

<!-- ===== RECENT POSTS ===== -->
<section class="recent-posts section">
    <div class="container">
        <h2><?php esc_html_e('Recent Posts', 'cannaflex'); ?></h2>

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
                                    <div class="placeholder-img" style="width:100px;height:80px"></div>
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
                        <div class="post-card__thumb"><div class="placeholder-img" style="width:100px;height:80px"></div></div>
                        <div>
                            <h3>Cannaflex Expands Distribution Across Europe</h3>
                            <p>New partnerships bring premium Moroccan cannabis products to more markets.</p>
                            <a href="#"><?php esc_html_e('Read All', 'cannaflex'); ?></a>
                        </div>
                    </article>
                    <article class="post-card">
                        <div class="post-card__thumb"><div class="placeholder-img" style="width:100px;height:80px"></div></div>
                        <div>
                            <h3>Sustainability Update: Zero-Waste Farming Pilot in the Rif</h3>
                            <p>Our pilot program recycles 100% of plant waste into organic compost.</p>
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
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url($posts[0], 'hero')); ?>" alt="" loading="lazy" width="600" height="400">
                <?php else : ?>
                    <div class="placeholder-img" style="width:100%;height:100%;min-height:300px">Featured Image</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- ===== CONTACT SPLIT ===== -->
<section class="home-contact">
    <div class="home-contact__info">
        <?php
        $contact_bg = cannaflex_get('home_contact_image');
        if ($contact_bg) : ?>
            <div class="home-contact__info-bg">
                <img src="<?php echo esc_url($contact_bg); ?>" alt="" loading="lazy" width="960" height="600">
            </div>
        <?php endif; ?>
        <div class="home-contact__info-text">
            <?php echo wp_kses_post(nl2br(cannaflex_get('home_contact_text', "Have a question, an inquiry, or need more information about our products and services?\n\nFill out the form or call us at +212 537 327 822 — Our team will be happy to assist you."))); ?>
        </div>
    </div>

    <div class="home-contact__form">
        <h2><?php esc_html_e("Let's Connect", 'cannaflex'); ?></h2>
        <?php get_template_part('template-parts/contact', 'form'); ?>
    </div>
</section>

<?php get_footer(); ?>
