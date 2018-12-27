<?php
/**
* More Custom Functions
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Get custom-logo URL
function clean_grid_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $clean_grid_custom_logo_id = get_theme_mod( 'custom_logo' );
    $clean_grid_logo = wp_get_attachment_image_src( $clean_grid_custom_logo_id , 'full' );
    return $clean_grid_logo[0];
}

function clean_grid_read_more_text() {
       $readmoretext = esc_html__( 'Continue Reading', 'clean-grid' );
        if ( clean_grid_get_option('read_more_text') ) {
                $readmoretext = clean_grid_get_option('read_more_text');
        }
       return $readmoretext;
}

// Category ids in post class
function clean_grid_category_id_class($classes) {
        global $post;
        foreach((get_the_category($post->ID)) as $category) {
            $classes [] = 'wpcat-' . $category->cat_ID . '-id';
        }
        return $classes;
}
add_filter('post_class', 'clean_grid_category_id_class');

// Change excerpt length
function clean_grid_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    $read_more_length = 20;
    if ( clean_grid_get_option('read_more_length') ) {
        $read_more_length = clean_grid_get_option('read_more_length');
    }
    return $read_more_length;
}
add_filter('excerpt_length', 'clean_grid_excerpt_length');

// Change excerpt more word
function clean_grid_excerpt_more($more) {
       if ( is_admin() ) {
         return $more;
       }
       return '...';
}
add_filter('excerpt_more', 'clean_grid_excerpt_more');

// Adds custom classes to the array of body classes.
function clean_grid_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'clean-grid-group-blog';
    }     
    if ( is_page_template( 'template-full-width-page.php' ) || !is_active_sidebar( 'clean-grid-main-sidebar' ) ) {
        $classes[] = 'clean-grid-page-full-width';
    }
    if ( is_page_template( 'template-full-width-post.php' ) ) {
        $classes[] = 'clean-grid-post-full-width';
    }
    if ( is_404() ) {
        $classes[] = 'clean-grid-404-full-width';
    }
    if ( !is_singular() ) {
        $classes[] = 'clean-grid-body-full-width';
    }
    if ( is_home() || is_archive() || is_search() ) {
        $classes[] = 'clean-grid-multiple-items';
    }
    return $classes;
}
add_filter( 'body_class', 'clean_grid_body_classes' );


function clean_grid_post_style() {
       $post_style = 'grid';
       return $post_style;
}


function clean_grid_grid_thumb_style() {
       $thumb_style = 'clean-grid-horizontal-image';
       return $thumb_style;
}


function clean_grid_post_grid_cols() {
       $post_column = 'clean-grid-3-col';
       return $post_column;
}