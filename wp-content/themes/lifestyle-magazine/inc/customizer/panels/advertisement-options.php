<?php
/**
 * Advertisement Settings
 *
 * @package Lifestyle Magazine
 */

add_action( 'customize_register', 'lifestyle_magazine_customize_register_ad_panel' );

function lifestyle_magazine_customize_register_ad_panel( $wp_customize ) {
	$wp_customize->add_panel( 'lifestyle_magazine_ad_panel', array(
	    'priority'    => 13,
	    'title'       => esc_html__( 'Advertisement Options', 'lifestyle-magazine' ),
	    'description' => esc_html__( 'Advertisement Options', 'lifestyle-magazine' ),
	) );
}