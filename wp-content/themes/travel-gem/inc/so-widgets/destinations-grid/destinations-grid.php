<?php
/**
 * Destinations Grid widget
 *
 * Widget Name: Travel Gem Destinations Grid
 * Description: Displays destinations in grid.
 * Author: WEN Themes
 * Author URI: https://wenthemes.com
 *
 * @package Travel_Gem
 */

/**
 * Destinations Grid widget class.
 *
 * @since 1.0.0
 */
class Travel_Gem_Destinations_Grid_Widget extends SiteOrigin_Widget {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		parent::__construct(
			'travel-gem-destinations-grid',
			esc_html__( 'Travel Gem: Destinations Grid', 'travel-gem' ),
			array(
				'description' => esc_html__( 'Displays destinations in grid.', 'travel-gem' ),
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
			'notice' => array(
				'type'        => 'message',
				'label'       => esc_html__( 'NOTE:', 'travel-gem' ),
				'description' => esc_html__( 'To use this widget, first please make sure \'WP Travel\' plugin is activated and destinations and trips are added.', 'travel-gem' ),
				),
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
				'label'           => esc_html__( 'Select Destinations', 'travel-gem' ),
				'description'     => esc_html__( 'Hold down the Ctrl (Windows) / Command (Mac) button to select multiple options.', 'travel-gem' ),
				'type'            => 'taxonomy-dropdown',
				'taxonomy'        => 'travel_locations',
				'multiple'        => true,
				'show_option_all' => esc_html__( 'All Destinations', 'travel-gem' ),
				),
			'post_number' => array(
				'label'   => esc_html__( 'Number of Destinations', 'travel-gem' ),
				'type'    => 'number',
				'default' => 4,
				),
			'post_column' => array(
				'label'   => esc_html__( 'Number of Columns', 'travel-gem' ),
				'type'    => 'select',
				'default' => 4,
				'options' => travel_gem_get_numbers_dropdown_options( 3, 4 ),
				),
			);
	}

	/**
	 * Return destination details.
	 *
	 * @since 1.0.0
	 *
	 * @param array $instance Instance.
	 * @return array Details.
	 */
	function get_destination_details( $instance ) {
		$output = array();

		$term_args = array(
			'taxonomy'     => 'travel_locations',
			'hide_empty'   => true,
			'hierarchical' => false,
			'number'       => absint( $instance['post_number'] ),
			);

		$categories = array();
		if ( is_array( $instance['post_category'] ) ) {
			$categories = $instance['post_category'];
		} else {
			if ( absint( $instance['post_category'] ) > 0 ) {
				$categories = array( absint( $instance['post_category'] ) );
			}
		}

		if ( ! empty( $categories ) ) {
			$term_args['include'] = $categories;
		}

		$terms = get_terms( $term_args );

		if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				$item = array();

				$item['id']    = $term->term_id;
				$item['title'] = $term->name;
				$item['slug']  = $term->slug;
				$item['url']   = get_term_link( $term );
				$item['image'] = null;

				$qargs = array(
					'post_type'   => 'itineraries',
					'numberposts' => 1,
					'meta_query'   => array(
						array(
							'key'     => '_thumbnail_id',
							'compare' => 'EXISTS',
							),
						array(
							'key'     => '_thumbnail_id',
							'compare' => '!=',
							'type'    => 'numeric',
							'value'   => 0,
							),
						),
					'tax_query'   => array(
						array(
							'taxonomy' => 'travel_locations',
							'field'    => 'term_id',
							'terms'    => absint( $item['id'] ),
							)
						),
					);

				$posts = get_posts( $qargs );
				$post = null;
				if ( ! empty( $posts ) ) {
					$post = array_shift( $posts );
					$thumb = get_the_post_thumbnail_url( $post->ID, 'travel-gem-trip-thumb' );
					if ( ! empty( $thumb ) ) {
						$item['image'] = $thumb;
					}

				}

				$output[] = $item;
			}
		}

		return $output;
	}

}

siteorigin_widget_register( 'travel-gem-destinations-grid', __FILE__, 'Travel_Gem_Destinations_Grid_Widget' );
