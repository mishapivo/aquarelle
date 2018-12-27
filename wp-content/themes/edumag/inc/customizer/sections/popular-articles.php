<?php
/**
 * EduMag Popular Articles Customizer options
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

// Add popular articles enable section
$wp_customize->add_section( 'edumag_popular_articles_section', array(
	'title'             => esc_html__( 'Popular Articles','edumag'),
	'description'       => esc_html__( 'Popular Articles section options.', 'edumag' ),
	'panel'             => 'edumag_sections_panel'
) );

// Add category blog enable setting and control.
$wp_customize->add_setting( 'edumag_theme_options[popular_articles_enable]', array(
	'default'           => $options['popular_articles_enable'],
	'sanitize_callback' => 'edumag_sanitize_select'
) );

$wp_customize->add_control( 'edumag_theme_options[popular_articles_enable]', array(
	'label'             => esc_html__( 'Enable on', 'edumag' ),
	'section'           => 'edumag_popular_articles_section',
	'type'              => 'select',
	'choices'           => edumag_enable_disable_options()
) );

// Add Popular articles title setting and control.
$wp_customize->add_setting( 'edumag_theme_options[popular_articles_title]', array(
	'default'           => $options['popular_articles_title'],
	'transport'         => 'postMessage',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'edumag_theme_options[popular_articles_title]', array(
	'label'           	=> esc_html__( 'Title', 'edumag' ),
	'section'         	=> 'edumag_popular_articles_section',
	'active_callback' 	=> 'edumag_is_popular_articles_section_active',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'edumag_theme_options[popular_articles_title]', array(
		'selector'            => '#popular-articles h2.entry-title',
		'render_callback'     => 'edumag_customize_partial_popular_articles_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Show category type setting and control
$wp_customize->add_setting( 'edumag_theme_options[popular_articles_content_category]', array(
	'sanitize_callback' => 'edumag_sanitize_dropdown_category_list'
) );

$wp_customize->add_control( new Edumag_Dropdown_Category_Control( $wp_customize, 'edumag_theme_options[popular_articles_content_category]', array(
	'label'           => esc_html__( 'Select Category', 'edumag' ),
	'description'     => esc_html__( 'Two latest posts from selected category will be shown.', 'edumag' ),
	'type'			  => 'dropdown-category',
	'section'         => 'edumag_popular_articles_section',
	'active_callback' => 'edumag_is_popular_articles_section_active',
) ) );
