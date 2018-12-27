;(function( $ ){

/**
* Header Style
* @since Corporate Gravity 1.0.0
*/

function headerFivestyle(){

	var th = $('.top-header').outerHeight(),
	    mh5 = $('.site-header-five').outerHeight(),
	    screen = $(window).width();

	if ( screen <= 991 ) {
		$('.site-header-five').css({
			'top' : 15
		});
	}
	else {
		$('.site-header-five').css({
			'top' : th
		});
	}

	if( BUSINESSGRAVITY.is_admin_bar_showing){
		$('.top-header').css({
			'top' : 32
		});

		if ( screen <= 991 ) {
			$('.site-header-five').css({
				'top' : 61
			});
		}
		else {
			$('.site-header-five').css({
				'top' : th + 32
			});
		}
	}

	$('.wrap-inner-banner .page-header, .block-slider .slide-inner').css({
		'paddingTop' : mh5
	});
}

jQuery( document ).ready( function(){
	headerFivestyle();
});

jQuery(window).resize(function() {
	headerFivestyle();
});

})( jQuery );