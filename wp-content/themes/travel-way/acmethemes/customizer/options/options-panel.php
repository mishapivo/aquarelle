<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'travel-way-options', array(
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Theme Options', 'travel-way' ),
    'description'    => esc_html__( 'Customize your awesome site with theme options ', 'travel-way' )
) );

/*
* file for header breadcrumb options
*/
require travel_way_file_directory('acmethemes/customizer/options/breadcrumb.php');

/*
* file for header search options
*/
require travel_way_file_directory('acmethemes/customizer/options/search.php');

/*
* file for social options
*/
require travel_way_file_directory('acmethemes/customizer/options/social-options.php');