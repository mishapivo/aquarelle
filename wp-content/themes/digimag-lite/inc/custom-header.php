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
 * @package Digimag Lite
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses digimag_lite_header_style()
 */
function digimag_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'digimag_lite_custom_header_args', array(
		'default-image'      => get_template_directory_uri() . '/images/header.png',
		'default-text-color' => '',
		'width'              => 1920,
		'height'             => 500,
		'flex-height'        => true,
		'flex-width'         => true,
		'wp-head-callback'   => 'digimag_lite_header_style',
	) ) );
	register_default_headers( array(
		'linux-server' => array(
			'url'           => '%s/images/header.png',
			'thumbnail_url' => '%s/images/header.png',
			'description'   => esc_html__( 'Linux Server', 'digimag-lite' ),
		),
	) );
}
add_action( 'after_setup_theme', 'digimag_lite_custom_header_setup' );

if ( ! function_exists( 'digimag_lite_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see digimag_lite_custom_header_setup().
	 */
	function digimag_lite_header_style() {
		?>
		<style id="digimag-lite-header-css">
			<?php if ( has_header_image() ) : ?>
				.page-header {
					background-image: url(<?php echo esc_url( get_header_image() ); ?>);
				}
			<?php endif; ?>
			<?php if ( ! display_header_text() ) : ?>
				.site-title, .site-description {
					clip: rect(1px, 1px, 1px, 1px);
					position: absolute;
				}
			<?php elseif( get_header_textcolor() ) : ?>
				.page-header,
				.page-header h1,
				.page-header i,
				.breadcrumbs a,
				.breadcrumbs span {
					color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
				}
			<?php endif; ?>
		</style>
		<?php
	}
endif;

/**
 * Use featured image for the header image on single post.
 *
 * @param string $image Header image URL.
 *
 * @return string
 */
function digimag_lite_header_image_singular( $image ) {
	if ( ! is_singular() || ! has_post_thumbnail() ) {
		return $image;
	}

	$thumbnail = wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' );
	if ( $thumbnail ) {
		$image = $thumbnail;
	}

	return $image;
}

/**
 * Replace default header image with featured image of single post if set.
 */
function digimag_lite_filter_header_image_singular() {
	add_filter( 'theme_mod_header_image', 'digimag_lite_header_image_singular' );
}

add_action( 'template_redirect', 'digimag_lite_filter_header_image_singular' );
