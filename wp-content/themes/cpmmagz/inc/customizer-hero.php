<?php
	//customizer for Highlight section
if(!function_exists('cpmmagz_hero_section_customizer')):
  function cpmmagz_hero_section_customizer( $wp_customize ) {
    /*showcase single post*/
    $wp_customize->add_section( 'showcase_single_hero' , array(
     'title'      => esc_attr__( 'Hero Section ', 'cpmmagz' ),
     'priority'   =>4,
     'panel'    => 'cpm_theme_options_panel',
     ) );

    $wp_customize->add_setting( 'showcase-single-hero' , array(
     'default'           => '',
     'type'           => 'option',
     'capability'     => 'edit_theme_options',
     'sanitize_callback' => 'esc_html'
     ) );

    $wp_customize->add_control(  new WP_Customize_Category_Control(
       $wp_customize,
       'showcase-single-hero',
       array(
           'label'    => esc_html__( 'Select Category', 'cpmmagz' ),
           'section'  => 'showcase_single_hero',
           'type'     => 'select',

           ) ));
  }
  add_action( 'customize_register', 'cpmmagz_hero_section_customizer');
endif;