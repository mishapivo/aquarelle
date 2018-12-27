<?php
/**
 * General  Settings
 *
 * @package unique_blog
 */

function unique_blog_customize_register_general( $wp_customize ) {
    
    $wp_customize->add_panel( 'general_setting', array(
        'title'      => __( 'General Settings', 'unique-blog' ),
        'priority'   => 35
    ) );
        
}
add_action( 'customize_register', 'unique_blog_customize_register_general' );