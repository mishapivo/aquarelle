jQuery(document).ready(function($) {

    $(".greatwp-nav-secondary .greatwp-secondary-nav-menu").addClass("greatwp-secondary-responsive-menu").before('<div class="greatwp-secondary-responsive-menu-icon"></div>');

    $(".greatwp-secondary-responsive-menu-icon").click(function(){
        $(this).next(".greatwp-nav-secondary .greatwp-secondary-nav-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1112) {
            $(".greatwp-nav-secondary .greatwp-secondary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".greatwp-secondary-responsive-menu > li").removeClass("greatwp-secondary-menu-open");
        }
    });

    $(".greatwp-secondary-responsive-menu > li").click(function(event){
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").slideToggle(function() {
            $(this).parent().toggleClass("greatwp-secondary-menu-open");
        });
        $(this).find(".children:first").slideToggle(function() {
            $(this).parent().toggleClass("greatwp-secondary-menu-open");
        });
    });

    $("div.greatwp-secondary-responsive-menu > ul > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").slideToggle(function() {
            $(this).parent().toggleClass("greatwp-secondary-menu-open");
        });
    });

    if(greatwp_ajax_object.sticky_menu){
    // grab the initial top offset of the navigation 
    var greatwpstickyNavTop = $('.greatwp-primary-menu-container').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var greatwpstickyNav = function(){
        var greatwpscrollTop = $(window).scrollTop(); // our current vertical position from the top
             
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative

        if(greatwp_ajax_object.sticky_menu_mobile){
            if (greatwpscrollTop > greatwpstickyNavTop) {
                $('.greatwp-primary-menu-container').addClass('greatwp-fixed');
            } else {
                $('.greatwp-primary-menu-container').removeClass('greatwp-fixed');
            }
        } else {
            if(window.innerWidth > 1112) {
                if (greatwpscrollTop > greatwpstickyNavTop) {
                    $('.greatwp-primary-menu-container').addClass('greatwp-fixed');
                } else {
                    $('.greatwp-primary-menu-container').removeClass('greatwp-fixed'); 
                }
            }
        }
    };

    greatwpstickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
        greatwpstickyNav();
    });
    }

    $(".greatwp-nav-primary .greatwp-nav-primary-menu").addClass("greatwp-primary-responsive-menu").before('<div class="greatwp-primary-responsive-menu-icon"></div>');

    $(".greatwp-primary-responsive-menu-icon").click(function(){
        $(this).next(".greatwp-nav-primary .greatwp-nav-primary-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1112) {
            $(".greatwp-nav-primary .greatwp-nav-primary-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".greatwp-primary-responsive-menu > li").removeClass("greatwp-primary-menu-open");
        }
    });

    $(".greatwp-primary-responsive-menu > li").click(function(event){
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").slideToggle(function() {
            $(this).parent().toggleClass("greatwp-primary-menu-open");
        });
        $(this).find(".children:first").slideToggle(function() {
            $(this).parent().toggleClass("greatwp-primary-menu-open");
        });
    });

    $("div.greatwp-primary-responsive-menu > ul > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").slideToggle(function() {
            $(this).parent().toggleClass("greatwp-primary-menu-open");
        });
    });

    $(".greatwp-social-icon-search").on('click', function (e) {
        e.preventDefault();
        document.getElementById("greatwp-search-overlay-wrap").style.display = "block";
    });

    $(".greatwp-search-closebtn").on('click', function (e) {
        e.preventDefault();
        document.getElementById("greatwp-search-overlay-wrap").style.display = "none";
    });

    $(".post").fitVids();

    $( 'body' ).prepend( '<div class="greatwp-scroll-top"></div>');
    var scrollButtonEl = $( '.greatwp-scroll-top' );
    scrollButtonEl.hide();

    $( window ).scroll( function () {
        if ( $( window ).scrollTop() < 20 ) {
            $( '.greatwp-scroll-top' ).fadeOut();
        } else {
            $( '.greatwp-scroll-top' ).fadeIn();
        }
    } );

    scrollButtonEl.click( function () {
        $( "html, body" ).animate( { scrollTop: 0 }, 300 );
        return false;
    } );

    if(greatwp_ajax_object.sticky_sidebar){
    $('.greatwp-main-wrapper, .greatwp-sidebar-one-wrapper').theiaStickySidebar({
        containerSelector: ".greatwp-content-wrapper",
        additionalMarginTop: 0,
        additionalMarginBottom: 0,
        minWidth: 890,
    });
    }

});