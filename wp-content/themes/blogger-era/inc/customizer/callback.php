<?php
/**
 * Callback functions for active_callback.
 *
 * @package Blogger_Era
 */

if ( ! function_exists( 'blogger_era_active_top_header' ) ) :

	/**
	 * Check if top header is active
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogger_era_active_top_header( $control ) {

        if( true == $control->manager->get_setting('theme_options[enable_top_header]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }

	}

endif;

if ( ! function_exists( 'blogger_era_active_slider' ) ) :

	/**
	 * Check if slider is active in Home Page
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogger_era_active_slider( $control ) {

        if( true == $control->manager->get_setting('theme_options[enable_slider]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }

	}

endif;

if ( ! function_exists( 'blogger_era_active_slider_post' ) ) :

	/**
	 * Check if slider is active in Home Page
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogger_era_active_slider_post( $control ) {

        if( 'post-slider' == $control->manager->get_setting('theme_options[slider_type]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }

	}

endif;

if ( ! function_exists( 'blogger_era_active_slider_banner' ) ) :

	/**
	 * Check if slider is active in Home Page
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogger_era_active_slider_banner( $control ) {

        if( 'image' == $control->manager->get_setting('theme_options[slider_type]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }

	}

endif;

if ( ! function_exists( 'blogger_era_active_slider_shortcode' ) ) :

	/**
	 * Check if slider is active in Home Page
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogger_era_active_slider_shortcode( $control ) {

        if( 'rev-shortcode' == $control->manager->get_setting('theme_options[slider_type]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }

	}

endif;

if ( ! function_exists( 'blogger_era_active_popular' ) ) :

	/**
	 * Check if slider is active in Home Page
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogger_era_active_popular( $control ) {

        if( true == $control->manager->get_setting('theme_options[enable_popular]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }

	}

endif;

if ( ! function_exists( 'blogger_era_active_button' ) ) :

	/**
	 * Check if slider is active in Home Page
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogger_era_active_button( $control ) {

        if( true == $control->manager->get_setting('theme_options[enable_blog_button]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }

	}

endif;