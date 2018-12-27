<?php
/**
 * Blog module
 *
 * @package Buzzo
 */

/**
 * Buzzo blog class.
 */
class Buzzo_Blog {

	/**
	 * Construct
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_settings' ) );
	}

	/**
	 * Register settings.
	 *
	 * @param  obj $wp_customize wp_customize.
	 * @return  void
	 */
	public function register_settings( $wp_customize ) {
		$wp_customize->add_section( 'buzzo_blog', array(
			'title'    => __( 'Blog', 'buzzo' ),
			'priority' => 85,
		) );

		// Blog layout.
		$wp_customize->add_setting( 'buzzo_blog_layout', array(
			'default'              => 'standard',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'buzzo_blog_layout', array(
			'label'       => __( 'Blog layout', 'buzzo' ),
			'section'     => 'buzzo_blog',
			'type'        => 'select',
			'choices'     => array(
				'standard'            => __( 'Standard', 'buzzo' ),
				'standard_no_content' => __( 'Standard without content', 'buzzo' ),
				'list'                => __( 'List', 'buzzo' ),
				'standard_overlay'    => __( 'Standard overlay', 'buzzo' ),
			),
		) );

		// Advanced layout.
		$wp_customize->add_setting( 'buzzo_advanced_layout', array(
			'default'              => false,
			'transport'            => 'refresh',
			'sanitize_callback'    => 'absint',
		) );
		$wp_customize->add_control( 'buzzo_advanced_layout', array(
			'label'       => __( 'Enable advanced layout', 'buzzo' ),
			'section'     => 'buzzo_blog',
			'type'        => 'checkbox',
			'description' => __( 'Use Advanced layout setting in each post.', 'buzzo' ),
		) );

		// Pagination type.
		$wp_customize->add_setting( 'buzzo_pagination_type', array(
			'default'              => 'next_prev',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'buzzo_pagination_type', array(
			'label'       => __( 'Pagination type', 'buzzo' ),
			'section'     => 'buzzo_blog',
			'type'        => 'radio',
			'choices'     => array(
				'next_prev' => __( 'Next/Prev', 'buzzo' ),
				'numeric'   => __( 'Numeric', 'buzzo' ),
			),
		) );
	}

	/**
	 * Get blog layout.
	 */
	public static function get_blog_layout() {
		return apply_filters( 'buzzo_blog_layout', get_theme_mod( 'buzzo_blog_layout', 'standard' ) );
	}

	/**
	 * Get blog layout css class.
	 */
	public static function get_blog_layout_css_class() {
		$layout = self::get_blog_layout();

		if ( 'list' == $layout ) {
			$css_class = 'blog-layout-list';
		} elseif ( 'standard_overlay' == $layout ) {
			$css_class = 'blog-layout-standard-overlay';
		} else {
			$css_class = '';
		}

		return apply_filters( 'buzzo_blog_layout_css_class', $css_class );
	}

	/**
	 * Get layout template loop part
	 */
	public static function get_layout_template_loop_part() {
		$layout = self::get_blog_layout();

		if ( 'list' == $layout ) {
			$part = 'template-parts/loop-list';
		} elseif ( 'standard_overlay' == $layout ) {
			$part = 'template-parts/loop-standard-overlay';
		} elseif ( 'standard_no_content' == $layout ) {
			$part = 'template-parts/loop-standard-no-content';
		} else {
			$part = 'template-parts/loop';
		}

		if ( get_theme_mod( 'buzzo_advanced_layout', false ) ) {
			$post_id = get_the_ID();
			$meta_value = get_post_meta( $post_id, '_buzzo_layout', true );

			if ( 'list' == $meta_value ) {
				$part = 'template-parts/loop-list';
			} elseif ( 'standard_overlay' == $meta_value ) {
				$part = 'template-parts/loop-standard-overlay';
			} elseif ( 'standard_no_content' == $meta_value ) {
				$part = 'template-parts/loop-standard-no-content';
			} elseif ( 'standard' == $meta_value ) {
				$part = 'template-parts/loop';
			}
		}

		return apply_filters( 'buzzo_layout_template_loop_part', $part );
	}

	/**
	 * Get pagination type.
	 */
	public static function get_pagination_type() {
		return apply_filters( 'buzzo_pagination_type', get_theme_mod( 'buzzo_pagination_type', 'next_prev' ) );
	}
}
new Buzzo_Blog();
