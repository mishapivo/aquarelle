<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vmagazine-lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebPage">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( 'vmagazine_lite_before_header' );

	 /* Mobile Navigation **/
	 do_action('vmagazine_lite_mobile_header_navigation'); ?>
	 <div class="vmagazine-lite-main-wrapper">
		 
		 <?php 
		 /** Mobile header**/ 
		 do_action( 'vmagazine_lite_mobile_header' ); ?>

		 <div class="vmagazine-lite-header-handle">
		 	<?php get_template_part( 'layouts/header/header', 'layout1' ); ?>
		</div>
		
		<div id="content" class="site-content">
			
		<?php if( is_page_template() ){ ?>	
		<div class="vmagazine-lite-home-wrapp">
		<?php } 
		/**
		* vmagazine Breadcrumbs 
		*/
		if( ! is_page_template('tpl-blank.php') ){ ?>
		<div class="vmagazine-lite-breadcrumb-wrapper">
			<?php vmagazine_lite_header_title_display(); ?>
		</div>	
		<?php }

		
		