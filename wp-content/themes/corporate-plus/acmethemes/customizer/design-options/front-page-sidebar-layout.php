<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'corporate-plus-front-page-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Front/Home Sidebar Layout', 'corporate-plus' ),
    'panel'          => 'corporate-plus-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-front-page-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['corporate-plus-front-page-sidebar-layout'],
    'sanitize_callback' => 'corporate_plus_sanitize_select'
) );
$choices = corporate_plus_sidebar_layout();
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-front-page-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Front/Home Sidebar Layout', 'corporate-plus' ),
    'section'   => 'corporate-plus-front-page-sidebar-layout',
    'settings'  => 'corporate_plus_theme_options[corporate-plus-front-page-sidebar-layout]',
    'type'	  	=> 'select'
) );