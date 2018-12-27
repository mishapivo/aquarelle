<?php 

/**
 * Feminine Munk functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Feminine_Munk
 */

if ( !function_exists( 'feminine_munk_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function feminine_munk_setup(){
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Feminine Munk, use a find and replace
         * to change 'feminine-munk' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'feminine-munk', get_template_directory() . '/languages' );

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
            'primary' => esc_html__( 'Primary', 'feminine-munk' ),
        ));

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
        add_theme_support( 'custom-background', apply_filters( 'feminine_munk_custom_background_args', array(
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
            'header-text' => array( 'site-title', 'site-description' ),
        ) );

        // Image sizes

        add_image_size( 'feminine-munk-with-sidebar-img', 690, 396, true );
        add_image_size( 'feminine-munk-without-sidebar-img', 1170, 600, true );
        add_image_size( 'feminine-munk-feature-post', 290, 450, true );
        add_image_size( 'feminine-munk-similar-post-img', 720, 415, true );
    }
endif;
add_action( 'after_setup_theme', 'feminine_munk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function feminine_munk_content_width(){
    $GLOBALS[ 'content_width' ] = apply_filters( 'feminine_munk_content_width', 780 );
}
add_action( 'after_setup_theme', 'feminine_munk_content_width', 0 );


if( ! function_exists( 'feminine_munk_template_redirect_content_width' ) ) :
/**
* Adjust content_width value according to template.
*
* @return void
*/
function feminine_munk_template_redirect_content_width(){
    // Full Width in the absence of sidebar.
    if( is_page() ){
       $sidebar_layout = feminine_munk_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! is_active_sidebar( 'sidebar' ) ) $GLOBALS['content_width'] = 1170;        
    }elseif ( ! ( is_active_sidebar( 'sidebar' ) ) ) {
        $GLOBALS['content_width'] = 1170;
    }
}
endif;
add_action( 'template_redirect', 'feminine_munk_template_redirect_content_width' );

/**
 * Enqueue scripts and styles.
 */
function feminine_munk_scripts(){
    $google_font_args = array(
        'family' => 'Droid+Serif:400,700|Fanwood+Text:400,400i|Open+Sans:300,400,600,700',
    );
    wp_enqueue_style( 'feminine-munk-google-fonts', add_query_arg( $google_font_args, "//fonts.googleapis.com/css" ) ); //Google Fonts
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' ); //font-awesome
    wp_enqueue_style( 'feminine-munk-style', get_stylesheet_uri() ); //Style.css

    wp_enqueue_script( 'feminine-munk-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'feminine_munk_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function feminine_munk_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if ( !is_singular() ) {
        $classes[] = 'hfeed';
    }

    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
        $classes[] = 'custom-background-color';
    }

    // Adds a class of custom-background-image to sites with a custom background image.
    if ( get_background_image() ) {
        $classes[] = 'custom-background-image';
    }

    if ( !( is_active_sidebar( 'sidebar' ) ) ) {
        $classes[] = 'full-width';
    }
    if ( is_page() ) {
        $sidebar_layout = feminine_munk_sidebar_layout();
        if ($sidebar_layout == 'no-sidebar')
            $classes[] = 'full-width';
    }

    return $classes;
}
add_filter( 'body_class', 'feminine_munk_body_classes' );

/**
 * Function to exclude sticky post from main query
*/
function feminine_munk_exclude_posts( $query ) {
    
    $stickies = get_option( 'sticky_posts' ); //get all sticky posts
    $one      = get_theme_mod( 'featured_post_one' );
    $two      = get_theme_mod( 'featured_post_two' );
    $three    = get_theme_mod( 'featured_post_three' );
    $four     = get_theme_mod( 'featured_post_four' );
    
    if( ( $one || $two || $three || $four ) && get_theme_mod( 'ed_feature_post' ) ) {
        $posts = array( $one, $two, $three, $four );
        $posts = array_map( 'intval', $posts );
        if( $stickies ) $posts = array_merge( $stickies, $posts );
        $excludes = array_diff( array_unique( $posts ), array('') );
    }else{
        $excludes = array();
    }

    if ( ! is_admin() && $query->is_home() && $query->is_main_query() && $excludes ) {
        $query->set( 'post__not_in',        $excludes );
        $query->set( 'ignore_sticky_posts', true   );
    }    
}
add_filter( 'pre_get_posts', 'feminine_munk_exclude_posts' );

if( ! function_exists( 'feminine_munk_move_comment_field_to_bottom' ) ) :
/**
 * Hook to move comment text field to the bottom in WP 4.4
 * 
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-move-comment-text-field-to-bottom-in-wordpress-4-4/  
 */
function feminine_munk_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
endif;
add_filter( 'comment_form_fields', 'feminine_munk_move_comment_field_to_bottom' );

if( ! function_exists( 'feminine_munk_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function feminine_munk_change_comment_form_default_fields( $fields ) {
    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields[ 'author' ] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'feminine-munk' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields[ 'email' ] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'feminine-munk' ) . '" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields[ 'url' ] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'feminine-munk' ) . '" type="url" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '" size="30" /></p>'; 
    
    return $fields;
    
}
endif;
add_filter( 'comment_form_default_fields', 'feminine_munk_change_comment_form_default_fields' );

if( ! function_exists( 'feminine_munk_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function feminine_munk_change_comment_form_defaults( $defaults ) {
    
    $defaults[ 'comment_field' ] = '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'feminine-munk' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    
    return $defaults;
}
endif;
add_filter( 'comment_form_defaults', 'feminine_munk_change_comment_form_defaults' );