<?php
/**
 * st-blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package st-blog
 */

require trailingslashit( get_template_directory() ) . '/inc/init.php';


if ( ! function_exists( 'st_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function st_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on st-blog, use a find and replace
		 * to change 'st-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'st-blog', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'st-blog' ),

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
		add_theme_support( 'custom-background', apply_filters( 'st_blog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		//recomended image size
		add_image_size( 'st-blog-feature-content-post-image', 330, 200, true );  //feature-content image size
		add_image_size( 'st-blog-feature-slider-image', 1340, 460, true );  //feature-slider image size

		/*woocommerce support*/
		add_theme_support( 'woocommerce' );


		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
		) );

	}
endif;
add_action( 'after_setup_theme', 'st_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function st_blog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'st_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'st_blog_content_width', 0 );

/*breadcrum function*/

if ( ! function_exists( 'st_blog_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function st_blog_simple_breadcrumb() {

		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			require_once get_template_directory() . '/assets/frameworks/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		breadcrumb_trail( $breadcrumb_args );

	}

endif;

// google fonts function
function st_blog_google_fonts()
{
	global $st_blog_customizer_all_values;
	$fonts_url  = '';
	$fonts 		= array();

	$st_blog_font_family_site_identity   = $st_blog_customizer_all_values['st-blog-font-family-site-identity'];
	$st_blog_font_family_h1_h6			 = $st_blog_customizer_all_values['st-blog-font-family-h1-h6'];
	$st_blog_font_family_button_text	 = $st_blog_customizer_all_values['st-blog-font-family-button-text'];	
	$st_blog_fonts   = array();
	$st_blog_fonts[] = $st_blog_font_family_site_identity;
	$st_blog_fonts[] = $st_blog_font_family_h1_h6;
	$st_blog_fonts[] = $st_blog_font_family_button_text;

	$st_blog_fonts_stylesheet = '//fonts.googleapis.com/css?family=';

	$i  = 0;
	  for ($i=0; $i < count( $st_blog_fonts ); $i++) { 

	    if ( 'off' !== sprintf( _x( 'on', '%s font: on or off', 'st-blog' ), $st_blog_fonts[$i] ) ) {
			$fonts[] = $st_blog_fonts[$i];
		}

	  }

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urldecode( implode( '|', $fonts ) ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}


/**
 * Enqueue scripts and styles.
 */
function st_blog_scripts() {
	global $st_blog_customizer_all_values;
	/*google font*/
	wp_enqueue_style( 'st-blog-google-fonts', st_blog_google_fonts() );
	//root path for style and scripts

	// thirdparty style file
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.css' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/vendor/font-awesome/css/fontawesome-all.css' );
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/assets/vendor/slick/slick.css' );
	wp_enqueue_style( 'photobox-style', get_template_directory_uri() . '/assets/vendor/photobox/photobox.css' );

	wp_enqueue_style( 'st-blog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'st-blog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'st-blog-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	// thirdparty assets
	wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.js', array('jquery'), true );
	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/vendor/slick/slick.js', array('jquery'), true );
	wp_enqueue_script( 'jquery-easy-ticker', get_template_directory_uri() . '/assets/vendor/jquery-easy-ticker/jquery.easy-ticker.js', array('jquery'), true );
	wp_enqueue_script( 'jquery-masonry-js', get_template_directory_uri() . '/assets/vendor/masonry/masonry.pkgd.js', array('jquery'), true );
	wp_enqueue_script( 'jquery-photobox', get_template_directory_uri() . '/assets/vendor/photobox/jquery.photobox.js', array('jquery'), true );

	// custom js
	wp_enqueue_script( 'st-blog-mobile-menu', get_template_directory_uri() . '/assets/custom/mobile-menu.js', array('jquery'), true );
	wp_enqueue_script( 'st-blog-main', get_template_directory_uri() . '/assets/custom/main.js', array('jquery'), true );


	wp_localize_script( 'st-blog-main', 'customzier_values', $st_blog_customizer_all_values);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'st_blog_scripts' );


/**
 * Customizer control styles and scripts.
 */
function st_blog_customizer_control_scripts()
{

    wp_enqueue_style('st-blog-customize-controls-style', get_template_directory_uri() . '/editor-style.css');

    wp_enqueue_script('st-blog-customize-controls-scripts', get_template_directory_uri() . '/assets/custom/admin-script.js');

}

add_action('customize_controls_enqueue_scripts', 'st_blog_customizer_control_scripts', 0);


/*added admin css for meta*/
function st_blog_wp_admin_style($hook) {
	
	if ( 'widgets.php' == $hook ) {
		wp_enqueue_media();
		wp_enqueue_script( 'st-blog-widgets-script', get_template_directory_uri() . '/assets/js/widgets.js', array(  ), '1.0.0' );
	}
}
add_action( 'admin_enqueue_scripts', 'st_blog_wp_admin_style' );

  
/**
 * Implement the Custom Header feature.
 */
require trailingslashit( get_template_directory() ) . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . '/inc/template-tags.php';


/*update to pro added*/
require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/st-blog/class-customize.php' );


if ( is_admin() ) {
	// Load about.
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/class-about.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/about.php';

	// Load demo.
	require_once trailingslashit( get_template_directory() ) . 'inc/demo/class-demo.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/demo/demo.php';
}
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if ( !function_exists('st_blog_primary_menu')  ) :
	/**
	 * Fallback menu to primary-menu
	 * 
	 * @since  st-blog 1.0.0
	 */
	function st_blog_primary_menu()
	{

		?>
		<ul id="menu">
			<li><a href="<?php echo esc_url( home_url( '/' ) );?>"><?php esc_html_e('Home','st-blog');?></a></li>
			<li><a href="<?php echo esc_url( admin_url( '/nav-menus.php' ) );?>"><?php esc_html_e('Set Primary Menu','st-blog');?></a></li>
		</ul>
	<?php
	}
endif;

// customize the catgory title author
function st_blog_customizer_remove_defualt_cat_author($title)
{
    if( is_category() ) {

        $title = single_cat_title( '', false );

    }
    else if (is_author())
    {
    	$title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }

    return $title;

}
add_filter( 'get_the_archive_title', 'st_blog_customizer_remove_defualt_cat_author' );

 // for number of latest blog post
function st_blog_home_page_number_post( $query ) {

	$st_blog_theme = get_theme_mod( SALIENT_CUSTOMIZER_NAME );
	$st_blog_number_of_post = isset($st_blog_theme['latest-numbe-of-post-for-blog-section'] ) ? $st_blog_theme['latest-numbe-of-post-for-blog-section'] : '';
    if ( is_admin() || ! $query->is_main_query() )
        return $st_blog_number_of_post;

    if ( is_home() ) {
        // Display only 1 post for the original blog archive
        $query->set( 'posts_per_page', $st_blog_number_of_post );
        
    }
    return;

}
add_action( 'pre_get_posts', 'st_blog_home_page_number_post', 10 );

// for ticker position
if( ! function_exists('st_blog_header_alignment') ) {
	function st_blog_ticker_position() {
		return 'ticker_top';
	}
}

// for header, navigation alignment
if( ! function_exists('st_blog_header_alignment') ) {
	function st_blog_header_alignment() {
		return 'header_first';
	}
}

// for slider alignment
if( ! function_exists('st_blog_slider_alignment') ) {
	function st_blog_slider_alignment() {
		return 'full_width_slider';
	}
}

// for additional support
if ( ! function_exists ( 'st_blog_additional_class' ) ) {
	function st_blog_additional_class($id) {
		if($id == 'st-blog-featured') {
			return 'additional-class';
		}
	}
}

// theme name
if ( ! function_exists ( 'st_blog_theme_name' ) ) {
	function st_blog_theme_name() {
		return 'ST Blog';
	}
}

// for additional article
if ( ! function_exists ( 'st_blog_additional_article' ) ) {
	function st_blog_additional_article() {
		?>
		<div class="additional-sections"></div>
		<?php
	}
}

/**
* Add support for Gutenberg.
*
* @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
*/
add_theme_support( 'gutenberg', array(
 
    // Theme supports wide images, galleries and videos.
    'wide-images' => true,
 
    // Make specific theme colors available in the editor.
    'colors' => array(
        '#ffffff',
        '#000000',
        '#cccccc',
        '#EF3F3D'
    ),
 
) );

