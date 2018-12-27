<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'tourable_single_post_section', array(
	'title'             => esc_html__( 'Single Post','tourable' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'tourable' ),
	'panel'             => 'tourable_theme_options_panel',
) );

// Tourable date meta setting and control.
$wp_customize->add_setting( 'tourable_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'tourable' ),
	'section'           => 'tourable_single_post_section',
	'on_off_label' 		=> tourable_hide_options(),
) ) );

// Tourable author meta setting and control.
$wp_customize->add_setting( 'tourable_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'tourable' ),
	'section'           => 'tourable_single_post_section',
	'on_off_label' 		=> tourable_hide_options(),
) ) );

// Tourable author category setting and control.
$wp_customize->add_setting( 'tourable_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'tourable' ),
	'section'           => 'tourable_single_post_section',
	'on_off_label' 		=> tourable_hide_options(),
) ) );

// Tourable tag category setting and control.
$wp_customize->add_setting( 'tourable_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'tourable' ),
	'section'           => 'tourable_single_post_section',
	'on_off_label' 		=> tourable_hide_options(),
) ) );
