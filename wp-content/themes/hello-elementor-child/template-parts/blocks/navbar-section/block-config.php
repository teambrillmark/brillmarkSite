<?php
/**
 * navbar-section Block Configuration
 * 
 * This file registers the navbar-section block with ACF
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Check if ACF function exists
if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'navbar-section',
        'title'             => __('Navbar Section', 'theme'),
        'description'       => __('A custom navbar-section block with customizable fields, mega menu dropdown, and mobile navigation.', 'theme'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/navbar-section/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'menu',
        'keywords'          => array('navbar-section', 'navigation', 'header', 'menu', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // Only enqueue CSS if file exists
    // NOTE: Path MUST include project folder: template-parts/blocks/
    if (file_exists(get_template_directory() . '/template-parts/blocks/navbar-section/block.css')) {
        $block_config['enqueue_style'] = get_template_directory_uri() . '/template-parts/blocks/navbar-section/block.css';
    }

    // Only enqueue JS if file exists
    // NOTE: Path MUST include project folder: template-parts/blocks/
    if (file_exists(get_template_directory() . '/template-parts/blocks/navbar-section/block.js')) {
        $block_config['enqueue_script'] = get_template_directory_uri() . '/template-parts/blocks/navbar-section/block.js';
    }

    acf_register_block_type($block_config);
}
