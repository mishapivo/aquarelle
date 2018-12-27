<?php
defined( 'ABSPATH' ) || exit;


get_template_part( 'inc/lib/setup' );

define( 'SIMPLE_DAYS_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'SIMPLE_DAYS_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

require SIMPLE_DAYS_THEME_DIR . 'inc/template-tags.php';


get_template_part( 'inc/extra','content' );



if ( ! function_exists( 'simple_days_setup' ) ) :
  function simple_days_setup() {
    
    get_template_part( 'inc/lib/after_setup_theme' );
  }
endif;
add_action( 'after_setup_theme', 'simple_days_setup' );







if ( ! function_exists( 'simple_days_get_the_archive_title' ) ) :
  
  function simple_days_get_the_archive_title($title) {
    if ( is_category() ) {
      $title = single_cat_title( '<i class="fa fa-folder-open-o" aria-hidden="true"></i> ', false );
    }elseif ( is_tag() ) {
      $title = single_tag_title( '<i class="fa fa-tag" aria-hidden="true"></i> ', false );
    } elseif ( is_author() ) {
      $title = '<i class="fa fa-user" aria-hidden="true"></i> '. get_the_author();

    } elseif ( is_year() || is_month() || is_day() ) {
     $title = '<i class="fa fa-calendar-check-o" aria-hidden="true"></i> '. $title;
   }
   return $title;
 }
endif;
add_filter( 'get_the_archive_title', 'simple_days_get_the_archive_title');

if ( ! function_exists( 'simple_days_replace_script_type' ) ) :
  function simple_days_replace_script_type($tag) {
   if (!YA_AMP){
     $tag =  str_replace("type='text/javascript' src='https://www.googletagmanager.com/gtag/js", "async src='https://www.googletagmanager.com/gtag/js", $tag);
   }
   return $tag;
 }
endif;
add_filter( 'script_loader_tag','simple_days_replace_script_type');



if ( ! function_exists( 'simple_days_required_stylesheets' ) ) :
  function simple_days_required_stylesheets(){

    get_template_part( 'inc/lib/required_stylesheets' );

  }
endif;
add_action('wp_enqueue_scripts','simple_days_required_stylesheets');



if ( ! function_exists( 'simple_days_footer_stylesheets' ) ) :
  function simple_days_footer_stylesheets() {

    if (!YA_AMP){
      get_template_part( 'inc/lib/footer_stylesheets' );
      
      simple_days_customize_fonts_enqueue();
    }

  }
endif;
add_action( 'wp_footer', 'simple_days_footer_stylesheets' );











if ( ! function_exists( 'simple_days_customize_fonts_enqueue' ) ) :
  function simple_days_customize_fonts_enqueue() {

    get_template_part( 'inc/lib/customize_fonts' );

  }
endif;



if ( ! function_exists( 'simple_days_comment_author_anchor' ) ) :
  function simple_days_comment_author_anchor( $author_link ){
    return str_replace( "<a", "<a target='_blank'", $author_link );
  }
endif;
add_filter( "get_comment_author_link", "simple_days_comment_author_anchor" );


if ( ! function_exists( 'simple_days_gutenberg_front_styles' ) ) :
  function simple_days_gutenberg_front_styles() {
    $one_column_post = explode(',', get_theme_mod( 'simple_days_one_column_post',''));

    if(SIMPLE_DAYS_SIDEBAR){
      wp_enqueue_style( 'simple_days_gutenberg_front_styles', SIMPLE_DAYS_THEME_URI . 'assets/css/gutenberg-front-style.min.css',array( 'simple_days_style' ) );
    }else{
      wp_enqueue_style( 'simple_days_gutenberg_front_styles', SIMPLE_DAYS_THEME_URI . 'assets/css/gutenberg-front-one-column-style.min.css',array( 'simple_days_style' ) );
    }
    
    wp_enqueue_script( 'fitvids',SIMPLE_DAYS_THEME_URI . 'assets/js/gutenberg/jquery.fitvids.js', array('jquery'), null, true);
    add_action('wp_footer', 'simple_days_fitvids');
  }
endif;
add_action( 'enqueue_block_assets', 'simple_days_gutenberg_front_styles' );


if ( ! function_exists( 'simple_days_fitvids' ) ) :
  function simple_days_fitvids() {
    echo '<script type="text/javascript">
    jQuery(document).ready(function() {
      jQuery(".wp-block-embed-vimeo").fitVids();
    });</script>';
  }
endif;

if ( ! function_exists( 'simple_days_delete_cache' ) ) :
  function simple_days_delete_cache() {
    get_template_part( 'inc/lib/delete_cache' );
  }
endif;
add_action('switch_theme', 'simple_days_delete_cache');



if ( is_admin() ){

  get_template_part( 'inc/lib/admin_page' );

}
