(function($) {
    $.fn.menumaker = function(options) {
        var mainnav = $(this),
            settings = $.extend({
                format: "dropdown",
                sticky: false
            }, options);
        return this.each(function() {
            $(this).find(".toggle-button").on('click', function() {
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.slideToggle().removeClass('open');
                } else {
                    mainmenu.slideToggle().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });
            mainnav.find('li ul').parent().addClass('has-sub');
            multiTg = function() {
                mainnav.find(".has-sub").prepend('<span class="submenu-button"></span>');
                mainnav.find('.submenu-button').on('click', function() {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').slideToggle();
                    } else {
                        $(this).siblings('ul').addClass('open').slideToggle();
                    }
                });
            };
            if (settings.format === 'multitoggle') multiTg();
            else mainnav.addClass('dropdown');
            if (settings.sticky === true) mainnav.css('position', 'fixed');
            resizeFix = function() {
                var mediasize = 991;
                if ($(window).width() > mediasize) {
                    mainnav.find('ul').show();
                }
                if ($(window).width() <= mediasize) {
                    mainnav.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);
        });
    };
})(jQuery);
(function($) {
    $(document).ready(function() {
        $("#mainnav").menumaker({
            format: "multitoggle"
        });
    });
})(jQuery);