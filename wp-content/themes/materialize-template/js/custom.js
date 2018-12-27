jQuery(document).ready(function($) {
    //modals
    $('.modal').modal();
    //profile, etc
    $('.button-collapse, .profile-menu').sideNav();
    //parallax
    $('.parallax').parallax();
    //tabs
    $('ul.tabs').tabs();
    //collapsible
    $('.collapsible').collapsible();
    //fancybox
    $('.materialboxed').materialbox();
    //scrollSpy
    $('.scrollspy').scrollSpy();
    //masonry
    masonry($);
    //scrollToTop
    scrollToTop($);
    //carousel
    $('.carousel').carousel();
});


/**
 * @param $
 */
function masonry($){
    masonry_init($);
    $(window).resize(function(){masonry_init($);});
}

/**
 * @param $
 */
function masonry_init($) {
    $('.masonry-gallery').each(function(){
        if(!$(this).hasClass("row")){
            $(this).addClass("row");
        }
        masonry_apply($, $(this));
    });
}

/**
 * @param $
 * @param $container
 */
function masonry_apply($, $container) {
    var $nbCols             = ($(window).width() > 992) ? 3 : 2;
    $nbCols -= $('.sidebar').length;
    var $minCols = $nbCols === 1 ? 1 : $nbCols - 1;
    var $items              = $container.find('.masonry-gallery-item');
    if($items.length >= 1) {
        $items.sort(SortById);
        var $count              = $items.length;
        var $itemsPerCol        = Math.round($count / $nbCols);
        var $itemsCols          = [];

        for($i = 0, $offset = 0; $i < $nbCols; $i++, $offset += $itemsPerCol) {
            $itemsCols[$i]      = $items.slice($offset, $offset + $itemsPerCol);
        }

        var $lastItems          = $items.slice($itemsPerCol * $nbCols, $count);

        for($i = 0; $i < $lastItems.length; $i++) {
            $itemsCols[$i].push($lastItems[$i]);
        }

        $container.find("div.masonry-gallery-item, div.col").remove();

        for($i = 0; $i < $nbCols; $i++) {
            $container.append('<div class="col l' + (12 / $nbCols) + ' m' + (12 / $minCols) + ' s12 left col' + ($i + 1) + '"></div>');
            $container.children('.col' + ($i + 1)).append($itemsCols[$i]);
        }
    }
}

/**
 * @param a
 * @param b
 * @returns {number}
 * @constructor
 */
function SortById(a, b){
    var aId                 = a.id;
    var bId                 = b.id;
    return ((aId < bId) ? -1 : 1);
}

/**
 * @param $
 */
function scrollToTop($) {
    var $button = $('#scroll_to_top');
    $button.click(function(e) {
        e.preventDefault();
        $("html, body").animate({scrollTop:0}, 'slow');
    });
    $(window).on('scroll', function() {
        if($(window).scrollTop() >= ($(window).height() / 2)) {
            if($button.hasClass('hide')) {
                $button.removeClass('hide');
            }
        } else {
            if(!$button.hasClass('hide')) {
                $button.addClass('hide');
            }
        }
    });
}