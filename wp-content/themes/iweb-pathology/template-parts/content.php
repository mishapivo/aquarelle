<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IWeb_Pathology
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				iweb_pathology_posted_on();
				iweb_pathology_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php iweb_pathology_post_thumbnail(); ?>
	<div class="entry-meta">
		<?php the_category( ' | ' ) ?>
	</div>
	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'iweb-pathology' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
		?>
	<!-- Next-Previous Post  -->       
		<div class="ppost"><?php previous_post_link( __( 'Previous post: <span>%link</span>', 'iweb-pathology' ), '[ %title ]', __( 'Previous in category', 'iweb-pathology' ), true ); ?> </div>
		<div class="npost"><?php next_post_link( __( 'Next post: <span>%link</span>', 'iweb-pathology' ), '[ %title ]', __( 'Next post in category', 'iweb-pathology' ), true ); ?> </div>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
