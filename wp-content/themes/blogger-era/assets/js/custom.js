var $ = jQuery;

$( document ).ready(function() {

// Mean Menu 
jQuery('.main-navigation').meanmenu({
  meanMenuContainer: '.menu-holder',
  meanScreenWidth:"767",
  meanRevealPosition: "center",
  meanMenuOpen:'<i class="fas fa-angle-down"></i>',
});

//sticky sidebar
var main_body_ref = $("body");
if( main_body_ref.hasClass( 'sticky-sidebar' ) ){
    $( '.content-area, .widget-area' ).theiaStickySidebar();
}  

// Featured Sldier
$('.feature-slider').owlCarousel({
  loop: true,
  autoplay: true,
  autoplayHoverPause:false,
  nav:true,
  lazyLoad:true,
  dots:false,
  responsive:{
    0:{
      items:1
    },
    600:{
      items:1
    },
    1000:{
      items:1
    }
  }
});

$('.offcanvas-toggle').on('click', function() {
  $('body').toggleClass('offcanvas-expanded');
});

 /* back-to-top button*/

    $('.back-to-top').hide();
    $('.back-to-top').on("click",function(e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, 'slow');
    });


    $(window).scroll(function(){
      var scrollheight =400;
      if( $(window).scrollTop() > scrollheight ) {
        $('.back-to-top').fadeIn();
      }
      else {
        $('.back-to-top').fadeOut();
      }
    });

});

/* search toggle */
$('body').click(function(evt){
  if(!( $(evt.target).closest('.search-area').length || $(evt.target).hasClass('toggle-search-icon') ) ){
    if ($(".toggle-search-icon").hasClass("search-active")){
    $(".toggle-search-icon").removeClass("search-active");
    $(".search-box").slideUp("slow");
    }
  }
});
  $(".toggle-search-icon").click(function(){
  $(".search-box").toggle("slow");
  if ( !$(".toggle-search-icon").hasClass("search-active")){
  $(".toggle-search-icon").addClass("search-active");

  }
  else{
  $(".toggle-search-icon").removeClass("search-active");
  }

});