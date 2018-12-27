<?php
/**
 * Template for displaying search forms in Indrajeet
 *
 * @package Indrajeet
 */
?>
	<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="input-group">
			<input type="search" class="search-field form-control mr-sm-2" name="s" id="s" placeholder="<?php esc_attr_x( 'Search', 'placeholder', 'indrajeet' ); ?>" />

			<button type="submit" class="btn btn-outline-primary my-2 my-sm-0" id="search-form"><?php echo esc_html_x( 'Search', 'submit button', 'indrajeet' ); ?></button>
		</div>
	</form>
