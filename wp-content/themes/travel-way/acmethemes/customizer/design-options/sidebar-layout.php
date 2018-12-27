<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'travel-way-design-sidebar-layout-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Default Page/Post Sidebar Layout', 'travel-way' ),
    'panel'          => 'travel-way-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-single-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-single-sidebar-layout'],
    'sanitize_callback' => 'travel_way_sanitize_select'
) );
$choices = travel_way_sidebar_layout();
$wp_customize->add_control( 'travel_way_theme_options[travel-way-single-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Default Page/Post Sidebar Layout', 'travel-way' ),
    'description'       => esc_html__( 'Single Page/Post Sidebar', 'travel-way' ),
    'section'           => 'travel-way-design-sidebar-layout-option',
    'settings'          => 'travel_way_theme_options[travel-way-single-sidebar-layout]',
    'type'	  	        => 'select'
) );