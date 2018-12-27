<?php
/**
 * The template for displaying search results pages.
 *
 * @package techlauncher
 */

get_header(); 
?>
<div class="clearfix"></div>
<main id="content">
  <div class="container">
    <div class="row">
      <div class="<?php if( !is_active_sidebar('sidebar-1')) { echo "col-lg-12 col-md-12"; } else { echo "col-lg-9 col-md-9"; } ?>">
        <div class="Content-container">
	        <div class="row">
		        <?php 
					global $i;
					if ( have_posts() ) : ?>
					<div class="text-center">
						<h2>
							<?php /* translators: %s: search keyword */ ?>
							<?php printf( esc_html__( "Search Results for: %s", 'techlauncher' ), '<span>' . esc_attr(get_search_query()) . '</span>' );?>	
						</h2>
					</div> 
            		<div class="Grid">
					<?php while ( have_posts() ) : the_post();  
					 get_template_part('content','');
					 endwhile;
					 echo '</div>'; else : ?>
					<h2><?php esc_html_e('Not Found','techlauncher'); ?></h2>
					<div class="">
					<p><?php esc_html_e('Sorry, Do Not match.','techlauncher' ); ?>
					</p>
					<?php get_search_form(); ?>
					</div><!-- .blog_con_mn -->
					<?php endif; ?>
					<div class="col-lg-12 text-center">
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
	  <aside class="col-md-3 col-lg-3">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>
</main>
<?php
get_footer();
?>