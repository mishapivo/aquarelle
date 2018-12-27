+( function( $ ) {
	function fullpage_init() {		
	    $('#content.site-content').fullpage({
	        verticalCentered: true,
	        scrollOverflow: true,

	        licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
	        
	        css3: false,
	        anchors: [
	        	'section1', 
	        	'section2', 
	        	'section3', 
	        	'section4',  
	        	'section5', 
	        	'section6', 
	        	'section7'
	        	],
	        menu: '#fp-menu',
	    });

        // calling fullpage.js methods using jQuery
	    $('#moveSectionDown').click(function(e){
	        e.preventDefault();
	        $.fn.fullpage.moveSectionDown();
	    });

	    jQuery(document).on('click', '#evt-scroll-top', function(){
			fullpage_api.moveTo(1);
		});
	}

	function page_padding_top() {
		var header_height = $('header').height();

		if($('body').hasClass('fullpage-enabled')) {
			// header_height += 30;
			setTimeout(function() {
				$('body.home .section .evt-img-overlay').css({ 'padding-top': header_height + 'px' });
			}, 500);
		}
	}

	function fullpage_width() {
		$('body.home .evt-img-overlay').width( $(window).width() );
	}

	$(window).resize(function() {
		page_padding_top();

		// fix the width
		fullpage_width();
	});

	$(document).ready(function() {
		// if($('body.home').hasClass('blog')) { } else{ }
		$('body.home').addClass('fullpage-enabled');

		// fullpage on homepage only
		if($('body.home').hasClass('fullpage-enabled')) {
			// initialize fullpage
			fullpage_init();

			// fix the width
			fullpage_width();

			// fix padding top
			page_padding_top();
		}
	});

} )( jQuery );