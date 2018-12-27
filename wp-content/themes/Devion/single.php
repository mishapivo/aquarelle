<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Devion
 */

get_header(); ?>
<div class="pages-title">
	<div class="container"><div class="row"> 
		<div class="col-md-12">
			<h2> <?php _e('Blog','devion');?> </h2>
		</div>
	</div></div>
</div>

<div class="container"><div class="row">
	<div class="col-md-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>
			<?php get_template_part( 'inc/related-posts' ); ?>
			<?php devion_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_sidebar(); ?>
</div></div>
<?php get_footer(); ?>