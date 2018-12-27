jQuery(document).ready(function($) {

    var rtl, winWidth;

    winWidth = $(window).width();
    
    if( the_conference_data.rtl == '1' ){
        rtl = true;
    }else{
        rtl = false;
    }
    
    //Header Search form show/hide
    $('.site-header .nav-holder .form-holder').prepend('<div class="btn-close-form"><span></span></div>');

    $('.site-header .form-section').click(function(event) {
        event.stopPropagation();
    });
    $("#btn-search").click(function() {
        $(".site-header .form-holder").show("fast");
    });

    $('.btn-close-form').click(function(){
        $('.site-header .nav-holder .form-holder').hide("fast");
    });

    /**
     *
     * Custom js from theme
     *
     */ 
    new WOW().init();

    $('.scroll-down').click(function(){
        $('html, body').animate({
            scrollTop: $(".scroll-down").parent('.item').parents('.site-banner').next().offset().top
        }, 800);
    });

    //append responsive button
    if($(window).width() <= 992) {
        $('.site-header .container').append('<button class="toggle-btn"><span class="bar"></span><span class="bar"></span><span class="bar"></span></button>');
        $('.nav-wrap').insertBefore('.site');
        $('.site-header button.toggle-btn').on('click', function(){
            $('body').addClass('nav-toggled');
        });

        $('.main-navigation .toggle-button').on('click', function(){
            $('body').removeClass('nav-toggled');
        });

        $('.main-navigation li.menu-item-has-children').prepend('<span class="submenu-toggle"><i class="fa fa-angle-down"></i></span>');
        $('.menu-item-has-children .submenu-toggle').on('click', function(){
            $(this).toggleClass('active');
            $(this).siblings('ul').slideToggle();
        });
    }

    //wrap widget title content with span
    $('#secondary .widget-title, .site-footer .widget-title').wrapInner('<span class="title-wrap"></span>');

    //calculate header height
    var headerHeight = $('header.site-header').outerHeight();
    $('header.page-header, body.home:not(.hasbanner) .site').css('padding-top', headerHeight);
    $('.site-header + .site-banner .banner-caption').css('padding-top', headerHeight);


    // Event Timer
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    //banner countdown
    if ( ! ( the_conference_data.banner_event_timer === undefined || the_conference_data.banner_event_timer.length == 0 ) ) {
        var year_diff  = the_conference_data.banner_event_timer['y'];
        var month_diff = the_conference_data.banner_event_timer['m'];
        var day_diff   = the_conference_data.banner_event_timer['d'];

        var total_diff = 0;
        if( year_diff > 0 ){
            total_diff += year_diff*365;
        }
        if( month_diff > 0 ){
            total_diff += month_diff*30; 
        }
        if( day_diff > 0 ){
            total_diff += day_diff;
        }

        var banner_deadline = new Date(Date.parse(new Date()) + total_diff * 24 * 60 * 60 * 1000);
        initializeClock('bannerClock', banner_deadline);
    }
    
    //custom scroll bar
    if( $('.widget_rrtc_description_widget').length ){
        $('.description').each(function(){ 
            var ps = new PerfectScrollbar($(this)[0]); 
        });
    }
});