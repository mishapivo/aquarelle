<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

if ( ! function_exists( 'edumag_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function edumag_posted_on() {
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

		$year  = get_the_time('Y');
	    $month = get_the_time('m');
	    $day   = get_the_time('d');
	    $post_type = get_query_var( 'post_type' );

	  
		$posted_on = '<a href="' . esc_url( get_day_link( $year, $month, $day ) ) . '" rel="bookmark">' . $time_string . '</a>';

		$byline = sprintf(
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'edumag' ), array( 'span' => array( 'class' => array() ) ) ), esc_attr( get_the_title() ) ) );
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'edumag_entry_category_tags' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function edumag_entry_category_tags() {
		global $post;
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_lists = get_the_category( $post->ID );
			if ( $categories_lists && edumag_categorized_blog() ) {
				echo '<span class="cat-links">
							<span class="screen-reader-text">'. esc_html__( 'Categories', 'edumag') .'</span>'; // WPCS: XSS OK.
				$i = 1;
				foreach ( $categories_lists as $key => $category ) {
					echo '<a href="'. esc_url( get_category_link( $category ) ) .'" class="category-name">'. esc_html( $category->name ) .'</a>';
					if( $i==5 ) break;
				}
				echo '</span><!-- .cat-links -->';
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'edumag' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'edumag' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'edumag_categorized_blog' ) ) :
	/**
	 * Returns true if a blog has more than 1 category.
	 *
	 * @return bool
	 */
	function edumag_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'edumag_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'edumag_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so edumag_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so edumag_categorized_blog should return false.
			return false;
		}
	}
endif;

if ( ! function_exists( 'edumag_category_transient_flusher' ) ) :
	/**
	 * Flush out the transients used in edumag_categorized_blog.
	 */
	function edumag_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		// Like, beat it. Dig?
		delete_transient( 'edumag_categories' );
	}
endif;
add_action( 'edit_category', 'edumag_category_transient_flusher' );
add_action( 'save_post',     'edumag_category_transient_flusher' );

if ( ! function_exists( 'edumag_entry_footer' ) ) :
	/**
	 * Prints HTML page edit link.
	 */
	function edumag_entry_footer() { 
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'edumag' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
