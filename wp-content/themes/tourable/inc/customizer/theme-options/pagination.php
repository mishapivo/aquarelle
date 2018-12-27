<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'tourable_pagination', array(
	'title'               => esc_html__('Pagination','tourable'),
	'description'         => esc_html__( 'Pagination section options.', 'tourable' ),
	'panel'               => 'tourable_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'tourable_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'tourable_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'tourable' ),
	'section'             => 'tourable_pagination',
	'on_off_label' 		=> tourable_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'tourable_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'tourable_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'tourable_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'tourable' ),
	'section'             => 'tourable_pagination',
	'type'                => 'select',
	'choices'			  => tourable_pagination_options(),
	'active_callback'	  => 'tourable_is_pagination_enable',
) );
