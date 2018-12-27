<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

if ( ! function_exists( 'firm_graphy_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Firm Graphy 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function firm_graphy_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'firm_graphy_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'firm_graphy_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Firm Graphy 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function firm_graphy_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'firm_graphy_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'firm_graphy_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Firm Graphy 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function firm_graphy_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'firm_graphy_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if topbar section is enabled.
 *
 * @since Firm Graphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function firm_graphy_is_topbar_section_enable( $control ) {
	return ( $control->manager->get_setting( 'firm_graphy_theme_options[topbar_section_enable]' )->value() );
}

/**
 * Check if banner section is enabled.
 *
 * @since Firm Graphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function firm_graphy_is_banner_section_enable( $control ) {
	return ( $control->manager->get_setting( 'firm_graphy_theme_options[banner_section_enable]' )->value() );
}

/**
 * Check if service section is enabled.
 *
 * @since Firm Graphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function firm_graphy_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'firm_graphy_theme_options[service_section_enable]' )->value() );
}


/**
 * Check if about section is enabled.
 *
 * @since Firm Graphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function firm_graphy_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'firm_graphy_theme_options[about_section_enable]' )->value() );
}


/**
 * Check if latest section is enabled.
 *
 * @since Firm Graphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function firm_graphy_is_latest_section_enable( $control ) {
	return ( $control->manager->get_setting( 'firm_graphy_theme_options[latest_section_enable]' )->value() );
}

/**
 * Check if introduction section is enabled.
 *
 * @since Firm Graphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function firm_graphy_is_introduction_section_enable( $control ) {
	return ( $control->manager->get_setting( 'firm_graphy_theme_options[introduction_section_enable]' )->value() );
}


/**
 * Check if event section is enabled.
 *
 * @since Firm Graphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function firm_graphy_is_event_section_enable( $control ) {
	return ( $control->manager->get_setting( 'firm_graphy_theme_options[event_section_enable]' )->value() );
}



/**
 * Check if client section is enabled.
 *
 * @since Firm Graphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function firm_graphy_is_client_section_enable( $control ) {
	return ( $control->manager->get_setting( 'firm_graphy_theme_options[client_section_enable]' )->value() );
}



/**
 * Check if blog section is enabled.
 *
 * @since Firm Graphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function firm_graphy_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'firm_graphy_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Firm Graphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function firm_graphy_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'firm_graphy_theme_options[blog_content_type]' )->value();
	return firm_graphy_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Firm Graphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function firm_graphy_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'firm_graphy_theme_options[blog_content_type]' )->value();
	return firm_graphy_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}
