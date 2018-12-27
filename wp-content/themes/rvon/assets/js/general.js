// JavaScript Document
jQuery(document).ready(function() {
	
	var rvonViewPortWidth = '',
		rvonViewPortHeight = '';

	function rvonViewport(){

		rvonViewPortWidth = jQuery(window).width(),
		rvonViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( rvonViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var rvonSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var rvonSiteHeaderWidth = jQuery('.site-header').width();
			var rvonSiteHeaderPadding = ( rvonSiteHeaderWidth * 2 )/100;
			var rvonMenuHeight = jQuery('.menu-container').height();
			
			var rvonMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var rvonMenuPadding = ( rvonSiteHeaderHeight - ( (rvonSiteHeaderPadding * 2) + rvonMenuHeight ) )/2;
			var rvonMenuButtonsPadding = ( rvonSiteHeaderHeight - ( (rvonSiteHeaderPadding * 2) + rvonMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':rvonMenuPadding});
			jQuery('.site-buttons').css({'padding-top':rvonMenuButtonsPadding});
			
			
		}else{

			jQuery('.menu-container, .site-buttons, .header-container-overlay, .site-header').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		rvonViewport();
		
	});
	
	rvonViewport();


	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( rvonViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

		
	
});		