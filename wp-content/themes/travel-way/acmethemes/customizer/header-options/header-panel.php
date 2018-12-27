<?php
/*adding header options panel*/
$wp_customize->add_panel( 'travel-way-header-panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Header Options', 'travel-way' ),
    'description'    => esc_html__( 'Customize your awesome site header ', 'travel-way' )
) );

/*
* file for header top options
*/
require travel_way_file_directory('acmethemes/customizer/header-options/header-top.php');

/*
* file for feature info
*/
require travel_way_file_directory('acmethemes/customizer/header-options/feature-info.php');

/*
* file for header logo options
*/
require travel_way_file_directory('acmethemes/customizer/header-options/header-logo.php');

/*
 * file for menu options
*/
require travel_way_file_directory('acmethemes/customizer/header-options/menu-options.php');

/*
* file for booking form
*/
require travel_way_file_directory('acmethemes/customizer/header-options/popup-widgets.php');

/*adding header image inside this panel*/
$wp_customize->get_section( 'header_image' )->panel = 'travel-way-header-panel';
$wp_customize->get_section( 'header_image' )->description = esc_html__( 'Applied to header image of inner pages.', 'travel-way' );

/* feature section height*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-header-height]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-header-height'],
    'sanitize_callback' => 'travel_way_sanitize_number'
) );

$wp_customize->add_control( 'travel_way_theme_options[travel-way-header-height]', array(
    'type'              => 'range',
    'priority'          => 100,
    'section'           => 'header_image',
    'label'		        => esc_html__( 'Inner Page Header Section Height', 'travel-way' ),
    'description'       => esc_html__( 'Control the height of Header section. The minimum height is 100px and maximium height is 1000px', 'travel-way' ),
    'input_attrs'       => array(
        'min'           => 100,
        'max'           => 1000,
        'step'          => 1,
        'class'         => 'travel-way-header-height',
        'style'         => 'color: #0a0',
    ),
    'active_callback'   => 'travel_way_if_header_bg_image'
) );

/*Header Image Display*/
$choices = travel_way_header_image_display();
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-header-image-display]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['travel-way-header-image-display'],
	'sanitize_callback'         => 'travel_way_sanitize_select'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-header-image-display]', array(
	'choices'  	                => $choices,
	'priority'                  => 1,
	'label'		                => esc_html__( 'Header Image Display', 'travel-way' ),
	'section'                   => 'header_image',
	'settings'                  => 'travel_way_theme_options[travel-way-header-image-display]',
	'type'	  	                => 'select'
) );

/*check if header bg*/
if ( !function_exists('travel_way_if_header_bg_image') ) :
	function travel_way_if_header_bg_image() {
		$travel_way_customizer_all_values = travel_way_get_theme_options();
		if( 'bg-image' == $travel_way_customizer_all_values['travel-way-header-image-display'] ){
			return true;
		}
		return false;
	}
endif;