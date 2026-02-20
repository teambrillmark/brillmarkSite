<?php
/**
 * footer-section Block Configuration
 *
 * Registers the footer block with logo, description, CTA, social links, link columns, and copyright.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'footer-section',
        'title'             => __('Footer Section', 'textdomain'),
        'description'       => __('Site footer with logo, description, book meeting CTA, social links, navigation columns, and copyright.', 'textdomain'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/footer-section/block.php',
        'category'          => 'theme',
        'icon'              => 'editor-kitchensink',
        'keywords'          => array('footer', 'footer-section', 'copyright', 'social', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('full'),
            'mode'  => false,
            'jsx'   => true,
        ),
    );

    if (file_exists(get_template_directory() . '/template-parts/blocks/footer-section/block.css')) {
        $block_config['enqueue_style'] = get_template_directory_uri() . '/template-parts/blocks/footer-section/block.css';
    }

    if (file_exists(get_template_directory() . '/template-parts/blocks/footer-section/block.js')) {
        $block_config['enqueue_script'] = get_template_directory_uri() . '/template-parts/blocks/footer-section/block.js';
    }

    acf_register_block_type($block_config);
}
