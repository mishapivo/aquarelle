<?php
/**
 * Moral functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Moral
 */

if ( ! function_exists( 'store_mall_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function store_mall_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Moral, use a find and replace
		 * to change 'store-mall' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'store-mall' );

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
		
		add_image_size( 'store-mall-home-blog', 400, 300, true );

		// This theme uses wp_nav_menu() in one location.
		$menu_args = array(
			'primary' => esc_html__( 'Primary', 'store-mall' ),
			'social' => esc_html__( 'Social', 'store-mall' ),
		);

		register_nav_menus( $menu_args );

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
		add_theme_support( 'custom-background', apply_filters( 'store_mall_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

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

		add_theme_support(
			'custom-header', apply_filters(
				'store_mall_custom_header_args', array(
					'default-image'    => get_parent_theme_file_uri( '/assets/uploads/banner.jpg' ),
					'width'            => 2000,
					'height'           => 1200,
					'flex-height'      => true,
					'video'            => false,
				)
			)
		);

		register_default_headers(
			array(
				'default-image' => array(
					'url'           => '%s/assets/uploads/banner.jpg',
					'thumbnail_url' => '%s/assets/uploads/banner.jpg',
					'description'   => esc_html__( 'Default Header Image', 'store-mall' ),
				),
			)
		);
		
    	/*
    	 * This theme styles the visual editor to resemble the theme style,
    	 * specifically font, colors, and column width.
     	 */
    	add_editor_style( array( 'assets/css/editor-style.css', store_mall_fonts_url() ) );
	}
endif;
add_action( 'after_setup_theme', 'store_mall_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function store_mall_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'store_mall_content_width', 900 );
}
add_action( 'after_setup_theme', 'store_mall_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function store_mall_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Widget Area', 'store-mall' ),
		'id'            => 'homepage-area',
		'description'   => esc_html__( 'Add homepage widgets here.', 'store-mall' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s animated animatedFadeInUp">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'store-mall' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'store-mall' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s animated animatedFadeInUp">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Sidebar', 'store-mall' ),
		'id'            => 'woocommerce',
		'description'   => esc_html__( 'Add widgets here.', 'store-mall' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s animated animatedFadeInUp">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	for ( $i=1; $i <= 4; $i++ ) { 
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area ', 'store-mall' )  . $i,
			'id'            => 'footer-' . $i,
			'description'   => esc_html__( 'Add widgets here.', 'store-mall' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s animated animatedFadeInUp">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'store_mall_widgets_init' );

/**
 * Register custom fonts.
 */
function store_mall_fonts_url() {
	$fonts_url = '';

	$font_families = array();
	
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Montserrat, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$playfair_display = _x( 'on', 'Playfair Display font: on or off', 'store-mall' );

	if ( 'off' !== $playfair_display ) {
		$font_families[] = 'Playfair Display:400,700';
	}

	$oxygen = _x( 'on', 'Oxygen font: on or off', 'store-mall' );

	if ( 'off' !== $oxygen ) {
		$font_families[] = 'Oxygen:400,700';
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
function store_mall_scripts() {
	wp_enqueue_style( 'store-mall-fonts', store_mall_fonts_url(), array(), null );

	wp_enqueue_style( 'slick-theme', get_theme_file_uri( '/assets/css/slick-theme.css' ), array(), '20151215' );

	wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/css/slick.css' ), array(), '20151215' );

	wp_enqueue_style( 'animate', get_theme_file_uri( '/assets/css/animate.css' ), array(), '20151215' );

	wp_enqueue_style( 'prettyPhoto', get_theme_file_uri( '/assets/css/prettyPhoto.css' ), array(), '20151215' );

	wp_enqueue_style( 'store-mall-style', get_stylesheet_uri() );

	wp_enqueue_script( 'slick', get_theme_file_uri( '/assets/js/slick.js' ), array(), '20151215', true );

	wp_enqueue_script( 'packery', get_theme_file_uri( '/assets/js/packery.pkgd.js' ), array(), '20151215', true );

	wp_enqueue_script( 'jquery-imagesloaded', get_theme_file_uri( '/assets/js/imagesloaded.pkgd.js' ), array(), '20151215', true );

	wp_enqueue_script( 'jquery-prettyPhoto', get_theme_file_uri( '/assets/js/jquery.prettyPhoto.js' ), array(), '20151215', true );

	wp_enqueue_script( 'jquery-matchHeight', get_theme_file_uri( '/assets/js/jquery.matchHeight.js' ), array(), '20151215', true );

	wp_enqueue_script( 'store-mall-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '20151215', true );

	wp_enqueue_script( 'store-mall-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'store-mall-custom', get_theme_file_uri( '/assets/js/custom.js' ), array(), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'store_mall_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_parent_theme_file_path() . '/inc/jetpack.php';
}

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Breadcrumb trail class.
 */
require get_parent_theme_file_path( '/inc/class-breadcrumb-trail.php' );

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
 * Load WooCommerce compatibility file.
 */
if ( store_mall_is_woocommerce_activated() ) {
	require get_parent_theme_file_path( '/inc/woocommerce/woocommerce.php' );
	require get_parent_theme_file_path( '/inc/woocommerce/template-functions.php' );
}

/**
 * Enqueue admin css.
 * @return [type] [description]
 */
function store_mall_load_custom_wp_admin_style( $hook ) {
	if ( 'appearance_page_store-mall-welcome' != $hook ) {
        return;
    }
    wp_register_style( 'store-mall-admin', get_theme_file_uri( 'assets/css/admin.css' ), false, '1.0.0' );
    wp_enqueue_style( 'store-mall-admin' );
}
add_action( 'admin_enqueue_scripts', 'store_mall_load_custom_wp_admin_style' );

/**
 * Styles the header image and text displayed on the blog.
 *
 * @see store_mall_custom_header_setup().
 */
function store_mall_header_text_style() {
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php if ( ! display_header_text() ) : ?>
		#site-identity {
			display: none;
		}
	<?php endif; ?>

	.site-title a{
		color: #<?php echo esc_attr( header_textcolor() ); ?>;
	}
	.site-description {
		color: #<?php echo esc_attr( header_textcolor() ); ?>;
	}
	</style>
	<?php
}
add_action( 'wp_head', 'store_mall_header_text_style' );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function store_mall_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'store_mall_header_image_tag', 10, 3 );

if ( ! function_exists( 'store_mall_exclude_sticky_posts' ) ) {
    function store_mall_exclude_sticky_posts( $query ) {
        if ( ! is_admin() && $query->is_main_query() && $query->is_home() ) {
            $sticky_posts = get_option( 'sticky_posts' );  
            if ( ! empty( $sticky_posts ) ) {
            	$query->set('post__not_in', $sticky_posts );
            }
            $query->set('ignore_sticky_posts', true );
        }
    }
}
add_action( 'pre_get_posts', 'store_mall_exclude_sticky_posts' );