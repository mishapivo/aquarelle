<?php
/**
 * Displaying home page.
 *
 * This template display post by default.
 * @package Relief Medical Hospital
 */

get_header(); ?>

<?php do_action( 'relief_medical_hospital_index_header' ); ?>

<div class="post-wrapper">
  <div class="container">
    <?php
      $layout = get_theme_mod( 'relief_medical_hospital_theme_options','Right Sidebar');
      if($layout == 'One Column'){?>
        <div id="firstbox">
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/post/content' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => esc_html__( 'Previous page', 'relief-medical-hospital' ),
                    'next_text'          => esc_html__( 'Next page', 'relief-medical-hospital' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'relief-medical-hospital' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
        <div class="clearfix"></div>
      <?php }else if($layout == 'Three Columns'){?>
        <div class="row">
          <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
          <div id="firstbox" class="col-lg-6 col-md-6">
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/post/content' ); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' ); 

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => esc_html__( 'Previous page', 'relief-medical-hospital' ),
                      'next_text'          => esc_html__( 'Next page', 'relief-medical-hospital' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'relief-medical-hospital' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </div>
          <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
        </div>
      <?php }else if($layout == 'Four Columns'){?>
        <div class="row">
          <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
          <div id="firstbox" class="col-lg-3 col-md-3">
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/post/content' ); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' ); 

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => esc_html__( 'Previous page', 'relief-medical-hospital' ),
                      'next_text'          => esc_html__( 'Next page', 'relief-medical-hospital' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'relief-medical-hospital' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </div>
          <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
          <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
        </div>
      <?php }else if($layout == 'Right Sidebar'){?>
        <div class="row">
          <div id="firstbox" class="col-lg-8 col-md-8">
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/post/content' ); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' ); 

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => esc_html__( 'Previous page', 'relief-medical-hospital' ),
                      'next_text'          => esc_html__( 'Next page', 'relief-medical-hospital' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'relief-medical-hospital' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
        </div>
      <?php }else if($layout == 'Left Sidebar'){?>
        <div class="row">
          <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
          <div id="firstbox" class="col-lg-8 col-md-8">
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/post/content' ); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' ); 

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => esc_html__( 'Previous page', 'relief-medical-hospital' ),
                      'next_text'          => esc_html__( 'Next page', 'relief-medical-hospital' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'relief-medical-hospital' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </div>
        </div>
      <?php }else if($layout == 'Grid Layout'){?>
        <div class="row">
          <div id="firstbox">
            <div class="row">
              <?php if ( have_posts() ) :
                /* Start the Loop */
                  
                  while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/post/grid-layout' ); 
                  
                  endwhile;

                  else :

                    get_template_part( 'no-results' ); 

                  endif; 
              ?>
            </div>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => esc_html__( 'Previous page', 'relief-medical-hospital' ),
                      'next_text'          => esc_html__( 'Next page', 'relief-medical-hospital' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'relief-medical-hospital' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </div>
        </div>
      <?php }else {?>
        <div class="row">
          <div id="firstbox" class="col-lg-8 col-md-8">
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/post/content' ); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' ); 

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => esc_html__( 'Previous page', 'relief-medical-hospital' ),
                      'next_text'          => esc_html__( 'Next page', 'relief-medical-hospital' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'relief-medical-hospital' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
        </div>
      <?php } ?>
  </div>
</div>

<?php do_action( 'relief_medical_hospital_index_footer' ); ?>

<?php get_footer(); ?>