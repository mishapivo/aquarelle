<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php do_action( 'di_blog_the_head' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<?php get_template_part( 'template-parts/sections/header', 'page-loader' ); ?>

<div class="container-fluid maincontainer"> <!-- header container-fluid start -->
	<div class="container"> <!-- header container start -->
		<!-- header row will added by pb -->
