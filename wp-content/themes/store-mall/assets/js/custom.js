jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader = $('#loader');
    var loader_container = $('#preloader');
    var scroll = $(window).scrollTop();  
    var scrollup = $('.backtotop');
    var menu_toggle = $('.menu-toggle');
    var dropdown_toggle = $('.main-navigation button.dropdown-toggle');
    var nav_menu = $('.main-navigation ul.nav-menu');
    var latest_products = $('.latest-products');
    var featured_slider = $('#featured-slider');
    var testimonial_slider = $('#testimonial-slider .regular');
    var logo_slider = $('#logo-slider .regular');
    var masonry_gallery = $('.grid');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    menu_toggle.click(function(){
        nav_menu.slideToggle();
       $('.main-navigation').toggleClass('menu-open');
       $('.menu-overlay').toggleClass('active');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $('#products-navigation button.dropdown-toggle').click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('ul').first().slideToggle();
    });

    $('.main-navigation ul li.search-menu a').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-active');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }
    });

    $(document).click(function (e) {
        var container = $("#masthead");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('#site-navigation').removeClass('menu-open');
            $('#primary-menu').slideUp();
            $('.menu-overlay').removeClass('active');
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }
    });

/*------------------------------------------------
            SLICK SLIDER
------------------------------------------------*/

    featured_slider.slick();

    latest_products.slick({
        responsive: [
            {
                breakpoint: 1200,
                    settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 900,
                    settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 567,
                    settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    logo_slider.slick({
        responsive: [
            {
                breakpoint: 1200,
                    settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 767,
                    settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                    settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    testimonial_slider.slick({
        responsive: [
            {
                breakpoint: 800,
                    settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    
    $('#featured-modern-slider .featured-images-list').slick({
        responsive: [
            {
                breakpoint: 1023,
                    settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 767,
                    settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

if(  $(window).width() > 767 ) {
    var slider_content = $('#featured-modern-slider .slick-slide').length;
   if ( slider_content >= 3 ) {
        var featured_target = $('#featured-modern-slider .slick-slide.slick-current').next().next().data('target');
        $('#featured-modern-slider .slick-slide.slick-current').next().next().addClass( 'active-mode' );
        $('#featured-modern-slider ul.featured-content-list li.' + featured_target ).addClass( 'active-mode' );
    }
    else if ( slider_content == 2 ) {
        var featured_target = $('#featured-modern-slider .slick-slide.slick-current').next().data('target');
        $('#featured-modern-slider .slick-slide.slick-current').next().addClass( 'active-mode' );
        $('#featured-modern-slider ul.featured-content-list li.' + featured_target ).addClass( 'active-mode' );
        $('#featured-modern-slider .slick-slide').click(function() {
            $('#featured-modern-slider .slick-slide').removeClass( 'active-mode' );
            $('#featured-modern-slider ul.featured-content-list li' ).removeClass( 'active-mode' );
            $(this).addClass( 'active-mode' );
            var featured_target = $('#featured-modern-slider .slick-slide.active-mode').data('target');
            $('#featured-modern-slider ul.featured-content-list li.' + featured_target ).addClass( 'active-mode' );
        });
    }
    else {
        var featured_target = $('#featured-modern-slider .slick-slide.slick-current').data('target');
        $('#featured-modern-slider .slick-slide.slick-current').addClass( 'active-mode' );
        $('#featured-modern-slider ul.featured-content-list li.' + featured_target ).addClass( 'active-mode' );
    }

    $("#featured-modern-slider .slick-arrow").click( function (){
        $('#featured-modern-slider .slick-slide').removeClass( 'active-mode' );
    } );

    $("#featured-modern-slider .featured-images-list").on("afterChange", function (){
        $('#featured-modern-slider .slick-slide').removeClass( 'active-mode' );
        $('#featured-modern-slider ul.featured-content-list li' ).removeClass( 'active-mode' );
        if ( slider_content >= 3 ) {
            var featured_target = $('#featured-modern-slider .slick-slide.slick-current').next().next().data('target');
            $('#featured-modern-slider .slick-slide.slick-current').next().next().addClass( 'active-mode' );
            $('#featured-modern-slider ul.featured-content-list li.' + featured_target ).addClass( 'active-mode' );
        }
        else if ( slider_content == 2 ) {
            var featured_target = $('#featured-modern-slider .slick-slide.slick-current').next().data('target');
            $('#featured-modern-slider .slick-slide.slick-current').next().addClass( 'active-mode' );
            $('#featured-modern-slider ul.featured-content-list li.' + featured_target ).addClass( 'active-mode' );
        }
        else {
            var featured_target = $('#featured-modern-slider .slick-slide.slick-current').data('target');
            $('#featured-modern-slider .slick-slide.slick-current').addClass( 'active-mode' );
            $('#featured-modern-slider ul.featured-content-list li.' + featured_target ).addClass( 'active-mode' );
        }
    });
}
    
if(  $(window).width() < 767 ) {
    var featured_target = $('#featured-modern-slider .slick-slide.slick-current').data('target');
    $('#featured-modern-slider .slick-slide.slick-current').addClass( 'active-mode' );
    $('#featured-modern-slider ul.featured-content-list li.' + featured_target ).addClass( 'active-mode' );
    
    $("#featured-modern-slider .featured-images-list").on("afterChange", function (){
        $('#featured-modern-slider .slick-slide').removeClass( 'active-mode' );
        $('#featured-modern-slider ul.featured-content-list li' ).removeClass( 'active-mode' );
        var featured_target = $('#featured-modern-slider .slick-slide.slick-current').data('target');
        $('#featured-modern-slider .slick-slide.slick-current').addClass( 'active-mode' );
        $('#featured-modern-slider ul.featured-content-list li.' + featured_target ).addClass( 'active-mode' );
    });
}

/*------------------------------------------------
            MASONRY GALLERY
------------------------------------------------*/

masonry_gallery.imagesLoaded( function() {
    masonry_gallery.packery({
        itemSelector: '.grid-item'
    });
});

/*------------------------------------------------
            PRETTY PHOTO
------------------------------------------------*/

if ($().prettyPhoto) {
    $("a[data-gal^='prettyPhoto']").prettyPhoto({
        theme: 'dark_square'
    });
}

/*------------------------------------------------
            PRODUCTS FILTERING
------------------------------------------------*/
$('.product-filtering ul li a').click(function(){
    $('.product-filtering ul li').removeClass('active');
    $(this).parent().addClass('active');
});

$('.product-filtering ul li a').click( function(e) {
    e.preventDefault();
    var currentCategory = '.' + $(this).data('slug');
     $('#latest-products-collection .latest-products').slick('slickUnfilter');
     $('#latest-products-collection .latest-products').slick('slickFilter', currentCategory);
});

/*------------------------------------------------
            POSTS MATCHHEIGHT
------------------------------------------------*/

$('.blog-posts-wrapper .entry-container').matchHeight();

$( document.body ).on( 'post-load', function () {
    if ( $( document.body ).has( '.infinite-loader' ) ) {
        $('.infinite-loader').remove();
    }
} );

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});