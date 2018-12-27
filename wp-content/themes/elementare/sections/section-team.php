<?php $showTeam = elementare_options('_onepage_section_team', ''); ?>
<?php if ($showTeam == 1) : ?>
	<?php
		$teamSectionID = elementare_options('_onepage_id_team', 'team');
		$teamTitle = elementare_options('_onepage_title_team', __('Our Team', 'elementare'));
		$teamSubTitle = elementare_options('_onepage_subtitle_team', __('Nice to meet you', 'elementare'));
		$customMore = elementare_options('_excerpt_more', '&hellip;');
		$textLenght = elementare_options('_onepage_lenght_team', '50');
		$teamShowTitleBack = elementare_options('_onepage_showtitle_team', '');
		$teamTestimonialBox = array();
		for( $number = 1; $number < ELEMENTARE_VALUE_FOR_TEAM; $number++ ){
			$teamTestimonialBox["$number"] = elementare_options('_onepage_choosepage_'.$number.'_team', '');
		}
	?>
<section class="elementare_onepage_section elementare_team" id="<?php echo esc_attr($teamSectionID); ?>">
	<div class="elementare_team_color"></div>
	<div class="elementare_action_team">
		<?php if($teamTitle || is_customize_preview()): ?>
			<?php if($teamShowTitleBack): ?>
				<div class="title-absolute"><?php echo esc_html($teamTitle); ?></div>
			<?php endif; ?>
			<h2 class="elementare_main_text"><?php echo esc_html($teamTitle); ?></h2>
			<div class="elemMask"></div>
		<?php endif; ?>
		<?php if($teamSubTitle || is_customize_preview()): ?>
			<p class="elementare_subtitle"><?php echo esc_html($teamSubTitle); ?></p>
		<?php endif; ?>
		<div class="team_columns">
			<?php for( $number = 1; $number < ELEMENTARE_VALUE_FOR_TEAM; $number++ ) : ?>
				<?php if ($teamTestimonialBox["$number"]) : ?>
					<div class="elementareTeamSingle">
						<?php if ('' != get_the_post_thumbnail($teamTestimonialBox["$number"])) : ?>
							<?php echo get_the_post_thumbnail(intval($teamTestimonialBox["$number"]), 'elementare-the-post-small'); ?>
						<?php endif; ?>
						<div class="elementareTeamName"><?php echo get_the_title(intval($teamTestimonialBox["$number"])); ?></div>
						<div class="elementareTeamDesc">
						<?php 
							$post_contentt = get_post(intval($teamTestimonialBox["$number"]));
							$content = $post_contentt->post_content; ?>
							<p><?php echo wp_trim_words($content , intval($textLenght), esc_html($customMore) ); ?></p>
						</div>
					</div>
				<?php endif; ?>
			<?php endfor; ?>
		</div>
	</div>
</section>
<?php endif; ?>