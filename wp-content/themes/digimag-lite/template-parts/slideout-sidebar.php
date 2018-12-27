<?php
/**
 * Slider Out Sidebar
 *
 * @package Digimag Lite
 */

?>
<div class="slideout-sidebar widget-area">
	<div class="mobile-navigation" role="navigation">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
			'menu_class'     => 'primary-menu',
			'container'      => '',
		) );
		?>
	</div>
	<?php
	if ( is_active_sidebar( 'slideout-sidebar' ) ) {
		dynamic_sidebar( 'slideout-sidebar' );
	} else {
		printf( '<a class="add-widget-link" href="%1$s" title="%2$s">%2$s</a>', esc_url( admin_url( 'widgets.php' ) ), esc_html__( 'Add your widget here', 'digimag-lite' ) );
	}
	?>
</div>
<div class="slideout-close-btn"><i class="icofont icofont-close"></i></div>
