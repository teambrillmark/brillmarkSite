<?php
/**
 * cro-process-section Block Configuration
 * 
 * This file registers the cro-process-section block with ACF
 */

// Check if ACF function exists
if (function_exists('acf_register_block_type')) {
    $block_config = array(
        'name'              => 'cro-process-section',
        'title'             => __('CRO Process Section', 'textdomain'),
        'description'       => __('A custom cro-process-section block with process steps, accordion, and tabs.', 'textdomain'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/cro-process-section/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'admin-site',
        'keywords'          => array('cro-process-section', 'custom', 'process', 'accordion', 'tabs', 'steps'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
    );

    // Only enqueue CSS if file exists
    // NOTE: Path does NOT include project folder, even though file is stored in template-parts/{project}/blocks/
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/cro-process-section/block.css')) {
        $block_config['enqueue_style'] = get_stylesheet_directory_uri() . '/template-parts/blocks/cro-process-section/block.css';
    }

    // Only enqueue JS if file exists
    // NOTE: Path does NOT include project folder, even though file is stored in template-parts/{project}/blocks/
    if (file_exists(get_stylesheet_directory() . '/template-parts/blocks/cro-process-section/block.js')) {
        $block_config['enqueue_script'] = get_stylesheet_directory_uri() . '/template-parts/blocks/cro-process-section/block.js';
    }

    acf_register_block_type($block_config);
}
?>
