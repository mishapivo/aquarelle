<?php
defined( 'ABSPATH' ) || exit;

if(get_theme_mod( 'simple_days_uploaded_to_this_post',false) != false){
  ?>
  <script type="text/javascript">jQuery(function( $ ){

   wp.media.view.Modal.prototype.on( 'open', function( ){ $( 'select.attachment-filters' ).find( '[value="uploaded"]').attr( 'selected', true ).parent().trigger('change'); });
 });
</script>
<?php
}
