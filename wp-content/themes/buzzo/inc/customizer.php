<?php
/**
 * Buzzo Theme Customizer.
 *
 * @package Buzzo
 */

class Buzzo_Customize {

	public function __construct() {
		add_action( 'customize_register', array( $this, 'register' ) );

		add_action( 'customize_preview_init', array( $this, 'preview_js' ) );
	}


	/**
	 * Register customize settings.
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		// Content options section.
		$this->_register_section_content_options( $wp_customize );
	}


	protected function _register_section_content_options( $wp_customize ) {
		$wp_customize->add_section( 'buzzo_content_options', array(
			'title'    => __( 'Content options', 'buzzo' ),
			'priority' => 85,
		) );

		// Blog display.
		$wp_customize->add_setting( 'buzzo_blog_display', array(
			'default'              => 'full',
			'transport'            => 'refresh', // or postMessage.
			'sanitize_callback'    => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'buzzo_blog_display', array(
			'label'       => __( 'Blog display', 'buzzo' ),
			'description' => __( 'Choose between a full post or an excerpt for the blog and archive pages.', 'buzzo' ),
			'section'     => 'buzzo_content_options',
			'type'        => 'radio',
			'choices'     => array(
				'full'    => __( 'Full post', 'buzzo' ),
				'excerpt' => __( 'Post excerpt', 'buzzo' ),
			),
		) );

		// Show related posts.
		$wp_customize->add_setting( 'buzzo_related_posts_on', array(
			'default'              => true,
			'transport'            => 'refresh', // or postMessage
			'sanitize_callback'    => 'absint',
		) );
		$wp_customize->add_control( 'buzzo_related_posts_on', array(
			'label'       => __( 'Show related posts', 'buzzo' ),
			'description' => __( 'Show related posts section in single post page.', 'buzzo' ),
			'section'     => 'buzzo_content_options',
			'type'        => 'radio',
			'choices'     => array(
				'1' => __( 'Yes', 'buzzo' ),
				'0' => __( 'No', 'buzzo' ),
			),
		) );

		// Query related posts by.
		$wp_customize->add_setting( 'buzzo_query_related_posts_by', array(
			'default'              => 'post_tag',
			'transport'            => 'refresh', // or postMessage
			'sanitize_callback'    => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'buzzo_query_related_posts_by', array(
			'label'       => __( 'Query related posts by', 'buzzo' ),
			'section'     => 'buzzo_content_options',
			'type'        => 'radio',
			'choices'     => array(
				'post_tag' => __( 'Same tag', 'buzzo' ),
				'category' => __( 'Same category', 'buzzo' ),
			),
			'active_callback' => 'buzzo_is_related_posts_on',
		) );

		// Excluded categories.
		$wp_customize->add_setting( 'buzzo_excluded_categories', array(
			'transport'            => 'refresh', // or postMessage
			'sanitize_callback'    => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'buzzo_excluded_categories', array(
			'label'       => __( 'Excluded categories', 'buzzo' ),
			'section'     => 'buzzo_content_options',
			'type'        => 'text',
			'description' => __( 'Fills categories id which don\'t want to show in post categories. Eg: 1,3,10', 'buzzo' ),
		) );
	}


	public function customize_css( $css ) {
		return $css;
	}


	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	public function preview_js() {
		wp_enqueue_script( 'buzzo-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
	}
}
new Buzzo_Customize();
