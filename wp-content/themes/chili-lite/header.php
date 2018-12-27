<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chili_Lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11"> 

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site"> 
    <header>
        <div class="header-area" id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="logo-area">  
                            <?php chili_lite_main_headerLogo(); ?>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <div class="main-menu-area">
                            <nav>
                                <?php chili_lite_main_menu(); ?>
                            </nav>
                        </div>
                    </div> 
                 </div>
            </div>
        </div>
        <div class="mobile-menu-area">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="mobile-menu">
                  <nav id="dropdown">
                    <?php chili_lite_mobile_menu(); ?>
                  </nav>
                </div>          
              </div>
            </div>
          </div>
        </div> 
    </header>  
    <div class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-page">
                        <h1><?php chili_lite_breadcrumb(); ?></h1> 
                    </div>
                </div>
            </div>
        </div>
    </div>          

	<div id="content" class="site-content">
