<?php
/**
 * Table Section Block Configuration
 */

if (function_exists('acf_register_block_type')) {
    $block_path = '/template-parts/components/blocks/table-section';
    $dir = get_stylesheet_directory() . $block_path;
    if (!file_exists($dir . '/block.php')) {
        $dir = get_template_directory() . $block_path;
    }
    acf_register_block_type(array(
        'name'              => 'table-section',
        'title'             => __('Table Section', 'textdomain'),
        'description'       => __('A configurable table/comparison section with 4 layout variants.', 'textdomain'),
        'render_template'   => $dir . '/block.php',
        'category'          => 'custom-blocks',
        'icon'              => 'editor-table',
        'keywords'          => array('table', 'comparison', 'metrics', 'custom'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx'  => true
        ),
    ));
}
