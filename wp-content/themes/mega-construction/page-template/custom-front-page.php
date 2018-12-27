<?php
/**
 * Template Name: Custom home page
 */

get_header(); ?>

<?php do_action('mega_construction_above_contact_section'); ?>

<?php if( get_theme_mod( 'mega_construction_address' ) != '') { ?>
  <section id="contact-us">
    <div class="container"> 
      <div class="row">   
        <div class="col-md-3 col-sm-3">
          <?php if( get_theme_mod( 'mega_construction_address' ) != '') { ?>
          <div class="row">
            <div class="col-md-2 col-sm-2">
              <i class="fas fa-map-marker"></i>
            </div>
            <div class="col-md-10 col-sm-10">
              <p class="diff-lay"><?php echo esc_html( get_theme_mod('mega_construction_address','') ); ?></p>
              <p class="diff-lay"><?php echo esc_html( get_theme_mod('mega_construction_address1','') ); ?></p>
            </div>
          </div>
          <?php }?>
        </div>
        <div class="col-md-3 col-sm-3">
          <?php if( get_theme_mod( 'mega_construction_phone' ) != '') { ?>
          <div class="row">
            <div class="col-md-2 col-sm-2">
              <i class="fas fa-phone"></i>
            </div>
            <div class="col-md-10 col-sm-10">
              <p class="diff-lay"><?php echo esc_html( get_theme_mod('mega_construction_phone','') ); ?></p>
              <p class="diff-lay"><?php echo esc_html( get_theme_mod('mega_construction_phone1','') ); ?></p>
            </div>
          </div>
          <?php }?>
        </div>   
        <div class="col-md-3 col-sm-3">
          <?php if( get_theme_mod( 'mega_construction_phone' ) != '') { ?>
          <div class="row">
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
        <?php if( get_theme_mod( 'mega_construction_button_link','' ) != '') { ?>
          <div class="col-md-3 col-sm-3">
            <div class="contactbtn">
              <a href="<?php echo esc_url( get_theme_mod('mega_construction_button_link','#' ) ); ?>"><?php esc_html_e( 'SPECIAL OFFERS','mega-construction' ); ?></a>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
  </section>
<?php }?>
  
<?php do_action('mega_construction_below_about_section'); ?>

<?php if( get_theme_mod( 'mega_construction_about_setting','' ) != '') { ?>
  <?php /*--About Us--*/?>
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
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('view More','mega-construction'); ?></a>
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

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>