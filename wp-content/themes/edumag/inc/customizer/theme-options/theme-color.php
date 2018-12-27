<?php
/**
* Theme color options
*
* @package EduMag
* @since EduMag 0.1
*/

// Site layout setting and control.
$wp_customize->add_setting( 'edumag_theme_options[theme_color]', array(
	'sanitize_callback'   => 'edumag_sanitize_select',
	'default'             => $options['theme_color']
) );

$wp_customize->add_control( 'edumag_theme_options[theme_color]', array(
	'label'               => esc_html__( 'Theme Color', 'edumag' ),
	'section'             => 'colors',
	'type'                => 'select',
	'choices'			  => array(
		'blue'			=> esc_html__( 'Blue', 'edumag' ),
		'dark-blue'		=> esc_html__( 'Dark Blue', 'edumag' ),
		),
) );