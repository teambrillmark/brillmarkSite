<?php
/**
 * Test Development Process Block Configuration
 * Registers the ACF block with WordPress
 */

if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'test-development-process',
        'title'             => __('A/B Test Development Process', 'textdomain'),
        'description'       => __('Tabbed section showing the A/B test development process steps with desktop tabs and mobile accordion.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/test-development-process/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('ab test', 'process', 'tabs', 'accordion', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // do not include css file here

    // Auto-load JS if file exists
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/test-development-process/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/test-development-process/block.js';
    }

    acf_register_block_type($block_config);
}
