<?php
/**
 * Drag & Drop Sections
 *
 * @package Lifestyle Magazine
 */
add_action( 'customize_register', 'lifestyle_magazine_drag_and_drop_sections' );

function lifestyle_magazine_drag_and_drop_sections( $wp_customize ) {

	$wp_customize->add_section( 'lifestyle_magazine_sort_homepage_sections', array(
	    'title'          => esc_html__( 'Drag & Drop', 'lifestyle-magazine' ),
	    'description'    => esc_html__( 'Drag & Drop', 'lifestyle-magazine' ),
	    'panel'          => 'lifestyle_magazine_theme_options_panel',
	) );

	
	$default = array( 'slider', 'pages', 'blog-list', 'category-display' );

	$choices = array(
		'slider' => esc_html__( 'Slider Section', 'lifestyle-magazine' ),
		'pages' => esc_html__( 'Pages Section', 'lifestyle-magazine' ),
		'blog-list' => esc_html__( 'Blog List Section', 'lifestyle-magazine' ),
		'category-display' => esc_html__( 'Category Display Section', 'lifestyle-magazine' ),
	);
	

	$wp_customize->add_setting( 'lifestyle_magazine_sort_homepage', array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback'	=> 'lifestyle_magazine_sanitize_array',
        'default'     => $default
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Control_Sortable( $wp_customize, 'lifestyle_magazine_sort_homepage', array(
        'label' => esc_html__( 'Drag and Drop Sections to rearrange.', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_sort_homepage_sections',
        'settings' => 'lifestyle_magazine_sort_homepage',
        'type'=> 'sortable',
        'choices'     => $choices
    ) ) );

}