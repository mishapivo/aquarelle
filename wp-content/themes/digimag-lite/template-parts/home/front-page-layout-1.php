<?php
/**
 * Front Page 3 column.
 *
 * @package Digimag Lite
 */

?>
<div class="col-1">
	<?php
	if ( is_active_sidebar( 'front-page-main' ) ) {
		dynamic_sidebar( 'front-page-main' );
	}
	?>
</div>
<div id="primary" class="content-area col-2">
	<main id="main" class="site-main">
		<?php get_template_part( 'template-parts/home/loop', 'home' ); ?>
	</main><!-- #main -->
</div><!-- #primary -->
