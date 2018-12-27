/*jslint es5 : true */
/*jslint browser: true*/
/*global $, jQuery*/




var isMobile = {
    Android: function () {
        'use strict';
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function () {
        'use strict';
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function () {
        'use strict';
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function () {
        'use strict';
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function () {
        'use strict';
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function () {
        'use strict';
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};


// Add touch class to html in mobile


if (!isMobile.any()) {
    jQuery("html").addClass("sierra-no-mobile");
} else {
    jQuery("html").addClass("sierra-mobile");
}



// Mobile-Menu & Drop Menu


jQuery(document).ready(function ($) {
  'use strict';
	var search_ul = $(".search-mobile").html();
    $(".search-mobile").empty();
    $(".mobile-menu  > .container > .menu").append(search_ul);
    $("<em class='drop-menu'></em>").insertBefore(".mobile-menu .sub-menu");
    $(".sierra-menu #burger-icon").click(function () {
        $(this).add(".mobile-menu .menu").toggleClass('open');
        $('.sierra-header').toggleClass('mobile');
        $('.sierra-header').toggleClass('header-scroll-top');
    });
    $(".drop-menu").click(function () {
        $(this).toggleClass('open');
        $(this).next().slideToggle("fast");
    });
});




//Search and Menu



jQuery(document).ready(function ($) {
	'use strict';
    $('a[href="#sierra-search"]').on('click', function (event) {
        event.preventDefault();
        $("#sierra-search").addClass('open');
        $(".search-field").addClass('animated fadeIn');
        $(".search-field").removeClass('fadeOut');
        $("#search-button").stop().animate({
            'opacity': '0'
        }, 300);
        $("#sierra-search > .search-field > form > input[type='search']").focus();
    });

    $("#sierra-search, #sierra-search button.close").on('click keyup', function (event) {
        if (event.target === this || event.target.className === 'close' || event.keyCode === 27) {

            $(".search-field").removeClass('fadeIn');
            $(".search-field").addClass('fadeOut');
            $(this).removeClass('open');
            $("#search-button").stop().animate({
                'opacity': '1'
            }, 300);
        }
    });
});



// WP Sierra Lightbox



function sierralightboxInit() {
    'use strict';
    jQuery(document).ready(function ($) {
        $('.gallery-item a').has('img').addClass('image-lightbox');
        $('.single-post-area-info a').has('img').addClass('image-lightbox');
        $('.gallery-item, .single-post-area-info').lightGallery({
            download: false,
            selector: '.image-lightbox',
            counter: false,
            videoMaxWidth: '1170px',
            youtubePlayerParams: {
                rel: 0,
            },
        });

    });
}
sierralightboxInit();



jQuery(document).ready(function ($) {
    'use strict';
	$('.menu a[href*="#"]:not([href="#"]), .btn[href*="#"]:not([href="#"]), .b-btn[href*="#"]:not([href="#"]), .button[href*="#"]:not([href="#"]), body a[href*="#comments"]:not([href="#"]), body a[href*="#respond"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {

                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);

                return false;
            }
        }
    });
});



// Masonry Layout



jQuery(document).ready(function ($) {
  'use strict';
  if ($('.masonry-container')[0]) {
    $(window).on("load", function () {
      var container = document.querySelector('.masonry-container');
      var msnry = new Masonry( container, {
        itemSelector: '.item',
        columnWidth: $('.masonry-container').find('.item')[1],
        horizontalOrder: true,
      });
    });
  }
});



//Header



(function ($) {
	'use strict';
    $(window).scroll(function () {
        if ($(window).scrollTop() > 1) {
            $(".sierra-header.sierra-header-transparent.top.sierra-sticky").removeClass("top", 3000, "easeIn");
            $(".sierra-header.sierra-header-transparent.top.header-scroll-top").removeClass("top", 3000, "easeIn");
            $(".sierra-header.resize-header").addClass("on", 3000, "easeIn");
            $('.sierra-header.sierra-sticky').addClass("on", 3000, "easeIn");

        } else {
			$(".sierra-header.sierra-header-transparent.sierra-sticky").addClass("top", 3000, "easeIn");
            $(".sierra-header.sierra-header-transparent.header-scroll-top").addClass("top", 3000, "easeIn");
            $(".sierra-header.resize-header").removeClass("on", 3000, "easeIn");
            $('.sierra-header.sierra-sticky').removeClass("on", 3000, "easeIn");
        }
    });

}(jQuery));




(function ($) {
	'use strict';
	var lastScrollTop = 0, delta = $(".sierra-header.header-scroll-top").attr('data-scroll-up');
    $(window).scroll(function (event) {
        var st = $(this).scrollTop();

        if (st > lastScrollTop) {
       // downscroll code
          if (Math.abs(lastScrollTop - st) <= delta) {
            return;
          }
          $(".sierra-header.header-scroll-top").css('margin-top', '-150px');
        } else {
      // upscroll code
            $(".sierra-header.header-scroll-top").css('margin-top', '0px');
        }
        lastScrollTop = st;
    });
}(jQuery));
