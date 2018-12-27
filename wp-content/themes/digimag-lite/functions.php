<?php
/**
 * Digimag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Digimag Lite
 */

if ( ! function_exists( 'digimag_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function digimag_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on digimag, use a find and replace
		 * to change 'digimag-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'digimag-lite', get_template_directory() . '/languages' );

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

		add_image_size( 'digimag-lite-single', 760, 420, true );
		add_image_size( 'digimag-lite-related', 360, 220, true );
		set_post_thumbnail_size( 560, 300, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'digimag-lite' ),
		) );
		register_nav_menus( array(
			'menu-2' => esc_html__( 'Top', 'digimag-lite' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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

		// Post format.
		add_theme_support( 'post-formats', array( 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'digimag_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function digimag_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'digimag_lite_content_width', 760 );
}
add_action( 'after_setup_theme', 'digimag_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function digimag_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'digimag-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'digimag-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Slide Out Sidebar', 'digimag-lite' ),
		'id'            => 'slideout-sidebar',
		'description'   => esc_html__( 'Widget for Slide Out Sidebar.', 'digimag-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Topbar Languages', 'digimag-lite' ),
		'id'            => 'topbar-languages',
		'description'   => esc_html__( 'Add your languages widget here.', 'digimag-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Top Section', 'digimag-lite' ),
		'id'            => 'front-page-top',
		'description'   => esc_html__( 'Widget for front page top section.', 'digimag-lite' ),
		'before_widget' => '<section id="%1$s" class="widget-front-page-top %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Main Content Section', 'digimag-lite' ),
		'id'            => 'front-page-main',
		'description'   => esc_html__( 'Widget for front page main content section.', 'digimag-lite' ),
		'before_widget' => '<section id="%1$s" class="widget-front-page-main-content %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Bottom Section', 'digimag-lite' ),
		'id'            => 'front-page-bottom',
		'description'   => esc_html__( 'Widget for front page bottom section.', 'digimag-lite' ),
		'before_widget' => '<section id="%1$s" class="widget-front-page-bottom %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'digimag-lite' ),
		'id'            => 'footer1',
		'description'   => esc_html__( 'Add your footer widget here.', 'digimag-lite' ),
		'before_widget' => '<section id="%1$s" class="widget widget-footer widget-footer-1 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'digimag-lite' ),
		'id'            => 'footer2',
		'description'   => esc_html__( 'Add your footer widget here.', 'digimag-lite' ),
		'before_widget' => '<section id="%1$s" class="widget widget-footer widget-footer-2 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'digimag-lite' ),
		'id'            => 'footer3',
		'description'   => esc_html__( 'Add your footer widget here.', 'digimag-lite' ),
		'before_widget' => '<section id="%1$s" class="widget widget-footer widget-footer-3 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Popular Posts', 'digimag-lite' ),
		'id'            => 'popular-posts',
		'description'   => esc_html__( 'This should be used only with Popular Posts Widget and show on archive page.', 'digimag-lite' ),
		'before_widget' => '<section id="%1$s" class="widget-popular-posts %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_widget( 'Digimag_Lite_Recent_Posts_Widget' );
	register_widget( 'Digimag_Lite_Popular_Posts_Widget' );
	register_widget( 'Digimag_Lite_Featured_Posts_Widget' );
	register_widget( 'Digimag_Lite_Trending_Widget' );
	register_widget( 'Digimag_Lite_Category_Posts_Widget' );
	register_widget( 'Digimag_Lite_Video_Posts_Widget' );
	register_widget( 'Digimag_Lite_Contact_Widget' );

}
add_action( 'widgets_init', 'digimag_lite_widgets_init' );

function digimag_lite_style() {
	if ( defined( 'JETPACK__VERSION' ) ) {
		wp_deregister_style( 'sharedaddy' );
		wp_enqueue_style( 'sharedaddy', WP_PLUGIN_URL . '/jetpack/modules/sharedaddy/sharing.css', '', '' );
	}
	wp_enqueue_style( 'digimag-style', get_stylesheet_uri() );
}
add_action( 'wp_print_styles', 'digimag_lite_style' );

