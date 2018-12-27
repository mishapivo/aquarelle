<?php
/**
 * Basic theme hooks
 *
 * This file contains hook functions attached to core hooks.
 *
 * @package Travel_Gem
 */

if ( ! function_exists( 'travel_gem_body_classes' ) ) :

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @since 1.0.0
	 *
	 * @param array $classes Classes for the body element.
	 * @return array Classes.
	 */
	function travel_gem_body_classes( $classes ) {

		global $post;

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Archive layout.
		$archive_layout = travel_gem_get_option( 'archive_layout' );
		$archive_layout = apply_filters( 'travel_gem_filter_theme_archive_layout', $archive_layout );

		$classes[] = 'archive-layout-' . esc_attr( $archive_layout );

		// Global layout.
		$global_layout = travel_gem_get_option( 'global_layout' );
		$global_layout = apply_filters( 'travel_gem_filter_theme_global_layout', $global_layout );

		$classes[] = 'global-layout-' . esc_attr( $global_layout );

		// Common class for three columns.
		switch ( $global_layout ) {
			case 'three-columns':
				$classes[] = 'three-columns-enabled';
				break;

			default:
				break;
		}

		// Header layout.
		$header_layout = travel_gem_get_option( 'header_layout' );
		$header_layout = apply_filters( 'travel_gem_filter_theme_header_layout', $header_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'travel_gem_theme_settings', true );
			if ( isset( $post_options['header_layout'] ) && ! empty( $post_options['header_layout'] ) ) {
				$header_layout = $post_options['header_layout'];
			}
		}

		$classes[] = 'header-layout-' . absint( $header_layout );


		// Sticky menu.
		$enable_sticky_primary_menu = travel_gem_get_option( 'enable_sticky_primary_menu' );

		if ( true === $enable_sticky_primary_menu) {
			$classes[] = 'enabled-sticky-primary-menu';
		}

		return $classes;
	}

endif;

add_filter( 'body_class', 'travel_gem_body_classes' );

if ( ! function_exists( 'travel_gem_pingback_header' ) ) :

	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_pingback_header() {

		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}

endif;

add_action( 'wp_head', 'travel_gem_pingback_header' );

if ( ! function_exists( 'travel_gem_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function travel_gem_implement_excerpt_length( $length ) {

		if ( is_admin() ) {
			return $length;
		}

		$excerpt_length = travel_gem_get_option( 'excerpt_length' );

		if ( absint( $excerpt_length ) > 0 ) {
			$length = absint( $excerpt_length );
		}

		return $length;
	}

endif;

add_filter( 'excerpt_length', 'travel_gem_implement_excerpt_length', 999 );

if ( ! function_exists( 'travel_gem_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function travel_gem_implement_read_more( $more ) {

		if ( is_admin() ) {
			return $more;
		}

		$read_more_text = travel_gem_get_option( 'read_more_text' );

		if ( ! empty( $read_more_text ) ) {
			$more = ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . esc_html( $read_more_text ) . '</a>';
		}

		return $more;
	}

endif;

add_filter( 'excerpt_more', 'travel_gem_implement_read_more' );

if ( ! function_exists( 'travel_gem_content_more_link' ) ) :

	/**
	 * Implement read more in content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more_link Read More link element.
	 * @param string $more_link_text Read More text.
	 * @return string Link.
	 */
	function travel_gem_content_more_link( $more_link, $more_link_text ) {

		$read_more_text = travel_gem_get_option( 'read_more_text' );

		if ( ! empty( $read_more_text ) ) {
			$more_link = str_replace( $more_link_text, esc_html( $read_more_text ), $more_link );
		}

		return $more_link;
	}

endif;

add_filter( 'the_content_more_link', 'travel_gem_content_more_link', 10, 2 );

if ( ! function_exists( 'travel_gem_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_footer_goto_top() {

		echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fas fa-long-arrow-alt-up"></i>

</a>';
	}

endif;

add_action( 'wp_footer', 'travel_gem_footer_goto_top', 0 );

if ( ! function_exists( 'travel_gem_custom_content_width' ) ) :

	/**
	 * Custom content width.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_custom_content_width() {

		global $content_width;

		$global_layout = travel_gem_get_option( 'global_layout' );
		$global_layout = apply_filters( 'travel_gem_filter_theme_global_layout', $global_layout );

		switch ( $global_layout ) {

			case 'no-sidebar':
				$content_width = 1230;
				break;

			case 'three-columns':
				$content_width = 565;
				break;

			case 'left-sidebar':
			case 'right-sidebar':
				$content_width = 810;
				break;

			default:
				break;
		}

		// For page templates.
		if ( is_page_template( 'tpl-builders.php' ) || is_page_template( 'tpl-full-width.php' ) ) {
			$content_width = 1230;
		}
	}

endif;

add_filter( 'template_redirect', 'travel_gem_custom_content_width' );

if ( ! function_exists( 'travel_gem_custom_logo_markup' ) ) :

	/**
	 * Customize logo markup.
	 *
	 * This needs to be in theme until https://core.trac.wordpress.org/ticket/37305 comes in core.
	 *
	 * @since 1.0.0
	 *
	 * @param string $html Markup.
	 * @return string Modified markup.
	 */
	function travel_gem_custom_logo_markup( $html ) {

		$html = str_replace( 'itemprop="url"', '', $html );
		$html = str_replace( 'itemprop="logo"', '', $html );
		$html = str_replace( 'rel="home"', '', $html );

		return $html;
	}

endif;

add_filter( 'get_custom_logo', 'travel_gem_custom_logo_markup' );
