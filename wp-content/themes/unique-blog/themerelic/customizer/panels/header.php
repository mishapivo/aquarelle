<?php
/**
 * Header  Settings
 *
 * @package uniqueue_blog
 */

function uniqueue_blog_customize_register_header( $wp_customize ) {
    
    $wp_customize->add_panel( 'header_setting', array(
        'title'      => __( 'Logo & Header Settings', 'unique-blog' ),
        'priority'   => 1
    ) );
        
}
add_action( 'customize_register', 'uniqueue_blog_customize_register_header' );