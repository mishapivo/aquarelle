<?php
/**
 * Backdrop Core (functions-entry.php)
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General PUblic License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Entry;

/**
 * Table of Content
 *
 *  1.0 - General (Post Thumbnail)
 *  2.0 - General (Entry Posted On)
 *  3.0 - General (Entry Timestamp)
 *  4.0 - General (Entry Title)
 *  5.0 - General (Entry Taxonomies)
 */

/**
 *  1.0 - General (Post Thumbnail)
 */
function display_entry_post_thumbnail() {
	if ( has_post_thumbnail() ) {
		$size = 'no-sidebar' === get_theme_mod( 'global_layout', 'no-sidebar' ) ? 'large' : 'medium';
		the_post_thumbnail( "backdrop-{$size}-thumbnails" );
	}
}

/**
 *  2.0 - General (Entry Posted On)
 */
function display_entry_posted_on() {
	$avatar_size = apply_filters( 'author_avatar_size', 80 );

	$date   = sprintf(
		'<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		get_the_date( get_option( 'date_format' ) )
	);
	$author = sprintf(
		'<a href="%1$s" title="%2$s">%3$s</a>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr(
			// Translators: 1 = get the author.
			sprintf( __( 'View all posts by %s', 'meritorious' ), get_the_author() )
		),
		get_the_author()
	);
	printf(
		'<span class="byline"><span class="author vcard">%1$s</span>',
		get_avatar( get_the_author_meta( 'user_email' ), $avatar_size )
	);
	printf(
		'<span class="by-author"><b>%1$s</b></span><span class="published"><b>%2$s</b></span>',
		$author,
		$date
	); // WPCS XSS OK.
}

/**
 *  3.0 - General (Entry Timestamp)
 */
function display_entry_timestamp() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	$posted_on   = sprintf(
		// Translators: 1 = screen reader text, 2 = post date.
		__( '%1$s %2$s', 'meritorious' ),
		'<span class="screen-reader-text">Posted on</span>',
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	echo '<span class="entry-timestamp">' . $posted_on . '</span>'; // WPCS: XSS OK.
}

/**
 *  4.0 - General (Entry Title)
 */
function display_entry_title() {
	if ( is_single() ) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	} elseif ( is_front_page() && is_home() ) {
		the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h1>' );
	} else {
		the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h1>' );
	}
}

/**
 *  5.0 - General (Entry Taxonomies)
 */
function display_entry_taxonomies() {
	$cat_list = get_the_category_list( esc_html__( ' | ', 'meritorious' ) );
	$tag_list = get_the_tag_list( '', esc_html__( ' | ', 'meritorious' ) );
	if ( $cat_list ) {
		printf(
			'<div class="cat-link"><i class="fa fa-folder-open-o"></i> %1$s <span class="cat-list"l><b><i>%2$s</i></b></span></div>',
			esc_html__( ' Posted In', 'meritorious' ),
			$cat_list
		); // WPCS XSS OK.
	}
	if ( $tag_list ) {
		printf(
			'<div class="tag-link"><i class="fa fa-tags"></i> %1$s <span class="tag-list"><b><i>%2$s</i></b></span></div>',
			esc_html__( ' Tagged', 'meritorious' ),
			$tag_list
		); // WPCS XSS OK.
	}
}
