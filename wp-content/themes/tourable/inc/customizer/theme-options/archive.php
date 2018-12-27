<?php
/**
 * Tourable options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'tourable_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','tourable' ),
	'description'       => esc_html__( 'Tourable section options.', 'tourable' ),
	'panel'             => 'tourable_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'tourable_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'tourable_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'tourable' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'tourable' ),
	'section'           => 'tourable_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'tourable_is_latest_posts'
) );

// Tourable date meta setting and control.
$wp_customize->add_setting( 'tourable_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'tourable' ),
	'section'           => 'tourable_archive_section',
	'on_off_label' 		=> tourable_hide_options(),
) ) );

// Tourable category setting and control.
$wp_customize->add_setting( 'tourable_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'tourable' ),
	'section'           => 'tourable_archive_section',
	'on_off_label' 		=> tourable_hide_options(),
) ) );
