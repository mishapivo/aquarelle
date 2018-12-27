/*
 * Settings of the sticky menu
 */

jQuery(document).ready(function(){
   var wpAdminBar = jQuery('#wpadminbar');
   if (wpAdminBar.length) {
      jQuery("#np-menu-wrap").sticky({topSpacing:wpAdminBar.height()});
   } else {
      jQuery("#np-menu-wrap").sticky({topSpacing:0});
   }
});