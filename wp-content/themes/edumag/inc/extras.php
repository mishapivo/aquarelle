<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

if( ! function_exists( 'edumag_body_classes' ) ) :
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function edumag_body_classes( $classes ) {
		$options = edumag_get_theme_options();

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed wow fadeInUp';
		}

		// Add a class for layout
		$classes[] = esc_attr( $options['site_layout'] );

		// Add a class for sidebar
		$sidebar_position = edumag_layout();

		if ( is_singular() ){
			$selected_sidebar = get_post_meta( get_the_id(), 'edumag-selected-sidebar', true );
			$selected_sidebar = !empty( $selected_sidebar ) ? $selected_sidebar : 'sidebar-1';
			if ( is_front_page() && !is_home() && ! is_active_sidebar( $selected_sidebar ) ){
				$classes[] = 'right-sidebar';
			}
			elseif ( is_active_sidebar( $selected_sidebar ) ){
				$classes[] = esc_attr( $sidebar_position );
			} else {
				$classes[] = 'no-sidebar';
			}
		} else {
			if( is_active_sidebar( 'sidebar-1' ) ){
				$classes[] = esc_attr( $sidebar_position );
			} else{
				$classes[] = 'no-sidebar';
			}
		}		

		return $classes;
	}
endif;
add_filter( 'body_class', 'edumag_body_classes' );

if( ! function_exists( 'edumag_single_page_class' ) ) :
	/**
	 * Adds custom classes to the array of post classes.
	 *
	 * @param array $classes Classes for the post element.
	 * @return array
	 */
	function edumag_single_page_class( $classes ) {
	    global $post;

	    if ( class_exists( 'WooCommerce' ) ) {
		    if ( is_shop() ){
		   		$classes[] = 'wow fadeInUp';
		   	}
		}
	 
	    return $classes;
	}
endif;
add_filter( 'post_class', 'edumag_single_page_class' );
