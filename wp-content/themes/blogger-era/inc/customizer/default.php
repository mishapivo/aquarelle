<?php
/**
 * Default theme options.
 *
 * @package Blogger_Era
 */

if ( ! function_exists( 'blogger_era_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function blogger_era_get_default_theme_options() {

	$defaults = array();

	/******************** Header Section *********************/
	$defaults['site_identity'] 						= 'title-text';
	$defaults['site_branding_height']				= 30;
	$defaults['enable_top_header'] 					= true;
	$defaults['top_left_header'] 					= 'top-menu';
	$defaults['top_right_header'] 					= 'social-icon';
	$defaults['header_address'] 					= '';
	$defaults['header_number'] 						= '';
	$defaults['header_email'] 						= '';	

	/*************** Menu Section *******************/
	$defaults['enable_offcanvas_header'] 			= true;
	$defaults['enable_search_header'] 				= true;

	/****************** Header Image *****************/
	$defaults['enable_breadcrumb'] 					= true;
	$defaults['blogger_header_image'] 				= 'header-image';
	$defaults['header_image_padding'] 				= 50;
	$defaults['header_image_opacity'] 				= 0.7;

	/***************** Blog Page Section ****************/
	$defaults['blog_layout'] 						= 'default';
	$defaults['blog_content'] 						= 'excerpt';
	$defaults['excerpt_length'] 					= 30;
	$defaults['enable_archive_title'] 				= true;
	$defaults['enable_archive_drop_cap'] 			= true;
	$defaults['enable_blog_button'] 				= true;
	$defaults['blog_button'] 						= esc_html__( 'Read More', 'blogger-era');
	$defaults['blog_pagination'] 					= 'default';

	/****************** Slider Section ********************/
	$defaults['enable_slider'] 						= false;
	$defaults['slider_text_align'] 					= 100;
	$defaults['slider_type'] 						= 'post-slider';
	$defaults['banner_image'] 						= 0;
	$defaults['slider_category'] 					= 0;
	$defaults['slider_number'] 						= 2;	

	/******************** Popular Section *******************/
	$defaults['enable_popular'] 					= false;
	$defaults['popular_category'] 					= 0;

	/************************* General Section *******************/
	$defaults['container_width']					= 1170;
	$defaults['content_area_width']					= 67;
	$defaults['enable_sticky_sidebar'] 				= true;
	$defaults['enable_category'] 					= true;
	$defaults['enable_author'] 						= true;
	$defaults['enable_date'] 						= true;	
	$defaults['enable_posticon'] 					= true;
	$defaults['enable_posticon'] 					= true;	
	$defaults['sidebar_layout'] 					= 'sidebar-right';
	$defaults['enable_header_builder'] 				= false;	


	/************************* Single Section *******************/
	$defaults['enable_drop_cap'] 					= true;
	$defaults['enable_single_category'] 			= true;
	$defaults['enable_single_author'] 				= true;
	$defaults['enable_single_date'] 				= true;	
	$defaults['enable_single_posticon'] 			= true;	
	$defaults['enable_author_info'] 				= true;
		

	/********************* Footer Setting *********************/
	$defaults['enable_instagram'] 					= true;
	$defaults['enable_footer_menu'] 				= true;
	$defaults['enable_footer_social'] 				= true;	
	$defaults['footer_logo'] 						= '';

	// Pass through filter.
	$defaults = apply_filters( 'blogger_era_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'blogger_era_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
function blogger_era_get_option( $key ) {

	$default_options = blogger_era_get_default_theme_options();

	if ( empty( $key ) ) {
		return;
	}

	$theme_options = (array)get_theme_mod( 'theme_options' );
	$theme_options = wp_parse_args( $theme_options, $default_options );

	$value = null;

	if ( isset( $theme_options[ $key ] ) ) {
		$value = $theme_options[ $key ];
	}

	return $value;
}

endif;