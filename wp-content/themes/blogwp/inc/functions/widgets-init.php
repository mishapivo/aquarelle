<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function blogwp_widgets_init() {

register_sidebar(array(
    'id' => 'blogwp-header-banner',
    'name' => esc_html__( 'Header Banner', 'blogwp' ),
    'description' => esc_html__( 'This sidebar is located on the header of the web page.', 'blogwp' ),
    'before_widget' => '<div id="%1$s" class="blogwp-header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="blogwp-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'blogwp-sidebar-one',
    'name' => esc_html__( 'Sidebar 1', 'blogwp' ),
    'description' => esc_html__( 'This sidebar is normally located on the left-hand side of web page.', 'blogwp' ),
    'before_widget' => '<div id="%1$s" class="blogwp-side-widget widget blogwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="blogwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'blogwp-home-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Home Page Only)', 'blogwp' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of homepage.', 'blogwp' ),
    'before_widget' => '<div id="%1$s" class="blogwp-main-widget widget blogwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="blogwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'blogwp-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Every Page)', 'blogwp' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of every page.', 'blogwp' ),
    'before_widget' => '<div id="%1$s" class="blogwp-main-widget widget blogwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="blogwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'blogwp-home-top-widgets',
    'name' => esc_html__( 'Top Widgets (Home Page Only)', 'blogwp' ),
    'description' => esc_html__( 'This widget area is located at the top of homepage.', 'blogwp' ),
    'before_widget' => '<div id="%1$s" class="blogwp-main-widget widget blogwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="blogwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'blogwp-top-widgets',
    'name' => esc_html__( 'Top Widgets (Every Page)', 'blogwp' ),
    'description' => esc_html__( 'This widget area is located at the top of every page.', 'blogwp' ),
    'before_widget' => '<div id="%1$s" class="blogwp-main-widget widget blogwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="blogwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'blogwp-home-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Home Page Only)', 'blogwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of homepage.', 'blogwp' ),
    'before_widget' => '<div id="%1$s" class="blogwp-main-widget widget blogwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="blogwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'blogwp-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Every Page)', 'blogwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of every page.', 'blogwp' ),
    'before_widget' => '<div id="%1$s" class="blogwp-main-widget widget blogwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="blogwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'blogwp-footer-1',
    'name' => esc_html__( 'Footer 1', 'blogwp' ),
    'description' => esc_html__( 'This sidebar is located on the left bottom of web page.', 'blogwp' ),
    'before_widget' => '<div id="%1$s" class="blogwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="blogwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'blogwp-footer-2',
    'name' => esc_html__( 'Footer 2', 'blogwp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'blogwp' ),
    'before_widget' => '<div id="%1$s" class="blogwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="blogwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'blogwp-footer-3',
    'name' => esc_html__( 'Footer 3', 'blogwp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'blogwp' ),
    'before_widget' => '<div id="%1$s" class="blogwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="blogwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

}
add_action( 'widgets_init', 'blogwp_widgets_init' );


function blogwp_top_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'blogwp-home-fullwidth-widgets' ) || is_active_sidebar( 'blogwp-fullwidth-widgets' ) ) : ?>
<div class="blogwp-top-wrapper-outer clearfix">
<div class="blogwp-featured-posts-area blogwp-top-wrapper clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'blogwp-home-fullwidth-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'blogwp-fullwidth-widgets' ); ?>
</div>
</div>
<?php endif; ?>

<?php }


function blogwp_top_widgets() { ?>

<?php if ( is_active_sidebar( 'blogwp-home-top-widgets' ) || is_active_sidebar( 'blogwp-top-widgets' ) ) : ?>
<div class="blogwp-featured-posts-area blogwp-featured-posts-area-top clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'blogwp-home-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'blogwp-top-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function blogwp_bottom_widgets() { ?>

<?php if ( is_active_sidebar( 'blogwp-home-bottom-widgets' ) || is_active_sidebar( 'blogwp-bottom-widgets' ) ) : ?>
<div class='blogwp-featured-posts-area blogwp-featured-posts-area-bottom clearfix'>
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'blogwp-home-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'blogwp-bottom-widgets' ); ?>
</div>
<?php endif; ?>

<?php }