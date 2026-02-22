<?php
// testing the connection after ssh key update 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css?v=0010', array( 'hello-elementor','hello-elementor','hello-elementor-theme-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

function load_custom_scripts() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'load_custom_scripts');


function get_rebranding_header() {
    get_template_part('/global-templates/rebranding-header');
}

function get_rebranding_footer() {
    get_template_part('/global-templates/rebranding-footer');
}

function get_rebranding_nav() {
    get_template_part('/global-templates/rebranding-nav');
}

// Main Sections

function get_rebranding_hero() {
    get_template_part('/main-sections-templates/rebranding-hero');
}

function get_rebranding_client_slider() {
    get_template_part('/main-sections-templates/rebranding-client-slider');
}
function get_rebranding_pill_group() {
    get_template_part('/main-sections-templates/rebranding-pill-group');
}

function get_rebranding_galaxy_advanced_web(){
    get_template_part('/main-sections-templates/rebranding-galaxy-advanced-web');
}

function get_rebranding_galaxy_mockup_design(){
    get_template_part('/main-sections-templates/rebranding-galaxy-mockup-design');
}

function get_rebranding_galaxy_data_driven_cro(){
    get_template_part('/main-sections-templates/rebranding-galaxy-data-driven-cro');
}

function get_rebranding_galaxy_technical_support(){
    get_template_part('/main-sections-templates/rebranding-galaxy-technical-support');
}

function get_rebranding_galaxy_shopify_dev(){
    get_template_part('/main-sections-templates/rebranding-galaxy-shopify-dev');
}

function get_rebranding_galaxy_wordpress_dev(){
    get_template_part('/main-sections-templates/rebranding-galaxy-wordpress-dev');
}

function get_rebranding_galaxy_quality_assurance(){
    get_template_part('/main-sections-templates/rebranding-galaxy-quality-assurance');
}

function get_rebranding_galaxy_ab_test(){
    get_template_part('/main-sections-templates/rebranding-galaxy-ab-test');
}

function get_rebranding_ready_to_work(){
    get_template_part('/main-sections-templates/rebranding-ready-to-work');
}

function get_rebranding_cro_shop_accordion(){
    get_template_part('/main-sections-templates/rebranding-cro-shop-accordion');
}

function get_rebranding_cro_dev_process_tab(){
    get_template_part('/main-sections-templates/rebranding-cro-dev-process-tab');
}

function get_rebranding_testimonial(){
    get_template_part('/main-sections-templates/rebranding-testimonial');
}

function get_rebranding_counter(){
    get_template_part('/main-sections-templates/rebranding-counter');
}

function get_rebranding_blog_slider(){
    get_template_part('/main-sections-templates/rebranding-blog-slider');
}

function get_rebranding_pricing(){
    get_template_part('/main-sections-templates/rebranding-pricing');
}

function get_rebranding_testing_process(){
    get_template_part('/main-sections-templates/rebranding-testing-process');
}

function get_rebranding_contact_form(){
    get_template_part('/main-sections-templates/rebranding-contact-form');
}

function get_rebranding_faq(){
    get_template_part('/main-sections-templates/rebranding-faq');
}

function get_rebranding_services_hero(){
    get_template_part('/small-templates/rebranding-services-hero');
}
function get_rebranding_service_bundle(){
    get_template_part('/small-templates/rebranding-service-bundle');
}
function get_rebranding_scroller(){
    get_template_part('/main-sections-templates/rebranding-scroller-faq');
}

function get_rebranding_galaxy_new_ab_test(){
    get_template_part('/main-sections-templates/rebranding-galaxy-new-ab-test-web');
}
function get_rebranding_galaxy_new_wordpress_development(){
    get_template_part('/main-sections-templates/rebranding-galaxy-new-wordpress-development');
}
function get_rebranding_galaxy_new_shopify_development(){
    get_template_part('/main-sections-templates/rebranding-galaxy-new-shopify-development');
}
function get_rebranding_galaxy_new_mockup_design(){
    get_template_part('/main-sections-templates/rebranding-galaxy-new-mockup-design');
}
function get_rebranding_galaxy_new_quality_assurance(){
    get_template_part('/main-sections-templates/rebranding-galaxy-new-quality-assurance');
}

function get_rebranding_galaxy_dedicated_dev(){
    get_template_part('/main-sections-templates/rebranding-galaxy-dedicated-dev');
}

