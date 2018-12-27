<?php
/*adding sections for Search Placeholder*/
$wp_customize->add_section( 'travel-way-search', array(
    'priority'          => 20,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Search', 'travel-way' ),
    'panel'             => 'travel-way-options'
) );

/*Search Placeholder*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-search-placeholder]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-search-placeholder'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-search-placeholder]', array(
    'label'		        => esc_html__( 'Search Placeholder', 'travel-way' ),
    'section'           => 'travel-way-search',
    'settings'          => 'travel_way_theme_options[travel-way-search-placeholder]',
    'type'	  	        => 'text'
) );