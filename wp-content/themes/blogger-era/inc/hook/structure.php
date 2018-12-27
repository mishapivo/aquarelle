<?php 
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Blogger_Era
 */

if ( ! function_exists( 'blogger_era_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function blogger_era_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'blogger_era_action_doctype', 'blogger_era_doctype', 10 );

if ( ! function_exists( 'blogger_era_head' ) ) :
	/**
	 * Header Code.
	 *
	 * @since 1.0.0
	 */
	function blogger_era_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
	<?php
	}
endif;
add_action( 'blogger_era_action_head', 'blogger_era_head', 10 );

if ( ! function_exists( 'blogger_era_page_start' ) ) :
	/**
	 * Page Start.
	 *
	 * @since 1.0.0
	 */
	function blogger_era_page_start() {
	?>
    <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogger-era' ); ?></a>
    <?php
	}
endif;
add_action( 'blogger_era_action_before', 'blogger_era_page_start' );

if ( ! function_exists( 'blogger_era_page_end' ) ) :
	/**
	 * Page End.
	 *
	 * @since 1.0.0
	 */
	function blogger_era_page_end() {
	?></div><!-- #page --><?php
	}
endif;
add_action( 'blogger_era_action_after', 'blogger_era_page_end' );

if ( ! function_exists( 'blogger_era_content_start' ) ) :
	/**
	 * Content Start.
	 *
	 * @since 1.0.0
	 */
	function blogger_era_content_start() {
	?><div id="content" class="site-content"><?php
	}
endif;
add_action( 'blogger_era_action_before_content', 'blogger_era_content_start' );


if ( ! function_exists( 'blogger_era_content_end' ) ) :
	/**
	 * Content End.
	 *
	 * @since 1.0.0
	 */
	function blogger_era_content_end() {
	?></div><!-- #content --><?php
	}
endif;
add_action( 'blogger_era_action_after_content', 'blogger_era_content_end' );


if ( ! function_exists( 'blogger_era_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function blogger_era_header_start() {
	?><header id="masthead" class="site-header" role="banner"><?php
	}
endif;
add_action( 'blogger_era_action_before_header', 'blogger_era_header_start' );

if ( ! function_exists( 'blogger_era_header_end' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function blogger_era_header_end() {
	?></header><!-- #masthead -->
	<?php
	}
endif;
add_action( 'blogger_era_action_after_header', 'blogger_era_header_end' );



if ( ! function_exists( 'blogger_era_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function blogger_era_footer_start() {
	?><footer id="colophon" class="site-footer" role="contentinfo"><div class="site-info">
	<?php
	}
endif;
add_action( 'blogger_era_action_before_footer', 'blogger_era_footer_start' );


if ( ! function_exists( 'blogger_era_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function blogger_era_footer_end() {
	?></div><!-- .site-info --></footer><!-- #colophon -->
	<?php
	}
endif;
add_action( 'blogger_era_action_after_footer', 'blogger_era_footer_end' );