// function custom_filter_assets_on_template() {
//     if ( is_page_template( 'bm-website-rebranding.php' ) ) {
//         // Ensure Contact Form 7 assets are enqueued correctly
//         add_action( 'wp_enqueue_scripts', function() {
//             // Dequeue all styles and scripts except Contact Form 7 and allowed assets
//             global $wp_styles, $wp_scripts;

//             // Define the handles of scripts and styles you want to keep
//             $allowed_styles = array( 'contact-form-7' );
//             $allowed_scripts = array( 'contact-form-7' );

//             // Dequeue styles
//             foreach ( $wp_styles->queue as $handle ) {
//                 if ( strpos( $handle, 'pojo-a11y' ) === false && ! in_array( $handle, $allowed_styles ) ) {
//                     wp_dequeue_style( $handle );
//                 }
//             }

//             // Dequeue scripts
//             foreach ( $wp_scripts->queue as $handle ) {
//                 if ( strpos( $handle, 'pojo-a11y' ) === false && ! in_array( $handle, $allowed_scripts ) ) {
//                     wp_dequeue_script( $handle );
//                 }
//             }
//         }, 100 );

//         // Remove unwanted elements from wp_head and wp_footer
//         add_action( 'wp_head', 'custom_remove_unwanted_wp_head_elements', 1 );
//         add_action( 'wp_footer', 'custom_remove_unwanted_wp_footer_elements', 1 );
//     }
// }

// function custom_remove_unwanted_wp_head_elements() {
//     if ( is_page_template( 'bm-website-rebranding.php' ) ) {
//         // Remove all unwanted tags from wp_head
//         remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // Remove emojis
//         remove_action( 'wp_head', 'wp_generator' ); // Remove WP version info
//         // Retain styles related to Contact Form 7
//         add_action( 'wp_enqueue_scripts', function() {
//             if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
//                 wpcf7_enqueue_styles();
//             }
//         }, 100 );
//     }
// }

// function custom_remove_unwanted_wp_footer_elements() {
//     if ( is_page_template( 'bm-website-rebranding.php' ) ) {
//         // Remove all unwanted tags from wp_footer
//         remove_action( 'wp_footer', 'wp_footer' ); // Remove default footer actions
//         // Retain scripts related to Contact Form 7
//         add_action( 'wp_enqueue_scripts', function() {
//             if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
//                 wpcf7_enqueue_scripts();
//             }
//         }, 100 );
//     }
// }

// add_action( 'wp_enqueue_scripts', 'custom_filter_assets_on_template' );





// function custom_filter_assets_on_template() {
//     if ( is_page_template( 'bm-website-rebranding.php' ) ) {
//         // Dequeue all styles and scripts except Contact Form 7 and allowed assets
//         add_action( 'wp_enqueue_scripts', function() {
//             global $wp_styles, $wp_scripts;

//             // Define the handles of scripts and styles you want to keep
//             $allowed_styles = array( 'contact-form-7' );
//             $allowed_scripts = array( 'contact-form-7' );

//             // Dequeue styles
//             foreach ( $wp_styles->queue as $handle ) {
//                 if ( strpos( $handle, 'pojo-a11y' ) === false && ! in_array( $handle, $allowed_styles ) ) {
//                     wp_dequeue_style( $handle );
//                 }
//             }

//             // Dequeue scripts
//             foreach ( $wp_scripts->queue as $handle ) {
//                 if ( strpos( $handle, 'pojo-a11y' ) === false && ! in_array( $handle, $allowed_scripts ) ) {
//                     wp_dequeue_script( $handle );
//                 }
//             }
//         }, 100 );

//         // Remove unwanted elements from wp_head and wp_footer
//         add_action( 'wp_head', 'custom_remove_unwanted_wp_head_elements', 1 );
//         add_action( 'wp_footer', 'custom_remove_unwanted_wp_footer_elements', 1 );
//     }
// }

// function custom_remove_unwanted_wp_head_elements() {
//     if ( is_page_template( 'bm-website-rebranding.php' ) ) {
//         // Remove all unwanted tags from wp_head
//         remove_action( 'wp_head', 'wp_print_styles', 8 ); // Remove styles
//         remove_action( 'wp_head', 'wp_print_scripts', 8 ); // Remove scripts
//         remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // Remove emojis
//         remove_action( 'wp_head', 'wp_generator' ); // Remove WP version info
//     }
// }

