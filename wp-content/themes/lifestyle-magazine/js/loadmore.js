jQuery(function($){
	$('body').on('click', '.loadmore', function() {
 
		var button = $(this);
		var data = {
			'action': 'lifestyle_magazine_loadmore',
			'page' : lifestyle_magazine_loadmore_params.current_page,
			'cat' : lifestyle_magazine_loadmore_params.cat
		};
 
		$.ajax({
			url : lifestyle_magazine_loadmore_params.ajaxurl,
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...');
			},
			success : function( data ) {
				if( data ) { 
					$( 'div.blog-list-block' ).append(data);
					button.text( 'More Posts' );
					lifestyle_magazine_loadmore_params.current_page++;
 
					if ( lifestyle_magazine_loadmore_params.current_page == lifestyle_magazine_loadmore_params.max_page ) { 
						button.remove();
					}
				} else {
					button.remove();
				}
			}
		});
	});
});