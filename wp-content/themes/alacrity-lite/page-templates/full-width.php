<?php
/*
* Template Name: Full Width Template
*/

get_header();?>

<div id="primary" class="site-content">
	<div id="content" role="main">
        <div class="container">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="page_wrapper">
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			</div> <!--.page_wrapper-->	
			<?php endwhile; // end of the loop. ?>
        </div><!-- .container  -->
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>