<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function clean_grid_widgets_init() {

register_sidebar(array(
    'id' => 'clean-grid-header-banner',
    'name' => esc_html__( 'Header Banner', 'clean-grid' ),
    'description' => esc_html__( 'This sidebar is located on the header of the web page.', 'clean-grid' ),
    'before_widget' => '<div id="%1$s" class="clean-grid-header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="clean-grid-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'clean-grid-main-sidebar',
    'name' => esc_html__( 'Main Sidebar', 'clean-grid' ),
    'description' => esc_html__( 'This sidebar is located on the right-hand side of web page.', 'clean-grid' ),
    'before_widget' => '<div id="%1$s" class="clean-grid-side-widget widget clean-grid-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="clean-grid-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'clean-grid-home-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Home Page Only)', 'clean-grid' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of homepage.', 'clean-grid' ),
    'before_widget' => '<div id="%1$s" class="clean-grid-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="clean-grid-widget-heading"><h2 class="clean-grid-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'clean-grid-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Every Page)', 'clean-grid' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of every page.', 'clean-grid' ),
    'before_widget' => '<div id="%1$s" class="clean-grid-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="clean-grid-widget-heading"><h2 class="clean-grid-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'clean-grid-home-top-widgets',
    'name' => esc_html__( 'Top Widgets (Home Page Only)', 'clean-grid' ),
    'description' => esc_html__( 'This widget area is located at the top of homepage.', 'clean-grid' ),
    'before_widget' => '<div id="%1$s" class="clean-grid-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="clean-grid-widget-heading"><h2 class="clean-grid-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'clean-grid-top-widgets',
    'name' => esc_html__( 'Top Widgets (Every Page)', 'clean-grid' ),
    'description' => esc_html__( 'This widget area is located at the top of every page.', 'clean-grid' ),
    'before_widget' => '<div id="%1$s" class="clean-grid-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="clean-grid-widget-heading"><h2 class="clean-grid-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'clean-grid-home-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Home Page Only)', 'clean-grid' ),
    'description' => esc_html__( 'This widget area is located at the bottom of homepage.', 'clean-grid' ),
    'before_widget' => '<div id="%1$s" class="clean-grid-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="clean-grid-widget-heading"><h2 class="clean-grid-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'clean-grid-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Every Page)', 'clean-grid' ),
    'description' => esc_html__( 'This widget area is located at the bottom of every page.', 'clean-grid' ),
    'before_widget' => '<div id="%1$s" class="clean-grid-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="clean-grid-widget-heading"><h2 class="clean-grid-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'clean-grid-footer-1',
    'name' => esc_html__( 'Footer 1', 'clean-grid' ),
    'description' => esc_html__( 'This sidebar is located on the left bottom of web page.', 'clean-grid' ),
    'before_widget' => '<div id="%1$s" class="clean-grid-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="clean-grid-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'clean-grid-footer-2',
    'name' => esc_html__( 'Footer 2', 'clean-grid' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'clean-grid' ),
    'before_widget' => '<div id="%1$s" class="clean-grid-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="clean-grid-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'clean-grid-footer-3',
    'name' => esc_html__( 'Footer 3', 'clean-grid' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'clean-grid' ),
    'before_widget' => '<div id="%1$s" class="clean-grid-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="clean-grid-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'clean-grid-footer-4',
    'name' => esc_html__( 'Footer 4', 'clean-grid' ),
    'description' => esc_html__( 'This sidebar is located on the right bottom of web page.', 'clean-grid' ),
    'before_widget' => '<div id="%1$s" class="clean-grid-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="clean-grid-widget-title"><span>',
    'after_title' => '</span></h2>'));

}
add_action( 'widgets_init', 'clean_grid_widgets_init' );