<?php
/**
 * Shopify Why Choose Block Configuration
 * Registers the ACF block with WordPress
 */

if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'shopify-why-choose',
        'title'             => __('Shopify Why Choose', 'textdomain'),
        'description'       => __('Why Choose Brillmark section with title, description and grid of feature items.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/shopify-why-choose/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('shopify', 'why choose', 'migration', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // do not include css file here

    // Auto-load JS if file exists
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/shopify-why-choose/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/shopify-why-choose/block.js';
    }

    acf_register_block_type($block_config);
}
