<?php
/**
 * What We Achieve Block Configuration
 * Registers the ACF block with WordPress
 */

if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'what-we-achieve',
        'title'             => __('What We Achieve', 'textdomain'),
        'description'       => __('A metrics table section showing before/after comparison with increase percentages.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/what-we-achieve/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'editor-table',
        'keywords'          => array('what we achieve', 'metrics', 'table', 'comparison', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // do not include css file here

    // Auto-load JS if file exists
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/what-we-achieve/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/what-we-achieve/block.js';
    }

    acf_register_block_type($block_config);
}
