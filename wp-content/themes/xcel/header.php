<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Xcel
 */
global $woocommerce;
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
	
<div id="page">

<header id="masthead" class="site-header xcel-setting-header-type-dark-light <?php echo sanitize_html_class( get_theme_mod( 'xcel-setting-slider-type', false ) ); ?> <?php echo sanitize_html_class( get_theme_mod( 'xcel-setting-header-layout', false ) ); ?>">
	
    <?php get_template_part( '/templates/headers/header-one' ); ?>
	
</header><!-- #masthead -->

<?php if ( is_front_page() ) : ?>
	
	<?php get_template_part( '/templates/slider/homepage-slider' ); ?>
	
<?php endif; ?>

<div id="content" class="site-content <?php echo get_theme_mod( 'xcel-setting-slider-type', false ); ?><?php echo ( ! is_active_sidebar( 'sidebar-1' ) ) ? sanitize_html_class( 'content-no-sidebar' ) : sanitize_html_class( 'content-has-sidebar' ); ?>">
    
    <?php if ( ! is_front_page() ) : ?>
    
        <?php get_template_part( '/templates/titlebar' ); ?>
        
    <?php endif; ?>