<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GW_Chariot
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gw-chariot' ); ?></a>
	<div id="upper-bar">
		<div class="container">
			<div id="left-menu-top">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-top',
						'menu_id'        => 'left-top-menu',
					) );
				?>
			</div>
		</div>
		
	</div>
	<header id="header" class="site-header">
		<div class="container">
			<div id="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				?>
			</div><!-- .site-branding -->
			<div id="search-bar">
				<?php get_search_form(); ?>
			</div>
			<div id="social-bar">
				<?php if (get_theme_mod('gw_chariot_facebook_url') !== "") : ?>
				<a href="<?php echo esc_url(get_theme_mod('gw_chariot_facebook_url')); ?>"><i class="fab fa-facebook"></i></a>
				<?php endif;
					if (get_theme_mod('gw_chariot_twitter_url') !== "") : ?>
				<a href="<?php echo esc_url(get_theme_mod('gw_chariot_twitter_url')); ?>"><i class="fab fa-twitter"></i></a>
				<?php endif;
					if (get_theme_mod('gw_chariot_instagram_url') !== "") : ?>
				<a href="<?php echo esc_url(get_theme_mod('gw_chariot_instagram_url')); ?>"><i class="fab fa-instagram"></i></a>
				<?php endif;
					if (get_theme_mod('gw_chariot_rss_url') !== "") : ?>
				<a href="<?php echo esc_url(get_theme_mod('gw_chariot_rss_url')); ?>"><i class="fas fa-rss"></i></a>
				<?php endif;
					if (get_theme_mod('gw_chariot_pinterest_url') !== "") : ?>
				<a href="<?php echo esc_url(get_theme_mod('gw_chariot_pinterest_url')); ?>"><i class="fab fa-pinterest"></i></a>
				<?php endif; ?>
			</div>
		</div>
	</header><!-- #masthead -->
	
	
	<nav id="site-navigation" class="main-navigation">
		<div class="container">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'gw-chariot' ); ?></button>
		<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
		) );
		?>
		</div>
	</nav><!-- #site-navigation -->
	
	<?php if (has_header_image() && is_front_page() ) : ?>
	<div id="header-image" class="container">
		<img src="<?php header_image(); ?>">
		<?php $gw_chariot_description = get_bloginfo( 'description', 'display' );
				if ( $gw_chariot_description || is_customize_preview() ) :
					?>
					<div class="site-description"><?php echo esc_html($gw_chariot_description); /* WPCS: xss ok. */ ?></div>
				<?php endif; ?>
	</div> 
		
		<?php endif;
	?>

	<div id="content" class="site-content container">
