<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Gem
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
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'travel-gem' ); ?></a>
			<a id="mobile-trigger" href="#mob-menu"><i class="fas fa-bars"></i><i class="fa fa-times" aria-hidden="true"></i></a>
			<div id="mob-menu">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'container'      => '',
					'fallback_cb'    => 'travel_gem_primary_navigation_fallback',
					) );
				?>
			</div><!-- #mob-menu -->

			<?php
			/**
			 * Hook - travel_gem_action_header.
			 *
			 * @hooked travel_gem_add_main_header - 10
			 * @hooked travel_gem_add_custom_header - 15
			 */
			do_action( 'travel_gem_action_header' );
			?>

			<div id="content" class="site-content">

				<div class="container">

					<div class="inner-wrapper">
