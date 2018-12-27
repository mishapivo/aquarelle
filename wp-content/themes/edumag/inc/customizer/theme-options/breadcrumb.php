<?php
/**
* Breadcrumb options
*
* @package Theme Palace
* @subpackage EduMag
* @since EduMag 0.1
*/

$wp_customize->add_section( 'edumag_breadcrumb', 
	array(
		'title'             => esc_html__( 'Breadcrumb','edumag' ),
		'description'       => esc_html__( 'Breadcrumb section options.', 'edumag' ),
		'panel'             => 'edumag_theme_options_panel',
	)
);

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'edumag_theme_options[breadcrumb_enable]', 
	array(
		'sanitize_callback'	=> 'edumag_sanitize_checkbox',
		'default'          	=> $options['breadcrumb_enable'],
	)
);

$wp_customize->add_control( 'edumag_theme_options[breadcrumb_enable]', 
	array(
		'label'            	=> esc_html__( 'Enable Breadcrumb', 'edumag' ),
		'section'          	=> 'edumag_breadcrumb',
		'type'             	=> 'checkbox',
	)
);