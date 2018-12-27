<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'firm_graphy_single_post_section', array(
	'title'             => esc_html__( 'Single Post','firm-graphy' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'firm-graphy' ),
	'panel'             => 'firm_graphy_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'firm-graphy' ),
	'section'           => 'firm_graphy_single_post_section',
	'on_off_label' 		=> firm_graphy_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'firm-graphy' ),
	'section'           => 'firm_graphy_single_post_section',
	'on_off_label' 		=> firm_graphy_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'firm-graphy' ),
	'section'           => 'firm_graphy_single_post_section',
	'on_off_label' 		=> firm_graphy_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'firm-graphy' ),
	'section'           => 'firm_graphy_single_post_section',
	'on_off_label' 		=> firm_graphy_hide_options(),
) ) );
