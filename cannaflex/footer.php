</main><!-- /#main-content -->

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-grid">
            <!-- Column 1: Cannaflex links -->
            <div class="footer-col">
                <h4><?php esc_html_e('Cannaflex', 'cannaflex'); ?></h4>
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'cannaflex'); ?></a>
                <a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('About', 'cannaflex'); ?></a>
                <a href="<?php echo esc_url(home_url('/activity/')); ?>"><?php esc_html_e('Activity', 'cannaflex'); ?></a>
                <a href="<?php echo esc_url(home_url('/products/')); ?>"><?php esc_html_e('Products', 'cannaflex'); ?></a>
                <a href="<?php echo esc_url(home_url('/brands/')); ?>"><?php esc_html_e('Brands', 'cannaflex'); ?></a>
                <a href="<?php echo esc_url(home_url('/news/')); ?>"><?php esc_html_e('News', 'cannaflex'); ?></a>
            </div>

            <!-- Column 2: Contact -->
            <div class="footer-col">
                <h4><?php esc_html_e('Contact', 'cannaflex'); ?></h4>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Carry our products', 'cannaflex'); ?></a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Request our catalog', 'cannaflex'); ?></a>
                <a href="#"><?php esc_html_e('B2B Access', 'cannaflex'); ?></a>

                <div class="footer-social">
                    <?php
                    $socials = [
                        'facebook'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>',
                        'whatsapp'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>',
                        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="5" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="17.5" cy="6.5" r="1.5"/></svg>',
                        'linkedin'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>',
                    ];

                    foreach ($socials as $name => $svg) :
                        $url = cannaflex_get("social_{$name}", '#');
                        ?>
                        <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr(ucfirst($name)); ?>">
                            <?php echo $svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Column 3: Practical information -->
            <div class="footer-col">
                <h4><?php esc_html_e('Practical Information', 'cannaflex'); ?></h4>
                <a href="#"><?php esc_html_e('Legal information', 'cannaflex'); ?></a>
                <a href="<?php echo esc_url(get_privacy_policy_url()); ?>"><?php esc_html_e('Privacy Policy', 'cannaflex'); ?></a>
                <a href="#"><?php esc_html_e('Terms of service', 'cannaflex'); ?></a>
                <a href="#"><?php esc_html_e('FAQ', 'cannaflex'); ?></a>
                <a href="#"><?php esc_html_e('Careers', 'cannaflex'); ?></a>
            </div>

            <!-- Column 4: Made in Morocco badge -->
            <div class="footer-col footer-badge">
                <?php
                $badge = cannaflex_get('footer_badge');
                if ($badge) : ?>
                    <img src="<?php echo esc_url($badge); ?>" alt="<?php esc_attr_e('Made in Morocco', 'cannaflex'); ?>" width="150" height="150" loading="lazy">
                <?php else : ?>
                    <svg viewBox="0 0 150 150" xmlns="http://www.w3.org/2000/svg" width="150" height="150">
                        <circle cx="75" cy="75" r="70" fill="none" stroke="#fff" stroke-width="2"/>
                        <circle cx="75" cy="75" r="60" fill="none" stroke="#fff" stroke-width="1"/>
                        <text fill="#fff" font-family="Inter,sans-serif" font-size="10" font-weight="700" text-anchor="middle">
                            <textPath href="#badge-circle" startOffset="50%">MADE IN MOROCCO</textPath>
                        </text>
                        <defs><path id="badge-circle" d="M 75,15 a 60,60 0 1,1 0,120 a 60,60 0 1,1 0,-120"/></defs>
                        <text x="75" y="82" fill="#fff" font-family="Inter,sans-serif" font-size="22" font-weight="700" text-anchor="middle">&#x1F33F;</text>
                    </svg>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html(cannaflex_get('copyright', date('Y') . ' by CANNAFLEX. Powered by Cannabis sativa L.')); ?></p>
        </div>
    </div>
</footer>

<!-- Back to top -->
<button type="button" class="back-to-top" id="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'cannaflex'); ?>">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path d="M18 15l-6-6-6 6"/></svg>
</button>

<?php wp_footer(); ?>
</body>
</html>
