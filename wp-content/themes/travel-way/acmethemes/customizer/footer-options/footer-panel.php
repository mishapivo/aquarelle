<?php
/*adding footer options panel*/
$wp_customize->add_panel( 'travel-way-footer-panel', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Footer Options', 'travel-way' ),
    'description'    => esc_html__( 'Customize your awesome site footer ', 'travel-way' )
) );

/*
* file for background image
*/
require travel_way_file_directory('acmethemes/customizer/footer-options/footer-bg-img.php');

/*
* file for footer logo options
*/
require travel_way_file_directory('acmethemes/customizer/footer-options/footer-copyright.php');