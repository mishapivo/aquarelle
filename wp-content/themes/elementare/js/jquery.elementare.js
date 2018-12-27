(function($) {
	'use strict';
	$( window ).scroll(function () {
		if( $( 'ul.elementare_sectionmap' ).length ) {
			var currentNode = null;
			$('.elementare_onepage_section').each(function () {
				var s = $(this);
				var currentId = s.attr('id') || '';
				if ( $( window ).scrollTop() >= s.offset().top - 1) {
					currentNode = currentId;
				}

			});
			$('ul.elementare_sectionmap li').removeClass('current-section');
			if ( currentNode ) {
				$('ul.elementare_sectionmap li').find('a[href$="#' + currentNode + '"]').parent().addClass('current-section');
			}
		}
	});
	$(window).load(function() {
		if ( $( '.flexslider' ).length ) {
		  $('.flexslider').flexslider({
			animation: 'fade',
			controlNav: false,
			directionNav: true, 
			slideshowSpeed: 7000,
			animationSpeed: 1000,
			pauseOnHover: true
		  });
		}
	});
	$(document).ready(function() {
		/*-----------------------------------------------------------------------------------*/
		/*  Page Loader
		/*-----------------------------------------------------------------------------------*/ 
			if ( $( '.elementareLoader' ).length ) {
				$('.elementareLoader').delay(600).fadeOut(1000);
			}
		/*-----------------------------------------------------------------------------------*/
		/*  Detect Mobile Browser
		/*-----------------------------------------------------------------------------------*/
			var mobileDetect = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
		/*-----------------------------------------------------------------------------------*/
		/*  Home icon in main menu
		/*-----------------------------------------------------------------------------------*/ 
			$('.main-navigation .menu-item-home:first-child > a').prepend('<i class="fa fa-home spaceRight"></i>');
		/*-----------------------------------------------------------------------------------*/
		/*  Add class for inputs in comments and search widget
		/*-----------------------------------------------------------------------------------*/ 
			$( '#comments.comments-area input[type="text"], #comments.comments-area input[type="email"], #comments.comments-area input[type="url"], #comments.comments-area input[type="password"], #comments.comments-area input[type="search"], .widget.widget_search input[type="search"], .widget.woocommerce.widget_product_search input[type="search"], .search-container input[type="search"], #comments.comments-area textarea' ).wrap( '<div class="inc-input"></div>' );
			$('<span class="focus-bg"></span>').insertAfter('#comments.comments-area input[type="text"], #comments.comments-area input[type="email"], #comments.comments-area input[type="url"], #comments.comments-area input[type="password"], #comments.comments-area input[type="search"], .widget.widget_search input[type="search"], .widget.woocommerce.widget_product_search input[type="search"], .search-container input[type="search"], #comments.comments-area textarea');
		/*-----------------------------------------------------------------------------------*/
		/*  Set height of featured image and onepage
		/*-----------------------------------------------------------------------------------*/
			function setHeight() {
				if ( $( '.elementareBigImage' ).length ) {
					var windowHeight = $(window).innerHeight() / 1.5;
					$('.elementareBigImage').css({
					  'height': windowHeight
					});
					if ( !mobileDetect ) {
						$('#content.site-content').css({
							'padding-top' : '5em'
						});
					} else {
						$('#content.site-content').css({
							'padding-top' : '1em'
						});
					}
				}
			}
			function setHeightOnepage() {
				if ( $( '.flexslider' ).length ) {
					var windowHeight = $(window).innerHeight() / 1.5;
					$('.flexslider, .flexslider .slides > li .flexText .inside, .flexslider .slides li .flexImage').css({
					  'height': windowHeight
					});
					$('#content.site-content').css({
						'padding-top' : '0em'
					});
				}
			}
			function setHeightServices() {
				if($('body').hasClass('page-template-template-onepage')) {
					if ( $( 'section.elementare_services' ).length ) {
						var servicesHeight = $('.singleServiceContent').outerHeight();
						$('.serviceContent').css({
						  'height': servicesHeight
						});
					}
				}
			}
			setHeight();
			setHeightOnepage();
			setHeightServices();
		/*-----------------------------------------------------------------------------------*/
		/*  Animate Cursor
		/*-----------------------------------------------------------------------------------*/
		if ( $( 'body' ).hasClass( 'animate-cursor' ) && !mobileDetect ) {
			$( 'html' ).css( 'overflow-x', 'hidden' );
			$(document).on('mousemove', function(e){
				var width = $(document).width();
				var height = $(document).height();
				$('.cursor').css({'display':'block','left': Number((e.pageX)-10),'top': Number((e.pageY)-10),'z-index': '9999999'});
				$('body a, .search-button, .hamburger-menu, .close-hamburger, .scrollDown, button, input[type=button], input[type=reset], input[type=submit], aside ul.menu .indicatorBar').hover(
					function() {
						$('.cursor').addClass('active');
					},
					function() {
						$('.cursor').removeClass('active');
					}
				);
			});
		}
		/*-----------------------------------------------------------------------------------*/
		/*  Scroll to section
		/*-----------------------------------------------------------------------------------*/ 
			$('ul.menu a[href*="#"]:not([href="#"]), ul.elementare_sectionmap li a').click(function() {
				if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
				  var target = $(this.hash);
				  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				  if (target.length) {
					$('html, body').animate({
					  scrollTop: target.offset().top
					}, 1000, 'easeInOutExpo');
					return false;
				  }
				}
			});
		/*-----------------------------------------------------------------------------------*/
		/*  Check if featured image exist
		/*-----------------------------------------------------------------------------------*/ 
			if ( $( '.elementareBigImage, .flexslider' ).length ) {
			} else {
				$('header.site-header').addClass('noImage');
			}
		/*-----------------------------------------------------------------------------------*/
		/*  Set nanoscroller
		/*-----------------------------------------------------------------------------------*/ 
			function setNano() {
				if ( $( '#tertiary.widget-area' ).length ) {
					$('.nano').nanoScroller({ preventPageScrolling: true });
				}
			}
			setNano();
		/*-----------------------------------------------------------------------------------*/
		/*  Sidebar Push Button
		/*-----------------------------------------------------------------------------------*/ 
			$('.hamburger-menu, .opacityBox, .close-hamburger').click(function(){
				if ( $('.hamburger-menu').hasClass('yesOpen')) {
					$('.hamburger-menu, .opacityBox, #page.site, #tertiary.widget-area').removeClass('yesHalf');
					setTimeout(function() {
						$('.hamburger-menu, .opacityBox, #page.site, #tertiary.widget-area').removeClass('yesOpen');
					}, 500);
				} else {
					var $delay = 0;
					if($(window).scrollTop() > 0 ) {
						$('html, body').animate({ scrollTop: 0 }, 500, 'easeInOutExpo');
						var $delay = 500;
					}
					setTimeout(function() {
						$('.hamburger-menu, .opacityBox, #page.site, #tertiary.widget-area').addClass('yesOpen yesHalf');
					}, $delay);
				}
			});
		/*-----------------------------------------------------------------------------------*/
		/*  Search Push Button
		/*-----------------------------------------------------------------------------------*/ 
			$('.search-button, .opacityBoxSearch').click(function(){
				$('.search-button, .opacityBoxSearch, .search-container,#page.site').toggleClass('serOpen');
			});
		/*-----------------------------------------------------------------------------------*/
		/*  Menu Widget
		/*-----------------------------------------------------------------------------------*/
			if ( $( 'aside ul.menu' ).length ) {
				$('aside ul.menu').find('li').each(function(){
					if($(this).children('ul').length > 0){
						$(this).append('<span class="indicatorBar"></span>');
					}
				});
				$('aside ul.menu > li.menu-item-has-children .indicatorBar, .aside ul.menu > li.page_item_has_children .indicatorBar').click(function() {
					$(this).parent().find('> ul.sub-menu, > ul.children').toggleClass('yesOpenBar');
					$(this).toggleClass('yesOpenBar');
					var $self = $(this).parent();
					if($self.find('> ul.sub-menu, > ul.children').hasClass('yesOpenBar')) {
						$self.find('> ul.sub-menu, > ul.children').slideDown(300);
					} else {
						$self.find('> ul.sub-menu, > ul.children').slideUp(200);
					}
				});
			}
		/*-----------------------------------------------------------------------------------*/
		/*  Mobile Menu
		/*-----------------------------------------------------------------------------------*/ 
			if ($( window ).width() <= 1025) {
				$('.main-navigation').find('li').each(function(){
					if($(this).children('ul').length > 0){
						$(this).append('<span class="indicator"></span>');
					}
				});
				$('.main-navigation ul > li.menu-item-has-children .indicator, .main-navigation ul > li.page_item_has_children .indicator').click(function() {
					$(this).parent().find('> ul.sub-menu, > ul.children').toggleClass('yesOpen');
					$(this).toggleClass('yesOpen');
					var $self = $(this).parent();
					if($self.find('> ul.sub-menu, > ul.children').hasClass('yesOpen')) {
						$self.find('> ul.sub-menu, > ul.children').slideDown(300);
					} else {
						$self.find('> ul.sub-menu, > ul.children').slideUp(200);
					}
				});
			}
			$(window).resize(function() {
				if ($( window ).width() > 1025) {
					$('.main-navigation ul > li.menu-item-has-children, .main-navigation ul > li.page_item_has_children').find('> ul.sub-menu, > ul.children').slideDown(300);
				}
			});
		/*-----------------------------------------------------------------------------------*/
		/*  Waypoints general script
		/*-----------------------------------------------------------------------------------*/ 
			if($('body').hasClass('page-template-template-onepage')) {
				if ( $.isFunction($.fn.waypoint) ) {
					/*-----------------------------------------------------------------------------------*/
					/*  Waypoints for skills
					/*-----------------------------------------------------------------------------------*/ 
					$('section.elementare_skills').waypoint(function() {
						$('.skillBottom .skillRealBar').each( function() {
						var $this = $(this);
							setTimeout(function() {
								$this.css('width',$this.data('number'));
							}, $this.data('delay'));
						});
						$('.skillTop .skillValue').each( function() {
						var $this = $(this);
							setTimeout(function() {
								$this.css({'opacity':'1', 'bottom': '-5px'});
							}, 1000 + $this.data('delay'));
						});
					},{
						triggerOnce: true,
						offset: '60%'
					});
					/*-----------------------------------------------------------------------------------*/
					/*  Waypoints for contact icon
					/*-----------------------------------------------------------------------------------*/ 
					$('section.elementare_contact').waypoint(function() {
						$('.contact_columns .elementareContactIcon').css({'opacity':'0.1', 'right': '25px'});
					},{
						triggerOnce: true,
						offset: '20%'
					});
				}
			}
		/*-----------------------------------------------------------------------------------*/
		/*  Scroll To Top
		/*-----------------------------------------------------------------------------------*/ 
			if (!mobileDetect || $('#toTop').hasClass('scrolltop_on') ) {
				$(window).scroll(function(){
					if ($(this).scrollTop() > 700) {
						$('#toTop').addClass('visible');
					} 
					else {
						$('#toTop').removeClass('visible');
					}
				}); 
				$('#toTop').click(function(){
					$('html, body').animate({ scrollTop: 0 }, 1000, 'easeInOutExpo');
					return false;
				});
			}
		/*-----------------------------------------------------------------------------------*/
		/*  Detect Mobile Browser
		/*-----------------------------------------------------------------------------------*/ 
			if ( !mobileDetect ) {
				/*-----------------------------------------------------------------------------------*/
				/*  Header Parallax
				/*-----------------------------------------------------------------------------------*/ 
					if($('.elementareBigImage').hasClass('withZoom')) {
						$( '.elementareBigImage' ).data( 'height', $( '.elementareBigImage' ).outerHeight() );
						$( window ).scroll( function() {
							var position = window.scrollY,
								bottom   = window.innerHeight - document.getElementById( 'colophon' ).offsetHeight,
								height   = $( '.elementareBigImage' ).data( 'height' ),
								content  = $( '#content' ).offset().top,
								footer   = $( '#colophon' ).offset().top - position;

							if ( position > 0 && content > position && footer > bottom ) {
								if ( position < height ) {
									$('.elementareBigImage').css({
										'transform' : 'scale('+( 1 + position / height * 0.3 )+','+( 1 + position / height * 0.3 )+')'
									});
								}
							} else if ( position <= 0 ) {
								$('.elementareBigImage').css({
									'transform' : 'scale('+1+','+1+')'
								});
							}
						});
					}
				/*-----------------------------------------------------------------------------------*/
				/*  Slider Parallax
				/*-----------------------------------------------------------------------------------*/ 
					if($('.elementare_slider').hasClass('withZoom')) {
						$( '.flexslider .slides > li .flexImage' ).data( 'height', $( '.flexslider .slides > li .flexImage' ).outerHeight() );
						$( window ).scroll( function() {
							var position = window.scrollY,
								bottom   = window.innerHeight - document.getElementById( 'colophon' ).offsetHeight,
								height   = $( '.flexslider .slides > li .flexImage' ).data( 'height' ),
								content  = $( 'section.elementare_slider' ).offset().top + $( 'section.elementare_slider' ).outerHeight() ,
								footer   = $( '#colophon' ).offset().top - position;

							if ( position > 0 && content > position && footer > bottom ) {
								if ( position < height ) {
									$('.flexslider .slides > li .flexImage').css({
										'transform' : 'scale('+( 1 + position / height * 0.3 )+','+( 1 + position / height * 0.3 )+')'
									});
								}
							} else if ( position <= 0 ) {
								$('.flexslider .slides > li .flexImage').css({
									'transform' : 'scale('+1+','+1+')'
								});
							}
						});
					}
				/*-----------------------------------------------------------------------------------*/
				/*  Menu Fixed
				/*-----------------------------------------------------------------------------------*/ 
					var $filter = $('header.site-header');
					if ($filter.size()) {
						$(window).scroll(function () {
							if (!$filter.hasClass('menuMinor') && $(window).scrollTop() > 0 ) {
								$filter.addClass('menuMinor');
								$('body').addClass('menuMinor');
								$('.site-branding .site-description').slideUp(200);
							} else if ($filter.hasClass('menuMinor') && $(window).scrollTop() <= 0 ) {
								$filter.removeClass('menuMinor');
								$('body').removeClass('menuMinor');
								$('.site-branding .site-description').slideDown(200);
							}
						});
					}
				/*-----------------------------------------------------------------------------------*/
				/*  Set resize
				/*-----------------------------------------------------------------------------------*/ 
					$(window).resize(function() {
						setHeight();
						setHeightOnepage();
						setHeight();
						setHeightServices();
						setNano();
					});
				/*-----------------------------------------------------------------------------------*/
				/*  Social Buttons Float
				/*-----------------------------------------------------------------------------------*/ 
					if ( $( '.site-social ' ).length ) {
						if ( $( '.elementareBigImage' ).length ) {
							$(window).scroll(function () {
								if ($(window).scrollTop() >= $('.elementareBigImage').outerHeight() ) {
									$('.site-social-float').addClass('showSocial');
								} else {
									$('.site-social-float').removeClass('showSocial');
								}
							});
						} else if ( $( '.flexslider' ).length ) {
							$(window).scroll(function () {
								if ($(window).scrollTop() >= $('.flexslider').outerHeight() ) {
									$('.site-social-float').addClass('showSocial');
								} else {
									$('.site-social-float').removeClass('showSocial');
								}
							});
						} else {
							$('.site-social-float').addClass('showSocial');
						}
					}
				/*-----------------------------------------------------------------------------------*/
				/*  Scroll Down button
				/*-----------------------------------------------------------------------------------*/ 
					if ( $( '.scrollDown' ).length ) {
						$('.scrollDown').click(function(){
							$('html, body').animate({ scrollTop: $('.elementareBigImage, .elementare_slider').outerHeight() }, 1000, 'easeInOutExpo');
							return false;
						});
					}
			}
	});
})(jQuery);