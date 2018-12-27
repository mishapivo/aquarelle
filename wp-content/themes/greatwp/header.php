<?php
/**
* The header for GreatWP theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package GreatWP WordPress Theme
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

<body <?php body_class('greatwp-animated greatwp-fadein'); ?> id="greatwp-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<?php if ( !(greatwp_get_option('disable_secondary_menu')) ) { ?>
<div class="greatwp-container greatwp-secondary-menu-container clearfix">
<div class="greatwp-secondary-menu-container-inside clearfix">

<nav class="greatwp-nav-secondary" id="greatwp-secondary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
<div class="greatwp-outer-wrapper">
<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'greatwp-menu-secondary-navigation', 'menu_class' => 'greatwp-secondary-nav-menu greatwp-menu-secondary', 'fallback_cb' => 'greatwp_top_fallback_menu', ) ); ?>
</div>
</nav>

</div>
</div>
<?php } ?>

<div class="greatwp-container" id="greatwp-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="greatwp-head-content clearfix" id="greatwp-head-content">

<div class="greatwp-outer-wrapper">

<?php if ( get_header_image() ) : ?>
<div class="greatwp-header-image clearfix">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="greatwp-header-img-link">
    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="greatwp-header-img"/>
</a>
</div>
<?php endif; ?>

<?php if ( !(greatwp_get_option('hide_header_content')) ) { ?>
<div class="greatwp-header-inside clearfix">
<div id="greatwp-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="greatwp-logo-img-link">
        <img src="<?php echo esc_url( greatwp_custom_logo() ); ?>" alt="" class="greatwp-logo-img"/>
    </a>
    </div>
<?php else: ?>
    <div class="site-branding">
      <h1 class="greatwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="greatwp-site-description"><?php bloginfo( 'description' ); ?></p>
    </div>
<?php endif; ?>
</div><!--/#greatwp-logo -->

<div id="greatwp-header-banner">
<?php dynamic_sidebar( 'greatwp-header-banner' ); ?>
</div><!--/#greatwp-header-banner -->
</div>
<?php } ?>

</div>

</div><!--/#greatwp-head-content -->
</div><!--/#greatwp-header -->

<?php if ( !(greatwp_get_option('disable_primary_menu')) ) { ?>
<div class="greatwp-container greatwp-primary-menu-container clearfix">
<div class="greatwp-primary-menu-container-inside clearfix">

<nav class="greatwp-nav-primary" id="greatwp-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
<div class="greatwp-outer-wrapper">
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'greatwp-menu-primary-navigation', 'menu_class' => 'greatwp-nav-primary-menu greatwp-menu-primary', 'fallback_cb' => 'greatwp_fallback_menu', ) ); ?>

<?php if ( !(greatwp_get_option('hide_header_social_buttons')) ) { greatwp_header_social_buttons(); } ?>

</div>
</nav>

<div id="greatwp-search-overlay-wrap" class="greatwp-search-overlay">
  <span class="greatwp-search-closebtn" title="<?php esc_attr_e('Close Search','greatwp'); ?>">&#xD7;</span>
  <div class="greatwp-search-overlay-content">
    <?php get_search_form(); ?>
  </div>
</div>

</div>
</div>
<?php } ?>

<div class="greatwp-outer-wrapper">
<?php greatwp_top_wide_widgets(); ?>
</div>

<div class="greatwp-outer-wrapper">

<div class="greatwp-container clearfix" id="greatwp-wrapper">
<div class="greatwp-content-wrapper clearfix" id="greatwp-content-wrapper">