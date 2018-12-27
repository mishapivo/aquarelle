<?php
/**
 * Homepage Settings
 *
 * @package Lifestyle Magazine
 */

add_action( 'customize_register', 'lifestyle_magazine_customize_register_theme_options_panel' );

function lifestyle_magazine_customize_register_theme_options_panel( $wp_customize ) {
	$wp_customize->add_panel( 'lifestyle_magazine_theme_options_panel', array(
	    'priority'    => 12,
	    'title'       => esc_html__( 'Theme Options', 'lifestyle-magazine' ),
	    'description' => esc_html__( 'Theme Options', 'lifestyle-magazine' ),
	) );
}