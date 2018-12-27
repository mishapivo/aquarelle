jQuery(document).ready(function($) {
     
     // Latest post
     $('#js-latest').ticker({
       speed: 0.15,
       controls: false,
       titleText: 'ПОСЛЕДНЕЕ',       
     });
     
     // Sidebar Gallery Nivo LightBox
     $('.nivolight').nivoLightbox();
     
     $('.header-wrapper #site-navigation .menu-main-menu-container').addClass('clearfix');
     $(window).on('load',function(){
		$(".scroll-content").mCustomScrollbar({
    	axis:"x",
        mouseWheelPixels: "235",
        horizontalScroll: true,
            autoDraggerLength: true,
            //autoHideScrollbar: true,
            advanced:{
                autoScrollOnFocus: false,
                updateOnContentResize: true,
                updateOnBrowserResize: true
        }
    });
	});

	$('.fullPreview').click(function(){
		var fullImage = $(this).data('imageFull');
		$('#previewHolder').attr('src', fullImage);
	});
   
    //for scrollbar
    $('.header-wrapper .menu').slicknav({
        allowParentLinks :true,
        duration: 1000,
        prependTo: '.header-wrapper .responsive-slick-menu'
    });
     
     
});