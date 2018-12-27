<!--Featured image -->
<?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-image">
	<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-fluid' ) ); ?>
	</a>
<?php endif; ?>
