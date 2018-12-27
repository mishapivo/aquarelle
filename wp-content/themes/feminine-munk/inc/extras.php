<?php 
/**
 * Standalone functions used in themes
 * 
 * @package Feminine_Munk
*/

/**
 * Return sidebar layouts for pages
 */
function feminine_munk_sidebar_layout(){
    global $post;

    if (get_post_meta( $post->ID, 'feminine_munk_sidebar_layout', true ) ) {
        return get_post_meta( $post->ID, 'feminine_munk_sidebar_layout', true );
    } else {
        return 'sidebar';
    }
}

/**
 * Callback function for Comments List
 */
if( !function_exists( 'feminine_munk_comment_list' ) ) {
    function feminine_munk_comment_list( $comment, $args, $depth ) {

        if ( 'div' == $args[ 'style' ] ) {
            $tag       = 'div ';
            $add_below = 'comment';
        } else {
            $tag       = 'li ';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag ?><?php comment_class( empty($args[ 'has_children' ] ) ? '' : 'parent' ) ?> >
        <?php if ( 'div' != $args[ 'style' ] ) { ?>
            <article class="comment-body">
        <?php } ?>
        <footer class="comment-meta">
            <div class="comment-author vcard">
                <?php if ( $args[ 'avatar_size' ] != 0 ) echo get_avatar( $comment, $args[ 'avatar_size' ] ); ?>
                <?php printf( '<b class="fn">%s</b> &nbsp;', get_comment_author_link() ); ?>
            </div>
            <div class="comment-metadata"><?php esc_html_e( '|&nbsp; Posted at&nbsp;', 'feminine-munk' ); ?><a href="<?php echo htmlspecialchars(get_comment_link( $comment->comment_ID ) ); ?>">
                <time datetime="<?php comment_date(); ?>">
                    <?php
                    /* translators: 1: date, 2: time */
                    printf(__( '%1$s , %2$s', 'feminine-munk' ), get_comment_time(), get_comment_date( 'F j' ) ); ?>
                </time>
                </a><?php edit_comment_link( __( '(Edit)', 'feminine-munk' ), '  ', '' );
                ?>
            </div>
        </footer>

        <div class="comment-content"><?php comment_text(); ?></div>

        <div class="reply">
            <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args[ 'max_depth' ] ) ) ); ?>
        </div>
        <?php if ( 'div' != $args[ 'style' ] ) { ?>
        </article>
    <?php }
    }
}

/**
 * Posted On
 */
if ( ! function_exists( 'feminine_munk_posted_on_time' ) ) {
    function feminine_munk_posted_on_time() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }
        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );

        echo '<span class="posted-on"><i class="fa fa-clock-o"  aria-hidden="true"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>';
    }
}

/**
 * Posted By
*/
if( ! function_exists( 'feminine_munk_posted_by' ) ) {
    function feminine_munk_posted_by() {
        echo '<span class="byline">By <a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
    }
}

/**
 * Blog Categories
*/
if( ! function_exists( 'feminine_munk_categories' ) ) {
    function feminine_munk_categories() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ', ', 'feminine-munk' ) );
            if ( $categories_list ) {
                /* translators: 1: list of categories. */
                printf( '<span class="category"><i class="fa fa-bookmark" aria-hidden="true"></i>' . $categories_list . '</span>'  ); // WPCS: XSS OK.
            }   
        }
    }
}

/**
 * Comments counts
 */
