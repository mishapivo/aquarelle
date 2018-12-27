<?php 

/**
 * Customizer Partial Functions
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

// Partial refresh for popular articles title
if ( !function_exists( 'edumag_customize_partial_popular_articles_title' ) ) :
	/**
	 * Render the popular articles title for the selective refresh.
	 *
	 * @since EduMag 0.1
	 *
	 * @return string
	 */
	function edumag_customize_partial_popular_articles_title() {
		$options = edumag_get_theme_options();
		return esc_html( $options['popular_articles_title'] );
	}
endif;

// Partial refresh for search section button title
if ( !function_exists( 'edumag_customize_partial_search_section_button_text' ) ) :
	/**
	 * Render the search section button title for the selective refresh.
	 *
	 * @since EduMag 0.1
	 *
	 * @return string
	 */
	function edumag_customize_partial_search_section_button_text() {
		$options = edumag_get_theme_options();
		return esc_html( $options['search_section_button_text'] );
	}
endif;

// Partial refresh for latest news title
if ( !function_exists( 'edumag_customize_partial_latest_news_title' ) ) :
	/**
	 * Render the latest news title for the selective refresh.
	 *
	 * @since EduMag 0.1
	 *
	 * @return string
	 */
	function edumag_customize_partial_latest_news_title() {
		$options = edumag_get_theme_options();
		return esc_html( $options['latest_news_title'] );
	}
endif;
