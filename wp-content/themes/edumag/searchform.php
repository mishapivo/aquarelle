<?php
/**
 * The template for displaying search form
 *
 * @package Theme Palace
 * @subpackage EduMag 
 * @since EduMag 0.1
 */
?>

<form action="<?php echo esc_url( home_url('/') ); ?>" role="search" method="get" class="search-form">
	<label>
		 <span class="screen-reader-text"><?php printf( esc_html__( 'Search for: %s','edumag' ), get_search_query() ); ?></span>
		<input type="search" name="s" placeholder="<?php esc_attr_e( 'Search...', 'edumag' ); ?>" value="<?php echo get_search_query(); ?>" >
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php esc_html_e('Search', 'edumag' ); ?></span><i class="fa fa-search"></i></button>	
</form>