<?php
/**
 * WP hooks for this theme.
 *
 * @package my_salon
 */

/**
 * @see my_salon_setup
*/
add_action( 'after_setup_theme', 'my_salon_setup' );

/**
 * @see my_salon_content_width
*/
add_action( 'after_setup_theme', 'my_salon_content_width', 0 );

/**
 * @see my_salon_template_redirect_content_width
*/
add_action( 'template_redirect', 'my_salon_template_redirect_content_width' );

/**
 * @see my_salon_scripts 
*/
add_action( 'wp_enqueue_scripts', 'my_salon_scripts' );

/**
 * @see my_salon_body_classes
*/
add_filter( 'body_class', 'my_salon_body_classes' );

/**
 * @see my_salon_category_transient_flusher
*/
add_action( 'edit_category', 'my_salon_category_transient_flusher' );
add_action( 'save_post',     'my_salon_category_transient_flusher' );

/**
 * @see my_salon_excerpt_more
 * @see my_salon_excerpt_length
*/
add_filter( 'excerpt_more', 'my_salon_excerpt_more' );
add_filter( 'excerpt_length', 'my_salon_excerpt_length', 999 );

/**
 * Move comment field to the bottm
 * @see my_salon_move_comment_field_to_bottom
*/
add_filter( 'comment_form_fields', 'my_salon_move_comment_field_to_bottom' );
