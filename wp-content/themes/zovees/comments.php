<?php
/**
* @package Zovees
*/

if( post_password_required() ) { return; } if( have_comments() ): ?>

<div class="post-comment-section gray-bg">
    <h4><i class="fa fa-comment-o"></i> <?php comments_number ( __('No comments','zovees'), __( 'comment 1','zovees'), __('Comments ( % )','zovees') ); ?></h4>
    
    <?php zovees_get_post_navigation(); ?>
    
    <ul class="media-list gray-bg">
        <?php 
            $args = array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 64,
                'callback' => 'zovees_comments_data'
            );
            wp_list_comments( $args );
        ?>
    </ul>
    
    <?php zovees_get_post_navigation(); ?>
    
    <?php if( !comments_open() && get_comments_number() ): ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'zovees' ); ?></p>
    <?php endif; ?>
</div> 
<?php endif; ?>

<?php

    $fields = array(
    
        'author' => '<div class="input-field-wrapper">'.
            '<div class="input-field"><input id="author"  placeholder="' . esc_attr__( 'Name', 'zovees' ) . '"  name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div>',
        'email' =>
            '<div class="input-field"><input placeholder="' . esc_attr__( 'Email', 'zovees' ) . '"  id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" required="required" /></div></div>'
            
    );
    
    $comments_args = array(
        'class_submit' => 'button comment-sms',
        'label_submit'=>esc_html__('SEND MESSAGE','zovees'),
        'title_reply'=>esc_html__('Leave your thought','zovees'),
        'comment_notes_after' => '',
        'comment_field' => '
            <div class="clear-fix my-comment-box">
                <textarea id="comment" name="comment" cols="30" rows="3" placeholder="' . esc_attr__( 'Message', 'zovees' ) . '" required></textarea>
            </div>',
        'fields' => apply_filters( 'comment_form_default_fields', $fields )
    );
?>

<div class="comment-form-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="comment-form ">
                <?php comment_form($comments_args); ?>
            </div>
        </div>
    </div>
</div>