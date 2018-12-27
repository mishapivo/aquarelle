<?php get_header(); ?>

<div class="container m_con retaina_p0">
	<main <?php post_class('contents post_content f_box f_col box_shadow'); ?>>
		<article id="post_body" class="post_body">
			<div class="post_item posi_re mlr0 item_thum"><div class="thum_on_title posi_ab f_box jc_c ai_c"><h1 class="post_title fw8 ta_c">404<br /><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'simple-days' ); ?></h1></div>
			<figure class="on_thum fit_box_img_wrap">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}else{
					$url = get_theme_mod( 'simple_days_404_img' , SIMPLE_DAYS_THEME_URI .'assets/images/404.jpg');
					$size = getimagesize($url);
					$width = $size[0];
					$height = $size[1];
					var_dump($size);
					echo '<'.( YA_AMP ? 'amp-img layout="responsive"' : 'img' ).' src="'.esc_url($url).'" width="'.esc_attr($width).'px" height="'.esc_attr($height).'px" />';
				}
				?>
			</figure>
		</div>

		<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'simple-days' ); ?>
		<?php get_search_form(); ?>

		<?php  
		if ( is_active_sidebar( 'under_post' ) ) : ?>
			<div class="under_post_widget">
				<?php dynamic_sidebar( 'under_post' ); ?>
			</div>
		<?php endif; ?>

	</article>

</main>
<?php if(SIMPLE_DAYS_SIDEBAR)get_sidebar(); ?>

</div>


<?php get_footer();
