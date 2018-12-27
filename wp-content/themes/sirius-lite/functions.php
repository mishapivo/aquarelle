<?php
/**
 * sirius functions and definitions
 *
 * @package sirius-lite
 */
?>
<?php

/*------------------------------
 Customizer
 ------------------------------*/
 
if ( ! class_exists( 'Kirki' ) ) {
    include_once( dirname( __FILE__ ) . '/inc/sirius_kirki.php' ); //fallback
    include_once( dirname( __FILE__ ) . '/inc/sirius_kirki_installer.php' ); //installer
}
require get_template_directory() . '/customize/theme-defaults.php';
require get_template_directory() . '/customize/customizer.php';

function sirius_customize_register( $wp_customize ) {
    $wp_customize->remove_control('header_textcolor');
    $wp_customize->get_section('colors')->title = esc_html__( 'Custom Colors', 'sirius-lite' );
    $wp_customize->get_section('colors')->priority = 94;
}
add_action( 'customize_register', 'sirius_customize_register' );

if(is_admin())  add_action( 'customize_controls_enqueue_scripts', 'sirius_custom_customize_enqueue' );
function sirius_custom_customize_enqueue() {
    wp_enqueue_style( 'sirius-customizer', get_template_directory_uri() . '/customize/style.css' );
}

/*------------------------------
 Setup
 ------------------------------*/

function sirius_setup() {
    global $sirius_defaults;
    load_theme_textdomain( 'sirius-lite', get_template_directory() . '/languages' ); 
    
    register_nav_menus( array(  'top_left'  => esc_html__( 'Top Left', 'sirius-lite'),
                                'top_right' => esc_html__( 'Top Right', 'sirius-lite'),
                                'main'      => esc_html__( 'Main', 'sirius-lite' ), 
                                'footer'    => esc_html__( 'Footer', 'sirius-lite') ) );
    
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo');
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    
    $args = array(
        'flex-width'    => true,
        'width'         => 1920,
        'flex-height'    => true,
        'height'        => 600,
        'default-image' => $sirius_defaults['sirius_custom_header'],
    );
    add_theme_support( 'custom-header', $args );

    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size(            1000, 600, array('center', 'center') );
    add_image_size( 'sirius-thumb',     1000, 600, array('center', 'center') );
    add_image_size( 'sirius-banner',    1090, 380, array('center', 'center') );
    add_image_size( 'sirius-related',   540,  540, array('center', 'center') );
    add_image_size( 'sirius-large',     740,  380,  array('center', 'center') );

    add_post_type_support('page', 'excerpt');
    
    #https://make.wordpress.org/core/2016/11/26/extending-the-custom-css-editor/
    if ( function_exists( 'wp_update_custom_css_post' ) ) {
        $css = sirius_get_option('sirius_advanced_css');
        if ( $css ) {
            $core_css = wp_get_custom_css(); 
            $return = wp_update_custom_css_post( $core_css . $css );
            if ( ! is_wp_error( $return ) ) {
                remove_theme_mod( 'sirius_advanced_css' );
            }
        }
    }
}
add_action( 'after_setup_theme', 'sirius_setup' );

/*------------------------------
 Styles and Scripts
 ------------------------------*/

