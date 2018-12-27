<?php
/*adding sections for feature image selection*/
$wp_customize->add_section( 'travel-way-single-feature-image', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Feature Image Option', 'travel-way' ),
    'panel'          => 'travel-way-single-post'
) );

/*single image size*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-single-img-size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-single-img-size'],
	'sanitize_callback' => 'travel_way_sanitize_select'
) );
$choices = travel_way_get_image_sizes_options(1);
$wp_customize->add_control( 'travel_way_theme_options[travel-way-single-img-size]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Image Size', 'travel-way' ),
	'section'   => 'travel-way-single-feature-image',
	'settings'  => 'travel_way_theme_options[travel-way-single-img-size]',
	'type'	  	=> 'select'
) );