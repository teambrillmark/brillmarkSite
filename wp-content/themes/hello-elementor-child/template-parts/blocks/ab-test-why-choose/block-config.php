<?php
/**
 * AB Test Why Choose Block Configuration
 * Registers the ACF block with WordPress
 */

if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'ab-test-why-choose',
        'title'             => __('AB Test Why Choose', 'textdomain'),
        'description'       => __('Why Choose BrillMark for A/B Test Development comparison table.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/ab-test-why-choose/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('ab test', 'why choose', 'comparison', 'brillmark', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // do not include css file here

    // Auto-load JS if file exists
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/ab-test-why-choose/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/ab-test-why-choose/block.js';
    }

    acf_register_block_type($block_config);
}
