<?php
/**
 * EduMag Theme Customizer.
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

// load upgrade to pro option
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function edumag_customize_register( $wp_customize ) {
	$options = edumag_get_theme_options();

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	// Load partial refresh functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	// Load Custom controls classes
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add panel for common theme options
	$wp_customize->add_panel( 'edumag_sections_panel' , array(
	    'title'      => esc_html__( 'Homepage Sections','edumag' ),
	    'description'=> esc_html__( 'Home page section options.', 'edumag' ),
	    'priority'   => 100,
	) );

	// add customizer sections

	// featured category
	require get_template_directory() . '/inc/customizer/sections/featured-category.php';

	// popular section
	require get_template_directory() . '/inc/customizer/sections/popular-articles.php';

	// search section
	require get_template_directory() . '/inc/customizer/sections/search-section.php';

	// latest section
	require get_template_directory() . '/inc/customizer/sections/latest-news.php';

	// blogs section
	require get_template_directory() . '/inc/customizer/sections/blogs-section.php';

	// add theme options

	// Add panel for common theme options
	$wp_customize->add_panel( 'edumag_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','edumag' ),
	    'description'=> esc_html__( 'EduMag Theme Options.', 'edumag' ),
	    'priority'   => 150,
	) );

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load static homepage option
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';

	// load excerpt option
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load breadcrumb option
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// load additional menu option
	require get_template_directory() . '/inc/customizer/theme-options/menus.php';

	// load additional theme color option
	require get_template_directory() . '/inc/customizer/theme-options/theme-color.php';
	
	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';
}
add_action( 'customize_register', 'edumag_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

if( !function_exists( 'edumag_customize_preview_js') ) :
	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	function edumag_customize_preview_js() {
		wp_enqueue_script( 'edumag-customizer', get_template_directory_uri() . '/assets/js/customizer.min.js', array( 'customize-preview' ), '20151215', true );
	}
endif;
add_action( 'customize_preview_init', 'edumag_customize_preview_js' );


if ( !function_exists( 'edumag_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since EduMag 0.1
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function edumag_reset_options() {
		$options = edumag_get_theme_options();
		if ( true === $options['reset_options'] ) {

			// Reset custom theme options.
			set_theme_mod( 'edumag_theme_options', array() );

			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
			remove_theme_mod( 'header_textcolor' );
	    } else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'edumag_reset_options' );

