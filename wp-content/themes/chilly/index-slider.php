<?php
	$home_slider_image = get_theme_mod('home_slider_image', CHILLY_ST_TEMPLATE_DIR_URI .'/images/slider.jpg');
	$home_slider_title = get_theme_mod('home_slider_title','Welcome to SpiceShop Theme');
	
	$home_slider_discription = get_theme_mod('home_slider_discription','Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
	$home_slider_btn_txt = get_theme_mod('home_slider_btn_txt','Read More');
	$home_slider_btn_link = get_theme_mod('home_slider_btn_link',esc_url('#'));
	$home_slider_btn_target = get_theme_mod('home_slider_btn_target',false);
	
	$home_page_slider_enabled = get_theme_mod('home_page_slider_enabled','on');
	if($home_page_slider_enabled !='off') {	
?>
	<section class="slider" style="position:relative;">
		<div class="item" style="background-image:url(<?php echo esc_url($home_slider_image); ?>); width: 100%; height: 90vh; background-position: center center; background-size: cover; z-index: 0;" >
		<?php $slider_image_overlay = get_theme_mod('slider_image_overlay',true);
			$slider_overlay_section_color = get_theme_mod('slider_overlay_section_color','rgba(0,0,0,0.30)');
			if($slider_image_overlay != false) { ?>
			<div class="overlay" style="background-color:<?php echo esc_attr($slider_overlay_section_color);?>"></div>
			<?php } ?>
			<div class="container">
					<div class="format-standard">
						<?php if( ($home_slider_title) || ($home_slider_discription)!='' ) { ?>
						<div class="slide-text-bg1">
						<?php if ( ! empty( $home_slider_title ) || is_customize_preview() ) { ?>
						<h1><?php echo esc_html($home_slider_title);  ?></h1>
						<?php } 
						if ( ! empty( $home_slider_discription ) || is_customize_preview() ) {
						?>
						<p><?php echo esc_html($home_slider_discription); ?></p>
						<?php } ?>
						</div>
						<?php } if($home_slider_btn_txt) { ?>
						<div class="slide-btn-area-sm">						
						<a <?php if($home_slider_btn_link) { ?> href="<?php echo esc_url( $home_slider_btn_link); } ?>" 
						<?php if($home_slider_btn_target) { ?> target="_blank" <?php } ?> class="slide-btn-sm">
						<?php if($home_slider_btn_txt) { echo esc_html($home_slider_btn_txt); } ?></a>
						</div>
						<?php } ?>						
					</div>	
				</div>	
			</div>
	</section>
		<?php
}?>