// function custom_remove_unwanted_wp_footer_elements() {
//     if ( is_page_template( 'bm-website-rebranding.php' ) ) {
//         // Remove all unwanted tags from wp_footer
//         remove_action( 'wp_footer', 'wp_print_footer_scripts', 5 ); // Remove footer scripts
//         remove_action( 'wp_footer', 'wp_footer' ); // Remove default footer actions
//     }
// }

// add_action( 'wp_enqueue_scripts', 'custom_filter_assets_on_template' );



// function custom_remove_elementor_assets() {
//     if (is_page_template('bm-website-rebranding.php')) {
//         global $wp_styles, $wp_scripts;

//         // Loop through and dequeue styles
//         foreach ($wp_styles->registered as $handle => $style) {
//             if (strpos($handle, 'elementor') !== false) {
//                 wp_dequeue_style($handle);
//                 wp_deregister_style($handle);
//             }
//         }

//         // Loop through and dequeue scripts
//         foreach ($wp_scripts->registered as $handle => $script) {
//             if (strpos($handle, 'elementor') !== false) {
//                 wp_dequeue_script($handle);
//                 wp_deregister_script($handle);
//             }
//         }
//     }
// }
// add_action('wp_enqueue_scripts', 'custom_remove_elementor_assets', 100);



function custom_remove_elementor_assets() {
    if (is_page_template('bm-website-rebranding.php')) {
        global $wp_styles, $wp_scripts;

        // Loop through and dequeue styles that have 'elementor' in their source URL
        foreach ($wp_styles->registered as $handle => $style) {
            // Check if the source URL contains 'elementor'
            if (strpos($style->src, 'elementor') !== false && $handle !== 'swiper-css') {
                wp_dequeue_style($handle);
                wp_deregister_style($handle);
            }
        }

        // Loop through and dequeue scripts that have 'elementor' in their source URL
        foreach ($wp_scripts->registered as $handle => $script) {
            // Check if the source URL contains 'elementor'
            if (strpos($script->src, 'elementor') !== false) {
                wp_dequeue_script($handle);
                wp_deregister_script($handle);
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'custom_remove_elementor_assets', 100);


function enable_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'enable_svg_upload');


function get_rebranding_nav_shortcode() {
    ob_start(); // Start output buffering
    get_rebranding_nav(); // Call the existing function
    return ob_get_clean(); // Return buffered content as a string
}
add_shortcode('rebranding_nav', 'get_rebranding_nav_shortcode');





add_action('wpcf7_mail_sent', 'send_cf7_data_to_acumbamail');

function send_cf7_data_to_acumbamail($contact_form) {
    $submission = WPCF7_Submission::get_instance();
    if ($submission) {
        $form_data = $submission->get_posted_data();
      $email = isset($form_data['business-email-address']) ? $form_data['business-email-address'] : '';
      $name = isset($form_data['full-name']) ? $form_data['full-name'] : '';
        
        // Replace with your Acumbamail API details
        $api_token = '27e4045fda80451fb90c25364f056512';
        $list_id = '1148677';
        
        $data = [
            'merge_fields' => ['EMAIL' => $email, 'NAME' => $name],
            'list_id' => $list_id
        ];
        
        $args = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $api_token,
            ],
            'body' => json_encode($data),
        ];
        
        // Send data to Acumbamail API
        $response = wp_remote_post('https://acumbamail.com/api/1/subscriberAdd/', $args);
        
        // Optional: Log errors
        if (is_wp_error($response)) {
            error_log('Acumbamail API Error: ' . $response->get_error_message());
        }
    }
}






add_action('wpcf7_mail_sent', 'smart_acumbamail_integration');

