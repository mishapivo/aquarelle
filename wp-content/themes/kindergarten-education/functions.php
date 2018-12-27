<?php
/**
 * Kindergarten Education functions and definitions
 * @package Kindergarten Education
 */


/* Theme Setup */
if ( ! function_exists( 'kindergarten_education_setup' ) ) :

function kindergarten_education_setup() {

	$GLOBALS['content_width'] = apply_filters( 'kindergarten_education_content_width', 640 );
	
	load_theme_textdomain( 'kindergarten-education', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('kindergarten-education-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kindergarten-education' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', kindergarten_education_font_url() ) );

}
endif; // kindergarten_education_setup
add_action( 'after_setup_theme', 'kindergarten_education_setup' );

/*radio button sanitization*/
 function kindergarten_education_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Theme Widgets Setup */
function kindergarten_education_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'kindergarten-education' ),
		'description'   => __( 'Appears on posts and pages', 'kindergarten-education' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'kindergarten-education' ),
		'description'   => __( 'Appears on posts and pages', 'kindergarten-education' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'kindergarten-education' ),
		'description'   => __( 'Appears on posts and pages', 'kindergarten-education' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'kindergarten-education' ),
		'description'   => __( 'Appears on posts and pages', 'kindergarten-education' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'kindergarten-education' ),
		'description'   => __( 'Appears on posts and pages', 'kindergarten-education' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'kindergarten-education' ),
		'description'   => __( 'Appears on posts and pages', 'kindergarten-education' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'kindergarten-education' ),
		'description'   => __( 'Appears on posts and pages', 'kindergarten-education' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'kindergarten_education_widgets_init' );


/* Theme Font URL */
function kindergarten_education_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Ubuntu:300,300i,400,400i,500,500i,700,700i';
	$font_family[] = 'Poppins:100i,200,200i,300,300i';
	$font_family[] = 'Dosis:200,300,400,500,600,700,800';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}
	
/* Theme enqueue scripts */
function kindergarten_education_scripts() {
	wp_enqueue_style( 'kindergarten-education-font', kindergarten_education_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'kindergarten-education-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'kindergarten-education-style', 'rtl', 'replace' );	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_script( 'tether', get_template_directory_uri() . '/js/tether.js', array('jquery') ,'',true);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);	
	wp_enqueue_script( 'kindergarten-education-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kindergarten_education_scripts' );

function kindergarten_education_ie_stylesheet(){

	wp_enqueue_style('kindergarten-education-ie', get_template_directory_uri().'/css/ie.css', array('kindergarten-education-style'));
	wp_style_add_data( 'kindergarten-education-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','kindergarten_education_ie_stylesheet');


define('kindergarten_education_credit','https://buywptemplates.com','kindergarten-education');

if ( ! function_exists( 'kindergarten_education_credit' ) ) {
	function kindergarten_education_credit(){
		echo "<a href=".esc_url(kindergarten_education_credit)." target='_blank'>".esc_html__('BuywpTemplate','kindergarten-education')."</a>";
	}
}

/* Excerpt Limit Begin */
function kindergarten_education_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function kindergarten_education_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load Jetpack compatibility file. */
require get_template_directory() . '/inc/customizer.php';