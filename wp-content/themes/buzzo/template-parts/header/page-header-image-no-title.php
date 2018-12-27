<?php
/**
 * Template part for about page header image
 *
 * @package Buzzo
 */

?>
<?php if ( has_post_thumbnail() ) : ?>
	<!--  -->
	<div class="single-header-image single-header-image--h700 single-header-image--no-title" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
	</div>
<?php endif; ?>
