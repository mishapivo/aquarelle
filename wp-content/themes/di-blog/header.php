<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php do_action( 'di_blog_the_head' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<?php get_template_part( 'template-parts/sections/header', 'page-loader' ); ?>

<?php get_template_part( 'template-parts/sections/header', 'nav-icons' ); ?>

<?php get_template_part( 'template-parts/sections/header', 'main-logo' ); ?>

<?php get_template_part( 'template-parts/sections/header', 'sidebar-menu' ); ?>

<?php get_template_part( 'template-parts/sections/header', 'hdr-img' ); ?>

<?php get_template_part( 'template-parts/sections/header', 'slider' ); ?>

<?php
if( is_front_page() && get_theme_mod( 'front_slider_endis', '0' ) && get_theme_mod( 'front_slider_tag', '' ) )  {
	get_template_part( 'template-parts/sections/header', 'posts-slider' );
}
?>

<?php
if( get_theme_mod( 'archive_infobar_endis', '1' ) ) {
	if( is_archive() || is_search() ) {
		get_template_part( 'template-parts/content', 'archive-info' );
	}
}
?>

<div class="container-fluid maincontainer"> <!-- header container-fluid start -->
	<div class="container"> <!-- header container start -->
		<div class="row"> <!-- header row start -->
