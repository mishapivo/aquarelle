<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Digimag Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		digimag_lite_print_single_category();
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		?>
		<div class="entry-meta">
			<?php
				digimag_lite_posted_by( false );
				digimag_lite_posted_on();
			?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php get_template_part( 'template-parts/content', 'media' ); ?>

	<div class="entry-content">
		<?php
		$main_content = apply_filters( 'the_content', get_the_content( '' ) );
		if ( in_array( get_post_format(), array( 'audio', 'video' ), true ) ) {
			$media = get_media_embedded_in_content( $main_content, array(
				'audio',
				'video',
				'object',
				'embed',
				'iframe',
			) );
			$main_content = str_replace( $media, '', $main_content );
		}

		echo $main_content; /* WPCS: xss ok. */

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'digimag-lite' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-footer-left">
			<p class="link-more">
				<a href="<?php the_permalink(); ?>" class="tag-alike-style  more-link"><?php echo esc_html__( 'Read More', 'digimag-lite' ); ?></a>
			</p>
		</div>
		<div class="entry-footer-right">
			<?php
			digimag_lite_print_comment_link();
			if ( function_exists( 'sharing_display' ) ) {
				sharing_display( '', true );
			}
			?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
