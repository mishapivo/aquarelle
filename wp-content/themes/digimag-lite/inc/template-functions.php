<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Digimag Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function digimag_lite_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$is_sticky_header = get_theme_mod( 'sticky_header', true );
	if ( $is_sticky_header ) {
		$classes[] = 'is-sticky-header';
	}

	if ( ! has_custom_logo() ) {
		$classes[] = 'no-logo';
	}
	if ( false === display_header_text() ) {
		$classes[] = 'no-site-identity';
	}

	// Adds a class of no-sidebar if don't have sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'digimag_lite_body_classes' );


add_filter( 'comment_form_default_fields', 'digimag_lite_modify_comment_form_default' );
/**
 * Modify default comment form.
 *
 * @param array $fields default field.
 */
function digimag_lite_modify_comment_form_default( $fields ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$fields['author'] = '<p class="comment-form-author">' .
				'<input id="author" name="author" placeholder="' . esc_attr__( 'Full Name *', 'digimag-lite' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></p>';
	$fields['email']  = '<p class="comment-form-email">' .
				'<input id="email" placeholder="' . esc_attr__( 'Mail Address *', 'digimag-lite' ) . '" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p>';
	$fields['url']    = '<p class="comment-form-url">' .
				'<input id="url" placeholder="' . esc_attr__( 'Website URL', 'digimag-lite' ) . '" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></p>';
	return $fields;
}

add_filter( 'comment_form_defaults', 'digimag_lite_modify_comment_form_args' );
/**
 * Modify default comment form args.
 *
 * @param array $defaults default args.
 */
function digimag_lite_modify_comment_form_args( $defaults ) {
	$defaults['label_submit']         = esc_html__( 'Submit Comment', 'digimag-lite' );
	$defaults['title_reply_before']   = '';
	$submit_button                    = sprintf(
		$defaults['submit_button'],
		esc_attr( $defaults['name_submit'] ),
		esc_attr( $defaults['id_submit'] ),
		esc_attr( $defaults['class_submit'] ),
		esc_attr( $defaults['label_submit'] )
	);
	$submit_field                     = sprintf(
		$defaults['submit_field'],
		$submit_button,
		get_comment_id_fields( get_the_ID() )
	);
	$defaults['submit_field']         = '';
	$defaults['comment_field']        = '<div class="comment-form-comment"><textarea id="comment" placeholder="' . esc_attr__( 'Write Your Comments Here...', 'digimag-lite' ) . '" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea>' . $submit_field . '</div>';
	$defaults['title_reply']          = '';
	$defaults['comment_notes_before'] = '';
	return $defaults;
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function digimag_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'digimag_lite_pingback_header' );