function smart_acumbamail_integration($contact_form) {
    $submission = WPCF7_Submission::get_instance();
    if (!$submission) return;

    // Get all submitted data
    $posted_data = $submission->get_posted_data();
    
    $email = '';
    foreach ($posted_data as $key => $value) {
        if (is_email($value)) {  // WordPress email validation
            $email = sanitize_email($value);
            break;
        }
        
        // Check for field names containing 'email' (case insensitive)
        if (strpos(strtolower($key), 'email') !== false && is_email($value)) {
            $email = sanitize_email($value);
            break;
        }
    }

    if (empty($email)) {
        error_log('Acumbamail: No valid email field detected in form submission');
        return;
    }

    // API configuration
    $api_token = '27e4045fda80451fb90c25364f056512';
    $list_id = '1148677';

    $args = [
        'body' => [
            'auth_token' => $api_token,
            'list_id' => $list_id,
            'merge_fields[email]' => $email,
            'response_type' => 'json'
        ],
        'timeout' => 15
    ];

    $response = wp_remote_post('https://acumbamail.com/api/1/addSubscriber/', $args);

    // Enhanced error logging
    if (is_wp_error($response)) {
        error_log('Acumbamail API Error: ' . $response->get_error_message() . ' | Submitted data: ' . json_encode($posted_data));
    } else {
        $code = wp_remote_retrieve_response_code($response);
        $body = wp_remote_retrieve_body($response);
        error_log("Acumbamail Response ($code): " . $body . " | Form ID: " . $contact_form->id());
    }
}


// ACF block registration code

/**
 * ACF Blocks Auto-Registration and Management
 * Add this to your theme's functions.php file
 */

