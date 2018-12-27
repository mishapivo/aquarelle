<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package techlauncher
 */
get_header(); ?>
<!--==================== main content section ====================-->
<main id="content">
  <div class="container">
    <div class="row">
      <div class="<?php if( !is_active_sidebar('sidebar-1')) { echo "col-lg-12 col-md-12"; } else { echo "col-lg-9 col-md-9"; } ?>"> 
        <div class="Content-container">
          <div class="Sticky-post">
            <div class="row">
              <div class="col-lg-12 Sticky-post">
                <?php get_template_part('featured',''); ?>
              </div>
            </div> 
          </div>
          <div class="row"> 
            <div class="Grid">
              <?php 
                while(have_posts()){the_post();
                  if(!is_sticky()){
                    get_template_part('content','');
                  }
              ?>
                  <?php } ?>
            </div>
              <div class="col-lg-12">
                <div class="Pagination-content">
                  <?php
              			//Previous / next page navigation
              			the_posts_pagination( array(
              			'prev_text'          => '<i class="fa fa-long-arrow-left"></i>',
              			'next_text'          => '<i class="fa fa-long-arrow-right"></i>',
              			'screen_reader_text' => ' ',
              			) );
            			?>
                </div>
              </div>
          </div>
        </div>
      </div>
      <aside class="col-lg-3 col-md-3">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>
</main>
<?php
get_footer();
?>