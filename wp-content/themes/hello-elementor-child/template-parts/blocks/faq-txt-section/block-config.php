<?php
/**
 * faq-txt-section Block Configuration
 * 
 * This file registers the faq-txt-section block with ACF
 */

// Check if ACF function exists
if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'faq-txt-section',
        'title'             => __('FAQ Text Section', 'textdomain'),
        'description'       => __('A custom FAQ text section block with customizable badge, heading, and description fields.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/faq-txt-section/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'editor-help',
        'keywords'          => array('faq', 'text', 'section', 'heading', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // Only enqueue CSS if file exists
    // NOTE: Path does NOT include project folder, even though file is stored in template-parts/{project}/blocks/
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/faq-txt-section/block.css')) {
        $block_config['enqueue_style'] = get_stylesheet_directory_uri() . '/template-parts/blocks/faq-txt-section/block.css';
    }

    // Only enqueue JS if file exists
    // NOTE: Path does NOT include project folder, even though file is stored in template-parts/{project}/blocks/
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/faq-txt-section/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/faq-txt-section/block.js';
    }

    acf_register_block_type($block_config);
}
