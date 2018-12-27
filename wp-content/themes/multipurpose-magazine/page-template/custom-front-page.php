<?php
/**
 * Template Name: Custom home page
 */

get_header(); ?>

<?php do_action('multipurpose_magazine_above_slider_section'); ?>

<?php if( get_theme_mod('multipurpose_magazine_category3') != ''){ ?>
  <section id="categry">
      <div class="owl-carousel">
          <?php 
          $catData = get_theme_mod('multipurpose_magazine_category3');
          if($catData){              
          $page_query = new WP_Query(array( 'category_name' => esc_html( $catData ,'multipurpose-magazine')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="imagebox">
                <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                <div class="text-content">
                  <div class="meta-box">
                    <?php
                      if( $tags = get_the_tags() ) {
                        echo '<span class="meta-sep"></span>';
                        foreach( $tags as $tag ) {
                          $sep = ( $tag === end( $tags ) ) ? '' : ' ';
                          echo '<a href="' . esc_url(get_term_link( $tag, $tag->taxonomy )) . '">' . esc_html($tag->name) . '</a>' . esc_html($sep);
                        }
                      }
                    ?>
                    <span class="entry-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php the_date(); ?></span>
                    <span class="entry-time"><i class="far fa-clock" aria-hidden="true"></i><?php the_time(); ?></span>
                   </div>
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html(multipurpose_magazine_string_limit_words( $excerpt,15 ) ); ?></p>
                </div>
              </div>
            <?php endwhile; 
            wp_reset_postdata();
          }
          ?>
        </div>
  </section>
<?php }?>

<?php do_action('multipurpose_magazine_below_slider_section'); ?>

<?php if( get_theme_mod('multipurpose_magazine_page_title') != '' || get_theme_mod('multipurpose_magazine_category') != ''){ ?>
  <section id="top-trending">
    <div class="container">      
      <div class="row">
        <div class="col-lg-9 col-md-9">
          <?php if( get_theme_mod('multipurpose_magazine_page_title') != ''){ ?>
            <hr class="top-head">
            <h3><?php echo esc_html(get_theme_mod('multipurpose_magazine_page_title',__('TOP TRENDING NEWS CATEGORIES','multipurpose-magazine'))); ?></h3>
            <hr class="top-head">
          <?php }?>
          <?php 
            $catData=  get_theme_mod('multipurpose_magazine_category');
            if($catData){
              $page_query = new WP_Query(array( 'category_name' => esc_html( $catData ,'multipurpose-magazine')));?>
              <div class="row">
                <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="col-lg-4 col-md-4">
                  <div class="abt-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
                  <div class="trending-cat">
                    <div class="top-tag">
                      <?php
                        if( $tags = get_the_tags() ) {
                          echo '<span class="meta-sep"></span>';
                          foreach( $tags as $tag ) {
                            $sep = ( $tag === end( $tags ) ) ? '' : ' ';
                            echo '<a href="' . esc_url(get_term_link( $tag, $tag->taxonomy )) . '">' . esc_html($tag->name) . '</a>' . esc_html($sep);
                          }
                        }
                      ?>
                    </div>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> 
                  </div>
                </div>
                <?php endwhile; ?>
              </div>
              <?php wp_reset_postdata();   
            }       
          ?>
          <div class="home-content">
            <?php while ( have_posts() ) : the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
          </div>
        </div>
        <div class="col-lg-3 col-md-3">
          <div id="sidebar"><?php dynamic_sidebar('home'); ?></div>
        </div>
      </div>
      <div class="clearfix"></div> 
    </div>
  </section>
<?php }?>

<?php do_action('multipurpose_magazine_after_top_trending_section'); ?>



<?php get_footer(); ?>