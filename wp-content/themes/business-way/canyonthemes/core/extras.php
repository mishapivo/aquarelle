<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

if (!function_exists('business_way_body_classes')) :

    function business_way_body_classes($classes)
    
    {
        // Adds a class of group-blog to blogs with more than 1 published author.
        if (is_multi_author()) {
    
            $classes[] = 'group-blog';
    
        }

        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
    
            $classes[] = 'hfeed';
    
        }

        // Add design layout of sidebar

        $sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'business_way_sidebar_layout', true) );
        if (is_singular() && $sidebardesignlayout != "default-sidebar") 
        {
            $sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'business_way_sidebar_layout', true) );

        } else 
        {
            $sidebardesignlayout = esc_attr(business_way_get_option('business_way_sidebar_layout_option' ));
        }

        $classes[] = $sidebardesignlayout;
        return $classes;
    }

    add_filter('body_class', 'business_way_body_classes');

endif;

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */

if (!function_exists('business_way_pingback_header')) :
    function business_way_pingback_header()
    {
        if (is_singular() && pings_open()) {
            echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
        }
    }

    add_action('wp_head', 'business_way_pingback_header');

endif;