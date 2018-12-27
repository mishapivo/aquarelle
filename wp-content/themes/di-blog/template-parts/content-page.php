<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-contents' ); ?> >

	<div class="post-title single-page-title">
		<h1>
			<?php the_title(); ?>
		</h1>
	</div>


	<?php di_blog_post_thumbnail(); ?>

	<div class="post-excepr-content entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'di-blog' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div>
	
</div>
