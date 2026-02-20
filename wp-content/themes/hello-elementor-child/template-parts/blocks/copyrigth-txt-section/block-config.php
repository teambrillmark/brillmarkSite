<?php
/**
 * copyrigth-txt-section Block Configuration
 * 
 * This file registers the copyrigth-txt-section block with ACF
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Check if ACF function exists
if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'copyrigth-txt-section',
        'title'             => __('copyrigth-txt-section', 'textdomain'),
        'description'       => __('A custom copyrigth-txt-section block with customizable fields.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/copyrigth-txt-section/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('copyrigth-txt-section', 'custom', 'copyright', 'footer'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // Only enqueue CSS if file exists
    // NOTE: Path does NOT include project folder, even though file is stored in template-parts/{project}/blocks/
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/copyrigth-txt-section/block.css')) {
        $block_config['enqueue_style'] = get_stylesheet_directory_uri() . '/template-parts/blocks/copyrigth-txt-section/block.css';
    }

    // Only enqueue JS if file exists
    // NOTE: Path does NOT include project folder, even though file is stored in template-parts/{project}/blocks/
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/copyrigth-txt-section/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/copyrigth-txt-section/block.js';
    }

    acf_register_block_type($block_config);
}
