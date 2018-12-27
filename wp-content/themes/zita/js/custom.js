jQuery(document).ready(function(){
 "use strict";
//-----------------------//
// loader
//-----------------------//
if(!jQuery('body').hasClass('elementor-editor-active')){
jQuery(window).on('load', function(){
setTimeout(removeLoader); //wait for page load PLUS two seconds.
});
function removeLoader(){
    jQuery( ".zita_overlayloader" ).fadeOut(700, function(){
      // fadeOut complete. Remove the loading div
    jQuery(".zita-pre-loader img" ).hide(); //makes page more lightweight
    });  
  }
}
 // close-button-active
        if(jQuery('body').hasClass('mobile-menu-active','mobile-above-menu-active','mobile-bottom-menu-active').length!=''){
            jQuery('body').find('.sider').prepend('<div class="menu-close"><a href="#" class="menu-close-btn"></a></div>');
            jQuery('.menu-close-btn').removeAttr("href");
            //Menu close
            jQuery('.menu-close-btn').click(function(){
            jQuery('body').removeClass('mobile-menu-active');
            jQuery('body').removeClass('mobile-above-menu-active');
            jQuery('body').removeClass('mobile-bottom-menu-active');
            });
        //ToggleBtn above Click
        jQuery('#menu-btn-abv').click(function (e){
           e.preventDefault();
           jQuery('body').addClass('mobile-above-menu-active');
           jQuery('#zita-above-menu').removeClass('hide-menu'); 
           jQuery('.sider.above').removeClass('zita-menu-hide');
           jQuery('.sider.main').addClass('zita-menu-hide');
           jQuery('.sider.bottom').addClass('zita-menu-hide');    
        });
        //ToggleBtn main menu Click
        jQuery('#menu-btn').click(function (e){
           e.preventDefault();
           jQuery('body').addClass('mobile-menu-active');
           jQuery('#zita-menu').removeClass('hide-menu');
           jQuery('.sider.above').addClass('zita-menu-hide');  
           jQuery('.sider.main').removeClass('zita-menu-hide');   
           jQuery('.sider.bottom').addClass('zita-menu-hide');  
        });
        //ToggleBtn bottom menu Click
        jQuery('#menu-btn-btm').click(function (e){
           e.preventDefault();
           jQuery('body').addClass('mobile-menu-active');
           jQuery('#zita-bottom-menu').removeClass('hide-menu');
           jQuery('.sider.bottom').removeClass('zita-menu-hide');  
           jQuery('.sider.main').addClass('zita-menu-hide');
           jQuery('.sider.above').addClass('zita-menu-hide');     
        });
        // default page
        jQuery('#menu-btn').click(function (e){
           e.preventDefault();
           jQuery('body').addClass('mobile-menu-active');
           jQuery('#menu-all-pages').removeClass('hide-menu');    
        });
        }
 // deafult menu
jQuery(document).ready(function(){
             jQuery("#menu-all-pages.zita-menu").zitaResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'fast', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });       
        });
// main-menu-script
jQuery(document).ready(function (){
  if(jQuery("body").hasClass('mhdfull')){
            jQuery(".main-header #zita-menu").zitaResponsiveMenu({
                 resizeWidth:'2400', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
            }); 
          }else{
           jQuery(".main-header #zita-menu").zitaResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
            });
          }     
      });
// above-menu-script
jQuery(document).ready(function (){
             jQuery("#zita-above-menu").zitaResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });      
         });
// bottom-menu-script
jQuery(document).ready(function (){
             jQuery("#zita-bottom-menu").zitaResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });
             
         });
