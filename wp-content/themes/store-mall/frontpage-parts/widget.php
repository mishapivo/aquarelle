<?php
/**
 * Homepage area to get all the widgets.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Moral
 */

if ( is_active_sidebar( 'homepage-area' ) ) { ?>
	<aside id="homepage-widgets" class="widget-area page-section" role="complementary">
		<?php  
		$widget_count = store_mall_count_widgets( 'homepage-area' );
		if ( $widget_count > 4 ) {
			$count = 4;
		} else {
			$count = $widget_count;
		}
		?>
		<div class="wrapper col-<?php echo esc_attr( $count );?>">
			<?php dynamic_sidebar( 'homepage-area' ); ?>
		</div><!-- .wrapper -->
	</aside><!-- #secondary -->
<?php 
}