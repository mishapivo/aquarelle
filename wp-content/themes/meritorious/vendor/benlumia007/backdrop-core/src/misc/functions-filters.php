<?php
/**
 * Backdrop Core (functions-filters.php)
 *
 * @package        Backdrop Core
 * @copyright      Copyright (C) 2018. Benjamin Lu
 * @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author         Benjamin Lu (https://getbenonit.com)
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Misc;

/**
 *  Table of Content
 *
 *  1.0 - Misc (Excerpt More)
 *  2.0 - Misc (Excerpt Length)
 *  3.0 - Misc (Archive Title)
 */

/**
 *  1.0 - Misc (Excerpt More)
 */
function load_excerpt_more() {
	global $post;
	$more = 'more...';
	return '<a class="read-more" href="' . esc_url( get_permalink( $post->ID ) ) . '"> ( ' . esc_html( $more ) . ' )</a>';
}
add_filter( 'excerpt_more', __NAMESPACE__ . '\load_excerpt_more' );

/**
 *  2.0 - Misc (Excerpt Length)
 */
function load_excerpt_length() {
	if ( ! is_admin() ) {
		return 50;
	}
}
add_filter( 'excerpt_length', __NAMESPACE__ . '\load_excerpt_length' );

/**
 *  3.0 - Misc (Archive Title)
 */
function load_archive_title() {
	if ( is_category() ) {
		$title = esc_html__( 'Category', 'meritorious' ) . '<span class="archive-description">' . single_cat_title( '', false ) . '</span>';
	} elseif ( is_tag() ) {
		$title = esc_html__( 'Tag', 'meritorious' ) . '<span class="archive-description">' . single_tag_title( '', false ) . '</span>';
	} elseif ( is_author() ) {
		$title = esc_html__( 'Author', 'meritorious' ) . '<span class="archive-description">' . get_the_author() . '</span>';
	} elseif ( is_year() ) {
		$title = esc_html__( 'Year', 'meritorious' ) . '<span class="archive-description">' . get_the_date( _x( 'Y', 'yearly archives date format', 'meritorious' ) ) . '</span>';
	} elseif ( is_month() ) {
		$title = esc_html__( 'Month', 'meritorious' ) . '<span class="archive-description">' . get_the_date( _x( 'F', 'monthly archives date format', 'meritorious' ) ) . '</span>';
	} elseif ( is_day() ) {
		$title = esc_html__( 'Day', 'meritorious' ) . '<span class="archive-description">' . get_the_date( _x( 'F j Y', 'daily archives date format', 'meritorious' ) ) . '</span>';
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'meritorious' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'meritorious' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'meritorious' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'meritorious' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'meritorious' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'meritorious' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'meritorious' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'meritorious' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'meritorious' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = esc_html__( 'Archives', 'meritorious' ) . '<span class="archive-description">' . post_type_archive_title( '', false ) . '</span>';
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		// Translators: 1 = singular name, 2 = single term title.
		$title = sprintf( __( '%1$s: %2$s', 'meritorious' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'meritorious' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', __NAMESPACE__ . '\load_archive_title' );
