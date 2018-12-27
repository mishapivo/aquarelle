<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Feminine_Munk
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div id="page" class="hfeed site">
    <header id="masthead" class="site-header" role="banner">

        <?php 
        /**
         * Top header Socail and social 
         * 
         * @hooked feminine_munk_top_header
        */
        do_action( 'feminine_munk_top_header' ); ?>

        <!-- Site-Info -->
        <div class="header-m">
            <div class="container">
                <div class="site-branding">
                    <h1 class="site-title">
                        <!-- Custom Logo -->
                        <?php
                        if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
                            the_custom_logo();
                        }
                        ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>                      
                    </h1>
                    <p class="site-description"> <?php bloginfo( 'description' ); ?> </p>
                </div>
                <?php do_action( 'feminine_munk_header_ads' ); ?>
            </div>
        </div>

        <!-- Menu -->
        <div class="header-b">
            <div class="container">
                <div id="nav-anchor"></div>
                <nav id="site-navigation" class="main-navigation" role="navigation">

                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                    ) );
                    ?>

                </nav>
            </div>
        </div>

    </header>


    <?php
 
    /**
     * Breadcrumb setting
     * 
     * @hooked feminine_munk_breadcrumb
    */
    do_action( 'feminine_munk_breadcrumb' );

    /**
     * Banner Post from template-function.php
     * 
     * @hooked feminine_munk_banner_post
    */
    do_action( 'feminine_munk_banner_post' );

    ?>
    <div id="content" class="site-content">
        <div class="container">
           <?php do_action( 'feminine_munk_before_post_ads' ); ?>
            <div class="row">
                