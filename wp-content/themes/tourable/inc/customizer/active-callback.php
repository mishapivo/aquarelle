<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

if ( ! function_exists( 'tourable_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Tourable 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function tourable_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'tourable_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'tourable_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Tourable 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function tourable_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'tourable_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'tourable_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Tourable 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function tourable_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if slider section is enabled.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tourable_theme_options[slider_section_enable]' )->value() );
}

/**
 * Check if service section is enabled.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tourable_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if trip search section is enabled.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_trip_search_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tourable_theme_options[trip_search_section_enable]' )->value() );
}

/**
 * Check if destinations section is enabled.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_destinations_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tourable_theme_options[destinations_section_enable]' )->value() );
}

/**
 * Check if destinations section content type is category.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_destinations_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tourable_theme_options[destinations_content_type]' )->value();
	return tourable_is_destinations_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if destinations section content type is destination.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_destinations_section_content_destination_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tourable_theme_options[destinations_content_type]' )->value();
	return tourable_is_destinations_section_enable( $control ) && ( 'destination' == $content_type );
}

/**
 * Check if cta section is enabled.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tourable_theme_options[cta_section_enable]' )->value() );
}

/**
 * Check if traveler choice section is enabled.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_traveler_choice_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tourable_theme_options[traveler_choice_section_enable]' )->value() );
}

/**
 * Check if traveler choice section content type is category.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_traveler_choice_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tourable_theme_options[traveler_choice_content_type]' )->value();
	return tourable_is_traveler_choice_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if traveler choice section content type is trip types.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_traveler_choice_section_content_trip_types_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tourable_theme_options[traveler_choice_content_type]' )->value();
	return tourable_is_traveler_choice_section_enable( $control ) && ( 'trip-types' == $content_type );
}

/**
 * Check if popular destination section is enabled.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_popular_destination_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tourable_theme_options[popular_destination_section_enable]' )->value() );
}

/**
 * Check if popular destination section content type is category.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_popular_destination_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tourable_theme_options[popular_destination_content_type]' )->value();
	return tourable_is_popular_destination_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if popular destination section content type is destination.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_popular_destination_section_content_destination_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tourable_theme_options[popular_destination_content_type]' )->value();
	return tourable_is_popular_destination_section_enable( $control ) && ( 'destination' == $content_type );
}

/**
 * Check if blog section is enabled.
 *
 * @since Tourable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tourable_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tourable_theme_options[blog_section_enable]' )->value() );
}
