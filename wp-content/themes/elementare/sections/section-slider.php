<?php
$showSlider = elementare_options('_onepage_section_slider', '');
?>
<?php if ($showSlider == 1) : ?>
<?php
	$showScrollDown = elementare_options('_onepage_scrolldown_slider', '1');
	$sliderEffectScroll = elementare_options('_onepage_effect_slider', 'withZoom');
	$sliderSectionID = elementare_options('_onepage_id_slider', 'slider');
	$slideImage = array();
	$slideText = array();
	$slideSubText = array();
	for( $number = 1; $number < ELEMENTARE_VALUE_FOR_SLIDER; $number++ ){
		$slideImage["$number"] = elementare_options('_onepage_image_'.$number.'_slider', '');
		$slideText["$number"] = elementare_options('_onepage_text_'.$number.'_slider', '');
		$slideSubText["$number"] = elementare_options('_onepage_subtext_'.$number.'_slider', '');
	}
?>
<section class="elementare_onepage_section elementare_slider <?php echo esc_attr($sliderEffectScroll); ?>" id="<?php echo esc_attr($sliderSectionID); ?>">
	<div class="flexslider">
	  <ul class="slides">
		<?php for( $number = 1; $number < ELEMENTARE_VALUE_FOR_SLIDER; $number++ ) : ?>
			<?php if ($slideImage["$number"]) : ?>
				<li>
					<div class="flexImage" style="background-image: url(<?php echo esc_url($slideImage["$number"]); ?>);">
					</div>
					<div class="flexText">
						<div class="inside">
							<?php if ($slideText["$number"] || is_customize_preview()) : ?>
							<h2><?php echo esc_html($slideText["$number"]); ?></h2>
							<?php endif; ?>
							<?php if ($slideSubText["$number"] || is_customize_preview()) : ?>
							<span><?php echo esc_html($slideSubText["$number"]); ?></span>
							<?php endif; ?>
						</div>
					</div>
				</li>
			<?php endif; ?>
		<?php endfor; ?>
	  </ul>
	  <?php if ($showScrollDown) : ?>
		<div class="scrollDown"><div class="mouse"></div></div>
	<?php endif; ?>
	</div>
</section>
<?php endif; ?>