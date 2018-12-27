<?php
/**
* Other options
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function blogwp_other_options($wp_customize) {

    $wp_customize->add_section( 'sc_other_options', array( 'title' => esc_html__( 'Other Options', 'blogwp' ), 'panel' => 'blogwp_main_options_panel', 'priority' => 560 ) );

    $wp_customize->add_setting( 'blogwp_options[enable_sticky_mobile_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'blogwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'blogwp_enable_sticky_mobile_menu_control', array( 'label' => esc_html__( 'Enable Sticky Menu on Small Screen', 'blogwp' ), 'section' => 'sc_other_options', 'settings' => 'blogwp_options[enable_sticky_mobile_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'blogwp_options[disable_primary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'blogwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'blogwp_disable_primary_menu_control', array( 'label' => esc_html__( 'Disable Primary Menu', 'blogwp' ), 'section' => 'sc_other_options', 'settings' => 'blogwp_options[disable_primary_menu]', 'type' => 'checkbox', ) );

}