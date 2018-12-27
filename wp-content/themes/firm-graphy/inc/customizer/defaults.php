<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 * @return array An array of default values
 */

function firm_graphy_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$firm_graphy_default_options = array(
		// Color Options
		'header_title_color'			=> '#181818',
		'header_tagline_color'			=> '#82868b',
		'header_txt_logo_extra'			=> 'show-all',
		'colorscheme_hue'				=> '#000',

		
		
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'nav_search_enable'				=> true,
		
		// excerpt options
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'firm-graphy' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'firm-graphy' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,
		'hide_author'					=> false,


		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// Banner
		'banner_section_enable'			=> false,
		'banner_btn_label'				=> esc_html__( 'Learn More', 'firm-graphy' ),
		
		// service
		'service_section_enable'		=> false,
		'service_title'					=> esc_html__( 'We are all here at your services for everything.', 'firm-graphy' ),

		// About
		'about_section_enable'			=> false,
		'about_btn_title'				=> esc_html__( 'Download Resume', 'firm-graphy' ),

		// Latest
		'latest_section_enable'			=> false,
		'latest_title'					=> esc_html__( 'Yes, we do work some time! View our latest work here.', 'firm-graphy' ),

		// introduction
		'introduction_section_enable'	=> false,
		'introduction_btn_label'		=> esc_html__( 'Explore Us', 'firm-graphy' ),

		// event
		'event_section_enable'			=> false,
		'event_title'					=> esc_html__( 'Our upcoming events for 2018', 'firm-graphy' ),
		'event_btn_label'				=> esc_html__( 'Show All Upcoming Events ', 'firm-graphy' ),

		// clients
		'client_section_enable'			=> false,
		'client_title'					=> esc_html__( 'We value our customer/clients above all others.', 'firm-graphy' ),

		// blog
		'blog_section_enable'			=> false,
		'blog_content_type'				=> 'recent',
		'blog_title'					=> esc_html__( 'Know what is happening around our circle of firm', 'firm-graphy' ),
		'blog_btn_title'				=> esc_html__( 'View All Blogs', 'firm-graphy' ),

		
	);

	$output = apply_filters( 'firm_graphy_default_theme_options', $firm_graphy_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}