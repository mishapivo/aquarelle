<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

// Active callback for featured category section
if ( ! function_exists( 'edumag_is_featured_category_section_active' ) ) :
	/**
	 * Check if featured category section is active.
	 *
	 * @since EduMag 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function edumag_is_featured_category_section_active( $control ) {
		
			return ( 'static-frontpage' == $control->manager->get_setting( 'edumag_theme_options[featured_category_enable]' )->value() );
	}
endif;

if ( ! function_exists( 'edumag_is_popular_articles_section_active' ) ) :
	/**
	 * Check if popular articles section is active.
	 *
	 * @since EduMag 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function edumag_is_popular_articles_section_active( $control ) {		
		return ( 'static-frontpage' == $control->manager->get_setting( 'edumag_theme_options[popular_articles_enable]' )->value() );
	}
endif;

if ( ! function_exists( 'edumag_is_search_section_active' ) ) :
	/**
	 * Check if popular articles section is active.
	 *
	 * @since EduMag 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function edumag_is_search_section_active( $control ) {		
		return ( 'static-frontpage' == $control->manager->get_setting( 'edumag_theme_options[search_section_enable]' )->value() );
	}
endif;

/*
 *
 * Active callback for latest news section
 *
 */

if ( ! function_exists( 'edumag_is_latest_news_section_active' ) ) :
	/**
	 * Check if latest news section is active.
	 *
	 * @since EduMag 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function edumag_is_latest_news_section_active( $control ) {		
		return ( 'static-frontpage' == $control->manager->get_setting( 'edumag_theme_options[latest_news_enable]' )->value() );
	}
endif;

if ( ! function_exists( 'edumag_is_latest_news_category_active' ) ) :
	/**
	 * Check if category content of latest news section is active.
	 *
	 * @since EduMag 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function edumag_is_latest_news_category_active( $control ) {
		return ( edumag_is_latest_news_section_active( $control ) && ( 'category' == $control->manager->get_setting( 'edumag_theme_options[latest_news_content_type]' )->value() ) );
	}
endif;

/*
 *
 * Active callback for blogs section
 *
 */

if ( ! function_exists( 'edumag_is_blogs_section_active' ) ) :
	/**
	 * Check if blogs section is active.
	 *
	 * @since EduMag 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function edumag_is_blogs_section_active( $control ) {		
		return ( 'static-frontpage' == $control->manager->get_setting( 'edumag_theme_options[blogs_section_enable]' )->value() );
	}
endif;
