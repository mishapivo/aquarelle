<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 * @return array An array of default values
 */

if ( ! function_exists( 'edumag_get_default_theme_options' ) ) :
	function edumag_get_default_theme_options() {
		$edumag_default_options = array(

			/*
			 * Homepage sections options
			 */

			// Featured Category
			'featured_category_enable'		=> 'static-frontpage',
			'featured_category_content_type'=> 'category',

			// popular articles
			'popular_articles_enable'		=> 'static-frontpage',
			'popular_articles_title'		=> esc_html__( 'Popular Articles', 'edumag' ),

			// search 
			'search_section_enable'		    => 'static-frontpage',
			'search_section_button_text'	=> esc_html__( 'Find Courses', 'edumag' ),

			// latest news
			'latest_news_enable'			=> 'static-frontpage',
			'latest_news_content_type' 		=> 'category',
			'latest_news_title' 			=> esc_html__( 'Latest News', 'edumag' ),

			// Blog Sections
			'blogs_section_enable'			=> 'static-frontpage',
			'blogs_section_content_type'	=> 'category',

			/*
			 * Theme Options
			 */
			'theme_color'					=> 'blue',
			'site_layout'         			=> 'wide',
			'sidebar_position'         		=> 'right-sidebar',
			'long_excerpt_length'           => 25,
			'short_excerpt_length'          => 10,
			'read_more_text'		        => esc_html__( 'Read More >>', 'edumag' ),
			'breadcrumb_enable'         	=> true,
			'pagination_enable'         	=> true,
			'scroll_top_visible'        	=> true,
			'copyright_text'                => sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved', '1: Year, 2: Site Title with home URL', 'edumag' ), '[the-year]', '[site-link]' ),
			'reset_options'      			=> false,
			'enable_frontpage_content' 		=> true,
			'append_search'					=> true,
		);

		$output = apply_filters( 'edumag_default_theme_options', $edumag_default_options );
		// Sort array in ascending order, according to the key:
		if ( ! empty( $output ) ) {
			ksort( $output );
		}

		return $output;
	}
endif;