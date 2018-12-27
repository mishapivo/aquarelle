/**
 * File fixed.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * @package IWeb_Pathology
 */

// Menu toggle open box top morgin

						// screen width >600 and <968
 ( function( $ ) {
		var iweb_patho_scrwdth = $( window ).width();
	if (iweb_patho_scrwdth > 600 && iweb_patho_scrwdth < 968) {
		$( document ).ready(function(){
				var iweb_patho_imgHeight6 = $( ".fullwidth" ).height();
				 var abc = (iweb_patho_imgHeight6 - 26) / 2;
				 var def = (abc + 26 + 10);
				$( ".nav-menu" ).css( {"margin-top":def} );
		});

				$( document ).ready(function(){
						$( window ).resize(function(){
							if ($( window ).width() > 968) {
								$( ".nav-menu" ).css( {"margin-top":"0"} );
							}
						});
				});
				$( document ).ready(function(){
						$( window ).resize(function(){
							if ($( window ).width() < 600) {
								$( ".nav-menu" ).css( {"margin-top":"0"} );
							}
						});
				});
				$( document ).ready(function(){
						$( window ).resize(function(){
							var iweb_patho_scrwdth = $( window ).width();
							if (iweb_patho_scrwdth > 600 && iweb_patho_scrwdth < 968) {
								var iweb_patho_imgHeight6 = $( ".fullwidth" ).height();
								 var abc = (iweb_patho_imgHeight6 - 26) / 2;
								 var def = (abc + 26 + 10);
								$( ".nav-menu" ).css( {"margin-top":def} );
							}
						});
				});
	}
 } )( jQuery );

( function( $ ) {
	var iweb_patho_scrwdth = $( window ).width();
	if (iweb_patho_scrwdth < 600 || iweb_patho_scrwdth > 968) {
		   $( document ).ready(function(){
			   $( window ).resize(function(){
				   var iweb_patho_scrwdth2 = $( window ).width();
				   if (iweb_patho_scrwdth2 < 968 || iweb_patho_scrwdth2 > 600) {
					   var iweb_patho_imgHeight6 = $( ".fullwidth" ).height();
					   var abc = (iweb_patho_imgHeight6 - 26) / 2;
					   var def = (abc + 26 + 10);
					   $( ".nav-menu" ).css( {"margin-top":def} );
				   }
				   if (iweb_patho_scrwdth2 > 968 || iweb_patho_scrwdth2 < 600) {
					   $( ".nav-menu" ).css( {"margin-top":"0"} );
				   }
			   });
		   });
	}
} )( jQuery );

// page content below header (except Front Page)

jQuery( document ).ready(function($){

	if ($( window ).width() > 600) {
		if ( $( 'main' ).hasClass( 'itopmrg' ) ) {
			$( document ).ready(function(){
				var iweb_patho_fwdth = $( ".site-header" ).height();
				var iweb_patho_fwdth2 = (iweb_patho_fwdth + 10);
				$( "#primary" ).css( {"margin-top":iweb_patho_fwdth2} );
			});
		}
			$( document ).ready(function(){
				$( window ).resize(function(){
					if ($( window ).width() < 600) {
						$( "#primary" ).css( {"margin-top":'10px'} );
					} else {
						var iweb_patho_fwdth = $( ".site-header" ).height();
						var iweb_patho_fwdth2 = (iweb_patho_fwdth + 10);
						$( "#primary" ).css( {"margin-top":iweb_patho_fwdth2} );
					};
				});
			});
	} else {
		$( document ).ready(function(){
			$( window ).resize(function(){
				if ($( window ).width() > 600) {
					var iweb_patho_fwdth = $( ".site-header" ).height();
					var iweb_patho_fwdth2 = (iweb_patho_fwdth + 10);
					$( "#primary" ).css( {"margin-top":iweb_patho_fwdth2} );
				} else {
					$( "#primary" ).css( {"margin-top":'10px'} );
				};
			});
		});
	};
});

	// logo and title - when select one of them. another display none

jQuery( document ).ready(function($){
	$( document ).ready(function(){
		var iweb_patho_titlerwdth = $( ".title-r" ).height();
		if (iweb_patho_titlerwdth == 0) {
			$( ".title-r" ).css( {"display":"none"} );
		}
	});
	$( document ).ready(function(){
		var iweb_patho_logolwdth = $( ".logo-l" ).height();
		if (iweb_patho_logolwdth == 0) {
			$( ".logo-l" ).css( {"display":"none"} );
		} else {
			$( ".title-r" ).css( {"margin-left":"20px"} );
		}
	});
});

	//CSS Animation

jQuery( window ).scroll(function () {
	jQuery( '.ifadezomin-pckg' ).each(function (){
		var iweb_patho_imagePos = jQuery( this ).offset().top;
		var iweb_patho_topOfWindow = jQuery( window ).scrollTop();
		if (iweb_patho_imagePos < iweb_patho_topOfWindow + 400) {
			jQuery( this ).addClass( "ifadezomin" );
			jQuery( this ).removeClass( "ifadezomin-pckg" );
		}
	});
});
