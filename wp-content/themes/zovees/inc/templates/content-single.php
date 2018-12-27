<?php
/**
 * @package Zovees
 */
?>

<article id="post-<?php the_ID(); ?>" class="blog-post single-blog-post gray-bg">
    <div class="blog-thumb">
        <?php if( has_post_thumbnail() ): ?>

            <?php the_post_thumbnail('zovees-page-thumbnail', array('class' => 'img-responsive')); ?>
    
        <?php endif; ?>
    </div>
    <div class="blog-text">
        <ul class="meta-right">
            <li>
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                    <i class="fa fa-user"></i> <?php echo esc_html__('By ','zovees'); ?><?php the_author(); ?>
                </a>
            </li>
            <li>
                <a><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></a>
            </li>

            <li>
                <a href="<?php get_comments_link(); ?>"><i class="fa fa-comment-o"></i> <?php comments_number ( __('No comments','zovees'), __( 'comment 1','zovees'), __(' %','zovees') ); ?></a>
            </li>
			<?php if(has_tag())
			{?>				
				<li>
					<i class="fa fa-tag"></i>
					<?php echo esc_html__('', 'zovees' ); ?>
					<span class="tag-det">
						<?php
							$seperator = ''; // blank instead of comma
							the_tags('', $seperator, '');
						?>
					</span>
				</li>
			<?php
			}?>
        </ul>

        <h3><?php the_title(); ?></h3>

        <div class="content-wrapper">
            <div class="post-content-inner">
                <p><?php the_content(); ?></p>
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'zovees' ),
                        'after'  => '</div>',
                    ) );
                ?>
            </div>
        </div>
    </div>
</article>

<?php 
    if ( comments_open() ):
        comments_template(); 
    endif;
?>