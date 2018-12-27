     <?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Medipress
 * @since Medipress
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
                        
    <div class="comment-box">
        <?php if ( have_comments() ) : ?>
            <h3>
                <?php
                    $comments_number = get_comments_number();
                    if ( 1 === $comments_number ) {
                    /* translators: %s: post title */
                    printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','medipress' ), get_the_title() );
                    } else{
                        printf(
                            /* translators: 1: number of comments, 2: post title */
                            _nx('%1$s Comment found','%1$s comments', $comments_number, 'comments title', 'medipress' ),
                            esc_html (number_format_i18n( $comments_number ) ),
                            get_the_title()
                        );
                    }
                ?>
            </h3>

           <?php the_comments_navigation(); ?>

           <ul>
                <?php
                     wp_list_comments( array(
                         'style'       => 'ul',
                         'short_ping'  => true,
                         'avatar_size' => 42,
                         'callback' => 'medipress_comments',
                    ) );
                ?>
            </ul><!-- .comment-list -->

            <?php the_comments_navigation(); ?>

        <?php endif; // Check for have_comments(). ?>

        <?php
          // If comments are closed and there are comments, let's leave a little note, shall we?
           if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'medipress' ) ) :
        ?>
             <p class="no-comments"><?php esc_html__( 'Comments are closed.', 'medipress' ); ?></p> 
          <?php endif; ?>
    
        <?php 
            $req      = get_option( 'require_name_email' );
            $aria_req = ( $req ? " aria-required='true'" : '' );

            $comments_args = array
           (
            'submit_button' => '<input class="submit button button-type-3-xs" name="%1$s" id="%2$s" type="submit" value="submit comment"/>'.
            '</div>',

            'title_reply'  =>  __( '<h3>LEAVE A REPLY</h3>', 'medipress'  ), 
            'comment_notes_after' => '',  
                
            'comment_field' =>  
                '<textarea class="p-textarea" id="comment" name="comment" placeholder="' . esc_attr__('Comment here', 'medipress' ) . '" rows="12" aria-required="true" '. $aria_req . '>' .
                '</textarea>',

            'fields' => apply_filters( 'comment_form_default_fields', array (
                'author' => '<div class="input-groupe clearfix">'.'<div class="in">'. '<input id="author" class="p-input" name="author" placeholder="' . esc_attr__( 'Your Name *', 'medipress' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . $aria_req . ' /></div>',

            'email' =>'<div class="">'.
                    '<input id="email" class="p-input" name="email" placeholder="' . esc_attr__( 'Your Email *', 'medipress' ) . '" type="text" value="' . esc_attr($commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . '/></div>'.'</div>',
            
               ) ),
            );
       ?>
    </div> 
            
    <div class="comment-form clearfix">
          <?php
           comment_form($comments_args);
          ?>
    </div>