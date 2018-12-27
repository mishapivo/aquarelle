<?php
/**
 * The template for displaying custom search form
 *
 * @package Digimag Lite
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'digimag-lite' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search Articles ...', 'digimag-lite' ); ?>" value="<?php the_search_query(); ?>" name="s">
	</label>
	<button type="submit" class="search-submit">
		<i class="icofont icofont-search-alt-2"></i>
		<span class="screen-reader-text"><?php esc_attr_e( 'Search', 'digimag-lite' ); ?></span>
	</button>
</form>
