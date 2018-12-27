<?php
/*adding sections for breadcrumb */
$wp_customize->add_section( 'travel-way-breadcrumb-options', array(
    'priority'          => 20,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Breadcrumb Options', 'travel-way' ),
    'panel'             => 'travel-way-options'
) );

/*show breadcrumb*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-show-breadcrumb]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-show-breadcrumb'],
    'sanitize_callback' => 'travel_way_sanitize_checkbox'
) );

$wp_customize->add_control( 'travel_way_theme_options[travel-way-show-breadcrumb]', array(
    'label'		        => esc_html__( 'Enable Breadcrumb', 'travel-way' ),
    'section'           => 'travel-way-breadcrumb-options',
    'settings'          => 'travel_way_theme_options[travel-way-show-breadcrumb]',
    'type'	  	        => 'checkbox'
) );