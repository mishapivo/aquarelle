<?php
/**
 * Template for displaying search forms in Zozohub
 *
 * @package Zozohub
 * @version 1.0.1
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>">
		<span class="screen-reader-text"><?php esc_attr_e( 'Search for:', 'business-land' ); ?></span>
        <input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'business-land' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit">
    	<span class="screen-reader-text">
			<?php esc_attr_e( 'Search', 'business-land' ); ?>
        </span>
        <i class="icon-magnifier"></i>
    </button>
</form>
