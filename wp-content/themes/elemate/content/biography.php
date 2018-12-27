<?php
/**
 * Displays Author Bio
 *
 * @package EleMate
 * @since 1.0.0
 * @version 1.0.0
 */

?>
<div class="entry-author">
	<div class="author-avatar">
		<?php
			$author_bio_avatar_size = apply_filters( 'elemate_author_bio_avatar_size', 100 );
			echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->

	<div class="author-heading">
		<h2 class="author-title"><?php esc_html_e( 'Published by', 'elemate' ); ?> <?php echo get_the_author(); ?></h2>
	</div><!-- .author-heading -->

	<p class="author-bio">
		<?php the_author_meta( 'description' ); ?>
		<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php printf( esc_html__( 'View all posts by %s', 'elemate' ), get_the_author() ); ?>
		</a>
	</p>
</div><!-- .entry-author -->
