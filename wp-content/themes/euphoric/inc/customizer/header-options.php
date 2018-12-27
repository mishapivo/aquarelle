<?php
/**
 * Euphoric Layout Optios
 *
 * @package euphoric
 */

/**
 * Displays custom theme posts in frontpage. 
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

//Header Options


	$wp_customize->add_setting( 'select_top_category', array(
		'default' => '',
		'sanitize_callback' => 'euphoric_sanitize_select',
	));
	$wp_customize->add_control( 'select_top_category', array(
		'priority'=>20,
		'label' => __('Select Top Category', 'euphoric'),
		'section' => 'euphoric_header_section',
		'type' => 'select',
		'choices'	=>  euphoric_cat_list()
	));

	$wp_customize->add_setting('subscribe_text', array(
		'default' =>'',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('subscribe_text', array(
		'priority' =>30,
		'label' => __('Subscribe Text', 'euphoric'),
		'section' => 'euphoric_header_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('subscribe_url', array(
		'default' =>'',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('subscribe_url', array(
		'priority' =>40,
		'label' => __('Subscribe Url', 'euphoric'),
		'section' => 'euphoric_header_section',
		'type' => 'text',
	));

