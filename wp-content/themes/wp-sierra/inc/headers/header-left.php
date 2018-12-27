<?php wpsierra_logo(); ?>
<div class="sierra-menu-icons">
	<?php if ( true == get_theme_mod( 'header_search', true ) ) : ?>
	<div id="search-button"><a href="#sierra-search"><i class="material-icons md-24">search</i></a></div>
	<?php endif; ?>
</div><!-- /.sierra-menu-icons -->
<nav class="sierra-nav">
<?php
if ( has_nav_menu( 'header-menu' ) ) {
	?>
	<div class="sierra-menu">
		<div id="burger-icon">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div><!--/.sierra-menu-->
	<?php
		wp_nav_menu(
			array(
				'theme_location' => 'header-menu',
				'menu_class' => 'menu pull-left',
				'container'  => 'false',
			)
		);
} else {
		echo ('<p class="no-menu"></p>');
}
?>
</nav>
