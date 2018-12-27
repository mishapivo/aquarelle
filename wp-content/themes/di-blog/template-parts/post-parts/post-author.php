<div class="post-about-author"> 
	<?php
	if( get_avatar( get_the_author_meta( 'ID' ) ) ) {
		?>
		<div class="post-author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), $size = 96, $default = '', $alt = '', array( 'class' => 'img-circle', ) ); ?>
		</div>
		<?php
	}
	?>
	<div class="post-author-texts">
		<p class="post-author-name"><?php the_author_posts_link(); ?></p>
		<p class="post-author-description"><?php the_author_meta( 'description' ); ?></p>
	</div>
</div>
