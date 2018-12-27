<?php
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EduPress
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container">

	<a class="skip-link screen-reader-text" href="#site-main"><?php esc_html_e( 'Skip to content', 'edupress' ); ?></a>
	<header class="site-header clearfix" role="banner">
	
		<div class="wrapper wrapper-header clearfix">

			<div id="site-header-main">
			
				<div class="site-branding clearfix">
					<?php
					if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
						jetpack_the_site_logo();
					} elseif ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
						edupress_the_custom_logo();
					} ?>
					<?php if ( 1 == get_theme_mod( 'edupress_header_display_tagline', 1 ) ) { ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
				</div><!-- .site-branding -->
	
				<?php if ( has_nav_menu( 'social' ) ) {
					
					wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links' ) );
						
				} ?>
	
			</div><!-- #site-header-main -->

	        <?php if ( has_nav_menu( 'primary' ) ) { ?>
	        <div id="site-header-navigation">
	
		        <div class="navbar-header">

					<?php wp_nav_menu( array(
						'container_id'   => 'menu-main-slick',
						'menu_id' => 'menu-slide-in',
						'sort_column' => 'menu_order', 
						'theme_location' => 'primary'
					) ); 
					?>

		        </div><!-- .navbar-header -->
		
				<nav id="menu-main" role="navigation">
					<?php
					wp_nav_menu( array(
						'container' => '', 
						'container_class' => '', 
						'menu_class' => 'navbar-nav dropdown sf-menu clearfix', 
						'menu_id' => 'menu-main-menu',
						'sort_column' => 'menu_order', 
						'theme_location' => 'primary', 
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
						) );
					?>
				</nav><!-- #menu-main -->
			
			</div><!-- #site-header-navigation -->
			<?php } ?>
			
		</div><!-- .wrapper .wrapper-header .clearfix -->

	</header><!-- .site-header -->