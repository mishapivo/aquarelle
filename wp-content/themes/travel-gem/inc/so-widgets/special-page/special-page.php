<?php
/**
 * Special page widget
 *
 * Widget Name: Travel Gem Special Page
 * Description: Displays single page.
 * Author: WEN Themes
 * Author URI: https://wenthemes.com
 *
 * @package Travel_Gem
 */

/**
 * Special page widget class.
 *
 * @since 1.0.0
 */
class Travel_Gem_Special_Page_Widget extends SiteOrigin_Widget {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		parent::__construct(
			'travel-gem-special-page',
			esc_html__( 'Travel Gem: Special Page', 'travel-gem' ),
			array(
				'description' => esc_html__( 'Displays single page.', 'travel-gem' ),
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
			'special_page_id' => array(
				'label'           => esc_html__( 'Select Page:', 'travel-gem' ),
				'type'            => 'page-dropdown',
				'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'travel-gem' ),
				),
			'featured_image' => array(
				'label'   => esc_html__( 'Featured Image', 'travel-gem' ),
				'type'    => 'select',
				'default' => 'medium',
				'options' => travel_gem_get_image_sizes_options(),
				),
			'featured_image_alignment' => array(
				'label'   => esc_html__( 'Image Alignment', 'travel-gem' ),
				'type'    => 'select',
				'default' => 'left',
				'options' => travel_gem_get_alignment_options(),
				),
			);
	}

}

siteorigin_widget_register( 'travel-gem-special-page', __FILE__, 'Travel_Gem_Special_Page_Widget' );
