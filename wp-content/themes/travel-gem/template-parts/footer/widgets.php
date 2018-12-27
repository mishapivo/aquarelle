<?php
/**
 * Footer widgets
 *
 * @package Travel_Gem
 */

$active = array();
for ( $i = 1; $i <= 4; $i++ ) {
	if ( is_active_sidebar( 'footer-' . $i ) ) {
		$active[] = $i;
	}
}

if ( 0 === count( $active ) ) {
	return;
}
?>

<div id="footer-widgets">
	<div class="container">
		<div class="inner-wrapper">
			<?php foreach ( $active as $id ) : ?>
				<aside class="footer-active-<?php echo absint( count( $active ) ); ?> footer-widget-area">
				<?php dynamic_sidebar( 'footer-' . $id ); ?>
				</aside><!-- .footer-widget-area -->
			<?php endforeach; ?>
		</div><!-- .inner-wrapper -->
	</div><!-- .container -->
</div><!-- #footer-widgets -->
