<div class="search-widget">
	<form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_e( 'Search here', 'zovees' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s"/>
		<button type="submit"><i class="fa fa-search"></i></button>
	</form>
</div>