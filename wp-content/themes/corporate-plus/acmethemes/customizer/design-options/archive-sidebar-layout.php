<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'corporate-plus-archive-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Category/Archive Sidebar Layout', 'corporate-plus' ),
    'panel'          => 'corporate-plus-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-archive-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['corporate-plus-archive-sidebar-layout'],
    'sanitize_callback' => 'corporate_plus_sanitize_select'
) );
$choices = corporate_plus_sidebar_layout();
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-archive-sidebar-layout]', array(
    'choices'  	    => $choices,
    'label'		    => __( 'Category/Archive Sidebar Layout', 'corporate-plus' ),
    'description'   => __( 'Sidebar Layout for listing pages like category, author etc', 'corporate-plus' ),
    'section'       => 'corporate-plus-archive-sidebar-layout',
    'settings'      => 'corporate_plus_theme_options[corporate-plus-archive-sidebar-layout]',
    'type'	  	    => 'select'
) );