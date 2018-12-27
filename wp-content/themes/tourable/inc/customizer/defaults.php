<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 * @return array An array of default values
 */

function tourable_get_default_theme_options() {
	$tourable_default_options = array(
		// Color Options
		'header_title_color'			=> '#00bcd4',
		'header_tagline_color'			=> '#888',
		'header_txt_logo_extra'			=> 'show-all',
		
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide-layout',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',

		// excerpt options
		'long_excerpt_length'           => 25,
		'read_more_text'          	 	=> esc_html__( 'Read More', 'tourable' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'tourable' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'tourable' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// Slider
		'slider_section_enable'			=> false,
		'slider_btn_label'				=> esc_html__( 'Learn More', 'tourable' ),

		// service
		'service_section_enable'		=> false,
		'service_btn_label'				=> esc_html__( 'More', 'tourable' ),

		// trip search
		'trip_search_section_enable'	=> false,
		'trip_search_title'				=> esc_html__( 'Search your destinations', 'tourable' ),

		// destinations
		'destinations_section_enable'	=> false,
		'destinations_content_type'		=> 'category',
		'destinations_suffix'			=> esc_html__( 'Tour Available', 'tourable' ),

		// call to action
		'cta_section_enable'			=> false,
		'cta_btn_title'					=> esc_html__( 'Learn More', 'tourable' ),

		// traveler choice
		'traveler_choice_section_enable'	=> false,
		'traveler_choice_content_type'		=> 'category',
		'traveler_choice_title'				=> esc_html__( 'Traveler&#39;s Choice', 'tourable' ),
		'traveler_choice_read_more'			=> esc_html__( 'See Details', 'tourable' ),

		// popular destination
		'popular_destination_section_enable'	=> false,
		'popular_destination_content_type'		=> 'category',
		'popular_destination_title'				=> esc_html__( 'Popular Destinations', 'tourable' ),
		'popular_destination_read_more'			=> esc_html__( 'Tour Details', 'tourable' ),

		// blog
		'blog_section_enable'			=> false,
		'blog_title'					=> esc_html__( 'From Our Latest Blog', 'tourable' ),
		'blog_read_more'				=> esc_html__( 'Read More', 'tourable' ),
		
	);

	$output = apply_filters( 'tourable_default_theme_options', $tourable_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}