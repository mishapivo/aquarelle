<?php
/**
* Header options
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function wp_masonry_header_options($wp_customize) {

    $wp_customize->add_section( 'sc_wp_masonry_header', array( 'title' => esc_html__( 'Header Options', 'wp-masonry' ), 'panel' => 'wp_masonry_main_options_panel', 'priority' => 240 ) );

    $wp_customize->add_setting( 'wp_masonry_options[hide_social_bar]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'wp_masonry_sanitize_checkbox', ) );

    $wp_customize->add_control( 'wp_masonry_hide_social_bar_control', array( 'label' => esc_html__( 'Hide Header Social Bar', 'wp-masonry' ), 'section' => 'sc_wp_masonry_header', 'settings' => 'wp_masonry_options[hide_social_bar]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'wp_masonry_options[hide_header_content]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'wp_masonry_sanitize_checkbox', ) );

    $wp_customize->add_control( 'wp_masonry_hide_header_content_control', array( 'label' => esc_html__( 'Hide Header Content', 'wp-masonry' ), 'section' => 'sc_wp_masonry_header', 'settings' => 'wp_masonry_options[hide_header_content]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'wp_masonry_options[disable_featured_header]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'wp_masonry_sanitize_checkbox', ) );

    $wp_customize->add_control( 'wp_masonry_disable_featured_header_control', array( 'label' => esc_html__( 'Disable Featured Header Image', 'wp-masonry' ), 'section' => 'sc_wp_masonry_header', 'settings' => 'wp_masonry_options[disable_featured_header]', 'type' => 'checkbox', ) );

}