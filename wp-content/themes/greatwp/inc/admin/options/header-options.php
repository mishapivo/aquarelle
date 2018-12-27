<?php
/**
* Header options
*
* @package GreatWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function greatwp_header_options($wp_customize) {

    // Header
    $wp_customize->add_section( 'sc_greatwp_header', array( 'title' => esc_html__( 'Header Options', 'greatwp' ), 'panel' => 'greatwp_main_options_panel', 'priority' => 240 ) );

    $wp_customize->add_setting( 'greatwp_options[hide_header_content]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'greatwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'greatwp_hide_header_content_control', array( 'label' => esc_html__( 'Hide Header Content', 'greatwp' ), 'section' => 'sc_greatwp_header', 'settings' => 'greatwp_options[hide_header_content]', 'type' => 'checkbox', ) );

}