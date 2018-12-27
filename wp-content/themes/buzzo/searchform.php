<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Buzzo
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<div class="search">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get">
		<label for="<?php echo $unique_id; ?>">
			<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'buzzo' ); ?></span>
		</label>

		<input type="text" id="<?php echo $unique_id; ?>" name="s" class="search-input" placeholder="<?php esc_attr_e( 'Enter keyword here...', 'buzzo' ); ?>">
		<button type="submit" class="search-button"><i class="fa fa-search"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'buzzo' ); ?></span></button>
	</form>
</div>
