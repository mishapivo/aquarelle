/*********************************/
// Sidebar hide and show control
/*********************************/
( function( $ ){
ZTAControlTrigger.addHook( 'zita-toggle-control', function( argument, api ) {
ZTACustomizerToggles ['zita_sidebar_default_layout'] = [
		    {
				controls: [    
				'zita_sidebar_width',
				'zita-settings[zita_sidebar_inside_space]'   
				],
				callback: function(layout){
					var pageset = api( 'zita_sidebar_page_layout' ).get();
					var blogset = api( 'zita_sidebar_blog_layout' ).get();
					var arcset = api( 'zita_sidebar_archive_layout' ).get();
					if((layout == 'no-sidebar') &&  (pageset == 'no-sidebar' || pageset == 'default') &&  (blogset == 'no-sidebar' || blogset == 'default') &&  (arcset == 'no-sidebar' || arcset == 'default')){
					return false;
					}
					return true;
				}
			},		
		];
  });
  ZTACustomizerToggles ['zita_sidebar_page_layout'] = [
		    {
				controls: [    
				'zita_sidebar_width',
				'zita-settings[zita_sidebar_inside_space]'   
				],
				callback: function(layout){
					if(layout=='left' || layout=='right'){
					return true;
					}
					return false;
				}
			},		
		];
	ZTACustomizerToggles ['zita_sidebar_blog_layout'] = [
		    {
				controls: [    
				'zita_sidebar_width',
				'zita-settings[zita_sidebar_inside_space]'   
				],
				callback: function(layout){
					if(layout=='left' || layout=='right'){
					return true;
					}
					return false;
				}
			},		
		];
		ZTACustomizerToggles ['zita_sidebar_archive_layout'] = [
		    {
				controls: [    
				'zita_sidebar_width',
				'zita-settings[zita_sidebar_inside_space]'   
				],
				callback: function(layout){
					if(layout=='left' || layout=='right'){
					return true;
					}
					return false;
				}
			},		
		];
})( jQuery );