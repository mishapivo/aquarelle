<?php 
// To display Blog Post section on front page
?>
<?php 
$medipress_blog_section = get_theme_mod('medipress_blog_section_hideshow','show');
$medipress_blog_title = get_theme_mod('medipress_blog_title'); 
$medipress_blog_subtitle = get_theme_mod('medipress_blog_subtitle'); 

if ($medipress_blog_section =='show') { 
?>

<!-- Start blog section -->
     <section class="section">
        <div class="container">
            <div class="title-block title-medical">
                <?php if($medipress_blog_title !="") { ?>
                    <h2 class="title no-after"><?php echo esc_html($medipress_blog_title); ?></h2>
                <?php } if($medipress_blog_subtitle !=""){?>
                    <div class="sub-title">
                        <?php echo esc_html($medipress_blog_subtitle); ?>                
                    </div>
                <?php } ?>
            </div>
            <div class="row medical-news">
                <?php 
                    $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 4 ) );
                    if ( $latest_blog_posts->have_posts() ) : 
                        while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); 
                ?>
                <div class="col-sm-6 col-md-3">
                    <div class="latest-post">
                        <a href="<?php the_permalink() ?>" class="latest-post-link">
                            <?php the_post_thumbnail('medipress-blog-front-thumbnail'); ?>
						   <div class="post-layer">
                                <span class="post-l-ico">
                                    <i class="fa fa-bars"></i>
                                </span>
                            </div>
                        </a>
                        <?php if(!has_post_thumbnail()) : ?>
                        <div class="l-post">
                            <?php else : ?>
                            <div class="l-post-info">
                            <?php endif; ?>
                                <?php echo esc_html__( 'By', 'medipress' ); ?>
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"> <?php the_author(); ?> </a><?php echo esc_html__('/', 'medipress'); ?> <?php the_time( get_option( 'date_format' ) ); ?>
                            </div>
                            <h3 class="l-post-title">
                                <a href="<?php the_permalink();?>"> <?php the_title(); ?></a>
                            </h3>
                            <?php the_excerpt(); ?>
                            <a class="read" href="<?php the_permalink(); ?>">
                                <?php echo esc_html__('Read More', 'medipress'); ?> 
                            </a>
                        </div>
                </div>
                <?php 
                    endwhile; 
                    endif;
                ?>
            </div>
        </div>
    </section>
<!-- blog section ends -->
<?php } ?>