<?php
/**
* @package Zovees
*/
?>


<div id="post-<?php the_ID(); ?>" class="single-blog-post mb-40">
    
    <div class="blog-thumb">
        <?php if( has_post_thumbnail() ): ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('zovees-page-thumbnail', array('class' => 'img-responsive')); ?>
            </a>
        <?php endif; ?>
    </div>

    <div class="blog-text">
        <ul class="meta-right">
            <li>
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user"></i> <?php echo esc_html__('By','zovees'); ?> <?php the_author(); ?>
                </a>
            </li>
            <li>
                <a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-calendar"></i> <?php ucwords( the_time( "j M Y" ) ); ?></a>
            </li>

            <li>
                <a><i class="fa fa-comment-o" aria-hidden="true"></i> <?php comments_number( __('0 Comment', 'zovees'), __('1 Comment', 'zovees'), __(' %', 'zovees') ); ?></a>
            </li>
        </ul>

        <?php the_title( '<h3><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h3>'); ?>
        
        <p class="entry-meta"><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html__( 'Read More', 'zovees' ); ?></a>

    </div>
</div>