<?php
/*adding sections for header options panel*/
$wp_customize->add_section( 'corporate-plus-animation', array(
    'priority'       => 2,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Animation', 'corporate-plus' ),
    'panel'          => 'corporate-plus-design-panel'
) );

/*header logo text display options*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-enable-animation]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['corporate-plus-enable-animation'],
    'sanitize_callback' => 'corporate_plus_sanitize_checkbox'
) );
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-enable-animation]', array(
    'label'		=> __( 'Disable animation', 'corporate-plus' ),
    'section'   => 'corporate-plus-animation',
    'settings'  => 'corporate_plus_theme_options[corporate-plus-enable-animation]',
    'type'	  	=> 'checkbox',
    'priority'  => 20
) );