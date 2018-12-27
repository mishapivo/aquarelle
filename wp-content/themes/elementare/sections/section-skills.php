<?php $showSkills = elementare_options('_onepage_section_skills', ''); ?>
<?php if ($showSkills == 1) : ?>
	<?php
		$skillsSectionID = elementare_options('_onepage_id_skills', 'skills');
		$skillsTitle = elementare_options('_onepage_title_skills', __('Our Skills', 'elementare'));
		$skillsSubTitle = elementare_options('_onepage_subtitle_skills', __('What We Do', 'elementare'));
		$skillsShowTitleBack = elementare_options('_onepage_showtitle_skills', '');
		$skillName = array();
		$skillValue = array();
		for( $number = 1; $number < ELEMENTARE_VALUE_FOR_SKILLS; $number++ ){
			$skillName["$number"] = elementare_options('_onepage_skillname_'.$number.'_skills', '');
			$skillValue["$number"] = elementare_options('_onepage_skillvalue_'.$number.'_skills', '');
		}
	?>
<section class="elementare_onepage_section elementare_skills" id="<?php echo esc_attr($skillsSectionID); ?>">
	<div class="elementare_skills_color"></div>
	<div class="elementare_action_skills">
	<?php if($skillsTitle || is_customize_preview()): ?>
		<?php if($skillsShowTitleBack): ?>
			<div class="title-absolute"><?php echo esc_html($skillsTitle); ?></div>
		<?php endif; ?>
		<h2 class="elementare_main_text"><?php echo esc_html($skillsTitle); ?></h2>
		<div class="elemMask"></div>
	<?php endif; ?>
	<?php if($skillsSubTitle || is_customize_preview()): ?>
		<p class="elementare_subtitle"><?php echo esc_html($skillsSubTitle); ?></p>
	<?php endif; ?>
		<div class="skills_columns">
			<?php for( $number = 1; $number < ELEMENTARE_VALUE_FOR_SKILLS; $number++ ) : ?>
				<?php if ($skillName["$number"]) : ?>
					<div class="elementareSkill">
						<div class="skillTop">
							<div class="skillName"><?php echo esc_html($skillName["$number"]); ?></div>
							<div class="skillNameUnder"><?php echo esc_html($skillName["$number"]); ?></div>
							<div class="skillValue" data-delay="<?php echo intval($number * 150) ?>"><span><?php echo intval($skillValue["$number"]); ?></span><i><?php esc_html_e('%', 'elementare'); ?></i></div>
						</div>
						<div class="skillBottom">
							<div class="skillBar"></div>
							<div class="skillRealBar" data-number="<?php echo intval($skillValue["$number"]); ?>%" data-delay="<?php echo intval($number * 150) ?>"><div class="skillRealBarCyrcle"></div></div>
						</div>
					</div>
				<?php endif; ?>
			<?php endfor; ?>
		</div>
	</div>
</section>
<?php endif; ?>