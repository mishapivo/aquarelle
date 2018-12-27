<?php
/**
 * Implement an optional custom header for Alacrity Lite
 *
 * See https://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage Alacrity Lite
 * @since Alacrity Lite 0.1.0
 */

/**
 * Set up the WordPress core custom header arguments and settings.
 *
 * @uses add_theme_support() to register support for 3.4 and up.
 * @uses alacrity_lite_header_style() to style front end.
 * @uses alacrity_lite_admin_header_style() to style wp-admin form.
 * @uses alacrity_lite_admin_header_image() to add custom markup to wp-admin form.
 *
 * @since Alacrity Lite 0.1.0
 */
function alacrity_lite_custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => '000000',
	
		// Set height and width, with a maximum value for the width.
		'height'                 => 300,
		'width'                  => 800,
		'max-width'              => 2000,

		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,

		// Random image rotation off by default.
		'random-default'         => false,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'alacrity_lite_header_style',
	);

	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'alacrity_lite_custom_header_setup' );

/**
 * Style the header text displayed on the blog.
 *
 * get_header_textcolor() options: 515151 is default, hide text (returns 'blank'), or any hex value.
 *
 * @since Alacrity Lite 0.1.0
 */
function alacrity_lite_header_style() { ?>
	<style type="text/css">
	<?php
	// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title, .site-description{
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	<?php endif; ?>
	</style>
	<?php
}