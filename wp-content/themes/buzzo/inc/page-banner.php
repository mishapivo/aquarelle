<?php
/**
 * Page banner module
 *
 * @package Buzzo
 */

class Buzzo_Page_Banner {

	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_settings' ) );

		add_filter( 'buzzo_custom_css', array( $this, 'customize_css' ) );
	}


	public function register_settings( $wp_customize ) {
		$wp_customize->add_section( 'buzzo_page_banner', array(
			'title'    => __( 'Page banner', 'buzzo' ),
			'priority' => 85,
		) );

		// Show page banner.
		$wp_customize->add_setting( 'buzzo_page_banner_on', array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( 'buzzo_page_banner_on', array(
			'label'   => __( 'Show page banner', 'buzzo' ),
			'section' => 'buzzo_page_banner',
			'type'    => 'checkbox',
		) );

		// Background image.
		$wp_customize->add_setting( 'buzzo_page_banner_bg_image', array(
			'default'              => get_template_directory_uri() . '/images/page-banner.jpg',
			'transport'            => 'refresh', // or postMessage
			'sanitize_callback'    => 'esc_url',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'buzzo_page_banner_bg_image', array(
			'label'     => __( 'Background image', 'buzzo' ),
			'section'   => 'buzzo_page_banner',
		) ) );

		// Background color.
		$wp_customize->add_setting( 'buzzo_page_banner_bg_color', array(
			'default'              => '#000000',
			'transport'            => 'refresh', // or postMessage
			'sanitize_callback'    => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'buzzo_page_banner_bg_color', array(
			'label'     => __( 'Background color', 'buzzo' ),
			'section'   => 'buzzo_page_banner',
		) ) );
	}


	public function customize_css( $css ) {
		/*
		 * Page banner css.
		 */
		$page_banner_bg_image = get_theme_mod( 'buzzo_page_banner_bg_image', get_template_directory_uri() . '/images/page-banner.jpg' );
		if ( $page_banner_bg_image ) {
			$css .= sprintf( ".page-banner {background-image: url(%s);}\n", esc_url( $page_banner_bg_image ) );
		}

		$page_banner_bg_color = get_theme_mod( 'buzzo_page_banner_bg_color', '#000000' );
		if ( $page_banner_bg_color ) {
			$css .= sprintf( ".page-banner {background-color: %s;}\n", esc_attr( $page_banner_bg_color ) );
		}

		return $css;
	}


	public static function buzzo_is_page_banner_on() {
		return apply_filters( 'buzzo_is_page_banner_on', get_theme_mod( 'buzzo_page_banner_on', 1 ) );
	}
}
new Buzzo_Page_Banner();


/**
 * Display page banner.
 */
function buzzo_page_banner() {
	if ( is_single() || is_page() || is_404() ) {
		return;
	}

	if ( ! Buzzo_Page_Banner::buzzo_is_page_banner_on() ) {
		return;
	}
	?>
	<section class="page-banner overlay-section no-overlay-bg" role="banner">
		<?php
		$page_banner_bg_image = get_theme_mod( 'buzzo_page_banner_bg_image', get_template_directory_uri() . '/images/page-banner.jpg' );
		if ( $page_banner_bg_image ) :
			?>
			<div class="image"></div>
			<?php
		endif;
		?>

		<div class="overlay">
			<div class="overlay-content">
				<div class="container">
					<?php buzzo_page_title(); ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
add_action( 'buzzo_after_header', 'buzzo_page_banner' );
