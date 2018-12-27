<?php
/**
 * Single Product title
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ( get_post_meta( get_the_ID(), 'evolve_page_title', true ) == "yes" || get_post_meta( get_the_ID(), 'evolve_page_title', true ) == "" ) ) {
	the_title( '<h1 class="post-title" itemprop="name">', '</h1>' );
}