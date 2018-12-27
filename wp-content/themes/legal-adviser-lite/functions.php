<?php         
/**
 * Legal Adviser Lite functions and definitions
 *
 * @package Legal Adviser Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'legal_adviser_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.  
 */
function legal_adviser_lite_setup() {		
	global $content_width;   
    if ( ! isset( $content_width ) ) {
        $content_width = 680; /* pixels */
    }	

	load_theme_textdomain( 'legal-adviser-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support('html5');
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'title-tag' );	
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 150,
		'flex-height' => true,
	) );	
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'legal-adviser-lite' ),
		'footer' => __( 'Footer Menu', 'legal-adviser-lite' ),						
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // legal_adviser_lite_setup
add_action( 'after_setup_theme', 'legal_adviser_lite_setup' );
function legal_adviser_lite_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'legal-adviser-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'legal-adviser-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header info Widget', 'legal-adviser-lite' ),
		'description'   => __( 'Appears on the site header', 'legal-adviser-lite' ),
		'id'            => 'headerinfowidget',
		'before_widget' => '<aside id="%1$s" class="headerwidget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="header-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'legal-adviser-lite' ),
		'description'   => __( 'Appears on footer', 'legal-adviser-lite' ),
		'id'            => 'footer-widget-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'legal-adviser-lite' ),
		'description'   => __( 'Appears on footer', 'legal-adviser-lite' ),
		'id'            => 'footer-widget-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'legal-adviser-lite' ),
		'description'   => __( 'Appears on footer', 'legal-adviser-lite' ),
		'id'            => 'footer-widget-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'legal-adviser-lite' ),
		'description'   => __( 'Appears on footer', 'legal-adviser-lite' ),
		'id'            => 'footer-widget-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	
}
add_action( 'widgets_init', 'legal_adviser_lite_widgets_init' );


function legal_adviser_lite_font_url(){
		$font_url = '';	
		
		
		/* Translators: If there are any character that are not
		* supported by Assistant, trsnalate this to off, do not
		* translate into your own language.
		*/
		$assistant = _x('on','Assistant:on or off','legal-adviser-lite');		
		
		/* Translators: If there are any character that are not
		* supported by Roboto, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on','Roboto:on or off','legal-adviser-lite');	
		
		    if('off' !== $roboto || 'off' !== $assistant ){
			    $font_family = array();
			
			if('off' !== $assistant){
				$font_family[] = 'Assistant:300,400,600';
			}
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,900';
			}		
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function legal_adviser_lite_scripts() {
	wp_enqueue_style('legal-adviser-lite-font', legal_adviser_lite_font_url(), array());
	wp_enqueue_style( 'legal-adviser-lite-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'fontawesome-all-style', get_template_directory_uri().'/fontsawesome/css/fontawesome-all.css' );
	wp_enqueue_style( 'legal-adviser-lite-responsive', get_template_directory_uri()."/css/responsive.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'legal-adviser-lite-editable', get_template_directory_uri() . '/js/editable.js' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'legal_adviser_lite_scripts' );

function legal_adviser_lite_ie_stylesheet(){
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('legal-adviser-lite-ie', get_template_directory_uri().'/css/ie.css', array( 'legal-adviser-lite-style' ), '20160928' );
	wp_style_add_data('legal-adviser-lite-ie','conditional','lt IE 10');
	
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'legal-adviser-lite-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'legal-adviser-lite-style' ), '20160928' );
	wp_style_add_data( 'legal-adviser-lite-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'legal-adviser-lite-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'legal-adviser-lite-style' ), '20160928' );
	wp_style_add_data( 'legal-adviser-lite-ie7', 'conditional', 'lt IE 8' );	
	}
add_action('wp_enqueue_scripts','legal_adviser_lite_ie_stylesheet');

define('LEGAL_ADVISER_LITE_THEME_DOC','https://gracethemes.com/documentation/legal-adviser-doc/#homepage-lite','legal-adviser-lite');
define('LEGAL_ADVISER_LITE_PROTHEME_URL','https://gracethemes.com/themes/law-firm-wordpress-theme/','legal-adviser-lite');
define('LEGAL_ADVISER_LITE_LIVE_DEMO','https://gracethemes.com/demo/legal-adviser/','legal-adviser-lite');

//Custom Excerpt length.
function legal_adviser_lite_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'legal_adviser_lite_excerpt_length', 999 );


//Logo Options
if ( ! function_exists( 'legal_adviser_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function legal_adviser_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template for about theme.
 */
if ( is_admin() ) { 
require get_template_directory() . '/inc/about-themes.php';
}

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';