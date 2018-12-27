<?php
/**
 * EduMag Pro Latest News Customizer options
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

// Add latest news enable section
$wp_customize->add_section( 'edumag_latest_news_section', 
	array(
		'title'             => esc_html__( 'Latest News','edumag'),
		'description'       => esc_html__( 'Latest news section options.', 'edumag' ),
		'panel'             => 'edumag_sections_panel',
	)
);

// Add latest news enable setting and control.
$wp_customize->add_setting( 'edumag_theme_options[latest_news_enable]', 
	array(
		'default'           => $options['latest_news_enable'],
		'sanitize_callback' => 'edumag_sanitize_select',
	)
);

$wp_customize->add_control( 'edumag_theme_options[latest_news_enable]', 
	array(
		'label'             => esc_html__( 'Enable on', 'edumag' ),
		'section'           => 'edumag_latest_news_section',
		'type'              => 'select',
		'choices'           => edumag_enable_disable_options(),
	)
);

// Add latest news title setting and control.
$wp_customize->add_setting( 'edumag_theme_options[latest_news_title]', 
	array(
		'default'           => $options['latest_news_title'],
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control( 'edumag_theme_options[latest_news_title]', 
	array(
		'label'           	=> esc_html__( 'Title', 'edumag' ),
		'section'         	=> 'edumag_latest_news_section',
		'active_callback' 	=> 'edumag_is_latest_news_section_active',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'edumag_theme_options[latest_news_title]', 
		array(
			'selector'            => '#latest-news h2.entry-title',
			'render_callback'     => 'edumag_customize_partial_latest_news_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
		)
	);
}

// Add trending section content type setting and control.
$wp_customize->add_setting( 'edumag_theme_options[latest_news_content_type]', 
	array(
		'default'           	=> $options['latest_news_content_type'],
		'sanitize_callback' 	=> 'edumag_sanitize_select',
	)
);

$wp_customize->add_control( 'edumag_theme_options[latest_news_content_type]', 
	array(
	    'label'             	=> esc_html__( 'Content Type', 'edumag' ),
	    'description'			=> esc_html__( 'Select content type', 'edumag' ),
	    'section'           	=> 'edumag_latest_news_section',
	    'type'              	=> 'select',
	    'choices'           	=>  array(
	    	'category' 			=> esc_html__( 'Category', 'edumag' ),
	    ),
	    'active_callback'		=> 'edumag_is_latest_news_section_active',
	)
);

// Category Content Type
$wp_customize->add_setting(  'edumag_theme_options[latest_news_content_category]', array(
  		'sanitize_callback' 	=> 'edumag_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Edumag_Multi_Select_Category_Control ( $wp_customize,'edumag_theme_options[latest_news_content_category]', 
	array(
		'label'             	=> esc_html__( 'Select Category', 'edumag' ),
		'section'           	=> 'edumag_latest_news_section',
		'type'              	=> 'dropdown-category',
		'active_callback'   	=> 'edumag_is_latest_news_category_active',
	)
) );