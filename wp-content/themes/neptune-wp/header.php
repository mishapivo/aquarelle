<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Neptune WP
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
	<a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'neptune-wp' ); ?></a>
	 <?php if(!is_front_page()){
		$black = 'mastblack';
	}else {
		$black = null;
	}
	$headerstate = get_theme_mod( 'headerbg', true ) == 1 ;
	 if ( $headerstate ) {
		$masthead = 'nomasthead';
	} else {
		$masthead = 'masthead';
	} 
	?>
	<header id="<?php echo $masthead; ?>" class="site-header <?php echo $black; ?>">
		<div class="grid-wide">
		<div class="col-1-1 grid-nopad">
		<?php neptune_wp_header_left(); ?>
		<?php neptune_wp_header_left(); ?>
		</div>

		<div class="site-branding col-3-12"><!-- header-middle -->
			<?php neptune_wp_logo() ?>
		</div><!-- .site-branding -->

		<div class="col-9-12">
		
		<nav id="site-navigation" class="main-navigation">
		     <?php neptune_wp_main_menu();?>

		</nav><!-- #site-navigation -->	
		</div><!-- header-right -->

	</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
