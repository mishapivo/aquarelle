jQuery(document).ready(function($){
    var at_window = $(window);
    var at_body = $('body');

    function nav_top_fixed(){
        var top_height = $('.top-header').height(),
            top_admin_bar_height = $('#wpadminbar').height(),
            header_enable_top = $('.header-enable-top .navbar');


        header_enable_top.css({
            top: top_height
        });
        if(at_body.hasClass('admin-bar')){
            header_enable_top.css({
                top: top_height+top_admin_bar_height
            });
        }
    }
    function catDetail(){
         $('.cat-details').each(function(){
            $(this).css('bottom', - ( $(this).height()-20) );
            $(this).attr('data-bottom', - ( $(this).height()-20) );
        });
    
    }

    function homeFullScreen() {

        var homeSection = $('#at-banner-slider'),
            windowHeight = at_window.outerHeight();

        if (homeSection.hasClass('home-fullscreen')) {
            $('.home-fullscreen').css('height', windowHeight);
        }
    }
    //make slider full width
    homeFullScreen();

    //window resize
    at_window.resize(function () {
        homeFullScreen();
    });

    at_window.on("load", function() {
        /*loading*/
        $('#wrapper').removeClass('loading');
        var $bubblingG_loader = $('.bubblingG-loader');
        $bubblingG_loader.addClass('removing');
        $bubblingG_loader.remove();

        /*slick*/
        $('.acme-slick-carausel').each(function() {
            var at_featured_img_slider = $(this),
                slidesToShow = parseInt(at_featured_img_slider.data('column')),
                slidesToScroll = parseInt(at_featured_img_slider.data('column')),
                prevArrow =at_featured_img_slider.closest('.widget').find('.at-action-wrapper > .prev'),
                nextArrow =at_featured_img_slider.closest('.widget').find('.at-action-wrapper > .next');

            var slidesToShow480,slidesToShow768;
            if( slidesToShow > 2 ){
             slidesToShow480 = slidesToShow - 2;
            }
            else if( slidesToShow > 1 ){
                slidesToShow480 = slidesToShow - 1;
            }
            else{
                slidesToShow480 = slidesToShow;
            }
            
            at_featured_img_slider.css('visibility', 'visible').slick({
                slidesToShow: slidesToShow,
                slidesToScroll: slidesToScroll,
                autoplay: true,
                adaptiveHeight: true,
                cssEase: 'linear',
                arrows: true,
                prevArrow: prevArrow,
                nextArrow: nextArrow,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: ( slidesToShow > 1 ? slidesToShow - 1 : slidesToShow ),
                            slidesToScroll: ( slidesToScroll > 1 ? slidesToScroll - 1 : slidesToScroll )
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: slidesToShow480,
                            slidesToScroll: slidesToShow480
                        }
                    }
                ]
            });
        });

        $('.featured-slider').show().slick({
            autoplay: true,
            adaptiveHeight: true,
            autoplaySpeed: 3000,
            speed: 700,
            cssEase: 'linear',
            fade: true,
            prevArrow: '<i class="prev fa fa-angle-left"></i>',
            nextArrow: '<i class="next fa fa-angle-right"></i>'
        });
        /*parallax scolling*/
        $('a[href*="\\#"]').click(function(event){
            var at_offset= $.attr(this, 'href');
            var id = at_offset.substring(1, at_offset.length);
            if ( ! document.getElementById( id ) ) {
                return;
            }
            if( $( at_offset ).offset() ){
                $('html, body').animate({
                    scrollTop: $( at_offset ).offset().top-$('.at-navbar').height()
                }, 1000);
                event.preventDefault();
            }

        });
        /*bootstrap sroolpy*/
        $("body").scrollspy({target: ".at-sticky", offset: $('.at-navbar').height()+50 } );

        /*featured slider*/
        $('.acme-gallery').each(function(){
            var $masonry_boxes = $(this);
            var $container = $masonry_boxes.find('.fullwidth-row');
            $container.imagesLoaded( function(){
                $masonry_boxes.fadeIn( 'slow' );
                $container.masonry({
                    itemSelector : '.at-gallery-item'
                });
            });
            /*widget*/
            $masonry_boxes.find('.image-gallery-widget').magnificPopup({
                type: 'image',
                closeBtnInside: false,
                gallery: {
                    enabled: true
                },
                fixedContentPos: false

            });
            $masonry_boxes.find('.single-image-widget').magnificPopup({
                type: 'image',
                closeBtnInside: false,
                fixedContentPos: false
            });
        });

        /*widget slider*/
        $('.acme-widget-carausel').show().slick({
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 700,
            cssEase: 'linear',
            fade: true,
            prevArrow: '<i class="prev fa fa-angle-left"></i>',
            nextArrow: '<i class="next fa fa-angle-right"></i>'
        });

        //Select 2 js init
        if (typeof select2 !== 'undefined' && $.isFunction(select2)){
           $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: -1
            }); 
        }

    });

    function stickyMenu() {

        var scrollTop = at_window.scrollTop();
        if ( scrollTop > 250 ) {
            $('.travel-way-sticky').addClass('at-sticky');
            $('.sm-up-container').show();
        }
        else {
            $('.travel-way-sticky').removeClass('at-sticky');
            $('.sm-up-container').hide();
        }
    }
    //What happen on window scroll
    stickyMenu();
    at_window.on("scroll", function (e) {
        setTimeout(function () {
            stickyMenu();
        }, 300)
    });
    
    /*schedule tab*/
    function at_site_origin_grid() {
        $('.panel-grid').each(function(){
            var count = $(this).children('.panel-grid-cell').length;
            if( count < 1 ){
                count = $(this).children('.panel-grid').length;
            }
            if( count > 1 ){
                $(this).addClass('at-grid-full-width');
            }
        });
    }
    catDetail();
    nav_top_fixed();
    at_site_origin_grid();

    at_window.on("resize", function() {
        nav_top_fixed();
        catDetail();
    })

});

/*animation with wow*/
if(typeof WOW !== 'undefined'){
    eb_wow = new WOW({
            boxClass: 'init-animate'
    }
    );
    eb_wow.init();
}