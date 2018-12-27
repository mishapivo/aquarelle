<?php
/**
 * Template for displaying search form
 *
 * @package Travel_Gem
 */

?>

<?php $unique_id = uniqid( 'search-form-' ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'travel-gem' ); ?></span>
	</label>
	<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'travel-gem' ); ?>" value="<?php the_search_query(); ?>" name="s" />
	<input type="submit" class="search-submit" value="&#xf002;" />
</form><!-- .search-form -->
