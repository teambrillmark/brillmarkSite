<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- Varify.io® code for Brillmark-->
	<script>
	  window.varify = window.varify || {};
	  window.varify.iid = 1401;
	</script>
	<script src="https://app.varify.io/varify.js"></script>

	<?php $viewport_content = apply_filters( 'hello_elementor_viewport_content', 'width=device-width, initial-scale=1' ); ?>
	<meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<script src="//d2wy8f7a9ursnm.cloudfront.net/v7/bugsnag.min.js"></script>
	<script type="module">
	  import BugsnagPerformance from '//d2wy8f7a9ursnm.cloudfront.net/v1/bugsnag-performance.min.js'
	  Bugsnag.start({ apiKey: 'bf06f4791a8af9c736a438692f3167d8' })
	  BugsnagPerformance.start({ apiKey: 'bf06f4791a8af9c736a438692f3167d8' })
	</script>
	
	<?php wp_head(); ?>
<meta name="ahrefs-site-verification" content="727b00740fbf8a04e36928c0c1d8b3c5dc0d06c102a90b882b12fd3e2734fdda">	
</head>
<body <?php body_class(); ?>>

<?php
hello_elementor_body_open();
	
	get_template_part('/global-templates/globalHeader');

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
	get_template_part( 'template-parts/header' );
}
