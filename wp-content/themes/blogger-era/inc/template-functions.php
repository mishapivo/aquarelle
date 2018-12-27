<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Blogger_Era
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blogger_era_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    if ( wp_is_mobile() ) {
        $classes[] = 'blogger-era-mobile';
    }

	// Adds a class of sidebar.
    global $post;
    //$sidebar_layout = 'sidebar-right';
    if ( is_page() || is_single() ){
        $sidebar_layout = get_post_meta( $post->ID, 'blogger_era_meta', true ); 
    } else{
        $sidebar_layout = blogger_era_get_option( 'sidebar_layout' );
    }

    $sidebar_layout = apply_filters( 'blogger_era_filter_theme_global_layout', $sidebar_layout );
    $classes[] = 'global-layout-' . esc_attr( $sidebar_layout );         

    // Add class for sticky sidebar.
    $enable_sticky_sidebar = blogger_era_get_option( 'enable_sticky_sidebar' );
    if( true == $enable_sticky_sidebar ){
        $classes[] = 'sticky-sidebar';
    } 

	return $classes;
}
add_filter( 'body_class', 'blogger_era_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function blogger_era_post_classes( $classes ) {

    if ( ! has_post_thumbnail() ) {
        $blog_layout = blogger_era_get_option( 'blog_layout' );

        if ( 'full-width' != $blog_layout ) { 
            $classes[] = 'no-image';
        }
    }

    return $classes;
}
add_filter( 'post_class', 'blogger_era_post_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function blogger_era_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blogger_era_pingback_header' );

if ( ! function_exists( 'blogger_era_the_excerpt' ) ) :

    /**
     * Generate excerpt.
     *
     * @since 1.0.0
     *
     * @param int     $length Excerpt length in words.
     * @param WP_Post $post_obj WP_Post instance (Optional).
     * @return string Excerpt.
     */
    function blogger_era_the_excerpt( $length = 0, $post_obj = null ) {

        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }

        $source_content = $post_obj->post_content;

        if ( ! empty( $post_obj->post_excerpt ) ) {
            $source_content = $post_obj->post_excerpt;
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;

    }

endif;