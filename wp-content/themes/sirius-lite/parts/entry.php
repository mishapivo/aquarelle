<?php 

$sirius_blog_feed_meta_show = sirius_get_option('sirius_blog_feed_meta_show');
$sirius_blog_feed_date_show = sirius_get_option('sirius_blog_feed_date_show');
$sirius_blog_feed_category_show = sirius_get_option('sirius_blog_feed_category_show');
$sirius_blog_feed_author_show = sirius_get_option('sirius_blog_feed_author_show');
$sirius_blog_feed_comments_show = sirius_get_option('sirius_blog_feed_comments_show');
$sirius_blog_feed_sidebar_show = sirius_get_option('sirius_blog_feed_sidebar_show');
$sirius_blog_feed_post_format = sirius_get_option('sirius_blog_feed_post_format');
$sirius_blog_feed_post_images = sirius_get_option('sirius_blog_feed_post_images');

#post size
if(is_front_page() && ! is_home() ) {$sirius_blog_feed_post_format = 'Small'; } 
else { $sirius_blog_feed_post_format = $sirius_blog_feed_sidebar_show == 0 ? 'Small' : $sirius_blog_feed_post_format; }

$class = '';

#no thumbnail
if($sirius_blog_feed_post_images == 'None') { $class = $class . ' no-thumb'; }
else if($sirius_blog_feed_post_images == 'Available' && !has_post_thumbnail()) { $class = $class . ' no-thumb'; }

#post format
$post_format = get_post_format();
$class = $class . ' ' . $post_format . ' wow fadeIn ';
?>

<div <?php post_class('entry ' . $class); ?> id="post-<?php the_ID(); ?>" >
    
    <?php get_template_part('parts/entry', 'image'); ?>
   
    <div class="entry-body">
        
        <?php /* Category */ 
        if($sirius_blog_feed_meta_show == 1 && $sirius_blog_feed_category_show == 1) { ?>
        <p class="entry-category"><?php echo get_the_category_list(', ') ?></p>
        <?php } ?>
        
        
        <?php /* Title */
        if(get_the_title() != '') { ?>
        <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
        <?php } else { ?>
        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo esc_html__('Post ID: ', 'sirius-lite'); the_ID(); ?></a></h3>
        <?php } ?>
        
        <?php /* Content */ 
        if($sirius_blog_feed_post_format == 'Small') { ?>
        <div class="entry-summary"><?php the_excerpt(); ?></div>
        <?php } else { ?>
        <div class="entry-full"><?php the_content(); wp_link_pages(); ?></div>
        <?php } ?>
        
        <?php /* Meta */
        if($sirius_blog_feed_meta_show == 1) { ?>
        <ol class="entry-meta">
            <?php if($sirius_blog_feed_date_show == 1) { ?><li><i class="fa fa-clock-o"></i> <?php echo get_the_date() ?></li><?php } ?>
            <?php if($sirius_blog_feed_comments_show == 1) { $comments_link = '<a href="'.esc_url(get_comments_link()).'">'. sprintf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'sirius-lite' ), number_format_i18n( get_comments_number() ) ) .'</a>'; ?><li><i class="fa fa-comment-o"></i> <?php echo $comments_link ?></li><?php } ?>
            <?php if($sirius_blog_feed_author_show == 1) { ?><li><i class="fa fa-user"></i> <?php the_author(); ?></li><?php } ?>
        </ol>
        <?php } ?>
        
        <p class="entry-more"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i></a></p>
        
    </div>
</div>