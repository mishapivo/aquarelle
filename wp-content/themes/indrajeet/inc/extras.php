<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Indrajeet
 */


if ( ! function_exists( 'indrajeet_active_footer_count' ) ) :
	/**
	 * [indrajeet_active_footer_count count active footers]
	 *
	 * @return [INT] [Number of active footer widgets]
	 *
	 * @since 0.0.2
	 */
	function indrajeet_active_footer_count() {

		$footer_areas = array( 'footer-sidebar', 'footer-sidebar-2', 'footer-sidebar-3', 'footer-sidebar-4' );

		$count = 0;

		foreach ( $footer_areas as $footer ) {

			if ( is_active_sidebar( $footer ) ) :

				$count++;

			endif;

		}

		return $count;

	}

endif;

if ( ! function_exists( 'indrajeet_primary_menu_fallback' ) ) :

	/**
	 * Fallback for Primary menu.
	 * @since 0.0.3
	 */
	function indrajeet_primary_menu_fallback( $args ) {

		echo '<ul id="primary-menu" class="sm sm-clean">';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'indrajeet' ) . '</a></li>';
		wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 8,
		) );
		echo '</ul>';

	}
endif;


/**
 * Minify CSS
 *
 * @since 0.0.3
 */
if ( ! function_exists( 'indrajeet_minify_css' ) ) {

	function indrajeet_minify_css( $css = '' ) {

		// Return if no CSS
		if ( ! $css ) return;

		// Normalize whitespace
		$css = preg_replace( '/\s+/', ' ', $css );

		// Remove ; before }
		$css = preg_replace( '/;(?=\s*})/', '', $css );

		// Remove space after , : ; { } */ >
		$css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );

		// Remove space before , ; { }
		$css = preg_replace( '/ (,|;|\{|})/', '$1', $css );

		// Strips leading 0 on decimal values (converts 0.5px into .5px)
		$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );

		// Strips units if value is 0 (converts 0px to 0)
		$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );

		// Trim
		$css = trim( $css );

		// Return minified CSS
		return $css;
		
	}

}