/**
 * Enqueue scripts and styles.
 */
function digimag_lite_scripts() {
	wp_enqueue_style( 'icofont', get_template_directory_uri() . '/css/icofont.css', '', '1.0.0' );
	wp_enqueue_style( 'digimag-fonts', digimag_lite_fonts_url() );

	wp_enqueue_script( 'digimag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'digimag-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_front_page() ) {
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array( 'jquery' ), '1.8.0', true );
	}
	wp_enqueue_script( 'digimag-script', get_template_directory_uri() . '/js/script.js', array( 'jquery', 'imagesloaded', 'masonry' ), '1.0.0', true );
	wp_localize_script( 'digimag-script', 'digimagAjax', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'ajax-nonce' ),
	) );
	if ( get_theme_mod( 'hightlight_js', true ) ) {
		wp_enqueue_style( 'digimag-highlight-theme', get_template_directory_uri() . '/css/atom-one-dark.css', '', '20151215' );
		wp_enqueue_script( 'digimag-highlight', get_template_directory_uri() . '/js/highlight.min.js', array(), '9.12.0', true );
		wp_add_inline_script( 'digimag-highlight', '(function ( d, hljs ) {
			d.querySelectorAll( "pre" ).forEach( function( block ) {
				hljs.highlightBlock( block );
			} );
		})( document, hljs );' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'digimag_lite_scripts' );

/**
 * Get Google fonts URL for the theme.
 *
 * @return string Google fonts URL for the theme.
 */
function digimag_lite_fonts_url() {
	$fonts   = array();
	$subsets = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'digimag-lite' ) ) {
		$fonts[] = 'Poppins:400,600,700';
	}
	if ( 'off' !== _x( 'on', 'Roboto Slab font: on or off', 'digimag-lite' ) ) {
		$fonts[] = 'Roboto Slab:400,700';
	}

	$fonts_url = add_query_arg( array(
		'family' => rawurlencode( implode( '|', $fonts ) ),
		'subset' => rawurlencode( $subsets ),
	), 'https://fonts.googleapis.com/css' );

	return $fonts_url;
}

/**
 * Add editor style.
 */
function digimag_lite_add_editor_styles() {
	add_editor_style(
		array(
			'css/editor-style.css',
			digimag_lite_fonts_url(),
			get_template_directory_uri() . '/css/icofont.css',
		)
	);
}
add_action( 'init', 'digimag_lite_add_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Extra functions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Include widget file
 */
require get_template_directory() . '/inc/widgets/class-digimag-lite-recent-posts-widget.php';
require get_template_directory() . '/inc/widgets/class-digimag-lite-popular-posts-widget.php';
require get_template_directory() . '/inc/widgets/class-digimag-lite-featured-posts-widget.php';
require get_template_directory() . '/inc/widgets/class-digimag-lite-trending-widget.php';
require get_template_directory() . '/inc/widgets/class-digimag-lite-category-posts-widget.php';
require get_template_directory() . '/inc/widgets/class-digimag-lite-video-posts-widget.php';
require get_template_directory() . '/inc/widgets/class-digimag-lite-contact-widget.php';

/**
 * Add colorpicker to category
 */
require get_template_directory() . '/inc/class-digimag-lite-category-colorpicker.php';

/**
 * Add colorpicker to category
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Import Demo
 */
if ( is_admin() ) {
	require_once get_template_directory() . '/inc/admin/class-tgm-plugin-activation.php';
	require_once get_template_directory() . '/inc/admin/plugins.php';
}

/**
 * Dashboard.
 */
require get_template_directory() . '/inc/dashboard/class-digimag-lite-dashboard.php';
new Digimag_Lite_Dashboard();
