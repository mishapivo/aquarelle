<?php if ( post_password_required() ) : ?>

	<div id="comments" class="comments">

		<p class="nopassword"><?php _e( 'this post is password protected. Enter the password to view any comments.', 'lupercalia' ); ?></p>
	
	</div><!-- #comments -->

<?php
		/*
		 * Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php // You can start editing here -- including this comment! ?>

<?php if ( have_comments() ) : ?>

	<div id="comments" class="comments">

		<h2 id="comments-title">
		
			<?php
				printf( __( 'Leave a comment to %1$s', 'lupercalia' ), '<span>' . get_the_title() . '</span>' );
			?>
			
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		
			<nav id="comment-nav-above">
				<h1 class="assistive-text"><?php _e( 'Comment navigation', 'lupercalia' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'lupercalia' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'lupercalia' ) ); ?></div>
			</nav>
	
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				/*
				 * Loop through and list the comments. 
				*/ 
				wp_list_comments( $array = array ( 'avatar_size' => 50, 'callback' => 'lupercalia_comment' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		
			<nav id="comment-nav-below">
				<h1 class="assistive-text"><?php _e( 'Comment navigation', 'lupercalia' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'lupercalia' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'lupercalia' ) ); ?></div>
			</nav>
		
		<?php endif; // check for comment navigation ?>

	</div><!-- #comments -->	

	<?php
	/*
	 * If there are no comments and comments are closed, let's leave a little note, shall we?
	 * But we only want the note on posts and pages that had comments in the first place.
	 */
	if ( ! comments_open() && get_comments_number() ) : ?>

	<div id="comments" class="comments">
	
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'lupercalia' ); ?></p>

	</div><!-- #comments -->

	<?php endif; ?>

<?php endif; // have_comments() ?>

<?php comment_form( array ( 'comment_notes_after' => ' ' )  ); ?>

