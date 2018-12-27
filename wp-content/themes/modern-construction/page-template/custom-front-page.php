<?php
/**
 * Template Name: Custom home page
 */

get_header(); ?>

<?php do_action('mega_construction_above_slider_section'); ?>

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
                        <h2><?php the_title();?></h2>  
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html( mega_construction_string_limit_words( $excerpt,30 ) ); ?></p>
                        <div class="read-btn">
                          <a href="<?php echo esc_url( get_permalink() );?>"><?php esc_html_e( 'READ MORE','modern-construction' ); ?></a>
                        </div> 
                                      
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

<?php do_action('mega_construction_above_contact_section'); ?>

<?php if( get_theme_mod('mega_construction_address') != ''){ ?>
  <section id="contact-us">
    <div class="container"> 
      <div class="contact">
        <div class="row">   
          <div class="col-md-3 col-sm-3 p-0">
            <?php if( get_theme_mod( 'mega_construction_address' ) != '') { ?>
            <div class="address">
              <div class="row">
                <div class="col-md-2 col-sm-2">
                  <i class="fas fa-map-marker"></i>
                </div>
                <div class="col-md-10 col-sm-10">
                  <p class="diff-lay"><?php echo esc_html( get_theme_mod('mega_construction_address','') ); ?></p>
                  <p class="diff-lay"><?php echo esc_html( get_theme_mod('mega_construction_address1','') ); ?></p>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
          <div class="col-md-3 col-sm-3 p-0">
            <?php if( get_theme_mod( 'mega_construction_phone' ) != '') { ?>
              <div class="call">
                <div class="row">
                  <div class="col-md-2 col-sm-2">
                    <i class="fas fa-phone"></i>
                  </div>
                  <div class="col-md-10 col-sm-10">
                    <p class="diff-lay"><?php echo esc_html( get_theme_mod('mega_construction_phone','') ); ?></p>
                    <p class="diff-lay"><?php echo esc_html( get_theme_mod('mega_construction_phone1','') ); ?></p>
                  </div>
                </div>
              </div>
            <?php }?>
          </div>  
          <div class="col-md-3 col-sm-3 p-0">
            <?php if( get_theme_mod( 'mega_construction_phone' ) != '') { ?>
            <div class="row m-0">
              <div class="col-md-2 col-sm-2">
                <i class="fab fa-telegram-plane"></i>
              </div>
              <div class="col-md-10 col-sm-10">
                <p class="diff-lay"><?php echo esc_html( get_theme_mod('mega_construction_email','') ); ?></p>
                <p class="diff-lay"><?php echo esc_html( get_theme_mod('mega_construction_email1','') ); ?></p>
              </div>
            </div>
            <?php }?>
          </div>  
          <div class="col-md-3 col-sm-3 p-0">
            <?php if( get_theme_mod( 'mega_construction_button_link','' ) != '') { ?>
              <div class="contactbtn">
                <a href="<?php echo esc_url( get_theme_mod('mega_construction_button_link','#' ) ); ?>"><?php esc_html_e( 'SPECIAL OFFERS','modern-construction' ); ?></a>
              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php }?> 

<?php do_action('mega_construction_below_about_section'); ?>

<?php /*--About Us--*/?>

<?php if( get_theme_mod('mega_construction_about_setting') != ''){ ?>
  <section class="about">
    <div class="container">
      <?php
        $args = array( 'name' => esc_html( get_theme_mod('mega_construction_about_setting','')));
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="row">
              <div class="col-md-7 col-sm-7">
                <div class="abt-image">
                  <img src="<?php the_post_thumbnail_url('full'); ?>"/>              
                </div>
              </div>
              <div class="col-md-5 col-sm-5">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="textbox">
                  <p><?php the_excerpt(); ?></p>
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('View More','modern-construction'); ?></a>
                </div>
              </div> 
            </div>         
          <?php endwhile; 
          wp_reset_postdata();?>
          <?php else : ?>
             <div class="no-postfound"></div>
          <?php
      endif; ?>
    </div>
  </section>
<?php }?> 

<?php do_action('mega_construction_after_about_section'); ?>

<?php /*--About Us--*/?>

<?php if( get_theme_mod('modern_construction_service_title') != ''){ ?>
  <section class="service">
    <div class="container">
      <div class="row">
        <?php if( get_theme_mod('modern_construction_service_title') != ''){ ?>
        <div class="col-md-6">
          <div class="service-content">
            <h3><?php echo esc_html(get_theme_mod('modern_construction_service_title',__('OUR SERVICES','modern-construction'))); ?></h3>
            <?php }?>
            <?php if( get_theme_mod('modern_construction_service_text') != ''){ ?>
              <div class="service-text">
                <p><?php echo esc_html(get_theme_mod('modern_construction_service_text',__('Add Text','modern-construction'))); ?></p>
              </div>
            <?php }?>
          </div>
          <div class="service-category"> 
            <div class="row">
              <?php 
                $page_query = new WP_Query(array( 'category_name' => esc_html(get_theme_mod('modern_construction_category'),'modern-construction')));?>
                  <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                  <div class="col-md-6 col-sm-6">
                      <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                    <div class="category-content">
                      <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( mega_construction_string_limit_words( $excerpt,10 ) ); ?></p>
                    </div>
                  </div>
                <?php endwhile;
                wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <?php
            $args = array( 'name' => get_theme_mod('modern_construction_post',''));
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="video-post">
                  <?php
                    $content = apply_filters( 'the_content', get_the_content() );
                    $video = false;

                    // Only get video from the content if a playlist isn't present.
                    if ( false === strpos( $content, 'wp-playlist-script' ) ) {
                      $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
                    }
                  ?>
                  <?php
                    if ( ! is_single() ) {
                      // If not a single post, highlight the video file.
                      if ( ! empty( $video ) ) {
                        foreach ( $video as $video_html ) {
                          echo '<div class="entry-video">';
                            echo $video_html;
                          echo '</div>';
                        }
                      }
                      elseif(has_post_thumbnail()) { 
                        the_post_thumbnail(); 
                      } 
                    }; 
                  ?>
                </div>
              <?php endwhile; 
              wp_reset_postdata();?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php
          endif; ?>
        </div>
      </div>
    </div>
  </section>
<?php }?> 

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>