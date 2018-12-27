<?php
/**
 * Footer module
 *
 * @package Buzzo
 */

/**
 * Class Buzzo_Footer
 */
class Buzzo_Footer {

	/**
	 * Class Buzzo_Footer construct,
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_settings' ) );
	}

	/**
	 * Register footer settings.
	 *
	 * @param  object $wp_customize WP_Customize object.
	 */
	public function register_settings( $wp_customize ) {
		$wp_customize->add_section( 'buzzo_footer', array(
			'title'    => __( 'Footer', 'buzzo' ),
			'priority' => 85,
		) );

		// Copyright text.
		$wp_customize->add_setting( 'buzzo_copyright', array(
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'wp_kses_post',
		) );
		$wp_customize->add_control( 'buzzo_copyright', array(
			'label'       => __( 'Copyright', 'buzzo' ),
			'section'     => 'buzzo_footer',
			'type'        => 'textarea',
		) );

		// Show social icons.
		$wp_customize->add_setting( 'buzzo_social_on', array(
			'default'              => true,
			'transport'            => 'refresh',
			'sanitize_callback'    => 'absint',
		) );
		$wp_customize->add_control( 'buzzo_social_on', array(
			'label'       => __( 'Show social icons', 'buzzo' ),
			'section'     => 'buzzo_footer',
			'type'        => 'checkbox',
		) );
	}
}
new Buzzo_Footer();
