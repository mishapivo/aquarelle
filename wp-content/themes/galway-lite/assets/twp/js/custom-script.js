(function (e) {
    "use strict";
    var n = window.TWP_JS || {};
    n.stickyMenu = function () {
        e(window).scrollTop() > 350 ? e("#masthead").addClass("nav-affix") : e("#masthead").removeClass("nav-affix")
    },
        n.mobileMenu = {
            init: function () {
                this.toggleMenu(), this.menuMobile(), this.menuArrow()
            },
            toggleMenu: function () {
                e('#masthead').on('click', '.toggle-menu', function (event) {
                    var ethis = e('.main-navigation .menu .menu-mobile');
                    if (ethis.css('display') == 'block') {
                        ethis.slideUp('300');
                        e("#masthead").removeClass('mmenu-active');
                    } else {
                        ethis.slideDown('300');
                        e("#masthead").addClass('mmenu-active');
                    }
                    e('.ham').toggleClass('exit');
                });
                e('#masthead .main-navigation ').on('click', '.menu-mobile a i', function (event) {
                    event.preventDefault();
                    var ethis = e(this),
                        eparent = ethis.closest('li'),
                        esub_menu = eparent.find('> .sub-menu');
                    if (esub_menu.css('display') == 'none') {
                        esub_menu.slideDown('300');
                        ethis.addClass('active');
                    } else {
                        esub_menu.slideUp('300');
                        ethis.removeClass('active');
                    }
                    return false;
                });
            },
            menuMobile: function () {
                if (e('.main-navigation .menu > ul').length) {
                    var ethis = e('.main-navigation .menu > ul'),
                        eparent = ethis.closest('.main-navigation'),
                        pointbreak = eparent.data('epointbreak'),
                        window_width = window.innerWidth;
                    if (typeof pointbreak == 'undefined') {
                        pointbreak = 991;
                    }
                    if (pointbreak >= window_width) {
                        ethis.addClass('menu-mobile').removeClass('menu-desktop');
                        e('.main-navigation .toggle-menu').css('display', 'block');
                    } else {
                        ethis.addClass('menu-desktop').removeClass('menu-mobile').css('display', '');
                        e('.main-navigation .toggle-menu').css('display', '');
                    }
                }
            },
            menuArrow: function () {
                if (e('#masthead .main-navigation div.menu > ul').length) {
                    e('#masthead .main-navigation div.menu > ul .sub-menu').parent('li').find('> a').append('<i class="ion-ios-arrow-down">');
                }
            }
        },

        n.twp_preloader = function () {
            e(window).load(function () {
                e("body").addClass("page-loaded");
            });
        },

        n.TwpReveal = function () {
            e('.icon-search').on('click', function (event) {
                e('body').toggleClass('reveal-search');
            });
            e('.close-popup').on('click', function (event) {
                e('body').removeClass('reveal-search');
            });
        },

        n.TwpWidgetsNav = function () {
            e('#widgets-nav').sidr({
                name: 'sidr-nav',
                side: 'left'
            });

            e('.sidr-class-sidr-button-close').click(function () {
                e.sidr('close', 'sidr-nav');
            });
        },

        n.DataBackground = function () {
            e('.bg-image').each(function () {
                var src = e(this).children('img').attr('src');
                e(this).css('background-image', 'url(' + src + ')').children('img').hide();
            });
        },

        n.InnerBanner = function () {
            var pageSection = e(".data-bg");
            pageSection.each(function (indx) {
                if (e(this).attr("data-background")) {
                    e(this).css("background-image", "url(" + e(this).data("background") + ")");
                }
            });
        },

        n.TwpSlider = function () {
            var owl = e('.twp-slider');
            e(".twp-slider-1").owlCarousel({
                loop: (e('.twp-slider-1').children().length) == 1 ? false : true,
                margin: 3,
                autoplay: 5000,
                nav: true,
                navText: ["<i class='ion-ios-arrow-left'></i>", "<i class='ion-ios-arrow-right'></i>"],
                items: 1
            });


            e(".gallery-columns-1").owlCarousel({
                loop: (e('.gallery-columns-1').children().length) == 1 ? false : true,
                margin: 3,
                autoplay: 5000,
                nav: true,
                navText: ["<i class='ion-ios-arrow-left'></i>", "<i class='ion-ios-arrow-right'></i>"],
                items: 1
            });

            owl.on('translated.owl.carousel', function () {
                e(".active .slide-text").addClass("fadeInUp").show();
            });

            owl.on('translate.owl.carousel', function () {
                e(".active .slide-text").removeClass("fadeInUp").hide();
            });

        },

        n.show_hide_scroll_top = function () {
            if (e(window).scrollTop() > e(window).height() / 2) {
                e(".scroll-up").fadeIn(300);
            } else {
                e(".scroll-up").fadeOut(300);
            }
        },

        n.scroll_up = function () {
            e(".scroll-up").on("click", function () {
                e("html, body").animate({
                    scrollTop: 0
                }, 700);
                return false;
            });
        },

        n.twp_matchheight = function () {
            jQuery('.theiaStickySidebar', 'body').parent().theiaStickySidebar({
                additionalMarginTop: 30
            });
        },

        n.mobile_up = function () {
            function myFunction(x) {
                if (x.matches) {
                    e("#top-nav").removeClass("in");
                } else {
                    e("#top-nav").addClass("in");
                }
            }

            var x = window.matchMedia("(max-width: 767px)")
            myFunction(x)
            x.addListener(myFunction)
        },

        e(document).ready(function () {
            n.mobileMenu.init(), n.TwpReveal(), n.twp_preloader(), n.TwpWidgetsNav(), n.DataBackground(), n.InnerBanner(), n.TwpSlider(), n.scroll_up(), n.twp_matchheight(), n.mobile_up();
        }),
        e(window).scroll(function () {
            n.stickyMenu(), n.show_hide_scroll_top();
        }),
        e(window).resize(function () {
            n.mobileMenu.menuMobile();
        })
})(jQuery);