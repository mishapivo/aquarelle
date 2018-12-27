<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'travel-way-front-page-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Front/Home Sidebar Layout', 'travel-way' ),
    'panel'          => 'travel-way-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-front-page-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-front-page-sidebar-layout'],
    'sanitize_callback' => 'travel_way_sanitize_select'
) );
$choices = travel_way_sidebar_layout();
$wp_customize->add_control( 'travel_way_theme_options[travel-way-front-page-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Front/Home Sidebar Layout', 'travel-way' ),
    'section'           => 'travel-way-front-page-sidebar-layout',
    'settings'          => 'travel_way_theme_options[travel-way-front-page-sidebar-layout]',
    'type'	  	        => 'select'
) );