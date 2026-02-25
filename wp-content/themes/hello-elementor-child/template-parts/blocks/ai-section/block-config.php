<?php
/**
 * ai-section Block Configuration
 */
if (function_exists('acf_register_block_type')) {
    $block_path = '/template-parts/blocks/ai-section';
    $dir = get_stylesheet_directory() . $block_path;
    if (!file_exists($dir . '/block.php')) {
        $dir = get_template_directory() . $block_path;
    }
    acf_register_block_type([
        'name'            => 'ai-section',
        'title'           => __('AI Section', 'textdomain'),
        'render_template' => $dir . '/block.php',
        'category'        => 'custom-blocks',
        'icon'            => 'admin-site',
        'mode'            => 'preview',
        'supports'        => ['align' => ['wide', 'full']],
    ]);
}
