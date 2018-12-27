<?php
/*ading theme options panel*/
$wp_customize->add_panel( 'travel-way-single-post', array(
	'priority'       => 85,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Post Option', 'travel-way' )
) );

/*
* file for entry meta
*/
require_once travel_way_file_directory('acmethemes/customizer/single-posts/header-title.php');

/*
* file for feature-image
*/
require_once travel_way_file_directory('acmethemes/customizer/single-posts/feature-image.php');