function sirius_scripts() {
    
    /* Styles */
    
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_register_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css' );
    wp_register_style('bootstrap-select', get_template_directory_uri().'/assets/css/bootstrap-select.css' );

    $sirius_custom_colors = 0;
    $sirius_custom_typography = 0;
    
    if($sirius_custom_typography == 0) {
        wp_enqueue_style( 'sirius-fonts', sirius_fonts_url(), array(), null );
    } 
    //default stylesheet
    $deps = array('bootstrap', 'font-awesome', 'bootstrap-select');
    $this_theme = wp_get_theme(); 
    wp_enqueue_style('sirius-style', get_stylesheet_uri(), $deps, $this_theme->get( 'Version' ));
    
    wp_enqueue_style('animate-css', get_template_directory_uri().'/assets/css/animate.css');
    
    // Load html5shiv.min.js
	wp_enqueue_script( 'sirius-html5', get_template_directory_uri() . '/assets/js/html5shiv.min.js', array(), '3.7.0' );
	wp_script_add_data( 'sirius-html5', 'conditional', 'lt IE 9' );
    // Load respond.min.js
	wp_enqueue_script( 'sirius-respond', get_template_directory_uri() . '/assets/js/respond.min.js', array(), '1.3.0' );
	wp_script_add_data( 'sirius-html5', 'conditional', 'lt IE 9' );
    
    /* Scripts */
    
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '', true );
    wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js', array('jquery'), '', true );
    wp_enqueue_script('sirius-js', get_template_directory_uri() . '/assets/js/sirius.js', array('jquery'), '', true );
    
    #animation
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '', true );
    wp_enqueue_script('vega-wp-themejs-anim', get_template_directory_uri() . '/assets/js/sirius-anim.js', array('jquery'), '', true );
        
    //comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'sirius_scripts' );

if ( ! function_exists( 'sirius_fonts_url' ) ) :
function sirius_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';
    /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'sirius-lite' ) ) {
        
    }
    /* translators: If there are characters in your language that are not supported by Roboto Slab, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Roboto Slab font: on or off', 'sirius-lite' ) ) {
        $fonts[] = 'Roboto+Slab:400,700';
        $fonts[] = 'Roboto:300,300i,400,400i,500,500i,700';
    }
    
    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => implode( '|', $fonts ),
            'subset' => $subsets,
        ), 'https://fonts.googleapis.com/css' );
    }
    return $fonts_url;
}
endif;

/*------------------------------
 Custom CSS
 ------------------------------*/

if ( ! function_exists( 'sirius_custom_css_cta1' ) ) :
function sirius_custom_css_cta1(){ 
    $sirius_frontpage_cta_1_background_color = sirius_get_option('sirius_frontpage_cta_1_background_color');
    $sirius_frontpage_cta_1_parallax_image = sirius_get_option('sirius_frontpage_cta_1_parallax_image');
    echo "<style>";
    if($sirius_frontpage_cta_1_parallax_image != '') { 
        echo ".frontpage-cta1.parallax{background-image:url(" . esc_url($sirius_frontpage_cta_1_parallax_image) . ");}";
        echo ".frontpage-cta1.no-parallax{background-image:url(" . esc_url($sirius_frontpage_cta_1_parallax_image) . ");}";
    } 
    if($sirius_frontpage_cta_1_background_color != '') { 
        echo ".frontpage-cta1.parallax:before{background-color:" . esc_attr($sirius_frontpage_cta_1_background_color) . "}";
        echo ".frontpage-cta1.no-parallax:before{background-color:" . esc_attr($sirius_frontpage_cta_1_background_color) . "}";
    }
    echo "</style>";
} 
endif;
add_action('wp_head','sirius_custom_css_cta1', 96);

if ( ! function_exists( 'sirius_custom_css_testimonials' ) ) :
function sirius_custom_css_testimonials(){ 
    $sirius_frontpage_testimonials_background_color = sirius_get_option('sirius_frontpage_testimonials_background_color');
    $sirius_frontpage_testimonials_parallax_image = sirius_get_option('sirius_frontpage_testimonials_parallax_image');
    echo "<style>";
    if($sirius_frontpage_testimonials_parallax_image != '') { 
        echo ".frontpage-testimonials.parallax{background-image:url(" . esc_url($sirius_frontpage_testimonials_parallax_image) . ");}";
        echo ".frontpage-testimonials.no-parallax{background-image:url(" . esc_url($sirius_frontpage_testimonials_parallax_image) . ");}";
    }
    if($sirius_frontpage_testimonials_background_color != '') { 
        echo ".frontpage-testimonials.parallax:before{background-color:" . esc_attr($sirius_frontpage_testimonials_background_color) ."}";
        echo ".frontpage-testimonials.no-parallax:before{background-color:" . esc_attr($sirius_frontpage_testimonials_background_color) . "}";
    }
    echo "</style>";
} 
endif;
add_action('wp_head','sirius_custom_css_testimonials', 96);


