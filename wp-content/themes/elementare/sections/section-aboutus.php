<?php $showAboutus = elementare_options('_onepage_section_aboutus', ''); ?>
<?php if ($showAboutus == 1) : ?>
	<?php
		$aboutusSectionID = elementare_options('_onepage_id_aboutus', 'aboutus');
		$aboutusTitle = elementare_options('_onepage_title_aboutus', __('About Us', 'elementare'));
		$aboutusSubTitle = elementare_options('_onepage_subtitle_aboutus', __('Who We Are', 'elementare'));
		$aboutusPageBox = elementare_options('_onepage_choosepage_aboutus');
		$aboutusButtonText = elementare_options('_onepage_textbutton_aboutus', __('More Information', 'elementare'));
		$aboutusButtonLink = elementare_options('_onepage_linkbutton_aboutus', '#');
		$aboutusShowTitleBack = elementare_options('_onepage_showtitle_aboutus', '');
	?>
<section class="elementare_onepage_section elementare_aboutus <?php echo has_post_thumbnail($aboutusPageBox) ? 'withImage' : 'noImage' ?>" id="<?php echo esc_attr($aboutusSectionID); ?>">
	<div class="elementare_aboutus_color"></div>
	<div class="elementare_action_aboutus">
		<?php if($aboutusTitle || is_customize_preview()): ?>
			<?php if($aboutusShowTitleBack): ?>
				<div class="title-absolute"><?php echo esc_html($aboutusTitle); ?></div>
			<?php endif; ?>
			<h2 class="elementare_main_text"><?php echo esc_html($aboutusTitle); ?></h2>
			<div class="elemMask"></div>
		<?php endif; ?>
		<?php if($aboutusSubTitle || is_customize_preview()): ?>
			<p class="elementare_subtitle"><?php echo esc_html($aboutusSubTitle); ?></p>
		<?php endif; ?>
		<div class="aboutus_columns">
			<div class="one aboutus_columns_three">
				<div class="aboutInner">
					<?php if($aboutusPageBox) : ?>
					<h3><?php echo get_the_title(intval($aboutusPageBox)); ?></h3>
					<?php
						$args = array(
						  'p'         => intval($aboutusPageBox),
						  'post_type' => 'page'
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) :
							while ( $query->have_posts() ) :
								$query->the_post();
								?>
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'elementare-aboutus' ); ?> >
									<?php
									the_content(
										sprintf(
											/* translators: %s: Name of current post */
											__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'elementare' ),
											get_the_title()
										)
									);
									?>
								</article>
								<?php
							endwhile;
						endif;
						wp_reset_postdata();
					?>
					<?php endif; ?>
					<?php if($aboutusButtonText || is_customize_preview()): ?>
						<div class="elementareButton aboutus"><a href="<?php echo esc_url($aboutusButtonLink); ?>"><?php echo esc_html($aboutusButtonText); ?></a></div>
					<?php endif; ?>
				</div>
			</div>
			<?php if ('' != get_the_post_thumbnail($aboutusPageBox)) : ?>
				<div class="two aboutus_columns_three">
					<div class="aboutInnerImage">
						<?php echo get_the_post_thumbnail(intval($aboutusPageBox), 'large'); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>