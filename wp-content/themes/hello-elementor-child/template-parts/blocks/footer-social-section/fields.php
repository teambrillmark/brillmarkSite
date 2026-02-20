<?php
/**
 * Footer Social Section - ACF Fields Registration
 * 
 * Auto-registers ACF fields for the footer-social-section block.
 * This file can be included in functions.php or loaded via acf/init hook.
 * 
 * @package theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register ACF fields for Footer Social Section block
 */
function register_footer_social_section_acf_fields() {
    // Check if ACF is available
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_footer_social_section_fields',
        'title' => 'Footer Social Section Fields',
        'fields' => array(
            array(
                'key' => 'field_footer-social-section_social_icons',
                'label' => 'Social Icons',
                'name' => 'social_icons',
                'type' => 'repeater',
                'instructions' => 'Add social media icons with links. Each icon appears in the footer social section.',
                'required' => 0,
                'min' => 1,
                'max' => 10,
                'layout' => 'table',
                'button_label' => 'Add Social Icon',
                'sub_fields' => array(
                    array(
                        'key' => 'field_footer-social-section_social_icon_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                        'instructions' => 'Social media platform name (used for accessibility and alt text)',
                        'required' => 1,
                        'default_value' => 'Social Media',
                        'placeholder' => 'e.g., LinkedIn, Twitter, Facebook',
                    ),
                    array(
                        'key' => 'field_footer-social-section_social_icon_link',
                        'label' => 'Link URL',
                        'name' => 'link',
                        'type' => 'url',
                        'instructions' => 'URL to the social media profile page',
                        'required' => 1,
                        'default_value' => '#',
                        'placeholder' => 'https://linkedin.com/company/...',
                    ),
                    array(
                        'key' => 'field_footer-social-section_social_icon_image',
                        'label' => 'Icon Image',
                        'name' => 'icon',
                        'type' => 'image',
                        'instructions' => 'Upload a social media icon (recommended: 40x41px)',
                        'required' => 1,
                        'return_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'mime_types' => 'jpg,jpeg,png,gif,svg,webp',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/footer-social-section',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => 'ACF field group for the Footer Social Section block containing repeatable social media icon links.',
    ));
}

// Register fields on ACF init
add_action('acf/init', 'register_footer_social_section_acf_fields');
