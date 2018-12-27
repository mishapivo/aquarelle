<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moral
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
			<a href="<?php the_permalink(); ?>">
				<?php if ( is_sticky() ) { 
					the_post_thumbnail( 'full' ); 
				} else {
					the_post_thumbnail( 'store-mall-home-blog' );
				}
				?>
			</a>
		</div><!-- .featured-image -->
	<?php endif; ?>


	<div class="entry-container">
        <div class="entry-meta">
			<?php store_mall_posted_on(); ?>
        </div><!-- .entry-meta -->

        <header class="entry-header">
            <?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
        </header>
        
        <?php store_mall_post_author(); ?>

        <?php store_mall_entry_footer(); ?>

        <div class="entry-content">
            <?php the_excerpt(); ?>
	    	
	    	<?php store_mall_tags(); ?>

	    	<?php store_mall_cats(); ?>

        </div><!-- .entry-content -->
		<a href="<?php the_permalink(); ?>" class="more-link"><?php echo esc_html( get_theme_mod( 'store_mall_archive_excerpt', esc_html__( 'View the post', 'store-mall' ) ) ); ?><?php echo store_mall_get_svg( array( 'icon' => 'arrow-right' ) ); ?></a>
        
    </div><!-- .entry-container -->
</article><!-- #post-<?php the_ID(); ?> -->