if ( ! function_exists( 'sirius_custom_css_cta2' ) ) :
function sirius_custom_css_cta2(){ 
    $sirius_frontpage_cta_2_background_color = sirius_get_option('sirius_frontpage_cta_2_background_color');
    $sirius_frontpage_cta_2_parallax_image = sirius_get_option('sirius_frontpage_cta_2_parallax_image');
    echo "<style>";
    if($sirius_frontpage_cta_2_parallax_image != '') { 
        echo ".frontpage-cta2.parallax{background-image:url(" . esc_url($sirius_frontpage_cta_2_parallax_image) . ");}";
        echo ".frontpage-cta2.no-parallax{background-image:url(" . esc_url($sirius_frontpage_cta_2_parallax_image) . ");}";
    } 
    if($sirius_frontpage_cta_2_background_color != '') { 
        echo ".frontpage-cta2.parallax:before{background-color:" . esc_attr($sirius_frontpage_cta_2_background_color) . "}";
        echo ".frontpage-cta2.no-parallax:before{background-color:" . esc_attr($sirius_frontpage_cta_2_background_color) . "}";
    }
    echo "</style>";
} 
endif;
add_action('wp_head','sirius_custom_css_cta2', 96);

if ( ! function_exists( 'sirius_custom_css' ) ) :
function sirius_custom_css() {
    $sirius_advanced_css = sirius_get_option('sirius_advanced_css');
    if($sirius_advanced_css != '') {    
        echo '<!-- Custom CSS -->';
        $output="<style>" . wp_strip_all_tags($sirius_advanced_css) . "</style>";
        echo $output;
        echo '<!-- /Custom CSS -->';
    }
}
endif;
add_action('wp_head','sirius_custom_css', 100);


/*------------------------------
 Widgets
 ------------------------------*/
require_once get_template_directory() . '/widgets/widgets.php';


/*------------------------------
 Content Width 
 ------------------------------*/

function sirius_content_width() {
	$content_width = 1200;
	$GLOBALS['content_width'] = apply_filters( 'sirius_content_width', $content_width );
}
add_action( 'after_setup_theme', 'sirius_content_width', 0 );

/*------------------------------
 wp_bootstrap_navwalker
 ------------------------------*/
require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';


/*------------------------------
 Filters
 ------------------------------*/

#disable comments on media attachments
function sirius_filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'sirius_filter_media_comment_status', 10 , 2 );

#move comment field to the bottom of the comments form
function sirius_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'sirius_move_comment_field_to_bottom' );

#excerpt length
function sirius_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'sirius_excerpt_length', 999 );

#add class to page nav
function sirius_wp_page_menu_class( $class ) {
  return preg_replace( '/<ul>/', '<ul class="nav navbar-nav">', $class, 1 );
}
add_filter( 'wp_page_menu', 'sirius_wp_page_menu_class' );

