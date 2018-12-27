function lg( params ){
	console.log( params );
}

function mythemes_hex2rgb( hex )
{
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec( hex );
    var colors = result ? {
        r: parseInt( result[1], 16 ),
        g: parseInt( result[2], 16 ),
        b: parseInt( result[3], 16 )
    } : null;

    var rett = '';

    if( colors.hasOwnProperty( 'r' ) ){
    	rett += colors.r + ' , ';
    }
    else{
    	rett += '255 , ';
    }

    if( colors.hasOwnProperty( 'g' ) ){
    	rett += colors.g + ' , ';
    }
    else{
    	rett += '255 , ';
    }

    if( colors.hasOwnProperty( 'b' ) ){
    	rett += colors.b;
    }
    else{
    	rett += '255';
    }

    return rett;
}

function mythemes_brightness( hex, steps )
{
    var steps 	= Math.max( -255, Math.min( 255, steps ) );
    var hex 	= hex.toString().replace( /#/g, "" );

    if ( hex.length == 3 ) {
        hex =
        hex.substring( 0, 1 ) + hex.substring( 0, 1 ) +
        hex.substring( 1, 2 ) + hex.substring( 1, 2 ) +
        hex.substring( 2, 3 ) + hex.substring( 2, 3 );
    }

    var r = parseInt( hex.substring( 0, 2 ).toString() , 16 );
    var g = parseInt( hex.substring( 2, 4 ).toString() , 16 );
    var b = parseInt( hex.substring( 4, 6 ).toString() , 16 );

    r = Math.max( 0, Math.min( 255, r + steps ) ).toString(16).toUpperCase();
    g = Math.max( 0, Math.min( 255, g + steps ) ).toString(16).toUpperCase();
    b = Math.max( 0, Math.min( 255, b + steps ) ).toString(16).toUpperCase();

	var r_hex = Array( 3 - r.length ).join( '0' ) + r;
	var g_hex = Array( 3 - g.length ).join( '0' ) + g;
	var b_hex = Array( 3 - b.length ).join( '0' ) + b;

    return '#' + r_hex + g_hex + b_hex;
}

(function($){

    {   // site identity options

        // margin top
        wp.customize( 'mythemes-blog-logo-m-top' , function( value ){
            value.bind(function( newval ){
                if( newval ){
                    if( jQuery( 'div.mythemes-blog-identity .mythemes-blog-logo' ).length ){
                        jQuery( 'div.mythemes-blog-identity .mythemes-blog-logo' ).css({ 'margin-top' : newval + 'px' });
                    }

                }
            });
        });

        // margin bottom
        wp.customize( 'mythemes-blog-logo-m-bottom' , function( value ){
            value.bind(function( newval ){
                if( newval ){
                    if( jQuery( 'div.mythemes-blog-identity .mythemes-blog-logo' ).length ){
                        jQuery( 'div.mythemes-blog-identity .mythemes-blog-logo' ).css({ 'margin-bottom' : newval + 'px' });
                    }

                }
            });
        });
    }


    {   // header options

        {   // general options

            // header height
            wp.customize( 'mythemes-header-height' , function( value ){
                value.bind(function( newval ){
                    if( jQuery( 'div.mythemes-header.parallax-container' ).length ){
                        jQuery( 'div.mythemes-header.parallax-container' ).css( 'height' , parseInt( newval ).toString() + 'px' );
                    }
                });
            });

            /**
             *  Header background color.
             *  if the header image is transparent
             *  then will be visible the background color.
             */

            wp.customize( 'mythemes-header-background-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'body' ).css( 'background-color' , newval );
                    jQuery( 'body' ).css( 'backgroundColor' , newval );
                });
            });

            // mask color
            wp.customize( 'mythemes-header-mask-color' , function( value ){
                value.bind(function( newval ){
                    var opacity = parseFloat( wp.customize.instance( 'mythemes-header-mask-transp' ).get() / 100 ).toString();
                    jQuery( 'div.mythemes-header div.valign-cell-wrapper' ).css( 'background-color' , 'rgba(' + mythemes_hex2rgb( newval ) + ' , ' + opacity + ')' );
                });
            });

            // mask color
            wp.customize( 'mythemes-header-mask-transp' , function( value ){
                value.bind(function( newval ){
                    var opacity = parseFloat( newval / 100 ).toString();
                    var color   = wp.customize.instance( 'mythemes-header-mask-color' ).get().toString();
                    jQuery( 'div.mythemes-header div.valign-cell-wrapper' ).css( 'background-color' , 'rgba(' + mythemes_hex2rgb( color ) + ' , ' + opacity + ')' );
                });
            });
        }

        {   // content options

            {   // header headline options

                // header headline text
                wp.customize( 'mythemes-header-headline' , function( value ){
                    value.bind(function( newval ){
                        if( newval ){
                            jQuery( '.mythemes-header a.header-headline' ).html( newval );
                        }
                    });
                });

                // header headline color
                wp.customize( 'mythemes-header-headline-color', function( value ){
                    value.bind(function( newval ){
                        jQuery( 'style#mythemes-header-headline-color' ).html(
                            'div.mythemes-header a.header-headline{' +
                            'color: ' + newval + ';' +
                            '}'
                        );
                    });
                });
            }

            {   // header description options

                // header description text
                wp.customize( 'mythemes-header-description' , function( value ){
                    value.bind(function( newval ){
                        if( newval ){
                            jQuery( '.mythemes-header a.header-description' ).html( newval );
                        }
                    });
                });

                // header description color
                wp.customize( 'mythemes-header-description-color', function( value ){
                    value.bind(function( newval ){

                        var hex     = newval;
                        var rgba1   = 'rgba( ' + mythemes_hex2rgb( hex ) + ', 0.55 )';
                        var rgba2   = 'rgba( ' + mythemes_hex2rgb( hex ) + ', 1.0 )';

                        jQuery( 'style#mythemes-header-description-color' ).html(
                            'div.mythemes-header a.header-description{' +
                            'color: ' + rgba1 + ';' +
                            '}' +

                            'div.mythemes-header a.header-description:hover{' +
                            'color: ' + rgba2 + ';' +
                            '}'
                        );
                    });
                });
            }
        }


        {   // header first button options

            // first button text color
            wp.customize( 'mythemes-header-btn-1-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#mythemes-header-btn-1-color' ).html(
                        'div.mythemes-header.parallax-container div.mythemes-header-buttons a.btn-large.mythemes-first-button{' +
                        'color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // first button background color
            wp.customize( 'mythemes-header-btn-1-bkg-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#mythemes-header-btn-1-bkg-color' ).html(
                        'div.mythemes-header.parallax-container div.mythemes-header-buttons a.btn-large.mythemes-first-button{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // first button background color
            wp.customize( 'mythemes-header-btn-1-bkg-h-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#mythemes-header-btn-1-bkg-h-color' ).html(
                        'div.mythemes-header.parallax-container div.mythemes-header-buttons a.btn-large.mythemes-first-button:hover{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // first button url
            wp.customize( 'mythemes-header-btn-1-url' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.mythemes-header-buttons a.mythemes-first-button' ).attr( 'href' , newval );
                });
            });

            // first button text
            wp.customize( 'mythemes-header-btn-1-text' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.mythemes-header-buttons a.mythemes-first-button' ).html( newval );
                });
            });

            // first button description
            wp.customize( 'mythemes-header-btn-1-description' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.mythemes-header-buttons a.mythemes-first-button' ).attr( 'title' , newval );
                });
            });
        }

        {   // header second button options

            // second button text color
            wp.customize( 'mythemes-header-btn-2-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#mythemes-header-btn-2-color' ).html(
                        'div.mythemes-header.parallax-container div.mythemes-header-buttons a.btn-large.mythemes-second-button{' +
                        'color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // second button background color
            wp.customize( 'mythemes-header-btn-2-bkg-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#mythemes-header-btn-2-bkg-color' ).html(
                        'div.mythemes-header.parallax-container div.mythemes-header-buttons a.btn-large.mythemes-second-button{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // second button background color
            wp.customize( 'mythemes-header-btn-2-bkg-h-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#mythemes-header-btn-2-bkg-h-color' ).html(
                        'div.mythemes-header.parallax-container div.mythemes-header-buttons a.btn-large.mythemes-second-button:hover{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // second button url
            wp.customize( 'mythemes-header-btn-2-url' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.mythemes-header-buttons a.mythemes-second-button' ).attr( 'href' , newval );
                });
            });

            // second button text
            wp.customize( 'mythemes-header-btn-2-text' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.mythemes-header-buttons a.mythemes-second-button' ).html( newval );
                });
            });

            // second button description
            wp.customize( 'mythemes-header-btn-2-description' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.mythemes-header-buttons a.mythemes-second-button' ).attr( 'title' , newval );
                });
            });
        }
    }


    {   // breadcrumbs options

		// Blog Title
        wp.customize( 'mythemes-breadcrumbs-blog-title' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.mythemes-page-header h1#materialize-blog-title' ).length ){
                    jQuery( 'div.mythemes-page-header h1#materialize-blog-title' ).html( newval );
                }
            });
        });

        // home link text
        wp.customize( 'mythemes-breadcrumbs-home-link-text' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.mythemes-page-header li#home-label a span' ).length ){
                    jQuery( 'div.mythemes-page-header li#home-label a span' ).html( newval );
                }
            });
        });

        // home link description
        wp.customize( 'mythemes-breadcrumbs-home-link-description' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.mythemes-page-header li#home-label a' ).length ){
                    jQuery( 'div.mythemes-page-header li#home-label a' ).attr( 'title' , newval );
                }
            });
        });

        // space
        wp.customize( 'mythemes-breadcrumbs-space' , function( value ){
            value.bind(function( newval ){

				var

				style 		= '',
				space_991	= parseInt( newval * 991 / 1140 ),
				space_767 	= parseInt( newval * 767 / 1140 ),
				space_540 	= parseInt( newval * 540 / 1140 ),
				space_480 	= parseInt( newval * 480 / 1140 );

				if( space_991 > 23 ){
					style +=

					'@media (max-width: 991px ){' +
					'div.mythemes-page-header{' +
					'padding-top:' + parseInt( space_991 ) + 'px;' +
					'padding-bottom:' + parseInt( space_991 ) + 'px;' +
					'}' +
					'}';
				}

				if( space_767 > 23 ){
					style +=

					'@media (max-width: 767px ){' +
					'div.mythemes-page-header{' +
					'padding-top:' + parseInt( space_767 ) + 'px;' +
					'padding-bottom:' + parseInt( space_767 ) + 'px;' +
					'}' +
					'}';
				}

				if( space_540 > 23 ){
					style +=

					'@media (max-width: 540px ){' +
					'div.mythemes-page-header{' +
					'padding-top:' + parseInt( space_540 ) + 'px;' +
					'padding-bottom:' + parseInt( space_540 ) + 'px;' +
					'}' +
					'}';
				}

				if( space_480 > 23 ){
					style +=

					'@media (max-width: 480px ){' +
					'div.mythemes-page-header{' +
					'padding-top:' + parseInt( space_480 ) + 'px;' +
					'padding-bottom:' + parseInt( space_480 ) + 'px;' +
					'}' +
					'}';
				}

				jQuery( 'style#mythemes-breadcrumbs-space' ).html(
					'div.mythemes-page-header{' +
					'padding-top:' + parseInt( newval ) + 'px;' +
					'padding-bottom:' + parseInt( newval ) + 'px;' +
					'}' +

					style
				);
            });
        });
    }

    {   // additional options

        wp.customize( 'mythemes-blog-title' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.mythemes-page-header h1#blog-title' ).length ){
            	   jQuery( 'div.mythemes-page-header h1#blog-title' ).html( newval );
                }
            });
        });
    }


    {   // others options

        wp.customize( 'mythemes-copyright' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.mythemes-copyright span.copyright' ).length ){
                    jQuery( 'div.mythemes-copyright span.copyright' ).html( newval );
                }
            });
        });
    }


    {   // colors options

        wp.customize( 'background_color' , function( value ){
            value.bind(function( newval ){

                var bg_color        = newval;
                var bg_color_rgba   = 'rgba( ' + mythemes_hex2rgb( newval ) + ' , 0.91 )';
                jQuery( 'style#mythemes-background-color' ).html(

                    // background color
                    'body > div.content{' +
                    'background-color: ' + bg_color + ';' +
                    '}' +

                    // menu navigation
                    // background color
                    'body.scroll-nav .mythemes-poor{' +
                    'background-color: ' + bg_color_rgba + ';' +
                    '}' +

                    '.mythemes-poor{' +
                    'background-color: ' + bg_color + ';' +
                    '}'
                );
            });
        });
    }


    {   // background image options

        wp.customize( 'background_image' , function( value ){
            value.bind(function( newval ){
                console.log( newval );
                jQuery( 'body > div.content' ).css( 'background-image' , 'url(' + newval + ')' );
            });
        });

        wp.customize( 'background_repeat' , function( value ){
            value.bind(function( newval ){
                console.log( newval );
                jQuery( 'body > div.content' ).css( 'background-repeat' , newval );
            });
        });

        wp.customize( 'background_position_x' , function( value ){
            value.bind(function( newval ){
                console.log( newval );
                jQuery( 'body > div.content' ).css( 'background-position' , newval );
            });
        });

        wp.customize( 'background_attachment' , function( value ){
            value.bind(function( newval ){
                console.log( newval );
                jQuery( 'body > div.content' ).css( 'background-attachment' , newval );
            });
        });
    }

})(jQuery);
