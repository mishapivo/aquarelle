<?php
/*This file is part of minimal_shop child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

function minimal_shop_enqueue_child_styles() {
    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    $parent_style = 'storecommerce-style';

    $fonts_url = 'https://fonts.googleapis.com/css?family=Cabin:400,400italic,500,600,700';
    wp_enqueue_style('minimal_shop-google-fonts', $fonts_url, array(), null);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap' . $min . '.css');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/owl-carousel-v2/assets/owl.carousel' . $min . '.css');
    wp_enqueue_style('owl-theme-default', get_template_directory_uri() . '/assets/owl-carousel-v2/assets/owl.theme.default.css');
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
    
    $deps = array( 'bootstrap', $parent_style);
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('storecommerce-woocommerce-style', get_template_directory_uri() . '/woocommerce.css');
        $deps[] = 'storecommerce-woocommerce-style';
    }    

    wp_enqueue_style(
        'minimal_shop-style',
        get_stylesheet_directory_uri() . '/style.css',
        $deps,
        wp_get_theme()->get('Version') );


}
add_action( 'wp_enqueue_scripts', 'minimal_shop_enqueue_child_styles' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function minimal_shop_customize_register($wp_customize) {
     $wp_customize->get_setting( 'header_textcolor' )->default = '#ffffff';     
}
add_action('customize_register', 'minimal_shop_customize_register', 99999);


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function minimal_shop_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Above Footer Section', 'minimal-shop'),
        'id' => 'above-footer-section',
        'description' => esc_html__('Add widgets to above footer section.', 'minimal-shop'),
        'before_widget' => '<div id="%1$s" class="widget minimal_shop-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
        'after_title' => '</span></h2>',
    ));
}
add_action('widgets_init', 'minimal_shop_widgets_init', 11);
