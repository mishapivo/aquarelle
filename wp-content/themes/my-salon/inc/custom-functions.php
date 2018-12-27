<?php
/**
 * My Salon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package my_salon
 */

if ( ! function_exists( 'my_salon_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function my_salon_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on My Salon, use a find and replace
		 * to change 'my-salon' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'my-salon', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Primary', 'my-salon' ),
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
		add_theme_support( 'custom-background', apply_filters( 'my_salon_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Custom Image Size
		
	    add_image_size( 'my-salon-slider', 1400, 660, true );
	    add_image_size( 'my-salon-with-sidebar', 833, 474, true );
	    add_image_size( 'my-salon-without-sidebar', 1110, 474, true );
	    add_image_size( 'my-salon-welcome', 560, 360, true );

	    add_image_size( 'my-salon-recent-post', 78, 78, true );
	    add_image_size( 'my-salon-portfolio', 230, 230, true ); 
	    add_image_size( 'my-salon-three-col', 360 , 240, true );
	    add_image_size( 'my-salon-services-thumb', 100 , 100, true );
	    add_image_size( 'my-salon-teams', 360 , 480, true );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'header-text' => array( 'site-title', 'site-description' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'my_salon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function my_salon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'my_salon_content_width', 750 );
}
add_action( 'after_setup_theme', 'my_salon_content_width', 0 );

/**
* Adjust content_width value according to template.
*
* @return void
*/
function my_salon_template_redirect_content_width() {
	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = my_salon_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1140;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1170;
	}
}

/**
 * Enqueue scripts and styles.
 */
function my_salon_scripts() {
	$my_salon_query_args = array(
		'family' => 'Source Sans Pro:400,700',
		);

	wp_enqueue_style( 'my-salon-google-fonts', add_query_arg( $my_salon_query_args, "//fonts.googleapis.com/css" ) );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/css/owl.theme.default.css' );
    wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/css/meanmenu.css' );
    wp_enqueue_style( 'my-salon-style', get_stylesheet_uri(), MY_SALON_THEME_VERSION );   

    wp_enqueue_script( 'jquery-meanumenu', get_template_directory_uri() . '/js/jquery.meanmenu.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '2.2.1', true );
    wp_register_script( 'my-salon-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), MY_SALON_THEME_VERSION, true );
    
    $slider_auto      = get_theme_mod( 'my_salon_slider_auto', '1' );
    $slider_loop      = get_theme_mod( 'my_salon_slider_loop', '1' );
    $slider_pager     = get_theme_mod( 'my_salon_slider_pager', '1' );    
    $slider_animation = get_theme_mod( 'my_salon_slider_animation', 'slide' );
    $slider_speed     = get_theme_mod( 'my_salon_slider_speeds', 400 );
    $slider_pause     = get_theme_mod( 'my_salon_slider_pause', 6000 );
    
    $array = array(
        'auto'      => esc_attr( $slider_auto ),
        'loop'      => esc_attr( $slider_loop ),
        'pager'     => esc_attr( $slider_pager ),
        'animation' => esc_attr( $slider_animation ),
        'speed'     => absint( $slider_speed ),
        'pause'     => absint( $slider_pause ),
    );
    
    wp_localize_script( 'my-salon-custom', 'my_salon_data', $array );
    wp_enqueue_script( 'my-salon-custom' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_salon_scripts' );
/*
if ( is_admin() ) : // Load only if we are viewing an admin page

function my_salon_admin_scripts() {
	
	wp_enqueue_style( 'my-salon-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );
    
}

add_action( 'admin_enqueue_scripts', 'my_salon_admin_scripts' );

endif;
*/
if( ! function_exists( 'my_salon_customizer_js' ) ) :
/** 
 * Registering and enqueuing scripts/stylesheets for Customizer controls.
 */ 
function my_salon_customizer_js() {
    wp_enqueue_script( 'my-salon-customizer-js', get_template_directory_uri() . '/inc/js/admin.js', array('jquery'), MY_SALON_THEME_VERSION, true  );
}
endif;
add_action( 'customize_controls_enqueue_scripts', 'my_salon_customizer_js' );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function my_salon_body_classes( $classes ) {
	global $post;
    $ed_slider = get_theme_mod( 'my_salon_ed_slider','1' );

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if( $ed_slider && is_front_page() && !is_home() ) {
        $classes[] = 'has-slider';
    }

	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
	$classes[] = 'custom-background-image';
	}

	// Adds a class of custom-background-color to sites with a custom background color.
	if ( get_background_color() != 'ffffff' ) {
	$classes[] = 'custom-background-color';
	}

	if(is_page()){
	$my_salon_post_class = my_salon_sidebar_layout(); 
	if( $my_salon_post_class == 'no-sidebar' )
	$classes[] = 'full-width';
	}

	if( !( is_active_sidebar( 'right-sidebar' )) || is_404() ) {
	  $classes[] = 'full-width'; 
	}

	return $classes;
}
add_filter( 'body_class', 'my_salon_body_classes' );

/** 
 * Hook to move comment text field to the bottom in WP 4.4 
 *
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-move-comment-text-field-to-bottom-in-wordpress-4-4/  
 */
function my_salon_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}


/* Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function my_salon_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'my_salon_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'my_salon_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so my_salon_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so my_salon_categorized_blog should return false.
		return false;
	}
}


/**
 * Flush out the transients used in my_salon_categorized_blog.
 */
function my_salon_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'my_salon_categories' );
}


if ( ! function_exists( 'my_salon_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function my_salon_excerpt_more() {
	if ( ! is_admin() ){
		return ' &hellip; ';
	}
}
endif;

if ( ! function_exists( 'my_salon_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function my_salon_excerpt_length( $length ) {
	if ( ! is_admin() ){
    	return 20;
	}
}
endif;

/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'my_salon_is_woocommerce_activated' ) ) {
	
	function my_salon_is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}