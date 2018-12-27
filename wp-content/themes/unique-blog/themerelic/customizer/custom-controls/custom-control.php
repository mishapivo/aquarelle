<?php
/**
 * Register Custom Controls
*/

function unique_blog_controls( $wp_customize ){

    
    //Customizer Settings
    require_once trailingslashit( get_template_directory() ) . 'themerelic/customizer/custom-controls/toggle/class-toggle-control.php';
   
    $wp_customize->register_control_type( 'Unique_Blog_Toggle_Control' );
}
add_action( 'customize_register', 'unique_blog_controls' );