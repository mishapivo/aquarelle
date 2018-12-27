<?php
/**
* pagination options
*
* @package Theme Palace
* @subpackage EduMag
* @since EduMag 0.1
*/

// Add sidebar section
$wp_customize->add_section( 'edumag_pagination', 
	array(
		'title'               => esc_html__( 'Pagination','edumag' ),
		'description'         => esc_html__( 'Pagination section options.', 'edumag' ),
		'panel'               => 'edumag_theme_options_panel',
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'edumag_theme_options[pagination_enable]', 
	array(
		'sanitize_callback'   => 'edumag_sanitize_checkbox',
		'default'             => $options['pagination_enable'],
	)
);

$wp_customize->add_control( 'edumag_theme_options[pagination_enable]', 
	array(
		'label'               => esc_html__( 'Pagination Enable', 'edumag' ),
		'section'             => 'edumag_pagination',
		'type'                => 'checkbox',
	)
);