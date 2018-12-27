jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var scroll = $(window).scrollTop();  
    var scrollup = $('.backtotop');
    var menu_toggle = $('.menu-toggle');
    var secondary_menu_toggle = $('.secondary-menu-toggle');
    var dropdown_toggle = $('button.dropdown-toggle');
    var nav_menu = $('.main-navigation');
    var secondary_nav_menu = $('.secondary-navigation');
    var masonry_gallery = $('.grid');

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"80px"});
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

    $(window).scroll(function() {
        if ($(this).scrollTop() >= 200) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        } 
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
        }
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() >= 400) {
            $('.menu-sticky #masthead').addClass('nav-sticky');
        } 
        else {
            $('.menu-sticky #masthead').removeClass('nav-sticky');
        }
    });

    menu_toggle.click(function(){
        nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('#search.hidden-small').fadeOut();
        $('.menu-overlay').toggleClass('active');
        $('.main-navigation').toggleClass('menu-open');
        $('body').toggleClass('main-navigation-active');

        if( $('body').hasClass('secondary-navigation-active') ) {
            $('body').removeClass('secondary-navigation-active');
            secondary_nav_menu.slideUp();
            $('.menu-overlay').addClass('active');
            $('#navigation-menu .secondary-menu-toggle').removeClass('active');
        }

        if( $('body').hasClass('search-menu-active') ) {
            $('body').removeClass('search-menu-active');
            $('.menu-overlay').addClass('active');
        }
    });

    secondary_menu_toggle.click(function(){
        secondary_nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('#navigation-menu').toggleClass('menu-open');
        $('body').toggleClass('secondary-navigation-active');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

     $('#site-menu .search-menu a').click(function() {
        $(this).parent().toggleClass('active');
        $('#search.hidden-small').fadeToggle();
        nav_menu.slideUp();
        menu_toggle.removeClass('active');
        $('.menu-overlay').toggleClass('active');
     });

    $('.search-menu a').click(function(event) {
        event.preventDefault();
        $('.main-navigation #search').fadeToggle();
        $('.search-menu .search-field').focus();
        $('body').addClass('search-menu-active');

        if( $('body').hasClass('secondary-navigation-active') ) {
            $('body').removeClass('secondary-navigation-active');
            secondary_nav_menu.slideUp();
            $('.menu-overlay').addClass('active');
            $('#navigation-menu .secondary-menu-toggle').removeClass('active');
        }

        if( $('body').hasClass('main-navigation-active') ) {
            $('body').removeClass('main-navigation-active');
            nav_menu.slideUp();
            $('.menu-overlay').addClass('active');
            $('.main-navigation .menu-toggle').removeClass('active');
        }
    });

    $('#search-menu a').click(function(event) {
        event.preventDefault();
        $(this).parent().toggleClass('active');
        $('#social-navigation #search-menu form.search-form').fadeToggle();
        $('#search-menu .search-field').focus();
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.secondary-navigation').slideUp();
            $('.menu-overlay').removeClass('active');
            $('#navigation-menu .secondary-menu-toggle').removeClass('active');
        }
    });

    if( $(window).width() > 1023 ) {
        $(document).click(function (e) {
            var container = $("#masthead, #navigation-menu");
            if (!container.is(e.target) && container.has(e.target).length === 0) {

                // Secondary Navigation
                $('.secondary-navigation').slideUp();
                $('.menu-overlay').removeClass('active');
                $('#navigation-menu .secondary-menu-toggle').removeClass('active');

            }
        });
    }

    if( $(window).width() < 1023 ) {
        $(document).click(function (e) {
            var container = $("#masthead, #navigation-menu");
            if (!container.is(e.target) && container.has(e.target).length === 0) {

                if( $('body').hasClass('secondary-navigation-active') ) {
                    $('body').removeClass('secondary-navigation-active');
                    secondary_nav_menu.slideUp();
                    $('.menu-overlay').removeClass('active');
                    $('#navigation-menu .secondary-menu-toggle').removeClass('active');
                }

                if( $('body').hasClass('main-navigation-active') ) {
                    $('body').removeClass('main-navigation-active');
                    nav_menu.slideUp();
                    $('.menu-overlay').removeClass('active');
                    $('.main-navigation .menu-toggle').removeClass('active');
                    $('.menu-toggle').removeClass('active');
                }

                if( $('body').hasClass('search-menu-active') ) {
                    $('body').removeClass('search-menu-active');
                    $('.menu-overlay').removeClass('active');
                    $('.search-menu #search').fadeOut();
                    $('.search-menu').removeClass('active');
                }
            }
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
                    
    $('#filter-posts ul li a').on('click', function(event) {
        event.preventDefault();

        var selector = $(this).attr('data-filter');
        masonry_gallery.isotope({ filter: selector });
        $('#filter-posts ul li').removeClass('active');
        $(this).parent().addClass('active');
        return false;
    });

    packery = function () {
        masonry_gallery.isotope({
            resizable: true,
            itemSelector: '.grid-item',
            layoutMode : 'packery',
            gutter: 0,
        });
    };
    packery();

    if ( $( document.body ).has( '#infinite-handle' ) ) {
        $('#infinite-handle').insertAfter('#infinite-post-wrap');
    }

    $( document.body ).on( 'post-load', function () {
        masonry_gallery.imagesLoaded( function() {
            masonry_gallery.packery( 'appended', '.grid-item' ).isotope('reloadItems');
            packery( 'reLayout', true );
            if ( $( document.body ).has( '#infinite-handle' ) ) {
                $('#infinite-handle').insertAfter('#infinite-post-wrap');
            }
        } );
        
    } );


/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});
