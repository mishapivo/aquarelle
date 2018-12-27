<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Indrajeet
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
		    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		        <?php the_post_thumbnail('full', array('class' => 'rounded')); ?>
		    </a>
		</div><!--  .post-thumbnail -->
	<?php endif; ?>
	<div class="card-body">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				indrajeet_posted_on();
				indrajeet_posted_by();
				?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	</div>	

</article><!-- #post-<?php the_ID(); ?> -->
