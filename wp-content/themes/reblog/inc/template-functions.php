<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Moral
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function reblog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// When global archive layout is checked.

	if ( is_archive() || reblog_is_latest_posts() || reblog_is_frontpage_blog() || is_404() || is_search() ) {
		$classes[] = 'no-sidebar';
	} elseif ( is_single() ) { // When global post sidebar is checked.
	    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	      $classes[] = 'no-sidebar';
	    }
	    else {
	        $global_post_sidebar = get_theme_mod( 'reblog_global_post_layout', 'right' ); 
	        $classes[] = esc_attr( $global_post_sidebar ) . '-sidebar';
	    }
    	
	} elseif ( is_page() ) {
	    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	      $classes[] = 'no-sidebar';
	    }
	    else {
	        $global_page_sidebar = get_theme_mod( 'reblog_global_page_layout', 'right' ); 
	        $classes[] = esc_attr( $global_page_sidebar ) . '-sidebar';
	    }
	}

	// search 
    $search_enable = get_theme_mod( 'reblog_show_search', true );
    if ( ! $search_enable )  {
        $classes[] = 'search-disabled';
    }

	// blog layout
	if ( is_archive() || reblog_is_latest_posts() || is_search() || reblog_is_frontpage_blog() ) {
	    $classes[] = 'classic-design';
	}

	return $classes;
}
add_filter( 'body_class', 'reblog_body_classes' );

function reblog_post_classes( $classes ) {
	if ( reblog_is_page_displays_posts() ) {
		
		if( has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		} else {
			$classes[] = 'no-post-thumbnail';
		}
	}
  
	return $classes;
}
add_filter( 'post_class', 'reblog_post_classes' );

/**
 * Excerpt length
 * 
 * @since Moral 1.0.0
 * @return Excerpt length
 */
function reblog_excerpt_length( $length ){
	if ( is_admin() ) {
		return $length;
	}

	$length = get_theme_mod( 'reblog_archive_excerpt_length', 25 );
	return $length;
}
add_filter( 'excerpt_length', 'reblog_excerpt_length', 999 );

/**
 * Excerpt more
 * 
 * @since Moral 1.0.0
 * @return Excerpt more
 */
if ( ! function_exists( 'reblog_excerpt_more' ) ) :
	function reblog_excerpt_more( $more ){
		if ( is_admin() ) {
			return $more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'reblog_excerpt_more' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function reblog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'reblog_pingback_header' );


/**
 * Checks to see if we're on the homepage or not.
 */
function reblog_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Your latest posts".
 */
function reblog_is_latest_posts() {
	return ( is_front_page() && is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Posts page".
 */
function reblog_is_frontpage_blog() {
	return ( is_home() && ! is_front_page() );
}

/**
 * Checks to see if the current page displays any kind of post listing.
 */
function reblog_is_page_displays_posts() {
	return ( reblog_is_frontpage_blog() || is_search() || is_archive() || reblog_is_latest_posts() );
}

/**
 * Pagination in archive/blog/search pages.
 */
function reblog_posts_pagination() { 
	$archive_pagination = get_theme_mod( 'reblog_archive_pagination_type', 'numeric' );
	if ( 'disable' === $archive_pagination ) {
		return;
	}
	if ( 'numeric' === $archive_pagination ) {
		the_posts_pagination( array(
            'prev_text'          => reblog_get_svg( array( 'icon' => 'left' ) ) . esc_html__( 'Previous', 'reblog' ),
            'next_text'          => esc_html__( 'Next', 'reblog' ) . reblog_get_svg( array( 'icon' => 'right' ) ),
        ) );
	} elseif ( 'older_newer' === $archive_pagination ) {
        the_posts_navigation( array(
            'prev_text'          => reblog_get_svg( array( 'icon' => 'left' ) ) . '<span>'. esc_html__( 'Older', 'reblog' ) .'</span>',
            'next_text'          => '<span>'. esc_html__( 'Newer', 'reblog' ) .'</span>' . reblog_get_svg( array( 'icon' => 'right' ) ),
        )  );
	}
}

// Add auto p to the palces where get_the_excerpt is being called.
add_filter( 'get_the_excerpt', 'wpautop' );

function reblog_background_color() {
   $bg_color = get_background_color();
   $custom_css = '
       body {
           background-color: #' . esc_attr( $bg_color ) . '
       }';
   wp_add_inline_style( 'reblog-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'reblog_background_color' );
