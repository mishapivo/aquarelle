<?php
/**
 * Helper functions related to customizer and options.
 *
 * @package Travel_Gem
 */

if ( ! function_exists( 'travel_gem_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable    True for adding No Image option.
	 * @param array $allowed        Allowed image size options.
	 * @param bool  $show_dimension True to show dimension.
	 * @return array Image size options.
	 */
	function travel_gem_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;

		$choices = array();
		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'travel-gem' );
		}

		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'travel-gem' );
		$choices['medium']    = esc_html__( 'Medium', 'travel-gem' );
		$choices['large']     = esc_html__( 'Large', 'travel-gem' );
		$choices['full']      = esc_html__( 'Full (original)', 'travel-gem' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = $choices[ $_size ] . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ) {
					$choices[ $key ] .= ' (' . $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed, true ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;
	}

endif;

if ( ! function_exists( 'travel_gem_get_alignment_options' ) ) :

	/**
	 * Returns alignment options.
	 *
	 * @since 1.0.0
	 *
	 * @param array $allowed Allowed options.
	 *
	 * @return array Options array.
	 */
	function travel_gem_get_alignment_options( $allowed = array() ) {

		$output = array();
		$choices = array(
			'none'   => esc_html_x( 'None', 'alignment', 'travel-gem' ),
			'left'   => esc_html_x( 'Left', 'alignment', 'travel-gem' ),
			'center' => esc_html_x( 'Center', 'alignment', 'travel-gem' ),
			'right'  => esc_html_x( 'Right', 'alignment', 'travel-gem' ),
		);

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( in_array( $key, $allowed, true ) ) {
					$output[ $key ] = $value;
				}
			}
		} else {
			$output = $choices;
		}

		return $output;
	}

endif;

if ( ! function_exists( 'travel_gem_get_heading_alignment_options' ) ) :

	/**
	 * Returns heading alignment options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function travel_gem_get_heading_alignment_options() {

		return travel_gem_get_alignment_options( array( 'left', 'center', 'right' ) );
	}

endif;

if ( ! function_exists( 'travel_gem_get_numbers_dropdown_options' ) ) :

	/**
	 * Returns numbers dropdown options.
	 *
	 * @since 1.0.0
	 *
	 * @param int $min Min.
	 * @param int $max Max.
	 * @return array Options array.
	 */
	function travel_gem_get_numbers_dropdown_options( $min = 1, $max = 4 ) {

		$output = array();

		if ( $min <= $max ) {
			for ( $i = $min; $i <= $max; $i++ ) {
				$output[ $i ] = $i;
			}
		}

		return $output;
	}

endif;


if ( ! function_exists( 'travel_gem_get_slider_transition_effects_options' ) ) :

	/**
	 * Returns transition effects options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function travel_gem_get_slider_transition_effects_options() {

		$output = array(
			'fade'       => esc_html_x( 'fade', 'transition effect', 'travel-gem' ),
			'fadeout'    => esc_html_x( 'fadeout', 'transition effect', 'travel-gem' ),
			'none'       => esc_html_x( 'none', 'transition effect', 'travel-gem' ),
			'scrollHorz' => esc_html_x( 'scrollHorz', 'transition effect', 'travel-gem' ),
			'tileSlide'  => esc_html_x( 'tileSlide', 'transition effect', 'travel-gem' ),
			'tileBlind'  => esc_html_x( 'tileBlind', 'transition effect', 'travel-gem' ),
			'flipHorz'   => esc_html_x( 'flipHorz', 'transition effect', 'travel-gem' ),
			'flipVert'   => esc_html_x( 'flipVert', 'transition effect', 'travel-gem' ),
			'shuffle'    => esc_html_x( 'shuffle', 'transition effect', 'travel-gem' ),
		);

		if ( ! empty( $output ) ) {
			ksort( $output );
		}

		return $output;
	}

endif;

if ( ! function_exists( 'travel_gem_get_custom_header_layout_options' ) ) :

	/**
	 * Returns custom header layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function travel_gem_get_custom_header_layout_options() {

		$output = array(
			'1' => esc_html__( 'Default', 'travel-gem' ),
			'2' => esc_html__( 'Small Header', 'travel-gem' ),
		);

		return $output;
	}

endif;

if ( ! function_exists( 'travel_gem_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function travel_gem_get_global_layout_options() {

		$output = array(
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'travel-gem' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'travel-gem' ),
			'three-columns' => esc_html__( 'Three Columns', 'travel-gem' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'travel-gem' ),
		);

		return $output;
	}

endif;

if ( ! function_exists( 'travel_gem_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function travel_gem_get_archive_layout_options() {

		$output = array(
			'grid'   => esc_html__( 'Grid', 'travel-gem' ),
			'simple' => esc_html__( 'Simple', 'travel-gem' ),
		);

		return $output;
	}

endif;

if ( ! function_exists( 'travel_gem_get_header_layout_options' ) ) :

	/**
	 * Returns header layout options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $add_default Whether to add default or not.
	 * @return array Options array.
	 */
	function travel_gem_get_header_layout_options( $add_default = false ) {

		$output = array(
			'1' => array(
				'label' => esc_html__( 'One', 'travel-gem' ),
				'url'   => get_template_directory_uri() . '/images/header/layout-1.png',
				),
			'2' => array(
				'label' => esc_html__( 'Two', 'travel-gem' ),
				'url'   => get_template_directory_uri() . '/images/header/layout-2.png',
				),
			);

		if ( true === $add_default ) {
			$item = array(
				'label' => esc_html__( 'Default', 'travel-gem' ),
				'url'   => get_template_directory_uri() . '/images/header/layout-default.png',
				);
			array_unshift( $output, $item );
		}

		return $output;
	}

endif;
