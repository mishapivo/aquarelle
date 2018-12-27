jQuery(document).ready(function($){

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

$('#loader').fadeOut();
$('#loader-container').fadeOut();

/*------------------------------------------------
                END PRELOADER
------------------------------------------------*/

/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/

 $(window).scroll(function(){
    if ($(this).scrollTop() > 1) {
    $('.backtotop').fadeIn();
    } else {
    $('.backtotop').fadeOut();
    }
    });
    $('.backtotop').click(function(){
    $('html, body').animate({scrollTop: '0px'}, 800);
    return false;
});

/*------------------------------------------------
                END BACK TO TOP
------------------------------------------------*/

/*------------------------------------------------
                SIDR MENU
------------------------------------------------*/

$('#sidr-left-top-button').sidr({
    name: 'sidr-left-top',
    timing: 'ease-in-out',
    speed: 500,
    side: 'left',
    source: '.left'
});

/*------------------------------------------------
                END SIDR MENU
------------------------------------------------*/

/*------------------------------------------------
                MENU ACTIVE AND STICKY
------------------------------------------------*/

$('.main-navigation ul li').click(function(){
    $('.main-navigation ul li').removeClass('current-menu-item');
    $(this).addClass('current-menu-item');
});

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();  
    if (scroll > 190) {
        $(".site-header.make-sticky").addClass("is-sticky");
    }
    else {
         $(".site-header.make-sticky").removeClass("is-sticky");
    }
});

$('.topbar-toggle').click(function(){
    $('#top-bar').toggleClass('open-topbar');
});

/*------------------------------------------------
                END MENU ACTIVE
------------------------------------------------*/

$('#popular-articles .regular').slick({
    responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$(".widget_post_slider .regular").slick({});

$('#latest-news .regular').slick({
});

$('.product-slider .regular').slick({
});

$('.widget_topcolleges_slider .regular').slick({
});

$('.widget_abroad_study_steps .regular').not('.slick-initialized').slick({
});

$('.widget_abroad_study_steps .slick-next').insertAfter(".widget_abroad_study_steps .slick-dots");

/*------------------------------------------------
                TABS
------------------------------------------------*/
$('#popular-articles ul.tabs li').click(function() {

    var tab_id = $(this).attr('data-tab');

    $('#popular-articles ul.tabs li').removeClass('active');
    $('#popular-articles .tab-content').removeClass('active');
    $('#popular-articles .tab-content').fadeOut();
    $(this).addClass('active');
    $("#"+tab_id).fadeIn();

    $('#popular-articles .regular').slick('setPosition');

});

$('#trending-courses ul.tabs li').click(function() {
    var tab_id = $(this).attr('data-tab');

    $('#trending-courses ul.tabs li').removeClass('active');
    $('#trending-courses .tab-content').removeClass('active');
    $('#trending-courses .tab-content').fadeOut();
    $(this).addClass('active');
    $("#"+tab_id).fadeIn();
});

$('#latest-news ul.tabs li').click(function() {
    var tab_id = $(this).attr('data-tab');

    $('#latest-news ul.tabs li').removeClass('active');
    $('#latest-news .tab-content').fadeOut();

    $(this).addClass('active');
    $("#"+tab_id).fadeIn();

    $('#latest-news .regular').slick('setPosition');
});

$('#about-college ul.tabs li').click(function() {
    var tab_id = $(this).attr('data-tab');

    $('#about-college ul.tabs li').removeClass('active');
    $('#about-college .tab-content').fadeOut();

    $(this).addClass('active');
    $("#"+tab_id).fadeIn();
});

$('#study-abroad ul.tabs li').click(function() {
    var tab_id = $(this).attr('data-tab');

    $('#study-abroad ul.tabs li').removeClass('active');
    $('#study-abroad .tab-content').fadeOut();

    $(this).addClass('active');
    $("#"+tab_id).fadeIn();

    $('.widget_post_slider .regular').slick('setPosition');
});

$('.woocommerce-tabs ul.tabs li').click(function() {
    var tab_id = $(this).attr('data-tab');

    $('.woocommerce-tabs ul.tabs li').removeClass('active');
    $('.woocommerce-tabs .tab-content').fadeOut();

    $(this).addClass('active');
    $("#"+tab_id).fadeIn();
});

/*------------------------------------------------
                END TABS
------------------------------------------------*/

/*------------------------------------------------
                SLIDE TOGGLE
------------------------------------------------*/
$("button.slide-down").click(function(){
    $(".widget_travel_resources ul").slideToggle("slow");
    $(".widget_travel_resources").toggleClass("active");
});

/*------------------------------------------------
                END SLIDE TOGGLE
------------------------------------------------*/


/*------------------------------------------------
                MAGNIFIC POPUP
------------------------------------------------*/

$('.gallery-popup').magnificPopup( {
    delegate:'.popup', type:'image', tLoading:'Loading image #%curr%...', 
    gallery: {
        enabled: true, navigateByImgClick: true, preload: [0, 1]
    }
    , image: {
        tError:'<a href="%url%">The image #%curr%</a> could not be loaded.', titleSrc:function(item) {
            return item.el.attr('title');
        }
    }
    , zoom: {
        enabled:true, duration:400, opener:function(element) {
            return element.find('img');
        }
    }
});

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});
