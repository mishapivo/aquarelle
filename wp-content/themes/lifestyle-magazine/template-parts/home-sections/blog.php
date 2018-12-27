<?php $sidebar_position = get_theme_mod( 'blog_post_layout', 'sidebar-right' ); ?>
<?php
	$width_class = 'col-sm-9';
	if( $sidebar_position == 'no-sidebar' ) {
		$width_class = 'col-sm-12';
	}
?>
<div class="content-area">
<div class="container">
	<div class="row">
		<?php if( $sidebar_position == 'sidebar-left' && is_active_sidebar( 'sidebar-left' ) ) : ?>
			<div class="col-sm-3"><?php dynamic_sidebar( 'sidebar-left' ); ?></div>
		<?php endif; ?>
		<div class="<?php echo esc_attr( $width_class ); ?>">

			<?php
				$sections = get_theme_mod( 'lifestyle_magazine_sort_homepage', array(
				    'slider',
				    'pages',
				    'blog-list',
				    'category-display',
				) );

				if ( ! empty( $sections ) && is_array( $sections ) ) :

					foreach ( $sections as $section ) :
						get_template_part( 'template-parts/home-sections/' . $section, $section );
					endforeach;

				endif;
			?>
					
		</div>
		<?php if( $sidebar_position == 'sidebar-right' ) : ?>
			<div class="col-sm-3"><?php get_sidebar(); ?></div>
		<?php endif; ?>
	</div>
</div>
</div>