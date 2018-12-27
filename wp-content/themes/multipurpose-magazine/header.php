<?php
/**
 * The Header for our theme.
 * @package Multipurpose Magazine
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'multipurpose-magazine' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="header">
  <div class="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <?php dynamic_sidebar('social-icon') ?>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="logo">
            <?php if( has_custom_logo() ){ multipurpose_magazine_the_custom_logo();
             }else{ ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?> 
              <p class="site-description"><?php echo esc_html($description); ?></p>
            <?php endif; }?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="login">
            <i class="fa fa-search"></i>
          <?php if ( get_theme_mod('multipurpose_magazine_login_link','') != "" ) {?>
              <a href="<?php echo esc_url(get_theme_mod('multipurpose_magazine_login_link','')); ?>"><i class="fa fa-user"></i><?php echo esc_html(get_theme_mod('multipurpose_magazine_login_text','')); ?> </a>
          <?php }?>
          </div>
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
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <?php $pages = array();
            $mod = intval( get_theme_mod( 'multipurpose_magazine_popular_maazine'));
            if ( 'page-none-selected' != $mod ) {
              $pages[] = $mod;
            }
            if( !empty($pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $pages,
                'orderby' => 'post__in'
              );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="popular">
                <div class="text">
                  <div class="row m-0">
                    <div class="col-lg-9 col-md-9">
                       <h5><?php the_title(); ?></h5>
                     </div>
                     <div class="col-lg-3 col-md-3">
                       <div class="know-btn">
                         <a href="<?php the_permalink(); ?>" class="blogbutton-small"><?php esc_html_e('BUY NOW','multipurpose-magazine'); ?></a>
                       </div>
                     </div>
                   </div>
                </div>
                   <div class="box-image">
                       <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                   </div>
                </div>
              <?php  endwhile; ?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php endif;
            endif;
            wp_reset_postdata();
          ?>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="contact-details">
                <div class="row">
                  <?php if ( get_theme_mod('multipurpose_magazine_time','') != "" ) {?>
                    <div class="col-lg-2 col-md-2 p-0">
                      <i class="far fa-clock"></i>
                    </div>
                    <div class="col-lg-10 col-md-10 p-0">
                      <?php if ( get_theme_mod('multipurpose_magazine_time','') != "" ) {?>
                        <p class="heading"><?php echo esc_html( get_theme_mod('multipurpose_magazine_time','')); ?></p>
                        <p><?php echo esc_html( get_theme_mod('multipurpose_magazine_time_text','')); ?></p>
                      <?php }?>
                    </div>
                  <?php }?>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3">
              <div class="contact-details">
                <div class="row">
                  <?php if ( get_theme_mod('multipurpose_magazine_temperature','') != "" ) {?>
                    <div class="col-lg-2 col-md-2 p-0">
                      <i class="fab fa-mixcloud"></i>
                    </div>
                    <div class="col-lg-10 col-md-10">
                      <?php if ( get_theme_mod('multipurpose_magazine_temperature','') != "" ) {?>
                        <p class="heading"><?php echo esc_html( get_theme_mod('multipurpose_magazine_temperature','')); ?></p>
                        <p><?php echo esc_html( get_theme_mod('multipurpose_magazine_temperature_text','' )); ?></p>
                      <?php }?>
                    </div>
                  <?php }?>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-5">
              <div class="contact-details">
                <div class="row">
                  <?php if ( get_theme_mod('multipurpose_magazine_email','') != "" ) {?>
                    <div class="col-lg-2 col-md-2">
                      <i class="fas fa-at"></i>
                    </div>
                    <div class="col-lg-10 col-md-10 p-0">
                      <?php if ( get_theme_mod('multipurpose_magazine_email','') != "" ) {?>
                        <p class="heading"><?php echo esc_html( get_theme_mod('multipurpose_magazine_email','')); ?></p>
                        <p><?php echo esc_html( get_theme_mod('multipurpose_magazine_email_text','')); ?></p>
                      <?php }?>
                    </div>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
          <div class="news">
            <?php if ( get_theme_mod('multipurpose_magazine_breaking_news','') != "" ) {?>
              <marquee width="100%" direction="left" height="30%">  
                <span class="headline"><?php esc_html_e('BREAKING NEWS /','multipurpose-magazine'); ?> </span><span><?php echo esc_html( get_theme_mod('multipurpose_magazine_breaking_news','')); ?></span>              
              </marquee>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','multipurpose-magazine'); ?></a></div>
  <div class="menu-sec">
    <div class="container">    
      <div class="nav">
        <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
      </div>
    </div>
  </div>
</div>