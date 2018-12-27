<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jalil
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php 
	
	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="loader">
		<div class="loader-inner">
			<div class="k-line k-line11-1"></div>
			<div class="k-line k-line11-2"></div>
			<div class="k-line k-line11-3"></div>
			<div class="k-line k-line11-4"></div>
			<div class="k-line k-line11-5"></div>
		</div>
	</div>
<div id="page" class="site">
	<header class="header-area  navbar-fixed-top <?php if(has_header_image() && is_front_page()): ?>jalil-header-img<?php endif; ?>" id="header">
		<?php if(has_header_image() && is_front_page()): ?>
	        <div class="header-img"> 
	        	<?php the_header_image_tag(); ?>
	        </div>
	    <?php else: ?>
	    	<div class="logo-bg">
        <?php endif; ?>
	        	<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="site-title">
								<?php if(has_custom_logo()): the_custom_logo(); else: ?>
									<h2>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
									</h2>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-md-8 col-sm-12 col-xs-12">
							<div class="jalil-responsive-menu"></div>
							<div class="mainmenu text-right">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
									) );
								?>
							</div>
						</div>
					</div>
				</div>
	        </div>
	</header>

	<div id="content" class="site-content">