<?php
/**
 * Template part for displaying gallery post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CPMmagz
 */
?>
<?php
    //Get the alt and title of the image
	global $post;
    $image_url = get_post_gallery_images($post);
    $post_thumbnail_id = get_post_thumbnail_id($post->ID);
    $attachment =  get_post($post_thumbnail_id);
?>

    <?php if (! is_single()) {
        // If the post is not single
        if ($image_url) {
    ?>

    <div class="card-image card-gallery">

        <div class="cpmagz-post-gallery" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplaySpeed": 5000, "infinite": true, "arrows":true, "pauseOnHover":true, "autoplay": true}'>
         	<?php foreach ($image_url as $key => $images) { ?>
                <div class="post-gallery-item">
                    <a href="<?php the_permalink();?>" class="fulla">
                        <div class="gallery-item fulla" data-bg="<?php echo esc_url($images); ?>" alt= "<?php echo esc_attr($attachment->post_excerpt);?>">
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>

        <span class="card-title"><i class="fa fa-camera-retro"></i></span>
    </div>

    <?php }
    //End no gallery image
        else {
            ?>
            <div class="no-image card-image card-gallery valign-wrapper">
                <a href="<?php the_permalink();?>" class="card-title"><i class="fa fa-camera-retro"></i></a>
            </div>
            <?php
        }
    ?>
    <?php }
        // End not single post.
        else {
        //If the post is  single.
            if ($image_url) {
            //If has gallery image in single.
    ?>

            <div class="card-image card-gallery">

                <div class="cpmagz-post-gallery" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplaySpeed": 5000, "infinite": true, "arrows":true, "pauseOnHover":true, "autoplay": true}'>
                    <?php foreach ($image_url as $key => $images) { ?>
                    <div class="post-gallery-item">
                        <a href="<?php the_permalink(); ?>" data-lightbox="gallery" data-title="">
                            <div class="gallery-item fulla" data-bg="<?php echo esc_url($images); ?>" alt= "<?php echo  esc_attr($attachment->post_excerpt);?>">
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>

                <span class="card-title"><i class="fa fa-camera-retro"></i></span>
            </div>

    <?php } else {
        //if no gallery images in single
    ?>
        <div class="no-image card-image card-gallery valign-wrapper">
            <a href="<?php the_permalink();?>" class="card-title"><i class="fa fa-camera-retro"></i></a>
        </div>
        <?php } ?>
<?php }
// End if single?>
