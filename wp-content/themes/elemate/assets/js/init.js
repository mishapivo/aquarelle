jQuery( document ).ready( function( $ ) {

	$(function(){
		$('.button-collapse').sideNav({closeOnClick: true});
		$('.parallax').parallax();

		var close = $('<a class=".button-close"></a>');
        close.css('opacity', 0).click( function(){
            removeMenu();
        });
	});	
  
	$(function () {
    	var nav = $('.elementor-widget-wp-widget-nav_menu');
    	$(window).scroll(function () {
			if ($(this).scrollTop() > 85) {
    			nav.addClass("anchor-menu-fixed anchor-menu");
    		} else {
    			nav.removeClass("anchor-menu-fixed anchor-menu");
    		}
    	});
    });
	
	$(function () {
    	var nav = $('nav.transparent');
    	$(window).scroll(function () {
			if ($(this).scrollTop() > 84) {
    			nav.addClass("menu-fixed");
    		} else {
    			nav.removeClass("menu-fixed");
    		}
    	});
    });

});

