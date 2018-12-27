<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Unique_Blog
 */

get_header();
unique_blog_breadcrumb();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-single', get_post_type() );

			?>

				<?php
					$prevPost = get_previous_post(true);
					$nextPost = get_next_post(true);
				?>
				
					<?php $prevPost = get_previous_post(true);
						if($prevPost) {
							$args = array(
								'posts_per_page' => 1,
								'include' => $prevPost->ID
							);
							$prevPost = get_posts($args);
							foreach ($prevPost as $post) {
								setup_postdata($post);
					?>
						<div class="post-previous">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p><?php $unique_blog_excerpt = get_the_excerpt(); ?><?php echo esc_html( $unique_blog_excerpt ); ?></p>
							<a class="previous" href="<?php the_permalink(); ?>"><i class="fa fa-arrow-left"></i><?php echo esc_html__(' Previous Article','unique-blog'); ?></a>
						</div>
					<?php
								wp_reset_postdata();
							} //end foreach
						} // end if
						
						$nextPost = get_next_post(true);
						if($nextPost) {
							$args = array(
								'posts_per_page' => 1,
								'include' => $nextPost->ID
							);
							$nextPost = get_posts($args);
							foreach ($nextPost as $post) {
								setup_postdata($post);
					?>
						<div class="post-next">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p><?php $unique_blog_single_excerpt = get_the_excerpt(); ?><?php echo esc_html( $unique_blog_single_excerpt ) ; ?></p>
							
							<a class="previous" href="<?php the_permalink(); ?>"><?php echo esc_html__('Next Article','unique-blog'); ?> <i class="fa fa-arrow-right"></i></a>
						</div>
					<?php
								wp_reset_postdata();
							} //end foreach
						} // end if
					?>


			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if( get_theme_mod('unique_blog_sidebar_layout_settings','right-sidebar') != 'full-width' ){
	get_sidebar();
}
get_footer();
