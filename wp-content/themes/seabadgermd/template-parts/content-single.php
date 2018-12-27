<!--Post data-->
<div class="card-body post-block">
	<?php get_template_part( 'template-parts/content/title', 'single' ); ?>
	<?php get_template_part( 'template-parts/content/meta' ); ?>
	<div class="card-text post-content">
		<?php
			the_content();
		?>
		<br class="clear">
		<?php
			$wplink_options = array(
				'before'           => '<div class="row"><div class="post-paging col-12">' . esc_html__( 'Jump to page ', 'seabadgermd' ),
				'after'            => '</div></div>',
				'link_before'      => '<span class="post-paging-link themecolor">',
				'link_after'       => '</span>',
				'next_or_number'   => 'number',
				'separator'        => ' ',
				'pagelink'         => '%',
				'echo'             => 1,
			);
			wp_link_pages( $wplink_options );
			seabadgermd_post_navigation();
			if ( comments_open() || get_comments_number() !== 0 ) {
				if ( get_option( 'thread_comments' ) ) {
					wp_enqueue_script( 'comment-reply' );
				}
			?>
			<div class="comments" id="comments">
			<?php
				comments_template( '', true );
			?>
			</div>
			<?php
			// end comment section
			}
		?>
		<?php get_template_part( 'template-parts/content/footer' ); ?>
	</div>
</div>
