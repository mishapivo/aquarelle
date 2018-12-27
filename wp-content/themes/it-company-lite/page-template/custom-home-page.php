<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'it_company_lite_before_slider' ); ?>

<?php if( get_theme_mod( 'it_company_lite_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'it_company_lite_slider_page' . $count ));
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
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( it_company_lite_string_limit_words( $excerpt,20 ) ); ?></p>
              <div class="more-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('GET STARTED','it-company-lite'); ?></a>
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

<?php } ?>

<?php do_action( 'it_company_lite_after_slider' ); ?>

<section id="about">
  <div class="container">
    <?php $pages = array();
      $mod = absint( get_theme_mod( 'it_company_lite_about_page' ));
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
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <?php if(get_theme_mod('it_company_lite_section_main_title') != ''){ ?>
                  <hr>
                  <h3><?php echo esc_html(get_theme_mod('it_company_lite_section_main_title',''));?></h3>
                <?php }?>
                <?php if(get_theme_mod('it_company_lite_section_text') != ''){ ?>
                  <p><?php echo esc_html(get_theme_mod('it_company_lite_section_text',''));?></p>
                  <hr>
                <?php }?>
                <h4><?php the_title(); ?></h4>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( it_company_lite_string_limit_words( $excerpt,30 ) ); ?></p>
                <div class="about-btn">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('CONTINUE READING','it-company-lite') ?></a>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <?php the_post_thumbnail(); ?>
              </div>
            </div>
          <?php endwhile; ?>
      <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif; wp_reset_postdata() ?>
    <div class="clearfix"></div> 
  </div>
</section>

<?php do_action( 'it_company_lite_after_about' ); ?>

<div id="content-vw">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>