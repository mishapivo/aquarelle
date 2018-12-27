<?php
/**
 * Template part - News Section
 * @package Zovees
 */
    $zovees_news_title = get_theme_mod('zovees-news_title');
    $zovees_news_sub_title = get_theme_mod('zovees-news_sub_title');
    $zovees_news_section = get_theme_mod( 'zovees_news_section_hideshow','show');

    $news_args  = array(
        'post_type' => 'post',
        'posts_per_page' => 3
    ); 
    
    $news_query = new wp_Query( $news_args );
    if( $zovees_news_section == "show" ) : ?>

    <!-- Start blog section -->
    <div class="content-section ptb-100 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                    <div class="main-heading-content text-center">
                        <?php if($zovees_news_title != "")
                        {?>
                            <h2><?php echo esc_html($zovees_news_title); ?><span>.</span></h2>
                        <?php }?>
                        <p><?php echo esc_html($zovees_news_sub_title); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    while( 
                        $news_query->have_posts()) :
                        $news_query->the_post();
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-post">
                        <div class="blog-thumb">
                            <?php if( has_post_thumbnail() ): ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('zovees-page-thumbnail', array('class' => 'img-responsive')); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="blog-text text-center">
                            <ul class="meta-right">
                                <li>
                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user"></i> <?php echo esc_html__('By','zovees'); ?> <?php the_author(); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-calendar"></i> <?php the_time( "j M Y" ); ?></a>
                                </li>
                            </ul>

                            <?php the_title( '<h3><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h3>'); ?>

                            <?php the_excerpt(); ?>
                            
                            <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html__( 'Read More', 'zovees' ); ?></a>

                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                ?>  
            </div>
        </div>
    </div>
    <!-- End blog section -->
<?php endif; ?>