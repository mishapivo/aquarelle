<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Buzzo
 */

if ( ! function_exists( 'buzzo_header_image' ) ) {
	/**
	 * Display header image.
	 */
	function buzzo_header_image() {
		if ( is_singular() ) {
			return;
		}

		get_template_part( 'template-parts/header/header-image' );
	}
}
add_action( 'buzzo_after_header', 'buzzo_header_image' );

if ( ! function_exists( 'buzzo_header_image_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see buzzo_custom_header_setup().
	 */
	function buzzo_header_image_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: ffffff.
		 */
		if ( 'ffffff' === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			.header-image__title {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		</style>
		<?php
	}
endif;
