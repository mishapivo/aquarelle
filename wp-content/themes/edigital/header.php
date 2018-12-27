<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'edigital' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="mt-container">
			<div class="site-branding">
				<?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				}
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->
            <div class="nav-cart-wrapper">
    			<nav id="site-navigation" class="main-navigation" role="navigation">
                    <div class="menu-toggle hide"> <i class="fa fa-navicon"> </i> </div>
    				<?php wp_nav_menu( array( 'theme_location' => 'edigital_primary', 'menu_id' => 'primary-menu' ) ); ?>
    			</nav><!-- #site-navigation -->

    			<div class="header-search-wrapper">
	                <span class="search-main"><i class="fa fa-search"></i></span>
	                <div class="search-form-main clearfix">
	                	<div class="close"> <i class="fa fa-close"> </i> </div>
		                <?php get_search_form(); ?>
		            </div>
				</div><!-- .header-search-wrapper -->
    
    			<?php if( class_exists( 'Easy_Digital_Downloads' ) ) { ?>
    				<span id="edigital-header-cart">
    					<a href="<?php echo edd_get_checkout_uri(); ?>">
    						<i class="fa fa-cart-arrow-down"></i>
    						<span class="header-cart edd-cart-quantity"><?php echo intval( edd_get_cart_quantity() ); ?></span>
    					</a>
    				</span>
    			<?php } ?>
            </div>

		</div><!-- .mt-container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
    
    <?php if ( !is_page_template( 'templates/home-template.php' ) && !is_front_page() ) { ?>
        <header class="entry-header">
            <div class="mt-container">
    			<?php 
    				if( is_single() || is_page() ) {
    					the_title( '<h1 class="entry-title">', '</h1>' );
    				} elseif( is_archive() ) {
    					the_archive_title( '<h1 class="page-title">', '</h1>' );
    					the_archive_description( '<div class="taxonomy-description">', '</div>' );
    				} elseif( is_search() ) {
    			?>
    					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'edigital' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    			<?php
    				} elseif( is_home() ) {
                        $is_home_page_title = apply_filters( 'edigital_is_home_page_title', __( 'Blog', 'edigital' ) );
                        echo '<h1 class="page-title">'. esc_html( $is_home_page_title ) .'</h1>';
                    }
    			?>
            </div><!-- .mt-container -->
		</header><!-- .entry-header -->
        <div class="mt-container">
    <?php } ?>

    <?php if ( !is_page_template( 'templates/home-template.php' ) && is_front_page() ) { ?>
        <div class="mt-container">
    <?php } ?>
