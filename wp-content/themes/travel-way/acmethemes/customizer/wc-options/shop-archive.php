<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'travel-way-wc-shop-archive-option', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Shop Archive Sidebar Layout', 'travel-way' ),
	'panel'          => 'travel-way-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-wc-shop-archive-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-wc-shop-archive-sidebar-layout'],
	'sanitize_callback' => 'travel_way_sanitize_select'
) );
$choices = travel_way_sidebar_layout();
$wp_customize->add_control( 'travel_way_theme_options[travel-way-wc-shop-archive-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Shop Archive Sidebar Layout', 'travel-way' ),
	'section'   => 'travel-way-wc-shop-archive-option',
	'settings'  => 'travel_way_theme_options[travel-way-wc-shop-archive-sidebar-layout]',
	'type'	  	=> 'select'
) );

/*wc-product-column-number*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-wc-product-column-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-wc-product-column-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-wc-product-column-number]', array(
	'label'		=> esc_html__( 'Products Per Row', 'travel-way' ),
	'section'   => 'travel-way-wc-shop-archive-option',
	'settings'  => 'travel_way_theme_options[travel-way-wc-product-column-number]',
	'type'	  	=> 'number'
) );

/*wc-shop-archive-total-product*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-wc-shop-archive-total-product]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-wc-shop-archive-total-product'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-wc-shop-archive-total-product]', array(
	'label'		=> esc_html__( 'Total Products Per Page', 'travel-way' ),
	'section'   => 'travel-way-wc-shop-archive-option',
	'settings'  => 'travel_way_theme_options[travel-way-wc-shop-archive-total-product]',
	'type'	  	=> 'number'
) );