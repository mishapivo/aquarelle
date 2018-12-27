<?php

/*  Customize Settings Start  */

function tethys_custom_logo_setup() {
    $defaults = array(
        'height'      => 35,
        'width'       => 126,
        'flex-height' => true,
		'flex-width'  => true,
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'tethys_custom_logo_setup' );

 function tethys_categories_select() {
	  $cats = array();
	  $cats[0] = esc_html__( 'All', 'tethys' );
	  foreach ( get_categories() as $categories => $category ) {
	    $cats[$category->term_id] = $category->name;
	  }
	  return $cats;
}

function tethys_sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function tethys_sanitize_select( $input, $setting ) {
	
	$input = sanitize_key( $input );

	$choices = $setting->manager->get_control( $setting->id )->choices;

	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function tethys_sanitize_url( $url ) {
	return esc_url_raw( $url );
}

function tethys_customizer_setting($wp_customize) {

    /*  Main Color  */

    $wp_customize->add_setting( 'main_color', array(
		'default' => '#f39c12',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_color', array(
	    'label'   => esc_html__( 'Main Color', 'tethys' ),
	    'section' => 'colors',
	    'settings'   => 'main_color'
	)));


	/*  Posts Settings  */

	$wp_customize->add_section( 'tethys_posts_settings' , array(
	    'title'      => esc_html__( 'Posts', 'tethys' ),
	    'priority'   => 130,
	) );

	/*  --- Related posts ---  */

	$wp_customize->add_setting( 'tethys_related_posts', array(
		'default' => false,
		'sanitize_callback' => 'tethys_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tethys_related_posts', array(
		'label' => esc_html__( 'Enable related posts', 'tethys' ),
	    'section'  => 'tethys_posts_settings',
	    'settings' => 'tethys_related_posts',
	    'type'     => 'checkbox'
	)));

	/*  --- Time ago date format ---  */

	$wp_customize->add_setting( 'tethys_time_ago_format', array(
		'default' => false,
		'sanitize_callback' => 'tethys_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tethys_time_ago_format', array(
		'label' => esc_html__( 'Enable "time ago" date format', 'tethys' ),
	    'section'  => 'tethys_posts_settings',
	    'settings' => 'tethys_time_ago_format',
	    'type'     => 'checkbox'
	)));

}

add_action('customize_register', 'tethys_customizer_setting');

/*  Customize Settings End  */