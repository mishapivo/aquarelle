<?php
/**
 * Christmas Hestia functions and definitions.
 *
 * @package christmas-hestia
 * @since 1.0.0
 */
define( 'CHRISTMAS_HESTIA_VERSION', '1.0.4');

if ( !function_exists( 'christmas_hestia_parent_css' ) ):
	/**
	 * Enqueue parent CSS.
	 */
	function christmas_hestia_parent_css() {
		wp_enqueue_style( 'christmas_hestia_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap' ) );
		if( is_rtl() ) {
			wp_enqueue_style( 'christmas_hestia_parent_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css', array( 'bootstrap' ) );
		}
	}
endif;

add_action( 'wp_enqueue_scripts', 'christmas_hestia_parent_css', 10 );

/**
 * Enqueue style of parent theme and styles from current child theme.
 *
 * @since 1.0.0
 */
function christmas_hestia_scripts() {
	wp_enqueue_style( 'christmas-hestia-style', get_stylesheet_uri(), array(), CHRISTMAS_HESTIA_VERSION );
	wp_enqueue_script( 'christmas-hestia-snow', get_stylesheet_directory_uri() . '/assets/js/canvas-snow.js', array( 'jquery' ), CHRISTMAS_HESTIA_VERSION, true );
	wp_enqueue_script( 'christmas-hestia-script', get_stylesheet_directory_uri() . '/assets/js/script.js', array( 'jquery', 'christmas-hestia-snow' ), CHRISTMAS_HESTIA_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'christmas_hestia_scripts',9);

/**
 * Add snow canvas in header.
 *
 * @since 1.0.0
 */
function christmas_hestia_lights() {

	if( ( is_home() && get_option( 'page_on_front' ) !== 'page' ) || is_single() || is_archive() ) {
		echo '<div id="hestia-lights">';
		for ( $i = 1; $i <= 20; $i ++ ) {
			echo '<div class="led"></div>';
		}
		echo '</div><!-- #lights -->';
	}
}
add_action( 'hestia_before_header_hook', 'christmas_hestia_lights', 0 );

/**
 * Change default accent color.
 *
 * @return string
 */
function christmas_hestia_filter_accent_color() {
	return '#d93032';
}

add_filter( 'hestia_accent_color_default', 'christmas_hestia_filter_accent_color' );


/**
 * Change default fonts.
 *
 * @since 1.0.0
 */
function christmas_hestia_customize_register( $wp_customize ) {
	$hestia_headings_font = $wp_customize->get_setting( 'hestia_headings_font' );
	if ( ! empty( $hestia_headings_font ) ) {
		$hestia_headings_font->default = 'Lobster Two';
	}
	$hestia_body_font = $wp_customize->get_setting( 'hestia_body_font' );
	if ( ! empty( $hestia_body_font ) ) {
		$hestia_body_font->default = 'Roboto Slab';
	}
}
add_action( 'customize_register', 'christmas_hestia_customize_register', 99 );

/**
 * Change default parameter for heading font.
 *
 * @since 1.0.0
 */
function christmas_hestia_default_heading_fonts(){
	return 'Lobster Two';
}

/**
 * Change default parameter for body font.
 *
 * @since 1.0.0
 */
function christmas_hestia_default_body_fonts(){
	return 'Roboto Slab';
}
add_filter( 'hestia_headings_default', 'christmas_hestia_default_heading_fonts' );
add_filter( 'hestia_body_font_default', 'christmas_hestia_default_body_fonts' );

/**
 * Change default parameter for big title background.
 *
 * @since 1.0.0
 */
function christmas_hestia_big_title_background_default() {
	return get_stylesheet_directory_uri() . '/assets/img/big_title.jpg';
}
add_filter( 'hestia_big_title_background_default', 'christmas_hestia_big_title_background_default' );

/**
 * Change features defaults.
 *
 * @since 1.0.0
 */
function christmas_hestia_features_defaults() {
	return json_encode(
		array(
			array(
				'icon_value' => 'fa-gift',
				'title'      => esc_html__( 'Gifts', 'christmas-hestia' ),
				'text'       => esc_html__( 'Keep on giving gifts to your loved ones and make sure they\'re happy!', 'christmas-hestia' ),
				'link'       => '',
				'color'      => '#e91e63',
			),
			array(
				'icon_value' => 'fa-snowflake-o',
				'title'      => esc_html__( 'Snow', 'christmas-hestia' ),
				'text'       => esc_html__( 'Make sure you enjoy the snowy days, because there are going to be some!', 'christmas-hestia' ),
				'link'       => '',
				'color'      => '#00bcd4',
			),
			array(
				'icon_value' => 'fa-tree',
				'title'      => esc_html__( 'Decorations', 'christmas-hestia' ),
				'text'       => esc_html__( 'Gather around the tree and sing carols with your loved ones on Christmas Eve', 'christmas-hestia' ),
				'link'       => '',
				'color'      => '#4caf50',
			),
		)
	);
}
add_filter( 'hestia_features_default_content', 'christmas_hestia_features_defaults' );

/**
 * Change contact background image.
 *
 * @return string
 * @since 1.0.0
 */
function christmas_hestia_contact_background() {
	return get_stylesheet_directory_uri() . '/assets/img/contact.jpg';
}
add_filter( 'hestia_contact_background_default', 'christmas_hestia_contact_background' );

/**
 * Change contact dummy content.
 *
 * @return string
 * @since 1.0.0
 */
function christmas_hestia_contact_content() {
	$html = '<div class="hestia-info info info-horizontal">
			<div class="icon icon-primary">
				<i class="fa fa-envelope"></i>
			</div>
			<div class="description">
				<h3 class="info-title">' . __( 'Write to Santa', 'christmas-hestia' ) . '</h3>
				<p>'. __( 'Arctic Circle, 96930 Arctic Circle, Finland Lapland', 'christmas-hestia') . '</p>
			</div>
		</div>
		<div class="hestia-info info info-horizontal">
			<div class="icon icon-primary">
				<i class="fa fa-heart"></i>
			</div>
			<div class="description">
				<h3 class="info-title">' . __( 'Talk to Santa', 'christmas-hestia' ) . '</h3>
				<p>' . __( 'Santa Claus', 'christmas-hestia' ) .' <br> +12 345 678 90<br> ' . __( 'Mon - Fri', 'christmas-hestia' ) . ', 8:00-22:00</p>
			</div>
		</div>';

	return $html;
}
add_filter( 'hestia_contact_content_default', 'christmas_hestia_contact_content' );

add_action( 'after_switch_theme', 'christmas_hestia_get_lite_options' );

/**
 * Import options from Hestia
 */
function christmas_hestia_get_lite_options() {
    $hestia_mods = get_option( 'theme_mods_hestia' );
    if ( ! empty( $hestia_mods ) ) {

        foreach ( $hestia_mods as $hestia_mod_k => $hestia_mod_v ) {

            set_theme_mod( $hestia_mod_k, $hestia_mod_v );
        }

    }
}