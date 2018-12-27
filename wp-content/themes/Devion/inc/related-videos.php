
<?php 
 
// get the custom post type's taxonomy terms
 
$custom_taxterms = wp_get_object_terms( $post->ID, 'genre', array('fields' => 'ids') );
// arguments
$args = array(
'post_type' => 'video_type',
'post_status' => 'publish',
'posts_per_page' => 4, // you may edit this number
'orderby' => 'rand',
'tax_query' => array(
    array(
        'taxonomy' => 'genre',
        'field' => 'id',
        'terms' => $custom_taxterms
    )
),
'post__not_in' => array ($post->ID),
);
$related_items = new WP_Query( $args );
// loop over query
if ($related_items->have_posts()) :

echo '<div class="rel-box">';
echo '<h3> Related Videos </h3>';
echo'<div class="row">';
while ( $related_items->have_posts() ) : $related_items->the_post();
?>

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
<?php
endwhile;
echo '</div>';
echo'</div>';
endif;
// Reset Post Data
wp_reset_postdata();
?>
 