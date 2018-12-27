<?php
/**
 * Template part for Slider
 *
 * @package IWeb_Pathology
 */

?>

<div class="i-content">

	<div class="i-slideshow">
		<?php
			$iweb_patho_slider_cat = esc_html( get_theme_mod( 'iwebpatho_slider_category' ) );
				$iweb_patho_slider_args = array(
					'cat' => $iweb_patho_slider_cat,
					'post_status' => 'publish',
					'posts_per_page' => 4,
				);
				$iweb_patho_slider_query = new WP_Query( $iweb_patho_slider_args );
				$iweb_patho_sld = 0;
				if ( get_theme_mod( 'iwebpatho_slider_category' ) != null ) :
					function iweb_pathology_postcount( $id ) {
						$category = get_category( $id );
						return $category->category_count;
					}
					$iwebcount = iweb_pathology_postcount( $iweb_patho_slider_cat );
				else :
					$iwebcount = 0;
				endif;
		?>

		<?php if ( get_theme_mod( 'iwebpatho_display_mslider','1' ) === '1' || '1' == $iwebcount ) : ?>
			<?php
			if ( $iweb_patho_slider_query->have_posts() ) :
					  $iweb_patho_slider_query->the_post();
		?>
			<?php if ( has_post_thumbnail() ) : ?>
				<?php $iwebpatho91_img = get_the_post_thumbnail_url( get_the_ID(),'full' ); ?>
			<?php else : ?>
				<?php $iwebpatho91_img = esc_url( get_template_directory_uri() . '/img/no_image.jpg' );?>
			<?php endif; ?>
			<div class="iSlides1" style="background-image: url( <?php echo esc_url( $iwebpatho91_img ); ?> );">
				<div class="itext">
					<h1><?php the_title();?></h1>
					<?php add_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
					add_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );
						the_excerpt();
					remove_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
					remove_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );?>
				</div>
			</div>
				<?php endif; ?>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'iwebpatho_display_mslider' ) === '0' and '1' < $iwebcount ) : ?>
		<?php
		if ( $iweb_patho_slider_query->have_posts() ) :
			while ( $iweb_patho_slider_query->have_posts() ) :
					  $iweb_patho_slider_query->the_post();
		?>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php $iwebpatho91_img = get_the_post_thumbnail_url( get_the_ID(),'full' ); ?>
		<?php else : ?>
			<?php $iwebpatho91_img = esc_url( get_template_directory_uri() . '/img/no_image.jpg' );?>
		<?php endif; ?>

		<div class="iSlides iSlides1" style="background-image: url(<?php echo esc_url( $iwebpatho91_img );?>);">
			<div class="itext sldanimtx">
				<?php if ( 0 == $iweb_patho_sld ) : ?>
					<h1 class="iwebwords1"><?php the_title();?></h1>
					<?php add_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
					add_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );
						the_excerpt();
					remove_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
					remove_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );?>
				<?php endif; ?>
				<?php if ( 1 == $iweb_patho_sld ) : ?>
					<h1 id="iSlides2-h1"><?php the_title();?></h1>
					<?php add_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
						add_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );
							the_excerpt();
						remove_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
						remove_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );?>
				<?php endif; ?>
				<?php if ( 2 == $iweb_patho_sld ) : ?>
					<h1 id="iSlides3-h1"><?php the_title();?></h1>
					<?php add_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
						add_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );
							the_excerpt();
						remove_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
						remove_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );?>
				<?php endif; ?>
				<?php if ( 3 == $iweb_patho_sld ) : ?>
					<h1 id="iSlides4-h1"><?php the_title();?></h1>
					<?php add_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
						add_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );
							the_excerpt();
						remove_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
						remove_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );?>
				<?php endif; ?>
			</div>
		</div>
		<?php $iweb_patho_sld++ ;?>
		<?php  endwhile; ?>
		<?php endif; ?>
		<?php endif; ?>
	</div>
</div><!-- i-content div -->
