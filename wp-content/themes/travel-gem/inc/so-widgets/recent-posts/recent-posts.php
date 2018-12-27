<?php
/**
 * Recent posts widget
 *
 * Widget Name: Travel Gem Recent Posts
 * Description: Displays recent posts.
 * Author: WEN Themes
 * Author URI: https://wenthemes.com
 *
 * @package Travel_Gem
 */

/**
 * Recent posts widget class.
 *
 * @since 1.0.0
 */
class Travel_Gem_Recent_Posts_Widget extends SiteOrigin_Widget {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		parent::__construct(
			'travel-gem-recent-posts',
			esc_html__( 'Travel Gem: Recent Posts', 'travel-gem' ),
			array(
				'description' => esc_html__( 'Displays recent posts.', 'travel-gem' ),
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
			'featured_image' => array(
				'label'   => esc_html__( 'Featured Image', 'travel-gem' ),
				'type'    => 'select',
				'default' => 'thumbnail',
				'options' => travel_gem_get_image_sizes_options( true, array( 'disable', 'thumbnail' ), false ),
				),
			'image_width' => array(
				'label'       => esc_html__( 'Image Width', 'travel-gem' ),
				'description' => esc_html__( 'in px', 'travel-gem' ),
				'type'        => 'number',
				'default'     => 70,
				),
			'disable_date' => array(
				'label'   => esc_html__( 'Disable Date', 'travel-gem' ),
				'type'    => 'checkbox',
				'default' => false,
				),
			);
	}

}

siteorigin_widget_register( 'travel-gem-recent-posts', __FILE__, 'Travel_Gem_Recent_Posts_Widget' );
