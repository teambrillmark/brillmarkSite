<?php
/**
 * our-service-mobile-section Block Configuration
 * 
 * This file registers the our-service-mobile-section block with ACF
 */

// Check if ACF function exists
if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'our-service-mobile-section',
        'title'             => __('Our Service Mobile Section', 'textdomain'),
        'description'       => __('A custom our-service-mobile-section block with customizable fields.', 'textdomain'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/our-service-mobile-section/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('our-service-mobile-section', 'services', 'tabs', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // Only enqueue CSS if file exists
    // NOTE: Path does NOT include project folder, even though file is stored in template-parts/{project}/blocks/
    if (file_exists(get_template_directory() . '/template-parts/blocks/our-service-mobile-section/block.css')) {
        $block_config['enqueue_style'] = get_template_directory_uri() . '/template-parts/blocks/our-service-mobile-section/block.css?v=003';
    }

    // Only enqueue JS if file exists
    if (file_exists(get_template_directory() . '/template-parts/blocks/our-service-mobile-section/block.js')) {
        $block_config['enqueue_script'] = get_template_directory_uri() . '/template-parts/blocks/our-service-mobile-section/block.js';
    }

    acf_register_block_type($block_config);
}
