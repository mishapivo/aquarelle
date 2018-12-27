<?php
/*adding sections for header title*/
$wp_customize->add_section( 'travel-way-single-header-title', array(
	'priority'              => 20,
	'capability'            => 'edit_theme_options',
	'title'                 => esc_html__( 'Single Header Title', 'travel-way' ),
	'panel'                 => 'travel-way-single-post',
) );

/*header title*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-single-header-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-single-header-title'],
	'sanitize_callback'     => 'sanitize_text_field'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-single-header-title]', array(
	'label'		            => esc_html__( 'Header Title', 'travel-way' ),
	'section'               => 'travel-way-single-header-title',
	'settings'              => 'travel_way_theme_options[travel-way-single-header-title]',
	'type'	  	            => 'text'
) );