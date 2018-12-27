<?php
/**
 * CTA widget
 *
 * Widget Name: Travel Gem CTA
 * Description: A simple call to action widget.
 * Author: WEN Themes
 * Author URI: https://wenthemes.com
 *
 * @package Travel_Gem
 */

/**
 * CTA widget class.
 *
 * @since 1.0.0
 */
class Travel_Gem_CTA_Widget extends SiteOrigin_Widget {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		parent::__construct(
			'travel-gem-cta',
			esc_html__( 'Travel Gem: CTA', 'travel-gem' ),
			array(
				'description' => esc_html__( 'A simple call to action widget.', 'travel-gem' ),
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
				'type'  => 'textarea',
				'label' => esc_html__( 'Description', 'travel-gem' ),
				),
			'primary_button_text' => array(
				'type'    => 'text',
				'label'   => esc_html__( 'Primary Button Text', 'travel-gem' ),
				'default' => esc_html__( 'Learn More', 'travel-gem' ),
				),
			'primary_button_url' => array(
				'type'    => 'link',
				'label'   => esc_html__( 'Primary Button URL', 'travel-gem' ),
				'default' => '#',
				),
			'secondary_button_text' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Secondary Button Text', 'travel-gem' ),
				),
			'secondary_button_url' => array(
				'type'  => 'link',
				'label' => esc_html__( 'Secondary Button URL', 'travel-gem' ),
				),
			'settings' => array(
				'type'   => 'section',
				'label'  => esc_html__( 'Settings', 'travel-gem' ),
				'hide'   => false,
				'fields' => array(
					'cta_title_color' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Title Color', 'travel-gem' ),
						'default' => '#FFF',
						),
					'cta_subtitle_color' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Subtitle Color', 'travel-gem' ),
						'default' => '#CCC',
						),
					'cta_background_color' => array(
						'type'    => 'color',
						'label'   => esc_html__( 'Background Color', 'travel-gem' ),
						'default' => '#00AEF0',
						),
					),
				),
			);
	}

	/**
	 * Less variables.
	 *
	 * @since 1.0.0
	 *
	 * @param array $instance Widget instance.
	 * @return array Less variables.
	 */
	function get_less_variables( $instance ) {
		if ( empty( $instance ) ) {
			return array();
		}

		return array(
			'cta_title_color'      => $instance['settings']['cta_title_color'],
			'cta_subtitle_color'   => $instance['settings']['cta_subtitle_color'],
			'cta_background_color' => $instance['settings']['cta_background_color'],
		);
	}

}

siteorigin_widget_register( 'travel-gem-cta', __FILE__, 'Travel_Gem_CTA_Widget' );
