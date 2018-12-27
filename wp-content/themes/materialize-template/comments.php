<?php
/**
 *
 *
 *  Materialize Template <http://wordpress.org>
 *
 *  By KRATZ Geoffrey AKA Jul6art AKA VanIllaSkype
 *  for VsWeb <https://vsweb.be>
 *
 *  https://vsweb.be
 *  admin@vsweb.be
 *
 *  Special thanks to Brynnlow
 *  for his contribution
 *
 *  It is free software; you can redistribute it and/or modify it under
 *  the terms of the GNU General Public License, either version 2
 *  of the License, or any later version.
 *
 *  For the full copyright and license information, please read the
 *  LICENSE.txt file that was distributed with this source code.
 *
 *  The flex one, in a flex world
 *
 *     __    __    ___            __    __    __   ____
 *     \ \  / /   / __|           \ \  /  \  / /  |  __\   __
 *      \ \/ / _  \__ \  _         \ \/ /\ \/ /   |  __|  |  _\
 *       \__/ (_) |___/ (_)         \__/  \__/    |  __/  |___/
 *
 *                    https://vsweb.be
 *
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

<div id="comments" class="comments-area">

    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) : ?>
        <h4 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ( '1' === $comments_number ) {
                /* translators: %s: post title */
                printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'materialize-template' ), get_the_title() );
            } else {
                printf(
                /* translators: 1: number of comments, 2: post title */
                    _nx(
                        '%1$s Reply to &ldquo;%2$s&rdquo;',
                        '%1$s Replies to &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'materialize-template'
                    ),
                    number_format_i18n( $comments_number ),
                    get_the_title()
                );
            }
            ?>
        </h4>



        <ul class="collection comment-list">
            <?php
            materialize_template_comment($comments);
            ?>
        </ul>



        <div class="center">
        <?php echo get_the_comments_pagination( array(
            'prev_text' => __('prev', 'materialize-template'),
            'next_text' => __('next', 'materialize-template'),
        ) );
        ?>
        </div>
        <?php

    endif; // Check for have_comments().

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

        <p class="no-comments"><?php _e( 'Comments are closed.', 'materialize-template' ); ?></p>
        <?php
    endif;

    $form_params = array(
        'class_submit' => 'btn waves-effect waves-light right',
        'comment_field' => '<div class="input-field comment-form-comment">' .
                            '<i class="material-icons prefix">bookmark</i>' .
                            '<textarea id="comment" name="comment" aria-required="true" class="validate materialize-textarea"></textarea>' .
                            '<label for="comment">' . _x( 'Comment', 'noun', 'materialize-template' ) . '</label>' .
                            '</div>',
        'fields' => array(

            'author' =>
                '<div class="input-field comment-form-author">' .
                '<i class="material-icons prefix">perm_identity</i>' .
                '<input class="validate" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . ( $req ) ? "required" : "" . ' />' .
                '<label for="author">' . __( 'Name', 'materialize-template' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
                '</div>',

            'email' =>
                '<div class="input-field comment-form-email">' .
                '<i class="material-icons prefix">email</i>' .
                '<input class="validate" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . ( $req ) ? "required" : "" . ' />' .
                '<label for="email">' . __( 'Email', 'materialize-template' ) . ( $req ? '<span class="required">*</span>' : '' ) . ' </label> ' .
                '</div>',

            'url' =>
                '<div class="input-field comment-form-url">' .
                '<i class="material-icons prefix">web</i>' .
                '<input class="validate" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                '" size="30" />' .
                '<label for="url">' . __( 'Website', 'materialize-template' ) . '</label>' .
                '</div>',
        )
    );
    comment_form($form_params, get_the_ID());
    ?>

</div><!-- #comments -->
