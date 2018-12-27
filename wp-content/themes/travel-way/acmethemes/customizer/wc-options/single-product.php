<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'travel-way-wc-single-product-options', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Product', 'travel-way' ),
	'panel'          => 'travel-way-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-wc-single-product-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-wc-single-product-sidebar-layout'],
	'sanitize_callback' => 'travel_way_sanitize_select'
) );
$choices = travel_way_sidebar_layout();
$wp_customize->add_control( 'travel_way_theme_options[travel-way-wc-single-product-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Single Product Sidebar Layout', 'travel-way' ),
	'section'   => 'travel-way-wc-single-product-options',
	'settings'  => 'travel_way_theme_options[travel-way-wc-single-product-sidebar-layout]',
	'type'	  	=> 'select'
) );