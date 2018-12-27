<?php
/*adding sections for footer social options */
$wp_customize->add_section( 'corporate-plus-front-page-content', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Front Page Content Options', 'corporate-plus' ),
    'panel'          => 'corporate-plus-design-panel'

) );

/*enable front page*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-hide-front-page-content]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['corporate-plus-hide-front-page-content'],
    'sanitize_callback' => 'corporate_plus_sanitize_checkbox',
) );
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-hide-front-page-content]', array(
    'label'		 => __( 'Hide Front Page Content', 'corporate-plus' ),
    'description'=> __( 'You may want to hide front page content( Blog or Static page content). Check this to hide them', 'corporate-plus' ),
    'section'   => 'corporate-plus-front-page-content',
    'settings'  => 'corporate_plus_theme_options[corporate-plus-hide-front-page-content]',
    'type'	  	=> 'checkbox',
    'priority'  => 100
) );