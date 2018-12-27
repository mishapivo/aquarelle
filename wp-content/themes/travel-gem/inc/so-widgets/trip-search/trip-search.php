<?php
/**
 * Trip search widget
 *
 * Widget Name: Travel Gem Trip Search
 * Description: Displays trip search form.
 * Author: WEN Themes
 * Author URI: https://wenthemes.com
 *
 * @package Travel_Gem
 */

/**
 * Trip search widget class.
 *
 * @since 1.0.0
 */
class Travel_Gem_Trip_Search_Widget extends SiteOrigin_Widget {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		parent::__construct(
			'travel-gem-trip-search',
			esc_html__( 'Travel Gem: Trip Search', 'travel-gem' ),
			array(
				'description' => esc_html__( 'Displays trip search form.', 'travel-gem' ),
			),
			array(),
			false,
			plugin_dir_path( __FILE__ )
		);
	}

	/**
	 * Get widget form.
	 *
	 * @since 1.0.0
	 *
	 * @return array Widget form.
	 */
	function get_widget_form() {

		return array(
			'title' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'travel-gem' ),
				),
			'subtitle' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Subtitle', 'travel-gem' ),
				),
			'heading_alignment' => array(
				'label'   => esc_html__( 'Title/subtitle Alignment', 'travel-gem' ),
				'type'    => 'select',
				'default' => 'center',
				'options' => travel_gem_get_heading_alignment_options(),
				),
			);
	}

}

siteorigin_widget_register( 'travel-gem-trip-search', __FILE__, 'Travel_Gem_Trip_Search_Widget' );
