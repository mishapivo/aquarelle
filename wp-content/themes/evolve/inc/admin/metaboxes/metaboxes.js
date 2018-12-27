// Change tab on click in page/post option
jQuery(document).ready(function ($) {

    jQuery('.evolve-metabox-tabs li a').click(function (e) {
        e.preventDefault();

        var id = jQuery(this).attr('href');

        jQuery(this).parents('ul').find('li').removeClass('active');
        jQuery(this).parent().addClass('active');

        jQuery(this).parents('.inside').find('.evolve-metabox-tab').removeClass('active').hide();
        jQuery(this).parents('.inside').find('#evolve-tab-' + id).addClass('active').fadeIn();

    });

});