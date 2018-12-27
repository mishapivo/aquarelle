jQuery(document).ready(function($) {

  jQuery('.main-navigation .menu-toggle').click(function() {
    jQuery('.main-navigation ul.nav-menu').slideToggle();
  });

  //responsive sub menu toggle

  jQuery('.menu-item-has-children > a, page_item_has_children > a').after('<button class="dropdown-toggle" aria-expanded="false"> <i class="fa fa-chevron-down"></i> </button>');

  jQuery('.main-navigation button.dropdown-toggle').click(function() {
    jQuery(this).toggleClass('active');
    jQuery(this).parent().find('.sub-menu').first().slideToggle();
  });

  //mobile sub menu
  jQuery('.dropdown-toggle').on("click", function(e) {
    e.preventDefault();
    jQuery(this).attr('aria-expanded', function(index, attr) {
      return attr == 'true' ? 'false' : 'true';
    });
  });

  //Touch on focus
  jQuery("body").click(function(){
    jQuery("#primary-menu li").removeClass("focus");
  });
  
  //Address menu
  jQuery('.address-book-navigation .address-book-toggle').click(function() {
    jQuery('.address-book-navigation ul.address-book-content').slideToggle();
  });
  
  //sticky sidebar
  jQuery('.widget-area')
    .theiaStickySidebar({
      additionalMarginTop: 30
    });

  //Toggle header search
  jQuery('.search-toggle').addClass('close');

  //toggle close/open on click of toggle
  jQuery('.search-toggle').click(function(e) {
    if (jQuery(this).hasClass('close')) {
      jQuery(this).removeClass('close').addClass('open');
      jQuery('.search-toggle, .search-container').addClass('open');
    }
    else {
      jQuery(this).removeClass('open').addClass('close');
      jQuery('.search-toggle, .search-container').removeClass('open');
    }
  });

  // close when click off of container
  jQuery(document).on('click touchstart', function (e){
    if (!jQuery(e.target).is('.search-toggle, .search-toggle *, .search-container, .search-container *')) {
      jQuery('.search-toggle, .search-container').removeClass('open');
      jQuery('.search-toggle').addClass('close');
    }
  });

   // Top Panel Toggle
  $(document).ready(function () {
      $(document).click(function () {
          $('.top-panel').slideUp();
          $('.top-panel-toggle').removeClass('show-panel');
      });
      $('.top-panel-toggle').click(function (e) {
          e.stopPropagation();
          $('.top-panel').slideToggle();
          $('.top-panel-toggle').toggleClass('show-panel');
      });
      $('.top-panel, .top-panel-toggle').click(function (e) {
          e.stopPropagation();
      });
  });

  /*Scroll to Top*/
  jQuery(document).ready(function() {
    // Start Scroll To Top
    var btn = jQuery('.back-to-top');
    jQuery(window).scroll(function() {
      if ($(this).scrollTop() >= 300) {
        btn.show();
        btn.addClass('active');
      } else {
        btn.hide();
        btn.removeClass('active');
      }
    });

    btn.click(function() {
      jQuery('html, body').animate({
        scrollTop: 0
      }, 600);
      return false;
    });
    // End Scroll To Top
  });



});