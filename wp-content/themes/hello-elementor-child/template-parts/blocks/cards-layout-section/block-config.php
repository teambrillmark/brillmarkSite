<?php
/**
 * Cards Layout Section Block Configuration
 */

if (function_exists('acf_register_block_type')) {
    $block_path = '/template-parts/blocks/cards-layout-section';
    $dir = get_stylesheet_directory() . $block_path;
    $uri = get_stylesheet_directory_uri() . $block_path;
    if (!file_exists($dir . '/block.php')) {
        $dir = get_template_directory() . $block_path;
        $uri = get_template_directory_uri() . $block_path;
    }

    $acf_fields = $dir . '/block-acf-fields.php';
    if (file_exists($acf_fields)) {
        require_once $acf_fields;
    }

    acf_register_block_type([
        'name'            => 'cards-layout-section',
        'title'           => __('Cards Layout Section', 'theme'),
        'description'     => __('Card grid with optional badge, icon, rich text content, section and per-card backgrounds (including gradients). Last card can act as CTA.', 'theme'),
        'render_template' => $dir . '/block.php',
        'category'        => 'custom-blocks',
        'icon'            => 'grid-view',
        'mode'            => 'preview',
        'supports'        => ['align' => ['wide', 'full']],
    ]);
}
?>
