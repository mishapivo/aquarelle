jQuery(document).ready(function($){
    
    var _custom_media = true,
     _orig_send_attachment = wp.media.editor.send.attachment;
     
    $('.profitmag_fav_icon .button').click(function(e) {
        
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);
        var id = button.attr('id').replace('_button', '');
        _custom_media = true;
        wp.media.editor.send.attachment = function(props, attachment){
          if ( _custom_media ) {
            $("#"+id).val(attachment.url);
            $('#profitmag_media_image').fadeIn();
            $("#profitmag_show_image").attr('src',attachment.url);
          } else {
            return _orig_send_attachment.apply( this, [props, attachment] );
          };
        }
    
        wp.media.editor.open(button);
        return false;
  });
  
  $('#profitmag_fav_icon_remove').click(function(){    
    $('#profitmag_media_image').hide();
    $('#profitmag_media_image img').attr('src','');
    $('#profitmag_media_upload').val('');
  });
  
  
  // Left Sidebar Gallery
  $(document).on('click','.left-add-gallery-image', function(e) {    
    counter_gallery = $('#left_gallery_img_count').val();   
    var dis = $(this);
    var send_attachment_bkp = wp.media.editor.send.attachment;
    _custom_media = true;
    wp.media.editor.send.attachment = function(props, attachment){
      if ( _custom_media ) {
        console.log(attachment.url);
        img = attachment.url; 
        ext_index=img.lastIndexOf('.');
        img_ext = img.substr(ext_index+1);
        if( img_ext == 'jpg') {
            img_ext = '-150x150.jpg';
        }else if(img_ext == 'png') {
            img_ext = '-150x150.png';
        }else if( img_ext == 'jpeg') {
            img_ext = '-150x150.jpeg';
        }else {
            img_ext = '.'+img_ext;
        }
        display_img=attachment.url.substr(0,ext_index);
        display_img=display_img+img_ext;
        $('.left-image-fields').append('<div class="gal-img-block"><div class="gal-img"><img src="'+display_img+'" /><span class="fig-remove">Remove</span></div><input type="hidden" name="profitmag_options[left_side_gallery]['+counter_gallery+']" class="hidden-left-gallery" value="'+attachment.url+'" /></div>');
        counter_gallery++;
        $('#left_gallery_img_count').val(counter_gallery);                
      } else {
        return _orig_send_attachment.apply( this, [props, attachment] );
      };
    }
    
    wp.media.editor.open($(this));
    return false;
  });
  
  // Remove Left Sidebar Gallery Image
  $(document).on('click','.fig-remove',function() {   
    $(this).parent().parent().remove();
  });
  
  
  
  // Right Sidebar Gallery
  $(document).on('click','.right-add-gallery-image', function(e) {    
    counter_gallery = $('#right_gallery_img_count').val();   
    var dis = $(this);
    var send_attachment_bkp = wp.media.editor.send.attachment;
    _custom_media = true;
    wp.media.editor.send.attachment = function(props, attachment){
      if ( _custom_media ) {        
        img = attachment.url; 
        ext_index=img.lastIndexOf('.');
        img_ext = img.substr(ext_index+1);
        if( img_ext == 'jpg') {
            img_ext = '-150x150.jpg';
        }else if(img_ext == 'png') {
            img_ext = '-150x150.png';
        }else if( img_ext == 'jpeg') {
            img_ext = '-150x150.jpeg';
        }else {
            img_ext = '.'+img_ext;
        }
        display_img=attachment.url.substr(0,ext_index);
        display_img=display_img+img_ext;
        $('.right-image-fields').append('<div class="gal-img-block"><div class="gal-img"><img src="'+display_img+'" /><span class="fig-remove">Remove</span></div><input type="hidden" name="profitmag_options[right_side_gallery]['+counter_gallery+']" class="hidden-right-gallery" value="'+attachment.url+'" /></div>');
        counter_gallery++;
        $('#right_gallery_img_count').val(counter_gallery);                
      } else {
        return _orig_send_attachment.apply( this, [props, attachment] );
      };
    }
    
    wp.media.editor.open($(this));
    return false;
  });
  
  // Remove Right Sidebar Gallery Image
  $(document).on('click','.fig-remove',function() {   
    $(this).parent().parent().remove();
  });
  
  // Media Gallery Home
  $(document).on('click','.media-add-gallery-image', function(e) {    
    counter_gallery = $('#media_gallery_img_count').val();   
    var dis = $(this);
    var send_attachment_bkp = wp.media.editor.send.attachment;
    _custom_media = true;
    wp.media.editor.send.attachment = function(props, attachment){
      if ( _custom_media ) {
        console.log(attachment.url);
        img = attachment.url; 
        ext_index=img.lastIndexOf('.');
        img_ext = img.substr(ext_index+1);
        if( img_ext == 'jpg') {
            img_ext = '-150x150.jpg';
        }else if(img_ext == 'png') {
            img_ext = '-150x150.png';
        }else if( img_ext == 'jpeg') {
            img_ext = '-150x150.jpeg';
        }else {
            img_ext = '.'+img_ext;
        }
        display_img=attachment.url.substr(0,ext_index);
        display_img=display_img+img_ext;
        $('.media-image-fields').append('<div class="gal-img-block"><div class="gal-img"><img src="'+display_img+'" /><span class="fig-remove">Remove</span></div><input type="hidden" name="profitmag_options[media_gallery]['+counter_gallery+']" class="hidden-media-gallery" value="'+attachment.url+'" /></div>');
        counter_gallery++;
        $('#media_gallery_img_count').val(counter_gallery);                
      } else {
        return _orig_send_attachment.apply( this, [props, attachment] );
      };
    }
    
    wp.media.editor.open($(this));
    return false;
  });
  
  // Remove Media Gallery Image
  $(document).on('click','.fig-remove',function() {   
    $(this).parent().parent().remove();
  });
  
  
});