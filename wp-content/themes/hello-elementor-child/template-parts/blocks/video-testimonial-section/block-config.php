<?php
/**
 * Video Testimonial Section Block Configuration
 */

if (function_exists('acf_register_block_type')) {
    $block_path = '/template-parts/blocks/video-testimonial-section';
    $dir = get_stylesheet_directory() . $block_path;
    $uri = get_stylesheet_directory_uri() . $block_path;
    if (!file_exists($dir . '/block.php')) {
        $dir = get_template_directory() . $block_path;
        $uri = get_template_directory_uri() . $block_path;
    }
    acf_register_block_type([
        'name'            => 'video-testimonial-section',
        'title'           => __('Video Testimonial Section', 'theme'),
        'render_template' => $dir . '/block.php',
        'category'        => 'custom-blocks',
        'icon'            => 'format-video',
        'mode'            => 'preview',
        'supports'        => ['align' => ['wide', 'full']],
    ]);
}
?>
