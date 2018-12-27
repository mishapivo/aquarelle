<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Galway Lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ((galway_lite_get_option('enable_preloader')) == 1) { ?>
    <div class="preloader">
        <div class="preloader-wrapper">
            <div id="top" class="spinner spinner-1">
                <div class="spinner-plane"></div>
            </div>
            <div id="middle" class="spinner spinner-2">
                <div class="spinner-plane"></div>
            </div>
            <div id="bottom" class="spinner spinner-3">
                <div class="spinner-plane"></div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- full-screen-layout/boxed-layout -->
<?php if (galway_lite_get_option('homepage_layout_option') == 'full-width') {
    $galway_lite_homepage_layout = 'full-screen-layout';
} elseif (galway_lite_get_option('homepage_layout_option') == 'boxed') {
    $galway_lite_homepage_layout = 'boxed-layout';
} ?>
<div id="page" class="site site-bg <?php echo $galway_lite_homepage_layout; ?>">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'galway-lite'); ?></a>
    <div class="top-bar secondary-bgcolor">
        <div class="container">
            <div class="row">
                <?php if (has_nav_menu('top')) { ?>
                    <div class="col-sm-12 col-md-8">
                        <div class="pull-left">
                            <div id="top-nav" class="auxiliary-nav">
                                <?php wp_nav_menu(array(
                                    'theme_location' => 'top',
                                    'menu_id' => 'top-menu',
                                    'depth' => 1,
                                    'container' => 'div',
                                    'menu_class' => false
                                )); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (has_nav_menu('social')) { ?>
                    <div class="col-sm-12 col-md-4">
                        <div class="pull-right">
                            <div class="social-icons">
                                <?php
                                wp_nav_menu(
                                    array('theme_location' => 'social',
                                        'link_before' => '<span>',
                                        'link_after' => '</span>',
                                        'menu_id' => 'social-menu',
                                        'fallback_cb' => false,
                                        'menu_class' => false
                                    )); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div> <!--    Topbar Ends-->
    <header id="masthead" class="site-header" role="banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="site-branding">
                        <div class="twp-site-branding">
                            <div class="branding-center">
                                <?php
                                galway_lite_the_custom_logo();
                                if (is_front_page() && is_home()) : ?>
                                <span class="site-title primary-font">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                </span>
                                <?php else : ?>
                                <span class="site-title primary-font">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                </span>
                                <?php
                                endif;
                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) : ?>
                                    <p class="site-description">
                                        <?php echo esc_html($description); ?>
                                    </p>
                                    <?php
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- .site-branding -->
                </div>
            </div>
        </div>

        <div class="top-header primary-bgcolor">
            <div class="container">
                <nav class="main-navigation" role="navigation">
                    <span class="icon-sidr">
                        <div class="offcanvas-navigation">
                            <label id="widgets-nav" class="switch">
                                <input type="checkbox" name="side-nav" />
                                <div></div>
                            </label>
                        </div>
                    </span>
                    <span class="icon-search">
                        <i class="ion-ios-search-strong"></i>
                    </span>
                    <span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                         <span class="screen-reader-text">
                            <?php esc_html_e('Primary Menu', 'galway-lite'); ?>
                        </span>
                        <i class="ham"></i>
                    </span>

                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => 'div',
                        'container_class' => 'menu'
                    )); ?>
                </nav><!-- #site-navigation -->
            </div>

        </div>
    </header>
    <!-- #masthead -->
    <div class="popup-search">
        <div class="table-align">
            <div class="table-align-cell v-align-middle">
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="close-popup"></div>
    </div>
    <!--    Searchbar Ends-->
    <!-- Innerpage Header Begins Here -->
    <?php
    if (is_front_page() || is_home()) {
        do_action('galway_lite_action_slider_post');
        do_action('galway_lite_action_intro_post');
    } else {
        do_action('galway-lite-page-inner-title');
    }
    ?>
    <!-- Innerpage Header Ends Here -->
    <div id="content" class="site-content">