<?php
/**
 * The template for displaying Comments.
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
?>

<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'wp-sierra' ); ?></p>


<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
return;
endif;
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="comments">

				<?php
					// You can start editing here -- including this comment!
				?>
				<?php if ( have_comments() ) : ?>

							<h3 id="comments-title">
										<?php comments_number( '0 ' . esc_html__( 'Comments', 'wp-sierra' ), '1 ' . esc_html__( 'Comment', 'wp-sierra' ), '% ' . esc_html__( 'Comments', 'wp-sierra' ) ); ?> <?php printf( 'to %s', the_title( '', '', false ) ); ?>
							</h3>


				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
							<div class="navigation">
								<div class="navigation-left"><?php previous_comments_link( esc_html__( 'Previous Comments', 'wp-sierra' ) ); ?></div>
							<div class="navigation-right"><?php next_comments_link( esc_html__( 'Next Comments', 'wp-sierra' ) ); ?></div>
							</div> <!-- .navigation -->
				<?php endif; // check for comment navigation ?>

							<ol class="comments-list">

								<?php
								wp_list_comments( array(
									'style'             => 'ol',
									'callback'          => null,
									'end-callback'      => null,
									'type'              => 'all',
									'page'              => '',
									'per_page'          => '',
									'avatar_size'       => 200,
									'reverse_top_level' => null,
									'reverse_children'  => '',
									'format'            => 'html5', //or xhtml if no HTML5 theme support
									'short_ping'        => true, // @since 3.6,
								));
								?>

							</ol>

				<?php
				else : // or, if we don't have comments:

					/* If there are no comments and comments are closed,
					 * let's leave a little note, shall we?
					 */
					if ( ! comments_open() ) :
				?>
					<p><?php esc_html_e( 'Comments are closed.', 'wp-sierra' ); ?></p>

<?php
		endif; // end ! comments_open()
?>

				<?php endif; // end have_comments() ?>

				<?php comment_form(); ?>

				</div><!-- #comments -->
		</div><!--/.col-md-12 -->
	</div><!--/.row-->
</div><!-- /.container-->
