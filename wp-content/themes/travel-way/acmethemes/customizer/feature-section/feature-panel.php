<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'travel-way-feature-panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Featured Section Options', 'travel-way' ),
    'description'    => esc_html__( 'Customize your awesome site feature section ', 'travel-way' )
) );

/*
* file for feature section enable
*/
require travel_way_file_directory('acmethemes/customizer/feature-section/feature-enable.php');

/*
* file for feature slider category
*/
require travel_way_file_directory('acmethemes/customizer/feature-section/feature-slider.php');