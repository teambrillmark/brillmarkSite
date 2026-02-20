<?php
/**
 * Text with Image Block Configuration
 * Registers the ACF block with WordPress
 */

// Load ACF field group from block-acf.json so JSON edits show in admin
$block_acf_path = get_stylesheet_directory() . '/template-parts/blocks/text-with-image/block-acf.json';
if (function_exists('acf_add_local_field_group') && file_exists($block_acf_path)) {
    $groups = json_decode(file_get_contents($block_acf_path), true);
    if (!empty($groups)) {
        foreach ($groups as $group) {
            acf_add_local_field_group($group);
        }
    }
}

if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'text-with-image',
        'title'             => __('Text with Image', 'textdomain'),
        'description'       => __('A custom block with text content and an image side by side.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/text-with-image/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('text', 'image', 'content', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // do not include css file here

    // Auto-load JS if file exists
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/text-with-image/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/text-with-image/block.js';
    }

    acf_register_block_type($block_config);
}
