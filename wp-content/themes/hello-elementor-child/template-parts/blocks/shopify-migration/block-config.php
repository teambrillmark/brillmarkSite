<?php
/**
 * Shopify Migration Block Configuration
 * Registers the ACF block with WordPress
 */

if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'shopify-migration',
        'title'             => __('Shopify Migration', 'textdomain'),
        'description'       => __('Shopify 2.0 migration section with form and image.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/shopify-migration/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('shopify', 'migration', 'form', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // do not include css file here

    // Auto-load JS if file exists
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/shopify-migration/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/shopify-migration/block.js';
    }

    acf_register_block_type($block_config);
}
