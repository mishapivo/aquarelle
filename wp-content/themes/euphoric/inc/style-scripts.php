<?php
 /**
 * Enqueue scripts and styles.
 *
 * @package euphoric
 */

function euphoric_scripts() {
	$select_main_banner_category = get_theme_mod('select_main_banner_category','');
	$slider_options = get_theme_mod('slider-options','main-banner');
	$disable_main_banner = get_theme_mod('disable_main_banner',0);
	wp_enqueue_style( 'euphoric-style', get_stylesheet_uri() );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/fontawesome/css/font-awesome.min.css' );

	wp_enqueue_style( 'euphoric-google-fonts', euphoric_fonts_url(), array(), null );

	wp_enqueue_script('euphoric-global', get_template_directory_uri().'/assets/js/global.js', array('jquery'), true, false);

	wp_enqueue_script( 'euphoric-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array(), false, true );

	wp_enqueue_script( 'euphoric-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), false, true );

	wp_enqueue_script( 'ResizeSensor', get_template_directory_uri() . '/assets/library/sticky-sidebar/ResizeSensor.js', array(), false, true );

	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/library/sticky-sidebar/theia-sticky-sidebar.js', array(), false, true );

	if($slider_options !='main-banner'){
		// Silence is Golden
	} else {
		if ($disable_main_banner ==1){
			// Silence is Golden
		} elseif ($select_main_banner_category ==''){
			// Silence is Golden
		} else {

			wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/library/slick/slick.min.js', array(), false, true );

			wp_enqueue_script( 'euphoric-slick-settings', get_template_directory_uri() . '/assets/library/slick/slick-settings.js', array(), false, true );
		}

	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'euphoric_scripts' );

if ( ! function_exists( 'euphoric_fonts_url' ) ) :
/**
 * Register Google fonts for Euphoric.
 *
 * Create your own euphoric_fonts_url() function to override in a child theme.
 *
 *
 * @return string Google fonts URL for the theme.
 */
function euphoric_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Playfair+Display, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'euphoric' ) ) {
		$fonts[] = 'Playfair Display:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'euphoric' ) ) {
		$fonts[] = 'Lato:300,400,400i,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => esc_attr( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;