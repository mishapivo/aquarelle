<?php
/**
 * Category Display Settings
 *
 * @package Lifestyle Magazine
 */


function get_dropdown_categories() {
  $terms = get_terms( 'category' );
  $cat = array();
  if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ) {
      $cat[ $term->term_id ] = $term->name;
    }
  }
  return $cat;
}

add_action( 'customize_register', 'lifestyle_magazine_customize_register_category_display' );

function lifestyle_magazine_customize_register_category_display( $wp_customize ) {
	$wp_customize->add_section( 'lifestyle_magazine_category_display_sections', array(
	    'title'          => esc_html__( 'Category Display Section', 'lifestyle-magazine' ),
	    'description'    => esc_html__( 'Category Display Section :', 'lifestyle-magazine' ),
	    'panel'          => 'lifestyle_magazine_theme_options_panel',
	) );

    $wp_customize->add_setting( 'category_display_option', array(
      'sanitize_callback'     =>  'lifestyle_magazine_sanitize_checkbox',
      'default'               =>  false
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Toggle_Control( $wp_customize, 'category_display_option', array(
      'label' => esc_html__( 'Hide / Show','lifestyle-magazine' ),
      'section' => 'lifestyle_magazine_category_display_sections',
      'settings' => 'category_display_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( new Lifestyle_Magazine_Repeater_Setting( $wp_customize, 'category_display_block', array(
        'default'     => '',
    'sanitize_callback' => array( 'Lifestyle_Magazine_Repeater_Setting', 'sanitize_repeater_setting' ),
    ) ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Control_Repeater( $wp_customize, 'category_display_block', array(
      'label' => esc_html__( 'Categories :','lifestyle-magazine' ),
      'section' => 'lifestyle_magazine_category_display_sections',
      'settings' => 'category_display_block',
      'type'=> 'repeater',
      'row_label' => array(
        'type'  => 'field',
        'value' => esc_attr__( 'Category', 'lifestyle-magazine' ),
        'field' => 'category_block_title',
      ),
      'fields' => array(
        'category_block_title' => array(
          'type'        => 'text',
          'label'       => esc_attr__( 'Title', 'lifestyle-magazine' ),
          'description' => esc_attr__( 'This will be the label.', 'lifestyle-magazine' ),
          'default'     => '',
        ),
        'category' => array(
          'type'        => 'select',
          'label'       => esc_attr__( 'Category', 'lifestyle-magazine' ),
          'choices'     => get_dropdown_categories(),
        ),
        'layout' => array(
          'type'      => 'select',
          'default'   =>  '1',
          'label'     => esc_attr__( 'Layouts', 'lifestyle-magazine' ),
          'choices'   => array(
              '1' => 'Layout 1',
              '2' => 'Layout 2',
              '3' => 'Layout 3',
              '4' => 'Layout 4',
          )
        ),
        'number_of_posts' => array(
          'type'        => 'text',
          'label'       => esc_attr__( 'Number of posts', 'lifestyle-magazine' ),
          'description' =>  esc_attr__( 'Put -1 for unlimited', 'lifestyle-magazine' )
        ),     
      )

    ) ) );

    $wp_customize->add_setting( 'category_display_show_hide_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'lifestyle_magazine_sanitize_array',
        'default'     => array( 'date', 'categories', 'tags' ),
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Multi_Check_Control( $wp_customize, 'category_display_show_hide_details', array(
        'label' => esc_html__( 'Hide / Show Details :', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_category_display_sections',
        'settings' => 'category_display_show_hide_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show post author', 'lifestyle-magazine' ),
            'date' => esc_html__( 'Show post date', 'lifestyle-magazine' ),     
            'categories' => esc_html__( 'Show Categories', 'lifestyle-magazine' ),
            'tags' => esc_html__( 'Show Tags', 'lifestyle-magazine' ),
            'number_of_comments' => esc_html__( 'Show number of comments', 'lifestyle-magazine' ),
            'read-more'   =>  esc_html__( 'Show Read More', 'lifestyle-magazine' ),
        ),
    ) ) );
    

}