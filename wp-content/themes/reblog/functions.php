<?php
/**
 * Moral functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Moral
 */

if ( ! function_exists( 'reblog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function reblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Moral, use a find and replace
		 * to change 'reblog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'reblog' );

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
		
		add_image_size( 'reblog-sleek-blog', 304, 440, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'reblog' ),
			'social' => esc_html__( 'Social', 'reblog' ),
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
		add_theme_support( 'custom-background', apply_filters( 'reblog_custom_background_args', array(
			'default-color' => 'EFEFEF',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		// add_theme_support( 'customize-selective-refresh-widgets' );

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
	    
    	/*
    	 * This theme styles the visual editor to resemble the theme style,
    	 * specifically font, colors, and column width.
     	 */
    	add_editor_style( array( 'assets/css/editor-style.css', reblog_fonts_url() ) );
	}
endif;
add_action( 'after_setup_theme', 'reblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function reblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'reblog_content_width', 900 );
}
add_action( 'after_setup_theme', 'reblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function reblog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'reblog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'reblog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	for ( $i=1; $i <= 4; $i++ ) { 
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area ', 'reblog' )  . $i,
			'id'            => 'footer-' . $i,
			'description'   => esc_html__( 'Add widgets here.', 'reblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'reblog_widgets_init' );

/**
 * Register custom fonts.
 */
function reblog_fonts_url() {
	$fonts_url = '';

	$font_families = array();
	
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Raleway, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$raleway = _x( 'on', 'Raleway font: on or off', 'reblog' );

	if ( 'off' !== $raleway ) {
		$font_families[] = 'Raleway:300,400,500,600,700';
	}

	$lora = _x( 'on', 'Lora font: on or off', 'reblog' );

	if ( 'off' !== $lora ) {
		$font_families[] = 'Lora';
	}

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function reblog_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'reblog-fonts', reblog_fonts_url(), array(), null );

	wp_enqueue_style( 'reblog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery-isotope', get_theme_file_uri( '/assets/js/isotope.pkgd.js' ), array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'jquery-packery', get_theme_file_uri( '/assets/js/packery.pkgd.js' ), array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'imagesloaded', '', array( 'jquery' ), '', true );

	wp_enqueue_script( 'reblog-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '20151215', true );

	wp_enqueue_script( 'reblog-skip-link-focus-fix', get_theme_file_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'reblog-custom', get_theme_file_uri( '/assets/js/custom.js' ), array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'reblog_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Admin welcome page
 */
require get_parent_theme_file_path( '/inc/welcome.php' );

/**
 * TGMPA call
 */
require get_parent_theme_file_path( '/inc/tgmpa/call.php' );

/**
 * OCDI compatibility.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_parent_theme_file_path( '/inc/ocdi.php' );
}

/**
 * Enqueue admin css.
 * @return [type] [description]
 */
function reblog_load_custom_wp_admin_style( $hook ) {
	if ( 'appearance_page_reblog-welcome' != $hook ) {
        return;
    }
    wp_register_style( 'reblog-admin', get_theme_file_uri( 'assets/css/reblog-admin.css' ), false, '1.0.0' );
    wp_enqueue_style( 'reblog-admin' );
}
add_action( 'admin_enqueue_scripts', 'reblog_load_custom_wp_admin_style' );

/**
 * Styles the header image and text displayed on the blog.
 *
 * @see reblog_custom_header_setup().
 */
function reblog_header_text_style() {
	// If we get this far, we have custom styles. Let's do this.
	$header_text_display = get_theme_mod( 'reblog_header_text_display', true );
	?>
	<style type="text/css">
	<?php if ( ! $header_text_display ) : ?>
		#site-identity {
			display: none;
		}
	<?php endif; ?>

	.site-title a{
		color: <?php echo esc_attr( get_theme_mod( 'reblog_header_title_color', '#fff' ) ); ?>;
	}
	.site-description {
		color: <?php echo esc_attr( get_theme_mod( 'reblog_header_tagline', '#fff' ) ); ?>;
	}
	</style>
	<?php
}
add_action( 'wp_head', 'reblog_header_text_style' );
