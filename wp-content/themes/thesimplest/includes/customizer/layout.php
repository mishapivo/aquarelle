<?php

function thesimplest_layout_options( $wp_customize ) {

	$wp_customize->add_section( 'thesimplest_layout_section', array(
		'title'                 =>  esc_html__( 'Layout Settings', 'thesimplest' ),
		'panel'                 =>  'thesimplest_panel'
	) );

	$wp_customize->add_setting( 'thesimplest_layout_options_setting', array(
		'default'               =>  'right-sidebar',
		'sanitize_callback'     =>  'thesimplest_layout_option_sanitize',
		'transport'             =>  'refresh'
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'layout_options_input',
			array(
				'label'         =>  esc_html__( 'Site Layout', 'thesimplest' ),
				'section'       =>  'thesimplest_layout_section',
				'settings'      =>  'thesimplest_layout_options_setting',
				'type'          =>  'radio',
				'choices'       =>  array(
					'left-sidebar'      =>  esc_html__( 'Sidebar Left', 'thesimplest' ),
					'right-sidebar'     =>  esc_html__( 'Sidebar Right', 'thesimplest' ),
					'no-sidebar'        =>  esc_html__( 'No Sidebar', 'thesimplest' )
				)
			)
		)
	);

}