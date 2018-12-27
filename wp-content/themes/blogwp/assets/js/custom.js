jQuery(document).ready(function($) {

    if(blogwp_ajax_object.sticky_menu){
    // grab the initial top offset of the navigation 
    var blogwpstickyNavTop = $('.blogwp-primary-menu-container').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var blogwpstickyNav = function(){
        var blogwpscrollTop = $(window).scrollTop(); // our current vertical position from the top
             
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative

        if(blogwp_ajax_object.sticky_menu_mobile){
            if (blogwpscrollTop > blogwpstickyNavTop) {
                $('.blogwp-primary-menu-container').addClass('blogwp-fixed');
            } else {
                $('.blogwp-primary-menu-container').removeClass('blogwp-fixed');
            }
        } else {
            if(window.innerWidth > 1112) {
                if (blogwpscrollTop > blogwpstickyNavTop) {
                    $('.blogwp-primary-menu-container').addClass('blogwp-fixed');
                } else {
                    $('.blogwp-primary-menu-container').removeClass('blogwp-fixed'); 
                }
            }
        }
    };

    blogwpstickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
        blogwpstickyNav();
    });
    }

    $(".blogwp-nav-primary .blogwp-nav-primary-menu").addClass("blogwp-primary-responsive-menu").before('<div class="blogwp-primary-responsive-menu-icon"></div>');

    $(".blogwp-primary-responsive-menu-icon").click(function(){
        $(this).next(".blogwp-nav-primary .blogwp-nav-primary-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1112) {
            $(".blogwp-nav-primary .blogwp-nav-primary-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".blogwp-primary-responsive-menu > li").removeClass("blogwp-primary-menu-open");
        }
    });

    $(".blogwp-primary-responsive-menu > li").click(function(event){
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").slideToggle(function() {
            $(this).parent().toggleClass("blogwp-primary-menu-open");
        });
        $(this).find(".children:first").slideToggle(function() {
            $(this).parent().toggleClass("blogwp-primary-menu-open");
        });
    });

    $("div.blogwp-primary-responsive-menu > ul > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").slideToggle(function() {
            $(this).parent().toggleClass("blogwp-primary-menu-open");
        });
    });

    $(".blogwp-social-icon-search").on('click', function (e) {
        e.preventDefault();
        document.getElementById("blogwp-search-overlay-wrap").style.display = "block";
    });

    $(".blogwp-search-closebtn").on('click', function (e) {
        e.preventDefault();
        document.getElementById("blogwp-search-overlay-wrap").style.display = "none";
    });

    $(".post").fitVids();

    $( 'body' ).prepend( '<div class="blogwp-scroll-top"></div>');
    var scrollButtonEl = $( '.blogwp-scroll-top' );
    scrollButtonEl.hide();

    $( window ).scroll( function () {
        if ( $( window ).scrollTop() < 20 ) {
            $( '.blogwp-scroll-top' ).fadeOut();
        } else {
            $( '.blogwp-scroll-top' ).fadeIn();
        }
    } );

    scrollButtonEl.click( function () {
        $( "html, body" ).animate( { scrollTop: 0 }, 300 );
        return false;
    } );

    if(blogwp_ajax_object.sticky_sidebar){
    $('.blogwp-main-wrapper, .blogwp-sidebar-one-wrapper').theiaStickySidebar({
        containerSelector: ".blogwp-content-wrapper",
        additionalMarginTop: 0,
        additionalMarginBottom: 0,
        minWidth: 890,
    });
    }

});