<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'firm_graphy_layout', array(
	'title'               => esc_html__('Layout','firm-graphy'),
	'description'         => esc_html__( 'Layout section options.', 'firm-graphy' ),
	'panel'               => 'firm_graphy_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[site_layout]', array(
	'sanitize_callback'   => 'firm_graphy_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Firm_Graphy_Custom_Radio_Image_Control ( $wp_customize, 'firm_graphy_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'firm-graphy' ),
	'section'             => 'firm_graphy_layout',
	'choices'			  => firm_graphy_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'firm_graphy_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Firm_Graphy_Custom_Radio_Image_Control ( $wp_customize, 'firm_graphy_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'firm-graphy' ),
	'section'             => 'firm_graphy_layout',
	'choices'			  => firm_graphy_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'firm_graphy_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Firm_Graphy_Custom_Radio_Image_Control ( $wp_customize, 'firm_graphy_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'firm-graphy' ),
	'section'             => 'firm_graphy_layout',
	'choices'			  => firm_graphy_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'firm_graphy_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Firm_Graphy_Custom_Radio_Image_Control( $wp_customize, 'firm_graphy_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'firm-graphy' ),
	'section'             => 'firm_graphy_layout',
	'choices'			  => firm_graphy_sidebar_position(),
) ) );