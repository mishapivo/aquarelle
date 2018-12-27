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
			<div class="space-page-box case-15 white relative">
				<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
				<?php
					$src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'tethys-single-img-1');
					$src_mobile = wp_get_attachment_image_src(get_post_thumbnail_id(), 'tethys-loop-img');
					$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
					if ($src) {
				?>
				<div class="space-page-box-featured-img relative">
					<img src="<?php echo esc_url($src[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="space-desktop-view">
					<img src="<?php echo esc_url($src_mobile[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="space-mobile-view">
				</div>
				<?php $caption = get_the_post_thumbnail_caption(); if ($caption) { ?>
				<div class="space-page-box-featured-img-copy text-right relative">
					<p><?php echo esc_html($caption); ?></p>
				</div>
				<?php
						}
					}
				?>
				<div class="space-page-content relative">
					<?php
						the_content();
						wp_link_pages( array(
							'before'      => '<div class="clear"></div><div class="page-links">' . esc_html__( 'Pages:', 'tethys' ),
							'after'       => '</div>',
							'link_before' => '<span class="page-number">',
							'link_after'  => '</span>',
						));
					?>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>

			<?php if (comments_open()) { ?>

			<!-- Comments Start -->

			<?php comments_template(); ?>

			<!-- Comments End -->

			<?php } else {} ?>

		</div>
		<div class="space-page-small-column box-25 left small-section relative">
			<?php get_sidebar(); ?>
		</div>
	</div>

	<!-- Single Page End -->

<?php get_footer(); ?>