<?php
/**
* Layout options
*
* @package Theme Palace
* @subpackage EduMag
* @since EduMag 0.1
*/

// Add sidebar section
$wp_customize->add_section( 'edumag_layout', 
	array(
		'title'               => esc_html__( 'Layout','edumag' ),
		'description'         => esc_html__( 'Layout section options.', 'edumag' ),
		'panel'               => 'edumag_theme_options_panel',
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'edumag_theme_options[sidebar_position]', 
	array(
		'sanitize_callback'   => 'edumag_sanitize_select',
		'default'             => $options['sidebar_position'],
	)
);

$wp_customize->add_control( 'edumag_theme_options[sidebar_position]', 
	array(
		'label'               => esc_html__( 'Sidebar Position', 'edumag' ),
		'section'             => 'edumag_layout',
		'type'                => 'select',
		'choices'			  => edumag_sidebar_position(),
	)
);

// Site layout setting and control.
$wp_customize->add_setting( 'edumag_theme_options[site_layout]', 
	array(
		'sanitize_callback'   => 'edumag_sanitize_select',
		'default'             => $options['site_layout'],
	)
);

$wp_customize->add_control( 'edumag_theme_options[site_layout]', 
	array(
		'label'               => esc_html__( 'Site Layout', 'edumag' ),
		'section'             => 'edumag_layout',
		'type'                => 'select',
		'choices'			  => edumag_site_layout(),
	)
);
