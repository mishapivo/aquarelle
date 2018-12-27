<?php
/**
 * General Settings
 *
 * @package Lifestyle Magazine
 */

add_action( 'customize_register', 'lifestyle_magazine_customize_register_general_panel' );

function lifestyle_magazine_customize_register_general_panel( $wp_customize ) {
	$wp_customize->add_panel( 'lifestyle_magazine_general_panel', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'General Options', 'lifestyle-magazine' ),
	    'description' => esc_html__( 'General Options', 'lifestyle-magazine' ),
	) );
}