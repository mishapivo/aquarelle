<?php
/**
 * The default template for displaying search form
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
?>

<div id="search">
		<form id="searchform" method="get" action="<?php echo esc_url( home_url() ); ?>/">
			<div>
				<input type="text" name="s" id="s" size="30" placeholder="<?php esc_attr_e( 'Search here...', 'wp-sierra' ); ?>"/>
					<button type="submit">
						<i class="material-icons">search</i>
					</button>
			</div>
		 </form>
</div><!--/#search-->
