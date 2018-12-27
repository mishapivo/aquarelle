<?php
/**
 * Xcel functions and definitions
 *
 * @package Xcel
 */
define( 'XCEL_THEME_VERSION' , '1.2.01' );

// Upgrade / Order Premium page
require get_template_directory() . '/upgrade/upgrade.php';

// Load WP included scripts
require get_template_directory() . '/includes/inc/template-tags.php';
require get_template_directory() . '/includes/inc/extras.php';
require get_template_directory() . '/includes/inc/jetpack.php';
require get_template_directory() . '/includes/inc/customizer.php';

// Load Customizer Library scripts
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

// Load TGM plugin class
require_once get_template_directory() . '/includes/inc/class-tgm-plugin-activation.php';
// Add customizer Upgrade class
require_once( get_template_directory() . '/includes/xcel-pro/class-customize.php' );

if ( ! function_exists( 'xcel_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function xcel_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 700; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on xcel, use a find and replace
	 * to change 'xcel' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'xcel', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'xcel_blog_img_side', 352, 230, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'xcel' ),
		'footer-bar' => __( 'Footer Bar Menu', 'xcel' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	
	// The custom header is used for the logo
	add_theme_support( 'custom-header', array(
		'width'         => 280,
		'height'        => 82,
		'flex-width'    => false,
		'flex-height'   => false,
		'header-text'   => false,
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'xcel_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );
    
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // xcel_setup
add_action( 'after_setup_theme', 'xcel_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function xcel_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'xcel' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	
	// Create Widget areas according to the footer layout setting
	register_sidebar(array(
		'name' => __( 'Xcel Footer Standard', 'xcel' ),
		'id' => 'xcel-site-footer-standard',
        'description' => __( 'The footer will divide into however many widgets are placed here.', 'xcel' )
	));
}
add_action( 'widgets_init', 'xcel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function xcel_scripts() {
	wp_enqueue_style( 'xcel-google-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), XCEL_THEME_VERSION );
    wp_enqueue_style( 'xcel-google-heading-font-default', '//fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,400,300', array(), XCEL_THEME_VERSION );
    
	wp_enqueue_style( 'xcel-font-awesome', get_template_directory_uri().'/includes/font-awesome/css/font-awesome.css', array(), '4.7.0' );
	wp_enqueue_style( 'xcel-style', get_stylesheet_uri(), array(), XCEL_THEME_VERSION );
    wp_enqueue_style( 'xcel-woocommerce-style', get_template_directory_uri().'/templates/css/xcel-woocommerce-style.css', array(), XCEL_THEME_VERSION );
    
    wp_enqueue_style( 'xcel-header-standard-style', get_template_directory_uri().'/templates/css/xcel-header-standard.css', array(), XCEL_THEME_VERSION );
    
    if ( get_theme_mod( 'xcel-setting-footer-layout', false ) == 'xcel-setting-footer-layout-none' ) :
	    wp_enqueue_style( 'xcel-header-centered-style', get_template_directory_uri().'/templates/css/xcel-footer-none.css', array(), XCEL_THEME_VERSION );
	else :
		wp_enqueue_style( 'xcel-header-centered-style', get_template_directory_uri().'/templates/css/xcel-footer-standard.css', array(), XCEL_THEME_VERSION );
	endif;

	wp_enqueue_script( 'xcel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), XCEL_THEME_VERSION, true );
	wp_enqueue_script( 'xcel-caroufredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), XCEL_THEME_VERSION, true );
	
	wp_enqueue_script( 'xcel-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), XCEL_THEME_VERSION, true );
	
	wp_enqueue_script( 'xcel-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), XCEL_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'xcel_scripts' );

function xcel_add_editor_styles() {
    add_editor_style( 'style-theme-editor.css' );
}
add_action( 'admin_init', 'xcel_add_editor_styles' );

/**
 * Enqueue admin styling.
 */
function xcel_load_admin_script() {
    wp_enqueue_style( 'xcel-admin-css', get_template_directory_uri() . '/upgrade/css/admin-css.css' );
}
add_action( 'admin_enqueue_scripts', 'xcel_load_admin_script' );

/**
 * Enqueue Dustland Express custom customizer styling.
 */
function xcel_load_customizer_script() {
    wp_enqueue_script( 'xcel-customizer-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), XCEL_THEME_VERSION, true );
    wp_enqueue_style( 'xcel-customizer-css', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css' );
}    
add_action( 'customize_controls_enqueue_scripts', 'xcel_load_customizer_script' );

// Create function to check if WooCommerce exists.
if ( ! function_exists( 'xcel_is_woocommerce_activated' ) ) :
    
function xcel_is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}

endif; // xcel_is_woocommerce_activated

if ( xcel_is_woocommerce_activated() ) {
    require get_template_directory() . '/includes/inc/woocommerce-inc.php';
}

/**
 * Adjust is_home query if xcel-setting-blog-cats is set
 */
function xcel_set_blog_queries( $query ) {
    $blog_query_set = '';
    if ( get_theme_mod( 'xcel-setting-blog-cats', false ) ) {
        $blog_query_set = get_theme_mod( 'xcel-setting-blog-cats' );
    }
    
    if ( $blog_query_set ) {
        // do not alter the query on wp-admin pages and only alter it if it's the main query
        if ( !is_admin() && $query->is_main_query() ){
            if ( is_home() ){
                $query->set( 'cat', $blog_query_set );
            }
        }
    }
}
add_action( 'pre_get_posts', 'xcel_set_blog_queries' );

/**
 * Exclude slider category from sidebar widgets
 */
function xcel_exclude_slider_categories_widget( $args ) {
	$exclude = ''; // ID's of the categories to exclude
	if ( get_theme_mod( 'xcel-setting-slider-cats', false ) ) {
        $exclude = get_theme_mod( 'xcel-setting-slider-cats' );
    }
	$args['exclude'] = $exclude;
	return $args;
}
add_filter( 'widget_categories_args', 'xcel_exclude_slider_categories_widget' );

/**
 * Display recommended plugins with the TGM class
 */
function xcel_register_required_plugins() {
	$plugins = array(
		// The recommended WordPress.org plugins.
		array(
			'name'      => __( 'Page Builder', 'xcel' ),
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => __( 'WooCommerce', 'xcel' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => __( 'Widgets Bundle', 'xcel' ),
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => __( 'Contact Form 7', 'xcel' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => __( 'Breadcrumb NavXT', 'xcel' ),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		),
		array(
			'name'      => __( 'Meta Slider', 'xcel' ),
			'slug'      => 'ml-slider',
			'required'  => false,
		)
	);
	$config = array(
		'id'           => 'xcel',
		'menu'         => 'tgmpa-install-plugins',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'xcel_register_required_plugins' );

/**
 * Register a custom Post Categories ID column
 */
function xcel_edit_cat_columns( $xcel_cat_columns ) {
    $xcel_cat_in = array( 'cat_id' => 'Category ID <span class="cat_id_note">For the Default Slider</span>' );
    $xcel_cat_columns = xcel_cat_columns_array_push_after( $xcel_cat_columns, $xcel_cat_in, 0 );
    return $xcel_cat_columns;
}
add_filter( 'manage_edit-category_columns', 'xcel_edit_cat_columns' );

/**
 * Print the ID column
 */
function xcel_cat_custom_columns( $value, $name, $cat_id ) {
    if( 'cat_id' == $name ) 
        echo $cat_id;
}
add_filter( 'manage_category_custom_column', 'xcel_cat_custom_columns', 10, 3 );

/**
 * Insert an element at the beggining of the array
 */
function xcel_cat_columns_array_push_after( $src, $xcel_cat_in, $pos ) {
    if ( is_int( $pos ) ) {
        $R = array_merge( array_slice( $src, 0, $pos + 1 ), $xcel_cat_in, array_slice( $src, $pos + 1 ) );
    } else {
        foreach ( $src as $k => $v ) {
            $R[$k] = $v;
            if ( $k == $pos )
                $R = array_merge( $R, $xcel_cat_in );
        }
    }
    return $R;
}
