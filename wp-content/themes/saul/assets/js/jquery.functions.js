jQuery.noConflict()(function($){

	"use strict";

/* ===============================================
   MAIN MENU
   =============================================== */

	$('.saul-menu li').hover(
		
		function () {
			$(this).children('ul').stop(true, true).fadeIn(100);
		}, 
		function () {
			$(this).children('ul').stop(true, true).fadeOut(400);		
		}
			
	);

/* ===============================================
   PLACEHOLDER
   =============================================== */

	$('#searchform #s').each(function(){
		$(this).attr("placeholder", saulLocalize.readMore);
	});  
	        
});