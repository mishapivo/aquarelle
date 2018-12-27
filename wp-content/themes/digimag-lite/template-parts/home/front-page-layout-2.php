<?php
/**
 * Front Page 2 column.
 *
 * @package Digimag Lite
 */

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
		get_template_part( 'template-parts/home/loop', 'home' );
		if ( is_active_sidebar( 'front-page-main' ) ) {
			dynamic_sidebar( 'front-page-main' );
		}
		?>
	</main><!-- #main -->
</div><!-- #primary -->
