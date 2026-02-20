<?php
/**
 * Proven Results Block Configuration
 * Registers the ACF block with WordPress
 */

if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'proven-results',
        'title'             => __('Proven Results, Satisfied Clients', 'textdomain'),
        'description'       => __('A section with video testimonial and stacked client testimonials.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/proven-results/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('proven results', 'testimonials', 'video', 'clients', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // do not include css file here

    // Auto-load JS if file exists
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/proven-results/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/proven-results/block.js';
    }

    acf_register_block_type($block_config);
}
