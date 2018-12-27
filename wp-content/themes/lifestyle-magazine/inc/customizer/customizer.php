<?php
/**
 * Lifestyle Magazine Theme Customizer
 *
 * @package Lifestyle Magazine
 */

$panels   = array( 'general-options', 'theme-options', 'header-options', 'advertisement-options' );

add_action( 'customize_register', 'lifestyle_magazine_change_homepage_settings_options' );
function lifestyle_magazine_change_homepage_settings_options( $wp_customize )  {
    
	$wp_customize->get_section( 'title_tagline' )->priority = 12;
	$wp_customize->get_section( 'static_front_page' )->priority = 13;

	$wp_customize->remove_control( 'header_textcolor' );

    require get_template_directory() . '/inc/google-fonts.php';    
}

$general_sections = array( 'colors', 'fonts', 'pagination', 'footer', 'social-media', 'background' );
$header_sections = array( 'header-image', 'theme-header', 'headline', 'site-identity' );
$theme_sections = array( 'featured', 'slider', 'pages', 'blog-list', 'category-display', 'drag-and-drop' );


if( ! empty( $panels ) ) {
	foreach( $panels as $panel ){
	    require get_template_directory() . '/inc/customizer/panels/' . $panel . '.php';
	}
}


if( ! empty( $general_sections ) ) {
	foreach( $general_sections as $section ) {
	    require get_template_directory() . '/inc/customizer/sections/general-options/' . $section . '.php';
	}
}

if( ! empty( $header_sections ) ) {
    foreach( $header_sections as $section ) {
        require get_template_directory() . '/inc/customizer/sections/header-options/' . $section . '.php';
    }
}

if( ! empty( $theme_sections ) ) {
    foreach( $theme_sections as $section ) {
        require get_template_directory() . '/inc/customizer/sections/theme-options/' . $section . '.php';
    }
}


/**
 * Enqueue the customizer stylesheet.
 */
function lifestyle_magazine_customizer_stylesheet() {

	wp_register_style( 'lifestyle-magazine-customizer-css', get_template_directory_uri() . '/css/customizer.css', NULL, '1.1.0', 'all' );
	wp_enqueue_style( 'lifestyle-magazine-customizer-css' );

}
add_action( 'customize_controls_print_styles', 'lifestyle_magazine_customizer_stylesheet' );


/**
 * Enqueue the customizer javascript.
 */
function lifestyle_magazine_customize_preview_js() {
 	wp_enqueue_script( 'lifestyle-magazine-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'lifestyle_magazine_customize_preview_js' );


/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';