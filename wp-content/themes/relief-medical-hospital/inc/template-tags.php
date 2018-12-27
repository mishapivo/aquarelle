<?php
/**
 * Custom template tags for this theme.
 *
 * @package Relief Medical Hospital
 */


if ( ! function_exists( 'relief_medical_hospital_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function relief_medical_hospital_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'relief_medical_hospital_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids 	 = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    =>  1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;


/**
 * Returns true if a blog has more than 1 category
 */
function relief_medical_hospital_categorized_blog() {
	if ( false === ( $relief_medical_hospital_all_the_cool_cats = get_transient( 'relief_medical_hospital_all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$relief_medical_hospital_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$relief_medical_hospital_all_the_cool_cats = count( $relief_medical_hospital_all_the_cool_cats );

		set_transient( 'relief_medical_hospital_all_the_cool_cats', $relief_medical_hospital_all_the_cool_cats );
	}

	if ( '1' != $relief_medical_hospital_all_the_cool_cats ) {
		// This blog has more than 1 category so relief_medical_hospital_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so relief_medical_hospital_categorized_blog should return false
		return false;
	}
}

if ( ! function_exists( 'relief_medical_hospital_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since 1.0
 */
function relief_medical_hospital_the_custom_logo() {	
	the_custom_logo();
}
endif;

/**
 * Flush out the transients used in relief_medical_hospital_categorized_blog
 */
function relief_medical_hospital_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'relief_medical_hospital_all_the_cool_cats' );
}
add_action( 'edit_category', 'relief_medical_hospital_category_transient_flusher' );
add_action( 'save_post',     'relief_medical_hospital_category_transient_flusher' );