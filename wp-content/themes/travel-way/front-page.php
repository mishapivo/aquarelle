<?php
/**
 * The front-page template file.
 *
 * @package Acme Themes
 * @subpackage Travel Way
 * @since Travel Way 1.0.0
 */
get_header();

/**
 * travel_way_action_front_page hook
 * @since Travel Way 1.0.0
 *
 * @hooked travel_way_featured_slider -  10
 * @hooked travel_way_front_page -  20
 */
do_action( 'travel_way_action_front_page' );

get_footer();