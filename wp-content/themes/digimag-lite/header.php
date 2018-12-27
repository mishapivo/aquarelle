<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Digimag Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'digimag-lite' ); ?></a>

	<div class="sticky-menu-toggle">
		<button class="menu-toggle" aria-controls="slideout-sidebar" aria-expanded="false">
			<span class="screen-reader-text"><?php esc_html_e( 'Slide Out Sidebar', 'digimag-lite' ); ?></span>
			<span class="menu-toggle-text"><?php esc_html_e( 'Menu', 'digimag-lite' ); ?>
		</button>
	</div>
	<div class="topbar">
		<div class="topbar-left">
			<button class="menu-toggle" id="menu-toggle" aria-controls="slideout-sidebar" aria-expanded="false">
				<span class="screen-reader-text"><?php esc_html_e( 'Slide Out Sidebar', 'digimag-lite' ); ?></span>
				<span class="menu-toggle-text"><?php esc_html_e( 'Menu', 'digimag-lite' ); ?>
			</button>
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( ! has_custom_logo() ) :
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- .site-branding -->
			<div class="topbar-search">
				<?php get_search_form(); ?>
			</div>
		</div><!-- .topbar-left -->

		<div class="topbar-right">
			<div class="topbar-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'top-menu',
					'menu_class'     => 'top-menu',
					'container'      => 'ul',
				) );

				if ( function_exists( 'jetpack_social_menu' ) ) {
					jetpack_social_menu();
				}
				?>
			</div>

			<?php if ( is_active_sidebar( 'topbar-languages' ) ) : ?>
				<div class="topbar-languages">
					<?php dynamic_sidebar( 'topbar-languages' ); ?>
				</div>
			<?php endif; ?>
		</div><!-- .topbar-right -->

	</div><!-- .topbar -->

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'menu_class'     => 'primary-menu',
				'container'      => 'ul',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<?php get_template_part( 'template-parts/page-header' ); ?>
	<?php if ( ! is_home() && is_front_page() ) : ?>
		<div id="content" class="site-content">
	<?php else : ?>
		<div id="content" class="site-content container">
	<?php endif; ?>
