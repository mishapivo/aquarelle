<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'tourable_layout', array(
	'title'               => esc_html__('Layout','tourable'),
	'description'         => esc_html__( 'Layout section options.', 'tourable' ),
	'panel'               => 'tourable_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'tourable_theme_options[site_layout]', array(
	'sanitize_callback'   => 'tourable_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Tourable_Custom_Radio_Image_Control ( $wp_customize, 'tourable_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'tourable' ),
	'section'             => 'tourable_layout',
	'choices'			  => tourable_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'tourable_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'tourable_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Tourable_Custom_Radio_Image_Control ( $wp_customize, 'tourable_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'tourable' ),
	'section'             => 'tourable_layout',
	'choices'			  => tourable_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'tourable_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'tourable_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Tourable_Custom_Radio_Image_Control ( $wp_customize, 'tourable_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'tourable' ),
	'section'             => 'tourable_layout',
	'choices'			  => tourable_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'tourable_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'tourable_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Tourable_Custom_Radio_Image_Control( $wp_customize, 'tourable_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'tourable' ),
	'section'             => 'tourable_layout',
	'choices'			  => tourable_sidebar_position(),
) ) );