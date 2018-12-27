<?php
/**
 * Neptune Theme Strings
 *
 * @package     Neptune
 * @author      Neptune
 * @copyright   Copyright (c) 2018, Neptune
 * @link        http://neptunewp.com/
 * @since       Neptune 1.0.0
 */

/**
 * Default Strings
 */
if ( ! function_exists( 'neptune_wp_default_strings' ) ) {

	/**
	 * Default Strings
	 *
	 * @since 1.0.0
	 * @param  string  $key  String key.
	 * @param  boolean $echo Print string.
	 * @return mixed        Return string or nothing.
	 */
	function neptune_wp_default_strings( $key, $echo = true ) {

		$defaults = apply_filters(
			'neptune_wp_default_strings', array(

				// Header.
				'string-header-skip-link'                => __( 'Skip to content', 'neptune-wp' ),

				// 404 Page Strings.
				'string-404-sub-title'                   => __( 'It looks like the link pointing here was faulty. Maybe try searching?', 'neptune-wp' ),

				// Search Page Strings.
				'string-search-nothing-found'            => __( 'Nothing Found', 'neptune-wp' ),
				'string-search-nothing-found-message'    => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'neptune-wp' ),
				'string-full-width-search-message'       => __( 'Start typing and press enter to search', 'neptune-wp' ),
				'string-full-width-search-placeholder'   => __( 'Start Typing&hellip;', 'neptune-wp' ),
				'string-header-cover-search-placeholder' => __( 'Start Typing&hellip;', 'neptune-wp' ),
				'string-search-input-placeholder'        => __( 'Search &hellip;', 'neptune-wp' ),

				// Comment Template Strings.
				'string-comment-reply-link'              => __( 'Reply', 'neptune-wp' ),
				'string-comment-edit-link'               => __( 'Edit', 'neptune-wp' ),
				'string-comment-awaiting-moderation'     => __( 'Your comment is awaiting moderation.', 'neptune-wp' ),
				'string-comment-title-reply'             => __( 'Leave a Comment', 'neptune-wp' ),
				'string-comment-cancel-reply-link'       => __( 'Cancel Reply', 'neptune-wp' ),
				'string-comment-label-submit'            => __( 'Post Comment &raquo;', 'neptune-wp' ),
				'string-comment-label-message'           => __( 'Type here..', 'neptune-wp' ),
				'string-comment-label-name'              => __( 'Name*', 'neptune-wp' ),
				'string-comment-label-email'             => __( 'Email*', 'neptune-wp' ),
				'string-comment-label-website'           => __( 'Website', 'neptune-wp' ),
				'string-comment-closed'                  => __( 'Comments are closed.', 'neptune-wp' ),
				'string-comment-navigation-title'        => __( 'Comment navigation', 'neptune-wp' ),
				'string-comment-navigation-next'         => __( 'Newer Comments', 'neptune-wp' ),
				'string-comment-navigation-previous'     => __( 'Older Comments', 'neptune-wp' ),

				// Blog Default Strings.
				'string-blog-page-links-before'          => __( 'Pages:', 'neptune-wp' ),
				'string-blog-meta-author-by'             => __( 'By ', 'neptune-wp' ),
				'string-blog-meta-leave-a-comment'       => __( 'Leave a Comment', 'neptune-wp' ),
				'string-blog-meta-one-comment'           => __( '1 Comment', 'neptune-wp' ),
				'string-blog-meta-multiple-comment'      => __( '% Comments', 'neptune-wp' ),
				'string-blog-navigation-next'            => __( 'Next Page', 'neptune-wp' ) . ' <span class="ast-right-arrow">&rarr;</span>',
				'string-blog-navigation-previous'        => '<span class="ast-left-arrow">&larr;</span> ' . __( 'Previous Page', 'neptune-wp' ),

				// Single Post Default Strings.
				'string-single-page-links-before'        => __( 'Pages:', 'neptune-wp' ),
				/* translators: 1: Post type label */
				'string-single-navigation-next'          => __( 'Next %s', 'neptune-wp' ) . ' <span class="ast-right-arrow">&rarr;</span>',
				/* translators: 1: Post type label */
				'string-single-navigation-previous'      => '<span class="ast-left-arrow">&larr;</span> ' . __( 'Previous %s', 'neptune-wp' ),

				// Content None.
				'string-content-nothing-found-message'   => __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'neptune-wp' ),

			)
		);

		$output = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

		/**
		 * Print or return
		 */
		if ( $echo ) {
			echo $output;
		} else {
			return $output;
		}
	}
}// End if().
