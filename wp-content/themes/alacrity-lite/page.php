<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Alacrity Lite
 */

get_header();?>

<div id="primary" class="site-content row">
	<div id="content" role="main">
		<div class="container">
			<div class="content_box">
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="page_wrapper">
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				</div> <!--.page_wrapper-->	
				<?php endwhile; // end of the loop. ?>
			</div>
		    <?php get_sidebar(); ?>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
    
<?php get_footer(); ?>