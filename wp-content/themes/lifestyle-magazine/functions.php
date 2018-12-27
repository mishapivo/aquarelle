<?php
/**
 * lifestyle-magazine functions and definitions
 *
 * @package Lifestyle Magazine
 */

if ( ! function_exists( 'lifestyle_magazine_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lifestyle_magazine_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on lifestyle-magazine, use a find and replace
		 * to change 'lifestyle-magazine' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'lifestyle-magazine' );

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


		add_theme_support( 'post-templates' );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(			
			'primary' => esc_html__( 'Primary Menu', 'lifestyle-magazine' ),
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

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'custom-logo', array(
		   'height'      => 90,
		   'width'       => 400,
		   'flex-width' => true,
		));

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'lifestyle_magazine_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( "custom-header", array(
			'default-color' => 'ffffff',		
		) );
		
		add_editor_style() ;
		
	}	// lifestyle_magazine_setup
endif;
add_action( 'after_setup_theme', 'lifestyle_magazine_setup' );



/**
 * Enqueue scripts and styles.
 */
function lifestyle_magazine_scripts() {
	$font_family = get_theme_mod( 'font_family', 'Montserrat' );
	$heading_font_family = get_theme_mod( 'heading_font_family', 'Poppins' );
	$site_identity_font_family = esc_attr( get_theme_mod( 'site_identity_font_family', 'Poppins' ) );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css' );
	// wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri().'/css/owl.carousel.css' );
	wp_enqueue_style( 'lifestyle-magazine-googlefonts', 'https://fonts.googleapis.com/css?family='. esc_attr( $font_family ) . ':200,300,400,500,600,700,800,900|' . $heading_font_family . ':200,300,400,500,600,700,800,900|' . $site_identity_font_family . ':200,300,400,500,600,700,800,900' );
	wp_enqueue_style( 'lifestyle-magazine-style', get_template_directory_uri() . '/style.css' );


	if ( is_rtl() ) {
		wp_enqueue_style( 'lifestyle-magazine-style', get_stylesheet_uri() );
		wp_style_add_data( 'lifestyle-magazine-style', 'rtl', 'replace' );
		wp_enqueue_style( 'lifestyle-magazine-css-rtl', get_template_directory_uri().'/css/bootstrap-rtl.css' );
		wp_enqueue_script( 'lifestyle-magazine-js-rtl', get_template_directory_uri() . '/js/bootstrap.rtl.js', array('jquery'), '1.0.0', true );
	}
	
	wp_enqueue_script( 'lifestyle-magazine-scripts', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '3.3.6', true );
	// wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.0.2', true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '2.2.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lifestyle_magazine_scripts' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! isset( $content_width ) ) $content_width = 900;
function lifestyle_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lifestyle_magazine_content_width', 640 );

}
add_action( 'after_setup_theme', 'lifestyle_magazine_content_width', 0 );


/**
* Call Widget page
**/
require get_template_directory() . '/inc/widgets/widgets.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';


// Register Custom Navigation Walker
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Demo Content Section
 */
require get_stylesheet_directory() . '/inc/demo-content.php';


// Breadcrumbs
require get_template_directory() . '/inc/breadcrumbs.php';


/**
 * Recommended Plugins
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';



require get_template_directory() . '/inc/dynamic-css.php';

if ( is_admin() ) {

	// Load demo.
	require_once trailingslashit( get_stylesheet_directory() ) . 'inc/demo/class-demo.php';
	require_once trailingslashit( get_stylesheet_directory() ) . 'inc/demo/demo.php';
}


if ( ! class_exists( 'Lifestyle_Magazine_Customize' ) ) {
	require get_template_directory() . '/trt-customize-pro/class-customize.php';
}


// Remove default "Category or Tags" from title
add_filter( 'get_the_archive_title', 'lifestyle_magazine_remove_defalut_tax_title');
function lifestyle_magazine_remove_defalut_tax_title( $title ) {
	if ( is_category() ) {
	        $title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
	    $title = single_tag_title( '', false );
	}
	return $title;
}


// add classes for post_class function
add_filter( 'post_class', 'lifestyle_magazine_sticky_classes', 10, 3 ); 
function lifestyle_magazine_sticky_classes( $classes, $class, $post_id ) {   

    $classes[] = 'eq-blocks';

    return $classes;
}


function lifestyle_magazine_load_more_scripts() {

	$archive_cat = '';

	if( is_front_page() && ! is_home() ) {
		$archive_cat = get_theme_mod( 'homepage_blog_section_category' );
	}
 
	$args = array(
        'post_type' => 'post',
        'cat'       => absint( $archive_cat ),
        'paged' => get_query_var( 'paged' ) ? absint( get_query_var('paged') ) : 1
    );
    $wp_query = new WP_Query( $args );

	wp_register_script( 'lifestyle_magazine_loadmore', get_template_directory_uri() . '/js/loadmore.js', array( 'jquery' ) );
 
	wp_localize_script( 'lifestyle_magazine_loadmore', 'lifestyle_magazine_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'current_page' => get_query_var( 'paged' ) ? absint( get_query_var('paged') ) : 1,
		'max_page' => $wp_query->max_num_pages,
		'cat'	=>	absint( $archive_cat )
	) );
 
 	wp_enqueue_script( 'lifestyle_magazine_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'lifestyle_magazine_load_more_scripts' );


function lifestyle_magazine_load_more_ajax() {
 
	if( isset( $_POST['page'] ) ) {
		$args['paged'] = absint( $_POST['page'] + 1 );
	}
	$args['post_status'] = esc_html( 'publish' );

	
	$args['cat'] = absint( $_POST[ 'cat' ] );
	

	$wp_query = new WP_Query( $args );
 
	if( $wp_query->have_posts() ) :
 
		while( $wp_query->have_posts() ): $wp_query->the_post();			
			get_template_part( 'template-parts/content' );	
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_lifestyle_magazine_loadmore', 'lifestyle_magazine_load_more_ajax');
add_action('wp_ajax_nopriv_lifestyle_magazine_loadmore', 'lifestyle_magazine_load_more_ajax');


// Enable woocommerce if installed:
if ( class_exists( 'WooCommerce' ) ) {
	add_theme_support( 'woocommerce' );
}

function lifestyle_magazine_excerpt( $limit ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
	}
	$excerpt = implode( " ", $excerpt );
	$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );
	return $excerpt;
}

function lifestyle_magazine_after_import_menu_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'main menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary' => $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'lifestyle_magazine_after_import_menu_setup' );

function lifestyle_magazine_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
    global $paged;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}