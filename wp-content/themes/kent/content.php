<?php
/**
 * Generic content
 *
 * @package Kent
 */

	$image = get_the_post_thumbnail( get_the_ID(), 'kent-archive' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="posttitle">
		<a href="<?php the_permalink() ?>" title="<?php printf( __( 'Permalink for: %s', 'kent' ), esc_attr( get_the_title() ) ); ?>" rel="bookmark">
			<?php the_title(); ?>
		</a>
	</h2>
	<section class="excerpt">
<?php
	if ( $image ) {
?>
	<a href="<?php echo esc_url( get_permalink() ); ?>" class="thumbnail">
		<?php echo $image; ?>
	</a>
<?php
	}
	the_excerpt();
?>
		<p class="postmetadata"><a href="<?php the_permalink(); ?>" class="reading-time"><?php printf( __( 'Estimated reading time: %s', 'kent' ), kent_estimated_reading_time() ); ?></a></p>
	</section>
</article>