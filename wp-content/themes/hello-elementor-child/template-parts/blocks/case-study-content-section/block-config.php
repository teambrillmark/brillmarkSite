<?php
/**
 * case-study-content-section Block Configuration
 */
if (function_exists('acf_register_block_type')) {
    $block_path = '/template-parts/blocks/case-study-content-section';
    $dir = get_stylesheet_directory() . $block_path;
    $uri = get_stylesheet_directory_uri() . $block_path;
    if (!file_exists($dir . '/block.php')) {
        $dir = get_template_directory() . $block_path;
        $uri = get_template_directory_uri() . $block_path;
    }
    acf_register_block_type([
        'name'            => 'case-study-content-section',
        'title'           => __('Case Study Content Section', 'textdomain'),
        'render_template' => $dir . '/block.php',
        'category'        => 'custom-blocks',
        'icon'            => 'admin-site',
        'mode'            => 'preview',
        'supports'        => ['align' => ['wide', 'full']],
    ]);
}
