<?php
/**
 * Recommended Trips Settings
 *
 * @package Lifestyle Magazine
 */


add_action( 'customize_register', 'lifestyle_magazine_customize_register_slider_section' );
function lifestyle_magazine_customize_register_slider_section( $wp_customize ) {
    
	$wp_customize->add_section( 'lifestyle_magazine_slider_sections', array(
	    'title'          => esc_html__( 'Slider Posts', 'lifestyle-magazine' ),
	    'description'    => esc_html__( 'Slider Posts :', 'lifestyle-magazine' ),
	    'panel'          => 'lifestyle_magazine_theme_options_panel',
	) );

    $wp_customize->add_setting( 'slider_display_option', array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback'     =>  'lifestyle_magazine_sanitize_checkbox',
        'default'               =>  false
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Toggle_Control( $wp_customize, 'slider_display_option', array(
        'label' => esc_html__( 'Hide / Show','lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_slider_sections',
        'settings' => 'slider_display_option',
        'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'slider_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'slider_category', array(
        'label' => esc_html__( 'Choose category', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_slider_sections',
        'settings' => 'slider_category',
        'type'=> 'dropdown-taxonomies',
    ) ) );


    $wp_customize->add_setting( 'number_of_slider', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  3
    ) );

    $wp_customize->add_control( 'number_of_slider', array(
        'label' => esc_html__( 'Number of posts', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_slider_sections',
        'settings' => 'number_of_slider',
        'type'=> 'text',
        'description'   =>  'put -1 for unlimited'
    ) );


    $wp_customize->add_setting( 'lifestyle_magazine_slider_layouts', array(  
        'sanitize_callback' => 'lifestyle_magazine_sanitize_choices',
        'default'     => 'one',
        'transport'   => 'postMessage'
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Radio_Image_Control( $wp_customize, 'lifestyle_magazine_slider_layouts', array(
        'label' => esc_html__( 'Slider Layout','lifestyle-magazine' ),
        'description'   => esc_html__( 'More layout options availabe in Pro Version.', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_slider_sections',
        'settings' => 'lifestyle_magazine_slider_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'one'   => get_stylesheet_directory_uri() . '/images/homepage/slider-layouts/slider-layout-one.jpg',
        ),
    ) ) );
    

    $wp_customize->add_setting( 'slider_details_show_hide', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'lifestyle_magazine_sanitize_array',
        'default'     => array( 'date', 'categories', 'summary', 'readmore' ),
    ) );


    $wp_customize->add_control( new Lifestyle_Magazine_Multi_Check_Control( $wp_customize, 'slider_details_show_hide', array(
        'label' => esc_html__( 'Hide / Show Details', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_slider_sections',
        'settings' => 'slider_details_show_hide',
        'type'=> 'multi-check',
        'choices'     => array(            
            'date' => esc_html__( 'Show post date', 'lifestyle-magazine' ),     
            'categories' => esc_html__( 'Show Categories', 'lifestyle-magazine' ),
            'summary' => esc_attr__( 'Show Summary', 'lifestyle-magazine' ),
            'tags' => esc_html__( 'Show Tags', 'lifestyle-magazine' ),            
            'readmore' => esc_html__( 'Show Read More', 'lifestyle-magazine' ),
        ),
    ) ) );

}