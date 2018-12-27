<?php
/**
 * Top Header Settings
 *
 * @package Uniqueue_Lite
 */

function uniqueue_blog_customize_register_logo_and_site_identites( $wp_customize ) {
	
    
    /** Enable/Disable Top Header Settings */
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    /** Uniqueue Logo Customizer */
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'uniqueue_blog_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'uniqueue_blog_customize_partial_blogdescription',
        ) );
    }

    //Uniqueue Logo Setting
    $wp_customize->get_section('title_tagline')->panel = 'header_setting';
    $wp_customize->get_section('title_tagline' )->priority = 1;

    //Uniqueue Logo Setting
    $wp_customize->get_section('header_image')->panel = 'header_setting';
    $wp_customize->get_section('header_image' )->priority = 2;
    

}
add_action( 'customize_register', 'uniqueue_blog_customize_register_logo_and_site_identites' );