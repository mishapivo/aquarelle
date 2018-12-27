<?php
/**
* This is the template for the hedaer
* @package Zovees
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
				
	</head>

<body <?php body_class(); ?> >
    <!-- Start Preloader -->
    <div class="preloader">
        <div class="preloader-wrapper">
            <div class="sk-cube-grid">
                <div class="sk-cube sk-cube1"></div>
                <div class="sk-cube sk-cube2"></div>
                <div class="sk-cube sk-cube3"></div>
                <div class="sk-cube sk-cube4"></div>
                <div class="sk-cube sk-cube5"></div>
                <div class="sk-cube sk-cube6"></div>
                <div class="sk-cube sk-cube7"></div>
                <div class="sk-cube sk-cube8"></div>
                <div class="sk-cube sk-cube9"></div>
            </div> <!-- .sk-cube-grid -->
        </div> <!-- .preloader-wrapper -->
    </div> <!-- .preloader -->
    <!-- End Preloader -->
    <!-- start main wrapper area -->
    <div class="main-wrapper">
		<?php get_template_part('inc/templates/header-navbar'); ?>