<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'firm_graphy_blog_section', array(
	'title'             => esc_html__( 'Blog','firm-graphy' ),
	'description'       => esc_html__( 'Blog Section options.', 'firm-graphy' ),
	'panel'             => 'firm_graphy_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'firm_graphy_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'firm-graphy' ),
	'section'           => 'firm_graphy_blog_section',
	'on_off_label' 		=> firm_graphy_switch_options(),
) ) );

// blog title setting and control
$wp_customize->add_setting( 'firm_graphy_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'firm_graphy_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'firm-graphy' ),
	'section'        	=> 'firm_graphy_blog_section',
	'active_callback' 	=> 'firm_graphy_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'firm_graphy_theme_options[blog_title]', array(
		'selector'            => '#blog .section-header h2.section-title',
		'settings'            => 'firm_graphy_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'firm_graphy_blog_title_partial',
    ) );
}

// Blog content type control and setting
$wp_customize->add_setting( 'firm_graphy_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'firm_graphy_sanitize_select',
) );

$wp_customize->add_control( 'firm_graphy_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'firm-graphy' ),
	'section'           => 'firm_graphy_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'firm_graphy_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'firm-graphy' ),
		'recent' 	=> esc_html__( 'Recent', 'firm-graphy' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'firm_graphy_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'firm_graphy_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Firm_Graphy_Dropdown_Taxonomies_Control( $wp_customize,'firm_graphy_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'firm-graphy' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'firm-graphy' ),
	'section'           => 'firm_graphy_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'firm_graphy_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'firm_graphy_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Firm_Graphy_Dropdown_Category_Control( $wp_customize,'firm_graphy_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'firm-graphy' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Shift key select multilple categories.', 'firm-graphy' ),
	'section'           => 'firm_graphy_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'firm_graphy_is_blog_section_content_recent_enable'
) ) );

