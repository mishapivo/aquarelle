<?php
defined( 'ABSPATH' ) || exit;
/**
 * Related Posts
 *
 * @package Simple Days
 */

function simple_days_related_post(){

	$max_post_num = get_theme_mod( 'simple_days_posts_related_post_number','9');
	if( $max_post_num < 0 ) return;
	$post_type = 'post';
	$related_title = __( 'Related Posts', 'simple-days' );
	return simple_days_related_out( $max_post_num , $post_type , $related_title );

}
function simple_days_related_page(){

	$max_post_num = get_theme_mod( 'simple_days_page_related_post_number','9');
	if( $max_post_num < 0 ) return;
	$post_type = 'page';
	$related_title = __( 'Related Pages', 'simple-days' );

	return simple_days_related_out( $max_post_num , $post_type , $related_title );

}



function simple_days_related_out( $max_post_num , $post_type , $related_title ){


	$rel_count = 0;
	$rel_posts = array();
	$tag_ids = array();
	$get_page_id = get_the_ID();

	if ( has_tag() ) {
		
		$tags = wp_get_post_tags($get_page_id);
		foreach($tags as $tag):
			array_push( $tag_ids, $tag->term_id);
		endforeach ;
		$tag_args = array(
			'post_type' => $post_type,
			'post__not_in' => array($get_page_id),
			'posts_per_page'=> $max_post_num,
			'tag__in' => $tag_ids,
			'orderby' => 'rand',
		);
		$rel_posts = get_posts($tag_args);
		$rel_count = count($rel_posts);
	}

	if(!has_tag() || $max_post_num > $rel_count){
		
		

		$categories = get_the_category($get_page_id);
		$category_ID = array();
		foreach($categories as $category):
			array_push( $category_ID, $category ->cat_ID);
		endforeach ;
		
		$cat_args = array(
			'post_type' => $post_type,
			'post__not_in' => array($get_page_id),
			'tag__not_in' => $tag_ids,
			'posts_per_page'=> ($max_post_num - $rel_count),
			'category__in' => $category_ID,
			'orderby' => 'rand',
		);
		$cat_posts = get_posts($cat_args);
		$rel_posts = array_merge($rel_posts, $cat_posts);
		shuffle($rel_posts);
	}

	
	
	if(  count( $rel_posts ) > 0 ):
		?>
		<aside id="rp_wrap" class="post_item mtb30">
			<h4 class="item_title"><?php echo esc_html( $related_title ); ?></h4>
			<div id="related_posts" class="o_s_t mlr0 f_box">
				<?php

				foreach ($rel_posts as $post): ?>
					<a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="rp_box non_hover opa7 fit_box_img_wrap rp_box_img box_shadow">
						<div>
							<?php
							$thumurl = simple_days_get_thumbnail( $post->ID , 'medium' , $post);
							$title = $post ->post_title;
							echo '<'.((YA_AMP)?'amp-img':'img').' src="'.esc_url($thumurl[0]).'" class="scale_13 trans_10" width="'.esc_attr($thumurl[1]).'" height="'.esc_attr($thumurl[2]).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'" />';
							?>
						</div>
						<div class="rp_box_title f_box ai_c jc_c"><span><?php echo esc_attr(mb_strimwidth($title, 0, 42, "...", 'UTF-8')); ?></span></div>
					</a>
					<?php
				endforeach;

				?>
			</div>
		</aside>
	<?php endif;
}

