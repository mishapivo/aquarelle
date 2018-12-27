<?php
/**
 * Template part for single header image
 *
 * @package Buzzo
 */

?>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="single-header-image" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
<?php else : ?>
	<div class="single-header-image no-bg pt-100 pb-100">
<?php endif; ?>

	<div class="single-header-image__data">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-7">
					<div class="post-meta">
						<?php buzzo_post_categories(); ?>

						<?php buzzo_post_date(); ?>

						<?php buzzo_post_comments_link(); ?>
					</div>

					<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

				</div>
			</div>
		</div>
	</div>
</div>
