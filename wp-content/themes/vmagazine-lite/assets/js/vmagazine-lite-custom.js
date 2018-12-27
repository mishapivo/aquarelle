/**
 * vmagazine Custom JS
 *
 * @package AccessPress Themes
 * @subpackage Vmagazine
 * @since 1.0.0
 *
 * Distributed under the MIT license - http://opensource.org/licenses/MIT
 */
jQuery(document).ready(function($) {
  "use strict";

    
var lazyLoad = vmagazine_lite_ajax_script.lazy;
if( lazyLoad == 'enable' ){
 $('.lazy').Lazy();
}
    
/**
* Youtube Video scrollbar
*
*/
$(window).on("load", function () {
  $('.vmagazine-lite-yt-player .vmagazine-lite-video-thumbnails,.sidebar-wrapper').mCustomScrollbar({
    theme: "dark",
    scrollInertia: 500
  });

$('.vmagazine-lite-fullwid-slider .posts-tab-wrap').mCustomScrollbar({
    //theme: "dark"
    scrollInertia: 500

  });

});

/**
* Sticky sidebar
*
*/
 $('#secondary, #secondary-left').theiaStickySidebar({
      // Settings
      additionalMarginTop: 30
    });

/**
* Fixed Header
*
*/
/*position fixed-menu on scroll*/
    
if( $('.site-header').hasClass('header-layout3') ){
  var hdrOuter = '.site-header.header-layout3';
  var fixHandle = '.site-header .site-main-nav-wrapper';    
}else{
  var hdrOuter = '.site-header .vmagazine-lite-nav-wrapper';
  var fixHandle = '.site-header .vmagazine-lite-nav-wrapper';
}

//sticky menuy for mobile device
if ($(window).width() <= 768){

    var hdrOuter = '.vmagazine-lite-mob-outer';
    var fixHandle = '.vmagazine-lite-mob-outer';
}

  var getHeaderHeight = $(hdrOuter).outerHeight();
  var lastScrollPosition = 0;
  
  $(window).scroll(function() {
    var currentScrollPosition = $(window).scrollTop();
    
    if ($(window).scrollTop() > 2.3 * (getHeaderHeight) ) {

      $(fixHandle).addClass('menu-fixed-triggered');

      if (currentScrollPosition > lastScrollPosition) {
      $(fixHandle).removeClass('menu-fixed');
      }else{
        $(fixHandle).addClass('menu-fixed');
      }
      lastScrollPosition = currentScrollPosition;
    } else {
      $(fixHandle).removeClass('menu-fixed');
      $(fixHandle).removeClass('menu-fixed-triggered');
    }
    
  });


 //Fix audio and video size
$(".vmagazine-lite-content").fitVids();
$(".vmagazine-lite-content,.player-inner").fitVids({
    customSelector: "iframe[src^='https://w.soundcloud.com']"
});

/**
* Post Gallery preetyphoto
*
*/
 $(".gallery-items a,.shortcode-gallery .gallery_wrap a,.gallery-item div a").prettyPhoto({
    social_tools: false,
    theme: 'facebook'
 });

/* 
* Full width Slider
*
* 
*/
var sliderCount = $('.vmagazine-lite-fullwid-slider').attr('data-count');
var mobArrow;
if ($(window).width() <= 768){
    mobArrow = true;
}else{
   mobArrow = false;
}

$('.vmagazine-lite-fullwid-slider.block_layout_2 .slick-wrap').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: mobArrow,
  fade: true,
  asNavFor: '.vmagazine-lite-fullwid-slider.block_layout_2 .posts-tab-wrap'
})

