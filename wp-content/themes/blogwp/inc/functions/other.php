<?php
/**
* More Custom Functions
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Get custom-logo URL
function blogwp_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $blogwp_custom_logo_id = get_theme_mod( 'custom_logo' );
    $blogwp_logo = wp_get_attachment_image_src( $blogwp_custom_logo_id , 'full' );
    return $blogwp_logo[0];
}

function blogwp_read_more_text() {
       $readmoretext = esc_html__( 'Continue Reading...', 'blogwp' );
        if ( blogwp_get_option('read_more_text') ) {
                $readmoretext = blogwp_get_option('read_more_text');
        }
       return $readmoretext;
}

// Category ids in post class
function blogwp_category_id_class($classes) {
        global $post;
        foreach((get_the_category($post->ID)) as $category) {
            $classes [] = 'wpcat-' . $category->cat_ID . '-id';
        }
        return $classes;
}
add_filter('post_class', 'blogwp_category_id_class');

// Change excerpt length
function blogwp_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    $read_more_length = 20;
    if ( blogwp_get_option('read_more_length') ) {
        $read_more_length = blogwp_get_option('read_more_length');
    }
    return $read_more_length;
}
add_filter('excerpt_length', 'blogwp_excerpt_length');

// Change excerpt more word
function blogwp_excerpt_more($more) {
       if ( is_admin() ) {
         return $more;
       }
       return '...';
}
add_filter('excerpt_more', 'blogwp_excerpt_more');

// Adds custom classes to the array of body classes.
function blogwp_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'blogwp-group-blog';
    }

    if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
       $classes[] = 'blogwp-layout-full-width';
    }

    if ( is_404() ) {
        $classes[] = 'blogwp-layout-full-width';
    }

    $classes[] = 'blogwp-header-full-width';

    return $classes;
}
add_filter( 'body_class', 'blogwp_body_classes' );


function blogwp_post_style() {
       $post_style = 'style-5';
        if ( blogwp_get_option('post_style') ) {
                $post_style = blogwp_get_option('post_style');
        }
       return $post_style;
}