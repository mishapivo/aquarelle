<?php get_header(); ?>

	<!-- Title Start -->

	<div class="space-title-box box-100 relative">
		<div class="space-title-box-ins relative">
			<h1><?php esc_html_e( 'Recent Posts', 'tethys' ); ?></h1>
		</div>
	</div>

	<!-- Title End -->

	<!-- Archive Start -->

	<div class="space-archive box-100 relative">
		<div class="space-archive-large-column box-75 left relative">
			<div class="space-archive-loop-items relative">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( '/theme-parts/archive/loop' ); ?>
			<?php endwhile; ?>

			<!-- Archive Navigation Start -->

			<?php
				the_posts_pagination( array(
					'end_size' => 2,
					'prev_text'    => esc_html__('&lsaquo;', 'tethys'),
					'next_text'    => esc_html__('&rsaquo;', 'tethys'),
				));
			?>

			<!-- Archive Navigation End -->

			<?php else : ?>

			<!-- Posts not found Start -->

			<div class="space-archive-loop-items-not-found relative">
				<div class="space-archive-loop-items-not-found-ins case-15 white relative">
					<div class="space-archive-loop-item-title-ins no-image relative">
						<h2><?php esc_html_e( 'Posts not found.', 'tethys' ); ?></h2>
						<p>
							<?php esc_html_e( 'No posts has been found. Please return to the homepage.', 'tethys' ); ?>
						</p>
					</div>
				</div>
			</div>

			<!-- Posts not found End -->

			<?php endif; ?>
			</div>
		</div>
		<div class="space-archive-small-column box-25 left small-section relative">
			<?php get_sidebar(); ?>
		</div>
	</div>

	<!-- Archive End -->

<?php get_footer(); ?>