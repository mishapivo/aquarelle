<?php
/*adding sections for design options panel*/
$wp_customize->add_section( 'travel-way-animation', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Animation', 'travel-way' ),
    'panel'          => 'travel-way-design-panel'
) );

/*enable disable animation*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-enable-animation]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-enable-animation'],
    'sanitize_callback' => 'travel_way_sanitize_checkbox'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-enable-animation]', array(
    'label'		        => esc_html__( 'Disable animation', 'travel-way' ),
    'description'       => esc_html__( 'Check this to disable overall site animation effect provided by theme', 'travel-way' ),
    'section'           => 'travel-way-animation',
    'settings'          => 'travel_way_theme_options[travel-way-enable-animation]',
    'type'	  	        => 'checkbox'
) );