<?php
/**
 * shopify-dev-services-section Block Configuration
 */

if (function_exists('acf_register_block_type')) {
    $block_path = '/template-parts/blocks/shopify-dev-services-section';
    $dir = get_stylesheet_directory() . $block_path;
    $uri = get_stylesheet_directory_uri() . $block_path;
    if (!file_exists($dir . '/block.php')) {
        $dir = get_template_directory() . $block_path;
        $uri = get_template_directory_uri() . $block_path;
    }
    acf_register_block_type([
        'name'            => 'shopify-dev-services-section',
        'title'           => __('Shopify Dev Services Section', 'textdomain'),
        'render_template' => $dir . '/block.php',
        'category'        => 'custom-blocks',
        'icon'            => 'admin-site',
        'mode'            => 'preview',
        'supports'        => ['align' => ['wide', 'full']],
        'enqueue_assets'  => function() use ($dir, $uri) {
            if (file_exists($dir . '/block.css')) {
                wp_enqueue_style(
                    'shopify-dev-services-section-style',
                    $uri . '/block.css',
                    [],
                    filemtime($dir . '/block.css')
                );
            }
            if (file_exists($dir . '/block.js')) {
                wp_enqueue_script(
                    'shopify-dev-services-section-js',
                    $uri . '/block.js',
                    [],
                    filemtime($dir . '/block.js'),
                    true
                );
            }
        }
    ]);
}
