( function( $ ) {
	'use strict';
	$.fn.travelGemPortfolio = function() {
		return this.each(function(i, elem){
			var portfolioContainer = jQuery('.portfolio-container', elem);
			portfolioContainer.imagesLoaded(function(){
				portfolioContainer.isotope({
					filter: '*',
					animationOptions: {
						duration: 750,
						easing: 'linear',
						queue: false
					}
				});
			});
			jQuery('.portfolio-filter a', elem).on('click', function(e){
				e.preventDefault();
				jQuery('.portfolio-filter .current', elem).removeClass('current');
				jQuery(this).addClass('current');

				var selector = jQuery(this).attr('data-filter');
				portfolioContainer.isotope({
					filter: selector,
					animationOptions: {
						duration: 750,
						easing: 'linear',
						queue: false
					}
				});
				return false;
			});
		});
	};
	$( document ).ready(function( $ ) {
		$( '.portfolio-main-wrapper' ).travelGemPortfolio();
	});
} )( jQuery );