if ( ! function_exists( 'feminine_munk_comment_count' ) ) {
    function feminine_munk_comment_count() {
        
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments"><i class="fa fa-comment"></i>';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'feminine-munk' ),
                        array(
                            'span'  => array(
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
}

if( ! function_exists( 'feminine_munk_header_ads' ) ) :
/*
 *
 * Header Ads
 * 
*/
function feminine_munk_header_ads(){
    $ed_ads          = get_theme_mod( 'feminine_munk_ed_ads' ); //from customizer
    $target          = get_theme_mod( 'feminine_munk_open_link_diff_tab', '1' ) ? 'target="_blank"' : '';
    $header_ad       = get_theme_mod( 'feminine_munk_header_ad' ); //from customizer
    $header_ad_link  = get_theme_mod( 'feminine_munk_header_ad_link' ); //from customizer
    $header_ad_image = wp_get_attachment_image_src( $header_ad, 'full' );
    
    if( $ed_ads && $header_ad ){ ?>
        <div class="advertise">
            <?php if( $header_ad_link ) echo '<a href="' . esc_url( $header_ad_link ) . '" ' . $target . '>'; ?>
                <img src="<?php echo esc_url( $header_ad_image[0] ); ?>"  />
            <?php if( $header_ad_link ) echo '</a>'; ?>
        </div>
        <?php 
    } 
}
endif; 
add_action( 'feminine_munk_header_ads', 'feminine_munk_header_ads' );

if( ! function_exists( 'feminine_munk_before_post_ads' ) ) :
/*
 *
 * Before Post Ads
 * 
*/
function feminine_munk_before_post_ads(){
    $ed_ads               = get_theme_mod( 'feminine_munk_ed_ads' ); //from customizer
    $target               = get_theme_mod( 'feminine_munk_open_link_diff_tab', '1' ) ? 'target="_blank"' : '';
    $before_post_ad       = get_theme_mod( 'feminine_munk_before_post_ad' ); //from customizer
    $before_post_ad_link  = get_theme_mod( 'feminine_munk_before_post_ad_link' ); //from customizer
    $before_post_ad_image = wp_get_attachment_image_src( $before_post_ad, 'full' );
    
    if( $ed_ads && $before_post_ad ){ ?>
        <div class="advertise">
            <?php if( $before_post_ad_link ) echo '<a href="' . esc_url( $before_post_ad_link ) . '" ' . $target . '>'; ?>
                <img src="<?php echo esc_url( $before_post_ad_image[0] ); ?>"  />
            <?php if( $before_post_ad_link ) echo '</a>'; ?>
        </div>
        <?php 
    } 
}
endif; 
add_action( 'feminine_munk_before_post_ads', 'feminine_munk_before_post_ads' );


if( ! function_exists( 'feminine_munk_after_post_ads' ) ) :
/*
 *
 * after Post Ads
 * 
*/
function feminine_munk_after_post_ads(){
    $ed_ads               = get_theme_mod( 'feminine_munk_ed_ads' ); //from customizer
    $target               = get_theme_mod( 'feminine_munk_open_link_diff_tab', '1' ) ? 'target="_blank"' : '';
    $after_post_ad       = get_theme_mod( 'feminine_munk_after_post_ad' ); //from customizer
    $after_post_ad_link  = get_theme_mod( 'feminine_munk_after_post_ad_link' ); //from customizer
    $after_post_ad_image = wp_get_attachment_image_src( $after_post_ad, 'full' );
    
    if( $ed_ads && $after_post_ad ){ ?>
        <div class="advertise footer-advertise">
            <?php if( $after_post_ad_link ) echo '<a href="' . esc_url( $after_post_ad_link ) . '" ' . $target . '>'; ?>
                <img src="<?php echo esc_url( $after_post_ad_image[0] ); ?>"  />
            <?php if( $after_post_ad_link ) echo '</a>'; ?>
        </div>
        <?php 
    } 
}
endif; 
add_action( 'feminine_munk_after_post_ads', 'feminine_munk_after_post_ads' );

if( ! function_exists( 'feminine_munk_footer_ads' ) ) :
/*
 *
 * Footer Ads
 * 
*/
function feminine_munk_footer_ads(){
    $ed_ads          = get_theme_mod( 'feminine_munk_ed_ads' ); //from customizer
    $target          = get_theme_mod( 'feminine_munk_open_link_diff_tab', '1' ) ? 'target="_blank"' : '';
    $footer_ad       = get_theme_mod( 'feminine_munk_footer_ad' ); //from customizer
    $footer_ad_link  = get_theme_mod( 'feminine_munk_footer_ad_link' ); //from customizer
    $footer_ad_image = wp_get_attachment_image_src( $footer_ad, 'full' );
    
    if( $ed_ads && $footer_ad ){ ?>
        <div class="advertise">
            <?php if( $footer_ad_link ) echo '<a href="' . esc_url( $footer_ad_link ) . '" ' . $target . '>'; ?>
                <img src="<?php echo esc_url( $footer_ad_image[0] ); ?>"  />
            <?php if( $footer_ad_link ) echo '</a>'; ?>
        </div>
        <?php 
    } 
}
endif; 
add_action( 'feminine_munk_footer_ads', 'feminine_munk_footer_ads' );