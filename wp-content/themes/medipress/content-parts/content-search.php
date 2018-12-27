<?php 
/* For Search Results
*/
?>
    
  <div class="post">
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
          </div>
              <?php the_excerpt(); ?>                 
              <a class="button button-type-3-xs" href="<?php the_permalink(); ?>">
                <?php echo esc_html__('Read More', 'medipress'); ?> 
              </a>
  </div>