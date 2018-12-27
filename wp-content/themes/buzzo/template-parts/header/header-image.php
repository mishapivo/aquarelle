<?php
/**
 * Template part for header image
 *
 * @package Buzzo
 */

?>
<?php if ( get_header_image() ) : ?>
	<div class="header-image" style="background-image: url(<?php header_image(); ?>);">
<?php else : ?>
	<div class="header-image no-bg pt-100 pb-100">
<?php endif; ?>

	<div class="container">
		<h1 class="header-image__title"><?php the_archive_title(); ?></h1>
	</div>
</div>
