jQuery(document).ready(function($){
      "use strict";

var vmagazine_lite_upload;
var vmagazine_lite_selector;

function vmagazine_lite_add_file(event, selector) {

    var upload = $(".uploaded-file"), frame;
    var $el = $(this);
   vmagazine_lite_selector = selector;

    event.preventDefault();

    // If the media frame already exists, reopen it.
    if (vmagazine_lite_upload ) {
       vmagazine_lite_upload.open();
    } else {
        // Create the media frame.
       vmagazine_lite_upload = wp.media.frames.vmagazine_lite_upload =  wp.media({
            // Set the title of the modal.
            title: $el.data('choose'),

            // Customize the submit button.
            button: {
               // Set the text of the button.
               text: $el.data('update'),
               // Tell the button not to close the modal, since we're
               // going to refresh the page when the image is selected.
               close: false
            }
        });

        // When an image is selected, run a callback.
       vmagazine_lite_upload.on( 'select', function() {
            // Grab the selected attachment.
            var attachment = vmagazine_lite_upload.state().get('selection').first();
           vmagazine_lite_upload.close();
           vmagazine_lite_selector.find('.upload').val(attachment.attributes.url);
            
            if ( attachment.attributes.type == 'image' ) {
              vmagazine_lite_selector.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '" width="150px" height="150px">').slideDown('fast');
            }
            
           vmagazine_lite_selector.find('.ap-upload-button').unbind().addClass('remove-file').removeClass('ap-upload-button').val(vmagazine_lite_l10n.remove);
           vmagazine_lite_selector.find('.of-background-properties').slideDown();
           vmagazine_lite_selector.find('.remove-image, .remove-file').on('click', function() {
              vmagazine_lite_remove_file( $(this).parents('.section') );
            });
        });
    }

// Finally, open the modal.
   vmagazine_lite_upload.open();
}

function vmagazine_lite_remove_file(selector) {
    selector.find('.remove-image').hide();
    selector.find('.upload').val('');
    selector.find('.of-background-properties').hide();
    selector.find('.screenshot').slideUp();
    selector.find('.remove-file').unbind().addClass('ap-upload-button').removeClass('remove-file').val(vmagazine_lite_l10n.upload);
    
    // We don't display the upload button if .upload-notice is present
    // This means the user doesn't have the WordPress 3.5 Media Library Support
    if ( $('.section-upload .upload-notice').length > 0 ) {
        $('.ap-upload-button').remove();
    }
    
    selector.find('.ap-upload-button').on('click', function(event) {
       vmagazine_lite_add_file(event, $(this).parents('.sub-option'));
    });
}

$('body').on('click', '.remove-image, .remove-file', function() {
   vmagazine_lite_remove_file( $(this).parents('.sub-option') );
});

$('body').on('click', '.ap-upload-button', function( event ) {
   vmagazine_lite_add_file(event, $(this).parents('.sub-option'));
});

});