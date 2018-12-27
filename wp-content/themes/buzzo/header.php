<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Buzzo
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'buzzo' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container no-padding">
			<div class="header-content">
				<a href="#" id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<div class="nav-icon">
						<span class="screen-reader-text"><?php esc_html_e( 'Toggle menu', 'buzzo' ); ?></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
				</a>

				<div class="site-branding">
					<?php if ( get_custom_logo() ) : ?>
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php else : ?>
						<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">

					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'main-navigation-ul' ) ); ?>
					<a href="#" id="search-toggle" class="search-toggle" aria-controls="navigation-search"><i class="fa fa-search"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'buzzo' ); ?></span></a>

					<div id="navigation-search" class="navigation-search">
						<?php get_search_form(); ?>
					</div>

				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->

	<?php
	/**
	 * Shows content after header.
	 *
	 * @hooked buzzo_single_header_image() - 10
	 * @hooked buzzo_about_header_image() - 10
	 */
	do_action( 'buzzo_after_header' );
	?>

	<div id="content" class="site-content <?php echo esc_attr( Buzzo_Sidebar::get_layout_class() ); ?>">
		<div class="<?php echo esc_attr( buzzo_content_container_class() ); ?>">
