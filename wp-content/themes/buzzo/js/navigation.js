/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function($) {
  "use strict";

  function mobileMenu() {
    var button, menu;

    button = $('#menu-toggle');

    button.on('click', function(e) {
      e.preventDefault();

      if ('true' == $(this).attr('aria-expanded')) {
        $('body').removeClass('menu-expanded');

        $(this).find('.nav-icon').removeClass('open');

        $(this).attr('aria-expanded', 'false');

        $('ul#primary-menu', '#primary-menu > ul').attr('aria-expanded', 'false');
      } else {
        $('body').addClass('menu-expanded');

        $(this).find('.nav-icon').addClass('open');

        $(this).attr('aria-expanded', 'true');

        $('ul#primary-menu', '#primary-menu > ul').attr('aria-expanded', 'true');
      }
    });
  }

  function menuFocus() {
    $('.main-navigation a').on('focus', function() {
      $(this).parents('li').addClass('focused');
    });

    $('.main-navigation a').on('blur', function() {
      $(this).parents('li').removeClass('focused');
    });
  }

  function menuSearchToggle() {
    $('#search-toggle').on('click', function(e) {
      e.preventDefault();

      $(this).addClass('open').next().toggleClass('open').find('.search-input').focus();
      // $('#navigation-search').toggle();
    });

    $('#navigation-search .search-input').on('blur', function() {
      if ( ! $(this).closest('#navigation-search').hasClass('open') ) {
        return;
      }

      $('#navigation-search').removeClass('open');
      $('#search-toggle').removeClass('open');
    });
  }

  $(document).ready(function() {
    mobileMenu();

    menuFocus();

    menuSearchToggle();
  });
})(jQuery);

( function() {
  "use strict";

	var container, button, menu, links, subMenus, i, len;

	container = document.getElementById( 'site-navigation' );

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focused' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focused' );
					}
					menuItem.classList.add( 'focused' );
				} else {
					menuItem.classList.remove( 'focused' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );
} )();
