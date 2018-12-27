<?php
/**
 * Theme Options.
 *
 * @package Business_Cast
 */

$default = business_cast_get_default_theme_options();

// Add theme options panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => esc_html__( 'Theme Options', 'business-cast' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
	'title'      => esc_html__( 'Header Options', 'business-cast' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show_title.
$wp_customize->add_setting( 'theme_options[show_title]',
	array(
	'default'           => $default['show_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_cast_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_title]',
	array(
	'label'    => esc_html__( 'Show Site Title', 'business-cast' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show_tagline.
$wp_customize->add_setting( 'theme_options[show_tagline]',
	array(
	'default'           => $default['show_tagline'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_cast_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_tagline]',
	array(
	'label'    => esc_html__( 'Show Tagline', 'business-cast' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting contact_number.
$wp_customize->add_setting( 'theme_options[contact_number_title]',
	array(
	'default'           => $default['contact_number_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[contact_number_title]',
	array(
	'label'    => esc_html__( 'Contact Title', 'business-cast' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);
$wp_customize->add_setting( 'theme_options[contact_number]',
	array(
	'default'           => $default['contact_number'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[contact_number]',
	array(
	'label'    => esc_html__( 'Contact Number', 'business-cast' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting contact_email.
$wp_customize->add_setting( 'theme_options[contact_email_title]',
	array(
	'default'           => $default['contact_email_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[contact_email_title]',
	array(
	'label'    => esc_html__( 'Email Title', 'business-cast' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);
$wp_customize->add_setting( 'theme_options[contact_email]',
	array(
	'default'           => $default['contact_email'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_email',
	)
);
$wp_customize->add_control( 'theme_options[contact_email]',
	array(
	'label'    => esc_html__( 'Contact Email', 'business-cast' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting contact_address_title.
$wp_customize->add_setting( 'theme_options[contact_address_title]',
	array(
	'default'           => $default['contact_address_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[contact_address_title]',
	array(
	'label'    => esc_html__( 'Address Title', 'business-cast' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);
$wp_customize->add_setting( 'theme_options[contact_address]',
	array(
	'default'           => $default['contact_address'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[contact_address]',
	array(
	'label'    => esc_html__( 'Contact Address', 'business-cast' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting show_social_in_header.
$wp_customize->add_setting( 'theme_options[show_social_in_header]',
	array(
		'default'           => $default['show_social_in_header'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_cast_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_social_in_header]',
	array(
		'label'    => esc_html__( 'Enable Social Icons', 'business-cast' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

$wp_customize->add_setting( 'theme_options[show_search_in_header]',
	array(
		'default'           => $default['show_search_in_header'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_cast_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_search_in_header]',
	array(
		'label'    => esc_html__( 'Enable Search Form', 'business-cast' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting enable_sticky_primary_menu.
$wp_customize->add_setting( 'theme_options[enable_sticky_primary_menu]',
	array(
		'default'           => $default['enable_sticky_primary_menu'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_cast_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_sticky_primary_menu]',
	array(
		'label'    => esc_html__( 'Make Primary Menu Sticky', 'business-cast' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting buy_button_text.
$wp_customize->add_setting( 'theme_options[buy_button_text]',
	array(
		'default'           => $default['buy_button_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[buy_button_text]',
	array(
		'label'    => esc_html__( 'Buy Button Text', 'business-cast' ),
		'section'  => 'section_header',
		'type'     => 'text',
		'priority' => 100,
	)
);

// Setting buy_button_link.
$wp_customize->add_setting( 'theme_options[buy_button_link]',
	array(
		'default'           => $default['buy_button_link'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'theme_options[buy_button_link]',
	array(
		'label'    => esc_html__( 'Buy Button Link', 'business-cast' ),
		'section'  => 'section_header',
		'type'     => 'text',
		'priority' => 100,
	)
);

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
	'title'      => esc_html__( 'Layout Options', 'business-cast' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'theme_options[global_layout]',
	array(
	'default'           => $default['global_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_cast_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[global_layout]',
	array(
	'label'    => esc_html__( 'Global Layout', 'business-cast' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => business_cast_get_global_layout_options(),
	'priority' => 100,
	)
);
// Setting archive_layout.
$wp_customize->add_setting( 'theme_options[archive_layout]',
	array(
	'default'           => $default['archive_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_cast_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_layout]',
	array(
	'label'    => esc_html__( 'Archive Layout', 'business-cast' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => business_cast_get_archive_layout_options(),
	'priority' => 100,
	)
);

// Pagination Section.
$wp_customize->add_section( 'section_pagination',
	array(
	'title'      => esc_html__( 'Pagination Options', 'business-cast' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting( 'theme_options[pagination_type]',
	array(
	'default'           => $default['pagination_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_cast_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[pagination_type]',
	array(
	'label'       => esc_html__( 'Pagination Type', 'business-cast' ),
	'section'     => 'section_pagination',
	'type'        => 'select',
	'choices'     => business_cast_get_pagination_type_options(),
	'priority'    => 100,
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
	'title'      => esc_html__( 'Footer Options', 'business-cast' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => esc_html__( 'Copyright Text', 'business-cast' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting go_to_top_status.
$wp_customize->add_setting( 'theme_options[go_to_top_status]',
	array(
		'default'           => $default['go_to_top_status'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_cast_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[go_to_top_status]',
	array(
		'label'       => esc_html__( 'Enable Go To Top', 'business-cast' ),
		'section'     => 'section_footer',
		'type'        => 'checkbox',
		'priority'    => 100,
	)
);

// Blog Section.
$wp_customize->add_section( 'section_blog',
	array(
	'title'      => esc_html__( 'Blog Options', 'business-cast' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
	'default'           => $default['excerpt_length'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_cast_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
	'label'       => esc_html__( 'Excerpt Length', 'business-cast' ),
	'description' => esc_html__( 'in words', 'business-cast' ),
	'section'     => 'section_blog',
	'type'        => 'number',
	'priority'    => 100,
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);
// Setting read_more_text.
$wp_customize->add_setting( 'theme_options[read_more_text]',
	array(
	'default'           => $default['read_more_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[read_more_text]',
	array(
	'label'    => esc_html__( 'Read More Text', 'business-cast' ),
	'section'  => 'section_blog',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting exclude_categories.
$wp_customize->add_setting( 'theme_options[exclude_categories]',
	array(
	'default'           => $default['exclude_categories'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[exclude_categories]',
	array(
	'label'       => esc_html__( 'Exclude Categories in Blog', 'business-cast' ),
	'description' => esc_html__( 'Enter category ID to exclude in Blog Page. Separate with comma if more than one.', 'business-cast' ),
	'section'     => 'section_blog',
	'type'        => 'text',
	'priority'    => 100,
	)
);

// Breadcrumb Section.
$wp_customize->add_section( 'section_breadcrumb',
	array(
	'title'      => esc_html__( 'Breadcrumb Options', 'business-cast' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting( 'theme_options[breadcrumb_type]',
	array(
	'default'           => $default['breadcrumb_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_cast_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[breadcrumb_type]',
	array(
	'label'       => esc_html__( 'Breadcrumb Type', 'business-cast' ),
	'section'     => 'section_breadcrumb',
	'type'        => 'select',
	'choices'     => business_cast_get_breadcrumb_type_options(),
	'priority'    => 100,
	)
);
