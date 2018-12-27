<?php 

/* For Single page Results
*/

?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <article class="single-article">
            <?php if(has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" class="post-img-link">
                    <?php the_post_thumbnail('medipress-page-thumbnail'); ?>
                </a>
            <?php endif; ?>
                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="post-info-row">
                    <div class="post-info-item">
                        <i class="fa fa-clock-o"></i>
                        <?php esc_html__( 'Posted at', 'medipress' ); ?>
                        <?php the_date();?>                                    
                    </div>
                        <div class="post-info-item">
                            <i class="fa fa-user"></i>
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                <?php the_author(); ?>
                            </a>
                        </div>
                        <div class="post-info-item">
                            <i class="fa fa-comment-o"></i><?php comments_number( __('0 Comment', 'medipress'), __('1 Comment', 'medipress'), __('% Comments', 'medipress') ); ?>
                        </div>

                    <?php if(has_category()){ ?>
                        <div class="post-info-item">     
                            <i class="fa fa-folder-open"></i><?php the_category(',&nbsp;'); ?>
                        </div>
                    <?php } ?>
                </div>
                    <?php the_content(); ?>  
					<?php if(has_tag())
					{?>		
						<div class="article-info article-info-tag">
							<h3> <?php echo esc_html__('Tags: ', 'medipress' ); ?></h3>
							<?php if (has_tag()) : ?>
								<?php echo esc_html__(' ', 'medipress' ); ?><?php the_tags( '&nbsp;'); ?>
							<?php endif; ?>  
						</div>
					<?php
					}?>	
        </article>
                        
        <div class="comment-box">
           <?php 
            if ( comments_open() || get_comments_number() ) :
                 comments_template();
            endif; 
          ?> 
        </div>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'medipress' ),
            'after'  => '</div>',
        ) );
        ?>