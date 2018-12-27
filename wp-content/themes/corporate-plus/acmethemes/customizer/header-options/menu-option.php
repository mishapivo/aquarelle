<?php
/*Menu Section*/
$wp_customize->add_section( 'corporate-plus-header-menu', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Menu Options', 'corporate-plus' ),
    'panel'          => 'corporate-plus-header-panel'
) );

/*disable sticky-menu*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-enable-sticky-menu]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['corporate-plus-enable-sticky-menu'],
    'sanitize_callback' => 'corporate_plus_sanitize_checkbox'
) );
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-enable-sticky-menu]', array(
    'label'		=> __( 'Enable Sticky Menu', 'corporate-plus' ),
    'section'   => 'corporate-plus-header-menu',
    'settings'  => 'corporate_plus_theme_options[corporate-plus-enable-sticky-menu]',
    'type'	  	=> 'checkbox',
    'priority'  => 70
) );

$corporate_plus_is_woocommerce_active = corporate_plus_is_woocommerce_active();
if( 1 == $corporate_plus_is_woocommerce_active ){
    /*disable sticky-menu*/
    $wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-enable-woo-menu]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $defaults['corporate-plus-enable-woo-menu'],
        'sanitize_callback' => 'corporate_plus_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-enable-woo-menu]', array(
        'label'		=> __( 'Enable WooCommerce On Menu', 'corporate-plus' ),
        'section'   => 'corporate-plus-header-menu',
        'settings'  => 'corporate_plus_theme_options[corporate-plus-enable-woo-menu]',
        'type'	  	=> 'checkbox',
        'priority'  => 70
    ) );
}