<?php
/**
 * The template part for displaying single post content
 *
 * @package VW Health Coaching
 * @subpackage vw-health-coaching
 * @since VW Health Coaching 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="post-info">
        <span class="entry-date"><?php the_date(); ?></span><span>|</span>
        <span class="entry-author"> <?php the_author(); ?></span><span>|</span>
        <span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-health-coaching'), __('0 Comments', 'vw-health-coaching'), __('% Comments', 'vw-health-coaching') ); ?> </span>
    </div>
    <h2><?php the_title(); ?></h2>
    <?php if(has_post_thumbnail()) { ?>
        <div class="feature-box">   
            <img src="<?php the_post_thumbnail_url('full'); ?>" >
        </div>
        <?php } the_content();
        the_tags(); ?>
        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
        comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'vw-health-coaching' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'vw-health-coaching' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'vw-health-coaching' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'vw-health-coaching' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-health-coaching' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }
    ?>
</div>