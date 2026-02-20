<?php
/**
 * Migration Process Block Configuration
 * Registers the ACF block with WordPress
 */

if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'migration-process',
        'title'             => __('5 Week Migration Process', 'textdomain'),
        'description'       => __('A section showing the proven 5 week migration process with cards and CTA.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/migration-process/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('migration', 'process', 'shopify', 'weeks', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // do not include css file here

    // Auto-load JS if file exists
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/migration-process/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/migration-process/block.js';
    }

    acf_register_block_type($block_config);
}
