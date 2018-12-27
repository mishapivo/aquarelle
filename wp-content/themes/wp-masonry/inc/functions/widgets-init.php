<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function wp_masonry_widgets_init() {

register_sidebar(array(
    'id' => 'wp-masonry-header-banner',
    'name' => esc_html__( 'Header Banner', 'wp-masonry' ),
    'description' => esc_html__( 'This sidebar is located on the header of the web page.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-sidebar-one',
    'name' => esc_html__( 'Main Sidebar', 'wp-masonry' ),
    'description' => esc_html__( 'This sidebar is normally located on the left-hand side of web page.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-side-widget wp-masonry-box widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-home-top-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Home Page Only)', 'wp-masonry' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of homepage.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-top-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Every Page)', 'wp-masonry' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of every page.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-home-bottom-fullwidth-widgets',
    'name' => esc_html__( 'Bottom Full Width Widgets (Home Page Only)', 'wp-masonry' ),
    'description' => esc_html__( 'This full-width widget area is located at the bottom of homepage.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-bottom-fullwidth-widgets',
    'name' => esc_html__( 'Bottom Full Width Widgets (Every Page)', 'wp-masonry' ),
    'description' => esc_html__( 'This full-width widget area is located at the bottom of every page.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-home-top-widgets',
    'name' => esc_html__( 'Top Widgets (Home Page Only)', 'wp-masonry' ),
    'description' => esc_html__( 'This widget area is located at the top of homepage.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-top-widgets',
    'name' => esc_html__( 'Top Widgets (Every Page)', 'wp-masonry' ),
    'description' => esc_html__( 'This widget area is located at the top of every page.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-home-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Home Page Only)', 'wp-masonry' ),
    'description' => esc_html__( 'This widget area is located at the bottom of homepage.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Every Page)', 'wp-masonry' ),
    'description' => esc_html__( 'This widget area is located at the bottom of every page.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-footer-1',
    'name' => esc_html__( 'Footer 1', 'wp-masonry' ),
    'description' => esc_html__( 'This sidebar is located on the left bottom of web page.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-footer-2',
    'name' => esc_html__( 'Footer 2', 'wp-masonry' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-footer-3',
    'name' => esc_html__( 'Footer 3', 'wp-masonry' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'wp-masonry-footer-4',
    'name' => esc_html__( 'Footer 4', 'wp-masonry' ),
    'description' => esc_html__( 'This sidebar is located on the right bottom of web page.', 'wp-masonry' ),
    'before_widget' => '<div id="%1$s" class="wp-masonry-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="wp-masonry-widget-title"><span>',
    'after_title' => '</span></h2>'));

}
add_action( 'widgets_init', 'wp_masonry_widgets_init' );


function wp_masonry_top_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'wp-masonry-home-top-fullwidth-widgets' ) || is_active_sidebar( 'wp-masonry-top-fullwidth-widgets' ) ) : ?>
<div class="wp-masonry-top-wrapper-outer clearfix">
<div class="wp-masonry-featured-posts-area wp-masonry-top-wrapper clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'wp-masonry-home-top-fullwidth-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'wp-masonry-top-fullwidth-widgets' ); ?>
</div>
</div>
<?php endif; ?>

<?php }


function wp_masonry_bottom_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'wp-masonry-home-bottom-fullwidth-widgets' ) || is_active_sidebar( 'wp-masonry-bottom-fullwidth-widgets' ) ) : ?>
<div class="wp-masonry-bottom-wrapper-outer clearfix">
<div class="wp-masonry-featured-posts-area wp-masonry-bottom-wrapper clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'wp-masonry-home-bottom-fullwidth-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'wp-masonry-bottom-fullwidth-widgets' ); ?>
</div>
</div>
<?php endif; ?>

<?php }


function wp_masonry_top_widgets() { ?>

<?php if ( is_active_sidebar( 'wp-masonry-home-top-widgets' ) || is_active_sidebar( 'wp-masonry-top-widgets' ) ) : ?>
<div class="wp-masonry-featured-posts-area wp-masonry-featured-posts-area-top clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'wp-masonry-home-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'wp-masonry-top-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function wp_masonry_bottom_widgets() { ?>

<?php if ( is_active_sidebar( 'wp-masonry-home-bottom-widgets' ) || is_active_sidebar( 'wp-masonry-bottom-widgets' ) ) : ?>
<div class='wp-masonry-featured-posts-area wp-masonry-featured-posts-area-bottom clearfix'>
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'wp-masonry-home-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'wp-masonry-bottom-widgets' ); ?>
</div>
<?php endif; ?>

<?php }