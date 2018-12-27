<?php
/**
 * Relief Medical Hospital functions and definitions
 * @package Relief Medical Hospital
 */

/* Theme Setup */
if ( ! function_exists( 'relief_medical_hospital_setup' ) ) :

function relief_medical_hospital_setup() {

	$GLOBALS['content_width'] = apply_filters( 'relief_medical_hospital_content_width', 640 );

	load_theme_textdomain( 'relief-medical-hospital', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('relief-medical-hospital-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'relief-medical-hospital' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	add_editor_style( array( 'assets/css/editor-style.css', relief_medical_hospital_font_url() ) );
}
endif; // relief_medical_hospital_setup
add_action( 'after_setup_theme', 'relief_medical_hospital_setup' );

/*Site URL*/
define('RELIEF_MEDICAL_HOSPITAL_CREDIT','https://www.logicalthemes.com/themes/free-medical-wordpress-theme/','relief-medical-hospital');
if ( ! function_exists( 'relief_medical_hospital_credit' ) ) {
	function relief_medical_hospital_credit(){
		echo "<a href=".esc_url(RELIEF_MEDICAL_HOSPITAL_CREDIT)." target='_blank'>".esc_html__('Hospital WordPress Theme.','relief-medical-hospital')."</a>";
	}
}

/*radio button sanitization*/
function relief_medical_hospital_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function relief_medical_hospital_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/* Theme Widgets Setup */
function relief_medical_hospital_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'relief-medical-hospital' ),
		'description'   => esc_html__( 'Appears on blog page sidebar', 'relief-medical-hospital' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Posts and Pages Sidebar', 'relief-medical-hospital' ),
		'description'   => esc_html__( 'Appears on posts and pages', 'relief-medical-hospital' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 3', 'relief-medical-hospital' ),
		'description'   => esc_html__( 'Appears on posts and pages', 'relief-medical-hospital' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'relief-medical-hospital' ),
		'description'   => esc_html__( 'Appears in footer', 'relief-medical-hospital' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'relief-medical-hospital' ),
		'description'   => esc_html__( 'Appears in footer', 'relief-medical-hospital' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'relief-medical-hospital' ),
		'description'   => esc_html__( 'Appears in footer', 'relief-medical-hospital' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'relief-medical-hospital' ),
		'description'   => esc_html__( 'Appears in footer', 'relief-medical-hospital' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'relief_medical_hospital_widgets_init' );

function relief_medical_hospital_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}	

/* Theme enqueue scripts */
function relief_medical_hospital_scripts() {
	wp_enqueue_style( 'relief-medical-hospital-font', relief_medical_hospital_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style( 'relief-medical-hospital-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'relief-medical-hospital-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'relief-medical-hospital-custom-jquery', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'relief_medical_hospital_scripts' );

function relief_medical_hospital_ie_stylesheet(){
	wp_enqueue_style('relief-medical-hospital-ie', get_template_directory_uri().'/assets/css/ie.css', array('relief-medical-hospital-basic-style'));
	wp_style_add_data( 'relief-medical-hospital-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','relief_medical_hospital_ie_stylesheet');

// Change number or products per row to 3
add_filter('loop_shop_columns', 'relief_medical_hospital_loop_columns');
	if (!function_exists('relief_medical_hospital_loop_columns')) {
	function relief_medical_hospital_loop_columns() {
		return 3; // 3 products per row
	}
}

function relief_medical_hospital_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-header.php';