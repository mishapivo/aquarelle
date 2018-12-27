jQuery( function ( $ ) {
	'use strict';

	var clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click';
	var $body = $( 'body' );
	var $postMasonry = $( '.masonry-posts' );
	var isRTL = $body.hasClass( 'rtl' );

	var initPostsMasonry = function () {
		$postMasonry.imagesLoaded( function () {
			$postMasonry.masonry( {
				itemSelector: '.masonry-posts article',
				columnWidth : '.masonry-posts article'
			} );
		} );
	};

	var ajaxLoadPosts = function () {
		var $button = $( '.digimag-ajax-more-button' );
		$button.on( clickEvent, function () {
			var $this = $( this );
			var $icon = $this.find( '.icofont' );
			var currentPage = $( this ).attr( 'data-page' );
			var postNumber = $this.attr( 'data-number' );
			var data_archive_type = $this.attr( 'data-archive-type' );
			var data_archive_value = $this.attr( 'data-archive-value' );
			var noPost = $this.attr( 'data-message' );

			$icon.addClass( 'icofont-rotate' );
			$.post( {
				url    : digimagAjax.ajaxUrl,
				data   : {
					action            : 'digimag_lite_load_more',
					page              : currentPage,
					postNumber        : postNumber,
					data_archive_type : data_archive_type,
					data_archive_value: data_archive_value,
					nonce             : digimagAjax.nonce
				},
				success: function ( response ) {
					currentPage ++;
					if ( response ) {
						$icon.removeClass( 'icofont-rotate' );
						$this.attr( 'data-page', currentPage );
						var $addedPosts = $( response );
						$postMasonry.append( $addedPosts ).imagesLoaded( function () {
							$postMasonry.masonry( 'appended', $addedPosts );
						} );
					} else {
						$this.html( noPost ).attr( 'disable', true ).addClass( 'is-disable' );
					}
				}
			} );
		} );
	};

	var displaySliders = function () {
		$( '.is-hidden' ).removeClass( 'is-hidden' );
	};

	function initRotateTrending() {
		$( '.js-trending-rotate' ).slick( {
			autoplay      : true,
			prevArrow     : '',
			nextArrow     : '<button class="slick-next"><i class="icofont icofont-arrow-right"></i></button>',
			adaptiveHeight: true
		} );
	}

	var initFeaturedSlider = function () {
		$( '.digimag-featured-slider' ).find( '.featured-container' ).slick( {
			slidesToShow  : 4,
			slidesToScroll: 1,
			arrows: false,
			rtl: isRTL,
			responsive    : [
				{
					breakpoint: 992,
					settings  : {
						slidesToShow: 3
					}
				},
				{
					breakpoint: 768,
					settings  : {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 576,
					settings  : {
						slidesToShow: 1
					}
				}
			]
		} );
	};

	var initVideoSlider = function () {
		var $videoPosts = $( '.video-posts__items' );
		var $next = $( '.navigation__button .slick-next' );
		var $prev = $( '.navigation__button .slick-prev' );
		var slidesToShow = 4;
		var slideNumber = $videoPosts.children().length;
		if ( slideNumber < 4 ) {
			$videoPosts.parent().addClass( 'no-slick' );
			return;
		}
		// Enable slider if number of posts >= 4
		if ( slideNumber >= 4 && slidesToShow > (
				slideNumber - 1
			) ) {
			slidesToShow = slideNumber - 1;
		}
		$videoPosts.slick( {
			slidesToShow  : slidesToShow,
			slidesToScroll: 1,
			rtl: isRTL,
			prevArrow     : $prev,
			nextArrow     : $next,
			responsive    : [
				{
					breakpoint: 992,
					settings  : {
						slidesToShow: 3
					}
				},
				{
					breakpoint: 768,
					settings  : {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 576,
					settings  : {
						slidesToShow: 1
					}
				}
			]
		} );
	};

	var toggleSlideOutSidebar = function () {
		var $menuToggle = $( '.menu-toggle' );
		$menuToggle.on( clickEvent, function ( event ) {
			event.stopPropagation();
			$( this ).attr( 'aria-hidden', false );
			$body.toggleClass( 'slideout-sidebar-open' );
		} );
		$( '.site, .slideout-close-btn' ).on( clickEvent, function () {
			$menuToggle.attr( 'aria-hidden', false );
			$body.removeClass( 'slideout-sidebar-open' );
		} );
	};

	var dropdownMenu = function () {
		var $dropdownToggle = $( '<span class="dropdownToggle"><i class="icofont icofont-caret-down"></i></span>' );
		$( '.slideout-sidebar' ).find( '.primary-menu' ).find( '.menu-item-has-children > a' ).after( $dropdownToggle );

		$( '.dropdownToggle' ).on( 'click', function ( e ) {
			$( this ).next( 'ul' ).slideToggle();
			e.stopPropagation();
		} );
	};

	/**
	 * Resize videos to fit the container
	 */
	var responsiveVideo = function () {
		$( window ).on( 'resize', function () {
			$( '.hentry iframe, .hentry object, .hentry video, .widget-content iframe, .widget-content object, .widget-content iframe' ).each( function () {
				var $video = $( this ),
					$container = $video.parent(),
					containerWidth = $container.width(),
					$post = $video.closest( 'article' );

				if ( ! $video.data( 'origwidth' ) ) {
					$video.data( 'origwidth', $video.attr( 'width' ) );
					$video.data( 'origheight', $video.attr( 'height' ) );
				}
				var ratio = containerWidth / $video.data( 'origwidth' );
				$video.css( 'width', containerWidth + 'px' );

				// Only resize height for non-audio post format.
				if ( ! $post.hasClass( 'format-audio' ) ) {
					$video.css( 'height', $video.data( 'origheight' ) * ratio + 'px' );
				}
			} );
		} );
	};

	var $marquee = $( '.js-trending-slide' );
	var speed = parseInt( $marquee.attr( 'data-speed' ) );
	var $current;

	var handleTrendingAnimation = function ( currentMargin ) {
		currentMargin = currentMargin || 0;
		$current = $( this );

		var firstItemWidth = $current.outerWidth();
		if ( isRTL ) {
			$current.animate( {
				'margin-right': - firstItemWidth
			}, speed * (
				firstItemWidth + currentMargin
			), 'linear', function () {
				var $cloneItem = $current.clone();
				$cloneItem.css( 'margin-right', '0' );
				$marquee.append( $cloneItem );

				$current.remove();
				handleTrendingAnimation.call( $marquee.children().eq( 0 ) ); // set new first item, not $current, $current is remove();
			} );
		} else {
			$current.animate( {
				'margin-left': - firstItemWidth
			}, speed * (
				firstItemWidth + currentMargin
			), 'linear', function () {
				var $cloneItem = $current.clone();
				$cloneItem.css( 'margin-left', '0' );
				$marquee.append( $cloneItem );

				$current.remove();
				handleTrendingAnimation.call( $marquee.children().eq( 0 ) ); // set new first item, not $current, $current is remove();
			} );
		}
	};

	var initTrendingSlide = function () {
		handleTrendingAnimation.call( $marquee.children().eq( 0 ) );

		$marquee.hover( function () {
			$current.clearQueue().stop();
		}, function () {
			if ( isRTL ) {
				var currentMargin = $current.css( 'margin-right' ).replace( 'px', '' );
			} else {
				var currentMargin = $current.css( 'margin-left' ).replace( 'px', '' );
			}
			handleTrendingAnimation.call( $current, parseInt( currentMargin ) );
		} );
	};

	var shuffleTrendingPosts = function () {
		$( '.trending-shuffle' ).on( clickEvent, function () {
			var $parent = $( this ).siblings( '.trending-items-container' ).find( '.js-trending-slide' );
			var $children = $parent.children();
			$children.eq( 0 ).stop().removeAttr( 'style' );
			while ( $children.length ) {
				$parent.append( $children.splice( Math.floor( Math.random() * $children.length ), 1 ) );
			}
			handleTrendingAnimation.call( $marquee.children().eq( 0 ) );
		} );
	};

	initPostsMasonry();
	ajaxLoadPosts();
	shuffleTrendingPosts();
	initTrendingSlide();
	if ( $().slick ) {
		displaySliders();
		initFeaturedSlider();
		initRotateTrending();
		initVideoSlider();
	}
	toggleSlideOutSidebar();
	dropdownMenu();
	responsiveVideo();
} );
