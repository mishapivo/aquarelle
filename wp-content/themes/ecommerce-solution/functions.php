<?php
/**
 * Ecommerce Solution functions and definitions
 * @package Ecommerce Solution
 */


/* Theme Setup */
if ( ! function_exists( 'ecommerce_solution_setup' ) ) :

function ecommerce_solution_setup() {

	$GLOBALS['content_width'] = apply_filters( 'ecommerce_solution_content_width', 640 );

	load_theme_textdomain( 'ecommerce-solution', get_template_directory() . '/languages' );	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('ecommerce-solution-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ecommerce-solution' ),
		'topmenus' => __( 'Top Menu', 'ecommerce-solution' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', ecommerce_solution_font_url() ) );

}
endif; // ecommerce_solution_setup
add_action( 'after_setup_theme', 'ecommerce_solution_setup' );

/* Theme Widgets Setup */
function ecommerce_solution_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'ecommerce-solution' ),
		'description'   => __( 'Appears on posts and pages', 'ecommerce-solution' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'ecommerce-solution' ),
		'description'   => __( 'Appears on posts and pages', 'ecommerce-solution' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'ecommerce-solution' ),
		'description'   => __( 'Appears on posts and pages', 'ecommerce-solution' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'ecommerce-solution' ),
		'description'   => __( 'Appears on Footer', 'ecommerce-solution' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'ecommerce-solution' ),
		'description'   => __( 'Appears on Footer', 'ecommerce-solution' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'ecommerce-solution' ),
		'description'   => __( 'Appears on Footer', 'ecommerce-solution' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'ecommerce-solution' ),
		'description'   => __( 'Appears on Footer', 'ecommerce-solution' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'ecommerce_solution_widgets_init' );


/* Theme Font URL */
function ecommerce_solution_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/* Theme enqueue scripts */
function ecommerce_solution_scripts() {
	wp_enqueue_style( 'ecommerce-solution-font', ecommerce_solution_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'ecommerce-solution-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'ecommerce-solution-style', 'rtl', 'replace' );	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_script( 'tether', get_template_directory_uri() . '/js/tether.js', array('jquery') ,'',true);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);	
	wp_enqueue_script( 'ecommerce-solution-custom-scripts-jquery', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ecommerce_solution_scripts' );

function ecommerce_solution_ie_stylesheet(){

	wp_enqueue_style('ecommerce-solution-ie', get_template_directory_uri().'/css/ie.css', array('ecommerce-solution-style'));
	wp_style_add_data( 'ecommerce-solution-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','ecommerce_solution_ie_stylesheet');

define('ECOMMERCE_SOLUTION_CREDIT','https://www.buywptemplates.com/themes/free-ecommerce-wordpress-template/','ecommerce-solution');

if ( ! function_exists( 'ecommerce_solution_credit' ) ) {
	function ecommerce_solution_credit(){
		echo "<a href=".esc_url(ECOMMERCE_SOLUTION_CREDIT)." target='_blank'>".esc_html__('Ecommerce WordPress Theme','ecommerce-solution')."</a>";
	}
}

function ecommerce_solution_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Excerpt Limit Begin */
function ecommerce_solution_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/*radio button sanitization*/
 function ecommerce_solution_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'ecommerce_solution_loop_columns');
	if (!function_exists('ecommerce_solution_loop_columns')) {
		function ecommerce_solution_loop_columns() {
		return 3; // 3 products per row
	}
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load Jetpack compatibility file. */
require get_template_directory() . '/inc/customizer.php';