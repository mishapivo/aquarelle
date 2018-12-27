<?php
/**
 * Footer  Settings
 *
 * @package unique_blog
 */

function unique_blog_customize_social_register( $wp_customize ) {
    
    $wp_customize->add_panel( 'footer_panel', array(
        'title'      => __( 'Footer Settings', 'unique-blog' ),
        'priority'   => 35
    ) );
        
}
add_action( 'customize_register', 'unique_blog_customize_social_register' );