<?php
/**
 * The template for displaying all pages.
 * @package Ecommerce Solution
 */

get_header(); ?>

<div id="content_box" class="container">
    <div class="main-wrapper">       
            <?php
            while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title();?></h1>
                <?php if(has_post_thumbnail()) { ?>
                    <div class="feature-box">   
                        <img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
                    </div>
                <?php } ?>
                <?php the_content();

                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ecommerce-solution' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ecommerce-solution' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
                
                ?>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || '0' != get_comments_number() ) {
                        comments_template();
                    }
                ?>
            <?php endwhile; // end of the loop. ?>                    
        <div class="clear"></div>    
    </div>
</div>

<?php get_footer(); ?>