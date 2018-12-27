<?php
/**
* The header for Clean Grid theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Clean Grid WordPress Theme
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

<body <?php body_class('clean-grid-animated clean-grid-fadein'); ?> id="clean-grid-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<div class="clean-grid-outer-wrapper-full">
<div class="clean-grid-outer-wrapper">

<div class="clean-grid-header clearfix" id="clean-grid-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="clean-grid-head-content clearfix" id="clean-grid-head-content">

<?php if ( get_header_image() ) : ?>
<div class="clean-grid-header-image clearfix">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="clean-grid-header-img-link">
    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="clean-grid-header-img"/>
</a>
</div>
<?php endif; ?>

<?php if ( !(clean_grid_get_option('hide_header_content')) ) { ?>
<div class="clean-grid-header-inside clearfix">
<div class="clean-grid-logo" id="clean-grid-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="clean-grid-logo-img-link">
        <img src="<?php echo esc_url( clean_grid_custom_logo() ); ?>" alt="" class="clean-grid-logo-img"/>
    </a>
    </div>
<?php else: ?>
    <div class="site-branding">
      <h1 class="clean-grid-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="clean-grid-site-description"><?php bloginfo( 'description' ); ?></p>
    </div>
<?php endif; ?>
</div><!--/#clean-grid-logo -->

<div class="clean-grid-header-banner" id="clean-grid-header-banner">
<?php dynamic_sidebar( 'clean-grid-header-banner' ); ?>
</div><!--/#clean-grid-header-banner -->
</div>
<?php } ?>

</div><!--/#clean-grid-head-content -->
</div><!--/#clean-grid-header -->

<div class="clean-grid-menu-container clearfix">
<div class="clean-grid-menu-container-inside clearfix">

<nav class="clean-grid-nav-primary" id="clean-grid-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-primary-navigation', 'menu_class' => 'menu clean-grid-nav-menu menu-primary', 'fallback_cb' => 'clean_grid_fallback_menu', ) ); ?>
</nav>

<?php if ( !(clean_grid_get_option('hide_header_social_buttons')) ) { ?>
<div class='clean-grid-top-social-icons'>
    <?php if ( clean_grid_get_option('twitterlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('twitterlink') ); ?>" target="_blank" class="clean-grid-social-icon-twitter" title="<?php esc_attr_e('Twitter','clean-grid'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('facebooklink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('facebooklink') ); ?>" target="_blank" class="clean-grid-social-icon-facebook" title="<?php esc_attr_e('Facebook','clean-grid'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('googlelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('googlelink') ); ?>" target="_blank" class="clean-grid-social-icon-google-plus" title="<?php esc_attr_e('Google Plus','clean-grid'); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('pinterestlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('pinterestlink') ); ?>" target="_blank" class="clean-grid-social-icon-pinterest" title="<?php esc_attr_e('Pinterest','clean-grid'); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('linkedinlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('linkedinlink') ); ?>" target="_blank" class="clean-grid-social-icon-linkedin" title="<?php esc_attr_e('Linkedin','clean-grid'); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('instagramlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('instagramlink') ); ?>" target="_blank" class="clean-grid-social-icon-instagram" title="<?php esc_attr_e('Instagram','clean-grid'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('flickrlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('flickrlink') ); ?>" target="_blank" class="clean-grid-social-icon-flickr" title="<?php esc_attr_e('Flickr','clean-grid'); ?>"><i class="fa fa-flickr" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('youtubelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('youtubelink') ); ?>" target="_blank" class="clean-grid-social-icon-youtube" title="<?php esc_attr_e('Youtube','clean-grid'); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('vimeolink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('vimeolink') ); ?>" target="_blank" class="clean-grid-social-icon-vimeo" title="<?php esc_attr_e('Vimeo','clean-grid'); ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('soundcloudlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('soundcloudlink') ); ?>" target="_blank" class="clean-grid-social-icon-soundcloud" title="<?php esc_attr_e('SoundCloud','clean-grid'); ?>"><i class="fa fa-soundcloud" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('lastfmlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('lastfmlink') ); ?>" target="_blank" class="clean-grid-social-icon-lastfm" title="<?php esc_attr_e('Lastfm','clean-grid'); ?>"><i class="fa fa-lastfm" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('githublink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('githublink') ); ?>" target="_blank" class="clean-grid-social-icon-github" title="<?php esc_attr_e('Github','clean-grid'); ?>"><i class="fa fa-github" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('bitbucketlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('bitbucketlink') ); ?>" target="_blank" class="clean-grid-social-icon-bitbucket" title="<?php esc_attr_e('Bitbucket','clean-grid'); ?>"><i class="fa fa-bitbucket" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('tumblrlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('tumblrlink') ); ?>" target="_blank" class="clean-grid-social-icon-tumblr" title="<?php esc_attr_e('Tumblr','clean-grid'); ?>"><i class="fa fa-tumblr" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('digglink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('digglink') ); ?>" target="_blank" class="clean-grid-social-icon-digg" title="<?php esc_attr_e('Digg','clean-grid'); ?>"><i class="fa fa-digg" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('deliciouslink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('deliciouslink') ); ?>" target="_blank" class="clean-grid-social-icon-delicious" title="<?php esc_attr_e('Delicious','clean-grid'); ?>"><i class="fa fa-delicious" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('stumblelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('stumblelink') ); ?>" target="_blank" class="clean-grid-social-icon-stumbleupon" title="<?php esc_attr_e('Stumbleupon','clean-grid'); ?>"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('redditlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('redditlink') ); ?>" target="_blank" class="clean-grid-social-icon-reddit" title="<?php esc_attr_e('Reddit','clean-grid'); ?>"><i class="fa fa-reddit" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('dribbblelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('dribbblelink') ); ?>" target="_blank" class="clean-grid-social-icon-dribbble" title="<?php esc_attr_e('Dribbble','clean-grid'); ?>"><i class="fa fa-dribbble" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('behancelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('behancelink') ); ?>" target="_blank" class="clean-grid-social-icon-behance" title="<?php esc_attr_e('Behance','clean-grid'); ?>"><i class="fa fa-behance" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('vklink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('vklink') ); ?>" target="_blank" class="clean-grid-social-icon-vk" title="<?php esc_attr_e('VK','clean-grid'); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('codepenlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('codepenlink') ); ?>" target="_blank" class="clean-grid-social-icon-codepen" title="<?php esc_attr_e('Codepen','clean-grid'); ?>"><i class="fa fa-codepen" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('jsfiddlelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('jsfiddlelink') ); ?>" target="_blank" class="clean-grid-social-icon-jsfiddle" title="<?php esc_attr_e('JSFiddle','clean-grid'); ?>"><i class="fa fa-jsfiddle" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('stackoverflowlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('stackoverflowlink') ); ?>" target="_blank" class="clean-grid-social-icon-stackoverflow" title="<?php esc_attr_e('Stack Overflow','clean-grid'); ?>"><i class="fa fa-stack-overflow" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('stackexchangelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('stackexchangelink') ); ?>" target="_blank" class="clean-grid-social-icon-stackexchange" title="<?php esc_attr_e('Stack Exchange','clean-grid'); ?>"><i class="fa fa-stack-exchange" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('bsalink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('bsalink') ); ?>" target="_blank" class="clean-grid-social-icon-buysellads" title="<?php esc_attr_e('BuySellAds','clean-grid'); ?>"><i class="fa fa-buysellads" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('slidesharelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('slidesharelink') ); ?>" target="_blank" class="clean-grid-social-icon-slideshare" title="<?php esc_attr_e('SlideShare','clean-grid'); ?>"><i class="fa fa-slideshare" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('skypeusername') ) : ?>
            <a href="skype:<?php echo esc_html( clean_grid_get_option('skypeusername') ); ?>?chat" class="clean-grid-social-icon-skype" title="<?php esc_attr_e('Skype','clean-grid'); ?>"><i class="fa fa-skype" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('emailaddress') ) : ?>
            <a href="mailto:<?php echo esc_html( clean_grid_get_option('emailaddress') ); ?>" class="clean-grid-social-icon-email" title="<?php esc_attr_e('Email Us','clean-grid'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('rsslink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('rsslink') ); ?>" target="_blank" class="clean-grid-social-icon-rss" title="<?php esc_attr_e('RSS','clean-grid'); ?>"><i class="fa fa-rss" aria-hidden="true"></i></a><?php endif; ?>
    <a href="<?php echo esc_url( '#' ); ?>" title="<?php esc_attr_e('Search','clean-grid'); ?>" class="clean-grid-social-search-icon"><i class="fa fa-search"></i></a>
</div>
<?php } ?>

<div class='clean-grid-social-search-box'>
<?php get_search_form(); ?>
</div>

</div>
</div>

<?php if(is_front_page() && !is_paged()) { ?>
<div class="clean-grid-featured-posts-area clean-grid-top-wrapper clearfix">
<?php dynamic_sidebar( 'clean-grid-home-fullwidth-widgets' ); ?>
</div>
<?php } ?>

<div class="clean-grid-featured-posts-area clean-grid-top-wrapper clearfix">
<?php dynamic_sidebar( 'clean-grid-fullwidth-widgets' ); ?>
</div>

<div class="clean-grid-wrapper clearfix" id="clean-grid-wrapper">
<div class="clean-grid-content-wrapper clearfix" id="clean-grid-content-wrapper">