<?php
//nothing to do if post_password_required
if( post_password_required() ) {
	return;
}
?>
	
<div id="comments" class="comments-area">

	<?php if( have_comments() ) { ?>
	
		<h4 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'di-blog' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'di-blog'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h4>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 65,
					'reply_text'  => __( 'Reply', 'di-blog' ),
				) );
			?>
		</ul>
					
		<?php if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<nav class="navigation comments-navigation" role="navigation">
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'di-blog' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'di-blog' ) ); ?></div>
				</div>
			</nav>
		<?php } ?>

	<?php } ?>

	<?php
	if( comments_open() ) {
		comment_form();
	} else {
	?>
		<div class="alert alert-info">
		<?php esc_attr_e( 'Comments are closed for this post.', 'di-blog' ); ?>
		</div>
	<?php
	}
	?>

</div>
