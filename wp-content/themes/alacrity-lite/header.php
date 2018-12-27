<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Alacrity Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>   
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
<div class="skip-link">
	<a href="#content" class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'alacrity-lite' ); ?></a>
</div><!-- .skip-link -->
<!--HEADER-->
<header>
<div class="header_wrap layer_wrapper row">		
<!--HEADER STARTS-->
    	<!--HEAD INFO AREA-->
		<div class="head-info-area row">
      <div class="container">
        	<div class="left">
                <?php 
                $ht_time = get_theme_mod('ht_time');
                if (!empty($ht_time)) { ?>
                <span class="phntp"><i class="fa fa-map-marker"></i><?php echo esc_html($ht_time); ?></span>
                <?php } ?>

                <?php
                $ht_phone = get_theme_mod('ht_phone');
                if (!empty($ht_phone)) { ?>
                <span class="phntp"><i class="fa fa-phone"></i><?php echo esc_html($ht_phone); ?></span> 
                <?php } ?>

				 <?php
                $ht_email = get_theme_mod('ht_email');
                if (!empty($ht_email)) { ?>
                <span class="emltp"><a href="mailto:<?php echo esc_html(sanitize_email($ht_email)); ?>"><i class="fa fa-envelope"></i><?php echo esc_html(sanitize_email($ht_email)); ?></a></span>
                <?php } ?>
                
                
          	</div> <!-- .left -->             				
         
            <div class="right">
            	<span class="suptp">
                <?php alacrity_lite_social_links();?>
                </span> 
            </div> <!-- .right -->                   
            <div class="clear"></div>   
       </div> <!-- .container -->               
    </div> <!-- .head-info-area -->
<div class="header type1 row">
  <div class="container">
      <hgroup>
        <div class="logo">
          <?php if ( function_exists( 'the_custom_logo' ) && ( has_custom_logo() ) ) { the_custom_logo(); } else {
            ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
              <p class="site-description"><?php bloginfo( 'description' );?></p>                          
            </a>
        <?php }?>
          </div>
      </hgroup>
    <nav id="mainnav" class="main-navigation" role="navigation"> 
    <div id="head-mobile"></div>
    <div class="toggle-button"></div> 
     <?php wp_nav_menu( array('theme_location' => 'primary', 'container'=>'ul', 'menu_class'=>'main-menu') ); ?>
  </div>
    </nav><!-- #site-navigation -->
    </div>
  </div><!-- HEADER ENDS-->
</div>
</header>  
		

<?php if (!is_home() && is_front_page()) { ?>

<section id="home_slider">
<?php
  $hideslider = get_theme_mod('hide_slider', 0);
  $hide_caption = get_theme_mod('hide_slide_caption', 0);
     if( $hideslider == '') { ?>
<!-- Slider Section -->
<?php
   $args = array(
        'post_type' => 'post',
        'posts_per_page' => (int) get_theme_mod('slider_loop','3'),
        'meta_query' => array( array(
        'key' => '_thumbnail_id'
       ) )
     );
       $slider_query = new WP_Query($args);
 if ($slider_query->have_posts()) { ?>
                       <?php while ($slider_query->have_posts()) : $slider_query->the_post();
                         $slide_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                         $img_arr[] = $slide_img;
                     $id_arr[] = $post->ID; 
             endwhile;?>
          <?php if(!empty($id_arr)){ ?>
            <div class="slider-wrapper theme-default">
                   <div id="slider" class="nivoSlider">
                      <?php 
            $cnt=1;
            foreach($img_arr as $url){ if(!empty($url)){ ?>
            <img src="<?php echo esc_url($url[0]); ?>" title="#slidecaption<?php echo (int)$cnt; ?>" />
            <?php }
            $cnt++; } ?>
          </div>  
          
          <?php if( $hide_caption == '') { 
            $cnt=1;
            foreach($id_arr as $id){ 
            $title = get_the_title( $id );
            $link =  get_permalink( $id );
            $post_l = get_post($id); 
            setup_postdata( $post_l );
			$content =  esc_html(alacrity_lite_excerpt(25),'alacrity-lite');
            ?>  
            <div id="slidecaption<?php echo (int)$cnt;?>" class="nivo-html-caption">
                <div class="slide-inner">
                <h2><?php printf( /* translators: %s: slide title. */ esc_html__(' %s','alacrity-lite'),  $title);?></h2>
                <p><?php printf( /* translators: %s: slide description. */ esc_html__(' %s','alacrity-lite'),  $content);?></p>
                <a class="slide_more" href="<?php echo esc_url($link);?>"><?php esc_html_e('Read More', 'alacrity-lite');?></a>
                </div>     
            </div>
          <?php $cnt++; } 
        } ?>       
      </div><!--slider_wrap-->

      <?php } } } ?>
</section> <!-- #homeslider-->
   <?php } else { ?>
   <div class="page_head"><?php if ( get_header_image() ) : ?>
    <img src="<?php header_image(); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
  <?php 
else:
    the_post_thumbnail('full');
endif; 
?>
</div>
<?php } ?>