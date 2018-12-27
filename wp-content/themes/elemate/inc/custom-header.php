<?php
/**
 * Custom header implementation
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package EleMate
 * @since 	1.0.0
 * @version	1.0.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses elemate_header_style()
 */
function elemate_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'elemate_custom_header_args', array(
		'default-image'      => get_template_directory_uri() . '/assets/images/header.jpg',
		'default-text-color' => '009688',
		'width'              => 2000,
		'height'             => 800,
		'flex-height'        => true,
		'wp-head-callback'   => 'elemate_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'elemate_custom_header_setup' );

if ( ! function_exists( 'elemate_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see elemate_custom_header_setup().
 */
function elemate_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: add_theme_support( 'custom-header' ) is default, hide text (returns 'blank') or any hex value.
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
	?>
		.brand-logo,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.brand-logo a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // End of elemate_header_style.
