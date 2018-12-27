<?php

/**
 * CPMMagz functions and definitions
 *
 * @package CPMMagz
 */
// Register Custom Navigation Walker
//require_once('wp_bootstrap_navwalker.php');


if ( ! function_exists( 'cpmmagz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cpmmagz_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on CPMMagz, use a find and replace
	 * to change 'cpmmagz' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cpmmagz', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add customizer edit shortcodes
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'cpmmagz-post-image', 655, 345, true );
		add_image_size( 'cpmmagz-video-thumb', 185, 110, true );
		add_image_size( 'cpmmagz-news-small-thumb', 262, 110, true );
	}

	//Register Menus
	$locations = array(
		'primary_navigation' => esc_attr( __( 'Primary Navigation', 'cpmmagz' ) ),
		'top_navigation' => esc_attr( __( 'Top Navigation ', 'cpmmagz' ) ),
		);
	register_nav_menus( $locations );

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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
		'status'
		) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cpmmagz_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );

	//Site logo
	$args = array(
		'header-text' => array(
			'site-title',
			'site-description',
			),
		'size' => 'medium',
		);
	add_theme_support( 'site-logo', $args );

	add_editor_style( get_template_directory(). '/assets/css/editor-style.css' );

	add_theme_support( 'custom-logo');
}
endif; // cpmmagz_setup
add_action( 'after_setup_theme', 'cpmmagz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'cpmmagz_content_width' ) ) :
	function cpmmagz_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'cpmmagz_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'cpmmagz_content_width', 0 );
endif;
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
if ( function_exists('register_sidebar') ) {
	function cpmmagz_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html( __( 'Sidebar', 'cpmmagz' ) ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			) );

		register_sidebar( array(
			'name'          => esc_html( __( 'Pre Footer-1', 'cpmmagz' ) ),
			'id'            => 'pre-footer1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			) );


		register_sidebar( array(
			'name'          => esc_html( __( 'Pre Footer-2', 'cpmmagz' ) ),
			'id'            => 'pre-footer2',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			) );


		register_sidebar( array(
			'name'          => esc_html( __( 'Pre Footer-3', 'cpmmagz' )),
			'id'            => 'pre-footer3',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			) );


		register_sidebar( array(
			'name'          => esc_html( __( 'Pre Footer-4', 'cpmmagz' ) ),
			'id'            => 'pre-footer4',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			) );
	}
	add_action( 'widgets_init', 'cpmmagz_widgets_init' );
}

if (! function_exists('cpmmagz_add_editor_styles') ) {
	function cpmmagz_add_editor_styles() {
	    add_editor_style( 'assets/css/editor-style.css' );
	}
	add_action( 'admin_init', 'cpmmagz_add_editor_styles' );
}

if (! function_exists('cpmmagz_admin_style')) {
  // Custom Admin Styles
  function cpmmagz_admin_style() {
          wp_enqueue_style('cpmmagz-admin-styles', get_stylesheet_directory_uri().'/assets/css/admin.css');
  }
  add_action('admin_enqueue_scripts', 'cpmmagz_admin_style');
}

if (! function_exists('cpmmagz_theme_color') ) {
	function cpmmagz_theme_color(){
		$color = get_theme_mod('theme-color');
		if( $color == 'green'){
			wp_enqueue_style('cpmagz-colors-green');
		}
		if( $color == 'red'){
			wp_enqueue_style('cpmagz-colors-red');
		}
		if( $color == 'blue'){
			wp_enqueue_style('cpmagz-colors-blue');
		}
		if( $color == 'turquoise'){
			wp_enqueue_style('cpmagz-colors-turquoise');
		}
		if( $color == 'purple'){
			wp_enqueue_style('cpmagz-colors-purple');
		}
		if( $color == 'aspalt'){
			wp_enqueue_style('cpmagz-colors-aspalt');
		}
	}
}

if (!  function_exists('cpmmagz_fonts_url') ) {
	function cpmmagz_fonts_url() {
		$fonts_url = '';

		/* Translators: If there are characters in your language that are not
		* supported by Roboto, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$roboto = _x( 'on', 'Roboto font: on or off', 'cpmmagz' );

		/* Translators: If there are characters in your language that are not
		* supported by Roboto Slab, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$roboto_slab = _x( 'on', 'Roboto Slab font: on or off', 'cpmmagz');

		if ( 'off' !== $roboto || 'off' !== $roboto_slab ) {
			$font_families = array();

			if ( 'off' !== $roboto ) {
				$font_families[] = 'Roboto:200,300,400,500,700';
			}

			if ( 'off' !== $roboto_slab ) {
				$font_families[] = 'Roboto Slab:200,300,400,700';
			}

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
}

/**
 * Enqueue scripts and styles.
 */
if (!  function_exists('cpmmagz_scripts') ) {
	function cpmmagz_scripts() {
		// Load the font function
		wp_enqueue_style( 'cpmmagz-fonts', cpmmagz_fonts_url(), array(), null );
		// Load theme styles
		wp_enqueue_style( 'cpmmagz-style', get_template_directory_uri().'/style.css' );
		// Load theme colors
		wp_register_style( 'cpmagz-colors-red', get_template_directory_uri() . '/assets/css/red.css');
		wp_register_style( 'cpmagz-colors-green', get_template_directory_uri() . '/assets/css/green.css');
		wp_register_style( 'cpmagz-colors-blue', get_template_directory_uri() . '/assets/css/blue.css');
		wp_register_style( 'cpmagz-colors-purple', get_template_directory_uri() . '/assets/css/purple.css');
		wp_register_style( 'cpmagz-colors-turquoise', get_template_directory_uri() . '/assets/css/turquoise.css');
		wp_register_style( 'cpmagz-colors-aspalt', get_template_directory_uri() . '/assets/css/aspalt.css');
		cpmmagz_theme_color();

		wp_enqueue_script( 'cpmmagz-vendor-js', get_template_directory_uri(). '/assets/js/vendor.min.js', array('jquery'), true );
		wp_enqueue_script( 'cpmmagz-app-js',  get_template_directory_uri() . '/assets/js/app.min.js', array('jquery'), true );

		// IE conditional statements
		wp_enqueue_script( 'cpmmagz-html5shiv', '//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', array('jquery'), '', false);
		wp_script_add_data( 'cpmmagz-html5shiv', 'conditional', 'lt IE 9' );

		wp_enqueue_script( 'cpmmagz-respond', '//oss.maxcdn.com/respond/1.4.2/respond.min.js', array('jquery'), '', false);
		wp_script_add_data( 'cpmmagz-respond', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		$version_wp = get_bloginfo('version');
		if($version_wp < 4.7){
			$site_css_change = ( get_theme_mod( 'css_change' ) ) ? get_theme_mod( 'css_change' ) : '';
		}
		else{
			$site_css_change = "";
		}
		$custom_css =cpmmagz_header_style() . $site_css_change ;
		wp_add_inline_style( 'cpmmagz-style', $custom_css );
	}
	add_action( 'wp_enqueue_scripts', 'cpmmagz_scripts' );
}

if (! function_exists('cpmmagz_admin_style')) {
  // Custom Admin Styles
  	function cpmmagz_admin_style() {
        wp_enqueue_style('cpmmagz-admin-styles', get_stylesheet_directory_uri().'/assets/css/admin.css');
	}
  add_action('admin_enqueue_scripts', 'cpmmagz_admin_style');
}

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
require get_template_directory() . '/class-customizer.php';
include (get_template_directory() . '/functions-extra.php');
require get_template_directory() . '/post-widget.php';

/**
 * Include the TGM_Plugin_Activation class.
 */
get_template_part('plugin', 'activation');


if (!  function_exists('cpmmagz_register_required_plugins') ) {
	add_action( 'tgmpa_register', 'cpmmagz_register_required_plugins' );
	/**
	 * Register the required plugins for this theme.
	 *
	 * In this example, we register five plugins:
	 * - one included with the TGMPA library
	 * - two from an external source, one from an arbitrary source, one from a GitHub repository
	 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
	 *
	 * The variable passed to tgmpa_register_plugins() should be an array of plugin
	 * arrays.
	 *
	 * This function is hooked into tgmpa_init, which is fired within the
	 * TGM_Plugin_Activation class constructor.
	 */
	function cpmmagz_register_required_plugins() {
		/*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(

			array(
				'name'      => 'Jetpack',
				'slug'      => 'jetpack',
				'required'  => false,
			),
			array(
				'name'      => 'MailChimp For WordPress Lite',
				'slug'      => 'mailchimp-for-wp',
				'required'  => false,
			),
			array(
				'name'      => 'WP Paginate',
				'slug'      => 'wp-paginate',
				'required'  => false,
			),
			array(
				'name'      => 'Customizer Export/Import',
				'slug'      => 'customizer-export-import',
				'required'  => false,
			),

			// This is an example of the use of 'is_callable' functionality. A user could - for instance -
			// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
			// 'wordpress-seo-premium'.
			// By setting 'is_callable' to either a function from that plugin or a class method
			// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
			// recognize the plugin as being installed.
			array(
				'name'        => 'WordPress SEO by Yoast',
				'slug'        => 'wordpress-seo',
				'is_callable' => 'wpseo_init',
			),
			 array(
                'name'      => 'Page Builder Sandwich',
                'slug'      => 'page-builder-sandwich',
                'required'  => false,
                ),

		);

		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.

		);

		tgmpa( $plugins, $config );
	}
}

if(!function_exists('cpmmagz_custom_header_setup')):
	/**
	 * Set up the WordPress core custom header feature.
	 *
	 * @uses cpm_framework_header_style()
	 */
	function cpmmagz_custom_header_setup() {
		add_theme_support( 'custom-header', apply_filters( 'cpmmagz_custom_header_args', array(
		'wp-head-callback'       => 'cpmmagz_header_style',
	) ) );
	}
	add_action( 'after_setup_theme', 'cpmmagz_custom_header_setup' );
endif;

if ( ! function_exists( 'cpmmagz_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see cpmmagz_custom_header_setup().
 */
function cpmmagz_header_style($output = '') {
    $header_text_color = get_header_textcolor();

    /*
     * If no custom options for text are set, let's bail.
     * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
     */
        if ( HEADER_TEXTCOLOR === $header_text_color ) {
            return;
        }

    // If we get this far, we have custom styles. Let's do this.
        // Has the text been hidden?
        if ( ! display_header_text() ) :
        $output = '.site-title,
                .site-description {
                    position: absolute;
                    clip: rect(1px, 1px, 1px, 1px);
                }';
        // If the user has set a custom color for the text use that.
        else :
        $output ='.site-title a,
                .site-description {
                    color: #'.esc_attr( $header_text_color ).'}';
        endif;
        return $output;
}
endif;

if ( function_exists( 'wp_update_custom_css_post' ) ) {
	$custom_css = ( get_theme_mod( 'css_change' ) ? get_theme_mod( 'css_change' ) : '');
    $core_css = wp_get_custom_css();
    if ( !empty($custom_css) && empty($core_css) ) {
        $return = wp_update_custom_css_post( $core_css . $custom_css );
    }
}
