<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Jalil
 */
get_header(); ?>
	<section <?php if(has_post_thumbnail()): ?> style="background-image:url(<?php the_post_thumbnail_url( 'large' ); ?>);" <?php endif; ?> id="breadcrumbs" class="padding-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><?php  the_title(); ?></h2>
				</div>
			</div>
		</div>
	</section>

	<section id="blog" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );
							the_post_navigation(); 
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>
				</div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();
