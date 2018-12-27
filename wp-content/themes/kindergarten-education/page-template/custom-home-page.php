<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<?php do_action( 'kindergarten_education_before_slider' ); ?>


<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'kindergarten_education_slider_page' . $count ));
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
          $i = 1;
    ?>     
    <div class="carousel-inner" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt(); ?></p>
              <div class="more-btn">              
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','kindergarten-education'); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; 
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

<?php do_action( 'kindergarten_education_after_slider' ); ?>

<?php /** services **/ ?>
<section id="services">
  <div class="container">
    <div class="row">
      <div class="col-md-4 service-section">
        <?php
          $args = array( 'name' => get_theme_mod('kindergarten_education_single_post',''));
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="serv-text-box">
                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                <hr class="line">
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( kindergarten_education_string_limit_words( $excerpt,20 ) ); ?></p>
              </div>
              <div class="service-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>  
            <?php endwhile; 
            wp_reset_postdata();?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php
        endif; ?>        
      </div>
      <div class="col-md-8 category-section">
        <div class="row">          
          <?php 
            $page_query = new WP_Query(array( 'category_name' => esc_html(get_theme_mod('kindergarten_education_blogcategory_setting'),'theblog')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?> 
              <div class="col-md-4 category-text">
                <div class="trainerbox">
                  <div class="service-img-box1"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
                </div>
                <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( kindergarten_education_string_limit_words( $excerpt,12 ) ); ?></p>
                <div class ="testbutton">
                  <a href="<?php the_permalink(); ?>"><span><?php echo esc_html(get_theme_mod('kindergarten_education_about_name',__('VIEW MORE','kindergarten-education'))); ?></span></a>
                </div>
              </div>                
            <?php endwhile;
            wp_reset_postdata();
          ?>
          <div class="clearfix"></div>
        </div>      
      </div>
    </div>
  </div>
</section>

<?php do_action( 'kindergarten_education_after_service' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>