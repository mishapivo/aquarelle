<?php 
$post_format = get_post_format();

$sirius_blog_feed_sidebar_show = sirius_get_option('sirius_blog_feed_sidebar_show');
$sirius_blog_feed_post_images = sirius_get_option('sirius_blog_feed_post_images');

$image_size = 'sirius-thumb';
if(is_front_page() && ! is_home() ) {$image_size = 'sirius-thumb';} 
else { $image_size = $sirius_blog_feed_sidebar_show == 1 ? 'sirius-large' : 'sirius-thumb'; }

$show_video = false; $sirius_show_entry_image = false;
$sirius_post_meta = get_post_meta(get_the_ID(),'_video_post_meta', TRUE);
if($sirius_post_meta != '' && array_key_exists ('youtube_link', $sirius_post_meta)) { $show_video = true; } else { $sirius_show_entry_image = true; } 
?>

<?php if($sirius_blog_feed_post_images == 'None') { ?><div class="entry-thumb"></div><?php } else { ?>
<div class="entry-thumb <?php if($show_video) echo $post_format; ?>">
    <?php 

        /* Video */
        if($post_format == 'video' && $show_video) { ?>
            <iframe width="100%" height="315" src="<?php echo esc_url($sirius_post_meta['youtube_link']); ?>" frameborder="0" allowfullscreen></iframe>
            <?php 
        } 
        
        /* Featured Image */
        if($post_format != 'video' || $sirius_show_entry_image) {
            if($sirius_blog_feed_post_images == 'Always' || $sirius_blog_feed_post_images == 'Available') {
                if(has_post_thumbnail()) { ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $image_size, array( 'alt' => the_title_attribute( array('echo' => false) ), 'class'=>'img-responsive' ) ); ?></a>
                <?php } else if($sirius_blog_feed_post_images == 'Always'){ ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(sirius_get_sample_image($image_size)) ?>" alt="<?php the_title_attribute() ?>" class="img-responsive" /></a> <?php }
            }
        } 

    ?>
</div>
<?php } ?>
    
    