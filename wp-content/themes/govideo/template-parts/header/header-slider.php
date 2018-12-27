<div class="header-slider">
		<div id="header-slider" class="owl-carousel owl-theme">
        <?php

			if ( ! dynamic_sidebar( 'hoo-header-slider' ) ):
			endif;
		
	 	?>
		</div>
        <script>
		jQuery('#header-slider').imagesLoaded(function () {
			jQuery("#header-slider").owlCarousel({
	
				autoplay: govideo_params.sliderOptions.header_slider_autoplay,
				autoplayTimeout: govideo_params.sliderOptions.header_slider_timeout,
				loop: true,
				items : 5,
				lazyLoad:true,
				responsiveClass:true,
				responsive:{
					0:{
						items:1,
						nav:false
					},
					600:{
						items:2,
						nav:false
					},
					1000:{
						items:3,
						nav:false,
					},
					1200:{
						items:5,
						nav:false,
					}
				}
			});
		});
		</script>
	</div>