<?php
/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package HelloElementor
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_template_part('/global-templates/globalFooter');

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
	get_template_part( 'template-parts/footer' );
}
?>

<?php wp_footer(); ?>
<!-- Start of HubSpot Embed Code --> <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/5374148.js"></script> <!-- End of HubSpot Embed Code -->

<script type="text/javascript">
_linkedin_partner_id = "399163";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=399163&fmt=gif" />
</noscript>	
</body>
</html>
