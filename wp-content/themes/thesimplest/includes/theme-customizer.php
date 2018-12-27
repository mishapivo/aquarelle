<?php

function thesimplest_customize_register( $wp_customize ) {

	/**
	 * TheSimplest Default Customizer Settings
	 */
	thesimplest_customizer_default_settings( $wp_customize );

	/**
	 * TheSimplest Social Options
	 */
	thesimplest_social_icons( $wp_customize );

	/**
	 * TheSimplest Social Options
	 */
	thesimplest_misc_options( $wp_customize );

	/**
     * TheSimplest Theme Options Panel
     */
	$wp_customize->add_panel( 'thesimplest_panel', array(
        'title'         =>  esc_html__( 'Theme Options', 'thesimplest' ),
        'priority'      =>  40
    ) );
	thesimplest_layout_options( $wp_customize );

}

