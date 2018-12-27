<?php

/**
 * Pagination Settings
 *
 * @package Lifestyle Magazine
 */


add_action( 'customize_register', 'lifestyle_magazine_customize_register_pagination_section' );
function lifestyle_magazine_customize_register_pagination_section( $wp_customize ) {

    $wp_customize->add_section( 'lifestyle_magazine_pagination_section', array(
        'title'          => esc_html__( 'Pagination', 'lifestyle-magazine' ),
        'description'    => esc_html__( 'Pagination :', 'lifestyle-magazine' ),
        'panel'          => 'lifestyle_magazine_general_panel',
        'priority'       => 3,        
    ) );
}

add_action( 'customize_register', 'lifestyle_magazine_customize_pagination' );

function lifestyle_magazine_customize_pagination( $wp_customize ) {

    $wp_customize->add_setting( 'pagination_type', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'lifestyle_magazine_sanitize_choices',
        'default'     => 'ajax-loadmore',
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Radio_Buttonset_Control( $wp_customize, 'pagination_type', array(
        'label' => esc_html__( 'Pagination Type :', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_pagination_section',
        'settings' => 'pagination_type',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'ajax-loadmore' => esc_html__( 'Ajax Loadmore', 'lifestyle-magazine' ),
            'number-pagination'    =>  esc_html__( 'Number Pagination', 'lifestyle-magazine' ),      
        ),
    ) ) );            
    
}