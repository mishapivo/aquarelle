<?php if ( get_post_type() === 'post' ) : ?>
	<div class="card-text post-meta">
		<span class="badge badge-pill post-author themecolor">
			<i class="fa fa-user-circle" aria-hidden="true"></i>
			<span class="sr-only"><?php esc_html_e( 'Author', 'seabadgermd' ); ?>:</span>
			<?php
			printf(
				'<a href="%s" rel="author">%s</a>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
			?>
		</span>
		<span class="badge badge-pill post-date themecolor">
			<i class="fa fa-calendar" aria-hidden="true"></i>
			<span class="sr-only"><?php esc_html_e( 'Posted on', 'seabadgermd' ); ?>:</span>
			<?php echo get_the_date(); ?>
		</span>
		<?php
		$categories = array();
		foreach ( array_slice( ( get_the_category() ), 0, 5 ) as $category ) {
			$categories[] = sprintf(
				'<a href="%s">%s</a>', esc_url( get_category_link( $category->term_id ) ),
				$category->cat_name
			);
		}
		$cat_str = implode( ', ', $categories );
		?>
		<span class="badge badge-pill post-categories themecolor">
			<i class="fa fa-folder-o" aria-hidden="true"></i>
			<span class="sr-only"><?php esc_html_e( 'Post categories', 'seabadgermd' ); ?>:</span>
			<?php echo $cat_str; ?>
		</span>
	</div>
<?php endif; ?>
