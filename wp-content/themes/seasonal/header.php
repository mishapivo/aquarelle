<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Seasonal
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'seasonal' ); ?></a>    
        <div class="sidebar">
            <div class="sidebar-inner">
           
                      
              <header id="masthead" class="site-header" role="banner">
                <div class="site-branding">
                <?php         
                // Header logo image
                  if( get_header_image() ) : ?>
                  
                      <div class="header-image">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                          <img src="<?php header_image(); ?>" height="<?php esc_attr_e( get_custom_header()->height ); ?>" 
                          width="<?php esc_attr_e( get_custom_header()->width ); ?>" alt="<?php esc_attr_e( get_bloginfo( 'title' ) ); ?>" />
                        </a>
                      </div>                 
                <?php 
                  endif;            
                // Site title & tagline
                if( get_theme_mod( 'show_site_title', 1 ) ) {  
                        if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php endif;
					  }
            	if ( get_theme_mod( 'show_tagline', 1 ) ) : {
                        $description = get_bloginfo( 'description', 'display' );
                        if ( $description || is_customize_preview() ) : ?>
                            <h2 class="site-description"><?php echo $description; ?></h2>
                        <?php endif;				 		  		  
					  }
				endif;		  
				  
				  
                  // Social links
                  if ( has_nav_menu( 'social' ) ) :
                        echo '<nav class="social-menu" role="navigation">';
                            
                        wp_nav_menu( array(
                            'theme_location' => 'social',
                            'depth'          => 1,
                            'container' => false,
                            'menu_class'         => 'social',
                            'link_before'    => '<span class="screen-reader-text">',
                            'link_after'     => '</span>',
                        ) );
                            
                        echo '</nav>';
                    endif;          
                ?>
                <nav class="secondary-navigation">
                    <div class="toggle-buttons">
                      <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <button class="nav-toggle toggle-button"><?php _e( 'Menu', 'seasonal' ); ?></button>
                      <?php endif; ?>             
                    </div>
                </nav>    
                            
                <div class="site-navigation">
               
                <?php 
                // Primary Menu
                      wp_nav_menu( array( 
                            'theme_location'  => 'primary',  
                            'menu_class'      => 'nav-menu',
                            'container'       => 'nav',  
                            'container_class' => 'primary-navigation'
                      ) ); 
                ?>                 
              
                </div><!-- .site-navigation -->
                
                </div><!-- .site-branding -->
                       
              </header><!-- .site-header -->
             
            </div><!-- .sidebar-inner -->
        </div><!-- .sidebar -->
  
  <div id="content" class="site-content">