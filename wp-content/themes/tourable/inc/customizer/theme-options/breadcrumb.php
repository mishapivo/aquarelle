<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

$wp_customize->add_section( 'tourable_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','tourable' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'tourable' ),
	'panel'             => 'tourable_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'tourable_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'tourable_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'tourable' ),
	'section'          	=> 'tourable_breadcrumb',
	'on_off_label' 		=> tourable_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'tourable_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'tourable_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'tourable' ),
	'active_callback' 	=> 'tourable_is_breadcrumb_enable',
	'section'          	=> 'tourable_breadcrumb',
) );
