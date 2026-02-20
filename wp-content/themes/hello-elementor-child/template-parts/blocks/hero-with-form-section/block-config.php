<?php
/**
 * hero-with-form-section Block Configuration
 * 
 * This file registers the hero-with-form-section block with ACF
 */

// Check if ACF function exists
if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'hero-with-form-section',
        'title'             => __('hero-with-form-section', 'textdomain'),
        'description'       => __('A custom hero-with-form-section block with customizable fields.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/hero-with-form-section/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('hero-with-form-section', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // Only enqueue CSS if file exists
    // NOTE: Path MUST include project folder: template-parts/blocks/
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/hero-with-form-section/block.css')) {
        $block_config['enqueue_style'] = get_stylesheet_directory_uri() . '/template-parts/blocks/hero-with-form-section/block.css';
    }

    // Only enqueue JS if file exists
    // NOTE: Path MUST include project folder: template-parts/blocks/
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/hero-with-form-section/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/hero-with-form-section/block.js';
    }

    acf_register_block_type($block_config);
}
