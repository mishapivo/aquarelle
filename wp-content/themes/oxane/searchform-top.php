<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'oxane' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'oxane' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'oxane' ) ?>" />
		<button><i class="fa fa-search"></i></button>
	</label>
</form>