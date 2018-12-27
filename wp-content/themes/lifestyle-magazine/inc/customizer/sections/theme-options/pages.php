<?php
/**
 * Pages Settings
 *
 * @package Lifestyle Magazine
 */
add_action( 'customize_register', 'lifestyle_magazine_customize_register_pages_section' );

function lifestyle_magazine_customize_register_pages_section( $wp_customize ) {

  $wp_customize->add_section( 'lifestyle_magazine_pages_sections', array(
    'title'          => esc_html__( 'Pages Section', 'lifestyle-magazine' ),
    'description'    => esc_html__( 'Pages section :', 'lifestyle-magazine' ),
    'panel'          => 'lifestyle_magazine_theme_options_panel',
  ) );

  $wp_customize->add_setting( 'pages_display_option', array(
      'sanitize_callback'     =>  'lifestyle_magazine_sanitize_checkbox',
      'default'               =>  false
  ) );

  $wp_customize->add_control( new Lifestyle_Magazine_Toggle_Control( $wp_customize, 'pages_display_option', array(
      'label' => esc_html__( 'Hide / Show','lifestyle-magazine' ),
      'section' => 'lifestyle_magazine_pages_sections',
      'settings' => 'pages_display_option',
      'type'=> 'toggle',
  ) ) );

  $wp_customize->add_setting( new Lifestyle_Magazine_Repeater_Setting( $wp_customize, 'pages', array(
    'default' => '',
    'sanitize_callback' => array( 'Lifestyle_Magazine_Repeater_Setting', 'sanitize_repeater_setting' ),
  ) ) );

  $page_query = get_pages();
  $pages = array();
  $pages[ '' ] = esc_attr__( "-- Select --", 'lifestyle-magazine' );
  foreach ( $page_query as $page ) {
    $pages[ $page->ID ] = $page->post_title;
  }
  
  
    
  $wp_customize->add_control( new Lifestyle_Magazine_Control_Repeater( $wp_customize, 'pages', array(
    'section' => 'lifestyle_magazine_pages_sections',
    'settings'    => 'pages',
    'label'   => esc_html__( 'Pages :', 'lifestyle-magazine' ),
    'row_label' => array(
      'type' => 'text',
      'value' => esc_html__( 'Page', 'lifestyle-magazine' ),
    ),
    'button_label' => esc_attr__( 'New Page', 'lifestyle-magazine' ),
    'fields' => array(
      'page' => array(
        'type'        => 'select',
        'default'     => '',
        'label'       => esc_html__( 'Select a page', 'lifestyle-magazine' ),
        'choices' => $pages
      )
    )                   
  ) ) );

}