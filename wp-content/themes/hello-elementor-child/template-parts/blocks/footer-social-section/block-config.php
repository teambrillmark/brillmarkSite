<?php
/**
 * footer-social-section Block Configuration
 * 
 * This file registers the footer-social-section block with ACF
 */

// Check if ACF function exists
if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'footer-social-section',
        'title'             => __('Footer Social Section', 'textdomain'),
        'description'       => __('A custom footer-social-section block with customizable fields.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/footer-social-section/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'share',
        'keywords'          => array('footer-social-section', 'social', 'icons', 'footer', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // Only enqueue CSS if file exists
    // NOTE: Path does NOT include project folder, even though file is stored in template-parts/{project}/blocks/
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/footer-social-section/block.css')) {
        $block_config['enqueue_style'] = get_stylesheet_directory_uri() . '/template-parts/blocks/footer-social-section/block.css';
    }

    // Only enqueue JS if file exists
    // NOTE: Path does NOT include project folder, even though file is stored in template-parts/{project}/blocks/
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/footer-social-section/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/footer-social-section/block.js';
    }

    acf_register_block_type($block_config);
}
