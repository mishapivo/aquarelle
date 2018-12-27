jQuery(document).ready(function() {

/* ==========================================================================
   Logo Uploader
   ========================================================================== */


	jQuery('.image_button').live('click', function() {
	
		wp.media.editor.send.attachment = function(props, attachment) {
			jQuery('.logo_image').val(attachment.url);
		}

		wp.media.editor.open(this);

		return false;
	});
	
/* ==========================================================================
   Slider Items Uploader
   ========================================================================== */	
	
	jQuery('.sliderbutton').live('click', function() {
	
		var i = jQuery(this).attr('id');
	
		wp.media.editor.send.attachment = function(props, attachment) {
			jQuery('.slider_image_'+i).val(attachment.url);
		}

		wp.media.editor.open(this);

		return false;
	});		

/* ==========================================================================
   Slider Add Item
   ========================================================================== */	
	
	var scntDiv = jQuery('#p_scents');
	var i = jQuery('#p_scents .first').size();
	
	jQuery('#addScnt').live('click', function() {
		jQuery('<div class="first"><p><input type="text" id="p_scnt" size="64" name="lupercalia_front_settings[front_slider][image][' + i + ']" value="Slider ' + i + ' Image" class="slider_image_' + i + '" /> <input type="submit" class="button sliderbutton" id="' + i + '" value="Upload Image" /> </p></p><input type="text" id="p_scnt" size="80" name="lupercalia_front_settings[front_slider][title][' + i + ']" value="Slider ' + i + ' title (optional)" /></label></p><p><input type="text" id="p_scnt" size="80" name="lupercalia_front_settings[front_slider][desc][' + i + ']" value="Slider ' + i + ' decription (optional)" /></p><p><input type="text" id="p_scnt" size="69" name="lupercalia_front_settings[front_slider][url][' + i + ']" value="Slider ' + i + ' url (optional)" /><select name="lupercalia_front_settings[front_slider][target][' + i + ']" id="lupercalia_front_settings[front_slider][target][' + i + ']"><option class="level-0" value="_self">_self</option><option class="level-0" value="_blank">_blank</option></select><a href="#" id="remScnt">X</a></p></div>').appendTo(scntDiv);
		i++;
		return false;
	});
	
/* ==========================================================================
   Sidebar Remove Item
   ========================================================================== */	
	
	jQuery('#remScnt').live('click', function() { 
			if( i > 1 ) {
				jQuery(this).parents('.first').remove();
				i--;
			}
			return false;
	});	

});




