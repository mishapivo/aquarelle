<?php
/**
* Getting started options
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function blogwp_getting_started($wp_customize) {

    $wp_customize->add_section( 'sc_blogwp_getting_started', array( 'title' => esc_html__( 'Getting Started', 'blogwp' ), 'description' => esc_html__( 'Thanks for your interest in BlogWP! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'blogwp' ), 'panel' => 'blogwp_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'blogwp_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new BlogWP_Customize_Button_Control( $wp_customize, 'blogwp_documentation_control', array( 'label' => esc_html__( 'Documentation', 'blogwp' ), 'section' => 'sc_blogwp_getting_started', 'settings' => 'blogwp_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/blogwp-wordpress-theme/', 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'blogwp_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new BlogWP_Customize_Button_Control( $wp_customize, 'blogwp_contact_control', array( 'label' => esc_html__( 'Contact Us', 'blogwp' ), 'section' => 'sc_blogwp_getting_started', 'settings' => 'blogwp_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/contact/', 'button_target' => '_blank', ) ) );

}