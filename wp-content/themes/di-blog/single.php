<?php
get_header();
$single_layout = esc_attr( get_theme_mod( 'blog_single_layout', 'rights' ) );
?>
<div class="<?php if( $single_layout == 'rights' ) { echo 'col-md-8'; } elseif( $single_layout == 'lefts' ) { echo 'col-md-8 layoutleftsidebar'; } else { echo 'col-md-12'; } ?>">
	<?php
	while( have_posts() ) : the_post();

		get_template_part( 'template-parts/single/content', get_post_format() );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

		the_post_navigation( array(
			'prev_text'		=> __( '%title', 'di-blog' ),
			'next_text'		=> __( '%title', 'di-blog' ),
		) );

	endwhile;
	?>
</div>
<?php if( $single_layout == 'rights' || $single_layout == 'lefts' ) { get_sidebar(); } ?>
<?php get_footer(); ?>