$('.vmagazine-lite-fullwid-slider.block_layout_2 .posts-tab-wrap').slick({
  slidesToShow: sliderCount,
  slidesToScroll: 4,
  asNavFor: '.vmagazine-lite-fullwid-slider.block_layout_2 .slick-wrap',
  dots: false,
  arrows: mobArrow,
  centerMode: false,
  centerPadding: 0,
  focusOnSelect: true,
  vertical: true,
  responsive: [
          {
            breakpoint: 1366,
            settings: {
              slidesToShow: sliderCount,
              slidesToScroll: 3,
              infinite: true,
            }
          },
          {
            breakpoint: 966,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        
      ]
});


/**
* Back to top button
*/
$('.scrollup').hide();
var offset = 250;
var duration = 300;
$(window).scroll(function() {
    if ($(this).scrollTop() > offset) {
        $('.scrollup').fadeIn(duration);
    } else {
        $('.scrollup').fadeOut(duration);
    }
});
$('body').on('click', '.scrollup', function () {
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, duration);
    return false;
})


/**
* Ajax search function
*
*/
var ajaxEnable = vmagazine_lite_ajax_script.ajax_search;
if( ajaxEnable == 'show' ){

  $('body').on('focusout', '.site-header input[type="search"],.vmagazine-lite-mobile-search-wrapper input[type="search"]', function () { 
    $('body').on('click', '.site-header:not(.search-content),.vmagazine-lite-mobile-search-wrapper:not(.search-content)', function () { 
          $('.site-header .search-content,.vmagazine-lite-mobile-search-wrapper .search-content').hide();
      });
    });

  $('.site-header input[type="search"],.vmagazine-lite-mobile-search-wrapper input[type="search"]').on('keyup',function(){
    $('.site-header .search-content,.vmagazine-lite-mobile-search-wrapper .search-content').html('');

    var searVal = $(this).val();
    if( searVal.length >= 2 ){
      $('.site-header .search-content,.vmagazine-lite-mobile-search-wrapper .search-content').show();
      var dis = $(this);
      var keyword = $(this).val();
      
      $('.site-header,.vmagazine-lite-mobile-search-wrapper').find('.block-loader').show();
       $.ajax({
                url :vmagazine_lite_ajax_script.ajaxurl,
                data:{
                      action : 'search_function',
                      key:  keyword,
                    },
                type:'post',
                success: function(res){    
                        $('.site-header .search-content,.vmagazine-lite-mobile-search-wrapper .search-content').html(res);
                        $('.site-header .ajax-search-view-all:not(:last),.vmagazine-lite-mobile-search-wrapper .ajax-search-view-all:not(:last)').remove();
                        $('.site-header .block-loader,.vmagazine-lite-mobile-search-wrapper .block-loader').hide();
                    }
            });
    }

  });  

}

/* --------------------------------------------------------------------------------------------------------------------------- */

/*===========================================================================================================*/
/**
  * Tab cat slider
  * 
  * vmagazine-lite-slider-tab-carousel
  */
        $('.tab-cat-slider-carousel').slick({
  
        dots: true,
        speed: 600,
        arrows:true,
        focusOnSelect: true,
        centerMode: true,
        centerPadding: 0,
        slidesToShow: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 500,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
           ]
        });

  /**
  * Category slider
  */
  $('.widget-cat-slider').lightSlider({
    item:1,
    slideMargin:0,
    loop:false,
    controls:true,
    enableDrag:true,
    speed: 700,
    onSliderLoad: function() {
           $('.widget-cat-slider').removeClass( 'cS-hidden' );
       }
  });

  
  /**
   * Featured slider
   */
  $('.featuredSlider').lightSlider({
    item:1,
    slideMargin:0,
    enableDrag:true,
    loop:true,
    pager:true,
    pagerHtml: true,
    auto:true,
    speed: 700,
    pause: 4200,
    onSliderLoad: function() {
           $('.featuredSlider').removeClass( 'cS-hidden' );
           
       }
    });
 

  /*
   * Post format gallery
   */
  $('.meta-gallery').lightSlider({
    adaptiveHeight:true,
    item:1,
    slideMargin:0,
    enableDrag:true,
    loop:true,
    pager:false,
    controls:true,
    prevHtml:'<span class="prev">Prev</span>',
    nextHtml: '<span class="next">Next</span>',
    auto:true,
    speed: 700,
    pause: 4200,
    onSliderLoad: function() {
           $('.meta-gallery').removeClass( 'cS-hidden' );

       }
  });

