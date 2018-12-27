/**
 * Bind Js for customizer
 * 
 * @package Blogger_Era
 */
( function( api ) {   

    api.sectionConstructor['upsell'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );


 (function($) {
     wp.customize.bind('ready', function() {
         rangeSlider();
     });

     var rangeSlider = function() {
         var slider = $('.range-slider'),
             range = $('.range-slider__range'),
             value = $('.range-slider__value');

         slider.each(function() {

             value.each(function() {
                 var value = $(this).prev().attr('value');
                var suffix = ($(this).prev().attr('suffix')) ? $(this).prev().attr('suffix') : '';
                 $(this).html(value + suffix);
             });

             range.on('input', function() {
                var suffix = ($(this).attr('suffix')) ? $(this).attr('suffix') : '';
                 $(this).next(value).html(this.value + suffix );
             });
         });
     };
    // Deep linking for menus
    wp.customize.bind('ready', function() {
        jQuery('a.footer-menu-trigger').click(function(e) {
            e.preventDefault();
            wp.customize.section( 'menu_locations' ).focus()
        });
        jQuery('a.offcanvas-trigger').click(function(e) {
            e.preventDefault();
            wp.customize.section( 'sidebar-widgets-offcanvas' ).focus()
        });        
    });      

 })(jQuery);
 
 jQuery(document).ready(function($) {
    $('#blogger-era-img-container li label img').click(function(){    	
        $('#blogger-era-img-container li').each(function(){
            $(this).find('img').removeClass ('blogger-era-radio-img-selected') ;
        });
        $(this).addClass ('blogger-era-radio-img-selected') ;
    }); 
    //Switch Control
    $('body').on('click', '.onoffswitch', function(){
        var $this = $(this);
        if($this.hasClass('switch-on')){
            $(this).removeClass('switch-on');
            $this.next('input').val( false ).trigger('change')
        }else{
            $(this).addClass('switch-on');
            $this.next('input').val( true ).trigger('change')
        }
    });                       
});
