jQuery(document).ready(function($) {
  //For RTL
  var RTL = false;
  if( $('html').attr('dir') == 'rtl' ) {
  RTL = true;
  }
  //Slider
  jQuery('.banner-list').slick({
    autoplay: true,
    infinite: true,
    speed: 1000,
    cssEase: 'linear',
    fade: true,
    adaptiveHeight: true,
    rtl: RTL,
    rows: 0,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });
  
});