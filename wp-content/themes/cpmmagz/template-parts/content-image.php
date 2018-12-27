<?php
/**
 * The template for displaying posts for the Image Post Format
 *
 * @package CPMmagz
 */

?>
<?php
    $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
    $attachment = get_post( $post_thumbnail_id );
    if ( ! is_single() ) {
        // If post is not single.
        if ($post_thumbnail_id) : ?>
            <!-- If post has a thumbnail -->
            <div class="card-image valign-wrapper" data-bg="<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id(), 'cpmmagz-post-image')[0]); ?>">
            	<a href="<?php the_permalink();?>" class="fulla"></a>
                <span class="card-title"><i class="fa fa-picture-o"></i></span>
            </div>
        <?php else : ?>

            <!-- If the Post doesnot have any thumbnail -->
            <div class="no-image card-image valign-wrapper">
                <a href="<?php the_permalink();?>" class="card-title"><i class="fa fa-picture-o"></i></a>
            </div>

    <?php endif;?>

    <?php } else {
        if (has_post_thumbnail()) :  // If the post has thumbnail.
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id, 'full');
            $image_url1 = $image_url[0];
    ?>
        <!-- If post is single with featured image -->
        <div class="card-image valign-wrapper">
            <img src="<?php echo esc_url( $image_url1 );?>" title="<?php echo esc_attr($attachment->post_title); ?>" alt="<?php echo esc_attr(get_post_meta($attachment->ID, '_wp_attachment_image_alt', true));?>" >
            <span class="card-title"><i class="fa fa-picture-o"></i></span>
        </div>

    <?php else : ?>
        <!-- If the Post is single and doesnot have any thumbnail -->
        <div class="no-image card-image valign-wrapper">
            <a href="<?php the_permalink();?>" class="card-title"><i class="fa fa-picture-o"></i></a>
        </div>
        <?php endif; ?>
    <?php
}
?>
