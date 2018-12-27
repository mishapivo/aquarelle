<?php 
if ( post_password_required() ) { return; }

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );

$fields =  array(
    'author'    =>  '<div class="row"><div class="col-sm-5"><div class="form-group form-group-author"><label class="form-label form-label-author">'. esc_html__( 'Name', 'sirius-lite' ) . ($req ? '<span class="asterik">*</span>' : '') . '</label><input type="text" class="form-control" id="author" name="author" placeholder="" /></div>',
    'email'     =>  '<div class="form-group form-group-email"><label class="form-label form-label-email">'. esc_html__( 'Email Address', 'sirius-lite' ) .($req ? '<span class="asterik">*</span>' : '') . '</label><input type="email" class="form-control" name="email" id="email" placeholder="" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" /></div>',
    'url'       => '<div class="form-group form-group-url"><label class="form-label form-label-url">' . esc_html__( 'Website', 'sirius-lite' ) . '</label><input type="text" class="form-control" name="url" id="url" placeholder="" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div>'
);
if(is_user_logged_in())
    $comment_field = '<div class="row"><div class="col-sm-7"><div class="form-group form-group-comment"><label class="form-label">'. esc_html__( 'Comment', 'sirius-lite' ) .'</label><textarea rows="11" cols="" class="form-control" name="comment" placeholder=""></textarea></div></div></div>';
else
    $comment_field = '<div class="col-sm-7"><div class="form-group form-group-comment"><label class="form-label">'. esc_html__( 'Comment', 'sirius-lite' ) .'</label><textarea rows="11" cols="" class="form-control" name="comment" placeholder=""></textarea></div></div></div>';
$class_submit  = 'btn btn-blue';
$comment_form_args = array( 'fields'        =>  apply_filters( 'comment_form_default_fields', $fields ),
                            'comment_field' =>  $comment_field,
                            'class_submit'  =>  $class_submit   );
?>
<!-- Post Comments -->
<div class="comments" id="comments">

    <!-- Comments -->
    <?php if ( have_comments() ) { ?>
    <h2 class="comment-title">
    <?php $comments_number = get_comments_number();
        if ( 1 === $comments_number ) { _e('1 Comment', 'sirius-lite'); }
        else { printf( _nx( '%1$s Comment', '%1$s Comments', $comments_number, 'comments title', 'sirius-lite' ), number_format_i18n( $comments_number ) ); } ?>
    </h2>
        
    <div class="row">
        <div class="col-md-11">
            <?php the_comments_navigation(); ?>
            <ul class="comment-list">
                <?php wp_list_comments( array( 'style' => 'ul', 'short_ping'  => true, 'avatar_size' => 0, 'depth' => 2) ); ?>
            </ul>
            <?php the_comments_navigation(); ?>
        </div>
    </div>
    <hr />
    <?php } ?>
    <!-- /Comments -->
    
    <!-- Comment Form -->
    <?php 
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'sirius-lite' ); ?></p>
	<?php } ?>

	<?php if ( comments_open() ) { if ( get_option('comment_registration') && !is_user_logged_in() ) { ?>
        <p class="login-to-comment"><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'sirius-lite'), wp_login_url( get_permalink() )); ?></p>
    <?php } else { comment_form($comment_form_args); } } ?>
    <!-- /Comment Form -->
    
</div>
<!-- /Post Comments -->