// Check if ACF is active
if (function_exists('acf_register_block_type')) {
    
    /**
     * Smart ACF Block Registration with Duplicate Prevention
     */
    function smart_acf_block_registration() {
        $blocks_dir = get_stylesheet_directory() . '/template-parts/blocks';
        
        if (!is_dir($blocks_dir)) {
            return;
        }
        
        $block_dirs = glob($blocks_dir . '/*', GLOB_ONLYDIR);
        
        foreach ($block_dirs as $block_dir) {
            $block_name = basename($block_dir);
            $config_file = $block_dir . '/block-config.php';
            
            if (file_exists($config_file)) {
                // Check if block is already registered
                $existing_blocks = acf_get_block_types();
                $block_key = 'acf/' . str_replace('-', '_', $block_name);
                
                if (!isset($existing_blocks[$block_key])) {
                    require_once $config_file;
                }
            }
        }
    }
    add_action('acf/init', 'smart_acf_block_registration');
    
    /**
     * Smart ACF Field Import with Duplicate Prevention
     */
    function smart_acf_field_import() {
        if (!function_exists('acf_get_field_groups')) {
            return;
        }
        
        $blocks_dir = get_stylesheet_directory() . '/template-parts/blocks';
        
        if (!is_dir($blocks_dir)) {
            return;
        }
        
        $block_dirs = glob($blocks_dir . '/*', GLOB_ONLYDIR);
        
        foreach ($block_dirs as $block_dir) {
            $json_file = $block_dir . '/block-acf.json';
            
            if (file_exists($json_file)) {
                $json_content = file_get_contents($json_file);
                $field_groups = json_decode($json_content, true);
                
                if (is_array($field_groups)) {
                    // Handle single field group
                    if (isset($field_groups['key'])) {
                        $field_groups = array($field_groups);
                    }
                    
                    foreach ($field_groups as $field_group) {
                        if (isset($field_group['key'])) {
                            // Check if field group already exists
                            $existing_groups = acf_get_field_groups();
                            $exists = false;
                            
                            foreach ($existing_groups as $existing) {
                                if (isset($existing['key']) && $existing['key'] === $field_group['key']) {
                                    $exists = true;
                                    break;
                                }
                            }
                            
                            // Only import if it doesn't exist
                            if (!$exists) {
                                acf_import_field_group($field_group);
                            }
                        }
                    }
                }
            }
        }
    }
    add_action('acf/init', 'smart_acf_field_import', 5);
    
    /**
     * Load block-specific styles only for blocks that exist on the current page
     */
    function conditional_block_styles() {
        // Only run on frontend pages with content
        if (is_admin() || !is_singular()) {
            return;
        }

        global $post;
        if (!$post || !$post->post_content) {
            return;
        }

        $blocks_directory_path = get_stylesheet_directory() . '/template-parts/blocks';
        if (!is_dir($blocks_directory_path)) {
            return;
        }

        // Parse blocks from post content
        $blocks = parse_blocks($post->post_content);
        $used_block_names = array();
        
        // Recursively find all block names used on the page
        if (!function_exists('theme_extract_block_names')) {
    function theme_extract_block_names($blocks, &$used_names) {
        foreach ($blocks as $block) {
            if (!empty($block['blockName'])) {
                $used_names[] = $block['blockName'];
            }

            if (!empty($block['innerBlocks'])) {
                theme_extract_block_names($block['innerBlocks'], $used_names);
            }
        }
    }
}
        
       theme_extract_block_names($blocks, $used_block_names);
        
        // Remove duplicates
        $used_block_names = array_unique($used_block_names);
        
        // Get available block directories
        $block_directories = glob($blocks_directory_path . '/*', GLOB_ONLYDIR);
        if (!is_array($block_directories)) {
            return;
        }

        foreach ($block_directories as $block_directory) {
            $block_basename = basename($block_directory);
            $block_css_path = $block_directory . '/block.css';

            if (!file_exists($block_css_path)) {
                continue;
            }

            // Check if this block is used on the current page
            $acf_block_name = 'acf/' . $block_basename;
            if (!in_array($acf_block_name, $used_block_names)) {
                continue; // Skip blocks not used on this page
            }

            // Derive the ACF block handle: 'block-' . slug
            $block_slug = sanitize_title($block_basename);
            $style_handle = 'block-' . $block_slug;
            $style_src = get_stylesheet_directory_uri() . '/template-parts/blocks/' . $block_basename . '/block.css';
            $version = filemtime($block_css_path);

            // Register and enqueue to ensure it prints in the head.
            if (!wp_style_is($style_handle, 'registered')) {
                wp_register_style($style_handle, $style_src, array(), $version, 'all');
            }
            if (!wp_style_is($style_handle, 'enqueued')) {
                wp_enqueue_style($style_handle);
            }
        }
    }
    add_action('wp_enqueue_scripts', 'conditional_block_styles', 1);
    
    /**
     * ACF JSON Sync - Automatically load ACF field groups from JSON files
     */
    function acf_json_load_point($paths) {
        // Add our custom blocks directory to ACF JSON load paths
        $paths[] = get_stylesheet_directory() . '/template-parts/blocks';
        return $paths;
    }
    add_filter('acf/settings/load_json', 'acf_json_load_point');
    
    /**
     * ACF JSON Save Point - Save ACF field groups to JSON files
     */
    function acf_json_save_point($path) {
        // Save ACF JSON files to our custom blocks directory
        return get_stylesheet_directory() . '/template-parts/blocks';
    }
    add_filter('acf/settings/save_json', 'acf_json_save_point');
    
    /**
     * Add custom block category
     */
    function add_block_category($categories) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'custom-blocks',
                    'title' => __('Custom Blocks', 'your-theme'),
                    'icon' => 'admin-site',
                ),
            )
        );
    }
    add_filter('block_categories_all', 'add_block_category', 10, 1);
    
    /**
     * Clean Up Duplicate ACF Fields and Blocks (Optional - Uncomment when needed)
     */
    function cleanup_duplicate_acf_items() {
        if (!function_exists('acf_get_field_groups')) {
            return;
        }
        
        // Clean up duplicate field groups
        $field_groups = acf_get_field_groups();
        $seen_keys = array();
        $duplicates_to_delete = array();
        
        foreach ($field_groups as $field_group) {
            if (isset($field_group['key']) && isset($field_group['ID'])) {
                $key = $field_group['key'];
                if (in_array($key, $seen_keys)) {
                    $duplicates_to_delete[] = $field_group['ID'];
                } else {
                    $seen_keys[] = $key;
                }
            }
        }
        
        // Delete duplicates
        foreach ($duplicates_to_delete as $duplicate_id) {
            if (function_exists('acf_delete_field_group')) {
                acf_delete_field_group($duplicate_id);
            }
        }
        
        // Clean up duplicate blocks
        $existing_blocks = acf_get_block_types();
        $seen_block_names = array();
        
        foreach ($existing_blocks as $block_key => $block) {
            if (in_array($block['name'], $seen_block_names)) {
                // Unregister duplicate block
                acf_unregister_block_type($block_key);
            } else {
                $seen_block_names[] = $block['name'];
            }
        }
        
        if (!empty($duplicates_to_delete)) {
            error_log('Cleaned up ' . count($duplicates_to_delete) . ' duplicate ACF items');
        }
    }
    
    // UNCOMMENT THE LINE BELOW ONLY WHEN YOU NEED TO CLEAN UP DUPLICATES
    // add_action('init', 'cleanup_duplicate_acf_items');
    
} else {
    // ACF not active - show admin notice
    function acf_notice() {
        echo '<div class="notice notice-error"><p>ACF Blocks require Advanced Custom Fields PRO plugin to be active.</p></div>';
    }
    add_action('admin_notices', 'acf_notice');
}
// require_once get_template_directory() . './wordpress/functions-blocks.php';


