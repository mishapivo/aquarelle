<?php
/**
* Getting started options
*
* @package GreatWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function greatwp_getting_started($wp_customize) {

    $wp_customize->add_section( 'sc_greatwp_getting_started', array( 'title' => esc_html__( 'Getting Started', 'greatwp' ), 'description' => esc_html__( 'Thanks for your interest in GreatWP! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'greatwp' ), 'panel' => 'greatwp_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'greatwp_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new GreatWP_Customize_Button_Control( $wp_customize, 'greatwp_documentation_control', array( 'label' => esc_html__( 'Documentation', 'greatwp' ), 'section' => 'sc_greatwp_getting_started', 'settings' => 'greatwp_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/greatwp-wordpress-theme/', 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'greatwp_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new GreatWP_Customize_Button_Control( $wp_customize, 'greatwp_contact_control', array( 'label' => esc_html__( 'Contact Us', 'greatwp' ), 'section' => 'sc_greatwp_getting_started', 'settings' => 'greatwp_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/contact/', 'button_target' => '_blank', ) ) );

}