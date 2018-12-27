<?php
/**
 * Buzzo functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Buzzo
 */

if ( ! function_exists( 'buzzo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function buzzo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Buzzo, use a find and replace
		 * to change 'buzzo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'buzzo', get_template_directory() . '/languages' );

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

		add_image_size( 'buzzo-large', 840, 450, true );
		add_image_size( 'buzzo-large-wide', 840, 340, true );
		add_image_size( 'buzzo-large-extra-wide', 1280, 300, true );
		add_image_size( 'buzzo-medium', 400, 280, true );
		add_image_size( 'buzzo-square', 320, 320, true );
		add_image_size( 'buzzo-rect-1-2', 660, 320, true );
		add_image_size( 'buzzo-rect-1-3', 1000, 320, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'buzzo' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'buzzo_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'video',
		) );

		// Add theme support for Custom Logo.
		add_theme_support( 'custom-logo', array(
			'width'       => 100,
			'height'      => 50,
			'flex-width'  => true,
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
	 	 */
		add_editor_style( array( 'css/editor-style.css', buzzo_fonts_url() ) );
	}
endif;
add_action( 'after_setup_theme', 'buzzo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function buzzo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'buzzo_content_width', 616 );
}
add_action( 'after_setup_theme', 'buzzo_content_width', 0 );

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses buzzo_header_image_style()
 */
function buzzo_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'buzzo_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/images/page-banner.jpg',
		'default-text-color'     => 'ffffff',
		'height'                 => 400,
		'flex-width'             => true,
		'wp-head-callback'       => 'buzzo_header_image_style',
	) ) );
}
add_action( 'after_setup_theme', 'buzzo_custom_header_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function buzzo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'buzzo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'buzzo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content bottom', 'buzzo' ),
		'id'            => 'buzzo-content-bottom',
		'description'   => esc_html__( 'Add widgets here.', 'buzzo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Post footer', 'buzzo' ),
		'id'            => 'buzzo-post-footer',
		'description'   => esc_html__( 'Add widgets here.', 'buzzo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'buzzo_widgets_init' );

if ( ! function_exists( 'buzzo_fonts_url' ) ) :
	/**
	 * Register Google fonts for Twenty Sixteen.
	 *
	 * Create your own buzzo_fonts_url() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function buzzo_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'buzzo' ) ) {
			$fonts[] = 'Poppins:400,600,700';
		}

		/* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'buzzo' ) ) {
			$fonts[] = 'Raleway:400,400i,700';
		}

		/* translators: If there are characters in your language that are not supported by La Belle Aurore, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'La Belle Aurore font: on or off', 'buzzo' ) ) {
			$fonts[] = 'La Belle Aurore:400';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;

/**
 * Enqueue scripts and styles.
 */
function buzzo_scripts() {
	// Register.
	if ( buzzo_is_script_debug() ) {
		wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.7.0' );
	} else {
		wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' );
	}

	wp_register_style( 'slick', get_template_directory_uri() . '/css/slick.css', array(), '1.6.0' );

	wp_register_script( 'buzzo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_register_script( 'buzzo-slider', get_template_directory_uri() . '/js/slider.js', array( 'slick' ), '1.0.0', true );

	wp_register_script( 'buzzo-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '1.0.0', true );

	wp_register_script( 'buzzo-stretch-section', get_template_directory_uri() . '/js/stretch-section.js', array(), '1.0.0', true );

	if ( buzzo_is_script_debug() ) {
		wp_register_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array(), '3.7.3', false );

		wp_register_script( 'respond', get_template_directory_uri() . '/js/respond.js', array(), '1.4.2', false );

		wp_register_script( 'slick', get_template_directory_uri() . '/js/slick.js', array( 'jquery' ), '1.6.0', false );
	} else {
		wp_register_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.3', false );

		wp_register_script( 'respond', get_template_directory_uri() . '/js/respond.min.js', array(), '1.4.2', false );

		wp_register_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.6.0', false );
	}

	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

	// Enqueue.
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'buzzo-fonts', buzzo_fonts_url() );

	/* wp_enqueue_script( 'jquery-accessible-mega-menu' ); */
	wp_enqueue_script( 'buzzo-navigation' );
	wp_enqueue_script( 'buzzo-stretch-section' );
	wp_enqueue_script( 'buzzo-skip-link-focus-fix' );
	wp_enqueue_script( 'html5shiv' );
	wp_enqueue_script( 'respond' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_page_template( 'page-templates/sections.php' ) ) {
		wp_enqueue_style( 'slick' );
		wp_enqueue_script( 'slick' );
		wp_enqueue_script( 'buzzo-slider' );
	}

	wp_enqueue_style( 'buzzo-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'buzzo_scripts' );

/**
 * Add custom css.
 */
function buzzo_add_custom_css() {
	$custom_css = '';

	$custom_css = apply_filters( 'buzzo_custom_css', $custom_css );

	wp_add_inline_style( 'buzzo-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'buzzo_add_custom_css' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/sidebar.php';

require get_template_directory() . '/inc/blog.php';

require get_template_directory() . '/inc/footer.php';

require get_template_directory() . '/inc/home.php';

require get_template_directory() . '/inc/social.php';

require get_template_directory() . '/inc/meta-boxes.php';

require get_template_directory() . '/inc/widgets.php';

require get_template_directory() . '/inc/cat-meta.php';
