<?php
/**
 * The default template for displaying header
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header>

	<div class="sierra-header <?php echo esc_attr( wpsierra_header_classes() ); ?>" data-scroll-up="350">
		<div class="container-fluid sierra-header-style">
		<?php
		if ( class_exists( 'Kirki' ) ) {
			get_template_part( 'inc/headers/header', get_theme_mod( 'main_header_layout', 'center' ) );
		} else {
			get_template_part( 'inc/headers/header', 'center' );
		}
		wpsierra_mobile_menu();
		?>
		<?php if ( true == get_theme_mod( 'header_search', true ) ) : ?>
		<div class="hidden">
			<ul class="search-mobile">
				<li class="search-mobile-menu">
					<?php get_search_form(); ?>
				</li>
			</ul>
		</div>
		<?php endif; ?>
		</div><!-- /.container-fluid -->
	</div><!--/.sierra-header-->

	<?php wpsierra_search_full(); ?>
	<div class="placeholder"></div>
</header>
