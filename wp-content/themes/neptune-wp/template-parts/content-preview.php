<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Neptune WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>
	<div class="col-4-12">
	<a href="<?php the_permalink(); ?>">
	<?php 	if ( has_post_thumbnail() ) { ?>
	
				<?php the_post_thumbnail('medium'); ?>

	<?php }else {
		echo '<img src='.get_template_directory_uri().'/img/default-image.jpg >';
	} ?>
	</a>
	</div>

	<div class="col-8-12">
	<header class="entry-header">
		<?php
	
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		 ?>
		<div class="entry-meta">
			<?php neptune_wp_posted_on(); ?>
		</div><!-- .entry-meta -->

	<?php the_excerpt(); ?>
	</header><!-- .entry-header -->

	</div>

	
</article><!-- #post-<?php the_ID(); ?> -->
