<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package GreatWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function greatwp_widgets_init() {

register_sidebar(array(
    'id' => 'greatwp-header-banner',
    'name' => esc_html__( 'Header Banner', 'greatwp' ),
    'description' => esc_html__( 'This sidebar is located on the header of the web page.', 'greatwp' ),
    'before_widget' => '<div id="%1$s" class="greatwp-header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="greatwp-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'greatwp-sidebar-one',
    'name' => esc_html__( 'Sidebar 1', 'greatwp' ),
    'description' => esc_html__( 'This sidebar is normally located on the left-hand side of web page.', 'greatwp' ),
    'before_widget' => '<div id="%1$s" class="greatwp-side-widget widget greatwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="greatwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'greatwp-home-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Home Page Only)', 'greatwp' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of homepage.', 'greatwp' ),
    'before_widget' => '<div id="%1$s" class="greatwp-main-widget widget greatwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="greatwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'greatwp-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Every Page)', 'greatwp' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of every page.', 'greatwp' ),
    'before_widget' => '<div id="%1$s" class="greatwp-main-widget widget greatwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="greatwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'greatwp-home-top-widgets',
    'name' => esc_html__( 'Top Widgets (Home Page Only)', 'greatwp' ),
    'description' => esc_html__( 'This widget area is located at the top of homepage.', 'greatwp' ),
    'before_widget' => '<div id="%1$s" class="greatwp-main-widget widget greatwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="greatwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'greatwp-top-widgets',
    'name' => esc_html__( 'Top Widgets (Every Page)', 'greatwp' ),
    'description' => esc_html__( 'This widget area is located at the top of every page.', 'greatwp' ),
    'before_widget' => '<div id="%1$s" class="greatwp-main-widget widget greatwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="greatwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'greatwp-home-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Home Page Only)', 'greatwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of homepage.', 'greatwp' ),
    'before_widget' => '<div id="%1$s" class="greatwp-main-widget widget greatwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="greatwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'greatwp-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Every Page)', 'greatwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of every page.', 'greatwp' ),
    'before_widget' => '<div id="%1$s" class="greatwp-main-widget widget greatwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="greatwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'greatwp-footer-1',
    'name' => esc_html__( 'Footer 1', 'greatwp' ),
    'description' => esc_html__( 'This sidebar is located on the left bottom of web page.', 'greatwp' ),
    'before_widget' => '<div id="%1$s" class="greatwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="greatwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'greatwp-footer-2',
    'name' => esc_html__( 'Footer 2', 'greatwp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'greatwp' ),
    'before_widget' => '<div id="%1$s" class="greatwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="greatwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'greatwp-footer-3',
    'name' => esc_html__( 'Footer 3', 'greatwp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'greatwp' ),
    'before_widget' => '<div id="%1$s" class="greatwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="greatwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'greatwp-footer-4',
    'name' => esc_html__( 'Footer 4', 'greatwp' ),
    'description' => esc_html__( 'This sidebar is located on the right bottom of web page.', 'greatwp' ),
    'before_widget' => '<div id="%1$s" class="greatwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="greatwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

}
add_action( 'widgets_init', 'greatwp_widgets_init' );


function greatwp_top_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'greatwp-home-fullwidth-widgets' ) || is_active_sidebar( 'greatwp-fullwidth-widgets' ) ) : ?>
<div class="greatwp-top-wrapper-outer clearfix">
<div class="greatwp-featured-posts-area greatwp-top-wrapper clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'greatwp-home-fullwidth-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'greatwp-fullwidth-widgets' ); ?>
</div>
</div>
<?php endif; ?>

<?php }


function greatwp_top_widgets() { ?>

<?php if ( is_active_sidebar( 'greatwp-home-top-widgets' ) || is_active_sidebar( 'greatwp-top-widgets' ) ) : ?>
<div class="greatwp-featured-posts-area greatwp-featured-posts-area-top clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'greatwp-home-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'greatwp-top-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function greatwp_bottom_widgets() { ?>

<?php if ( is_active_sidebar( 'greatwp-home-bottom-widgets' ) || is_active_sidebar( 'greatwp-bottom-widgets' ) ) : ?>
<div class='greatwp-featured-posts-area greatwp-featured-posts-area-bottom clearfix'>
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'greatwp-home-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'greatwp-bottom-widgets' ); ?>
</div>
<?php endif; ?>

<?php }