// Debug function to check if ACF is active
add_action('admin_notices', 'check_acf_status');
function check_acf_status() {
    if (!function_exists('acf_add_local_field_group')) {
        echo '<div class="notice notice-error"><p><strong>ACF Plugin Required:</strong> Advanced Custom Fields plugin must be installed and activated for the blocks to work properly.</p></div>';
    }
}

// Debug function to list registered field groups
add_action('admin_footer', 'debug_acf_field_groups');
function debug_acf_field_groups() {
    if (function_exists('acf_get_field_groups') && current_user_can('manage_options')) {
        $field_groups = acf_get_field_groups();
        echo '<script>console.log("ACF Field Groups:", ' . json_encode($field_groups) . ');</script>';
    }
}

/* =========================================================
   SWIPER GLOBAL REGISTRATION
========================================================= */
function theme_register_swiper() {

    wp_register_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        [],
        null
    );

    wp_register_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'theme_register_swiper');
add_action('enqueue_block_editor_assets', 'theme_register_swiper');

//add a global option in the side panel
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Global Settings',
        'menu_title'    => 'Global Settings',
        'menu_slug'     => 'global-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
		'position' => 2,
		'icon_url' => 'dashicons-admin-generic',
    ));
}


//Global header and footer js and css
function theme_global_styles() {
   wp_enqueue_style(
		'header-style',
		get_stylesheet_directory_uri() . '/assets/css/header.css',
		array('hello-elementor', 'hello-elementor-theme-style'),
		filemtime(get_stylesheet_directory() . '/assets/css/header.css')
	);

	wp_enqueue_style(
		'common',
		get_stylesheet_directory_uri() . '/assets/css/common.css',
		array('hello-elementor', 'hello-elementor-theme-style'),
		filemtime(get_stylesheet_directory() . '/assets/css/common.css')
	);

	wp_enqueue_style(
		'design-system',
		get_stylesheet_directory_uri() . '/assets/css/design-system.css',
		array('hello-elementor', 'hello-elementor-theme-style'),
		filemtime(get_stylesheet_directory() . '/assets/css/design-system.css')
	);

	wp_enqueue_style(
		'footer-style',
		get_stylesheet_directory_uri() . '/assets/css/footer.css',
		array('hello-elementor', 'hello-elementor-theme-style'),
		filemtime(get_stylesheet_directory() . '/assets/css/footer.css')
	);
	
	// HEADER JS
    wp_enqueue_script(
        'theme-header-script',
        get_stylesheet_directory_uri() . '/assets/js/header.js',
        array('jquery'), // remove if not using jQuery
        true // load in footer
    );
}
add_action('wp_enqueue_scripts', 'theme_global_styles');

/**
 * Helper: Generate ACF Block ID and Classes
 *
 * @param array  $block      The block settings and attributes.
 * @param string $base_class Your base block class (required).
 *
 * @return array {
 *     @type string $id
 *     @type string $class
 * }
 */
function theme_get_block_wrapper_attributes($block, $base_class = '') {

    // Generate ID
    $block_id = !empty($block['anchor'])
        ? $block['anchor']
        : $base_class . '-' . $block['id'];

    // Base class is required
    $classes = $base_class;

    // Add custom class from editor
    if (!empty($block['className'])) {
        $classes .= ' ' . $block['className'];
    }

    // Add alignment class
    if (!empty($block['align'])) {
        $classes .= ' align' . $block['align'];
    }

    return [
        'id'    => esc_attr($block_id),
        'class' => esc_attr($classes),
    ];
}
add_filter('script_loader_tag', function ($tag, $handle) {

    if (str_ends_with($handle, '-section-js')) {
        return str_replace(' src', ' defer src', $tag);
    }

    return $tag;

}, 10, 2);

function allow_woff2_uploads($mimes) {
    $mimes['woff']  = 'font/woff';
    $mimes['woff2'] = 'font/woff2';
    return $mimes;
}
add_filter('upload_mimes', 'allow_woff2_uploads');