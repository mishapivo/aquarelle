( function( $ ) {
$(document).ready(function() {
  var menuVisible = false;
  $('.menu_bar_top button').click(function() {
    if (menuVisible) {
      $('.menu').css({'left':'-100%'});
      menuVisible = false;
      return;
    }
    $('.menu').css({'left':'0%'});
    menuVisible = true;
  });
  $('.menu').click(function() {
    $(this).css({'left':'-100%'});
    menuVisible = false;
  });
});
} )( jQuery );