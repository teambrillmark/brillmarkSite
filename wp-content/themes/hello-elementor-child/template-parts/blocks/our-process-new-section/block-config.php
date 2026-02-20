<?php
/**
 * our-process-new-section Block Configuration
 */

if (function_exists('acf_register_block_type')) {
    $block_path = '/template-parts/blocks/our-process-new-section';
    $dir = get_stylesheet_directory() . $block_path;
    $uri = get_stylesheet_directory_uri() . $block_path;
    if (!file_exists($dir . '/block.php')) {
        $dir = get_template_directory() . $block_path;
        $uri = get_template_directory_uri() . $block_path;
    }
    acf_register_block_type([
        'name'        => 'our-process-new-section',
        'title'       => __('Our Process New Section', 'textdomain'),
        'render_template' => $dir . '/block.php',
        'category'    => 'custom-blocks',
        'icon'        => 'admin-site',
        'mode'        => 'preview',
        'supports'    => ['align' => ['wide', 'full']],
        'enqueue_assets' => function() use ($dir, $uri) {
            if (file_exists($dir . '/block.css')) {
                wp_enqueue_style(
                    'our-process-new-section-style',
                    $uri . '/block.css',
                    [],
                    filemtime($dir . '/block.css')
                );
            }
            if (file_exists($dir . '/block.js')) {
                wp_enqueue_script(
                    'our-process-new-section-js',
                    $uri . '/block.js',
                    [],
                    filemtime($dir . '/block.js'),
                    true
                );
            }
        }
    ]);
}
