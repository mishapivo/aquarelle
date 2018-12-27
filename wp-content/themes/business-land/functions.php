<?php
/**
 * business-land functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package business-land
 */
$business_land_theme_path = get_template_directory();

require( $business_land_theme_path .'/inc/fonts.php');

if ( ! function_exists( 'business_land_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function business_land_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on business-land, use a find and replace
		 * to change 'business-land' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'business-land', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'business-land' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'business_land_custom_background_args', array(
			'default-color' => 'f7f7f7',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		
		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
 	     */
		add_editor_style( array( 'assets/css/editor-style.css', business_land_fonts_url() ) );
		
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'business_land_setup' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function business_land_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	return sprintf( '<div class="read-more"><a class="btn read-more-btn" href="%1$s">%2$s</a></div>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'business-land' )
    );
}
add_filter( 'excerpt_more', 'business_land_excerpt_more' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_land_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'business_land_content_width', 640 );
}
add_action( 'after_setup_theme', 'business_land_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_land_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'business-land' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'business-land' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Widget Area', 'business-land' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'business-land' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'business-land' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'business-land' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'business-land' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'business-land' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'business-land' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'business-land' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'business-land' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'business-land' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'business_land_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function business_land_scripts() {
	
	//bootstrap rtl
	if ( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/assets/css/bootstrap-rtl.css');
    }
	
	//Bootstrap stylesheet.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	
	//Fontawesome web stylesheet.
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );
	
	//SimpleLineIcons web stylesheet.
	wp_enqueue_style( 'simple-line-icons', get_template_directory_uri() . '/assets/css/simple-line-icons.css' );
	
	//OwlCarousel stylesheet.
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	
	//OwlCarousel stylesheet.
	wp_enqueue_style( 'owlcarousel', get_template_directory_uri() . '/assets/css/owl-carousel.css' );
	
	wp_enqueue_style( 'business-land-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '1.0', true );
	
	wp_enqueue_script( 'jquery-owlcarousel', get_template_directory_uri() . '/assets/js/owl-carousel.js', array( 'jquery' ), '1.0', true );
	
	wp_enqueue_script( 'business-land-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( 'business-land-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'jquery-ResizeSensor', get_template_directory_uri() . '/assets/js/ResizeSensor.js', array( 'jquery' ), '1.0', true );
	
	wp_enqueue_script( 'jquery-theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array( 'jquery' ), '1.0', true );
	
	wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array( 'jquery' ), '1.0', true );
	
	wp_enqueue_script( 'jquery-stellar', get_template_directory_uri() . '/assets/js/stellar.js', array( 'jquery' ), '1.0', true );
	
	wp_enqueue_script( 'jquery-theme', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), '1.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_land_scripts' );

function business_land_image_upload_script() {
    wp_enqueue_media();
	if ( is_admin() ) {
    	wp_enqueue_script( 'business-land-upload-image', get_template_directory_uri() . '/assets/js/image-upload.js', array( 'jquery' ), '1.0', true );
	}
}
// add admin scripts
add_action('admin_enqueue_scripts', 'business_land_image_upload_script');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Breadcrumb.
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Widget layout.
 */
require get_template_directory() . '/inc/widget-layout.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/tgm/tgm-setting.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function business_land_custom_excerpt_length( $length ) {
	if( is_admin() ) return $length;
    return 70 ;
}
add_filter( 'excerpt_length', 'business_land_custom_excerpt_length');

function business_land_widget_tag_args( $args ){
	$args['largest']  = 11;
	$args['smallest'] = 11;
	$args['unit']     = 'px';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'business_land_widget_tag_args');

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function business_land_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'business_land_front_page_template' );