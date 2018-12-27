/**
 * Theme functions file.
 */
(function($) {
  "use strict";

  $(document).ready(function($){

    var $body = $('body');
 
    
    // Navigation toggle buttons
    $('.nav-toggle').on( 'click', function() {
      $body.toggleClass('nav-open');
    });
    
    
    // Primary Navigation
    var $navMenu = $('.primary-navigation .nav-menu');
    
    $navMenu.find('.menu-item-has-children > a').on( 'click', function(e) {
      e.preventDefault();
      var item = $(this);
      item.next('.sub-menu').slideToggle(250);
    }); 
    
    
  });
})(jQuery);