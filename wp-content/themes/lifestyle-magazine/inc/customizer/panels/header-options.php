<?php
/**
 * Header Settings
 *
 * @package Lifestyle Magazine
 */

add_action( 'customize_register', 'lifestyle_magazine_customize_register_header_panel' );

function lifestyle_magazine_customize_register_header_panel( $wp_customize ) {
	$wp_customize->add_panel( 'lifestyle_magazine_header_panel', array(
	    'priority'    => 11,
	    'title'       => esc_html__( 'Header Options', 'lifestyle-magazine' ),
	    'description' => esc_html__( 'Header Options', 'lifestyle-magazine' ),
	) );
}