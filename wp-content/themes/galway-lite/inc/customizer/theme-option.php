<?php

/**
 * Theme Options Panel.
 *
 * @package Galway Lite
 */

$default = galway_lite_get_default_theme_options();

/*slider and its property section*/
require get_template_directory().'/inc/customizer/slider.php';

// Add Theme Options Panel.
$wp_customize->add_panel('theme_option_panel',
	array(
		'title'      => esc_html__('Theme Options', 'galway-lite'),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

/*layout management section start */
$wp_customize->add_section('theme_option_section_settings',
	array(
		'title'      => esc_html__('Layout Management', 'galway-lite'),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

/*Home Page Layout*/
$wp_customize->add_setting('enable_overlay_option',
	array(
		'default'           => $default['enable_overlay_option'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'galway_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control('enable_overlay_option',
	array(
		'label'    => esc_html__('Enable Banner Overlay', 'galway-lite'),
		'section'  => 'theme_option_section_settings',
		'type'     => 'checkbox',
		'priority' => 150,
	)
);

/*Home Page Layout*/
$wp_customize->add_setting('homepage_layout_option',
	array(
		'default'           => $default['homepage_layout_option'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'galway_lite_sanitize_select',
	)
);
$wp_customize->add_control('homepage_layout_option',
	array(
		'label'       => esc_html__('Site Layout', 'galway-lite'),
		'section'     => 'theme_option_section_settings',
		'choices'     => array(
			'full-width' => esc_html__('Full Width', 'galway-lite'),
			'boxed'      => esc_html__('Boxed', 'galway-lite'),
		),
		'type'     => 'select',
		'priority' => 160,
	)
);

/*Global Layout*/
$wp_customize->add_setting('global_layout',
	array(
		'default'           => $default['global_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'galway_lite_sanitize_select',
	)
);
$wp_customize->add_control('global_layout',
	array(
		'label'          => esc_html__('Global Layout', 'galway-lite'),
		'section'        => 'theme_option_section_settings',
		'choices'        => array(
			'left-sidebar'  => esc_html__('Primary Sidebar - Content', 'galway-lite'),
			'right-sidebar' => esc_html__('Content - Primary Sidebar', 'galway-lite'),
			'no-sidebar'    => esc_html__('No Sidebar', 'galway-lite'),
		),
		'type'     => 'select',
		'priority' => 170,
	)
);

// Setting - read_more_button_text.
$wp_customize->add_setting('read_more_button_text',
	array(
		'default'           => $default['read_more_button_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('read_more_button_text',
	array(
		'label'    => esc_html__('Read More Button Text', 'galway-lite'),
		'section'  => 'theme_option_section_settings',
		'type'     => 'text',
		'priority' => 170,
	)
);

/*content excerpt in global*/
$wp_customize->add_setting('excerpt_length_global',
	array(
		'default'           => $default['excerpt_length_global'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'galway_lite_sanitize_positive_integer',
	)
);
$wp_customize->add_control('excerpt_length_global',
	array(
		'label'       => esc_html__('Set Global Archive Length', 'galway-lite'),
		'section'     => 'theme_option_section_settings',
		'type'        => 'number',
		'priority'    => 175,
		'input_attrs' => array('min' => 1, 'max' => 200, 'style' => 'width: 150px;'),

	)
);

/*Archive Layout text*/
$wp_customize->add_setting('archive_layout',
	array(
		'default'           => $default['archive_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'galway_lite_sanitize_select',
	)
);
$wp_customize->add_control('archive_layout',
	array(
		'label'         => esc_html__('Archive Layout', 'galway-lite'),
		'section'       => 'theme_option_section_settings',
		'choices'       => array(
			'excerpt-only' => esc_html__('Excerpt Only', 'galway-lite'),
			'full-post'    => esc_html__('Full Post', 'galway-lite'),
		),
		'type'     => 'select',
		'priority' => 180,
	)
);

/*Archive Layout image*/
$wp_customize->add_setting('archive_layout_image',
	array(
		'default'           => $default['archive_layout_image'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'galway_lite_sanitize_select',
	)
);
$wp_customize->add_control('archive_layout_image',
	array(
		'label'     => esc_html__('Archive Image Allocation', 'galway-lite'),
		'section'   => 'theme_option_section_settings',
		'choices'   => array(
			'full'     => esc_html__('Full', 'galway-lite'),
			'right'    => esc_html__('Right', 'galway-lite'),
			'left'     => esc_html__('Left', 'galway-lite'),
			'no-image' => esc_html__('No image', 'galway-lite')
		),
		'type'     => 'select',
		'priority' => 185,
	)
);

/*single post Layout image*/
$wp_customize->add_setting('single_post_image_layout',
	array(
		'default'           => $default['single_post_image_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'galway_lite_sanitize_select',
	)
);
$wp_customize->add_control('single_post_image_layout',
	array(
		'label'     => esc_html__('Single Post/Page Image Allocation', 'galway-lite'),
		'section'   => 'theme_option_section_settings',
		'choices'   => array(
			'full'     => esc_html__('Full', 'galway-lite'),
			'right'    => esc_html__('Right', 'galway-lite'),
			'left'     => esc_html__('Left', 'galway-lite'),
			'no-image' => esc_html__('No image', 'galway-lite')
		),
		'type'     => 'select',
		'priority' => 190,
	)
);

// Pagination Section.
$wp_customize->add_section('pagination_section',
	array(
		'title'      => esc_html__('Pagination Options', 'galway-lite'),
		'priority'   => 110,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting('pagination_type',
	array(
		'default'           => $default['pagination_type'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'galway_lite_sanitize_select',
	)
);
$wp_customize->add_control('pagination_type',
	array(
		'label'    => esc_html__('Pagination Type', 'galway-lite'),
		'section'  => 'pagination_section',
		'type'     => 'select',
		'choices'  => array(
			'default' => esc_html__('Default (Older / Newer Post)', 'galway-lite'),
			'numeric' => esc_html__('Numeric', 'galway-lite'),
		),
		'priority' => 100,
	)
);

// Footer Section.
$wp_customize->add_section('footer_section',
	array(
		'title'      => esc_html__('Footer Options', 'galway-lite'),
		'priority'   => 130,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting social_content_heading.
$wp_customize->add_setting('number_of_footer_widget',
	array(
		'default'           => $default['number_of_footer_widget'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'galway_lite_sanitize_select',
	)
);
$wp_customize->add_control('number_of_footer_widget',
	array(
		'label'    => esc_html__('Number Of Footer Widget', 'galway-lite'),
		'section'  => 'footer_section',
		'type'     => 'select',
		'priority' => 100,
		'choices'  => array(
			0         => esc_html__('Disable footer sidebar area', 'galway-lite'),
			1         => esc_html__('1', 'galway-lite'),
			2         => esc_html__('2', 'galway-lite'),
			3         => esc_html__('3', 'galway-lite'),
		),
	)
);

// Setting copyright_text.
$wp_customize->add_setting('copyright_text',
	array(
		'default'           => $default['copyright_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('copyright_text',
	array(
		'label'    => esc_html__('Footer Copyright Text', 'galway-lite'),
		'section'  => 'footer_section',
		'type'     => 'text',
		'priority' => 120,
	)
);

// Breadcrumb Section.
$wp_customize->add_section('breadcrumb_section',
	array(
		'title'      => esc_html__('Breadcrumb Options', 'galway-lite'),
		'priority'   => 120,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting('breadcrumb_type',
	array(
		'default'           => $default['breadcrumb_type'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'galway_lite_sanitize_select',
	)
);
$wp_customize->add_control('breadcrumb_type',
	array(
		'label'       => esc_html__('Breadcrumb Type', 'galway-lite'),
		'description' => sprintf(esc_html__('Advanced: Requires %1$sBreadcrumb NavXT%2$s plugin', 'galway-lite'), '<a href="https://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">', '</a>'),
		'section'     => 'breadcrumb_section',
		'type'        => 'select',
		'choices'     => array(
			'disabled'   => esc_html__('Disabled', 'galway-lite'),
			'simple'     => esc_html__('Simple', 'galway-lite'),
			'advanced'   => esc_html__('Advanced', 'galway-lite'),
		),
		'priority' => 100,
	)
);

// Preloader Section.
$wp_customize->add_section('enable_preloader_option',
	array(
		'title'      => esc_html__('Preloader Options', 'galway-lite'),
		'priority'   => 120,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting enable_preloader.
$wp_customize->add_setting('enable_preloader',
	array(
		'default'           => $default['enable_preloader'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'galway_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control('enable_preloader',
	array(
		'label'    => esc_html__('Enable Preloader', 'galway-lite'),
		'section'  => 'enable_preloader_option',
		'type'     => 'checkbox',
		'priority' => 150,
	)
);
