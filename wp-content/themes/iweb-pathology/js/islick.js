/**
 * File islick.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * @package IWeb_Pathology
 */

// Slider below header

jQuery( document ).ready(function($) {

	if ($( window ).width() > 600) {
			$( document ).ready(function() {
				var iweb_patho_sfwdth = $( ".site-header" ).height() -18;
				$( ".i-content" ).css( {"margin-top":iweb_patho_sfwdth} );
			});
		$( document ).ready(function(){
			$( window ).resize(function(){
				if ($( window ).width() < 600) {
					var iweb_patho_sfwdth = $( ".site-header" ).height();
					$( ".i-content" ).css( {"margin-top":0} );
				} else {
					var iweb_patho_sfwdth = $( ".site-header" ).height() -18;
					$( ".i-content" ).css( {"margin-top":iweb_patho_sfwdth} );
				};
			});
		});
	} else {
		$( document ).ready(function(){
			$( window ).resize(function(){
				if ($( window ).width() > 600) {
					var iweb_patho_sfwdth = $( ".site-header" ).height() -18;
					$( ".i-content" ).css( {"margin-top":iweb_patho_sfwdth} );
				} else {
					var iweb_patho_sfwdth = $( ".site-header" ).height();
					$( ".i-content" ).css( {"margin-top":0} );
				};
			});
		});
	};
});

var myIndex = 0;
carousel();

function carousel() {
	var i;var x = document.querySelectorAll( '.iSlides' );
	if ( x.length ) {
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		myIndex++; console.log( x.length );
		if (myIndex > x.length) {myIndex = 1}
		x[myIndex -1].style.display = "block";
		x[myIndex -1].style.animation = "ianimat-left 0.4s forwards";
		x[myIndex -1].style.animation = "ianimat-left-r 500ms 6450ms forwards";
		setTimeout( carousel, 6600 );
	}
}

var iwebIndex = 0;
iweb_patho_tmonial();

function iweb_patho_tmonial() {
	var si;
	var sx = document.getElementsByClassName( "iwebpatho-tmonial-islides" );
	var iwebpatho_dots = document.getElementsByClassName( "iwebpatho-dot" );
	if ( sx.length ) {
		for (si = 0; si < sx.length; si++) {
			sx[si].style.display = "none";
		}
		iwebIndex++;
		if (iwebIndex > sx.length) {iwebIndex = 1}
		for (si = 0; si < iwebpatho_dots.length; si++) {
			iwebpatho_dots[si].className = iwebpatho_dots[si].className.replace( " iwebpatho-active", "" );
		}
			iwebpatho_dots[iwebIndex - 1].className += " iwebpatho-active";
			sx[iwebIndex - 1].style.display = "block";
			sx[iwebIndex - 1].style.animation = "ianimat-left 0.6s forwards, ianimat-left-r 0.6s 3500ms forwards";

		setTimeout( iweb_patho_tmonial, 3600 );
	}
}
