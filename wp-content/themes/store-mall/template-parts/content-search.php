<?php
/**
 * Template part for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moral
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	$img_url = '';
	if ( has_post_thumbnail() ) : 
		$img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	endif;
	?>
	<div class="featured-image" style="background-image: url('<?php echo esc_url( $img_url ); ?>');">
		<?php 
		if ( ! empty( $img_url ) ) : ?>
	    	<a href="<?php the_permalink(); ?>" class="featured-image-link"></a>
		<?php endif; ?>

	    <div class="entry-meta">
	        <?php
			store_mall_post_author(); 

			store_mall_posted_on(); 
			?>

	    </div><!-- .entry-meta -->
	</div><!-- .featured-image -->

	<div class="entry-container">
        <div class="entry-meta">
			<?php store_mall_entry_footer(); ?>
        </div><!-- .entry-meta -->

        <header class="entry-header">
            <?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
        </header>

        <div class="entry-content">
            <?php the_excerpt(); ?>
	        <div class="read-more-link">
			    <a href="<?php the_permalink(); ?>"><?php echo esc_html( get_theme_mod( 'store_mall_archive_excerpt', esc_html__( 'View the post', 'store-mall' ) ) ); ?></a>
			</div><!-- .read-more -->
	    	<?php store_mall_tags(); ?>

        </div><!-- .entry-content -->
        

    </div><!-- .entry-container -->
</article><!-- #post-<?php the_ID(); ?> -->
