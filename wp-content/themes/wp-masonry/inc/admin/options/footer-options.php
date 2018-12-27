<?php
/**
* Footer options
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function wp_masonry_footer_options($wp_customize) {

    $wp_customize->add_section( 'sc_wp_masonry_footer', array( 'title' => esc_html__( 'Footer', 'wp-masonry' ), 'panel' => 'wp_masonry_main_options_panel', 'priority' => 440 ) );

    $wp_customize->add_setting( 'wp_masonry_options[footer_text]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'wp_masonry_sanitize_html', ) );

    $wp_customize->add_control( 'wp_masonry_footer_text_control', array( 'label' => esc_html__( 'Footer copyright notice', 'wp-masonry' ), 'section' => 'sc_wp_masonry_footer', 'settings' => 'wp_masonry_options[footer_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'wp_masonry_options[hide_footer_widgets]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'wp_masonry_sanitize_checkbox', ) );

    $wp_customize->add_control( 'wp_masonry_hide_footer_widgets_control', array( 'label' => esc_html__( 'Hide Footer Widgets', 'wp-masonry' ), 'section' => 'sc_wp_masonry_footer', 'settings' => 'wp_masonry_options[hide_footer_widgets]', 'type' => 'checkbox', ) );

}