<?php
/**
 * Latest trips widget
 *
 * Widget Name: Travel Gem Latest Trips
 * Description: Displays latest trips in grid.
 * Author: WEN Themes
 * Author URI: https://wenthemes.com
 *
 * @package Travel_Gem
 */

/**
 * Latest trips widget class.
 *
 * @since 1.0.0
 */
class Travel_Gem_Latest_Trips_Widget extends SiteOrigin_Widget {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		parent::__construct(
			'travel-gem-latest-trips',
			esc_html__( 'Travel Gem: Latest Trips', 'travel-gem' ),
			array(
				'description' => esc_html__( 'Displays latest trips in grid.', 'travel-gem' ),
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
			'post_category' => array(
				'label'           => esc_html__( 'Select Trip Type:', 'travel-gem' ),
				'type'            => 'taxonomy-dropdown',
				'taxonomy'        => 'itinerary_types',
				'show_option_all' => esc_html__( 'All Trip Types', 'travel-gem' ),
				),
			'post_number' => array(
				'label'   => esc_html__( 'Number of Posts', 'travel-gem' ),
				'type'    => 'number',
				'default' => 3,
				),
			'post_column' => array(
				'label'   => esc_html__( 'Number of Columns', 'travel-gem' ),
				'type'    => 'select',
				'default' => 3,
				'options' => travel_gem_get_numbers_dropdown_options( 2, 4 ),
				),
			'featured_image' => array(
				'label'   => esc_html__( 'Featured Image', 'travel-gem' ),
				'type'    => 'select',
				'default' => 'wp_travel_thumbnail',
				'options' => travel_gem_get_image_sizes_options( false ),
				),
			'explore_button_text' => array(
				'label'   => esc_html__( 'Explore Button Text', 'travel-gem' ),
				'type'    => 'text',
				'default' => esc_html__( 'Explore More', 'travel-gem' ),
				),
			'explore_button_url' => array(
				'label'   => esc_html__( 'Explore Button URL', 'travel-gem' ),
				'type'    => 'link',
				'default' => '',
				),
			);
	}

}

siteorigin_widget_register( 'travel-gem-latest-trips', __FILE__, 'Travel_Gem_Latest_Trips_Widget' );
