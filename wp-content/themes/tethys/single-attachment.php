<?php get_header(); ?>

	<!-- Title Start -->

	<div class="space-title-box box-100 relative">
		<div class="space-title-box-ins relative">
			<h1><?php the_title(); ?></h1>
			<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div class="space-breadcrumbs relative">','</div>'); } ?>
		</div>
	</div>

	<!-- Title End -->

	<!-- Single Page Start -->

	<div class="space-page box-100 relative">
		<div class="space-page-large-column box-75 left relative">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="space-page-box case-15 white relative">
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
					<div class="space-page-box-single-category relative">
						<?php the_category(' '); ?>
					</div>
					<div class="space-page-content relative">
						<?php
						the_content();
						wp_link_pages( array(
							'before'      => '<div class="clear"></div><nav class="navigation pagination-post">' . esc_html__( 'Pages:', 'tethys' ),
							'after'       => '</nav>',
							'link_before' => '<span class="page-number">',
							'link_after'  => '</span>',
						) );
						?>
										
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<?php
						$tag_title = esc_html__('Tags:', 'tethys' );
						the_tags('<div class="space-single-page-tags relative"><span>'.$tag_title .'</span> ', ' ', '</div>');
					?>
				</div>
			</div>

			<?php if ( comments_open() || get_comments_number() ) :?>

			<!-- Comments Start -->

			<?php comments_template(); ?>

			<!-- Comments End -->

			<?php endif; ?>

		</div>
		<div class="space-page-small-column box-25 left small-section relative">
			<?php get_sidebar(); ?>
		</div>
	</div>

	<!-- Single Page End -->

<?php get_footer(); ?>