<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Indrajeet
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="onload" class="loader-active">
	 <div id="stage" class="loader-spinner"></div>
</div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'indrajeet' ); ?></a>


	<div id="header" class="header-section">

		<?php
			/**
			 * Hook before_header.
			 *
			 * @hooked indrajeet_top_header - 10
			 */
			do_action( 'before_header' );
			?>
		
		<div class="header-wrapper-for-sticky">
			<header id="masthead" class="site-header">
				<div class="container">
    		    	<div class="header-main-menu">
						<div class="site-branding">
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
							$indrajeet_description = get_bloginfo( 'description', 'display' );
							if ( $indrajeet_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $indrajeet_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->

						<nav id="site-navigation" class="main-navigation">
							<input id="main-menu-state" type="checkbox">
							<label class="main-menu-btn" for="main-menu-state">
							  <span class="main-menu-btn-icon"></span> <?php esc_html_e( 'Primary Menu', 'indrajeet' ); ?>
							</label>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'primary-menu',
								'menu_id'        => 'primary-menu',
								'menu_class'	 => 'sm sm-clean',
								'container'		 => '',
								'fallback_cb' => 'indrajeet_primary_menu_fallback'
							) );
							?>
						</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
		</div><!-- header-wrapper-for-sticky -->
	</div><!-- #header -->		

	<div id="content" class="site-content">
