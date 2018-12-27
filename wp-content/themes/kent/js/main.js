(function ($) {

	var $container = $('.container');
	var $aside = $('#aside, .page-main-nav, body, nav.menu');
	// widgets that may contain content that could change size during load
	var widget_footer_parent = '.col-sidebar';
	var masonry_footer_properties = {};
	var masonry_test_interval = 100;
	var masonry_old_height = 0;

	function masonry_reload() {

		$( widget_footer_parent ).masonry( masonry_footer_properties );

	}

	function masonry_widget_load_test() {

		var height = 0;

		// get combined height of all widgets
		$( widget_footer_parent ).find( '.widget' ).each(function(){
			height += $( this ).height();
		});

		// if height has changed then reposition widgets
		// also reset interval in case something is still loading
		// note that because default 'old' height is 0 this will always get called first time around
		if ( masonry_old_height < height ) {
			masonry_reload();
			masonry_test_interval = 100;
		}

		masonry_old_height = height;
		masonry_test_interval = Math.floor( masonry_test_interval * 2 );

		// no resizing in 5 seconds
		if ( masonry_test_interval < 3000 ) {
			setTimeout( masonry_widget_load_test, masonry_test_interval );
		}

	}

	function toggleTOC() {
		var opened = $container.data( 'opened' );
		if ( opened ) {
			closeTOC();
		} else {
			openTOC();
		}
	}

	function openTOC() {
		$container.addClass( 'slide' );
		$container.data( 'opened', true );
		$aside.addClass( 'slide' );
		$( '.menu .searchform' ).removeClass( 'fadeOutUp' ).addClass( 'fadeInDown' );
		$( '.menu #nav' ).removeClass( 'fadeOutLeft' ).addClass( 'fadeInLeft' );
		$( '.page-main-nav, .social_links, #cover-image .avatar' ).fadeOut();
	}

	function closeTOC() {
		$container.removeClass( 'slide' );
		$container.data( 'opened', false );
		$aside.removeClass( 'slide' );
		$( '.menu .searchform' ).removeClass( 'fadeInDown' ).addClass( 'fadeOutUp' );
		$( '.menu #nav' ).removeClass( 'fadeInLeft' ).addClass( 'fadeOutLeft' );
		$( '.page-main-nav, .social_links, #cover-image .avatar' ).fadeIn();
	}

	$( document ).ready(function(){

		// side menu open and close
		$( 'a.link-open-nav' ).click( function() {
			toggleTOC();
		});
		$( '.menu a.menu-close' ).click( function() {
			closeTOC();
			return false;
		});
		$( '.container' ).append( '<div class="slide_overlay" />' );
		$( '.slide_overlay' ).click( function() {
			var opened = $container.data( 'opened' );
			if ( opened ) {
				closeTOC();
			}
		});

		$( '.menu ul ul' ).hide().parent( 'li' ).find( 'a:first' ).addClass( 'menu-has-children' );

		// expandable menus
		var expand_link = $( '<a class="menu-expand">+</a>' );
		$( '.menu ul ul' ).before( expand_link );
		$( 'a.menu-expand' ).click(function() {
			var $this = $(this);
			var opened = $this.data( 'opened' );

			if ( opened ) {
				$this.parent().find( 'ul:first' ).slideUp( 250 );
				$this.data( 'opened', false );
				$this.html( '+' );
			} else {
				$this.parent().find( 'ul:first' ).slideDown( 250 );
				$this.data( 'opened', true );
				$this.html( '-' );
			}
			return false;
		});

		// Arrange footer widgets vertically.
		if ( $.isFunction( $.fn.masonry ) ) {

			masonry_footer_properties = {
				itemSelector: '.widget',
				gutter: 0,
				isOriginLeft: ! $( 'body' ).is( '.rtl' )
			};

			masonry_widget_load_test();

		}

	});

})(jQuery);