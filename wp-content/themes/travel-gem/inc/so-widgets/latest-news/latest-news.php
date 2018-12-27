<?php
/**
 * Latest news widget
 *
 * Widget Name: Travel Gem Latest News
 * Description: Displays latest posts in grid.
 * Author: WEN Themes
 * Author URI: https://wenthemes.com
 *
 * @package Travel_Gem
 */

/**
 * Latest news widget class.
 *
 * @since 1.0.0
 */
class Travel_Gem_Latest_News_Widget extends SiteOrigin_Widget {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		parent::__construct(
			'travel-gem-latest-news',
			esc_html__( 'Travel Gem: Latest News', 'travel-gem' ),
			array(
				'description' => esc_html__( 'Displays latest posts in grid.', 'travel-gem' ),
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
				'label'           => esc_html__( 'Select Category:', 'travel-gem' ),
				'type'            => 'taxonomy-dropdown',
				'show_option_all' => esc_html__( 'All Categories', 'travel-gem' ),
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
				'default' => 'large',
				'options' => travel_gem_get_image_sizes_options( false ),
				),
			'more_text' => array(
				'label'   => esc_html__( 'More Text', 'travel-gem' ),
				'type'    => 'text',
				'default' => esc_html__( 'Know More', 'travel-gem' ),
				),
			'excerpt_length' => array(
				'label'       => esc_html__( 'Excerpt Length', 'travel-gem' ),
				'description' => esc_html__( 'in words', 'travel-gem' ),
				'type'        => 'number',
				'default'     => 15,
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

siteorigin_widget_register( 'travel-gem-latest-news', __FILE__, 'Travel_Gem_Latest_News_Widget' );
