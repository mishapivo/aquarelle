<?php
/**
 * The template for displaying comments.
 *
 * @package Simple Days
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area post_item">

	<?php
	
	if ( have_comments() ) :

		$comments_number = get_comments_number();
		$ping_count = get_comments( array( 'status' => 'approve', 'post_id'=> get_the_ID(), 'type'=> 'pings', 'count' => true, ) );
		$comments_number = $comments_number - $ping_count;

		if($comments_number != 0): ?>
			<h4 class="comments-title">

				<?php
				if ( 1 === $comments_number ) {
					
					echo '<i class="fa fa-comment-o" aria-hidden="true"></i> '. esc_html__( 'One Comment', 'simple-days' );

				} else {
					printf('<i class="fa fa-comments-o" aria-hidden="true"></i> '.
						
						esc_attr(__('%1$s Comments','simple-days')),
						absint(number_format_i18n( $comments_number ))
					);
				}
				?>
			</h4>

			<ul class="comment-list">
				<?php wp_list_comments( array(
					'type' => 'comment',
					'callback' => 'simple_days_comment',
				) ); ?>
				<?php
				//wp_list_comments( array('avatar_size' => 100,'style'       => 'ol',					'short_ping'  => true,				) );
				?>
			</ul>
			<?php
		endif;

		if($ping_count != 0): ?>
			<h4 class="ping-title">
				<i class="fa fa-link" aria-hidden="true"></i> 
				<?php
				if ( 1 === $ping_count ) {
					esc_html_e( 'One Pingback', 'simple-days' );

				} else {
					
					printf(esc_attr(__('%1$s Pingbacks','simple-days')),
						absint(number_format_i18n( $ping_count ))
					);
				}
				?>
			</h4>
			<ul class="ping-list">
				<?php wp_list_comments( array(
					'type' => 'pings',
					'callback' => 'simple_days_comment',
					'short_ping'  => true,
				) ); ?>
			</ul>

			<?php
		endif;

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<nav>
				<ul class="comment_pager f_box">
					<li class="comment_previous"><?php previous_comments_link( '<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> '.__( 'Older Comments', 'simple-days' ) ); ?></li>
					<li class="comment_next"><?php next_comments_link( __( 'Newer Comments', 'simple-days' ).' <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>' ); ?></li>
				</ul>
			</nav>
			<!-- .comment-navigation -->
		  <?php } // Check for comment navigation

		endif; 

		
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'simple-days' ); ?></p>
		<?php
	endif;
	if ( !YA_AMP):
		comment_form();
		elseif (comments_open()): ?>
			<a class="comment_button_amp" rel="nofollow" href="<?php echo esc_url(get_the_permalink())  ?>#respond"><?php esc_html_e( 'Post a comment', 'simple-days' ); ?></a>
			<?php else: ?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'simple-days' ); ?></p>
			<?php endif;
			?>

		</div><!-- #comments -->