/** 
* Adds class on search focus 
* 
**/
$('body').on('focus', '.site-header.header-layout1 input[type="search"]', function () { 
  $('.search-form').addClass('focus');
});

$('body').on('focusout', '.site-header.header-layout1 input[type="search"]', function () { 
  $('.search-form').removeClass('focus');
});




/**
* Search focus on mobile 
* 
*/
$('body').on('focus','.vmagazine-lite-mobile-search-wrapper input[type="search"]', function(){
  $('.vmagazine-lite-mobile-search-wrapper .mob-search-form').addClass('focus');
});
$('body').on('focusout','.vmagazine-lite-mobile-search-wrapper input[type="search"]', function(){
  $('.vmagazine-lite-mobile-search-wrapper .mob-search-form').removeClass('focus');
});

  /**
  * Mobile navigation toggles
  * 
  */
  //Mobile Navigation toggle
  $('body').on('click touchstart', '.nav-toggle', function () { 
      $('.mobile-navigation').addClass("on");
      $('body').addClass('mob-menu-enabled');
  });
  
  $('body').on('click touchstart', '.nav-close', function () {
      $('.mobile-navigation,.mob-search-form').removeClass("on");
      $('body').removeClass('mob-menu-enabled');
      $('body').removeClass('mob-search-enabled');
  });
  /* Mobile Search toggle **/
  $('body').on('click touchstart', '.mob-search-icon', function () {
      $('.mob-search-form').addClass("on");
      $('body').addClass('mob-search-enabled');
  });

/**
* Vmagazine Mobile sub-menu
*
*/
$('.vmagazine-lite-mobile-navigation-wrapper .menu-mmnu-container ul li ul').hide();

$('<div class="sub-toggle"></div>').insertBefore('.vmagazine-lite-mobile-navigation-wrapper .menu-item-has-children ul');
$('<div class="sub-toggle-children"></div>').insertBefore('.vmagazine-lite-mobile-navigation-wrapper .page_item_has_children ul');



$('body').on('click touchstart','.vmagazine-lite-mobile-navigation-wrapper .sub-toggle', function()  {
  $(this).next('ul.sub-menu').slideToggle();
  $(this).parent('li').toggleClass('mob-menu-toggle');
});

$('body').on('click touchstart','.vmagazine-lite-mobile-navigation-wrapper .sub-toggle-children',function() {
    $(this).next('ul').slideToggle();
});


/** wow animations **/
var enableAnim = vmagazine_lite_ajax_script.mode;
if( enableAnim == 'enable' ){
  var wow = new WOW();
  wow.init();
}

/*
* block post slider
*/
    
  // function vmagazine_lite_block_post_slider($slider_class){
  //     $('.vmagazine-block-post-slider '+ $slider_class).each(function(){
  //       var Id = $(this).attr('data-slug');
  //       var NewId = Id;
  //       var target = '.'+Id+' .block-post-slider-wrapper';
  //       NewId = $(target).slick({
  //         dots: true,
  //         speed: 600,
  //         arrows: true,
  //         infinite: true,
  //         slidesToShow: 1,
  //         slidesToScroll: 1
         
  //       });
  //     })
  //   } 
  //   $('.vmagazine_lite_block_post_slider').each(function(){
  //       var first_active_tab_content = $(this).find('.block-content-wrapper .block-cat-content:first').attr('data-slug');
  //       if(first_active_tab_content){
  //       vmagazine_lite_block_post_slider('.' + first_active_tab_content);
  //       }
  //   });


  $('.vmagazine-block-post-slider .block-post-slider-wrapper').slick({
          dots: true,
          speed: 600,
          arrows: true,
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1
});
    




  /**
  * News ticker 
  */
  $('#vmagazine-lite-news-ticker').lightSlider({
    loop:true,
    vertical: true,
    pager:false,
    auto:true,
    controls:vmagazine_lite_ajax_script.controls,
    speed: 600,
    pause: 3000,
    enableDrag:false,
    verticalHeight:80,
    onSliderLoad: function() {
           $('.vmagazine-lite-ticker-wrapper').removeClass( 'cS-hidden' );
       }
  });

 
});    