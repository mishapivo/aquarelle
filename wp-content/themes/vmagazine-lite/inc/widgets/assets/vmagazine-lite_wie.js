jQuery(document).ready(function ($) {
      "use strict";

    /*
    * Widget layouts click funciton
    */
    $('body').on('click','.widget-layouts li', function()  {
        $('.widget-layouts li').each(function(){
            $(this).find('.img-icon').removeClass ('img-selected');
            $(this).find('img').removeClass ('current-img-selected');
        });
        $(this).find('.img-icon').addClass('img-selected');
        $(this).find('img').addClass('current-img-selected');
    });
    
});  