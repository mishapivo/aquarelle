<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'firm_graphy_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','firm-graphy' ),
	'description'       => esc_html__( 'Archive section options.', 'firm-graphy' ),
	'panel'             => 'firm_graphy_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'firm_graphy_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'firm-graphy' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'firm-graphy' ),
	'section'           => 'firm_graphy_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'firm_graphy_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'firm-graphy' ),
	'section'           => 'firm_graphy_archive_section',
	'on_off_label' 		=> firm_graphy_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'firm-graphy' ),
	'section'           => 'firm_graphy_archive_section',
	'on_off_label' 		=> firm_graphy_hide_options(),
) ) );

// Archive author author setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[hide_author]', array(
	'default'           => $options['hide_author'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'firm-graphy' ),
	'section'           => 'firm_graphy_archive_section',
	'on_off_label' 		=> firm_graphy_hide_options(),
) ) );
