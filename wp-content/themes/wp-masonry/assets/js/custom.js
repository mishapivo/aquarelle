jQuery(document).ready(function($) {

    if(wp_masonry_ajax_object.sticky_menu){
    // grab the initial top offset of the navigation 
    var wpmasonrystickyNavTop = $('.wp-masonry-primary-menu-container').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var wpmasonrystickyNav = function(){
        var wpmasonryscrollTop = $(window).scrollTop(); // our current vertical position from the top
             
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative
        if(wp_masonry_ajax_object.sticky_menu_mobile){
            if (wpmasonryscrollTop > wpmasonrystickyNavTop) {
                $('.wp-masonry-primary-menu-container').addClass('wp-masonry-fixed');
            } else {
                $('.wp-masonry-primary-menu-container').removeClass('wp-masonry-fixed'); 
            }
        } else {
            
                if(window.innerWidth > 1112) {
                    if (wpmasonryscrollTop > wpmasonrystickyNavTop) {
                        $('.wp-masonry-primary-menu-container').addClass('wp-masonry-fixed');
                    } else {
                        $('.wp-masonry-primary-menu-container').removeClass('wp-masonry-fixed'); 
                    }
                }
            
        }
    };

    wpmasonrystickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
        wpmasonrystickyNav();
    });
    }

    $(".wp-masonry-nav-primary .wp-masonry-nav-primary-menu").addClass("wp-masonry-primary-responsive-menu").before('<div class="wp-masonry-primary-responsive-menu-icon"></div>');

    $(".wp-masonry-primary-responsive-menu-icon").click(function(){
        $(this).next(".wp-masonry-nav-primary .wp-masonry-nav-primary-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1112) {
            $(".wp-masonry-nav-primary .wp-masonry-nav-primary-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".wp-masonry-primary-responsive-menu > li").removeClass("wp-masonry-primary-menu-open");
        }
    });

    $(".wp-masonry-primary-responsive-menu > li").click(function(event){
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").slideToggle(function() {
            $(this).parent().toggleClass("wp-masonry-primary-menu-open");
        });
        $(this).find(".children:first").slideToggle(function() {
            $(this).parent().toggleClass("wp-masonry-primary-menu-open");
        });
    });

    $("div.wp-masonry-primary-responsive-menu > ul > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").slideToggle(function() {
            $(this).parent().toggleClass("wp-masonry-primary-menu-open");
        });
    });

    $(".wp-masonry-social-icon-search").on('click', function (e) {
        e.preventDefault();
        document.getElementById("wp-masonry-search-overlay-wrap").style.display = "block";
    });

    $(".wp-masonry-search-closebtn").on('click', function (e) {
        e.preventDefault();
        document.getElementById("wp-masonry-search-overlay-wrap").style.display = "none";
    });

    $(".post").fitVids();

    $( 'body' ).prepend( '<div class="wp-masonry-scroll-top"></div>');
    var scrollButtonEl = $( '.wp-masonry-scroll-top' );
    scrollButtonEl.hide();

    $( window ).scroll( function () {
        if ( $( window ).scrollTop() < 20 ) {
            $( '.wp-masonry-scroll-top' ).fadeOut();
        } else {
            $( '.wp-masonry-scroll-top' ).fadeIn();
        }
    } );

    scrollButtonEl.click( function () {
        $( "html, body" ).animate( { scrollTop: 0 }, 300 );
        return false;
    } );

    if(wp_masonry_ajax_object.sticky_sidebar){
    $('.wp-masonry-main-wrapper, .wp-masonry-sidebar-one-wrapper').theiaStickySidebar({
        containerSelector: ".wp-masonry-content-wrapper",
        additionalMarginTop: 0,
        additionalMarginBottom: 0,
        minWidth: 890,
    });
    }

    // init Masonry
    var $wp_masonry_grid = $('.wp-masonry-posts').masonry({
      itemSelector: '.wp-masonry-grid-post',
      columnWidth: wp_masonry_ajax_object.columnwidth,
      gutter: wp_masonry_ajax_object.gutter,
      percentPosition: true
    });
    // layout Masonry after each image loads
    $wp_masonry_grid.imagesLoaded().progress( function() {
      $wp_masonry_grid.masonry('layout');
    });

});