#add class to pagination links
add_filter('next_posts_link_attributes', 'sirius_next_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'sirius_prev_posts_link_attributes');

function sirius_next_posts_link_attributes() {
    return 'class="btn btn-blue post-pagination-prev"';
}
function sirius_prev_posts_link_attributes() {
    return 'class="btn btn-blue post-pagination-next"';
}


//http://wordpress.stackexchange.com/questions/50779/how-to-wrap-oembed-embedded-video-in-div-tags-inside-the-content
add_filter('embed_oembed_html', 'sirius_embed_oembed_html', 99, 4);
function sirius_embed_oembed_html($html, $url, $attr, $post_id) {
  return '<div class="iframe-embed">' . $html . '</div>';
}


function sirius_archive_title( $title ) {
    if( is_home() && get_option('page_for_posts') ) {
        $title = get_page( get_option('page_for_posts') )->post_title;
    }
    else if( is_home() ) {
        $title = esc_html__("Home", 'sirius-lite');
    }  
    return $title;
}
add_filter( 'get_the_archive_title', 'sirius_archive_title' );

/*------------------------------
 Theme Functions
 ------------------------------*/
 
#sirius_get_option
if ( ! function_exists( 'sirius_get_option' ) ) :
function sirius_get_option($key){
    global $sirius_defaults;
    if (array_key_exists($key, $sirius_defaults)) 
        $value = get_theme_mod($key, $sirius_defaults[$key]); 
    else
        $value = get_theme_mod($key);
    return $value;
}
endif;

#sirius_get_col_class
if ( ! function_exists( 'sirius_get_col_class' ) ) :
function sirius_get_col_class($n){
    switch($n){
        case 1: return 'col-xs-4 col-xs-offset-4'; break;
        case 2: return 'col-sm-3 col-sm-offset-3' . '|' . 'col-sm-3'; break;
        case 3: return 'col-sm-4|col-sm-4|col-sm-4'; break;
        case 4: return 'col-sm-3|col-sm-3|col-sm-3|col-sm-3'; break;
        case 5: return 'col-sm-2 col-sm-offset-1|col-sm-2|col-sm-2|col-sm-2|col-sm-2'; break;
        case 6: return 'col-sm-2|col-sm-2|col-sm-2|col-sm-2|col-sm-2|col-sm-2'; break;
    }
}
endif;


if ( ! function_exists( 'sirius_show_custom_css_field' ) ) :
function sirius_show_custom_css_field(){
    if(get_bloginfo('version') >= 4.7){
        $sirius_advanced_css = sirius_get_option('sirius_advanced_css');
        if($sirius_advanced_css == '') return false;
        else return true;
    } 
    return true;
}
endif;

if ( ! function_exists( 'sirius_animate' ) ):
function sirius_animate($x){
    echo esc_attr('wow ' . $x);
}
endif;


/*------------------------------
 Include the TGM_Plugin_Activation class to recommend Kirki
 ------------------------------*/
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'sirius_register_required_plugins' );

function sirius_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Kirki',
			'slug'      => 'kirki',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'sirius-lite',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '' ,                     // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}



/*------------------------------
 Example
 ------------------------------*/
 
#default nav top level pages
function sirius_default_nav(){
    echo '<div class="navbar-collapse collapse">';
    echo '<ul class="nav navbar-nav">';
    $pages = get_pages();  
    $n = count($pages); 
    $i=0;
    foreach ( $pages as $page ) {
        $menu_name = $page->post_title;
        $menu_link = get_page_link( $page->ID );
        if(get_the_ID() == $page->ID) $current_class = "current_page_item";
        else { $current_class = ''; $home_current_class = ''; }
        $menu_class = "page-item-" . $page->ID;
        echo "<li class='page_item ".esc_attr($menu_class)." $current_class'><a href='".esc_url($menu_link)."'>".esc_html($menu_name)."</a></li>";
        $i++;
    } 
    echo '</ul>';
    echo '</div>';
}

#sirius_rand_page
function sirius_rand_page() {
    return 2; 
} 

#sirius_get_sample_image
function sirius_get_sample_image($what){
    global $sirius_defaults;
    switch($what){
        case 'sirius-large':        $images = $sirius_defaults['sirius_featured_large_sample']; $rand_key = array_rand($images, 1); return ($images[$rand_key]);
        case 'thumbnail':
        case 'sirius-thumb':        $images = $sirius_defaults['sirius_featured_sample']; $rand_key = array_rand($images, 1); return ($images[$rand_key]);    
    }
}
?>