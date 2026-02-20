<?php
/**
 * flexible-modal-section Block Configuration
 */

if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('acf_register_block_type')) {
    $block_path = '/template-parts/blocks/flexible-modal-section';
    $dir = get_stylesheet_directory() . $block_path;
    $uri = get_stylesheet_directory_uri() . $block_path;
    if (!file_exists($dir . '/block.php')) {
        $dir = get_template_directory() . $block_path;
        $uri = get_template_directory_uri() . $block_path;
    }
    acf_register_block_type([
        'name'        => 'flexible-modal-section',
        'title'       => __('Flexible Modal Section', 'textdomain'),
        'description' => __('A custom flexible-modal-section block with customizable fields.', 'textdomain'),
        'render_template' => $dir . '/block.php',
        'category'    => 'custom-blocks',
        'icon'        => 'admin-site',
        'keywords'    => ['flexible-modal-section', 'custom', 'engagement', 'cards'],
        'mode'        => 'preview',
        'supports'    => ['align' => ['wide', 'full']],
        'enqueue_assets' => function() use ($dir, $uri) {
            if (file_exists($dir . '/block.css')) {
                wp_enqueue_style(
                    'flexible-modal-section-style',
                    $uri . '/block.css',
                    [],
                    filemtime($dir . '/block.css')
                );
            }
            if (file_exists($dir . '/block.js')) {
                wp_enqueue_script(
                    'flexible-modal-section-js',
                    $uri . '/block.js',
                    [],
                    filemtime($dir . '/block.js'),
                    true
                );
            }
        }
    ]);
}
