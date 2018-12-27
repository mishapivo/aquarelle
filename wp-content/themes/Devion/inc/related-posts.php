<?php $orig_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);
if ($tags) {
$tag_ids = array();
foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
$args=array(
'tag__in' => $tag_ids,
'post__not_in' => array($post->ID),
'posts_per_page'=>4, // Number of related posts that will be shown.
'caller_get_posts'=>1
);
$my_query = new wp_query( $args );
if( $my_query->have_posts() ) {
echo '<div class="rel-box"><h3>Related Posts</h3><div class="row">';
while( $my_query->have_posts() ) {
$my_query->the_post(); ?>
    <div class="col-sm-3 col-xs-6 ">
	    	<?php 
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
					$image = aq_resize( $img_url, 720, 400, true,true,true ); //resize & crop the image
					?>
					<?php if($image) : ?>
						<a href="<?php the_permalink(); ?>"><img src="<?php echo $image ?>" alt="" /></a>
					<?php endif; ?>
					<?php the_title(); ?>
   </div>
<? }
echo '</div></div>';
}
}
$post = $orig_post;
wp_reset_query(); ?>