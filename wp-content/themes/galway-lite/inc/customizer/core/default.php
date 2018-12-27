<?php
/**
 * Default theme options.
 *
 * @package Galway Lite
 */

if (!function_exists('galway_lite_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function galway_lite_get_default_theme_options() {

	$defaults = array();

	// Slider Section.
	$defaults['show_slider_section']           = 1;
	$defaults['number_of_home_slider']         = 3;
	$defaults['number_of_content_home_slider'] = 20;
	$defaults['select_slider_from']            = 'from-category';
	$defaults['select-page-for-slider']        = 0;
	$defaults['select_category_for_slider']    = 1;
	$defaults['slider_section_layout']         = 'twp-slider-1';
	$defaults['button_text_on_slider']         = esc_html__('Read More', 'galway-lite');
    $defaults['primary_font'] = 'Source+Serif+Pro:400,700';
    $defaults['secondary_font'] = 'Source+Sans+Pro:400,400italic,600,900,300';
	/*layout*/
	$defaults['enable_overlay_option']    = 1;
	$defaults['homepage_layout_option']   = 'full-width';
	$defaults['read_more_button_text']    = esc_html__('Continue Reading', 'galway-lite');
	$defaults['global_layout']            = 'no-sidebar';
	$defaults['excerpt_length_global']    = 50;
	$defaults['archive_layout']           = 'excerpt-only';
	$defaults['archive_layout_image']     = 'full';
	$defaults['single_post_image_layout'] = 'full';
	$defaults['pagination_type']          = 'numeric';
	$defaults['copyright_text']           = esc_html__('Copyright All right reserved', 'galway-lite');
	$defaults['number_of_footer_widget']  = 3;
	$defaults['breadcrumb_type']          = 'simple';
	$defaults['enable_preloader']         = 1;

	// Pass through filter.
	$defaults = apply_filters('galway_lite_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;
