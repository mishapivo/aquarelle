<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

$wp_customize->add_section( 'firm_graphy_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','firm-graphy' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'firm-graphy' ),
	'panel'             => 'firm_graphy_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'firm-graphy' ),
	'section'          	=> 'firm_graphy_breadcrumb',
	'on_off_label' 		=> firm_graphy_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'firm_graphy_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'firm-graphy' ),
	'active_callback' 	=> 'firm_graphy_is_breadcrumb_enable',
	'section'          	=> 'firm_graphy_breadcrumb',
) );
