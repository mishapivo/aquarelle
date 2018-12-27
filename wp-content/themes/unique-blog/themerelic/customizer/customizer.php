<?php
/**
 * Unique Customizer
 *
 * @package Unique Blog
 */

 //Call All Panel Section
$unique_blog_panels   = array( 'header','general','footer' );
$unique_blog_sub_sections = array(
    'header'     => array( 'logo-brand' ),
    'general'    => array( 'general','slider','post-layout' ),
    'footer'    => array( 'social-links' ),
);

/**
 * 
 * Call the panel Settins Hear
 */
foreach( $unique_blog_panels as $panel ){
   require trailingslashit( get_template_directory() ) . 'themerelic/customizer/panels/' . $panel . '.php';
}

foreach( $unique_blog_sub_sections as $k => $v ){
    foreach( $v as $w ){        
        require trailingslashit(  get_template_directory() ) . 'themerelic/customizer/panels/' . $k . '/' . $w . '.php';
    }
}



/**
 * Basic Js File enqueue Section
 */
function unique_blog_customize_preview_js() {
    //theme ver
    $unique_blog = wp_get_theme();
    $theme_version = $unique_blog->get( 'Version' );

	wp_enqueue_style( 'unique-blog-customizer', get_template_directory_uri(). '/themerelic/customizer/css/customizer.css', array(), $theme_version );
    wp_enqueue_script( 'unique_blog_customizer', get_template_directory_uri() . '/themerelic/customizer/js/customizer.js', array( 'customize-preview', 'customize-selective-refresh' ),$theme_version, true );
}
add_action( 'customize_preview_init', 'unique_blog_customize_preview_js' );



/**
 * Sanitize callback for checkbox
*/
require trailingslashit( get_template_directory() ) . 'themerelic/customizer/unique-blog-sanitization-functions.php';