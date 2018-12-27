<?php
/**
 * CSS related hooks.
 *
 * This file contains hook functions which are related to CSS.
 *
 * @package Galway Lite
 */

if (!function_exists('galway_lite_trigger_custom_css_action')):

/**
 * Do action theme custom CSS.
 *
 * @since 1.0.0
 */
function galway_lite_trigger_custom_css_action() {
	global $galway_lite_google_fonts;
	$galway_lite_enable_banner_overlay = galway_lite_get_option('enable_overlay_option');
	?>
	<style type="text/css">
	<?php

	if ($galway_lite_enable_banner_overlay == 1) {
		?>
		body .inner-header-overlay {
		                filter: alpha(opacity=72);
		                opacity: .72;
		            }

		            body .owl-item.active .single-slide:after {
		                filter: alpha(opacity=100);
		                opacity: 1;
		            }

		<?php
	}

	?>
	</style>

	<?php }

endif;