<?php
/*Site Logo*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-display-site-logo]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-display-site-logo'],
	'sanitize_callback' => 'travel_way_sanitize_checkbox'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-display-site-logo]', array(
	'label'		=> esc_html__( 'Display Logo', 'travel-way' ),
	'section'   => 'title_tagline',
	'settings'  => 'travel_way_theme_options[travel-way-display-site-logo]',
	'type'	  	=> 'checkbox'
) );

/*Site Title*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-display-site-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-display-site-title'],
	'sanitize_callback' => 'travel_way_sanitize_checkbox'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-display-site-title]', array(
	'label'		=> esc_html__( 'Display Site Title', 'travel-way' ),
	'section'   => 'title_tagline',
	'settings'  => 'travel_way_theme_options[travel-way-display-site-title]',
	'type'	  	=> 'checkbox'
) );

/*Site Tagline*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-display-site-tagline]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-display-site-tagline'],
	'sanitize_callback' => 'travel_way_sanitize_checkbox'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-display-site-tagline]', array(
	'label'		=> esc_html__( 'Display Site Tagline', 'travel-way' ),
	'section'   => 'title_tagline',
	'settings'  => 'travel_way_theme_options[travel-way-display-site-tagline]',
	'type'	  	=> 'checkbox'
) );