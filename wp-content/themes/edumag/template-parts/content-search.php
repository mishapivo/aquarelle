<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

$options = edumag_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" data-wow-delay="0.1s" data-wow-duration="0.4s" <?php post_class( 'wow fadeInUp' ); ?>>

	<div class="image-wrapper">
		<?php if ( has_post_thumbnail() ) : ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail( 'large', $attr = array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
			</a><!-- end .post-thumbnail -->
		<?php endif; 
		if ( 'post' === get_post_type() ) : ?>
			<p class="entry-meta">
				<?php edumag_posted_on(); ?>
			</p><!-- .entry-meta -->
		<?php endif; ?>
	</div><!-- .image-wrapper -->
	
	<header class="entry-header">
		<span class="cat-links">
          	<span class="screen-reader-text"><?php esc_html_e( 'Categories', 'edumag' ); ?></span>
           	<?php the_category( $separator = ' ' ); ?>
        </span><!-- .cat-links --> 
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<p>
			<?php
				// display excerpt content
				the_excerpt();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edumag' ),
					'after'  => '</div>',
				) );
			?>
		</p>
	</div><!-- .entry-content -->

	<div class="read-more">
		<a href="<?php the_permalink(); ?>" class="btn btn-blue"><?php echo esc_html( $options['read_more_text'] ); ?></a>
	</div><!-- .read-more -->

</article><!-- #post-## -->