//**********************/
// header top search box
//**********************/
jQuery(".top-header-col1 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".top-header-col1 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".top-header-col2 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".top-header-col2 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".top-header-col3 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".top-header-col3 .searchfrom #searchform").slideToggle(300);
};
});
/********************/
// main header search
/********************/
jQuery(".menu-custom-search .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".menu-custom-search .searchfrom #searchform").slideToggle(300);
};
});
//**********************/
// header bottom search box
//**********************/
jQuery(".bottom-header-col1 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".bottom-header-col1 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".bottom-header-col2 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".bottom-header-col2 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".bottom-header-col3 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".bottom-header-col3 .searchfrom #searchform").slideToggle(300);
};
});
//**********************/
// footer above search box
//**********************/
jQuery(".top-footer-col1 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".top-footer-col1 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".top-footer-col2 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".top-footer-col2 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".top-footer-col3 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".top-footer-col3 .searchfrom #searchform").slideToggle(300);
};
});
//**********************/
// footer bottom search box
//**********************/
jQuery(".bottom-footer-col1 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".bottom-footer-col1 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".bottom-footer-col2 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".bottom-footer-col2 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".bottom-footer-col3 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".bottom-footer-col3 .searchfrom #searchform").slideToggle(300);
};
});
/*------------------------------------------------/*
* masnory
/*------------------------------------------------*/
if( jQuery('.zta-masnory').length > 0 ){
   jQuery(window).load(function(){
   jQuery('.zta-masnory').masonry({
     itemSelector: '.post',
     isFitWidth:false,
     columnWidth: '.post',
     percentPosition: true
    }).imagesLoaded(function(){
    jQuery('.zta-masnory').masonry('reloadItems');
    });
    jQuery(window).resize(function (){
    jQuery('.zta-masnory').masonry('bindResize')
    });
 });
}
/**************************************************/
// Show-hide Scroll to top & move-to-top arrow
/**************************************************/
if(jQuery("#back-to-top").val()=='on'){
  jQuery("body").prepend("<a id='move-to-top' class='animate' href='#'><i class='fa fa-angle-up'></i></a>"); 
  var scrollDes = 'html,body';  
  /*Opera does a strange thing if we use 'html' and 'body' together so my solution is to do the UA sniffing thing*/
  if(navigator.userAgent.match(/opera/i)){
    scrollDes = 'html';
  }
  //show ,hide
  jQuery(window).scroll(function (){
    if(jQuery(this).scrollTop() > 160){
      jQuery('#move-to-top').addClass('filling').removeClass('hiding');
    }else{
      jQuery('#move-to-top').removeClass('filling').addClass('hiding');
    }
  });
  jQuery('#move-to-top').click(function(){
      jQuery("html, body").animate({ scrollTop: 0 }, 600);
      return false;
  });
}
/**************************************************/
// Admin-bar height calculate
/**************************************************/
(function(jQuery){
    'use strict';
    jQuery(document).ready(function() {
        // if adminbar exist (should check for visible?) then add margin to our navbar
        var $wpAdminBar = jQuery('#wpadminbar');
        if ($wpAdminBar.length) {
           jQuery('header.mhdrleftpan,header.mhdrrightpan').css('margin-top',$wpAdminBar.height()+'px');
        }
    });
})(jQuery);
/**************************************************/
//mobile pan class activate
/**************************************************/
jQuery('.pan-icon,#bar-menu-btn').click(function (e){
e.preventDefault();
jQuery('body').toggleClass('mobile-pan-active');
jQuery('body').removeClass('cart-pan-active');
});
/**************************************************/
//mobile pan class activate
/**************************************************/
jQuery('header.mhdrleftpan .cart-contents,header.mhdrrightpan .cart-contents,header.mhdminbarleft .cart-contents,header.mhdminbarright .cart-contents').click(function (e){
e.preventDefault();
jQuery('body').toggleClass('cart-pan-active');
jQuery('body').find('.zita-cart').prepend('<div class="cart-close"><a class="cart-close-btn"></a></div>');
jQuery('.cart-close a').click(function (e){
jQuery('body').removeClass('cart-pan-active');
});
});
jQuery(window).on('resize', function(){
  jQuery('body').removeClass('cart-pan-active');
});
});

/**************************************************/
//Header sticky
/**************************************************/
if(jQuery("#header-scroll-down-hide").val()=='on'){
  var position = jQuery(window).scrollTop(); 
  var $headerBar = jQuery('header').height();
// should start at 0
jQuery(window).scroll(function() {
    var scroll = jQuery(window).scrollTop();
    if(scroll > position || scroll < $headerBar) {
    jQuery("header.zta-above-stick-hdr,header.zta-main-stick-hdr,header.zta-bottom-stick-hdr").removeClass("shrink");
    }else{
    jQuery("header.zta-above-stick-hdr,header.zta-main-stick-hdr,header.zta-bottom-stick-hdr").addClass("shrink");
    }
    position = scroll;
});
}else{
jQuery(document).on("scroll", function(){
var $headerBar = jQuery('header').height();
var $totalheaderBar = $headerBar + 20;
  if(jQuery(document).scrollTop() > $totalheaderBar){
      jQuery("header.zta-above-stick-hdr,header.zta-main-stick-hdr,header.zta-bottom-stick-hdr").addClass("shrink");
    }else{
      jQuery("header.zta-above-stick-hdr,header.zta-main-stick-hdr,header.zta-bottom-stick-hdr").removeClass("shrink");
  } 
});
}
// wp nav menu widget last item
jQuery(document).ready(function(){
jQuery(".widget_nav_menu li.menu-item").last().remove();
});
