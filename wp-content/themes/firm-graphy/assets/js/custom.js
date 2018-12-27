jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader              = $('#loader');
    var loader_container    = $('#preloader');
    var scroll              = $(window).scrollTop();  
    var scrollup            = $('.backtotop');
    var menu_toggle         = $('.menu-toggle');
    var dropdown_toggle     = $('.main-navigation button.dropdown-toggle');
    var nav_menu            = $('.main-navigation ul.nav-menu');
    var faq                 = $('.faq-group');
    var project_slider      = $('.project-slider');
    var regular             = $('.regular');
    var testimonial_slider  = $('.testimonial-slider');

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

       if( $('.main-navigation .search-menu a').hasClass('search-active') ) {
            $('.main-navigation .search-menu a').removeClass('search-active');
            $('.main-navigation #search-modern').fadeOut();
            $('.menu-overlay').addClass('active');
        }
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $('.main-navigation ul li.search-menu a').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-active');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();

    });



    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('#site-navigation').removeClass('menu-open');
            $('#primary-menu').slideUp();
            $('.menu-overlay').removeClass('active');
            $('.main-navigation .search-submit').removeClass('search-active');
            $('.main-navigation #search-modern').fadeOut();
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.classic-menu .main-navigation #search').fadeOut();
        }
    });

    $(document).click(function (e) {
        var container = $("#masthead");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('#site-navigation').removeClass('menu-open');
            $('#primary-menu').slideUp();
            $('.menu-overlay').removeClass('active');
            $('.main-navigation #search-modern').fadeOut();
            $('.main-navigation .search-menu a').removeClass('search-active');
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.classic-menu .main-navigation #search').fadeOut();
            
        }
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        }
        if ($(this).scrollTop() > 50) {
            $('.menu-sticky #masthead').css({ 'box-shadow' : '0 1px rgba(34, 34, 34, 0.1)' });
        }
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
            $('.menu-sticky #masthead').css({ 'box-shadow' : 'none' });
        }
    });



/*------------------------------------------------
                PROJECT SLIDER   
------------------------------------------------*/

project_slider.slick({
    responsive: [
    {
        breakpoint: 992,
            settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 767,
            settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 567,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }
  ]
});

regular.slick({
    responsive: [
    {
        breakpoint: 767,
            settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 567,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }
  ]
});

testimonial_slider.slick({
    responsive: [
    {
        breakpoint: 992,
            settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 567,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }
  ]
});

/*------------------------------------------------
            MATCH HEIGHT
------------------------------------------------*/

    $('.match-height').matchHeight();   

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});