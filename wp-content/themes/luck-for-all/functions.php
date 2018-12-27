<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)


//Basic Init
function luck_for_all_theme_support() {
	
	//Square Thumbnails to use on Front Page
	add_image_size('luck_for_all-square', 300,300, true );	
	
	//Add a new Default Background Image
	add_theme_support(
		'custom-background', array(
			'default-color' => 'e6e6e6',
		)
	);
	
	// Register Footer Navigation Menu
	register_nav_menu( 'footer', __( 'Footer Menu', 'luck-for-all' ) );
	
	//Support for Custom logo
	add_theme_support( 'custom-logo' );
	
	//Support for title-tag
	add_theme_support( 'title-tag' );	
	
}
add_action( 'after_setup_theme', 'luck_for_all_theme_support' );


//Include Child and Parent CSS
function luck_for_all_enqueue_styles() {
    
    wp_enqueue_style( 'luckforall-parent-style', get_template_directory_uri() . '/style.css' );
    
    wp_enqueue_style( 'luckforall-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
    
} 
add_action( 'wp_enqueue_scripts', 'luck_for_all_enqueue_styles' );

//Reduce Length of Excerpt on Home
function luck_for_all_custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'luck_for_all_custom_excerpt_length', 999 );