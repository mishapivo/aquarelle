<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Devion
 */

get_header(); ?>

	<div id="video-frame">
		<div class="container"><div class="row">
			<div class="col-md-12">
				<?php the_post_video( 'large' ) ?>

			</div>
		</div></div>
	</div>
	
	<div class="frame-bar">
		<div class="container"><div class="row">
		
			<div class="col-md-6">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div class="entry-meta">
					 <?php echo get_the_term_list( $post->ID, 'genre', ' ', ', ', '' ); ?> 
				</div><!-- .entry-meta -->
			</div>
			
			<div class="col-md-6 count-box">

				<div class="view-count"> <?php if( function_exists('the_views')) { the_views(); } ?>  </div>
				<div class="like-count"> <?php if( function_exists('zilla_likes')) {zilla_likes(); }?> </div>
				<div class="comment-count"> <?php  comments_popup_link( '0 Comments', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?> </div>
				
			</div>
			
		</div></div>
	</div>	
	
	<div class="container"><div class="row">
	<div class="col-md-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'video' ); ?>

			<?php get_template_part( 'inc/related-videos' ); ?>
			
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