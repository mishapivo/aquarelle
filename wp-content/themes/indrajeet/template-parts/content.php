<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Indrajeet
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>


	<?php if ( has_post_thumbnail() ) :?>
			<div class="post-thumbnail">
		    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		        <?php the_post_thumbnail('full', array('class' => 'card-img-top')); ?>
		    </a>
		</div><!--  .post-thumbnail -->
	<?php endif; ?>
	<div class="card-body">
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
					indrajeet_posted_on();
					indrajeet_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->


		<div class="entry-content">
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__(  'Continue reading %s <span class="meta-nav">&rarr;</span>', 'indrajeet' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'indrajeet' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

	</div>	
</article><!-- #post-<?php the_ID(); ?> -->
