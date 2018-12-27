<?php
/**
 * Trips Filter widget
 *
 * Widget Name: Travel Gem Trips Filter
 * Description: Displays trips filter.
 * Author: WEN Themes
 * Author URI: https://wenthemes.com
 *
 * @package Travel_Gem
 */

/**
 * Trips Filter widget class.
 *
 * @since 1.0.0
 */
class Travel_Gem_Trips_Filter_Widget extends SiteOrigin_Widget {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		parent::__construct(
			'travel-gem-trips-filter',
			esc_html__( 'Travel Gem: Trips Filter', 'travel-gem' ),
			array(
				'description' => esc_html__( 'Displays trips filter.', 'travel-gem' ),
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
				'description' => esc_html__( 'To use this widget, first please make sure \'WP Travel\' plugin is activated and activities and trips are added.', 'travel-gem' ),
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
			'filter_type' => array(
				'label'         => esc_html__( 'Filter Type', 'travel-gem' ),
				'type'          => 'select',
				'default'       => 'destination',
				'state_emitter' => array(
					'callback' => 'in',
					'args'     => array(
						'filter_type[destination]: destination',
						'filter_type[activity]: activity',
						'filter_type[trip-type]: trip-type',
						),
					),
				'options' => array(
					'destination' => esc_html__( 'Destination', 'travel-gem' ),
					'trip-type'   => esc_html__( 'Trip Type', 'travel-gem' ),
					'activity'    => esc_html__( 'Activity', 'travel-gem' ),
					),
				),
			'post_category_destination' => array(
				'label'           => esc_html__( 'Select Destinations', 'travel-gem' ),
				'description'     => esc_html__( 'Hold down the Ctrl (Windows) / Command (Mac) button to select multiple options.', 'travel-gem' ),
				'type'            => 'taxonomy-dropdown',
				'taxonomy'        => 'travel_locations',
				'multiple'        => true,
				'show_option_all' => esc_html__( 'All Destinations', 'travel-gem' ),
				'state_handler'   => array(
					'filter_type[destination]' => array( 'show' ),
					'_else[filter_type]' => array( 'hide' ),
					),
				),
			'post_category_trip_type' => array(
				'label'           => esc_html__( 'Select Trip Types', 'travel-gem' ),
				'description'     => esc_html__( 'Hold down the Ctrl (Windows) / Command (Mac) button to select multiple options.', 'travel-gem' ),
				'type'            => 'taxonomy-dropdown',
				'taxonomy'        => 'itinerary_types',
				'multiple'        => true,
				'show_option_all' => esc_html__( 'All Trip Types', 'travel-gem' ),
				'state_handler'   => array(
					'filter_type[trip-type]' => array( 'show' ),
					'_else[filter_type]' => array( 'hide' ),
					),
				),
			'post_category_activity' => array(
				'label'           => esc_html__( 'Select Activities', 'travel-gem' ),
				'description'     => esc_html__( 'Hold down the Ctrl (Windows) / Command (Mac) button to select multiple options.', 'travel-gem' ),
				'type'            => 'taxonomy-dropdown',
				'taxonomy'        => 'activity',
				'multiple'        => true,
				'show_option_all' => esc_html__( 'All Activities', 'travel-gem' ),
				'state_handler'   => array(
					'filter_type[activity]' => array( 'show' ),
					'_else[filter_type]' => array( 'hide' ),
					),
				),
			'post_number' => array(
				'label'   => esc_html__( 'Number of Trips', 'travel-gem' ),
				'type'    => 'number',
				'default' => 8,
				),
			);
	}

	/**
	 * Initialize.
	 *
	 * @since 1.0.0
	 */
	function initialize() {
		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		$this->register_frontend_scripts(
			array(
				array(
					'jquery-isotope',
					get_template_directory_uri() . '/third-party/isotope/isotope.pkgd' . $min . '.js',
					array( 'jquery' ),
					'3.0.4',
					),
				array(
					'travel-gem-portfolio',
					get_template_directory_uri() . '/js/portfolio' . $min . '.js',
					array( 'jquery', 'imagesloaded', 'jquery-isotope' ),
					'1.0.0',
					),
				)
		);
	}

	/**
	 * Get trip details.
	 *
	 * @since 1.0.0
	 *
	 * @param array $instance Instance.
	 * @return array Trip details.
	 */
	function get_trip_details( $instance ) {

		$output = array();

		if ( ! class_exists( 'WP_Travel' ) ) {
			return $output;
		}

		$details = array();
		$category_details = array();

		switch ( $instance['filter_type'] ) {
			case 'trip-type':
				$taxonomy       = 'itinerary_types';
				$category_field = 'post_category_trip_type';
				break;
			case 'activity':
				$taxonomy       = 'activity';
				$category_field = 'post_category_activity';
				break;
			default:
				$taxonomy       = 'travel_locations';
				$category_field = 'post_category_destination';
				break;
		}

		$category_value = $instance[ $category_field ];

		$selected_categories = array();

		if ( is_array( $category_value ) ) {
			$selected_categories = $category_value;
		} else {
			if ( absint( $category_value ) > 0 ) {
				$selected_categories = array( absint( $category_value ) );
			}
		}

		if ( empty( $selected_categories ) ) {
			$custom_terms = get_terms( $taxonomy, 'orderby=none&hide_empty=1' );

			if ( $custom_terms && ! is_wp_error( $custom_terms ) ) {
				$selected_categories = wp_list_pluck( $custom_terms, 'term_id' );
			}
		}

		$custom_args = array(
			'post_type'      => 'itineraries',
			'post_status'    => 'publish',
			'posts_per_page' => absint( $instance['post_number'] ),
			'meta_query'     => array(
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
		);

		if ( ! empty( $selected_categories ) ) {
			$tquery = array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'term_id',
					'terms'    => $selected_categories,
					)
				);
			$custom_args['tax_query'] = $tquery;
		}

		// The Query.
		$the_query = new WP_Query( $custom_args );
		global $post;

		// The Loop.
		if ( $the_query->have_posts() ) {
			$i = 0;
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$item = array();
				$item['title'] = get_the_title();
				$item['url']   = get_permalink();
				$item['image'] = array();
				$item['image_large'] = array();
				$item['categories'] = array();
				$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wp_travel_thumbnail' );
				if ( ! empty( $image_array ) ) {
					$item['image'] = $image_array;
				}
				$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
				if ( ! empty( $image_array ) ) {
					$item['image_large'] = $image_array;
				}

				$terms = get_the_terms( $post->ID, $taxonomy );
				if ( ! empty( $terms ) && is_array( $terms ) ) {
					$item['categories'] = $terms;

					// Push categories to main array.
					foreach ( $terms as $term ) {
						$category_details[ $term->slug ] = $term->name;
					}
				}

				$details[ $i ] = $item;

				$i++;
			} // End while loop.

			// Reset post data.
			wp_reset_postdata();
		}

		$output['posts'] = $details;
		$output['categories'] = $category_details;
		return $output;
	}

}

siteorigin_widget_register( 'travel-gem-trips-filter', __FILE__, 'Travel_Gem_Trips_Filter_Widget' );
