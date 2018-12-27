<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package elementare
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="half-content-total">
		<?php
			if ( '' != get_the_post_thumbnail() ) {
				echo '<div class="half-content-image">';
				echo '<div class="entry-featuredImg"><a href="' .esc_url(get_permalink()). '">';
				the_post_thumbnail('elementare-the-post-small');
				echo '</a></div></div>';
			}
		?>
		<div class="half-content-text">
			<header class="entry-header">
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php elementare_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif;
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			<footer class="entry-footer">
				<span class="read-more"><a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read More', 'elementare') ?><i class="fa fa-caret-right spaceLeft" aria-hidden="true"></i></a></span>
			</footer><!-- .entry-footer -->
		</div>
	</div><!-- .half-content-total -->
</article><!-- #post-<?php the_ID(); ?> -->
