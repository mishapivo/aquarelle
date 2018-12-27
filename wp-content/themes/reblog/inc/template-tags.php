<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Moral
 */

if ( ! function_exists( 'reblog_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function reblog_posted_on( $echo = true ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s<span>%3$s</span></time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s<span>%3$s</span></time><time class="updated" datetime="%4$s">%5$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date( 'M' ) ),
			esc_html( get_the_date( 'd' ) ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = $time_string;

		if ( $echo ) {
			echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
		} else {
			return '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
		}

	}
endif;

if ( ! function_exists( 'reblog_modern_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function reblog_modern_posted_on( $echo = true ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = $time_string;

		if ( $echo ) {
			echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
		} else {
			return '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
		}

	}
endif;

if ( ! function_exists( 'reblog_tags' ) ) :
	function reblog_tags() {
		if ( 'post' === get_post_type() ) {
			if ( is_single() ) {
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'reblog' ) );
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( ' Tags: %1$s', 'reblog' ) . '</span>', $tags_list ); // WPCS: XSS OK.
				}
			}
		}
	}
endif;

if ( ! function_exists( 'reblog_cats' ) ) :
	function reblog_cats() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			if ( is_single() || reblog_is_page_displays_posts() ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'reblog' ) );
				if ( $categories_list ) {
					echo '<span class="cat-links">' . $categories_list . '</span> '; // WPCS: XSS OK.
				}
			}
		}

	}
endif;

if ( ! function_exists( 'reblog_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function reblog_entry_footer() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			
			$archive_comment_enable = get_theme_mod( 'reblog_enable_archive_comment', true );
			if ( reblog_is_page_displays_posts() && $archive_comment_enable ) {

				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( ' Leave a Comment<span class="screen-reader-text"> on %s</span>', 'reblog' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);
				echo '</span>';
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( ' Edit <span class="screen-reader-text">%s</span>', 'reblog' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'reblog_post_author' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function reblog_post_author() {
	
	$author_html = '<span class="byline">' . esc_html__( 'By : ', 'reblog' ) . '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>';
	echo $author_html;

}
endif;
