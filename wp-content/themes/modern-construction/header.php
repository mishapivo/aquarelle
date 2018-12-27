<?php
/**
 * The Header for our theme.
 * @package Modern Construction
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'modern-construction' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="logo">
          <?php if( has_custom_logo() ){ mega_construction_the_custom_logo();
           }else{ ?>
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?> 
            <p class="site-description"><?php echo esc_html($description); ?></p>       
          <?php endif; }?>
        </div>
      </div>
      <div class="col-md-9 p-0">
        <div class="menu-sec">
          <div class="container">
            <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','modern-construction'); ?></a></div>
            <div class="row">
              <div class="menubox col-md-10 col-sm-10">
                <div class="nav">
                  <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
                </div>
              </div>
              <div class="search-box col-md-2 col-sm-2">
                <span><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="serach_outer">
              <div class="closepop"><i class="far fa-window-close"></i></div>
              <div class="serach_inner">
                <?php get_search_form(); ?>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </div>
  </div>
</div>