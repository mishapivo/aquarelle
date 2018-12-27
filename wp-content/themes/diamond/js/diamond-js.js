/****************** scrolltotop ********************/
jQuery(document).ready(function($) {
	
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});


/******************* menu toggle ************************/
jQuery(document).ready(function() {
    jQuery('.toggle-nav').click(function(e) {
        jQuery(this).toggleClass('actived');
        jQuery('.menu ul').toggleClass('actived');

        e.preventDefault();
    });
});

(function( $ ) { 'use strict';
	// make dropdowns functional on focus
	$( '.menu' ).find( 'a' ).on( 'focus blur', function() {
		$( this ).parents( 'ul, li' ).toggleClass( 'focus' );
	} );
	
}(jQuery));