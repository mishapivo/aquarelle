/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
jQuery(document).ready(function($){
  $('#cssmenu').prepend('<div id="menu-button">Menu</div>');
  $('#cssmenu #menu-button').on('click', function(){
    var menu = $(this).next('ul');
    if (menu.hasClass('open')) {
      menu.removeClass('open');
    } else {
      menu.addClass('open');
    }
  });
});



jQuery(document).ready(function($){


var $container = $('#masonry').imagesLoaded( function() {
//var $container = $('.masonry');
  $container.imagesLoaded(function(){
    $container.masonry({
    // options
    //columnWidth: '.grid-sizer',
    itemSelector: '.post-item',
    // option that allows for your website to center in the page
    //isFitWidth: true,
    gutter: 0  
    });
  });
});
});
