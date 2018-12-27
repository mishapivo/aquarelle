<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EleMate
 * @since 1.0.0
 * @version 1.0.0
 */

if ( ! is_active_sidebar( 'footer-1' ) && ! is_active_sidebar( 'footer-2' ) && ! is_active_sidebar( 'footer-3' ) ) {
	return;
}
?>

	<div class="footer-widgets container">
		<div class="row">
	  
        <div class="col l3 s12">
			<aside class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</aside><!-- #secondary -->
        </div>
		
        <div class="col l3 s12">
			<aside class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</aside><!-- #secondary -->
        </div>
		
		<div class="col l6 s12">
			<aside class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</aside><!-- #secondary -->
        </div>
		</div>
    </div>