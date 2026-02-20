<?php
/**
 * metric-table-content-section Block Configuration
 * 
 * This file registers the metric-table-content-section block with ACF
 */

// Check if ACF function exists
if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'metric-table-content-section',
        'title'             => __('metric-table-content-section', 'textdomain'),
        'description'       => __('A custom metric-table-content-section block with customizable fields.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/metric-table-content-section/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('metric-table-content-section', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // Only enqueue CSS if file exists
    // NOTE: Path MUST include project folder: template-parts/blocks/
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/metric-table-content-section/block.css')) {
        $block_config['enqueue_style'] = get_stylesheet_directory_uri() . '/template-parts/blocks/metric-table-content-section/block.css';
    }

    // Only enqueue JS if file exists
    // NOTE: Path MUST include project folder: template-parts/blocks/
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/metric-table-content-section/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/metric-table-content-section/block.js';
    }

    acf_register_block_type($block_config);
}