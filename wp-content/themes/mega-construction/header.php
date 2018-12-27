<?php
/**
 * The Header for our theme.
 * @package Mega Construction
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'mega-construction' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php /** slider section **/ ?>

<div class="logo">
  <?php if( has_custom_logo() ){ mega_construction_the_custom_logo();
   }else{ ?>
  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
  <?php $description = get_bloginfo( 'description', 'display' );
  if ( $description || is_customize_preview() ) : ?> 
    <p class="site-description"><?php echo esc_html($description); ?></p>       
  <?php endif; }?>
</div>
<?php 
$section_hide = get_theme_mod( 'mega_construction_slider_enabledisable' );
if ( 'Disable' == $section_hide ) {
  return;
}?>
<section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <?php $pages = array(); 
        for ( $count = 0; $count <= 3; $count++ ) {
          $mod = intval( get_theme_mod( 'mega_construction_slidersettings_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $pages[] = $mod;
          }
        }
        if( !empty($pages) ) :
          $args = array(
              'post_type' => 'page',
              'post__in' => $pages,
              'orderby' => 'post__in'
          );
          
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1; $m = 1; 
            ?>     
            <div class="carousel-inner" role="listbox">
                <?php  while ( $query->have_posts() ) : $query->the_post();?>

                <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                    <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                    <div class="carousel-caption">
                      <div class="inner_carousel">
                        <h2><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?></a></h2>  
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html( mega_construction_string_limit_words( $excerpt,15 ) ); ?></p>
                      </div>
                    </div>
                </div>
                <?php $i++; $m++; endwhile; 
                wp_reset_postdata();?>
            </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        </a>
    </div>  
    <div class="clearfix"></div>
</section> 

<div id="header">
  <div class="menu-sec">
    <div class="container">
      <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','mega-construction'); ?></a></div>
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
   