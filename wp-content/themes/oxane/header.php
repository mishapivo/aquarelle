<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package oxane
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
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'oxane' ); ?></a>
	<div id="jumbosearch">
		<span class="fa fa-remove closeicon"></span>
		<div class="form">
			<?php get_search_form(); ?>
		</div>
	</div>	
	
	
	<div id="social-search">
		<div class="container">
			<div class="social-icons">
				<?php get_template_part('social', 'fa'); ?>
			</div>
			
			<div class="searchform">
				<?php get_template_part('searchform', 'top'); ?>
			</div>
		</div>
	</div>
	
	
	<div id="top-bar">
		<div class="container">
			
		</div>
	</div>
	
	
	<header id="masthead" class="site-header" role="banner">
	
		
			
		<div class="layer">
			<div class="container">
				<div class="site-branding">
					<?php if ( oxane_has_logo() ) : ?>
					<div id="site-logo">
						<?php oxane_logo(); ?>
					</div>
					<?php endif; ?>
					<div id="text-title-desc">
					<h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</div>
				</div>
				
				<div id="slickmenu"></div>
				<nav id="site-navigation" class="main-navigation front" role="navigation">
						<?php
							// Get the Appropriate Walker First.
							$walker = has_nav_menu('primary') ? new Oxane_Menu_With_Icon : '';
  						    //Display the Menu.							
						    wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
				</nav><!-- #site-navigation -->
					
			</div>	
			
		</div>	
	</header><!-- #masthead -->
	
	<?php if( class_exists('rt_slider') ) {
			 rt_slider::render('slider', 'nivo' ); 
		} ?>
	
	
	<div class="mega-container">
		
		<?php get_template_part('featured', 'showcase' ); ?>
		<?php get_template_part('slider', 'postthumb' ); ?>
		<?php get_template_part('featured', 'posts' ); ?>
	
		<div id="content" class="site-content container">