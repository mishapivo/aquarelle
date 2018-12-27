<?php 
$showCta = elementare_options('_onepage_section_cta', '');
?>
<?php if ($showCta == 1) : ?>
	<?php
		$ctaSectionID = elementare_options('_onepage_id_cta','cta');
		$ctaIcon = elementare_options('_onepage_fontawesome_cta','fa fa-flash');
		$ctaPhrase = elementare_options('_onepage_phrase_cta','');
		$ctaDesc = elementare_options('_onepage_desc_cta','');
		$ctaTextButton = elementare_options('_onepage_textbutton_cta',__('More Information', 'elementare'));
		$ctaLinkButton = elementare_options('_onepage_urlbutton_cta','#');
		$ctaOpenLink = elementare_options('_onepage_openurl_cta','_blank');
	?>
<section class="elementare_onepage_section elementare_cta <?php echo $ctaDesc ? 'withDesc' : 'noDesc' ?>" id="<?php echo esc_attr($ctaSectionID); ?>">
	<div class="elementare_cta_color"></div>
	<div class="elementare_action_cta">
		<div class="cta_columns">
			<div class="ctaText">
				<div class="ctaIcon"><i class="<?php echo esc_attr($ctaIcon); ?>" aria-hidden="true"></i></div>
				<div class="ctaPhrase">
					<?php if ($ctaPhrase || is_customize_preview()) : ?>
						<h3><?php echo wp_kses($ctaPhrase, elementare_allowed_html()); ?></h3>
					<?php endif; ?>
					<?php if ($ctaDesc || is_customize_preview()) : ?>
						<p><?php echo wp_kses($ctaDesc, elementare_allowed_html()); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php if ($ctaTextButton) : ?>
				<div class="ctaButton elementareButton"><a href="<?php echo esc_url($ctaLinkButton); ?>" target="<?php echo esc_attr($ctaOpenLink); ?>"><?php echo esc_html($ctaTextButton); ?></a></div>
			<?php endif; ?>
	</div>
	</div>
</section>
<?php endif; ?>