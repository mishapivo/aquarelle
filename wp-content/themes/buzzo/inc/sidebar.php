<?php
/**
 * Sidebar module
 *
 * @package Buzzo
 */

class Buzzo_Sidebar {

	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_settings' ) );
	}


	public function register_settings( $wp_customize ) {
		$option_sidebar_layout = $this->_get_option_sidebar_layout();
		$option_sidebar_name = $this->_get_option_sidebar_name();

		$wp_customize->add_section( 'buzzo_sidebar', array(
			'title'    => __( 'Sidebar', 'buzzo' ),
			'priority' => 85,
		) );

		// Blog.
		$wp_customize->add_setting( 'buzzo_sidebar_layout', array(
			'default'              => 'sidebar_right',
			'transport'            => 'refresh', // or postMessage
			'sanitize_callback'    => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'buzzo_sidebar_layout', array(
			'label'       => __( 'Sidebar layout', 'buzzo' ),
			'section'     => 'buzzo_sidebar',
			'type'        => 'select',
			'choices'     => $option_sidebar_layout,
		) );

		// Archive.
		$wp_customize->add_setting( 'buzzo_sidebar_archive_layout', array(
			'default'              => 'sidebar_right',
			'transport'            => 'refresh', // or postMessage
			'sanitize_callback'    => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'buzzo_sidebar_archive_layout', array(
			'label'       => __( 'Sidebar layout for archive page', 'buzzo' ),
			'section'     => 'buzzo_sidebar',
			'type'        => 'select',
			'choices'     => $option_sidebar_layout,
		) );

		// Single.
		$wp_customize->add_setting( 'buzzo_sidebar_single_layout', array(
			'default'              => 'sidebar_right',
			'transport'            => 'refresh', // or postMessage
			'sanitize_callback'    => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'buzzo_sidebar_single_layout', array(
			'label'       => __( 'Sidebar layout for single page', 'buzzo' ),
			'section'     => 'buzzo_sidebar',
			'type'        => 'select',
			'choices'     => $option_sidebar_layout,
		) );

		// Page.
		$wp_customize->add_setting( 'buzzo_sidebar_page_layout', array(
			'default'              => 'sidebar_right',
			'transport'            => 'refresh', // or postMessage
			'sanitize_callback'    => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'buzzo_sidebar_page_layout', array(
			'label'       => __( 'Sidebar layout for page detail page', 'buzzo' ),
			'section'     => 'buzzo_sidebar',
			'type'        => 'select',
			'choices'     => $option_sidebar_layout,
		) );
	}


	protected function _get_option_sidebar_layout() {
		return array(
			'sidebar_right' => __( 'Sidebar right', 'buzzo' ),
			'sidebar_left'  => __( 'Sidebar left', 'buzzo' ),
			'no_sidebar'    => __( 'No sidebar', 'buzzo' ),
		);
	}


	protected function _get_option_sidebar_name() {
		global $wp_registered_sidebars;

		$option = array();

		foreach ( $wp_registered_sidebars as $sidebar ) {
			$option[ $sidebar['id'] ] = $sidebar['name'];
		}

		return $option;
	}


	public static function get_sidebar_layout() {
		if ( is_search() ) {
			$sidebar_layout = get_theme_mod( 'buzzo_sidebar_archive_layout', 'sidebar_right' );
		} elseif ( is_archive() ) {
			$sidebar_layout = get_theme_mod( 'buzzo_sidebar_archive_layout', 'sidebar_right' );
		} elseif ( is_page() ) {
			$sidebar_layout = get_theme_mod( 'buzzo_sidebar_page_layout', 'sidebar_right' );

			$meta_value = get_post_meta( get_the_ID(), '_buzzo_sidebar_layout', true );

			if ( $meta_value ) {
				$sidebar_layout = $meta_value;
			}
		} elseif ( is_single() ) {
			$sidebar_layout = get_theme_mod( 'buzzo_sidebar_single_layout', 'sidebar_right' );

			$meta_value = get_post_meta( get_the_ID(), '_buzzo_sidebar_layout', true );

			if ( $meta_value ) {
				$sidebar_layout = $meta_value;
			}
		} else {
			$sidebar_layout = get_theme_mod( 'buzzo_sidebar_layout', 'sidebar_right' );
		}

		/**
		 * Filter sidebar layout value.
		 *
		 * // @hooked buzzo_single_sidebar_layout() - 10
		 */
		return apply_filters( 'buzzo_sidebar_layout', $sidebar_layout );
	}


	public static function is_no_sidebar() {
		return 'no_sidebar' == self::get_sidebar_layout();
	}


	public static function get_layout_class() {
		$sidebar_layout = self::get_sidebar_layout();

		if ( 'sidebar_left' == $sidebar_layout ) {
			$css_class = 'layout-sidebar-left';
		} elseif ( 'no_sidebar' == $sidebar_layout ) {
			$css_class = 'layout-no-sidebar';
		} else {
			$css_class = 'layout-sidebar-right';
		}

		return apply_filters( 'buzzo_layout_class', $css_class );
	}
}
new Buzzo_Sidebar();
