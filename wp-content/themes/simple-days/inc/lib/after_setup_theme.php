<?php
defined( 'ABSPATH' ) || exit;

load_theme_textdomain( 'simple-days', SIMPLE_DAYS_THEME_DIR . 'languages' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );

add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );


add_theme_support( 'html5', array(
  'comment-form',
  'comment-list',
  'gallery',
  'caption',
  'script',
  'style',
) );


global $content_width;
if ( ! isset( $content_width ) ) {
  $content_width = apply_filters( 'simple_days_content_width', 856 );
}

add_theme_support( 'custom-background', array(
 'default-color'          => '',
 'default-image'          => '',
 'default-repeat'         => 'repeat',
 'default-position-x'     => 'left',
 'default-position-y'     => 'top',
 'default-size'           => 'auto',
 'default-attachment'     => 'scroll',
 'wp-head-callback'       => '_custom_background_cb',
 'admin-head-callback'    => '',
 'admin-preview-callback' => ''
));


get_template_part( 'inc/customizer' );
   // Indicate widget sidebars can use selective refresh in the Customizer.(WP4.7)
add_theme_support( 'customize-selective-refresh-widgets' );

add_theme_support( 'custom-logo', array(
  'height'      => 60,
  'width'       => 300,
  'flex-height' => true,
  'flex-width'  => true,
  'header-text' => array( 'site-title', 'site-description' ),
));

add_theme_support('custom-header',array(
        //default image (empty to use none).
        //'default-image'          => '',
        //'uploads' => true,
        //'header-text' => true,
  'flex-width' => true,
  'flex-height' => true,
        // Set height and width, with a maximum value for the width.
  'height'                 => 624,
  'width'                  => 1980,
));

add_theme_support( 'editor-styles' );

add_editor_style( 'assets/css/custom-editor-style.css' );


add_theme_support( 'wp-block-styles' );
add_theme_support( 'align-wide' );

add_theme_support( 'responsive-embeds' );


register_nav_menu( 'primary' , esc_attr__( 'Header Menu', 'simple-days' ));
register_nav_menu( 'secondary' , esc_attr__( 'Footer Menu', 'simple-days' ));
register_nav_menu( 'sub' , esc_attr__( 'Header Sub Menu', 'simple-days' ));

get_template_part( 'inc/starter_content' );


$old_version = get_theme_mod( 'simple_days_theme_version','');
$current_version = wp_get_theme(get_template())->Version;
if($current_version != $old_version){
 set_theme_mod('simple_days_theme_version', $current_version);
 get_template_part( 'inc/build_style');
}
