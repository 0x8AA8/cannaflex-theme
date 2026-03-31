<?php
/**
 * Activity section: Value chain alternating blocks
 *
 * @package Cannaflex
 */

defined('ABSPATH') || exit;

$page_id = get_the_ID();

$blocks_json = get_post_meta($page_id, '_cfx_activity_blocks', true);
$blocks = $blocks_json ? json_decode($blocks_json, true) : null;

if (! $blocks || ! is_array($blocks)) {
    $blocks = [
        ['title' => 'Culture',                'text' => 'We partner with agricultural cooperatives authorized by Morocco\'s National Cannabis Agency (ANRAC) to cultivate cannabis in full compliance with Moroccan regulations.'],
        ['title' => 'Research & Development', 'text' => "We are committed to continuous innovation and excellence. Our dedicated R&D team works relentlessly to develop new formulations, improve existing products, and explore advanced technologies in the cannabis sector."],
        ['title' => 'Extraction',             'text' => 'We operate state-of-the-art facilities for CBD isolate, distillate, and full-spectrum extract production using advanced extraction technologies to ensure purity, safety, and consistency across all our product lines.'],
        ['title' => 'Transformation',         'text' => 'We transform and process cannabis into high-quality products, ensuring all certifications and standards are met throughout the production chain.'],
        ['title' => 'Sales and Export',        'text' => "We sell and distribute premium cannabis-based products in full compliance with Moroccan regulations, ensuring both safety and legal integrity.\n\nOur international export operations are backed by rigorous quality controls, complete product traceability, and adherence to global regulatory standards. We proudly support distributors, retailers, wellness brands, and healthcare professionals with market-ready solutions tailored for success in local and international markets."],
    ];
}

foreach ($blocks as $index => $block) :
    $reverse = ($index % 2 !== 0) ? ' activity-block--reverse' : '';
    $img_key = '_cfx_activity_img_' . $index;
    $img_url = get_post_meta($page_id, $img_key, true);
    ?>
    <section class="activity-block<?php echo esc_attr($reverse); ?>" aria-labelledby="activity-block-<?php echo esc_attr($index); ?>">
        <div class="activity-block__image">
            <?php if ($img_url) : ?>
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($block['title']); ?>" loading="lazy" width="960" height="500">
            <?php else : ?>
                <div class="placeholder-img placeholder-img--full placeholder-img--tall"><?php echo esc_html($block['title']); ?></div>
            <?php endif; ?>
        </div>
        <div class="activity-block__content">
            <h2 id="activity-block-<?php echo esc_attr($index); ?>"><?php echo esc_html($block['title']); ?></h2>
            <?php echo wp_kses_post(wpautop(esc_html($block['text']))); ?>
        </div>
    </section>
<?php endforeach; ?>
