	<!-- Title Start -->

	<div class="space-title-box box-100 relative">
		<div class="space-title-box-ins relative">
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
					<?php
						$src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'tethys-single-img-1');
						$src_mobile = wp_get_attachment_image_src(get_post_thumbnail_id(), 'tethys-loop-img');
						$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
						if ($src) {
					?>
					<div class="space-page-box-featured-img relative">
						<img src="<?php echo esc_url($src[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="space-desktop-view">
						<img src="<?php echo esc_url($src_mobile[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="space-mobile-view">
						<div class="space-gradient-overlay black absolute"></div>
						<div class="space-page-box-featured-title absolute">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="space-page-box-featured-category absolute"><?php echo esc_html(strip_tags(get_the_term_list( $post->ID, 'category', '', ', ', '' ))); ?></div>
					</div>
					<?php $caption = get_the_post_thumbnail_caption(); if ($caption) { ?>
					<div class="space-page-box-featured-img-copy text-right relative">
						<p><?php echo esc_html($caption); ?></p>
					</div>
					<?php }
					} ?>
					<div class="space-page-content relative">
							<div class="space-page-content-meta <?php if(has_excerpt()){ ?>box-33 left<?php } else { ?>box-100<?php } ?> relative">
								<div class="space-page-content-meta-ins relative">
									<?php echo get_avatar( get_the_author_meta('user_email'), 70 ); ?>
									<div class="space-page-content-meta-info relative">
										<?php the_author_posts_link(); ?><br>
										<?php if( get_theme_mod('tethys_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'tethys' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?><br>
										<?php echo esc_html__('Comments: ', 'tethys' ); comments_number( '0', '1', '%' ); ?>
									</div>
								</div>
							</div>
							<?php if(has_excerpt()){ ?>
							<div class="excerpt">
								<?php the_excerpt(); ?>
							</div>
							<?php } ?>
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

				<?php if( get_theme_mod('tethys_related_posts') ) { ?>

				<!-- Read More Start -->

				<?php get_template_part( '/theme-parts/related-posts' ); ?>

				<!-- Read More End -->

				<?php } ?>

				<?php if ( comments_open() || get_comments_number() ) :?>

				<!-- Comments Start -->

				<?php comments_template(); ?>

				<!-- Comments End -->

				<?php endif; ?>
				
			</div>
		</div>
		<div class="space-page-small-column box-25 left small-section relative">
			<?php get_sidebar(); ?>
		</div>
	</div>

	<!-- Single Page End -->