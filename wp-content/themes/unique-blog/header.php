<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Unique_Blog
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
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'unique-blog' ); ?></a>
	<?php     $unique_blog_header_image = get_header_image(); ?>
<header id="masthead" class="site-header" <?php if(!empty($unique_blog_header_image)): ?> style="background:url(<?php echo esc_url( $unique_blog_header_image ) ?>)" <?php endif; ?>>
		<div class="site-branding">
				<?php the_custom_logo(); ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			$unique_blog_description = get_bloginfo( 'description', 'display' );
			if ( $unique_blog_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $unique_blog_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<?php  

	 if ( !is_home()){
	 	echo '<div id="content" class="site-content">';
	}
	?>

	

