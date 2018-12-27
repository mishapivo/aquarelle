<?php
/**
 * Custom template tags for this theme.
 *
 * @package Interserver Platinum
 */

if ( ! function_exists( 'alacrity_lite_posted_on' ) ) :
function alacrity_lite_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time(get_option('date_format')) !== get_the_modified_time(get_option('date_format')) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date(get_option('date_format')) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date(get_option('date_format')) ),
		esc_html( get_the_modified_date() ) 
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( 'Posted on %s', 'post date', 'alacrity-lite' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'alacrity-lite' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'alacrity-lite' ), __( '1 Comment', 'alacrity-lite' ), __( '% Comments', 'alacrity-lite' ) );
		echo '</span>';
	}

	$categories_list = get_the_category_list( esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'alacrity-lite' ) );

	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( esc_html__( ', ', 'alacrity-lite' ) );
	if ( $categories_list && alacrity_lite_categorized_blog() ) {
		/* translators: %s: category name */
		printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'alacrity-lite' ) . '</span>', $categories_list );//WPCS: XSS OK 
	}
}
endif;

if ( ! function_exists( 'alacrity_lite_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function alacrity_lite_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'alacrity-lite' ) );
		if ( $tags_list && is_single() ) {
			/* translators: %s: tag name */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'alacrity-lite' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
	edit_post_link( __( 'Edit', 'alacrity-lite' ), '<span class="edit-link">', '</span>' );
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function alacrity_lite_categorized_blog() {
	if ( false === ( $cat_list = get_transient( 'alacrity_lite_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$cat_list = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$cat_list = count( $cat_list );

		set_transient( 'alacrity_lite_categories', $cat_list );
	}

	if ( $cat_list > 1 ) {
		// This blog has more than 1 category so alacrity_lite_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so alacrity_lite_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in alacrity_lite_categorized_blog.
 */
function alacrity_lite_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'alacrity_lite_categories' );
}
add_action( 'edit_category', 'alacrity_lite_category_transient_flusher' );
add_action( 'save_post',     'alacrity_lite_category_transient_flusher' );
