<?php
/**
 * testimonial-section Block Configuration
 *
 * Registers the testimonial section block with ACF (Swiper slider).
 */

if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('acf_register_block_type')) {
    $block_path = '/template-parts/blocks/testimonial-section';
    $dir = get_stylesheet_directory() . $block_path;
    $uri = get_stylesheet_directory_uri() . $block_path;
    if (!file_exists($dir . '/block.php')) {
        $dir = get_template_directory() . $block_path;
        $uri = get_template_directory_uri() . $block_path;
    }
    acf_register_block_type([
        'name'        => 'testimonial-section',
        'title'       => __('Testimonial Section', 'textdomain'),
        'description' => __('A testimonial slider with quote, review text, person image, company logo, name and designation.', 'textdomain'),
        'render_template' => $dir . '/block.php',
        'category'    => 'custom-blocks',
        'icon'        => 'format-quote',
        'keywords'    => ['testimonial', 'slider', 'swiper', 'quotes', 'custom'],
        'mode'        => 'preview',
        'supports'    => ['align' => ['wide', 'full']],
        'enqueue_assets' => function() use ($dir, $uri) {
            wp_enqueue_style('swiper-css');
            if (file_exists($dir . '/block.css')) {
                wp_enqueue_style(
                    'testimonial-section-style',
                    $uri . '/block.css',
                    [],
                    filemtime($dir . '/block.css')
                );
            }
            if (file_exists($dir . '/block.js')) {
                wp_enqueue_script(
                    'testimonial-section-js',
                    $uri . '/block.js',
                    ['swiper-js'],
                    filemtime($dir . '/block.js'),
                    true
                );
            }
        }
    ]);
}
