<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package WordPress
 * @subpackage Spicepress
 */
 
get_header();
chilly_banner_image();
?>
<!-- Page Title Section -->
<div class="blog-seperate"></div>
<!-- /Page Title Section -->
 <!-- Blog & Sidebar Section -->
<section class="blog-section">
	<div class="container">
		<div class="row">	
			<!--Blog Section-->
			<div class="<?php if( !is_active_sidebar('sidebar_primary')) { echo "col-md-12"; } else { echo "col-md-8"; } ?> col-sm-7 col-xs-12">
			
				<?php 
					if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();
						// Include the post format-specific template for the content. get_post_format
						get_template_part( 'content','');
					endwhile;
					
					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
						'next_text'          => '<i class="fa fa-angle-double-right"></i>'
					) );
				
				endif;
				?>
			</div>	
			<!--/Blog Section-->
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<!-- /Blog & Sidebar Section -->
<?php get_footer(); ?>