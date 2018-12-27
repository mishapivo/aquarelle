<?php
/**
 * Template part for displaying standard post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CPMmagz
 */
?>
<?php
    //Get the alt and title of the image
    global $post;
    $post_thumbnail_id = get_post_thumbnail_id($post->ID);
    $attachment =  get_post($post_thumbnail_id);

    if (! is_single()) {
        if (has_post_thumbnail()) :
        // If the post has thumbnail
        $image_id = get_post_thumbnail_id();
        $image_url = wp_get_attachment_image_src($image_id, 'cpmmagz-post-image');
        $image_url1 = esc_url($image_url[0]);
    ?>

    <!-- If the page is not single display this block. -->
    <div class="card-image valign-wrapper" data-bg="<?php echo esc_url( $image_url1 ); ?>">
        <a href="<?php the_permalink();?>" class="fulla"></a>
        <span class="card-title"><i class="fa fa-pencil"></i></span>
    </div>

    <?php else : ?>
        <!-- If the Post doesnot have any thumbnail -->
        <div class="no-image card-image valign-wrapper">
            <a href="<?php the_permalink();?>" class="card-title"><i class="fa fa-pencil"></i></a>
        </div>
    <?php endif;?>

    <?php  }  else {
        if (has_post_thumbnail()):
        // If the post has thumbnail
        $image_id = get_post_thumbnail_id();
        $image_url = wp_get_attachment_image_src($image_id, 'full');
        $image_url1 = esc_url($image_url[0]);
    ?>

    <!-- If the page is single display this block. -->
    <div class="card-image valign-wrapper">
        <img src="<?php echo esc_url( $image_url1 );?>" title="<?php echo esc_attr($attachment->post_title); ?>" alt="<?php echo esc_attr(get_post_meta($attachment->ID, '_wp_attachment_image_alt', true));?>" >
        <span class="card-title"><i class="fa fa-pencil"></i></span>
    </div>
    Hello single post
    <?php else : ?>

    <!-- If the Post doesnot have any thumbnail -->
        <div class="no-image card-image valign-wrapper">
            <a href="<?php the_permalink();?>" class="card-title"><i class="fa fa-pencil"></i></a>
        </div>
    <?php endif; ?>

<?php } ?>
