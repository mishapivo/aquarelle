<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'tourable_blog_section', array(
	'title'             => esc_html__( 'Blog','tourable' ),
	'description'       => esc_html__( 'Blog Section options.', 'tourable' ),
	'panel'             => 'tourable_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'tourable_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'tourable' ),
	'section'           => 'tourable_blog_section',
	'on_off_label' 		=> tourable_switch_options(),
) ) );

// blog title setting and control
$wp_customize->add_setting( 'tourable_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tourable_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'tourable' ),
	'section'        	=> 'tourable_blog_section',
	'active_callback' 	=> 'tourable_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tourable_theme_options[blog_title]', array(
		'selector'            => '#latest-posts .section-header h2.section-title',
		'settings'            => 'tourable_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tourable_blog_title_partial',
    ) );
}

// blog title setting and control
$wp_customize->add_setting( 'tourable_theme_options[blog_read_more]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_read_more'],
) );

$wp_customize->add_control( 'tourable_theme_options[blog_read_more]', array(
	'label'           	=> esc_html__( 'Read More Text', 'tourable' ),
	'section'        	=> 'tourable_blog_section',
	'active_callback' 	=> 'tourable_is_blog_section_enable',
	'type'				=> 'text',
) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'tourable_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'tourable_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Tourable_Dropdown_Category_Control( $wp_customize,'tourable_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'tourable' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Shift key select multilple categories.', 'tourable' ),
	'section'           => 'tourable_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'tourable_is_blog_section_enable'
) ) );
