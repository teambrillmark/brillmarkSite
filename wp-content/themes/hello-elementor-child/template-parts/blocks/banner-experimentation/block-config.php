<?php
/**
 * Banner Experimentation Block Configuration
 * Registers the ACF block with WordPress
 */

if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'banner-experimentation',
        'title'             => __('Banner Experimentation', 'textdomain'),
        'description'       => __('A/B test development banner with content, video, quote, and partner logos.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/banner-experimentation/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('banner', 'experimentation', 'ab test', 'custom', 'content'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // do not include css file here

    // Auto-load JS if file exists
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/banner-experimentation/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/banner-experimentation/block.js';
    }

    acf_register_block_type($block_config);
}
