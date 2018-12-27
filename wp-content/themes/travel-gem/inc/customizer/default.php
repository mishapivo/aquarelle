<?php
/**
 * Default theme options
 *
 * @package Travel_Gem
 */

if ( ! function_exists( 'travel_gem_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function travel_gem_get_default_theme_options() {

		$defaults = array();

		// Title tagline.
		$defaults['show_title']   = true;
		$defaults['show_tagline'] = true;

		// Header.
		$defaults['header_layout']              = 1;
		$defaults['contact_number']             = '';
		$defaults['contact_email']              = '';
		$defaults['contact_address']            = '';
		$defaults['quote_button_text']          = '';
		$defaults['quote_button_url']           = '';
		$defaults['enable_sticky_primary_menu'] = false;

		// Header.
		$defaults['custom_header_layout']          = 1;
		$defaults['custom_header_show_title']      = true;
		$defaults['custom_header_show_breadcrumb'] = true;

		// Layout.
		$defaults['global_layout']           = 'right-sidebar';
		$defaults['archive_layout']          = 'grid';
		$defaults['archive_image']           = 'large';
		$defaults['archive_image_alignment'] = 'center';

		// Blog.
		$defaults['blog_title']     = esc_html__( 'Blog', 'travel-gem' );
		$defaults['excerpt_length'] = 40;
		$defaults['read_more_text'] = esc_html__( 'Read More', 'travel-gem' );

		// Breadcrumb.
		$defaults['breadcrumb_home_text']  = esc_html__( 'Home', 'travel-gem' );
		$defaults['breadcrumb_show_title'] = true;

		// Footer.
		$defaults['copyright_text'] = esc_html__( 'Copyright &copy; All rights reserved.', 'travel-gem' );

		// Pass through filter.
		$defaults = apply_filters( 'travel_gem_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
