<?php
/**
 * The template for displaying Author bios
 *
 * @package Seasonal
 */
?>

<div class="author-info" itemscope="" itemtype="http://schema.org/Person">
    
	<div class="author-avatar" itemprop="image">
		<?php
		/**
		 * Filter the author bio avatar size.
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'seasonal_author_bio_avatar_size', 80 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<h3 class="author-title" itemprop="name"><?php _e( 'Published by', 'seasonal' ); ?><span class="author-name"><?php echo get_the_author(); ?></span></h3>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" itemprop="url">
				<?php printf( __( 'View all posts by %s', 'seasonal' ), get_the_author() ); ?>
			</a>
		</p><!-- .author-bio -->

	</div><!-- .author-description -->
</div><!-- .author-info -->
