jQuery(document).ready(function($) {

	
	// magnific pop up
	
	$("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").magnificPopup({type:'image'});

	$(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('rel','gallery').magnificPopup({type:'image', gallery:{ enabled:true }});
	
	// responsive iframe
	
	$("iframe, object, embed").wrap("<div class='video-container' />");
	
});


