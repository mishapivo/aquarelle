<?php
/**
 * Custom theme hooks
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Travel_Gem
 */

if ( ! function_exists( 'travel_gem_add_main_header' ) ) :

	/**
	 * Add main header.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_add_main_header() {

		$header_layout = travel_gem_get_option( 'header_layout' );
		$header_layout = apply_filters( 'travel_gem_filter_theme_header_layout', $header_layout );

		// Check if singular.
		if ( is_singular() ) {
			$post_options = get_post_meta( get_the_ID(), 'travel_gem_theme_settings', true );
			if ( isset( $post_options['header_layout'] ) && ! empty( $post_options['header_layout'] ) ) {
				$header_layout = $post_options['header_layout'];
			}
		}

		get_template_part( 'template-parts/header/header', absint( $header_layout ) );

	}

endif;

add_action( 'travel_gem_action_header', 'travel_gem_add_main_header', 10 );

if ( ! function_exists( 'travel_gem_add_custom_header' ) ) :

	/**
	 * Add custom header.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_add_custom_header() {

		// Hide custom header in builder template.
		if ( is_page_template( 'tpl-builders.php' ) ) {
			return;
		}

		get_template_part( 'template-parts/header/custom-header' );

	}

endif;

add_action( 'travel_gem_action_header', 'travel_gem_add_custom_header', 15 );

if ( ! function_exists( 'travel_gem_add_footer_widgets' ) ) :

	/**
	 * Add footer widgets.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_add_footer_widgets() {

		get_template_part( 'template-parts/footer/widgets' );

	}

endif;

add_action( 'travel_gem_action_footer', 'travel_gem_add_footer_widgets', 10 );

if ( ! function_exists( 'travel_gem_add_footer_copyright' ) ) :

	/**
	 * Add footer copyright.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_add_footer_copyright() {

		get_template_part( 'template-parts/footer/copyright' );

	}

endif;

add_action( 'travel_gem_action_footer', 'travel_gem_add_footer_copyright', 20 );

if ( ! function_exists( 'travel_gem_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb
	 *
	 * @since 1.0.0
	 */
	function travel_gem_add_breadcrumb() {

		// Bail if Home Page.
		if ( is_front_page() || is_home() ) {
			return;
		}

		echo '<div id="breadcrumb"><div class="breadcrumb-wrapper">';

		travel_gem_simple_breadcrumb();

		echo '</div><!-- .breadcrumb-wrapper --></div><!-- #breadcrumb -->';
	}

endif;

add_action( 'travel_gem_action_breadcrumb', 'travel_gem_add_breadcrumb', 10 );

if ( ! function_exists( 'travel_gem_customize_banner_title' ) ) :

	/**
	 * Customize banner title.
	 *
	 * @since 1.0.0
	 *
	 * @param string $title Title.
	 * @return string Modified title.
	 */
	function travel_gem_customize_banner_title( $title ) {

		if ( is_home() ) {
			$title = travel_gem_get_option( 'blog_title' );
		} elseif ( is_singular() ) {
			$title = single_post_title( '', false );
		} elseif ( is_category() || is_tag() ) {
			$title = single_term_title( '', false );
		} elseif ( is_archive() ) {
			$title = strip_tags( get_the_archive_title() );
		} elseif ( is_search() ) {
			$title = sprintf( esc_html__( 'Search Results for: %s', 'travel-gem' ),  get_search_query() );
		} elseif ( is_404() ) {
			$title = esc_html__( '404!', 'travel-gem' );
		}

		return $title;
	}

endif;

add_filter( 'travel_gem_filter_banner_title', 'travel_gem_customize_banner_title' );

if ( ! function_exists( 'travel_gem_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_add_sidebar() {

		$global_layout = travel_gem_get_option( 'global_layout' );
		$global_layout = apply_filters( 'travel_gem_filter_theme_global_layout', $global_layout );

		// Include primary sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}

		// Include secondary sidebar.
		switch ( $global_layout ) {
			case 'three-columns':
				get_sidebar( 'secondary' );
				break;

			default:
				break;
		}
	}

endif;

add_action( 'travel_gem_action_sidebar', 'travel_gem_add_sidebar' );
