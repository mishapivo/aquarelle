<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package NewsCard
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses newscard_header_style()
 */
function newscard_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'newscard_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '333333',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'flex-width'             => true,
		'wp-head-callback'       => 'newscard_header_style',
		'video'						 => true,
	) ) );
}
add_action( 'after_setup_theme', 'newscard_custom_header_setup' );

if ( ! function_exists( 'newscard_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see newscard_custom_header_setup().
	 */
	function newscard_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description,
			.navbar-toggler{
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
