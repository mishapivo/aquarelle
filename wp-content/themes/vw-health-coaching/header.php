<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package VW Health Coaching
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
	  <meta charset="<?php bloginfo( 'charset' ); ?>">
	  <meta name="viewport" content="width=device-width">
	  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'vw-health-coaching' ) ); ?>">
	  <?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div class="home-page-header">	
			<?php get_template_part( 'template-parts/header/upper-header' ); ?>
			<?php get_template_part('template-parts/header/middle-header'); ?>
		</div>