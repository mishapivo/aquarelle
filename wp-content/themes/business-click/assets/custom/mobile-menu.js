// shiftMenu
+(function($) {

    this.classToggler = function (param) {

        this.animation = param.animation,
        this.toggler = param.toggler,
        this.className = param.className,
        this.exceptions = param.exceptions;

        this.init = function() {
            var that = this;
            // for stop propagation
            var stopToggler = this.implode(this.exceptions);
            if (typeof stopToggler !== 'undefined') {
                $(document).on('click', stopToggler, function(e) {
                    e.stopPropagation();
                });
            }

            // for toggle class
            var toggler = this.implode(this.toggler);
            if (typeof toggler !== 'undefined') {

                $(document).on('click', toggler, function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    that.toggle();
                });
            }
        }

        //class toggler
        this.toggle = function() {
            var selectors = this.implode(this.animation);
            if (typeof selectors !== 'undefined') {
                $(selectors).toggleClass(this.className);
            }
        }

        // array selector maker
        this.implode = function(arr, imploder) {

            // checking arg is array or not
            if (!(arr instanceof Array)) {
                return arr;
            }
            // setting default imploder
            if (typeof imploder == 'undefined') {
                imploder = ',';
            }

            // making selector
            var data = arr;
            var ele = '';
            for (var j = 0; j < arr.length; j++) {
                ele += arr[j];
                if (j !== arr.length - 1) {
                    ele += imploder;
                }
            }
            data = ele;
            return data;
        }
    } //End mobileMenu




    $.fn.evtMobileMenu = function(config) {
        /* defining default config*/
        var defaultConfig = {
            icon: '#menu-icon',
            closeIcon: true,
            overlay: true
        }
        $.extend(defaultConfig, config);

        var _this = this;
        var shiftMenu = function() {
            var $icon = $(defaultConfig.icon),
                mobileMenuHTML = $(_this.selector).html(),
                that = this;

            /* constructor function */
            this.init = function() {
                $(document).ready(function() {
                    that.createMenu();
                    that.addDownArrow();
                    that.toggleSubUl();
                    that.menuToggler();
                    that.addClassOnFirstUl();
                });
            };

            this.createMenu = function() {
                var closeHTML = defaultConfig.closeIcon ? this.closeMenuIcon() : null,
                    overlayHTML = defaultConfig.overlay ? this.addOverlay() : null;
                    $('body').append('<div class="evt-mbl-menu" id="evt-mbl-menu">' + closeHTML + mobileMenuHTML + '</div>' + overlayHTML)
            };

            this.closeMenuIcon = function() {
                return ('<div class="evt-close-wrapper"> <span class="evt-inner-box" id="evt-close"><span class="evt-inner"></span></span> </div>');
            };

            this.addOverlay = function() {
                return ('<div class="evt-mbl-menu-overlay"></div>');
            };

            this.addClassOnFirstUl = function(){
              if($('#evt-mbl-menu ul').first().hasClass('menu')){
              }else{
                $('#evt-mbl-menu ul').first().addClass('menu');
              }
            }

            this.addDownArrow = function() {
                var $mobileMenu = $('#evt-mbl-menu'),
                    $hasSubUl = $('#evt-mbl-menu .menu-item-has-children'),
                    haveClassOnLi = $mobileMenu.find('.menu-item-has-children');

                if (haveClassOnLi.length > 0) {
                    $hasSubUl.children('a').append('<span class="evt-arrow-box"><span class="evt-down-arrow"></span></span>');
                } else {
                    $('#evt-mbl-menu ul li:has(ul)').children('a').append('<span class="evt-arrow-box"><span class="evt-down-arrow"></span></span>');
                }
            };

            this.toggleSubUl = function() {
                $(document).on('click', '.evt-arrow-box', toggleSubMenu);

                function toggleSubMenu(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    $(this).toggleClass('open').parent().next().slideToggle();
                }
            };

            this.menuToggler = function() {
              var menuConfig = {
                  animation: ['.evt-mbl-menu-overlay', '#evt-mbl-menu', 'body', '#menu-icon'], //where class add element
                  exceptions: ['#evt-mbl-menu'], //stop propagation
                  toggler: ['#menu-icon', '.evt-mbl-menu-overlay', '#evt-close'],//class toggle on click
                  className:'evt-menu-open'
              };
              new classToggler( menuConfig ).init();
            };

        }; /* End shiftMenu */

        /* instance of shiftmenu */
        new shiftMenu().init();

    }; /* End shiftMenu */


})(jQuery);
