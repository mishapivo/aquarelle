<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package euphoric
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function euphoric_body_classes( $classes ) {
    $select_layout = get_theme_mod('select-layout','right');

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    //has header image
    if(has_header_image()){
        $classes[] = 'has-header-image';
    }

    //left sidebar
    if($select_layout=='left'){
        $classes[] = 'left-sidebar';

    } elseif($select_layout == 'full-width') {
        $classes[] = 'full-width';

    }

	return $classes;
}
add_filter( 'body_class', 'euphoric_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function euphoric_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'euphoric_pingback_header' );

// Default Category Lists

if( !function_exists( 'euphoric_cat_list' ) ):
    function euphoric_cat_list() {
        $euphoric_args = array(
            'type'       => 'post',
            'taxonomy'   => 'category',
        );
        $euphoric_cat_lists = get_categories( $euphoric_args );
        $euphoric_cat_list = array('' => esc_html__('--Select--','euphoric'));
        foreach( $euphoric_cat_lists as $category ) {
            $euphoric_cat_list[esc_attr( $category->slug )] = esc_html( $category->name );
        }
        return $euphoric_cat_list;
    }
endif;

//front page category list
if( !function_exists( 'euphoric_frontpage_cat_list' ) ):
    function euphoric_frontpage_cat_list() {
        $euphoric_args = array(
            'type'       => 'post',
            'taxonomy'   => 'category',
        );
        $euphoric_frontpage_cat_lists = get_categories( $euphoric_args );
        foreach( $euphoric_frontpage_cat_lists as $category ) {
            $euphoric_frontpage_cat_list[esc_attr( $category->term_id )] = esc_html( $category->name );
        }
        return $euphoric_frontpage_cat_list;
    }
endif;

//Exclude posts from home page

function euphoric_exclude_homepage($query) {
    $front_page_categories = get_theme_mod('front_page_categories','');
    if ( is_array( $front_page_categories ) && !in_array( 0, $front_page_categories ) ) {
    //if (!in_array(0,$front_page_categories)) {
        if ( $query->is_home() && $query->is_main_query() ) {
            $query->query_vars['category__in'] = $front_page_categories;
        }
    }
}
add_action('pre_get_posts', 'euphoric_exclude_homepage');

