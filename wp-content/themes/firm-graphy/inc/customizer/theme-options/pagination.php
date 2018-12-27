<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'firm_graphy_pagination', array(
	'title'               => esc_html__('Pagination','firm-graphy'),
	'description'         => esc_html__( 'Pagination section options.', 'firm-graphy' ),
	'panel'               => 'firm_graphy_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'firm-graphy' ),
	'section'             => 'firm_graphy_pagination',
	'on_off_label' 		=> firm_graphy_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'firm_graphy_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'firm_graphy_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'firm-graphy' ),
	'section'             => 'firm_graphy_pagination',
	'type'                => 'select',
	'choices'			  => firm_graphy_pagination_options(),
	'active_callback'	  => 'firm_graphy_is_pagination_enable',
) );
