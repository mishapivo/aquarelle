<?php
/**
 * The template for displaying custom search form
 *
 * @package Advik Blog Lite
 * @since 1.0
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'advik-blog-lite' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Enter your Keyword', 'advik-blog-lite' ); ?>" value="<?php the_search_query(); ?>" name="s">
	</label>
	<button type="submit" class="search-submit">
		<i class="fa fa-search"></i>
		<span class="screen-reader-text"><?php esc_attr_e( 'Search', 'advik-blog-lite' ); ?></span>
	</button>
</form>
