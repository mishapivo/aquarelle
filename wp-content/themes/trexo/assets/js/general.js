// JavaScript Document
jQuery(document).ready(function() {
	
	var trexoViewPortWidth = '',
		trexoViewPortHeight = '';

	function trexoViewport(){

		trexoViewPortWidth = jQuery(window).width(),
		trexoViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( trexoViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var trexoSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var trexoSiteHeaderWidth = jQuery('.site-header').width();
			var trexoSiteHeaderPadding = ( trexoSiteHeaderWidth * 2 )/100;
			var trexoMenuHeight = jQuery('.menu-container').height();
			
			var trexoMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var trexoMenuPadding = ( trexoSiteHeaderHeight - ( (trexoSiteHeaderPadding * 2) + trexoMenuHeight ) )/2;
			var trexoMenuButtonsPadding = ( trexoSiteHeaderHeight - ( (trexoSiteHeaderPadding * 2) + trexoMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':trexoMenuPadding});
			jQuery('.site-buttons').css({'padding-top':trexoMenuButtonsPadding});
			
			
		}else{

			jQuery('.menu-container, .site-buttons, .header-container-overlay, .site-header').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		trexoViewport();
		
	});
	
	trexoViewport();


	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( trexoViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

		
	
});		