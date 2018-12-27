<?php
/**
* The header for WP Masonry theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class('wp-masonry-animated wp-masonry-fadein'); ?> id="wp-masonry-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<div class="wp-masonry-outer-wrapper">
<div class="wp-masonry-container" id="wp-masonry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="wp-masonry-head-content clearfix" id="wp-masonry-head-content">

<?php if ( !(wp_masonry_get_option('hide_header_content')) ) { ?>
<div class="wp-masonry-header-inside clearfix">

<div id="wp-masonry-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="wp-masonry-logo-img-link">
        <img src="<?php echo esc_url( wp_masonry_custom_logo() ); ?>" alt="" class="wp-masonry-logo-img"/>
    </a>
    </div>
<?php else: ?>
    <div class="site-branding">
      <h1 class="wp-masonry-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="wp-masonry-site-description"><?php bloginfo( 'description' ); ?></p>
    </div>
<?php endif; ?>
</div><!--/#wp-masonry-logo -->

</div>
<?php } ?>

<?php wp_masonry_featured_header_image(); ?>

</div><!--/#wp-masonry-head-content -->
</div><!--/#wp-masonry-header -->
</div>

<div class="wp-masonry-outer-wrapper">
<div class="wp-masonry-container wp-masonry-primary-menu-container clearfix">
<div class="wp-masonry-primary-menu-container-inside clearfix">
<?php if ( !(wp_masonry_get_option('disable_primary_menu')) ) { ?>
<nav class="wp-masonry-nav-primary" id="wp-masonry-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'wp-masonry-menu-primary-navigation', 'menu_class' => 'wp-masonry-nav-primary-menu wp-masonry-menu-primary', 'fallback_cb' => 'wp_masonry_fallback_menu', ) ); ?>
</nav>
<?php } ?>
</div>
</div>
</div>

<?php if ( !(wp_masonry_get_option('hide_social_bar')) ) { ?>
<div class="wp-masonry-outer-wrapper">
<div class="wp-masonry-top-social-bar">
<?php if ( !(wp_masonry_get_option('hide_header_social_buttons')) ) { wp_masonry_header_social_buttons(); } ?>

<div id="wp-masonry-search-overlay-wrap" class="wp-masonry-search-overlay">
  <span class="wp-masonry-search-closebtn" title="<?php esc_attr_e('Close Search','wp-masonry'); ?>">&#xD7;</span>
  <div class="wp-masonry-search-overlay-content">
    <?php get_search_form(); ?>
  </div>
</div>
</div>
</div>
<?php } ?>

<div class="wp-masonry-outer-wrapper">
<?php wp_masonry_top_wide_widgets(); ?>
</div>

<div class="wp-masonry-outer-wrapper">
<div class="wp-masonry-container clearfix" id="wp-masonry-wrapper">
<div class="wp-masonry-content-wrapper clearfix" id="wp-masonry-content-wrapper">