<?php
/**
 * Helper functions.
 *
 * @package Business_Cast
 */

if ( ! function_exists( 'business_cast_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function business_cast_get_global_layout_options() {
		$choices = array(
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'business-cast' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'business-cast' ),
			'three-columns' => esc_html__( 'Three Columns', 'business-cast' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'business-cast' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'business_cast_get_pagination_type_options' ) ) :

	/**
	 * Returns pagination type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function business_cast_get_pagination_type_options() {
		$choices = array(
			'default' => esc_html__( 'Default (Older/Newer)', 'business-cast' ),
			'numeric' => esc_html__( 'Numeric', 'business-cast' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'business_cast_get_breadcrumb_type_options' ) ) :

	/**
	 * Returns breadcrumb type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function business_cast_get_breadcrumb_type_options() {
		$choices = array(
			'disabled' => esc_html__( 'Disabled', 'business-cast' ),
			'enabled'  => esc_html__( 'Enabled', 'business-cast' ),
		);
		return $choices;
	}

endif;


if ( ! function_exists( 'business_cast_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function business_cast_get_archive_layout_options() {
		$choices = array(
			'full'    => esc_html__( 'Full Post', 'business-cast' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'business-cast' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'business_cast_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable    True for adding No Image option.
	 * @param array $allowed        Allowed image size options.
	 * @param bool  $show_dimension True for showing dimension.
	 * @return array Image size options.
	 */
	function business_cast_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;

		$choices = array();

		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'business-cast' );
		}

		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'business-cast' );
		$choices['medium']    = esc_html__( 'Medium', 'business-cast' );
		$choices['large']     = esc_html__( 'Large', 'business-cast' );
		$choices['full']      = esc_html__( 'Full (original)', 'business-cast' );

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

if ( ! function_exists( 'business_cast_get_image_alignment_options' ) ) :

	/**
	 * Returns image options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function business_cast_get_image_alignment_options() {
		$choices = array(
			'none'   => esc_html_x( 'None', 'alignment', 'business-cast' ),
			'left'   => esc_html_x( 'Left', 'alignment', 'business-cast' ),
			'center' => esc_html_x( 'Center', 'alignment', 'business-cast' ),
			'right'  => esc_html_x( 'Right', 'alignment', 'business-cast' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'business_cast_get_featured_slider_transition_effects' ) ) :

	/**
	 * Returns the featured slider transition effects.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function business_cast_get_featured_slider_transition_effects() {
		$choices = array(
			'fade'       => esc_html_x( 'fade', 'transition effect', 'business-cast' ),
			'fadeout'    => esc_html_x( 'fadeout', 'transition effect', 'business-cast' ),
			'none'       => esc_html_x( 'none', 'transition effect', 'business-cast' ),
			'scrollHorz' => esc_html_x( 'scrollHorz', 'transition effect', 'business-cast' ),
		);
		ksort( $choices );
		return $choices;
	}

endif;

if ( ! function_exists( 'business_cast_get_featured_slider_content_options' ) ) :

	/**
	 * Returns the featured slider content options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function business_cast_get_featured_slider_content_options() {
		$choices = array(
			'home-page' => esc_html__( 'Front Page Template', 'business-cast' ),
			'disabled'  => esc_html__( 'Disabled', 'business-cast' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'business_cast_get_featured_slider_type' ) ) :

	/**
	 * Returns the featured slider type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function business_cast_get_featured_slider_type() {
		$choices = array(
			'featured-page' => esc_html__( 'Featured Pages', 'business-cast' ),
		);
		return $choices;
	}

endif;
