<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package my_salon
 */

if( ! function_exists( 'my_salon_categories' ) ) :
/**
 * Function that list categories
*/
function my_salon_categories( $blog = false ){
    
    $categories_list = get_the_category_list( esc_html( ', ' ) ); 
    if ( $categories_list && my_salon_categorized_blog() ) {
        printf( '<span class="category">' . esc_html( '%1$s' ) . '</span>', $categories_list ); // WPCS: XSS OK.
    }
}
endif;

if( ! function_exists( 'my_salon_comments' ) ) :
/**
 * Function that list categories
*/
function my_salon_comments( $blog = false ){

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'my-salon' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
}
endif;


if ( ! function_exists( 'my_salon_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function my_salon_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		echo '<span class="posted-on"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span><span class="byline"><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>'; // WPCS: XSS OK.

	}
endif;



if ( ! function_exists( 'my_salon_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function my_salon_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'my-salon' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'my-salon' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'my-salon' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


if( ! function_exists( 'my_salon_sidebar_layout' ) ) :
/**
 * Return sidebar layouts for pages
 */
function my_salon_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'my_salon_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'my_salon_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
    
}
endif;

if( ! function_exists( 'my_salon_social_link_cb' ) ) :
/**
 * Header Top
 * 
 * @since 1.0.1
*/
function my_salon_social_link_cb(){	       
    $my_salon_button_url_fb   = get_theme_mod( 'my_salon_facebook', '#' );
    $my_salon_button_url_tw   = get_theme_mod( 'my_salon_twitter', '#' );
    $my_salon_button_url_ln   = get_theme_mod( 'my_salon_linkedin', '#' );
    $my_salon_button_url_ins  = get_theme_mod( 'my_salon_instagram', '#' );
    $my_salon_button_url_gp   = get_theme_mod( 'my_salon_google', '#' );
    $my_salon_button_url_pin  = get_theme_mod( 'my_salon_pinterest', '#' );
    $my_salon_button_url_yt   = get_theme_mod( 'my_salon_youtube', '#' );
  ?>

	<ul class="header-contact">
		 <?php if( $my_salon_button_url_fb ){?>
		<li><a href="<?php echo esc_url( $my_salon_button_url_fb ) ?>"><i class="fa fa-facebook"></i></a></li>
		<?php } if( $my_salon_button_url_tw ){?>
		<li><a href="<?php echo esc_url( $my_salon_button_url_tw ) ?>"><i class="fa fa-twitter"></i></a></li>
		<?php } if( $my_salon_button_url_ln ){?>
		<li><a href="<?php echo esc_url( $my_salon_button_url_ln ) ?>"><i class="fa fa-linkedin"></i></a></li>
		<?php } if( $my_salon_button_url_ins ){?>
		<li><a href="<?php echo esc_url( $my_salon_button_url_ins ) ?>"><i class="fa fa-instagram"></i></a></li>
		<?php } if( $my_salon_button_url_gp ){?>
		<li><a href="<?php echo esc_url( $my_salon_button_url_gp ) ?>"><i class="fa fa-google-plus"></i></a></li>
		<?php } if( $my_salon_button_url_pin ){?>
		<li><a href="<?php echo esc_url( $my_salon_button_url_pin ) ?>"><i class="fa fa-pinterest"></i></a></li>
		<?php } if( $my_salon_button_url_pin ){?>
        <li><a href="<?php echo esc_url( $my_salon_button_url_yt ) ?>"><i class="fa fa-youtube"></i></a></li>
        <?php } ?>
	</ul>
<?php } 
endif; 
add_action( 'my_salon_social_link', 'my_salon_social_link_cb' );

if( ! function_exists( ' my_salon_get_the_archive_title' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function  my_salon_get_the_archive_title( $title ){

    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = get_the_author() ;
    }	else {
    	$title = ( single_month_title(' ',false) ); 
    }
return $title;
}
endif;
add_filter( 'get_the_archive_title', 'my_salon_get_the_archive_title' );

if( ! function_exists( 'my_salon_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function my_salon_change_comment_form_default_fields( $fields ){
    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'my-salon' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'my-salon' ) . '" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'my-salon' ) . '" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;
    
}
endif;
add_filter( 'comment_form_default_fields', 'my_salon_change_comment_form_default_fields' );

if( ! function_exists( 'my_salon_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function my_salon_change_comment_form_defaults( $defaults ){
    
    // Change the "cancel" to "I would rather not comment" and use a span instead
    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'my-salon' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    
    $defaults['label_submit'] = esc_attr__( 'Submit', 'my-salon' );
    
    return $defaults;
    
}
endif;
add_filter( 'comment_form_defaults', 'my_salon_change_comment_form_defaults' );