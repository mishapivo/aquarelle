<?php 
/**
 * Fundraiser Lite functions and definitions
 *
 * @package Fundraiser Lite
 */
 global $content_width;
 if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */ 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'fundraiser_lite_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function fundraiser_lite_setup() {
	load_theme_textdomain( 'fundraiser-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 250,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'fundraiser-lite' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // fundraiser_lite_setup
add_action( 'after_setup_theme', 'fundraiser_lite_setup' );
function fundraiser_lite_widgets_init() { 	
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'fundraiser-lite' ),
		'description'   => esc_html__( 'Appears on blog page sidebar', 'fundraiser-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title titleborder"><span>',
		'after_title'   => '</span></h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
}
add_action( 'widgets_init', 'fundraiser_lite_widgets_init' );
function fundraiser_lite_font_url(){
		$font_url = '';		
		/* Translators: If there are any character that are not
		* supported by Roboto Condensed, trsnalate this to off, do not
		* translate into your own language.
		*/
		$robotocondensed = _x('on','Roboto Condensed:on or off','fundraiser-lite');		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/
		$scada = _x('on','Scada:on or off','fundraiser-lite');	
		$lato = _x('on','Lato:on or off','fundraiser-lite');	
		$roboto = _x('on','Roboto:on or off','fundraiser-lite');
		$greatvibes = _x('on','Great Vibes:on or off','fundraiser-lite');
		$opensans = _x('on','Open Sans:on or off','fundraiser-lite');
		$assistant = _x('on','Assistant:on or off','fundraiser-lite');
		if('off' !== $robotocondensed ){
			$font_family = array();
			if('off' !== $robotocondensed){
				$font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
			}
			if('off' !== $lato){
				$font_family[] = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i';
			}
			if('off' !== $roboto){
				$font_family[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
			}
			if('off' !== $greatvibes){
				$font_family[] = 'Great Vibes:400';
			}	
			if('off' !== $opensans){
				$font_family[] = 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
			}	
			if('off' !== $assistant){
				$font_family[] = 'Assistant:200,300,400,600,700,800';
			}			
			$query_args = array(
				'family'	=> rawurlencode(implode('|',$font_family)),
			);
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
	return $font_url;
	}
function fundraiser_lite_scripts() {
	wp_enqueue_style('fundraiser-lite-font', fundraiser_lite_font_url(), array());
	wp_enqueue_style( 'fundraiser-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fundraiser-lite-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'fundraiser-lite-animation-style', get_template_directory_uri()."/css/animation.css" );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'fundraiser-lite-main-style', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'fundraiser-lite-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'jquery-nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'fundraiser-lite-custom-js', get_template_directory_uri() . '/js/custom.js' );	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fundraiser_lite_scripts' );
define('FUNDRAISER_LITE_SKTTHEMES_URL','https://www.sktthemes.net','fundraiser-lite');
define('FUNDRAISER_LITE_SKTTHEMES_PRO_THEME_URL','https://www.sktthemes.net/shop/fundraising-wordpress-theme/','fundraiser-lite');
define('FUNDRAISER_LITE_SKTTHEMES_FREE_THEME_URL','https://www.sktthemes.net/shop/free-ngo-wordpress-theme/','fundraiser-lite');
define('FUNDRAISER_LITE_SKTTHEMES_THEME_DOC','http://sktthemesdemo.net/documentation/fundraiser-documentation/','fundraiser-lite');
define('FUNDRAISER_LITE_SKTTHEMES_LIVE_DEMO','https://www.sktperfectdemo.com/demos/fundraiser/','fundraiser-lite');
define('FUNDRAISER_LITE_SKTTHEMES_THEMES','https://www.sktthemes.net/themes/','fundraiser-lite');
/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
// get slug by id
function fundraiser_lite_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}
if ( ! function_exists( 'fundraiser_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function fundraiser_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function fundraiser_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_html(get_bloginfo( 'pingback_url' ) ));
	}
}
add_action( 'wp_head', 'fundraiser_lite_pingback_header' );
add_filter( 'body_class','fundraiser_lite_body_class' );
function fundraiser_lite_body_class( $classes ) {
 	$hideslide = get_theme_mod('hide_slides', 1);
	if (!is_home() && is_front_page()) {
		if( $hideslide == '') {
			$classes[] = 'enableslide';
		}
	}
    return $classes;
}
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function fundraiser_lite_custom_excerpt_length( $excerpt_length ) {
    return 19;
}
add_filter( 'excerpt_length', 'fundraiser_lite_custom_excerpt_length', 999 );
/**
 *
 * Style For About Theme Page
 *
 */
function fundraiser_lite_admin_about_page_css_enqueue($hook) {
   if ( 'appearance_page_fundraiser_lite_guide' != $hook ) {
        return;
    }
    wp_enqueue_style( 'fundraiser-lite-about-page-style', get_template_directory_uri() . '/css/fundraiser-lite-about-page-style.css' );
}
add_action( 'admin_enqueue_scripts', 'fundraiser_lite_admin_about_page_css_enqueue' );