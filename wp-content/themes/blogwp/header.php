<?php
/**
* The header for BlogWP theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package BlogWP WordPress Theme
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

<body <?php body_class('blogwp-animated blogwp-fadein'); ?> id="blogwp-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<?php if ( !(blogwp_get_option('disable_primary_menu')) ) { ?>
<div class="blogwp-container blogwp-primary-menu-container clearfix">
<div class="blogwp-primary-menu-container-inside clearfix">

<nav class="blogwp-nav-primary" id="blogwp-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
<div class="blogwp-outer-wrapper">
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'blogwp-menu-primary-navigation', 'menu_class' => 'blogwp-nav-primary-menu blogwp-menu-primary', 'fallback_cb' => 'blogwp_fallback_menu', ) ); ?>

</div>
</nav>

</div>
</div>
<?php } ?>

<div class="blogwp-container" id="blogwp-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="blogwp-head-content clearfix" id="blogwp-head-content">

<div class="blogwp-outer-wrapper">

<?php if ( get_header_image() ) : ?>
<div class="blogwp-header-image clearfix">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="blogwp-header-img-link">
    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="blogwp-header-img"/>
</a>
</div>
<?php endif; ?>

<?php if ( !(blogwp_get_option('hide_header_content')) ) { ?>
<div class="blogwp-header-inside clearfix">
<div id="blogwp-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="blogwp-logo-img-link">
        <img src="<?php echo esc_url( blogwp_custom_logo() ); ?>" alt="" class="blogwp-logo-img"/>
    </a>
    </div>
<?php else: ?>
    <div class="site-branding">
      <h1 class="blogwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="blogwp-site-description"><?php bloginfo( 'description' ); ?></p>
    </div>
<?php endif; ?>
</div><!--/#blogwp-logo -->
</div>
<?php } ?>

</div>

</div><!--/#blogwp-head-content -->
</div><!--/#blogwp-header -->

<?php if ( !(blogwp_get_option('hide_header_social_buttons')) ) { blogwp_header_social_buttons(); } ?>

<div id="blogwp-search-overlay-wrap" class="blogwp-search-overlay">
  <span class="blogwp-search-closebtn" title="<?php esc_attr_e('Close Search','blogwp'); ?>">&#xD7;</span>
  <div class="blogwp-search-overlay-content">
    <?php get_search_form(); ?>
  </div>
</div>

<?php if(is_front_page() && !is_paged()) { ?>
<?php if ( blogwp_get_option('enable_featured_content') ) { blogwp_featured_content(); } ?>
<?php } ?>

<div class="blogwp-outer-wrapper">
<?php blogwp_top_wide_widgets(); ?>
</div>

<div class="blogwp-outer-wrapper">

<div class="blogwp-container clearfix" id="blogwp-wrapper">
<div class="blogwp-content-wrapper clearfix" id="blogwp-content-wrapper">